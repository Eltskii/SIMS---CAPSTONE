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

// Get the COURSE_ID from URL
$courseId = isset($_GET['id']) ? $_GET['id'] : 0;

// Fetch course data from database
$course = new Course();
$singleCourse = $course->single_course($courseId); // Make sure this method returns one course object
?> 

<form class="form-horizontal span6" action="controller.php?action=edit" method="POST">

    <!-- Hidden input for course ID -->
    <input type="hidden" name="COURSE_ID" value="<?php echo $singleCourse->COURSE_ID; ?>">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Course/Year</h1>
        </div>
    </div> 

    <!-- Course Name -->
    <div class="form-group">
        <div class="col-md-8">
            <label class="col-md-4 control-label" for="COURSE_NAME">Course:</label>
            <div class="col-md-8">
                <input class="form-control input-sm text-capitalize" id="COURSE_NAME" name="COURSE_NAME" placeholder="Course" type="text" value="<?php echo $singleCourse->COURSE_NAME; ?>" required>
            </div>
        </div>
    </div>

    <!-- Year Level -->
    <div class="form-group">
        <div class="col-md-8">
            <label class="col-md-4 control-label" for="COURSE_LEVEL">Year Level:</label>
            <div class="col-md-8">
                <input class="form-control input-sm" id="COURSE_LEVEL" name="COURSE_LEVEL" placeholder="Course Level" type="text" value="<?php echo $singleCourse->COURSE_LEVEL; ?>" required>
            </div>
        </div>
    </div>

    <!-- Major -->
    <div class="form-group">
        <div class="col-md-8">
            <label class="col-md-4 control-label" for="COURSE_MAJOR">Major:</label>
            <div class="col-md-8">
                <input class="form-control input-sm" id="COURSE_MAJOR" name="COURSE_MAJOR" placeholder="optional" style="font-style:normal" type="text" value="<?php echo $singleCourse->COURSE_MAJOR; ?>">

            <style>
            #COURSE_MAJOR::placeholder {
                font-style: italic;
            }
            </style>
            
            </div>
        </div>
    </div>

    <!-- Description -->
    <div class="form-group">
        <div class="col-md-8">
            <label class="col-md-4 control-label" for="COURSE_DESC">Description:</label>
            <div class="col-md-8">
                <input class="form-control input-sm" id="COURSE_DESC" name="COURSE_DESC" placeholder="Course Description" type="text" value="<?php echo $singleCourse->COURSE_DESC; ?>" required>
            </div>
        </div>
    </div>

    <!-- Department -->
    <div class="form-group">
        <div class="col-md-8">
            <label class="col-md-4 control-label" for="DEPT_ID">Department:</label>
            <div class="col-md-8">
                <?php if (isChairperson()): ?>
                    <!-- Chairperson: Department is locked (cannot change) -->
                    <?php 
                        $mydb->setQuery("SELECT DEPARTMENT_NAME FROM department WHERE DEPT_ID = " . intval($singleCourse->DEPT_ID));
                        $deptName = $mydb->loadSingleResult();
                    ?>
                    <input type="text" class="form-control input-sm" value="<?php echo htmlspecialchars($deptName->DEPARTMENT_NAME ?? 'Unknown'); ?>" readonly style="background-color: #f5f5f5;">
                    <input type="hidden" name="DEPT_ID" value="<?php echo intval($singleCourse->DEPT_ID); ?>">
                    <small class="text-muted">Department cannot be changed</small>
                <?php else: ?>
                    <!-- Administrator: Can change department -->
                    <select class="form-control input-sm" name="DEPT_ID" id="DEPT_ID" required>
                        <option value="">Select Department</option>
                        <?php 
                            $mydb->setQuery("SELECT * FROM `department` ORDER BY DEPARTMENT_NAME");
                            $cur = $mydb->loadResultList();
                            foreach ($cur as $result) {
                                $selected = ($singleCourse->DEPT_ID == $result->DEPT_ID) ? 'selected' : '';
                                echo '<option value="'.$result->DEPT_ID.'" '.$selected.'>'.$result->DEPARTMENT_NAME.' ['.$result->DEPARTMENT_DESC.']</option>';
                            }
                        ?>
                    </select>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="form-group">
        <div class="col-md-8 col-md-offset-4">
            <button class="btn btn-primary btn-sm" name="save" type="submit">
                <span class="fa fa-save fw-fa"></span> Update
            </button>
        </div>
    </div>

</form>

<!-- script -->
 <script>
(function(){
  // Title-case the COURSE_DESC on blur, if input exists
  var desc = document.getElementById('COURSE_DESC');
  if (desc) {
      desc.addEventListener('blur', function() {
          var v = this.value.trim();
          if (!v) return;
          // title case, basic approach
          v = v.toLowerCase().replace(/\b\w/g, function(c){ return c.toUpperCase(); });
          this.value = v;
      });
  }

  // Toggle new-course input for both add/edit forms
  var sel = document.getElementById('COURSE_NAME');
  var newInput = document.getElementById('COURSE_NAME_NEW');
  var hint = document.getElementById('course_hint');
  if (sel && newInput) {
      function toggle() {
          if (sel.value === '__new__') {
              newInput.style.display = 'block';
              newInput.required = true;
              if (hint) hint.style.display = 'block';
          } else {
              newInput.style.display = 'none';
              newInput.required = false;
              if (hint) hint.style.display = 'none';
              newInput.value = '';
          }
      }
      sel.addEventListener('change', toggle);
      // init state
      toggle();
  }
})();
</script>

