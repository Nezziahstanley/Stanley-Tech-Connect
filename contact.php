<?php
// Day 5: Contact Page with Reusable Header/Footer
$page_title = "Contact - Stanley Tech Connect";
$meta_description = "Get in touch with Stanley Tech Connect for any questions or inquiries.";

// Form handling
$success_message = '';
$error_message = '';
$form_data = [];
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form_data['name'] = trim($_POST['name'] ?? '');
    $form_data['email'] = trim($_POST['email'] ?? '');
    $form_data['subject'] = trim($_POST['subject'] ?? '');
    $form_data['message'] = trim($_POST['message'] ?? '');
    
    $errors = [];
    
    if (empty($form_data['name']) || strlen($form_data['name']) < 2) {
        $errors['name'] = 'Name must be at least 2 characters';
    }
    
    if (empty($form_data['email']) || !filter_var($form_data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address';
    }
    
    if (empty($form_data['subject'])) {
        $errors['subject'] = 'Subject is required';
    }
    
    if (empty($form_data['message']) || strlen($form_data['message']) < 10) {
        $errors['message'] = 'Message must be at least 10 characters';
    }
    
    if (empty($errors)) {
        $success_message = 'Thank you! Your message has been sent successfully. We will get back to you within 24 hours.';
        $form_data = [];
    }
}

include 'includes/header.php';
?>

<!-- Page Header -->
<section class="page-header">
    <div class="container text-center">
        <h1>Contact Us</h1>
        <p>Get in touch with us for any questions or inquiries</p>
    </div>
</section>

<!-- Contact Content -->
<section class="section-padding">
    <div class="container">
        <div class="contact-grid">
            <!-- Contact Form -->
            <div class="contact-form-wrapper">
                <h2>Send Us a Message</h2>
                
                <?php if ($success_message): ?>
                    <div class="form-success-summary">
                        <strong>✅ <?php echo htmlspecialchars($success_message); ?></strong>
                    </div>
                <?php endif; ?>
                
                <form action="contact.php" method="POST" id="contactForm" novalidate>
                    <div class="form-group">
                        <label for="name">Full Name <span class="required">*</span></label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="<?php echo htmlspecialchars($form_data['name'] ?? ''); ?>"
                               placeholder="John Doe" 
                               required>
                        <?php if (isset($errors['name'])): ?>
                            <small class="field-error"><?php echo htmlspecialchars($errors['name']); ?></small>
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
                            <small class="field-error"><?php echo htmlspecialchars($errors['email']); ?></small>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="subject">Subject <span class="required">*</span></label>
                        <input type="text" 
                               id="subject" 
                               name="subject" 
                               value="<?php echo htmlspecialchars($form_data['subject'] ?? ''); ?>"
                               placeholder="Brief subject" 
                               required>
                        <?php if (isset($errors['subject'])): ?>
                            <small class="field-error"><?php echo htmlspecialchars($errors['subject']); ?></small>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message <span class="required">*</span></label>
                        <textarea id="message" 
                                  name="message" 
                                  rows="6" 
                                  placeholder="Write your message here..." 
                                  required><?php echo htmlspecialchars($form_data['message'] ?? ''); ?></textarea>
                        <?php if (isset($errors['message'])): ?>
                            <small class="field-error"><?php echo htmlspecialchars($errors['message']); ?></small>
                        <?php endif; ?>
                        <small class="field-help">Minimum 10 characters</small>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Send Message</button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="contact-info-wrapper">
                <h2>Contact Information</h2>
                
                <div class="contact-info-card">
                    <span class="icon">📍</span>
                    <div>
                        <h4>Address</h4>
                        <p>Lagos, Nigeria</p>
                    </div>
                </div>
                
                <div class="contact-info-card">
                    <span class="icon">📞</span>
                    <div>
                        <h4>Phone</h4>
                        <p>07041145338</p>
                    </div>
                </div>
                
                <div class="contact-info-card">
                    <span class="icon">✉️</span>
                    <div>
                        <h4>Email</h4>
                        <p>stanleytechconnect@gmail.com</p>
                    </div>
                </div>
                
                <div class="contact-info-card">
                    <span class="icon">🕐</span>
                    <div>
                        <h4>Working Hours</h4>
                        <p>Mon - Fri: 9:00 AM - 6:00 PM</p>
                    </div>
                </div>

                <div class="social-connect-box">
                    <h3>Connect With Us</h3>
                    <div class="social-buttons">
                        <a href="https://github.com/stanleytechconnect" target="_blank" class="social-btn github">
                            🐙 GitHub
                        </a>
                        <a href="https://facebook.com/Stanley-Tech-Connect" target="_blank" class="social-btn facebook">
                            📘 Facebook
                        </a>
                        <a href="https://wa.me/2347041145338" target="_blank" class="social-btn whatsapp">
                            💬 WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>