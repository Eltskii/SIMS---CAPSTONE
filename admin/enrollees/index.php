<?php
require_once("../../include/initialize.php");
if(!isset($_SESSION['ACCOUNT_ID'])){
	redirect(web_root."admin/index.php");
}


// Ensure the user has appropriate role to access this page
if ($_SESSION['ACCOUNT_TYPE'] !== 'Registrar' && 
    $_SESSION['ACCOUNT_TYPE'] !== 'Registrar') {
    
    // Redirect or show an error message if the user does not have permission
    message("You do not have permission to access this page.", "error");
    redirect("index.php");  // Redirect to a safe page
}

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
 $title="New Enrollees"; 
 $header=$view; 
switch ($view) {
	case 'list' :
		$content    = 'list.php';		
		break;

	case 'addsubject' :
		$content    = 'add.php';		
		break;

	case 'addCredit' :
		$content    = 'addcreditsubject.php';		
		break;

	case 'cart' :
		$content    = 'cart.php';		
		break;

	case 'enrolledsubject' :
		$content    = 'enrolledsubject.php';		
		break;
    case 'view' :
		$content    = 'view.php';		
		break;
 case 'success' :
		$content    = 'success.php';		
		break;
	default :
		$content    = 'list.php';		
}
require_once ("../theme/templates.php");
?>
  
