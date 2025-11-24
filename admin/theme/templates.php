<?php
// theme/templates.php - UI improved, original logic preserved
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title><?php echo isset($title) ? $title : 'Admin';?></title>
<link rel="icon" type="image/png" href="<?php echo web_root; ?>img/favicon.png">
<link rel="apple-touch-icon" href="<?php echo web_root; ?>img/favicon.png">

<!-- BOOTSTRAP 3 (CDN) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css">

<!-- Font Awesome (CDN) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Select2 (CDN) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">

<!-- Morris / Datatables / Theme CSS (keep local copies) -->
<link href="<?php echo web_root; ?>admin/css/morris.css" rel="stylesheet">
<link href="<?php echo web_root; ?>admin/css/dataTables.bootstrap.css" rel="stylesheet">

<!-- datetime picker (bootstrap 3 compatible) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

<!-- Local theme & custom CSS (keep them last so they override defaults) -->
<link href="<?php echo web_root; ?>admin/css/sb-admin-2.css" rel="stylesheet">
<link href="<?php echo web_root; ?>admin/css/custom.css" rel="stylesheet">
<link href="<?php echo web_root; ?>css/ekko-lightbox.css" rel="stylesheet">

<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.min.css">

<!-- Modern UI Improvements -->
<style>
:root {
  --primary: #2c3e50;
  --secondary: #34495e;
  --accent: #27ae60;
  --accent-dark: #219653;
  --accent-light: #2ecc71;
  --warning: #e67e22;
  --danger: #e74c3c;
  --info: #3498db;
  --muted: #6c757d;
  --light: #f8f9fa;
  --dark: #343a40;
  --radius: 12px;
  --shadow: 0 4px 12px rgba(0,0,0,0.08);
  --shadow-lg: 0 8px 24px rgba(0,0,0,0.12);
  --transition: all 0.3s ease;
}

body {
  background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
  color: var(--dark);
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  line-height: 1.6;
  margin: 0;
  padding: 0;
}

/* Fixed wrapper layout */
#wrapper {
    display: flex;
    min-height: 100vh;
    padding-top: 126px; /* top-quick + navbar height */
}

.sidebar {
    width: 250px;
    background: #fff;
    border-right: none;
    box-shadow: var(--shadow);
    position: fixed;
    left: 0;
    top: 126px;
    bottom: 0;
    overflow-y: auto;
    z-index: 1000;
}

#page-wrapper {
    flex: 1;
    margin-left: 250px;
    padding: 30px;
    overflow-y: auto;
    min-height: calc(100vh - 126px);
    background: transparent;
}

footer {
    margin-left: 250px;
    background: #fff;
    border-top: 1px solid rgba(0,0,0,0.05);
    position: relative;
    z-index: 1001;
}

/* Enhanced Top Quick Bar */
.top-quick {
  background: linear-gradient(135deg, var(--accent), var(--accent-dark));
  color: #fff;
  padding: 8px 20px;
  font-size: 14px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1001;
  height: 40px;
}

.top-quick::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 2px;
  background: linear-gradient(90deg, #fff, transparent);
  opacity: 0.3;
}

.top-quick strong {
  font-weight: 700;
  font-size: 15px;
}

.top-quick .quick-info {
  display: flex;
  align-items: center;
  gap: 20px;
}

.top-quick .quick-info > div {
  display: flex;
  align-items: center;
  gap: 6px;
  padding: 4px 12px;
  background: rgba(255,255,255,0.15);
  border-radius: 20px;
  font-weight: 500;
}

/* Modern Navbar */
.navbar {
  border: none;
  border-radius: 0;
  background: #fff;
  box-shadow: var(--shadow);
  margin-bottom: 0;
  min-height: 70px;
  position: fixed;
  top: 40px;
  left: 0;
  right: 0;
  z-index: 1001;
}

.navbar-brand {
  display: flex;
  align-items: center;
  gap: 15px;
  padding: 15px;
  font-weight: 700;
  color: var(--primary) !important;
}

.navbar-brand img {
  height: 45px;
  width: auto;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  transition: var(--transition);
}

.navbar-brand:hover img {
  transform: scale(1.05);
}

/* Enhanced User Dropdown */
.navbar-top-links > li > a {
  padding: 20px 15px;
  color: var(--primary);
  font-weight: 600;
  transition: var(--transition);
}

.navbar-top-links > li > a:hover {
  background: var(--light);
  color: var(--accent);
}

.dropdown-menu {
  border: none;
  border-radius: var(--radius);
  box-shadow: var(--shadow-lg);
  padding: 0;
  overflow: hidden;
}

