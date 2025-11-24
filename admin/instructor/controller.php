<?php
require_once ("../../include/initialize.php");
	 if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."admin/index.php");
     }

	      	 // Ensure the user has appropriate role to access this page
if ($_SESSION['ACCOUNT_TYPE'] !== 'Registrar' && 
    $_SESSION['ACCOUNT_TYPE'] !== 'Chairperson') {
    
    // Redirect or show an error message if the user does not have permission
    message("You do not have permission to access this page.", "error");
    redirect("index.php");  // Redirect to a safe page
}

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
 
	
	case 'delete' :
	doDelete();
	break;
  
 
	}
   
	function doInsert(){
		if(isset($_POST['save'])){


		if ($_POST['INST_NAME'] == "" OR $_POST['INST_MAJOR'] == "" OR $_POST['INST_CONTACT'] == "" ) {
			message("All field is required!","error");
			redirect('index.php?view=add');
		}else{	
			$inst = New Instructor(); 
			$inst->INST_NAME 	= $_POST['INST_NAME'];
			$inst->INST_MAJOR	= $_POST['INST_MAJOR']; 
			$inst->INST_CONTACT	= $_POST['INST_CONTACT'];
			// Handle DEPT_ID for both Administrators and Chairpersons
			if (isset($_POST['DEPT_ID']) && $_POST['DEPT_ID'] != '') {
				$inst->DEPT_ID = intval($_POST['DEPT_ID']);
			}
			$inst->create();
 
			message("New  instructor created successfully!", "success");
			redirect("index.php");
			
		}
		}

	}

	function doEdit(){
	if(isset($_POST['save'])){

		if ($_POST['INST_NAME'] == "" OR $_POST['INST_MAJOR'] == "" OR $_POST['INST_CONTACT'] == "" ) {
			message("All field is required!","error");
			redirect('index.php?view=edit&id='.$_POST['INST_ID']);
		}else{

 
			$inst = New Instructor();
			$inst->INST_NAME 	= $_POST['INST_NAME'];
			$inst->INST_MAJOR	= $_POST['INST_MAJOR']; 
			$inst->INST_CONTACT	= $_POST['INST_CONTACT'];
			// Handle DEPT_ID for both Administrators and Chairpersons
			if (isset($_POST['DEPT_ID']) && $_POST['DEPT_ID'] != '') {
				$inst->DEPT_ID = intval($_POST['DEPT_ID']);
			}
			$inst->update($_POST['INST_ID']);


	 
			message("Instructor has been updated!", "success");
			redirect("index.php");
	 
 		 }

		}
	}


	function doDelete(){
	 	$id = 	$_GET['id'];

				$inst = New Instructor();
	 		 	$inst->delete($id);
			 
			message("Instructor already Deleted!","info");
			redirect('index.php');
		 
		
	}
  
 
?>