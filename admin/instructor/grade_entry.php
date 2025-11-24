<?php
require_once("../../include/initialize.php");

// Check if user is logged in as Instructor
if (!isset($_SESSION['ACCOUNT_ID']) || $_SESSION['ACCOUNT_TYPE'] != 'Instructor') {
    redirect(web_root . "admin/index.php");
}

// Get instructor ID from tblinstructor using ACCOUNT_ID
$instructorId = null;
$mydb->setQuery("SELECT INST_ID FROM tblinstructor WHERE ACCOUNT_ID = " . (int)$_SESSION['ACCOUNT_ID'] . " LIMIT 1");
$result = $mydb->loadSingleResult();
if ($result && !empty($result->INST_ID)) {
    $instructorId = (int)$result->INST_ID;
}

if (!$instructorId) {
    die("Instructor record not found. Please contact the administrator.");
}

// Get current semester from tblsemester (SETSEM = 1)
$semModel = new Semester();
$activeSemester = $semModel->single_semester();
$currentSem = $activeSemester ? $activeSemester->SEMESTER : 'First';

// Derive current school year (e.g. 2025-2026) similar to enrollment controller
$currentYear = (int)date('Y');
$nextYear    = $currentYear + 1;
$currentSY   = $currentYear . '-' . $nextYear;

