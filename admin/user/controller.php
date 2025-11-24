<?php
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   
require_once ("../../include/initialize.php");
if (!isset($_SESSION['ACCOUNT_ID'])){
    redirect(web_root."admin/index.php");
}

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

// For add and delete actions, require Registrar role
if (in_array($action, ['add', 'delete']) && $_SESSION['ACCOUNT_TYPE'] !== 'Registrar') {
    message("Only administrators can manage user accounts.", "error");
    redirect(web_root."admin/index.php");
}

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

    if(isset($_POST['save'])){
        if ($_POST['U_NAME'] == "" OR $_POST['U_USERNAME'] == "" OR $_POST['U_PASS'] == "") {
            $messageStats = false;
            message("All field is required!","error");
            redirect('index.php?view=add');
        } else {	
            $sql = "SELECT * FROM useraccounts WHERE ACCOUNT_USERNAME='" .$_POST['U_USERNAME']."'";
            $res = mysqli_query($mydb->conn,$sql) or die(mysqli_error($mydb->conn));
            $userresult = mysqli_fetch_assoc($res);

            if ($userresult) {
                message("Username is already taken.", "error");
                redirect('index.php?view=add');
            } else {
                $user = New User();
                $user->ACCOUNT_NAME = $_POST['U_NAME'];
                $user->ACCOUNT_USERNAME = $_POST['U_USERNAME'];
                $user->ACCOUNT_PASSWORD = sha1($_POST['U_PASS']);
                $user->ACCOUNT_TYPE = $_POST['U_ROLE'];

                // Set DEPT_ID for Chairperson role
                if ($_POST['U_ROLE'] === 'Chairperson') {
                    if (isset($_POST['DEPT_ID']) && !empty($_POST['DEPT_ID'])) {
                        $user->DEPT_ID = (int)$_POST['DEPT_ID'];
                    } else {
                        message("Department is required for Chairperson role.", "error");
                        redirect('index.php?view=add');
                        return;
                    }
                } else {
                    $user->DEPT_ID = NULL;
                }
                
                $user->create();
                $newAccountId = $mydb->insert_id();

                // Link instructor to user account if Instructor role
                if ($_POST['U_ROLE'] === 'Instructor') {
                    if (isset($_POST['INST_ID']) && !empty($_POST['INST_ID'])) {
                        $instId = (int)$_POST['INST_ID'];
                        // Update instructor record with the new account ID
                        $mydb->setQuery("UPDATE tblinstructor SET ACCOUNT_ID = {$newAccountId} WHERE INST_ID = {$instId}");
                        $mydb->executeQuery();
                    } else {
                        message("Instructor selection is required for Instructor role.", "warning");
                    }
                }

                message("New [". $_POST['U_NAME'] ."] created successfully!", "success");
                redirect("index.php");
            } 
        }
    }
}

