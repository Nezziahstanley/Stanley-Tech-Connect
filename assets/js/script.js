// ========================================
// STANLEY TECH CONNECT - COMPLETE JAVASCRIPT
// Day 6: Responsive Design - Mobile Menu Enhancement
// ========================================

document.addEventListener('DOMContentLoaded', function() {
    console.log('Stanley Tech Connect - JavaScript Loaded!');
    console.log('Day 6: Responsive Design Complete ✅');
    
    // Initialize all components
    initMobileMenu();
    initRegistrationForm();
    initLoginForm();
    initContactForm();
    initPasswordToggles();
    initRealTimeValidation();
    initSmoothScroll();
    initPageAnimations();
    initResponsiveImages();
});

// ========================================
// MOBILE MENU (Enhanced for Day 6)
// ========================================
function initMobileMenu() {
    const toggle = document.getElementById('mobileToggle');
    const nav = document.getElementById('mainNav');
    
    if (!toggle || !nav) return;
    
    // Toggle menu
    toggle.addEventListener('click', function(e) {
        e.stopPropagation();
        nav.classList.toggle('active');
        this.classList.toggle('active');
        const isExpanded = nav.classList.contains('active');
        this.setAttribute('aria-expanded', isExpanded);
        document.body.style.overflow = isExpanded ? 'hidden' : '';
    });
    
    // Close menu when clicking outside
    document.addEventListener('click', function(e) {
        const header = document.querySelector('.header-container');
        if (header && !header.contains(e.target) && nav.classList.contains('active')) {
            closeMenu();
        }
    });
    
    // Close menu on resize to desktop
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768 && nav.classList.contains('active')) {
            closeMenu();
        }
    });
    
    // Close menu when clicking a link
    nav.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 768) {
                closeMenu();
            }
        });
    });
    
    function closeMenu() {
        nav.classList.remove('active');
        toggle.classList.remove('active');
        toggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    }
}

// ========================================
// RESPONSIVE IMAGES (Day 6 Enhancement)
// ========================================
function initResponsiveImages() {
    // Add loading="lazy" to all images for performance
    document.querySelectorAll('img').forEach(img => {
        if (!img.hasAttribute('loading')) {
            img.setAttribute('loading', 'lazy');
        }
        // Add alt text if missing
        if (!img.hasAttribute('alt') || img.getAttribute('alt') === '') {
            img.setAttribute('alt', 'Stanley Tech Connect');
        }
    });
}

// ========================================
// REGISTRATION FORM
// ========================================
function initRegistrationForm() {
    const form = document.getElementById('registerForm');
    if (!form) return;
    
    form.addEventListener('submit', function(e) {
        let isValid = true;
        const errors = [];
        
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm_password').value;
        const terms = document.getElementById('terms');
        
        clearFormErrors(this);
        
        if (name.length < 2) {
            errors.push('Name must be at least 2 characters');
            showFieldError('name', 'Name must be at least 2 characters');
            isValid = false;
        }
        
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            errors.push('Please enter a valid email address');
            showFieldError('email', 'Please enter a valid email address');
            isValid = false;
        }
        
        const phonePattern = /^[0-9]{10,15}$/;
        if (!phonePattern.test(phone)) {
            errors.push('Please enter a valid phone number (10-15 digits)');
            showFieldError('phone', 'Please enter a valid phone number (10-15 digits)');
            isValid = false;
        }
        
        if (password.length < 8) {
            errors.push('Password must be at least 8 characters');
            showFieldError('password', 'Password must be at least 8 characters');
            isValid = false;
        }
        
        if (password !== confirmPassword) {
            errors.push('Passwords do not match');
            showFieldError('confirm_password', 'Passwords do not match');
            isValid = false;
        }
        
        if (!terms || !terms.checked) {
            errors.push('You must agree to the terms and conditions');
            isValid = false;
        }
        
        if (!isValid) {
            e.preventDefault();
            showFormErrorSummary(this, errors);
            const summary = this.querySelector('.form-error-summary');
            if (summary) {
                summary.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }
    });
}

