/**
 * Global UI Enhancements
 * Toast Notifications, Back to Top, Utility Functions
 */

// ============= TOAST NOTIFICATION SYSTEM =============
const ToastManager = {
  container: null,
  
  init() {
    if (!this.container) {
      this.container = document.createElement('div');
      this.container.className = 'toast-container';
      document.body.appendChild(this.container);
    }
  },
  
  show(message, options = {}) {
    this.init();
    
    const {
      type = 'info', // 'success', 'error', 'warning', 'info'
      title = '',
      duration = 4000,
      closeable = true
    } = options;
    
    const toast = document.createElement('div');
    toast.className = `toast toast-${type}`;
    
    const icons = {
      success: 'fa-check-circle',
      error: 'fa-times-circle',
      warning: 'fa-exclamation-triangle',
      info: 'fa-info-circle'
    };
    
    toast.innerHTML = `
      <div class="toast-icon">
        <i class="fa ${icons[type]}"></i>
      </div>
      <div class="toast-content">
        ${title ? `<div class="toast-title">${title}</div>` : ''}
        <div class="toast-message">${message}</div>
      </div>
      ${closeable ? `
        <button class="toast-close" aria-label="Close">
          <i class="fa fa-times"></i>
        </button>
      ` : ''}
    `;
    
    this.container.appendChild(toast);
    
    // Trigger animation
    setTimeout(() => toast.classList.add('show'), 10);
    
    // Close button handler
    const closeBtn = toast.querySelector('.toast-close');
    if (closeBtn) {
      closeBtn.addEventListener('click', () => this.close(toast));
    }
    
    // Auto close
    if (duration > 0) {
      setTimeout(() => this.close(toast), duration);
    }
    
    return toast;
  },
  
  close(toast) {
    toast.classList.add('hiding');
    toast.addEventListener('animationend', () => {
      toast.remove();
      if (this.container && this.container.children.length === 0) {
        this.container.remove();
        this.container = null;
      }
    }, { once: true });
  },
  
  success(message, options = {}) {
    return this.show(message, { ...options, type: 'success' });
  },
  
  error(message, options = {}) {
    return this.show(message, { ...options, type: 'error' });
  },
  
  warning(message, options = {}) {
    return this.show(message, { ...options, type: 'warning' });
  },
  
  info(message, options = {}) {
    return this.show(message, { ...options, type: 'info' });
  }
};

// Make toast globally available
window.showToast = ToastManager.show.bind(ToastManager);
window.Toast = ToastManager;

// ============= BACK TO TOP BUTTON =============
function initBackToTop() {
  // Create button
  const backToTop = document.createElement('button');
  backToTop.className = 'back-to-top';
  backToTop.innerHTML = '<i class="fa fa-chevron-up"></i>';
  backToTop.setAttribute('aria-label', 'Back to top');
  document.body.appendChild(backToTop);
  
  // Show/hide based on scroll
  function toggleBackToTop() {
    if (window.pageYOffset > 300) {
      backToTop.classList.add('show');
    } else {
      backToTop.classList.remove('show');
    }
  }
  
  window.addEventListener('scroll', toggleBackToTop);
  toggleBackToTop(); // Initial check
  
  // Scroll to top on click
  backToTop.addEventListener('click', () => {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });
}

// ============= UTILITY FUNCTIONS =============

/**
 * Replace browser alert() with toast
 */
function enhanceAlerts() {
  const originalAlert = window.alert;
  window.alert = function(message) {
    // If toast is available, use it
    if (window.Toast) {
      Toast.info(message, { title: 'Alert', duration: 5000 });
    } else {
      // Fallback to original alert
      originalAlert.call(window, message);
    }
  };
}

/**
 * Loading skeleton utility
 */
function showSkeleton(container, count = 3) {
  const skeleton = document.createElement('div');
  skeleton.className = 'skeleton-card';
  
  for (let i = 0; i < count; i++) {
    skeleton.innerHTML += `
      <div class="skeleton skeleton-title"></div>
      <div class="skeleton skeleton-line"></div>
      <div class="skeleton skeleton-line"></div>
      <div class="skeleton skeleton-line"></div>
    `;
  }
  
  if (typeof container === 'string') {
    container = document.querySelector(container);
  }
  
  if (container) {
    container.innerHTML = '';
    container.appendChild(skeleton);
  }
  
  return skeleton;
}

/**
 * Hide skeleton and show content
 */
function hideSkeleton(container, content) {
  if (typeof container === 'string') {
    container = document.querySelector(container);
  }
  
  if (container) {
    container.innerHTML = content;
  }
}

