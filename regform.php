<?php
// regform.php - FIXED VERSION WITH SWEETALERT2 NOTIFICATIONS

error_reporting(0);
ini_set('display_errors', 0);

// include initialize (try both possible relative paths)
if (file_exists(__DIR__ . '/include/initialize.php')) {
    require_once __DIR__ . '/include/initialize.php';
} elseif (file_exists(__DIR__ . '/../include/initialize.php')) {
    require_once __DIR__ . '/../include/initialize.php';
}

// start session only if not started already
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// -------------------- helpers --------------------
function parse_mmddyyyy_to_ymd($str) {
    $str = trim((string)$str);
    if ($str === '') return false;
    $d = DateTime::createFromFormat('m/d/Y', $str);
    $errors = DateTime::getLastErrors();
    if ($d === false || $errors['warning_count'] > 0 || $errors['error_count'] > 0) {
        return false;
    }
    return $d->format('Y-m-d');
}

function create_csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(16));
    }
    return $_SESSION['csrf_token'];
}
function verify_csrf_token($token) {
    return !empty($token) && !empty($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

function normalize_phone($phone) {
    if (empty($phone)) return '';
    $phone = trim($phone);
    $keepPlus = (strpos($phone, '+') === 0) ? '+' : '';
    $digits = preg_replace('/\D+/', '', $phone);
    return ($keepPlus ? $keepPlus : '') . $digits;
}

$csrf_token = create_csrf_token();

// -------------------- handle form submit --------------------
if (isset($_POST['regsubmit'])) {

    // verify CSRF token
    if (!isset($_POST['csrf_token']) || !verify_csrf_token($_POST['csrf_token'])) {
        message("Session mismatch. Please refresh the form and try again.", "error");
        redirect(web_root . "index.php?q=enrol");
    }

    // sanitize/store input into REG_ session for repopulation (trim)
    $_SESSION['REG_STUDID']      = isset($_POST['IDNO']) ? trim($_POST['IDNO']) : '';
    $_SESSION['REG_FNAME']       = isset($_POST['FNAME']) ? trim($_POST['FNAME']) : '';
    $_SESSION['REG_LNAME']       = isset($_POST['LNAME']) ? trim($_POST['LNAME']) : '';
    $_SESSION['REG_MI']          = isset($_POST['MI']) ? trim($_POST['MI']) : '';
    $_SESSION['REG_MAIDEN_NAME'] = isset($_POST['MAIDEN_NAME']) ? trim($_POST['MAIDEN_NAME']) : '';
    $_SESSION['REG_PADDRESS']    = isset($_POST['PADDRESS']) ? trim($_POST['PADDRESS']) : '';
    $_SESSION['REG_SEX']         = isset($_POST['optionsRadios']) ? trim($_POST['optionsRadios']) : '';
    $_SESSION['REG_SUFFIX'] = isset($_POST['SUFFIX']) ? trim($_POST['SUFFIX']) : '';

    $bd_raw = isset($_POST['BIRTHDATE']) ? trim($_POST['BIRTHDATE']) : '';
    $_SESSION['REG_BIRTHDATE'] = parse_mmddyyyy_to_ymd($bd_raw) ?: '';

    $_SESSION['REG_BIRTHPLACE']  = isset($_POST['BIRTHPLACE']) ? trim($_POST['BIRTHPLACE']) : '';
    $_SESSION['REG_NATIONALITY'] = isset($_POST['NATIONALITY']) ? trim($_POST['NATIONALITY']) : '';
    $_SESSION['REG_RELIGION']    = isset($_POST['RELIGION']) ? trim($_POST['RELIGION']) : '';
    $_SESSION['REG_ETHNICITY']   = isset($_POST['ETHNICITY']) ? trim($_POST['ETHNICITY']) : '';
    $_SESSION['REG_EMAIL']       = isset($_POST['EMAIL']) ? trim($_POST['EMAIL']) : '';
    $_SESSION['REG_LAST_SCHOOL'] = isset($_POST['LAST_SCHOOL']) ? trim($_POST['LAST_SCHOOL']) : '';
    $_SESSION['REG_LAST_SCHOOL_ADDR'] = isset($_POST['LAST_SCHOOL_ADDR']) ? trim($_POST['LAST_SCHOOL_ADDR']) : '';
    $_SESSION['REG_ADDR_WHILE_STUDY'] = isset($_POST['ADDR_WHILE_STUDY']) ? trim($_POST['ADDR_WHILE_STUDY']) : '';

    $_SESSION['REG_CONTACT']     = isset($_POST['CONTACT']) ? trim($_POST['CONTACT']) : '';
    $_SESSION['REG_CIVILSTATUS'] = isset($_POST['CIVILSTATUS']) ? trim($_POST['CIVILSTATUS']) : '';

    $_SESSION['REG_GUARDIAN'] = isset($_POST['GUARDIAN']) ? trim($_POST['GUARDIAN']) : '';
    $_SESSION['REG_GCONTACT'] = isset($_POST['GCONTACT']) ? trim($_POST['GCONTACT']) : '';
    $_SESSION['REG_FATHER_NAME'] = isset($_POST['FATHER_NAME']) ? trim($_POST['FATHER_NAME']) : '';
    $_SESSION['REG_FATHER_CONTACT'] = isset($_POST['FATHER_CONTACT']) ? trim($_POST['FATHER_CONTACT']) : '';
    $_SESSION['REG_MOTHER_NAME'] = isset($_POST['MOTHER_NAME']) ? trim($_POST['MOTHER_NAME']) : '';
    $_SESSION['REG_MOTHER_CONTACT'] = isset($_POST['MOTHER_CONTACT']) ? trim($_POST['MOTHER_CONTACT']) : '';
    $_SESSION['REG_EMER_NAME']   = isset($_POST['EMER_NAME']) ? trim($_POST['EMER_NAME']) : '';
    $_SESSION['REG_EMER_REL']    = isset($_POST['EMER_REL']) ? trim($_POST['EMER_REL']) : '';
    $_SESSION['REG_EMER_ADDR']   = isset($_POST['EMER_ADDR']) ? trim($_POST['EMER_ADDR']) : '';
    $_SESSION['REG_EMER_CONTACT']= isset($_POST['EMER_CONTACT']) ? trim($_POST['EMER_CONTACT']) : '';

    // COURSE is numeric ID from select "COURSE"
    $_SESSION['REG_COURSEID']    = isset($_POST['COURSE']) ? trim($_POST['COURSE']) : '';
    $_SESSION['REG_USER_NAME']   = isset($_POST['USER_NAME']) ? trim($_POST['USER_NAME']) : '';
    $_SESSION['REG_PASS']        = isset($_POST['PASS']) ? $_POST['PASS'] : '';

    // ---------- server-side validation (stronger) ----------

    // required core fields
    $required = [
        'First name' => $_SESSION['REG_FNAME'],
        'Last name' => $_SESSION['REG_LNAME'],
        'Permanent address' => $_SESSION['REG_PADDRESS'],
        'Username' => $_SESSION['REG_USER_NAME'],
        'Password' => $_SESSION['REG_PASS'],
        'Course selection' => $_SESSION['REG_COURSEID']
    ];
    foreach ($required as $label => $val) {
        if (empty($val)) {
            message("Please fill required field: {$label}.", "error");
            redirect(web_root . "index.php?q=enrol");
        }
    }

    // NEW: Sex validation - must be selected
    if (empty($_SESSION['REG_SEX']) || !in_array($_SESSION['REG_SEX'], ['Male', 'Female'])) {
        message("Please select your sex.", "error");
        redirect(web_root . "index.php?q=enrol");
    }

    // NEW: Maiden name validation - only allowed for females
    if (!empty($_SESSION['REG_MAIDEN_NAME']) && $_SESSION['REG_SEX'] === 'Male') {
        message("Maiden name is only applicable for females. Please remove the maiden name or select Female as your sex.", "error");
        redirect(web_root . "index.php?q=enrol");
    }

    // name validation (allow letters, spaces, hyphen, apostrophe)
    $namePattern = "/^[\p{L}\s\-'`\.]{1,80}$/u";
    if (!preg_match($namePattern, $_SESSION['REG_FNAME'])) {
        message("First name contains invalid characters.", "error");
        redirect(web_root . "index.php?q=enrol");
    }
    if (!preg_match($namePattern, $_SESSION['REG_LNAME'])) {
        message("Last name contains invalid characters.", "error");
        redirect(web_root . "index.php?q=enrol");
    }
    if (!empty($_SESSION['REG_MI']) && !preg_match("/^[A-Za-z]$/", $_SESSION['REG_MI'])) {
        message("Middle initial must be a single letter.", "error");
        redirect(web_root . "index.php?q=enrol");
    }
    
    if (!empty($_SESSION['REG_SUFFIX']) && !preg_match('/^[A-Za-z0-9\.\, ]{1,20}$/', $_SESSION['REG_SUFFIX'])) {
        message("Suffix contains invalid characters.", "error");
        redirect(web_root . "index.php?q=enrol");
    }

    // NEW: Maiden name character validation (if provided and for females)
    if (!empty($_SESSION['REG_MAIDEN_NAME']) && $_SESSION['REG_SEX'] === 'Female') {
        if (!preg_match($namePattern, $_SESSION['REG_MAIDEN_NAME'])) {
            message("Maiden name contains invalid characters.", "error");
            redirect(web_root . "index.php?q=enrol");
        }
    }

    // birthdate already parsed to Y-m-d, check valid & age >= 15
    if (empty($_SESSION['REG_BIRTHDATE'])) {
        message("Please provide a valid birthdate (mm/dd/yyyy).", "error");
        redirect(web_root . "index.php?q=enrol");
    }
    $age = date_diff(date_create($_SESSION['REG_BIRTHDATE']), date_create('today'))->y;
    if ($age < 15) {
        message("Cannot Proceed. Must be 15 years old and above to enroll.", "error");
        redirect(web_root . "index.php?q=enrol");
    }

    // email validation (optional)
    if (!empty($_SESSION['REG_EMAIL']) && !filter_var($_SESSION['REG_EMAIL'], FILTER_VALIDATE_EMAIL)) {
        message("Please provide a valid email address.", "error");
        redirect(web_root . "index.php?q=enrol");
    }

    // username rules: 4-30 chars, letters/numbers/underscore
    if (!preg_match('/^[A-Za-z0-9_]{4,30}$/', $_SESSION['REG_USER_NAME'])) {
        message("Username must be 4-30 characters and contain only letters, numbers, or underscore.", "error");
        redirect(web_root . "index.php?q=enrol");
    }

    // password strength: at least 8 chars
    if (strlen($_SESSION['REG_PASS']) < 8) {
        message("Password must be at least 8 characters.", "error");
        redirect(web_root . "index.php?q=enrol");
    }

    // normalize and validate contact numbers (optional, sanitize)
    $_SESSION['REG_CONTACT'] = normalize_phone($_SESSION['REG_CONTACT']);
    $_SESSION['REG_FATHER_CONTACT'] = normalize_phone($_SESSION['REG_FATHER_CONTACT']);
    $_SESSION['REG_MOTHER_CONTACT'] = normalize_phone($_SESSION['REG_MOTHER_CONTACT']);
    $_SESSION['REG_EMER_CONTACT'] = normalize_phone($_SESSION['REG_EMER_CONTACT']);
    $_SESSION['REG_GCONTACT'] = normalize_phone($_SESSION['REG_GCONTACT']);

    // COURSE id must be numeric and exist
    if (!is_numeric($_SESSION['REG_COURSEID']) || intval($_SESSION['REG_COURSEID']) <= 0) {
        message("Please select a valid course/major.", "error");
        redirect(web_root . "index.php?q=enrol");
    }
    $courseIdToCheck = intval($_SESSION['REG_COURSEID']);
    
    // FIXED: Array offset warning - proper error handling
    if (isset($mydb)) {
        $mydb->setQuery("SELECT COURSE_ID FROM course WHERE COURSE_ID = " . intval($courseIdToCheck) . " LIMIT 1");
        $courseExists = $mydb->loadSingleResult();
        
        // Check if query returned valid result
        if ($courseExists === false || empty($courseExists) || !is_object($courseExists)) {
            message("Selected course/major does not exist. Please choose another.", "error");
            redirect(web_root . "index.php?q=enrol");
        }
    } else {
        message("Database connection error. Please try again.", "error");
        redirect(web_root . "index.php?q=enrol");
    }

    // duplicate student check by name - with proper error handling
    $student = New Student();
    $resByName = $student->find_all_student($_SESSION['REG_LNAME'], $_SESSION['REG_FNAME'], $_SESSION['REG_MI']);
    
    // FIXED: Check if result is valid before using
    if ($resByName !== false && !empty($resByName)) {
        message("Student already exist.", "error");
        redirect(web_root . "index.php?q=enrol");
    }

    // if a STUDID is provided, ensure it's not already used in tblstudent
    if (!empty($_SESSION['REG_STUDID']) && isset($mydb)) {
        $idval = $mydb->escape_value($_SESSION['REG_STUDID']);
        $mydb->setQuery("SELECT IDNO FROM tblstudent WHERE IDNO = '{$idval}' LIMIT 1");
        $exists = $mydb->loadSingleResult();
        if ($exists && is_object($exists)) {
            message("Student ID already exists. Please refresh the page to obtain a new ID.", "error");
            redirect(web_root . "index.php?q=enrol");
        }
    }

    // username uniqueness check via $mydb (if available)
    if (isset($mydb)) {
        $uname = $mydb->escape_value($_SESSION['REG_USER_NAME']);
        $mydb->setQuery("SELECT * FROM tblstudent WHERE ACC_USERNAME = '{$uname}' LIMIT 1");
        $userStud = $mydb->loadSingleResult();
        if ($userStud && is_object($userStud)) {
            message("Username is already taken.", "error");
            redirect(web_root . "index.php?q=enrol");
        }
    }

    // ---------- create student record ----------
    $student = New Student();
    $student->IDNO           = $_SESSION['REG_STUDID'];
    $student->FNAME          = $_SESSION['REG_FNAME'];
    $student->LNAME          = $_SESSION['REG_LNAME'];
    $student->MNAME          = $_SESSION['REG_MI'];
    $student->SUFFIX         = isset($_SESSION['REG_SUFFIX']) ? $_SESSION['REG_SUFFIX'] : null;
    
    // NEW: Only set maiden name if sex is female
    if ($_SESSION['REG_SEX'] === 'Female') {
        $student->MAIDEN_NAME = $_SESSION['REG_MAIDEN_NAME'];
    } else {
        $student->MAIDEN_NAME = ''; // Clear maiden name for males
    }
    
    $student->SEX            = $_SESSION['REG_SEX'];
    $student->BDAY           = $_SESSION['REG_BIRTHDATE'];
    $student->BPLACE         = $_SESSION['REG_BIRTHPLACE'];
    $student->STATUS         = $_SESSION['REG_CIVILSTATUS'];
    $student->NATIONALITY    = $_SESSION['REG_NATIONALITY'];
    // REMOVED: $student->RELIGION - field doesn't exist in table
    $student->ETHNICITY      = $_SESSION['REG_ETHNICITY'];
    // Calculate age from birthdate
    $birthDate = new DateTime($_SESSION['REG_BIRTHDATE']);
    $today = new DateTime('today');
    $student->AGE            = $birthDate->diff($today)->y;
    $student->CONTACT_NO     = $_SESSION['REG_CONTACT'];
    $student->HOME_ADD       = $_SESSION['REG_PADDRESS'];
    $student->ACC_USERNAME   = $_SESSION['REG_USER_NAME'];
    $student->ACC_PASSWORD   = password_hash($_SESSION['REG_PASS'], PASSWORD_DEFAULT);
    $student->COURSE_ID      = intval($_SESSION['REG_COURSEID']);
    $student->student_status = 'New';
    $student->YEARLEVEL      = 1;
    $student->NewEnrollees   = 1;
    // REMOVED: $student->EMAIL - field doesn't exist in main table
    
    // FIXED: Add all missing required fields from your table structure
    $student->STUDSECTION    = 0;           // Required integer field
    $student->STUDPHOTO      = '';          // Required string field  
    $student->SEMESTER       = 'First';     // Required - set default semester
    $student->SYEAR          = $_SESSION['SY']; // Required - use current school year

    $createOk = $student->create();
    if (!$createOk) {
        error_log("Student->create() failed for username: " . htmlspecialchars($_SESSION['REG_USER_NAME']));
        message("Failed to create student record.", "error");
        redirect(web_root . "index.php?q=enrol");
    }

    // Save student details: update or create as before
    $studID = $_SESSION['REG_STUDID'];
    $studentdetails = New StudentDetails();
    $existingDetails = $studentdetails->single_StudentDetails($studID);

    // populate details fields
    $studentdetails->IDNO = $studID;
    $studentdetails->GUARDIAN = $_SESSION['REG_GUARDIAN'];
    $studentdetails->GCONTACT = $_SESSION['REG_GCONTACT'];
    $studentdetails->LAST_SCHOOL = $_SESSION['REG_LAST_SCHOOL'];
    $studentdetails->LAST_SCHOOL_ADDR = $_SESSION['REG_LAST_SCHOOL_ADDR'];
    $studentdetails->ADDR_WHILE_STUDY = $_SESSION['REG_ADDR_WHILE_STUDY'];
    $studentdetails->FATHER_NAME = $_SESSION['REG_FATHER_NAME'];
    $studentdetails->FATHER_CONTACT = $_SESSION['REG_FATHER_CONTACT'];
    $studentdetails->MOTHER_NAME = $_SESSION['REG_MOTHER_NAME'];
    $studentdetails->MOTHER_CONTACT = $_SESSION['REG_MOTHER_CONTACT'];
    $studentdetails->EMER_NAME = $_SESSION['REG_EMER_NAME'];
    $studentdetails->EMER_REL = $_SESSION['REG_EMER_REL'];
    $studentdetails->EMER_ADDR = $_SESSION['REG_EMER_ADDR'];
    $studentdetails->EMER_CONTACT = $_SESSION['REG_EMER_CONTACT'];
    $studentdetails->EMAIL = $_SESSION['REG_EMAIL'];
    // Add religion to student details if that table has the field
    $studentdetails->RELIGION = $_SESSION['REG_RELIGION'];

    if ($existingDetails) {
        $ok = $studentdetails->update($studID);
        if ($ok === false) {
            error_log("StudentDetails update returned false for ID: {$studID}");
        }
    } else {
        $ok = $studentdetails->create();
        if (!$ok) {
            error_log("StudentDetails->create() failed for IDNO: {$studID}");
            message("Failed to save student extra details. Please contact administrator.", "error");
            redirect(web_root . "index.php?q=enrol");
        }
    }

    // update autonumber for next STUDID if you use it
    $studAuto = New Autonumber();
    if (method_exists($studAuto, 'studauto_update')) {
        $studAuto->studauto_update();
    }

    // DO NOT log in the student automatically
    // They must wait for registrar approval before they can log in
    
    // clear REG_ session keys
    foreach (array_keys($_SESSION) as $key) {
        if (strpos($key, 'REG_') === 0) {
            unset($_SESSION[$key]);
        }
    }

    message("Registration submitted successfully! Your enrollment is pending approval by the registrar. You will be able to log in once your enrollment has been approved.", "success");
    redirect(web_root . "index.php");
}

// prepare UI repopulation & defaults
$currentyear = date('Y');
$nextyear = date('Y') + 1;
$sy = $currentyear . '-' . $nextyear;
$_SESSION['SY'] = $sy;

$studAuto = New Autonumber();
$autonum = $studAuto->stud_autonumber();
?>

<!-- SweetAlert2 CSS & JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<style>
:root {
  --primary: #2c3e50;
  --accent: #27ae60;
  --accent-dark: #219653;
  --accent-light: #2ecc71;
  --light: #f8f9fa;
  --dark: #343a40;
  --muted: #6c757d;
  --border: #e2e8f0;
  --radius: 12px;
  --shadow: 0 4px 12px rgba(0,0,0,0.08);
  --shadow-lg: 0 8px 24px rgba(0,0,0,0.12);
  --transition: all 0.3s ease;
}

/* Modern form container */
#regForm.well {
  background: white;
  border: none;
  border-radius: var(--radius);
  box-shadow: var(--shadow-lg);
  padding: 35px;
  max-width: 1000px;
  margin: 0 auto;
}

/* Enhanced note section */
#reg_note_well { 
  background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
  border-left: 4px solid var(--accent);
  padding: 16px 20px;
  color: var(--dark);
  margin-bottom: 30px;
  border-radius: var(--radius);
  line-height: 1.6;
  box-shadow: 0 2px 8px rgba(39, 174, 96, 0.1);
  font-size: 14px;
}

