<?php
require_once("include/initialize.php");
require_once("include/password-reset.php");

// Redirect if already logged in
if (isset($_SESSION['IDNO'])) {
    redirect(web_root . "index.php?q=profile");
}

$pageTitle = "Reset Password";
$token = isset($_GET['token']) ? trim($_GET['token']) : '';
$submitted = false;
$result = null;

$passwordReset = new PasswordReset();

// Validate token on page load
$tokenValidation = $passwordReset->validateToken($token);

// Handle password reset submission
if (isset($_POST['submit'])) {
    $newPassword = $_POST['new_password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';
    
    // Client-side validation
    if ($newPassword !== $confirmPassword) {
        $result = ['success' => false, 'message' => 'Passwords do not match.'];
    } else {
        $result = $passwordReset->resetPassword($token, $newPassword);
    }
    $submitted = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> | BSU Bokod Campus</title>
    <link rel="icon" type="image/png" href="<?php echo web_root; ?>img/favicon.png">
    
    <!-- Bootstrap & Font Awesome -->
    <link href="<?php echo web_root; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo web_root; ?>font/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        :root {
            --primary: #27ae60;
            --primary-dark: #219653;
            --secondary: #2c3e50;
            --danger: #e74c3c;
            --light: #f8f9fa;
            --border: #e9ecef;
            --shadow: 0 4px 12px rgba(0,0,0,0.08);
            --radius: 12px;
        }
        
        body {
            background: linear-gradient(135deg, #f0f9f4 0%, #e6f4ea 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            padding: 20px 0;
        }
        
        .reset-password-container {
            max-width: 550px;
            margin: 0 auto;
        }
        
        .card {
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border: none;
            overflow: hidden;
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 30px;
            text-align: center;
            border: none;
        }
        
        .card-header h1 {
            margin: 0 0 8px 0;
            font-size: 26px;
            font-weight: 700;
        }
        
        .card-header p {
            margin: 0;
            opacity: 0.95;
            font-size: 14px;
        }
        
        .card-body {
            padding: 35px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            font-weight: 600;
            color: var(--secondary);
            margin-bottom: 8px;
            font-size: 14px;
            display: block;
        }
        
        .form-control {
            border: 2px solid var(--border);
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 15px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(39, 174, 96, 0.1);
            outline: none;
        }
        
        .password-strength {
            height: 4px;
            background: #e9ecef;
            border-radius: 4px;
            margin-top: 8px;
            overflow: hidden;
        }
        
        .password-strength-bar {
            height: 100%;
            width: 0%;
            transition: all 0.3s ease;
            border-radius: 4px;
        }
        
        .password-strength-weak { width: 33%; background: var(--danger); }
        .password-strength-medium { width: 66%; background: #f39c12; }
        .password-strength-strong { width: 100%; background: var(--primary); }
        
        .password-requirements {
            font-size: 12px;
            color: #6c757d;
            margin-top: 8px;
        }
        
        .password-requirements li {
            margin: 4px 0;
        }
        
        .requirement-met {
            color: var(--primary);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border: none;
            padding: 14px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(39, 174, 96, 0.3);
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
        }
        
        .btn-primary:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }
        
        .back-link {
            text-align: center;
            margin-top: 20px;
        }
        
        .back-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s ease;
        }
        
        .back-link a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
        
        .success-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 40px;
        }
        
        .error-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, var(--danger), #c0392b);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 40px;
        }
        
        .message-box {
            text-align: center;
        }
        
        .message-box h2 {
            color: var(--secondary);
            font-size: 22px;
            margin-bottom: 15px;
            font-weight: 700;
        }
        
        .message-box p {
            color: #6c757d;
            line-height: 1.6;
            margin-bottom: 25px;
        }
        
        @media (max-width: 576px) {
            .card-body {
                padding: 25px;
            }
            
            .card-header {
                padding: 25px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="reset-password-container">
            <div class="card">
                <div class="card-header">
                    <h1><i class="fa fa-lock"></i> Reset Password</h1>
                    <p>Create a new password for your account</p>
                </div>
                <div class="card-body">
                    <?php if (!$tokenValidation['valid']): ?>
                        <!-- Invalid Token -->
                        <div class="message-box">
                            <div class="error-icon">
                                <i class="fa fa-times"></i>
                            </div>
                            <h2>Invalid or Expired Link</h2>
                            <p><?php echo htmlspecialchars($tokenValidation['message']); ?></p>
                            <a href="<?php echo web_root; ?>forgot-password.php" class="btn btn-primary">
                                <i class="fa fa-refresh"></i> Request New Reset Link
                            </a>
                        </div>
                    <?php elseif ($submitted && $result): ?>
                        <?php if ($result['success']): ?>
                            <!-- Success Message -->
                            <div class="message-box">
                                <div class="success-icon">
                                    <i class="fa fa-check"></i>
                                </div>
                                <h2>Password Reset Successful!</h2>
                                <p><?php echo htmlspecialchars($result['message']); ?></p>
                                <a href="<?php echo web_root; ?>index.php" class="btn btn-primary">
                                    <i class="fa fa-sign-in"></i> Login Now
                                </a>
                            </div>
                        <?php else: ?>
                            <!-- Error Message -->
                            <div class="alert alert-danger">
                                <i class="fa fa-exclamation-triangle"></i>
                                <?php echo htmlspecialchars($result['message']); ?>
                            </div>
                            <a href="<?php echo web_root; ?>forgot-password.php" class="btn btn-primary">
                                <i class="fa fa-refresh"></i> Request New Reset Link
                            </a>
                        <?php endif; ?>
                    <?php else: ?>
                        <!-- Reset Password Form -->
                        <form method="POST" action="reset-password.php?token=<?php echo urlencode($token); ?>" id="resetPasswordForm">
                            <div class="form-group">
                                <label for="new_password">
                                    <i class="fa fa-key"></i> New Password
                                </label>
                                <input type="password" 
                                       class="form-control" 
                                       id="new_password" 
                                       name="new_password" 
                                       placeholder="Enter new password"
                                       required
                                       minlength="8"
                                       autofocus>
                                <div class="password-strength">
                                    <div class="password-strength-bar" id="strengthBar"></div>
                                </div>
                                <ul class="password-requirements" id="requirements">
                                    <li id="req-length"><i class="fa fa-circle-o"></i> At least 8 characters</li>
                                    <li id="req-uppercase"><i class="fa fa-circle-o"></i> One uppercase letter (optional but recommended)</li>
                                    <li id="req-number"><i class="fa fa-circle-o"></i> One number (optional but recommended)</li>
                                </ul>
                            </div>
                            
                            <div class="form-group">
                                <label for="confirm_password">
                                    <i class="fa fa-check-circle"></i> Confirm New Password
                                </label>
                                <input type="password" 
                                       class="form-control" 
                                       id="confirm_password" 
                                       name="confirm_password" 
                                       placeholder="Confirm new password"
                                       required>
                                <small id="matchMessage" style="display: none; margin-top: 5px;"></small>
                            </div>
                            
                            <button type="submit" name="submit" class="btn btn-primary" id="submitBtn">
                                <i class="fa fa-save"></i> Reset Password
                            </button>
                        </form>
                    <?php endif; ?>
                    
                    <div class="back-link">
                        <a href="<?php echo web_root; ?>index.php">
                            <i class="fa fa-arrow-left"></i> Back to Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="<?php echo web_root; ?>js/jquery.js"></script>
    <script src="<?php echo web_root; ?>js/bootstrap.min.js"></script>
    
    <script>
        // Password strength checker
        const passwordInput = document.getElementById('new_password');
        const confirmInput = document.getElementById('confirm_password');
        const strengthBar = document.getElementById('strengthBar');
        const submitBtn = document.getElementById('submitBtn');
        const matchMessage = document.getElementById('matchMessage');
        
        if (passwordInput) {
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                let strength = 0;
                
                // Check length
                const lengthReq = document.getElementById('req-length');
                if (password.length >= 8) {
                    strength += 1;
                    lengthReq.className = 'requirement-met';
                    lengthReq.querySelector('i').className = 'fa fa-check-circle';
                } else {
                    lengthReq.className = '';
                    lengthReq.querySelector('i').className = 'fa fa-circle-o';
                }
                
                // Check uppercase
                const uppercaseReq = document.getElementById('req-uppercase');
                if (/[A-Z]/.test(password)) {
                    strength += 1;
                    uppercaseReq.className = 'requirement-met';
                    uppercaseReq.querySelector('i').className = 'fa fa-check-circle';
                } else {
                    uppercaseReq.className = '';
                    uppercaseReq.querySelector('i').className = 'fa fa-circle-o';
                }
                
                // Check number
                const numberReq = document.getElementById('req-number');
                if (/[0-9]/.test(password)) {
                    strength += 1;
                    numberReq.className = 'requirement-met';
                    numberReq.querySelector('i').className = 'fa fa-check-circle';
                } else {
                    numberReq.className = '';
                    numberReq.querySelector('i').className = 'fa fa-circle-o';
                }
                
                // Update strength bar
                strengthBar.className = 'password-strength-bar';
                if (strength === 1) {
                    strengthBar.classList.add('password-strength-weak');
                } else if (strength === 2) {
                    strengthBar.classList.add('password-strength-medium');
                } else if (strength >= 3) {
                    strengthBar.classList.add('password-strength-strong');
                }
                
                checkPasswordMatch();
            });
            
            confirmInput.addEventListener('input', checkPasswordMatch);
        }
        
        function checkPasswordMatch() {
            const password = passwordInput.value;
            const confirm = confirmInput.value;
            
            if (confirm.length > 0) {
                if (password === confirm) {
                    matchMessage.style.display = 'block';
                    matchMessage.style.color = '#27ae60';
                    matchMessage.innerHTML = '<i class="fa fa-check"></i> Passwords match';
                    submitBtn.disabled = false;
                } else {
                    matchMessage.style.display = 'block';
                    matchMessage.style.color = '#e74c3c';
                    matchMessage.innerHTML = '<i class="fa fa-times"></i> Passwords do not match';
                    submitBtn.disabled = true;
                }
            } else {
                matchMessage.style.display = 'none';
                submitBtn.disabled = false;
            }
        }
        
        // Form validation
        document.getElementById('resetPasswordForm')?.addEventListener('submit', function(e) {
            const password = passwordInput.value;
            const confirm = confirmInput.value;
            
            if (password.length < 8) {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Password Too Short',
                    text: 'Password must be at least 8 characters long.',
                    confirmButtonColor: '#27ae60'
                });
                return false;
            }
            
            if (password !== confirm) {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Passwords Do Not Match',
                    text: 'Please make sure both passwords are identical.',
                    confirmButtonColor: '#27ae60'
                });
                return false;
            }
        });
        
        // Show success message if password reset was successful
        <?php if ($submitted && $result && $result['success']): ?>
        Swal.fire({
            icon: 'success',
            title: 'Password Reset!',
            text: 'Your password has been successfully reset. You can now log in.',
            confirmButtonColor: '#27ae60',
            timer: 3000
        });
        <?php endif; ?>
    </script>
</body>
</html>
