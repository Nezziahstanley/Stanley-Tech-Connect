<?php
// Day 3: Registration Page with Complete Form Handling
$page_title = "Register - Stanley Tech Connect";
$error_message = '';
$success_message = '';
$form_data = [];

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and sanitize form data
    $form_data['name'] = trim($_POST['name'] ?? '');
    $form_data['email'] = trim($_POST['email'] ?? '');
    $form_data['phone'] = trim($_POST['phone'] ?? '');
    $form_data['password'] = $_POST['password'] ?? '';
    $form_data['confirm_password'] = $_POST['confirm_password'] ?? '';
    
    // Validation
    $errors = [];
    
    // Validate name
    if (empty($form_data['name'])) {
        $errors['name'] = 'Full name is required';
    } elseif (strlen($form_data['name']) < 2) {
        $errors['name'] = 'Name must be at least 2 characters';
    }
    
    // Validate email
    if (empty($form_data['email'])) {
        $errors['email'] = 'Email address is required';
    } elseif (!filter_var($form_data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address';
    }
    
    // Validate phone
    if (empty($form_data['phone'])) {
        $errors['phone'] = 'Phone number is required';
    } elseif (!preg_match('/^[0-9]{10,15}$/', $form_data['phone'])) {
        $errors['phone'] = 'Please enter a valid phone number (10-15 digits)';
    }
    
    // Validate password
    if (empty($form_data['password'])) {
        $errors['password'] = 'Password is required';
    } elseif (strlen($form_data['password']) < 8) {
        $errors['password'] = 'Password must be at least 8 characters';
    }
    
    // Validate confirm password
    if (empty($form_data['confirm_password'])) {
        $errors['confirm_password'] = 'Please confirm your password';
    } elseif ($form_data['password'] !== $form_data['confirm_password']) {
        $errors['confirm_password'] = 'Passwords do not match';
    }
    
    // If no errors, process registration
    if (empty($errors)) {
        // Here we would save to database (Day 19)
        // For now, just show success message
        $success_message = 'Registration successful! Please check your email to verify your account.';
        
        // Clear form data on success
        $form_data = [];
        
        // In production, you would:
        // 1. Check if email already exists
        // 2. Hash the password
        // 3. Insert into database
        // 4. Send verification email
    } else {
        $error_message = 'Please fix the errors below.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="icon" href="assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main>
        <!-- Page Header -->
        <section class="page-header section-padding bg-light" style="padding: 60px 0;">
            <div class="container text-center">
                <h1 style="font-size: 2.8rem; color: #1a1a2e;">Create an Account</h1>
                <p style="font-size: 1.2rem; color: #666; max-width: 600px; margin: 10px auto 0;">Join Stanley Tech Connect and start your learning journey</p>
            </div>
        </section>

        <!-- Registration Form -->
        <section class="register-section section-padding">
            <div class="container">
                <div style="max-width: 550px; margin: 0 auto; background: #fff; padding: 40px; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.08);">
                    
                    <!-- Error Messages -->
                    <?php if ($error_message): ?>
                        <div style="background: #fee; border: 1px solid #fcc; color: #c33; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                            <strong>❌ <?php echo htmlspecialchars($error_message); ?></strong>
                            <ul style="margin: 10px 0 0 20px; color: #c33;">
                                <?php foreach ($errors as $field => $message): ?>
                                    <li><?php echo htmlspecialchars($message); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Success Message -->
                    <?php if ($success_message): ?>
                        <div style="background: #efe; border: 1px solid #cfc; color: #3a3; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                            <strong>✅ <?php echo htmlspecialchars($success_message); ?></strong>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Registration Form -->
                    <form action="register.php" method="POST" id="registerForm" novalidate>
                        <!-- Name Field -->
                        <div style="margin-bottom: 20px;">
                            <label for="name" style="display: block; font-weight: 600; margin-bottom: 5px; color: #1a1a2e;">
                                Full Name <span style="color: #c33;">*</span>
                            </label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   value="<?php echo htmlspecialchars($form_data['name'] ?? ''); ?>"
                                   placeholder="John Doe" 
                                   required
                                   style="width: 100%; padding: 12px; border: 1px solid <?php echo isset($errors['name']) ? '#c33' : '#ddd'; ?>; border-radius: 8px; font-size: 16px;">
                            <?php if (isset($errors['name'])): ?>
                                <small style="color: #c33; display: block; margin-top: 5px;"><?php echo htmlspecialchars($errors['name']); ?></small>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Email Field -->
                        <div style="margin-bottom: 20px;">
                            <label for="email" style="display: block; font-weight: 600; margin-bottom: 5px; color: #1a1a2e;">
                                Email Address <span style="color: #c33;">*</span>
                            </label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   value="<?php echo htmlspecialchars($form_data['email'] ?? ''); ?>"
                                   placeholder="you@example.com" 
                                   required
                                   style="width: 100%; padding: 12px; border: 1px solid <?php echo isset($errors['email']) ? '#c33' : '#ddd'; ?>; border-radius: 8px; font-size: 16px;">
                            <?php if (isset($errors['email'])): ?>
                                <small style="color: #c33; display: block; margin-top: 5px;"><?php echo htmlspecialchars($errors['email']); ?></small>
                            <?php endif; ?>
                            <small style="color: #888;">We'll send you a verification email</small>
                        </div>
                        
                        <!-- Phone Field -->
                        <div style="margin-bottom: 20px;">
                            <label for="phone" style="display: block; font-weight: 600; margin-bottom: 5px; color: #1a1a2e;">
                                Phone Number <span style="color: #c33;">*</span>
                            </label>
                            <input type="tel" 
                                   id="phone" 
                                   name="phone" 
                                   value="<?php echo htmlspecialchars($form_data['phone'] ?? ''); ?>"
                                   placeholder="08012345678" 
                                   required
                                   style="width: 100%; padding: 12px; border: 1px solid <?php echo isset($errors['phone']) ? '#c33' : '#ddd'; ?>; border-radius: 8px; font-size: 16px;">
                            <?php if (isset($errors['phone'])): ?>
                                <small style="color: #c33; display: block; margin-top: 5px;"><?php echo htmlspecialchars($errors['phone']); ?></small>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Password Field -->
                        <div style="margin-bottom: 20px;">
                            <label for="password" style="display: block; font-weight: 600; margin-bottom: 5px; color: #1a1a2e;">
                                Password <span style="color: #c33;">*</span>
                            </label>
                            <div style="position: relative;">
                                <input type="password" 
                                       id="password" 
                                       name="password" 
                                       placeholder="Min 8 characters" 
                                       required
                                       style="width: 100%; padding: 12px; border: 1px solid <?php echo isset($errors['password']) ? '#c33' : '#ddd'; ?>; border-radius: 8px; font-size: 16px; padding-right: 45px;">
                                <button type="button" 
                                        onclick="togglePasswordVisibility('password')"
                                        style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; font-size: 18px; color: #666;">
                                    👁️
                                </button>
                            </div>
                            <?php if (isset($errors['password'])): ?>
                                <small style="color: #c33; display: block; margin-top: 5px;"><?php echo htmlspecialchars($errors['password']); ?></small>
                            <?php endif; ?>
                            <small style="color: #888;">Must be at least 8 characters with uppercase, lowercase, and number</small>
                        </div>
                        
                        <!-- Confirm Password Field -->
                        <div style="margin-bottom: 20px;">
                            <label for="confirm_password" style="display: block; font-weight: 600; margin-bottom: 5px; color: #1a1a2e;">
                                Confirm Password <span style="color: #c33;">*</span>
                            </label>
                            <div style="position: relative;">
                                <input type="password" 
                                       id="confirm_password" 
                                       name="confirm_password" 
                                       placeholder="Confirm your password" 
                                       required
                                       style="width: 100%; padding: 12px; border: 1px solid <?php echo isset($errors['confirm_password']) ? '#c33' : '#ddd'; ?>; border-radius: 8px; font-size: 16px; padding-right: 45px;">
                                <button type="button" 
                                        onclick="togglePasswordVisibility('confirm_password')"
                                        style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; font-size: 18px; color: #666;">
                                    👁️
                                </button>
                            </div>
                            <?php if (isset($errors['confirm_password'])): ?>
                                <small style="color: #c33; display: block; margin-top: 5px;"><?php echo htmlspecialchars($errors['confirm_password']); ?></small>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Terms and Conditions -->
                        <div style="margin-bottom: 20px;">
                            <label style="display: flex; align-items: flex-start; gap: 10px; cursor: pointer;">
                                <input type="checkbox" id="terms" name="terms" required style="margin-top: 3px;">
                                <span style="font-size: 0.95rem; color: #555;">
                                    I agree to the <a href="#" style="color: #00d2ff;">Terms of Service</a> and <a href="#" style="color: #00d2ff;">Privacy Policy</a>
                                </span>
                            </label>
                        </div>
                        
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary" style="width: 100%; padding: 15px; font-size: 1.1rem;">
                            Create Account
                        </button>
                    </form>
                    
                    <!-- Login Link -->
                    <p style="text-align: center; margin-top: 20px; color: #666;">
                        Already have an account? <a href="login.php" style="color: #00d2ff; font-weight: 600;">Login Here</a>
                    </p>
                </div>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>
    <script src="assets/js/script.js"></script>
</body>
</html>