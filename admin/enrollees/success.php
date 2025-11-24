<?php

if (!isset($_GET['IDNO'])) {
   redirect("index.php");
}


// Ensure the user has appropriate role to access this page
if ($_SESSION['ACCOUNT_TYPE'] !== 'Registrar' && 
    $_SESSION['ACCOUNT_TYPE'] !== 'Registrar') {
    
    // Redirect or show an error message if the user does not have permission
    message("You do not have permission to access this page.", "error");
    redirect("index.php");  // Redirect to a safe page
}

$sem = new Semester();
$resSem = $sem->single_semester();
$_SESSION['SEMESTER'] = $resSem->SEMESTER; 

$currentyear = date('Y');
$nextyear =  date('Y') + 1;
$sy = $currentyear .'-'.$nextyear;
$_SESSION['SY'] = $sy;

     $student = New Student(); 
     $studres = $student->single_student($_GET['IDNO'])
     
?>

<style>
.modern-invoice {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    padding: 30px;
    margin-bottom: 30px;
}
.student-header-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 25px;
    border-radius: 12px;
    margin-bottom: 25px;
}
.student-header-card h2 {
    margin: 0 0 15px 0;
    font-size: 24px;
    font-weight: 700;
}
.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 15px;
    margin-top: 15px;
}
.info-item {
    background: rgba(255,255,255,0.15);
    padding: 10px 15px;
    border-radius: 8px;
}
.info-item strong {
    display: block;
    font-size: 11px;
    opacity: 0.8;
    margin-bottom: 3px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.section-title {
    font-size: 20px;
    font-weight: 700;
    color: #2c3e50;
    margin: 25px 0 15px 0;
    padding-bottom: 10px;
    border-bottom: 3px solid #667eea;
}
.subjects-table {
    background: white;
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 20px;
}
.subjects-table thead th {
    background: linear-gradient(135deg, #2c3e50, #34495e);
    color: white;
    font-weight: 600;
    padding: 12px;
    text-align: center;
}
.subjects-table tbody td {
    padding: 12px;
    text-align: center;
    border-bottom: 1px solid #e9ecef;
}
.subjects-table tfoot td {
    background: #f8f9fa;
    font-weight: 700;
    padding: 12px;
}
.tuition-card {
    background: #f8f9fa;
    border-radius: 8px;
    padding: 20px;
    border-left: 4px solid #667eea;
}
.fee-table {
    background: white;
    border-radius: 8px;
    overflow: hidden;
}
.fee-table th, .fee-table td {
    padding: 12px;
}
.fee-table tr:nth-child(even) {
    background: #f8f9fa;
}
.total-row {
    background: linear-gradient(135deg, #27ae60, #219653) !important;
    color: white !important;
    font-size: 16px;
    font-weight: 700;
}
.btn-modern {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
}
.btn-modern:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(0,0,0,0.15);
    color: white;
}
</style>

<form action="index.php?q=payment" method="POST">
<div class="modern-invoice">
    <div class="student-header-card">
        <h2><i class="fa fa-user-circle"></i> Student Information</h2>
        <div class="info-grid">
            <div class="info-item">
                <strong><i class="fa fa-user"></i> Full Name</strong>
                <?php echo htmlspecialchars($studres->LNAME . ', ' . $studres->FNAME . ' ' . $studres->MNAME); ?>
            </div>
            <div class="info-item">
                <strong><i class="fa fa-id-card"></i> Student ID</strong>
                <?php echo htmlspecialchars($studres->IDNO); ?>
            </div>
            <div class="info-item">
                <strong><i class="fa fa-map-marker"></i> Address</strong>
                <?php echo htmlspecialchars($studres->HOME_ADD); ?>
            </div>
            <div class="info-item">
                <strong><i class="fa fa-phone"></i> Contact</strong>
                <?php echo htmlspecialchars($studres->CONTACT_NO); ?>
            </div>
            <div class="info-item">
                <strong><i class="fa fa-graduation-cap"></i> Course/Year</strong>
                <?php 
                $course = New Course();
                $singlecourse = $course->single_course($studres->COURSE_ID);
                echo htmlspecialchars($_SESSION['COURSE_YEAR'] = $singlecourse->COURSE_NAME . '-' . $studres->YEARLEVEL);
                ?>
            </div>
            <div class="info-item">
                <strong><i class="fa fa-calendar"></i> Semester</strong>
                <?php echo htmlspecialchars($_SESSION['SEMESTER']); ?>
            </div>
            <div class="info-item">
                <strong><i class="fa fa-calendar-check-o"></i> Academic Year</strong>
                <?php echo htmlspecialchars($_SESSION['SY']); ?>
            </div>
            <div class="info-item">
                <strong><i class="fa fa-clock-o"></i> Date</strong>
                <?php echo date('F d, Y'); ?>
            </div>
        </div>
    </div>
    <h3 class="section-title"><i class="fa fa-book"></i> Enrolled Subjects</h3>

<?php
// Fetch enrolled subjects for this student
$mydb->setQuery("SELECT DISTINCT s.SUBJ_ID, s.SUBJ_CODE, s.SUBJ_DESCRIPTION, s.UNIT, ss.SEMESTER, ss.LEVEL
    FROM studentsubjects ss
    JOIN subject s ON ss.SUBJ_ID = s.SUBJ_ID
    WHERE ss.IDNO = " . intval($_GET['IDNO']) . "
    ORDER BY s.SUBJ_CODE");

$enrolledSubjects = $mydb->loadResultList();
$totunit = 0;
?>

<div class="table-responsive">
    <table class="table subjects-table">
        <thead>
            <tr> 
                <th>Subject Code</th>
                <th>Description</th>
                <th>Units</th>
                <th>Level</th>
                <th>Semester</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        if (!empty($enrolledSubjects)) {
            foreach ($enrolledSubjects as $result) {
                echo '<tr>';
                echo '<td><strong>' . htmlspecialchars($result->SUBJ_CODE) . '</strong></td>'; 
                echo '<td>' . htmlspecialchars($result->SUBJ_DESCRIPTION) . '</td>';
                echo '<td class="text-center">' . htmlspecialchars($result->UNIT) . '</td>';
                echo '<td class="text-center">' . htmlspecialchars($result->LEVEL) . '</td>';
                echo '<td class="text-center">' . htmlspecialchars($result->SEMESTER) . '</td>';
                echo '</tr>';
                
                $totunit += floatval($result->UNIT);
            }
        } else {
            echo '<tr>';
            echo '<td colspan="5" class="text-center" style="padding: 30px; color: #6c757d;">';
            echo '<i class="fa fa-inbox" style="font-size: 48px; opacity: 0.3;"></i><br>';
            echo '<p style="margin-top: 10px;">No subjects enrolled yet.</p>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
        <tfoot>
            <tr style="background: #f8f9fa; font-weight: 700;">
                <td colspan="2" class="text-right"><i class="fa fa-calculator"></i> Total Units</td>
                <td class="text-center"><?php echo number_format($totunit, 2); ?></td>
                <td colspan="2"></td>
            </tr>
        </tfoot>
    </table>
</div>
    <div class="row no-print" style="margin-top: 30px; padding-top: 20px; border-top: 2px solid #e9ecef;">
        <div class="col-xs-12">
            <a href="index.php" class="btn btn-modern">
                <i class="fa fa-arrow-left"></i> Back to Enrollees List
            </a>
        </div>
    </div>
</div>
<div class="clearfix"></div>
 <?php
  unset($_SESSION['SEMESTER']);
  unset($_SESSION['SY']);
  // unset($_SESSION['admingvCart']);
 ?>