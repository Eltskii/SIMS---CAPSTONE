                      <?php 
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

                      // $autonum = New Autonumber();
                      // $res = $autonum->single_autonumber(2);

                       ?> 
 <form class="form-horizontal span6" action="controller.php?action=add" method="POST">

           <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Add New Instructor</h1>
          </div>
        </div> 
                   
                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "INST_NAME">Name:</label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="INST_NAME" name="INST_NAME" placeholder=
                            "Instructor Full Name" type="text" value="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "INS_MAJOR">Major:</label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="INST_MAJOR" name="INST_MAJOR" placeholder=
                            "Major" type="text" value="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "INST_CONTACT">Contact No.:</label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="INST_CONTACT" name="INST_CONTACT" placeholder=
                            "Contact Number" type="text" value="" required>
                      </div>
                    </div>
                  </div>

                  <!-- Department -->
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for="DEPT_ID">Department:</label>
                      <div class="col-md-8">
                        <?php if (isChairperson()): ?>
                            <!-- Chairperson: Auto-filled with their department -->
                            <input type="text" class="form-control input-sm" value="<?php echo htmlspecialchars(getCurrentDepartmentName()); ?>" readonly style="background-color: #f5f5f5;">
                            <input type="hidden" name="DEPT_ID" value="<?php echo intval(getCurrentDepartmentId()); ?>">
                            <small class="text-muted">Instructors are added to your department</small>
                        <?php else: ?>
                            <!-- Administrator: Can select any department -->
                            <select class="form-control input-sm" name="DEPT_ID" id="DEPT_ID" required>
                                <option value="">Select Department</option>
                                <?php 
                                    $mydb->setQuery("SELECT * FROM `department` ORDER BY DEPARTMENT_NAME");
                                    $depts = $mydb->loadResultList();
                                    foreach ($depts as $dept) {
                                        echo '<option value="'.intval($dept->DEPT_ID).'">'.htmlspecialchars($dept->DEPARTMENT_NAME).' ['.htmlspecialchars($dept->DEPARTMENT_DESC).']</option>';
                                    }
                                ?>
                            </select>
                        <?php endif; ?>
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

    
          
        </form>
       