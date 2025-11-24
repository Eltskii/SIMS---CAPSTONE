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

$db_host ="localhost";
$db_user = "root";
$db_pass ="";
$db_name ="bsu_db";

require_once('backup_restore.class.php');  

$newImport = new backup_restore($db_host,$db_name,$db_user,$db_pass);

if (isset($_GET['process'])) {
  $process = $_GET['process'];
  if ($process == 'backup') {
    $message = $newImport->backup();   
  } else if ($process == 'restore') {
    $message = $newImport->restore(); 
    @unlink('backup/database_'.$db_name.'.sql');
  }
}
?>

<style>
/* ===== Clean, Simple Styling ===== */
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

.simple-badge {
  background: #6c757d;
  color: #fff;
  padding: 6px 12px;
  border-radius: 18px;
  font-weight: 600;
  margin-left: 8px;
  font-size: 14px;
}

.school-seal {
  max-width: 80px;
  height: auto;
  display: block;
}

/* ===== Simple Card Styling ===== */
.card {
  border-radius: 8px;
  border: 1px solid #dee2e6;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
  margin-bottom: 20px;
}

.card-body {
  background: #ffffff;
  border-radius: 8px;
  padding: 25px 30px;
  text-align: center;
}

/* Simple Action Buttons */
.action-btn {
  border: none;
  border-radius: 6px;
  font-weight: 600;
  padding: 12px 25px;
  transition: all 0.2s ease;
  color: white;
  font-size: 15px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  margin: 0 10px;
  text-decoration: none;
}

.action-btn:hover {
  transform: translateY(-1px);
  color: white;
}

.btn-backup {
  background: #28a745;
}

.btn-restore {
  background: #dc3545;
}

.btn-backup:hover {
  background: #218838;
}

.btn-restore:hover {
  background: #c82333;
}

/* Buttons Container */
.backup-btns {
  display: flex;
  justify-content: center;
  gap: 20px;
  flex-wrap: wrap;
  margin: 25px 0;
}

/* Message Box Styling */
.message-box {
  margin: 20px 0;
  padding: 15px 20px;
  border-radius: 6px;
  background: #f8f9fa;
  color: #495057;
  font-weight: 500;
  border-left: 4px solid #6c757d;
  text-align: left;
}

.message-box.success {
  background: #d4edda;
  border-left-color: #28a745;
  color: #155724;
}

.message-box.info {
  background: #d1ecf1;
  border-left-color: #17a2b8;
  color: #0c5460;
}

.message-box a {
  color: #0056b3;
  font-weight: 600;
  text-decoration: none;
}

.message-box a:hover {
  text-decoration: underline;
}

/* Warning Section - More Prominent */
.warning-section {
  background: #fff3cd;
  border: 1px solid #ffeaa7;
  border-radius: 6px;
  padding: 15px 20px;
  margin: 20px 0;
  text-align: left;
}

.warning-section h4 {
  color: #856404;
  margin: 0 0 10px 0;
  font-size: 16px;
  font-weight: 600;
}

.warning-section p {
  margin: 5px 0;
  color: #856404;
  font-size: 14px;
}

/* Simple Feature Items */
.feature-item {
  padding: 15px;
  text-align: center;
}

.feature-icon {
  font-size: 36px;
  margin-bottom: 10px;
  display: block;
}

.backup-icon {
  color: #28a745;
}

.restore-icon {
  color: #dc3545;
}

.file-icon {
  color: #6c757d;
}

/* File Info Section */
.file-info {
  background: #e9ecef;
  border-radius: 6px;
  padding: 15px;
  margin: 20px 0;
  text-align: left;
}

.file-info h5 {
  color: #495057;
  margin-bottom: 10px;
  font-size: 16px;
}

.file-info p {
  margin: 5px 0;
  color: #6c757d;
  font-size: 14px;
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
  .backup-btns {
    flex-direction: column;
    align-items: center;
  }
  .action-btn {
    width: 100%;
    margin: 5px 0;
  }
}

@media (max-width: 576px) {
  .card-body {
    padding: 20px 15px;
  }
  .action-btn {
    padding: 10px 20px;
    font-size: 14px;
  }
}
</style>

