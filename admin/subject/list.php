<?php
// admin/subject/list.php - improved UI, filtering for course/year/semester
if (!isset($_SESSION['ACCOUNT_ID'])) {
    redirect(web_root . "admin/index.php");
    exit;
}

// Ensure the user has appropriate role to access this page
if ($_SESSION['ACCOUNT_TYPE'] !== 'Registrar' && 
    $_SESSION['ACCOUNT_TYPE'] !== 'Chairperson') {
    
    // Redirect or show an error message if the user does not have permission
    message("You do not have permission to access this page.", "error");
    redirect("index.php");  // Redirect to a safe page
}

// ---------------------------
// Load filter data (dynamic)
// ---------------------------
$courses = [];
$levels = [];      // distinct course levels (year)
$semesters = [];   // distinct semester values used by subjects

try {
    // Courses for the course dropdown - filter by department for Chairpersons
    $courseSql = "SELECT COURSE_ID, COURSE_NAME, COURSE_LEVEL, COURSE_MAJOR FROM `course`";
    if (isChairperson()) {
        $chairDeptId = getCurrentDepartmentId();
        if ($chairDeptId) {
            $courseSql .= " WHERE DEPT_ID = " . intval($chairDeptId);
        }
    }
    $courseSql .= " ORDER BY COURSE_NAME ASC";
    $mydb->setQuery($courseSql);
    $courses = $mydb->loadResultList();
} catch (Exception $e) {
    error_log("Course fetch failed: " . $e->getMessage());
    $courses = [];
}

try {
    // Distinct course levels from course table (if available)
    $mydb->setQuery("SELECT DISTINCT COURSE_LEVEL FROM `course` ORDER BY COURSE_LEVEL ASC");
    $lvlRows = $mydb->loadResultList();
    if (is_array($lvlRows)) {
        foreach ($lvlRows as $r) {
            // support both object and assoc-array forms
            $val = is_object($r) ? ($r->COURSE_LEVEL ?? null) : ($r['COURSE_LEVEL'] ?? null);
            if ($val !== null && $val !== '') $levels[] = $val;
        }
    }
} catch (Exception $e) {
    error_log("Course level fetch failed: " . $e->getMessage());
    $levels = [];
}

try {
    // Distinct semesters from subject table
    $mydb->setQuery("SELECT DISTINCT SEMESTER FROM `subject` ORDER BY SEMESTER ASC");
    $semRows = $mydb->loadResultList();
    if (is_array($semRows)) {
        foreach ($semRows as $r) {
            $val = is_object($r) ? ($r->SEMESTER ?? null) : ($r['SEMESTER'] ?? null);
            if ($val !== null && $val !== '') $semesters[] = $val;
        }
    }
} catch (Exception $e) {
    error_log("Semester fetch failed: " . $e->getMessage());
    $semesters = [];
}

// ---------------------------
// Read selected filters (GET)
// ---------------------------
$selected_course = isset($_GET['course']) ? intval($_GET['course']) : 0;
$selected_year   = isset($_GET['year']) ? intval($_GET['year']) : 0;
$selected_semester_raw = isset($_GET['semester']) ? (string)$_GET['semester'] : '';

// sanitize semester: only accept values that exist in $semesters (defensive)
$selected_semester = '';
if ($selected_semester_raw !== '') {
    // compare as strings
    foreach ($semesters as $s) {
        if ((string)$s === $selected_semester_raw) {
            $selected_semester = $selected_semester_raw;
            break;
        }
    }
}

// ---------------------------
// Build WHERE clauses
// ---------------------------
$whereClauses = [];
// fixed join condition
$whereClauses[] = "s.COURSE_ID = c.COURSE_ID";

if ($selected_course > 0) {
    $whereClauses[] = "s.COURSE_ID = " . $selected_course;
}
if ($selected_year > 0) {
    // course year level sits in course table
    $whereClauses[] = "c.COURSE_LEVEL = " . $selected_year;
}
if ($selected_semester !== '') {
    // semester may be numeric or text; escape with addslashes to avoid simple injection
    $safe_sem = addslashes($selected_semester);
    $whereClauses[] = "s.SEMESTER = '" . $safe_sem . "'";
}

$conditions = "";
if (!empty($whereClauses)) {
    $conditions = " WHERE " . implode(" AND ", $whereClauses);
}