/**
 * Show loading spinner
 */
function showSpinner(container, size = 'default') {
  const spinner = document.createElement('div');
  spinner.className = size === 'small' ? 'spinner spinner-sm' : 'spinner';
  
  if (typeof container === 'string') {
    container = document.querySelector(container);
  }
  
  if (container) {
    container.innerHTML = '';
    container.style.display = 'flex';
    container.style.justifyContent = 'center';
    container.style.alignItems = 'center';
    container.style.padding = '20px';
    container.appendChild(spinner);
  }
  
  return spinner;
}

/**
 * Enhanced confirm with custom styling (using SweetAlert2 if available)
 */
function confirmAction(message, callback, options = {}) {
  const {
    title = 'Confirm',
    confirmText = 'Confirm',
    cancelText = 'Cancel',
    type = 'warning'
  } = options;
  
  // Check if SweetAlert2 is available
  if (typeof Swal !== 'undefined') {
    Swal.fire({
      title: title,
      text: message,
      icon: type,
      showCancelButton: true,
      confirmButtonText: confirmText,
      cancelButtonText: cancelText,
      confirmButtonColor: '#27ae60',
      cancelButtonColor: '#6c757d'
    }).then((result) => {
      if (result.isConfirmed && callback) {
        callback();
      }
    });
  } else {
    // Fallback to native confirm
    if (confirm(message) && callback) {
      callback();
    }
  }
}

/**
 * Add ripple effect to buttons
 */
function addRippleEffects() {
  document.querySelectorAll('.btn, .ripple-effect').forEach(button => {
    button.addEventListener('click', function(e) {
      const ripple = document.createElement('span');
      const rect = this.getBoundingClientRect();
      const size = Math.max(rect.width, rect.height);
      const x = e.clientX - rect.left - size / 2;
      const y = e.clientY - rect.top - size / 2;
      
      ripple.style.width = ripple.style.height = size + 'px';
      ripple.style.left = x + 'px';
      ripple.style.top = y + 'px';
      ripple.classList.add('ripple');
      
      this.appendChild(ripple);
      
      setTimeout(() => ripple.remove(), 600);
    });
  });
}

/**
 * Smooth scroll to element
 */
function scrollToElement(element, offset = 0) {
  if (typeof element === 'string') {
    element = document.querySelector(element);
  }
  
  if (element) {
    const elementPosition = element.getBoundingClientRect().top + window.pageYOffset;
    const offsetPosition = elementPosition - offset;
    
    window.scrollTo({
      top: offsetPosition,
      behavior: 'smooth'
    });
  }
}

/**
 * Debounce function
 */
function debounce(func, wait) {
  let timeout;
  return function executedFunction(...args) {
    const later = () => {
      clearTimeout(timeout);
      func(...args);
    };
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
  };
}

/**
 * Throttle function
 */
function throttle(func, limit) {
  let inThrottle;
  return function(...args) {
    if (!inThrottle) {
      func.apply(this, args);
      inThrottle = true;
      setTimeout(() => inThrottle = false, limit);
    }
  };
}

/**
 * Lazy load images
 */
function lazyLoadImages() {
  const imageObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const img = entry.target;
        img.src = img.dataset.src;
        img.classList.remove('lazy');
        imageObserver.unobserve(img);
      }
    });
  });
  
  document.querySelectorAll('img.lazy').forEach(img => {
    imageObserver.observe(img);
  });
}

// ============= INITIALIZATION =============
document.addEventListener('DOMContentLoaded', function() {
  // Initialize back to top button
  initBackToTop();
  
  // Optionally enhance alerts (commented out by default to avoid breaking existing code)
  // enhanceAlerts();
  
  // Add ripple effects
  addRippleEffects();
  
  // Lazy load images
  if ('IntersectionObserver' in window) {
    lazyLoadImages();
  }
  
  // Add focus-ring class to form inputs
  document.querySelectorAll('input, textarea, select').forEach(input => {
    input.classList.add('focus-ring');
  });
  
  // Add card-hover to panels
  document.querySelectorAll('.panel').forEach(panel => {
    if (!panel.closest('.no-hover')) {
      panel.classList.add('card-hover');
    }
  });
});

// ============= EXPORT UTILITIES =============
window.UIEnhancements = {
  Toast: ToastManager,
  showSkeleton,
  hideSkeleton,
  showSpinner,
  confirmAction,
  scrollToElement,
  debounce,
  throttle,
  lazyLoadImages
};
