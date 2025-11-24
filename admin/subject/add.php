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
            <h1 class="page-header">Add New Subject</h1>
          </div>
          <!-- /.col-lg-12 `SUBJ_CODE`, `SUBJ_DESCRIPTION`, `UNIT`, `PRE_REQUISITE`, `COURSE_ID`, `AY`, `SEMESTER`-->
       </div> 
                   
                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "SUBJ_CODE">Subject:</label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="SUBJ_CODE" name="SUBJ_CODE" placeholder=
                            "Subject" type="text" value="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "SUBJ_DESCRIPTION">Description:</label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="SUBJ_DESCRIPTION" name="SUBJ_DESCRIPTION" placeholder=
                            "Description" type="text" value="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "UNIT">Unit:</label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="UNIT" name="UNIT" placeholder=
                            "Unit" type="text" value="" required>
                      </div>
                    </div>
                  </div>

                    <div class="form-group">
                <div class="col-md-8">
                  <label class="col-md-4 control-label" for="PRE_REQUISITE">Pre-Requisite:</label>
                  <div class="col-md-8">
                    <select class="form-control input-sm" id="PRE_REQUISITE" name="PRE_REQUISITE">
                      <option value="">Select</option>
                      <option value="None">None</option>
                      <?php
                        // list existing subjects (use SUBJ_CODE for value, adjust if your DB uses SUBJ_ID)
                        $mydb->setQuery("SELECT SUBJ_ID, SUBJ_CODE, SUBJ_DESCRIPTION FROM subject ORDER BY SUBJ_CODE ASC");
                        $subs = $mydb->loadResultList();
                        foreach ($subs as $s) {
                            // store SUBJ_CODE or SUBJ_ID depending on how you represent prereqs
                            echo '<option value="'.htmlspecialchars($s->SUBJ_CODE).'">'
                                  .htmlspecialchars($s->SUBJ_CODE . ' - ' . $s->SUBJ_DESCRIPTION)
                                  .'</option>';
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
                    <option value="none">Select</option>
                    <?php
                      // Filter courses by department for Chairpersons
                      $sql = "SELECT COURSE_ID, COURSE_NAME, COURSE_LEVEL, COURSE_MAJOR
                              FROM course";
                      
                      // Add department filter for Chairpersons
                      if ($_SESSION['ACCOUNT_TYPE'] === 'Chairperson' && isset($_SESSION['DEPT_ID']) && $_SESSION['DEPT_ID'] > 0) {
                          $chairDeptId = intval($_SESSION['DEPT_ID']);
                          $sql .= " WHERE DEPT_ID = {$chairDeptId}";
                      }
                      
                      $sql .= " ORDER BY COURSE_NAME, COURSE_MAJOR, COURSE_LEVEL";
                      
                      $mydb->setQuery($sql);
                      $cur = $mydb->loadResultList();
                      foreach ($cur as $result) {
                          $id = intval($result->COURSE_ID);
                          $name = htmlspecialchars($result->COURSE_NAME);
                          $level = htmlspecialchars($result->COURSE_LEVEL);
                          $major = htmlspecialchars($result->COURSE_MAJOR);
                          
                          // Build display name
                          $displayName = $name;
                          if ($major && $major != 'None' && $major != '') {
                              $displayName .= ' - ' . $major;
                          }
                          $displayName .= ' (Level ' . $level . ')';
                          
                          echo "<option value=\"{$id}\">{$displayName}</option>";
                      }
                    ?>   
                        </select> 
                      </div>
                    </div>
                  </div>
                <!--   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "AY">Academic Year:</label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="AY" name="AY" placeholder=
                            "Academic Year" type="text" value="" required>
                      </div>
                    </div>
                  </div> -->
                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "SEMESTER">Semester:</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="SEMESTER" id="SEMESTER">
                        <option value="First" >First</option>
                         <option value="Second" >Second</option> 

                       <option value="Summer" >Summer</option>
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

        <!--js script  -->
        <script>
function setNone() {
  document.getElementById('PRE_REQUISITE').value = 'None';
}
</script>
       