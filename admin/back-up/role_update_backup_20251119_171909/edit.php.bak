<?php  
     if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."admin/index.php");
     }

  @$INST_ID = $_GET['id'];
    if($INST_ID==''){
  redirect("index.php");
}
 

  $subject = New Instructor();
  $inst = $subject->single_instructor($INST_ID);

?> 

 <form class="form-horizontal span6" action="controller.php?action=edit" method="POST">

    
           <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Edit Instructor</h1>
          </div>
        </div> 
                   
                  <!--   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "INST_ID">ID:</label>

                      <div class="col-md-8"> -->
                        
                         <input class="form-control input-sm" id="INST_ID" name="INST_ID" placeholder=
                            "Instructor Full Name" type="hidden" value="<?php echo $inst->INST_ID ; ?>">
                     <!--  </div>
                    </div>
                  </div> -->
                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "INST_NAME">Name:</label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="INST_NAME" name="INST_NAME" placeholder=
                            "Instructor Full Name" type="text" value="<?php echo $inst->INST_NAME ; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "INST_MAJOR">Major:</label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="INST_MAJOR" name="INST_MAJOR" placeholder=
                            "Major" type="text" value="<?php echo $inst->INST_MAJOR ; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "INST_CONTACT">Contact No.:</label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="INST_CONTACT" name="INST_CONTACT" placeholder=
                            "Contact Number" type="text" value="<?php echo $inst->INST_CONTACT ; ?>" required>
                      </div>
                    </div>
                  </div>

                  <!-- Department -->
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for="DEPT_ID">Department:</label>
                      <div class="col-md-8">
                        <?php if (isChairperson()): ?>
                            <!-- Chairperson: Department is locked -->
                            <?php 
                                $mydb->setQuery("SELECT DEPARTMENT_NAME FROM department WHERE DEPT_ID = " . intval($inst->DEPT_ID));
                                $deptName = $mydb->loadSingleResult();
                            ?>
                            <input type="text" class="form-control input-sm" value="<?php echo htmlspecialchars($deptName->DEPARTMENT_NAME ?? 'Unknown'); ?>" readonly style="background-color: #f5f5f5;">
                            <input type="hidden" name="DEPT_ID" value="<?php echo intval($inst->DEPT_ID); ?>">
                            <small class="text-muted">Department cannot be changed</small>
                        <?php else: ?>
                            <!-- Administrator: Can change department -->
                            <select class="form-control input-sm" name="DEPT_ID" id="DEPT_ID" required>
                                <option value="">Select Department</option>
                                <?php 
                                    $mydb->setQuery("SELECT * FROM `department` ORDER BY DEPARTMENT_NAME");
                                    $depts = $mydb->loadResultList();
                                    foreach ($depts as $dept) {
                                        $selected = ($inst->DEPT_ID == $dept->DEPT_ID) ? 'selected' : '';
                                        echo '<option value="'.intval($dept->DEPT_ID).'" '.$selected.'>'.htmlspecialchars($dept->DEPARTMENT_NAME).' ['.htmlspecialchars($dept->DEPARTMENT_DESC).']</option>';
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
      

     