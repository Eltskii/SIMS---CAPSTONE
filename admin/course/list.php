<?php
if (!isset($_SESSION['ACCOUNT_ID'])) {
    redirect(web_root . "admin/index.php");
}

// Ensure the user has appropriate role to access this page
if ($_SESSION['ACCOUNT_TYPE'] !== 'Registrar' && 
    $_SESSION['ACCOUNT_TYPE'] !== 'Chairperson') {
    
    // Redirect or show an error message if the user does not have permission
    message("You do not have permission to access this page.", "error");
    redirect("index.php");  // Redirect to a safe page
}

// --- Load departments robustly (defensive) ---
$departments = [];
try {
    $mydb->setQuery("SELECT DEPT_ID, DEPARTMENT_NAME FROM `department` ORDER BY DEPARTMENT_NAME ASC");
    $departments = $mydb->loadResultList();
} catch (Exception $e) {
    error_log("Department query failed: " . $e->getMessage());
    $departments = [];
}

// --- Read filter inputs (GET) ---
$selected_dept = isset($_GET['dept']) ? intval($_GET['dept']) : 0;
$selected_year = isset($_GET['year']) ? intval($_GET['year']) : 0;

// --- Build WHERE clauses safely ---
$whereClauses = ["c.DEPT_ID = d.DEPT_ID"];

// Apply department filtering for Chairpersons
if (isChairperson()) {
    $chairDeptId = getCurrentDepartmentId();
    if ($chairDeptId) {
        $whereClauses[] = "c.DEPT_ID = " . intval($chairDeptId);
    }
}

if ($selected_dept > 0) $whereClauses[] = "c.DEPT_ID = " . $selected_dept;
if ($selected_year > 0) $whereClauses[] = "c.COURSE_LEVEL = " . $selected_year;

$conditions = " WHERE " . implode(" AND ", $whereClauses);

