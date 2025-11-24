<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

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
    global $mydb;

    if(!isset($_POST['save'])) return;

    // choose course name: existing or new (FORCE UPPERCASE ONLY FOR COURSE NAME)
    $selected = isset($_POST['COURSE_NAME']) ? trim($_POST['COURSE_NAME']) : '';
    $newCourse = isset($_POST['COURSE_NAME_NEW']) ? trim($_POST['COURSE_NAME_NEW']) : '';

    // determine final course name - FORCE UPPERCASE
    if ($selected === '__new__') {
        $courseNameRaw = $newCourse;
    } else {
        $courseNameRaw = $selected;
    }
    $courseNameRaw = preg_replace('/\s+/', ' ', trim($courseNameRaw));
    $courseNameRaw = mb_strtoupper($courseNameRaw, "UTF-8"); // Force uppercase for COURSE NAME ONLY

    // other fields - NO CASE CHANGES
    $courseLevel = isset($_POST['COURSE_LEVEL']) ? trim($_POST['COURSE_LEVEL']) : '';
    $courseMajor = isset($_POST['COURSE_MAJOR']) ? trim($_POST['COURSE_MAJOR']) : ''; // optional
    $courseDesc  = isset($_POST['COURSE_DESC']) ? trim($_POST['COURSE_DESC']) : '';
    // REMOVED: No case conversion for description
    $deptId      = isset($_POST['DEPT_ID']) ? trim($_POST['DEPT_ID']) : '';

    // Basic validation
    if ($courseNameRaw === '' || $courseLevel === '' || $courseDesc === '' || $deptId === '') {
        message("Course name, level, description and department are required!", "error");
        redirect('index.php?view=add');
    }

    // Escape for SQL
    $courseNameEsc = $mydb->escape_value($courseNameRaw);
    $courseLevelEsc = $mydb->escape_value($courseLevel);
    $courseMajorEsc = $mydb->escape_value($courseMajor);
    $courseDescEsc  = $mydb->escape_value($courseDesc);
    $deptIdEsc      = $mydb->escape_value($deptId);

    // Duplicate check (same course name + level + dept)
    $checkSql = "SELECT COUNT(*) AS cnt FROM course 
                 WHERE COURSE_NAME = '{$courseNameEsc}' 
                   AND COURSE_LEVEL = '{$courseLevelEsc}' 
                   AND DEPT_ID = '{$deptIdEsc}'";
    $mydb->setQuery($checkSql);
    $row = $mydb->loadSingleResult();
    if ($row && intval($row->cnt) > 0) {
        message("A course with the same name and year already exists in this department.", "error");
        redirect('index.php?view=add');
    }

    // Build insert (major may be empty string if DB is NOT NULL)
    $courseMajorSql = ($courseMajorEsc === '') ? "''" : "'{$courseMajorEsc}'";

    $sql = "INSERT INTO course (COURSE_NAME, COURSE_LEVEL, COURSE_MAJOR, COURSE_DESC, DEPT_ID, SETSEMESTER)
            VALUES ('{$courseNameEsc}', '{$courseLevelEsc}', {$courseMajorSql}, '{$courseDescEsc}', '{$deptIdEsc}', 'None')";

    $mydb->setQuery($sql);
    $mydb->executeQuery();

    message("New course [{$courseNameEsc}] created successfully!", "success");
    redirect("index.php");
}


function doEdit(){
    if(!isset($_POST['save'])) return;
    global $mydb;

    $courseId    = isset($_POST['COURSE_ID']) ? intval($_POST['COURSE_ID']) : 0;
    $selected    = isset($_POST['COURSE_NAME']) ? trim($_POST['COURSE_NAME']) : '';
    $newCourse   = isset($_POST['COURSE_NAME_NEW']) ? trim($_POST['COURSE_NAME_NEW']) : '';

    // determine final course name (supports selecting __new__)
    if ($selected === '__new__') {
        $courseNameRaw = $newCourse;
    } else {
        $courseNameRaw = $selected;
    }
    $courseNameRaw = preg_replace('/\s+/', ' ', trim($courseNameRaw));
    // $courseNameRaw = mb_convert_case($courseNameRaw, MB_CASE_TITLE, "UTF-8");
    $courseNameRaw = strtoupper($courseNameRaw);


    $courseLevel = isset($_POST['COURSE_LEVEL']) ? trim($_POST['COURSE_LEVEL']) : '';
    $courseMajor = isset($_POST['COURSE_MAJOR']) ? trim($_POST['COURSE_MAJOR']) : '';
    $courseDesc  = isset($_POST['COURSE_DESC']) ? trim($_POST['COURSE_DESC']) : '';
    $courseDesc  = mb_convert_case($courseDesc, MB_CASE_TITLE, "UTF-8");
    $deptId      = isset($_POST['DEPT_ID']) ? trim($_POST['DEPT_ID']) : '';

    if($courseId <= 0 || $courseNameRaw == "" || $courseLevel == "" || $courseDesc == "" || $deptId == ""){
        message("Course name, level, description, department and course id are required!", "error");
        redirect("index.php?view=edit&id=".$courseId);
    }

    // Escape
    $courseName  = $mydb->escape_value($courseNameRaw);
    $courseLevel = $mydb->escape_value($courseLevel);
    $courseMajor = $mydb->escape_value($courseMajor);
    $courseDesc  = $mydb->escape_value($courseDesc);
    $deptId      = $mydb->escape_value($deptId);

    // Duplicate check (ignore current row)
    $checkSql = "SELECT COURSE_ID FROM course 
                 WHERE COURSE_NAME = '{$courseName}' 
                   AND COURSE_LEVEL = '{$courseLevel}' 
                   AND DEPT_ID = '{$deptId}'
                 LIMIT 1";
    $mydb->setQuery($checkSql);
    $existing = $mydb->loadSingleResult();
    if ($existing && intval($existing->COURSE_ID) !== intval($courseId)) {
        message("Another course with the same name, level and department already exists.", "error");
        redirect("index.php?view=edit&id=".$courseId);
    }

    $courseMajorSql = ($courseMajor === '') ? "''" : "'{$courseMajor}'";

    $sql = "UPDATE course SET
              COURSE_NAME = '{$courseName}',
              COURSE_LEVEL = '{$courseLevel}',
              COURSE_MAJOR = {$courseMajorSql},
              COURSE_DESC = '{$courseDesc}',
              DEPT_ID = '{$deptId}'
            WHERE COURSE_ID = {$courseId}";

    $mydb->setQuery($sql);
    $mydb->executeQuery();

    message("Course [{$courseName}] has been updated successfully!", "success");
    redirect("index.php");
}






	function doDelete(){
		
		// if (isset($_POST['selector'])==''){
		// message("Select the records first before you delete!","info");
		// redirect('index.php');
		// }else{

		// $id = $_POST['selector'];
		// $key = count($id);

		// for($i=0;$i<$key;$i++){

		// 	$course = New User();
		// 	$course->delete($id[$i]);

		
				$id = 	$_GET['id'];

				$course = New Course();
	 		 	$course->delete($id);
			 
			message("Course already Deleted!","info");
			redirect('index.php');
		// }
		// }

		
	}

	 
?>

<!-- script -->
 <script>
document.getElementById('COURSE_DESC').addEventListener('blur', function() {
  let val = this.value.toLowerCase().replace(/\b\w/g, c => c.toUpperCase());
  this.value = val;
});
</script>
