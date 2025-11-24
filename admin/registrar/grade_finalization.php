<?php
require_once("../../include/initialize.php");

// Check if user is logged in as Registrar
if (!isset($_SESSION['ACCOUNT_ID']) || $_SESSION['ACCOUNT_TYPE'] != 'Registrar') {
    redirect(web_root . "admin/index.php");
}

// Handle finalization/publishing actions
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $gradeIds = isset($_POST['grade_ids']) ? $_POST['grade_ids'] : [];
    
    if (!empty($gradeIds)) {
        $gradeIdList = implode(',', array_map('intval', $gradeIds));
        
        if ($action == 'publish') {
            $mydb->setQuery("
                UPDATE tblgrades 
                SET STATUS = 'Published',
                    FINALIZED_BY = {$_SESSION['ACCOUNT_ID']},
                    FINALIZED_DATE = NOW()
                WHERE GRADE_ID IN ({$gradeIdList})
                AND STATUS = 'Approved'
            ");
            $mydb->executeQuery();
            message("Grades published successfully! Students can now view their grades.", "success");
        }
        redirect("grade_finalization.php");
    }
}

// Get all approved grades pending finalization
$mydb->setQuery("
    SELECT 
        g.GRADE_ID,
        g.IDNO,
        st.LNAME,
        st.FNAME,
        st.MNAME,
        c.COURSE_NAME,
        c.COURSE_DESC,
        d.DEPARTMENT_NAME,
        s.SUBJ_CODE,
        s.SUBJECT,
        sch.SECTION,
        i.INST_NAME,
        g.PRELIM,
        g.MIDTERM,
        g.PREFINAL,
        g.FINAL,
        g.AVE,
        g.REMARKS,
        g.STATUS,
        g.SUBMITTED_DATE,
        g.APPROVED_DATE,
        g.SEMESTER,
        g.SCHOOLYEAR,
        ua.ACCOUNT_NAME as APPROVED_BY_NAME
    FROM tblgrades g
    INNER JOIN tblstudent st ON g.IDNO = st.IDNO
    INNER JOIN tblcourse c ON st.COURSE_ID = c.COURSE_ID
    INNER JOIN tbldepartment d ON c.DEPT_ID = d.DEPT_ID
    INNER JOIN tblsubject s ON g.SUBJ_ID = s.SUBJ_ID
    INNER JOIN tblinstructor i ON g.INST_ID = i.INST_ID
    INNER JOIN tblschedule sch ON g.SUBJ_ID = sch.SUBJ_ID AND g.INST_ID = sch.INST_ID
    LEFT JOIN useraccounts ua ON g.APPROVED_BY = ua.ACCOUNT_ID
    WHERE g.STATUS IN ('Approved', 'Published')
    ORDER BY g.STATUS, g.APPROVED_DATE DESC
");
$grades = $mydb->loadResultList();

// Group by department, course, subject, and section
$groupedGrades = [];
foreach ($grades as $grade) {
    $key = $grade->DEPARTMENT_NAME . '|' . $grade->COURSE_NAME . '|' . $grade->SUBJ_CODE . '|' . $grade->SECTION;
    if (!isset($groupedGrades[$key])) {
        $groupedGrades[$key] = [
            'department' => $grade->DEPARTMENT_NAME,
            'course' => $grade->COURSE_NAME,
            'subject' => $grade->SUBJ_CODE . ' - ' . $grade->SUBJECT,
            'section' => $grade->SECTION,
            'instructor' => $grade->INST_NAME,
            'semester' => $grade->SEMESTER,
            'schoolyear' => $grade->SCHOOLYEAR,
            'status' => $grade->STATUS,
            'approved_date' => $grade->APPROVED_DATE,
            'approved_by' => $grade->APPROVED_BY_NAME,
            'grades' => []
        ];
    }
    $groupedGrades[$key]['grades'][] = $grade;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Finalization - Registrar Portal</title>
    <link rel="stylesheet" href="<?php echo web_root; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo web_root; ?>fonts/font-awesome/css/font-awesome.min.css">
    <style>
        body { background: #f5f5f5; padding-top: 20px; }
        .container { max-width: 1400px; }
        .page-header {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .submission-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .submission-header {
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        .submission-header h4 {
            margin: 0;
            color: #333;
        }
        .submission-meta {
            color: #666;
            font-size: 14px;
            margin-top: 8px;
        }
        .grade-table {
            margin-top: 15px;
            overflow-x: auto;
        }
        .grade-table table {
            font-size: 13px;
        }
        .grade-table th {
            background: #f8f9fa;
            font-weight: 600;
            padding: 12px 8px;
            border-bottom: 2px solid #dee2e6;
        }
        .grade-table td {
            padding: 10px 8px;
            vertical-align: middle;
        }
        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            display: inline-block;
        }
        .status-approved { background: #d1ecf1; color: #0c5460; }
        .status-published { background: #d4edda; color: #155724; }
        .action-section {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid #f0f0f0;
        }
        .btn-publish {
            background: #007bff;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
        }
        .btn-publish:hover { background: #0056b3; color: white; }
        .alert { border-radius: 8px; }
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .empty-state i {
            font-size: 64px;
            color: #ddd;
            margin-bottom: 20px;
        }
        .info-badge {
            background: #e9ecef;
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 12px;
            color: #495057;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h2><i class="fa fa-graduation-cap"></i> Grade Finalization & Publishing</h2>
            <p style="margin: 10px 0 0 0; opacity: 0.9;">
                Review and publish approved grades to the student portal
            </p>
        </div>

        <div style="margin-bottom: 20px;">
            <a href="<?php echo web_root; ?>admin/index.php" class="btn btn-default">
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

        <?php if (empty($groupedGrades)): ?>
            <div class="empty-state">
                <i class="fa fa-check-circle"></i>
                <h3>No Grades to Finalize</h3>
                <p>There are no approved grades pending finalization at this time.</p>
            </div>
        <?php else: ?>
            <?php foreach ($groupedGrades as $key => $group): ?>
                <div class="submission-card">
                    <div class="submission-header">
                        <h4>
                            <i class="fa fa-book"></i> <?php echo $group['subject']; ?>
                            <span class="status-badge status-<?php echo strtolower(str_replace(' ', '-', $group['status'])); ?>">
                                <?php echo $group['status']; ?>
                            </span>
                        </h4>
                        <div class="submission-meta">
                            <strong>Department:</strong> <?php echo $group['department']; ?> | 
                            <strong>Course:</strong> <?php echo $group['course']; ?> | 
                            <strong>Section:</strong> <?php echo $group['section']; ?> | 
                            <strong>Instructor:</strong> <?php echo $group['instructor']; ?><br>
                            <strong>Semester:</strong> <?php echo $group['semester']; ?> | 
                            <strong>S.Y.:</strong> <?php echo $group['schoolyear']; ?> | 
                            <strong>Approved:</strong> <?php echo date('M d, Y h:i A', strtotime($group['approved_date'])); ?>
                            <?php if ($group['approved_by']): ?>
                                <span class="info-badge">by <?php echo $group['approved_by']; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="grade-table">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Prelim</th>
                                    <th>Midterm</th>
                                    <th>Pre-Final</th>
                                    <th>Final</th>
                                    <th>Average</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($group['grades'] as $grade): ?>
                                    <tr>
                                        <td><?php echo $grade->IDNO; ?></td>
                                        <td><?php echo $grade->LNAME; ?></td>
                                        <td><?php echo $grade->FNAME; ?></td>
                                        <td><?php echo $grade->PRELIM ?? '-'; ?></td>
                                        <td><?php echo $grade->MIDTERM ?? '-'; ?></td>
                                        <td><?php echo $grade->PREFINAL ?? '-'; ?></td>
                                        <td><?php echo $grade->FINAL ?? '-'; ?></td>
                                        <td><strong><?php echo number_format($grade->AVE ?? 0, 2); ?></strong></td>
                                        <td><?php echo $grade->REMARKS ?? '-'; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <?php if ($group['status'] == 'Approved'): ?>
                        <div class="action-section">
                            <form method="POST" action="" onsubmit="return confirm('Are you sure you want to publish these grades? Students will be able to view them immediately.');">
                                <?php foreach ($group['grades'] as $grade): ?>
                                    <input type="hidden" name="grade_ids[]" value="<?php echo $grade->GRADE_ID; ?>">
                                <?php endforeach; ?>
                                
                                <button type="submit" name="action" value="publish" class="btn-publish">
                                    <i class="fa fa-globe"></i> Publish to Student Portal
                                </button>
                                <span style="margin-left: 15px; color: #666; font-size: 14px;">
                                    <i class="fa fa-info-circle"></i> <?php echo count($group['grades']); ?> student grade(s) ready to publish
                                </span>
                            </form>
                        </div>
                    <?php elseif ($group['status'] == 'Published'): ?>
                        <div class="alert alert-success" style="margin-top: 20px; margin-bottom: 0;">
                            <i class="fa fa-check-circle"></i> <strong>Published.</strong> These grades are now visible to students.
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <script src="<?php echo web_root; ?>jquery/jquery.min.js"></script>
    <script src="<?php echo web_root; ?>js/bootstrap.min.js"></script>
</body>
</html>