/* Simplified form sections - no fancy effects that could cause overlapping */
.form-section { 
  margin-bottom: 30px;
  background: #fff;
  padding: 25px;
  border-radius: 8px;
  border: 1px solid #ddd;
  /* Remove all transitions, transforms, shadows that could cause issues */
}

/* Remove hover effects that could cause positioning issues */
.form-section:hover {
  /* No hover effects */
}

.form-section h5 { 
  margin: 0 0 20px 0;
  color: var(--primary);
  font-weight: 700;
  font-size: 18px;
  padding-bottom: 12px;
  border-bottom: 2px solid var(--accent);
  /* Simplified - no flex, no pseudo-elements */
}

/* Remove pseudo-element that could block clicks */
.form-section h5::before {
  display: none;
}

/* Enhanced form labels */
.control-label {
  font-weight: 600;
  color: var(--dark);
  font-size: 14px;
  margin-bottom: 8px;
  display: flex;
  align-items: center;
  gap: 6px;
}

.control-label .required-mark {
  color: #e74c3c;
  font-weight: 700;
}

/* Modern form controls */
.form-control {
  border: 2px solid var(--border);
  border-radius: var(--radius);
  padding: 12px 16px;
  font-size: 14px;
  transition: var(--transition);
  background: white;
  box-shadow: 0 1px 3px rgba(0,0,0,0.02);
}

