<?php
header('Content-Type: application/json; charset=utf-8');

// Debug: Log the request
error_log("=== GET_MAJORS DEBUG ===");
error_log("REQUEST: " . print_r($_REQUEST, true));

// Include database connection
$included = false;
$try = [
    __DIR__ . '/initialize.php',
    __DIR__ . '/../include/initialize.php',
    __DIR__ . '/database.php',
    __DIR__ . '/../include/database.php'
];
foreach ($try as $p) {
    if (file_exists($p)) {
        require_once $p;
        $included = true;
        break;
    }
}

if (!$included) {
    error_log("DEBUG: Could not include database files");
    echo json_encode(['error' => 'initialize.php not found or DB not available']);
    exit;
}

// Get parameters
$group = isset($_REQUEST['group']) ? trim($_REQUEST['group']) : '';
error_log("DEBUG: Raw group parameter: '$group'");

// Parse group parameter
$course_name = '';
$course_level = '';

if ($group !== '' && (strpos($group, '||') !== false)) {
    $parts = explode('||', $group, 2);
    $course_name = trim(urldecode($parts[0]));
    $course_level = trim(urldecode($parts[1]));
}

error_log("DEBUG: Parsed - course_name: '$course_name', course_level: '$course_level'");

if ($course_name === '' || $course_level === '') {
    error_log("DEBUG: Missing course_name or course_level");
    echo json_encode([]);
    exit;
}

// Check database connection
if (!isset($mydb) || !isset($mydb->conn)) {
    error_log("DEBUG: No database connection");
    echo json_encode(['error' => 'DB connection not found']);
    exit;
}

$conn = $mydb->conn;

// Debug: Check if table exists
$result = $conn->query("SHOW TABLES LIKE 'course'");
if ($result->num_rows == 0) {
    error_log("DEBUG: Course table doesn't exist");
    echo json_encode(['error' => 'Course table not found']);
    exit;
}

// Escape parameters
$cn = $conn->real_escape_string($course_name);
$cl = $conn->real_escape_string($course_level);

error_log("DEBUG: Escaped - course_name: '$cn', course_level: '$cl'");

// Build and execute query
$sql = "SELECT COURSE_ID, COURSE_MAJOR, COURSE_NAME, COURSE_LEVEL
        FROM course
        WHERE COURSE_NAME = '$cn' AND COURSE_LEVEL = '$cl'
        ORDER BY COURSE_MAJOR ASC";

error_log("DEBUG: SQL Query: $sql");

$result = $conn->query($sql);
if (!$result) {
    error_log("DEBUG: Query failed: " . $conn->error);
    echo json_encode(['error' => 'SQL error: ' . $conn->error]);
    exit;
}

error_log("DEBUG: Rows found: " . $result->num_rows);

$out = [];
while ($row = $result->fetch_assoc()) {
    error_log("DEBUG: Row: " . print_r($row, true));
    $out[] = [
        'COURSE_ID' => (int)$row['COURSE_ID'],
        'COURSE_MAJOR' => $row['COURSE_MAJOR'],
        'COURSE_NAME' => $row['COURSE_NAME'],
        'COURSE_LEVEL' => $row['COURSE_LEVEL']
    ];
}

error_log("DEBUG: Final output: " . print_r($out, true));
echo json_encode($out);
exit;