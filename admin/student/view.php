<?php
// admin/view.php - Profile card separated (drop-in replacement)
// NOTE: Presentation only. No logic changes.

if (!isset($mydb) && file_exists(__DIR__ . '/../../include/initialize.php')) {
    require_once __DIR__ . '/../../include/initialize.php';
}

// Ensure the user has appropriate role to access this page
if ($_SESSION['ACCOUNT_TYPE'] !== 'Registrar' && 
    $_SESSION['ACCOUNT_TYPE'] !== 'Registrar') {
    
    // Redirect or show an error message if the user does not have permission
    message("You do not have permission to access this page.", "error");
    redirect("index.php");  // Redirect to a safe page
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

// fetch extra details (emergency, last school, etc.)
$studentdetails = New StudentDetails();
$resdetails = $studentdetails->single_StudentDetails($reqId);

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

// Prepare majors list for current course (if applicable)
$majors = [];
$currentMajor = '';
if (isset($mydb) && !empty($resCourse->COURSE_NAME)) {
    $cname = $mydb->escape_value($resCourse->COURSE_NAME);
    $clevel = $mydb->escape_value($resCourse->COURSE_LEVEL ?? '');
    $mydb->setQuery("SELECT COURSE_ID, COURSE_MAJOR FROM course WHERE COURSE_NAME = '{$cname}' AND COURSE_LEVEL = '{$clevel}' ORDER BY COURSE_MAJOR");
    $majors = $mydb->loadResultList();
    $currentMajor = $resCourse->COURSE_MAJOR ?? '';
}
?>

<style>
.student-profile-container {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 12px;
    margin-bottom: 25px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
}

.student-profile-header {
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 20px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    margin-bottom: 20px;
}

.student-avatar {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #667eea;
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
}

.student-info {
    flex: 1;
}

.student-name {
    font-size: 24px;
    font-weight: 700;
    color: #2c3e50;
    margin: 0 0 5px 0;
}

.student-id {
    color: #6c757d;
    font-size: 14px;
    margin: 0 0 15px 0;
}

.student-badges {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}

.badge-primary {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
}

.badge-secondary {
    background: #6c757d;
    color: white;
}

.student-details-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 15px;
    margin-bottom: 20px;
}

.detail-card {
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    border-left: 4px solid #667eea;
}

.detail-card h5 {
    color: #2c3e50;
    margin-bottom: 15px;
    font-weight: 600;
    font-size: 16px;
}

.detail-item {
    display: flex;
    justify-content: space-between;
    padding: 8px 0;
    border-bottom: 1px solid #f1f3f4;
}

.detail-item:last-child {
    border-bottom: none;
}

.detail-label {
    color: #6c757d;
    font-weight: 500;
}

.detail-value {
    color: #2c3e50;
    font-weight: 600;
}

.form-section {
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    margin-bottom: 25px;
}

.form-section h4 {
    color: #2c3e50;
    margin-bottom: 20px;
    font-weight: 600;
    padding-bottom: 10px;
    border-bottom: 3px solid #667eea;
}

.form-section h4.collapsible {
    cursor: pointer;
    user-select: none;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: all 0.3s ease;
}

.form-section h4.collapsible:hover {
    color: #667eea;
}

.form-section h4.collapsible .fa-chevron-down,
.form-section h4.collapsible .fa-chevron-up {
    transition: transform 0.3s ease;
    font-size: 14px;
}

.form-row-modern {
    display: flex;
    gap: 20px;
    margin-bottom: 15px;
    align-items: flex-start;
}

.form-group-modern {
    flex: 1;
}

.form-label {
    display: block;
    margin-bottom: 6px;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}

.form-control-modern {
    width: 100%;
    padding: 10px 12px;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    font-size: 14px;
    transition: all 0.3s ease;
    background: #fff;
}

.form-control-modern:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15);
}

.form-control-modern[readonly] {
    background: #f8f9fa;
    color: #6c757d;
}

.btn-modern {
    padding: 12px 30px;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
    text-align: center;
}

.btn-primary-modern {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
}

