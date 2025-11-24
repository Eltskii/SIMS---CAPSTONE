<br/>
<?php
$student = new Student();
$res = $student->single_student($_SESSION['IDNO']);

$studdetails = new StudentDetails();
$details = $studdetails->single_StudentDetails($_SESSION['IDNO']);
?>

<form action="student/controller.php?action=edit" class="form-horizontal" method="post">
  <div class="container-fluid">
    <div class="row mb-3">
      <div class="col-md-8">
        <h2 class="text-success fw-bold">Update Account</h2>
      </div>
      <div class="col-md-4 text-end">
        <label class="text-muted">Academic Year: <strong><?php echo $_SESSION['SY']; ?></strong></label>
      </div>
    </div>

    <div class="card mb-4 shadow-sm">
      <div class="card-header bg-success text-white">
        <h5 class="mb-0">Course Information</h5>
      </div>
      <div class="card-body row g-3">
        <div class="col-md-4">
          <label>Course</label>
          <input class="form-control" type="text" name="COURSE" value="<?php echo htmlspecialchars($res->COURSE_NAME ?? ''); ?>" readonly>
        </div>
        <div class="col-md-4">
          <label>Major</label>
          <input class="form-control" type="text" name="MAJOR" value="<?php echo htmlspecialchars($res->MAJOR ?? ''); ?>" readonly>
        </div>
        <div class="col-md-4">
          <label>Year Level</label>
          <input class="form-control" type="text" name="YEARLEVEL" value="<?php echo htmlspecialchars($res->YEARLEVEL ?? ''); ?>" readonly>
        </div>
      </div>
    </div>

    <div class="card mb-4 shadow-sm">
      <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Personal Information</h5>
      </div>
      <div class="card-body row g-3">
        <div class="col-md-4">
          <label>First Name</label>
          <input class="form-control" name="FNAME" type="text" required value="<?php echo htmlspecialchars($res->FNAME); ?>">
        </div>
        <div class="col-md-4">
          <label>Last Name</label>
          <input class="form-control" name="LNAME" type="text" required value="<?php echo htmlspecialchars($res->LNAME); ?>">
        </div>
        <div class="col-md-4">
          <label>Middle Initial</label>
          <input class="form-control" name="MNAME" type="text" value="<?php echo htmlspecialchars($res->MNAME); ?>">
        </div>

        <div class="col-md-4">
          <label>Maiden Name</label>
          <input class="form-control" name="MAIDEN" type="text" value="<?php echo htmlspecialchars($res->MAIDEN_NAME ?? ''); ?>">
        </div>

        <div class="col-md-4">
          <label>Sex</label><br>
          <label class="me-3"><input type="radio" name="optionsRadios" value="Female" <?php echo ($res->SEX == 'Female') ? 'checked' : ''; ?>> Female</label>
          <label><input type="radio" name="optionsRadios" value="Male" <?php echo ($res->SEX == 'Male') ? 'checked' : ''; ?>> Male</label>
        </div>

        <div class="col-md-4">
          <label>Date of Birth</label>
          <div class="input-group">
            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
            <input name="BIRTHDATE" id="BIRTHDATE" type="text" class="form-control"
              data-inputmask="'alias': 'mm/dd/yyyy'" data-mask
              value="<?php echo date_format(date_create($res->BDAY), 'm/d/Y'); ?>">
          </div>
        </div>

        <div class="col-md-4">
          <label>Nationality</label>
          <input class="form-control" name="NATIONALITY" type="text" required value="<?php echo htmlspecialchars($res->NATIONALITY); ?>">
        </div>
      </div>
    </div>

    <div class="card mb-4 shadow-sm">
      <div class="card-header bg-info text-white">
        <h5 class="mb-0">Contact & Background</h5>
      </div>
      <div class="card-body row g-3">
        <div class="col-md-6">
          <label>Permanent / Home Address</label>
          <input class="form-control" name="PADDRESS" type="text" required value="<?php echo htmlspecialchars($res->HOME_ADD); ?>">
        </div>
        <div class="col-md-6">
          <label>Address while studying</label>
          <input class="form-control" name="STUDY_ADDRESS" type="text" value="<?php echo htmlspecialchars($details->STUDY_ADDRESS ?? ''); ?>">
        </div>
        <div class="col-md-6">
          <label>Last School Attended</label>
          <input class="form-control" name="LAST_SCHOOL" type="text" value="<?php echo htmlspecialchars($details->LAST_SCHOOL ?? ''); ?>">
        </div>
        <div class="col-md-3">
          <label>Contact No.</label>
          <input class="form-control" name="CONTACT" type="text" required value="<?php echo htmlspecialchars($res->CONTACT_NO); ?>">
        </div>
        <div class="col-md-3">
          <label>Email</label>
          <input class="form-control" name="EMAIL" type="email" value="<?php echo htmlspecialchars($res->EMAIL ?? ''); ?>">
        </div>
      </div>
    </div>

    <div class="card mb-4 shadow-sm">
      <div class="card-header bg-warning text-dark">
        <h5 class="mb-0">Family & Emergency Contact</h5>
      </div>
      <div class="card-body row g-3">
        <div class="col-md-6">
          <label>Father's Name</label>
          <input class="form-control" name="FATHER" type="text" value="<?php echo htmlspecialchars($details->FATHER ?? ''); ?>">
        </div>
        <div class="col-md-6">
          <label>Father's Contact</label>
          <input class="form-control" name="FCONTACT" type="text" value="<?php echo htmlspecialchars($details->FCONTACT ?? ''); ?>">
        </div>
        <div class="col-md-6">
          <label>Mother's Name</label>
          <input class="form-control" name="MOTHER" type="text" value="<?php echo htmlspecialchars($details->MOTHER ?? ''); ?>">
        </div>
        <div class="col-md-6">
          <label>Mother's Contact</label>
          <input class="form-control" name="MCONTACT" type="text" value="<?php echo htmlspecialchars($details->MCONTACT ?? ''); ?>">
        </div>

        <hr class="mt-3 mb-3">

        <div class="col-md-6">
          <label>Emergency Contact Person</label>
          <input class="form-control" name="EMERGENCY_PERSON" type="text" value="<?php echo htmlspecialchars($details->EMERGENCY_PERSON ?? ''); ?>">
        </div>
        <div class="col-md-3">
          <label>Relationship</label>
          <input class="form-control" name="EMERGENCY_RELATION" type="text" value="<?php echo htmlspecialchars($details->EMERGENCY_RELATION ?? ''); ?>">
        </div>
        <div class="col-md-3">
          <label>Emergency Contact No.</label>
          <input class="form-control" name="EMERGENCY_CONTACT" type="text" value="<?php echo htmlspecialchars($details->EMERGENCY_CONTACT ?? ''); ?>">
        </div>
      </div>
    </div>

    <div class="card mb-4 shadow-sm">
      <div class="card-header bg-secondary text-white">
        <h5 class="mb-0">Account Credentials</h5>
      </div>
      <div class="card-body row g-3">
        <div class="col-md-6">
          <label>Username</label>
          <input class="form-control" name="USER_NAME" type="text" required value="<?php echo htmlspecialchars($res->ACC_USERNAME); ?>">
        </div>
        <div class="col-md-6">
          <label>Password</label>
          <input class="form-control" name="PASSWORD" type="password" placeholder="Enter new password (optional)">
        </div>
      </div>
    </div>

    <div class="text-end">
      <button class="btn btn-success btn-lg" name="save" type="submit">
        <i class="fa fa-save me-2"></i>Save Changes
      </button>
    </div>
  </div>
</form>
