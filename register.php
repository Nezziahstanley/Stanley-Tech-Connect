<?php
require_once 'config/database.php';
session_start();

$page_title = "Register - Stanley Tech Connect";
$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';
    
    // Validate
    if (strlen($name) < 2) $errors['name'] = 'Name must be at least 2 characters';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Invalid email';
    if (!preg_match('/^[0-9]{10,15}$/', $phone)) $errors['phone'] = 'Invalid phone';
    if (strlen($password) < 8) $errors['password'] = 'Password must be 8+ chars';
    if ($password !== $confirm) $errors['confirm'] = 'Passwords do not match';
    
    // Check email exists
    if (empty($errors)) {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $errors['email'] = 'Email already registered';
        }
    }
    
    // Insert
    if (empty($errors)) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)");
        if ($stmt->execute([$name, $email, $phone, $hash])) {
            $success = 'Registration successful! Please login.';
        }
    }
}

include 'includes/header.php';
?>

<section class="page-header">
    <div class="container text-center">
        <h1>Create an Account</h1>
        <p>Join Stanley Tech Connect today</p>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="form-container">
            <?php if ($success): ?>
                <div class="validation-success"><strong>✅ <?php echo $success; ?></strong></div>
            <?php endif; ?>
            
            <?php if (!empty($errors)): ?>
                <div class="validation-summary">
                    <strong>❌ Please fix the errors:</strong>
                    <ul><?php foreach ($errors as $e) echo "<li>$e</li>"; ?></ul>
                </div>
            <?php endif; ?>
            
            <form method="POST" id="registerForm" novalidate>
                <div class="form-group">
                    <label>Full Name <span class="required">*</span></label>
                    <input type="text" name="name" value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label>Email <span class="required">*</span></label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label>Phone <span class="required">*</span></label>
                    <input type="tel" name="phone" value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label>Password <span class="required">*</span></label>
                    <div class="input-with-icon">
                        <input type="password" name="password" id="regPassword" required>
                        <button type="button" class="toggle-password" onclick="togglePasswordVisibility('regPassword')">👁️</button>
                    </div>
                </div>
                <div class="form-group">
                    <label>Confirm Password <span class="required">*</span></label>
                    <input type="password" name="confirm_password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-lg">Create Account</button>
            </form>
            <div class="form-footer">
                Already have an account? <a href="login.php">Login</a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>