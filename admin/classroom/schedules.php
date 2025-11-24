<?php
if (!isset($_SESSION['ACCOUNT_ID'])){
  redirect(web_root."admin/index.php");
}

// Ensure the user has appropriate role to access this page
if ($_SESSION['ACCOUNT_TYPE'] !== 'Registrar' && 
    $_SESSION['ACCOUNT_TYPE'] !== 'Registrar' && 
    $_SESSION['ACCOUNT_TYPE'] !== 'Chairperson') {
    
    // Redirect or show an error message if the user does not have permission
    message("You do not have permission to access this page.", "error");
    redirect("index.php");  // Redirect to a safe page
}
?>
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

.schedule-badge {
  background: linear-gradient(135deg, #667eea, #764ba2);
  color: #fff;
  padding: 6px 12px;
  border-radius: 18px;
  font-weight: 700;
  margin-left: 8px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.schedule-seal {
  max-width: 80px;
  height: auto;
  display: block;
}

/* ===== Modernized Filter Card Styling ===== */
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

.card-body .btn-primary {
  background: linear-gradient(135deg, #27ae60, #219653);
}

.card-body .btn-primary:hover {
  background: linear-gradient(135deg, #219653, #1e8449);
  transform: translateY(-1px);
  box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}

/* Print Button Styling */
.btn-print {
  background: linear-gradient(135deg, #3498db, #2980b9);
  border: none;
  border-radius: 8px;
  font-weight: 600;
  padding: 8px 16px;
  transition: all 0.2s ease;
  color: white;
}

.btn-print:hover {
  background: linear-gradient(135deg, #2980b9, #2471a3);
  transform: translateY(-1px);
  box-shadow: 0 4px 8px rgba(0,0,0,0.15);
  color: white;
}

/* Results Header Styling */
.results-header {
  background: linear-gradient(135deg, #2c3e50, #34495e);
  color: #fff;
  padding: 15px 20px;
  border-radius: 12px;
  margin: 20px 0;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
}

.results-header h2 {
  margin: 0;
  font-size: 18px;
  font-weight: 600;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.results-header .filter-summary {
  background: rgba(255, 255, 255, 0.2);
  padding: 8px 12px;
  border-radius: 8px;
  font-size: 14px;
  font-weight: 500;
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

/* DataTable Customization */
.dataTables_wrapper {
  margin-top: 0;
}

.dataTables_length,
.dataTables_filter {
  margin-bottom: 15px;
}

.dataTables_filter input {
  border: 1px solid #e9ecef;
  border-radius: 6px;
  padding: 6px 12px;
  margin-left: 8px;
}

.dataTables_length select {
  border: 1px solid #e9ecef;
  border-radius: 6px;
  padding: 6px;
  margin: 0 8px;
}

.dataTables_info {
  color: #6c757d;
  font-size: 13px;
}

.dataTables_paginate .paginate_button {
  border: 1px solid #e9ecef !important;
  border-radius: 6px !important;
  margin: 0 2px;
  padding: 6px 12px !important;
}

.dataTables_paginate .paginate_button.current {
  background: linear-gradient(135deg, #667eea, #764ba2) !important;
  color: white !important;
  border: none !important;
}

/* Text colors for better readability */
.text-muted {
  color: #6c757d !important;
}

/* Schedule badges */
.time-badge {
  background: linear-gradient(135deg, #f39c12, #e67e22);
  color: white;
  padding: 4px 8px;
  border-radius: 12px;
  font-size: 12px;
  font-weight: 600;
}

.course-badge {
  background: linear-gradient(135deg, #1abc9c, #16a085);
  color: white;
  padding: 4px 8px;
  border-radius: 12px;
  font-size: 12px;
  font-weight: 600;
}

.room-badge {
  background: linear-gradient(135deg, #9b59b6, #8e44ad);
  color: white;
  padding: 4px 8px;
  border-radius: 12px;
  font-size: 12px;
  font-weight: 600;
}

.semester-badge {
  background: linear-gradient(135deg, #3498db, #2980b9);
  color: white;
  padding: 4px 8px;
  border-radius: 12px;
  font-size: 12px;
  font-weight: 600;
}

/* Form inline row styling */
.form-inline-row {
  display: flex;
  gap: 15px;
  align-items: flex-end;
  flex-wrap: wrap;
}

.form-inline-row .form-group {
  flex: 1;
  min-width: 180px;
}

.form-inline-row .form-group:last-child {
  flex: 0 0 auto;
}

/* Responsive styling */
@media (max-width: 767px) {
  .page-header-row {
    flex-direction: column;
    align-items: flex-start;
  }
  .schedule-seal {
    margin-top: 10px;
  }
  .table-responsive {
    border-radius: 8px;
  }
  .form-inline-row {
    flex-direction: column;
    align-items: stretch;
  }
  .form-inline-row .form-group {
    min-width: 100%;
  }
  .results-header h2 {
    flex-direction: column;
    gap: 10px;
    align-items: flex-start;
  }
}
</style>

<!-- Main content -->
<section class="content">

  <!-- Header row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header-row">
        <div>
          <h2 class="title">
            List Of Schedules
            <span class="schedule-badge">Filter</span>
          </h2>
          <p class="text-muted" style="margin:0;">Filter schedules by day/time/semester and view results below.</p>
        </div>
        <div style="text-align:right;">
          <img src="<?php echo web_root; ?>img/school_seal_100x100.png" alt="School Seal" class="schedule-seal" loading="lazy">
        </div>
      </div>
    </div>
  </div>

  <!-- Filter form -->
  <form action="" method="POST">
    <div class="card mb-3">
      <div class="card-body">
        <div class="form-inline-row">
          <div class="form-group">
            <label for="sched_day">Day(s)</label>
            <select name="sched_day" id="sched_day" class="form-control">
              <?php
                $mydb->setQuery("SELECT distinct(sched_day) FROM `tblschedule` ");
                $cur = $mydb->loadResultList();

                foreach ($cur as $result) {
                  $selected = (isset($_POST['sched_day']) && $_POST['sched_day'] == $result->sched_day) ? 'selected' : '';
                  echo '<option value="'.$result->sched_day.'" '.$selected.'>'.$result->sched_day.'</option>';
                }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label for="Semester">Semester</label>
            <select name="Semester" id="Semester" class="form-control">
              <option value="First" <?php echo (isset($_POST['Semester']) && $_POST['Semester'] == 'First') ? 'selected' : ''; ?>>First</option>
              <option value="Second" <?php echo (isset($_POST['Semester']) && $_POST['Semester'] == 'Second') ? 'selected' : ''; ?>>Second</option>
            </select>
          </div>

          <div class="form-group">
            <label for="sched_time">Time</label>
            <select name="sched_time" id="sched_time" class="form-control">
              <?php
                $mydb->setQuery("SELECT distinct(sched_time) FROM `tblschedule` ");
                $cur = $mydb->loadResultList();

                foreach ($cur as $result) {
                  $selected = (isset($_POST['sched_time']) && $_POST['sched_time'] == $result->sched_time) ? 'selected' : '';
                  echo '<option value="'.$result->sched_time.'" '.$selected.'>'.$result->sched_time.'</option>';
                }
              ?>
            </select>
          </div>

          <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary">
              <i class="fa fa-filter"></i> Filter Schedules
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Results section -->
    <?php if (isset($_POST['submit'])): ?>
      <!-- Filters summary & results header -->
      <div class="results-header">
        <h2>
          <i class="fa fa-list-alt"></i> Filtered Results
          <span class="filter-summary">
            <?php echo (isset($_POST['sched_day'])) ? 'Time: '.$_POST['sched_time']. ' | Days: ' .$_POST['sched_day'] : ''; ?>
            <?php echo (isset($_POST['Semester'])) ? ' | Semester: ' .$_POST['Semester'] : ''; ?>
          </span>
        </h2>
      </div>

      <!-- Results table -->
      <div class="table-responsive">
        <table id="dash-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Time</th>
              <th>Days</th>
              <th>Subject</th>
              <th>Semester</th>
              <th>School Year</th>
              <th>Course/Year</th>
              <th>Room</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if (isset($_POST['submit'])) {
                  $sql="SELECT * FROM `tblschedule` s, `course` c, subject subj
                  WHERE s.`COURSE_ID`=c.`COURSE_ID` AND s.SUBJ_ID=subj.SUBJ_ID
                  AND sched_day = '" . $_POST['sched_day'] ."'  AND sched_time='".$_POST['sched_time']."'
                  AND sched_semester  = '" . $_POST['Semester'] ."' ORDER BY sched_room asc";

                  $mydb->setQuery($sql);
                  $cur = $mydb->loadResultList();

                  foreach ($cur as $result) {
                    echo '<tr>';
                    echo '<td><span class="time-badge">'. $result->sched_time.'</span></td>';
                    echo '<td>'. $result->sched_day.'</td>';
                    echo '<td><strong>' . $result->SUBJ_CODE.'</strong></td>';
                    echo '<td><span class="semester-badge">'. $result->sched_semester.'</span></td>';
                    echo '<td>'. $result->sched_sy.'</td>';
                    echo '<td><span class="course-badge">' . $result->COURSE_NAME.' - Year ' . $result->COURSE_LEVEL.'</span></td>';
                    echo '<td><span class="room-badge">'. $result->sched_room.'</span></td>';
                    echo '</tr>';
                  }
              }
            ?>
          </tbody>
        </table>
      </div>

      <!-- Print form -->
      <form action="schedulesPrint.php" method="POST" target="_blank">
        <input type="hidden" name="sched_day" value="<?php echo (isset($_POST['sched_day'])) ? $_POST['sched_day'] : ''; ?>">
        <input type="hidden" name="Semester" value="<?php echo (isset($_POST['Semester'])) ? $_POST['Semester'] : ''; ?> ">
        <input type="hidden" name="sched_time" value="<?php echo (isset($_POST['sched_time'])) ? $_POST['sched_time'] : ''; ?>">

        <!-- Print button row -->
        <div class="row no-print" style="margin-top:20px;">
          <div class="col-xs-12 text-right">
            <button type="submit" name="submit" class="btn btn-print">
              <i class="fa fa-print"></i> Print Results
            </button>
          </div>
        </div>
      </form>
    <?php endif; ?>
  </form>

</section>

<!-- DataTables init -->
<script>
(function($){
  $(document).ready(function(){
    if ($.fn.DataTable) {
      $('#dash-table').DataTable({
        responsive: true,
        pageLength: 15,
        lengthMenu: [[10, 15, 25, 50], [10, 15, 25, 50]],
        order: [[0, 'asc']], // order by Time
        language: {
          searchPlaceholder: "Search schedule, course, room...",
          search: "",
          lengthMenu: "Show _MENU_ entries",
          info: "Showing _START_ to _END_ of _TOTAL_ entries",
          infoEmpty: "Showing 0 to 0 of 0 entries",
          infoFiltered: "(filtered from _MAX_ total entries)",
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
        initComplete: function() {
          // Add custom styling after DataTable initialization
          $('.dataTables_length select').addClass('form-control-sm');
          $('.dataTables_filter input').addClass('form-control-sm');
        }
      });
    }
  });
})(jQuery);
</script>