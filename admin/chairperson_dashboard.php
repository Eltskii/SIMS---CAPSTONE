<?php
/**
 * Chairperson Dashboard
 * Department-focused view showing:
 * - Department overview (students, courses, subjects, faculty)
 * - Faculty load summary
 * - Department alerts
 * - Quick actions
 */

// Get current semester and school year
$currentSemester = Semester::single_semester();
$semesterName = $currentSemester ? $currentSemester->SEMESTER : 'First';
$currentYear = date('Y');
$schoolYear = $currentYear . '-' . ($currentYear + 1);

// Get chairperson's department
$deptId = getCurrentDepartmentId();
$departmentName = getCurrentDepartmentName();

if (!$deptId) {
    echo '<div class="alert alert-danger">Department information not found. Please contact the administrator.</div>';
} else {

// Helper function for safe counts
function safeDeptCount($mydb, $sql) {
    try {
        $mydb->setQuery($sql);
        $r = $mydb->loadSingleResult();
        return ($r && isset($r->cnt)) ? intval($r->cnt) : 0;
    } catch (Exception $e) {
        error_log("safeDeptCount failed: " . $e->getMessage());
        return 0;
    }
}

// ===== SECTION 1: Department Overview Cards =====
$totalStudents = safeDeptCount($mydb, "
    SELECT COUNT(DISTINCT s.IDNO) AS cnt 
    FROM tblstudent s 
    JOIN course c ON s.COURSE_ID = c.COURSE_ID 
    WHERE c.DEPT_ID = $deptId AND s.NewEnrollees = 0
");

// Students by year level
$studentsByYear = [];
for ($level = 1; $level <= 4; $level++) {
    $studentsByYear[$level] = safeDeptCount($mydb, "
        SELECT COUNT(DISTINCT s.IDNO) AS cnt 
        FROM tblstudent s 
        JOIN course c ON s.COURSE_ID = c.COURSE_ID 
        WHERE c.DEPT_ID = $deptId AND s.YEARLEVEL = $level AND s.NewEnrollees = 0
    ");
}

$activeCourses = safeDeptCount($mydb, "
    SELECT COUNT(*) AS cnt FROM course WHERE DEPT_ID = $deptId
");

// Subjects this term vs total
$subjectsThisTerm = safeDeptCount($mydb, "
    SELECT COUNT(DISTINCT sch.SUBJ_ID) AS cnt 
    FROM tblschedule sch 
    JOIN subject subj ON sch.SUBJ_ID = subj.SUBJ_ID
    JOIN course c ON subj.COURSE_ID = c.COURSE_ID
    WHERE c.DEPT_ID = $deptId 
    AND sch.sched_semester = '$semesterName'
    AND sch.sched_sy = '$schoolYear'
");

$totalSubjects = safeDeptCount($mydb, "
    SELECT COUNT(*) AS cnt 
    FROM subject s 
    JOIN course c ON s.COURSE_ID = c.COURSE_ID 
    WHERE c.DEPT_ID = $deptId
");

$facultyMembers = safeDeptCount($mydb, "
    SELECT COUNT(*) AS cnt FROM tblinstructor WHERE DEPT_ID = $deptId
");

// Count pending grade submissions for this department
$pendingGrades = safeDeptCount($mydb, "
    SELECT COUNT(DISTINCT g.GRADE_ID) AS cnt
    FROM tblgrades g
    INNER JOIN subject s ON g.SUBJ_ID = s.SUBJ_ID
    INNER JOIN course c ON s.COURSE_ID = c.COURSE_ID
    WHERE c.DEPT_ID = $deptId
    AND g.STATUS = 'Pending Approval'
");

// ===== SECTION 2: Faculty Load Summary =====
$mydb->setQuery("
    SELECT 
        i.INST_ID,
        i.INST_LNAME,
        i.INST_FNAME,
        i.INST_MNAME,
        i.MAJOR,
        COUNT(DISTINCT sch.SUBJ_ID) AS subject_count,
        COUNT(DISTINCT CONCAT(sch.SUBJ_ID, '-', sch.SECTION)) AS section_count,
        COUNT(DISTINCT ss.IDNO) AS student_count
    FROM tblinstructor i
    LEFT JOIN tblschedule sch ON i.INST_ID = sch.INST_ID 
        AND sch.sched_semester = '$semesterName'
        AND sch.sched_sy = '$schoolYear'
    LEFT JOIN subject subj ON sch.SUBJ_ID = subj.SUBJ_ID
    LEFT JOIN course c ON subj.COURSE_ID = c.COURSE_ID AND c.DEPT_ID = $deptId
    LEFT JOIN studentsubjects ss ON sch.SUBJ_ID = ss.SUBJ_ID 
        AND ss.SEMESTER = '$semesterName'
        AND ss.SY = '$schoolYear'
    WHERE i.DEPT_ID = $deptId
    GROUP BY i.INST_ID
    ORDER BY subject_count DESC, i.INST_LNAME
");
$facultyLoad = $mydb->loadResultList();

// ===== SECTION 3: Department Alerts =====
$alerts = [];

// Alert: Subjects without instructors
$mydb->setQuery("
    SELECT COUNT(DISTINCT s.SUBJ_ID) AS cnt
    FROM subject s
    JOIN course c ON s.COURSE_ID = c.COURSE_ID
    LEFT JOIN tblschedule sch ON s.SUBJ_ID = sch.SUBJ_ID 
        AND sch.sched_semester = '$semesterName'
        AND sch.sched_sy = '$schoolYear'
    WHERE c.DEPT_ID = $deptId 
    AND sch.INST_ID IS NULL
");
$unassignedSubjects = $mydb->loadSingleResult();
if ($unassignedSubjects && $unassignedSubjects->cnt > 0) {
    $alerts[] = [
        'type' => 'warning',
        'icon' => 'fa-exclamation-triangle',
        'message' => $unassignedSubjects->cnt . ' subject(s) have no assigned instructor this term.'
    ];
}

// Alert: Courses with no students
$mydb->setQuery("
    SELECT COUNT(*) AS cnt
    FROM course c
    LEFT JOIN tblstudent s ON c.COURSE_ID = s.COURSE_ID AND s.NewEnrollees = 0
    WHERE c.DEPT_ID = $deptId
    GROUP BY c.COURSE_ID
    HAVING COUNT(s.IDNO) = 0
");
$mydb->executeQuery();
$emptyCourses = $mydb->num_rows();
if ($emptyCourses > 0) {
    $alerts[] = [
        'type' => 'info',
        'icon' => 'fa-info-circle',
        'message' => $emptyCourses . ' course(s) have no enrolled students.'
    ];
}

// Alert: Instructors with incomplete profiles (missing email or contact)
$mydb->setQuery("
    SELECT COUNT(*) AS cnt
    FROM tblinstructor
    WHERE DEPT_ID = $deptId
    AND (INST_EMAIL IS NULL OR INST_EMAIL = '' OR INST_CONTACT IS NULL OR INST_CONTACT = '')
");
$incompleteProfiles = $mydb->loadSingleResult();
if ($incompleteProfiles && $incompleteProfiles->cnt > 0) {
    $alerts[] = [
        'type' => 'warning',
        'icon' => 'fa-user',
        'message' => $incompleteProfiles->cnt . ' instructor(s) have incomplete contact information.'
    ];
}

?>

<style>
/* Reuse existing theme variables and base styles from home.php */
.dept-header {
    background: linear-gradient(135deg, #f39c12, #e67e22);
    color: white;
    padding: 20px 30px;
    border-radius: 12px;
    margin-bottom: 25px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.dept-header h2 {
    margin: 0 0 5px 0;
    font-size: 26px;
    font-weight: 700;
}

.dept-header .semester-badge {
    background: rgba(255,255,255,0.2);
    padding: 4px 12px;
    border-radius: 15px;
    font-size: 13px;
    font-weight: 600;
    display: inline-block;
    margin-top: 8px;
}

.dept-overview-cards {
    display: flex;
    gap: 20px;
    margin-bottom: 25px;
    flex-wrap: wrap;
}

.dept-card {
    flex: 1;
    min-width: 200px;
    background: white;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    border-left: 4px solid;
    transition: all 0.3s ease;
}

.dept-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0,0,0,0.12);
}

.dept-card.students { border-left-color: #667eea; }
.dept-card.courses { border-left-color: #f7971e; }
.dept-card.subjects { border-left-color: #11998e; }
.dept-card.faculty { border-left-color: #1a2980; }

.dept-card-icon {
    font-size: 32px;
    margin-bottom: 12px;
}

.dept-card.students .dept-card-icon { color: #667eea; }
.dept-card.courses .dept-card-icon { color: #f7971e; }
.dept-card.subjects .dept-card-icon { color: #11998e; }
.dept-card.faculty .dept-card-icon { color: #1a2980; }

.dept-card-value {
    font-size: 36px;
    font-weight: 800;
    color: #2c3e50;
    margin-bottom: 8px;
}

.dept-card-label {
    font-size: 14px;
    color: #7f8c8d;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.dept-card-detail {
    font-size: 13px;
    color: #95a5a6;
    margin-top: 10px;
    padding-top: 10px;
    border-top: 1px solid #ecf0f1;
}

.faculty-load-section, .alerts-section, .quick-actions-section {
    background: white;
    border-radius: 12px;
    padding: 25px;
    margin-bottom: 25px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.section-title {
    font-size: 18px;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid #ecf0f1;
}

.faculty-table {
    width: 100%;
    border-collapse: collapse;
}

.faculty-table th {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    padding: 12px;
    text-align: left;
    font-weight: 600;
    color: #2c3e50;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.faculty-table td {
    padding: 12px;
    border-bottom: 1px solid #ecf0f1;
    font-size: 14px;
}

.faculty-table tr:hover {
    background: #f8f9fa;
}

.load-badge {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 600;
}

.load-balanced { background: #d4edda; color: #155724; }
.load-high { background: #fff3cd; color: #856404; }
.load-overloaded { background: #f8d7da; color: #721c24; }
.load-none { background: #e2e3e5; color: #6c757d; }

.alert-item {
    display: flex;
    align-items: center;
    padding: 12px 15px;
    border-radius: 8px;
    margin-bottom: 10px;
    font-size: 14px;
}

.alert-item i {
    font-size: 20px;
    margin-right: 12px;
}

.alert-item.warning {
    background: #fff3cd;
    border-left: 4px solid #ffc107;
    color: #856404;
}

.alert-item.info {
    background: #d1ecf1;
    border-left: 4px solid #17a2b8;
    color: #0c5460;
}

.alert-item.danger {
    background: #f8d7da;
    border-left: 4px solid #dc3545;
    color: #721c24;
}

.quick-actions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
}

.action-btn {
    display: flex;
    align-items: center;
    padding: 15px 20px;
    border-radius: 10px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

.action-btn i {
    font-size: 24px;
    margin-right: 12px;
}

.action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    text-decoration: none;
}

.action-btn.primary {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
}

.action-btn.success {
    background: linear-gradient(135deg, #11998e, #38ef7d);
    color: white;
}

.action-btn.info {
    background: linear-gradient(135deg, #1a2980, #26d0ce);
    color: white;
}

.action-btn.warning {
    background: linear-gradient(135deg, #f7971e, #ffd200);
    color: white;
}

.no-data {
    text-align: center;
    padding: 30px;
    color: #95a5a6;
    font-style: italic;
}
</style>

<!-- Department Header -->
<div class="dept-header">
    <h2><i class="fa fa-building"></i> <?php echo htmlspecialchars($departmentName); ?> Department</h2>
    <p style="margin: 5px 0 0 0; font-size: 15px; opacity: 0.95;">
        Chairperson Dashboard
        <span class="semester-badge">
            <i class="fa fa-calendar"></i> <?php echo htmlspecialchars($semesterName . ' Semester ' . $schoolYear); ?>
        </span>
        <?php if ($pendingGrades > 0): ?>
        <span class="semester-badge" style="background: rgba(231, 76, 60, 0.9); margin-left: 8px; animation: pulse 2s infinite;">
            <i class="fa fa-exclamation-circle"></i> <?php echo $pendingGrades; ?> Pending Grade<?php echo $pendingGrades > 1 ? 's' : ''; ?>
        </span>
        <?php endif; ?>
    </p>
</div>

<style>
@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.7; }
}
</style>

<!-- SECTION 1: Department Overview Cards -->
<div class="dept-overview-cards">
    <div class="dept-card students">
        <div class="dept-card-icon"><i class="fa fa-users"></i></div>
        <div class="dept-card-value"><?php echo $totalStudents; ?></div>
        <div class="dept-card-label">Total Students</div>
        <div class="dept-card-detail">
            <?php foreach ($studentsByYear as $year => $count): ?>
                <?php echo $year . ': ' . $count; ?><?php echo ($year < 4) ? ' &nbsp;|&nbsp; ' : ''; ?>
            <?php endforeach; ?>
        </div>
    </div>
    
    <div class="dept-card courses">
        <div class="dept-card-icon"><i class="fa fa-graduation-cap"></i></div>
        <div class="dept-card-value"><?php echo $activeCourses; ?></div>
        <div class="dept-card-label">Active Courses</div>
        <div class="dept-card-detail">Programs offered</div>
    </div>
    
    <div class="dept-card subjects">
        <div class="dept-card-icon"><i class="fa fa-book"></i></div>
        <div class="dept-card-value"><?php echo $subjectsThisTerm; ?> / <?php echo $totalSubjects; ?></div>
        <div class="dept-card-label">Subjects</div>
        <div class="dept-card-detail">Offered this term / Total</div>
    </div>
    
    <div class="dept-card faculty">
        <div class="dept-card-icon"><i class="fa fa-user"></i></div>
        <div class="dept-card-value"><?php echo $facultyMembers; ?></div>
        <div class="dept-card-label">Faculty Members</div>
        <div class="dept-card-detail">Active instructors</div>
    </div>
</div>

<!-- SECTION 2: Faculty Load Summary -->
<div class="faculty-load-section">
    <h3 class="section-title"><i class="fa fa-users"></i> Faculty Load Summary (This Term)</h3>
    
    <?php if ($facultyLoad && count($facultyLoad) > 0): ?>
    <table class="faculty-table">
        <thead>
            <tr>
                <th>Instructor</th>
                <th>Major</th>
                <th style="text-align: center;">Subjects</th>
                <th style="text-align: center;">Sections</th>
                <th style="text-align: center;">Students</th>
                <th style="text-align: center;">Workload</th>
                <th style="text-align: center;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($facultyLoad as $instructor): ?>
                <?php
                    $fullName = trim($instructor->INST_LNAME . ', ' . $instructor->INST_FNAME . ' ' . $instructor->INST_MNAME);
                    $subjectCount = intval($instructor->subject_count);
                    $sectionCount = intval($instructor->section_count);
                    $studentCount = intval($instructor->student_count);
                    
                    // Determine workload status (adjust thresholds as needed)
                    if ($subjectCount == 0) {
                        $loadClass = 'load-none';
                        $loadLabel = 'No Load';
                    } elseif ($subjectCount >= 6) {
                        $loadClass = 'load-overloaded';
                        $loadLabel = 'Overloaded';
                    } elseif ($subjectCount >= 4) {
                        $loadClass = 'load-high';
                        $loadLabel = 'High';
                    } else {
                        $loadClass = 'load-balanced';
                        $loadLabel = 'Balanced';
                    }
                ?>
                <tr>
                    <td><strong><?php echo htmlspecialchars($fullName); ?></strong></td>
                    <td><?php echo htmlspecialchars($instructor->MAJOR ?: 'N/A'); ?></td>
                    <td style="text-align: center;"><?php echo $subjectCount; ?></td>
                    <td style="text-align: center;"><?php echo $sectionCount; ?></td>
                    <td style="text-align: center;"><?php echo $studentCount; ?></td>
                    <td style="text-align: center;">
                        <span class="load-badge <?php echo $loadClass; ?>"><?php echo $loadLabel; ?></span>
                    </td>
                    <td style="text-align: center;">
                        <a href="<?php echo web_root; ?>admin/schedule/index.php?instructor=<?php echo $instructor->INST_ID; ?>" 
                           class="btn btn-xs btn-info" title="View Schedule">
                            <i class="fa fa-calendar"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <div class="no-data">No faculty data available.</div>
    <?php endif; ?>
</div>

<!-- SECTION 3: Department Alerts -->
<?php if (count($alerts) > 0): ?>
<div class="alerts-section">
    <h3 class="section-title"><i class="fa fa-exclamation-circle"></i> Department Alerts</h3>
    <?php foreach ($alerts as $alert): ?>
        <div class="alert-item <?php echo $alert['type']; ?>">
            <i class="fa <?php echo $alert['icon']; ?>"></i>
            <span><?php echo htmlspecialchars($alert['message']); ?></span>
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<!-- SECTION 4: Quick Actions -->
<div class="quick-actions-section">
    <h3 class="section-title"><i class="fa fa-bolt"></i> Quick Actions</h3>
    <div class="quick-actions-grid">
        <a href="<?php echo web_root; ?>admin/chairperson/grade_approval.php" class="action-btn primary" style="background: linear-gradient(135deg, #667eea, #764ba2);">
            <i class="fa fa-star"></i>
            <span>Grade Approval</span>
        </a>
        <a href="<?php echo web_root; ?>admin/subject/index.php?view=add" class="action-btn success">
            <i class="fa fa-plus-circle"></i>
            <span>Add Department Subject</span>
        </a>
        <a href="<?php echo web_root; ?>admin/schedule/index.php?view=add" class="action-btn info">
            <i class="fa fa-user-plus"></i>
            <span>Assign Instructor</span>
        </a>
        <a href="<?php echo web_root; ?>admin/schedule/index.php" class="action-btn info">
            <i class="fa fa-calendar"></i>
            <span>View Dept Schedule</span>
        </a>
        <a href="<?php echo web_root; ?>admin/report/index.php?view=perSemester" class="action-btn warning">
            <i class="fa fa-bar-chart"></i>
            <span>Generate Report</span>
        </a>
    </div>
</div>

<?php } // End if $deptId check ?>
