<?php
// template.php - improved, full file with enhanced mobile responsiveness
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo isset($title) ? htmlspecialchars($title) : 'Benguet State University - Bokod Campus'; ?> | Benguet State University - Bokod Campus</title>
<link rel="icon" type="image/png" href="<?php echo isset($web_root) ? $web_root : ''; ?>img/favicon.png">

<!-- Core CSS --> 
<link href="<?php echo web_root; ?>css/bootstrap.min.css" rel="stylesheet"> 
<link href="<?php echo web_root; ?>font/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
<link href="<?php echo web_root; ?>css/dataTables.bootstrap.css" rel="stylesheet"> 
<link href="<?php echo web_root; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen"> 
<link href="<?php echo web_root; ?>css/modern.css" rel="stylesheet"> 
<link href="<?php echo web_root; ?>css/custom.css" rel="stylesheet"> 
<link href="<?php echo web_root; ?>css/mobile-enhancements.css" rel="stylesheet"> 
<link href="<?php echo web_root; ?>css/ui-enhancements.css" rel="stylesheet"> 
<link href="<?php echo web_root; ?>css/ekko-lightbox.css" rel="stylesheet">

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

html, body { 
  height: 100%; 
  background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  line-height: 1.6;
  margin: 0;
  padding: 0;
}

/* Enhanced Site Container - WIDENED */
.site-container {
  max-width: 1600px; /* Increased from 1200px */
  margin: 20px auto;
  padding: 0 25px;
  box-sizing: border-box;
  width: 100%;
}

/* Modern Topbar - Full Width */
.topbar {
  background: linear-gradient(135deg, var(--accent), var(--accent-dark));
  color: #fff;
  padding: 12px 30px;
  border-radius: var(--radius);
  margin-bottom: 25px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
  box-shadow: var(--shadow);
  position: relative;
  width: 100%;
}

.topbar::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 2px;
  background: linear-gradient(90deg, #fff, transparent);
  opacity: 0.3;
}

.topbar .left { 
  font-size: 16px;
  font-weight: 700;
  display: flex;
  align-items: center;
  gap: 10px;
}

.topbar .right { 
  font-size: 14px; 
  color: rgba(255,255,255,0.95); 
  display: flex;
  align-items: center;
  gap: 20px;
}

.topbar a { 
  color: rgba(255,255,255,0.95); 
  text-decoration: none;
  transition: var(--transition);
}

.topbar a:hover { 
  color: #fff; 
  text-decoration: underline;
}

.topbar .quick-info {
  display: flex;
  align-items: center;
  gap: 20px;
}

.topbar .quick-info > span {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 6px 15px;
  background: rgba(255,255,255,0.15);
  border-radius: 20px;
  font-weight: 600;
  font-size: 14px;
}

/* Enhanced Main Navigation - Full Width */
.main-nav {
  background: #fff;
  border-radius: var(--radius);
  padding: 20px 30px;
  box-shadow: var(--shadow);
  margin-bottom: 30px;
  display: flex;
  align-items: center;
  gap: 30px;
  width: 100%;
  position: sticky;
  top: 0;
  z-index: 1000;
  transition: var(--transition);
}

.brand {
  display: flex;
  gap: 20px;
  align-items: center;
  text-decoration: none;
  transition: var(--transition);
  flex-shrink: 0;
}

.brand:hover {
  transform: translateY(-1px);
}

.brand img { 
  height: 70px; 
  width: auto; 
  border-radius: 10px; 
  box-shadow: 0 4px 12px rgba(0,0,0,0.15);
  border: 3px solid var(--accent);
}

.brand-text {
  display: flex;
  flex-direction: column;
}

.brand h1 { 
  font-size: 26px; 
  margin: 0; 
  color: var(--primary); 
  font-weight: 800; 
  line-height: 1.1;
  letter-spacing: -0.5px;
}

.brand .campus {
  color: var(--accent-dark);
  font-size: 16px;
  font-weight: 700;
  margin-top: 4px;
}

.nav-links { 
  margin-left: auto; 
  flex: 1; 
  max-width: 600px;
}

.nav-links .nav { 
  margin: 0; 
  display: flex; 
  gap: 10px; 
  align-items: center; 
  list-style: none; 
  padding-left: 0; 
  justify-content: flex-end;
}

.nav-links .nav li { 
  margin: 0; 
}

