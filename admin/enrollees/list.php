<?php
// admin/enrollees/list.php - Consistent UI with Department list
if (!isset($_SESSION['ACCOUNT_ID'])) {
    redirect(web_root . "admin/index.php");
    exit;
}

// Ensure the user has appropriate role to access this page
if ($_SESSION['ACCOUNT_TYPE'] !== 'Registrar' && 
    $_SESSION['ACCOUNT_TYPE'] !== 'Registrar') {
    
    // Redirect or show an error message if the user does not have permission
    message("You do not have permission to access this page.", "error");
    redirect("index.php");  // Redirect to a safe page
}

// fetch new enrollees safely and count
$enrollees = [];
$enrolleeCount = 0;
try {
    $mydb->setQuery("SELECT * FROM `tblstudent` s, course c WHERE s.COURSE_ID=c.COURSE_ID AND NewEnrollees=1");
    $enrollees = $mydb->loadResultList();
    $enrolleeCount = is_array($enrollees) ? count($enrollees) : 0;
} catch (Exception $e) {
    error_log("Enrollees list query failed: " . $e->getMessage());
    $enrollees = [];
    $enrolleeCount = 0;
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

.enrollee-badge {
  background: linear-gradient(135deg, #667eea, #764ba2);
  color: #fff;
  padding: 6px 12px;
  border-radius: 18px;
  font-weight: 700;
  margin-left: 8px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.enrollee-seal {
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

.btn-success {
  background: linear-gradient(135deg, #27ae60, #219653);
}

.btn-info {
  background: linear-gradient(135deg, #1abc9c, #16a085);
}

.btn-success:hover {
  background: linear-gradient(135deg, #219653, #1e8449);
}

.btn-info:hover {
  background: linear-gradient(135deg, #16a085, #138d75);
}

/* Status badges */
.status-new {
  background: linear-gradient(135deg, #f39c12, #e67e22);
  color: white;
  padding: 4px 8px;
  border-radius: 12px;
  font-size: 12px;
  font-weight: 600;
}

.status-confirmed {
  background: linear-gradient(135deg, #27ae60, #219653);
  color: white;
  padding: 4px 8px;
  border-radius: 12px;
  font-size: 12px;
  font-weight: 600;
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
  .enrollee-seal {
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
          New Enrollees
          <span class="enrollee-badge"><?php echo intval($enrolleeCount); ?></span>
        </h2>
        <p class="text-muted" style="margin:0;">Review and confirm newly registered students.</p>
      </div>
      <div style="text-align:right;">
        <img src="<?php echo web_root; ?>img/school_seal_100x100.png" alt="School Seal" class="enrollee-seal" loading="lazy">
      </div>
    </div>
  </div>
</div>

<form action="controller.php?action=delete" method="POST">
  <div class="table-responsive">
    <table id="dash-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Sex</th>
          <th>Age</th>
          <th>Address</th>
          <th>Contact No.</th>
          <th>Status</th>
          <th>Course</th>
          <th width="14%">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($enrollees as $result) {
            $idno = htmlspecialchars($result->IDNO ?? '', ENT_QUOTES, 'UTF-8');
            $lname = htmlspecialchars($result->LNAME ?? '', ENT_QUOTES, 'UTF-8');
            $fname = htmlspecialchars($result->FNAME ?? '', ENT_QUOTES, 'UTF-8');
            $mname = htmlspecialchars($result->MNAME ?? '', ENT_QUOTES, 'UTF-8');
            $suffix = htmlspecialchars($result->SUFFIX ?? '', ENT_QUOTES, 'UTF-8');
            $sex = htmlspecialchars($result->SEX ?? '', ENT_QUOTES, 'UTF-8');
            $bday = $result->BDAY ?? '0000-00-00';
            $home = htmlspecialchars($result->HOME_ADD ?? '', ENT_QUOTES, 'UTF-8');
            $contact = htmlspecialchars($result->CONTACT_NO ?? '', ENT_QUOTES, 'UTF-8');
            $student_status = htmlspecialchars($result->student_status ?? '', ENT_QUOTES, 'UTF-8');
            $course = htmlspecialchars($result->COURSE_NAME ?? '', ENT_QUOTES, 'UTF-8');

            // age calculation
            $age = 'N/A';
            if ($bday !== '0000-00-00' && strtotime($bday)) {
                $dob = date_create($bday);
                $today = date_create('today');
                $age = date_diff($dob, $today)->y;
            }

            $fullName = trim($lname . ', ' . $fname . ' ' . $mname . ' ' . $suffix);
            $statusClass = ($student_status === 'New') ? 'status-new' : 'status-confirmed';
            
            echo '<tr>';
            echo '<td>' . $idno . '</td>';
            echo '<td><strong>' . $fullName . '</strong></td>';
            echo '<td>' . $sex . '</td>';
            echo '<td>' . htmlspecialchars((string)$age, ENT_QUOTES, 'UTF-8') . '</td>';
            echo '<td>' . $home . '</td>';
            echo '<td>' . $contact . '</td>';
            echo '<td><span class="' . $statusClass . '">' . $student_status . '</span></td>';
            echo '<td>' . $course . '</td>';

            if ($student_status === 'New') {
                $confirmUrl = 'controller.php?action=confirm&IDNO=' . urlencode($result->IDNO);
                echo '<td align="center">';
                echo '<a href="' . htmlspecialchars($confirmUrl, ENT_QUOTES, 'UTF-8') . '" class="btn btn-success btn-xs action-btn" onclick="return confirmAction(event, \'Confirm this enrollee?\');"><i class="fa fa-check-circle"></i> Confirm</a>';
                echo '</td>';
            } else {
                $confirmUrl = 'index.php?view=addCredit&IDNO=' . urlencode($result->IDNO);
                echo '<td align="center">';
                echo '<a href="' . htmlspecialchars($confirmUrl, ENT_QUOTES, 'UTF-8') . '" class="btn btn-info btn-xs action-btn"><i class="fa fa-info-circle"></i> View</a>';
                echo '</td>';
            }

            echo '</tr>';
        }
        ?>
      </tbody>
    </table>
  </div>
</form>

<script>
  (function($){
    $(document).ready(function(){
      if ($.fn.DataTable) {
        $('#dash-table').DataTable({
          responsive: true,
          pageLength: 15,
          lengthMenu: [[10, 15, 25, 50], [10, 15, 25, 50]],
          columnDefs: [{ orderable: false, targets: -1 }],
          order: [[1, 'asc']],
          language: {
            searchPlaceholder: "Search name, course, or status...",
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

    window.confirmAction = function(e, message){
      if (!confirm(message || "Are you sure?")) {
        if (e && e.preventDefault) e.preventDefault();
        return false;
      }
      return true;
    };
  })(jQuery);
</script>