// Get instructor's subjects for the active semester/SY
$mydb->setQuery("
    SELECT DISTINCT
        subj.SUBJ_ID,
        subj.SUBJ_DESCRIPTION AS SUBJECT,
        subj.SUBJ_CODE,
        sch.SECTION
    FROM tblschedule sch
    INNER JOIN subject subj ON sch.SUBJ_ID = subj.SUBJ_ID
    WHERE sch.INST_ID = {$instructorId}
      AND sch.sched_semester = '{$currentSem}'
      AND sch.sched_sy = '{$currentSY}'
    ORDER BY subj.SUBJ_CODE, sch.SECTION
");
$subjects = $mydb->loadResultList();

// Handle subject/section filter
$selectedSubjId = isset($_GET['subj_id']) ? intval($_GET['subj_id']) : null;
$selectedSection = isset($_GET['section']) ? $_GET['section'] : null;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    
    if ($action == 'save_draft' || $action == 'submit_approval') {
        $status = ($action == 'submit_approval') ? 'Pending Approval' : 'Draft';
        $submittedBy = ($action == 'submit_approval') ? $_SESSION['ACCOUNT_ID'] : null;
        
        foreach ($_POST['students'] as $idno => $grades) {
            $idno = intval($idno);
            $subjId = intval($_POST['subj_id']);
            $prelim = !empty($grades['prelim']) ? floatval($grades['prelim']) : null;
            $midterm = !empty($grades['midterm']) ? floatval($grades['midterm']) : null;
            $prefinal = !empty($grades['prefinal']) ? floatval($grades['prefinal']) : null;
            $final = !empty($grades['final']) ? floatval($grades['final']) : null;
            $remarks = !empty($grades['remarks']) ? $grades['remarks'] : null;
            
            // Check if grade record exists
            $mydb->setQuery("
                SELECT GRADE_ID FROM tblgrades 
                WHERE IDNO = {$idno} 
                AND SUBJ_ID = {$subjId}
                AND INST_ID = {$instructorId}
                AND SEMESTER = '{$currentSem}'
                AND SCHOOLYEAR = '{$currentSY}'
            ");
            $existing = $mydb->loadSingleResult();
            
            if ($existing) {
                // Update existing
                $mydb->setQuery("
                    UPDATE tblgrades SET
                        PRELIM = " . ($prelim !== null ? $prelim : "NULL") . ",
                        MIDTERM = " . ($midterm !== null ? $midterm : "NULL") . ",
                        PREFINAL = " . ($prefinal !== null ? $prefinal : "NULL") . ",
                        FINAL = " . ($final !== null ? $final : "NULL") . ",
                        REMARKS = " . ($remarks ? "'{$remarks}'" : "NULL") . ",
                        STATUS = '{$status}',
                        SUBMITTED_BY = " . ($submittedBy ? $submittedBy : "NULL") . ",
                        MODIFIED_DATE = NOW()
                    WHERE GRADE_ID = {$existing->GRADE_ID}
                ");
                $mydb->executeQuery();
            } else {
                // Insert new
                $mydb->setQuery("
                    INSERT INTO tblgrades (
                        IDNO, SUBJ_ID, INST_ID, SEMESTER, SCHOOLYEAR,
                        PRELIM, MIDTERM, PREFINAL, FINAL, REMARKS,
                        STATUS, SUBMITTED_BY, SUBMITTED_DATE
                    ) VALUES (
                        {$idno}, {$subjId}, {$instructorId}, '{$currentSem}', '{$currentSY}',
                        " . ($prelim !== null ? $prelim : "NULL") . ",
                        " . ($midterm !== null ? $midterm : "NULL") . ",
                        " . ($prefinal !== null ? $prefinal : "NULL") . ",
                        " . ($final !== null ? $final : "NULL") . ",
                        " . ($remarks ? "'{$remarks}'" : "NULL") . ",
                        '{$status}',
                        " . ($submittedBy ? $submittedBy : "NULL") . ",
                        NOW()
                    )
                ");
                $mydb->executeQuery();
            }
        }
        
        $message = ($action == 'submit_approval') 
            ? "Grades submitted for approval successfully!" 
            : "Grades saved as draft successfully!";
        message($message, "success");
        redirect("grade_entry.php?subj_id={$_POST['subj_id']}&section={$_POST['section']}");
    }
}

// Get students if subject and section selected
$students = [];
if ($selectedSubjId && $selectedSection) {
    // Only consider enrollments for the current semester/SY
    $mydb->setQuery("
        SELECT DISTINCT
            st.IDNO,
            st.LNAME,
            st.FNAME,
            st.MNAME,
            st.STUDPHOTO AS PHOTO,
            g.GRADE_ID,
            g.PRELIM,
            g.MIDTERM,
            g.PREFINAL,
            g.FINAL,
            g.AVE,
            g.REMARKS,
            g.STATUS
        FROM tblstudent st
        INNER JOIN studentsubjects ss 
            ON st.IDNO = ss.IDNO
           AND ss.SUBJ_ID = {$selectedSubjId}
           AND ss.SEMESTER = '{$currentSem}'
           AND ss.SY = '{$currentSY}'
        INNER JOIN tblschedule sch 
            ON ss.SUBJ_ID = sch.SUBJ_ID 
           AND sch.SECTION = '{$selectedSection}'
           AND sch.INST_ID = {$instructorId}
           AND sch.sched_semester = '{$currentSem}'
           AND sch.sched_sy = '{$currentSY}'
        LEFT JOIN tblgrades g ON st.IDNO = g.IDNO 
            AND g.SUBJ_ID = {$selectedSubjId}
            AND g.INST_ID = {$instructorId}
            AND g.SEMESTER = '{$currentSem}'
            AND g.SCHOOLYEAR = '{$currentSY}'
        ORDER BY st.LNAME, st.FNAME
    ");
    $students = $mydb->loadResultList();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Entry - Instructor Portal</title>
    <link rel="stylesheet" href="<?php echo web_root; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo web_root; ?>fonts/font-awesome/css/font-awesome.min.css">
    <style>
        body { background: #f5f5f5; padding-top: 20px; }
        .container { max-width: 1400px; }
        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .filter-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 25px;
        }
        .grade-table {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .grade-table table {
            margin-bottom: 0;
        }
        .grade-table th {
            background: #667eea;
            color: white;
            font-weight: 600;
            border: none;
            padding: 15px 10px;
            font-size: 13px;
        }
        .grade-table td {
            padding: 12px 10px;
            vertical-align: middle;
        }
        .grade-input {
            width: 70px;
            padding: 5px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .grade-input:focus {
            border-color: #667eea;
            outline: none;
            box-shadow: 0 0 0 2px rgba(102, 126, 234, 0.2);
        }
        .remarks-select {
            width: 100%;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
        }
        .status-draft { background: #e0e0e0; color: #666; }
        .status-pending { background: #fff3cd; color: #856404; }
        .status-approved { background: #d1ecf1; color: #0c5460; }
        .status-rejected { background: #f8d7da; color: #721c24; }
        .status-published { background: #d4edda; color: #155724; }
        .action-buttons {
            margin-top: 25px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
            text-align: right;
        }
        .btn-save-draft {
            background: #6c757d;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
            margin-right: 10px;
        }
        .btn-submit {
            background: #667eea;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
        }
        .btn-save-draft:hover { background: #5a6268; }
        .btn-submit:hover { background: #5568d3; }
        .student-photo {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        .alert { border-radius: 8px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h2><i class="fa fa-edit"></i> Grade Entry</h2>
            <p style="margin: 10px 0 0 0; opacity: 0.9;">
                Enter and submit student grades | <strong>Semester:</strong> <?php echo $currentSem; ?> | 
                <strong>S.Y.:</strong> <?php echo $currentSY; ?>
            </p>
        </div>

        <div style="margin-bottom: 20px;">
            <a href="<?php echo web_root; ?>admin/home.php" class="btn btn-default">
                <i class="fa fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>

        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?php echo $_SESSION['message_type']; ?>">
                <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']);
                unset($_SESSION['message_type']);
                ?>
            </div>
        <?php endif; ?>

        <!-- Filter Section -->
        <div class="filter-card">
            <h4 style="margin-top: 0;"><i class="fa fa-filter"></i> Select Class</h4>
            <form method="GET" action="">
                <div class="row">
                    <div class="col-md-5">
                        <label>Subject:</label>
                        <select name="subj_id" class="form-control" required>
                            <option value="">-- Select Subject --</option>
                            <?php 
                            $prevSubj = null;
                            foreach ($subjects as $subj): 
                                if ($prevSubj != $subj->SUBJ_ID) {
                                    echo "<option value='{$subj->SUBJ_ID}' " . ($selectedSubjId == $subj->SUBJ_ID ? 'selected' : '') . ">
                                            {$subj->SUBJ_CODE} - {$subj->SUBJECT}
                                          </option>";
                                    $prevSubj = $subj->SUBJ_ID;
                                }
                            endforeach; 
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Section:</label>
                        <select name="section" class="form-control" required>
                            <option value="">-- Select Section --</option>
                            <?php foreach ($subjects as $subj): ?>
                                <option value="<?php echo $subj->SECTION; ?>" <?php echo ($selectedSection == $subj->SECTION) ? 'selected' : ''; ?>>
                                    <?php echo $subj->SECTION; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>&nbsp;</label>
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fa fa-search"></i> Load Students
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Grade Entry Table -->
        <?php if (!empty($students)): ?>
            <form method="POST" action="" id="gradeForm">
                <input type="hidden" name="subj_id" value="<?php echo $selectedSubjId; ?>">
                <input type="hidden" name="section" value="<?php echo $selectedSection; ?>">
                
                <div class="grade-table">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Student ID</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Prelim</th>
                                <th>Midterm</th>
                                <th>Pre-Final</th>
                                <th>Final</th>
                                <th>Average</th>
                                <th>Remarks</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($students as $student): 
                                $isLocked = in_array($student->STATUS, ['Pending Approval', 'Approved', 'Published']);
                                $photoPath = !empty($student->PHOTO) ? web_root . 'student/student_image/' . $student->PHOTO : web_root . 'img/default-avatar.png';
                            ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo $photoPath; ?>" class="student-photo" alt="Photo">
                                    </td>
                                    <td><?php echo $student->IDNO; ?></td>
                                    <td><?php echo $student->LNAME; ?></td>
                                    <td><?php echo $student->FNAME; ?></td>
                                    <td>
                                        <input type="number" 
                                               name="students[<?php echo $student->IDNO; ?>][prelim]" 
                                               class="grade-input" 
                                               min="0" max="100" step="0.01"
                                               value="<?php echo $student->PRELIM; ?>"
                                               <?php echo $isLocked ? 'readonly' : ''; ?>>
                                    </td>
                                    <td>
                                        <input type="number" 
                                               name="students[<?php echo $student->IDNO; ?>][midterm]" 
                                               class="grade-input" 
                                               min="0" max="100" step="0.01"
                                               value="<?php echo $student->MIDTERM; ?>"
                                               <?php echo $isLocked ? 'readonly' : ''; ?>>
                                    </td>
                                    <td>
                                        <input type="number" 
                                               name="students[<?php echo $student->IDNO; ?>][prefinal]" 
                                               class="grade-input" 
                                               min="0" max="100" step="0.01"
                                               value="<?php echo $student->PREFINAL; ?>"
                                               <?php echo $isLocked ? 'readonly' : ''; ?>>
                                    </td>
                                    <td>
                                        <input type="number" 
                                               name="students[<?php echo $student->IDNO; ?>][final]" 
                                               class="grade-input" 
                                               min="0" max="100" step="0.01"
                                               value="<?php echo $student->FINAL; ?>"
                                               <?php echo $isLocked ? 'readonly' : ''; ?>>
                                    </td>
                                    <td><strong><?php echo number_format($student->AVE ?? 0, 2); ?></strong></td>
                                    <td>
                                        <select name="students[<?php echo $student->IDNO; ?>][remarks]" 
                                                class="remarks-select"
                                                <?php echo $isLocked ? 'disabled' : ''; ?>>
                                            <option value="">--</option>
                                            <option value="Passed" <?php echo ($student->REMARKS == 'Passed') ? 'selected' : ''; ?>>Passed</option>
                                            <option value="Failed" <?php echo ($student->REMARKS == 'Failed') ? 'selected' : ''; ?>>Failed</option>
                                            <option value="INC" <?php echo ($student->REMARKS == 'INC') ? 'selected' : ''; ?>>INC</option>
                                            <option value="DRP" <?php echo ($student->REMARKS == 'DRP') ? 'selected' : ''; ?>>DRP</option>
                                            <option value="IP" <?php echo ($student->REMARKS == 'IP') ? 'selected' : ''; ?>>IP</option>
                                        </select>
                                    </td>
                                    <td>
                                        <?php if ($student->STATUS): ?>
                                            <span class="status-badge status-<?php echo strtolower(str_replace(' ', '-', $student->STATUS)); ?>">
                                                <?php echo $student->STATUS; ?>
                                            </span>
                                        <?php else: ?>
                                            <span class="status-badge status-draft">Not Entered</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <?php 
                // Check if any grades are already submitted
                $anySubmitted = false;
                foreach ($students as $student) {
                    if (in_array($student->STATUS, ['Pending Approval', 'Approved', 'Published'])) {
                        $anySubmitted = true;
                        break;
                    }
                }
                ?>

                <?php if (!$anySubmitted): ?>
                    <div class="action-buttons">
                        <button type="submit" name="action" value="save_draft" class="btn-save-draft">
                            <i class="fa fa-save"></i> Save as Draft
                        </button>
                        <button type="submit" name="action" value="submit_approval" class="btn-submit" 
                                onclick="return confirm('Are you sure you want to submit these grades for approval? You will not be able to edit them after submission.');">
                            <i class="fa fa-paper-plane"></i> Submit for Approval
                        </button>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info" style="margin-top: 20px;">
                        <i class="fa fa-info-circle"></i> <strong>Note:</strong> These grades have already been submitted and cannot be modified. 
                        Contact your department chairperson if changes are needed.
                    </div>
                <?php endif; ?>
            </form>
        <?php elseif ($selectedSubjId && $selectedSection): ?>
            <div class="alert alert-warning">
                <i class="fa fa-exclamation-triangle"></i> No students found for this subject and section.
            </div>
        <?php endif; ?>
    </div>

    <script src="<?php echo web_root; ?>jquery/jquery.min.js"></script>
    <script src="<?php echo web_root; ?>js/bootstrap.min.js"></script>
</body>
</html>
