<?php
// Day 10: Contact Page with Client-Side Validation
$page_title = "Contact - Stanley Tech Connect";
$meta_description = "Get in touch with Stanley Tech Connect for any questions or inquiries.";

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
                
                <form id="contactForm" novalidate>
                    <!-- Name Field -->
                    <div class="form-group">
                        <label for="contactName">Full Name <span class="required">*</span></label>
                        <input type="text" id="contactName" name="name" placeholder="John Doe" required>
                        <small id="contactNameError" class="field-error"></small>
                    </div>
                    
                    <!-- Email Field -->
                    <div class="form-group">
                        <label for="contactEmail">Email Address <span class="required">*</span></label>
                        <input type="email" id="contactEmail" name="email" placeholder="you@example.com" required>
                        <small id="contactEmailError" class="field-error"></small>
                    </div>
                    
                    <!-- Subject Field -->
                    <div class="form-group">
                        <label for="contactSubject">Subject <span class="required">*</span></label>
                        <input type="text" id="contactSubject" name="subject" placeholder="Brief subject" required>
                        <small id="contactSubjectError" class="field-error"></small>
                    </div>
                    
                    <!-- Message Field -->
                    <div class="form-group">
                        <label for="contactMessage">Message <span class="required">*</span></label>
                        <textarea id="contactMessage" name="message" rows="6" placeholder="Write your message here..." required></textarea>
                        <div style="display: flex; justify-content: space-between; margin-top: 5px;">
                            <small id="contactMessageError" class="field-error"></small>
                            <small id="charCounter" style="color: #888; font-size: 0.85rem;">0/2000</small>
                        </div>
                        <span class="field-help">Minimum 10 characters</span>
                    </div>
                    
                    <!-- Submit Button -->
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
                        <a href="https://github.com/stanleytechconnect" target="_blank" class="social-btn github">🐙 GitHub</a>
                        <a href="https://facebook.com/Stanley-Tech-Connect" target="_blank" class="social-btn facebook">📘 Facebook</a>
                        <a href="https://wa.me/2347041145338" target="_blank" class="social-btn whatsapp">💬 WhatsApp</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>