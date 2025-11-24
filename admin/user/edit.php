<?php  
if (!isset($_SESSION['ACCOUNT_ID'])){
    redirect(web_root."admin/index.php");
}

@$USERID = $_GET['id'];
if($USERID==''){
    redirect("index.php");
}

$user = New User();
$singleuser = $user->single_user($USERID);

// Load departments for Chairperson assignment
$mydb->setQuery("SELECT DEPT_ID, DEPARTMENT_NAME, DEPARTMENT_DESC FROM department ORDER BY DEPARTMENT_NAME");
$departments = $mydb->loadResultList();

// Security check: Users can only edit their own account unless they're Registrars
if ($_SESSION['ACCOUNT_TYPE'] !== 'Registrar' && $_SESSION['ACCOUNT_ID'] != $USERID) {
    message("You can only edit your own account.", "error");
    redirect("index.php");
}

// Check if user is editing themselves (for UI adjustments)
$isOwnProfile = ($_SESSION['ACCOUNT_ID'] == $USERID);

?> 

<form class="form-horizontal span6" action="controller.php?action=edit" method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend>Update User Account</legend>
        
        <input class="form-control input-sm" id="USERID" name="USERID" type="Hidden" value="<?php echo $singleuser->ACCOUNT_ID; ?>">
                  
        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="U_NAME">Name:</label>
                <div class="col-md-8">
                    <input name="deptid" type="hidden" value="">
                    <input class="form-control input-sm" id="U_NAME" name="U_NAME" placeholder="Account Name" type="text" value="<?php echo $singleuser->ACCOUNT_NAME; ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="U_USERNAME">Username:</label>
                <div class="col-md-8">
                    <input name="deptid" type="hidden" value="">
                    <input class="form-control input-sm" id="U_USERNAME" name="U_USERNAME" placeholder="Username" type="text" value="<?php echo $singleuser->ACCOUNT_USERNAME; ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="U_PASS">Password:</label>
                <div class="col-md-8">
                    <input name="deptid" type="hidden" value="">
                    <input class="form-control input-sm" id="U_PASS" name="U_PASS" placeholder="Account Password" type="Password" value="">
                    <small class="text-muted">Leave blank to keep current password</small>
                </div>
            </div>
        </div>

        <!-- Profile Photo Upload -->
        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="image">Profile Photo:</label>
                <div class="col-md-8">
                    <?php if (isset($singleuser->USERIMAGE) && $singleuser->USERIMAGE != ''): ?>
                        <div style="margin-bottom: 10px;">
                            <img src="<?php echo web_root . 'admin/user/' . $singleuser->USERIMAGE; ?>" 
                                 width="100" height="100" 
                                 style="border-radius: 50%; object-fit: cover; border: 2px solid #ddd;" 
                                 alt="Current Photo">
                        </div>
                    <?php endif; ?>
                    <input name="image" type="file" class="form-control input-sm" accept="image/*">
                    <small class="text-muted">Upload JPG, PNG or GIF (max 2MB). Leave blank to keep current photo.</small>
                </div>
            </div>
        </div>

        <!-- Role Selection - Only visible to Administrators -->
        <?php if ($_SESSION['ACCOUNT_TYPE'] == 'Registrar'): ?>
            <div class="form-group">
                <div class="col-md-8">
                    <label class="col-md-4 control-label" for="U_ROLE">Role:</label>
                    <div class="col-md-8">
                        <select class="form-control input-sm" name="U_ROLE" id="U_ROLE" onchange="toggleDepartmentField()">
                            <option value="Registrar" <?php echo ($singleuser->ACCOUNT_TYPE=='Registrar') ? 'selected="true"': '' ; ?>>Registrar</option>
                            <option value="Chairperson" <?php echo ($singleuser->ACCOUNT_TYPE=='Chairperson') ? 'selected="true"': '' ; ?>>Chairperson</option>
                            <option value="Instructor" <?php echo ($singleuser->ACCOUNT_TYPE=='Instructor') ? 'selected="true"': '' ; ?>>Instructor</option>
                        </select>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <!-- Display role as read-only for non-administrators -->
            <div class="form-group">
                <div class="col-md-8">
                    <label class="col-md-4 control-label" for="U_ROLE">Role:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control input-sm" value="<?php echo $singleuser->ACCOUNT_TYPE; ?>" readonly>
                        <input type="hidden" name="U_ROLE" value="<?php echo $singleuser->ACCOUNT_TYPE; ?>">
                        <small class="text-muted">Role can only be changed by Administrator</small>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Department Selection (shown only for Chairperson) -->
        <?php if ($_SESSION['ACCOUNT_TYPE'] == 'Registrar'): ?>
            <div class="form-group" id="department_field" style="<?php echo ($singleuser->ACCOUNT_TYPE == 'Chairperson') ? '' : 'display:none;'; ?>">
                <div class="col-md-8">
                    <label class="col-md-4 control-label" for="DEPT_ID">Department:</label>
                    <div class="col-md-8">
                        <select class="form-control input-sm" name="DEPT_ID" id="DEPT_ID">
                            <option value="">-- Select Department --</option>
                            <?php if (!empty($departments)): ?>
                                <?php foreach ($departments as $dept): ?>
                                    <option value="<?php echo (int)$dept->DEPT_ID; ?>" 
                                        <?php echo (isset($singleuser->DEPT_ID) && $singleuser->DEPT_ID == $dept->DEPT_ID) ? 'selected="selected"' : ''; ?>>
                                        <?php echo htmlspecialchars($dept->DEPARTMENT_NAME, ENT_QUOTES, 'UTF-8'); ?>
                                        <?php if ($dept->DEPARTMENT_DESC): ?>
                                            - <?php echo htmlspecialchars($dept->DEPARTMENT_DESC, ENT_QUOTES, 'UTF-8'); ?>
                                        <?php endif; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <small class="text-muted">
                            <i class="fa fa-info-circle"></i> Required for Chairperson role. Chairpersons can only manage their assigned department.
                        </small>
                    </div>
                </div>
            </div>
        <?php elseif ($singleuser->ACCOUNT_TYPE == 'Chairperson' && isset($singleuser->DEPT_ID)): ?>
            <!-- Read-only department display for non-administrators -->
            <?php 
            $mydb->setQuery("SELECT DEPARTMENT_NAME FROM department WHERE DEPT_ID = {$singleuser->DEPT_ID}");
            $deptName = $mydb->loadSingleResult();
            ?>
            <div class="form-group">
                <div class="col-md-8">
                    <label class="col-md-4 control-label" for="DEPT_DISPLAY">Department:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control input-sm" value="<?php echo $deptName ? htmlspecialchars($deptName->DEPARTMENT_NAME) : 'Not Assigned'; ?>" readonly>
                        <input type="hidden" name="DEPT_ID" value="<?php echo $singleuser->DEPT_ID; ?>">
                        <small class="text-muted">Department can only be changed by Administrator</small>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="idno"></label>
                <div class="col-md-8">
                    <button class="btn btn-primary" name="save" type="submit">
                        <span class="fa fa-save fw-fa"></span> Save
                    </button>
                    <a href="index.php" class="btn btn-default">
                        <span class="fa fa-arrow-circle-left fw-fa"></span> Cancel
                    </a>
                </div>
            </div>
        </div>
    </fieldset>
</form>

<script>
// Toggle department field visibility based on selected role
function toggleDepartmentField() {
    const roleSelect = document.getElementById('U_ROLE');
    const deptField = document.getElementById('department_field');
    const deptSelect = document.getElementById('DEPT_ID');
    
    if (roleSelect && deptField && deptSelect) {
        if (roleSelect.value === 'Chairperson') {
            deptField.style.display = 'block';
            deptSelect.required = true;
        } else {
            deptField.style.display = 'none';
            deptSelect.required = false;
            if (roleSelect.value !== 'Chairperson') {
                deptSelect.value = ''; // Clear selection when changing from Chairperson
            }
        }
    }
}

// Run on page load
document.addEventListener('DOMContentLoaded', function() {
    toggleDepartmentField();
});
</script>