.dropdown-menu .dropdown-header {
  background: linear-gradient(135deg, var(--accent), var(--accent-dark));
  color: inherit;
  padding: 20px;
  text-align: center;
  border-bottom: none;
}

.dropdown-menu .dropdown-header img {
  border: 3px solid rgba(255,255,255,0.3);
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.dropdown-menu .dropdown-header p {
  margin: 10px 0 5px;
  font-size: 16px;
  font-weight: 700;
}

.dropdown-menu .dropdown-header small {
  opacity: 0.9;
  font-size: 12px;
}

.dropdown-menu > li > a {
  padding: 12px 20px;
  color: var(--dark);
  font-weight: 500;
  transition: var(--transition);
  border-left: 3px solid transparent;
}

.dropdown-menu > li > a:hover {
  background: var(--light);
  color: var(--accent);
  border-left-color: var(--accent);
  padding-left: 25px;
}

.dropdown-menu > li > a .fa {
  width: 20px;
  text-align: center;
}

/* Modern Sidebar */
.sidebar .nav > li > a {
  color: var(--dark);
  padding: 14px 20px;
  font-weight: 600;
  display: flex;
  align-items: center;
  gap: 12px;
  border-left: 4px solid transparent;
  transition: var(--transition);
  margin: 2px 0;
  position: relative;
}

.sidebar .nav > li > a .fa {
  width: 20px;
  text-align: center;
  font-size: 16px;
  opacity: 0.8;
  transition: var(--transition);
}

.sidebar .nav > li > a:hover,
.sidebar .nav > li.active > a {
  background: linear-gradient(135deg, #f2fbf4, #e8f5e8);
  color: var(--accent-dark);
  border-left-color: var(--accent);
  padding-left: 22px;
}

.sidebar .nav > li > a:hover .fa,
.sidebar .nav > li.active > a .fa {
  opacity: 1;
  transform: scale(1.15);
}

.sidebar .nav > li.disabled > a {
  color: var(--muted);
  opacity: 0.5;
  cursor: not-allowed;
  position: relative;
}

.sidebar .nav > li.disabled > a::after {
  content: '🔒';
  position: absolute;
  right: 20px;
  font-size: 12px;
  opacity: 0.6;
}

.sidebar .nav > li.disabled > a:hover {
  background: transparent;
  color: var(--muted);
  border-left-color: transparent;
  padding-left: 20px;
}

/* Section Divider */
.sidebar .nav > li.menu-divider {
  height: 1px;
  background: rgba(0,0,0,0.08);
  margin: 10px 15px;
}

.sidebar .nav > li.menu-header {
  padding: 15px 20px 8px;
  font-size: 11px;
  font-weight: 700;
  text-transform: uppercase;
  color: var(--muted);
  letter-spacing: 0.5px;
}

/* Nested Navigation Levels */
.nav-second-level,
.nav-third-level {
  background: rgba(248, 249, 250, 0.5);
  border-left: 3px solid rgba(39, 174, 96, 0.2);
  margin-left: 10px;
}

.nav-second-level > li > a,
.nav-third-level > li > a {
  padding: 10px 20px 10px 40px;
  font-weight: 500;
  font-size: 13px;
  border-left: 3px solid transparent;
  transition: var(--transition);
  position: relative;
}

.nav-second-level > li > a::before {
  content: '•';
  position: absolute;
  left: 25px;
  color: var(--accent);
  font-size: 16px;
  opacity: 0.4;
}

.nav-second-level > li > a:hover,
.nav-third-level > li > a:hover {
  background: rgba(39, 174, 96, 0.15);
  color: var(--accent-dark);
  border-left-color: var(--accent);
  padding-left: 45px;
}

.nav-second-level > li > a:hover::before {
  opacity: 1;
}

.nav-third-level > li > a {
  padding-left: 60px;
  font-size: 12px;
}

.nav-third-level > li > a::before {
  content: '→';
  position: absolute;
  left: 45px;
  color: var(--accent);
  font-size: 12px;
  opacity: 0.4;
}

.nav-third-level > li > a:hover {
  padding-left: 65px;
}

/* Arrow indicator for expandable items */
.sidebar .nav > li > a .arrow {
  margin-left: auto;
  transition: var(--transition);
}

.sidebar .nav > li.active > a .arrow {
  transform: rotate(90deg);
}

/* Breadcrumb Enhancement */
.breadcrumb {
  background: #fff;
  border-radius: var(--radius);
  padding: 12px 20px;
  box-shadow: var(--shadow);
  border: 1px solid rgba(0,0,0,0.05);
  margin-bottom: 25px;
}

.breadcrumb a {
  color: var(--accent);
  font-weight: 500;
  text-decoration: none;
}

.breadcrumb a:hover {
  color: var(--accent-dark);
  text-decoration: underline;
}

/* Enhanced Footer */
footer .panel-body {
  padding: 20px;
  background: transparent;
  color: var(--muted);
  text-align: center;
  font-weight: 500;
}

/* Modal Enhancements */
.modal-content {
  border: none;
  border-radius: var(--radius);
  box-shadow: var(--shadow-lg);
}

.modal-header {
  background: linear-gradient(135deg, var(--primary), var(--secondary));
  color: white;
  border-radius: var(--radius) var(--radius) 0 0;
  border-bottom: none;
  padding: 20px;
}

.modal-header .close {
  color: white;
  opacity: 0.8;
  text-shadow: none;
}

.modal-header .close:hover {
  opacity: 1;
}

.modal-title {
  font-weight: 700;
  font-size: 18px;
}

/* Button Enhancements */
.btn {
  border: none;
  border-radius: var(--radius);
  font-weight: 600;
  padding: 10px 20px;
  transition: var(--transition);
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.btn:hover {
  transform: translateY(-1px);
  box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}

.btn-primary {
  background: linear-gradient(135deg, var(--accent), var(--accent-dark));
}

.btn-success {
  background: linear-gradient(135deg, var(--accent), var(--accent-dark));
}

.btn-info {
  background: linear-gradient(135deg, var(--info), #2980b9);
}

.btn-warning {
  background: linear-gradient(135deg, var(--warning), #d35400);
}

.btn-danger {
  background: linear-gradient(135deg, var(--danger), #c0392b);
}

/* Alert Enhancements */
.alert {
  border: none;
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  border-left: 4px solid;
}

.alert-warning {
  border-left-color: var(--warning);
}

/* Mobile responsive */
@media (max-width: 768px) {
  #wrapper {
    flex-direction: column;
    padding-top: 0;
  }
  
  .sidebar {
    position: relative;
    width: 100%;
    top: auto;
    height: auto;
    min-height: auto;
  }
  
  #page-wrapper {
    margin-left: 0;
    height: auto;
    padding: 20px 15px;
  }
  
  footer {
    margin-left: 0;
  }
  
  .navbar-brand span {
    display: none;
  }
  
  .top-quick {
    flex-direction: column;
    gap: 10px;
    text-align: center;
    height: auto;
    position: relative;
  }
  
  .top-quick .quick-info {
    justify-content: center;
    flex-wrap: wrap;
  }
  
  .navbar {
    position: relative;
    top: auto;
  }
  
  .navbar-top-links > li > a {
    padding: 15px 10px;
    font-size: 13px;
  }
}

@media (max-width: 480px) {
  .navbar-brand {
    padding: 10px;
  }
  
  .navbar-brand img {
    height: 35px;
  }
  
  .top-quick {
    padding: 8px 15px;
    font-size: 12px;
  }
  
  .top-quick .quick-info > div {
    padding: 3px 8px;
    font-size: 11px;
  }
}

/* Animation for page transitions */
#page-wrapper {
  animation: fadeIn 0.5s ease-in-out;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}

/* Custom scrollbar */
::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
  background: var(--accent);
  border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
  background: var(--accent-dark);
}

/* Add this to your existing CSS */
.dropdown-header a:hover img {
  transform: scale(1.05);
  border-color: rgba(255,255,255,0.6);
}

.dropdown-header a:hover {
  text-decoration: none;
}
</style>
</head>

<?php

// keep original behavior: confirm admin session if available
if (function_exists('admin_confirm_logged_in')) {
    admin_confirm_logged_in();
}

// fetch enrollees count safely (logic untouched)
$enrollees = null;
if (isset($mydb)) {
    try {
        $sql = "SELECT count(*) as 'enrollees' FROM tblstudent WHERE NewEnrollees=1";
        $mydb->setQuery($sql);
        $enrollees = $mydb->loadSingleResult();
    } catch (Exception $e) {
        error_log("templates.php: failed to load enrollees count: " . $e->getMessage());
        $enrollees = null;
    }
}

// admin cart (same as original)
$cart = '';
if (isset($_SESSION['admingvCart']) && is_array($_SESSION['admingvCart'])) {
  if (count($_SESSION['admingvCart'])>0) {
    $cart = '<span class="carttxtactive">('.count($_SESSION['admingvCart']) .')</span>';
  }
}

// load the admin user safely (guard if ACCOUNT_ID not set)
$singleuser = null;
if (isset($_SESSION['ACCOUNT_ID']) && !empty($_SESSION['ACCOUNT_ID'])) {
    try {
        $user = New User();
        $singleuser = $user->single_user($_SESSION['ACCOUNT_ID']);
    } catch (Exception $e) {
        error_log("templates.php: single_user failed: " . $e->getMessage());
        $singleuser = null;
    }
}

// compute user image path defensively (fallback to avatar)
$userImageFile = 'default-avatar.jpg'; // fallback
if ($singleuser && !empty($singleuser->USERIMAGE)) {
    $userImageFile = $singleuser->USERIMAGE;
}
$userImagePath = web_root . 'admin/user/' . $userImageFile;

// safe account name fallback
$accountName = isset($_SESSION['ACCOUNT_NAME']) ? $_SESSION['ACCOUNT_NAME'] : 'Account';
?>

<body>
  <!-- Enhanced top quick bar -->
  <div class="top-quick">
    <div>
      <strong>🎓 Student Enrollment & Information System</strong>
      <span style="margin-left:12px; color: rgba(255,255,255,0.95); font-weight:500;">| &nbsp;&nbsp;Admin Panel</span>
    </div>
    <div class="quick-info">
      <div><i class="fa fa-calendar"></i> AY: <?php echo htmlspecialchars($_SESSION['SY'] ?? date('Y').'-'.(date('Y')+1)); ?></div>
      <div><i class="fa fa-clock-o"></i> <?php echo htmlspecialchars($_SESSION['SEMESTER'] ?? ''); ?>&nbsp;Semester</div>
    </div>
  </div>

  <!-- Enhanced Navigation -->
  <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-main">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand" href="<?php echo web_root; ?>admin/index.php">
        <img src="<?php echo web_root; ?>img/school_seal_100x100.png" alt="seal">
        <span>Benguet State University - Bokod Campus</span>
      </a>
    </div>

    <!-- Enhanced top-right menu -->
    <div class="collapse navbar-collapse" id="navbar-collapse-main">
      <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-plus fa-fw"></i> New <i class="fa fa-caret-down"></i>
          </a>
          <ul class="dropdown-menu">
            <li class="dropdown-header">Create New</li>
          <li class="<?php echo (in_array($_SESSION['ACCOUNT_TYPE'], ['Chairperson', 'Registrar'])) ? '' : 'disabled'; ?>">
    <a href="<?php echo (in_array($_SESSION['ACCOUNT_TYPE'], ['Chairperson', 'Registrar'])) ? web_root.'admin/subject/index.php?view=add' : '#'; ?>" 
       onclick="return checkAccess('<?php echo $_SESSION['ACCOUNT_TYPE']; ?>', ['Chairperson', 'Registrar'])">
        <i class="fa fa-book fa-fw text-success"></i> Subject
    </a>
          </li>

            <li class="<?php echo (in_array($_SESSION['ACCOUNT_TYPE'], ['Chairperson', 'Registrar'])) ? '' : 'disabled'; ?>">
    <a href="<?php echo (in_array($_SESSION['ACCOUNT_TYPE'], ['Chairperson', 'Registrar'])) ? web_root.'admin/department/index.php?view=add' : '#'; ?>" 
       onclick="return checkAccess('<?php echo $_SESSION['ACCOUNT_TYPE']; ?>', ['Chairperson', 'Registrar'])">
        <i class="fa fa-building fa-fw text-info"></i> Department
    </a>
          </li>

             <li class="<?php echo (in_array($_SESSION['ACCOUNT_TYPE'], ['Chairperson','Registrar'])) ? '' : 'disabled'; ?>">
    <a href="<?php echo (in_array($_SESSION['ACCOUNT_TYPE'], ['Chairperson','Registrar'])) ? web_root.'admin/user/index.php?view=add' : '#'; ?>" 
       onclick="return checkAccess('<?php echo $_SESSION['ACCOUNT_TYPE']; ?>', ['Chairperson', 'Registrar'])">
        <i class="fa fa-graduation-cap fa-fw"></i> Course
    </a>
          </li>

            <?php if (isset($_SESSION['ACCOUNT_TYPE']) && $_SESSION['ACCOUNT_TYPE']=='Registrar') { ?>
              <li><a href="<?php echo web_root; ?>admin/user/index.php?view=add"><i class="fa fa-user fa-fw text-primary"></i> User</a></li>
            <?php } ?>
          </ul>
        </li>
<!-- Enhanced user dropdown -->
<li class="dropdown">
  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
    <i class="fa fa-user fa-fw"></i> <?php echo htmlspecialchars($accountName); ?> 
    <img title="profile image" width="32" height="32" src="<?php echo htmlspecialchars($userImagePath); ?>" alt="profile" style="object-fit:cover; border-radius:50%; margin-left:8px; border: 2px solid var(--accent);">
    <i class="fa fa-caret-down" style="margin-left:6px;"></i>
  </a>

  <ul class="dropdown-menu">
    <li class="dropdown-header">
      <!-- Clickable profile image that opens the modal -->
      <a href="#" data-toggle="modal" data-target="#usermodal" style="display: block; text-align: center; text-decoration: none; color: inherit;">
        <img src="<?php echo htmlspecialchars($userImagePath); ?>" alt="profile" width="80" height="80" style="border-radius:50%; object-fit:cover; border: 3px solid rgba(255,255,255,0.3); cursor: pointer; transition: transform 0.2s ease;">
        <p style="margin-top: 10px; margin-bottom: 5px;"><?php echo htmlspecialchars($accountName); ?></p>
        <small><?php echo isset($_SESSION['ACCOUNT_TYPE']) ? htmlspecialchars($_SESSION['ACCOUNT_TYPE']) : ''; ?></small>
      </a>
    </li>
    <li><a href="<?php echo web_root; ?>admin/user/index.php?view=edit&id=<?php echo intval($_SESSION['ACCOUNT_ID']); ?>"><i class="fa fa-edit fa-fw text-primary"></i> Edit Profile</a></li>
    <li><a href="<?php echo web_root; ?>admin/logout.php"><i class="fa fa-sign-out fa-fw text-danger"></i> Logout</a></li>
  </ul>
</li>

      <!-- Mobile sidebar trigger -->
      <div class="navbar-left visible-xs" style="margin-left:12px;">
        <a class="btn btn-success btn-sm" href="<?php echo web_root; ?>admin/index.php"><i class="fa fa-home"></i> Dashboard</a>
      </div>
    </div>
  </nav>

  <div id="wrapper">
    <!-- Enhanced Sidebar - now fixed -->
    <div class="navbar-default sidebar" role="navigation">
      <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
          <!-- Dashboard -->
          <li><a href="<?php echo web_root; ?>admin/index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>

          <li class="menu-divider"></li>
          <li class="menu-header">Enrollment Management</li>

          <!-- New Enrollees -->
          <li class="<?php echo (in_array($_SESSION['ACCOUNT_TYPE'], ['Registrar'])) ? '' : 'disabled'; ?>">
            <a href="<?php echo (in_array($_SESSION['ACCOUNT_TYPE'], ['Registrar'])) ? web_root.'admin/enrollees/index.php' : '#'; ?>" 
               onclick="return checkAccess('<?php echo $_SESSION['ACCOUNT_TYPE']; ?>', ['Registrar'])">
                <i class="fa fa-user-plus fa-fw"></i> New Enrollees
            </a>
          </li>

          <!-- Students -->
          <li class="<?php echo (in_array($_SESSION['ACCOUNT_TYPE'], ['Registrar'])) ? '' : 'disabled'; ?>">
            <a href="<?php echo (in_array($_SESSION['ACCOUNT_TYPE'], ['Registrar'])) ? web_root.'admin/student/index.php' : '#'; ?>" 
               onclick="return checkAccess('<?php echo $_SESSION['ACCOUNT_TYPE']; ?>', ['Registrar'])">
                <i class="fa fa-users fa-fw"></i> Students
            </a>
          </li>

          <li class="menu-divider"></li>
          <li class="menu-header">Academic Management</li>

          <!-- Departments -->
          <li class="<?php echo (in_array($_SESSION['ACCOUNT_TYPE'], ['Chairperson', 'Registrar'])) ? '' : 'disabled'; ?>">
            <a href="<?php echo (in_array($_SESSION['ACCOUNT_TYPE'], ['Chairperson', 'Registrar'])) ? web_root.'admin/department/index.php' : '#'; ?>" 
               onclick="return checkAccess('<?php echo $_SESSION['ACCOUNT_TYPE']; ?>', ['Chairperson', 'Registrar'])">
                <i class="fa fa-building fa-fw"></i> Departments
            </a>
          </li>

          <!-- Courses -->
          <li class="<?php echo (in_array($_SESSION['ACCOUNT_TYPE'], ['Chairperson', 'Registrar'])) ? '' : 'disabled'; ?>">
            <a href="<?php echo (in_array($_SESSION['ACCOUNT_TYPE'], ['Chairperson', 'Registrar'])) ? web_root.'admin/course/index.php' : '#'; ?>" 
               onclick="return checkAccess('<?php echo $_SESSION['ACCOUNT_TYPE']; ?>', ['Chairperson', 'Registrar'])">
                <i class="fa fa-graduation-cap fa-fw"></i> Courses
            </a>
          </li>

          <!-- Subjects -->
          <li class="<?php echo (in_array($_SESSION['ACCOUNT_TYPE'], ['Chairperson', 'Registrar'])) ? '' : 'disabled'; ?>">
            <a href="<?php echo (in_array($_SESSION['ACCOUNT_TYPE'], ['Chairperson', 'Registrar'])) ? web_root.'admin/subject/index.php' : '#'; ?>" 
               onclick="return checkAccess('<?php echo $_SESSION['ACCOUNT_TYPE']; ?>', ['Chairperson', 'Registrar'])">
                <i class="fa fa-book fa-fw"></i> Subjects
            </a>
          </li>

          <!-- Instructors -->
          <li class="<?php echo (in_array($_SESSION['ACCOUNT_TYPE'], ['Chairperson', 'Registrar'])) ? '' : 'disabled'; ?>">
            <a href="<?php echo (in_array($_SESSION['ACCOUNT_TYPE'], ['Chairperson', 'Registrar'])) ? web_root.'admin/instructor/index.php' : '#'; ?>" 
               onclick="return checkAccess('<?php echo $_SESSION['ACCOUNT_TYPE']; ?>', ['Chairperson', 'Registrar'])">
                <i class="fa fa-user-circle fa-fw"></i> Instructors
            </a>
          </li>

          <!-- Schedule -->
          <li class="<?php echo (in_array($_SESSION['ACCOUNT_TYPE'], ['Chairperson', 'Registrar'])) ? '' : 'disabled'; ?>">
            <a href="<?php echo (in_array($_SESSION['ACCOUNT_TYPE'], ['Chairperson', 'Registrar'])) ? web_root.'admin/schedule/index.php' : '#'; ?>" 
               onclick="return checkAccess('<?php echo $_SESSION['ACCOUNT_TYPE']; ?>', ['Chairperson', 'Registrar'])">
                <i class="fa fa-calendar fa-fw"></i> Schedule
            </a>
          </li>

          <!-- Classroom Utilization -->
          <li class="<?php echo (in_array($_SESSION['ACCOUNT_TYPE'], ['Chairperson', 'Registrar'])) ? '' : 'disabled'; ?>">
            <a href="<?php echo (in_array($_SESSION['ACCOUNT_TYPE'], ['Chairperson', 'Registrar'])) ? web_root.'admin/classroom/index.php?view=list' : '#'; ?>" 
               onclick="return checkAccess('<?php echo $_SESSION['ACCOUNT_TYPE']; ?>', ['Chairperson', 'Registrar'])">
                <i class="fa fa-home fa-fw"></i> Classroom Utilization
            </a>
          </li>

          <li class="menu-divider"></li>
          <li class="menu-header">Reports & Analytics</li>

          <!-- Reports -->
          <li class="<?php echo (in_array($_SESSION['ACCOUNT_TYPE'], ['Registrar'])) ? '' : 'disabled'; ?>">
            <?php if (in_array($_SESSION['ACCOUNT_TYPE'], ['Registrar'])): ?>
                <a href="#"><i class="fa fa-bar-chart fa-fw"></i> Reports <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo web_root; ?>admin/report/index.php?view=studentlist"><i class="fa fa-list"></i> Student List</a></li>
                    <li>
                        <a href="#"><i class="fa fa-users"></i> Enrollment Reports <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li><a href="<?php echo web_root; ?>admin/report/index.php?view=perCourse">By Course/Year</a></li>
                            <li><a href="<?php echo web_root; ?>admin/report/index.php?view=perSubject">By Subject</a></li>
                            <li><a href="<?php echo web_root; ?>admin/report/index.php?view=perSemester">By Semester</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo web_root; ?>admin/report/index.php?view=log"><i class="fa fa-history"></i> System Log</a></li>
                </ul>
            <?php else: ?>
                <a href="#" onclick="return checkAccess('<?php echo $_SESSION['ACCOUNT_TYPE']; ?>', ['Registrar'])">
                    <i class="fa fa-bar-chart fa-fw"></i> Reports
                </a>
            <?php endif; ?>
          </li>

          <li class="menu-divider"></li>
          <li class="menu-header">System Settings</li>

          <!-- Set Semester -->
          <li class="<?php echo ($_SESSION['ACCOUNT_TYPE'] == 'Registrar') ? '' : 'disabled'; ?>">
            <a href="<?php echo ($_SESSION['ACCOUNT_TYPE'] == 'Registrar') ? web_root.'admin/maintenance/index.php' : '#'; ?>" 
               onclick="return checkAccess('<?php echo $_SESSION['ACCOUNT_TYPE']; ?>', ['Registrar'])">
                <i class="fa fa-cogs fa-fw"></i> Semester Settings
            </a>
          </li>

          <!-- Admin Features -->
          <?php if ($_SESSION['ACCOUNT_TYPE'] == 'Registrar') { ?>
              <li><a href="<?php echo web_root; ?>admin/user/index.php"><i class="fa fa-user-secret fa-fw"></i> User Management</a></li>
              <li><a href="<?php echo web_root; ?>admin/back-up/index.php"><i class="fa fa-hdd-o fa-fw"></i> Backup & Restore</a></li>
          <?php } ?>
        </ul>

        <!-- SweetAlert2 Script -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>

        <!-- JavaScript to handle disabled links and SweetAlert2 -->
        <script>
         function checkAccess(accountType, allowedRoles) {
            if (!allowedRoles.includes(accountType)) {
                const roleNames = allowedRoles.map(role => {
                    switch(role) {
                        case 'Registrar': return 'Registrar';
                        case 'Registrar': return 'Registrar';
                        case 'Chairperson': return 'Department Chairperson';
                        default: return role;
                    }
                }).join(' or ');
                
                Swal.fire({
                    icon: 'error',
                    title: 'Access Denied',
                    html: `This section requires <strong>${roleNames}</strong> privileges.<br><br>
                           Your current role: <strong>${accountType}</strong>`,
                    confirmButtonText: 'OK',
                    allowOutsideClick: false,
                    backdrop: true
                });
                return false;
            }
            return true;
        }
        </script>
      </div>
    </div>

    <!-- Enhanced Page Wrapper - now scrollable -->
    <div id="page-wrapper">
      <?php check_message(); ?>
      <div class="row">
        <div class="col-lg-12">
          <!-- Enhanced Breadcrumb -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li><a href="<?php echo web_root; ?>admin/index.php" title="Home">Home</a></li>
              <?php if (isset($title) && $title <> 'Home'): ?>
                <li><a href="index.php" title="<?php echo htmlspecialchars($title); ?>"><?php echo htmlspecialchars($title); ?></a></li>
                <?php if (isset($header)): ?>
                  <li class="active"><?php echo htmlspecialchars($header); ?></li>
                <?php endif; ?>
              <?php endif; ?>
            </ol>
          </nav>

          <?php
            if (isset($content) && $content != '' && file_exists($content)) {
                require_once $content;
            } else {
                echo '<div class="alert alert-warning">Content not found.</div>';
            }
          ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Enhanced Footer -->
  <footer>
    <div class="panel-body">
      <div style="display:flex; justify-content:space-between; align-items:center; gap:10px; flex-wrap:wrap;">
        <div>&copy; <?php echo date('Y'); ?> Benguet State University - Bokod Campus</div>
        <div style="font-size:12px; color:var(--muted);">
          <i class="fa fa-heart text-danger"></i> Student Enrollment & Information System
        </div>
      </div>
    </div>
  </footer>

  <!-- Enhanced Modal -->
  <div class="modal fade" id="usermodal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" data-dismiss="modal" type="button">×</button>
          <h4 class="modal-title">Profile Image</h4>
        </div>

        <form action="<?php echo web_root; ?>admin/user/controller.php?action=photos" enctype="multipart/form-data" method="post">
          <div class="modal-body">
            <div class="form-group">
              <div class="rows">
                <div class="col-md-12 text-center">
                  <img title="profile image" width="200" height="200" src="<?php echo htmlspecialchars($userImagePath); ?>" alt="profile-image" style="border-radius:50%; object-fit:cover; border: 4px solid var(--accent); box-shadow: var(--shadow);">
                </div>
                <div class="col-md-12" style="margin-top:20px;">
                  <div class="rows">
                    <div class="col-md-8">
                      <input type="hidden" name="MIDNO" id="MIDNO" value="<?php echo isset($_SESSION['ACCOUNT_ID'])?intval($_SESSION['ACCOUNT_ID']):0;?>">
                      <input name="MAX_FILE_SIZE" type="hidden" value="1000000">
                      <input id="photo" name="photo" type="file" class="form-control">
                    </div>
                    <div class="col-md-4"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
            <button class="btn btn-primary" name="savephoto" type="submit">Upload Photo</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<!-- jQuery (CDN) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap 3 JS (CDN) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>

<!-- Moment (required by bootstrap-datetimepicker) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

<!-- Bootstrap Datetimepicker (bootstrap3 compatible) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

<!-- Select2 (CDN) -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- DataTables (local or CDN as you prefer) -->
<script src="<?php echo web_root; ?>admin/js/jquery.dataTables.min.js"></script>
<script src="<?php echo web_root; ?>admin/js/dataTables.bootstrap.min.js"></script>

<!-- Input mask & other local plugins -->
<script src="<?php echo web_root; ?>input-mask/jquery.inputmask.js"></script>
<script src="<?php echo web_root; ?>input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo web_root; ?>input-mask/jquery.inputmask.extensions.js"></script>
<script src="<?php echo web_root; ?>input-mask/meiomask.min.js"></script>
<script src="<?php echo web_root; ?>js/ekko-lightbox.js"></script>

<!-- Morris (charts) - local (or use CDN if you prefer) -->
<script src="<?php echo web_root; ?>admin/js/raphael-min.js"></script>
<script src="<?php echo web_root; ?>admin/js/morris.min.js"></script>
<script src="<?php echo web_root; ?>admin/js/morris-data.js"></script>

<!-- App scripts -->
<script src="<?php echo web_root; ?>admin/js/metisMenu.min.js"></script>
<script src="<?php echo web_root; ?>admin/js/sb-admin-2.js"></script>
<script src="<?php echo web_root; ?>admin/js/janobe.js"></script>

<!-- AJAX Handler Framework -->
<script src="<?php echo web_root; ?>admin/js/ajax-handler.js"></script>

<!-- Page-level behavior (unchanged logic) -->
<script>
  $(function () {
    $(".select2").select2();
  });

  $('input[data-mask]').each(function() {
    var input = $(this);
    try {
        input.setMask(input.data('mask'));
    } catch(e) { /* ignore if mask library not available */ }
  });

  //Datemask2 mm/dd/yyyy
  $("#datetime12").inputmask("hh:mm t", {"placeholder": "hh:mm t"});
  $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
  $("[data-mask]").inputmask();

  $(document).ready(function() {
    var t = $('#example').DataTable( {
      "columnDefs": [ {
        "searchable": false,
        "orderable": false,
        "targets": 0
      } ],
      "order": [[ 6, 'desc' ]]
    } );

    t.on( 'order.dt search.dt', function () {
      t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
      } );
    } ).draw();
  });

  $(document).ready(function() {
    $('#dash-table').DataTable({
      responsive: true,
      "sort": false
    });
    $('#dash-table1').DataTable({
      responsive: true,
      "sort": false
    });
  });

  $('.date_pickerfrom').datetimepicker({
    format: 'mm/dd/yyyy',
    startDate : '01/01/2000',
    language: 'en',
    weekStart: 1,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
  });

  $('.date_pickerto').datetimepicker({
    format: 'mm/dd/yyyy',
    startDate : '01/01/2000',
    language: 'en',
    weekStart: 1,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
  });

  $('#date_picker').datetimepicker({
    format: 'mm/dd/yyyy',
    language: 'en',
    weekStart: 1,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0,
    changeMonth: true,
    changeYear: true,
    yearRange: '1945:'+(new Date).getFullYear()
  });
