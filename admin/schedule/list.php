<?php
if (!isset($_SESSION['ACCOUNT_ID'])){
  redirect(web_root."admin/index.php");
}

// Ensure the user has appropriate role to access this page
if ($_SESSION['ACCOUNT_TYPE'] !== 'Registrar' && 
    $_SESSION['ACCOUNT_TYPE'] !== 'Registrar' && 
    $_SESSION['ACCOUNT_TYPE'] !== 'Chairperson' &&
    $_SESSION['ACCOUNT_TYPE'] !== 'Instructor') {
    
    // Redirect or show an error message if the user does not have permission
    message("You do not have permission to access this page.", "error");
    redirect("index.php");  // Redirect to a safe page
}


// -----------------------------
// Load filter option data
// -----------------------------
$courses = [];
$levels = [];
$rooms = [];
$semesters = [];

try {
    // Filter courses by department for Chairpersons
    $courseSql = "SELECT COURSE_ID, COURSE_NAME, COURSE_LEVEL, COURSE_MAJOR FROM `course`";
    if (isChairperson()) {
        $chairDeptId = getCurrentDepartmentId();
        if ($chairDeptId) {
            $courseSql .= " WHERE DEPT_ID = " . intval($chairDeptId);
        }
    }
    $courseSql .= " ORDER BY COURSE_NAME, COURSE_MAJOR ASC";
    $mydb->setQuery($courseSql);
    $courses = $mydb->loadResultList();
} catch (Exception $e) {
    error_log("Course fetch failed: " . $e->getMessage());
    $courses = [];
}

try {
    $mydb->setQuery("SELECT DISTINCT COURSE_LEVEL FROM `course` ORDER BY COURSE_LEVEL ASC");
    $lvlRows = $mydb->loadResultList();
    if (is_array($lvlRows)) {
        foreach ($lvlRows as $r) {
            $val = is_object($r) ? ($r->COURSE_LEVEL ?? null) : ($r['COURSE_LEVEL'] ?? null);
            if ($val !== null && $val !== '') $levels[] = $val;
        }
    }
} catch (Exception $e) {
    error_log("Course level fetch failed: " . $e->getMessage());
    $levels = [];
}

try {
    $mydb->setQuery("SELECT DISTINCT sched_room FROM `tblschedule` ORDER BY sched_room ASC");
    $roomRows = $mydb->loadResultList();
    if (is_array($roomRows)) {
        foreach ($roomRows as $r) {
            $val = is_object($r) ? ($r->sched_room ?? null) : ($r['sched_room'] ?? null);
            if ($val !== null && $val !== '') $rooms[] = $val;
        }
    }
} catch (Exception $e) {
    error_log("Room fetch failed: " . $e->getMessage());
    $rooms = [];
}

try {
    $mydb->setQuery("SELECT DISTINCT sched_semester FROM `tblschedule` ORDER BY sched_semester ASC");
    $semRows = $mydb->loadResultList();
    if (is_array($semRows)) {
        foreach ($semRows as $r) {
            $val = is_object($r) ? ($r->sched_semester ?? null) : ($r['sched_semester'] ?? null);
            if ($val !== null && $val !== '') $semesters[] = $val;
        }
    }
} catch (Exception $e) {
    error_log("Semester fetch failed: " . $e->getMessage());
    $semesters = [];
}

// -----------------------------
// Read selected filters (GET)
// -----------------------------
$selected_course = isset($_GET['course']) ? intval($_GET['course']) : 0;
$selected_year   = isset($_GET['year']) ? intval($_GET['year']) : 0;
$selected_room_raw = isset($_GET['room']) ? (string)$_GET['room'] : '';
$selected_semester_raw = isset($_GET['semester']) ? (string)$_GET['semester'] : '';

// sanitize room and semester by matching available values (defensive)
$selected_room = '';
if ($selected_room_raw !== '') {
    foreach ($rooms as $r) {
        if ((string)$r === $selected_room_raw) { $selected_room = $selected_room_raw; break; }
    }
}
$selected_semester = '';
if ($selected_semester_raw !== '') {
    foreach ($semesters as $s) {
        if ((string)$s === $selected_semester_raw) { $selected_semester = $selected_semester_raw; break; }
    }
}

// -----------------------------
// Build SQL with optional filters
// -----------------------------
$optClauses = [];

