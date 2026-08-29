<?php
// Day 3: Contact Page with Complete Form Handling
$page_title = "Contact - Stanley Tech Connect";
$success_message = '';
$error_message = '';
$form_data = [];

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and sanitize form data
    $form_data['name'] = trim($_POST['name'] ?? '');
    $form_data['email'] = trim($_POST['email'] ?? '');
    $form_data['subject'] = trim($_POST['subject'] ?? '');
    $form_data['message'] = trim($_POST['message'] ?? '');
    
    // Validation
    $errors = [];
    
    if (empty($form_data['name'])) {
        $errors['name'] = 'Name is required';
    } elseif (strlen($form_data['name']) < 2) {
        $errors['name'] = 'Name must be at least 2 characters';
    }
    
    if (empty($form_data['email'])) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($form_data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address';
    }
    
    if (empty($form_data['subject'])) {
        $errors['subject'] = 'Subject is required';
    }
    
    if (empty($form_data['message'])) {
        $errors['message'] = 'Message is required';
    } elseif (strlen($form_data['message']) < 10) {
        $errors['message'] = 'Message must be at least 10 characters';
    }
    
    // If no errors, process the message
    if (empty($errors)) {
        // Here you would send email or save to database (Day 28)
        $success_message = 'Thank you! Your message has been sent successfully. We will get back to you within 24 hours.';
        
        // Clear form data on success
        $form_data = [];
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
                <h1 style="font-size: 2.8rem; color: #1a1a2e;">Contact Us</h1>
                <p style="font-size: 1.2rem; color: #666; max-width: 600px; margin: 10px auto 0;">Get in touch with us for any questions or inquiries</p>
            </div>
        </section>

        <!-- Contact Content -->
        <section class="contact-section section-padding">
            <div class="container">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 50px;">
                    <!-- Contact Form -->
                    <div>
                        <h2 style="text-align: left; font-size: 1.8rem; margin-bottom: 25px;">Send Us a Message</h2>
                        
                        <!-- Success Message -->
                        <?php if ($success_message): ?>
                            <div style="background: #efe; border: 1px solid #cfc; color: #3a3; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                                <strong>✅ <?php echo htmlspecialchars($success_message); ?></strong>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Contact Form -->
                        <form action="contact.php" method="POST" id="contactForm" novalidate>
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
                            </div>
                            
                            <!-- Subject Field -->
                            <div style="margin-bottom: 20px;">
                                <label for="subject" style="display: block; font-weight: 600; margin-bottom: 5px; color: #1a1a2e;">
                                    Subject <span style="color: #c33;">*</span>
                                </label>
                                <input type="text" 
                                       id="subject" 
                                       name="subject" 
                                       value="<?php echo htmlspecialchars($form_data['subject'] ?? ''); ?>"
                                       placeholder="Brief subject" 
                                       required
                                       style="width: 100%; padding: 12px; border: 1px solid <?php echo isset($errors['subject']) ? '#c33' : '#ddd'; ?>; border-radius: 8px; font-size: 16px;">
                                <?php if (isset($errors['subject'])): ?>
                                    <small style="color: #c33; display: block; margin-top: 5px;"><?php echo htmlspecialchars($errors['subject']); ?></small>
                                <?php endif; ?>
                            </div>
                            
                            <!-- Message Field -->
                            <div style="margin-bottom: 20px;">
                                <label for="message" style="display: block; font-weight: 600; margin-bottom: 5px; color: #1a1a2e;">
                                    Message <span style="color: #c33;">*</span>
                                </label>
                                <textarea id="message" 
                                          name="message" 
                                          rows="6" 
                                          placeholder="Write your message here..." 
                                          required
                                          style="width: 100%; padding: 12px; border: 1px solid <?php echo isset($errors['message']) ? '#c33' : '#ddd'; ?>; border-radius: 8px; font-size: 16px; resize: vertical;"><?php echo htmlspecialchars($form_data['message'] ?? ''); ?></textarea>
                                <?php if (isset($errors['message'])): ?>
                                    <small style="color: #c33; display: block; margin-top: 5px;"><?php echo htmlspecialchars($errors['message']); ?></small>
                                <?php endif; ?>
                                <small style="color: #888;">Minimum 10 characters</small>
                            </div>
                            
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 15px; font-size: 1.1rem;">
                                Send Message
                            </button>
                        </form>
                    </div>

                    <!-- Contact Information -->
                    <div>
                        <h2 style="text-align: left; font-size: 1.8rem; margin-bottom: 25px;">Contact Information</h2>
                        
                        <div style="margin-bottom: 30px;">
                            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px; padding: 15px; background: #f8f9fa; border-radius: 8px;">
                                <div style="font-size: 1.8rem;">📍</div>
                                <div>
                                    <h4 style="color: #1a1a2e; margin-bottom: 2px;">Address</h4>
                                    <p style="color: #666; margin: 0;">Lagos, Nigeria</p>
                                </div>
                            </div>
                            
                            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px; padding: 15px; background: #f8f9fa; border-radius: 8px;">
                                <div style="font-size: 1.8rem;">📞</div>
                                <div>
                                    <h4 style="color: #1a1a2e; margin-bottom: 2px;">Phone</h4>
                                    <p style="color: #666; margin: 0;">07041145338</p>
                                </div>
                            </div>
                            
                            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px; padding: 15px; background: #f8f9fa; border-radius: 8px;">
                                <div style="font-size: 1.8rem;">✉️</div>
                                <div>
                                    <h4 style="color: #1a1a2e; margin-bottom: 2px;">Email</h4>
                                    <p style="color: #666; margin: 0;">stanleytechconnect@gmail.com</p>
                                </div>
                            </div>
                            
                            <div style="display: flex; align-items: center; gap: 15px; padding: 15px; background: #f8f9fa; border-radius: 8px;">
                                <div style="font-size: 1.8rem;">🕐</div>
                                <div>
                                    <h4 style="color: #1a1a2e; margin-bottom: 2px;">Working Hours</h4>
                                    <p style="color: #666; margin: 0;">Mon - Fri: 9:00 AM - 6:00 PM</p>
                                </div>
                            </div>
                        </div>

                        <!-- Social Connect -->
                        <div style="background: #f0f4f8; padding: 25px; border-radius: 12px;">
                            <h3 style="color: #1a1a2e; margin-bottom: 15px;">Connect With Us</h3>
                            <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                                <a href="https://github.com/stanleytechconnect" target="_blank" style="background: #1a1a2e; color: #fff; padding: 10px 20px; border-radius: 8px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                                    🐙 GitHub
                                </a>
                                <a href="https://facebook.com/Stanley-Tech-Connect" target="_blank" style="background: #1877f2; color: #fff; padding: 10px 20px; border-radius: 8px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                                    📘 Facebook
                                </a>
                                <a href="https://wa.me/2347041145338" target="_blank" style="background: #25D366; color: #fff; padding: 10px 20px; border-radius: 8px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                                    💬 WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>
    <script src="js/script.js"></script>
</body>
</html>