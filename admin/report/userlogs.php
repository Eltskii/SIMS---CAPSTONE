<style>
/* ===== Consistent Page Styling ===== */
.page-header-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 20px;
}

.page-header-row .title {
  margin: 0;
  font-size: 26px;
  font-weight: 700;
  color: #2c3e50;
}

.user-badge {
  background: linear-gradient(135deg, #667eea, #764ba2);
  color: #fff;
  padding: 6px 12px;
  border-radius: 18px;
  font-weight: 700;
  margin-left: 8px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.user-seal {
  max-width: 80px;
  height: auto;
  display: block;
}

/* ===== Modernized Card Styling ===== */
.card {
  border-radius: 12px;
  border: none;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  margin-bottom: 20px;
}

.card-body {
  background: #ffffff;
  border-radius: 12px;
  padding: 20px 25px;
  transition: box-shadow 0.2s ease;
}

.card-body label {
  color: #2c3e50;
  font-weight: 600;
  font-size: 14px;
  margin-bottom: 8px;
  display: block;
}

.card-body .form-select,
.card-body .form-control {
  border-radius: 8px;
  border: 1px solid #e9ecef;
  padding: 8px 12px;
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
  font-size: 14px;
}

.card-body .form-select:focus,
.card-body .form-control:focus {
  border-color: #667eea;
  box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
  outline: none;
}

.card-body .btn {
  border-radius: 8px;
  font-weight: 600;
  border: none;
  padding: 8px 16px;
  transition: all 0.2s ease;
  color: white;
}

.card-body .btn-success {
  background: linear-gradient(135deg, #27ae60, #219653);
}

.card-body .btn-secondary {
  background: linear-gradient(135deg, #95a5a6, #7f8c8d);
}

.card-body .btn-success:hover {
  background: linear-gradient(135deg, #219653, #1e8449);
  transform: translateY(-1px);
  box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}

.card-body .btn-secondary:hover {
  background: linear-gradient(135deg, #7f8c8d, #6c757d);
  transform: translateY(-1px);
  box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}

/* Table Styling - Updated to match theme */
.table-responsive {
  margin-top: 20px;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  overflow: hidden;
  border: none;
}

.table {
  margin-bottom: 0;
  border: none;
  font-size: 14px;
}

.table th {
  background: linear-gradient(135deg, #2c3e50, #34495e);
  color: #fff;
  text-align: center;
  font-weight: 600;
  border: none;
  padding: 16px 12px;
  font-size: 14px;
  letter-spacing: 0.5px;
}

.table td {
  vertical-align: middle;
  padding: 14px 12px;
  text-align: center;
  border-bottom: 1px solid #e9ecef;
  color: #495057;
}

.table-hover tbody tr:hover {
  background-color: #f8f9fa;
  transition: background-color 0.2s ease;
}

/* Action Buttons Styling */
.action-btn {
  margin-right: 6px;
  border: none;
  border-radius: 6px;
  font-weight: 600;
  font-size: 12px;
  padding: 6px 12px;
  transition: all 0.2s ease;
  color: white;
}

.action-btn:hover {
  transform: translateY(-1px);
  box-shadow: 0 4px 8px rgba(0,0,0,0.15);
  color: white;
}

.btn-primary {
  background: linear-gradient(135deg, #3498db, #2980b9);
}

.btn-danger {
  background: linear-gradient(135deg, #e74c3c, #c0392b);
}

.btn-disabled {
  background: linear-gradient(135deg, #95a5a6, #7f8c8d);
  cursor: not-allowed;
  opacity: 0.6;
}

.btn-primary:hover {
  background: linear-gradient(135deg, #2980b9, #2471a3);
}

.btn-danger:hover {
  background: linear-gradient(135deg, #c0392b, #a93226);
}

.btn-disabled:hover {
  background: linear-gradient(135deg, #95a5a6, #7f8c8d);
  transform: none;
  box-shadow: none;
}

/* Role-specific badges */
.role-admin {
  background: linear-gradient(135deg, #e74c3c, #c0392b);
  color: white;
  padding: 6px 12px;
  border-radius: 12px;
  font-size: 12px;
  font-weight: 600;
  display: inline-block;
}

.role-chairperson {
  background: linear-gradient(135deg, #9b59b6, #8e44ad);
  color: white;
  padding: 6px 12px;
  border-radius: 12px;
  font-size: 12px;
  font-weight: 600;
  display: inline-block;
}

.role-registrar {
  background: linear-gradient(135deg, #3498db, #2980b9);
  color: white;
  padding: 6px 12px;
  border-radius: 12px;
  font-size: 12px;
  font-weight: 600;
  display: inline-block;
}

.role-student {
  background: linear-gradient(135deg, #1abc9c, #16a085);
  color: white;
  padding: 6px 12px;
  border-radius: 12px;
  font-size: 12px;
  font-weight: 600;
  display: inline-block;
}

/* Log mode badges */
.badge-login {
  background: linear-gradient(135deg, #27ae60, #219653);
  color: white;
  padding: 6px 12px;
  border-radius: 12px;
  font-size: 12px;
  font-weight: 600;
  display: inline-block;
}

.badge-logout {
  background: linear-gradient(135deg, #e74c3c, #c0392b);
  color: white;
  padding: 6px 12px;
  border-radius: 12px;
  font-size: 12px;
  font-weight: 600;
  display: inline-block;
}

/* Sticky Print Button */
.sticky-print {
  position: fixed;
  bottom: 20px;
  right: 20px;
  z-index: 1000;
}

.sticky-print .btn {
  border-radius: 8px;
  font-weight: 600;
  border: none;
  padding: 10px 20px;
  transition: all 0.2s ease;
  color: white;
  background: linear-gradient(135deg, #27ae60, #219653);
  box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.sticky-print .btn:hover {
  background: linear-gradient(135deg, #219653, #1e8449);
  transform: translateY(-2px);
  box-shadow: 0 6px 15px rgba(0,0,0,0.2);
}

/* Filter Section Styling */
.filter-header {
  background: linear-gradient(135deg, #2c3e50, #34495e);
  color: #fff;
  padding: 15px 20px;
  border-radius: 12px 12px 0 0;
  border: none;
}

.filter-header h3 {
  margin: 0;
  font-size: 18px;
  font-weight: 600;
}

/* Results Header Styling */
.results-header {
  background: linear-gradient(135deg, #2c3e50, #34495e);
  color: #fff;
  padding: 15px 20px;
  border-radius: 12px 12px 0 0;
  border: none;
}

.results-header h3 {
  margin: 0;
  font-size: 18px;
  font-weight: 600;
}

/* User avatar styling */
.user-avatar {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-right: 12px;
  color: white;
  font-weight: bold;
  font-size: 16px;
}

.avatar-admin {
  background: linear-gradient(135deg, #e74c3c, #c0392b);
}

.avatar-registrar {
  background: linear-gradient(135deg, #3498db, #2980b9);
}

.avatar-chairperson {
  background: linear-gradient(135deg, #9b59b6, #8e44ad);
}

.avatar-student {
  background: linear-gradient(135deg, #1abc9c, #16a085);
}

/* Empty state styling */
.empty-state {
  text-align: center;
  padding: 60px 20px;
  color: #6c757d;
}

.empty-state i {
  font-size: 64px;
  margin-bottom: 20px;
  opacity: 0.5;
}

.empty-state h3 {
  color: #6c757d;
  margin-bottom: 15px;
}

.empty-state p {
  font-size: 16px;
  max-width: 500px;
  margin: 0 auto;
}

/* Responsive styling */
@media (max-width: 767px) {
  .page-header-row {
    flex-direction: column;
    align-items: flex-start;
  }
  .user-seal {
    margin-top: 10px;
  }
  .table-responsive {
    border-radius: 8px;
  }
  .sticky-print {
    bottom: 10px;
    right: 10px;
  }
  .sticky-print .btn {
    padding: 8px 16px;
    font-size: 14px;
  }
}
</style>

<div class="row">
  <div class="col-lg-12">
    <div class="page-header-row">
      <div>
        <h2 class="title">
          User Activity Logs
          <span class="user-badge">Logs</span>
        </h2>
        <p class="text-muted" style="margin:0">Monitor and track all user activities within the system.</p>
      </div>
      <div style="text-align:right;">
        <img src="<?php echo web_root; ?>img/school_seal_100x100.png" alt="School Seal" class="user-seal" loading="lazy">
      </div>
    </div>
  </div>
</div>

<!-- Main Form for Filtering -->
<form action="" method="POST" id="filterForm">
  <!-- Filter Section -->
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="filter-header">
          <h3><i class="fa fa-filter"></i> Filter User Logs</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Select User Type</label>
                <select name="Users" class="form-control">
                  <option value="All" <?php echo (isset($_POST['Users']) && $_POST['Users'] == 'All') ? 'selected' : ''; ?>>All Users</option>
                  <option value="Registrar" <?php echo (isset($_POST['Users']) && $_POST['Users'] == 'Registrar') ? 'selected' : ''; ?>>Administrator</option>
                  <option value="Registrar" <?php echo (isset($_POST['Users']) && $_POST['Users'] == 'Registrar') ? 'selected' : ''; ?>>Registrar</option>
                  <option value="Chairperson" <?php echo (isset($_POST['Users']) && $_POST['Users'] == 'Chairperson') ? 'selected' : ''; ?>>Chairperson</option>
                  <option value="Student" <?php echo (isset($_POST['Users']) && $_POST['Users'] == 'Student') ? 'selected' : ''; ?>>Student</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6" style="display: flex; align-items: flex-end; gap: 10px;">
              <button type="submit" name="submit" class="btn btn-success">
                <i class="fa fa-search"></i> Apply Filter
              </button>
              <?php if(isset($_POST['submit'])): ?>
              <a href="userlogs.php" class="btn btn-secondary">
                <i class="fa fa-refresh"></i> Reset
              </a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<!-- Results Section (Outside the form to avoid conflicts) -->
<?php if(isset($_POST['submit'])): ?>
<div class="row">
  <div class="col-xs-12">
    <div class="card">
      <div class="results-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
          <div>
            <h3><i class="fa fa-list-alt"></i> Activity Logs</h3>
            <?php if(isset($_POST['Users']) && $_POST['Users'] != 'All'): ?>
            <small style="opacity: 0.9;">Currently viewing: <?php echo $_POST['Users']; ?> logs</small>
            <?php endif; ?>
          </div>
          <div>
            <span style="background: rgba(255,255,255,0.2); padding: 5px 15px; border-radius: 15px; font-size: 12px;">
              <i class="fa fa-database"></i> Activity Records
            </span>
          </div>
        </div>
      </div>
      <div class="card-body" style="padding: 0;">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>User Name</th>
                <th>Date & Time</th>
                <th>User Role</th>
                <th>Activity</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if(isset($_POST['submit'])){ 
                if ($_POST['Users']=="All") {
                  // User accounts (Administrator, Registrar, Chairperson)
                  $sql ="SELECT * FROM `tbllogs` l, `useraccounts` u WHERE l.`USERID`=u.`ACCOUNT_ID`";
                  $mydb->setQuery($sql);
                  $res = $mydb->executeQuery();
                  $row_count = $mydb->num_rows($res);
                  $cur = $mydb->loadResultList();
                  
                  if ($row_count > 0){
                    foreach ($cur as $result) {
                      // Determine badge class and avatar based on user role
                      $role_class = 'role-student';
                      $avatar_class = 'avatar-student';
                      if ($result->LOGROLE == 'Registrar') {
                        $role_class = 'role-admin';
                        $avatar_class = 'avatar-admin';
                      } elseif ($result->LOGROLE == 'Registrar') {
                        $role_class = 'role-registrar';
                        $avatar_class = 'avatar-registrar';
                      } elseif ($result->LOGROLE == 'Chairperson') {
                        $role_class = 'role-chairperson';
                        $avatar_class = 'avatar-chairperson';
                      }
                      
                      $log_badge = ($result->LOGMODE == 'Login') ? 'badge-login' : 'badge-logout';
                      ?>
                      <tr> 
                        <td>
                          <div style="display: flex; align-items: center; justify-content: center;">
                            <div class="user-avatar <?php echo $avatar_class; ?>">
                              <?php echo strtoupper(substr($result->ACCOUNT_NAME, 0, 1)); ?>
                            </div>
                            <?php echo $result->ACCOUNT_NAME; ?>
                          </div>
                        </td>
                        <td>
                          <i class="fa fa-clock-o" style="margin-right: 5px; color: #6c757d;"></i>
                          <?php echo date('M j, Y g:i A', strtotime($result->LOGDATETIME)); ?>
                        </td>
                        <td>
                          <span class="<?php echo $role_class; ?>">
                            <?php echo $result->LOGROLE; ?>
                          </span>
                        </td>
                        <td>
                          <span class="<?php echo $log_badge; ?>">
                            <i class="fa fa-<?php echo ($result->LOGMODE == 'Login') ? 'sign-in' : 'sign-out'; ?>"></i>
                            <?php echo $result->LOGMODE; ?>
                          </span>
                        </td>
                      </tr>
                      <?php 
                    } 
                  }
                  
                  // Student accounts
                  $sql ="SELECT * FROM `tbllogs` l, `tblstudent` u WHERE l.`USERID`=u.`IDNO`";
                  $mydb->setQuery($sql);
                  $res = $mydb->executeQuery();
                  $row_count = $mydb->num_rows($res);
                  $cur = $mydb->loadResultList();
                  
                  if ($row_count > 0){
                    foreach ($cur as $result) {
                      $log_badge = ($result->LOGMODE == 'Login') ? 'badge-login' : 'badge-logout';
                      ?>
                      <tr> 
                        <td>
                          <div style="display: flex; align-items: center; justify-content: center;">
                            <div class="user-avatar avatar-student">
                              <?php echo strtoupper(substr($result->FNAME, 0, 1)); ?>
                            </div>
                            <?php echo $result->FNAME . ' ' . $result->LNAME; ?>
                          </div>
                        </td>
                        <td>
                          <i class="fa fa-clock-o" style="margin-right: 5px; color: #6c757d;"></i>
                          <?php echo date('M j, Y g:i A', strtotime($result->LOGDATETIME)); ?>
                        </td>
                        <td>
                          <span class="role-student">
                            <?php echo $result->LOGROLE; ?>
                          </span>
                        </td>
                        <td>
                          <span class="<?php echo $log_badge; ?>">
                            <i class="fa fa-<?php echo ($result->LOGMODE == 'Login') ? 'sign-in' : 'sign-out'; ?>"></i>
                            <?php echo $result->LOGMODE; ?>
                          </span>
                        </td>
                      </tr>
                      <?php 
                    } 
                  }
                } else {
                  if ($_POST['Users']=='Registrar' || $_POST['Users']=='Registrar' || $_POST['Users']=='Chairperson') {
                    $sql ="SELECT * FROM `tbllogs` l, `useraccounts` u WHERE l.`USERID`=u.`ACCOUNT_ID` AND LOGROLE LIKE '%" . $_POST['Users'] . "%'";
                    $mydb->setQuery($sql);
                    $res = $mydb->executeQuery();
                    $row_count = $mydb->num_rows($res);
                    $cur = $mydb->loadResultList();
                    
                    if ($row_count > 0){
                      foreach ($cur as $result) {
                        $role_class = 'role-student';
                        $avatar_class = 'avatar-student';
                        if ($result->LOGROLE == 'Registrar') {
                          $role_class = 'role-admin';
                          $avatar_class = 'avatar-admin';
                        } elseif ($result->LOGROLE == 'Registrar') {
                          $role_class = 'role-registrar';
                          $avatar_class = 'avatar-registrar';
                        } elseif ($result->LOGROLE == 'Chairperson') {
                          $role_class = 'role-chairperson';
                          $avatar_class = 'avatar-chairperson';
                        }
                        
                        $log_badge = ($result->LOGMODE == 'Login') ? 'badge-login' : 'badge-logout';
                        ?>
                        <tr> 
                          <td>
                            <div style="display: flex; align-items: center; justify-content: center;">
                              <div class="user-avatar <?php echo $avatar_class; ?>">
                                <?php echo strtoupper(substr($result->ACCOUNT_NAME, 0, 1)); ?>
                              </div>
                              <?php echo $result->ACCOUNT_NAME; ?>
                            </div>
                          </td>
                          <td>
                            <i class="fa fa-clock-o" style="margin-right: 5px; color: #6c757d;"></i>
                            <?php echo date('M j, Y g:i A', strtotime($result->LOGDATETIME)); ?>
                          </td>
                          <td>
                            <span class="<?php echo $role_class; ?>">
                              <?php echo $result->LOGROLE; ?>
                            </span>
                          </td>
                          <td>
                            <span class="<?php echo $log_badge; ?>">
                              <i class="fa fa-<?php echo ($result->LOGMODE == 'Login') ? 'sign-in' : 'sign-out'; ?>"></i>
                              <?php echo $result->LOGMODE; ?>
                            </span>
                          </td>
                        </tr>
                        <?php 
                      } 
                    }
                  } else {
                    $sql ="SELECT * FROM `tbllogs` l, `tblstudent` u WHERE l.`USERID`=u.`IDNO` AND LOGROLE LIKE '%" . $_POST['Users'] . "%'";
                    $mydb->setQuery($sql);
                    $res = $mydb->executeQuery();
                    $row_count = $mydb->num_rows($res);
                    $cur = $mydb->loadResultList();
                    
                    if ($row_count > 0){
                      foreach ($cur as $result) {
                        $log_badge = ($result->LOGMODE == 'Login') ? 'badge-login' : 'badge-logout';
                        ?>
                        <tr> 
                          <td>
                            <div style="display: flex; align-items: center; justify-content: center;">
                              <div class="user-avatar avatar-student">
                                <?php echo strtoupper(substr($result->FNAME, 0, 1)); ?>
                              </div>
                              <?php echo $result->FNAME . ' ' . $result->LNAME; ?>
                            </div>
                          </td>
                          <td>
                            <i class="fa fa-clock-o" style="margin-right: 5px; color: #6c757d;"></i>
                            <?php echo date('M j, Y g:i A', strtotime($result->LOGDATETIME)); ?>
                          </td>
                          <td>
                            <span class="role-student">
                              <?php echo $result->LOGROLE; ?>
                            </span>
                          </td>
                          <td>
                            <span class="<?php echo $log_badge; ?>">
                              <i class="fa fa-<?php echo ($result->LOGMODE == 'Login') ? 'sign-in' : 'sign-out'; ?>"></i>
                              <?php echo $result->LOGMODE; ?>
                            </span>
                          </td>
                        </tr>
                        <?php 
                      } 
                    }
                  } 
                } 
              } 
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Print Form (Separate form for printing) -->
<form action="printlogs.php" method="POST" target="_blank" id="printForm">
  <input type="hidden" name="Users" value="<?php echo $_POST['Users']; ?>">
</form>

<!-- Sticky Print Button -->
<div class="sticky-print">
  <button type="button" class="btn btn-success" onclick="document.getElementById('printForm').submit();">
    <i class="fa fa-print"></i> Print Report
  </button>
</div>
<?php else: ?>
<!-- Empty state when no filter applied -->
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="empty-state">
      <i class="fa fa-search"></i>
      <h3>Ready to Explore User Logs?</h3>
      <p>Select a user type from the filter above and click "Apply Filter" to view the activity logs.</p>
    </div>
  </div>
</div>
<?php endif; ?>