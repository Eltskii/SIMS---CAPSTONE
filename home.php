<?php
$bgImage = isset($web_root) ? $web_root . 'img/bsu_bg.webp' : 'img/bsu_bg.webp';
$sealImg = isset($web_root) ? $web_root . 'img/school_seal.png' : 'img/school_seal.png';
?>
<style>
/* ============= MODERN HERO SECTION ============= */
:root {
  --primary: #2c3e50;
  --secondary: #34495e;
  --accent: #27ae60;
  --accent-dark: #219653;
  --accent-light: #2ecc71;
  --warning: #e67e22;
  --danger: #e74c3c;
  --info: #3498db;
  --muted: #6c757d;
  --light: #f8f9fa;
  --dark: #343a40;
  --radius: 12px;
  --shadow: 0 4px 12px rgba(0,0,0,0.08);
  --shadow-lg: 0 8px 24px rgba(0,0,0,0.12);
  --transition: all 0.3s ease;
}

.home-hero {
  background-image: linear-gradient(rgba(8, 43, 17, 0.7), rgba(8, 43, 17, 0.8)), url('<?php echo htmlspecialchars($bgImage, ENT_QUOTES, 'UTF-8'); ?>');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  border-radius: var(--radius);
  overflow: hidden;
  margin-bottom: 30px;
  min-height: 320px;
  display: flex;
  align-items: center;
  position: relative;
  box-shadow: var(--shadow-lg);
}

.hero-inner {
  position: relative;
  z-index: 2;
  width: 100%;
  padding: clamp(20px, 4vw, 50px);
  color: #fff;
}

.hero-seal {
  width: clamp(100px, 15vw, 180px);
  height: auto;
  display: block;
  margin: 0 auto;
  background: rgba(255,255,255,0.95);
  padding: 12px;
  border-radius: 50%;
  box-shadow: 0 8px 20px rgba(0,0,0,0.2);
  border: 3px solid var(--accent-light);
  transition: var(--transition);
}

.hero-seal:hover {
  transform: scale(1.05);
  box-shadow: 0 12px 30px rgba(0,0,0,0.3);
}

.hero-content {
  display: flex;
  align-items: center;
  padding: 20px 0;
  color: rgba(255,255,255,0.95);
}

.hero-content h1 {
  font-size: clamp(24px, 3vw, 36px);
  margin: 0 0 12px;
  line-height: 1.2;
  font-weight: 800;
  text-shadow: 0 2px 4px rgba(0,0,0,0.3);
}

.hero-content .location {
  font-size: clamp(16px, 1.4vw, 20px);
  margin-bottom: 15px;
  line-height: 1.4;
  opacity: 0.9;
}

.hero-content .welcome-text {
  font-size: clamp(14px, 1.2vw, 16px);
  margin-bottom: 20px;
  line-height: 1.6;
  opacity: 0.9;
  max-width: 600px;
}

.hero-contact-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 15px;
  margin-top: 20px;
  padding-top: 20px;
  border-top: 1px solid rgba(255,255,255,0.2);
}

.contact-item {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 14px;
}

.contact-item .fa {
  width: 20px;
  text-align: center;
  color: var(--accent-light);
}

.contact-item a {
  color: rgba(255,255,255,0.95);
  text-decoration: none;
  transition: var(--transition);
}

.contact-item a:hover {
  color: #fff;
  text-decoration: underline;
}

.academic-info {
  background: rgba(255,255,255,0.15);
  padding: 12px 16px;
  border-radius: var(--radius);
  margin-top: 15px;
  display: flex;
  gap: 20px;
  flex-wrap: wrap;
}

.academic-item {
  display: flex;
  align-items: center;
  gap: 8px;
  font-weight: 600;
}

/* ============= VISION MISSION SECTION ============= */
.vmg-section {
  margin-top: 30px;
}

.vmg-panel {
  border: none;
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  overflow: hidden;
  background: #fff;
  transition: var(--transition);
}