</script>

<!-- Small helpers (unchanged) -->
<script type="text/javascript">
$(document).on("change", "#COURSE_ID", function () {
   var courseid =  document.getElementById('COURSE_ID').value;
   var semester = document.getElementById('sched_semester') ? document.getElementById('sched_semester').value : '';
   $("#loadedit").hide();
   $.ajax({
      type:"POST",
      url: "loaddata.php",
      dataType: "text",
      data:{id:courseid, SEMESTER:semester},
      success: function(data){
       $('#loaddata').html(data);
      }
   });
});

$(document).on("change", "#sched_semester", function () {
   var courseid = document.getElementById('COURSE_ID') ? document.getElementById('COURSE_ID').value : '';
   var semester = document.getElementById('sched_semester') ? document.getElementById('sched_semester').value : '';
   $("#loadedit").hide();
   $.ajax({
      type:"POST",
      url: "loaddata.php",
      dataType: "text",
      data:{id:courseid, SEMESTER:semester},
      success: function(data){
       $('#loaddata').html(data);
      }
   });
});

$(document).on("change", "#INST_ID", function () {
   var instid =  document.getElementById('INST_ID') ? document.getElementById('INST_ID').value : '';
   $("#spacing").hide();
   $("#HideMe").hide();
   $.ajax({
      type:"POST",
      url: "loaddata.php",
      dataType: "text",
      data:{id:instid},
      success: function(data){
       $('#loadsubject').html(data);
      }
   });
});

$("#gosearch").click(function() {
    var instructorEl = document.getElementById("INST_ID");
    var instructor = instructorEl ? instructorEl.value : 'Select';
    if (instructor == 'Select') {
        alert("Pls. Select Instructor.");
        return false;
    } else {
        return true;
    };
});
</script>

</body>
</html>