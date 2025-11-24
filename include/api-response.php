<?php
/**
 * API Response Helper Class
 * Provides standardized JSON responses for AJAX requests
 */

class ApiResponse {
    
    /**
     * Send JSON success response
     * 
     * @param string $message Success message
     * @param array $data Additional data to include
     * @param int $code HTTP status code
     */
    public static function success($message = 'Operation successful', $data = array(), $code = 200) {
        http_response_code($code);
        header('Content-Type: application/json');
        
        $response = array(
            'success' => true,
            'message' => $message
        );
        
        if (!empty($data)) {
            $response = array_merge($response, $data);
        }
        
        echo json_encode($response);
        exit;
    }
    
    /**
     * Send JSON error response
     * 
     * @param string $message Error message
     * @param array $errors Validation errors (field => message)
     * @param int $code HTTP status code
     */
    public static function error($message = 'Operation failed', $errors = array(), $code = 400) {
        http_response_code($code);
        header('Content-Type: application/json');
        
        $response = array(
            'success' => false,
            'message' => $message
        );
        
        if (!empty($errors)) {
            $response['errors'] = $errors;
        }
        
        echo json_encode($response);
        exit;
    }
    
    /**
     * Send JSON validation error response
     * 
     * @param array $errors Validation errors (field => message)
     * @param string $message General error message
     */
    public static function validationError($errors, $message = 'Validation failed') {
        self::error($message, $errors, 422);
    }
    
    /**
     * Send JSON not found response
     * 
     * @param string $message Error message
     */
    public static function notFound($message = 'Resource not found') {
        self::error($message, array(), 404);
    }
    
    /**
     * Send JSON unauthorized response
     * 
     * @param string $message Error message
     */
    public static function unauthorized($message = 'Unauthorized access') {
        self::error($message, array(), 401);
    }
    
    /**
     * Send JSON forbidden response
     * 
     * @param string $message Error message
     */
    public static function forbidden($message = 'Access forbidden') {
        self::error($message, array(), 403);
    }
    
    /**
     * Format DataTables server-side response
     * 
     * @param int $draw Draw counter from DataTables request
     * @param int $totalRecords Total records without filtering
     * @param int $filteredRecords Total records after filtering
     * @param array $data Array of data rows
     */
    public static function dataTables($draw, $totalRecords, $filteredRecords, $data) {
        header('Content-Type: application/json');
        
        $response = array(
            'draw' => intval($draw),
            'recordsTotal' => intval($totalRecords),
            'recordsFiltered' => intval($filteredRecords),
            'data' => $data
        );
        
        echo json_encode($response);
        exit;
    }
    
    /**
     * Check if current request is AJAX
     * 
     * @return bool
     */
    public static function isAjax() {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
               strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }
    
    /**
     * Require AJAX request or send error
     * 
     * @param string $message Error message if not AJAX
     */
    public static function requireAjax($message = 'This endpoint requires AJAX request') {
        if (!self::isAjax()) {
            self::error($message, array(), 400);
        }
    }
    
    /**
     * Validate required fields
     * 
     * @param array $fields Array of field names to validate
     * @param array $data Data array to check (default: $_POST)
     * @return array Array of validation errors
     */
    public static function validateRequired($fields, $data = null) {
        if ($data === null) {
            $data = $_POST;
        }
        
        $errors = array();
        
        foreach ($fields as $field) {
            if (!isset($data[$field]) || trim($data[$field]) === '') {
                $fieldName = ucfirst(str_replace('_', ' ', $field));
                $errors[$field] = $fieldName . ' is required';
            }
        }
        
        return $errors;
    }
    
    /**
     * Sanitize input data
     * 
     * @param mixed $data Data to sanitize
     * @param object $db Database object for escaping
     * @return mixed Sanitized data
     */
    public static function sanitize($data, $db = null) {
        global $mydb;
        
        if ($db === null) {
            $db = $mydb;
        }
        
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $data[$key] = self::sanitize($value, $db);
            }
            return $data;
        }
        
        // Trim whitespace
        $data = trim($data);
        
        // Escape for database if db object available
        if ($db && method_exists($db, 'escape_value')) {
            $data = $db->escape_value($data);
        }
        
        return $data;
    }
}
?>
