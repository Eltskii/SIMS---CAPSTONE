<?php
if (!isset($_SESSION['IDNO']) || empty($_SESSION['IDNO'])) {
  redirect("index.php");
}

$student = New Student();
$res = $student->single_student($_SESSION['IDNO']);
if (!$res) {
  error_log("profile.php: student not found for IDNO: " . print_r($_SESSION['IDNO'], true));
  message("Student record not found.", "error");
  redirect("index.php");
}

$course = New Course();
$resCourse = null;
if (isset($res->COURSE_ID) && $res->COURSE_ID !== '') {
  $resCourse = $course->single_course($res->COURSE_ID);
}
?>

<style>
  body {
    background-color: #f4f6f9;
  }

  .panel {
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    background: #fff;
    border: 1px solid #e8f0ee;
    overflow: hidden;
  }

  .panel-body {
    padding: 20px;
  }

  /* Profile Banner Styles */
  .profile-banner {
    background: linear-gradient(135deg, #28a745 0%, #20874a 100%);
    padding: 40px;
    border-radius: 12px;
    margin-bottom: 24px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.1);
    position: relative;
    overflow: hidden;
  }

  .profile-banner::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, rgba(255,255,255,0.5), transparent);
  }

  .profile-content {
    display: flex;
    align-items: center;
    gap: 30px;
    position: relative;
    z-index: 1;
  }

  .profile-avatar {
    position: relative;
    flex-shrink: 0;
  }

  .profile-avatar img {
    width: 140px;
    height: 140px;
    border-radius: 50%;
    object-fit: cover;
    border: 5px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 4px 20px rgba(0,0,0,0.2);
    transition: all 0.3s ease;
  }

  .profile-avatar a {
    display: block;
    position: relative;
  }

  .profile-avatar-upload {
    position: absolute;
    bottom: 5px;
    right: 5px;
    background: white;
    color: #28a745;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    opacity: 0;
    transition: opacity 0.3s ease;
    cursor: pointer;
  }

  .profile-avatar a:hover .profile-avatar-upload {
    opacity: 1;
  }

  .profile-avatar a:hover img {
    transform: scale(1.05);
    border-color: rgba(255, 255, 255, 0.6);
  }

  .profile-info {
    flex: 1;
    color: white;
  }

  .profile-name {
    font-size: 32px;
    font-weight: 700;
    margin: 0 0 8px 0;
    color: white;
  }

  .profile-id {
    font-size: 14px;
    opacity: 0.9;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 6px;
  }

  .profile-details {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 16px;
  }

  .profile-detail-item {
    background: rgba(255, 255, 255, 0.15);
    padding: 14px 18px;
    border-radius: 8px;
    backdrop-filter: blur(10px);
  }

  .profile-detail-label {
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 1px;
    opacity: 0.85;
    margin-bottom: 4px;
    display: flex;
    align-items: center;
    gap: 6px;
  }

  .profile-detail-value {
    font-size: 16px;
    font-weight: 600;
  }

  .status-badge {
    display: inline-block;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .status-badge.active {
    background: rgba(255, 255, 255, 0.95);
    color: #28a745;
  }

  .status-badge.irregular {
    background: rgba(255, 243, 205, 0.95);
    color: #856404;
  }

  .status-badge.transferee {
    background: rgba(209, 236, 241, 0.95);
    color: #0c5460;
  }

  h1.page-header, h3 {
    font-weight: 600;
    color: #2c3e50;
  }

  .nav-tabs {
    border-bottom: 3px solid #e8f0ee;
    margin-bottom: 0;
  }

  .nav-tabs > li {
    margin-bottom: -3px;
    margin-right: 4px;
  }

  .nav-tabs > li > a {
    color: #4a5568;
    font-weight: 600;
    padding: 14px 24px;
    transition: all 0.3s ease;
    border: none;
    border-radius: 8px 8px 0 0;
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    background: transparent;
  }

  .nav-tabs > li > a i {
    font-size: 16px;
    transition: transform 0.3s ease;
  }

  .nav-tabs > li > a:hover {
    background-color: #f8fdf9;
    color: #28a745;
    border: none;
  }

  .nav-tabs > li > a:hover i {
    transform: translateY(-2px);
  }

  .nav-tabs > li.active > a,
  .nav-tabs > li.active > a:hover,
  .nav-tabs > li.active > a:focus {
    background: linear-gradient(135deg, #28a745 0%, #20874a 100%);
    color: white !important;
    border: none;
    border-bottom: 3px solid #28a745;
    box-shadow: 0 -2px 8px rgba(40, 167, 69, 0.2);
  }

  .table th {
    background: linear-gradient(135deg, #28a745 0%, #20874a 100%);
    color: white;
    text-align: center;
    font-weight: 600;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 14px 12px;
    border: none;
  }

  .table td {
    vertical-align: middle;
    font-size: 14px;
    padding: 14px 12px;
    color: #2d3748;
  }

  .table-striped > tbody > tr:nth-of-type(odd) {
    background-color: #f8fdf9;
  }

  .table-striped > tbody > tr:hover {
    background-color: #e8f5ea;
    transition: background-color 0.2s ease;
  }

  .table-bordered {
    border: 2px solid #e8f0ee;
    border-radius: 8px;
    overflow: hidden;
  }

  .table > tbody > tr > td.total-row {
    background-color: #f0f8f2;
    font-weight: 700;
    color: #28a745;
    font-size: 15px;
  }

  .section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
  }

  .section-header h3 {
    margin: 0;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .section-header h3 i {
    color: #28a745;
  }

  .btn-print {
    background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  }

  .btn-print:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    background: linear-gradient(135deg, #5a6268 0%, #4e555b 100%);
  }

  .empty-state {
    text-align: center;
    padding: 60px 20px;
  }

  .empty-state i {
    font-size: 64px;
    color: #cbd5e0;
    margin-bottom: 20px;
  }

  .empty-state h4 {
    color: #4a5568;
    font-weight: 600;
    margin-bottom: 10px;
  }

  .empty-state p {
    color: #718096;
    font-size: 14px;
  }

  .modal-content {
    border-radius: 10px;
  }

  .btn-primary {
    background-color: #28a745;
    border-color: #28a745;
  }

  .btn-primary:hover {
    background-color: #218838;
  }

  .alert-info {
    background-color: #e8f5e9;
    color: #2e7d32;
  }

  /* Stats Cards */
  .stats-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 24px;
  }

  .stat-card {
    background: white;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    border: 1px solid #e8f0ee;
    transition: all 0.3s ease;
  }

  .stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 4px 16px rgba(0,0,0,0.12);
  }

  .stat-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    margin-bottom: 12px;
  }

  .stat-icon.green {
    background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
    color: #28a745;
  }

  .stat-icon.blue {
    background: linear-gradient(135deg, #d1ecf1 0%, #bee5eb 100%);
    color: #17a2b8;
  }

  .stat-icon.purple {
    background: linear-gradient(135deg, #e2d9f3 0%, #d4c5e8 100%);
    color: #6f42c1;
  }

  .stat-icon.orange {
    background: linear-gradient(135deg, #ffe8cc 0%, #ffd9a3 100%);
    color: #fd7e14;
  }

  .stat-label {
    font-size: 13px;
    color: #718096;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
    margin-bottom: 4px;
  }

  .stat-value {
    font-size: 28px;
    font-weight: 700;
    color: #2d3748;
  }

  .stat-subtext {
    font-size: 12px;
    color: #a0aec0;
    margin-top: 4px;
  }

  /* Profile Layout */
  .profile-content-area {
    width: 100%;
  }

  /* Responsive Styles */
  @media (max-width: 768px) {
    .profile-banner {
      padding: 24px;
    }

    .profile-content {
      flex-direction: column;
      text-align: center;
      gap: 20px;
    }

    .profile-name {
      font-size: 24px;
    }

    .profile-id {
      justify-content: center;
    }

    .profile-details {
      grid-template-columns: 1fr;
    }

    .section-header {
      flex-direction: column;
      align-items: flex-start;
      gap: 12px;
    }

    .btn-print {
      width: 100%;
      justify-content: center;
    }

    .stats-row {
      grid-template-columns: 1fr;
    }
  }

</style>

<!-- Profile Banner -->
<div class="col-lg-12">
  <div class="profile-banner">
    <div class="profile-content">
      <div class="profile-avatar">
        <a href="" data-target="#myModal" data-toggle="modal" title="Click to upload new photo">
          <img src="<?php echo web_root . 'student/' . (!empty($res->STUDPHOTO) ? $res->STUDPHOTO : 'default-avatar.jpg'); ?>" alt="<?php echo htmlspecialchars(($res->FNAME ?? '') . ' ' . ($res->LNAME ?? '')); ?>">
          <span class="profile-avatar-upload">
            <i class="fa fa-camera"></i>
          </span>
        </a>
      </div>
      
      <div class="profile-info">
        <h1 class="profile-name"><?php echo htmlspecialchars(($res->FNAME ?? '') . ' ' . ($res->MNAME ?? '') . ' ' . ($res->LNAME ?? '')); ?></h1>
        <div class="profile-id">
          <i class="fa fa-id-card"></i>
          Student ID: <strong><?php echo htmlspecialchars($res->IDNO ?? 'N/A'); ?></strong>
        </div>
        
        <div class="profile-details">
          <div class="profile-detail-item">
            <div class="profile-detail-label">
              <i class="fa fa-graduation-cap"></i>
              Course
            </div>
            <div class="profile-detail-value"><?php echo $resCourse ? htmlspecialchars($resCourse->COURSE_NAME . ' - ' . $resCourse->COURSE_LEVEL) : 'Not assigned'; ?></div>
          </div>
          
          <?php if (isset($res->YEARLEVEL) && $res->YEARLEVEL): ?>
          <div class="profile-detail-item">
            <div class="profile-detail-label">
              <i class="fa fa-level-up"></i>
              Year Level
            </div>
            <div class="profile-detail-value"><?php 
              $yearLabels = [1 => 'First Year', 2 => 'Second Year', 3 => 'Third Year', 4 => 'Fourth Year'];
              echo $yearLabels[$res->YEARLEVEL] ?? $res->YEARLEVEL;
            ?></div>
          </div>
          <?php endif; ?>
          
          <div class="profile-detail-item">
            <div class="profile-detail-label">
              <i class="fa fa-info-circle"></i>
              Status
            </div>
            <div class="profile-detail-value">
              <?php 
                $status = $res->student_status ?? '';
                $statusClass = 'active';
                if (stripos($status, 'irregular') !== false) $statusClass = 'irregular';
                elseif (stripos($status, 'transferee') !== false) $statusClass = 'transferee';
              ?>
              <span class="status-badge <?php echo $statusClass; ?>"><?php echo htmlspecialchars($status); ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Stats Cards -->
<div class="col-lg-12">
  <div class="stats-row">
    <div class="stat-card">
      <div class="stat-icon green">
        <i class="fa fa-book"></i>
      </div>
      <div class="stat-label">Enrolled Subjects</div>
      <div class="stat-value">
        <?php
        $studentId = intval($_SESSION['IDNO']);
        $mydb->setQuery("SELECT COUNT(*) as cnt FROM studentsubjects WHERE IDNO = {$studentId}");
        $subjCount = $mydb->loadSingleResult();
        echo $subjCount ? intval($subjCount->cnt) : 0;
        ?>
      </div>
      <div class="stat-subtext">Current semester</div>
    </div>

    <div class="stat-card">
      <div class="stat-icon blue">
        <i class="fa fa-check-circle"></i>
      </div>
      <div class="stat-label">Units Earned</div>
      <div class="stat-value">
        <?php
        $mydb->setQuery("SELECT SUM(s.UNIT) as total FROM tblgrades g 
                         JOIN subject s ON g.SUBJ_ID = s.SUBJ_ID 
                         WHERE g.IDNO = {$studentId} AND g.REMARKS LIKE '%Pass%' AND g.STATUS = 'Published'");
        $unitsResult = $mydb->loadSingleResult();
        echo $unitsResult && $unitsResult->total ? number_format($unitsResult->total, 0) : 0;
        ?>
      </div>
      <div class="stat-subtext">Completed units</div>
    </div>

    <div class="stat-card">
      <div class="stat-icon purple">
        <i class="fa fa-star"></i>
      </div>
      <div class="stat-label">Published Grades</div>
      <div class="stat-value">
        <?php
        $mydb->setQuery("SELECT COUNT(*) as cnt FROM tblgrades 
                         WHERE IDNO = {$studentId} AND STATUS = 'Published' AND REMARKS NOT IN ('Drop')");
        $gradesCount = $mydb->loadSingleResult();
        echo $gradesCount ? intval($gradesCount->cnt) : 0;
        ?>
      </div>
      <div class="stat-subtext">Available to view</div>
    </div>

    <div class="stat-card">
      <div class="stat-icon orange">
        <i class="fa fa-clock-o"></i>
      </div>
      <div class="stat-label">Current Status</div>
      <div class="stat-value" style="font-size: 18px;">
        <?php echo htmlspecialchars($res->student_status ?? 'Active'); ?>
      </div>
      <div class="stat-subtext">Academic standing</div>
    </div>
  </div>
</div>

<!-- Main Content -->
<div class="col-lg-12">
  <div class="profile-content-area">
    <div class="panel">            
      <div class="panel-body">
      <?php check_message(); ?>

      <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#home" data-toggle="tab"><i class="fa fa-book"></i>Subjects & Grades</a></li>
        <?php 
        if (isset($res->student_status) && ($res->student_status == 'Irregular' || $res->student_status == 'Transferee') && isset($res->NewEnrollees) && $res->NewEnrollees == 0) {
          echo '<li><a href="#adddrop" data-toggle="tab"><i class="fa fa-exchange"></i>Adding/Dropping</a></li>';
        }
        ?>
        <!-- <li><a href="#settings" data-toggle="tab"><i class="fa fa-cog"></i>Update Account</a></li> -->
      </ul>

      <div class="tab-content" style="margin-top:20px;">
        <div class="tab-pane active" id="home">
          <div class="section-header">
            <h3><i class="fa fa-list"></i>Subjects & Grades</h3>
            <button class="btn-print" onclick="window.print()"><i class="fa fa-print"></i>Print Schedule</button>
          </div>

          <div class="table-responsive">
            <?php
            $studentId = intval($_SESSION['IDNO']);
            $sql = "
              SELECT DISTINCT
                sub.SUBJ_CODE, 
                sub.SUBJ_DESCRIPTION, 
                sub.UNIT,
                sched.sched_day,
                sched.sched_time,
                sched.sched_room,
                g.AVE,
                g.REMARKS
              FROM studentsubjects ss
              JOIN `subject` sub ON ss.SUBJ_ID = sub.SUBJ_ID
              LEFT JOIN tblschedule sched ON sched.SUBJ_ID = sub.SUBJ_ID 
                AND sched.sched_sy = ss.SY 
                AND sched.sched_semester = ss.SEMESTER
              LEFT JOIN grades g ON g.SUBJ_ID = sub.SUBJ_ID AND g.IDNO = ss.IDNO
              WHERE ss.IDNO = {$studentId}
              ORDER BY sub.SUBJ_CODE
            ";
            $mydb->setQuery($sql);
            $cur = $mydb->loadResultList();
            ?>

            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Subject Code</th>
                  <th>Description</th>
                  <th>Units</th>
                  <th>Day</th>
                  <th>Time</th>
                  <th>Room</th>
                  <th>Grade</th>
                  <th>Remarks</th>
                </tr>
              </thead>
              <tbody>
                <?php if (empty($cur)): ?>
                  <tr>
                    <td colspan="8" style="border:none; padding: 0;">
                      <div class="empty-state">
                        <i class="fa fa-inbox"></i>
                        <h4>No Subjects Enrolled Yet</h4>
                        <p>Subjects will appear here once your enrollment is confirmed by the registrar.</p>
                      </div>
                    </td>
                  </tr>
                <?php else:
                  $totalUnits = 0.0;
                  foreach ($cur as $result):
                    $unitValue = floatval($result->UNIT);
                    $totalUnits += $unitValue;
                    
                    // Determine grade styling
                    $rowClass = '';
                    $gradeDisplay = '-';
                    $remarksDisplay = '<span style="color:#999;">Not graded</span>';
                    
                    if (!empty($result->AVE)) {
                      $gradeDisplay = htmlentities($result->AVE);
                    }
                    
                    if (!empty($result->REMARKS)) {
                      $remarks = htmlentities($result->REMARKS);
                      if (stripos($result->REMARKS, 'pass') !== false) {
                        $rowClass = 'success';
                        $remarksDisplay = '<span style="color:#28a745;font-weight:600;">' . $remarks . '</span>';
                      } elseif (stripos($result->REMARKS, 'fail') !== false) {
                        $rowClass = 'danger';
                        $remarksDisplay = '<span style="color:#dc3545;font-weight:600;">' . $remarks . '</span>';
                      } else {
                        $remarksDisplay = '<span style="color:#856404;font-weight:600;">' . $remarks . '</span>';
                      }
                    }
                ?>
                    <tr class="<?php echo $rowClass; ?>">
                      <td><strong><?php echo htmlentities($result->SUBJ_CODE); ?></strong></td>
                      <td><?php echo htmlentities($result->SUBJ_DESCRIPTION); ?></td>
                      <td class="text-center"><?php echo htmlentities($result->UNIT); ?></td>
                      <td class="text-center"><?php echo !empty($result->sched_day) ? htmlentities($result->sched_day) : '<span style="color:#999;">-</span>'; ?></td>
                      <td class="text-center" style="font-size:11px;"><?php echo !empty($result->sched_time) ? htmlentities($result->sched_time) : '<span style="color:#999;">-</span>'; ?></td>
                      <td class="text-center"><?php echo !empty($result->sched_room) ? htmlentities($result->sched_room) : '<span style="color:#999;">-</span>'; ?></td>
                      <td class="text-center"><strong><?php echo $gradeDisplay; ?></strong></td>
                      <td class="text-center"><?php echo $remarksDisplay; ?></td>
                    </tr>
                <?php endforeach; ?>
                  <tr>
                    <td colspan="2" class="text-right total-row"><i class="fa fa-calculator"></i> Total Units</td>
                    <td class="text-center total-row"><?php echo number_format($totalUnits, 2); ?></td>
                    <td colspan="5"></td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="tab-pane" id="adddrop">
          <!-- optionally include adding/dropping content -->
        </div>

        <!-- <div class="tab-pane" id="settings">
          <?php require_once("updateyearlevel.php"); ?>
        </div> -->
      </div>
    </div>
  </div>
</div>
</div>

<!-- Modal Photo -->
<div class="modal fade" id="myModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <button class="close text-white" data-dismiss="modal" type="button">&times;</button>
        <h4 class="modal-title">Upload New Profile Image</h4>
      </div>
      <form action="student/controller.php?action=photos" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="photo">Select Image:</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
            <input id="photo" name="photo" type="file" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
          <button class="btn btn-primary" name="savephoto" type="submit">Upload</button>
        </div>
      </form>
    </div>
  </div>
</div>
