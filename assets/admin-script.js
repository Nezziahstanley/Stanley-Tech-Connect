// ========================================
// STC ADMIN - COMPLETE JAVASCRIPT
// ========================================

document.addEventListener('DOMContentLoaded', function() {
    
    // ========================================
    // THEME MANAGEMENT
    // ========================================
    initTheme();
    initAccentColor();
    initThemeToggle();
    initColorPicker();
    
    // ========================================
    // SIDEBAR
    // ========================================
    initSidebar();
    initSidebarCollapse();
    
    // ========================================
    // PROFILE DROPDOWN
    // ========================================
    initProfileDropdown();
    
    // ========================================
    // UTILITIES
    // ========================================
    initToasts();
    initTableSearch();
    initCounters();
    
    console.log('%c STC Admin ', 'background: ' + getAccentColor() + '; color: #fff; padding: 6px 12px; font-weight: 700; border-radius: 4px;');
});

// ========================================
// THEME MANAGEMENT
// ========================================
function initTheme() {
    const saved = localStorage.getItem('stc_theme') || 'light';
    document.body.setAttribute('data-theme', saved);
    updateThemeIcon(saved);
}

function updateThemeIcon(theme) {
    const icons = document.querySelectorAll('#themeToggle .theme-icon, .topbar-btn');
    icons.forEach(icon => {
        if (icon.classList.contains('theme-icon')) {
            icon.textContent = theme === 'dark' ? '☀️' : '🌙';
        }
    });
}

function initThemeToggle() {
    const btn = document.getElementById('themeToggle');
    if (!btn) return;
    
    btn.addEventListener('click', function() {
        const current = document.body.getAttribute('data-theme');
        const newTheme = current === 'dark' ? 'light' : 'dark';
        document.body.setAttribute('data-theme', newTheme);
        localStorage.setItem('stc_theme', newTheme);
        
        // Update mobile icon
        const mobileBtn = document.querySelector('.topbar-right-mobile .topbar-btn');
        if (mobileBtn) mobileBtn.textContent = newTheme === 'dark' ? '☀️' : '🌙';
        
        updateThemeIcon(newTheme);
        showToast(`Switched to ${newTheme} mode`, 'success');
        
        // Re-render charts for theme change
        if (window.stcCharts) {
            Object.values(window.stcCharts).forEach(chart => chart.update());
        }
    });
}

function toggleTheme() {
    const current = document.body.getAttribute('data-theme');
    const newTheme = current === 'dark' ? 'light' : 'dark';
    document.body.setAttribute('data-theme', newTheme);
    localStorage.setItem('stc_theme', newTheme);
}

// ========================================
// ACCENT COLOR
// ========================================
function initAccentColor() {
    const saved = localStorage.getItem('stc_accent') || 'cyan';
    document.body.setAttribute('data-accent', saved);
    
    // Mark active color
    document.querySelectorAll('.color-option').forEach(opt => {
        if (opt.getAttribute('data-accent') === saved) {
            opt.classList.add('active');
        }
    });
}

function initColorPicker() {
    const toggle = document.getElementById('colorToggle');
    const dropdown = document.getElementById('colorPicker');
    
    if (!toggle || !dropdown) return;
    
    toggle.addEventListener('click', function(e) {
        e.stopPropagation();
        dropdown.classList.toggle('active');
    });
    
    document.querySelectorAll('.color-option').forEach(opt => {
        opt.addEventListener('click', function() {
            const accent = this.getAttribute('data-accent');
            document.body.setAttribute('data-accent', accent);
            localStorage.setItem('stc_accent', accent);
            
            // Update active state
            document.querySelectorAll('.color-option').forEach(o => o.classList.remove('active'));
            this.classList.add('active');
            
            dropdown.classList.remove('active');
            showToast(`${accent.charAt(0).toUpperCase() + accent.slice(1)} theme applied!`, 'success');
            
            // Update charts
            if (window.stcCharts) {
                updateChartsColor();
            }
        });
    });
    
    // Close on outside click
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.color-picker-wrap')) {
            dropdown.classList.remove('active');
        }
    });
}

function getAccentColor() {
    const styles = getComputedStyle(document.body);
    return styles.getPropertyValue('--accent').trim() || '#00d2ff';
}

