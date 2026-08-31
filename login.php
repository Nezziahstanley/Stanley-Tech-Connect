<?php
// Day 5: Login Page with Reusable Header/Footer
$page_title = "Login - Stanley Tech Connect";
$meta_description = "Login to your Stanley Tech Connect account to access your dashboard and courses.";

// Form handling
$error_message = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (empty($email)) {
        $error_message = 'Please enter your email address.';
    } elseif (empty($password)) {
        $error_message = 'Please enter your password.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = 'Please enter a valid email address.';
    } else {
        // Here we would check credentials in database (Day 20)
        $error_message = 'Invalid email or password. Please try again.';
    }
}

include 'includes/header.php';
?>

<!-- Page Header -->
<section class="page-header">
    <div class="container text-center">
        <h1>Welcome Back</h1>
        <p>Login to access your dashboard and courses</p>
    </div>
</section>

<!-- Login Form -->
<section class="section-padding">
    <div class="container">
        <div class="form-container" style="max-width: 450px;">
            <h2 style="text-align: center; font-size: 1.8rem; margin-bottom: 5px; color: var(--dark);">Login</h2>
            <p style="text-align: center; color: var(--gray); margin-bottom: 25px; font-size: 0.95rem;">Welcome back to Stanley Tech Connect</p>
            
            <?php if ($error_message): ?>
                <div class="form-error-summary">
                    <strong>❌ <?php echo htmlspecialchars($error_message); ?></strong>
                </div>
            <?php endif; ?>
            
            <form action="login.php" method="POST" id="loginForm" novalidate>
                <div class="form-group">
                    <label for="email">Email Address <span class="required">*</span></label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="<?php echo htmlspecialchars($email); ?>"
                           placeholder="you@example.com" 
                           required
                           autofocus>
                </div>
                
                <div class="form-group">
                    <label for="password">Password <span class="required">*</span></label>
                    <div class="input-with-icon">
                        <input type="password" 
                               id="password" 
                               name="password" 
                               placeholder="Enter your password" 
                               required>
                        <button type="button" 
                                class="toggle-password" 
                                onclick="togglePasswordVisibility('password')"
                                aria-label="Toggle password visibility">
                            👁️
                        </button>
                    </div>
                </div>
                
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                    <label class="form-check" style="margin-bottom: 0;">
                        <input type="checkbox" name="remember" id="remember">
                        <span style="font-size: 0.95rem; color: var(--gray);">Remember me</span>
                    </label>
                    <a href="#" style="color: var(--primary); font-size: 0.95rem;">Forgot Password?</a>
                </div>
                
                <button type="submit" class="btn btn-primary btn-block btn-lg">Login</button>
            </form>
            
            <div class="form-footer">
                Don't have an account? <a href="register.php">Register Here</a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>