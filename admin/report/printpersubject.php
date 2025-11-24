<?php
require_once("../../include/initialize.php");
if(!isset($_SESSION['ACCOUNT_ID'])){
  redirect(web_root."admin/index.php");
}
// Ensure the user has appropriate role to access this page
if ($_SESSION['ACCOUNT_TYPE'] !== 'Registrar' && 
    $_SESSION['ACCOUNT_TYPE'] !== 'Registrar') {
    
    // Redirect or show an error message if the user does not have permission
    message("You do not have permission to access this page.", "error");
    redirect("index.php");  // Redirect to a safe page
}

$subject = New Subject();
$subjresult = $subject->single_subject($_POST['SUBJ_ID']);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Benguet State University - Bokod Campus</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="<?php echo web_root; ?>admin/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo web_root; ?>admin/font/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  
  <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        color: #333;
        background: #fff;
    }
    .print-container {
        max-width: 100%;
    }
    .header-section {
        border-bottom: 3px solid #333;
        padding-bottom: 15px;
        margin-bottom: 20px;
    }
    .title-section {
        text-align: center;
        margin: 25px 0;
        padding: 15px 0;
        border-bottom: 2px solid #2c3e50;
    }
    .subject-info {
        text-align: center;
        margin: 15px 0;
        font-size: 18px;
        font-weight: 600;
        color: #2c3e50;
        background: #f8f9fa;
        padding: 10px;
        border-radius: 8px;
    }
    .subject-details {
        text-align: center;
        margin: 10px 0;
        font-size: 14px;
        color: #6c757d;
    }
    .table-responsive {
        margin: 20px 0;
    }
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        font-size: 12px;
    }
    .table th {
        background-color: #2c3e50 !important;
        color: white !important;
        border: 2px solid #34495e !important;
        padding: 12px 8px;
        font-weight: bold;
        text-align: center;
        font-size: 12px;
    }
    .table td {
        border: 1px solid #ddd;
        padding: 10px 8px;
        text-align: center;
    }
    .table tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }
    .status-badge {
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 11px;
        font-weight: 600;
        display: inline-block;
    }
    .status-active {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    .status-inactive {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    .footer {
        text-align: center;
        margin-top: 30px;
        padding-top: 15px;
        border-top: 1px solid #ddd;
        color: #666;
        font-size: 12px;
    }
    .total-section {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        margin-top: 20px;
        border: 2px solid #e9ecef;
    }
    .total-text {
        font-size: 16px;
        font-weight: bold;
        color: #2c3e50;
    }
    .total-number {
        font-size: 18px;
        font-weight: bold;
        color: #27ae60;
    }
    @media print {
        body { 
            padding: 15px; 
            font-size: 12px;
        }
        .table th {
            background-color: #2c3e50 !important;
            -webkit-print-color-adjust: exact;
            color: white !important;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f8f9fa !important;
            -webkit-print-color-adjust: exact;
        }
        .status-active {
            background-color: #d4edda !important;
            -webkit-print-color-adjust: exact;
        }
        .status-inactive {
            background-color: #f8d7da !important;
            -webkit-print-color-adjust: exact;
        }
        .total-section {
            background: #f8f9fa !important;
            -webkit-print-color-adjust: exact;
        }
        .subject-info {
            background: #f8f9fa !important;
            -webkit-print-color-adjust: exact;
        }
    }
  </style>
</head>
<body onload="window.print();">
<div class="container-fluid print-container">
    <!-- Header -->
    <div class="row header-section">
        <div class="col-xs-12">
            <table width="100%">
                <tr>
                    <td>
                        <h3 style="margin: 0; color: #2c3e50;">
                            <i class="fa fa-globe"></i> Benguet State University - Bokod Campus
                        </h3>
                    </td>
                    <td align="right">
                        <strong style="display: block;">Printed Date:</strong>
                        <span><?php echo date('F j, Y'); ?></span>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Title -->
    <div class="row title-section">
        <div class="col-xs-12">
            <h2 style="margin: 0; font-size: 24px; color: #2c3e50;">
                Students Enrolled per Subject
            </h2>
        </div>
    </div>

    <!-- Subject Information -->
    <div class="row">
        <div class="col-xs-12">
            <div class="subject-info">
                <i class="fa fa-book"></i> 
                Subject: <?php echo $subjresult->SUBJ_CODE; ?>
            </div>
            <?php if(!empty($subjresult->SUBJ_DESCRIPTION)): ?>
            <div class="subject-details">
                Description: <?php echo $subjresult->SUBJ_DESCRIPTION; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Table -->
    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Full Name</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Contact No.</th>
                            <th>Civil Status</th>
                            <th>Course/Year</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tot = 0;
                        $sql ="SELECT * FROM course c, `tblstudent` s, `studentsubjects` st 
                         WHERE c.COURSE_ID=s.COURSE_ID AND s.`IDNO`=st.`IDNO` AND `SUBJ_ID`=".$_POST['SUBJ_ID'];

                        $mydb->setQuery($sql);
                        $res = $mydb->executeQuery();
                        $row_count = $mydb->num_rows($res);
                        $cur = $mydb->loadResultList();
                        
                        if ($row_count > 0){
                            foreach ($cur as $result) {
                                $dbirth = date($result->BDAY);
                                $today = date('Y-M-d');
                                $age = date_diff(date_create($dbirth),date_create($today))->y;
                                $status_class = ($result->student_status == 'Active') ? 'status-active' : 'status-inactive';
                                ?>
                                <tr> 
                                    <td><?php echo $result->IDNO;?></td>
                                    <td><?php echo $result->FNAME . ' ' . $result->MNAME . ' ' . $result->LNAME;?></td>
                                    <td><?php echo $result->HOME_ADD;?></td>
                                    <td><?php echo $result->SEX;?></td>
                                    <td><?php echo $age;?></td>
                                    <td><?php echo $result->CONTACT_NO;?></td>
                                    <td><?php echo $result->STATUS;?></td>
                                    <td><?php echo $result->COURSE_NAME .'-'.$result->COURSE_LEVEL;?></td>
                                    <td>
                                        <span class="status-badge <?php echo $status_class; ?>">
                                            <?php echo $result->student_status;?>
                                        </span>
                                    </td>
                                </tr>
                                <?php  
                                $tot = count($cur);
                            } 
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Total Students -->
    <div class="row">
        <div class="col-xs-12">
            <div class="total-section">
                <table width="100%">
                    <tr>
                        <td align="right" width="80%">
                            <span class="total-text">Total Number of Students:</span>
                        </td>
                        <td align="center">
                            <span class="total-number"><?php echo $tot; ?></span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="row footer">
        <div class="col-xs-12">
            <p>Generated by Benguet State University - Bokod Campus</p>
            <p>Printed on: <?php echo date('F j, Y \a\t g:i A'); ?></p>
            <p>Subject: <?php echo $subjresult->SUBJ_CODE; ?><?php echo !empty($subjresult->SUBJ_DESCRIPTION) ? ' - ' . $subjresult->SUBJ_DESCRIPTION : ''; ?></p>
        </div>
    </div>
</div>
</body>
</html>