function doEdit(){
    global $mydb;

    if(isset($_POST['save'])){
        $userID = $_POST['USERID'];
        
        // SECURITY CHECK: Users can only edit their own account unless they're Administrators
        if ($_SESSION['ACCOUNT_TYPE'] !== 'Registrar' && $_SESSION['ACCOUNT_ID'] != $userID) {
            message("You can only edit your own account.", "error");
            redirect("index.php");
            return;
        }

        // Get the original user data to preserve role for non-admins
        $originalUser = new User();
        $originalUserData = $originalUser->single_user($userID);
        
        if (!$originalUserData) {
            message("User not found.", "error");
            redirect("index.php");
            return;
        }

        $user = New User(); 
        $user->ACCOUNT_NAME = $_POST['U_NAME'];
        $user->ACCOUNT_USERNAME = $_POST['U_USERNAME'];
        
        // Only update password if provided (not empty), otherwise keep original
        if (!empty($_POST['U_PASS'])) {
            $user->ACCOUNT_PASSWORD = sha1($_POST['U_PASS']);
        } else {
            $user->ACCOUNT_PASSWORD = $originalUserData->ACCOUNT_PASSWORD;
        }
        
        // Only Administrators can change account types and departments
        if ($_SESSION['ACCOUNT_TYPE'] === 'Registrar') {
            $user->ACCOUNT_TYPE = $_POST['U_ROLE'];
            
            // Handle DEPT_ID for Chairperson role
            if ($_POST['U_ROLE'] === 'Chairperson') {
                if (isset($_POST['DEPT_ID']) && !empty($_POST['DEPT_ID'])) {
                    $user->DEPT_ID = (int)$_POST['DEPT_ID'];
                } else {
                    message("Department is required for Chairperson role.", "error");
                    redirect("index.php?view=edit&id={$userID}");
                    return;
                }
            } else {
                $user->DEPT_ID = NULL; // Clear department for non-Chairperson roles
            }
        } else {
            // Non-administrators keep their original role (don't update ACCOUNT_TYPE or DEPT_ID)
            $user->ACCOUNT_TYPE = $originalUserData->ACCOUNT_TYPE;
            // Don't set DEPT_ID at all - let it remain unset so it won't be included in the UPDATE
            if (isset($originalUserData->DEPT_ID) && $originalUserData->DEPT_ID) {
                $user->DEPT_ID = $originalUserData->DEPT_ID;
            }
        }
        
        // Handle photo upload if provided
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $maxSize = 2 * 1024 * 1024; // 2MB
            
            if (!in_array($_FILES['image']['type'], $allowedTypes)) {
                message("Please upload a valid image file (JPG, PNG, or GIF).", "error");
                redirect("index.php?view=edit&id={$userID}");
                return;
            }
            
            if ($_FILES['image']['size'] > $maxSize) {
                message("Image file is too large. Maximum size is 2MB.", "error");
                redirect("index.php?view=edit&id={$userID}");
                return;
            }
            
            // Generate unique filename
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $newFilename = 'user_' . $userID . '_' . time() . '.' . $extension;
            $uploadDir = __DIR__ . '/photos/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $uploadPath = $uploadDir . $newFilename;
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                // Delete old photo if it exists and is not the default
                if (isset($originalUserData->USERIMAGE) && $originalUserData->USERIMAGE != '' && !in_array($originalUserData->USERIMAGE, ['default-avatar.jpg', ''])) {
                    // Check both photos/ subdirectory and main directory
                    $oldPhotoPath1 = __DIR__ . '/photos/' . basename($originalUserData->USERIMAGE);
                    $oldPhotoPath2 = __DIR__ . '/' . basename($originalUserData->USERIMAGE);
                    if (file_exists($oldPhotoPath1)) {
                        @unlink($oldPhotoPath1);
                    } elseif (file_exists($oldPhotoPath2)) {
                        @unlink($oldPhotoPath2);
                    }
                }
                $user->USERIMAGE = 'photos/' . $newFilename;
            } else {
                message("Failed to upload image.", "error");
                redirect("index.php?view=edit&id={$userID}");
                return;
            }
        }
        
        // Update the user
        $user->update($userID);

        message("[". $_POST['U_NAME'] ."] has been updated!", "success");
        
        // Redirect appropriately based on user type
        if ($_SESSION['ACCOUNT_TYPE'] === 'Registrar') {
            redirect("index.php");
        } else {
            // For non-admins editing their own profile, redirect to dashboard
            redirect(web_root."admin/index.php");
        }
    }
}

function doDelete(){
    global $mydb;

    // Only allow Administrators to delete users
    if ($_SESSION['ACCOUNT_TYPE'] !== 'Registrar') {
        message("Only Administrators can delete users.", "error");
        redirect('index.php');
        return;
    }

    $id = $_GET['id'];

    // Prevent users from deleting their own account
    if ($_SESSION['ACCOUNT_ID'] == $id) {
        message("You cannot delete your own account.", "error");
        redirect('index.php');
        return;
    }

    $user = New User();
    $user->delete($id);

    message("User already Deleted!","info");
    redirect('index.php');
}

