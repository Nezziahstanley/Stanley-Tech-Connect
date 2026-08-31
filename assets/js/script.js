// ========================================
// STANLEY TECH CONNECT - COMPLETE JAVASCRIPT
// Days 1-5: Foundation, Forms, Interactivity & Mobile Menu
// ========================================

// Global variable for form state
const formState = {};

// ========================================
// DOCUMENT READY - Initialization
// ========================================
document.addEventListener('DOMContentLoaded', function() {
    console.log('Stanley Tech Connect - JavaScript Loaded!');
    console.log('Day 5: Reusable Header & Footer Complete ✅');
    
    // Initialize all components
    initMobileMenu();
    initRegistrationForm();
    initLoginForm();
    initContactForm();
    initPasswordToggles();
    initRealTimeValidation();
    initSmoothScroll();
    initPageAnimations();
    initFormAutoSave();
});

// ========================================
// MOBILE MENU (Day 5 Enhancement)
// ========================================
function initMobileMenu() {
    const toggle = document.getElementById('mobileToggle');
    const nav = document.getElementById('mainNav');
    
    if (!toggle || !nav) {
        // If elements don't exist, try to create them
        createMobileMenu();
        return;
    }
    
    // Toggle menu on button click
    toggle.addEventListener('click', function(e) {
        e.stopPropagation();
        nav.classList.toggle('active');
        this.classList.toggle('active');
        const isExpanded = nav.classList.contains('active');
        this.setAttribute('aria-expanded', isExpanded);
        
        // Update button text for accessibility
        this.innerHTML = isExpanded 
            ? '<span></span><span></span><span></span>' 
            : '<span></span><span></span><span></span>';
    });
    
    // Close menu when clicking outside
    document.addEventListener('click', function(e) {
        const header = document.querySelector('.header-container');
        if (header && !header.contains(e.target) && nav.classList.contains('active')) {
            nav.classList.remove('active');
            toggle.classList.remove('active');
            toggle.setAttribute('aria-expanded', 'false');
        }
    });
    
    // Close menu when clicking a link (mobile only)
    nav.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 768 && nav.classList.contains('active')) {
                nav.classList.remove('active');
                toggle.classList.remove('active');
                toggle.setAttribute('aria-expanded', 'false');
            }
        });
    });
    
    // Handle window resize - close menu on desktop
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768 && nav.classList.contains('active')) {
            nav.classList.remove('active');
            toggle.classList.remove('active');
            toggle.setAttribute('aria-expanded', 'false');
        }
    });
}

