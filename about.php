<?php
// Day 2: About Page
$page_title = "About - Stanley Tech Connect";
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
        <!-- Page Header -->
        <section class="page-header section-padding bg-light" style="padding: 60px 0;">
            <div class="container text-center">
                <h1 style="font-size: 2.8rem; color: #1a1a2e;">About Us</h1>
                <p style="font-size: 1.2rem; color: #666; max-width: 600px; margin: 10px auto 0;">Learn more about Stanley Tech Connect and our mission</p>
            </div>
        </section>

        <!-- About Content -->
        <section class="about-content section-padding">
            <div class="container">
                <div style="max-width: 800px; margin: 0 auto;">
                    <h2 style="text-align: left; font-size: 2rem;">Who We Are</h2>
                    <p style="font-size: 1.1rem; color: #555; margin-bottom: 30px;">
                        Stanley Tech Connect is a technology training and development organization dedicated to empowering individuals with practical tech skills. We believe in learning by doing and provide hands-on, project-based training that prepares our students for real-world challenges.
                    </p>

                    <h2 style="text-align: left; font-size: 2rem; margin-top: 40px;">Our Mission</h2>
                    <p style="font-size: 1.1rem; color: #555; margin-bottom: 30px;">
                        To bridge the gap between learning and real-world application by providing hands-on, project-based training in web development and technology. We aim to make tech education accessible, practical, and career-focused.
                    </p>

                    <h2 style="text-align: left; font-size: 2rem; margin-top: 40px;">Our Vision</h2>
                    <p style="font-size: 1.1rem; color: #555; margin-bottom: 30px;">
                        To become the leading technology training hub in Nigeria, producing job-ready tech professionals who can compete globally and drive innovation in the digital economy.
                    </p>

                    <h2 style="text-align: left; font-size: 2rem; margin-top: 40px;">Our Values</h2>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 20px;">
                        <div style="background: #f0f4f8; padding: 20px; border-radius: 8px; border-left: 4px solid #00d2ff;">
                            <h3 style="color: #1a1a2e;">Excellence</h3>
                            <p style="color: #666;">We strive for excellence in everything we do</p>
                        </div>
                        <div style="background: #f0f4f8; padding: 20px; border-radius: 8px; border-left: 4px solid #00d2ff;">
                            <h3 style="color: #1a1a2e;">Innovation</h3>
                            <p style="color: #666;">We embrace innovation and new technologies</p>
                        </div>
                        <div style="background: #f0f4f8; padding: 20px; border-radius: 8px; border-left: 4px solid #00d2ff;">
                            <h3 style="color: #1a1a2e;">Integrity</h3>
                            <p style="color: #666;">We operate with honesty and transparency</p>
                        </div>
                        <div style="background: #f0f4f8; padding: 20px; border-radius: 8px; border-left: 4px solid #00d2ff;">
                            <h3 style="color: #1a1a2e;">Community</h3>
                            <p style="color: #666;">We build a supportive learning community</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section class="team-section section-padding bg-light">
            <div class="container">
                <h2>Meet Our Team</h2>
                <div class="cards-grid">
                    <div class="card">
                        <div style="width: 100px; height: 100px; background: #00d2ff; border-radius: 50%; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center; font-size: 40px; color: #fff;">👨‍💻</div>
                        <h3>Stanley Okonkwo</h3>
                        <p style="color: #00d2ff; font-weight: 600;">Founder & Lead Instructor</p>
                        <p style="color: #666; font-size: 0.95rem;">Full-stack developer with 8+ years of experience</p>
                    </div>
                    <div class="card">
                        <div style="width: 100px; height: 100px; background: #3a7bd5; border-radius: 50%; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center; font-size: 40px; color: #fff;">👩‍🏫</div>
                        <h3>Chioma Eze</h3>
                        <p style="color: #00d2ff; font-weight: 600;">Curriculum Designer</p>
                        <p style="color: #666; font-size: 0.95rem;">Education specialist with 6+ years in tech training</p>
                    </div>
                    <div class="card">
                        <div style="width: 100px; height: 100px; background: #0f3460; border-radius: 50%; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center; font-size: 40px; color: #fff;">👨‍🏫</div>
                        <h3>David Johnson</h3>
                        <p style="color: #00d2ff; font-weight: 600;">Senior Developer</p>
                        <p style="color: #666; font-size: 0.95rem;">Backend specialist with 5+ years of experience</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>
    <script src="assets/js/script.js"></script>
</body>
</html>