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

.campus-badge {
  background: linear-gradient(135deg, #667eea, #764ba2);
  color: #fff;
  padding: 6px 12px;
  border-radius: 18px;
  font-weight: 700;
  margin-left: 8px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.school-seal {
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

/* Status badges */
.status-active {
  background: linear-gradient(135deg, #27ae60, #219653);
  color: white;
  padding: 6px 12px;
  border-radius: 12px;
  font-size: 12px;
  font-weight: 600;
  display: inline-block;
}

.status-inactive {
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

/* Stats Card */
.stats-card {
  background: linear-gradient(135deg, #27ae60, #219653);
  color: white;
  padding: 25px;
  border-radius: 12px;
  text-align: center;
  margin-top: 20px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.stats-number {
  font-size: 32px;
  font-weight: 700;
  display: block;
  margin-bottom: 5px;
}

.stats-label {
  font-size: 16px;
  opacity: 0.9;
  font-weight: 600;
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

/* Filter row styling */
.filter-row {
  display: flex;
  gap: 15px;
  align-items: flex-end;
  flex-wrap: wrap;
}

.filter-row .form-group {
  min-width: 200px;
  flex: 1;
}

/* Responsive styling */
@media (max-width: 767px) {
  .page-header-row {
    flex-direction: column;
    align-items: flex-start;
  }
  .school-seal {
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
  .filter-row {
    flex-direction: column;
    align-items: stretch;
  }
  .filter-row .form-group {
    min-width: 100%;
  }
}

.text-muted {
  color: #6c757d !important;
}
</style>

<div class="row">
  <div class="col-lg-12">
    <div class="page-header-row">
      <div>
        <h2 class="title">
          Student Enrollment List
          <span class="campus-badge">BSU Bokod</span>
        </h2>
        <p class="text-muted" style="margin:0">Manage and view all student enrollment records.</p>
      </div>
      <div style="text-align:right;">
        <img src="<?php echo web_root; ?>img/school_seal_100x100.png" alt="School Seal" class="school-seal" loading="lazy">
      </div>
    </div>
  </div>
</div>

<!-- Main Form for Filtering -->
<form action="" method="POST" id="filterForm">
  <!-- Filter Section -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="filter-header">
          <h3><i class="fa fa-filter"></i> Filter Students</h3>
        </div>
        <div class="card-body">
          <div class="filter-row">
            <div class="form-group">
              <label><i class="fa fa-graduation-cap"></i> Course and Year</label>
              <select name="Course" class="form-control">
                <option value="All">All Courses</option>
                <?php
                  $mydb->setQuery("SELECT * FROM `course` ");
                  $cur = $mydb->loadResultList();
                  foreach ($cur as $result) {
                    $selected = (isset($_POST['Course']) && $_POST['Course'] == $result->COURSE_NAME.'-'.$result->COURSE_LEVEL) ? 'selected' : '';
                    echo '<option value="'.$result->COURSE_NAME.'-'.$result->COURSE_LEVEL.'" '.$selected.'>'.$result->COURSE_NAME.'-'.$result->COURSE_LEVEL.'</option>';
                  }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label><i class="fa fa-calendar-alt"></i> Semester</label>
              <select name="Semester" class="form-control">
                <option value="First" <?php echo (isset($_POST['Semester']) && $_POST['Semester'] == 'First') ? 'selected' : ''; ?>>First Semester</option>
                <option value="Second" <?php echo (isset($_POST['Semester']) && $_POST['Semester'] == 'Second') ? 'selected' : ''; ?>>Second Semester</option>
              </select>
            </div>

            <div class="form-group">
              <label><i class="fa fa-calendar"></i> Academic Year</label>
              <select name="SY" class="form-control">
                <?php
                  $mydb->setQuery("SELECT distinct(`AY`) FROM `schoolyr`");
                  $cur = $mydb->loadResultList();
                  foreach ($cur as $result) {
                    $selected = (isset($_POST['SY']) && $_POST['SY'] == $result->AY) ? 'selected' : '';
                    echo '<option '.$selected.'>'.$result->AY.'</option>';
                  }
                ?>
              </select>
            </div>

            <div class="form-group" style="min-width:150px;">
              <button type="submit" name="submit" class="btn btn-success" style="width:100%;">
                <i class="fa fa-search"></i> Generate Report
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<!-- Results Section -->
<?php if(isset($_POST['submit'])): ?>
<div class="row">
  <div class="col-xs-12">
    <div class="card">
      <div class="results-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
          <div>
            <h3><i class="fa fa-users"></i> Student List</h3>
            <small style="opacity: 0.9;">
              <?php echo (isset($_POST['Course']) && $_POST['Course'] != 'All') ? 'Course: ' . $_POST['Course'] . ' | ' : 'All Courses | '; ?>
              <?php echo (isset($_POST['Semester'])) ? 'Semester: ' . $_POST['Semester'] . ' | ' : ''; ?>
              <?php echo (isset($_POST['SY'])) ? 'Academic Year: ' . $_POST['SY'] : ''; ?>
            </small>
          </div>
          <div>
            <span style="background: rgba(255,255,255,0.2); padding: 5px 15px; border-radius: 15px; font-size: 12px;">
              <i class="fa fa-database"></i> Student Records
            </span>
          </div>
        </div>
      </div>
      <div class="card-body" style="padding: 0;">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
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
                if(isset($_POST['submit'])){

                  if ($_POST['Course']=='All') {
                    $sql ="SELECT * FROM schoolyr sy, `tblstudent`  s ,`course` c 
                          WHERE sy.IDNO=s.IDNO AND s.`COURSE_ID`=c.`COURSE_ID`
                          AND s.SEMESTER  LIKE '%" . $_POST['Semester'] ."%'  AND sy.AY = '" .$_POST['SY']. "'";
                    $mydb->setQuery($sql);
                    $res = $mydb->executeQuery();
                    $row_count = $mydb->num_rows($res);
                    $cur = $mydb->loadResultList();

                    if ($row_count > 0){
                      foreach ($cur as $result) {
                        $dbirth =  date($result->BDAY);
                        $today = date('Y-M-d');
                        $age = date_diff(date_create($dbirth),date_create($today))->y;
                        $status_class = ($result->student_status == 'Active') ? 'status-active' : 'status-inactive';
                        ?>
                        <tr>
                          <td><strong><?php echo $result->IDNO;?></strong></td>
                          <td><?php echo $result->FNAME . ' ' .  $result->MNAME . '  ' .  $result->LNAME;?></td>
                          <td><?php echo $result->HOME_ADD;?></td>
                          <td><?php echo $result->SEX;?></td>
                          <td><?php echo $age;?></td>
                          <td><?php echo $result->CONTACT_NO;?></td>
                          <td><?php echo $result->STATUS;?></td>
                          <td><span style="font-weight:600;"><?php echo $result->COURSE_NAME .'-'.$result->COURSE_LEVEL;?></span></td>
                          <td>
                            <span class="<?php echo $status_class; ?>">
                              <?php echo $result->student_status;?>
                            </span>
                          </td>
                        </tr>
                        <?php
                        $tot =  count($cur);
                      }
                    }

                  } else {
                    $sql ="SELECT * FROM `schoolyr` sy, `tblstudent`  s ,`course` c 
                          WHERE sy.`IDNO`=s.`IDNO` AND s.`COURSE_ID`=c.`COURSE_ID` AND CONCAT(COURSE_NAME,'-',COURSE_LEVEL) LIKE '%" . $_POST['Course'] ."%' 
                          AND sy.SEMESTER  LIKE '%" . $_POST['Semester'] ."%'  AND sy.AY = '" .$_POST['SY']. "'";
                    $mydb->setQuery($sql);
                    $res = $mydb->executeQuery();
                    $row_count = $mydb->num_rows($res);
                    $cur = $mydb->loadResultList();

                    if ($row_count > 0){
                      foreach ($cur as $result) {
                        $dbirth =  date($result->BDAY);
                        $today = date('Y-M-d');
                        $age = date_diff(date_create($dbirth),date_create($today))->y;
                        $status_class = ($result->student_status == 'Active') ? 'status-active' : 'status-inactive';
                        ?>
                        <tr>
                          <td><strong><?php echo $result->IDNO;?></strong></td>
                          <td><?php echo $result->FNAME . ' ' .  $result->MNAME . '  ' .  $result->LNAME;?></td>
                          <td><?php echo $result->HOME_ADD;?></td>
                          <td><?php echo $result->SEX;?></td>
                          <td><?php echo $age;?></td>
                          <td><?php echo $result->CONTACT_NO;?></td>
                          <td><?php echo $result->STATUS;?></td>
                          <td><span style="font-weight:600;"><?php echo $result->COURSE_NAME .'-'.$result->COURSE_LEVEL;?></span></td>
                          <td>
                            <span class="<?php echo $status_class; ?>">
                              <?php echo $result->student_status;?>
                            </span>
                          </td>
                        </tr>
                        <?php
                        $tot =  count($cur);
                      }
                    }
                  }

                } // end submit
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Student Count -->
<?php if($tot > 0): ?>
<div class="stats-card">
  <span class="stats-number"><?php echo $tot; ?></span>
  <span class="stats-label">Total Students Found</span>
</div>
<?php endif; ?>

<!-- Print Form (Separate form for printing) -->
<form action="ListStudentPrint.php" method="POST" target="_blank" id="printForm">
  <input type="hidden" name="Course" value="<?php echo $_POST['Course']; ?>">
  <input type="hidden" name="Semester" value="<?php echo $_POST['Semester']; ?>">
  <input type="hidden" name="SY" value="<?php echo $_POST['SY']; ?>">
</form>

<!-- Sticky Print Button -->
<div class="sticky-print">
  <button type="button" class="btn btn-success" onclick="document.getElementById('printForm').submit();">
    <i class="fa fa-print"></i> Generate Printable Report
  </button>
</div>

<?php else: ?>
<!-- Empty state when no filter applied -->
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="empty-state">
      <i class="fa fa-users"></i>
      <h3>Ready to View Student List?</h3>
      <p>Select your filters above and click "Generate Report" to view student enrollment data.</p>
    </div>
  </div>
</div>
<?php endif; ?>

<!-- DataTables init (UI only) -->
<script>
  (function($) {
    $(document).ready(function() {
      if ($.fn.DataTable) {
        $('#dash-table').DataTable({
          responsive: true,
          pageLength: 25,
          order: [[1, 'asc']],
          columnDefs: [{ orderable: false, targets: -1 }],
          language: { 
            searchPlaceholder: "Search students...", 
            search: "",
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            infoEmpty: "No entries available",
            paginate: {
              first: "First",
              last: "Last",
              next: "Next",
              previous: "Previous"
            }
          },
          dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
               '<"row"<"col-sm-12"tr>>' +
               '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
          deferRender: true
        });
      }
    });
  })(jQuery);
</script>