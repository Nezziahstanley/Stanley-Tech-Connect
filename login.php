<?php
// Day 3: Login Page with Complete Form Handling
$page_title = "Login - Stanley Tech Connect";
$error_message = '';
$email = '';

// Process login attempt
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    
    // Validate inputs
    if (empty($email)) {
        $error_message = 'Please enter your email address.';
    } elseif (empty($password)) {
        $error_message = 'Please enter your password.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = 'Please enter a valid email address.';
    } else {
        // Here we would check credentials in database (Day 20)
        // For now, show a demo message
        
        // In production, you would:
        // 1. Query database for user with this email
        // 2. Verify password using password_verify()
        // 3. Start session and redirect to dashboard
        
        $error_message = 'Invalid email or password. Please try again.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main>
        <!-- Page Header -->
        <section class="page-header section-padding bg-light" style="padding: 60px 0;">
            <div class="container text-center">
                <h1 style="font-size: 2.8rem; color: #1a1a2e;">Welcome Back</h1>
                <p style="font-size: 1.2rem; color: #666; max-width: 600px; margin: 10px auto 0;">Login to access your dashboard and courses</p>
            </div>
        </section>

        <!-- Login Form -->
        <section class="login-section section-padding">
            <div class="container">
                <div style="max-width: 450px; margin: 0 auto; background: #fff; padding: 40px; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.08);">
                    
                    <!-- Error Message -->
                    <?php if ($error_message): ?>
                        <div style="background: #fee; border: 1px solid #fcc; color: #c33; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                            <strong>❌ <?php echo htmlspecialchars($error_message); ?></strong>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Login Form -->
                    <form action="login.php" method="POST" id="loginForm" novalidate>
                        <!-- Email Field -->
                        <div style="margin-bottom: 20px;">
                            <label for="email" style="display: block; font-weight: 600; margin-bottom: 5px; color: #1a1a2e;">
                                Email Address <span style="color: #c33;">*</span>
                            </label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   value="<?php echo htmlspecialchars($email); ?>"
                                   placeholder="you@example.com" 
                                   required
                                   autofocus
                                   style="width: 100%; padding: 12px; border: 1px solid <?php echo $error_message ? '#c33' : '#ddd'; ?>; border-radius: 8px; font-size: 16px;">
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
                                       placeholder="Enter your password" 
                                       required
                                       style="width: 100%; padding: 12px; border: 1px solid <?php echo $error_message ? '#c33' : '#ddd'; ?>; border-radius: 8px; font-size: 16px; padding-right: 45px;">
                                <button type="button" 
                                        onclick="togglePasswordVisibility('password')"
                                        style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; font-size: 18px; color: #666;">
                                    👁️
                                </button>
                            </div>
                        </div>
                        
                        <!-- Remember Me & Forgot Password -->
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                <input type="checkbox" name="remember" id="remember">
                                <span style="font-size: 0.95rem; color: #555;">Remember me</span>
                            </label>
                            <a href="#" style="color: #00d2ff; font-size: 0.95rem;">Forgot Password?</a>
                        </div>
                        
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary" style="width: 100%; padding: 15px; font-size: 1.1rem;">
                            Login
                        </button>
                    </form>
                    
                    <!-- Register Link -->
                    <p style="text-align: center; margin-top: 20px; color: #666;">
                        Don't have an account? <a href="register.php" style="color: #00d2ff; font-weight: 600;">Register Here</a>
                    </p>
                </div>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>
    <script src="js/script.js"></script>
</body>
</html>