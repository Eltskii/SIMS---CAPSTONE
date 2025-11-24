<?php 
require_once ("../include/initialize.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Benguet State University - Bokod Campus</title>

<!-- Bootstrap Core CSS -->
<link href="<?php echo web_root; ?>css/bootstrap.min.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="<?php echo web_root; ?>font/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo web_root; ?>font/font-awesome.min.css" rel="stylesheet" type="text/css">

<!-- DataTables CSS -->
<link href="<?php echo web_root; ?>css/dataTables.bootstrap.css" rel="stylesheet">

<!-- datetime picker CSS -->
<link href="<?php echo web_root; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

<link href="<?php echo web_root; ?>css/modern.css" rel="stylesheet">
<link href="<?php echo web_root; ?>css/custom.css" rel="stylesheet">
<style>
  /* Minor print-friendly tweaks */
  body { color: #000; background: #fff; }
  .page-header { margin-top: 0; }
  table { width: 100%; }
  .table > thead > tr > th { text-align: left; }
  .text-center { text-align: center; }
  .no-results { padding: 10px; font-style: italic; color: #666; }
</style>
</head>

<body onload="window.print();">

  <div class="row">
    <div class="col-xs-12">
      <h4 class="page-header">
        <i class="fa fa-user"></i> Student Information
        <small class="pull-right">Date: <?php echo date('m/d/Y'); ?></small>
      </h4>
    </div>
  </div> 

<?php
// Prepare semester and SY values (fall back to session or current)
$sem = new Semester();
$resSem = $sem->single_semester();
if (!isset($_SESSION['SEMESTER'])) {
    $_SESSION['SEMESTER'] = $resSem->SEMESTER; 
}
if (!isset($_SESSION['SY'])) {
    $currentyear = date('Y');
    $nextyear =  date('Y') + 1;
    $sy = $currentyear .'-'.$nextyear;
    $_SESSION['SY'] = $sy;
}

// Fetch student
$student = New Student();
$stud = $student->single_student($_SESSION['IDNO']);
?>

<table>
  <tr>
    <td width="75%" colspan="2" >
      <address>
        <b>Name : <?php echo htmlspecialchars($stud->LNAME. ', ' .$stud->FNAME .' ' .$stud->MNAME);?></b><br>
        Address : <?php echo htmlspecialchars($stud->HOME_ADD);?><br> 
        Contact No.: <?php echo htmlspecialchars($stud->CONTACT_NO);?><br>
      </address>
    </td>
    <td>
      <b>Course/Year:  
      <?php 
        $course = New Course();
        $singlecourse = $course->single_course($stud->COURSE_ID);
        echo htmlspecialchars($_SESSION['COURSE_YEAR'] = $singlecourse->COURSE_NAME.'-'.$singlecourse->COURSE_LEVEL);
        $_SESSION['COURSEID'] = $stud->COURSE_ID;
        $_SESSION['COURSELEVEL'] = $stud->YEARLEVEL;
      ?>
      </b><br>
      <b>Semester : <?php echo htmlspecialchars($_SESSION['SEMESTER']); ?></b> <br/>
      <b>Academic Year : <?php echo htmlspecialchars($_SESSION['SY']); ?></b>
    </td>
  </tr>
</table>

<div class="row">
  <h1 align="center">Schedules</h1>
  <hr/>
</div>

<?php
// safe escape helper: uses $mydb->escape_value if available, otherwise fallback
function esc($value) {
    global $mydb;
    if (isset($mydb) && method_exists($mydb, 'escape_value')) {
        return $mydb->escape_value($value);
    }
    return addslashes($value);
}

// Read inputs from POST (print form), fall back to session values
$printCourse = isset($_POST['Course']) ? intval($_POST['Course']) : 0;
$printSY     = isset($_POST['SY']) ? trim($_POST['SY']) : (isset($_SESSION['SY']) ? trim($_SESSION['SY']) : '');
$printSem    = isset($_POST['Semester']) ? trim($_POST['Semester']) : (isset($_SESSION['SEMESTER']) ? trim($_SESSION['SEMESTER']) : '');

// Build join condition: match schedule to enrollment SY/SEM unless printSY/printSem provided
if (!empty($printSY) && !empty($printSem)) {
    $joinCond = "s.SUBJ_ID = ss.SUBJ_ID AND s.sched_sy = '" . esc($printSY) . "' AND s.sched_semester = '" . esc($printSem) . "'";
} else {
    $joinCond = "s.SUBJ_ID = ss.SUBJ_ID AND s.sched_sy = ss.SY AND s.sched_semester = ss.SEMESTER";
}

$sql = "
  SELECT sub.SUBJ_CODE, sub.SUBJ_DESCRIPTION, sub.UNIT
  FROM studentsubjects ss
  JOIN `subject` sub ON ss.SUBJ_ID = sub.SUBJ_ID
  WHERE ss.IDNO = " . intval($_SESSION['IDNO']) . "
    AND IFNULL(ss.OUTCOME,'') != 'Drop'
  ORDER BY sub.SUBJ_CODE
";
$mydb->setQuery($sql);
$cur = $mydb->loadResultList();
?>

<table class="table table-striped table-bordered table-hover" style="font-size:12px" cellspacing="0">
  <thead>
    <tr>
      <th>Subject</th>
      <th>Description</th>
      <th class="text-center">Unit</th>
    </tr>
  </thead>

  <tbody>
    <?php 
      $tot = 0.0; // ensure exists even if no rows
      if (empty($cur)): ?>
      <tr>
        <td colspan="3">
          <div class="no-results">No enrolled subjects found for this student.</div>
        </td>
      </tr>
    <?php else:
        foreach ($cur as $result) {
            $unit = floatval($result->UNIT);
            $tot += $unit;
    ?>
      <tr>
        <td><?php echo htmlspecialchars($result->SUBJ_CODE); ?></td>
        <td><?php echo htmlspecialchars($result->SUBJ_DESCRIPTION); ?></td>
        <td class="text-center"><?php echo htmlspecialchars($result->UNIT); ?></td>
      </tr>
    <?php } // end foreach
      endif; ?>
  </tbody>

  <tfoot>
    <tr>
      <td colspan="2" align="right"><strong>Total Units</strong></td>
      <td class="text-center"><strong>
          <?php
            $displayTotal = ($tot == intval($tot)) ? intval($tot) : number_format($tot, 2);
            echo $displayTotal;
          ?>
      </strong></td>
    </tr>
  </tfoot>
</table>
</body>
</html>
