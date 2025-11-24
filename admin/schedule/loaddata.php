<?php 
require_once ("../../include/initialize.php");

// Validate inputs
if (!isset($_POST['id']) || !isset($_POST['SEMESTER'])) {
    echo '<option value="">Invalid request</option>';
    exit;
}

$courseId = intval($_POST['id']);
$semester = $mydb->escape_value($_POST['SEMESTER']);

// Fetch subjects for the selected course and semester
$mydb->setQuery("SELECT SUBJ_ID, SUBJ_CODE, SUBJ_DESCRIPTION, UNIT 
                 FROM `subject` 
                 WHERE COURSE_ID = {$courseId} 
                 AND SEMESTER = '{$semester}' 
                 ORDER BY SUBJ_CODE");
$cur = $mydb->loadResultList();

if (empty($cur)) {
    echo '<option value="">No subjects available</option>';
} else {
    foreach ($cur as $result) {
        $subjCode = htmlspecialchars($result->SUBJ_CODE);
        $subjDesc = htmlspecialchars($result->SUBJ_DESCRIPTION);
        $unit = htmlspecialchars($result->UNIT);
        echo '<option value="' . $result->SUBJ_ID . '">' . $subjCode . ' - ' . $subjDesc . ' (' . $unit . ' units)</option>';
    }
}
?>
