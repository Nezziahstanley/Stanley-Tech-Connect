<?php
// Day 2: Courses Page
$page_title = "Courses - Stanley Tech Connect";
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
                <h1 style="font-size: 2.8rem; color: #1a1a2e;">Our Courses</h1>
                <p style="font-size: 1.2rem; color: #666; max-width: 600px; margin: 10px auto 0;">Comprehensive courses designed to take you from beginner to professional</p>
            </div>
        </section>

        <!-- Course Categories -->
        <section class="courses-section section-padding">
            <div class="container">
                <div class="cards-grid">
                    <!-- Course 1 -->
                    <div class="card course-card" style="text-align: left; padding: 30px;">
                        <div style="background: #00d2ff; color: #1a1a2e; padding: 5px 15px; border-radius: 20px; display: inline-block; font-size: 0.8rem; font-weight: 600; margin-bottom: 15px;">BEGINNER</div>
                        <h3>30-Day Website Building</h3>
                        <p style="color: #666; font-size: 0.95rem;">Complete guide to building websites with HTML, CSS, JavaScript, PHP, and MySQL.</p>
                        <div style="margin: 15px 0;">
                            <span style="display: inline-block; background: #f0f4f8; padding: 3px 12px; border-radius: 15px; font-size: 0.8rem; margin-right: 5px;">📚 30 Days</span>
                            <span style="display: inline-block; background: #f0f4f8; padding: 3px 12px; border-radius: 15px; font-size: 0.8rem;">🎯 Project-Based</span>
                        </div>
                        <a href="register.php" class="btn btn-primary" style="width: 100%; text-align: center;">Enroll Now</a>
                    </div>

                    <!-- Course 2 -->
                    <div class="card course-card" style="text-align: left; padding: 30px;">
                        <div style="background: #ffc107; color: #1a1a2e; padding: 5px 15px; border-radius: 20px; display: inline-block; font-size: 0.8rem; font-weight: 600; margin-bottom: 15px;">INTERMEDIATE</div>
                        <h3>JavaScript Mastery</h3>
                        <p style="color: #666; font-size: 0.95rem;">Deep dive into JavaScript for building interactive and dynamic web applications.</p>
                        <div style="margin: 15px 0;">
                            <span style="display: inline-block; background: #f0f4f8; padding: 3px 12px; border-radius: 15px; font-size: 0.8rem; margin-right: 5px;">📚 20 Days</span>
                            <span style="display: inline-block; background: #f0f4f8; padding: 3px 12px; border-radius: 15px; font-size: 0.8rem;">🎯 Advanced</span>
                        </div>
                        <a href="register.php" class="btn btn-primary" style="width: 100%; text-align: center;">Enroll Now</a>
                    </div>

                    <!-- Course 3 -->
                    <div class="card course-card" style="text-align: left; padding: 30px;">
                        <div style="background: #ffc107; color: #1a1a2e; padding: 5px 15px; border-radius: 20px; display: inline-block; font-size: 0.8rem; font-weight: 600; margin-bottom: 15px;">INTERMEDIATE</div>
                        <h3>PHP & MySQL</h3>
                        <p style="color: #666; font-size: 0.95rem;">Build dynamic websites with server-side programming and database integration.</p>
                        <div style="margin: 15px 0;">
                            <span style="display: inline-block; background: #f0f4f8; padding: 3px 12px; border-radius: 15px; font-size: 0.8rem; margin-right: 5px;">📚 25 Days</span>
                            <span style="display: inline-block; background: #f0f4f8; padding: 3px 12px; border-radius: 15px; font-size: 0.8rem;">🎯 Backend Focus</span>
                        </div>
                        <a href="register.php" class="btn btn-primary" style="width: 100%; text-align: center;">Enroll Now</a>
                    </div>

                    <!-- Course 4 -->
                    <div class="card course-card" style="text-align: left; padding: 30px;">
                        <div style="background: #e74c3c; color: #fff; padding: 5px 15px; border-radius: 20px; display: inline-block; font-size: 0.8rem; font-weight: 600; margin-bottom: 15px;">ADVANCED</div>
                        <h3>Full-Stack Development</h3>
                        <p style="color: #666; font-size: 0.95rem;">Complete full-stack development with modern frameworks and best practices.</p>
                        <div style="margin: 15px 0;">
                            <span style="display: inline-block; background: #f0f4f8; padding: 3px 12px; border-radius: 15px; font-size: 0.8rem; margin-right: 5px;">📚 40 Days</span>
                            <span style="display: inline-block; background: #f0f4f8; padding: 3px 12px; border-radius: 15px; font-size: 0.8rem;">🎯 Professional</span>
                        </div>
                        <a href="register.php" class="btn btn-primary" style="width: 100%; text-align: center;">Enroll Now</a>
                    </div>

                    <!-- Course 5 -->
                    <div class="card course-card" style="text-align: left; padding: 30px;">
                        <div style="background: #9b59b6; color: #fff; padding: 5px 15px; border-radius: 20px; display: inline-block; font-size: 0.8rem; font-weight: 600; margin-bottom: 15px;">INTERMEDIATE</div>
                        <h3>React.js Development</h3>
                        <p style="color: #666; font-size: 0.95rem;">Build modern user interfaces with React.js and its ecosystem.</p>
                        <div style="margin: 15px 0;">
                            <span style="display: inline-block; background: #f0f4f8; padding: 3px 12px; border-radius: 15px; font-size: 0.8rem; margin-right: 5px;">📚 30 Days</span>
                            <span style="display: inline-block; background: #f0f4f8; padding: 3px 12px; border-radius: 15px; font-size: 0.8rem;">🎯 Frontend Focus</span>
                        </div>
                        <a href="register.php" class="btn btn-primary" style="width: 100%; text-align: center;">Enroll Now</a>
                    </div>

                    <!-- Course 6 -->
                    <div class="card course-card" style="text-align: left; padding: 30px;">
                        <div style="background: #2ecc71; color: #1a1a2e; padding: 5px 15px; border-radius: 20px; display: inline-block; font-size: 0.8rem; font-weight: 600; margin-bottom: 15px;">BEGINNER</div>
                        <h3>Introduction to Programming</h3>
                        <p style="color: #666; font-size: 0.95rem;">Learn programming fundamentals and logical thinking for beginners.</p>
                        <div style="margin: 15px 0;">
                            <span style="display: inline-block; background: #f0f4f8; padding: 3px 12px; border-radius: 15px; font-size: 0.8rem; margin-right: 5px;">📚 15 Days</span>
                            <span style="display: inline-block; background: #f0f4f8; padding: 3px 12px; border-radius: 15px; font-size: 0.8rem;">🎯 Fundamentals</span>
                        </div>
                        <a href="register.php" class="btn btn-primary" style="width: 100%; text-align: center;">Enroll Now</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features-section section-padding bg-light">
            <div class="container">
                <h2>Why Choose Our Courses?</h2>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
                    <div style="text-align: center;">
                        <div style="font-size: 2.5rem; margin-bottom: 15px;">📖</div>
                        <h3 style="color: #1a1a2e;">Practical Learning</h3>
                        <p style="color: #666;">Hands-on projects and real-world examples</p>
                    </div>
                    <div style="text-align: center;">
                        <div style="font-size: 2.5rem; margin-bottom: 15px;">👨‍🏫</div>
                        <h3 style="color: #1a1a2e;">Expert Instructors</h3>
                        <p style="color: #666;">Learn from industry professionals</p>
                    </div>
                    <div style="text-align: center;">
                        <div style="font-size: 2.5rem; margin-bottom: 15px;">🤝</div>
                        <h3 style="color: #1a1a2e;">Community Support</h3>
                        <p style="color: #666;">Join a community of fellow learners</p>
                    </div>
                    <div style="text-align: center;">
                        <div style="font-size: 2.5rem; margin-bottom: 15px;">🎓</div>
                        <h3 style="color: #1a1a2e;">Certificate</h3>
                        <p style="color: #666;">Earn a certificate upon completion</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>
    <script src="assets/js/script.js"></script>
</body>
</html>