<?php
// department.php - visual match for about.php, keeps original logic (collapse IDs + AJAX #load)
// Assumes $mydb and web_root are available (like in your template)

$mydb->setQuery("SELECT * FROM `department`");
$departments = $mydb->loadResultList();

$mydb->setQuery("SELECT COUNT(*) AS deptCount FROM `department`");
$countResult = $mydb->loadSingleResult();
$departmentCount = $countResult ? intval($countResult->deptCount) : 0;
?>

<style>
/* ============= MODERN DEPARTMENT STYLES ============= */
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

.department-container {
  margin-bottom: 30px;
}

.department-hero {
  border-radius: var(--radius);
  overflow: hidden;
  box-shadow: var(--shadow-lg);
  background: #fff;
  transition: var(--transition);
}

.department-hero:hover {
  box-shadow: 0 12px 30px rgba(0,0,0,0.15);
}

.department-header {
  background: linear-gradient(135deg, var(--primary), var(--secondary));
  color: #fff;
  padding: 20px 25px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 15px;
}

.department-header .title {
  font-size: 1.4rem;
  font-weight: 700;
  display: flex;
  align-items: center;
  gap: 12px;
}

.department-header .title .fa {
  font-size: 24px;
  color: var(--accent-light);
}

.department-badge {
  background: rgba(255,255,255,0.2);
  color: #fff;
  padding: 8px 16px;
  border-radius: 20px;
  font-weight: 700;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  border: 1px solid rgba(255,255,255,0.3);
}

/* Department List */
.department-body { 
  padding: 25px; 
}

.department-list { 
  list-style: none; 
  margin: 0; 
  padding: 0; 
}

.department-item { 
  padding: 16px 0; 
  border-bottom: 1px solid #eef6ef; 
  display: flex; 
  align-items: flex-start; 
  gap: 15px;
  transition: var(--transition);
}

.department-item:hover {
  background: rgba(39, 174, 96, 0.03);
  border-radius: var(--radius);
  padding-left: 10px;
  padding-right: 10px;
  transform: translateX(5px);
}

.department-item:last-child {
  border-bottom: none;
}

.department-link { 
  color: var(--dark); 
  text-decoration: none; 
  display: flex; 
  align-items: center; 
  gap: 15px; 
  width: 100%;
  transition: var(--transition);
  cursor: pointer;
}

.department-link:hover { 
  color: var(--accent-dark); 
  text-decoration: none;
}

.department-icon { 
  width: 44px; 
  height: 44px;
  text-align: center; 
  color: var(--accent); 
  font-size: 20px; 
  flex: 0 0 44px;
  background: rgba(39, 174, 96, 0.1);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: var(--transition);
}

.department-link:hover .department-icon {
  background: rgba(39, 174, 96, 0.2);
  transform: scale(1.1);
  color: var(--accent-dark);
}

.department-content {
  flex: 1;
}

.department-name {
  margin: 0 0 5px 0; 
  font-size: 17px; 
  font-weight: 700;
  color: var(--primary);
  line-height: 1.3;
}

.department-desc {
  margin: 0;
  font-size: 14px;
  color: var(--muted);
  line-height: 1.4;
}

/* Collapse Content (AJAX loaded) */
.panel-collapse {
  margin-top: 15px;
  border-radius: var(--radius);
  overflow: hidden;
  box-shadow: 0 2px 8px rgba(0,0,0,0.06);
}

.panel-collapse .panel-body { 
  padding: 20px; 
  background: var(--light);
  color: var(--dark); 
  border-left: 4px solid var(--accent);
}

.panel-collapse .panel-body .loading {
  text-align: center;
  color: var(--muted);
  font-style: italic;
}

/* Animation for collapse */
.panel-collapse.collapsing {
  transition: height 0.3s ease;
}

/* Empty State */
.department-empty {
  text-align: center;
  padding: 40px 20px;
  color: var(--muted);
}

.department-empty .fa {
  font-size: 48px;
  margin-bottom: 15px;
  color: #e9ecef;
}

/* Responsive Design */
@media (max-width: 767px) {
  .department-header { 
    padding: 15px 20px; 
    flex-direction: column; 
    align-items: flex-start; 
    gap: 10px; 
  }
  
  .department-header .title {
    font-size: 1.2rem;
  }
  
  .department-badge { 
    align-self: stretch;
    text-align: center;
  }
  
  .department-body { 
    padding: 20px 15px; 
  }
  
  .department-item {
    padding: 12px 0;
    gap: 12px;
  }
  
  .department-icon {
    width: 40px;
    height: 40px;
    font-size: 18px;
  }
  
  .panel-collapse .panel-body { 
    padding: 15px; 
  }
}

@media (max-width: 576px) {
  .department-header {
    padding: 15px;
  }
  
  .department-body {
    padding: 15px 10px;
  }
  
  .department-item {
    flex-direction: column;
    gap: 10px;
    text-align: center;
  }
  
  .department-link {
    flex-direction: column;
    gap: 10px;
  }
  
  .department-content {
    width: 100%;
  }
}

