<?php
// Day 1: Project Foundation - Homepage
$page_title = "Home - Stanley Tech Connect";
$company_name = "Stanley Tech Connect";
$year = date("Y");
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
        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <h1>Welcome to <span class="highlight">Stanley Tech Connect</span></h1>
                    <p class="hero-subtitle">Learn, Build, and Grow with Technology</p>
                    <p>Join our 30-day challenge and become a full-stack developer</p>
                    <div class="hero-buttons">
                        <a href="register.php" class="btn btn-primary">Get Started</a>
                        <a href="courses.php" class="btn btn-secondary">View Courses</a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="assets/images/hero.jpg" alt="Technology Hero Image">
                </div>
            </div>
        </section>

        <!-- About Preview -->
        <section class="about-preview section-padding">
            <div class="container">
                <h2>About Stanley Tech Connect</h2>
                <p>We are dedicated to empowering individuals with practical tech skills through hands-on projects and structured learning.</p>
                <a href="about.php" class="btn btn-secondary">Learn More →</a>
            </div>
        </section>

        <!-- Services Preview -->
        <section class="services-preview section-padding bg-light">
            <div class="container">
                <h2>Our Services</h2>
                <div class="cards-grid">
                    <div class="card">
                        <h3>Web Development</h3>
                        <p>Learn full-stack web development with modern technologies</p>
                    </div>
                    <div class="card">
                        <h3>Training & Mentorship</h3>
                        <p>Get personalized guidance from industry experts</p>
                    </div>
                    <div class="card">
                        <h3>Project-Based Learning</h3>
                        <p>Build real-world projects to showcase your skills</p>
                    </div>
                </div>
                <a href="services.php" class="btn btn-secondary">View All Services →</a>
            </div>
        </section>

        <!-- Courses Preview -->
        <section class="courses-preview section-padding">
            <div class="container">
                <h2>Featured Courses</h2>
                <div class="cards-grid">
                    <div class="card course-card">
                        <h3>30-Day Website Building</h3>
                        <p>Complete guide to building websites with HTML, CSS, JS, PHP, and MySQL</p>
                        <span class="badge">Beginner to Advanced</span>
                        <a href="courses.php" class="btn btn-primary">Learn More</a>
                    </div>
                    <div class="card course-card">
                        <h3>JavaScript Mastery</h3>
                        <p>Deep dive into JavaScript for interactive web applications</p>
                        <span class="badge">Intermediate</span>
                        <a href="courses.php" class="btn btn-primary">Learn More</a>
                    </div>
                    <div class="card course-card">
                        <h3>PHP & MySQL</h3>
                        <p>Build dynamic websites with server-side programming</p>
                        <span class="badge">Intermediate</span>
                        <a href="courses.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>
    <script src="assets/js/script.js"></script>
</body>
</html>