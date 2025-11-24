<?php
require_once("../../include/initialize.php");
if(!isset($_SESSION['ACCOUNT_ID'])){
    redirect(web_root."admin/index.php");
}

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
$title = "Users"; 
$header = $view; 

switch ($view) {
    case 'list' :
        if ($_SESSION['ACCOUNT_TYPE'] !== 'Registrar') {
            redirect(web_root."admin/index.php");
        }
        $content = 'list.php';        
        break;

    case 'add' :
        $content = 'add.php';        
        break;

    case 'edit' :
        $content = 'edit.php';        
        break;
        
    case 'view' :
        $content = 'view.php';        
        break;

    default :
        // This handles when someone accesses index.php with no view parameter
        // After save actions often redirect here without view parameter
        if ($_SESSION['ACCOUNT_TYPE'] === 'Registrar') {
            $content = 'list.php';  // Show user list to admin
        } else {
            redirect(web_root."admin/index.php");  // Redirect others
        }
}
require_once ("../theme/templates.php");
?>