/* Loading animation for AJAX content */
@keyframes pulse {
  0% { opacity: 1; }
  50% { opacity: 0.5; }
  100% { opacity: 1; }
}

.loading-pulse {
  animation: pulse 1.5s ease-in-out infinite;
}

/* Enhanced focus states for accessibility */
.department-link:focus {
  outline: 2px solid var(--accent);
  outline-offset: 2px;
  border-radius: 4px;
}

/* Print styles */
@media print {
  .department-hero {
    box-shadow: none;
    border: 1px solid #ddd;
  }
  
  .department-header {
    background: #f8f9fa !important;
    color: var(--dark) !important;
  }
  
  .department-badge {
    background: #ddd !important;
    color: var(--dark) !important;
  }
}
</style>

<div class="row department-container">
  <div class="col-lg-12">
    <div class="department-hero">
      <!-- Enhanced Header -->
      <div class="department-header">
        <div class="title">
          <i class="fa fa-building" aria-hidden="true"></i>
          <span>Academic Departments</span>
        </div>
        <div class="department-badge" title="Total departments">
          <i class="fa fa-hashtag"></i> <?php echo $departmentCount; ?> Departments
        </div>
      </div>

      <!-- Department List -->
      <div class="department-body">
        <?php if (!empty($departments)): ?>
          <ul class="department-list">
            <?php foreach ($departments as $d):
              $id = htmlspecialchars($d->DEPT_ID, ENT_QUOTES, 'UTF-8');
              $desc = htmlspecialchars($d->DEPARTMENT_DESC, ENT_QUOTES, 'UTF-8');
              $name = htmlspecialchars($d->DEPARTMENT_NAME, ENT_QUOTES, 'UTF-8');
            ?>
            <li class="department-item">
              <div class="department-icon">
                <i class="fa fa-university" aria-hidden="true"></i>
              </div>

              <div class="department-content">
                <h4 class="department-name">
                  <a id="load"
                     data-toggle="collapse"
                     data-parent="#accordion"
                     href="#<?php echo $id; ?>"
                     data-id="<?php echo $id; ?>"
                     class="department-link" 
                     role="button" 
                     aria-expanded="false" 
                     aria-controls="<?php echo $id; ?>">
                    <?php echo $desc; ?>
                  </a>
                </h4>
                <div class="department-desc">
                  <?php echo $name; ?>
                </div>

                <!-- Collapse area (content inserted by AJAX) -->
                <div id="<?php echo $id; ?>" class="panel-collapse collapse" aria-labelledby="<?php echo $id; ?>">
                  <div class="panel-body">
                    <div id="loaddata<?php echo $id; ?>">
                      <div class="loading loading-pulse">
                        <i class="fa fa-spinner fa-spin"></i> Loading department information...
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <?php endforeach; ?>
          </ul>
        <?php else: ?>
          <div class="department-empty">
            <i class="fa fa-building-o"></i>
            <h4>No Departments Available</h4>
            <p>There are currently no departments to display.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<!-- Enhanced JavaScript for better user experience -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Add loading states to department links
  const departmentLinks = document.querySelectorAll('.department-link[data-id]');
  
  departmentLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      const targetId = this.getAttribute('data-id');
      const targetCollapse = document.getElementById(targetId);
      const loadingElement = document.querySelector(`#loaddata${targetId} .loading`);
      
      // Show loading state
      if (loadingElement) {
        loadingElement.style.display = 'block';
      }
      
      // Add active class to the clicked item
      departmentLinks.forEach(l => l.closest('.department-item').classList.remove('active'));
      this.closest('.department-item').classList.add('active');
      
      // Handle collapse events
      if (targetCollapse) {
        targetCollapse.addEventListener('shown.bs.collapse', function() {
          const item = link.closest('.department-item');
          item.style.background = 'rgba(39, 174, 96, 0.05)';
          item.style.borderLeft = `3px solid var(--accent)`;
        });
        
        targetCollapse.addEventListener('hidden.bs.collapse', function() {
          const item = link.closest('.department-item');
          item.style.background = '';
          item.style.borderLeft = '';
          item.classList.remove('active');
        });
      }
    });
  });
  
  // Keyboard navigation support
  departmentLinks.forEach(link => {
    link.addEventListener('keydown', function(e) {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        this.click();
      }
    });
  });
  
  // Smooth scrolling for better UX
  document.querySelectorAll('.department-link').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const href = this.getAttribute('href');
      if (href && href.startsWith('#')) {
        e.preventDefault();
        const target = document.querySelector(href);
        if (target) {
          // Small delay to ensure collapse animation starts
          setTimeout(() => {
            target.scrollIntoView({
              behavior: 'smooth',
              block: 'nearest'
            });
          }, 100);
        }
      }
    });
  });
});
</script>