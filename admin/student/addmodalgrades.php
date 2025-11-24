<?php  
require_once("../../include/initialize.php");
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
<table>
    <tr>
       <td width="87%" align="center">
         <h3>Add Grades 
        </h3>
        </td>
    </tr>
</table>
 <form class="form-horizontal span6 ekko-lightbox-container" action="<?php echo web_root.'admin/student/'; ?>controller.php?action=addgrade" method="POST">
 
      
                    
<input class="form-control input-sm" id="IDNO" name="IDNO" placeholder=
"Account Id" type="Hidden" value="<?php echo intval($IDNO); ?>">

<input class="form-control input-sm" id="SUBJ_ID" name="SUBJ_ID" placeholder=
"Account Id" type="Hidden" value="<?php echo intval($res->SUBJ_ID); ?>">

<input class="form-control input-sm" id="GRADEID" name="GRADEID" placeholder=
"Account Id" type="Hidden" value="<?php echo intval($GRADE_ID); ?>">
                 
       <div class="form-group">
        <div class="col-md-12">
          <label class="col-md-4 control-label" for=
          "SUBJ_CODE">Subject:</label>

          <div class="col-md-6">
            <textarea  class="form-control input-sm" id="SUBJ_CODE" name="SUBJ_CODE" readonly="true" rows="4" cols="32"><?php echo $res->SUBJ_CODE .'['. $res->SUBJ_DESCRIPTION.']';?></textarea>
             <!-- <input class="form-control input-sm" id="SUBJ_CODE" name="SUBJ_CODE" readonly="true" type="text" value="<?php echo $res->SUBJ_CODE .'['. $res->SUBJ_DESCRIPTION.']';?>"> -->
          </div>
        </div>
      </div>
      
        
      <div class="form-group">
        <div class="col-md-12">
          <label class="col-md-4 control-label" for=
          "FIRSTQUARTER">First Quarter:</label>

          <div class="col-md-6">
            
             <input class="form-control input-sm" id="FIRSTQUARTER" name="FIRSTQUARTER" placeholder=
                "First Quarter" type="text" value="<?php echo $resgrades->FIRST; ?>" autocomplete="off"  required>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-12">
          <label class="col-md-4 control-label" for=
          "SECONDQUARTER">Second Quarter:</label>

          <div class="col-md-6">
            
             <input class="form-control input-sm" id="SECONDQUARTER" name="SECONDQUARTER" placeholder=
                "Second Quarter" type="text" value="<?php echo $resgrades->SECOND; ?>" autocomplete="off" required>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-12">
          <label class="col-md-4 control-label" for=
          "THIRDQUARTER">Third Quarter:</label>

          <div class="col-md-6">
            
             <input class="form-control input-sm" id="THIRDQUARTER" name="THIRDQUARTER" placeholder=
                "Third Quarter" type="text" value="<?php echo $resgrades->THIRD ?>" autocomplete="off" required>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-12">
          <label class="col-md-4 control-label" for=
          "FOURTHQUARTER">Fourth Quarter:</label>

          <div class="col-md-6">
            
             <input class="form-control input-sm" id="FOURTHQUARTER" name="FOURTHQUARTER" placeholder=
                "Fourth Quarter" type="text" value="<?php echo $resgrades->FOURTH ?>" autocomplete="off" required>
          </div>
        </div>
      </div>
       

      <div class="form-group">
        <div class="col-md-12">
          <label class="col-md-4 control-label" for=
          "AVERAGE">Average:</label>

          <div class="col-md-6">
            
             <input class="form-control input-sm" id="AVERAGE" name="AVERAGE" placeholder=
                "0" type="text" value="<?php echo $resgrades->AVE; ?>" readonly="true" required>
          </div>
        </div>
      </div>
       
      <div class="form-group">
        <div class="col-md-12">
          <label class="col-md-4 control-label" for=
          "idno"></label>

          <div class="col-md-6">
           <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button> 
              <!-- <a href="index.php?view=grades&id=<?php echo $_GET['IDNO']; ?>" class="btn btn-info"><span class="fa fa-arrow-circle-left fw-fa"></span></span>&nbsp;<strong>Back</strong></a> -->
           </div>
        </div>
      </div>

          
        </form>
      