// ---------------------------
// Fetch subjects with filters applied
// ---------------------------
$subjects = [];
$subjectCount = 0;
try {
    $sql = "SELECT s.*, c.COURSE_NAME, c.COURSE_LEVEL 
              FROM `subject` s
              JOIN `course` c ON s.COURSE_ID = c.COURSE_ID
              " . (count($whereClauses) ? "WHERE " . implode(" AND ", array_slice($whereClauses, 1)) : "") . "
              ORDER BY c.COURSE_NAME ASC, s.SUBJ_CODE ASC";
    // Note: above we used JOIN syntax and applied optional filters (we skip the mandatory join in repetition).
    // Alternatively, you can use the $conditions version if you prefer the earlier style.
    // For maximum clarity and to avoid duplicate join condition, rebuild $sql properly:
    $sql = "SELECT s.*, c.COURSE_NAME, c.COURSE_LEVEL 
              FROM `subject` s
              JOIN `course` c ON s.COURSE_ID = c.COURSE_ID";
    // collect optional filters separately (do not re-add the join)
    $optClauses = [];
    
    // Apply department filtering for Chairpersons
    if (isChairperson()) {
        $chairDeptId = getCurrentDepartmentId();
        if ($chairDeptId) {
            $optClauses[] = "c.DEPT_ID = " . intval($chairDeptId);
        }
    }
    
    if ($selected_course > 0) { $optClauses[] = "s.COURSE_ID = " . $selected_course; }
    if ($selected_year > 0)   { $optClauses[] = "c.COURSE_LEVEL = " . $selected_year; }
    if ($selected_semester !== '') { $optClauses[] = "s.SEMESTER = '" . addslashes($selected_semester) . "'"; }
    if (!empty($optClauses)) {
        $sql .= " WHERE " . implode(" AND ", $optClauses);
    }
    $sql .= " ORDER BY c.COURSE_NAME ASC, s.SUBJ_CODE ASC";

    $mydb->setQuery($sql);
    $subjects = $mydb->loadResultList();
    $subjectCount = is_array($subjects) ? count($subjects) : 0;
} catch (Exception $e) {
    error_log("Subject list query failed: " . $e->getMessage() . " SQL: " . ($sql ?? ''));
    $subjects = [];
    $subjectCount = 0;
}
?>

<style>
/* ===== Consistent Page Styling ===== */
.page-header-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 20px;
}

.page-header-row .title {
  margin: 0;
  font-size: 26px;
  font-weight: 700;
  color: #2c3e50;
}

