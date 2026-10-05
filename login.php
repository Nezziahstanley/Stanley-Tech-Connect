<?php
require_once 'config/database.php';
session_start();

$page_title = "Login - Stanley Tech Connect";
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (empty($email) || empty($password)) {
        $error = 'Please fill in all fields';
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role'] = $user['role'];
            
            if ($user['role'] === 'admin') {
                header("Location: admin/index.php");
            } else {
                header("Location: dashboard.php");
            }
            exit();
        } else {
            $error = 'Invalid email or password';
        }
    }
}

include 'includes/header.php';
?>

<section class="page-header">
    <div class="container text-center">
        <h1>Welcome Back</h1>
        <p>Login to your account</p>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="form-container" style="max-width: 450px;">
            <?php if ($error): ?>
                <div class="validation-summary"><strong>❌ <?php echo $error; ?></strong></div>
            <?php endif; ?>
            
            <form method="POST" id="loginForm" novalidate>
                <div class="form-group">
                    <label>Email <span class="required">*</span></label>
                    <input type="email" name="email" required autofocus>
                </div>
                <div class="form-group">
                    <label>Password <span class="required">*</span></label>
                    <div class="input-with-icon">
                        <input type="password" name="password" id="loginPassword" required>
                        <button type="button" class="toggle-password" onclick="togglePasswordVisibility('loginPassword')">👁️</button>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-lg">Login</button>
            </form>
            <div class="form-footer">
                Don't have an account? <a href="register.php">Register</a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>