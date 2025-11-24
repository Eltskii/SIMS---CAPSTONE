<?php
require_once("../include/initialize.php");

// Must be logged in
if (!isset($_SESSION['ACCOUNT_ID'])) {
    redirect(web_root . "admin/login.php");
    exit;
}

// Must be Instructor
if (!isset($_SESSION['ACCOUNT_TYPE']) || $_SESSION['ACCOUNT_TYPE'] !== 'Instructor') {
    message("You do not have permission to access the Instructor dashboard.", "error");
    redirect(web_root . "admin/login.php");
    exit;
}

include "dashboard.php";