// ========================================
// SIDEBAR
// ========================================
function initSidebar() {
    const toggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('adminSidebar');
    
    // Create overlay
    let overlay = document.querySelector('.sidebar-overlay');
    if (!overlay) {
        overlay = document.createElement('div');
        overlay.className = 'sidebar-overlay';
        document.body.appendChild(overlay);
    }
    
    if (toggle && sidebar) {
        toggle.addEventListener('click', function() {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
            this.classList.toggle('active');
        });
        
        overlay.addEventListener('click', function() {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
            toggle.classList.remove('active');
        });
    }
}

function initSidebarCollapse() {
    const btn = document.getElementById('sidebarCollapseBtn');
    if (!btn) return;
    
    const saved = localStorage.getItem('stc_sidebar_collapsed');
    if (saved === 'true') {
        document.body.classList.add('sidebar-collapsed');
    }
    
    btn.addEventListener('click', function() {
        document.body.classList.toggle('sidebar-collapsed');
        const collapsed = document.body.classList.contains('sidebar-collapsed');
        localStorage.setItem('stc_sidebar_collapsed', collapsed);
    });
}

// ========================================
// PROFILE DROPDOWN
// ========================================
function initProfileDropdown() {
    const btn = document.getElementById('profileDropdownBtn');
    const dropdown = document.getElementById('profileDropdown');
    
    if (!btn || !dropdown) return;
    
    btn.addEventListener('click', function(e) {
        e.stopPropagation();
        dropdown.classList.toggle('active');
        btn.classList.toggle('active');
    });
    
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.profile-dropdown-wrap')) {
            dropdown.classList.remove('active');
            btn.classList.remove('active');
        }
    });
}

// ========================================
// TOASTS
// ========================================
function initToasts() {
    // Auto-hide existing
    document.querySelectorAll('.toast.auto-hide').forEach(el => {
        setTimeout(() => {
            el.style.transition = 'opacity 0.5s, transform 0.5s';
            el.style.opacity = '0';
            el.style.transform = 'translateX(20px)';
            setTimeout(() => el.remove(), 500);
        }, 4000);
    });
}

window.showToast = function(message, type = 'info') {
    const container = document.getElementById('toastContainer');
    if (!container) return;
    
    const icons = { success: '✅', error: '❌', warning: '⚠️', info: 'ℹ️' };
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    toast.innerHTML = `
        <span class="toast-icon">${icons[type] || 'ℹ️'}</span>
        <span class="toast-message">${message}</span>
    `;
    container.appendChild(toast);
    
    setTimeout(() => {
        toast.style.transition = 'opacity 0.4s, transform 0.4s';
        toast.style.opacity = '0';
        toast.style.transform = 'translateX(40px)';
        setTimeout(() => toast.remove(), 400);
    }, 3500);
};

// ========================================
// TABLE SEARCH
// ========================================
function initTableSearch() {
    const searchInput = document.getElementById('tableSearch');
    if (!searchInput) return;
    
    searchInput.addEventListener('input', function() {
        const query = this.value.toLowerCase();
        const rows = document.querySelectorAll('.admin-table tbody tr');
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(query) ? '' : 'none';
        });
    });
}

// ========================================
// COUNTERS
// ========================================
function initCounters() {
    document.querySelectorAll('[data-count]').forEach(el => {
        const target = parseInt(el.getAttribute('data-count')) || 0;
        animateCounter(el, target);
    });
}

function animateCounter(el, target) {
    let current = 0;
    const duration = 1500;
    const start = performance.now();
    
    function update(timestamp) {
        const progress = Math.min((timestamp - start) / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3);
        el.textContent = Math.round(target * eased).toLocaleString();
        
        if (progress < 1) requestAnimationFrame(update);
        else el.textContent = target.toLocaleString();
    }
    requestAnimationFrame(update);
}

// ========================================
// CHART HELPERS
// ========================================
function updateChartsColor() {
    const accent = getAccentColor();
    if (window.stcCharts) {
        Object.values(window.stcCharts).forEach(chart => {
            chart.data.datasets.forEach(dataset => {
                if (dataset.borderColor === '#00d2ff' || dataset.backgroundColor?.includes('0, 210, 255')) {
                    dataset.borderColor = accent;
                }
            });
            chart.update();
        });
    }
}

// Chart.js Global Defaults
if (typeof Chart !== 'undefined') {
    Chart.defaults.font.family = "'Inter', sans-serif";
    Chart.defaults.font.size = 12;
    Chart.defaults.plugins.legend.labels.usePointStyle = true;
    Chart.defaults.plugins.legend.labels.padding = 15;
    Chart.defaults.animation.duration = 1500;
    Chart.defaults.animation.easing = 'easeOutQuart';
}