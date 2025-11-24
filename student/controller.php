<?php
require_once ("../include/initialize.php");

if (!isset($_SESSION['ACCOUNT_ID']) && !isset($_SESSION['IDNO'])) {
    // if neither admin nor student session, redirect to admin login
    redirect(web_root . "admin/index.php");
    exit;
}

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
    case 'add':
        doInsert();
        break;
    case 'edit':
        doEdit();
        break;
    case 'addgrade':
        doUpdateGrades();
        break;
    case 'delete':
        doDelete();
        break;
    case 'photos':
        doupdateimage();
        break;
    default:
        // unknown action - safe redirect
        redirect('index.php');
        break;
}

/**
 * doInsert() - kept original behavior for adding a subject (if this controller handles subjects as before)
 * If your original insert logic is different, this function may be adjusted by you later.
 */
function doInsert(){
    global $mydb;
    if(isset($_POST['save'])){
        if (empty($_POST['SUBJ_CODE']) || empty($_POST['SUBJ_DESCRIPTION']) || empty($_POST['UNIT'])
            || empty($_POST['PRE_REQUISITE']) || empty($_POST['COURSE_ID']) || $_POST['COURSE_ID'] == "none"
            || empty($_POST['AY']) || empty($_POST['SEMESTER'])) {
            message("All field is required!","error");
            redirect('index.php?view=add');
        } else {
            $subj = New Subject();
            $subj->SUBJ_CODE        = trim($_POST['SUBJ_CODE']);
            $subj->SUBJ_DESCRIPTION = trim($_POST['SUBJ_DESCRIPTION']);
            $subj->UNIT             = trim($_POST['UNIT']);
            $subj->PRE_REQUISITE    = trim($_POST['PRE_REQUISITE']);
            $subj->COURSE_ID        = intval($_POST['COURSE_ID']);
            $subj->AY               = trim($_POST['AY']);
            $subj->SEMESTER         = trim($_POST['SEMESTER']);
            $subj->create();

            message("New [". $_POST['SUBJ_CODE'] ."] created successfully!", "success");
            redirect("index.php");
        }
    }
}

/**
 * doEdit() - update student profile and extended details
 * Preserves original update semantics. Adds validation for birthdate and email.
 */
