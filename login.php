<?php
// Day 2: Login Page
$page_title = "Login - Stanley Tech Connect";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
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
                    <form action="login.php" method="POST" id="loginForm">
                        <div style="margin-bottom: 20px;">
                            <label for="email" style="display: block; font-weight: 600; margin-bottom: 5px; color: #1a1a2e;">Email Address</label>
                            <input type="email" id="email" name="email" placeholder="you@example.com" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 16px;">
                        </div>
                        <div style="margin-bottom: 20px;">
                            <label for="password" style="display: block; font-weight: 600; margin-bottom: 5px; color: #1a1a2e;">Password</label>
                            <input type="password" id="password" name="password" placeholder="Enter your password" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 16px;">
                        </div>
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
                    </form>
                    <p style="text-align: center; margin-top: 20px; color: #666;">
                        Don't have an account? <a href="register.php" style="color: #00d2ff; font-weight: 600;">Register Here</a>
                    </p>
                </div>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>
    <script src="assets/js/script.js"></script>
</body>
</html>