.form-control:focus {
  outline: none;
  border-color: var(--accent);
  box-shadow: 0 0 0 4px rgba(39, 174, 96, 0.1);
  background: white;
}

.form-control::placeholder {
  color: #cbd5e0;
  font-style: italic;
}

/* Radio buttons styling */
.radio-inline {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  margin-right: 20px;
  padding: 10px 16px;
  background: white;
  border: 2px solid var(--border);
  border-radius: var(--radius);
  cursor: pointer;
  transition: var(--transition);
  font-weight: 500;
}

.radio-inline:hover {
  border-color: var(--accent-light);
  background: rgba(39, 174, 96, 0.05);
}

.radio-inline input[type="radio"] {
  width: 18px;
  height: 18px;
  cursor: pointer;
}

.radio-inline input[type="radio"]:checked + span,
.radio-inline:has(input[type="radio"]:checked) {
  border-color: var(--accent);
  background: rgba(39, 174, 96, 0.1);
  color: var(--accent-dark);
}

/* Select dropdowns */
select.form-control {
  appearance: none;
  background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%236c757d%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E');
  background-repeat: no-repeat;
  background-position: right 12px top 50%;
  background-size: 12px auto;
  padding-right: 40px;
  cursor: pointer;
}

/* Maiden name field toggle */
.maiden-name-field {
  display: none;
  opacity: 0;
  max-height: 0;
  overflow: hidden;
  transition: all 0.3s ease;
  margin-bottom: 0;
}

