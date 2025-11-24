<?php
// admin/view.php
// Full admin student view. Keeps all form fields and tries multiple ID variants to fetch enrolled subjects.
// BACKUP your original file before replacing.


if (!isset($mydb) && file_exists(__DIR__ . '/../../include/initialize.php')) {
    require_once __DIR__ . '/../../include/initialize.php';
}

// get request id and normalize
$reqId = isset($_GET['id']) ? trim($_GET['id']) : '';
if ($reqId === '') {
    echo "<div class='alert alert-danger'>Student ID not provided.</div>";
    return;
}

// fetch student record
$student = New Student();
$res = $student->single_student($reqId);

if (!$res) {
    echo "<div class='alert alert-warning'>Student not found (ID: " . htmlspecialchars($reqId) . ").</div>";
    return;
}

// fetch extra details (guardian, emergency, last school, etc.)
$studentdetails = New StudentDetails();
$resguardian = $studentdetails->single_StudentDetails($reqId);

// fetch the student's course record if available
$course = New Course();
$resCourse = $course->single_course(isset($res->COURSE_ID) ? $res->COURSE_ID : 0);

// helper accessor
function v($obj, $prop) {
    return (isset($obj) && isset($obj->$prop)) ? $obj->$prop : '';
}

// prepare SY default if not already
$currentyear = date('Y');
$nextyear = date('Y') + 1;
$sy = $currentyear . '-' . $nextyear;
if (empty($_SESSION['SY'])) $_SESSION['SY'] = $sy;
else $sy = $_SESSION['SY'];

?>
<style type="text/css">
#img_profile{ width:100%; height:auto; }
#img_profile > a > img{ width:100%; height:auto; }
</style>

<div class="col-sm-3">
  <div class="panel">
    <div id="img_profile" class="panel-body">
      <a href="" data-target="#myModal" data-toggle="modal">
        <img title="profile image" class="img-hover" src="<?php echo htmlspecialchars(web_root . 'student/' . v($res,'STUDPHOTO')); ?>" alt="Profile">
      </a>
    </div>
    <ul class="list-group">
      <li class="list-group-item text-right"><span class="pull-left"><strong>Student Name</strong></span>
        <?php echo htmlspecialchars(v($res,'LNAME') . ' ' . v($res,'FNAME') . ' ' . v($res,'MNAME')); ?>
      </li>
      <li class="list-group-item text-right"><span class="pull-left"><strong>Course</strong></span>
        <?php
          $courseLabel = 'N/A';
          if (!empty($resCourse) && isset($resCourse->COURSE_NAME)) {
              $yr = isset($res->YEARLEVEL) ? $res->YEARLEVEL : ($resCourse->COURSE_LEVEL ?? '');
              $courseLabel = $resCourse->COURSE_NAME . '-' . $yr;
          }
          echo htmlspecialchars($courseLabel);
        ?>
      </li>
      <li class="list-group-item text-right"><span class="pull-left"><strong>Status</strong></span>
        <?php echo htmlspecialchars(v($res,'student_status')); ?>
      </li>
    </ul>
  </div>
</div>

