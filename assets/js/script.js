// ========================================
// STANLEY TECH CONNECT - COMPLETE JAVASCRIPT
// ========================================

console.log('%c Stanley Tech Connect ', 'background: #00d2ff; color: #1a1a2e; padding: 6px 12px; font-weight: 700; border-radius: 4px;');

document.addEventListener('DOMContentLoaded', function() {
    
    // ========================================
    // THEME LOADING
    // ========================================
    const savedTheme = localStorage.getItem('stc_theme') || 'light';
    if (savedTheme === 'dark') document.body.classList.add('dark-mode');
    
    const savedAccent = localStorage.getItem('stc_accent') || 'cyan';
    document.body.setAttribute('data-accent', savedAccent);
    
    // ========================================
    // MOBILE MENU
    // ========================================
    const toggle = document.getElementById('mobileToggle');
    const nav = document.getElementById('mainNav');
    if (toggle && nav) {
        toggle.addEventListener('click', function(e) {
            e.stopPropagation();
            nav.classList.toggle('active');
            this.classList.toggle('active');
        });
        
        nav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    nav.classList.remove('active');
                    toggle.classList.remove('active');
                }
            });
        });
        
        document.addEventListener('click', function(e) {
            if (!nav.contains(e.target) && !toggle.contains(e.target)) {
                nav.classList.remove('active');
                toggle.classList.remove('active');
            }
        });
    }
    
    // ========================================
    // PASSWORD TOGGLE
    // ========================================
    window.togglePasswordVisibility = function(fieldId) {
        const field = document.getElementById(fieldId);
        if (!field) return;
        const btn = field.parentElement.querySelector('.toggle-password');
        if (field.type === 'password') {
            field.type = 'text';
            if (btn) btn.textContent = '🙈';
        } else {
            field.type = 'password';
            if (btn) btn.textContent = '👁️';
        }
    };
    
    // ========================================
    // AVATAR UPLOAD (Profile)
    // ========================================
    const avatarInput = document.getElementById('avatarInput');
    const profileAvatar = document.getElementById('profileAvatar');
    
    if (avatarInput && profileAvatar) {
        avatarInput.addEventListener('change', function() {
            const file = this.files[0];
            if (!file) return;
            
            // Validate
            if (file.size > 2 * 1024 * 1024) {
                alert('❌ File too large. Max 2MB.');
                this.value = '';
                return;
            }
            if (!file.type.startsWith('image/')) {
                alert('❌ Only images allowed.');
                this.value = '';
                return;
            }
            
            // Preview
            const reader = new FileReader();
            reader.onload = function(e) {
                if (profileAvatar.tagName === 'IMG') {
                    profileAvatar.src = e.target.result;
                } else {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = 'Avatar';
                    img.id = 'profileAvatar';
                    profileAvatar.parentNode.replaceChild(img, profileAvatar);
                }
            };
            reader.readAsDataURL(file);
            
            // Auto-submit
            const form = document.createElement('form');
            form.method = 'POST';
            form.enctype = 'multipart/form-data';
            form.style.display = 'none';
            
            const input = document.createElement('input');
            input.type = 'file';
            input.name = 'avatar';
            
            const dt = new DataTransfer();
            dt.items.add(file);
            input.files = dt.files;
            
            const submit = document.createElement('input');
            submit.type = 'hidden';
            submit.name = 'upload_avatar';
            submit.value = '1';
            
            form.appendChild(input);
            form.appendChild(submit);
            document.body.appendChild(form);
            form.submit();
        });
    }
    
    // ========================================
    // BIO CHARACTER COUNTER
    // ========================================
    const bioInput = document.getElementById('bioInput');
    const bioCount = document.getElementById('bioCount');
    if (bioInput && bioCount) {
        bioCount.textContent = bioInput.value.length;
        bioInput.addEventListener('input', function() {
            bioCount.textContent = this.value.length;
        });
    }
    
    // ========================================
    // PASSWORD STRENGTH (Profile Security Tab)
    // ========================================
    const newPass = document.getElementById('newPass');
    const passStrength = document.getElementById('passStrength');
    
    if (newPass && passStrength) {
        newPass.addEventListener('input', function() {
            if (this.value.length === 0) {
                passStrength.style.display = 'none';
                return;
            }
            passStrength.style.display = 'block';
            
            const s = checkPasswordStrength(this.value);
            const text = passStrength.querySelector('.strength-text');
            const bar = passStrength.querySelector('.strength-bar');
            
            text.textContent = s.text;
            text.style.color = s.color;
            bar.className = 'strength-bar';
            if (s.value > 0) bar.classList.add(s.class);
        });
    }
    
    // ========================================
    // PASSWORD MATCH
    // ========================================
    const confirmPass = document.getElementById('confirmPass');
    const matchMsg = document.getElementById('matchMsg');
    
    if (confirmPass && matchMsg) {
        confirmPass.addEventListener('input', function() {
            const p1 = document.getElementById('newPass').value;
            const p2 = this.value;
            
            if (!p2) {
                matchMsg.textContent = '';
                return;
            }
            if (p1 === p2) {
                matchMsg.textContent = '✅ Passwords match';
                matchMsg.style.color = '#2ecc71';
            } else {
                matchMsg.textContent = '❌ Passwords do not match';
                matchMsg.style.color = '#e74c3c';
            }
        });
    }
    
    // ========================================
    // PAGE ANIMATIONS
    // ========================================
    document.querySelectorAll('.card, .service-card, .course-card').forEach((el, i) => {
        if (!el.classList.contains('fade-in-up')) {
            el.classList.add('fade-in-up');
            el.style.animationDelay = (i * 0.1) + 's';
        }
    });
    
    // ========================================
    // SMOOTH SCROLL
    // ========================================
    document.querySelectorAll('a[href^="#"]').forEach(a => {
        a.addEventListener('click', function(e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
    
    console.log('✅ All systems ready');
});

// ========================================
// PASSWORD STRENGTH CHECKER
// ========================================
function checkPasswordStrength(password) {
    let score = 0;
    if (password.length === 0) return { value: 0, text: 'Enter password', color: '#888', class: '' };
    if (password.length >= 8) score++;
    if (password.length >= 12) score++;
    if (/[a-z]/.test(password)) score++;
    if (/[A-Z]/.test(password)) score++;
    if (/[0-9]/.test(password)) score++;
    if (/[^a-zA-Z0-9]/.test(password)) score++;
    
    if (score <= 2) return { value: 1, text: 'Weak', color: '#e74c3c', class: 'weak' };
    if (score <= 4) return { value: 2, text: 'Medium', color: '#ffc107', class: 'medium' };
    return { value: 3, text: 'Strong', color: '#2ecc71', class: 'strong' };
}