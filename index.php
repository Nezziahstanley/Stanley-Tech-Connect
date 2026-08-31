<?php
// Day 5: Homepage with Reusable Header/Footer
$page_title = "Home - Stanley Tech Connect";
$meta_description = "Stanley Tech Connect - Learn, Build, and Grow with Technology. Join our 30-day challenge and become a full-stack developer.";

// Include header
include 'includes/header.php';
?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content fade-in-up">
            <span class="hero-badge">🚀 30-Day Challenge</span>
            <h1>Welcome to <span class="highlight">Stanley Tech Connect</span></h1>
            <p class="hero-subtitle">Learn, Build, and Grow with Technology</p>
            <p>Join our 30-day challenge and become a full-stack developer with hands-on projects and expert mentorship.</p>
            <div class="hero-buttons">
                <a href="register.php" class="btn btn-primary btn-lg">Get Started</a>
                <a href="courses.php" class="btn btn-secondary btn-lg">View Courses</a>
            </div>
        </div>
        <div class="hero-image zoom-in delay-2">
            <img src="assets/images/hero.jpg" alt="Technology Hero Image" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22500%22 height=%22350%22%3E%3Crect fill=%22%231a1a2e%22 width=%22500%22 height=%22350%22/%3E%3Ctext x=%22250%22 y=%22175%22 text-anchor=%22middle%22 fill=%22%2300d2ff%22 font-size=%2230%22 font-family=%22Arial%22%3E💻 STC%3C/text%3E%3C/svg%3E'">
        </div>
    </div>
</section>

<!-- About Preview -->
<section class="section-padding">
    <div class="container">
        <h2 class="section-title">About <span class="highlight">Stanley Tech Connect</span></h2>
        <p class="section-subtitle">We are dedicated to empowering individuals with practical tech skills through hands-on projects and structured learning.</p>
        <div class="text-center">
            <a href="about.php" class="btn btn-secondary">Learn More →</a>
        </div>
    </div>
</section>

<!-- Services Preview -->
<section class="section-padding bg-light">
    <div class="container">
        <h2 class="section-title">Our <span class="highlight">Services</span></h2>
        <p class="section-subtitle">Comprehensive training and development services to accelerate your tech career.</p>
        <div class="cards-grid">
            <div class="service-card fade-in-up delay-1">
                <div class="icon-wrapper">💻</div>
                <h3>Web Development</h3>
                <p>Learn full-stack web development with modern technologies and best practices.</p>
            </div>
            <div class="service-card fade-in-up delay-2">
                <div class="icon-wrapper">🎓</div>
                <h3>Training & Mentorship</h3>
                <p>Get personalized guidance from industry experts and accelerate your learning.</p>
            </div>
            <div class="service-card fade-in-up delay-3">
                <div class="icon-wrapper">🚀</div>
                <h3>Project-Based Learning</h3>
                <p>Build real-world projects to showcase your skills and build your portfolio.</p>
            </div>
        </div>
        <div class="text-center">
            <a href="services.php" class="btn btn-secondary">View All Services →</a>
        </div>
    </div>
</section>

<!-- Courses Preview -->
<section class="section-padding">
    <div class="container">
        <h2 class="section-title">Featured <span class="highlight">Courses</span></h2>
        <p class="section-subtitle">Comprehensive courses designed to take you from beginner to professional.</p>
        <div class="cards-grid">
            <div class="course-card fade-in-up delay-1">
                <div class="course-image">📚</div>
                <div class="course-content">
                    <span class="course-tag badge-primary">Beginner to Advanced</span>
                    <h3>30-Day Website Building</h3>
                    <p>Complete guide to building websites with HTML, CSS, JS, PHP, and MySQL.</p>
                    <div class="course-meta">
                        <span>📅 30 Days</span>
                        <span>🎯 Project-Based</span>
                    </div>
                    <a href="register.php" class="btn btn-primary btn-block">Enroll Now</a>
                </div>
            </div>
            <div class="course-card fade-in-up delay-2">
                <div class="course-image">⚡</div>
                <div class="course-content">
                    <span class="course-tag badge-warning">Intermediate</span>
                    <h3>JavaScript Mastery</h3>
                    <p>Deep dive into JavaScript for building interactive web applications.</p>
                    <div class="course-meta">
                        <span>📅 20 Days</span>
                        <span>🎯 Advanced</span>
                    </div>
                    <a href="register.php" class="btn btn-primary btn-block">Enroll Now</a>
                </div>
            </div>
            <div class="course-card fade-in-up delay-3">
                <div class="course-image">🗄️</div>
                <div class="course-content">
                    <span class="course-tag badge-warning">Intermediate</span>
                    <h3>PHP & MySQL</h3>
                    <p>Build dynamic websites with server-side programming and databases.</p>
                    <div class="course-meta">
                        <span>📅 25 Days</span>
                        <span>🎯 Backend Focus</span>
                    </div>
                    <a href="register.php" class="btn btn-primary btn-block">Enroll Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
// Include footer
include 'includes/footer.php';
?>