.nav-links .nav a { 
  display: block; 
  padding: 12px 20px; 
  border-radius: var(--radius); 
  color: var(--dark); 
  text-decoration: none; 
  font-weight: 600;
  font-size: 15px;
  transition: var(--transition);
  border: 2px solid transparent;
  white-space: nowrap;
}

.nav-links .nav a:hover, 
.nav-links .nav .active a { 
  background: linear-gradient(135deg, #f2fbf4, #e8f5e8);
  color: var(--accent-dark); 
  border-color: var(--accent);
  box-shadow: var(--shadow);
}

.user-actions { 
  display: flex; 
  gap: 15px; 
  align-items: center; 
  flex-shrink: 0;
}

/* Enhanced Hamburger Menu */
.hamburger-menu {
  display: none;
  flex-direction: column;
  cursor: pointer;
  padding: 12px;
  margin-left: auto;
  background: transparent;
  border: none;
  border-radius: var(--radius);
  transition: background 0.3s ease, transform 0.2s ease;
  width: 44px;
  height: 44px;
  justify-content: center;
  align-items: center;
  gap: 4px;
}

.hamburger-menu:hover {
  background: var(--light);
}

.hamburger-menu span {
  width: 24px;
  height: 3px;
  background: var(--primary);
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  border-radius: 2px;
  display: block;
}

/* Enhanced Buttons */
.btn {
  border: none;
  border-radius: var(--radius);
  font-weight: 600;
  padding: 10px 20px;
  transition: var(--transition);
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  font-size: 14px;
}

.btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.btn-success {
  background: linear-gradient(135deg, var(--accent), var(--accent-dark));
}

.btn-default {
  background: linear-gradient(135deg, var(--light), #e9ecef);
  color: var(--dark);
}

.btn-default:hover {
  background: linear-gradient(135deg, #e9ecef, #dee2e6);
}

/* Enhanced Dropdown */
.dropdown-menu {
  border: none;
  border-radius: var(--radius);
  box-shadow: var(--shadow-lg);
  padding: 0;
  overflow: hidden;
  min-width: 200px;
}

.dropdown-menu > li > a {
  padding: 12px 20px;
  color: var(--dark);
  font-weight: 500;
  transition: var(--transition);
  border-left: 3px solid transparent;
  font-size: 14px;
}

.dropdown-menu > li > a:hover {
  background: var(--light);
  color: var(--accent);
  border-left-color: var(--accent);
  padding-left: 25px;
}

/* Content Layout - WIDENED */
.content-row { 
  display: flex; 
  gap: 30px; 
  align-items: flex-start; 
  margin-bottom: 40px;
  width: 100%;
}

.main-col { 
  flex: 0 0 78%; /* Increased from 72% */
  max-width: 78%;
  min-width: 0; /* Allow shrinking */
}

/* Full width when sidebar is not present */
.content-row:not(:has(.side-col)) .main-col {
  flex: 0 0 100%;
  max-width: 100%;
}

.side-col { 
  flex: 0 0 22%; /* Adjusted from 28% */
  max-width: 22%;
  min-width: 0;
  position: sticky;
  top: 20px;
  align-self: flex-start;
}

/* Enhanced Panels */
.panel { 
  background: #fff; 
  border-radius: var(--radius); 
  box-shadow: var(--shadow); 
  overflow: hidden; 
  border: none;
  margin-bottom: 25px;
  transition: var(--transition);
  width: 100%;
}

.panel:hover {
  box-shadow: var(--shadow-lg);
  transform: translateY(-2px);
}

.panel .panel-heading { 
  padding: 18px 25px; 
  background: linear-gradient(135deg, var(--primary), var(--secondary));
  color: #fff; 
  font-weight: 700;
  font-size: 18px;
  border-bottom: none;
}

.panel .panel-body { 
  padding: 25px; 
  /* color: var(--dark);  */
}

/* Table Improvements for Wider Layout */
.table-container {
  width: 100%;
  overflow-x: auto;
}

.table {
  width: 100%;
  margin-bottom: 0;
}

.table th {
  background: var(--light);
  font-weight: 600;
  color: var(--primary);
  border-bottom: 2px solid var(--accent);
  padding: 12px 15px;
}

.table td {
  padding: 12px 15px;
  vertical-align: middle;
}

/* Form Improvements */
.form-horizontal .form-group {
  margin-left: 0;
  margin-right: 0;
}

.form-control {
  border-radius: var(--radius);
  border: 2px solid #e9ecef;
  padding: 10px 15px;
  font-size: 14px;
  transition: var(--transition);
}

.form-control:focus {
  border-color: var(--accent);
  box-shadow: 0 0 0 3px rgba(39, 174, 96, 0.1);
}

/* Alert Enhancements */
.alert {
  border: none;
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  border-left: 4px solid;
  padding: 15px 20px;
  font-size: 14px;
}

.alert-warning {
  border-left-color: var(--warning);
}

/* Badge Enhancement */
.badge-accent { 
  background: var(--accent); 
  color: #fff; 
  padding: 6px 12px; 
  border-radius: 20px; 
  font-weight: 700; 
  margin-left: 8px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  font-size: 12px;
}

/* Footer Enhancement */
footer .panel {
  background: linear-gradient(135deg, var(--primary), var(--secondary));
  border-radius: var(--radius);
  margin-bottom: 0;
  width: 100%;
}

footer .panel-body {
  color: #fff;
  text-align: center;
  padding: 25px;
  font-size: 15px;
}

/* Modal Enhancement */
.modal-content {
  border: none;
  border-radius: var(--radius);
  box-shadow: var(--shadow-lg);
  max-width: 600px;
  margin: 0 auto;
}

.modal-header {
  background: linear-gradient(135deg, var(--primary), var(--secondary));
  color: white;
  border-radius: var(--radius) var(--radius) 0 0;
  border-bottom: none;
  padding: 20px 25px;
}

.modal-header .close {
  color: white;
  opacity: 0.8;
  text-shadow: none;
  font-size: 24px;
}

.modal-header .close:hover {
  opacity: 1;
}

.modal-title {
  font-size: 20px;
  font-weight: 700;
}

/* Grid System Improvements */
.row {
  margin-left: -15px;
  margin-right: -15px;
}

.col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6,
.col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12 {
  padding-left: 15px;
  padding-right: 15px;
}

/* ============================================= */
/* ENHANCED MOBILE RESPONSIVENESS - IMPROVED */
/* ============================================= */

@media (max-width: 1200px) {
  .site-container {
    max-width: 1140px;
    padding: 0 20px;
  }
  
  .main-col { 
    flex: 0 0 75%; 
    max-width: 75%; 
  }
  
  .side-col { 
    flex: 0 0 25%; 
    max-width: 25%; 
  }
}

@media (max-width: 991px) {
  .site-container {
    max-width: 960px;
  }
  
  .content-row { 
    flex-direction: column; 
    gap: 20px;
  }
  
  .main-col, .side-col { 
    max-width: 100%; 
    flex: 1 1 100%; 
  }
  
  /* Hide topbar on tablets and mobile */
  .topbar {
    display: none;
  }
  
  /* Enhanced Hamburger menu for tablets */
  .hamburger-menu {
    display: flex;
    order: 2;
  }
  
  .nav-links, .user-actions {
    display: none;
  }
  
  .main-nav {
    flex-wrap: wrap;
    padding: 15px 20px;
    position: relative;
  }
  
  .main-nav.active {
    padding-bottom: 20px;
    background: #fff;
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
  }
  
  .main-nav.active .nav-links,
  .main-nav.active .user-actions {
    display: block;
    width: 100%;
    animation: slideDown 0.35s cubic-bezier(0.4, 0, 0.2, 1);
  }
  
  .nav-links {
    order: 3;
    margin: 0;
    max-width: 100%;
  }
  
  .nav-links .nav { 
    flex-direction: column; 
    gap: 8px;
    margin: 15px 0;
    width: 100%;
  }
  
  .nav-links .nav a {
    text-align: left;
    padding: 14px 20px;
    border-radius: 10px;
    margin: 0;
    width: 100%;
    box-sizing: border-box;
    font-size: 16px;
    border: 2px solid #f0f0f0;
    background: #fafafa;
  }
  
  .nav-links .nav a:hover,
  .nav-links .nav .active a {
    background: linear-gradient(135deg, var(--accent-light), var(--accent));
    color: white;
    border-color: var(--accent);
    transform: translateX(5px);
  }
  
  .user-actions {
    order: 4;
    margin-top: 15px;
    flex-direction: column;
    gap: 12px;
    width: 100%;
  }
  
  .user-actions .btn {
    width: 100%;
    margin: 0;
    text-align: center;
    padding: 12px 20px;
    font-size: 15px;
  }
  
  .user-actions .dropdown {
    width: 100%;
  }
  
  .user-actions .dropdown .btn {
    width: 100%;
    text-align: left;
  }
  
  .user-actions .dropdown-menu {
    width: 100%;
    position: static !important;
    transform: none !important;
    border: 2px solid #f0f0f0;
    margin-top: 5px;
    display: block !important; /* Always show dropdown menu on mobile */
    opacity: 1 !important;
    visibility: visible !important;
  }
  
  /* Hide the dropdown toggle caret on mobile since menu is always visible */
  .user-actions .dropdown-toggle .caret {
    display: none;
  }
  
  /* Enhanced hamburger animation */
  .main-nav.active .hamburger-menu {
    background: var(--accent);
  }
  
  .main-nav.active .hamburger-menu span {
    background: white;
  }
  
  .main-nav.active .hamburger-menu span:nth-child(1) {
    transform: translateY(7px) rotate(45deg);
  }
  
  .main-nav.active .hamburger-menu span:nth-child(2) {
    opacity: 0;
    transform: scaleX(0);
  }
  
  .main-nav.active .hamburger-menu span:nth-child(3) {
    transform: translateY(-7px) rotate(-45deg);
  }
  
  .brand {
    flex: 1;
    min-width: 0;
  }
  
  .brand img { 
    height: 55px; 
  }
  
  .brand h1 {
    font-size: 20px;
    line-height: 1.2;
  }
  
  .brand .campus {
    font-size: 14px;
  }
  
  .topbar {
    flex-direction: column;
    gap: 12px;
    text-align: center;
    padding: 15px 20px;
  }
  
  .topbar .quick-info {
    justify-content: center;
    flex-wrap: wrap;
    gap: 10px;
  }
  
  .topbar .quick-info > span {
    font-size: 13px;
    padding: 6px 12px;
    flex: 1;
    min-width: 140px;
    justify-content: center;
  }
}

@media (max-width: 768px) {
  .site-container {
    max-width: 720px;
    padding: 0 12px;
    margin: 12px auto;
  }
  
  .panel {
    margin-bottom: 15px;
  }
  
  .brand {
    flex-direction: row;
    gap: 12px;
  }
  
  .brand-text {
    min-width: 0;
  }
  
  .brand h1 {
    font-size: 18px;
  }
  
  .brand .campus {
    font-size: 13px;
  }
  
  .brand img {
    height: 50px;
  }
  
  .panel .panel-body {
    padding: 15px;
  }
  
  /* Better touch targets on tablets */
  .btn, .nav-links .nav a, .user-actions .btn {
    min-height: 44px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
  }
  
  .topbar .left {
    font-size: 14px;
  }
  
  .topbar .quick-info > span {
    min-width: 120px;
    font-size: 12px;
    padding: 5px 10px;
  }
  
  .nav-links .nav a {
    padding: 12px 16px;
    font-size: 15px;
  }
}

@media (max-width: 576px) {
  .site-container {
    padding: 0 10px;
    margin: 8px auto;
  }
  
  .main-nav {
    padding: 10px 12px;
    gap: 12px;
    margin-bottom: 15px;
  }
  
  .brand {
    gap: 10px;
  }
  
  .brand img {
    height: 45px;
  }
  
  .brand h1 {
    font-size: 16px;
  }
  
  .brand .campus {
    font-size: 12px;
  }
  
  .hamburger-menu {
    width: 40px;
    height: 40px;
    padding: 10px;
  }
  
  .topbar {
    padding: 12px 15px;
    gap: 10px;
  }
  
  .topbar .quick-info {
    gap: 8px;
  }
  
  .topbar .quick-info > span {
    min-width: 100%;
    font-size: 11px;
    padding: 8px 12px;
  }
  
  .panel .panel-heading {
    padding: 12px 15px;
    font-size: 15px;
  }
  
  .panel .panel-body {
    padding: 12px;
  }
  
  .content-row {
    gap: 15px;
    margin-bottom: 20px;
  }
  
  .nav-links .nav a {
    padding: 14px 16px;
    font-size: 15px;
  }
  
  .user-actions .btn {
    padding: 14px 16px;
    font-size: 15px;
  }
  
  footer .panel-body {
    padding: 15px 12px;
    font-size: 13px;
  }
  
  footer .panel-body > div {
    flex-direction: column !important;
    text-align: center;
    gap: 8px !important;
  }
  
  .table th, .table td {
    padding: 8px 10px;
    font-size: 13px;
  }
  
  .btn {
    padding: 10px 16px;
    font-size: 14px;
  }
  
  .form-control {
    padding: 8px 12px;
    font-size: 14px;
  }
  
  /* Stack topbar items on very small screens */
  .topbar .quick-info > span {
    flex: 0 0 calc(50% - 10px);
    min-width: auto;
  }
}

@media (max-width: 380px) {
  .site-container {
    padding: 0 8px;
    margin: 5px auto;
  }
  
  .brand h1 {
    font-size: 14px;
  }
  
  .brand .campus {
    font-size: 10px;
  }
  
  .brand img {
    height: 38px;
  }
  
  .main-nav {
    padding: 8px 10px;
  }
  
  .topbar .quick-info > span {
    flex: 0 0 100%;
  }
  
  .nav-links .nav a {
    font-size: 14px;
    padding: 10px 12px;
  }
  
  .panel .panel-heading {
    padding: 10px 12px;
    font-size: 14px;
  }
  
  .panel .panel-body {
    padding: 10px;
  }
  
  .hamburger-menu {
    width: 38px;
    height: 38px;
    padding: 8px;
  }
  
  .hamburger-menu span {
    width: 20px;
    height: 2.5px;
  }
}

/* Enhanced Animations */
@keyframes slideDown {
  from {
    opacity: 0;
    max-height: 0;
    transform: translateY(-20px);
  }
  to {
    opacity: 1;
    max-height: 1000px;
    transform: translateY(0);
  }
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.main-col {
  animation: fadeInUp 0.6s ease-out;
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

/* Sidebar specific scrollbar */
.side-col::-webkit-scrollbar {
  width: 6px;
}

.side-col::-webkit-scrollbar-track {
  background: transparent;
}

.side-col::-webkit-scrollbar-thumb {
  background: rgba(39, 174, 96, 0.3);
  border-radius: 3px;
}

.side-col::-webkit-scrollbar-thumb:hover {
  background: rgba(39, 174, 96, 0.6);
}

/* Smooth scroll behavior for sidebar */
.side-col {
  scroll-behavior: smooth;
  scrollbar-width: thin;
  scrollbar-color: rgba(39, 174, 96, 0.3) transparent;
}

/* Utility Classes */
.text-accent {
  color: var(--accent) !important;
}

.bg-accent {
  background-color: var(--accent) !important;
}

.border-accent {
  border-color: var(--accent) !important;
}

.shadow-sm {
  box-shadow: 0 2px 4px rgba(0,0,0,0.05) !important;
}

.rounded-lg {
  border-radius: var(--radius) !important;
}

/* Mobile backdrop for menu */
.mobile-menu-backdrop {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.5);
  z-index: 999;
  backdrop-filter: blur(2px);
}

@media (max-width: 991px) {
  .mobile-menu-backdrop.active {
    display: block;
    animation: fadeIn 0.3s ease;
  }
}
</style>

<?php
// preserve backend logic used across pages
$sem = new Semester();
$resSem = $sem->single_semester();
$_SESSION['SEMESTER'] = isset($resSem->SEMESTER) ? $resSem->SEMESTER : (isset($_SESSION['SEMESTER'])?$_SESSION['SEMESTER']:'');
if (isset($_SESSION['gvCart']) && is_array($_SESSION['gvCart'])) {
  if (count($_SESSION['gvCart'])>0) {
    $cart = '<span class="badge-accent">'.count($_SESSION['gvCart']) .'</span>';
  }
}

// determine and set current academic year if not already set
$currentyear = date('Y');
$nextyear = date('Y') + 1;
$sy = $currentyear .'-'.$nextyear;
$_SESSION['SY'] = $sy;
?>
</head>
<body>

<div class="site-container">

  <!-- Mobile Menu Backdrop -->
  <div class="mobile-menu-backdrop" id="mobileMenuBackdrop"></div>

  <!-- Enhanced Topbar -->
  <div class="topbar" role="banner" aria-label="Top information bar">
    <div class="left">
      <strong>🎓 Student Enrollment & Information System</strong>
    </div>
    <div class="right">
      <div class="quick-info">
        <span title="Contact Phone"><i class="fa fa-phone"></i> <a href="tel:+639684504041">0968-450-4041</a></span>
        <span title="Email"><i class="fa fa-envelope-o"></i> <a href="mailto:bokod.campus@bsu.edu.ph">bokod.campus@bsu.edu.ph</a></span>
        <span title="Academic year"><i class="fa fa-calendar"></i> AY: <?php echo htmlspecialchars($_SESSION['SY']); ?></span>
        <span title="Semester"><i class="fa fa-clock-o"></i> <?php echo htmlspecialchars($_SESSION['SEMESTER']); ?> Semester</span>
      </div>
    </div>
  </div>

  <!-- Enhanced Main Navigation -->
  <div class="main-nav" role="navigation" aria-label="Main navigation">
    <a class="brand" href="<?php echo web_root; ?>index.php" title="Home">
      <img src="<?php echo web_root; ?>img/school_seal_100x100.png" alt="BSU seal">
      <div class="brand-text">
        <h1>Benguet State University</h1>
        <div class="campus">Bokod Campus</div>
      </div>
    </a>

    <!-- Enhanced Hamburger Menu Button -->
    <button class="hamburger-menu" id="hamburgerMenu" aria-label="Toggle navigation menu" aria-expanded="false">
      <span></span>
      <span></span>
      <span></span>
    </button>

    <div class="nav-links" role="menu">
      <ul class="nav" role="menubar">
        <li class="<?php echo (!isset($_GET['q']) || $_GET['q']=='') ? 'active' : ''; ?>"><a href="<?php echo web_root.'index.php'; ?>"><i class="fa fa-home"></i> Home</a></li>
        <li class="<?php echo (isset($_GET['q']) && $_GET['q']=='department') ? 'active' : ''; ?>"><a href="<?php echo web_root.'index.php?q=department'; ?>"><i class="fa fa-building"></i> Departments</a></li>
        <li class="<?php echo (isset($_GET['q']) && ($_GET['q']=='enrol' || $_GET['q']=='subject')) ? 'active' : ''; ?>"><a href="<?php echo web_root.'index.php?q=enrol'; ?>"><i class="fa fa-edit"></i> Enroll Now</a></li>
        <li class="<?php echo (isset($_GET['q']) && $_GET['q']=='about') ? 'active' : ''; ?>"><a href="<?php echo web_root.'index.php?q=about'; ?>"><i class="fa fa-info-circle"></i> About Us</a></li>
      </ul>
    </div>

    <!-- Enhanced User Actions -->
    <div class="user-actions">
      <?php if (isset($_SESSION['IDNO'])): 
        $student = New Student();
        $singlestudent = $student->single_student($_SESSION['IDNO']);
        // show cart only for irregular students as original
      ?>
        <?php if (isset($singlestudent) && isset($singlestudent->student_status) && $singlestudent->student_status=='Irregular'): ?>
          <a class="btn btn-default" href="<?php echo web_root.'index.php?q=cart'; ?>" title="Subjects to enroll">
            <i class="fa fa-shopping-cart"></i> Cart <?php echo isset($cart) ? $cart : ''; ?>
          </a>
        <?php endif; ?>

        <div class="dropdown">
          <a class="btn btn-default dropdown-toggle" href="#" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user"></i> <?php echo isset($singlestudent->FNAME) ? htmlspecialchars($singlestudent->FNAME . ' ' . $singlestudent->LNAME) : 'Student'; ?>
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="userMenu">
            <li><a href="<?php echo web_root; ?>index.php?q=profile"><i class="fa fa-user-circle"></i> My Profile</a></li>
            <li><a href="<?php echo web_root; ?>logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
          </ul>
        </div>

      <?php else: ?>
        <a class="btn btn-success" href="<?php echo web_root.'index.php?q=enrol'; ?>"><i class="fa fa-edit"></i> Enroll Now</a>
      <?php endif; ?>
    </div>
  </div>

  <!-- Enhanced Page Content Area -->
  <div class="content-row" role="main" aria-live="polite">

    <!-- Main Column (wider) -->
    <div class="main-col">
      <?php check_message(); ?>

      <?php
      // If the profile page requires a different wrapper in original code, preserve that behavior
      if (isset($title) && $title === 'Profile') {
          echo '<div class="row">';
          if (isset($content) && $content != '' && file_exists($content)) {
              require_once $content;
          } else {
              echo '<div class="panel"><div class="panel-body">Content not found.</div></div>';
          }
          echo '</div><br/>';
      } else {
      ?>
        <div class="panel">
          <div class="panel-heading">
            <?php
              echo '<i class="fa fa-folder-open"></i> ' . htmlspecialchars($title . (isset($_GET['category']) ?  '  |  ' .$_GET['category'] : '' ));
            ?>
          </div>
          <div class="panel-body">
            <?php
              if (isset($content) && $content != '' && file_exists($content)) {
                  require_once $content;
              } else {
                  echo '<div class="alert alert-warning">Content not found.</div>';
              }
            ?>
          </div>
        </div>
      <?php } ?>
    </div>

    <!-- Sidebar Column (narrower) - Hidden on profile page -->
    <?php if (!isset($title) || $title !== 'Profile'): ?>
    <div class="side-col">
      <?php
      // keep your existing sidebar include but wrap in a panel so it visually matches
      if (file_exists('sidebar.php')) {
          echo '<div class="panel"><div class="panel-heading"><i class="fa fa-link"></i> Quick Links</div><div class="panel-body">';
          require_once "sidebar.php";
          echo '</div></div>';
      } else {
          // fallback
          echo '<div class="panel"><div class="panel-body">Sidebar not found.</div></div>';
      }
      ?>
    </div>
    <?php endif; ?>

  </div>

  <!-- Enhanced Footer -->
  <footer>
    <div class="panel">
      <div class="panel-body">
        <div style="display:flex; justify-content:space-between; align-items:center; gap:10px; flex-wrap:wrap;">
          <div>&copy; <?php echo date('Y'); ?> Benguet State University - Bokod Campus</div>
          <div style="font-size:14px; opacity:0.9;">
            <i class="fa fa-heart text-danger"></i> Student Enrollment & Information System
          </div>
        </div>
        <div style="text-align: center; margin-top: 15px; padding-top: 15px; border-top: 1px solid rgba(255,255,255,0.2); font-size: 13px;">
          <a href="<?php echo web_root; ?>terms.php" target="_blank" style="color: white; text-decoration: none; margin: 0 10px; opacity: 0.9;" onmouseover="this.style.opacity='1'; this.style.textDecoration='underline'" onmouseout="this.style.opacity='0.9'; this.style.textDecoration='none'">
            <i class="fa fa-file-text"></i> Terms and Conditions
          </a>
          |
          <a href="<?php echo web_root; ?>index.php?q=about" style="color: white; text-decoration: none; margin: 0 10px; opacity: 0.9;" onmouseover="this.style.opacity='1'; this.style.textDecoration='underline'" onmouseout="this.style.opacity='0.9'; this.style.textDecoration='none'">
            <i class="fa fa-info-circle"></i> About Us
          </a>
        </div>
      </div>
    </div>
  </footer>

</div>

<!-- Modal placeholder -->
<div class="modal fade" id="myOrdered"></div>

<!-- Scripts (kept same as original) --> 
<script src="<?php echo web_root; ?>jquery/jquery.min.js"></script> 
<script src="<?php echo web_root; ?>js/bootstrap.min.js"></script> 
<script src="<?php echo web_root; ?>input-mask/jquery.inputmask.js"></script> 
<script src="<?php echo web_root; ?>input-mask/jquery.inputmask.date.extensions.js"></script> 
<script src="<?php echo web_root; ?>input-mask/jquery.inputmask.extensions.js"></script> 
<script src="<?php echo web_root; ?>js/jquery.dataTables.min.js"></script> 
<script src="<?php echo web_root; ?>js/dataTables.bootstrap.min.js"></script> 
<script src="<?php echo web_root; ?>js/ekko-lightbox.js"></script> 
<script src="<?php echo web_root; ?>js/bootstrap-datetimepicker.js"></script> 
<script src="<?php echo web_root; ?>js/locales/bootstrap-datetimepicker.uk.js"></script> 

<!-- keep your site-specific scripts local (janobe.js etc.) -->
<script src="<?php echo web_root; ?>js/janobe.js"></script>
<script src="<?php echo web_root; ?>js/mobile-enhancements.js"></script>
<script src="<?php echo web_root; ?>js/ui-enhancements.js"></script>

<script>
  // Enhanced Hamburger menu functionality
  document.addEventListener('DOMContentLoaded', function() {
    const hamburgerMenu = document.getElementById('hamburgerMenu');
    const mainNav = document.querySelector('.main-nav');
    const mobileBackdrop = document.getElementById('mobileMenuBackdrop');
    
    if (hamburgerMenu && mainNav) {
      hamburgerMenu.addEventListener('click', function(e) {
        e.stopPropagation();
        const isExpanded = hamburgerMenu.getAttribute('aria-expanded') === 'true';
        hamburgerMenu.setAttribute('aria-expanded', !isExpanded);
        mainNav.classList.toggle('active');
        if (mobileBackdrop) {
          mobileBackdrop.classList.toggle('active');
        }
        
        // Prevent body scroll when menu is open
        if (!isExpanded) {
          document.body.style.overflow = 'hidden';
        } else {
          document.body.style.overflow = '';
        }
      });
      
      // Close menu when clicking on a link
      const navLinks = document.querySelectorAll('.nav-links a, .user-actions a');
      navLinks.forEach(link => {
        link.addEventListener('click', function() {
          hamburgerMenu.setAttribute('aria-expanded', 'false');
          mainNav.classList.remove('active');
          if (mobileBackdrop) {
            mobileBackdrop.classList.remove('active');
          }
          document.body.style.overflow = '';
        });
      });
      
      // Close menu when clicking on backdrop
      if (mobileBackdrop) {
        mobileBackdrop.addEventListener('click', function() {
          hamburgerMenu.setAttribute('aria-expanded', 'false');
          mainNav.classList.remove('active');
          mobileBackdrop.classList.remove('active');
          document.body.style.overflow = '';
        });
      }
      
      // Close menu when clicking outside on mobile
      document.addEventListener('click', function(event) {
        if (window.innerWidth <= 991 && !mainNav.contains(event.target) && mainNav.classList.contains('active')) {
          hamburgerMenu.setAttribute('aria-expanded', 'false');
          mainNav.classList.remove('active');
          if (mobileBackdrop) {
            mobileBackdrop.classList.remove('active');
          }
          document.body.style.overflow = '';
        }
      });
      
      // Close menu on window resize if it becomes desktop
      window.addEventListener('resize', function() {
        if (window.innerWidth > 991 && mainNav.classList.contains('active')) {
          hamburgerMenu.setAttribute('aria-expanded', 'false');
          mainNav.classList.remove('active');
          if (mobileBackdrop) {
            mobileBackdrop.classList.remove('active');
          }
          document.body.style.overflow = '';
        }
      });
    }
  });

  // preserve behaviour for input masks & datepickers & tooltips etc.
  $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
  $("[data-mask]").inputmask();

  $('.tooltip-demo').tooltip({
      selector: "[data-toggle=tooltip]",
      container: "body"
  });

  $("[data-toggle=popover]").popover();

  $('.carousel').carousel({ interval: 5000 });

  $('#date_picker').datetimepicker({
    format: 'mm/dd/yyyy',
    language:  'en',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
  });

  // keep your original check/paying logic
  function validatedate(){
    var todaysDate = new Date();
    var txtime = document.getElementById('ftime') ? document.getElementById('ftime').value : '';
    var tprice = document.getElementById('alltot') ? document.getElementById('alltot').value : 0;
    var pmethod = document.getElementById('paymethod') ? document.getElementById('paymethod').value : '';
    var onum = document.getElementById('ORDERNUMBER') ? document.getElementById('ORDERNUMBER').value : '';
    if (txtime==""){
      alert("You must set the time enable to submit the order.");
      return;
    }
    var mytime = parseInt(txtime);
    var todaytime = todaysDate.getHours();
    if (mytime < todaytime){
      alert("Selected time is invalid. Set another time.");
    } else {
      window.location = "index.php?page=7&price="+tprice+"&time="+txtime+"&paymethod="+pmethod+"&ordernumber="+onum;
    }
  }

  // helper functions reused earlier
  function checkall(selector) {
    var chk = document.getElementById('chkall');
    if (!chk) return;
    var chkelement=document.getElementsByName(selector);
    for(var i=0;i<chkelement.length;i++){
      chkelement.item(i).checked = chk.checked;
    }
  }

  function checkNumber(textBox){
    while (textBox.value.length > 0 && isNaN(textBox.value)) {
      textBox.value = textBox.value.substring(0, textBox.value.length - 1)
    }
    textBox.value = trim(textBox.value);
  }

  function checkText(textBox) {
    var alphaExp = /^[a-zA-Z]+$/;
    while (textBox.value.length > 0 && !textBox.value.match(alphaExp)) {
      textBox.value = textBox.value.substring(0, textBox.value.length - 1)
    }
    textBox.value = trim(textBox.value);
  }

  // AJAX loader used by department list (your original #load handler)
  $(document).on("click", "#load", function () {
     var depid = $(this).data("id");
     if (!depid) return;
     $.ajax({
        type:"POST",
        url: "menu1.php",
        dataType: "html",
        data:{id:depid},
        success: function(data){
         $('#loaddata'+ depid).html(data);
        },
        error: function(xhr, status, err){
          console.error('menu1 load error', status, err);
        }
     });
  });
</script>
</body>
</html>