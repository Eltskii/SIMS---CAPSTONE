<?php
require_once ("../../include/initialize.php");
     if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."admin/index.php");
     }


// Ensure the user has appropriate role to access this page
if ($_SESSION['ACCOUNT_TYPE'] !== 'Registrar' && 
    $_SESSION['ACCOUNT_TYPE'] !== 'Registrar') {
    
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

    case 'addgrade' :
    doUpdateGrades();
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
    if(isset($_POST['save'])){

    if ($_POST['SUBJ_CODE'] == "" OR $_POST['SUBJ_DESCRIPTION'] == "" OR $_POST['UNIT'] == ""
        OR $_POST['PRE_REQUISITE'] == "" OR $_POST['COURSE_ID'] == "none"  OR $_POST['AY'] == ""  
        OR $_POST['SEMESTER'] == "" ) {
        $messageStats = false;
        message("All field is required!","error");
        redirect('index.php?view=add');
    }else{    
        $subj = New Subject();
        $subj->SUBJ_CODE        = $_POST['SUBJ_CODE'];
        $subj->SUBJ_DESCRIPTION = $_POST['SUBJ_DESCRIPTION']; 
        $subj->UNIT             = $_POST['UNIT'];
        $subj->PRE_REQUISITE    = $_POST['PRE_REQUISITE'];
        $subj->COURSE_ID        = $_POST['COURSE_ID']; 
        $subj->AY               = $_POST['AY']; 
        $subj->SEMESTER         = $_POST['SEMESTER'];
        $subj->create();

        message("New [". $_POST['SUBJ_CODE'] ."] created successfully!", "success");
        redirect("index.php");
    }
    }

}

