<?php
require_once '../include/initialize.php';

// 1) Ensure session is started
if (session_status() === PHP_SESSION_NONE) {
    @session_start();
}

// 2) Send strict no-cache headers (must be before any output)
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
header('Expires: 0');

// 3) Write logout entry to tbllogs (sanitize session values)
$userid  = isset($_SESSION['ACCOUNT_ID']) ? intval($_SESSION['ACCOUNT_ID']) : 0;
$role    = isset($_SESSION['ACCOUNT_TYPE']) ? addslashes($_SESSION['ACCOUNT_TYPE']) : '';
$logtime = date('Y-m-d H:i:s');

try {
    $sql = "INSERT INTO `tbllogs` (`USERID`, `LOGDATETIME`, `LOGROLE`, `LOGMODE`)
            VALUES ({$userid}, '{$logtime}', '{$role}', 'Logged out')";
    $mydb->setQuery($sql);
    $mydb->executeQuery();
} catch (Exception $e) {
    error_log("logout.php: failed to insert log: " . $e->getMessage());
    // continue anyway — we still want to log the user out
}

// 4) Unset all session variables
$_SESSION = array();

// 5) Remove session cookie (important)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}

// 6) Finally destroy the session
@session_destroy();

// 7) Redirect to login (use your helper if available, otherwise raw header)
$loginUrl = web_root . "admin/login.php?logout=1";
if (function_exists('redirect')) {
    redirect($loginUrl);
} else {
    header("Location: {$loginUrl}");
    exit;
}
?>
