<?php
/**
 * Department Filtering Middleware
 * ================================
 * Provides functions to filter data by department for Chairpersons
 * 
 * Usage:
 * - Include this file in your module: require_once(LIB_PATH.DS.'department-filter.php');
 * - Use getDepartmentFilter() to get WHERE clause
 * - Use requireDepartmentAccess() to enforce access control
 */

/**
 * Get the current user's department ID
 * @return int|null Department ID or null if not a Chairperson
 */
function getCurrentDepartmentId() {
    if (!isset($_SESSION['ACCOUNT_TYPE']) || !isset($_SESSION['ACCOUNT_ID'])) {
        return null;
    }
    
    // Only Chairpersons have department restrictions
    if ($_SESSION['ACCOUNT_TYPE'] !== 'Chairperson') {
        return null;
    }
    
    // Check if DEPT_ID is already in session
    if (isset($_SESSION['DEPT_ID']) && $_SESSION['DEPT_ID'] > 0) {
        return (int)$_SESSION['DEPT_ID'];
    }
    
    // Fetch from database if not in session
    global $mydb;
    $accountId = (int)$_SESSION['ACCOUNT_ID'];
    $mydb->setQuery("SELECT DEPT_ID FROM useraccounts WHERE ACCOUNT_ID = {$accountId}");
    $result = $mydb->loadSingleResult();
    
    if ($result && isset($result->DEPT_ID)) {
        $_SESSION['DEPT_ID'] = (int)$result->DEPT_ID;
        return (int)$result->DEPT_ID;
    }
    
    return null;
}

/**
 * Get department filter SQL clause
 * 
 * @param string $tableAlias Table alias to use (e.g., 'c' for course, 's' for subject)
 * @param string $column Column name containing DEPT_ID (default: 'DEPT_ID')
 * @return string SQL WHERE clause (empty string if no filter needed)
 * 
 * Example:
 * $filter = getDepartmentFilter('c'); // Returns "AND c.DEPT_ID = 5" for Chairperson
 * $sql = "SELECT * FROM course c WHERE 1=1 " . $filter;
 */
function getDepartmentFilter($tableAlias = '', $column = 'DEPT_ID') {
    $deptId = getCurrentDepartmentId();
    
    // No filter for Administrators, Registrars, and Instructors
    if ($deptId === null) {
        return '';
    }
    
    $prefix = $tableAlias ? "{$tableAlias}." : '';
    return " AND {$prefix}{$column} = {$deptId} ";
}

/**
 * Check if current user has access to a specific department
 * 
 * @param int $deptId Department ID to check
 * @return bool True if user has access, False otherwise
 */
function hasDepartmentAccess($deptId) {
    // Administrators and Registrars have access to all departments
    if (in_array($_SESSION['ACCOUNT_TYPE'], ['Registrar', 'Registrar'])) {
        return true;
    }
    
    // Chairpersons only have access to their assigned department
    if ($_SESSION['ACCOUNT_TYPE'] === 'Chairperson') {
        $userDeptId = getCurrentDepartmentId();
        return ($userDeptId == $deptId);
    }
    
    return false;
}

/**
 * Require department access or redirect
 * Use this at the top of pages that should be department-restricted
 * 
 * @param int|null $deptId Department ID to check (null = check if user has any department)
 * @param string $redirectUrl URL to redirect to on failure
 */
function requireDepartmentAccess($deptId = null, $redirectUrl = 'index.php') {
    if (!isset($_SESSION['ACCOUNT_TYPE'])) {
        message("Unauthorized access.", "error");
        redirect($redirectUrl);
        return;
    }
    
    // Administrators and Registrars always have access
    if (in_array($_SESSION['ACCOUNT_TYPE'], ['Registrar', 'Registrar'])) {
        return;
    }
    
    // Chairperson must have a department assigned
    if ($_SESSION['ACCOUNT_TYPE'] === 'Chairperson') {
        $userDeptId = getCurrentDepartmentId();
        
        if ($userDeptId === null) {
            message("Your account is not assigned to a department. Please contact the administrator.", "error");
            redirect($redirectUrl);
            return;
        }
        
        // If checking specific department access
        if ($deptId !== null && $userDeptId != $deptId) {
            message("You do not have access to this department's data.", "error");
            redirect($redirectUrl);
            return;
        }
    }
}

