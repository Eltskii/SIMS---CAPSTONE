<?php
// admin/department/list.php (Improved UI - Logic intact)

if (!isset($_SESSION['ACCOUNT_ID'])) {
  redirect(web_root . "admin/index.php");
  exit;
}

// Ensure the user has appropriate role to access this page
if ($_SESSION['ACCOUNT_TYPE'] !== 'Registrar' && 
    $_SESSION['ACCOUNT_TYPE'] !== 'Chairperson') {
    
    // Redirect or show an error message if the user does not have permission
    message("You do not have permission to access this page.", "error");
    redirect("index.php");  // Redirect to a safe page
}

// Fetch department list - Chairpersons see only their own department
$departments = [];
$deptCount = 0;
try {
  $sql = "SELECT * FROM `department`";
  if (isChairperson()) {
    $chairDeptId = getCurrentDepartmentId();
    if ($chairDeptId) {
      $sql .= " WHERE DEPT_ID = " . intval($chairDeptId);
    }
  }
  $mydb->setQuery($sql);
  $departments = $mydb->loadResultList();
  $deptCount = is_array($departments) ? count($departments) : 0;
} catch (Exception $e) {
  error_log("Department query failed: " . $e->getMessage());
  $departments = [];
  $deptCount = 0;
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

.department-badge {
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
  font-size: 14px;
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

/* New Department Button */
.btn-primary.btn-xs {
  background: linear-gradient(135deg, #27ae60, #219653);
  border: none;
  border-radius: 6px;
  font-weight: 600;
  padding: 8px 16px;
  transition: all 0.2s ease;
  color: white;
}

.btn-primary.btn-xs:hover {
  background: linear-gradient(135deg, #219653, #1e8449);
  transform: translateY(-1px);
  box-shadow: 0 4px 8px rgba(0,0,0,0.15);
  color: white;
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
}

/* Text colors for better readability */
.text-muted {
  color: #6c757d !important;
}
</style>

<div class="row">
  <div class="col-lg-12">
    <div class="page-header-row">
      <div>
        <h2 class="title">
          <?php echo isChairperson() ? 'Department Information' : 'List of Departments'; ?>
          <?php if (!isChairperson()): ?>
          <a href="index.php?view=add" class="btn btn-primary btn-xs" style="margin-left:10px;">
            <i class="fa fa-plus-circle fw-fa"></i> New
          </a>
          <?php endif; ?>
          <span class="department-badge"><?php echo intval($deptCount); ?></span>
        </h2>
        <?php if (isChairperson()): ?>
            <div style="margin-top: 8px;">
                <span style="background: linear-gradient(135deg, #f39c12, #e67e22); color: white; padding: 6px 14px; border-radius: 20px; font-size: 13px; font-weight: 600; box-shadow: 0 3px 6px rgba(0,0,0,0.2);">
                    <i class="fa fa-building"></i> <?php echo htmlspecialchars(getCurrentDepartmentName()); ?>
                </span>
            </div>
        <?php endif; ?>
        <p class="text-muted" style="margin:0;"><?php echo isChairperson() ? 'View your department details (read-only).' : 'Manage all department records of the university.'; ?></p>
      </div>
      <div style="text-align:right;">
        <img src="<?php echo web_root; ?>img/school_seal_100x100.png" alt="School Seal" class="department-seal" loading="lazy">
      </div>
    </div>
  </div>
</div>

<form action="controller.php?action=delete" method="POST">
  <div class="table-responsive">
    <table id="dash-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Department</th>
          <th>Description</th>
          <th width="12%">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($departments as $dept) {
          $id = htmlspecialchars($dept->DEPT_ID, ENT_QUOTES, 'UTF-8');
          $name = htmlspecialchars($dept->DEPARTMENT_NAME, ENT_QUOTES, 'UTF-8');
          $desc = htmlspecialchars($dept->DEPARTMENT_DESC, ENT_QUOTES, 'UTF-8');

          echo '<tr>';
          echo '<td><strong>' . $name . '</strong></td>';
          echo '<td>' . $desc . '</td>';
          echo '<td align="center">';
          if (!isChairperson()) {
            echo '<a title="Edit" href="index.php?view=edit&id=' . $id . '" class="btn btn-primary btn-xs action-btn"><span class="fa fa-edit fw-fa"></span></a> ';
            echo '<a title="Delete" href="#" class="btn btn-danger btn-xs action-btn" onclick="confirmDelete(event, \'' . htmlspecialchars(web_root . "admin/department/controller.php?action=delete&id=" . $dept->DEPT_ID, ENT_QUOTES, 'UTF-8') . '\')"><span class="fa fa-trash-o fw-fa"></span></a>';
          } else {
            echo '<span class="text-muted" style="font-size: 12px;"><i class="fa fa-eye"></i> View Only</span>';
          }
          echo '</td>';
          echo '</tr>';
        }
        ?>
      </tbody>
    </table>
  </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(event, url) {
  event.preventDefault();
  Swal.fire({
    title: "Confirm Deletion",
    text: "Are you sure you want to delete this department?",
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
        columnDefs: [{ orderable: false, targets: -1 }],
        order: [[0, 'asc']],
        language: {
          searchPlaceholder: "Search departments...",
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