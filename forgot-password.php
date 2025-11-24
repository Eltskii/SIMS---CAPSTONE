<?php
require_once("include/initialize.php");
require_once("include/password-reset.php");

// Redirect if already logged in
if (isset($_SESSION['IDNO'])) {
    redirect(web_root . "index.php?q=profile");
}

$pageTitle = "Forgot Password";
$submitted = false;
$result = null;

// Handle form submission
if (isset($_POST['submit'])) {
    $passwordReset = new PasswordReset();
    $result = $passwordReset->requestReset($_POST['email_or_username'] ?? '');
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
        
        .forgot-password-container {
            max-width: 500px;
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
            margin-bottom: 25px;
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
        
        .btn-secondary {
            background: #6c757d;
            border: none;
            padding: 12px;
            font-size: 15px;
            border-radius: 8px;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-1px);
        }
        
        .info-box {
            background: #e8f5ee;
            border-left: 4px solid var(--primary);
            padding: 16px;
            border-radius: 6px;
            margin-bottom: 25px;
        }
        
        .info-box p {
            margin: 0;
            color: var(--secondary);
            font-size: 14px;
            line-height: 1.6;
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
        
        .success-message {
            text-align: center;
        }
        
        .success-message h2 {
            color: var(--secondary);
            font-size: 22px;
            margin-bottom: 15px;
            font-weight: 700;
        }
        
        .success-message p {
            color: #6c757d;
            line-height: 1.6;
            margin-bottom: 20px;
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
        <div class="forgot-password-container">
            <div class="card">
                <div class="card-header">
                    <h1><i class="fa fa-key"></i> Forgot Password</h1>
                    <p>Reset your SIMS account password</p>
                </div>
                <div class="card-body">
                    <?php if ($submitted && $result): ?>
                        <?php if ($result['success']): ?>
                            <!-- Success Message -->
                            <div class="success-message">
                                <div class="success-icon">
                                    <i class="fa fa-check"></i>
                                </div>
                                <h2>Check Your Email</h2>
                                <p><?php echo htmlspecialchars($result['message']); ?></p>
                                <div class="info-box">
                                    <p><strong>Next Steps:</strong></p>
                                    <p>1. Check your email inbox (and spam folder)</p>
                                    <p>2. Click the reset link in the email</p>
                                    <p>3. Set your new password</p>
                                    <p>4. Log in with your new password</p>
                                </div>
                                <a href="<?php echo web_root; ?>index.php" class="btn btn-primary">
                                    <i class="fa fa-home"></i> Return to Home
                                </a>
                            </div>
                        <?php else: ?>
                            <!-- Error Message -->
                            <div class="alert alert-danger">
                                <i class="fa fa-exclamation-triangle"></i>
                                <?php echo htmlspecialchars($result['message']); ?>
                            </div>
                            <a href="forgot-password.php" class="btn btn-secondary">
                                <i class="fa fa-refresh"></i> Try Again
                            </a>
                        <?php endif; ?>
                    <?php else: ?>
                        <!-- Request Form -->
                        <div class="info-box">
                            <p>
                                <i class="fa fa-info-circle"></i>
                                Enter your email address or username, and we'll send you a link to reset your password.
                            </p>
                        </div>
                        
                        <form method="POST" action="forgot-password.php" id="forgotPasswordForm">
                            <div class="form-group">
                                <label for="email_or_username">
                                    <i class="fa fa-envelope"></i> Email Address or Username
                                </label>
                                <input type="text" 
                                       class="form-control" 
                                       id="email_or_username" 
                                       name="email_or_username" 
                                       placeholder="Enter your email or username"
                                       required
                                       autofocus>
                            </div>
                            
                            <button type="submit" name="submit" class="btn btn-primary">
                                <i class="fa fa-paper-plane"></i> Send Reset Link
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
            
            <!-- Help Text -->
            <?php if (!$submitted): ?>
            <div style="text-align: center; margin-top: 25px; color: #6c757d; font-size: 13px;">
                <p>
                    <i class="fa fa-question-circle"></i>
                    Need help? Contact the registrar's office.
                </p>
            </div>
            <?php endif; ?>
        </div>
    </div>
    
    <script src="<?php echo web_root; ?>js/jquery.js"></script>
    <script src="<?php echo web_root; ?>js/bootstrap.min.js"></script>
    
    <script>
        // Client-side validation
        document.getElementById('forgotPasswordForm')?.addEventListener('submit', function(e) {
            const input = document.getElementById('email_or_username').value.trim();
            
            if (input.length < 3) {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Input',
                    text: 'Please enter a valid email address or username.',
                    confirmButtonColor: '#27ae60'
                });
                return false;
            }
        });
        
        // Show success message if submitted successfully
        <?php if ($submitted && $result && $result['success']): ?>
        Swal.fire({
            icon: 'success',
            title: 'Email Sent!',
            text: 'Please check your email inbox for the password reset link.',
            confirmButtonColor: '#27ae60',
            timer: 3000
        });
        <?php endif; ?>
    </script>
</body>
</html>