/**
 * Get department name for current user
 * 
 * @return string Department name or empty string
 */
function getCurrentDepartmentName() {
    $deptId = getCurrentDepartmentId();
    
    if ($deptId === null) {
        return '';
    }
    
    global $mydb;
    $mydb->setQuery("SELECT DEPARTMENT_NAME FROM department WHERE DEPT_ID = {$deptId}");
    $result = $mydb->loadSingleResult();
    
    return $result ? $result->DEPARTMENT_NAME : '';
}

/**
 * Filter course query by department
 * 
 * @param string $baseQuery Base SQL query
 * @return string Modified query with department filter
 */
function filterCoursesByDepartment($baseQuery) {
    $filter = getDepartmentFilter('c');
    
    // If query already has WHERE clause
    if (stripos($baseQuery, 'WHERE') !== false) {
        return str_replace('WHERE', 'WHERE 1=1 ' . $filter . ' AND ', $baseQuery);
    }
    
    // Add WHERE clause
    return $baseQuery . ' WHERE 1=1 ' . $filter;
}

/**
 * Filter subject query by department (via course)
 * 
 * @param string $baseQuery Base SQL query
 * @return string Modified query with department filter
 */
function filterSubjectsByDepartment($baseQuery) {
    $deptId = getCurrentDepartmentId();
    
    if ($deptId === null) {
        return $baseQuery;
    }
    
    // Subjects link to courses, courses link to departments
    $filter = " AND s.COURSE_ID IN (SELECT COURSE_ID FROM course WHERE DEPT_ID = {$deptId}) ";
    
    if (stripos($baseQuery, 'WHERE') !== false) {
        return str_replace('WHERE', 'WHERE 1=1 ' . $filter . ' AND ', $baseQuery);
    }
    
    return $baseQuery . ' WHERE 1=1 ' . $filter;
}

/**
 * Get departments for dropdown
 * Returns all departments for Registrars, only assigned department for Chairpersons
 * 
 * @return array Array of department objects
 */
function getDepartmentsForUser() {
    global $mydb;
    
    if ($_SESSION['ACCOUNT_TYPE'] === 'Registrar') {
        // Return all departments
        $mydb->setQuery("SELECT * FROM department ORDER BY DEPARTMENT_NAME");
        return $mydb->loadResultList();
    }
    
    if ($_SESSION['ACCOUNT_TYPE'] === 'Chairperson') {
        $deptId = getCurrentDepartmentId();
        if ($deptId !== null) {
            $mydb->setQuery("SELECT * FROM department WHERE DEPT_ID = {$deptId}");
            return $mydb->loadResultList();
        }
    }
    
    return [];
}

/**
 * Check if current user is Chairperson
 * 
 * @return bool
 */
function isChairperson() {
    return isset($_SESSION['ACCOUNT_TYPE']) && $_SESSION['ACCOUNT_TYPE'] === 'Chairperson';
}

/**
 * Check if current user is Registrar (has full admin access)
 * 
 * @return bool
 */
function isAdministrator() {
    return isset($_SESSION['ACCOUNT_TYPE']) && $_SESSION['ACCOUNT_TYPE'] === 'Registrar';
}

/**
 * Check if current user is Registrar
 * 
 * @return bool
 */
function isRegistrar() {
    return isset($_SESSION['ACCOUNT_TYPE']) && $_SESSION['ACCOUNT_TYPE'] === 'Registrar';
}


/**
 * Display department badge in UI
 * 
 * @return string HTML badge
 */
function displayDepartmentBadge() {
    if (!isChairperson()) {
        return '';
    }
    
    $deptName = getCurrentDepartmentName();
    if (empty($deptName)) {
        return '<span class="label label-warning">No Department Assigned</span>';
    }
    
    return '<span class="label label-info"><i class="fa fa-building"></i> ' . htmlspecialchars($deptName) . '</span>';
}

?>