.maiden-name-field.visible {
  display: block;
  opacity: 1;
  max-height: 200px;
  margin-bottom: 1rem;
}

/* Enhanced buttons */
.btn-primary {
  background: linear-gradient(135deg, var(--accent), var(--accent-dark));
  border: none;
  border-radius: var(--radius);
  padding: 14px 32px;
  font-size: 16px;
  font-weight: 600;
  transition: var(--transition);
  box-shadow: 0 4px 12px rgba(39, 174, 96, 0.3);
  color: white;
}

.btn-primary:hover {
  background: linear-gradient(135deg, var(--accent-dark), #1e8449);
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(39, 174, 96, 0.4);
}

.btn-primary:active {
  transform: translateY(0);
}

.btn-default {
  background: white;
  border: 2px solid var(--border);
  border-radius: var(--radius);
  padding: 14px 32px;
  font-size: 16px;
  font-weight: 600;
  transition: var(--transition);
  color: var(--dark);
}

.btn-default:hover {
  border-color: var(--accent);
  background: rgba(39, 174, 96, 0.05);
  color: var(--accent-dark);
}

.btn-lg {
  padding: 14px 36px;
  font-size: 17px;
  line-height: 1.4;
  border-radius: var(--radius);
  margin-right: 15px;
  margin-top: 10px;
}

/* Form groups spacing */
.form-group {
  margin-bottom: 20px;
}

/* Help text */
.help-block {
  font-size: 13px;
  color: var(--muted);
  margin-top: 6px;
  font-style: italic;
}

.form-text {
  display: block;
  margin-top: 6px;
  font-size: 12px;
  color: var(--muted);
}

/* Required field indicator */
.required, .required-mark {
  color: #e74c3c;
  font-weight: 700;
  margin-left: 2px;
}

/* Field error state */
.form-control.error {
  border-color: #e74c3c !important;
  box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.1) !important;
}

/* Field success state */
.form-control.success {
  border-color: var(--accent) !important;
}

/* Ensure proper z-index for dropdowns and modals */
.form-section {
  position: static !important;
  z-index: auto !important;
  transform: none !important;
}

select.form-control {
  position: relative;
  z-index: 1;
}

/* Prevent label text from wrapping awkwardly */
.form-label {
  display: block !important;
  width: 100% !important;
  margin-bottom: 8px !important;
  word-break: normal;
  /* position: relative removed to prevent click blocking */
  clear: both;
  float: none !important;
}

/* Better spacing for radio buttons */
.form-check-inline {
  margin-right: 15px;
  margin-bottom: 10px;
}

/* Better column spacing on mobile */
@media (max-width: 767px) {
  .col-md-4, .col-md-6, .col-md-8, .col-md-12 {
    margin-bottom: 15px;
  }
}

/* Disable transforms that cause overlapping on this page */
.panel:hover {
  transform: none !important;
}

/* Ensure all form elements maintain their position */
.form-section,
.form-group,
.mb-3 {
  transform: none !important;
}

/* Remove z-index stacking - it was preventing clicks */
/* .form-section:nth-child(1) { z-index: 10; }
.form-section:nth-child(2) { z-index: 9; }
.form-section:nth-child(3) { z-index: 8; }
.form-section:nth-child(4) { z-index: 7; }
.form-section:nth-child(5) { z-index: 6; } */

/* Ensure proper column structure */
.mb-3 {
  position: static !important;
  width: 100%;
  margin-bottom: 1rem !important;
  padding-left: 15px;
  padding-right: 15px;
  min-height: 1px;
  transform: none !important;
}

/* Make sure input fields stay below their labels */
.form-control {
  margin-top: 0 !important;
  clear: both;
  display: block;
  width: 100%;
}

/* Remove position relative from all children - it was blocking clicks */
.form-section * {
  transform: none !important;
}

select.form-control,
input.form-control,
textarea.form-control {
  /* All positioning removed - let browser handle it naturally */
  cursor: text;
  pointer-events: auto !important;
}

/* Ensure pseudo-elements don't block clicks */
.form-section::before,
.form-section::after,
.form-group::before,
.form-group::after,
.mb-3::before,
.mb-3::after,
label::before,
label::after {
  pointer-events: none !important;
}

/* Ensure all form inputs are fully interactive */
input, select, textarea, button {
  pointer-events: auto !important;
}

/* Simplified stacking - no isolation contexts that could cause issues */
.row > [class*="col-"] {
  position: static;
}

/* Ensure rows don't overlap */
.row {
  clear: both;
}

/* Make absolutely sure form controls are on top */
.form-control {
  position: relative !important;
  z-index: 100 !important;
  background: white !important;
}

/* Ensure small text doesn't interfere */
small.form-text, .form-text {
  position: static;
  pointer-events: none;
}

/* Desktop-specific fixes for column overlapping */
@media (min-width: 768px) {
  /* Ensure proper spacing and no overlap on desktop */
  .mb-3 {
    min-height: auto;
    overflow: visible;
    position: static !important;
  }
  
  /* Force labels to stay in their column */
  .form-label {
    max-width: 100%;
    overflow: visible;
    position: static !important;
  }
  
  /* Ensure each form-section row is simple */
  .form-section .row {
    position: static !important;
  }
  
  /* Make sure inputs have higher z-index than anything else */
  .form-control {
    z-index: 100 !important;
    position: relative !important;
  }
  
  /* Force all form sections to use simple stacking */
  .form-section {
    position: static !important;
    transform: none !important;
  }
}

