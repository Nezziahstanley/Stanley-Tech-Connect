<?php
// Day 1: Project Foundation
// This is the main homepage file

// Set page title for dynamic use
$page_title = "Home - Stanley Tech Connect";

// You can add PHP variables here for dynamic content
$company_name = "Stanley Tech Connect";
$year = date("Y");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    
    <!-- Link to CSS file (will be created on Day 4) -->
    <link rel="stylesheet" href="css/styles.css">
    
    <!-- Favicon placeholder -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="header-container">
            <!-- Logo -->
            <div class="logo">
                <a href="index.php">
                    <h1>STC</h1>
                    <!-- Alternative: Use an image logo -->
                    <!-- <img src="assets/images/logo.png" alt="Stanley Tech Connect"> -->
                </a>
            </div>
            
            <!-- Navigation Menu -->
            <nav>
                <ul class="nav-menu">
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="courses.php">Courses</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="register.php" class="btn-nav">Register</a></li>
                    <li><a href="login.php" class="btn-nav">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content Area -->
    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-container">
                <div class="hero-content">
                    <h1>Welcome to <?php echo $company_name; ?></h1>
                    <p>Learn, Build, and Grow with Technology</p>
                    <p>Join our 30-day challenge and become a full-stack developer</p>
                    <div class="hero-buttons">
                        <a href="register.php" class="btn btn-primary">Get Started</a>
                        <a href="courses.php" class="btn btn-secondary">View Courses</a>
                    </div>
                </div>
                <div class="hero-image">
                    <!-- Placeholder for hero image -->
                    <img src="assets/images/hero-placeholder.jpg" alt="Technology Hero Image" style="max-width: 100%;">
                </div>
            </div>
        </section>

        <!-- About Section (Preview) -->
        <section class="about-preview">
            <div class="container">
                <h2>About Stanley Tech Connect</h2>
                <p>We are dedicated to empowering individuals with practical tech skills through hands-on projects and structured learning.</p>
                <a href="about.php" class="btn btn-secondary">Learn More →</a>
            </div>
        </section>

        <!-- Services Section (Preview) -->
        <section class="services-preview">
            <div class="container">
                <h2>Our Services</h2>
                <div class="service-cards">
                    <div class="service-card">
                        <h3>Web Development</h3>
                        <p>Learn full-stack web development with modern technologies</p>
                    </div>
                    <div class="service-card">
                        <h3>Training & Mentorship</h3>
                        <p>Get personalized guidance from industry experts</p>
                    </div>
                    <div class="service-card">
                        <h3>Project-Based Learning</h3>
                        <p>Build real-world projects to showcase your skills</p>
                    </div>
                </div>
                <a href="services.php" class="btn btn-secondary">View All Services →</a>
            </div>
        </section>

        <!-- Courses Preview -->
        <section class="courses-preview">
            <div class="container">
                <h2>Featured Courses</h2>
                <div class="course-cards">
                    <div class="course-card">
                        <h3>30-Day Website Building</h3>
                        <p>Complete guide to building websites with HTML, CSS, JS, PHP, and MySQL</p>
                        <span class="course-level">Beginner to Advanced</span>
                        <a href="courses.php" class="btn btn-primary">Learn More</a>
                    </div>
                    <div class="course-card">
                        <h3>JavaScript Mastery</h3>
                        <p>Deep dive into JavaScript for interactive web applications</p>
                        <span class="course-level">Intermediate</span>
                        <a href="courses.php" class="btn btn-primary">Learn More</a>
                    </div>
                    <div class="course-card">
                        <h3>PHP & MySQL</h3>
                        <p>Build dynamic websites with server-side programming</p>
                        <span class="course-level">Intermediate</span>
                        <a href="courses.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer Section -->
    <footer>
        <div class="footer-container">
            <div class="footer-columns">
                <!-- Company Info -->
                <div class="footer-column">
                    <h4><?php echo $company_name; ?></h4>
                    <p>Empowering the next generation of tech professionals</p>
                    <p>📞 07041145338</p>
                    <p>✉️ stanleytechconnect@gmail.com</p>
                </div>
                
                <!-- Quick Links -->
                <div class="footer-column">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="services.php">Services</a></li>
                        <li><a href="courses.php">Courses</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Account -->
                <div class="footer-column">
                    <h4>Account</h4>
                    <ul>
                        <li><a href="register.php">Register</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="dashboard.php">Dashboard</a></li>
                    </ul>
                </div>
                
                <!-- Social Links -->
                <div class="footer-column">
                    <h4>Connect With Us</h4>
                    <ul>
                        <li><a href="https://github.com/stanleytechconnect" target="_blank">GitHub</a></li>
                        <li><a href="https://facebook.com/Stanley-Tech-Connect" target="_blank">Facebook</a></li>
                        <li><a href="https://wa.me/2347041145338" target="_blank">WhatsApp</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo $year; ?> <?php echo $company_name; ?>. All rights reserved.</p>
                <p>Built with ❤️ during the 30-Day Challenge</p>
            </div>
        </div>
    </footer>

    <!-- Link to JavaScript file (will be created on Day 8) -->
    <script src="js/scripts.js"></script>
    
    <!-- Day 1 status tracker (visible only during development) -->
    <div style="position: fixed; bottom: 10px; right: 10px; background: #2ecc71; color: white; padding: 8px 15px; border-radius: 20px; font-size: 12px; z-index: 9999;">
        ✅ Day 1 Complete - <?php echo date('Y-m-d H:i:s'); ?>
    </div>
</body>
</html>