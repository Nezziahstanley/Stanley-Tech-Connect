<?php
// Day 10: Login Page with Client-Side Validation
$page_title = "Login - Stanley Tech Connect";
$meta_description = "Login to your Stanley Tech Connect account to access your dashboard and courses.";

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
            
            <form id="loginForm" novalidate>
                <!-- Email Field -->
                <div class="form-group">
                    <label for="loginEmail">Email Address <span class="required">*</span></label>
                    <input type="email" id="loginEmail" name="email" placeholder="you@example.com" required autofocus>
                    <small id="loginEmailError" class="field-error"></small>
                </div>
                
                <!-- Password Field -->
                <div class="form-group">
                    <label for="loginPassword">Password <span class="required">*</span></label>
                    <div class="input-with-icon">
                        <input type="password" id="loginPassword" name="password" placeholder="Enter your password" required>
                        <button type="button" class="toggle-password" onclick="togglePasswordVisibility('loginPassword')" aria-label="Toggle password visibility">👁️</button>
                    </div>
                    <small id="loginPasswordError" class="field-error"></small>
                </div>
                
                <!-- Remember Me & Forgot Password -->
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                    <label class="form-check" style="margin-bottom: 0;">
                        <input type="checkbox" name="remember" id="remember">
                        <span style="font-size: 0.95rem; color: var(--gray);">Remember me</span>
                    </label>
                    <a href="#" style="color: var(--primary); font-size: 0.95rem;">Forgot Password?</a>
                </div>
                
                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary btn-block btn-lg">Login</button>
            </form>
            
            <div class="form-footer">
                Don't have an account? <a href="register.php">Register Here</a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>