function doEdit(){
    global $mydb;

    // require POST 'save' for student update OR allow admin form to post (both use save)
    if(!isset($_POST['save'])){
        redirect("index.php");
        return;
    }

    // sanitize ID early (student id may be in POST)
    $idno = isset($_POST['IDNO']) ? intval($_POST['IDNO']) : 0;
    if ($idno <= 0) {
        message("Invalid student ID.", "error");
        redirect("index.php");
        return;
    }

    // parse and validate birthdate safely (if passed)
    $birthRaw = trim($_POST['BIRTHDATE'] ?? '');
    $birthYmd = null;
    if ($birthRaw !== '') {
        $d = DateTime::createFromFormat('m/d/Y', $birthRaw);
        $errors = DateTime::getLastErrors();
        if ($d === false || $errors['warning_count'] > 0 || $errors['error_count'] > 0) {
            message("Invalid birthdate format. Use mm/dd/yyyy.", "error");
            redirect("index.php?view=view&id=".$idno);
            return;
        }
        $birthYmd = $d->format('Y-m-d');
        $age = date_diff($d, date_create('today'))->y;
        if ($age < 15) {
            message("Invalid age. 15 years old and above is allowed.", "error");
            redirect("index.php?view=view&id=".$idno);
            return;
        }
    }

    // prepare student model and assign fields only when provided
    try {
        $stud = New Student();

        if (isset($_POST['FNAME']))    $stud->FNAME = trim($_POST['FNAME']);
        if (isset($_POST['LNAME']))    $stud->LNAME = trim($_POST['LNAME']);
        if (isset($_POST['MI']))       $stud->MNAME = trim($_POST['MI']);
        if (isset($_POST['optionsRadios'])) $stud->SEX = trim($_POST['optionsRadios']);
        if ($birthYmd !== null)        $stud->BDAY = $birthYmd;
        if (isset($_POST['BIRTHPLACE'])) $stud->BPLACE = trim($_POST['BIRTHPLACE']);
        if (isset($_POST['NATIONALITY'])) $stud->NATIONALITY = trim($_POST['NATIONALITY']);

        if (isset($_POST['CONTACT'])) $stud->CONTACT_NO = trim($_POST['CONTACT']);
        if (isset($_POST['PADDRESS'])) $stud->HOME_ADD = trim($_POST['PADDRESS']);

        // EMAIL: validate format if provided
        if (!empty($_POST['EMAIL'])) {
            $email = trim($_POST['EMAIL']);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                message("Invalid email format.", "error");
                redirect("index.php?view=view&id=".$idno);
                return;
            }
            $stud->EMAIL = $email;
        }

        // COURSE_MAJOR may be course id
        if (!empty($_POST['COURSE_MAJOR'])) {
            $newCourseId = intval($_POST['COURSE_MAJOR']);
            if ($newCourseId > 0) {
                $courseModel = New Course();
                $courseRow = $courseModel->single_course($newCourseId);
                if ($courseRow) {
                    $stud->COURSE_ID = intval($courseRow->COURSE_ID);
                    if (isset($courseRow->COURSE_LEVEL)) {
                        $stud->YEARLEVEL = intval($courseRow->COURSE_LEVEL);
                    }
                }
            }
        }

        // Save changes to student record using the model's update function
        $stud->update($idno);

    } catch (Exception $e) {
        error_log("doEdit: Student update failed for ID {$idno}: " . $e->getMessage());
        message("Failed to update student record. Contact admin.", "error");
        redirect("index.php?view=view&id=".$idno);
        return;
    }

    // Now handle StudentDetails extended info (create or update)
    try {
        $studetails = New StudentDetails();

        // Check for existing details row safely
        $existing = false;
        if (method_exists($studetails, 'single_StudentDetails')) {
            $existing = $studetails->single_StudentDetails($idno);
        }

        // Assign values only if present in POST
        // if (isset($_POST['GUARDIAN']))        $studetails->GUARDIAN = trim($_POST['GUARDIAN']);
        // if (isset($_POST['GCONTACT']))        $studetails->GCONTACT = trim($_POST['GCONTACT']);
        if (isset($_POST['ADDR_WHILE_STUDY'])) $studetails->ADDR_WHILE_STUDY = trim($_POST['ADDR_WHILE_STUDY']);
        if (isset($_POST['LAST_SCHOOL']))     $studetails->LAST_SCHOOL = trim($_POST['LAST_SCHOOL']);
        if (isset($_POST['LAST_SCHOOL_ADDR']))$studetails->LAST_SCHOOL_ADDR = trim($_POST['LAST_SCHOOL_ADDR']);
        if (isset($_POST['ETHNICITY']))       $studetails->ETHNICITY = trim($_POST['ETHNICITY']);

        if (isset($_POST['EMER_NAME']))       $studetails->EMER_NAME = trim($_POST['EMER_NAME']);
        if (isset($_POST['EMER_REL']))        $studetails->EMER_REL = trim($_POST['EMER_REL']);
        if (isset($_POST['EMER_ADDR']))       $studetails->EMER_ADDR = trim($_POST['EMER_ADDR']);
        if (isset($_POST['EMER_CONTACT']))    $studetails->EMER_CONTACT = trim($_POST['EMER_CONTACT']);

        if (isset($_POST['FATHER_NAME']))     $studetails->FATHER_NAME = trim($_POST['FATHER_NAME']);
        if (isset($_POST['FATHER_CONTACT']))  $studetails->FATHER_CONTACT = trim($_POST['FATHER_CONTACT']);
        if (isset($_POST['MOTHER_NAME']))     $studetails->MOTHER_NAME = trim($_POST['MOTHER_NAME']);
        if (isset($_POST['MOTHER_CONTACT']))  $studetails->MOTHER_CONTACT = trim($_POST['MOTHER_CONTACT']);

        if (!empty($_POST['EMAIL']))          $studetails->EMAIL = trim($_POST['EMAIL']);

        // Update or create
        if ($existing) {
            $studetails->update($idno);
        } else {
            $studetails->IDNO = $idno;
            $created = $studetails->create();
            if (!$created) {
                error_log("doEdit: Failed to create StudentDetails for ID {$idno}");
                message("Failed to save extended student details.", "error");
                redirect("index.php?view=view&id=".$idno);
                return;
            }
        }

    } catch (Exception $e) {
        error_log("doEdit: StudentDetails update/create failed for ID {$idno}: " . $e->getMessage());
        message("Failed to update student extra details. Contact admin.", "error");
        redirect("index.php?view=view&id=".$idno);
        return;
    }

    // Optional: handle photo upload here if file provided
    if (!empty($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        try {
            $targetDir = "../../admin/student/";
            $fileTmp = $_FILES['photo']['tmp_name'];
            $fileName = basename($_FILES['photo']['name']);
            $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $allowed = ['jpg','jpeg','png','gif'];
            if (in_array($ext, $allowed)) {
                $newName = $idno . '_' . time() . '.' . $ext;
                if (move_uploaded_file($fileTmp, $targetDir . $newName)) {
                    $studentPhotoModel = New Student();
                    // If your Student model exposes a field property, set it
                    $studentPhotoModel->STUDPHOTO = $newName;
                    $studentPhotoModel->update($idno);
                }
            }
        } catch (Exception $e) {
            // don't block the update on photo issues
            error_log("photo upload failed for {$idno}: " . $e->getMessage());
        }
    }

    message("Student has been updated!", "success");
    redirect("index.php?view=view&id=".$idno);
}

