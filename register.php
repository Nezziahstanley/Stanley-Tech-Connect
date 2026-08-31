<?php
// Day 5: Registration Page with Reusable Header/Footer
$page_title = "Register - Stanley Tech Connect";
$meta_description = "Create your free account at Stanley Tech Connect and start your learning journey.";

// Form handling
$error_message = '';
$success_message = '';
$form_data = [];
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form_data['name'] = trim($_POST['name'] ?? '');
    $form_data['email'] = trim($_POST['email'] ?? '');
    $form_data['phone'] = trim($_POST['phone'] ?? '');
    $form_data['password'] = $_POST['password'] ?? '';
    $form_data['confirm_password'] = $_POST['confirm_password'] ?? '';
    
    $errors = [];
    
    if (empty($form_data['name']) || strlen($form_data['name']) < 2) {
        $errors['name'] = 'Name must be at least 2 characters';
    }
    
    if (empty($form_data['email']) || !filter_var($form_data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address';
    }
    
    if (empty($form_data['phone']) || !preg_match('/^[0-9]{10,15}$/', $form_data['phone'])) {
        $errors['phone'] = 'Please enter a valid phone number (10-15 digits)';
    }
    
    if (empty($form_data['password']) || strlen($form_data['password']) < 8) {
        $errors['password'] = 'Password must be at least 8 characters';
    }
    
    if ($form_data['password'] !== $form_data['confirm_password']) {
        $errors['confirm_password'] = 'Passwords do not match';
    }
    
    if (empty($errors)) {
        $success_message = 'Registration successful! Please check your email to verify your account.';
        $form_data = [];
    }
}

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
            
            <?php if (!empty($errors)): ?>
                <div class="form-error-summary">
                    <strong>❌ Please fix the following errors:</strong>
                    <ul>
                        <?php foreach ($errors as $field => $message): ?>
                            <li><?php echo htmlspecialchars($message); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            
            <?php if ($success_message): ?>
                <div class="form-success-summary">
                    <strong>✅ <?php echo htmlspecialchars($success_message); ?></strong>
                </div>
            <?php endif; ?>
            
            <form action="register.php" method="POST" id="registerForm" novalidate>
                <div class="form-group">
                    <label for="name">Full Name <span class="required">*</span></label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="<?php echo htmlspecialchars($form_data['name'] ?? ''); ?>"
                           placeholder="John Doe" 
                           required>
                    <?php if (isset($errors['name'])): ?>
                        <span class="field-error"><?php echo htmlspecialchars($errors['name']); ?></span>
                    <?php endif; ?>
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address <span class="required">*</span></label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="<?php echo htmlspecialchars($form_data['email'] ?? ''); ?>"
                           placeholder="you@example.com" 
                           required>
                    <?php if (isset($errors['email'])): ?>
                        <span class="field-error"><?php echo htmlspecialchars($errors['email']); ?></span>
                    <?php endif; ?>
                    <span class="field-help">We'll send you a verification email</span>
                </div>
                
                <div class="form-group">
                    <label for="phone">Phone Number <span class="required">*</span></label>
                    <input type="tel" 
                           id="phone" 
                           name="phone" 
                           value="<?php echo htmlspecialchars($form_data['phone'] ?? ''); ?>"
                           placeholder="08012345678" 
                           required>
                    <?php if (isset($errors['phone'])): ?>
                        <span class="field-error"><?php echo htmlspecialchars($errors['phone']); ?></span>
                    <?php endif; ?>
                </div>
                
                <div class="form-group">
                    <label for="password">Password <span class="required">*</span></label>
                    <div class="input-with-icon">
                        <input type="password" 
                               id="password" 
                               name="password" 
                               placeholder="Min 8 characters" 
                               required>
                        <button type="button" 
                                class="toggle-password" 
                                onclick="togglePasswordVisibility('password')"
                                aria-label="Toggle password visibility">
                            👁️
                        </button>
                    </div>
                    <?php if (isset($errors['password'])): ?>
                        <span class="field-error"><?php echo htmlspecialchars($errors['password']); ?></span>
                    <?php endif; ?>
                    <span class="field-help">Must be at least 8 characters with uppercase, lowercase, and number</span>
                    
                    <div id="password-strength" class="password-strength" style="display: none;">
                        <span class="strength-text">Enter a password</span>
                        <div class="strength-bar"></div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="confirm_password">Confirm Password <span class="required">*</span></label>
                    <div class="input-with-icon">
                        <input type="password" 
                               id="confirm_password" 
                               name="confirm_password" 
                               placeholder="Confirm your password" 
                               required>
                        <button type="button" 
                                class="toggle-password" 
                                onclick="togglePasswordVisibility('confirm_password')"
                                aria-label="Toggle password visibility">
                            👁️
                        </button>
                    </div>
                    <?php if (isset($errors['confirm_password'])): ?>
                        <span class="field-error"><?php echo htmlspecialchars($errors['confirm_password']); ?></span>
                    <?php endif; ?>
                </div>
                
                <div class="form-check">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms" class="form-check-label">
                        I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                    </label>
                </div>
                
                <button type="submit" class="btn btn-primary btn-block btn-lg">Create Account</button>
            </form>
            
            <div class="form-footer">
                Already have an account? <a href="login.php">Login Here</a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>