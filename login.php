 <?php
 require_once ("include/initialize.php"); 
//  if (@$_GET['page'] <= 2 or @$_GET['page'] > 5) {
//   # code...
//     // unset($_SESSION['PRODUCTID']);
//     // // unset($_SESSION['QTY']);
//     // // unset($_SESSION['TOTAL']);
// } 

// --- Robust student login handlers (supports password_hash + legacy sha1 fallback + migration) ---
// Helper: perform login attempt, write logs, set session, redirect.
function attempt_student_login($username, $password, $successRedirect, $failRedirect, $logOnSuccess = true) {
    global $mydb;

    $email = trim($username);
    $upass = trim($password);

    if ($email === '' || $upass === '') {
        message("Invalid Username and Password!", "error");
        redirect($failRedirect);
        return;
    }

    // Escape username/ID for query (use your wrapper if available)
    $safeUser = (isset($mydb) && method_exists($mydb, 'escape_value')) ? $mydb->escape_value($email) : addslashes($email);

    // Fetch user row by username OR ID number (backwards-compatible)
    $mydb->setQuery("SELECT * FROM `tblstudent` WHERE ACC_USERNAME = '{$safeUser}' OR IDNO = '{$safeUser}' LIMIT 1");
    $row = $mydb->loadSingleResult();

    if (!$row) {
        // No such user
        message("Invalid Username and Password! Please contact administrator", "error");
        redirect($failRedirect);
        return;
    }

    $storedHash = isset($row->ACC_PASSWORD) ? $row->ACC_PASSWORD : '';

    $ok = false;
    $usedLegacy = false; // true if we matched a non-password_hash value (sha1/plaintext)

    // Prefer password_verify (password_hash)
    if (!empty($storedHash) && password_verify($upass, $storedHash)) {
        $ok = true;
    } else {
        // Fallback to legacy SHA1 compare
        if (!empty($storedHash) && hash_equals($storedHash, sha1($upass))) {
            $ok = true;
            $usedLegacy = true;
        } elseif ($storedHash === $upass) {
            // Final fallback for old records that stored the password in plaintext
            $ok = true;
            $usedLegacy = true;
        }
    }

    if (!$ok) {
        message("Invalid Username and Password! Please contact administrator", "error");
        redirect($failRedirect);
        return;
    }

    // Check if enrollment is approved (NewEnrollees should be 0)
    if (isset($row->NewEnrollees) && $row->NewEnrollees == 1) {
        message("Your enrollment is pending approval by the registrar. Please wait for confirmation before logging in.", "error");
        redirect($failRedirect);
        return;
    }

    // If we matched a legacy (sha1/plaintext) password, rehash with password_hash() and update DB
    if ($usedLegacy) {
        try {
            $newHash = password_hash($upass, PASSWORD_DEFAULT);
            // Use intval to avoid injection on numeric ID
            $idno = intval($row->IDNO);
            $mydb->setQuery("UPDATE `tblstudent` SET ACC_PASSWORD = '{$newHash}' WHERE IDNO = {$idno} LIMIT 1");
            $mydb->executeQuery();
        } catch (Exception $e) {
            error_log("Failed to migrate legacy password for IDNO {$row->IDNO}: " . $e->getMessage());
            // continue — login still succeeds
        }
    }

    // Populate session variables expected by the app
    $_SESSION['IDNO']   = $row->IDNO;
    $_SESSION['STUDID'] = $row->IDNO;
    if (isset($row->FNAME)) $_SESSION['FNAME'] = $row->FNAME;
    if (isset($row->LNAME)) $_SESSION['LNAME'] = $row->LNAME;
    // set a role used elsewhere
    $_SESSION['ACCOUNT_TYPE'] = 'Student';

    // Insert log if requested
    if ($logOnSuccess) {
        try {
            $sql = "INSERT INTO `tbllogs` (`USERID`, `LOGDATETIME`, `LOGROLE`, `LOGMODE`)
                    VALUES (" . intval($row->IDNO) . ",'" . date('Y-m-d H:i:s') . "','Student','Logged in')";
            $mydb->setQuery($sql);
            $mydb->executeQuery();
        } catch (Exception $e) {
            error_log("Failed to write login log for IDNO {$row->IDNO}: " . $e->getMessage());
        }
    }

    // Redirect to success page
    redirect($successRedirect);
}

// handle sidebarLogin (original behavior -> redirect to profile on success, root on fail)
if (isset($_POST['sidebarLogin'])) {
    attempt_student_login(
        isset($_POST['U_USERNAME']) ? $_POST['U_USERNAME'] : '',
        isset($_POST['U_PASS']) ? $_POST['U_PASS'] : '',
        web_root . "index.php?q=profile",
        web_root . "index.php",
        true
    );
}

// handle oldLogin (original behavior -> redirect to profile on success, enrol on fail)
if (isset($_POST['oldLogin'])) {
    attempt_student_login(
        isset($_POST['U_USERNAME']) ? $_POST['U_USERNAME'] : '',
        isset($_POST['U_PASS']) ? $_POST['U_PASS'] : '',
        web_root . "index.php?q=profile",
        web_root . "index.php?q=enrol",
        true
    );
}

// handle modalLogin (original behavior -> redirect to orderdetails on success, profile on fail)
if (isset($_POST['modalLogin'])) {
    attempt_student_login(
        isset($_POST['U_USERNAME']) ? $_POST['U_USERNAME'] : '',
        isset($_POST['U_PASS']) ? $_POST['U_PASS'] : '',
        web_root . "index.php?q=orderdetails",
        web_root . "index.php?q=profile",
        false // modalLogin previously didn't write logs in your original modal flow (but you can set true)
    );
}

 ?> 
 

 