/**
 * doupdateimage() - (if used to update profile image via admin modal)
 * Keep original behaviors if present in your system.
 */
	function doupdateimage(){
 
			$errofile = $_FILES['photo']['error'];
			$type = $_FILES['photo']['type'];
			$temp = $_FILES['photo']['tmp_name'];
			$myfile =$_FILES['photo']['name'];
		 	$location="student_image/".$myfile;


		if ( $errofile > 0) {
				message("No Image Selected!", "error");
				redirect(web_root. "index.php?q=profile");
		}else{
	 
				@$file=$_FILES['photo']['tmp_name'];
				@$image= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
				@$image_name= addslashes($_FILES['photo']['name']); 
				@$image_size= getimagesize($_FILES['photo']['tmp_name']);

			if ($image_size==FALSE ) {
				message(web_root. "Uploaded file is not an image!", "error");
				redirect(web_root. "index.php?q=profile");
			}else{
					//uploading the file
					move_uploaded_file($temp,"student_image/" . $myfile);
		 	
					 
						$stud = New Student(); 
						$stud->STUDPHOTO 		= $location; 
						$stud->update($_SESSION['IDNO']); 

						redirect(web_root. "index.php?q=profile");
						 
							
					}
			}
			 
		}
/**
 * doDelete() - kept original delete behavior for subjects (if used)
 */
function doDelete(){
    global $mydb;
    $id = $_GET['id'] ?? '';
    if ($id === '') {
        message("No ID specified.", "info");
        redirect('index.php');
    }
    $subj = New Subject();
    $subj->delete($id);

    message("User already Deleted!","info");
    redirect('index.php');
}

/**
 * doUpdateGrades() - kept original logic but added defensive mysqli checks
 */