<script src="<?php echo web_root; ?>admin/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $("#FIRSTQUARTER").keyup(function(){
        //alert('FIRSTQUARTER');

   var first = document.getElementById('FIRSTQUARTER').value;
   var second = document.getElementById('SECONDQUARTER').value;
   var third = document.getElementById('THIRDQUARTER').value;
   var fourth = document.getElementById('FOURTHQUARTER').value;
   var tot;


    first = parseFloat(first) * .20;
    second = parseFloat(second) * .20;
    third = parseFloat(third) * .20;
    fourth = parseFloat(fourth) * .40

    tot = parseFloat(first) +  parseFloat(second)  +  parseFloat(third)  +  parseFloat(fourth) ;

    // tot = tot /  4;

   document.getElementById('AVERAGE').value = tot.toFixed(2);







    });
    $("#SECONDQUARTER").keyup(function(){
      var first = document.getElementById('FIRSTQUARTER').value;
   var second = document.getElementById('SECONDQUARTER').value;
   var third = document.getElementById('THIRDQUARTER').value;
   var fourth = document.getElementById('FOURTHQUARTER').value;
   var tot;


    first = parseFloat(first) * .20;
    second = parseFloat(second) * .20;
    third = parseFloat(third) * .20;
    fourth = parseFloat(fourth) * .40

    tot = parseFloat(first) +  parseFloat(second)  +  parseFloat(third)  +  parseFloat(fourth) ;

    // tot = tot /  4;

   document.getElementById('AVERAGE').value = tot.toFixed(2);

    });
    $("#THIRDQUARTER").keyup(function(){
        // alert('THIRDQUARTER');
   var first = document.getElementById('FIRSTQUARTER').value;
   var second = document.getElementById('SECONDQUARTER').value;
   var third = document.getElementById('THIRDQUARTER').value;
   var fourth = document.getElementById('FOURTHQUARTER').value;
   var tot;


    first = parseFloat(first) * .20;
    second = parseFloat(second) * .20;
    third = parseFloat(third) * .20;
    fourth = parseFloat(fourth) * .40

    tot = parseFloat(first) +  parseFloat(second)  +  parseFloat(third)  +  parseFloat(fourth) ;

    // tot = tot /  4;

   document.getElementById('AVERAGE').value = tot.toFixed(2);

    });
    $("#FOURTHQUARTER").keyup(function(){
        // alert('FOURTHQUARTER');
 var first = document.getElementById('FIRSTQUARTER').value;
   var second = document.getElementById('SECONDQUARTER').value;
   var third = document.getElementById('THIRDQUARTER').value;
   var fourth = document.getElementById('FOURTHQUARTER').value;
   var tot;


    first = parseFloat(first) * .20;
    second = parseFloat(second) * .20;
    third = parseFloat(third) * .20;
    fourth = parseFloat(fourth) * .40

    tot = parseFloat(first) +  parseFloat(second)  +  parseFloat(third)  +  parseFloat(fourth) ;

    // tot = tot /  4;

   document.getElementById('AVERAGE').value = tot.toFixed(2);

    });



    $("input").click(function(){
        this.select();
    });
    
    // Handle form submission to redirect parent window
    $('form').on('submit', function() {
        // Set a flag in sessionStorage so parent can detect successful save
        if (window.parent && window.parent !== window) {
            // We're in a modal/iframe, inform parent we're saving
            sessionStorage.setItem('gradesSaved', 'true');
            sessionStorage.setItem('savedIDNO', '<?php echo intval($IDNO); ?>');
        }
    });
</script>
