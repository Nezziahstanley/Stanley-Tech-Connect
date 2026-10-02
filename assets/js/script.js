// ========================================
// STANLEY TECH CONNECT - COMPLETE JAVASCRIPT
// Day 10: Form Validation - Client-Side Validation
// ========================================

console.log('%c Stanley Tech Connect ', 'background: #00d2ff; color: #1a1a2e; font-size: 18px; font-weight: bold; padding: 8px 16px; border-radius: 4px;');
console.log('%c Day 10: Form Validation Complete ✅ ', 'background: #2ecc71; color: #fff; font-size: 14px; padding: 4px 12px; border-radius: 4px;');

// Wait for DOM to load
document.addEventListener('DOMContentLoaded', function() {
    console.log('\n===== DAY 10: FORM VALIDATION =====');
    
    // ========================================
    // 1. REGISTRATION FORM VALIDATION
    // ========================================
    
    console.log('\n===== 1. REGISTRATION FORM =====');
    
    const registerForm = document.getElementById('registerForm');
    if (registerForm) {
        registerForm.addEventListener('submit', function(event) {
            event.preventDefault();
            
            console.log('📝 Registration form submitted - validating...');
            
            const name = document.getElementById('regName').value.trim();
            const email = document.getElementById('regEmail').value.trim();
            const phone = document.getElementById('regPhone').value.trim();
            const password = document.getElementById('regPassword').value;
            const confirmPassword = document.getElementById('regConfirmPassword').value;
            const terms = document.getElementById('regTerms').checked;
            
            clearValidationErrors();
            
            const errors = {};
            let isValid = true;
            
            // Validate Name
            if (name.length === 0) {
                errors.name = 'Full name is required';
                isValid = false;
            } else if (name.length < 2) {
                errors.name = 'Name must be at least 2 characters';
                isValid = false;
            } else if (name.length > 50) {
                errors.name = 'Name must be less than 50 characters';
                isValid = false;
            }
            
            // Validate Email
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email.length === 0) {
                errors.email = 'Email address is required';
                isValid = false;
            } else if (!emailPattern.test(email)) {
                errors.email = 'Please enter a valid email address';
                isValid = false;
            }
            
            // Validate Phone
            const phonePattern = /^[0-9]{10,15}$/;
            if (phone.length === 0) {
                errors.phone = 'Phone number is required';
                isValid = false;
            } else if (!phonePattern.test(phone)) {
                errors.phone = 'Please enter a valid phone number (10-15 digits)';
                isValid = false;
            }
            
            // Validate Password
            if (password.length === 0) {
                errors.password = 'Password is required';
                isValid = false;
            } else if (password.length < 8) {
                errors.password = 'Password must be at least 8 characters';
                isValid = false;
            } else if (password.length > 50) {
                errors.password = 'Password must be less than 50 characters';
                isValid = false;
            }
            
            // Validate Confirm Password
            if (confirmPassword.length === 0) {
                errors.confirmPassword = 'Please confirm your password';
                isValid = false;
            } else if (password !== confirmPassword) {
                errors.confirmPassword = 'Passwords do not match';
                isValid = false;
            }
            
            // Validate Terms
            if (!terms) {
                errors.terms = 'You must agree to the Terms of Service';
                isValid = false;
            }
            
            if (isValid) {
                showValidationSuccess('✅ Registration successful! Welcome to Stanley Tech Connect!');
                console.log('✅ Registration validated successfully');
                registerForm.reset();
                registerForm.scrollIntoView({ behavior: 'smooth', block: 'center' });
            } else {
                showValidationErrors(errors);
                console.log('❌ Validation failed:', Object.keys(errors).length, 'errors found');
                const firstErrorField = Object.keys(errors)[0];
                const field = document.getElementById(firstErrorField);
                if (field) {
                    field.focus();
                }
            }
        });
        
        // Real-time validation for registration form
        setupRealTimeValidation('regName', 'nameError', 'Name must be at least 2 characters', 2);
        setupRealTimeValidation('regEmail', 'emailError', 'Please enter a valid email');
        setupRealTimeValidation('regPhone', 'phoneError', 'Please enter 10-15 digits', 10);
        
        // Real-time password strength
        const regPassword = document.getElementById('regPassword');
        if (regPassword) {
            regPassword.addEventListener('input', function() {
                const strength = checkPasswordStrength(this.value);
                const strengthDiv = document.getElementById('regPasswordStrength');
                
                if (strengthDiv) {
                    strengthDiv.style.display = 'block';
                    const textSpan = strengthDiv.querySelector('.strength-text');
                    const barDiv = strengthDiv.querySelector('.strength-bar');
                    
                    if (textSpan) {
                        textSpan.textContent = strength.text;
                        textSpan.style.color = strength.color;
                    }
                    
                    if (barDiv) {
                        barDiv.className = 'strength-bar';
                        if (strength.value > 0) {
                            barDiv.classList.add(strength.class);
                        }
                    }
                }
            });
        }
        
        // Real-time password match
        const regConfirm = document.getElementById('regConfirmPassword');
        if (regConfirm) {
            regConfirm.addEventListener('input', function() {
                const password = document.getElementById('regPassword').value;
                const confirm = this.value;
                const errorDiv = document.getElementById('confirmPasswordError');
                
                if (confirm.length > 0) {
                    if (password !== confirm) {
                        errorDiv.textContent = '❌ Passwords do not match';
                        errorDiv.style.color = '#e74c3c';
                        this.style.borderColor = '#e74c3c';
                    } else {
                        errorDiv.textContent = '✅ Passwords match';
                        errorDiv.style.color = '#2ecc71';
                        this.style.borderColor = '#2ecc71';
                    }
                } else {
                    errorDiv.textContent = '';
                    this.style.borderColor = '#ddd';
                }
            });
        }
        
        console.log('✅ Registration form validation initialized');
    }
    
    // ========================================
    // 2. LOGIN FORM VALIDATION
    // ========================================
    
    console.log('\n===== 2. LOGIN FORM =====');
    
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();
            
            console.log('🔐 Login form submitted - validating...');
            
            const email = document.getElementById('loginEmail').value.trim();
            const password = document.getElementById('loginPassword').value;
            
            document.getElementById('loginEmailError').textContent = '';
            document.getElementById('loginPasswordError').textContent = '';
            
            const errors = {};
            let isValid = true;
            
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email.length === 0) {
                errors.email = 'Email address is required';
                isValid = false;
            } else if (!emailPattern.test(email)) {
                errors.email = 'Please enter a valid email address';
                isValid = false;
            }
            
            if (password.length === 0) {
                errors.password = 'Password is required';
                isValid = false;
            } else if (password.length < 8) {
                errors.password = 'Password must be at least 8 characters';
                isValid = false;
            }
            
            if (isValid) {
                showValidationSuccess('✅ Login successful! Redirecting to dashboard...');
                console.log('✅ Login validated successfully');
                loginForm.reset();
            } else {
                if (errors.email) {
                    document.getElementById('loginEmailError').textContent = errors.email;
                    document.getElementById('loginEmailError').style.color = '#e74c3c';
                }
                if (errors.password) {
                    document.getElementById('loginPasswordError').textContent = errors.password;
                    document.getElementById('loginPasswordError').style.color = '#e74c3c';
                }
                console.log('❌ Login validation failed');
            }
        });
        
        setupRealTimeValidation('loginEmail', 'loginEmailError', 'Please enter a valid email');
        setupRealTimeValidation('loginPassword', 'loginPasswordError', 'Password must be at least 8 characters', 8);
        
        console.log('✅ Login form validation initialized');
    }
    
    // ========================================
    // 3. CONTACT FORM VALIDATION
    // ========================================
    
    console.log('\n===== 3. CONTACT FORM =====');
    
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(event) {
            event.preventDefault();
            
            console.log('📧 Contact form submitted - validating...');
            
            const name = document.getElementById('contactName').value.trim();
            const email = document.getElementById('contactEmail').value.trim();
            const subject = document.getElementById('contactSubject').value.trim();
            const message = document.getElementById('contactMessage').value.trim();
            
            clearContactErrors();
            
            const errors = {};
            let isValid = true;
            
            if (name.length === 0) {
                errors.name = 'Name is required';
                isValid = false;
            } else if (name.length < 2) {
                errors.name = 'Name must be at least 2 characters';
                isValid = false;
            }
            
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email.length === 0) {
                errors.email = 'Email is required';
                isValid = false;
            } else if (!emailPattern.test(email)) {
                errors.email = 'Please enter a valid email address';
                isValid = false;
            }
            
            if (subject.length === 0) {
                errors.subject = 'Subject is required';
                isValid = false;
            } else if (subject.length < 3) {
                errors.subject = 'Subject must be at least 3 characters';
                isValid = false;
            }
            
            if (message.length === 0) {
                errors.message = 'Message is required';
                isValid = false;
            } else if (message.length < 10) {
                errors.message = 'Message must be at least 10 characters';
                isValid = false;
            } else if (message.length > 2000) {
                errors.message = 'Message must be less than 2000 characters';
                isValid = false;
            }
            
            if (isValid) {
                showValidationSuccess('✅ Message sent successfully! We\'ll get back to you within 24 hours.');
                console.log('✅ Contact form validated successfully');
                contactForm.reset();
                document.getElementById('charCounter').textContent = '0/2000';
            } else {
                showContactErrors(errors);
                console.log('❌ Contact form validation failed');
            }
        });
        
        const contactMessage = document.getElementById('contactMessage');
        const charCounter = document.getElementById('charCounter');
        
        if (contactMessage && charCounter) {
            contactMessage.addEventListener('input', function() {
                const length = this.value.length;
                charCounter.textContent = `${length}/2000`;
                
                if (length < 10 && length > 0) {
                    charCounter.style.color = '#e74c3c';
                } else if (length >= 10 && length <= 2000) {
                    charCounter.style.color = '#2ecc71';
                } else {
                    charCounter.style.color = '#888';
                }
            });
        }
        
        console.log('✅ Contact form validation initialized');
    }
    
    // ========================================
    // 4. HELPER FUNCTIONS
    // ========================================
    
    console.log('\n===== 4. HELPER FUNCTIONS =====');
    
    function showValidationErrors(errors) {
        const existingSummary = document.querySelector('.validation-summary');
        if (existingSummary) existingSummary.remove();
        
        const summary = document.createElement('div');
        summary.className = 'validation-summary form-error-summary';
        summary.style.cssText = 'margin-bottom: 20px;';
        summary.innerHTML = `
            <strong>❌ Please fix the following errors:</strong>
            <ul style="margin: 10px 0 0 20px;">
                ${Object.values(errors).map(err => `<li>${err}</li>`).join('')}
            </ul>
        `;
        
        const form = document.querySelector('form');
        if (form) {
            form.prepend(summary);
        }
        
        Object.keys(errors).forEach(fieldId => {
            const field = document.getElementById(fieldId);
            if (field) {
                field.style.borderColor = '#e74c3c';
                field.classList.add('error');
            }
        });
    }
    
    function showValidationSuccess(message) {
        const summary = document.createElement('div');
        summary.className = 'validation-success form-success-summary';
        summary.style.cssText = 'margin-bottom: 20px;';
        summary.innerHTML = `<strong>${message}</strong>`;
        
        const form = document.querySelector('form');
        if (form) {
            const existing = form.querySelector('.validation-success');
            if (existing) existing.remove();
            form.prepend(summary);
        }
    }
    
    function clearValidationErrors() {
        document.querySelectorAll('.field-error').forEach(el => el.textContent = '');
        document.querySelectorAll('input, textarea, select').forEach(el => {
            el.style.borderColor = '#ddd';
            el.classList.remove('error', 'success');
        });
        const summary = document.querySelector('.validation-summary');
        if (summary) summary.remove();
    }
    
    function setupRealTimeValidation(inputId, errorId, message, minLength) {
        const input = document.getElementById(inputId);
        const error = document.getElementById(errorId);
        
        if (input && error) {
            input.addEventListener('blur', function() {
                const value = this.value.trim();
                
                if (value.length === 0) {
                    error.textContent = '⚠️ ' + message;
                    error.style.color = '#e74c3c';
                    this.style.borderColor = '#e74c3c';
                } else if (minLength && value.length < minLength) {
                    error.textContent = '⚠️ ' + message;
                    error.style.color = '#e74c3c';
                    this.style.borderColor = '#e74c3c';
                } else if (inputId === 'regEmail' || inputId === 'loginEmail') {
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailPattern.test(value)) {
                        error.textContent = '⚠️ ' + message;
                        error.style.color = '#e74c3c';
                        this.style.borderColor = '#e74c3c';
                    } else {
                        error.textContent = '✅ Valid';
                        error.style.color = '#2ecc71';
                        this.style.borderColor = '#2ecc71';
                    }
                } else {
                    error.textContent = '✅ Valid';
                    error.style.color = '#2ecc71';
                    this.style.borderColor = '#2ecc71';
                }
            });
            
            input.addEventListener('focus', function() {
                this.style.borderColor = '#00d2ff';
            });
        }
    }
    
    function showContactErrors(errors) {
        const fields = {
            name: 'contactNameError',
            email: 'contactEmailError',
            subject: 'contactSubjectError',
            message: 'contactMessageError'
        };
        
        Object.keys(fields).forEach(field => {
            const errorEl = document.getElementById(fields[field]);
            const input = document.getElementById(`contact${field.charAt(0).toUpperCase() + field.slice(1)}`);
            
            if (errors[field]) {
                if (errorEl) {
                    errorEl.textContent = errors[field];
                    errorEl.style.color = '#e74c3c';
                }
                if (input) {
                    input.style.borderColor = '#e74c3c';
                    input.classList.add('error');
                }
            }
        });
    }
    
    function clearContactErrors() {
        ['contactNameError', 'contactEmailError', 'contactSubjectError', 'contactMessageError'].forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                el.textContent = '';
                el.style.color = '';
            }
        });
        
        ['contactName', 'contactEmail', 'contactSubject', 'contactMessage'].forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                el.style.borderColor = '#ddd';
                el.classList.remove('error', 'success');
            }
        });
    }
    
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
    
    console.log('✅ Helper functions registered');
    console.log('\n✅ Day 10: Form Validation Complete!');
});

// ========================================
// 5. PASSWORD TOGGLE (Global Function)
// ========================================

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