// ========================================
// LOGIN FORM
// ========================================
function initLoginForm() {
    const form = document.getElementById('loginForm');
    if (!form) return;
    
    form.addEventListener('submit', function(e) {
        let isValid = true;
        const errors = [];
        
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value;
        
        clearFormErrors(this);
        
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            errors.push('Please enter a valid email address');
            showFieldError('email', 'Please enter a valid email address');
            isValid = false;
        }
        
        if (password.length < 8) {
            errors.push('Password must be at least 8 characters');
            showFieldError('password', 'Password must be at least 8 characters');
            isValid = false;
        }
        
        if (!isValid) {
            e.preventDefault();
            showFormErrorSummary(this, errors);
            const summary = this.querySelector('.form-error-summary');
            if (summary) {
                summary.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }
    });
}

// ========================================
// CONTACT FORM
// ========================================
function initContactForm() {
    const form = document.getElementById('contactForm');
    if (!form) return;
    
    form.addEventListener('submit', function(e) {
        let isValid = true;
        const errors = [];
        
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const subject = document.getElementById('subject').value.trim();
        const message = document.getElementById('message').value.trim();
        
        clearFormErrors(this);
        
        if (name.length < 2) {
            errors.push('Name must be at least 2 characters');
            showFieldError('name', 'Name must be at least 2 characters');
            isValid = false;
        }
        
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            errors.push('Please enter a valid email address');
            showFieldError('email', 'Please enter a valid email address');
            isValid = false;
        }
        
        if (subject.length < 3) {
            errors.push('Subject must be at least 3 characters');
            showFieldError('subject', 'Subject must be at least 3 characters');
            isValid = false;
        }
        
        if (message.length < 10) {
            errors.push('Message must be at least 10 characters');
            showFieldError('message', 'Message must be at least 10 characters');
            isValid = false;
        }
        
        if (!isValid) {
            e.preventDefault();
            showFormErrorSummary(this, errors);
            const summary = this.querySelector('.form-error-summary');
            if (summary) {
                summary.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }
    });
}

// ========================================
// PASSWORD TOGGLE
// ========================================
function initPasswordToggles() {
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const input = this.closest('.input-with-icon').querySelector('input');
            if (!input) return;
            
            if (input.type === 'password') {
                input.type = 'text';
                this.textContent = '🙈';
                this.setAttribute('aria-label', 'Hide password');
            } else {
                input.type = 'password';
                this.textContent = '👁️';
                this.setAttribute('aria-label', 'Show password');
            }
        });
    });
    
    window.togglePasswordVisibility = function(fieldId) {
        const field = document.getElementById(fieldId);
        if (!field) return;
        
        const formGroup = field.closest('.form-group') || field.parentElement;
        const button = formGroup.querySelector('.toggle-password');
        
        if (field.type === 'password') {
            field.type = 'text';
            if (button) {
                button.textContent = '🙈';
                button.setAttribute('aria-label', 'Hide password');
            }
        } else {
            field.type = 'password';
            if (button) {
                button.textContent = '👁️';
                button.setAttribute('aria-label', 'Show password');
            }
        }
    };
}

// ========================================
// REAL-TIME VALIDATION
// ========================================
function initRealTimeValidation() {
    const registerForm = document.getElementById('registerForm');
    if (registerForm) {
        const passwordField = document.getElementById('password');
        if (passwordField) {
            const strengthDiv = document.getElementById('password-strength');
            
            passwordField.addEventListener('input', function() {
                const strength = checkPasswordStrength(this.value);
                
                if (strengthDiv) {
                    strengthDiv.style.display = 'block';
                    const strengthText = strengthDiv.querySelector('.strength-text');
                    const strengthBar = strengthDiv.querySelector('.strength-bar');
                    
                    if (strengthText) {
                        strengthText.textContent = strength.text;
                        strengthText.style.color = strength.color;
                    }
                    
                    if (strengthBar) {
                        strengthBar.className = 'strength-bar';
                        if (strength.value > 0) {
                            strengthBar.classList.add(strength.class);
                        }
                    }
                }
            });
            
            passwordField.addEventListener('blur', function() {
                if (this.value.length === 0 && strengthDiv) {
                    strengthDiv.style.display = 'none';
                }
            });
        }
        
        const confirmField = document.getElementById('confirm_password');
        if (confirmField) {
            confirmField.addEventListener('input', function() {
                const password = document.getElementById('password').value;
                const confirm = this.value;
                
                if (confirm.length > 0) {
                    if (password !== confirm) {
                        this.style.borderColor = '#e74c3c';
                        this.classList.add('error');
                        showFieldError('confirm_password', 'Passwords do not match');
                    } else {
                        this.style.borderColor = '#2ecc71';
                        this.classList.add('success');
                        this.classList.remove('error');
                        const error = this.closest('.form-group').querySelector('.field-error');
                        if (error) error.remove();
                    }
                } else {
                    this.style.borderColor = '#ddd';
                    this.classList.remove('error', 'success');
                    const error = this.closest('.form-group').querySelector('.field-error');
                    if (error) error.remove();
                }
            });
        }
    }
}

