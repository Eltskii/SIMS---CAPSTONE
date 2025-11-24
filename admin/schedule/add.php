                      <?php 
                       if (!isset($_SESSION['ACCOUNT_ID'])){
                          redirect(web_root."admin/index.php");
                         }

// Ensure the user has appropriate role to access this page
if ($_SESSION['ACCOUNT_TYPE'] !== 'Registrar' && 
    $_SESSION['ACCOUNT_TYPE'] !== 'Registrar' && 
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
            <h1 class="page-header">Add New Schedule</h1>
            <div class="alert alert-info">
              <i class="fa fa-info-circle"></i> <strong>Instructions:</strong> Select course and semester first to load available subjects. Fields marked with <span style="color:red;">*</span> are required.
            </div>
          </div>
        </div>
                    
                  <!--  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "sched_time">Time:</label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="sched_time" name="sched_time" placeholder=
                            "Time" type="text" value="">
                      </div>
                    </div>
                  </div> -->
 

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "sched_time">Time: <span style="color:red;">*</span></label>
                      <div class="col-md-8">
                        <div class="row">
                             <label class="col-md-2">From</label>
                         
                          <div class="col-md-4 input-group">
                           <div class="input-group-addon"> 
                            <i class="fa fa-clock-o"></i>
                          </div>
                           <input class="form-control input-sm time" id="TIME_FROM" name="TIME_FROM"  
                           type="text"  data-inputmask="'alias': 'hh:mm t'" data-mask value="" value="">
                          </div>
                       
                          <label class="col-md-2">To</label>
                         
                          <div class="col-md-4 input-group">
                           <div class="input-group-addon"> 
                              <i class="fa fa-clock-o"></i>
                            </div>
                           <input class="form-control input-sm time" id="TIME_TO" name="TIME_TO" data-inputmask="'alias': 'hh:mm t'" 
                           type="text"   data-mask value="" value="">
                             
                          </div>
                           <!--  <div class="col-md-3 ">
                           <select class="form-control input-sm " name="AMPM">
                              <option value="am">am</option>
                               <option value="pm">pm</option>
                            </select>
                        </div> -->
                        </div> 
                        
                      </div> 
                    
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "sched_day">Days: <span style="color:red;">*</span></label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="sched_day" name="sched_day" placeholder=
                            "Day" type="text" value="">
                      </div>
                    </div>
                  </div>

                  
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "COURSE_ID">Course: <span style="color:red;">*</span></label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="COURSE_ID" id="COURSE_ID"> 
                  

                          <?php 
                            $mydb->setQuery("SELECT * FROM `course` ORDER BY COURSE_NAME, COURSE_MAJOR");
                            $cur = $mydb->loadResultList();

                            foreach ($cur as $result) {
                              $courseName = htmlspecialchars($result->COURSE_NAME);
                              $courseLevel = htmlspecialchars($result->COURSE_LEVEL);
                              $courseMajor = htmlspecialchars($result->COURSE_MAJOR);
                              
                              // Build display name
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

                  

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "sched_semester">Semester: <span style="color:red;">*</span></label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="sched_semester" id="sched_semester"> 
                        <option value="First" >First</option>
                         <option value="Second">Second</option> 
                        </select> 
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "sched_room">Room: <span style="color:red;">*</span></label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="sched_room" name="sched_room" placeholder=
                            "Room" type="text" value="">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "SECTION">Section:</label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="SECTION" name="SECTION" placeholder=
                            "Section" type="number" value="">
                      </div>
                    </div>
                  </div>

                  <!-- Subject dropdown loaded dynamically based on course and semester -->
                  <div id="loaddata">
                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for="SUBJ_ID">Subject: <span style="color:red;">*</span></label>
                        <div class="col-md-8">
                          <select class="form-control input-sm" name="SUBJ_ID" id="SUBJ_ID" required>
                            <option value="">Select course and semester first</option>
                          </select>
                          <small class="text-muted" id="subjectHint" style="display:none;">Loading subjects...</small>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "INST_ID">Instructor:</label>

                      <div class="col-md-8">
                        
                         <select class="form-control input-sm" name="INST_ID" id="INST_ID"> 
                  

                          <?php 

                            $mydb->setQuery("SELECT * FROM `tblinstructor` "  );
                            $cur = $mydb->loadResultList();

                            foreach ($cur as $result) {
                              echo '<option value='.$result->INST_ID.' >'.$result->INST_NAME.' </option>';

                            }
                          ?>

                         
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

<script type="text/javascript">
// Dynamic subject loading based on course and semester selection
jQuery(document).ready(function($) {
  var courseSelect = $('#COURSE_ID');
  var semesterSelect = $('#sched_semester');
  var subjectSelect = $('#SUBJ_ID');
  var subjectHint = $('#subjectHint');
  
  // Function to load subjects
  function loadSubjects() {
    var courseId = courseSelect.val();
    var semester = semesterSelect.val();
    
    if (!courseId || !semester) {
      subjectSelect.html('<option value="">Select course and semester first</option>');
      subjectHint.hide();
      return;
    }
    
    // Show loading state
    subjectSelect.html('<option value="">Loading...</option>');
    subjectHint.text('Loading subjects...').show();
    
    // Make AJAX request
    $.ajax({
      url: 'loaddata.php',
      type: 'POST',
      data: {
        id: courseId,
        SEMESTER: semester
      },
      success: function(response) {
        // Parse the response to extract just the select options
        var tempDiv = $('<div>').html(response);
        var options = tempDiv.find('select option');
        
        if (options.length > 0) {
          subjectSelect.empty();
          subjectSelect.append('<option value="">-- Select Subject --</option>');
          options.each(function() {
            subjectSelect.append($(this).clone());
          });
          subjectHint.text(options.length + ' subject(s) available').css('color', '#27ae60').show();
        } else {
          subjectSelect.html('<option value="">No subjects found for this course/semester</option>');
          subjectHint.text('No subjects available').css('color', '#e74c3c').show();
        }
      },
      error: function() {
        subjectSelect.html('<option value="">Error loading subjects</option>');
        subjectHint.text('Failed to load subjects').css('color', '#e74c3c').show();
      }
    });
  }
  
  // Load subjects when course or semester changes
  courseSelect.on('change', loadSubjects);
  semesterSelect.on('change', loadSubjects);
  
  // Validate form before submission
  $('form').on('submit', function(e) {
    var subjectId = subjectSelect.val();
    if (!subjectId || subjectId === '') {
      e.preventDefault();
      alert('Please select a subject before saving the schedule.');
      subjectSelect.focus();
      return false;
    }
  });
});
</script>
       
