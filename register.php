<?php
// Day 10: Registration Page with Client-Side Validation
$page_title = "Register - Stanley Tech Connect";
$meta_description = "Create your free account at Stanley Tech Connect and start your learning journey.";

include 'includes/header.php';
?>

<!-- Page Header -->
<section class="page-header">
    <div class="container text-center">
        <h1>Create an Account</h1>
        <p>Join Stanley Tech Connect and start your learning journey</p>
    </div>
</section>

<!-- Registration Form -->
<section class="section-padding">
    <div class="container">
        <div class="form-container">
            <h2 style="text-align: center; font-size: 1.8rem; margin-bottom: 5px; color: var(--dark);">Register</h2>
            <p style="text-align: center; color: var(--gray); margin-bottom: 25px; font-size: 0.95rem;">Create your free account today</p>
            
            <form id="registerForm" novalidate>
                <!-- Name Field -->
                <div class="form-group">
                    <label for="regName">Full Name <span class="required">*</span></label>
                    <input type="text" id="regName" name="name" placeholder="John Doe" required>
                    <small id="nameError" class="field-error"></small>
                </div>
                
                <!-- Email Field -->
                <div class="form-group">
                    <label for="regEmail">Email Address <span class="required">*</span></label>
                    <input type="email" id="regEmail" name="email" placeholder="you@example.com" required>
                    <small id="emailError" class="field-error"></small>
                    <span class="field-help">We'll send you a verification email</span>
                </div>
                
                <!-- Phone Field -->
                <div class="form-group">
                    <label for="regPhone">Phone Number <span class="required">*</span></label>
                    <input type="tel" id="regPhone" name="phone" placeholder="08012345678" required>
                    <small id="phoneError" class="field-error"></small>
                </div>
                
                <!-- Password Field -->
                <div class="form-group">
                    <label for="regPassword">Password <span class="required">*</span></label>
                    <div class="input-with-icon">
                        <input type="password" id="regPassword" name="password" placeholder="Min 8 characters" required>
                        <button type="button" class="toggle-password" onclick="togglePasswordVisibility('regPassword')" aria-label="Toggle password visibility">👁️</button>
                    </div>
                    <div id="regPasswordStrength" class="password-strength" style="display: none;">
                        <span class="strength-text">Enter a password</span>
                        <div class="strength-bar"></div>
                    </div>
                    <span class="field-help">Must be at least 8 characters with uppercase, lowercase, and number</span>
                </div>
                
                <!-- Confirm Password Field -->
                <div class="form-group">
                    <label for="regConfirmPassword">Confirm Password <span class="required">*</span></label>
                    <div class="input-with-icon">
                        <input type="password" id="regConfirmPassword" name="confirm_password" placeholder="Confirm your password" required>
                        <button type="button" class="toggle-password" onclick="togglePasswordVisibility('regConfirmPassword')" aria-label="Toggle password visibility">👁️</button>
                    </div>
                    <small id="confirmPasswordError" class="field-error"></small>
                </div>
                
                <!-- Terms Checkbox -->
                <div class="form-check">
                    <input type="checkbox" id="regTerms" name="terms" required>
                    <label for="regTerms" class="form-check-label">
                        I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                    </label>
                </div>
                
                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary btn-block btn-lg">Create Account</button>
            </form>
            
            <div class="form-footer">
                Already have an account? <a href="login.php">Login Here</a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>