function doEdit(){
    global $mydb;

    if(!isset($_POST['save'])){
        redirect("index.php");
        return;
    }

    // sanitize ID early
    $idno = isset($_POST['IDNO']) ? intval($_POST['IDNO']) : 0;
    if ($idno <= 0) {
        message("Invalid student ID.", "error");
        redirect("index.php");
    }

    // parse and validate birthdate safely
    $birthRaw = trim($_POST['BIRTHDATE'] ?? '');
    $birthYmd = null;
    if ($birthRaw !== '') {
        $d = DateTime::createFromFormat('m/d/Y', $birthRaw);
        $errors = DateTime::getLastErrors();
        if (!is_array($errors)) {
            $errors = ['warning_count' => 0, 'error_count' => 0];
        }
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

    // prepare student model
    try {
        $stud = New Student();

        // assign core fields, only where present in POST (avoids overwriting columns with empty strings)
        if (isset($_POST['FNAME']))    $stud->FNAME = trim($_POST['FNAME']);
        if (isset($_POST['LNAME']))    $stud->LNAME = trim($_POST['LNAME']);
        if (isset($_POST['MI']))       $stud->MNAME = trim($_POST['MI']);
        if (isset($_POST['optionsRadios'])) $stud->SEX = trim($_POST['optionsRadios']);
        if ($birthYmd !== null)        $stud->BDAY = $birthYmd;
        if (isset($_POST['BIRTHPLACE'])) $stud->BPLACE = trim($_POST['BIRTHPLACE']);
        if (isset($_POST['NATIONALITY'])) $stud->NATIONALITY = trim($_POST['NATIONALITY']);
        // RELIGION and CIVILSTATUS are optional now; only set if present in the POST
        // if (isset($_POST['RELIGION'])) $stud->RELIGION = trim($_POST['RELIGION']);
        // if (isset($_POST['CIVILSTATUS'])) $stud->STATUS = trim($_POST['CIVILSTATUS']); // keep column but optional

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

        // COURSE_MAJOR may be a course_id (select from admin view). If provided, update student's course
        if (!empty($_POST['COURSE_MAJOR'])) {
            $newCourseId = intval($_POST['COURSE_MAJOR']);
            if ($newCourseId > 0) {
                // attempt to load course
                $courseModel = New Course();
                $courseRow = $courseModel->single_course($newCourseId);
                if ($courseRow) {
                    $stud->COURSE_ID = intval($courseRow->COURSE_ID);
                    // set YEARLEVEL from the course row if available
                    if (isset($courseRow->COURSE_LEVEL)) {
                        $stud->YEARLEVEL = intval($courseRow->COURSE_LEVEL);
                    }
                } else {
                    // course lookup failed: log and continue without changing course
                    error_log("doEdit: course lookup failed for id {$newCourseId}");
                }
            }
        }

        // commit student update (returns result or boolean depending on impl)
        $stud->update($idno);

    } catch (Exception $e) {
        error_log("doEdit: Student update failed for ID {$idno}: " . $e->getMessage());
        message("Failed to update student record. Contact admin.", "error");
        redirect("index.php?view=view&id=".$idno);
        return;
    }

    // Now handle student details (extended fields)
    try {
        $studetails = New StudentDetails();

        // check existing details row
        $existing = false;
        if (method_exists($studetails, 'single_StudentDetails')) {
            $existing = $studetails->single_StudentDetails($idno);
        }

        // Assign values only if present in POST
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

        // If details exist, update; otherwise create new
        if ($existing) {
            $studetails->update($idno);
        } else {
            // ensure IDNO is set for create
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

    message("Student has been updated!", "success");
    redirect("index.php?view=view&id=".$idno);
}

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

function doUpdateGrades(){
    global $mydb;

    if(isset($_POST['save'])){
        $remark = '';
        if($_POST['AVERAGE']>=75){
            $remark = 'Passed';
        }else{
            $remark = 'Failed';
        }

        $grade = New Grade();
        $grade->FIRST   = $_POST['FIRSTQUARTER'];
        $grade->SECOND  = $_POST['SECONDQUARTER'];
        $grade->THIRD   = $_POST['THIRDQUARTER'];
        $grade->FOURTH  = $_POST['FOURTHQUARTER'];
        $grade->AVE     = $_POST['AVERAGE'];
        $grade->REMARKS = $remark;
        $grade->update($_POST['GRADEID']);

        $studentsubject = New StudentSubjects();
        $studentsubject->AVERAGE = $_POST['AVERAGE'];
        $studentsubject->OUTCOME = $remark;
        $studentsubject->updateSubject($_POST['SUBJ_ID'],$_POST['IDNO']);

        // remaining logic unchanged (checking status & year level)
        $subject = New Subject();
        $res = $subject->single_subject($_POST['SUBJ_ID']);

        if (!$res) {
            error_log("doUpdateGrades: single_subject returned falsy for SUBJ_ID=".$_POST['SUBJ_ID']);
            message("Subject lookup failed.", "error");
            redirect("index.php?view=grades&id=".$_POST['IDNO']);
            return;
        }

        $sql = "SELECT sum(`UNIT`) as 'Unit' FROM `subject`  WHERE COURSE_ID=".$res->COURSE_ID." AND SEMESTER='". $mydb->escape_string($res->SEMESTER) ."'";
        $cur = mysqli_query($mydb->conn,$sql);
        if ($cur !== false) {
            $unitresult = mysqli_fetch_assoc($cur);
            if (!is_array($unitresult)) $unitresult = ['Unit' => 0];
        } else {
            $unitresult = ['Unit' => 0];
        }

        $sql = "SELECT sum(`UNIT`) as 'Unit' FROM `studentsubjects`  st,`subject` s 
            WHERE st.`SUBJ_ID`=s.`SUBJ_ID` AND COURSE_ID=".$res->COURSE_ID." AND s.SEMESTER='". $mydb->escape_string($res->SEMESTER) ."' AND AVERAGE > 74 AND IDNO=".$_POST['IDNO'];
        $cur2 = mysqli_query($mydb->conn,$sql);
        if ($cur2 !== false) {
            $stufunitresult = mysqli_fetch_assoc($cur2);
            if (!is_array($stufunitresult)) $stufunitresult = ['Unit' => 0];
        } else {
            $stufunitresult = ['Unit' => 0];
        }

        // normalize Unit values to numeric
        $unitResultValue = isset($unitresult['Unit']) ? (float)$unitresult['Unit'] : 0.0;
        $stufUnitValue = isset($stufunitresult['Unit']) ? (float)$stufunitresult['Unit'] : 0.0;

        if ($unitResultValue <> $stufUnitValue) {
            $student = New Student();
            $student->student_status ='Irregular';
            $student->update($_POST['IDNO']);
        } else {
            $student = New Student();
            $student->student_status ='Regular';
            $student->update($_POST['IDNO']);
        }

        // validating year level (unchanged)
        if (isset($res->SEMESTER) && $res->SEMESTER <> 'First') {
            $sql = "SELECT (sum(unit)/2) as 'Unit' FROM `subject`  WHERE COURSE_ID=".$res->COURSE_ID;
            $cur3 = mysqli_query($mydb->conn,$sql);
            if ($cur3 !== false) {
                $unitresult = mysqli_fetch_assoc($cur3);
                if (!is_array($unitresult)) $unitresult = ['Unit' => 0];
            } else {
                $unitresult = ['Unit' => 0];
            }

            $sql = "SELECT sum(`UNIT`) as 'Unit' FROM `studentsubjects`  st,`subject` s 
                WHERE st.`SUBJ_ID`=s.`SUBJ_ID` AND COURSE_ID=".$res->COURSE_ID."  AND AVERAGE > 74 AND IDNO=".$_POST['IDNO'];
            $cur4 = mysqli_query($mydb->conn,$sql);
            if ($cur4 !== false) {
                $stufunitresult = mysqli_fetch_assoc($cur4);
                if (!is_array($stufunitresult)) $stufunitresult = ['Unit' => 0];
            } else {
                $stufunitresult = ['Unit' => 0];
            }

            $unitResultValue = isset($unitresult['Unit']) ? (float)$unitresult['Unit'] : 0.0;
            $stufUnitValue = isset($stufunitresult['Unit']) ? (float)$stufunitresult['Unit'] : 0.0;

            if ($unitResultValue < $stufUnitValue) {
                $course = New Course();
                $courseresult = $course->single_course($res->COURSE_ID);
                if ($courseresult) {
                    switch ($courseresult->COURSE_LEVEL) {
                        case 1:
                            $sql = "SELECT * FROM `course`  WHERE COURSE_NAME='". $mydb->escape_string($courseresult->COURSE_NAME) ."' AND COURSE_LEVEL=2";
                            $cur5 = mysqli_query($mydb->conn,$sql);
                            $studcourse = ($cur5 !== false) ? mysqli_fetch_assoc($cur5) : false;

                            if ($studcourse && isset($studcourse['COURSE_ID'])) {
                                $student = New Student();
                                $student->COURSE_ID = $studcourse['COURSE_ID'];
                                $student->YEARLEVEL = $studcourse['COURSE_LEVEL'];
                                $student->update($_POST['IDNO']);
                            }
                            break;
                        case 2:
                            $sql = "SELECT * FROM `course`  WHERE COURSE_NAME='". $mydb->escape_string($courseresult->COURSE_NAME) ."' AND COURSE_LEVEL=3";
                            $cur6 = mysqli_query($mydb->conn,$sql);
                            $studcourse = ($cur6 !== false) ? mysqli_fetch_assoc($cur6) : false;

                            if ($studcourse && isset($studcourse['COURSE_ID'])) {
                                $student = New Student();
                                $student->COURSE_ID = $studcourse['COURSE_ID'];
                                $student->YEARLEVEL = $studcourse['COURSE_LEVEL'];
                                $student->update($_POST['IDNO']);
                            }
                            break;
                        case 3:
                            $sql = "SELECT * FROM `course`  WHERE COURSE_NAME='". $mydb->escape_string($courseresult->COURSE_NAME) ."' AND COURSE_LEVEL=4";
                            $cur7 = mysqli_query($mydb->conn,$sql);
                            $studcourse = ($cur7 !== false) ? mysqli_fetch_assoc($cur7) : false;

                            if ($studcourse && isset($studcourse['COURSE_ID'])) {
                                $student = New Student();
                                $student->COURSE_ID = $studcourse['COURSE_ID'];
                                $student->YEARLEVEL = $studcourse['COURSE_LEVEL'];
                                $student->update($_POST['IDNO']);
                            }
                            break;
                        default:
                            // fallback to course level 1
                            $sql = "SELECT * FROM `course`  WHERE COURSE_NAME='". $mydb->escape_string($courseresult->COURSE_NAME) ."' AND COURSE_LEVEL=1";
                            $cur8 = mysqli_query($mydb->conn,$sql);
                            $studcourse = ($cur8 !== false) ? mysqli_fetch_assoc($cur8) : false;

                            if ($studcourse && isset($studcourse['COURSE_ID'])) {
                                $student = New Student();
                                $student->COURSE_ID = $studcourse['COURSE_ID'];
                                $student->YEARLEVEL = $studcourse['COURSE_LEVEL'];
                                $student->update($_POST['IDNO']);
                            }
                            break;
                    }
                } else {
                    error_log("doUpdateGrades: course lookup failed for COURSE_ID=".$res->COURSE_ID);
                }
            }
        }

        // Instead of redirect, output JavaScript to close modal and refresh parent
        $idno = intval($_POST['IDNO']);
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Saving...</title>
        </head>
        <body>
            <script type="text/javascript">
                // Close the lightbox modal and refresh parent page
                if (window.parent && window.parent !== window) {
                    // We're in an iframe/modal
                    try {
                        // Try to close the lightbox modal
                        if (window.parent.$ && window.parent.$('.ekko-lightbox')) {
                            window.parent.$('.ekko-lightbox').modal('hide');
                        }
                        // Refresh the parent page to show updated grades
                        setTimeout(function() {
                            window.parent.location.href = 'index.php?view=grades&id=<?php echo $idno; ?>';
                        }, 300);
                    } catch(e) {
                        // Fallback: just redirect parent
                        window.parent.location.href = 'index.php?view=grades&id=<?php echo $idno; ?>';
                    }
                } else {
                    // Not in modal, normal redirect
                    window.location.href = 'index.php?view=grades&id=<?php echo $idno; ?>';
                }
            </script>
            <div style="text-align:center; padding:40px; font-family:Arial, sans-serif;">
                <p style="color:#28a745; font-size:18px;">
                    <i class="fa fa-check-circle"></i> Grades saved successfully!
                </p>
                <p style="color:#666;">Redirecting...</p>
            </div>
        </body>
        </html>
        <?php
        exit;
    }
}
?>
