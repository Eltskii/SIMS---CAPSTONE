<?php
/**
 * Password Reset Helper Class
 * 
 * Handles password reset token generation, validation, and email sending
 * @version 1.0.0
 * @date 2025-11-18
 */

class PasswordReset {
    
    private $mydb;
    private $tokenExpiryHours = 1; // Token expires after 1 hour
    
    public function __construct() {
        global $mydb;
        $this->mydb = $mydb;
    }
    
    /**
     * Generate a cryptographically secure random token
     * @return string 64-character hex token
     */
    private function generateToken() {
        return bin2hex(random_bytes(32));
    }
    
    /**
     * Get client IP address (handles proxies)
     * @return string IP address
     */
    private function getClientIP() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
        }
        return filter_var($ip, FILTER_VALIDATE_IP) ? $ip : '0.0.0.0';
    }
    
    /**
     * Request a password reset
     * @param string $emailOrUsername Email address or username
     * @return array ['success' => bool, 'message' => string, 'email' => string (if success)]
     */
    public function requestReset($emailOrUsername) {
        $input = trim($emailOrUsername);
        
        if (empty($input)) {
            return ['success' => false, 'message' => 'Please provide your email address or username.'];
        }
        
        // Find student by email or username
        $safeInput = $this->mydb->escape_value($input);
        
        $sql = "SELECT IDNO, FNAME, LNAME, EMAIL, ACC_USERNAME 
                FROM tblstudent 
                WHERE EMAIL = '{$safeInput}' OR ACC_USERNAME = '{$safeInput}' 
                LIMIT 1";
        
        $this->mydb->setQuery($sql);
        $student = $this->mydb->loadSingleResult();
        
        if (!$student) {
            // SECURITY: Don't reveal whether email exists or not
            return [
                'success' => true, 
                'message' => 'If an account exists with that email or username, a password reset link has been sent.',
                'email' => $input  // For display only, not actual email
            ];
        }
        
        // Check if student has an email
        if (empty($student->EMAIL)) {
            return [
                'success' => false, 
                'message' => 'No email address is associated with this account. Please contact the administrator for assistance.'
            ];
        }
        
        // Check rate limiting: Max 3 reset requests per hour per email
        $email = $student->EMAIL;
        $safeEmail = $this->mydb->escape_value($email);
        $oneHourAgo = date('Y-m-d H:i:s', strtotime('-1 hour'));
        
        $countSql = "SELECT COUNT(*) as cnt FROM password_reset_tokens 
                     WHERE email = '{$safeEmail}' 
                     AND created_at > '{$oneHourAgo}'";
        $this->mydb->setQuery($countSql);
        $result = $this->mydb->loadSingleResult();
        
        if ($result && intval($result->cnt) >= 3) {
            return [
                'success' => false,
                'message' => 'Too many reset requests. Please wait an hour before trying again.'
            ];
        }
        
        // Delete any existing unused tokens for this email
        $deleteSql = "DELETE FROM password_reset_tokens 
                      WHERE email = '{$safeEmail}' AND used = FALSE";
        $this->mydb->setQuery($deleteSql);
        $this->mydb->executeQuery();
        
        // Generate new token
        $token = $this->generateToken();
        $expiresAt = date('Y-m-d H:i:s', strtotime("+{$this->tokenExpiryHours} hour"));
        $ipAddress = $this->getClientIP();
        
        // Store token in database
        $safeToken = $this->mydb->escape_value($token);
        $safeIP = $this->mydb->escape_value($ipAddress);
        
        $insertSql = "INSERT INTO password_reset_tokens (email, token, expires_at, ip_address) 
                      VALUES ('{$safeEmail}', '{$safeToken}', '{$expiresAt}', '{$safeIP}')";
        
        $this->mydb->setQuery($insertSql);
        
        if (!$this->mydb->executeQuery()) {
            error_log("Failed to create password reset token for: " . $email);
            return [
                'success' => false,
                'message' => 'An error occurred. Please try again later.'
            ];
        }
        
        // Send email with reset link
        $fullName = trim(($student->FNAME ?? '') . ' ' . ($student->LNAME ?? ''));
        $emailSent = $this->sendResetEmail($email, $token, $fullName);
        
        if (!$emailSent) {
            error_log("Failed to send password reset email to: " . $email);
            // Don't reveal email sending failure to user
        }
        
        return [
            'success' => true,
            'message' => 'If an account exists with that email or username, a password reset link has been sent.',
            'email' => $email
        ];
    }
    
    /**
     * Send password reset email
     * @param string $email Recipient email
     * @param string $token Reset token
     * @param string $name Student name
     * @return bool Success status
     */
    private function sendResetEmail($email, $token, $name = 'Student') {
        global $web_root;
        
        $resetLink = $web_root . "reset-password.php?token=" . urlencode($token);
        $subject = "Password Reset Request - BSU Bokod Campus SIMS";
        
        // HTML email body
        $htmlMessage = "
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #27ae60, #219653); color: white; padding: 30px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { background: #f8f9fa; padding: 30px; border-radius: 0 0 8px 8px; }
        .button { display: inline-block; padding: 15px 30px; background: #27ae60; color: white !important; text-decoration: none; border-radius: 6px; font-weight: bold; margin: 20px 0; }
        .button:hover { background: #219653; }
        .footer { text-align: center; margin-top: 30px; font-size: 12px; color: #6c757d; }
        .warning { background: #fff3cd; border-left: 4px solid #ffc107; padding: 15px; margin: 20px 0; border-radius: 4px; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h1 style='margin: 0;'>Password Reset Request</h1>
            <p style='margin: 10px 0 0 0;'>Benguet State University - Bokod Campus</p>
        </div>
        <div class='content'>
            <p>Hello <strong>" . htmlspecialchars($name) . "</strong>,</p>
            
            <p>We received a request to reset your password for your SIMS account. Click the button below to set a new password:</p>
            
            <p style='text-align: center;'>
                <a href='" . htmlspecialchars($resetLink) . "' class='button'>Reset Your Password</a>
            </p>
            
            <p>Or copy and paste this link into your browser:</p>
            <p style='background: white; padding: 12px; border-radius: 4px; word-break: break-all; font-size: 13px;'>" . htmlspecialchars($resetLink) . "</p>
            
            <div class='warning'>
                <strong>⏰ Important:</strong> This link will expire in {$this->tokenExpiryHours} hour(s) for security reasons.
            </div>
            
            <p><strong>Didn't request this?</strong><br>
            If you didn't ask to reset your password, you can safely ignore this email. Your password will remain unchanged.</p>
            
            <p>For security reasons, we recommend:</p>
            <ul>
                <li>Using a strong, unique password</li>
                <li>Never sharing your password with anyone</li>
                <li>Enabling email notifications for account changes</li>
            </ul>
        </div>
        <div class='footer'>
            <p>This is an automated message from BSU Bokod Campus Student Information Management System.</p>
            <p>If you need assistance, please contact the registrar's office.</p>
            <p>&copy; " . date('Y') . " Benguet State University - Bokod Campus</p>
        </div>
    </div>
</body>
</html>
";
        
        // Plain text version (fallback)
        $plainMessage = "Hello $name,\n\n";
        $plainMessage .= "We received a request to reset your password for your SIMS account.\n\n";
        $plainMessage .= "To reset your password, click this link (or copy and paste it into your browser):\n";
        $plainMessage .= "$resetLink\n\n";
        $plainMessage .= "This link will expire in {$this->tokenExpiryHours} hour(s) for security reasons.\n\n";
        $plainMessage .= "If you didn't request this, you can safely ignore this email.\n\n";
        $plainMessage .= "BSU Bokod Campus SIMS";
        
        // Email headers
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $headers .= "From: BSU Bokod Campus SIMS <noreply@bsubokod.edu.ph>\r\n";
        $headers .= "Reply-To: registrar@bsubokod.edu.ph\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        
        // Send email
        $mailSent = @mail($email, $subject, $htmlMessage, $headers);
        
        // Log email attempt
        if ($mailSent) {
            error_log("Password reset email sent successfully to: " . $email);
        } else {
            error_log("Failed to send password reset email to: " . $email);
        }
        
        return $mailSent;
    }
    
    /**
     * Validate a reset token
     * @param string $token The token to validate
     * @return array ['valid' => bool, 'message' => string, 'email' => string (if valid)]
     */
    public function validateToken($token) {
        $token = trim($token);
        
        if (empty($token)) {
            return ['valid' => false, 'message' => 'Invalid reset link.'];
        }
        
        $safeToken = $this->mydb->escape_value($token);
        $now = date('Y-m-d H:i:s');
        
        $sql = "SELECT * FROM password_reset_tokens 
                WHERE token = '{$safeToken}' 
                LIMIT 1";
        
        $this->mydb->setQuery($sql);
        $tokenData = $this->mydb->loadSingleResult();
        
        if (!$tokenData) {
            return ['valid' => false, 'message' => 'Invalid or expired reset link.'];
        }
        
        // Check if already used
        if ($tokenData->used) {
            return ['valid' => false, 'message' => 'This reset link has already been used.'];
        }
        
        // Check if expired
        if ($tokenData->expires_at < $now) {
            return ['valid' => false, 'message' => 'This reset link has expired. Please request a new one.'];
        }
        
        return [
            'valid' => true,
            'message' => 'Token is valid.',
            'email' => $tokenData->email
        ];
    }
    
    /**
     * Reset password using a valid token
     * @param string $token Reset token
     * @param string $newPassword New password
     * @return array ['success' => bool, 'message' => string]
     */
    public function resetPassword($token, $newPassword) {
        // Validate token first
        $validation = $this->validateToken($token);
        
        if (!$validation['valid']) {
            return ['success' => false, 'message' => $validation['message']];
        }
        
        $email = $validation['email'];
        
        // Validate password strength
        if (strlen($newPassword) < 8) {
            return ['success' => false, 'message' => 'Password must be at least 8 characters long.'];
        }
        
        // Find student by email
        $safeEmail = $this->mydb->escape_value($email);
        $sql = "SELECT IDNO FROM tblstudent WHERE EMAIL = '{$safeEmail}' LIMIT 1";
        $this->mydb->setQuery($sql);
        $student = $this->mydb->loadSingleResult();
        
        if (!$student) {
            return ['success' => false, 'message' => 'Student account not found.'];
        }
        
        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $safeHash = $this->mydb->escape_value($hashedPassword);
        $idno = intval($student->IDNO);
        $now = date('Y-m-d H:i:s');
        
        // Update student password
        $updateSql = "UPDATE tblstudent 
                      SET ACC_PASSWORD = '{$safeHash}',
                          last_password_reset = '{$now}',
                          password_reset_count = password_reset_count + 1
                      WHERE IDNO = {$idno} 
                      LIMIT 1";
        
        $this->mydb->setQuery($updateSql);
        
        if (!$this->mydb->executeQuery()) {
            error_log("Failed to update password for IDNO: " . $idno);
            return ['success' => false, 'message' => 'Failed to update password. Please try again.'];
        }
        
        // Mark token as used
        $safeToken = $this->mydb->escape_value($token);
        $markUsedSql = "UPDATE password_reset_tokens 
                        SET used = TRUE, used_at = '{$now}'
                        WHERE token = '{$safeToken}' 
                        LIMIT 1";
        
        $this->mydb->setQuery($markUsedSql);
        $this->mydb->executeQuery();
        
        // Log successful password reset
        error_log("Password reset successful for IDNO: " . $idno . " (Email: " . $email . ")");
        
        return [
            'success' => true,
            'message' => 'Your password has been successfully reset. You can now log in with your new password.'
        ];
    }
    
    /**
     * Clean up expired tokens (maintenance function)
     * Should be called periodically (e.g., daily cron job)
     * @return int Number of tokens deleted
     */
    public function cleanupExpiredTokens() {
        $now = date('Y-m-d H:i:s');
        
        $sql = "DELETE FROM password_reset_tokens 
                WHERE expires_at < '{$now}' OR used = TRUE";
        
        $this->mydb->setQuery($sql);
        $this->mydb->executeQuery();
        
        // Return number of deleted rows (if supported by your DB class)
        return 0; // Modify based on your Database class implementation
    }
}
?>