/* SweetAlert2 Custom Styling */
.swal2-popup {
  border-radius: var(--radius) !important;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
  box-shadow: var(--shadow-lg) !important;
}

.swal2-title {
  font-size: 1.6rem !important;
  font-weight: 700 !important;
  color: var(--primary) !important;
}

.swal2-html-container {
  font-size: 15px !important;
  line-height: 1.6 !important;
}

.swal2-confirm {
  background: linear-gradient(135deg, var(--accent), var(--accent-dark)) !important;
  border-radius: var(--radius) !important;
  padding: 12px 28px !important;
  font-weight: 600 !important;
  box-shadow: 0 4px 12px rgba(39, 174, 96, 0.3) !important;
}

.swal2-confirm:hover {
  background: linear-gradient(135deg, var(--accent-dark), #1e8449) !important;
}

/* Responsive adjustments */
@media (max-width: 991px) {
  #regForm.well {
    padding: 25px 20px;
  }
  
  .form-section {
    padding: 20px 15px;
  }
}

@media (max-width: 767px) {
  #regForm.well {
    padding: 20px 15px;
  }
  
  .form-section h5 {
    font-size: 16px;
  }
  
  .radio-inline {
    display: flex;
    margin-right: 0;
    margin-bottom: 10px;
    width: 100%;
  }
  
  .btn-lg {
    width: 100%;
    margin-right: 0;
    margin-bottom: 10px;
  }
}

@media (max-width: 575px) {
  .form-label { 
    margin-bottom: 8px;
    font-size: 13px;
  }
  
  .form-control {
    padding: 10px 14px;
    font-size: 14px;
  }
}

/* Loading state */
.btn-primary.loading {
  position: relative;
  color: transparent;
}

.btn-primary.loading::after {
  content: '';
  position: absolute;
  width: 20px;
  height: 20px;
  top: 50%;
  left: 50%;
  margin-left: -10px;
  margin-top: -10px;
  border: 3px solid rgba(255, 255, 255, 0.3);
  border-top-color: white;
  border-radius: 50%;
  animation: spin 0.8s linear infinite;
}

@keyframes spin {
  to { transform: rotate(360deg); }
}
</style>