.vmg-panel:hover {
  box-shadow: var(--shadow-lg);
  transform: translateY(-2px);
}

.vmg-header {
  background: linear-gradient(135deg, var(--primary), var(--secondary));
  color: #fff;
  padding: 20px;
  font-size: 20px;
  font-weight: 700;
  border-bottom: none;
}

.vmg-body {
  padding: 25px;
  background: #fcfdfc;
}

.vmg-card {
  margin-bottom: 20px;
  border-radius: var(--radius);
  padding: 20px;
  border-left: 5px solid;
  background: #fff;
  box-shadow: 0 2px 8px rgba(0,0,0,0.06);
  transition: var(--transition);
}

.vmg-card:hover {
  transform: translateX(5px);
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.vmg-card.vision {
  border-left-color: var(--accent);
  background: linear-gradient(135deg, #e8f8f5, #d9f2e6);
}

.vmg-card.mission {
  border-left-color: var(--warning);
  background: linear-gradient(135deg, #fff7e6, #fff2cc);
}

.vmg-card.goals {
  border-left-color: var(--info);
  background: linear-gradient(135deg, #e8f0fe, #dee9fb);
}

.vmg-card.development {
  border-left-color: var(--danger);
  background: linear-gradient(135deg, #fef9f9, #fdeaea);
}

.vmg-card h4 {
  margin: 0 0 12px 0;
  font-size: 18px;
  display: flex;
  align-items: center;
  gap: 10px;
}

.vmg-card p {
  margin: 0;
  font-size: 15px;
  line-height: 1.6;
  color: var(--dark);
}

.development-toggle {
  cursor: pointer;
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 0;
}

.development-list {
  margin-top: 15px;
  padding-left: 0;
  list-style: none;
}

.development-list li {
  padding: 8px 0;
  display: flex;
  align-items: flex-start;
  gap: 12px;
  font-size: 14px;
  line-height: 1.5;
  border-bottom: 1px solid rgba(0,0,0,0.05);
}

.development-list li:last-child {
  border-bottom: none;
}

.development-list .fa {
  color: var(--accent);
  margin-top: 2px;
  flex-shrink: 0;
}

/* ============= MAP & CONTACT SECTION ============= */
.contact-section {
  margin-top: 30px;
}

.contact-panel {
  border: none;
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  overflow: hidden;
  background: #fff;
  transition: var(--transition);
  height: 100%;
}

.contact-panel:hover {
  box-shadow: var(--shadow-lg);
}

.contact-header {
  background: linear-gradient(135deg, var(--primary), var(--secondary));
  color: #fff;
  padding: 15px 20px;
  font-weight: 700;
  border-bottom: none;
}

.contact-body {
  padding: 0;
}

.map-container {
  width: 100%;
  height: 300px;
  border-radius: 0 0 var(--radius) var(--radius);
  overflow: hidden;
}

.map-container iframe {
  width: 100%;
  height: 100%;
  border: none;
}

.contact-form {
  padding: 20px;
}

.form-group {
  margin-bottom: 20px;
}

.form-control {
  border-radius: var(--radius);
  border: 1px solid #e9ecef;
  padding: 10px 12px;
  transition: var(--transition);
  box-shadow: 0 2px 4px rgba(0,0,0,0.02);
}

.form-control:focus {
  border-color: var(--accent);
  box-shadow: 0 0 0 3px rgba(39, 174, 96, 0.1);
  outline: none;
}


/* ============= RESPONSIVE DESIGN ============= */
@media (max-width: 991px) {
  .home-hero { 
    min-height: 280px; 
  }
  .hero-seal { 
    width: 120px; 
    margin-bottom: 20px;
  }
  .hero-contact-grid {
    grid-template-columns: 1fr;
    gap: 10px;
  }
  .academic-info {
    flex-direction: column;
    gap: 10px;
  }
}

@media (max-width: 768px) {
  .home-hero { 
    min-height: 250px; 
  }
  .hero-content {
    text-align: center;
  }
  .vmg-body {
    padding: 20px 15px;
  }
  .contact-form {
    padding: 15px;
  }
}

@media (max-width: 576px) {
  .home-hero { 
    min-height: 220px; 
    margin-bottom: 20px;
  }
  .hero-inner {
    padding: 20px 15px;
  }
  .vmg-card {
    padding: 15px;
  }
  .development-list li {
    flex-direction: column;
    gap: 5px;
  }
}

/* Animation for page elements */
.vmg-card, .contact-panel {
  animation: fadeInUp 0.6s ease-out;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>

<!-- Enhanced Hero Section -->
<div class="home-hero">
  <div class="hero-inner container">
    <div class="row align-items-center">
      <!-- University Seal -->
      <div class="col-md-3 col-sm-4 text-center">
        <img src="<?php echo htmlspecialchars($sealImg, ENT_QUOTES, 'UTF-8'); ?>"
             alt="BSU Bokod Campus Seal"
             class="hero-seal img-responsive">
      </div>

      <!-- University Information -->
      <div class="col-md-9 col-sm-8 hero-content">
        <div style="width:100%;">
          <h1>Benguet State University - Bokod Campus</h1>
          <div class="location">
            <i class="fa fa-map-marker"></i> Ambangeg, Daklan, Bokod, Benguet, Philippines
          </div>
          
          <div class="welcome-text">
            Welcome to our campus portal! Explore our academic programs, discover campus facilities, 
            and learn how to become part of our vibrant academic community.
          </div>

          <!-- Contact Information Grid -->
          <div class="hero-contact-grid">
            <div class="contact-item">
              <i class="fa fa-phone"></i>
              <div>
                <strong>Phone:</strong> 
                <a href="tel:+639684504041">0968-450-4041</a>
              </div>
            </div>
            
            <div class="contact-item">
              <i class="fa fa-envelope"></i>
              <div>
                <strong>Email:</strong> 
                <a href="mailto:bokod.campus@bsu.edu.ph">bokod.campus@bsu.edu.ph</a>
              </div>
            </div>
            
            <div class="contact-item">
              <i class="fa fa-clock-o"></i>
              <div>
                <strong>Hours:</strong> Mon–Fri 8:00 AM–5:00 PM
              </div>
            </div>
          </div>

          <!-- Academic Information -->
          <div class="academic-info">
            <div class="academic-item">
              <i class="fa fa-calendar"></i>
              <span><strong>Academic Year:</strong> <?php echo isset($_SESSION['SY']) ? htmlspecialchars($_SESSION['SY']) : ''; ?></span>
            </div>
            <div class="academic-item">
              <i class="fa fa-graduation-cap"></i>
              <span><strong>Semester:</strong> <?php echo isset($_SESSION['SEMESTER']) ? htmlspecialchars($_SESSION['SEMESTER']) : ''; ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Enhanced Vision, Mission & Goals Section -->
<div class="row vmg-section">
  <div class="col-lg-12">
    <div class="vmg-panel">
      <div class="vmg-header">
        <i class="fa fa-university"></i> Vision, Mission &amp; Goals
      </div>
      <div class="vmg-body">
        <!-- Vision Card -->
        <div class="vmg-card vision">
          <h4>
            <i class="fa fa-eye text-success"></i> Vision
          </h4>
          <p>BSU as an International Smart University engendering graduates to walk the intergenerational highways.</p>
        </div>

        <!-- Mission Card -->
        <div class="vmg-card mission">
          <h4>
            <i class="fa fa-rocket text-warning"></i> Mission
          </h4>
          <p>BSU CARES to: <strong>C</strong>hallenge innovation, <strong>A</strong>dvance technology and facility,
            <strong>R</strong>evitalize administration, <strong>E</strong>ngender partnership, and <strong>S</strong>erve intergenerational role.
          </p>
        </div>

        <!-- Campus Goals Card -->
        <div class="vmg-card goals">
          <h4>
            <i class="fa fa-graduation-cap text-primary"></i> Campus Goals
          </h4>
          <p>Advancing an inclusive educational environment that produces globally competitive and research-oriented
            professional leaders imbued with indigenous virtues and strategic foresight.
          </p>
        </div>

        <!-- Development Goals Card -->
        <div class="vmg-card development">
          <h4 class="development-toggle" data-toggle="collapse" data-target="#devGoals" aria-expanded="false" aria-controls="devGoals">
            <span><i class="fa fa-bullseye text-danger"></i> Development Goals</span>
            <i class="fa fa-chevron-down"></i>
          </h4>

          <div id="devGoals" class="collapse">
            <ul class="development-list">
              <li>
                <i class="fa fa-lightbulb-o"></i>
                <div><strong>Goal I:</strong> Challenge innovation in the University's functions.</div>
              </li>
              <li>
                <i class="fa fa-cogs"></i>
                <div><strong>Goal II:</strong> Advance technology and facilities for modern needs.</div>
              </li>
              <li>
                <i class="fa fa-refresh"></i>
                <div><strong>Goal III:</strong> Revitalize administration through efficient systems.</div>
              </li>
              <li>
                <i class="fa fa-link"></i>
                <div><strong>Goal IV:</strong> Strengthen linkages and partnerships.</div>
              </li>
              <li>
                <i class="fa fa-users"></i>
                <div><strong>Goal V:</strong> Serve intergenerational roles (S.P.E.C.I.E.S).</div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Enhanced Map & Contact Section -->
<div class="row contact-section">
  <div class="col-md-6 mb-4">
    <div class="contact-panel">
      <div class="contact-header">
        <i class="fa fa-map-marker"></i> Find Us
      </div>
      <div class="contact-body">
        <div class="map-container">
          <iframe src="https://www.google.com/maps?q=Ambangeg,+Bokod,+Benguet,+Philippines&output=embed" 
                  width="100%" 
                  height="300" 
                  style="border:0;" 
                  allowfullscreen="" 
                  loading="lazy" 
                  referrerpolicy="no-referrer-when-downgrade"
                  title="Map to Benguet State University - Bokod Campus">
          </iframe>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6 mb-4">
    <div class="contact-panel">
      <div class="contact-header">
        <i class="fa fa-envelope"></i> Message Us
      </div>
      <div class="contact-body">
        <form action="<?php echo web_root; ?>contact_send.php" method="post" role="form" class="contact-form">
          <div class="form-group">
            <label for="c_name" class="form-label">Name</label>
            <input id="c_name" name="name" placeholder="Your full name" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="c_email" class="form-label">Email</label>
            <input id="c_email" name="email" type="email" placeholder="your.email@example.com" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="c_message" class="form-label">Message</label>
            <textarea id="c_message" name="message" rows="4" placeholder="We're still in beta though..." class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success">
              <i class="fa fa-paper-plane"></i> Send Message
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Enhanced JavaScript for Interactive Elements -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Development goals toggle animation
  const toggle = document.querySelector('[data-target="#devGoals"]');
  const icon = toggle.querySelector('.fa-chevron-down');
  const collapse = document.getElementById('devGoals');
  
  if (collapse) {
    collapse.addEventListener('shown.bs.collapse', () => {
      icon.classList.replace('fa-chevron-down','fa-chevron-up');
      toggle.style.color = 'var(--danger)';
    });
    
    collapse.addEventListener('hidden.bs.collapse', () => {
      icon.classList.replace('fa-chevron-up','fa-chevron-down');
      toggle.style.color = '';
    });
  }

  // Add smooth scrolling for better UX
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        target.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    });
  });

  // Form enhancement
  const contactForm = document.querySelector('.contact-form');
  if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
      const submitBtn = this.querySelector('button[type="submit"]');
      const originalText = submitBtn.innerHTML;
      submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Sending...';
      submitBtn.disabled = true;
      
      // Re-enable after 3 seconds if still on page (form submission might have failed)
      setTimeout(() => {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
      }, 3000);
    });
  }
});
</script>