<div class="col-sm-9">
  <form action="controller.php?action=edit" class="form-horizontal" method="post">
    <div class="table-responsive">
      <div class="col-md-8"><h2>Student Information</h2></div>
      <table class="table">

        <tr>
          <td><label>Id</label></td>
          <td>
            <input class="form-control input-md" readonly id="IDNO" name="IDNO" placeholder="Student Id" type="text" value="<?php echo htmlspecialchars(v($res,'IDNO')); ?>">
          </td>
          <td colspan="4"></td>
        </tr>

      <tr>
        <td><label>Firstname</label></td>
        <td>
          <input required="true" class="form-control input-md" id="FNAME" name="FNAME" placeholder="First Name" type="text" value="<?php echo htmlspecialchars(v($res,'FNAME')); ?>">
        </td>
        <td><label>Lastname</label></td>
        <td colspan="2">
          <input required="true" class="form-control input-md" id="LNAME" name="LNAME" placeholder="Last Name" type="text" value="<?php echo htmlspecialchars(v($res,'LNAME')); ?>">
        </td>
        <td>
          <input class="form-control input-md" id="MI" name="MI" placeholder="MI" type="text" value="<?php echo htmlspecialchars(v($res,'MNAME')); ?>">
        </td>
      </tr>

      <tr>
        <td><label>Maiden Name (if applicable)</label></td>
        <td colspan="5">
          <input class="form-control input-md" id="MAIDEN_NAME" name="MAIDEN_NAME" placeholder="Maiden Name" type="text" value="<?php echo htmlspecialchars(v($res,'MAIDEN_NAME') ?: v($resguardian,'MAIDEN_NAME')); ?>">
        </td>
      </tr>

      <tr>
        <td ><label>Sex </label></td>
        <td colspan="2">
          <label>
            <?php
              $sex = v($res,'SEX');
              echo '<input id="optionsRadios1" name="optionsRadios" type="radio" value="Female"' . ($sex === 'Female' ? ' checked' : '') . '> Female ';
              echo '<input id="optionsRadios2" name="optionsRadios" type="radio" value="Male"' . ($sex === 'Male' ? ' checked' : '') . '> Male';
            ?>
          </label>
        </td>

        <td><label>Date of birth</label></td>
        <td colspan="2">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input required="true" name="BIRTHDATE" id="BIRTHDATE" type="text" class="form-control input-md" data-inputmask="'alias':'mm/dd/yyyy'" data-mask value="<?php echo !empty(v($res,'BDAY')) ? htmlspecialchars(date_format(date_create(v($res,'BDAY')),'m/d/Y')) : ''; ?>">
          </div>
        </td>
      </tr>

      <tr>
        <td><label>Place of Birth</label></td>
        <td colspan="5">
          <input required="true" class="form-control input-md" id="BIRTHPLACE" name="BIRTHPLACE" placeholder="Place of Birth" type="text" value="<?php echo htmlspecialchars(v($res,'BPLACE')); ?>">
        </td>
      </tr>

      <tr>
        <td><label>Nationality</label></td>
        <td colspan="2"><input required="true" class="form-control input-md" id="NATIONALITY" name="NATIONALITY" placeholder="Nationality" type="text" value="<?php echo htmlspecialchars(v($res,'NATIONALITY')); ?>"></td>

        <td><label>Religion</label></td>
        <td colspan="2"><input required="true" class="form-control input-md" id="RELIGION" name="RELIGION" placeholder="Religion" type="text" value="<?php echo htmlspecialchars(v($res,'RELIGION')); ?>"></td>
      </tr>

      <tr>
        <td><label>Contact No.</label></td>
        <td colspan="3"><input required="true" class="form-control input-md" id="CONTACT" name="CONTACT" placeholder="Contact Number" type="text" value="<?php echo htmlspecialchars(v($res,'CONTACT_NO')); ?>"></td>
        <td><label>Civil Status</label></td>
        <td colspan="2">
          <select class="form-control input-sm" name="CIVILSTATUS">
            <option value="<?php echo htmlspecialchars(v($res,'STATUS')); ?>"><?php echo htmlspecialchars(v($res,'STATUS')); ?></option>
            <option value="Single">Single</option>
            <option value="Married">Married</option>
            <option value="Widow">Widow</option>
          </select>
        </td>
      </tr>

      <tr>
        <td><label>Guardian</label></td>
        <td colspan="2">
          <input required="true" class="form-control input-md" id="GUARDIAN" name="GUARDIAN" placeholder="Parents/Guardian Name" type="text" value="<?php echo htmlspecialchars(isset($resguardian->GUARDIAN) ? $resguardian->GUARDIAN : ''); ?>">
        </td>
        <td><label>Contact No.</label></td>
        <td colspan="2"><input required="true" class="form-control input-md" id="GCONTACT" name="GCONTACT" placeholder="Contact Number" type="text" value="<?php echo htmlspecialchars(isset($resguardian->GCONTACT) ? $resguardian->GCONTACT : ''); ?>"></td>
      </tr>

      <!-- Additional fields mirrored from registration form -->
      <tr>
        <td><label>Address while studying at BSU</label></td>
        <td colspan="5">
          <input class="form-control input-md" id="ADDR_WHILE_STUDY" name="ADDR_WHILE_STUDY" placeholder="Address while at BSU" type="text" value="<?php echo htmlspecialchars(v($resguardian,'ADDR_WHILE_STUDY') ?: v($res,'ADDR_WHILE_STUDY')); ?>">
        </td>
      </tr>

      <tr>
        <td><label>Last School Attended</label></td>
        <td colspan="5">
          <input class="form-control input-md" id="LAST_SCHOOL" name="LAST_SCHOOL" placeholder="Last school attended" type="text" value="<?php echo htmlspecialchars(v($resguardian,'LAST_SCHOOL')); ?>">
        </td>
      </tr>

      <tr>
        <td><label>Last School Address</label></td>
        <td colspan="5">
          <input class="form-control input-md" id="LAST_SCHOOL_ADDR" name="LAST_SCHOOL_ADDR" placeholder="Address of last school" type="text" value="<?php echo htmlspecialchars(v($resguardian,'LAST_SCHOOL_ADDR')); ?>">
        </td>
      </tr>

      <tr>
        <td><label>Father's Name</label></td>
        <td colspan="2">
          <input class="form-control input-md" id="FATHER_NAME" name="FATHER_NAME" placeholder="Father's name" type="text" value="<?php echo htmlspecialchars(v($resguardian,'FATHER_NAME')); ?>">
        </td>
        <td><label>Father's Contact Number</label></td>
        <td colspan="2">
          <input class="form-control input-md" id="FATHER_CONTACT" name="FATHER_CONTACT" placeholder="Father's contact" type="text" value="<?php echo htmlspecialchars(v($resguardian,'FATHER_CONTACT')); ?>">
        </td>
      </tr>

      <tr>
        <td><label>Mother's Name</label></td>
        <td colspan="2">
          <input class="form-control input-md" id="MOTHER_NAME" name="MOTHER_NAME" placeholder="Mother's name" type="text" value="<?php echo htmlspecialchars(v($resguardian,'MOTHER_NAME')); ?>">
        </td>
        <td><label>Mother's Contact Number</label></td>
        <td colspan="2">
          <input class="form-control input-md" id="MOTHER_CONTACT" name="MOTHER_CONTACT" placeholder="Mother's contact" type="text" value="<?php echo htmlspecialchars(v($resguardian,'MOTHER_CONTACT')); ?>">
        </td>
      </tr>

      <tr>
        <td><label>Emergency Contact Person</label></td>
        <td colspan="2">
          <input class="form-control input-md" id="EMER_NAME" name="EMER_NAME" placeholder="Emergency contact person" type="text" value="<?php echo htmlspecialchars(v($resguardian,'EMER_NAME')); ?>">
        </td>
        <td><label>Relationship</label></td>
        <td colspan="2">
          <input class="form-control input-md" id="EMER_REL" name="EMER_REL" placeholder="Relationship" type="text" value="<?php echo htmlspecialchars(v($resguardian,'EMER_REL')); ?>">
        </td>
      </tr>

      <tr>
        <td><label>Emergency Address</label></td>
        <td colspan="2">
          <input class="form-control input-md" id="EMER_ADDR" name="EMER_ADDR" placeholder="Emergency address" type="text" value="<?php echo htmlspecialchars(v($resguardian,'EMER_ADDR')); ?>">
        </td>
        <td><label>Emergency Contact Number</label></td>
        <td colspan="2">
          <input class="form-control input-md" id="EMER_CONTACT" name="EMER_CONTACT" placeholder="Contact number" type="text" value="<?php echo htmlspecialchars(v($resguardian,'EMER_CONTACT')); ?>">
        </td>
      </tr>

      <tr>
        <td><label>Ethnicity</label></td>
        <td colspan="2">
          <input class="form-control input-md" id="ETHNICITY" name="ETHNICITY" placeholder="Ethnicity" type="text" value="<?php echo htmlspecialchars(v($resguardian,'ETHNICITY') ?: v($res,'ETHNICITY')); ?>">
        </td>

        <td><label>E-mail Address</label></td>
        <td colspan="2">
          <input class="form-control input-md" id="EMAIL" name="EMAIL" placeholder="Email" type="email" value="<?php echo htmlspecialchars(v($res,'EMAIL') ?: v($resguardian,'EMAIL')); ?>">
        </td>
      </tr>

      <tr>
        <td><label>Course (current)</label></td>
        <td colspan="5">
          <input class="form-control input-md" readonly type="text" value="<?php echo htmlspecialchars(($resCourse->COURSE_NAME ?? '') . ' - Level ' . ($res->YEARLEVEL ?? ($resCourse->COURSE_LEVEL ?? ''))); ?>">
        </td>
      </tr>

      <tr>
        <td></td>
        <td colspan="5">
          <button class="btn btn-success btn-lg" name="save" type="submit">Update</button>
        </td>
      </tr>

      </table>
    </div>
  </form>

