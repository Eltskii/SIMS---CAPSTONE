<?php
// include/session.php
// Start session only when none active to avoid "session_start() ignoring" notices
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ------------------------
// Session helper functions
// ------------------------

// returns true if admin/account logged in
function logged_in() {
    return isset($_SESSION['ACCOUNT_ID']);
}

// redirect to login if not logged in (original behavior preserved)
function confirm_logged_in() {
    if (!logged_in()) { ?>
        <script type="text/javascript">
            window.location = "login.php";
        </script>
    <?php
    }
}

// admin-specific confirm (keeps original behavior)
function admin_confirm_logged_in() {
    if (!isset($_SESSION['ACCOUNT_ID']) || empty($_SESSION['ACCOUNT_ID'])) { ?>
        <script type="text/javascript">
            window.location = "login.php";
        </script>
    <?php
    }
}

// student session helpers
function studlogged_in() {
    return isset($_SESSION['CUSID']);
}

function studconfirm_logged_in() {
    if (!studlogged_in()) { ?>
        <script type="text/javascript">
            window.location = "index.php";
        </script>
    <?php
    }
}

// message helper: sets or returns message
function message($msg = "", $msgtype = "") {
    if (!empty($msg)) {
        $_SESSION['message'] = $msg;
        $_SESSION['msgtype'] = $msgtype;
    } else {
        // original code returned $message variable which was undefined;
        // keep compatibility by returning null when getting.
        return null;
    }
}

function check_message() {
    if (isset($_SESSION['message'])) {
        if (isset($_SESSION['msgtype'])) {
            if ($_SESSION['msgtype'] == "info") {
                echo '<div class="alert alert-info">' . $_SESSION['message'] . '</div>';
            } elseif ($_SESSION['msgtype'] == "error") {
                echo '<div class="alert alert-danger">' . $_SESSION['message'] . '</div>';
            } elseif ($_SESSION['msgtype'] == "success") {
                echo '<div class="alert alert-success">' . $_SESSION['message'] . '</div>';
            }
            unset($_SESSION['message']);
            unset($_SESSION['msgtype']);
        } else {
            // if msgtype not set, just echo message and clear it
            echo '<div class="alert alert-info">' . $_SESSION['message'] . '</div>';
            unset($_SESSION['message']);
        }
    }
}

function cusmsg($num = 0) {
    if (!empty($num)) {
        $_SESSION['gcNotify'] = $num;
    } else {
        return null;
    }
}

function notifycheck() {
    if (isset($_SESSION['gcNotify'])) {
        echo $_SESSION['gcNotify'];
    } else {
        echo 0;
    }
    unset($_SESSION['gcNotify']);
}

function keyactive($key = "") {
    if (!empty($key)) {
        $_SESSION['active'] = $key;
    } else {
        return null;
    }
}

function check_active() {
    if (isset($_SESSION['active'])) {
        switch ($_SESSION['active']) {
            case 'basicInfo':
                $_SESSION['basicInfo'] = "active";
                break;
            case 'otherInfo':
                $_SESSION['otherInfo'] = 'active';
                break;
            case 'work':
                $_SESSION['work'] = 'active';
                break;
            default:
                // do nothing
                break;
        }
    } else {
        $active = (isset($_GET['active']) && $_GET['active'] != '') ? $_GET['active'] : '';
        switch ($active) {
            case 'otherInfo':
                $_SESSION['otherInfo'] = 'active';
                break;
            case 'work':
                $_SESSION['work'] = 'active';
                break;
            default:
                $_SESSION['basicInfo'] = "active";
                break;
        }
    }
}

// cart and subject helper functions (kept behavior; small defensive guards)
// NOTE: many of these functions assume arrays exist; we ensure arrays before use

function subject_exist($subjid) {
    $subjid = intval($subjid);
    if (!isset($_SESSION['gvCart']) || !is_array($_SESSION['gvCart'])) return 0;
    $max = count($_SESSION['gvCart']);
    $flag = 0;
    for ($i = 0; $i < $max; $i++) {
        if ($subjid == $_SESSION['gvCart'][$i]['subjectid']) {
            $flag = 1;
            message("Item is already in the cart.", "error");
            break;
        }
    }
    return $flag;
}

function addtocart($subjid) {
    $subjid = intval($subjid);
    if ($subjid < 1) return;
    if (!isset($_SESSION['gvCart']) || !is_array($_SESSION['gvCart'])) {
        $_SESSION['gvCart'] = array();
    }
    if (subject_exist($subjid)) return;
    $_SESSION['gvCart'][] = array('subjectid' => $subjid);
    message("1 Item added in the cart.", "success");
}

function removetocart($subjid) {
    $subjid = intval($subjid);
    if (!isset($_SESSION['gvCart']) || !is_array($_SESSION['gvCart'])) return;
    $max = count($_SESSION['gvCart']);
    for ($i = 0; $i < $max; $i++) {
        if ($subjid == $_SESSION['gvCart'][$i]['subjectid']) {
            unset($_SESSION['gvCart'][$i]);
            break;
        }
    }
    $_SESSION['gvCart'] = array_values($_SESSION['gvCart']);
}

function adminsubject_exist($subjid) {
    $subjid = intval($subjid);
    if (!isset($_SESSION['admingvCart']) || !is_array($_SESSION['admingvCart'])) return 0;
    $max = count($_SESSION['admingvCart']);
    $flag = 0;
    for ($i = 0; $i < $max; $i++) {
        if ($subjid == $_SESSION['admingvCart'][$i]['subjectid']) {
            $flag = 1;
            message("subject is already in the subject to be enrolled.", "error");
            break;
        }
    }
    return $flag;
}

function adminaddtocart($subjid) {
    $subjid = intval($subjid);
    if ($subjid < 1) return;
    if (!isset($_SESSION['admingvCart']) || !is_array($_SESSION['admingvCart'])) {
        $_SESSION['admingvCart'] = array();
    }
    if (adminsubject_exist($subjid)) return;
    $_SESSION['admingvCart'][] = array('subjectid' => $subjid);
    message("1 subject added in the subject to be enrolled.", "success");
}

function adminremovetocart($subjid) {
    $subjid = intval($subjid);
    if (!isset($_SESSION['admingvCart']) || !is_array($_SESSION['admingvCart'])) return;
    $max = count($_SESSION['admingvCart']);
    for ($i = 0; $i < $max; $i++) {
        if ($subjid == $_SESSION['admingvCart'][$i]['subjectid']) {
            unset($_SESSION['admingvCart'][$i]);
            break;
        }
    }
    $_SESSION['admingvCart'] = array_values($_SESSION['admingvCart']);
}

// header_subheader (keeps original behavior but fixed minor bugs)
function header_subheader($header, $subheader) {
    $setheader = (isset($header) && $header != '') ? $header : '';
    switch ($setheader) {
        case 'product':
            echo "Products" . (isset($subheader) ? '  |  ' . $subheader : '');
            break;
        case 'cart':
            echo "Cart List";
            break;
        case 'profile':
            echo "Profile";
            break;
        case 'orderdetails':
            echo "Cart List/Order Details";
            break;
        case 'billing':
            echo "Cart List/Order Details/Billing Details";
            break;
        case 'contact':
            echo "Contact Us";
            break;
        default:
            echo "Home";
            break;
    }
}
?>
