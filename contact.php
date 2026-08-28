<?php
// Day 2: Contact Page
$page_title = "Contact - Stanley Tech Connect";
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
                        <form action="contact.php" method="POST" id="contactForm">
                            <div style="margin-bottom: 20px;">
                                <label for="name" style="display: block; font-weight: 600; margin-bottom: 5px; color: #1a1a2e;">Full Name</label>
                                <input type="text" id="name" name="name" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 16px;">
                            </div>
                            <div style="margin-bottom: 20px;">
                                <label for="email" style="display: block; font-weight: 600; margin-bottom: 5px; color: #1a1a2e;">Email Address</label>
                                <input type="email" id="email" name="email" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 16px;">
                            </div>
                            <div style="margin-bottom: 20px;">
                                <label for="subject" style="display: block; font-weight: 600; margin-bottom: 5px; color: #1a1a2e;">Subject</label>
                                <input type="text" id="subject" name="subject" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 16px;">
                            </div>
                            <div style="margin-bottom: 20px;">
                                <label for="message" style="display: block; font-weight: 600; margin-bottom: 5px; color: #1a1a2e;">Message</label>
                                <textarea id="message" name="message" rows="5" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 16px; resize: vertical;"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Send Message</button>
                        </form>
                    </div>

                    <!-- Contact Information -->
                    <div>
                        <h2 style="text-align: left; font-size: 1.8rem; margin-bottom: 25px;">Contact Information</h2>
                        
                        <div style="margin-bottom: 30px;">
                            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">
                                <div style="font-size: 1.5rem;">📍</div>
                                <div>
                                    <h4 style="color: #1a1a2e;">Address</h4>
                                    <p style="color: #666;">Lagos, Nigeria</p>
                                </div>
                            </div>
                            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">
                                <div style="font-size: 1.5rem;">📞</div>
                                <div>
                                    <h4 style="color: #1a1a2e;">Phone</h4>
                                    <p style="color: #666;">07041145338</p>
                                </div>
                            </div>
                            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">
                                <div style="font-size: 1.5rem;">✉️</div>
                                <div>
                                    <h4 style="color: #1a1a2e;">Email</h4>
                                    <p style="color: #666;">stanleytechconnect@gmail.com</p>
                                </div>
                            </div>
                            <div style="display: flex; align-items: center; gap: 15px;">
                                <div style="font-size: 1.5rem;">🕐</div>
                                <div>
                                    <h4 style="color: #1a1a2e;">Working Hours</h4>
                                    <p style="color: #666;">Monday - Friday: 9:00 AM - 6:00 PM</p>
                                </div>
                            </div>
                        </div>

                        <div style="background: #f0f4f8; padding: 25px; border-radius: 12px;">
                            <h3 style="color: #1a1a2e; margin-bottom: 15px;">Connect With Us</h3>
                            <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                                <a href="https://github.com/stanleytechconnect" target="_blank" style="background: #1a1a2e; color: #fff; padding: 10px 20px; border-radius: 8px; text-decoration: none;">GitHub</a>
                                <a href="https://facebook.com/Stanley-Tech-Connect" target="_blank" style="background: #1877f2; color: #fff; padding: 10px 20px; border-radius: 8px; text-decoration: none;">Facebook</a>
                                <a href="https://wa.me/2347041145338" target="_blank" style="background: #25D366; color: #fff; padding: 10px 20px; border-radius: 8px; text-decoration: none;">WhatsApp</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>
    <script src="assets/js/script.js"></script>
</body>
</html>