.subject-badge {
  background: linear-gradient(135deg, #667eea, #764ba2);
  color: #fff;
  padding: 6px 12px;
  border-radius: 18px;
  font-weight: 700;
  margin-left: 8px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.subject-seal {
  max-width: 80px;
  height: auto;
  display: block;
}

/* ===== Modernized Filter Card Styling ===== */
.card {
  border-radius: 12px;
  border: none;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  margin-bottom: 20px;
}

.card-body {
  background: #ffffff;
  border-radius: 12px;
  padding: 20px 25px;
  transition: box-shadow 0.2s ease;
}

.card-body label {
  color: #2c3e50;
  font-weight: 600;
  font-size: 14px;
  margin-bottom: 8px;
  display: block;
}

.card-body .form-select,
.card-body .form-control {
  border-radius: 8px;
  border: 1px solid #e9ecef;
  padding: 8px 12px;
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
  font-size: 14px;
}

.card-body .form-select:focus,
.card-body .form-control:focus {
  border-color: #667eea;
  box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
  outline: none;
}

.card-body .btn {
  border-radius: 8px;
  font-weight: 600;
  border: none;
  padding: 8px 16px;
  transition: all 0.2s ease;
  color: white;
}

.card-body .btn-success {
  background: linear-gradient(135deg, #27ae60, #219653);
}

.card-body .btn-secondary {
  background: linear-gradient(135deg, #95a5a6, #7f8c8d);
}

.card-body .btn-success:hover {
  background: linear-gradient(135deg, #219653, #1e8449);
  transform: translateY(-1px);
  box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}

.card-body .btn-secondary:hover {
  background: linear-gradient(135deg, #7f8c8d, #6c757d);
  transform: translateY(-1px);
  box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}

/* New Subject Button */
.btn-primary.btn-xs {
  background: linear-gradient(135deg, #27ae60, #219653);
  border: none;
  border-radius: 6px;
  font-weight: 600;
  padding: 8px 16px;
  transition: all 0.2s ease;
  color: white;
  margin-left: 10px;
}

.btn-primary.btn-xs:hover {
  background: linear-gradient(135deg, #219653, #1e8449);
  transform: translateY(-1px);
  box-shadow: 0 4px 8px rgba(0,0,0,0.15);
  color: white;
}

/* Table Styling - Updated to match theme */
.table-responsive {
  margin-top: 20px;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  overflow: hidden;
  border: none;
}

.table {
  margin-bottom: 0;
  border: none;
  font-size: 14px;
}

.table th {
  background: linear-gradient(135deg, #2c3e50, #34495e);
  color: #fff;
  text-align: center;
  font-weight: 600;
  border: none;
  padding: 16px 12px;
  font-size: 14px;
  letter-spacing: 0.5px;
}

.table td {
  vertical-align: middle;
  padding: 14px 12px;
  text-align: center;
  border-bottom: 1px solid #e9ecef;
  color: #495057;
}

.table-hover tbody tr:hover {
  background-color: #f8f9fa;
  transition: background-color 0.2s ease;
}

/* Action Buttons Styling */
.action-btn {
  margin-right: 6px;
  border: none;
  border-radius: 6px;
  font-weight: 600;
  font-size: 12px;
  padding: 6px 12px;
  transition: all 0.2s ease;
  color: white;
}

.action-btn:hover {
  transform: translateY(-1px);
  box-shadow: 0 4px 8px rgba(0,0,0,0.15);
  color: white;
}

.btn-primary {
  background: linear-gradient(135deg, #3498db, #2980b9);
}

.btn-danger {
  background: linear-gradient(135deg, #e74c3c, #c0392b);
}

.btn-primary:hover {
  background: linear-gradient(135deg, #2980b9, #2471a3);
}

.btn-danger:hover {
  background: linear-gradient(135deg, #c0392b, #a93226);
}

/* DataTable Customization */
.dataTables_wrapper {
  margin-top: 0;
}

.dataTables_length,
.dataTables_filter {
  margin-bottom: 15px;
}

.dataTables_filter input {
  border: 1px solid #e9ecef;
  border-radius: 6px;
  padding: 6px 12px;
  margin-left: 8px;
}

.dataTables_length select {
  border: 1px solid #e9ecef;
  border-radius: 6px;
  padding: 6px;
  margin: 0 8px;
}

.dataTables_info {
  color: #6c757d;
  font-size: 13px;
}

.dataTables_paginate .paginate_button {
  border: 1px solid #e9ecef !important;
  border-radius: 6px !important;
  margin: 0 2px;
  padding: 6px 12px !important;
}

.dataTables_paginate .paginate_button.current {
  background: linear-gradient(135deg, #667eea, #764ba2) !important;
  color: white !important;
  border: none !important;
}

/* Responsive styling */
@media (max-width: 767px) {
  .page-header-row {
    flex-direction: column;
    align-items: flex-start;
  }
  .subject-seal {
    margin-top: 10px;
  }
  .table-responsive {
    border-radius: 8px;
  }
  .action-btn {
    display: block;
    width: 100%;
    margin-bottom: 5px;
  }
  .card-body .btn {
    width: 100%;
    margin-bottom: 8px;
  }
}

/* Text colors for better readability */
.text-muted {
  color: #6c757d !important;
}

/* Course and semester badges */
.course-badge {
  background: linear-gradient(135deg, #f39c12, #e67e22);
  color: white;
  padding: 4px 8px;
  border-radius: 12px;
  font-size: 10px;
  font-weight: 600;
}

.semester-badge {
  background: linear-gradient(135deg, #1abc9c, #16a085);
  color: white;
  padding: 4px 8px;
  border-radius: 12px;
  font-size: 12px;
  font-weight: 600;
}
</style>

<div class="row">
  <div class="col-lg-12">
    <div class="page-header-row">
      <div>
        <h2 class="title">
          List of Subjects per Course/Year
          <a href="index.php?view=add" class="btn btn-primary btn-xs">
            <i class="fa fa-plus-circle fw-fa"></i> New
          </a>
          <span class="subject-badge"><?php echo intval($subjectCount); ?></span>
        </h2>
        <p class="text-muted" style="margin:0">Manage subject records and their mapping to courses.</p>
      </div>
      <div style="text-align:right;">
        <img src="<?php echo web_root; ?>img/school_seal_100x100.png" alt="School Seal" class="subject-seal" loading="lazy">
      </div>
    </div>
  </div>
</div>

<?php
// preserve `view` param if present
$actionBase = $_SERVER['PHP_SELF'];
if (isset($_GET['view'])) {
    $actionBase .= '?view=' . urlencode($_GET['view']);
}
?>
<!-- Filter Section -->
<div class="card mb-3">
  <div class="card-body">
    <form method="get" action="<?php echo $actionBase; ?>" role="search" aria-label="Subject filters">
      <?php if (isset($_GET['view'])): ?>
        <input type="hidden" name="view" value="<?php echo htmlspecialchars($_GET['view']); ?>">
      <?php endif; ?>

      <div class="row g-3 align-items-end">
        <div class="col-md-6">
          <label for="course" class="form-label">Course</label>
          <select id="course" name="course" class="form-select">
          <option value="0">All Courses</option>
          <?php
            if (!empty($courses)) {
                foreach ($courses as $c) {
                    $c_id = is_object($c) ? ($c->COURSE_ID ?? '') : ($c['COURSE_ID'] ?? '');
                    $c_name = is_object($c) ? ($c->COURSE_NAME ?? '') : ($c['COURSE_NAME'] ?? '');
                    $c_level = is_object($c) ? ($c->COURSE_LEVEL ?? '') : ($c['COURSE_LEVEL'] ?? '');
                    $c_major = is_object($c) ? ($c->COURSE_MAJOR ?? '') : ($c['COURSE_MAJOR'] ?? '');
                    if ($c_id === '') continue;
                    
                    // Build display name with major if it exists
                    $displayName = htmlspecialchars($c_name) . '-' . htmlspecialchars($c_level);
                    if (!empty($c_major)) {
                        $displayName .= ' (' . htmlspecialchars($c_major) . ')';
                    }
                    
                    $sel = ($selected_course == intval($c_id)) ? 'selected' : '';
                    echo '<option value="' . intval($c_id) . '" ' . $sel . '>' . $displayName . '</option>';
                }
            } else {
                echo '<option value="0">No Courses Found</option>';
            }
          ?>
          </select>
        </div>

        <div class="col-md-3">
          <label for="year" class="form-label">Year Level</label>
          <select id="year" name="year" class="form-select">
          <option value="0">All Years</option>
          <?php
            if (!empty($levels)) {
                foreach ($levels as $lv) {
                    $sel = ($selected_year == intval($lv)) ? 'selected' : '';
                    echo '<option value="' . intval($lv) . '" ' . $sel . '>Year ' . intval($lv) . '</option>';
                }
            } else {
                for ($i = 1; $i <= 4; $i++) {
                    $sel = ($selected_year == $i) ? 'selected' : '';
                    echo '<option value="' . $i . '" ' . $sel . '>Year ' . $i . '</option>';
                }
            }
          ?>
          </select>
        </div>

        <div class="col-md-3">
          <label for="semester" class="form-label">Semester</label>
          <select id="semester" name="semester" class="form-select">
          <option value="">All Semesters</option>
          <?php
            if (!empty($semesters)) {
                foreach ($semesters as $s) {
                    $s_val = (string)$s;
                    $sel = ($selected_semester === $s_val) ? 'selected' : '';
                    echo '<option value="' . htmlspecialchars($s_val, ENT_QUOTES, 'UTF-8') . '" ' . $sel . '>' . htmlspecialchars($s_val) . '</option>';
                }
            } else {
                $defaults = ['1', '2', 'Summer'];
                foreach ($defaults as $d) {
                    $sel = ($selected_semester === (string)$d) ? 'selected' : '';
                    echo '<option value="' . htmlspecialchars((string)$d, ENT_QUOTES, 'UTF-8') . '" ' . $sel . '>' . htmlspecialchars((string)$d) . '</option>';
                }
            }
          ?>
          </select>
        </div>
      </div>

      <div class="row g-3 mt-2">
        <div class="col-12">
          <button type="submit" class="btn btn-success btn-sm me-2">
            <i class="fa fa-filter"></i> Filter
          </button>
          <a class="btn btn-secondary btn-sm" href="<?php echo $_SERVER['PHP_SELF'] . (isset($_GET['view']) ? '?view=' . urlencode($_GET['view']) : ''); ?>">
            <i class="fa fa-refresh"></i> Reset
          </a>
        </div>
      </div>
    </form>
  </div>
</div>

<form action="controller.php?action=delete" method="POST">
  <div class="table-responsive">
    <table id="dash-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Subject</th>
          <th>Description</th>
          <th>Unit</th>
          <th>Pre-Requisite</th>
          <th>Course/Year</th>
          <th>Semester</th>
          <th width="12%">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($subjects as $result) {
            // defensive field read (works with object or assoc-array)
            $subj_id = is_object($result) ? ($result->SUBJ_ID ?? '') : ($result['SUBJ_ID'] ?? '');
            $subj_code = is_object($result) ? ($result->SUBJ_CODE ?? '') : ($result['SUBJ_CODE'] ?? '');
            $subj_desc = is_object($result) ? ($result->SUBJ_DESCRIPTION ?? '') : ($result['SUBJ_DESCRIPTION'] ?? '');
            $unit = is_object($result) ? ($result->UNIT ?? '') : ($result['UNIT'] ?? '');
            $pre = is_object($result) ? ($result->PRE_REQUISITE ?? '') : ($result['PRE_REQUISITE'] ?? '');
            $course_name = is_object($result) ? ($result->COURSE_NAME ?? '') : ($result['COURSE_NAME'] ?? '');
            $course_level = is_object($result) ? ($result->COURSE_LEVEL ?? '') : ($result['COURSE_LEVEL'] ?? '');
            $semester = is_object($result) ? ($result->SEMESTER ?? '') : ($result['SEMESTER'] ?? '');

            // escape for safety
            $subj_id_e = htmlspecialchars((string)$subj_id, ENT_QUOTES, 'UTF-8');
            $subj_code_e = htmlspecialchars((string)$subj_code, ENT_QUOTES, 'UTF-8');
            $subj_desc_e = htmlspecialchars((string)$subj_desc, ENT_QUOTES, 'UTF-8');
            $unit_e = htmlspecialchars((string)$unit, ENT_QUOTES, 'UTF-8');
            $pre_e = htmlspecialchars((string)$pre, ENT_QUOTES, 'UTF-8');
            $course_name_e = htmlspecialchars((string)$course_name, ENT_QUOTES, 'UTF-8');
            $course_level_e = htmlspecialchars((string)$course_level, ENT_QUOTES, 'UTF-8');
            $semester_e = htmlspecialchars((string)$semester, ENT_QUOTES, 'UTF-8');

            echo '<tr>';
            echo '<td><strong>' . $subj_code_e . '</strong></td>';
            echo '<td>' . $subj_desc_e . '</td>';
            echo '<td>' . $unit_e . '</td>';
            echo '<td>' . $pre_e . '</td>';
            echo '<td><span class="course-badge">' . $course_name_e . ' - Year ' . $course_level_e . '</span></td>';
            echo '<td><span class="semester-badge">' . $semester_e . '</span></td>';

            // action buttons (edit + delete). Delete triggers confirm.
            $editUrl = 'index.php?view=edit&id=' . urlencode($subj_id);
            $deleteUrl = 'controller.php?action=delete&id=' . urlencode($subj_id);
            echo '<td align="center">';
            echo '<a title="Edit" href="' . htmlspecialchars($editUrl, ENT_QUOTES, 'UTF-8') . '" class="btn btn-primary btn-xs action-btn"><span class="fa fa-edit fw-fa"></span></a>';
            echo '<a title="Delete" href="#" class="btn btn-danger btn-xs action-btn" onclick="confirmDelete(event, \'' . htmlspecialchars($deleteUrl, ENT_QUOTES, 'UTF-8') . '\')"><span class="fa fa-trash-o fw-fa"></span></a>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
      </tbody>
    </table>
  </div>
</form>

<!-- DataTables init + SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(event, url) {
  event.preventDefault();
  Swal.fire({
    title: "Confirm Deletion",
    text: "Are you sure you want to delete this subject?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Yes, delete it!"
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = url;
    }
  });
}

// Initialize DataTable
(function($){
  $(document).ready(function(){
    if ($.fn.DataTable) {
      $('#dash-table').DataTable({
        responsive: true,
        pageLength: 15,
        lengthMenu: [[10, 15, 25, 50], [10, 15, 25, 50]],
        columnDefs: [
          { orderable: false, targets: -1 } // last column not orderable
        ],
        order: [[0, 'asc']], // order by Subject (code)
        language: {
          searchPlaceholder: "Search subject, course, semester...",
          search: "",
          lengthMenu: "Show _MENU_ entries",
          info: "Showing _START_ to _END_ of _TOTAL_ entries",
          infoEmpty: "Showing 0 to 0 of 0 entries",
          infoFiltered: "(filtered from _MAX_ total entries)",
          paginate: {
            first: "First",
            last: "Last",
            next: "Next",
            previous: "Previous"
          }
        },
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
             '<"row"<"col-sm-12"tr>>' +
             '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        initComplete: function() {
          // Add custom styling after DataTable initialization
          $('.dataTables_length select').addClass('form-control-sm');
          $('.dataTables_filter input').addClass('form-control-sm');
        }
      });
    }
  });
})(jQuery);
</script>