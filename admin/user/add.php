                      <?php 
                       if (!isset($_SESSION['ACCOUNT_ID'])){
                          redirect(web_root."admin/index.php");
                         }

                         // Ensure only Administrator can access this page
if ($_SESSION['ACCOUNT_TYPE'] !== 'Registrar') {
    message("You do not have permission to access this page.", "error");
    redirect("index.php");  // Redirect to a safe page
}


                      // $autonum = New Autonumber();
                      // $res = $autonum->single_autonumber(2);

                       ?> 
 <form class="form-horizontal span6" action="controller.php?action=add" method="POST">

           <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Add New User</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 
                   
                    <!-- <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "user_id">User Id:</label>

                      <div class="col-md-8"> --> 
                        <!--  <input class="form-control input-sm" id="user_id" name="user_id" placeholder=
                            "Account Id" type="hidden" value="<?php echo $res->AUTO; ?>"> -->
                    <!--   </div>
                    </div>
                  </div> -->  
                  <?php
// Load departments for Chairperson assignment
$mydb->setQuery("SELECT DEPT_ID, DEPARTMENT_NAME, DEPARTMENT_DESC FROM department ORDER BY DEPARTMENT_NAME");
$departments = $mydb->loadResultList();

// Load instructors without user accounts (for Instructor role assignment)
$mydb->setQuery("
    SELECT i.INST_ID, i.INST_NAME, i.INST_MAJOR, d.DEPARTMENT_NAME
    FROM tblinstructor i
    LEFT JOIN department d ON i.DEPT_ID = d.DEPT_ID
    LEFT JOIN useraccounts ua ON i.ACCOUNT_ID = ua.ACCOUNT_ID
    WHERE ua.ACCOUNT_ID IS NULL OR i.ACCOUNT_ID IS NULL
    ORDER BY i.INST_NAME
");
$instructors = $mydb->loadResultList();
?>
                  
                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "U_NAME">Name:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="U_NAME" name="U_NAME" placeholder=
                            "Account Name" type="text" value="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "U_USERNAME">Username:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="U_USERNAME" name="U_USERNAME" placeholder=
                            "Username" type="text" value="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "U_PASS">Password:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="U_PASS" name="U_PASS" placeholder=
                            "Account Password" type="Password" value="" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "U_ROLE">Role:</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="U_ROLE" id="U_ROLE" onchange="toggleDepartmentField()">
                          <option value="Registrar">Registrar</option>
                          <option value="Chairperson">Chairperson</option> 
                          <option value="Instructor">Instructor</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <!-- Department Selection (shown only for Chairperson) -->
                  <div class="form-group" id="department_field" style="display:none;">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for="DEPT_ID">Department:</label>

                      <div class="col-md-8">
                        <select class="form-control input-sm" name="DEPT_ID" id="DEPT_ID">
                          <option value="">-- Select Department --</option>
                          <?php if (!empty($departments)): ?>
                            <?php foreach ($departments as $dept): ?>
                              <option value="<?php echo (int)$dept->DEPT_ID; ?>">
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

                  <!-- Instructor Selection (shown only for Instructor) -->
                  <div class="form-group" id="instructor_field" style="display:none;">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for="INST_ID">Instructor:</label>

                      <div class="col-md-8">
                        <select class="form-control input-sm" name="INST_ID" id="INST_ID">
                          <option value="">-- Select Instructor --</option>
                          <?php if (!empty($instructors)): ?>
                            <?php foreach ($instructors as $instructor): ?>
                              <option value="<?php echo (int)$instructor->INST_ID; ?>">
                                <?php echo htmlspecialchars($instructor->INST_NAME, ENT_QUOTES, 'UTF-8'); ?>
                                <?php if ($instructor->DEPARTMENT_NAME): ?>
                                  (<?php echo htmlspecialchars($instructor->DEPARTMENT_NAME, ENT_QUOTES, 'UTF-8'); ?>)
                                <?php endif; ?>
                                <?php if ($instructor->INST_MAJOR): ?>
                                  - <?php echo htmlspecialchars($instructor->INST_MAJOR, ENT_QUOTES, 'UTF-8'); ?>
                                <?php endif; ?>
                              </option>
                            <?php endforeach; ?>
                          <?php else: ?>
                            <option value="" disabled>No instructors without accounts available</option>
                          <?php endif; ?>
                        </select>
                        <small class="text-muted">
                          <i class="fa fa-info-circle"></i> Required for Instructor role. Links the user account to an instructor record.
                        </small>
                      </div>
                    </div>
                  </div>


            
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                       <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button> 
                          <!-- <a href="index.php" class="btn btn-info"><span class="fa fa-arrow-circle-left fw-fa"></span></span>&nbsp;<strong>List of Users</strong></a> -->
                       </div>
                    </div>
                  </div>

               
        <div class="form-group">
                <div class="rows">
                  <div class="col-md-6">
                    <label class="col-md-6 control-label" for=
                    "otherperson"></label>

                    <div class="col-md-6">
                   
                    </div>
                  </div>

                  <div class="col-md-6" align="right">
                   

                   </div>
                  
              </div>
              </div>
          
        </form>

<script>
// Toggle department/instructor field visibility based on selected role
function toggleDepartmentField() {
    const roleSelect = document.getElementById('U_ROLE');
    const deptField = document.getElementById('department_field');
    const deptSelect = document.getElementById('DEPT_ID');
    const instField = document.getElementById('instructor_field');
    const instSelect = document.getElementById('INST_ID');
    
    if (roleSelect.value === 'Chairperson') {
        deptField.style.display = 'block';
        deptSelect.required = true;
        instField.style.display = 'none';
        instSelect.required = false;
        instSelect.value = '';
    } else if (roleSelect.value === 'Instructor') {
        instField.style.display = 'block';
        instSelect.required = true;
        deptField.style.display = 'none';
        deptSelect.required = false;
        deptSelect.value = '';
    } else {
        deptField.style.display = 'none';
        deptSelect.required = false;
        deptSelect.value = '';
        instField.style.display = 'none';
        instSelect.required = false;
        instSelect.value = '';
    }
}

// Run on page load in case editing
document.addEventListener('DOMContentLoaded', function() {
    toggleDepartmentField();
});
</script>
       