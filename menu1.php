<?php
// menu1.php - improved styling only (logic unchanged)
?>
<style>
/* Small, safe styling to soften text and improve spacing */
.menu1-wrapper { padding: 8px 12px; }
.course-card { margin-bottom: 10px; border-radius: 6px; border: 1px solid #eee; background: #fff; box-shadow: 0 2px 4px rgba(0,0,0,0.03); }
.course-heading { padding: 10px 12px; background: #fafafa; border-bottom: 1px solid #f0f0f0; border-top-left-radius:6px; border-top-right-radius:6px; color: rgba(0,0,0,0.75); font-weight:600; }
.course-body { padding: 10px 14px; color: rgba(0,0,0,0.65); }
.course-list { margin:0; padding-left:0; list-style:none; }
.course-list li { padding: 6px 0; border-bottom: 1px dashed #f2f2f2; display:flex; align-items:flex-start; justify-content:space-between; }
.course-list li:last-child { border-bottom: none; }
.major-desc { color: rgba(0,0,0,0.62); font-size: 14px; line-height:1.3; margin-right:10px; }
.major-badge { background: #f0f7f0; color: #2c7a2c; border-radius: 12px; padding: 4px 8px; font-size: 12px; font-weight:600; }
.empty-note { color: #777; padding:12px; text-align:center; }
</style>

<!-- Projects Row -->
<div class="row">
  <div class="col-md-12 menu1-wrapper">
    <?php
    require_once("include/initialize.php");

    $deptId = intval($_POST['id']); // security: cast to int
    $sql = "SELECT * FROM `course` WHERE `DEPT_ID` = {$deptId} ORDER BY COURSE_NAME, COURSE_LEVEL, COURSE_MAJOR";
    $mydb->setQuery($sql);
    $cur = $mydb->loadResultList();

    // Group majors under each course name + level
    $grouped = [];
    foreach ($cur as $result) {
      // keep original fields but escape when printing
      $key = $result->COURSE_NAME . ' - ' . $result->COURSE_LEVEL;
      if (!isset($grouped[$key])) {
        $grouped[$key] = [];
      }
      $grouped[$key][] = [
        'major' => $result->COURSE_MAJOR,
        'desc'  => $result->COURSE_DESC
      ];
    }

    // Display grouped list
    if (!empty($grouped)) {
      foreach ($grouped as $courseKey => $majors) {
        // escape the heading parts safely
        $safeCourseKey = htmlspecialchars($courseKey, ENT_QUOTES, 'UTF-8');
        echo '<div class="course-card">';
        echo '<div class="course-heading">' . $safeCourseKey . '</div>';
        echo '<div class="course-body">';
        echo '<ul class="course-list">';
        foreach ($majors as $m) {
          $majorText = !empty($m['major']) ? htmlspecialchars($m['major'], ENT_QUOTES, 'UTF-8') : '';
          $descText  = !empty($m['desc'])  ? htmlspecialchars($m['desc'], ENT_QUOTES, 'UTF-8')  : '';
          // show the course description on left, major badge on right (if exists)
          echo '<li>';
          echo '<div class="major-desc">' . $descText . '</div>';
          echo '<div>';
          if ($majorText !== '') {
            echo '<span class="major-badge">' . $majorText . '</span>';
          }
          echo '</div>';
          echo '</li>';
        }
        echo '</ul>';
        echo '</div>'; // course-body
        echo '</div>'; // course-card
      }
    } else {
      echo '<div class="empty-note">No courses found for this department.</div>';
    }
    ?>
  </div>
</div>
<!-- /.row -->