function doUpdateGrades(){
    global $mydb;

    if(isset($_POST['save'])){
        $remark = '';
        $average = isset($_POST['AVERAGE']) ? floatval($_POST['AVERAGE']) : 0;

        if($average >= 75){
            $remark = 'Passed';
        } else {
            $remark = 'Failed';
        }

        $grade = New Grade();
        $grade->FIRST   = $_POST['FIRSTQUARTER'] ?? 0;
        $grade->SECOND  = $_POST['SECONDQUARTER'] ?? 0;
        $grade->THIRD   = $_POST['THIRDQUARTER'] ?? 0;
        $grade->FOURTH  = $_POST['FOURTHQUARTER'] ?? 0;
        $grade->AVE     = $average;
        $grade->REMARKS = $remark;
        $grade->update($_POST['GRADEID']);

        $studentsubject = New StudentSubjects();
        $studentsubject->AVERAGE = $average;
        $studentsubject->OUTCOME = $remark;
        $studentsubject->updateSubject($_POST['SUBJ_ID'], $_POST['IDNO']);

        // remaining logic unchanged but with safe mysqli checks
        $subject = New Subject();
        $res = $subject->single_subject($_POST['SUBJ_ID']);

        // sum units for the subject's course and semester
        $sql = "SELECT sum(`UNIT`) as 'Unit' FROM `subject` WHERE COURSE_ID=" . intval($res->COURSE_ID) . " AND SEMESTER='" . $mydb->escape_value($res->SEMESTER) . "'";
        $cur = mysqli_query($mydb->conn, $sql);
        if ($cur && mysqli_num_rows($cur) > 0) {
            $unitresult = mysqli_fetch_assoc($cur);
        } else {
            $unitresult = ['Unit' => 0];
        }

        $sql = "SELECT sum(`UNIT`) as 'Unit' FROM `studentsubjects` st, `subject` s
                WHERE st.`SUBJ_ID`=s.`SUBJ_ID` AND s.COURSE_ID=" . intval($res->COURSE_ID) . " AND s.SEMESTER='" . $mydb->escape_value($res->SEMESTER) . "' AND st.AVERAGE > 74 AND st.IDNO=" . intval($_POST['IDNO']);
        $cur = mysqli_query($mydb->conn, $sql);
        if ($cur && mysqli_num_rows($cur) > 0) {
            $stufunitresult = mysqli_fetch_assoc($cur);
        } else {
            $stufunitresult = ['Unit' => 0];
        }

        $unitTotal = floatval($unitresult['Unit']);
        $stufUnitTotal = floatval($stufunitresult['Unit']);

        if ($unitTotal <> $stufUnitTotal) {
            $student = New Student();
            $student->student_status = 'Irregular';
            $student->update($_POST['IDNO']);
        } else {
            $student = New Student();
            $student->student_status = 'Regular';
            $student->update($_POST['IDNO']);
        }

        // year level promotion logic (kept but with safe checks)
        if ($res->SEMESTER != 'First') {
            $sql = "SELECT (sum(unit)/2) as 'Unit' FROM `subject` WHERE COURSE_ID=" . intval($res->COURSE_ID);
            $cur = mysqli_query($mydb->conn, $sql);
            if ($cur && mysqli_num_rows($cur) > 0) {
                $unitresult = mysqli_fetch_assoc($cur);
            } else {
                $unitresult = ['Unit' => 0];
            }

            $sql = "SELECT sum(`UNIT`) as 'Unit' FROM `studentsubjects` st, `subject` s
                WHERE st.`SUBJ_ID`=s.`SUBJ_ID` AND s.COURSE_ID=" . intval($res->COURSE_ID) . " AND st.AVERAGE > 74 AND st.IDNO=" . intval($_POST['IDNO']);
            $cur = mysqli_query($mydb->conn, $sql);
            if ($cur && mysqli_num_rows($cur) > 0) {
                $stufunitresult = mysqli_fetch_assoc($cur);
            } else {
                $stufunitresult = ['Unit' => 0];
            }

            if (floatval($unitresult['Unit']) < floatval($stufunitresult['Unit'])) {
                $course = New Course();
                $courseresult = $course->single_course($res->COURSE_ID);
                if ($courseresult) {
                    switch ($courseresult->COURSE_LEVEL) {
                        case 1:
                            $nextLevel = 2; break;
                        case 2:
                            $nextLevel = 3; break;
                        case 3:
                            $nextLevel = 4; break;
                        default:
                            $nextLevel = 1; break;
                    }
                    // find the next course row safely
                    $sql = "SELECT * FROM `course` WHERE COURSE_NAME='" . $mydb->escape_value($courseresult->COURSE_NAME) . "' AND COURSE_LEVEL=" . intval($nextLevel) . " LIMIT 1";
                    $cur = mysqli_query($mydb->conn, $sql);
                    if ($cur && mysqli_num_rows($cur) > 0) {
                        $studcourse = mysqli_fetch_assoc($cur);
                        if ($studcourse && isset($studcourse['COURSE_ID'])) {
                            $student = New Student();
                            $student->COURSE_ID = intval($studcourse['COURSE_ID']);
                            $student->YEARLEVEL = intval($studcourse['COURSE_LEVEL']);
                            $student->update($_POST['IDNO']);
                        }
                    }
                }
            }
        }

        message("[". $_POST['SUBJ_CODE'] ."] has been updated!", "success");
        redirect("index.php?view=grades&id=" . intval($_POST['IDNO']));
    }
}
?>
