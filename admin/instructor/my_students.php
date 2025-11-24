<?php
require_once("../../include/initialize.php");

if (!isset($_SESSION['ACCOUNT_ID']) || $_SESSION['ACCOUNT_TYPE'] !== 'Instructor') {
    redirect(web_root."admin/index.php");
}

// Get instructor ID
$instructorId = isset($_SESSION['EMPID']) ? intval($_SESSION['EMPID']) : 0;
$instructorName = isset($_SESSION['ACCOUNT_NAME']) ? $_SESSION['ACCOUNT_NAME'] : 'Instructor';

// Get filter parameters
$filterSubject = isset($_GET['subject']) ? intval($_GET['subject']) : 0;
$filterSection = isset($_GET['section']) ? trim($_GET['section']) : '';

// Get instructor's subjects for filter dropdown
$subjects = [];
if ($instructorId > 0) {
    $mydb->setQuery("
        SELECT DISTINCT s.SUBJ_ID, s.SUBJ_CODE, s.SUBJ_DESCRIPTION
        FROM tblschedule sc
        JOIN subject s ON sc.SUBJ_ID = s.SUBJ_ID
        WHERE sc.INST_ID = {$instructorId}
        ORDER BY s.SUBJ_CODE
    ");
    $subjects = $mydb->loadResultList();
}

// Build student query
$whereClauses = ["sc.INST_ID = {$instructorId}"];
if ($filterSubject > 0) {
    $whereClauses[] = "sc.SUBJ_ID = " . intval($filterSubject);
}
if ($filterSection !== '') {
    $whereClauses[] = "sc.SECTION = '" . addslashes($filterSection) . "'";
}

$students = [];
$studentCount = 0;

if ($instructorId > 0) {
    $sql = "
        SELECT DISTINCT
            st.IDNO,
            st.FNAME,
            st.MNAME,
            st.LNAME,
            st.SEX,
            st.HOME_ADD,
            st.CONTACT_NO,
            st.student_status,
            c.COURSE_NAME,
            c.COURSE_LEVEL,
            GROUP_CONCAT(DISTINCT CONCAT(subj.SUBJ_CODE, ' (', sc.SECTION, ')') SEPARATOR ', ') as subjects_enrolled
        FROM tblschedule sc
        JOIN studentsubjects ss ON sc.SUBJ_ID = ss.SUBJ_ID 
            AND ss.SEMESTER = sc.sched_semester
            AND ss.SY = sc.sched_sy
        JOIN tblstudent st ON ss.IDNO = st.IDNO
        JOIN course c ON st.COURSE_ID = c.COURSE_ID
        JOIN subject subj ON sc.SUBJ_ID = subj.SUBJ_ID
        WHERE " . implode(" AND ", $whereClauses) . "
        GROUP BY st.IDNO, st.FNAME, st.MNAME, st.LNAME, st.SEX, st.HOME_ADD, 
                 st.CONTACT_NO, st.student_status, c.COURSE_NAME, c.COURSE_LEVEL
        ORDER BY st.LNAME, st.FNAME
    ";
    
    $mydb->setQuery($sql);
    $students = $mydb->loadResultList();
    $studentCount = is_array($students) ? count($students) : 0;
}

$title = "My Students";
$content = 'my_students_content.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <link href="<?php echo web_root; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo web_root; ?>fonts/font-awesome.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #667eea;
            --primary-dark: #764ba2;
            --success: #27ae60;
            --info: #3498db;
            --dark: #2c3e50;
        }
        
        body {
            background: linear-gradient(135deg, #f0f4f8 0%, #e9f5ec 100%);
            font-family: "Segoe UI", system-ui, sans-serif;
            padding: 20px;
        }
        
        .page-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        }
        
        .page-header h2 {
            margin: 0 0 5px 0;
            font-size: 28px;
            font-weight: 700;
        }
        
        .filter-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        
        .filter-card .form-control {
            border-radius: 8px;
            border: 1px solid #e9ecef;
            padding: 8px 12px;
        }
        
        .table-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        
        .table {
            margin: 0;
        }
        
        .table thead th {
            background: linear-gradient(135deg, var(--dark), #34495e);
            color: white;
            font-weight: 600;
            border: none;
            padding: 15px 10px;
            font-size: 13px;
        }
        
        .table tbody td {
            padding: 12px 10px;
            vertical-align: middle;
            border-bottom: 1px solid #e9ecef;
        }
        
        .table tbody tr:hover {
            background-color: #f8f9fa;
        }
        
        .status-badge {
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
        }
        
        .status-active {
            background: linear-gradient(135deg, #27ae60, #219653);
            color: white;
        }
        
        .status-inactive {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
        }
        
        .btn-filter {
            background: linear-gradient(135deg, var(--success), #219653);
            border: none;
            color: white;
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
        }
        
        .btn-filter:hover {
            background: linear-gradient(135deg, #219653, #1e8449);
            color: white;
        }
        
        .btn-reset {
            background: linear-gradient(135deg, #95a5a6, #7f8c8d);
            border: none;
            color: white;
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
        }
        
        .badge-count {
            background: rgba(255,255,255,0.2);
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 14px;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Header -->
        <div class="page-header">
            <h2>
                <i class="fa fa-users"></i> My Students
                <span class="badge-count"><?php echo $studentCount; ?> Students</span>
            </h2>
            <p style="margin: 0; opacity: 0.9;">Students enrolled in your classes</p>
        </div>
        
        <!-- Filter -->
        <div class="filter-card">
            <form method="GET" action="">
                <div class="row">
                    <div class="col-md-5">
                        <label>Filter by Subject</label>
                        <select name="subject" class="form-control">
                            <option value="0">All Subjects</option>
                            <?php foreach ($subjects as $subj): ?>
                                <option value="<?php echo $subj->SUBJ_ID; ?>" <?php echo ($filterSubject == $subj->SUBJ_ID) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($subj->SUBJ_CODE . ' - ' . $subj->SUBJ_DESCRIPTION); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Filter by Section</label>
                        <input type="text" name="section" class="form-control" placeholder="e.g. 1A" value="<?php echo htmlspecialchars($filterSection); ?>">
                    </div>
                    <div class="col-md-4" style="padding-top: 25px;">
                        <button type="submit" class="btn btn-filter">
                            <i class="fa fa-filter"></i> Apply Filter
                        </button>
                        <a href="my_students.php" class="btn btn-reset">
                            <i class="fa fa-refresh"></i> Reset
                        </a>
                        <a href="<?php echo web_root; ?>admin/index.php" class="btn btn-reset">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Students Table -->
        <div class="table-card">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Course/Year</th>
                            <th>Subjects Enrolled</th>
                            <th>Gender</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($studentCount > 0): ?>
                            <?php foreach ($students as $student): ?>
                                <tr>
                                    <td><strong><?php echo htmlspecialchars($student->IDNO); ?></strong></td>
                                    <td><?php echo htmlspecialchars($student->LNAME . ', ' . $student->FNAME . ' ' . substr($student->MNAME, 0, 1) . '.'); ?></td>
                                    <td><?php echo htmlspecialchars($student->COURSE_NAME . ' - Year ' . $student->COURSE_LEVEL); ?></td>
                                    <td><small><?php echo htmlspecialchars($student->subjects_enrolled); ?></small></td>
                                    <td><?php echo htmlspecialchars($student->SEX); ?></td>
                                    <td><?php echo htmlspecialchars($student->CONTACT_NO); ?></td>
                                    <td><small><?php echo htmlspecialchars($student->HOME_ADD); ?></small></td>
                                    <td>
                                        <span class="status-badge <?php echo ($student->student_status == 'Active') ? 'status-active' : 'status-inactive'; ?>">
                                            <?php echo htmlspecialchars($student->student_status); ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" style="text-align: center; padding: 40px; color: #6c757d;">
                                    <i class="fa fa-inbox" style="font-size: 48px; opacity: 0.3; display: block; margin-bottom: 15px;"></i>
                                    No students found. Try adjusting your filters.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