// ========================================
// CREATE MOBILE MENU (Fallback)
// ========================================
function createMobileMenu() {
    const header = document.querySelector('.header-container');
    if (!header) return;
    
    // Check if nav exists
    let nav = document.getElementById('mainNav');
    if (!nav) {
        nav = document.querySelector('nav');
        if (nav) nav.id = 'mainNav';
    }
    
    // Check if toggle exists
    let toggle = document.getElementById('mobileToggle');
    if (!toggle) {
        toggle = document.createElement('button');
        toggle.id = 'mobileToggle';
        toggle.className = 'mobile-toggle';
        toggle.setAttribute('aria-label', 'Toggle menu');
        toggle.setAttribute('aria-expanded', 'false');
        toggle.innerHTML = '<span></span><span></span><span></span>';
        header.appendChild(toggle);
    }
    
    // Re-run mobile menu init
    initMobileMenu();
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
        
        // Get form values
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm_password').value;
        const terms = document.getElementById('terms');
        
        // Clear previous errors
        clearFormErrors(this);
        
        // Validate name
        if (name.length < 2) {
            errors.push('Name must be at least 2 characters');
            showFieldError('name', 'Name must be at least 2 characters');
            isValid = false;
        } else if (name.length > 50) {
            errors.push('Name must be less than 50 characters');
            showFieldError('name', 'Name must be less than 50 characters');
            isValid = false;
        }
        
        // Validate email
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            errors.push('Please enter a valid email address');
            showFieldError('email', 'Please enter a valid email address');
            isValid = false;
        }
        
        // Validate phone
        const phonePattern = /^[0-9]{10,15}$/;
        if (!phonePattern.test(phone)) {
            errors.push('Please enter a valid phone number (10-15 digits)');
            showFieldError('phone', 'Please enter a valid phone number (10-15 digits)');
            isValid = false;
        }
        
        // Validate password
        if (password.length < 8) {
            errors.push('Password must be at least 8 characters');
            showFieldError('password', 'Password must be at least 8 characters');
            isValid = false;
        } else if (password.length > 50) {
            errors.push('Password must be less than 50 characters');
            showFieldError('password', 'Password must be less than 50 characters');
            isValid = false;
        }
        
        // Validate confirm password
        if (password !== confirmPassword) {
            errors.push('Passwords do not match');
            showFieldError('confirm_password', 'Passwords do not match');
            isValid = false;
        }
        
        // Validate terms
        if (!terms || !terms.checked) {
            errors.push('You must agree to the terms and conditions');
            showFieldError('terms', 'Please agree to the terms');
            isValid = false;
        }
        
        // If not valid, prevent submission
        if (!isValid) {
            e.preventDefault();
            showFormErrorSummary(this, errors);
            
            // Scroll to error summary
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
        
        // Clear previous errors
        clearFormErrors(this);
        
        // Validate email
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            errors.push('Please enter a valid email address');
            showFieldError('email', 'Please enter a valid email address');
            isValid = false;
        }
        
        // Validate password
        if (password.length < 8) {
            errors.push('Password must be at least 8 characters');
            showFieldError('password', 'Password must be at least 8 characters');
            isValid = false;
        }
        
        if (!isValid) {
            e.preventDefault();
            showFormErrorSummary(this, errors);
            
            // Scroll to error summary
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
        
        // Clear previous errors
        clearFormErrors(this);
        
        // Validate name
        if (name.length < 2) {
            errors.push('Name must be at least 2 characters');
            showFieldError('name', 'Name must be at least 2 characters');
            isValid = false;
        }
        
        // Validate email
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            errors.push('Please enter a valid email address');
            showFieldError('email', 'Please enter a valid email address');
            isValid = false;
        }
        
        // Validate subject
        if (subject.length < 3) {
            errors.push('Subject must be at least 3 characters');
            showFieldError('subject', 'Subject must be at least 3 characters');
            isValid = false;
        }
        
        // Validate message
        if (message.length < 10) {
            errors.push('Message must be at least 10 characters');
            showFieldError('message', 'Message must be at least 10 characters');
            isValid = false;
        } else if (message.length > 2000) {
            errors.push('Message must be less than 2000 characters');
            showFieldError('message', 'Message must be less than 2000 characters');
            isValid = false;
        }
        
        if (!isValid) {
            e.preventDefault();
            showFormErrorSummary(this, errors);
            
            // Scroll to error summary
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
    // Find all password toggle buttons
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
    
    // Also handle the togglePasswordVisibility function call from HTML onclick
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
    // Registration form real-time validation
    const registerForm = document.getElementById('registerForm');
    if (registerForm) {
        // Password strength indicator
        const passwordField = document.getElementById('password');
        if (passwordField) {
            const strengthDiv = document.getElementById('password-strength');
            
            passwordField.addEventListener('input', function() {
                const strength = checkPasswordStrength(this.value);
                
                if (strengthDiv) {
                    // Show the strength indicator
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
            
            // Hide strength indicator when empty
            passwordField.addEventListener('blur', function() {
                if (this.value.length === 0 && strengthDiv) {
                    strengthDiv.style.display = 'none';
                }
            });
        }
        
        // Password match check in real-time
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
        
        // Email format check in real-time
        const emailField = document.getElementById('email');
        if (emailField) {
            emailField.addEventListener('blur', function() {
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (this.value.length > 0 && !emailPattern.test(this.value)) {
                    this.style.borderColor = '#e74c3c';
                    this.classList.add('error');
                    showFieldError('email', 'Please enter a valid email address');
                } else if (this.value.length > 0) {
                    this.style.borderColor = '#2ecc71';
                    this.classList.add('success');
                    this.classList.remove('error');
                    const error = this.closest('.form-group').querySelector('.field-error');
                    if (error) error.remove();
                }
            });
            
            // Clear validation on focus
            emailField.addEventListener('focus', function() {
                this.style.borderColor = '#ddd';
                this.classList.remove('error', 'success');
                const error = this.closest('.form-group').querySelector('.field-error');
                if (error) error.remove();
            });
        }
        
        // Phone format check in real-time
        const phoneField = document.getElementById('phone');
        if (phoneField) {
            phoneField.addEventListener('blur', function() {
                const phonePattern = /^[0-9]{10,15}$/;
                if (this.value.length > 0 && !phonePattern.test(this.value)) {
                    this.style.borderColor = '#e74c3c';
                    this.classList.add('error');
                    showFieldError('phone', 'Please enter a valid phone number (10-15 digits)');
                } else if (this.value.length > 0) {
                    this.style.borderColor = '#2ecc71';
                    this.classList.add('success');
                    this.classList.remove('error');
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

// Show error message for a specific field
function showFieldError(fieldId, message) {
    const field = document.getElementById(fieldId);
    if (!field) return;
    
    field.style.borderColor = '#e74c3c';
    field.classList.add('error');
    field.classList.remove('success');
    
    // Find the form group
    const formGroup = field.closest('.form-group') || field.parentElement;
    if (!formGroup) return;
    
    // Check if error message already exists
    let errorMsg = formGroup.querySelector('.field-error');
    if (!errorMsg) {
        errorMsg = document.createElement('small');
        errorMsg.className = 'field-error';
        formGroup.appendChild(errorMsg);
    }
    errorMsg.textContent = message;
}

// Show field success
function showFieldSuccess(fieldId) {
    const field = document.getElementById(fieldId);
    if (!field) return;
    
    field.style.borderColor = '#2ecc71';
    field.classList.add('success');
    field.classList.remove('error');
    
    // Remove error message
    const formGroup = field.closest('.form-group') || field.parentElement;
    if (formGroup) {
        const errorMsg = formGroup.querySelector('.field-error');
        if (errorMsg) errorMsg.remove();
    }
}

// Show form error summary
function showFormErrorSummary(form, errors) {
    // Remove existing summary
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

// Clear all form errors
function clearFormErrors(form) {
    // Remove error styles
    form.querySelectorAll('input, textarea, select').forEach(field => {
        field.style.borderColor = '#ddd';
        field.classList.remove('error', 'success');
    });
    
    // Remove error messages
    form.querySelectorAll('.field-error').forEach(el => el.remove());
    
    // Remove error summary
    const summary = form.querySelector('.form-error-summary');
    if (summary) summary.remove();
}

// Escape HTML to prevent XSS
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
                const headerOffset = 80;
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
    // Add fade-in-up animation to cards
    document.querySelectorAll('.card, .service-card, .course-card').forEach((card, index) => {
        // Only add animation if not already animated
        if (!card.classList.contains('fade-in-up') && !card.classList.contains('slide-in-left') && !card.classList.contains('slide-in-right')) {
            card.classList.add('fade-in-up');
            card.style.animationDelay = `${(index % 4) * 0.1}s`;
        }
    });
    
    // Intersection Observer for scroll animations
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
        
        document.querySelectorAll('.fade-in-up, .slide-in-left, .slide-in-right, .zoom-in').forEach(el => {
            // Only observe elements that are not visible
            if (el.style.opacity !== '1') {
                observer.observe(el);
            }
        });
    }
}

// ========================================
// FORM AUTO-SAVE (Local Storage)
// ========================================
function initFormAutoSave() {
    const forms = document.querySelectorAll('form[data-autosave]');
    forms.forEach(form => {
        const storageKey = form.id || 'form-data';
        
        // Load saved data
        const savedData = localStorage.getItem(storageKey);
        if (savedData) {
            try {
                const data = JSON.parse(savedData);
                Object.keys(data).forEach(key => {
                    const field = form.querySelector(`[name="${key}"]`);
                    if (field && !field.value) {
                        field.value = data[key];
                    }
                });
            } catch (e) {
                console.warn('Failed to load saved form data:', e);
            }
        }
        
        // Save data on input
        form.addEventListener('input', function() {
            const data = {};
            this.querySelectorAll('input, textarea, select').forEach(field => {
                if (field.name && !field.name.startsWith('_') && field.type !== 'password' && field.type !== 'checkbox') {
                    data[field.name] = field.value;
                }
            });
            try {
                localStorage.setItem(storageKey, JSON.stringify(data));
            } catch (e) {
                console.warn('Failed to save form data:', e);
            }
        });
        
        // Clear saved data on successful submit
        form.addEventListener('submit', function() {
            localStorage.removeItem(storageKey);
        });
    });
}

// ========================================
// UTILITY: Form Field Focus
// ========================================
function focusField(fieldId) {
    const field = document.getElementById(fieldId);
    if (field) {
        field.focus();
        field.select();
    }
}

// ========================================
// UTILITY: Form Reset
// ========================================
function resetForm(formId) {
    const form = document.getElementById(formId);
    if (form) {
        form.reset();
        clearFormErrors(form);
        // Clear auto-save data
        localStorage.removeItem(formId || 'form-data');
    }
}

// ========================================
// UTILITY: Scroll to Top
// ========================================
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// ========================================
// UTILITY: Get URL Parameters
// ========================================
function getUrlParams() {
    const params = {};
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    for (const [key, value] of urlParams) {
        params[key] = value;
    }
    return params;
}

// ========================================
// CONSOLE HELPERS (For testing)
// ========================================
console.log('%c Stanley Tech Connect ', 'background: #00d2ff; color: #1a1a2e; font-size: 18px; font-weight: bold; padding: 8px 16px; border-radius: 4px;');
console.log('%c Day 5: Reusable Header & Footer Complete ✅ ', 'background: #2ecc71; color: #fff; font-size: 14px; padding: 4px 12px; border-radius: 4px;');

// Expose helper functions globally for debugging
window.STC = {
    focusField,
    resetForm,
    clearFormErrors,
    checkPasswordStrength,
    scrollToTop,
    getUrlParams,
    togglePasswordVisibility: window.togglePasswordVisibility,
    showFieldError,
    showFieldSuccess
};