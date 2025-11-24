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

	case 'photos' :
	doupdateimage();
	break;

 
	}
   
	function doInsert(){
    if(isset($_POST['save'])){

        // basic trimming
        $subj_code = isset($_POST['SUBJ_CODE']) ? trim($_POST['SUBJ_CODE']) : '';
        $subj_desc = isset($_POST['SUBJ_DESCRIPTION']) ? trim($_POST['SUBJ_DESCRIPTION']) : '';
        $unit = isset($_POST['UNIT']) ? trim($_POST['UNIT']) : '';
        $prereq_raw = isset($_POST['PRE_REQUISITE']) ? trim($_POST['PRE_REQUISITE']) : '';
        $course_id = isset($_POST['COURSE_ID']) ? trim($_POST['COURSE_ID']) : 'none';
        $semester = isset($_POST['SEMESTER']) ? trim($_POST['SEMESTER']) : '';
        $ay = isset($_POST['AY']) ? trim($_POST['AY']) : ''; // Default to empty string

        // Validation: PRE_REQUISITE is NOT required now
        if ($subj_code == "" || $subj_desc == "" || $unit == "" || $course_id == "none" || $semester == "" ) {
            message("Course code, description, unit, course and semester are required!", "error");
            redirect('index.php?view=add');
        } else {
            // Normalize prerequisite value:
            // If you prefer NULL in DB, set $prereq = null and adjust model/DB accordingly.
            $prereq = ($prereq_raw === '' || strtolower($prereq_raw) === 'none') ? '' : $prereq_raw;

            $subj = New Subject();
            $subj->SUBJ_CODE       = $subj_code;
            $subj->SUBJ_DESCRIPTION= $subj_desc; 
            $subj->UNIT            = $unit;
            $subj->PRE_REQUISITE   = $prereq;
            $subj->COURSE_ID       = $course_id;
            $subj->AY              = $ay;
            $subj->SEMESTER        = $semester;
            $subj->PreTaken        = 0; // Default to 0 (not taken)
            $subj->create();

            message("New [". $subj_code ."] created successfully!", "success");
            redirect("index.php");
        }
    }
}

function doEdit(){
    if(isset($_POST['save'])){
        $subj_id = isset($_POST['SUBJ_ID']) ? $_POST['SUBJ_ID'] : 0;
        $subj_code = isset($_POST['SUBJ_CODE']) ? trim($_POST['SUBJ_CODE']) : '';
        $subj_desc = isset($_POST['SUBJ_DESCRIPTION']) ? trim($_POST['SUBJ_DESCRIPTION']) : '';
        $unit = isset($_POST['UNIT']) ? trim($_POST['UNIT']) : '';
        $prereq_raw = isset($_POST['PRE_REQUISITE']) ? trim($_POST['PRE_REQUISITE']) : '';
        $course_id = isset($_POST['COURSE_ID']) ? trim($_POST['COURSE_ID']) : 'none';
        $semester = isset($_POST['SEMESTER']) ? trim($_POST['SEMESTER']) : '';
        $ay = isset($_POST['AY']) ? trim($_POST['AY']) : ''; // Default to empty string

        // Validation: PRE_REQUISITE not required
        if($subj_code == "" || $subj_desc == "" || $unit == "" || $course_id == "none" || $semester == "" || $subj_id == ""){
            message("Subject code, description, unit, course, semester and id are required!", "error");
            redirect("index.php");
        } else {
            $prereq = ($prereq_raw === '' || strtolower($prereq_raw) === 'none') ? '' : $prereq_raw;

            $subj = New Subject(); 
            $subj->SUBJ_CODE        = $subj_code;
            $subj->SUBJ_DESCRIPTION = $subj_desc; 
            $subj->UNIT             = $unit;
            $subj->PRE_REQUISITE    = $prereq;
            $subj->COURSE_ID        = $course_id;
            $subj->AY               = $ay;
            $subj->SEMESTER         = $semester;
            $subj->PreTaken         = 0; // Default to 0 (not taken)
            $subj->update($subj_id);

            message("[". $subj_code ."] has been updated!", "success");
            redirect("index.php");
        }
    }
}


function doDelete() {
    // Check if an ID was passed
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        message("No subject selected for deletion.", "error");
        redirect('index.php');
        exit;
    }

    $id = $_GET['id'];
    
    // Optional: Validate that the subject exists before deleting
    $subj = new Subject();
    $subjectToDelete = $subj->single_subject($id); // Assuming you have a method like this

    if (!$subjectToDelete) {
        message("Subject not found or already deleted.", "error");
        redirect('index.php');
        exit;
    }

    // Proceed with deletion
    $subj->delete($id);

    message("Subject successfully deleted!", "success");
    redirect('index.php');
}

 
 
?>