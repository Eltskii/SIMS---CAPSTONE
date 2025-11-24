<?php
// sidebar.php - original-style sidebar with program icons and program count badge
// Assumes $mydb and web_root are available in scope

// Fetch programs and program count safely
$programs = [];
$programCount = 0;
try {
    $mydb->setQuery("SELECT DISTINCT COURSE_DESC FROM `course` ORDER BY COURSE_DESC ASC");
    $programs = $mydb->loadResultList();
} catch (Exception $e) {
    $programs = [];
}
try {
    $mydb->setQuery("SELECT COUNT(DISTINCT COURSE_DESC) AS cnt FROM `course`");
    $c = $mydb->loadSingleResult();
    $programCount = $c ? intval($c->cnt) : 0;
} catch (Exception $e) {
    $programCount = 0;
}
?>
<style>
.sidebar-module {
    margin-bottom: 24px;
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    border: 1px solid #eef5f0;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.sidebar-module:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.10);
}

.module-header {
    background: linear-gradient(135deg, #0b8a48 0%, #076233 100%);
    color: white;
    padding: 16px 20px;
    position: relative;
}

.module-header h3 {
    margin: 0;
    font-size: 16px;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.program-count {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    backdrop-filter: blur(10px);
}

.module-body {
    padding: 0;
}

.programs-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.programs-list li {
    border-bottom: 1px solid #f5f9f7;
    transition: background-color 0.2s ease;
}

.programs-list li:last-child {
    border-bottom: none;
}

.program-link {
    display: flex;
    align-items: center;
    padding: 14px 20px;
    color: #2d3748;
    text-decoration: none;
    transition: all 0.2s ease;
    font-size: 14px;
}

.program-link:hover {
    background-color: #f8fcf9;
    color: #0b8a48;
    padding-left: 24px;
}

.program-icon {
    margin-right: 12px;
    color: #0b8a48;
    font-size: 15px;
    width: 20px;
    text-align: center;
}

.no-programs {
    padding: 20px;
    text-align: center;
    color: #a0aec0;
    font-style: italic;
    font-size: 14px;
}

/* Login Form Styles */
.login-form {
    padding: 20px;
}

.form-group {
    margin-bottom: 16px;
}

.form-label {
    display: block;
    margin-bottom: 8px;
    font-size: 13px;
    font-weight: 600;
    color: #2d3748;
    display: flex;
    align-items: center;
    gap: 6px;
}

.form-label i {
    color: #0b8a48;
    font-size: 13px;
}

.input-wrapper {
    position: relative;
}

.form-input {
    width: 100%;
    padding: 12px 14px;
    padding-right: 40px;
    border: 2px solid #e2e8f0;
    border-radius: 10px;
    font-size: 14px;
    transition: all 0.3s ease;
    background: #ffffff;
    box-sizing: border-box;
}

.form-input:focus {
    outline: none;
    border-color: #0b8a48;
    box-shadow: 0 0 0 4px rgba(11, 138, 72, 0.1);
    background: white;
}

.form-input::placeholder {
    color: #a0aec0;
}

.toggle-password {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #718096;
    cursor: pointer;
    padding: 6px;
    font-size: 16px;
    transition: color 0.2s ease;
    line-height: 1;
}

.toggle-password:hover {
    color: #0b8a48;
}

.toggle-password:focus {
    outline: none;
    color: #0b8a48;
}

.login-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
}

.btn-login {
    background: linear-gradient(135deg, #0b8a48 0%, #076233 100%);
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    box-shadow: 0 2px 8px rgba(11, 138, 72, 0.25);
    width: 100%;
    margin-bottom: 12px;
}

.btn-login:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 16px rgba(11, 138, 72, 0.35);
    background: linear-gradient(135deg, #0d9d53 0%, #087d3c 100%);
}

.btn-login:active {
    transform: translateY(0);
    box-shadow: 0 2px 6px rgba(11, 138, 72, 0.25);
}

.forgot-link {
    color: #0b8a48;
    text-decoration: none;
    font-size: 13px;
    transition: all 0.2s ease;
    font-weight: 500;
    text-align: center;
    display: block;
}

.forgot-link:hover {
    color: #076233;
    text-decoration: underline;
}

.login-divider {
    display: flex;
    align-items: center;
    text-align: center;
    margin: 16px 0;
    color: #a0aec0;
    font-size: 12px;
}

.login-divider::before,
.login-divider::after {
    content: '';
    flex: 1;
    border-bottom: 1px solid #e2e8f0;
}

.login-divider span {
    padding: 0 10px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .sidebar-module {
        margin-bottom: 16px;
    }
    
    .program-link {
        padding: 12px 16px;
    }
    
    .login-form {
        padding: 16px;
    }
}
</style>

<!-- Programs Offered -->
<div class="sidebar-module">
    <div class="module-header">
        <h3>
            Programs Offered
            <span class="program-count"><?php echo intval($programCount); ?></span>
        </h3>
    </div>
    
    <div class="module-body">
        <ul class="programs-list">
            <?php 
            if (!empty($programs)) {
                foreach ($programs as $result) {
                    $desc = isset($result->COURSE_DESC) ? trim($result->COURSE_DESC) : '';
                    if ($desc === '') continue;
                    $url = 'index.php?q=product&id=' . urlencode($desc);
                    echo '<li>';
                    echo '<a href="' . htmlspecialchars($url) . '" class="program-link">';
                    echo '<i class="fa fa-graduation-cap program-icon" aria-hidden="true"></i>';
                    echo '<span>' . htmlspecialchars($desc) . '</span>';
                    echo '</a>';
                    echo '</li>';
                }
            } else {
                echo '<li class="no-programs">No programs found</li>';
            }
            ?>
        </ul>
    </div>
</div>
<!-- end category -->

<!-- Login (keeps original markup and classes) -->
<?php if (!isset($_SESSION['IDNO'])): ?>
<div class="sidebar-module">
    <div class="module-header">
        <h3>Login to Your Account</h3>
    </div>
    
    <div class="module-body">
        <form class="login-form" action="login.php" method="POST" id="sidebarLoginForm">
            <div class="form-group">
                <label class="form-label" for="U_USERNAME">
                    <i class="fa fa-user"></i>
                    Username
                </label>
                <input id="U_USERNAME" name="U_USERNAME" placeholder="Enter your username" type="text" class="form-input" autocomplete="username">
            </div>
            
            <div class="form-group">
                <label class="form-label" for="U_PASS">
                    <i class="fa fa-lock"></i>
                    Password
                </label>
                <div class="input-wrapper">
                    <input name="U_PASS" id="U_PASS" placeholder="Enter your password" type="password" class="form-input" autocomplete="current-password">
                    <button type="button" class="toggle-password" id="togglePassword" title="Show/Hide Password">
                        <i class="fa fa-eye" id="toggleIcon"></i>
                    </button>
                </div>
            </div>

            <button type="submit" id="sidebarLogin" name="sidebarLogin" class="btn-login">
                <i class="fa fa-sign-in"></i>
                <span>Login</span>
            </button>
            
            <a href="#" class="forgot-link">Forgot Password?</a>
        </form>
    </div>
</div>
<?php endif; ?>

<!-- Enhanced UI scripts - NO LOGIC CHANGES -->
<script>
(function(){
  var form = document.getElementById('sidebarLoginForm');
  if (!form) return;
  
  // Password toggle functionality (UI only)
  var toggleBtn = document.getElementById('togglePassword');
  var passwordInput = document.getElementById('U_PASS');
  var toggleIcon = document.getElementById('toggleIcon');
  
  if (toggleBtn && passwordInput && toggleIcon) {
    toggleBtn.addEventListener('click', function() {
      var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      
      if (type === 'text') {
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
      } else {
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
      }
    });
  }
  
  // Original validation (unchanged)
  form.addEventListener('submit', function(e){
    var u = document.getElementById('U_USERNAME'), p = document.getElementById('U_PASS');
    if (!u || !p) return;
    if (!u.value.trim() || !p.value.trim()) {
      e.preventDefault();
      alert('Invalid username and password.');
      if (!u.value.trim()) u.focus();
      else p.focus();
      return false;
    }
    // allow form to submit
  }, false);
})();
</script>
