<?php
if (!isset($_SESSION['ACCOUNT_ID'])){
  redirect(web_root."admin/index.php");
}

	 // Ensure the user has appropriate role to access this page
if ($_SESSION['ACCOUNT_TYPE'] !== 'Registrar') {
    
    // Redirect or show an error message if the user does not have permission
    message("You do not have permission to access this page.", "error");
    redirect("index.php");  // Redirect to a safe page
}

// Keep the same query/logic as original
$mydb->setQuery("SELECT * FROM `useraccounts`");
$cur = $mydb->loadResultList();
$userCount = is_array($cur) ? count($cur) : 0;
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

/* New User Button */
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

/* User badges */
.account-badge {
  background: linear-gradient(135deg, #f39c12, #e67e22);
  color: white;
  padding: 4px 8px;
  border-radius: 12px;
  font-size: 12px;
  font-weight: 600;
}

.role-badge {
  background: linear-gradient(135deg, #1abc9c, #16a085);
  color: white;
  padding: 4px 8px;
  border-radius: 12px;
  font-size: 12px;
  font-weight: 600;
}

.username-badge {
  background: linear-gradient(135deg, #3498db, #2980b9);
  color: white;
  padding: 4px 8px;
  border-radius: 12px;
  font-size: 12px;
  font-weight: 600;
}

/* Role-specific badges */
.role-admin {
  background: linear-gradient(135deg, #e74c3c, #c0392b);
}

.role-chairperson {
  background: linear-gradient(135deg, #9b59b6, #8e44ad);
}

.role-registrar {
  background: linear-gradient(135deg, #3498db, #2980b9);
}

.role-faculty {
  background: linear-gradient(135deg, #1abc9c, #16a085);
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
          List of Users
          <a href="index.php?view=add" class="btn btn-primary btn-xs">
            <i class="fa fa-plus-circle fw-fa"></i> New
          </a>
          <span class="user-badge"><?php echo intval($userCount); ?></span>
        </h2>
        <p class="text-muted" style="margin:0">Manage all user accounts of the system.</p>
      </div>
      <div style="text-align:right;">
        <img src="<?php echo web_root; ?>img/school_seal_100x100.png" alt="School Seal" class="user-seal" loading="lazy">
      </div>
    </div>
  </div>
</div>

<form action="controller.php?action=delete" Method="POST">
  <div class="table-responsive">
    <table id="dash-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Account Name</th>
          <th>Username</th>
          <th>Role</th>
          <th width="12%">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          foreach ($cur as $result) {
            // Determine role badge class
            $roleClass = 'role-badge';
            switch($result->ACCOUNT_TYPE) {
              case 'Registrar':
              case 'MainAdministrator':
                $roleClass .= ' role-admin';
                break;
              case 'Chairperson':
                $roleClass .= ' role-chairperson';
                break;
              case 'Registrar':
                $roleClass .= ' role-registrar';
                break;
              case 'Faculty':
                $roleClass .= ' role-faculty';
                break;
              default:
                $roleClass .= ' role-badge';
            }

            // Check if delete should be disabled
            $deleteDisabled = '';
            $deleteClass = 'btn-danger action-btn';
            if($result->ACCOUNT_ID==$_SESSION['ACCOUNT_ID'] || $result->ACCOUNT_TYPE=='MainAdministrator' || $result->ACCOUNT_TYPE=='Registrar') {
              $deleteDisabled = "disabled";
              $deleteClass = 'btn-disabled action-btn';
            }

            echo '<tr>';
            echo '<td><span class="account-badge">' . htmlspecialchars($result->ACCOUNT_NAME ?? '', ENT_QUOTES, 'UTF-8') . '</span></td>';
            echo '<td><span class="username-badge">' . htmlspecialchars($result->ACCOUNT_USERNAME ?? '', ENT_QUOTES, 'UTF-8') . '</span></td>';
            echo '<td><span class="' . $roleClass . '">' . htmlspecialchars($result->ACCOUNT_TYPE ?? '', ENT_QUOTES, 'UTF-8') . '</span></td>';

            echo '<td align="center">';
            echo '<a title="Edit" href="index.php?view=edit&id=' . htmlspecialchars($result->ACCOUNT_ID ?? '', ENT_QUOTES, 'UTF-8') . '" class="btn btn-primary btn-xs action-btn"><span class="fa fa-edit fw-fa"></span></a>';
            
            if($deleteDisabled) {
              echo '<a title="Delete" href="#" class="btn ' . $deleteClass . '" ' . $deleteDisabled . '><span class="fa fa-trash-o fw-fa"></span></a>';
            } else {
              $deleteUrl = htmlspecialchars(web_root . "admin/user/controller.php?action=delete&id=" . urlencode($result->ACCOUNT_ID), ENT_QUOTES, 'UTF-8');
              echo '<a title="Delete" href="#" class="btn ' . $deleteClass . '" onclick="confirmDelete(event, \'' . $deleteUrl . '\')"><span class="fa fa-trash-o fw-fa"></span></a>';
            }
            
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
    text: "Are you sure you want to delete this user account?",
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
        order: [[0, 'asc']], // order by Account Name
        language: {
          searchPlaceholder: "Search user, username, role...",
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