function doupdateimage(){
    global $mydb;

    // Get user ID from GET or POST
    $userID = isset($_GET['id']) ? intval($_GET['id']) : (isset($_POST['id']) ? intval($_POST['id']) : null);
    
    if (!$userID) {
        message("Invalid user ID.", "error");
        redirect("index.php");
        return;
    }

    // Security check
    if ($_SESSION['ACCOUNT_TYPE'] !== 'Registrar' && $_SESSION['ACCOUNT_ID'] != $userID) {
        message("You can only update your own profile picture.", "error");
        redirect("index.php");
        return;
    }

    if (!isset($_FILES['photo']) || $_FILES['photo']['error'] > 0) {
        message("No Image Selected!", "error");
        redirect("index.php?view=edit&id=". $userID);
        return;
    }

    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $maxSize = 2 * 1024 * 1024; // 2MB
    
    // Validate file type
    if (!in_array($_FILES['photo']['type'], $allowedTypes)) {
        message("Please upload a valid image file (JPG, PNG, or GIF).", "error");
        redirect("index.php?view=edit&id=". $userID);
        return;
    }
    
    // Validate file size
    if ($_FILES['photo']['size'] > $maxSize) {
        message("Image file is too large. Maximum size is 2MB.", "error");
        redirect("index.php?view=edit&id=". $userID);
        return;
    }
    
    // Validate it's actually an image
    $image_size = getimagesize($_FILES['photo']['tmp_name']);
    if ($image_size === FALSE) {
        message("Uploaded file is not a valid image!", "error");
        redirect("index.php?view=edit&id=". $userID);
        return;
    }

    // Generate unique filename
    $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
    $newFilename = 'user_' . $userID . '_' . time() . '.' . $extension;
    $uploadDir = __DIR__ . '/photos/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $uploadPath = $uploadDir . $newFilename;
    
    // Upload file
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadPath)) {
        // Get original user data to delete old photo
        $originalUser = new User();
        $originalUserData = $originalUser->single_user($userID);
        
        // Delete old photo if it exists and is not default
        if ($originalUserData && isset($originalUserData->USERIMAGE) && $originalUserData->USERIMAGE != '' && !in_array($originalUserData->USERIMAGE, ['default-avatar.jpg', ''])) {
            // Check both photos/ subdirectory and main directory
            $oldPhotoPath1 = __DIR__ . '/photos/' . basename($originalUserData->USERIMAGE);
            $oldPhotoPath2 = __DIR__ . '/' . basename($originalUserData->USERIMAGE);
            if (file_exists($oldPhotoPath1)) {
                @unlink($oldPhotoPath1);
            } elseif (file_exists($oldPhotoPath2)) {
                @unlink($oldPhotoPath2);
            }
        }
        
        // Update user record with new photo
        $user = New User();
        $user->ACCOUNT_NAME = $originalUserData->ACCOUNT_NAME;
        $user->ACCOUNT_USERNAME = $originalUserData->ACCOUNT_USERNAME;
        $user->ACCOUNT_PASSWORD = $originalUserData->ACCOUNT_PASSWORD;
        $user->ACCOUNT_TYPE = $originalUserData->ACCOUNT_TYPE;
        if (isset($originalUserData->DEPT_ID)) {
            $user->DEPT_ID = $originalUserData->DEPT_ID;
        }
        $user->USERIMAGE = 'photos/' . $newFilename;
        
        $user->update($userID);
        
        message("Profile photo updated successfully!", "success");
        
        // Redirect based on role
        if ($_SESSION['ACCOUNT_TYPE'] === 'Registrar') {
            redirect("index.php");
        } else {
            redirect(web_root."admin/index.php");
        }
    } else {
        message("Failed to upload image.", "error");
        redirect("index.php?view=edit&id=". $userID);
    }
}
?>
