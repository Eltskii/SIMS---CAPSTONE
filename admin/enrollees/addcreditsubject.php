<?php 
if (!isset($_SESSION['ACCOUNT_ID'])){
    redirect(web_root."admin/index.php");
}

// Ensure the user has appropriate role to access this page
if ($_SESSION['ACCOUNT_TYPE'] !== 'Registrar') {
    message("You do not have permission to access this page.", "error");
    redirect("index.php");
}

$sem = new Semester();
$resSem = $sem->single_semester();
$_SESSION['SEMESTER'] = $resSem->SEMESTER; 

$currentyear = date('Y');
$nextyear =  date('Y') + 1;
$sy = $currentyear .'-'.$nextyear;
$_SESSION['SY'] = $sy;

$student = New Student();
$res = $student->single_student($_GET['IDNO']);

$course = new Course();
$cres = $course->single_course($res->COURSE_ID);

// Get enrolled subjects
$mydb->setQuery("SELECT DISTINCT s.SUBJ_CODE, s.SUBJ_DESCRIPTION, s.UNIT, ss.SEMESTER, ss.SY, ss.LEVEL
    FROM studentsubjects ss
    JOIN subject s ON ss.SUBJ_ID = s.SUBJ_ID
    WHERE ss.IDNO = " . intval($_GET['IDNO']) . "
    ORDER BY ss.SY DESC, ss.SEMESTER, s.SUBJ_CODE");
$enrolledSubjects = $mydb->loadResultList();
?>

<style>
.student-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 25px;
    border-radius: 12px;
    margin-bottom: 30px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}
.student-header h2 {
    margin: 0 0 10px 0;
    font-weight: 700;
}
.student-info {
    display: flex;
    gap: 20px;
    margin-top: 10px;
    font-size: 14px;
}
.student-info span {
    background: rgba(255,255,255,0.2);
    padding: 5px 12px;
    border-radius: 6px;
}
.nav-tabs {
    border-bottom: 2px solid #e9ecef;
}
.nav-tabs > li.active > a {
    background: linear-gradient(135deg, #667eea, #764ba2) !important;
    color: white !important;
    border: none !important;
    border-radius: 8px 8px 0 0 !important;
}
.nav-tabs > li > a {
    border-radius: 8px 8px 0 0;
    color: #495057;
    font-weight: 600;
}
.nav-tabs > li > a:hover {
    background: #f8f9fa;
}
.table th {
    background: linear-gradient(135deg, #2c3e50, #34495e);
    color: white;
    font-weight: 600;
    text-align: center;
}
.table td {
    vertical-align: middle;
}
.enrolled-badge {
    background: linear-gradient(135deg, #27ae60, #219653);
    color: white;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 600;
}
</style>

<div class="student-header">
    <h2>
        <i class="fa fa-user-circle"></i>
        <?php echo htmlspecialchars($res->LNAME . ', ' . $res->FNAME . ' ' . $res->MNAME); ?>
    </h2>
    <div class="student-info">
        <span><i class="fa fa-id-card"></i> <?php echo htmlspecialchars($res->IDNO); ?></span>
        <span><i class="fa fa-graduation-cap"></i> <?php echo htmlspecialchars($cres->COURSE_NAME . ' - ' . $cres->COURSE_LEVEL); ?></span>
        <span><i class="fa fa-calendar"></i> <?php echo htmlspecialchars($_SESSION['SEMESTER'] . ' ' . $_SESSION['SY']); ?></span>
    </div>
</div>
</div>

<?php check_message(); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" style="background: linear-gradient(135deg, #2c3e50, #34495e); color: white;">
                <h3 style="margin: 10px 0;"><i class="fa fa-list-alt"></i> Enrolled Subjects <span class="enrolled-badge"><?php echo count($enrolledSubjects); ?></span></h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" style="font-size:13px;">
                        <thead>
                            <tr>
                                <th>Subject Code</th>
                                <th>Description</th>
                                <th class="text-center">Units</th>
                                <th class="text-center">Level</th>
                                <th class="text-center">Semester</th>
                                <th class="text-center">School Year</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if (!empty($enrolledSubjects)) {
                                $totalUnits = 0;
                                foreach ($enrolledSubjects as $subject) {
                                    $totalUnits += floatval($subject->UNIT);
                                    echo '<tr>';
                                    echo '<td><strong>' . htmlspecialchars($subject->SUBJ_CODE) . '</strong></td>';
                                    echo '<td>' . htmlspecialchars($subject->SUBJ_DESCRIPTION) . '</td>';
                                    echo '<td class="text-center">' . htmlspecialchars($subject->UNIT) . '</td>';
                                    echo '<td class="text-center">' . htmlspecialchars($subject->LEVEL) . '</td>';
                                    echo '<td class="text-center">' . htmlspecialchars($subject->SEMESTER) . '</td>';
                                    echo '<td class="text-center">' . htmlspecialchars($subject->SY) . '</td>';
                                    echo '</tr>';
                                }
                                echo '<tr style="background: #f8f9fa; font-weight: 600;">';
                                echo '<td colspan="2" class="text-right"><i class="fa fa-calculator"></i> Total Units</td>';
                                echo '<td class="text-center">' . number_format($totalUnits, 2) . '</td>';
                                echo '<td colspan="3"></td>';
                                echo '</tr>';
                            } else {
                                echo '<tr><td colspan="6" class="text-center" style="padding: 30px; color: #6c757d;">';
                                echo '<i class="fa fa-inbox" style="font-size: 48px; opacity: 0.3;"></i><br>';
                                echo '<p style="margin-top: 10px;">No subjects enrolled yet.</p>';
                                echo '</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div style="margin-top: 20px; text-align: right;">
                    <a href="index.php" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
 
  <?php 
    unset($_SESSION['SEMESTER']);
    unset($_SESSION['SY']);

  ?>