<!-- HTML form (responsive Bootstrap layout) - unchanged structure except we ensure form id -->
<form id="regForm" action="" class="form-horizontal well" method="post" novalidate>
    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
    <div class="container-fluid">
      <div class="row align-items-center mb-3">
        <div class="col-md-8">
          <h2 style="margin:0;">Pre-Registration Form (New Student)</h2>
        </div>
        <div class="col-md-4 text-md-right" style="display:flex;align-items:center;justify-content:flex-end;">
          <label style="margin:0;">Academic Year: <strong><?php echo htmlspecialchars($_SESSION['SY']); ?></strong></label>
        </div>
      </div>

      <div id="reg_note_well" role="status" aria-live="polite">
          <span class="reg-note-title">Returning / Continuing Students</span>
          <div>Please log in to your existing account instead of creating a new registration. Creating a new account may create duplicate records and prevent access to your previous academic data.
          </div>
      </div>

      <!-- IDENTIFICATION -->
      <div class="form-section">
        <h5>Identification</h5>
        <div class="row">
          <div class="col-md-4 mb-3">
            <label class="form-label">Id</label>
            <input class="form-control" readonly id="IDNO" name="IDNO" placeholder="Student Id" type="text"
                value="<?php echo isset($_SESSION['REG_STUDID']) && $_SESSION['REG_STUDID'] !== '' ? htmlspecialchars($_SESSION['REG_STUDID']) : htmlspecialchars($autonum->AUTO); ?>">
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label">Family Name <span class="required">*</span></label>
            <input required class="form-control" id="LNAME" name="LNAME" placeholder="Last Name" type="text"
                value="<?php echo isset($_SESSION['REG_LNAME']) ? htmlspecialchars($_SESSION['REG_LNAME']) : ''; ?>">
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label">Given Name <span class="required">*</span></label>
            <input required class="form-control" id="FNAME" name="FNAME" placeholder="First Name" type="text"
                value="<?php echo isset($_SESSION['REG_FNAME']) ? htmlspecialchars($_SESSION['REG_FNAME']) : ''; ?>">
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label">Middle Initial</label>
            <input class="form-control" id="MI" name="MI" placeholder="Middle Initial" maxlength="1" type="text"
                value="<?php echo isset($_SESSION['REG_MI']) ? htmlspecialchars($_SESSION['REG_MI']) : ''; ?>">
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label">Suffix</label>
            <input class="form-control" id="SUFFIX" name="SUFFIX" placeholder="e.g. Jr., Sr., III" type="text"
                value="<?php echo isset($_SESSION['REG_SUFFIX']) ? htmlspecialchars($_SESSION['REG_SUFFIX']) : ''; ?>">
          </div>

          <!-- NEW: Maiden name field with conditional visibility -->
          <div class="col-md-8 mb-3 maiden-name-field <?php echo (isset($_SESSION['REG_SEX']) && $_SESSION['REG_SEX'] === 'Female') ? 'visible' : ''; ?>" id="maidenNameContainer">
            <label class="form-label">Maiden Name <span class="text-muted">(for married female)</span></label>
            <input class="form-control" id="MAIDEN_NAME" name="MAIDEN_NAME" placeholder="Maiden Name" type="text"
                value="<?php echo isset($_SESSION['REG_MAIDEN_NAME']) ? htmlspecialchars($_SESSION['REG_MAIDEN_NAME']) : ''; ?>">
            <small class="form-text text-muted">This field is only applicable for female students who have a maiden name.</small>
          </div>
        </div>
      </div>

      <!-- BASIC INFO -->
      <div class="form-section">
        <h5>Personal Information</h5>
        <div class="row">
          <div class="col-md-4 mb-3">
            <label class="form-label">Date of Birth (mm/dd/yyyy) <span class="required">*</span></label>
            <input required name="BIRTHDATE" id="BIRTHDATE" type="text" class="form-control"
                data-inputmask="'alias': 'mm/dd/yyyy'" data-mask value="<?php echo isset($_SESSION['REG_BIRTHDATE']) ? htmlspecialchars($_SESSION['REG_BIRTHDATE']) : ''; ?>">
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label">Place of Birth</label>
            <input class="form-control" id="BIRTHPLACE" name="BIRTHPLACE" placeholder="Place of Birth" type="text"
                value="<?php echo isset($_SESSION['REG_BIRTHPLACE']) ? htmlspecialchars($_SESSION['REG_BIRTHPLACE']) : ''; ?>">
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label">Sex <span class="required">*</span></label>
            <div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="optionsRadios1" name="optionsRadios" type="radio" value="Female" <?php echo (isset($_SESSION['REG_SEX']) && $_SESSION['REG_SEX'] === 'Female') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="optionsRadios1">Female</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="optionsRadios2" name="optionsRadios" type="radio" value="Male" <?php echo (isset($_SESSION['REG_SEX']) && $_SESSION['REG_SEX'] === 'Male') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="optionsRadios2">Male</label>
              </div>
            </div>
            <small class="form-text text-muted">For married females, be sure to fill in the Maiden Name field.</small>
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label">Citizenship</label>
            <input class="form-control" id="NATIONALITY" name="NATIONALITY" placeholder="Citizenship" type="text"
                value="<?php echo isset($_SESSION['REG_NATIONALITY']) ? htmlspecialchars($_SESSION['REG_NATIONALITY']) : ''; ?>">
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label">Ethnicity/Tribal Affiliation</label>
            <input class="form-control" id="ETHNICITY" name="ETHNICITY" placeholder="Ethnicity" type="text"
                value="<?php echo isset($_SESSION['REG_ETHNICITY']) ? htmlspecialchars($_SESSION['REG_ETHNICITY']) : ''; ?>">
          </div>

        </div>
      </div>

      <!-- CONTACT & BACKGROUND -->
      <div class="form-section">
        <h5>Contact & Background</h5>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">Permanent / Home Address <span class="required">*</span></label>
            <input required class="form-control" id="PADDRESS" name="PADDRESS" placeholder="Permanent Address" type="text"
                value="<?php echo isset($_SESSION['REG_PADDRESS']) ? htmlspecialchars($_SESSION['REG_PADDRESS']) : ''; ?>">
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label">Address while studying at BSU</label>
            <input class="form-control" id="ADDR_WHILE_STUDY" name="ADDR_WHILE_STUDY" placeholder="Address while at BSU" type="text"
                value="<?php echo isset($_SESSION['REG_ADDR_WHILE_STUDY']) ? htmlspecialchars($_SESSION['REG_ADDR_WHILE_STUDY']) : ''; ?>">
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label">Contact Number <span class="required">*</span></label>
            <input required class="form-control" id="CONTACT" name="CONTACT" placeholder="Contact Number" type="text"
                value="<?php echo isset($_SESSION['REG_CONTACT']) ? htmlspecialchars($_SESSION['REG_CONTACT']) : ''; ?>">
          </div>

          <div class="col-md-8 mb-3">
            <label class="form-label">E-mail Address</label>
            <input class="form-control" id="EMAIL" name="EMAIL" placeholder="JuanDelaCruz@gmail.com" type="email"
                value="<?php echo isset($_SESSION['REG_EMAIL']) ? htmlspecialchars($_SESSION['REG_EMAIL']) : ''; ?>">
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label">Last School Attended</label>
            <input class="form-control" id="LAST_SCHOOL" name="LAST_SCHOOL" placeholder="Last school attended" type="text"
                value="<?php echo isset($_SESSION['REG_LAST_SCHOOL']) ? htmlspecialchars($_SESSION['REG_LAST_SCHOOL']) : ''; ?>">
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label">Last School Address</label>
            <input class="form-control" id="LAST_SCHOOL_ADDR" name="LAST_SCHOOL_ADDR" placeholder="Address of last school" type="text"
                value="<?php echo isset($_SESSION['REG_LAST_SCHOOL_ADDR']) ? htmlspecialchars($_SESSION['REG_LAST_SCHOOL_ADDR']) : ''; ?>">
          </div>
        </div>
      </div>

      <!-- FAMILY & EMERGENCY -->
      <div class="form-section">
        <h5>Family & Emergency Contact</h5>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">Father's Name</label>
            <input class="form-control" id="FATHER_NAME" name="FATHER_NAME" placeholder="Father's name" type="text"
                value="<?php echo isset($_SESSION['REG_FATHER_NAME']) ? htmlspecialchars($_SESSION['REG_FATHER_NAME']) : ''; ?>">
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label">Father's Contact Number</label>
            <input class="form-control" id="FATHER_CONTACT" name="FATHER_CONTACT" placeholder="Father's contact" type="text"
                value="<?php echo isset($_SESSION['REG_FATHER_CONTACT']) ? htmlspecialchars($_SESSION['REG_FATHER_CONTACT']) : ''; ?>">
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label">Mother's Name</label>
            <input class="form-control" id="MOTHER_NAME" name="MOTHER_NAME" placeholder="Mother's name" type="text"
                value="<?php echo isset($_SESSION['REG_MOTHER_NAME']) ? htmlspecialchars($_SESSION['REG_MOTHER_NAME']) : ''; ?>">
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label">Mother's Contact Number</label>
            <input class="form-control" id="MOTHER_CONTACT" name="MOTHER_CONTACT" placeholder="Mother's contact" type="text"
                value="<?php echo isset($_SESSION['REG_MOTHER_CONTACT']) ? htmlspecialchars($_SESSION['REG_MOTHER_CONTACT']) : ''; ?>">
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label">Emergency Contact Person</label>
            <input class="form-control" id="EMER_NAME" name="EMER_NAME" placeholder="Emergency contact person" type="text"
                value="<?php echo isset($_SESSION['REG_EMER_NAME']) ? htmlspecialchars($_SESSION['REG_EMER_NAME']) : ''; ?>">
          </div>

          <div class="col-md-3 mb-3">
            <label class="form-label">Relationship</label>
            <input class="form-control" id="EMER_REL" name="EMER_REL" placeholder="Relationship" type="text"
                value="<?php echo isset($_SESSION['REG_EMER_REL']) ? htmlspecialchars($_SESSION['REG_EMER_REL']) : ''; ?>">
          </div>

          <div class="col-md-3 mb-3">
            <label class="form-label">Emergency Contact</label>
            <input class="form-control" id="EMER_CONTACT" name="EMER_CONTACT" placeholder="Contact number" type="text"
                value="<?php echo isset($_SESSION['REG_EMER_CONTACT']) ? htmlspecialchars($_SESSION['REG_EMER_CONTACT']) : ''; ?>">
          </div>

          <div class="col-md-12 mb-3">
            <label class="form-label">Emergency Address</label>
            <input class="form-control" id="EMER_ADDR" name="EMER_ADDR" placeholder="Emergency address" type="text"
                value="<?php echo isset($_SESSION['REG_EMER_ADDR']) ? htmlspecialchars($_SESSION['REG_EMER_ADDR']) : ''; ?>">
          </div>
        </div>
      </div>

      <!-- ACADEMIC / ACCOUNT -->
      <div class="form-section">
        <h5>Academic & Account</h5>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">Course</label>
            <?php
            $groups = [];
            if (isset($mydb)) {
                $mydb->setQuery("SELECT COURSE_NAME, COURSE_LEVEL FROM course GROUP BY COURSE_NAME, COURSE_LEVEL ORDER BY COURSE_NAME, COURSE_LEVEL");
                $groups = $mydb->loadResultList();
            }
            ?>
            <select class="form-control" id="COURSE_GROUP" name="COURSE_GROUP" style="padding: 4px 8px !important;">
                <option value="">Select course</option>
                <?php foreach ($groups as $g):
                    $val = htmlspecialchars($g->COURSE_NAME . '||' . $g->COURSE_LEVEL, ENT_QUOTES);
                    $label = htmlspecialchars($g->COURSE_NAME . ' - ' . $g->COURSE_LEVEL);
                ?>
                    <option value="<?php echo $val; ?>"><?php echo $label; ?></option>
                <?php endforeach; ?>
            </select>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label">Major</label>
            <select class="form-control" id="COURSE" name="COURSE" style="padding: 4px 8px !important;">
                <option value="">Select major</option>
            </select>
            <noscript>
                <select class="form-control" name="COURSE">
                <option value="">Select major</option>
                <?php
                if (isset($mydb)) {
                    $mydb->setQuery("SELECT COURSE_ID, COURSE_NAME, COURSE_LEVEL, COURSE_MAJOR FROM course ORDER BY COURSE_NAME, COURSE_LEVEL, COURSE_MAJOR");
                    $all = $mydb->loadResultList();
                    foreach ($all as $r) {
                        $label = htmlspecialchars($r->COURSE_NAME . ' - ' . $r->COURSE_LEVEL . ' / ' . ($r->COURSE_MAJOR ?: '(No major)'));
                        echo '<option value="'.intval($r->COURSE_ID).'">'.$label.'</option>';
                    }
                }
                ?>
                </select>
            </noscript>
          </div>

          <div class="col-md-12 mb-3">
            <label class="form-label">Username <span class="required">*</span></label>
            <input required class="form-control" id="USER_NAME" name="USER_NAME" placeholder="Username (4-30 characters)" type="text"
                value="<?php echo isset($_SESSION['REG_USER_NAME']) ? htmlspecialchars($_SESSION['REG_USER_NAME']) : ''; ?>">
            <small class="form-text text-muted">Letters, numbers, and underscore only. This will be used for login.</small>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label">Password <span class="required">*</span></label>
            <input required class="form-control" id="PASS" name="PASS" placeholder="Enter password (min 8 chars)" type="password" value="">
            <small class="form-text text-muted">Minimum 8 characters</small>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label">Confirm Password <span class="required">*</span></label>
            <input required class="form-control" id="PASS_CONFIRM" name="PASS_CONFIRM" placeholder="Re-enter password" type="password" value="">
            <small class="form-text text-muted">Must match the password above</small>
          </div>

          <!-- Terms and Conditions Agreement -->
          <div class="col-12 mt-4">
            <div style="background: #fff3cd; border-left: 4px solid #ffc107; padding: 20px; border-radius: 4px;">
              <h5 style="color: #856404; margin-bottom: 15px;">
                <i class="fa fa-shield"></i> Data Privacy and Terms Agreement
              </h5>
              
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="termsCheckbox" name="terms_accepted" required style="width: 18px; height: 18px; margin-top: 2px;">
                <label class="form-check-label" for="termsCheckbox" style="font-weight: normal; margin-left: 8px;">
                  I have read and agree to the 
                  <a href="javascript:void(0);" onclick="window.open('terms.php', 'Terms and Conditions', 'width=900,height=700,scrollbars=yes');" style="color: #0056b3; font-weight: bold; text-decoration: underline;">
                    Terms and Conditions
                  </a>
                </label>
              </div>
              
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="dataPrivacyCheckbox" name="data_privacy_accepted" required style="width: 18px; height: 18px; margin-top: 2px;">
                <label class="form-check-label" for="dataPrivacyCheckbox" style="font-weight: normal; margin-left: 8px;">
                  I consent to the collection, use, and processing of my personal information as described in the Terms and Conditions and in accordance with the <strong>Data Privacy Act of 2012 (Republic Act No. 10173)</strong>
                </label>
              </div>
              
              <p style="margin-top: 15px; margin-bottom: 0; font-size: 0.9em; color: #856404;">
                <i class="fa fa-info-circle"></i> 
                <strong>Note:</strong> You must accept these terms to complete your enrollment. Your information will be used for academic and administrative purposes only.
              </p>
            </div>
          </div>

          <div class="col-12 text-right mt-3">
            <button class="btn btn-success btn-lg" name="regsubmit" type="submit" id="submitBtn">
              <i class="fa fa-check-circle"></i> Submit Registration
            </button>
          </div>
        </div>
      </div>

    </div> <!-- /.container -->
