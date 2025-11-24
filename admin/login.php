<?php
require_once("../include/initialize.php");
?>
<?php
 if (isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."admin/index.php");
 } 
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Benguet State University - Bokod Campus</title>
<link rel="icon" type="image/png" href="<?php echo web_root; ?>img/favicon.png">

<!-- existing assets -->
<link href="<?php echo web_root; ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo web_root; ?>fonts/font-awesome.min.css" rel="stylesheet">
<script src="<?php echo web_root; ?>js/jquery.js"></script>

<style>
:root {
  --primary: #0b8a48;
  --primary-dark: #076233;
  --primary-light: #e8f5ee;
  --secondary: #2d3748;
  --muted: #718096;
  --light: #f8fafc;
  --white: #ffffff;
  --border: #e2e8f0;
  --shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
  --radius: 12px;
  --radius-sm: 8px;
  --transition: all 0.2s ease;
}

* {
  box-sizing: border-box;
}

body {
  min-height: 100vh;
  margin: 0;
  font-family: "Inter", "Segoe UI", system-ui, -apple-system, sans-serif;
  background: linear-gradient(135deg, #f0f9f4 0%, #e6f4ea 100%);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  line-height: 1.5;
  color: var(--secondary);
}

.wrap {
  width: 100%;
  max-width: 900px;
  display: grid;
  grid-template-columns: 1.1fr 1fr;
  gap: 30px;
  align-items: center;
}

@media (max-width: 768px) {
  .wrap {
    grid-template-columns: 1fr;
    gap: 24px;
    max-width: 420px;
  }
}

/* Info Panel - Compact */
.info-panel {
  background: var(--white);
  padding: 24px;
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  border-left: 4px solid var(--primary);
}

.info-header {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  margin-bottom: 16px;
}

.info-text h1 {
  margin: 0 0 4px 0;
  font-size: 20px;
  font-weight: 700;
  color: var(--primary-dark);
}

.info-text .subtitle {
  color: var(--muted);
  font-size: 13px;
  margin: 0;
}

.seal-container {
  background: var(--white);
  padding: 8px;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}

.seal {
  height: 60px;
  width: auto;
}

.info-content p {
  color: var(--secondary);
  margin-bottom: 12px;
  font-size: 13.5px;
}

.info-divider {
  height: 1px;
  background: var(--border);
  margin: 18px 0;
}

.contact-info {
  font-size: 12px;
}

.contact-info strong {
  color: var(--primary-dark);
  display: block;
  margin-bottom: 6px;
}

.contact-info a {
  color: var(--primary);
  text-decoration: none;
  transition: var(--transition);
}

.contact-info a:hover {
  color: var(--primary-dark);
  text-decoration: underline;
}

/* Login Card - Compact */
.login-card {
  background: var(--white);
  padding: 28px 24px 24px;
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  border-top: 4px solid var(--primary);
}

.card-header {
  text-align: center;
  margin-bottom: 24px;
}

.card-header h2 {
  margin: 0 0 6px 0;
  font-size: 20px;
  font-weight: 700;
  color: var(--secondary);
}

.card-subtitle {
  color: var(--muted);
  font-size: 13px;
  margin: 0;
}

/* Form Styling - Compact */
.form-group {
  margin-bottom: 16px;
  position: relative;
}

.input-with-icon {
  position: relative;
}

.input-with-icon .icon {
  position: absolute;
  left: 12px;
  top: 50%;
  transform: translateY(-50%);
  color: var(--muted);
  font-size: 14px;
  z-index: 2;
  transition: var(--transition);
}

.form-control {
  width: 100%;
  padding: 10px 12px 10px 36px;
  border: 1.5px solid var(--border);
  border-radius: var(--radius-sm);
  background: var(--light);
  font-size: 14px;
  color: var(--secondary);
  transition: var(--transition);
  position: relative;
  z-index: 1;
}

.form-control:focus {
  outline: none;
  border-color: var(--primary);
  background: var(--white);
  box-shadow: 0 0 0 2px rgba(11, 138, 72, 0.1);
}

.form-control:focus + .icon {
  color: var(--primary);
}

.password-toggle {
  position: absolute;
  right: 10px;
  top: 50%;
  transform: translateY(-50%);
  background: transparent;
  border: none;
  color: var(--muted);
  cursor: pointer;
  padding: 4px;
  border-radius: 4px;
  transition: var(--transition);
  font-size: 13px;
  z-index: 2;
}

.password-toggle:hover {
  color: var(--primary);
  background: rgba(11, 138, 72, 0.05);
}

.form-options {
  display: flex;
  justify-content: flex-end; /* Changed: from space-between to flex-end */
  align-items: center;
  margin-bottom: 20px;
  font-size: 13px;
}

.back-link {
  color: var(--primary);
  text-decoration: none;
  transition: var(--transition);
  font-weight: 500;
  font-size: 12.5px;
}

.back-link:hover {
  color: var(--primary-dark);
  text-decoration: underline;
}

.btn-login {
  width: 100%;
  padding: 11px 20px;
  background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
  color: white;
  border: none;
  border-radius: var(--radius-sm);
  font-size: 14px;
  font-weight: 600;
  cursor: pointer;
  transition: var(--transition);
  box-shadow: 0 3px 8px rgba(11, 138, 72, 0.2);
}

.btn-login:hover {
  transform: translateY(-1px);
  box-shadow: 0 4px 12px rgba(11, 138, 72, 0.25);
}

.btn-login:active {
  transform: translateY(0);
}

.card-footer {
  margin-top: 20px;
  padding-top: 16px;
  border-top: 1px solid var(--border);
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 12px;
  color: var(--muted);
}

.card-footer a {
  color: var(--primary);
  text-decoration: none;
  transition: var(--transition);
}

.card-footer a:hover {
  color: var(--primary-dark);
  text-decoration: underline;
}

/* Message Styling */
.alert {
  padding: 10px 12px;
  border-radius: var(--radius-sm);
  margin-bottom: 18px;
  font-size: 13px;
  border-left: 3px solid;
}

.alert-success {
  background: #f0fff4;
  border-color: #38a169;
  color: #2d774b;
}

.alert-error {
  background: #fff5f5;
  border-color: #e53e3e;
  color: #c53030;
}

/* Responsive adjustments */
@media (max-width: 480px) {
  .info-panel, .login-card {
    padding: 20px 16px;
  }
  
  .info-header {
    flex-direction: column;
    gap: 12px;
  }
  
  .info-text h1 {
    font-size: 18px;
  }
  
  .card-header h2 {
    font-size: 18px;
  }
  
  .form-options {
    justify-content: center; /* Center on mobile */
  }
}

input[type="radio"], input[type="checkbox"] {
  margin: 0;
}
</style>
</head>
<body>

<div class="wrap" role="main">
  <!-- Information Panel -->
  <section class="info-panel" aria-labelledby="campus-info">
    <div class="info-header">
      <div class="info-text">
        <h1 id="campus-info">Benguet State University</h1>
        <p class="subtitle">Bokod Campus — Student Enrollment & Information System</p>
      </div>
      <div class="seal-container">
        <img src="<?php echo web_root; ?>img/school_seal_100x100.jpg" alt="BSU Official Seal" class="seal" loading="lazy">
      </div>
    </div>
    
    <div class="info-content">
      <p>Securely sign in to the admin panel to manage students, courses, and reports. Need support? Contact the campus office or the system administrator.</p>
    </div>
    
    <div class="info-divider"></div>
    
    <div class="contact-info">
      <strong>Campus Support</strong>
      <div>Phone: <a href="tel:+639684504041">0968-450-4041</a></div>
      <div>Email: <a href="mailto:bokod.campus@bsu.edu.ph">bokod.campus@bsu.edu.ph</a></div>
    </div>
  </section>

  <!-- Login Form -->
  <section class="login-card" aria-labelledby="login-title">
    <div class="card-header">
      <h2 id="login-title">Admin Login</h2>
      <p class="card-subtitle">Enter your credentials to continue</p>
    </div>

    <?php echo check_message(); ?>

    <form method="post" action="" id="loginForm" novalidate>
      <div class="form-group">
        <div class="input-with-icon">
          <i class="fa fa-user icon" aria-hidden="true"></i>
          <label for="user_email" class="sr-only">Username</label>
          <input 
            id="user_email" 
            name="user_email" 
            type="text" 
            class="form-control" 
            placeholder="Username" 
            required 
            autocomplete="username"
          >
        </div>
      </div>

      <div class="form-group">
        <div class="input-with-icon">
          <i class="fa fa-lock icon" aria-hidden="true"></i>
          <label for="user_pass" class="sr-only">Password</label>
          <input 
            id="user_pass" 
            name="user_pass" 
            type="password" 
            class="form-control" 
            placeholder="Password" 
            required 
            autocomplete="current-password"
          >
          <button type="button" class="password-toggle" id="togglePassword" aria-label="Show password">
            <i class="fa fa-eye"></i>
          </button>
        </div>
      </div>

      <div class="form-options">
        <!-- REMOVED: Remember me checkbox -->
        <!-- FIXED: Back to Site link with proper web_root -->
        <a href="<?php echo web_root; ?>index.php" class="back-link" title="Back to landing page">
          ← Back to Site
        </a>
      </div>

      <button type="submit" name="btnLogin" class="btn-login" id="btnLogin">
        Sign In
      </button>

      <div class="card-footer">
        <small>© <?php echo date('Y'); ?> Benguet State University</small>
        <small><a href="mailto:bokod.campus@bsu.edu.ph">Need Help?</a></small>
      </div>
    </form>
  </section>
</div>

<script>
// Enhanced password toggle and form validation
(function(){
  const passwordInput = document.getElementById('user_pass');
  const toggleButton = document.getElementById('togglePassword');
  const emailInput = document.getElementById('user_email');
  const loginForm = document.getElementById('loginForm');
  
  // Password visibility toggle
  toggleButton.addEventListener('click', function() {
    const isPassword = passwordInput.type === 'password';
    passwordInput.type = isPassword ? 'text' : 'password';
    toggleButton.innerHTML = isPassword ? '<i class="fa fa-eye-slash"></i>' : '<i class="fa fa-eye"></i>';
    toggleButton.setAttribute('aria-label', isPassword ? 'Hide password' : 'Show password');
    passwordInput.focus();
  });
  
  // Form validation
  loginForm.addEventListener('submit', function(e) {
    const username = emailInput.value.trim();
    const password = passwordInput.value;
    
    if (!username || !password) {
      e.preventDefault();
      alert('Please enter both username and password to continue.');
      emailInput.focus();
      return false;
    }
    
    if (/\s/.test(username)) {
      e.preventDefault();
      alert('Username cannot contain spaces. Please check your credentials.');
      emailInput.focus();
      return false;
    }
    
    return true;
  });
  
  // Auto-focus username field on page load
  emailInput.focus();
})();
</script>

<?php
// Server-side authentication block (unchanged)
if(isset($_POST['btnLogin'])){
  $email = trim($_POST['user_email']);
  $upass  = trim($_POST['user_pass']);
  $h_upass = sha1($upass);
  
   if ($email == '' OR $upass == '') {

      message("Invalid Username and Password!", "error");
      redirect("login.php");
         
    } else {  
    $user = new User();
    $res = $user::userAuthentication($email, $h_upass);
    if ($res==true) { 
       message("You are logged in as ".$_SESSION['ACCOUNT_TYPE'].".","success");
       
       $sql="INSERT INTO `tbllogs` (`USERID`, `LOGDATETIME`, `LOGROLE`, `LOGMODE`) 
          VALUES (".$_SESSION['ACCOUNT_ID'].",'".date('Y-m-d H:i:s')."','".$_SESSION['ACCOUNT_TYPE']."','Logged in')";
          $mydb->setQuery($sql);
          $mydb->executeQuery();

     if ($_SESSION['ACCOUNT_TYPE'] == 'Registrar') { 
    redirect(web_root."admin/index.php");
} elseif ($_SESSION['ACCOUNT_TYPE'] == 'Registrar') {
    redirect(web_root."admin/index.php");
} elseif ($_SESSION['ACCOUNT_TYPE'] == 'Chairperson') {
    redirect(web_root."admin/index.php");
} elseif ($_SESSION['ACCOUNT_TYPE'] == 'Instructor') {
    redirect(web_root."admin/index.php");
} else {
    // Unknown / unauthorized type
    redirect(web_root."admin/login.php");
}
    }else{
      message("Account does not exist! Please contact Administrator.", "error");
       redirect(web_root."admin/login.php"); 
    }
 }
 } 
?>
</body>
</html>