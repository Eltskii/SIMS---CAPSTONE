<?php
// Test instructor data queries
require_once '../include/initialize.php';

// Simulate instructor login
$_SESSION['ACCOUNT_ID'] = 17; // Shakira B. Herman (current instructor account)
$_SESSION['ACCOUNT_TYPE'] = 'Instructor';

// Get current semester and SY like the system does
$sem = new Semester();
$resSem = $sem->single_semester();
$_SESSION['SEMESTER'] = isset($resSem->SEMESTER) ? $resSem->SEMESTER : 'First';
$currentyear = date('Y');
$nextyear = date('Y') + 1;
$_SESSION['SY'] = $currentyear .'-'.$nextyear;

echo "<h2>Testing Instructor Dashboard Data Collection</h2>";
echo "<p><strong>Account ID:</strong> {$_SESSION['ACCOUNT_ID']}</p>";
echo "<p><strong>Semester:</strong> {$_SESSION['SEMESTER']}</p>";
echo "<p><strong>School Year:</strong> {$_SESSION['SY']}</p>";
echo "<hr>";

// Test 1: Get instructor info
$mydb->setQuery("SELECT INST_ID, INST_NAME, DEPT_ID FROM tblinstructor WHERE ACCOUNT_ID = {$_SESSION['ACCOUNT_ID']} LIMIT 1");
$instructorInfo = $mydb->loadSingleResult();

if ($instructorInfo) {
    $instId = intval($instructorInfo->INST_ID);
    echo "<h3>✓ Instructor Found</h3>";
    echo "<p>ID: {$instructorInfo->INST_ID}, Name: {$instructorInfo->INST_NAME}, Dept ID: {$instructorInfo->DEPT_ID}</p>";
    
    $currentSem = $_SESSION['SEMESTER'];
    $currentSY = $_SESSION['SY'];
    
    // Test 2: Count total classes
    $mydb->setQuery("
        SELECT COUNT(DISTINCT schedID) AS cnt 
        FROM tblschedule 
        WHERE INST_ID = $instId
        AND sched_semester = '" . addslashes($currentSem) . "'
        AND sched_sy = '" . addslashes($currentSY) . "'
    ");
    $result = $mydb->loadSingleResult();
    echo "<h3>✓ Total Classes</h3>";
    echo "<p>Count: " . ($result ? $result->cnt : 0) . "</p>";
    
    // Test 3: Get all schedules
    $mydb->setQuery("
        SELECT 
            sch.schedID,
            sch.sched_time,
            sch.sched_day,
            sch.sched_room,
            sch.SECTION,
            subj.SUBJ_CODE,
            subj.SUBJ_DESCRIPTION,
            c.COURSE_NAME,
            c.COURSE_LEVEL
        FROM tblschedule sch
        JOIN subject subj ON sch.SUBJ_ID = subj.SUBJ_ID
        JOIN course c ON sch.COURSE_ID = c.COURSE_ID
        WHERE sch.INST_ID = $instId
        AND sch.sched_semester = '" . addslashes($currentSem) . "'
        AND sch.sched_sy = '" . addslashes($currentSY) . "'
        ORDER BY subj.SUBJ_CODE
    ");
    $classes = $mydb->loadResultList();
    
    echo "<h3>✓ Classes Found</h3>";
    if ($classes) {
        echo "<table border='1' cellpadding='5' style='border-collapse: collapse; margin: 10px 0;'>";
        echo "<tr><th>ID</th><th>Subject</th><th>Course</th><th>Section</th><th>Day</th><th>Time</th><th>Room</th></tr>";
        foreach ($classes as $class) {
            echo "<tr>";
            echo "<td>{$class->schedID}</td>";
            echo "<td>{$class->SUBJ_CODE} - {$class->SUBJ_DESCRIPTION}</td>";
            echo "<td>{$class->COURSE_NAME}</td>";
            echo "<td>{$class->SECTION}</td>";
            echo "<td>{$class->sched_day}</td>";
            echo "<td>{$class->sched_time}</td>";
            echo "<td>{$class->sched_room}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='color: red;'>No classes found!</p>";
    }
    
    // Test 4: Check today's schedule
    $dayOfWeek = date('l');
    $dayMapping = [
        'Monday' => 'M',
        'Tuesday' => 'T', 
        'Wednesday' => 'W',
        'Thursday' => 'TH',
        'Friday' => 'F',
        'Saturday' => 'S'
    ];
    $today = isset($dayMapping[$dayOfWeek]) ? $dayMapping[$dayOfWeek] : '';
    
    echo "<h3>Today's Schedule</h3>";
    echo "<p>Day of Week: $dayOfWeek → Abbreviation: $today</p>";
    
    if ($today) {
        $mydb->setQuery("
            SELECT 
                sch.schedID,
                sch.sched_time,
                sch.sched_day,
                sch.sched_room,
                sch.SECTION,
                subj.SUBJ_CODE,
                subj.SUBJ_DESCRIPTION,
                c.COURSE_NAME
            FROM tblschedule sch
            JOIN subject subj ON sch.SUBJ_ID = subj.SUBJ_ID
            JOIN course c ON sch.COURSE_ID = c.COURSE_ID
            WHERE sch.INST_ID = $instId
            AND sch.sched_semester = '" . addslashes($currentSem) . "'
            AND sch.sched_sy = '" . addslashes($currentSY) . "'
            AND (sch.sched_day LIKE '%$today%' OR sch.sched_day = 'Daily')
            ORDER BY sch.TIME_FROM
        ");
        $todaySchedule = $mydb->loadResultList();
        
        if ($todaySchedule && count($todaySchedule) > 0) {
            echo "<p style='color: green;'>✓ Found " . count($todaySchedule) . " class(es) today</p>";
            echo "<table border='1' cellpadding='5' style='border-collapse: collapse;'>";
            echo "<tr><th>Time</th><th>Subject</th><th>Course</th><th>Section</th><th>Room</th></tr>";
            foreach ($todaySchedule as $sched) {
                echo "<tr>";
                echo "<td>{$sched->sched_time}</td>";
                echo "<td>{$sched->SUBJ_CODE}</td>";
                echo "<td>{$sched->COURSE_NAME}</td>";
                echo "<td>{$sched->SECTION}</td>";
                echo "<td>{$sched->sched_room}</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='color: orange;'>No classes scheduled for today</p>";
        }
    }
    
} else {
    echo "<h3 style='color: red;'>✗ No instructor found for Account ID {$_SESSION['ACCOUNT_ID']}</h3>";
}

echo "<hr>";
echo "<p><a href='home.php'>Go to Dashboard</a></p>";
?>