// ========================================
// PASSWORD STRENGTH CHECKER
// ========================================
function checkPasswordStrength(password) {
    let score = 0;
    
    if (password.length === 0) {
        return { value: 0, text: 'Enter a password', color: '#888', class: '' };
    }
    
    if (password.length >= 8) score++;
    if (password.length >= 12) score++;
    if (/[a-z]/.test(password)) score++;
    if (/[A-Z]/.test(password)) score++;
    if (/[0-9]/.test(password)) score++;
    if (/[^a-zA-Z0-9]/.test(password)) score++;
    
    if (score <= 2) {
        return { value: 1, text: 'Weak - Add more characters and variety', color: '#e74c3c', class: 'weak' };
    } else if (score <= 4) {
        return { value: 2, text: 'Medium - Add uppercase and special characters', color: '#ffc107', class: 'medium' };
    } else {
        return { value: 3, text: 'Strong - Great password!', color: '#2ecc71', class: 'strong' };
    }
}

// ========================================
// FORM HELPER FUNCTIONS
// ========================================
function showFieldError(fieldId, message) {
    const field = document.getElementById(fieldId);
    if (!field) return;
    
    field.style.borderColor = '#e74c3c';
    field.classList.add('error');
    field.classList.remove('success');
    
    const formGroup = field.closest('.form-group') || field.parentElement;
    if (!formGroup) return;
    
    let errorMsg = formGroup.querySelector('.field-error');
    if (!errorMsg) {
        errorMsg = document.createElement('small');
        errorMsg.className = 'field-error';
        formGroup.appendChild(errorMsg);
    }
    errorMsg.textContent = message;
}

function showFormErrorSummary(form, errors) {
    const existingSummary = form.querySelector('.form-error-summary');
    if (existingSummary) existingSummary.remove();
    
    const errorDiv = document.createElement('div');
    errorDiv.className = 'form-error-summary';
    errorDiv.setAttribute('role', 'alert');
    errorDiv.innerHTML = `
        <strong>❌ Please fix the following errors:</strong>
        <ul>
            ${errors.map(err => `<li>${escapeHtml(err)}</li>`).join('')}
        </ul>
    `;
    form.prepend(errorDiv);
}

function clearFormErrors(form) {
    form.querySelectorAll('input, textarea, select').forEach(field => {
        field.style.borderColor = '#ddd';
        field.classList.remove('error', 'success');
    });
    
    form.querySelectorAll('.field-error').forEach(el => el.remove());
    const summary = form.querySelector('.form-error-summary');
    if (summary) summary.remove();
}

function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

// ========================================
// SMOOTH SCROLL
// ========================================
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const target = document.querySelector(targetId);
            if (target) {
                e.preventDefault();
                const headerOffset = 70;
                const elementPosition = target.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                
                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// ========================================
// PAGE ANIMATIONS
// ========================================
function initPageAnimations() {
    document.querySelectorAll('.card, .service-card, .course-card').forEach((card, index) => {
        if (!card.classList.contains('fade-in-up')) {
            card.classList.add('fade-in-up');
            card.style.animationDelay = `${(index % 4) * 0.1}s`;
        }
    });
    
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });
        
        document.querySelectorAll('.fade-in-up').forEach(el => {
            if (el.style.opacity !== '1') {
                observer.observe(el);
            }
        });
    }
}

// ========================================
// CONSOLE HELPERS
// ========================================
console.log('%c Stanley Tech Connect ', 'background: #00d2ff; color: #1a1a2e; font-size: 18px; font-weight: bold; padding: 8px 16px; border-radius: 4px;');
console.log('%c Day 6: Responsive Design Complete ✅ ', 'background: #2ecc71; color: #fff; font-size: 14px; padding: 4px 12px; border-radius: 4px;');

window.STC = {
    togglePasswordVisibility: window.togglePasswordVisibility,
    showFieldError,
    clearFormErrors,
    checkPasswordStrength
};