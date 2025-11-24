<?php
require_once("../include/initialize.php");

if (!isset($_SESSION['ACCOUNT_ID']) || $_SESSION['ACCOUNT_TYPE'] !== 'Instructor') {
    redirect(web_root . "admin/login.php");
    exit;
}

global $mydb;

// Resolve instructor ID from session or useraccounts.EMPID
$instructorId = 0;
if (!empty($_SESSION['EMPID'])) {
    $instructorId = (int)$_SESSION['EMPID'];
} else {
    $accountId = (int)$_SESSION['ACCOUNT_ID'];
    $mydb->setQuery("SELECT EMPID FROM useraccounts WHERE ACCOUNT_ID = {$accountId} LIMIT 1");
    $acct = $mydb->loadSingleResult();
    if ($acct && !empty($acct->EMPID)) {
        $instructorId = (int)$acct->EMPID;
        $_SESSION['EMPID'] = $instructorId;
    }
}

// Load instructor record for display
$instructor = null;
if ($instructorId > 0) {
    $instModel = new Instructor();
    $instructor = $instModel->single_instructor($instructorId);
}

// Current semester
$semModel   = new Semester();
$activeSem  = $semModel->single_semester();
$currentSem = $activeSem ? $activeSem->SEMESTER : null;

// Current school year (same logic as enrollment controller)
$currentYear = date('Y');
$nextYear    = $currentYear + 1;
$currentSY   = $currentYear . '-' . $nextYear;

// Fetch enrolled students in this instructor's subjects
$students = [];
$studentCount = 0;
$enrollmentCount = 0;