<div class="row">
  <div class="col-lg-12">
    <div class="page-header-row">
      <div>
        <h2 class="title">
          Database SQL Backup
          <span class="simple-badge">Basic Utility</span>
        </h2>
        <p class="text-muted" style="margin:0">Simple SQL file creation and restoration for your database.</p>
      </div>
      <div style="text-align:right;">
        <img src="<?php echo web_root; ?>img/school_seal_100x100.png" alt="School Seal" class="school-seal" loading="lazy">
      </div>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <!-- File Information -->
    <div class="file-info">
      <h5>📁 Backup File Information</h5>
      <p><strong>File Format:</strong> Standard SQL file (.sql)</p>
      <p><strong>Location:</strong> /admin/back-up/backup/</p>
      <p><strong>File Name:</strong> database_<?php echo $db_name; ?>.sql</p>
      <p><strong>Contents:</strong> Complete database structure and data as SQL commands</p>
    </div>

    <!-- Critical Warning Section -->
    <div class="warning-section">
      <h4>⚠️ Critical Instructions - Read Before Proceeding</h4>
      <p><strong>Backup:</strong> Creates a simple SQL dump file of your entire database</p>
      <p><strong>Restore:</strong> <span style="color: #dc3545; font-weight: bold;">WILL COMPLETELY OVERWRITE</span> your current database with the backup data</p>
      <p><strong>Safety:</strong> Always download and save your backup files externally</p>
      <p><strong>Testing:</strong> Test backups on a development system before production use</p>
    </div>

    <!-- Status Messages -->
    <?php if(isset($_GET['process'])): ?>
      <?php 
        $msg = $_GET['process'];   
        $class = 'message-box';
        switch($msg){
          case 'backup':
            $msg = '✅ <strong>SQL Backup Created</strong><br>Your database has been exported to an SQL file. <a href="backup/'.$message.'" target="_blank">Download the SQL file</a> for safekeeping.';
            $class .= ' success';
            break;
          case 'restore':
            $msg = '✅ <strong>Database Restored</strong><br>' . $message . '<br>All current data has been replaced with the backup file contents.';
            $class .= ' info';
            break;
          case 'upload':
            $msg = $message;
            $class .= ' info';
            break;
          default:
            $class = 'hide';
        }                                
      ?>
      <div class="<?php echo $class; ?>">
        <?php echo $msg; ?>
      </div>
    <?php endif; ?>

    <!-- Action Buttons -->
    <div class="backup-btns">
      <a href="index.php?process=backup" class="action-btn btn-backup">
        <i class="fa fa-download backup-icon"></i>
        Create SQL Backup
      </a>
      <a href="index.php?process=restore" class="action-btn btn-restore">
        <i class="fa fa-upload restore-icon"></i>
        Restore from SQL
      </a>
    </div>

    <!-- Simple Feature Explanation -->
    <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #dee2e6;">
      <div class="row text-center">
        <div class="col-md-4 feature-item">
          <i class="fa fa-file-code feature-icon backup-icon"></i>
          <h5 style="color: #495057; font-weight: 600;">SQL Export</h5>
          <p class="text-muted" style="font-size: 13px;">Generates standard SQL file with table structure and data</p>
        </div>
        <div class="col-md-4 feature-item">
          <i class="fa fa-database feature-icon restore-icon"></i>
          <h5 style="color: #495057; font-weight: 600;">Data Import</h5>
          <p class="text-muted" style="font-size: 13px;">Executes SQL commands to rebuild database from file</p>
        </div>
        <div class="col-md-4 feature-item">
          <i class="fa fa-file-alt feature-icon file-icon"></i>
          <h5 style="color: #495057; font-weight: 600;">Plain Text</h5>
          <p class="text-muted" style="font-size: 13px;">Human-readable SQL format, compatible with most tools</p>
        </div>
      </div>
    </div>

    <!-- Additional Help Text -->
    <div style="margin-top: 20px; padding: 15px; background: #f8f9fa; border-radius: 6px; text-align: left;">
      <h6 style="color: #495057; margin-bottom: 10px;">💡 How it works:</h6>
      <p style="margin: 5px 0; color: #6c757d; font-size: 13px;">
        • <strong>Backup:</strong> Creates an SQL file containing CREATE TABLE and INSERT statements<br>
        • <strong>Restore:</strong> Reads the SQL file and executes all commands sequentially<br>
        • <strong>Format:</strong> Standard MySQL-compatible SQL syntax<br>
        • <strong>Compatibility:</strong> Works with any MySQL database system
      </p>
    </div>
  </div>
</div>

<!-- Simple confirmation for restore action -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const restoreBtn = document.querySelector('.btn-restore');
  if (restoreBtn) {
    restoreBtn.addEventListener('click', function(e) {
      if (!confirm('🚨 CRITICAL ACTION: This will DELETE all current data and replace it with backup data.\n\nThis cannot be undone! Continue?')) {
        e.preventDefault();
      }
    });
  }
});
</script>