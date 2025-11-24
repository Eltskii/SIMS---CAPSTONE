<?php  
if (!isset($_SESSION['ACCOUNT_ID'])){
    redirect(web_root."admin/index.php");
}

// Ensure the user has appropriate role to access this page
if (!in_array($_SESSION['ACCOUNT_TYPE'], ['Registrar', 'Administrator'], true)) {
    message("You do not have permission to access this page.", "error");
    redirect("index.php");
}

// Validate and sanitize inputs
$SUBJ_ID = isset($_GET['id']) ? intval($_GET['id']) : 0;
$IDNO = isset($_GET['IDNO']) ? intval($_GET['IDNO']) : 0;
$GRADE_ID = isset($_GET['gid']) ? intval($_GET['gid']) : 0;

if ($SUBJ_ID <= 0 || $IDNO <= 0) {
    message("Invalid subject or student ID.", "error");
    redirect("index.php");
}

// Verify subject exists
$subject = New Subject();
$res = $subject->single_subject($SUBJ_ID);
if (!$res) {
    message("Subject not found.", "error");
    redirect("index.php");
}

// Check if grade record exists, if not create blank one
$grades = New Grade();
$resgrades = null;

if ($GRADE_ID > 0) {
    // Try to load existing grade
    $resgrades = $grades->single_grade($GRADE_ID);
}

// If no existing grade record, check database directly or create new
if (!$resgrades) {
    // Check if a grade record already exists for this student+subject
    $mydb->setQuery("SELECT * FROM grades WHERE IDNO = {$IDNO} AND SUBJ_ID = {$SUBJ_ID} LIMIT 1");
    $existingGrade = $mydb->loadSingleResult();
    
    if ($existingGrade) {
        // Found existing record
        $resgrades = $existingGrade;
        $GRADE_ID = $existingGrade->GRADE_ID;
    } else {
        // Create new blank grade record
        $grades->IDNO = $IDNO;
        $grades->SUBJ_ID = $SUBJ_ID;
        $grades->FIRST = 0;
        $grades->SECOND = 0;
        $grades->THIRD = 0;
        $grades->FOURTH = 0;
        $grades->AVE = 0;
        $grades->REMARKS = '';
        $grades->COMMENT = '';
        $grades->SEMS = $res->SEMESTER ?? '';
        
        if ($grades->create()) {
            // Reload the newly created record
            $GRADE_ID = $mydb->insert_id();
            $resgrades = $grades->single_grade($GRADE_ID);
        } else {
            message("Failed to initialize grade record.", "error");
            redirect("index.php");
        }
    }
}

?> 

 <form class="form-horizontal span6" action="controller.php?action=addgrade" method="POST">

      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Add Grade</h1>
          </div>
          <!-- /.col-lg-12 `SUBJ_CODE`, `SUBJ_DESCRIPTION`, `UNIT`, `PRE_REQUISITE`, `COURSE_ID`, `AY`, `SEMESTER`-->
       </div> 
                   
                    <!-- <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "user_id">User Id:</label> -->

                      <!-- <div class="col-md-8"> -->
                       <input class="form-control input-sm" id="IDNO" name="IDNO" placeholder=
                            "Account Id" type="Hidden" value="<?php echo intval($IDNO); ?>">
                        
                         <input class="form-control input-sm" id="SUBJ_ID" name="SUBJ_ID" placeholder=
                            "Account Id" type="Hidden" value="<?php echo intval($res->SUBJ_ID); ?>">

                            <input class="form-control input-sm" id="GRADEID" name="GRADEID" placeholder=
                            "Account Id" type="Hidden" value="<?php echo intval($GRADE_ID); ?>">
                   <!--    </div>
                    </div>
                  </div>      -->      
                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "SUBJ_CODE">Subject:</label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="SUBJ_CODE" name="SUBJ_CODE" readonly="true" type="text" value="<?php echo $res->SUBJ_CODE .'['. $res->SUBJ_DESCRIPTION.']';?>">
                      </div>
                    </div>
                  </div>
                  
                    
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "FIRSTQUARTER">First Quarter:</label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="FIRSTQUARTER" name="FIRSTQUARTER" placeholder=
                            "First Quarter" type="text" value="<?php echo htmlspecialchars($resgrades->FIRST ?? 0); ?>" autocomplete="off"  required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "SECONDQUARTER">Second Quarter:</label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="SECONDQUARTER" name="SECONDQUARTER" placeholder=
                            "Second Quarter" type="text" value="<?php echo htmlspecialchars($resgrades->SECOND ?? 0); ?>" autocomplete="off" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "THIRDQUARTER">Third Quarter:</label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="THIRDQUARTER" name="THIRDQUARTER" placeholder=
                            "Third Quarter" type="text" value="<?php echo htmlspecialchars($resgrades->THIRD ?? 0); ?>" autocomplete="off" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "FOURTHQUARTER">Fourth Quarter:</label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="FOURTHQUARTER" name="FOURTHQUARTER" placeholder=
                            "Fourth Quarter" type="text" value="<?php echo htmlspecialchars($resgrades->FOURTH ?? 0); ?>" autocomplete="off" required>
                      </div>
                    </div>
                  </div>
                   
       
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "AVERAGE">Average:</label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="AVERAGE" name="AVERAGE" placeholder=
                            "0" type="text" value="<?php echo htmlspecialchars($resgrades->AVE ?? 0); ?>" readonly="true" required>
                      </div>
                    </div>
                  </div>
                   
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                       <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button> 
                          <a href="index.php?view=grades&id=<?php echo intval($IDNO); ?>" class="btn btn-info"><span class="fa fa-arrow-circle-left fw-fa"></span></span>&nbsp;<strong>Back</strong></a>
                       </div>
                    </div>
                  </div>

          
        </form>
      

        </div><!--End of container-->