if ($instructorId > 0) {
    $instIdEsc = (int)$instructorId;

    $conditions = "i.INST_ID = {$instIdEsc} AND s.student_status = 'Active'";
    if (!empty($currentSem)) {
        $semEsc = $mydb->escape_value($currentSem);
        $conditions .= " AND ss.SEMESTER = '{$semEsc}' AND sc.sched_semester = '{$semEsc}'";
    }
    if (!empty($currentSY)) {
        $syEsc = $mydb->escape_value($currentSY);
        $conditions .= " AND ss.SY = '{$syEsc}' AND sc.sched_sy = '{$syEsc}'";
    }

    $sql = "
        SELECT 
            s.IDNO,
            s.FNAME,
            s.MNAME,
            s.LNAME,
            s.SEX,
            s.HOME_ADD,
            s.CONTACT_NO,
            s.student_status,
            c.COURSE_NAME,
            c.COURSE_LEVEL,
            sub.SUBJ_CODE,
            sub.SUBJ_DESCRIPTION,
            sc.SECTION,
            sc.sched_time,
            sc.sched_day
        FROM tblinstructor i
        JOIN tblschedule sc 
            ON i.INST_ID = sc.INST_ID
        JOIN studentsubjects ss 
            ON sc.SUBJ_ID = ss.SUBJ_ID 
           AND ss.STUDSECTION = sc.SECTION
        JOIN tblstudent s 
            ON ss.IDNO = s.IDNO
        JOIN course c 
            ON s.COURSE_ID = c.COURSE_ID
        JOIN subject sub 
            ON sc.SUBJ_ID = sub.SUBJ_ID
        WHERE {$conditions}
        ORDER BY sub.SUBJ_CODE, sc.SECTION, s.LNAME, s.FNAME
    ";

    $mydb->setQuery($sql);
    $students = $mydb->loadResultList();

    // Count unique students and total enrollments
    $ids = [];
    foreach ((array)$students as $row) {
        $ids[$row->IDNO] = true;
    }
    $studentCount    = count($ids);
    $enrollmentCount = is_array($students) ? count($students) : 0;
}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Instructor Dashboard</title>
  <link href="<?php echo web_root; ?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo web_root; ?>fonts/font-awesome.min.css" rel="stylesheet">
  <script src="<?php echo web_root; ?>js/jquery.js"></script>
  <style>
    :root {
      --primary: #2c3e50;
      --accent: #27ae60;
      --accent-dark: #219653;
      --muted: #6c757d;
      --light: #f8f9fa;
      --radius: 12px;
      --shadow: 0 4px 12px rgba(0,0,0,0.08);
    }
    body {
      background: linear-gradient(135deg, #f0f4f8 0%, #e9f5ec 100%);
      font-family: "Segoe UI", system-ui, sans-serif;
      padding: 20px;
    }
    .container-dashboard {
      max-width: 1200px;
      margin: 0 auto;
    }
    .card {
      background: #fff;
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      margin-bottom: 20px;
      border: none;
    }
    .card-header {
      padding: 16px 20px;
      background: linear-gradient(135deg, var(--primary), #34495e);
      color: #fff;
      border-radius: var(--radius) var(--radius) 0 0;
    }
    .card-header h3 {
      margin: 0;
      font-size: 20px;
      font-weight: 600;
    }
    .card-body {
      padding: 20px;
    }
    .stats-row {
      display: flex;
      flex-wrap: wrap;
      gap: 16px;
      margin-bottom: 10px;
    }
    .stat-card {
      flex: 1 1 180px;
      background: linear-gradient(135deg, var(--accent), var(--accent-dark));
      color: #fff;
      border-radius: 10px;
      padding: 16px;
      box-shadow: var(--shadow);
    }
    .stat-card h4 {
      margin: 0 0 6px 0;
      font-size: 14px;
      opacity: 0.9;
    }
    .stat-card span {
      font-size: 26px;
      font-weight: 700;
    }
    .table-responsive {
      border-radius: 10px;
      overflow: auto;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 13px;
    }
    thead th {
      background: linear-gradient(135deg, #2c3e50, #34495e);
      color: #fff;
      padding: 10px;
      text-align: center;
      white-space: nowrap;
    }
    tbody td {
      padding: 8px 10px;
      border-bottom: 1px solid #e9ecef;
      vertical-align: middle;
      text-align: center;
    }
    tbody tr:hover {
      background: #f8f9fa;
    }
    .badge-section {
      background: #e9f7ef;
      color: #1e7e34;
      padding: 4px 10px;
      border-radius: 20px;
      font-size: 11px;
    }
    .badge-subject {
      background: #e8f0fe;
      color: #1a73e8;
      padding: 4px 10px;
      border-radius: 20px;
      font-size: 11px;
    }
    .badge-status {
      background: #e8f5e9;
      color: #2e7d32;
      padding: 4px 10px;
      border-radius: 20px;
      font-size: 11px;
      text-transform: uppercase;
    }
    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 16px;
    }
    .top-bar h2 {
      margin: 0;
      font-size: 22px;
      color: var(--primary);
    }
    .top-bar small {
      color: var(--muted);
    }
    .btn-logout {
      background: #e74c3c;
      border: none;
      color: #fff;
      padding: 6px 12px;
      border-radius: 20px;
      font-size: 13px;
      font-weight: 600;
      text-decoration: none;
    }
    .btn-logout:hover {
      background: #c0392b;
      color: #fff;
    }
    .empty-state {
      text-align: center;
      color: var(--muted);
      padding: 40px 10px;
    }
    .empty-state i {
      font-size: 48px;
      margin-bottom: 16px;
      opacity: 0.5;
    }
    @media (max-width: 768px) {
      .top-bar {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
      }
    }
  </style>
</head>
<body>
<div class="container-dashboard">
  <div class="card">
    <div class="card-header">
      <div class="top-bar">
        <div>
          <h2><i class="fa fa-chalkboard-teacher"></i> Instructor Dashboard</h2>
          <small>
            <?php echo $instructor ? htmlspecialchars($instructor->INST_NAME, ENT_QUOTES, 'UTF-8') : 'Unlinked Instructor Account'; ?>
            <?php if (!empty($currentSem)) : ?>
              &nbsp;• Semester: <?php echo htmlspecialchars($currentSem, ENT_QUOTES, 'UTF-8'); ?>
            <?php endif; ?>
            &nbsp;• AY: <?php echo htmlspecialchars($currentSY, ENT_QUOTES, 'UTF-8'); ?>
          </small>
        </div>
        <div>
          <a href="<?php echo web_root; ?>admin/logout.php" class="btn-logout">
            <i class="fa fa-sign-out"></i> Logout
          </a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <?php echo check_message(); ?>

      <?php if ($instructorId <= 0): ?>
        <div class="empty-state">
          <i class="fa fa-user-times"></i>
          <h4>Your account is not linked to any instructor record.</h4>
          <p>Please ask the administrator to link this user to a record in <code>tblinstructor</code>.</p>
        </div>
      <?php elseif (empty($students)): ?>
        <div class="empty-state">
          <i class="fa fa-users"></i>
          <h4>No enrolled students found for your subjects.</h4>
          <p>This may mean there are no active enrollments yet for the current semester and school year.</p>
        </div>
      <?php else: ?>
        <div class="stats-row">
          <div class="stat-card">
            <h4>Total Unique Students</h4>
            <span><?php echo (int)$studentCount; ?></span>
          </div>
          <div class="stat-card">
            <h4>Total Enrollments (Subject Slots)</h4>
            <span><?php echo (int)$enrollmentCount; ?></span>
          </div>
        </div>

        <div class="table-responsive">
          <table>
            <thead>
              <tr>
                <th>Subject</th>
                <th>Section</th>
                <th>Schedule</th>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Course / Year</th>
                <th>Sex</th>
                <th>Contact</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($students as $row): ?>
              <tr>
                <td>
                  <span class="badge-subject">
                    <?php echo htmlspecialchars($row->SUBJ_CODE, ENT_QUOTES, 'UTF-8'); ?>
                  </span><br>
                  <small><?php echo htmlspecialchars($row->SUBJ_DESCRIPTION, ENT_QUOTES, 'UTF-8'); ?></small>
                </td>
                <td>
                  <span class="badge-section">
                    Section <?php echo htmlspecialchars($row->SECTION, ENT_QUOTES, 'UTF-8'); ?>
                  </span>
                </td>
                <td>
                  <small>
                    <?php echo htmlspecialchars($row->sched_day . ' / ' . $row->sched_time, ENT_QUOTES, 'UTF-8'); ?>
                  </small>
                </td>
                <td><?php echo htmlspecialchars($row->IDNO, ENT_QUOTES, 'UTF-8'); ?></td>
                <td>
                  <?php
                    $name = trim(($row->LNAME ?? '') . ', ' . ($row->FNAME ?? '') . ' ' . ($row->MNAME ?? ''));
                    echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
                  ?>
                </td>
                <td>
                  <?php
                    echo htmlspecialchars($row->COURSE_NAME, ENT_QUOTES, 'UTF-8')
                      . ' - ' . htmlspecialchars($row->COURSE_LEVEL, ENT_QUOTES, 'UTF-8');
                  ?>
                </td>
                <td><?php echo htmlspecialchars($row->SEX, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($row->CONTACT_NO, ENT_QUOTES, 'UTF-8'); ?></td>
                <td>
                  <span class="badge-status">
                    <?php echo htmlspecialchars($row->student_status, ENT_QUOTES, 'UTF-8'); ?>
                  </span>
                </td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
</body>
</html>