<?php
// ---------- ENROLLED SUBJECTS: robust lookup using candidate ID variants --------------

// gather candidate IDs to try (helpful if your ID storage differs)
$candidates = [];
$canonical = trim((string) v($res, 'IDNO'));
if ($canonical !== '') $candidates[] = $canonical;

// If canonical is numeric, try variants
if (ctype_digit($canonical)) {
    $num = intval($canonical);
    // raw numeric (no leading zeros)
    $candidates[] = (string) $num;
    // padded variants
    $candidates[] = str_pad($num, 7, '0', STR_PAD_LEFT);
    $candidates[] = str_pad($num, 8, '0', STR_PAD_LEFT);
    // common prefixes guess (if your system auto-starts at 5000... etc)
    $candidates[] = (string) (5000000 + $num);
    $candidates[] = (string) (1000000000 + $num);
}

// upper/lower case for alphanumeric IDs
$candidates[] = strtoupper($canonical);
$candidates[] = strtolower($canonical);

// ensure uniqueness & remove empties
$candidates = array_values(array_unique(array_filter($candidates, function($v){ return $v !== ''; })));

// attempt to fetch enrolled subjects using studentsubjects model if it exists
$enrolled = [];
if (class_exists('StudentSubjects')) {
    $ss = new StudentSubjects();
    // try each candidate until we find rows (if necessary, combine all into one IN clause)
    // try full IN list first (faster)
    $found = $ss->get_enrolled_by_student($candidates[0] ?? $canonical, $sy, $_GET['sem'] ?? null);
    if (!empty($found)) {
        $enrolled = $found;
    } else {
        // if first try returned empty, try with IN clause of all candidates (some wrappers accept array)
        // call the model with the canonical and let model try variants (it was designed to handle multiple)
        $enrolled = $ss->get_enrolled_by_student($canonical, $sy, $_GET['sem'] ?? null);
    }
}

