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

  @$SUBJ_ID = $_GET['id'];
    if($SUBJ_ID==''){
  redirect("index.php");
}
  $subject = New Subject();
  $res = $subject->single_subject($SUBJ_ID);

?> 

 <form class="form-horizontal span6" action="controller.php?action=edit" method="POST">

      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Update Subject</h1>
          </div>
          <!-- /.col-lg-12 `SUBJ_CODE`, `SUBJ_DESCRIPTION`, `UNIT`, `PRE_REQUISITE`, `COURSE_ID`, `AY`, `SEMESTER`-->
       </div> 
                   
                    <!-- <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "user_id">User Id:</label> -->

                      <!-- <div class="col-md-8"> -->
                        
                         <input class="form-control input-sm" id="SUBJ_ID" name="SUBJ_ID" placeholder=
                            "Account Id" type="Hidden" value="<?php echo $res->SUBJ_ID; ?>">
                   <!--    </div>
                    </div>
                  </div>      -->      
                  
                  
                   
                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "SUBJ_CODE">Subject:</label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="SUBJ_CODE" name="SUBJ_CODE" placeholder=
                            "Subject" type="text" value="<?php echo $res->SUBJ_CODE; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "SUBJ_DESCRIPTION">Description:</label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="SUBJ_DESCRIPTION" name="SUBJ_DESCRIPTION" placeholder=
                            "Description" type="text" value="<?php echo $res->SUBJ_DESCRIPTION; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "UNIT">Unit:</label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="UNIT" name="UNIT" placeholder=
                            "Unit" type="text" value="<?php echo $res->UNIT; ?>" required>
                      </div>
                    </div>
                  </div>

                 <div class="form-group">
                <div class="col-md-8">
                  <label class="col-md-4 control-label" for="PRE_REQUISITE">Pre-Requisite:</label>
                  <div class="col-md-8">
                    <select class="form-control input-sm" id="PRE_REQUISITE" name="PRE_REQUISITE" required>
                      <!-- choose current value as default -->
                      <option value="">Select</option>
                      <option value="None" <?php echo ($res->PRE_REQUISITE === 'None' || $res->PRE_REQUISITE === '' ) ? 'selected' : '';?>>
                        None
                      </option>
                      <?php
                        // Load all subjects to populate the prerequisites list
                        // Use SUBJ_CODE (or SUBJ_ID if you prefer) as the option value.
                        $mydb->setQuery("SELECT SUBJ_ID, SUBJ_CODE, SUBJ_DESCRIPTION FROM subject ORDER BY SUBJ_CODE ASC");
                        $subs = $mydb->loadResultList();
                        foreach ($subs as $s) {
                            $val = htmlspecialchars($s->SUBJ_CODE); // value saved in DB as code
                            $label = htmlspecialchars($s->SUBJ_CODE . ' - ' . $s->SUBJ_DESCRIPTION);
                            $selected = ($res->PRE_REQUISITE == $s->SUBJ_CODE) ? ' selected' : '';
                            echo "<option value=\"{$val}\"{$selected}>{$label}</option>";
                        }
                      ?>
                    </select>
                  </div>
                </div>
              </div>


                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "COURSE_ID">Course:</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="COURSE_ID" id="COURSE_ID"> 
                          <?php 
                            // Show selected course first (with department filtering)
                            $whereClause = "COURSE_ID = " . intval($res->COURSE_ID);
                            if ($_SESSION['ACCOUNT_TYPE'] === 'Chairperson' && isset($_SESSION['DEPT_ID']) && $_SESSION['DEPT_ID'] > 0) {
                                $chairDeptId = intval($_SESSION['DEPT_ID']);
                                $whereClause .= " AND DEPT_ID = {$chairDeptId}";
                            }
                            
                            $mydb->setQuery("SELECT * FROM `course` WHERE {$whereClause}");
                            $cur = $mydb->loadResultList();

                            foreach ($cur as $result) {
                              $courseName = htmlspecialchars($result->COURSE_NAME);
                              $courseLevel = htmlspecialchars($result->COURSE_LEVEL);
                              $courseMajor = htmlspecialchars($result->COURSE_MAJOR);
                              
                              $displayName = $courseName;
                              if ($courseMajor && $courseMajor != 'None' && $courseMajor != '') {
                                $displayName .= ' - ' . $courseMajor;
                              }
                              $displayName .= ' (Level ' . $courseLevel . ')';
                              
                              echo '<option value="' . $result->COURSE_ID . '">' . $displayName . '</option>';
                            }
                          ?>

                          <?php 
                            // Show other courses (with department filtering)
                            $whereClause = "COURSE_ID != " . intval($res->COURSE_ID);
                            if ($_SESSION['ACCOUNT_TYPE'] === 'Chairperson' && isset($_SESSION['DEPT_ID']) && $_SESSION['DEPT_ID'] > 0) {
                                $chairDeptId = intval($_SESSION['DEPT_ID']);
                                $whereClause .= " AND DEPT_ID = {$chairDeptId}";
                            }
                            
                            $mydb->setQuery("SELECT * FROM `course` WHERE {$whereClause} ORDER BY COURSE_NAME, COURSE_MAJOR");
                            $cur = $mydb->loadResultList();

                            foreach ($cur as $result) {
                              $courseName = htmlspecialchars($result->COURSE_NAME);
                              $courseLevel = htmlspecialchars($result->COURSE_LEVEL);
                              $courseMajor = htmlspecialchars($result->COURSE_MAJOR);
                              
                              $displayName = $courseName;
                              if ($courseMajor && $courseMajor != 'None' && $courseMajor != '') {
                                $displayName .= ' - ' . $courseMajor;
                              }
                              $displayName .= ' (Level ' . $courseLevel . ')';
                              
                              echo '<option value="' . $result->COURSE_ID . '">' . $displayName . '</option>';
                            }
                          ?>

                         
                        </select> 
                      </div>
                    </div>
                  </div>
                 <!--  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "AY">Academic Year:</label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="AY" name="AY" placeholder=
                            "Academic Year" type="text" value="<?php echo $res->AY; ?>" required>
                      </div>
                    </div>
                  </div> -->
                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "SEMESTER">Semester:</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="SEMESTER" id="SEMESTER"> 
                        <option value="First"  <?php echo ($res->SEMESTER=='First') ? 'selected="true"': '' ; ?>>First</option>
                         <option value="Second" <?php echo ($res->SEMESTER=='Second') ? 'selected="true"': '' ; ?> >Second</option> 
                         <option value="Summer" <?php echo ($res->SEMESTER=='Summer') ? 'selected="true"': '' ; ?> >Summer</option> 
                        </select> 
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
      

        </div><!--End of container-->