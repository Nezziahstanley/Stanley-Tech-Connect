<?php
// Day 5: About Page with Reusable Header/Footer
$page_title = "About - Stanley Tech Connect";
$meta_description = "Learn about Stanley Tech Connect - our mission, vision, values, and team.";

include 'includes/header.php';
?>

<!-- Page Header -->
<section class="page-header">
    <div class="container text-center">
        <h1>About Us</h1>
        <p>Learn more about Stanley Tech Connect and our mission</p>
    </div>
</section>

<!-- About Content -->
<section class="section-padding">
    <div class="container">
        <div style="max-width: 800px; margin: 0 auto;">
            <h2 class="section-title" style="text-align: left;">Who <span class="highlight">We Are</span></h2>
            <p style="font-size: 1.1rem; color: #555; margin-bottom: 30px;">
                Stanley Tech Connect is a technology training and development organization dedicated to empowering individuals with practical tech skills. We believe in learning by doing and provide hands-on, project-based training that prepares our students for real-world challenges.
            </p>

            <h2 class="section-title" style="text-align: left; margin-top: 40px;">Our <span class="highlight">Mission</span></h2>
            <p style="font-size: 1.1rem; color: #555; margin-bottom: 30px;">
                To bridge the gap between learning and real-world application by providing hands-on, project-based training in web development and technology. We aim to make tech education accessible, practical, and career-focused.
            </p>

            <h2 class="section-title" style="text-align: left; margin-top: 40px;">Our <span class="highlight">Vision</span></h2>
            <p style="font-size: 1.1rem; color: #555; margin-bottom: 30px;">
                To become the leading technology training hub in Nigeria, producing job-ready tech professionals who can compete globally and drive innovation in the digital economy.
            </p>

            <h2 class="section-title" style="text-align: left; margin-top: 40px;">Our <span class="highlight">Values</span></h2>
            <div class="about-values-grid">
                <div class="about-value-item">
                    <h3>🌟 Excellence</h3>
                    <p>We strive for excellence in everything we do</p>
                </div>
                <div class="about-value-item">
                    <h3>💡 Innovation</h3>
                    <p>We embrace innovation and new technologies</p>
                </div>
                <div class="about-value-item">
                    <h3>🤝 Integrity</h3>
                    <p>We operate with honesty and transparency</p>
                </div>
                <div class="about-value-item">
                    <h3>👥 Community</h3>
                    <p>We build a supportive learning community</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="section-padding bg-light">
    <div class="container">
        <h2 class="section-title">Meet Our <span class="highlight">Team</span></h2>
        <p class="section-subtitle">Passionate professionals dedicated to your success.</p>
        <div class="cards-grid">
            <div class="card fade-in-up delay-1">
                <div style="width: 100px; height: 100px; background: var(--primary-gradient); border-radius: 50%; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center; font-size: 40px; color: #fff;">👨‍💻</div>
                <h3>Stanley Okonkwo</h3>
                <p style="color: var(--primary); font-weight: 600;">Founder & Lead Instructor</p>
                <p style="color: #666; font-size: 0.95rem;">Full-stack developer with 8+ years of experience</p>
            </div>
            <div class="card fade-in-up delay-2">
                <div style="width: 100px; height: 100px; background: var(--secondary); border-radius: 50%; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center; font-size: 40px; color: #fff;">👩‍🏫</div>
                <h3>Chioma Eze</h3>
                <p style="color: var(--primary); font-weight: 600;">Curriculum Designer</p>
                <p style="color: #666; font-size: 0.95rem;">Education specialist with 6+ years in tech training</p>
            </div>
            <div class="card fade-in-up delay-3">
                <div style="width: 100px; height: 100px; background: var(--dark-lighter); border-radius: 50%; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center; font-size: 40px; color: #fff;">👨‍🏫</div>
                <h3>David Johnson</h3>
                <p style="color: var(--primary); font-weight: 600;">Senior Developer</p>
                <p style="color: #666; font-size: 0.95rem;">Backend specialist with 5+ years of experience</p>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>