// Apply department filtering for Chairpersons
if (isChairperson()) {
    $chairDeptId = getCurrentDepartmentId();
    if ($chairDeptId) {
        $optClauses[] = "c.DEPT_ID = " . intval($chairDeptId);
    }
}

// Apply instructor filtering for Instructors
if ($_SESSION['ACCOUNT_TYPE'] === 'Instructor') {
    $instructorId = isset($_SESSION['EMPID']) ? intval($_SESSION['EMPID']) : 0;
    if ($instructorId > 0) {
        $optClauses[] = "s.INST_ID = " . $instructorId;
    }
}

if ($selected_course > 0) { $optClauses[] = "s.COURSE_ID = " . intval($selected_course); }
if ($selected_year > 0)   { $optClauses[] = "c.COURSE_LEVEL = " . intval($selected_year); }
if ($selected_room !== '') { $optClauses[] = "s.sched_room = '" . addslashes($selected_room) . "'"; }
if ($selected_semester !== '') { $optClauses[] = "s.sched_semester = '" . addslashes($selected_semester) . "'"; }

$cur = [];
$schedCount = 0;
try {
    // Use explicit JOINs for clarity
    $sql = "SELECT s.*, i.INST_NAME, c.COURSE_NAME, c.COURSE_LEVEL, subj.SUBJ_CODE
              FROM `tblschedule` s
              JOIN `tblinstructor` i ON i.INST_ID = s.INST_ID
              JOIN `course` c ON s.COURSE_ID = c.COURSE_ID
              JOIN `subject` subj ON s.SUBJ_ID = subj.SUBJ_ID";

    if (!empty($optClauses)) {
        $sql .= " WHERE " . implode(" AND ", $optClauses);
    }

    $sql .= " ORDER BY s.sched_time ASC, c.COURSE_NAME ASC";

    $mydb->setQuery($sql);
    $cur = $mydb->loadResultList();
    $schedCount = is_array($cur) ? count($cur) : 0;
} catch (Exception $e) {
    error_log("Schedule query failed: " . $e->getMessage() . " SQL: " . ($sql ?? ''));
    $cur = [];
    $schedCount = 0;
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
  width: -webkit-fill-available;
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

/* New Schedule Button */
.btn-primary.btn-xs {
  background: linear-gradient(135deg, #27ae60, #219653);
  border: none;
  border-radius: 6px;
  font-weight: 600;
  padding: 8px 16px;
  transition: all 0.2s ease;
  color: white;
  margin-left: 10px;
}

.btn-primary.btn-xs:hover {
  background: linear-gradient(135deg, #219653, #1e8449);
  transform: translateY(-1px);
  box-shadow: 0 4px 8px rgba(0,0,0,0.15);
  color: white;
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

.btn-primary:hover {
  background: linear-gradient(135deg, #2980b9, #2471a3);
}

.btn-danger:hover {
  background: linear-gradient(135deg, #c0392b, #a93226);
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
  font-size: 10px;
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

.instructor-badge {
  background: linear-gradient(135deg, #3498db, #2980b9);
  color: white;
  padding: 4px 8px;
  border-radius: 12px;
  font-size: 12px;
  font-weight: 600;
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
  .action-btn {
    display: block;
    width: 100%;
    margin-bottom: 5px;
  }
  .card-body .btn {
    width: 100%;
    margin-bottom: 8px;
  }
}
</style>

<div class="row">
  <div class="col-lg-12">
    <div class="page-header-row">
      <div>
        <h2 class="title">
          <?php echo ($_SESSION['ACCOUNT_TYPE'] === 'Instructor') ? 'My Teaching Schedule' : 'List of Schedule'; ?>
          <?php if ($_SESSION['ACCOUNT_TYPE'] !== 'Instructor'): ?>
          <a href="index.php?view=add" class="btn btn-primary btn-xs">
            <i class="fa fa-plus-circle fw-fa"></i> Set New Schedule
          </a>
          <?php endif; ?>
          <span class="schedule-badge"><?php echo intval($schedCount); ?></span>
        </h2>
        <p class="text-muted" style="margin:0"><?php echo ($_SESSION['ACCOUNT_TYPE'] === 'Instructor') ? 'View your assigned classes and students.' : 'Manage all schedules of the university.'; ?></p>
      </div>
      <div style="text-align:right;">
        <img src="<?php echo web_root; ?>img/school_seal_100x100.png" alt="School Seal" class="schedule-seal" loading="lazy">
      </div>
    </div>
  </div>
</div>

<?php
// preserve view param if present when building action URL
$actionBase = $_SERVER['PHP_SELF'];
if (isset($_GET['view'])) {
    $actionBase .= '?view=' . urlencode($_GET['view']);
}
?>

<!-- Filter Card: Course | Year | Room | Semester -->
<div class="card mb-3">
  <div class="card-body">
    <form method="get" action="<?php echo $actionBase; ?>" class="row g-3 align-items-end" role="search" aria-label="Schedule filters">
      <?php if (isset($_GET['view'])): ?>
        <input type="hidden" name="view" value="<?php echo htmlspecialchars($_GET['view']); ?>">
      <?php endif; ?>

      <div class="col-md-4 col-lg-3">
        <label for="course" class="form-label">Course</label>
        <select id="course" name="course" class="form-select">
          <option value="0">All Courses</option>
          <?php
            if (!empty($courses)) {
                foreach ($courses as $c) {
                    $c_id = is_object($c) ? ($c->COURSE_ID ?? '') : ($c['COURSE_ID'] ?? '');
                    $c_name = is_object($c) ? ($c->COURSE_NAME ?? '') : ($c['COURSE_NAME'] ?? '');
                    $c_level = is_object($c) ? ($c->COURSE_LEVEL ?? '') : ($c['COURSE_LEVEL'] ?? '');
                    $c_major = is_object($c) ? ($c->COURSE_MAJOR ?? '') : ($c['COURSE_MAJOR'] ?? '');
                    if ($c_id === '') continue;
                    
                    // Build display name with major
                    $displayName = $c_name;
                    if ($c_major && $c_major != 'None' && $c_major != '') {
                        $displayName .= ' - ' . $c_major;
                    }
                    
                    $sel = ($selected_course == intval($c_id)) ? 'selected' : '';
                    echo '<option value="' . intval($c_id) . '" ' . $sel . '>' . htmlspecialchars($displayName) . '</option>';
                }
            } else {
                echo '<option value="0">No Courses Found</option>';
            }
          ?>
        </select>
      </div>

      <div class="col-md-2 col-lg-2">
        <label for="year" class="form-label">Year Level</label>
        <select id="year" name="year" class="form-select">
          <option value="0">All Years</option>
          <?php
            if (!empty($levels)) {
                foreach ($levels as $lv) {
                    $sel = ($selected_year == intval($lv)) ? 'selected' : '';
                    echo '<option value="' . intval($lv) . '" ' . $sel . '>Year ' . intval($lv) . '</option>';
                }
            } else {
                for ($y = 1; $y <= 4; $y++) {
                    $sel = ($selected_year == $y) ? 'selected' : '';
                    echo '<option value="' . $y . '" ' . $sel . '>Year ' . $y . '</option>';
                }
            }
          ?>
        </select>
      </div>

      <div class="col-md-3 col-lg-3">
        <label for="room" class="form-label">Room</label>
        <select id="room" name="room" class="form-select">
          <option value="">All Rooms</option>
          <?php
            if (!empty($rooms)) {
                foreach ($rooms as $r) {
                    $r_val = (string)$r;
                    $sel = ($selected_room === $r_val) ? 'selected' : '';
                    echo '<option value="' . htmlspecialchars($r_val, ENT_QUOTES, 'UTF-8') . '" ' . $sel . '>' . htmlspecialchars($r_val) . '</option>';
                }
            } else {
                echo '<option value="">No Rooms Found</option>';
            }
          ?>
        </select>
      </div>

      <div class="col-md-3 col-lg-2">
        <label for="semester" class="form-label">Semester</label>
        <select id="semester" name="semester" class="form-select">
          <option value="">All Semesters</option>
          <?php
            if (!empty($semesters)) {
                foreach ($semesters as $s) {
                    $s_val = (string)$s;
                    $sel = ($selected_semester === $s_val) ? 'selected' : '';
                    echo '<option value="' . htmlspecialchars($s_val, ENT_QUOTES, 'UTF-8') . '" ' . $sel . '>' . htmlspecialchars($s_val) . '</option>';
                }
            } else {
                echo '<option value="">No Semesters Found</option>';
            }
          ?>
        </select>
      </div>

      <div class="col-12 mt-2">
        <button type="submit" class="btn btn-success btn-sm me-2">
          <i class="fa fa-filter"></i> Filter
        </button>
        <a class="btn btn-secondary btn-sm" href="<?php echo $_SERVER['PHP_SELF'] . (isset($_GET['view']) ? '?view=' . urlencode($_GET['view']) : ''); ?>">
          <i class="fa fa-refresh"></i> Reset
        </a>
      </div>
    </form>
  </div>
</div>

<!-- Schedule table -->
<form action="controller.php?action=delete" Method="POST">
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
          <th>Section</th>
          <th>Instructor</th>
          <th width="10%">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($cur as $result) {
            // defensive reads
            $sched_time = htmlspecialchars($result->sched_time ?? '', ENT_QUOTES, 'UTF-8');
            $sched_day = htmlspecialchars($result->sched_day ?? '', ENT_QUOTES, 'UTF-8');
            $subj_code = htmlspecialchars($result->SUBJ_CODE ?? '', ENT_QUOTES, 'UTF-8');
            $sched_semester = htmlspecialchars($result->sched_semester ?? '', ENT_QUOTES, 'UTF-8');
            $sched_sy = htmlspecialchars($result->sched_sy ?? '', ENT_QUOTES, 'UTF-8');
            $course_name = htmlspecialchars($result->COURSE_NAME ?? '', ENT_QUOTES, 'UTF-8');
            $course_level = htmlspecialchars($result->COURSE_LEVEL ?? '', ENT_QUOTES, 'UTF-8');
            $sched_room = htmlspecialchars($result->sched_room ?? '', ENT_QUOTES, 'UTF-8');
            $section = htmlspecialchars($result->SECTION ?? '', ENT_QUOTES, 'UTF-8');
            $inst_name = htmlspecialchars($result->INST_NAME ?? '', ENT_QUOTES, 'UTF-8');
            $schedID = htmlspecialchars($result->schedID ?? '', ENT_QUOTES, 'UTF-8');

            $deleteUrl = htmlspecialchars(web_root . "admin/schedule/controller.php?action=delete&id=" . urlencode($result->schedID), ENT_QUOTES, 'UTF-8');

            echo '<tr>';
            echo '<td><span class="time-badge">' . $sched_time . '</span></td>';
            echo '<td>' . $sched_day . '</td>';
            echo '<td><strong>' . $subj_code . '</strong></td>';
            echo '<td>' . $sched_semester . '</td>';
            echo '<td>' . $sched_sy . '</td>';
            echo '<td><span class="course-badge">' . $course_name . ' - Year ' . $course_level . '</span></td>';
            echo '<td><span class="room-badge">' . $sched_room . '</span></td>';
            echo '<td>' . $section . '</td>';
            echo '<td><span class="instructor-badge">' . $inst_name . '</span></td>';
            echo '<td align="center">';
            echo '<a title="Edit" href="index.php?view=edit&id=' . $schedID . '" class="btn btn-primary btn-xs action-btn"><span class="fa fa-edit fw-fa"></span></a>';
            echo '<a title="Delete" href="#" class="btn btn-danger btn-xs action-btn" onclick="confirmDelete(event, \'' . $deleteUrl . '\')"><span class="fa fa-trash-o fw-fa"></span></a>';
            echo '</td>';
            echo '</tr>';
          }
        ?>
      </tbody>
    </table>
  </div>
</form>

<!-- DataTables init + SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(event, url) {
  event.preventDefault();
  Swal.fire({
    title: "Confirm Deletion",
    text: "Are you sure you want to delete this schedule?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Yes, delete it!"
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = url;
    }
  });
}

// Initialize DataTable
(function($){
  $(document).ready(function(){
    if ($.fn.DataTable) {
      $('#dash-table').DataTable({
        responsive: true,
        pageLength: 15,
        lengthMenu: [[10, 15, 25, 50], [10, 15, 25, 50]],
        columnDefs: [
          { orderable: false, targets: -1 } // last column not orderable
        ],
        order: [[0, 'asc']], // order by Time
        language: {
          searchPlaceholder: "Search schedule, course, instructor...",
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