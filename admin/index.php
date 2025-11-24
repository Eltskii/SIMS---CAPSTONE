<?php 
require_once("../include/initialize.php");
	 if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."admin/login.php");
     } 

	 // Ensure the user has appropriate role to access admin panel
if (!in_array($_SESSION['ACCOUNT_TYPE'], ['Registrar', 'Chairperson', 'Instructor'])) {
    message("You do not have permission to access the admin panel.", "error");
    redirect(web_root."index.php");
}

// Initialize SEMESTER and SY session variables if not already set
if (!isset($_SESSION['SEMESTER']) || !isset($_SESSION['SY'])) {
    // Get active semester from database
    $sem = new Semester();
    $resSem = $sem->single_semester();
    $_SESSION['SEMESTER'] = $resSem->SEMESTER;
    
    // Calculate current school year
    $currentyear = date('Y');
    $nextyear = date('Y') + 1;
    $_SESSION['SY'] = $currentyear . '-' . $nextyear;
}


$content='home.php';
$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
switch ($view) {
	case '1' :
        $title="Home";	
		$content='home.php';		
		break;	
	default :
	    $title="Home";	
		$content ='home.php';		
}
require_once("theme/templates.php");
?>