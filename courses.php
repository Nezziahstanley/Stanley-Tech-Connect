<?php
// Day 5: Courses Page with Reusable Header/Footer
$page_title = "Courses - Stanley Tech Connect";
$meta_description = "Explore our comprehensive courses designed to take you from beginner to professional.";

include 'includes/header.php';
?>

<!-- Page Header -->
<section class="page-header">
    <div class="container text-center">
        <h1>Our Courses</h1>
        <p>Comprehensive courses designed to take you from beginner to professional</p>
    </div>
</section>

<!-- Courses Section -->
<section class="section-padding">
    <div class="container">
        <div class="cards-grid">
            <!-- Course 1 -->
            <div class="course-card fade-in-up delay-1">
                <div class="course-image" style="background: linear-gradient(135deg, #00d2ff, #3a7bd5);">📚</div>
                <div class="course-content">
                    <span class="course-tag badge-primary">Beginner</span>
                    <h3>30-Day Website Building</h3>
                    <p>Complete guide to building websites with HTML, CSS, JavaScript, PHP, and MySQL.</p>
                    <div class="course-meta">
                        <span>📅 30 Days</span>
                        <span>🎯 Project-Based</span>
                    </div>
                    <a href="register.php" class="btn btn-primary btn-block">Enroll Now</a>
                </div>
            </div>

            <!-- Course 2 -->
            <div class="course-card fade-in-up delay-2">
                <div class="course-image" style="background: linear-gradient(135deg, #ffc107, #e6a800);">⚡</div>
                <div class="course-content">
                    <span class="course-tag badge-warning">Intermediate</span>
                    <h3>JavaScript Mastery</h3>
                    <p>Deep dive into JavaScript for building interactive and dynamic web applications.</p>
                    <div class="course-meta">
                        <span>📅 20 Days</span>
                        <span>🎯 Advanced</span>
                    </div>
                    <a href="register.php" class="btn btn-primary btn-block">Enroll Now</a>
                </div>
            </div>

            <!-- Course 3 -->
            <div class="course-card fade-in-up delay-3">
                <div class="course-image" style="background: linear-gradient(135deg, #2ecc71, #27ae60);">🗄️</div>
                <div class="course-content">
                    <span class="course-tag badge-warning">Intermediate</span>
                    <h3>PHP & MySQL</h3>
                    <p>Build dynamic websites with server-side programming and database integration.</p>
                    <div class="course-meta">
                        <span>📅 25 Days</span>
                        <span>🎯 Backend Focus</span>
                    </div>
                    <a href="register.php" class="btn btn-primary btn-block">Enroll Now</a>
                </div>
            </div>

            <!-- Course 4 -->
            <div class="course-card fade-in-up delay-4">
                <div class="course-image" style="background: linear-gradient(135deg, #e74c3c, #c0392b);">⚛️</div>
                <div class="course-content">
                    <span class="course-tag badge-danger">Advanced</span>
                    <h3>Full-Stack Development</h3>
                    <p>Complete full-stack development with modern frameworks and best practices.</p>
                    <div class="course-meta">
                        <span>📅 40 Days</span>
                        <span>🎯 Professional</span>
                    </div>
                    <a href="register.php" class="btn btn-primary btn-block">Enroll Now</a>
                </div>
            </div>

            <!-- Course 5 -->
            <div class="course-card fade-in-up delay-5">
                <div class="course-image" style="background: linear-gradient(135deg, #9b59b6, #8e44ad);">🔄</div>
                <div class="course-content">
                    <span class="course-tag badge-info">Intermediate</span>
                    <h3>React.js Development</h3>
                    <p>Build modern user interfaces with React.js and its ecosystem.</p>
                    <div class="course-meta">
                        <span>📅 30 Days</span>
                        <span>🎯 Frontend Focus</span>
                    </div>
                    <a href="register.php" class="btn btn-primary btn-block">Enroll Now</a>
                </div>
            </div>

            <!-- Course 6 -->
            <div class="course-card fade-in-up delay-5">
                <div class="course-image" style="background: linear-gradient(135deg, #1a1a2e, #0f3460);">🐍</div>
                <div class="course-content">
                    <span class="course-tag badge-primary">Beginner</span>
                    <h3>Introduction to Programming</h3>
                    <p>Learn programming fundamentals and logical thinking for beginners.</p>
                    <div class="course-meta">
                        <span>📅 15 Days</span>
                        <span>🎯 Fundamentals</span>
                    </div>
                    <a href="register.php" class="btn btn-primary btn-block">Enroll Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="section-padding bg-light">
    <div class="container">
        <h2 class="section-title">Why Choose <span class="highlight">Our Courses?</span></h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
            <div class="card fade-in-up delay-1">
                <div style="font-size: 2.5rem; margin-bottom: 15px;">📖</div>
                <h3>Practical Learning</h3>
                <p>Hands-on projects and real-world examples</p>
            </div>
            <div class="card fade-in-up delay-2">
                <div style="font-size: 2.5rem; margin-bottom: 15px;">👨‍🏫</div>
                <h3>Expert Instructors</h3>
                <p>Learn from industry professionals</p>
            </div>
            <div class="card fade-in-up delay-3">
                <div style="font-size: 2.5rem; margin-bottom: 15px;">🤝</div>
                <h3>Community Support</h3>
                <p>Join a community of fellow learners</p>
            </div>
            <div class="card fade-in-up delay-4">
                <div style="font-size: 2.5rem; margin-bottom: 15px;">🎓</div>
                <h3>Certificate</h3>
                <p>Earn a certificate upon completion</p>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>