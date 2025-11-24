/**
 * Mobile Enhancements JavaScript
 * Version: 1.0.0
 * Date: 2025-11-18
 * 
 * Handles:
 * - Auto-wrapping tables in responsive containers
 * - Scroll detection for table indicators
 * - Touch optimization
 */

(function() {
    'use strict';

    /**
     * Initialize mobile enhancements when DOM is ready
     */
    function init() {
        wrapTables();
        setupTableScrollDetection();
        setupTouchOptimizations();
        setupFormValidation();
    }

    /**
     * Automatically wrap all tables in responsive containers
     * if they're not already wrapped
     */
    function wrapTables() {
        // Find all tables that are NOT already in a .table-responsive wrapper
        const tables = document.querySelectorAll('table:not(.table-responsive table)');
        
        tables.forEach(table => {
            // Skip if table is already wrapped
            if (table.parentElement.classList.contains('table-responsive')) {
                return;
            }
            
            // Add .table class if not present
            if (!table.classList.contains('table')) {
                table.classList.add('table');
            }
            
            // Create wrapper
            const wrapper = document.createElement('div');
            wrapper.className = 'table-responsive';
            
            // Check if this table should have sticky columns
            // (typically tables with many columns benefit from this)
            const columnCount = table.rows[0]?.cells.length || 0;
            if (columnCount > 5) {
                table.classList.add('table-sticky-col');
            }
            
            // Wrap the table
            table.parentNode.insertBefore(wrapper, table);
            wrapper.appendChild(table);
        });
        
        console.log(`Wrapped ${tables.length} tables for mobile responsiveness`);
    }

    /**
     * Setup scroll detection on table wrappers
     * to hide the scroll indicator after user scrolls
     */
    function setupTableScrollDetection() {
        const wrappers = document.querySelectorAll('.table-responsive');
        
        wrappers.forEach(wrapper => {
            wrapper.addEventListener('scroll', function() {
                // Add 'scrolled' class when user scrolls
                if (this.scrollLeft > 10) {
                    this.classList.add('scrolled');
                }
            }, { passive: true });
        });
    }

    /**
     * Setup touch optimizations for mobile devices
     */
    function setupTouchOptimizations() {
        // Only run on touch devices
        if (!('ontouchstart' in window)) {
            return;
        }

        // Add active state to buttons on touch
        document.addEventListener('touchstart', function(e) {
            if (e.target.matches('button, .btn, a.btn')) {
                e.target.classList.add('active');
            }
        }, { passive: true });

        document.addEventListener('touchend', function(e) {
            if (e.target.matches('button, .btn, a.btn')) {
                setTimeout(() => {
                    e.target.classList.remove('active');
                }, 150);
            }
        }, { passive: true });

        // Prevent double-tap zoom on buttons
        let lastTouchEnd = 0;
        document.addEventListener('touchend', function(e) {
            const now = Date.now();
            if (now - lastTouchEnd <= 300 && e.target.matches('button, .btn, a.btn')) {
                e.preventDefault();
            }
            lastTouchEnd = now;
        }, false);
    }

    /**
     * Mobile form validation and UX improvements
     */
    function setupFormValidation() {
        // Auto-scroll to first error on form submission
        const forms = document.querySelectorAll('form');
        
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                // Find first invalid field
                const firstInvalid = form.querySelector(':invalid, .error');
                
                if (firstInvalid) {
                    // Scroll to it smoothly
                    setTimeout(() => {
                        firstInvalid.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        firstInvalid.focus();
                    }, 100);
                }
            });
        });

        // Add visual feedback for form inputs on mobile
        if (window.innerWidth <= 768) {
            const inputs = document.querySelectorAll('input, select, textarea');
            
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('input-focused');
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('input-focused');
                });
            });
        }
    }

    /**
     * Utility: Check if device is mobile
     */
    function isMobileDevice() {
        return (
            /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ||
            window.innerWidth <= 768
        );
    }

    /**
     * Utility: Debounce function for resize events
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
     * Re-initialize on window resize (debounced)
     */
    const handleResize = debounce(function() {
        // Re-wrap any new tables that may have been added
        wrapTables();
        setupTableScrollDetection();
    }, 250);

    window.addEventListener('resize', handleResize);

    /**
     * Initialize when DOM is ready
     */
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    /**
     * Expose API for manual re-initialization if needed
     */
    window.MobileEnhancements = {
        init: init,
        wrapTables: wrapTables,
        isMobile: isMobileDevice
    };

    /**
     * Add viewport height CSS variable for mobile browsers
     * (fixes issues with address bar height changes)
     */
    function setViewportHeight() {
        const vh = window.innerHeight * 0.01;
        document.documentElement.style.setProperty('--vh', `${vh}px`);
    }

    setViewportHeight();
    window.addEventListener('resize', debounce(setViewportHeight, 100));

    console.log('Mobile Enhancements initialized');
})();
