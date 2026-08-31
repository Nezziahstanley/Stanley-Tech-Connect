<?php
// Day 5: Services Page with Reusable Header/Footer
$page_title = "Services - Stanley Tech Connect";
$meta_description = "Explore our comprehensive tech training and development services.";

include 'includes/header.php';
?>

<!-- Page Header -->
<section class="page-header">
    <div class="container text-center">
        <h1>Our Services</h1>
        <p>Comprehensive tech training and development services</p>
    </div>
</section>

<!-- Services List -->
<section class="section-padding">
    <div class="container">
        <div class="cards-grid">
            <div class="service-card fade-in-up delay-1" style="text-align: left; padding: 35px;">
                <div class="icon-wrapper">💻</div>
                <h3>Web Development Training</h3>
                <p>Complete full-stack web development training covering HTML, CSS, JavaScript, PHP, and MySQL. Build real-world projects from scratch.</p>
                <ul style="list-style: none; margin-top: 15px; color: #555;">
                    <li style="padding: 5px 0;">✓ Frontend Development</li>
                    <li style="padding: 5px 0;">✓ Backend Development</li>
                    <li style="padding: 5px 0;">✓ Database Management</li>
                    <li style="padding: 5px 0;">✓ Deployment & Hosting</li>
                </ul>
            </div>

            <div class="service-card fade-in-up delay-2" style="text-align: left; padding: 35px;">
                <div class="icon-wrapper">🎓</div>
                <h3>Training & Mentorship</h3>
                <p>Personalized mentorship programs designed to accelerate your learning and career growth in the tech industry.</p>
                <ul style="list-style: none; margin-top: 15px; color: #555;">
                    <li style="padding: 5px 0;">✓ One-on-one Mentorship</li>
                    <li style="padding: 5px 0;">✓ Career Guidance</li>
                    <li style="padding: 5px 0;">✓ Portfolio Building</li>
                    <li style="padding: 5px 0;">✓ Interview Preparation</li>
                </ul>
            </div>

            <div class="service-card fade-in-up delay-3" style="text-align: left; padding: 35px;">
                <div class="icon-wrapper">🚀</div>
                <h3>Project-Based Learning</h3>
                <p>Hands-on project experience that simulates real-world development scenarios. Build a portfolio of work that employers want to see.</p>
                <ul style="list-style: none; margin-top: 15px; color: #555;">
                    <li style="padding: 5px 0;">✓ Real-World Projects</li>
                    <li style="padding: 5px 0;">✓ Team Collaboration</li>
                    <li style="padding: 5px 0;">✓ Code Reviews</li>
                    <li style="padding: 5px 0;">✓ Portfolio Development</li>
                </ul>
            </div>

            <div class="service-card fade-in-up delay-4" style="text-align: left; padding: 35px;">
                <div class="icon-wrapper">📱</div>
                <h3>Mobile App Development</h3>
                <p>Learn to build mobile applications using modern frameworks and technologies. Cross-platform development with React Native.</p>
                <ul style="list-style: none; margin-top: 15px; color: #555;">
                    <li style="padding: 5px 0;">✓ React Native</li>
                    <li style="padding: 5px 0;">✓ iOS & Android</li>
                    <li style="padding: 5px 0;">✓ App Deployment</li>
                    <li style="padding: 5px 0;">✓ UI/UX Design</li>
                </ul>
            </div>

            <div class="service-card fade-in-up delay-5" style="text-align: left; padding: 35px;">
                <div class="icon-wrapper">☁️</div>
                <h3>Cloud Computing</h3>
                <p>Understanding cloud platforms and services for deploying and scaling applications. AWS, Azure, and Google Cloud fundamentals.</p>
                <ul style="list-style: none; margin-top: 15px; color: #555;">
                    <li style="padding: 5px 0;">✓ AWS Essentials</li>
                    <li style="padding: 5px 0;">✓ Cloud Deployment</li>
                    <li style="padding: 5px 0;">✓ DevOps Basics</li>
                    <li style="padding: 5px 0;">✓ Serverless Architecture</li>
                </ul>
            </div>

            <div class="service-card fade-in-up delay-5" style="text-align: left; padding: 35px;">
                <div class="icon-wrapper">🤝</div>
                <h3>Community & Networking</h3>
                <p>Join a vibrant community of learners and professionals. Network with industry experts and fellow developers.</p>
                <ul style="list-style: none; margin-top: 15px; color: #555;">
                    <li style="padding: 5px 0;">✓ Tech Meetups</li>
                    <li style="padding: 5px 0;">✓ Hackathons</li>
                    <li style="padding: 5px 0;">✓ Networking Events</li>
                    <li style="padding: 5px 0;">✓ Alumni Community</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2>Ready to Get Started?</h2>
        <p>Join our 30-day challenge and start your journey to becoming a full-stack developer today.</p>
        <a href="register.php" class="btn btn-primary btn-lg">Join Now</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>