.btn-primary-modern:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(102, 126, 234, 0.4);
    color: white;
}

.btn-outline-modern {
    background: transparent;
    color: #6c757d;
    border: 2px solid #e9ecef;
}

.btn-outline-modern:hover {
    background: #f8f9fa;
    border-color: #6c757d;
}

.table-modern {
    width: 100%;
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    margin-bottom: 25px;
}

.table-modern thead th {
    background: linear-gradient(135deg, #2c3e50, #34495e);
    color: white;
    padding: 15px;
    font-weight: 600;
    border: none;
}

.table-modern tbody td {
    padding: 12px 15px;
    border-bottom: 1px solid #e9ecef;
    vertical-align: middle;
}

.table-modern tbody tr:hover {
    background: #f8f9fa;
}

.table-modern tfoot td {
    background: #f8f9fa;
    font-weight: 600;
    padding: 15px;
}

.radio-group {
    display: flex;
    gap: 20px;
    align-items: center;
}

.radio-label {
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    font-weight: 500;
}

.action-buttons {
    display: flex;
    gap: 15px;
    justify-content: flex-end;
    margin-top: 30px;
    padding-top: 20px;
    border-top: 2px solid #e9ecef;
}

.no-data {
    text-align: center;
    padding: 40px;
    color: #6c757d;
}

.no-data i {
    font-size: 48px;
    margin-bottom: 15px;
    color: #dee2e6;
}

@media (max-width: 768px) {
    .student-profile-header {
        flex-direction: column;
        text-align: center;
    }
    
    .form-row-modern {
        flex-direction: column;
        gap: 10px;
    }
    
    .student-details-grid {
        grid-template-columns: 1fr;
    }
    
    .action-buttons {
        flex-direction: column;
    }
}
</style>

<div class="student-profile-container">
    <!-- Student Profile Header -->
    <div class="student-profile-header">
        <img src="<?php echo htmlspecialchars(web_root . 'student/' . v($res,'STUDPHOTO')); ?>" 
             alt="Student Photo" class="student-avatar"
             onerror="this.src='<?php echo web_root; ?>img/default-avatar.jpg'">
        <div class="student-info">
            <h1 class="student-name">
                <?php echo htmlspecialchars(trim(v($res,'LNAME') . ', ' . v($res,'FNAME') . ' ' . v($res,'MNAME'))); ?>
            </h1>
            <p class="student-id">ID: <?php echo htmlspecialchars($res->IDNO ?? ''); ?></p>
            <div class="student-badges">
                <span class="badge badge-primary">Status: <?php echo htmlspecialchars(v($res,'student_status') ?: 'N/A'); ?></span>
                <span class="badge badge-secondary">SY: <?php echo htmlspecialchars($sy); ?></span>
                <span class="badge badge-secondary">Level: <?php echo htmlspecialchars(v($res,'YEARLEVEL') ?: ($resCourse->COURSE_LEVEL ?? '')); ?></span>
            </div>
        </div>
    </div>

    <!-- Quick Details Grid -->
    <div class="student-details-grid">
        <div class="detail-card">
            <h5><i class="fa fa-graduation-cap"></i> Academic Information</h5>
            <div class="detail-item">
                <span class="detail-label">Course:</span>
                <span class="detail-value"><?php echo htmlspecialchars($resCourse->COURSE_NAME ?? 'N/A'); ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Major:</span>
                <span class="detail-value"><?php echo htmlspecialchars($resCourse->COURSE_MAJOR ?? 'N/A'); ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Year Level:</span>
                <span class="detail-value"><?php echo htmlspecialchars(v($res,'YEARLEVEL') ?: ($resCourse->COURSE_LEVEL ?? '')); ?></span>
            </div>
        </div>

        <div class="detail-card">
            <h5><i class="fa fa-phone"></i> Contact Information</h5>
            <div class="detail-item">
                <span class="detail-label">Phone:</span>
                <span class="detail-value"><?php echo htmlspecialchars(v($res,'CONTACT_NO') ?: '-'); ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Email:</span>
                <span class="detail-value"><?php echo htmlspecialchars(v($res,'EMAIL') ?: (v($resdetails,'EMAIL') ?: '-')); ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Address:</span>
                <span class="detail-value"><?php echo htmlspecialchars(substr(v($res,'HOME_ADD'), 0, 30) . '...' ?: '-'); ?></span>
            </div>
        </div>

        <div class="detail-card">
            <h5><i class="fa fa-info-circle"></i> Personal Details</h5>
            <div class="detail-item">
                <span class="detail-label">Gender:</span>
                <span class="detail-value"><?php echo htmlspecialchars(v($res,'SEX') ?: '-'); ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Nationality:</span>
                <span class="detail-value"><?php echo htmlspecialchars(v($res,'NATIONALITY') ?: '-'); ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Last School:</span>
                <span class="detail-value"><?php echo htmlspecialchars(v($resdetails,'LAST_SCHOOL') ?: '-'); ?></span>
            </div>
        </div>
    </div>

    <form action="controller.php?action=edit" method="post" class="form-horizontal" novalidate>
        <input type="hidden" name="IDNO" value="<?php echo htmlspecialchars(v($res,'IDNO')); ?>">

        <!-- Student Information Section -->
        <div class="form-section">
            <h4><i class="fa fa-user"></i> Student Information</h4>
            
            <div class="form-row-modern">
                <div class="form-group-modern">
                    <label class="form-label">First Name</label>
                    <input class="form-control-modern" id="FNAME" name="FNAME" type="text" 
                           value="<?php echo htmlspecialchars(v($res,'FNAME')); ?>" required>
                </div>
                
                <div class="form-group-modern">
                    <label class="form-label">Last Name</label>
                    <input class="form-control-modern" id="LNAME" name="LNAME" type="text" 
                           value="<?php echo htmlspecialchars(v($res,'LNAME')); ?>" required>
                </div>
            </div>

            <div class="form-row-modern">
                <div class="form-group-modern">
                    <label class="form-label">Middle Initial</label>
                    <input class="form-control-modern" id="MI" name="MI" maxlength="1" type="text" 
                           value="<?php echo htmlspecialchars(v($res,'MNAME')); ?>">
                </div>
                
                <div class="form-group-modern">
                    <label class="form-label">Maiden Name</label>
                    <input class="form-control-modern" id="MAIDEN_NAME" name="MAIDEN_NAME" type="text" 
                           value="<?php echo htmlspecialchars(v($res,'MAIDEN_NAME') ?: v($resdetails,'MAIDEN_NAME')); ?>">
                </div>
            </div>

            <div class="form-row-modern">
                <div class="form-group-modern">
                    <label class="form-label">Sex</label>
                    <div class="radio-group">
                        <?php $sex = v($res,'SEX'); ?>
                        <label class="radio-label">
                            <input name="optionsRadios" type="radio" value="Female" <?php echo ($sex === 'Female' ? 'checked' : ''); ?>>
                            Female
                        </label>
                        <label class="radio-label">
                            <input name="optionsRadios" type="radio" value="Male" <?php echo ($sex === 'Male' ? 'checked' : ''); ?>>
                            Male
                        </label>
                    </div>
                </div>
                
                <div class="form-group-modern">
                    <label class="form-label">Date of Birth</label>
                    <input name="BIRTHDATE" id="BIRTHDATE" type="text" class="form-control-modern" 
                           data-inputmask="'alias':'mm/dd/yyyy'" data-mask 
                           value="<?php echo !empty(v($res,'BDAY')) ? htmlspecialchars(date_format(date_create(v($res,'BDAY')),'m/d/Y')) : ''; ?>">
                </div>
            </div>

            <div class="form-row-modern">
                <div class="form-group-modern">
                    <label class="form-label">Ethnicity</label>
                    <input class="form-control-modern" id="ETHNICITY" name="ETHNICITY" type="text"
                           value="<?php echo htmlspecialchars(v($res,'ETHNICITY')); ?>">
                </div>
            </div>
        </div>

        <!-- Contact & Background Section -->
        <div class="form-section">
            <h4><i class="fa fa-address-book"></i> Contact & Background</h4>
            
            <div class="form-row-modern">
                <div class="form-group-modern">
                    <label class="form-label">Permanent / Home Address</label>
                    <input class="form-control-modern" id="HOME_ADD" name="HOME_ADD" type="text" 
                           value="<?php echo htmlspecialchars(v($res,'HOME_ADD')); ?>">
                </div>
            </div>

            <div class="form-row-modern">
                <div class="form-group-modern">
                    <label class="form-label">Address while studying</label>
                    <input class="form-control-modern" id="ADDR_WHILE_STUDY" name="ADDR_WHILE_STUDY" type="text" 
                           value="<?php echo htmlspecialchars(v($resdetails,'ADDR_WHILE_STUDY') ?: v($res,'ADDR_WHILE_STUDY')); ?>">
                </div>
            </div>

            <div class="form-row-modern">
                <div class="form-group-modern">
                    <label class="form-label">Last School Attended</label>
                    <input class="form-control-modern" id="LAST_SCHOOL" name="LAST_SCHOOL" type="text" 
                           value="<?php echo htmlspecialchars(v($resdetails,'LAST_SCHOOL')); ?>">
                </div>
                
                <div class="form-group-modern">
                    <label class="form-label">Contact No.</label>
                    <input class="form-control-modern" id="CONTACT" name="CONTACT" type="text" 
                           value="<?php echo htmlspecialchars(v($res,'CONTACT_NO')); ?>">
                </div>
            </div>

            <div class="form-row-modern">
                <div class="form-group-modern">
                    <label class="form-label">E-mail</label>
                    <input class="form-control-modern" id="EMAIL" name="EMAIL" type="email" 
                           value="<?php echo htmlspecialchars(v($res,'EMAIL') ?: v($resdetails,'EMAIL')); ?>">
                </div>
            </div>
        </div>

        <!-- Family & Emergency Section -->
        <div class="form-section">
            <h4 class="collapsible" data-toggle="collapse" data-target="#familySection" aria-expanded="true" aria-controls="familySection">
                <span><i class="fa fa-users"></i> Family & Emergency Contact</span>
                <i class="fa fa-chevron-up"></i>
            </h4>
            
            <div id="familySection" class="collapse in">
            <div class="form-row-modern">
                <div class="form-group-modern">
                    <label class="form-label">Father's Name</label>
                    <input class="form-control-modern" id="FATHER_NAME" name="FATHER_NAME" type="text" 
                           value="<?php echo htmlspecialchars(v($resdetails,'FATHER_NAME')); ?>">
                </div>
                
                <div class="form-group-modern">
                    <label class="form-label">Father's Contact</label>
                    <input class="form-control-modern" id="FATHER_CONTACT" name="FATHER_CONTACT" type="text" 
                           value="<?php echo htmlspecialchars(v($resdetails,'FATHER_CONTACT')); ?>">
                </div>
            </div>

            <div class="form-row-modern">
                <div class="form-group-modern">
                    <label class="form-label">Mother's Name</label>
                    <input class="form-control-modern" id="MOTHER_NAME" name="MOTHER_NAME" type="text" 
                           value="<?php echo htmlspecialchars(v($resdetails,'MOTHER_NAME')); ?>">
                </div>
                
                <div class="form-group-modern">
                    <label class="form-label">Mother's Contact</label>
                    <input class="form-control-modern" id="MOTHER_CONTACT" name="MOTHER_CONTACT" type="text" 
                           value="<?php echo htmlspecialchars(v($resdetails,'MOTHER_CONTACT')); ?>">
                </div>
            </div>

            <div class="form-row-modern">
                <div class="form-group-modern">
                    <label class="form-label">Emergency Contact Person</label>
                    <input class="form-control-modern" id="EMER_NAME" name="EMER_NAME" type="text" 
                           value="<?php echo htmlspecialchars(v($resdetails,'EMER_NAME')); ?>">
                </div>
                
                <div class="form-group-modern">
                    <label class="form-label">Relationship</label>
                    <input class="form-control-modern" id="EMER_REL" name="EMER_REL" type="text" 
                           value="<?php echo htmlspecialchars(v($resdetails,'EMER_REL')); ?>">
                </div>
            </div>

            <div class="form-row-modern">
                <div class="form-group-modern">
                    <label class="form-label">Emergency Contact No.</label>
                    <input class="form-control-modern" id="EMER_CONTACT" name="EMER_CONTACT" type="text" 
                           value="<?php echo htmlspecialchars(v($resdetails,'EMER_CONTACT')); ?>">
                </div>
            </div>
            </div>
        </div>

        <!-- Academic Section -->
        <div class="form-section">
            <h4 class="collapsible" data-toggle="collapse" data-target="#academicSection" aria-expanded="true" aria-controls="academicSection">
                <span><i class="fa fa-graduation-cap"></i> Academic Information</span>
                <i class="fa fa-chevron-up"></i>
            </h4>
            
            <div id="academicSection" class="collapse in">
            <div class="form-row-modern">
                <div class="form-group-modern">
                    <label class="form-label">Course (current)</label>
                    <input class="form-control-modern" readonly type="text" 
                           value="<?php echo htmlspecialchars(($resCourse->COURSE_NAME ?? '') . ' - Level ' . ($res->YEARLEVEL ?? ($resCourse->COURSE_LEVEL ?? ''))); ?>">
                </div>
                
                <div class="form-group-modern">
                    <label class="form-label">Major</label>
                    <select name="COURSE_MAJOR" id="COURSE_MAJOR" class="form-control-modern">
                        <option value="">(No major)</option>
                        <?php foreach ($majors as $m):
                          $mid = htmlspecialchars($m->COURSE_ID);
                          $mval = htmlspecialchars($m->COURSE_MAJOR);
                          $sel = ($mval === $currentMajor) ? ' selected' : '';
                          echo "<option value=\"{$mid}\"{$sel}>{$mval}</option>";
                        endforeach; ?>
                    </select>
                </div>
            </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <button class="btn-modern btn-primary-modern" name="save" type="submit">
                <i class="fa fa-save"></i> Save Changes
            </button>
            <a class="btn-modern btn-outline-modern" href="index.php?view=students">
                <i class="fa fa-arrow-left"></i> Back to List
            </a>
        </div>
    </form>

    <!-- Enrolled Subjects Section -->
    <div class="form-section">
        <h4>
            <i class="fa fa-book"></i> Enrolled Subjects 
            <span style="float:right; color:#6c757d; font-weight:600; font-size:14px;">
                SY: <?php echo htmlspecialchars($sy ?? 'All'); ?>
            </span>
        </h4>

        <?php
        // -------- enrolled subjects rendering (unchanged logic) --------
        $candidates = [];
        $canonical = trim((string) v($res, 'IDNO'));
        if ($canonical !== '') $candidates[] = $canonical;
        if (ctype_digit($canonical)) {
            $num = intval($canonical);
            $candidates[] = (string) $num;
            $candidates[] = str_pad($num, 7, '0', STR_PAD_LEFT);
            $candidates[] = str_pad($num, 8, '0', STR_PAD_LEFT);
        }
        $candidates[] = strtoupper($canonical);
        $candidates[] = strtolower($canonical);
        $candidates = array_values(array_unique(array_filter($candidates, function($v){ return $v !== ''; })));

        $enrolled = [];
        if (class_exists('StudentSubjects')) {
            $ss = new StudentSubjects();
            $found = $ss->get_enrolled_by_student($candidates[0] ?? $canonical, $sy, $_GET['sem'] ?? null);
            if (!empty($found)) {
                $enrolled = $found;
            } else {
                $enrolled = $ss->get_enrolled_by_student($canonical, $sy, $_GET['sem'] ?? null);
            }
        }

        if (empty($enrolled)) {
            if (!empty($candidates) && isset($mydb) && isset($mydb->conn)) {
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

                $result = mysqli_query($mydb->conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $enrolled[] = $row;
                    }
                    mysqli_free_result($result);
                } else {
                    error_log("admin/view.php: enrolled subjects SQL failed: " . mysqli_error($mydb->conn));
                }
            }
        }

        $total_units = 0.0;
        foreach ($enrolled as $r) {
            $unit = is_array($r) ? ($r['UNIT'] ?? 0) : ($r->UNIT ?? 0);
            $total_units += floatval($unit);
        }
        ?>

        <?php if (empty($enrolled)): ?>
            <div class="no-data">
                <i class="fa fa-book"></i>
                <h4>No Enrolled Subjects</h4>
                <p>No enrolled subjects found for this student in the selected term.</p>
                <small style="color: #6c757d;">Candidate IDs tried: <?php echo htmlspecialchars(implode(', ', $candidates)); ?></small>
            </div>
        <?php else: ?>
            <div style="overflow: auto;">
                <table class="table-modern">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Description</th>
                            <th style="width: 110px;">Units</th>
                            <th style="width: 110px;">Grade</th>
                            <th style="width: 130px;">Outcome</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($enrolled as $sub):
                          $code = is_array($sub) ? ($sub['SUBJ_CODE'] ?? '') : ($sub->SUBJ_CODE ?? '');
                          $desc = is_array($sub) ? ($sub['SUBJ_DESCRIPTION'] ?? '') : ($sub->SUBJ_DESCRIPTION ?? '');
                          $unit = is_array($sub) ? ($sub['UNIT'] ?? '') : ($sub->UNIT ?? '');
                          $avg  = is_array($sub) ? ($sub['AVERAGE'] ?? $sub['AVE'] ?? '') : ($sub->AVERAGE ?? $sub->AVE ?? '');
                          $out  = is_array($sub) ? ($sub['OUTCOME'] ?? '') : ($sub->OUTCOME ?? '');
                    ?>
                        <tr>
                            <td><strong><?php echo htmlspecialchars($code); ?></strong></td>
                            <td><?php echo htmlspecialchars($desc); ?></td>
                            <td style="text-align: center;"><?php echo htmlspecialchars($unit); ?></td>
                            <td style="text-align: center;">
                                <span class="badge <?php echo (floatval($avg) >= 75 ? 'badge-primary' : 'badge-secondary'); ?>">
                                    <?php echo htmlspecialchars($avg); ?>
                                </span>
                            </td>
                            <td style="text-align: center;">
                                <span class="badge <?php echo ($out === 'Passed' ? 'badge-primary' : 'badge-secondary'); ?>">
                                    <?php echo htmlspecialchars($out); ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"><strong>Total Units</strong></td>
                            <td style="text-align: center;"><strong><?php echo number_format($total_units, 1); ?></strong></td>
                            <td colspan="2"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<script type="text/javascript">
// Collapsible section toggle functionality - use jQuery for Bootstrap 3 compatibility
jQuery(document).ready(function($) {
    // Handle Family & Emergency Contact section
    $('#familySection').on('shown.bs.collapse', function() {
        $('[data-target="#familySection"] .fa-chevron-down')
            .removeClass('fa-chevron-down')
            .addClass('fa-chevron-up');
    }).on('hidden.bs.collapse', function() {
        $('[data-target="#familySection"] .fa-chevron-up')
            .removeClass('fa-chevron-up')
            .addClass('fa-chevron-down');
    });
    
    // Handle Academic Information section
    $('#academicSection').on('shown.bs.collapse', function() {
        $('[data-target="#academicSection"] .fa-chevron-down')
            .removeClass('fa-chevron-down')
            .addClass('fa-chevron-up');
    }).on('hidden.bs.collapse', function() {
        $('[data-target="#academicSection"] .fa-chevron-up')
            .removeClass('fa-chevron-up')
            .addClass('fa-chevron-down');
    });
    
    // Debug: Log when collapse is clicked
    $('[data-toggle="collapse"]').on('click', function() {
        console.log('Collapse clicked:', $(this).data('target'));
    });
});
</script>