// Fetch courses with filters applied
$cur = [];
$courseCount = 0;
try {
    $sql = "SELECT c.*, d.DEPARTMENT_NAME 
            FROM `course` c, `department` d " . $conditions . " 
            ORDER BY c.COURSE_NAME ASC";
    $mydb->setQuery($sql);
    $cur = $mydb->loadResultList();
    $courseCount = is_array($cur) ? count($cur) : 0;
} catch (Exception $e) {
    error_log("Course query failed: " . $e->getMessage() . " SQL: " . $sql);
    $cur = [];
    $courseCount = 0;
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

.course-badge {
  background: linear-gradient(135deg, #667eea, #764ba2);
  color: #fff;
  padding: 6px 12px;
  border-radius: 18px;
  font-weight: 700;
  margin-left: 8px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.department-seal {
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

/* New Course Button */
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

/* Responsive styling */
@media (max-width: 767px) {
  .page-header-row {
    flex-direction: column;
    align-items: flex-start;
  }
  .department-seal {
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

/* Text colors for better readability */
.text-muted {
  color: #6c757d !important;
}

/* Level badges */
.level-badge {
  background: linear-gradient(135deg, #f39c12, #e67e22);
  color: white;
  padding: 4px 8px;
  border-radius: 12px;
  font-size: 12px;
  font-weight: 600;
}
</style>

<div class="row">
  <div class="col-lg-12">
    <div class="page-header-row">
      <div>
        <h2 class="title">
          <?php echo isChairperson() ? 'Department' : 'List of'; ?> Courses/Year/Major
          <a href="index.php?view=add" class="btn btn-primary btn-xs">
            <i class="fa fa-plus-circle fw-fa"></i> New
          </a>
          <span class="course-badge"><?php echo intval($courseCount); ?></span>
        </h2>
        <?php if (isChairperson()): ?>
            <div style="margin-top: 8px;">
                <span style="background: linear-gradient(135deg, #f39c12, #e67e22); color: white; padding: 6px 14px; border-radius: 20px; font-size: 13px; font-weight: 600; box-shadow: 0 3px 6px rgba(0,0,0,0.2);">
                    <i class="fa fa-building"></i> <?php echo htmlspecialchars(getCurrentDepartmentName()); ?>
                </span>
            </div>
        <?php endif; ?>
        <p class="text-muted" style="margin:0;"><?php echo isChairperson() ? 'Manage courses in your department.' : 'Manage all course records of the university.'; ?></p>
      </div>
      <div style="text-align:right;">
        <img src="<?php echo web_root; ?>img/school_seal_100x100.png" alt="School Seal" class="department-seal" loading="lazy">
      </div>
    </div>
  </div>
</div>

<!-- ✅ Filter Section -->
<?php
$actionBase = $_SERVER['PHP_SELF'];
if (isset($_GET['view'])) {
    $actionBase .= '?view=' . urlencode($_GET['view']);
}
?>
<div class="card mb-3">
  <div class="card-body">
    <form method="get" action="<?php echo $actionBase; ?>" class="row g-3 align-items-end" role="search" aria-label="Course filters">
      <?php if (isset($_GET['view'])): ?>
        <input type="hidden" name="view" value="<?php echo htmlspecialchars($_GET['view']); ?>">
      <?php endif; ?>

      <?php if (!isChairperson()): ?>
      <div class="col-md-6 col-lg-4">
        <label for="dept" class="form-label">Department</label>
        <select id="dept" name="dept" class="form-select">
          <option value="0">All Departments</option>
          <?php
          if (!empty($departments)) {
              foreach ($departments as $d) {
                  $dept_id = is_object($d) ? ($d->DEPT_ID ?? '') : ($d['DEPT_ID'] ?? '');
                  $dept_name = is_object($d) ? ($d->DEPARTMENT_NAME ?? '') : ($d['DEPARTMENT_NAME'] ?? '');
                  if ($dept_id === '') continue;
                  $sel = ($selected_dept === intval($dept_id)) ? 'selected' : '';
                  echo '<option value="' . intval($dept_id) . '" ' . $sel . '>' . htmlspecialchars($dept_name) . '</option>';
              }
          } else {
              echo '<option value="0">No departments found</option>';
          }
          ?>
        </select>
      </div>
      <?php endif; ?>

      <div class="col-md-3 col-lg-3">
        <label for="year" class="form-label">Year Level</label>
        <select id="year" name="year" class="form-select">
          <option value="0">All Years</option>
          <?php for ($y = 1; $y <= 4; $y++): ?>
            <option value="<?php echo $y; ?>" <?php echo ($selected_year == $y) ? 'selected' : ''; ?>>Year <?php echo $y; ?></option>
          <?php endfor; ?>
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

<form action="controller.php?action=delete" method="POST">
  <div class="table-responsive">
    <table id="dash-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Course</th>
          <th>Level</th>
          <th>Major</th>
          <th>Description</th>
          <th>Department</th>
          <th width="12%">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        foreach ($cur as $result) {
            switch (intval($result->COURSE_LEVEL)) {
                case 1: $Level = 'First Year'; break;
                case 2: $Level = 'Second Year'; break;
                case 3: $Level = 'Third Year'; break;
                case 4: $Level = 'Fourth Year'; break;
                default: $Level = 'First Year'; break;
            }

            $deleteUrl = "controller.php?action=delete&id=" . urlencode($result->COURSE_ID);

            echo '<tr>';
            echo '<td><strong>' . htmlspecialchars($result->COURSE_NAME) . '</strong></td>';
            echo '<td><span class="level-badge">' . htmlspecialchars($Level) . '</span></td>';
            echo '<td>' . htmlspecialchars($result->COURSE_MAJOR) . '</td>';
            echo '<td>' . htmlspecialchars($result->COURSE_DESC) . '</td>';
            echo '<td>' . htmlspecialchars($result->DEPARTMENT_NAME) . '</td>';
            echo '<td align="center">
                    <a title="Edit" href="index.php?view=edit&id=' . urlencode($result->COURSE_ID) . '" class="btn btn-primary btn-xs action-btn">
                      <span class="fa fa-edit fw-fa"></span>
                    </a>
                    <a title="Delete" href="#" class="btn btn-danger btn-xs action-btn" onclick="confirmDelete(event, \'' . htmlspecialchars($deleteUrl, ENT_QUOTES, 'UTF-8') . '\')">
                      <span class="fa fa-trash-o fw-fa"></span>
                    </a>
                  </td>';
            echo '</tr>';
        }
        ?>
      </tbody>
    </table>
  </div>
</form>

<!-- ✅ SweetAlert2 Delete Confirmation -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(event, url) {
  event.preventDefault();
  Swal.fire({
    title: "Confirm Deletion",
    text: "Are you sure you want to delete this course?",
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
(function($) {
  $(document).ready(function() {
    if ($.fn.DataTable) {
      $('#dash-table').DataTable({
        responsive: true,
        pageLength: 15,
        lengthMenu: [[10, 15, 25, 50], [10, 15, 25, 50]],
        columnDefs: [{ orderable: false, targets: -1 }],
        order: [[0, 'asc']],
        language: {
          searchPlaceholder: "Search courses...",
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