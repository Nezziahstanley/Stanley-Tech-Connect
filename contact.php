<?php
require_once 'config/database.php';
session_start();

$page_title = "Contact - Stanley Tech Connect";
$success = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');
    
    if (strlen($name) < 2) $errors[] = 'Name too short';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Invalid email';
    if (strlen($subject) < 3) $errors[] = 'Subject too short';
    if (strlen($message) < 10) $errors[] = 'Message too short';
    
    if (empty($errors)) {
        $stmt = $pdo->prepare("INSERT INTO messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $subject, $message]);
        $success = 'Message sent! We will get back to you soon.';
        $_POST = [];
    }
}

include 'includes/header.php';
?>

<section class="page-header">
    <div class="container text-center">
        <h1>Contact Us</h1>
        <p>Get in touch with us</p>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-form-wrapper">
                <?php if ($success): ?>
                    <div class="validation-success"><strong>✅ <?php echo $success; ?></strong></div>
                <?php endif; ?>
                <?php if ($errors): ?>
                    <div class="validation-summary">
                        <strong>❌ Errors:</strong>
                        <ul><?php foreach ($errors as $e) echo "<li>$e</li>"; ?></ul>
                    </div>
                <?php endif; ?>
                
                <form method="POST" id="contactForm" novalidate>
                    <div class="form-group">
                        <label>Full Name <span class="required">*</span></label>
                        <input type="text" name="name" value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Email <span class="required">*</span></label>
                        <input type="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Subject <span class="required">*</span></label>
                        <input type="text" name="subject" value="<?php echo htmlspecialchars($_POST['subject'] ?? ''); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Message <span class="required">*</span></label>
                        <textarea name="message" rows="5" required><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Send Message</button>
                </form>
            </div>
            
            <div class="contact-info-wrapper">
                <h2>Contact Information</h2>
                <div class="contact-info-card">
                    <span class="icon">📍</span>
                    <div><h4>Address</h4><p>Lagos, Nigeria</p></div>
                </div>
                <div class="contact-info-card">
                    <span class="icon">📞</span>
                    <div><h4>Phone</h4><p>07041145338</p></div>
                </div>
                <div class="contact-info-card">
                    <span class="icon">✉️</span>
                    <div><h4>Email</h4><p>stanleytechconnect@gmail.com</p></div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>