</form>

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<!-- existing dynamic-fetch JS kept, but we add client validation -->
<script>
(function(){
  var groupEl = document.getElementById('COURSE_GROUP');
  var majorEl = document.getElementById('COURSE');

  function populateMajors(groupValue, preselectCourseId) {
    if (!groupValue) {
      majorEl.innerHTML = '<option value="">Select major</option>';
      return;
    }
    majorEl.innerHTML = '<option>Loading...</option>';
    var url = 'include/get_majors.php?group=' + encodeURIComponent(groupValue);
    fetch(url)
      .then(function(resp){ return resp.json(); })
      .then(function(data){
        majorEl.innerHTML = '<option value="">Select major</option>';
        if (!Array.isArray(data) || data.length === 0) {
          majorEl.innerHTML += '<option value="">(No majors)</option>';
          return;
        }
        data.forEach(function(row){
          var opt = document.createElement('option');
          opt.value = row.COURSE_ID;
          opt.text = (row.COURSE_MAJOR && row.COURSE_MAJOR.trim() !== '') ? row.COURSE_MAJOR + ' ('+row.COURSE_LEVEL+')' : (row.COURSE_NAME + ' - ' + row.COURSE_LEVEL);
          if (preselectCourseId && String(preselectCourseId) === String(row.COURSE_ID)) opt.selected = true;
          majorEl.appendChild(opt);
        });
      })
      .catch(function(err){
        majorEl.innerHTML = '<option value="">Error loading majors</option>';
        console.error(err);
      });
  }

  if (groupEl) {
    groupEl.addEventListener('change', function(){ populateMajors(this.value, null); });
  }

  // NEW: Maiden name field visibility control
  function toggleMaidenNameField() {
    var maidenNameContainer = document.getElementById('maidenNameContainer');
    var femaleRadio = document.getElementById('optionsRadios1');
    
    if (femaleRadio && femaleRadio.checked) {
      maidenNameContainer.classList.add('visible');
    } else {
      maidenNameContainer.classList.remove('visible');
      // Clear maiden name value when hidden
      document.getElementById('MAIDEN_NAME').value = '';
    }
  }

  // Add event listeners to sex radio buttons
  var sexRadios = document.querySelectorAll('input[name="optionsRadios"]');
  sexRadios.forEach(function(radio) {
    radio.addEventListener('change', toggleMaidenNameField);
  });

  // Initialize maiden name field visibility on page load
  document.addEventListener('DOMContentLoaded', function(){
    toggleMaidenNameField();
    
    <?php
    if (!empty($_SESSION['REG_COURSEID']) && isset($mydb)) {
        $cid = intval($_SESSION['REG_COURSEID']);
        $mydb->setQuery("SELECT COURSE_NAME, COURSE_LEVEL FROM course WHERE COURSE_ID = {$cid} LIMIT 1");
        $row = $mydb->loadSingleResult();
        if ($row && is_object($row)) {
            $groupVal = htmlspecialchars($row->COURSE_NAME . '||' . $row->COURSE_LEVEL, ENT_QUOTES);
            echo "var preGroup = \"{$groupVal}\";\n";
            echo "var preCourseId = \"{$cid}\";\n";
            echo "var groupSelect = document.getElementById('COURSE_GROUP');\n";
            echo "if (groupSelect) { groupSelect.value = preGroup; }\n";
            echo "populateMajors(preGroup, preCourseId);\n";
        }
    }
    ?>
  });

  // --------- client-side validation ----------
  var theForm = document.getElementById('regForm');
  if (theForm) {
    theForm.addEventListener('submit', function(e){
      // NEW: SweetAlert2 error display function
      function showErr(msg, title = 'Validation Error') {
        Swal.fire({
          icon: 'error',
          title: title,
          text: msg,
          confirmButtonText: 'OK',
          confirmButtonColor: '#d33',
          backdrop: true,
          allowOutsideClick: false
        });
      }

      function showSuccess(msg, title = 'Success') {
        Swal.fire({
          icon: 'success',
          title: title,
          text: msg,
          confirmButtonText: 'OK',
          confirmButtonColor: '#3085d6',
          backdrop: true
        });
      }

      var fname = document.getElementById('FNAME').value.trim();
      var lname = document.getElementById('LNAME').value.trim();
      var paddr = document.getElementById('PADDRESS').value.trim();
      var uname = document.getElementById('USER_NAME').value.trim();
      var pass = document.getElementById('PASS').value || '';
      var passConfirm = document.getElementById('PASS_CONFIRM').value || '';
      var course = document.getElementById('COURSE').value || '';
      var bd = document.getElementById('BIRTHDATE').value.trim();
      var contact = document.getElementById('CONTACT').value.trim();
      
      // Check required fields with specific messages
      if (!fname) {
        showErr('Please enter your First Name (Given Name).');
        document.getElementById('FNAME').focus();
        e.preventDefault(); return false;
      }
      if (!lname) {
        showErr('Please enter your Last Name (Family Name).');
        document.getElementById('LNAME').focus();
        e.preventDefault(); return false;
      }
      
      // NEW: Sex validation
      var sexSelected = document.querySelector('input[name="optionsRadios"]:checked');
      if (!sexSelected) {
        showErr('Please select your Sex.');
        e.preventDefault(); return false;
      }
      
      // NEW: Maiden name validation
      var maidenName = document.getElementById('MAIDEN_NAME').value.trim();
      var isFemale = sexSelected.value === 'Female';
      if (!isFemale && maidenName) {
        showErr('Maiden name is only applicable for females. Please remove the maiden name or select Female as your sex.');
        e.preventDefault(); return false;
      }
      
      if (!bd) {
        showErr('Please enter your Date of Birth.');
        document.getElementById('BIRTHDATE').focus();
        e.preventDefault(); return false;
      }
      
      if (!paddr) {
        showErr('Please enter your Permanent Address.');
        document.getElementById('PADDRESS').focus();
        e.preventDefault(); return false;
      }
      
      if (!contact) {
        showErr('Please enter your Contact Number.');
        document.getElementById('CONTACT').focus();
        e.preventDefault(); return false;
      }
      
      if (!course) {
        showErr('Please select your Course and Major.');
        document.getElementById('COURSE').focus();
        e.preventDefault(); return false;
      }
      
      if (!uname) {
        showErr('Please enter a Username.');
        document.getElementById('USER_NAME').focus();
        e.preventDefault(); return false;
      }
      
      if (!pass) {
        showErr('Please enter a Password.');
        document.getElementById('PASS').focus();
        e.preventDefault(); return false;
      }
      
      if (pass.length < 8) {
        showErr('Password must be at least 8 characters.');
        document.getElementById('PASS').focus();
        e.preventDefault(); return false;
      }
      
      if (!passConfirm) {
        showErr('Please confirm your password.');
        document.getElementById('PASS_CONFIRM').focus();
        e.preventDefault(); return false;
      }
      
      if (pass !== passConfirm) {
        showErr('Passwords do not match. Please make sure both password fields are identical.');
        document.getElementById('PASS_CONFIRM').focus();
        document.getElementById('PASS_CONFIRM').select();
        e.preventDefault(); return false;
      }
      
      // Check Terms and Conditions acceptance
      var termsChecked = document.getElementById('termsCheckbox') && document.getElementById('termsCheckbox').checked;
      var privacyChecked = document.getElementById('dataPrivacyCheckbox') && document.getElementById('dataPrivacyCheckbox').checked;
      
      if (!termsChecked) {
        showErr('You must read and accept the Terms and Conditions to complete enrollment.', 'Terms Required');
        document.getElementById('termsCheckbox').focus();
        e.preventDefault(); return false;
      }
      
      if (!privacyChecked) {
        showErr('You must consent to the processing of your personal data under the Data Privacy Act of 2012 to complete enrollment.', 'Privacy Consent Required');
        document.getElementById('dataPrivacyCheckbox').focus();
        e.preventDefault(); return false;
      }
      // date mm/dd/yyyy basic check and age >= 15
      var dateRe = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;
      var m = bd.match(dateRe);
      if (!m) {
        showErr('Date of birth must be in mm/dd/yyyy format.');
        e.preventDefault(); return false;
      }
      var mo = parseInt(m[1],10), da = parseInt(m[2],10), yr = parseInt(m[3],10);
      var dob = new Date(yr, mo-1, da);
      if (dob.getFullYear() !== yr || dob.getMonth() !== mo-1 || dob.getDate() !== da) {
        showErr('Invalid date of birth.');
        e.preventDefault(); return false;
      }
      var today = new Date();
      var age = today.getFullYear() - dob.getFullYear();
      var mDiff = today.getMonth() - dob.getMonth();
      if (mDiff < 0 || (mDiff === 0 && today.getDate() < dob.getDate())) age--;
      if (age < 15) {
        showErr('Cannot Proceed. Must be 15 years old and above to enroll.');
        e.preventDefault(); return false;
      }
      // username quick check
      if (!/^[A-Za-z0-9_]{4,30}$/.test(uname)) {
        showErr('Username must be 4-30 characters and contain only letters, numbers or underscore.');
        e.preventDefault(); return false;
      }
      // contact quick check (digits, +, spaces, -, parentheses)
      if (contact && !/^[\d\s\+\-\(\)]+$/.test(contact)) {
        showErr('Contact number contains invalid characters.');
        e.preventDefault(); return false;
      }
      // pass all client checks -> allow submit; server side will still validate
      return true;
    });
  }

  // DEBUG: Force all form inputs to be clickable and improve row click behavior
  document.addEventListener('DOMContentLoaded', function() {
    var allInputs = document.querySelectorAll('input.form-control, select.form-control, textarea.form-control');
    allInputs.forEach(function(input) {
      // Ensure they're clickable
      input.style.pointerEvents = 'auto';
      input.style.position = 'relative';
      input.style.zIndex = '10';
      
      // Debug: log which inputs receive clicks
      input.addEventListener('click', function() {
        console.log('Clicked input:', this.tagName, '#' + (this.id || ''), this.name || '');
      });
    });
    
    // Make whole form row focus its first input when clicked (better desktop UX)
    var fieldRows = document.querySelectorAll('.form-section .mb-3');
    fieldRows.forEach(function(row) {
      row.addEventListener('click', function(e) {
        // If the user clicked directly on an input/select/textarea, let it behave normally
        var tag = e.target.tagName;
        if (tag === 'INPUT' || tag === 'SELECT' || tag === 'TEXTAREA') {
          return;
        }
        // Otherwise, focus the first form-control inside this row
        var control = row.querySelector('input.form-control, select.form-control, textarea.form-control');
        if (control) {
          control.focus();
        }
      });
    });
    
    // Also check if any elements are blocking (debug info)
    var formSections = document.querySelectorAll('.form-section');
    formSections.forEach(function(section, idx) {
      console.log('Form section ' + idx + ' height:', section.offsetHeight);
    });
  });

  // GLOBAL DEBUG: log every click target (capturing) to find overlay elements
  document.addEventListener('click', function(e) {
    console.log('GLOBAL CLICK target:', e.target.tagName, 'id=' + (e.target.id || ''), 'class=' + (e.target.className || ''));
  }, true);

})();
</script>