// If model not present or returned empty, fallback to raw SQL using IN list
if (empty($enrolled)) {
    if (!empty($candidates) && isset($mydb) && isset($mydb->conn)) {
        // sanitize candidates as ints when numeric, else quote safely
        $inListItems = [];
        foreach ($candidates as $c) {
            if (ctype_digit($c)) {
                $inListItems[] = intval($c);
            } else {
                $inListItems[] = "'" . $mydb->escape_value($c) . "'";
            }
        }
        $inList = implode(',', $inListItems);

        $sql = "SELECT s.SUBJ_CODE, s.SUBJ_DESCRIPTION, s.UNIT, st.AVERAGE, st.OUTCOME
                FROM studentsubjects st
                LEFT JOIN subject s ON s.SUBJ_ID = st.SUBJ_ID
                WHERE st.IDNO IN ({$inList})";

        $semester = $_GET['sem'] ?? null;
        if (!empty($semester)) {
            $sql .= " AND st.SEMESTER = '" . $mydb->escape_value($semester) . "'";
        }
        if (!empty($sy)) {
            $sql .= " AND (st.SY = '" . $mydb->escape_value($sy) . "' OR st.SY IS NULL)";
        }

        // run raw query
        $result = mysqli_query($mydb->conn, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $enrolled[] = $row;
            }
            mysqli_free_result($result);
        } else {
            // log DB error for debug (do not output raw SQL in production)
            error_log("admin/view.php: enrolled subjects SQL failed: " . mysqli_error($mydb->conn));
        }
    }
}

// compute total units
$total_units = 0.0;
foreach ($enrolled as $r) {
    $unit = is_array($r) ? ($r['UNIT'] ?? 0) : ($r->UNIT ?? 0);
    $total_units += floatval($unit);
}
?>

<div class="panel panel-default" style="margin-top:20px;">
  <div class="panel-heading"><strong>Enrolled Subjects</strong>
    <span class="pull-right">SY: <?php echo htmlspecialchars($sy ?? 'All'); ?></span>
  </div>
  <div class="panel-body">
    <?php if (empty($enrolled)): ?>
      <div class="alert alert-info">
        No enrolled subjects found for this student in the selected term.
        <br><small>Candidate IDs tried: <?php echo htmlspecialchars(implode(', ', $candidates)); ?></small>
      </div>
    <?php else: ?>
      <div class="table-responsive">
        <table class="table table-condensed table-striped">
          <thead><tr><th>Code</th><th>Description</th><th>Units</th><th>Grade</th><th>Outcome</th></tr></thead>
          <tbody>
            <?php foreach ($enrolled as $sub):
                $code = is_array($sub) ? ($sub['SUBJ_CODE'] ?? '') : ($sub->SUBJ_CODE ?? '');
                $desc = is_array($sub) ? ($sub['SUBJ_DESCRIPTION'] ?? '') : ($sub->SUBJ_DESCRIPTION ?? '');
                $unit = is_array($sub) ? ($sub['UNIT'] ?? '') : ($sub->UNIT ?? '');
                $avg  = is_array($sub) ? ($sub['AVERAGE'] ?? $sub['AVE'] ?? '') : ($sub->AVERAGE ?? $sub->AVE ?? '');
                $out  = is_array($sub) ? ($sub['OUTCOME'] ?? '') : ($sub->OUTCOME ?? '');
            ?>
              <tr>
                <td><?php echo htmlspecialchars($code); ?></td>
                <td><?php echo htmlspecialchars($desc); ?></td>
                <td><?php echo htmlspecialchars($unit); ?></td>
                <td><?php echo htmlspecialchars($avg); ?></td>
                <td><?php echo htmlspecialchars($out); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr><td colspan="2"><strong>Total Units</strong></td><td><strong><?php echo number_format($total_units, 1); ?></strong></td><td colspan="2"></td></tr>
          </tfoot>
        </table>
      </div>
    <?php endif; ?>
  </div>
</div>

</div> <!-- /.col-sm-9 -->
