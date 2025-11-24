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
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Benguet State University - Bokod Campus  </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="<?php echo web_root; ?>admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo web_root; ?>admin/css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo web_root; ?>admin/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo web_root; ?>admin/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
 
   <link href="<?php echo web_root; ?>admin/css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo web_root; ?>admin/font/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <link href="<?php echo web_root; ?>admin/font/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- DataTables CSS -->
    <link href="<?php echo web_root; ?>admin/css/dataTables.bootstrap.css" rel="stylesheet">
 
     <!-- datetime picker CSS -->
<link href="<?php echo web_root; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
 <link href="<?php echo web_root; ?>css/datepicker.css" rel="stylesheet" media="screen">
 
 <link href="<?php echo web_root; ?>admin/css/custom.css" rel="stylesheet">
 
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
         border-bottom: 1px solid #ddd;
     }
     .table-responsive {
         margin: 20px 0;
     }
     .table {
         width: 100%;
         border-collapse: collapse;
         margin-bottom: 20px;
     }
     .table th {
         background-color: #f8f9fa !important;
         border: 2px solid #333 !important;
         padding: 12px 8px;
         font-weight: bold;
         text-align: left;
     }
     .table td {
         border: 1px solid #ddd;
         padding: 10px 8px;
     }
     .badge {
         background-color: #6c757d;
         color: white;
         padding: 4px 8px;
         border-radius: 3px;
         font-size: 11px;
         display: inline-block;
     }
     .footer {
         text-align: center;
         margin-top: 30px;
         padding-top: 15px;
         border-top: 1px solid #ddd;
         color: #666;
         font-size: 12px;
     }
     @media print {
         body { 
             padding: 15px; 
             font-size: 12px;
         }
         .table th {
             background-color: #f0f0f0 !important;
             -webkit-print-color-adjust: exact;
         }
     }
 </style>
</head>
<body onload="window.print();">
<div class="wrapper print-container">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row header-section">
      <div class="col-xs-12">
        <div style="display: flex; justify-content: space-between; align-items: center;">
          <div>
            <h3 style="margin: 0; color: #333;">
              <i class="fa fa-globe"></i> Benguet State University - Bokod Campus
            </h3>
          </div>
          <div style="text-align: right;">
            <strong style="display: block;">Printed Date:</strong>
            <span><?php echo date('m/d/Y'); ?></span>
          </div>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <div class="row title-section">
        <div class="col-xs-12">
          <h2 style="margin: 0; font-size: 24px; color: #333;">
           User Logs Report
          </h2>
          <?php if(isset($_POST['Users']) && $_POST['Users'] != 'All'): ?>
          <p style="margin: 5px 0 0 0; font-size: 16px; color: #666;">
            Filtered by: <?php echo $_POST['Users']; ?>
          </p>
          <?php endif; ?>
        </div> 
      </div> 
   

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 col-md-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Name</th>
              <th>Date</th> 
              <th>User Type</th> 
              <th>Log Mode</th>
            </tr>
            </thead>
            <tbody>
            <?php 
                if ($_POST['Users']=="All") {
                  # code...
                    $sql ="SELECT * FROM `tbllogs`  l ,`useraccounts` u
                      WHERE l.`USERID`=u.`ACCOUNT_ID`" ;
                     

                  $mydb->setQuery($sql);
                  $res = $mydb->executeQuery();
                  $row_count = $mydb->num_rows($res);
                  $cur = $mydb->loadResultList();
                 
                    if ($row_count > 0){
                            foreach ($cur as $result) {
                                   ?>
                                  <tr> 
                                   <td><?php echo $result->ACCOUNT_NAME;?></td>
                                     <td><?php echo $result->LOGDATETIME;?></td>
                                    <td><span class="badge"><?php echo $result->LOGROLE;?></span></td>
                                    <td><span class="badge"><?php echo $result->LOGMODE;?></span></td> 
                                  </tr>
                                  <?php 
                                    
                      } 

                      }
                         $sql ="SELECT * FROM `tbllogs`  l ,`tblstudent` u
                          WHERE l.`USERID`=u.`IDNO`" ;
                         

                  $mydb->setQuery($sql);
                  $res = $mydb->executeQuery();
                  $row_count = $mydb->num_rows($res);
                  $cur = $mydb->loadResultList();
                 
                    if ($row_count > 0){
                            foreach ($cur as $result) {
                                   ?>
                                  <tr> 
                                   <td><?php echo $result->FNAME . ' '. $result->LNAME;?></td>
                                     <td><?php echo $result->LOGDATETIME;?></td>
                                    <td><span class="badge"><?php echo $result->LOGROLE;?></span></td>
                                    <td><span class="badge"><?php echo $result->LOGMODE;?></span></td> 
                                  </tr>
                                  <?php 
                                    
                      } 

                      }
                }else{

                   if ($_POST['Users']=='Registrar' ||  $_POST['Users']=='Registrar') {
                # code...
                  $sql ="SELECT * FROM `tbllogs`  l ,`useraccounts` u
                      WHERE l.`USERID`=u.`ACCOUNT_ID` AND  LOGROLE LIKE '%" . $_POST['Users'] ."%'" ;
                     

                  $mydb->setQuery($sql);
                  $res = $mydb->executeQuery();
                  $row_count = $mydb->num_rows($res);
                  $cur = $mydb->loadResultList();
                 
                    if ($row_count > 0){
                            foreach ($cur as $result) {
                                   ?>
                                  <tr> 
                                   <td><?php echo $result->ACCOUNT_NAME;?></td>
                                     <td><?php echo $result->LOGDATETIME;?></td>
                                    <td><span class="badge"><?php echo $result->LOGROLE;?></span></td>
                                    <td><span class="badge"><?php echo $result->LOGMODE;?></span></td> 
                                  </tr>
                                  <?php 
                                    
                      } 

                      }
                  }else{
                     # code...
                      $sql ="SELECT * FROM `tbllogs`  l ,`tblstudent` u
                          WHERE l.`USERID`=u.`IDNO` AND  LOGROLE LIKE '%" . $_POST['Users'] ."%'" ;
                         

                  $mydb->setQuery($sql);
                  $res = $mydb->executeQuery();
                  $row_count = $mydb->num_rows($res);
                  $cur = $mydb->loadResultList();
                 
                    if ($row_count > 0){
                            foreach ($cur as $result) {
                                   ?>
                                  <tr> 
                                   <td><?php echo $result->FNAME . ' '. $result->LNAME;?></td>
                                     <td><?php echo $result->LOGDATETIME;?></td>
                                    <td><span class="badge"><?php echo $result->LOGROLE;?></span></td>
                                    <td><span class="badge"><?php echo $result->LOGMODE;?></span></td> 
                                  </tr>
                                  <?php 
                                    
                      } 

                      }
                  } 

                }  
            ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
      <!-- Footer -->
      <div class="row footer">
        <div class="col-xs-12">
          <p>Generated by Benguet State University - Bokod Campus</p>
          <p>Printed on: <?php echo date('F j, Y \a\t g:i A'); ?></p>
        </div>
      </div>
      
        <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>