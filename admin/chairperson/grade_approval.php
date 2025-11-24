<?php
require_once("../../include/initialize.php");
require_once("../../include/department-filter.php");

// Check if user is logged in as Chairperson
if (!isChairperson()) {
    redirect(web_root . "admin/index.php");
}

$chairDeptId = getCurrentDepartmentId();
$chairDeptName = getCurrentDepartmentName();

// Handle approval/rejection actions
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $gradeIds = isset($_POST['grade_ids']) ? $_POST['grade_ids'] : [];
    $remarks = isset($_POST['remarks']) ? trim($_POST['remarks']) : '';
    
    if (!empty($gradeIds)) {
        $gradeIdList = implode(',', array_map('intval', $gradeIds));
        
        if ($action == 'approve') {
            $mydb->setQuery("
                UPDATE tblgrades 
                SET STATUS = 'Approved',
                    APPROVED_BY = {$_SESSION['ACCOUNT_ID']},
                    APPROVED_DATE = NOW(),
                    APPROVAL_REMARKS = " . ($remarks ? "'{$remarks}'" : "NULL") . "
                WHERE GRADE_ID IN ({$gradeIdList})
                AND STATUS = 'Pending Approval'
            ");
            $mydb->executeQuery();
            message("Grades approved successfully!", "success");
        } elseif ($action == 'reject') {
            if (empty($remarks)) {
                message("Please provide a reason for rejection.", "danger");
            } else {
                $mydb->setQuery("
                    UPDATE tblgrades 
                    SET STATUS = 'Rejected',
                        APPROVED_BY = {$_SESSION['ACCOUNT_ID']},
                        APPROVED_DATE = NOW(),
                        APPROVAL_REMARKS = '{$remarks}'
                    WHERE GRADE_ID IN ({$gradeIdList})
                    AND STATUS = 'Pending Approval'
                ");
                $mydb->executeQuery();
                message("Grades rejected. Instructor has been notified.", "success");
            }
        }
        redirect("grade_approval.php");
    }
}

// Get pending grade submissions from department instructors
$mydb->setQuery("
    SELECT 
        g.GRADE_ID,
        g.IDNO,
        st.LNAME,
        st.FNAME,
        st.MNAME,
        s.SUBJ_CODE,
        s.SUBJ_DESCRIPTION AS SUBJECT,
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
        g.SEMESTER,
        g.SCHOOLYEAR
    FROM tblgrades g
    INNER JOIN tblstudent st ON g.IDNO = st.IDNO
    INNER JOIN subject s ON g.SUBJ_ID = s.SUBJ_ID
    INNER JOIN course c ON s.COURSE_ID = c.COURSE_ID
    INNER JOIN tblinstructor i ON g.INST_ID = i.INST_ID
    INNER JOIN tblschedule sch ON g.SUBJ_ID = sch.SUBJ_ID AND g.INST_ID = sch.INST_ID
    WHERE c.DEPT_ID = {$chairDeptId}
    AND g.STATUS IN ('Pending Approval', 'Approved', 'Rejected')
    ORDER BY g.STATUS, g.SUBMITTED_DATE DESC
");
$grades = $mydb->loadResultList();

// Group by instructor and subject
$groupedGrades = [];
foreach ($grades as $grade) {
    $key = $grade->INST_NAME . '|' . $grade->SUBJ_CODE . '|' . $grade->SECTION;
    if (!isset($groupedGrades[$key])) {
        $groupedGrades[$key] = [
            'instructor' => $grade->INST_NAME,
            'subject' => $grade->SUBJ_CODE . ' - ' . $grade->SUBJECT,
            'section' => $grade->SECTION,
            'semester' => $grade->SEMESTER,
            'schoolyear' => $grade->SCHOOLYEAR,
            'status' => $grade->STATUS,
            'submitted_date' => $grade->SUBMITTED_DATE,
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
    <title>Grade Approval - Chairperson Portal</title>
    <link rel="stylesheet" href="<?php echo web_root; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo web_root; ?>fonts/font-awesome/css/font-awesome.min.css">
    <style>
        body { background: #f5f5f5; padding-top: 20px; }
        .container { max-width: 1400px; }
        .page-header {
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
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
        .status-pending-approval { background: #fff3cd; color: #856404; }
        .status-approved { background: #d1ecf1; color: #0c5460; }
        .status-rejected { background: #f8d7da; color: #721c24; }
        .action-section {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid #f0f0f0;
        }
        .btn-approve {
            background: #28a745;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            margin-right: 10px;
        }
        .btn-reject {
            background: #dc3545;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
        }
        .btn-approve:hover { background: #218838; color: white; }
        .btn-reject:hover { background: #c82333; color: white; }
        .remarks-box {
            margin-top: 15px;
            display: none;
        }
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
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h2><i class="fa fa-check-circle"></i> Grade Approval</h2>
            <p style="margin: 10px 0 0 0; opacity: 0.9;">
                Review and approve grade submissions | <strong>Department:</strong> <?php echo $chairDeptName; ?>
            </p>
        </div>

        <div style="margin-bottom: 20px;">
            <a href="<?php echo web_root; ?>admin/chairperson_dashboard.php" class="btn btn-default">
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
                <i class="fa fa-inbox"></i>
                <h3>No Grade Submissions</h3>
                <p>There are no pending grade submissions from your department instructors at this time.</p>
            </div>
        <?php else: ?>
            <?php foreach ($groupedGrades as $key => $group): ?>
                <div class="submission-card">
                    <div class="submission-header">
                        <h4>
                            <i class="fa fa-user"></i> <?php echo $group['instructor']; ?> 
                            <span class="status-badge status-<?php echo strtolower(str_replace(' ', '-', $group['status'])); ?>">
                                <?php echo $group['status']; ?>
                            </span>
                        </h4>
                        <div class="submission-meta">
                            <strong>Subject:</strong> <?php echo $group['subject']; ?> | 
                            <strong>Section:</strong> <?php echo $group['section']; ?> | 
                            <strong>Semester:</strong> <?php echo $group['semester']; ?> | 
                            <strong>S.Y.:</strong> <?php echo $group['schoolyear']; ?> | 
                            <strong>Submitted:</strong> <?php echo date('M d, Y h:i A', strtotime($group['submitted_date'])); ?>
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

                    <?php if ($group['status'] == 'Pending Approval'): ?>
                        <div class="action-section">
                            <form method="POST" action="" id="approvalForm_<?php echo md5($key); ?>">
                                <?php foreach ($group['grades'] as $grade): ?>
                                    <input type="hidden" name="grade_ids[]" value="<?php echo $grade->GRADE_ID; ?>">
                                <?php endforeach; ?>
                                
                                <button type="submit" name="action" value="approve" class="btn-approve">
                                    <i class="fa fa-check"></i> Approve All
                                </button>
                                <button type="button" class="btn-reject" onclick="showRejectBox('<?php echo md5($key); ?>')">
                                    <i class="fa fa-times"></i> Reject All
                                </button>
                                
                                <div class="remarks-box" id="rejectBox_<?php echo md5($key); ?>">
                                    <label><strong>Reason for Rejection:</strong></label>
                                    <textarea name="remarks" class="form-control" rows="3" placeholder="Please provide a detailed reason for rejection..."></textarea>
                                    <div style="margin-top: 10px;">
                                        <button type="submit" name="action" value="reject" class="btn btn-danger">
                                            <i class="fa fa-paper-plane"></i> Submit Rejection
                                        </button>
                                        <button type="button" class="btn btn-default" onclick="hideRejectBox('<?php echo md5($key); ?>')">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php elseif ($group['status'] == 'Approved'): ?>
                        <div class="alert alert-info" style="margin-top: 20px; margin-bottom: 0;">
                            <i class="fa fa-info-circle"></i> These grades have been approved and are awaiting finalization by the Registrar.
                        </div>
                    <?php elseif ($group['status'] == 'Rejected'): ?>
                        <div class="alert alert-danger" style="margin-top: 20px; margin-bottom: 0;">
                            <i class="fa fa-exclamation-circle"></i> <strong>Rejected.</strong> Instructor will need to resubmit.
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <script src="<?php echo web_root; ?>jquery/jquery.min.js"></script>
    <script src="<?php echo web_root; ?>js/bootstrap.min.js"></script>
    <script>
        function showRejectBox(id) {
            document.getElementById('rejectBox_' + id).style.display = 'block';
        }
        
        function hideRejectBox(id) {
            document.getElementById('rejectBox_' + id).style.display = 'none';
        }
    </script>
</body>
</html>
