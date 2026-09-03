<?php
// Day 8: Functions, Scope & Events Demo Page
$page_title = "Home - Stanley Tech Connect";
$meta_description = "Stanley Tech Connect - Learn, Build, and Grow with Technology. Join our 30-day challenge and become a full-stack developer.";

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

<!-- Day 8 Demo Section -->
<section class="section-padding bg-light" id="day8-demo">
    <div class="container">
        <h2 class="section-title">Day 8 Demo: <span class="highlight">JavaScript Functions & Events</span></h2>
        <p class="section-subtitle">Testing what we learned today - functions, scope, and events</p>
        
        <!-- Row 1: Buttons & Form -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; max-width: 900px; margin: 0 auto;">
            
            <!-- Column 1: Buttons & Hover -->
            <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                <h3 style="margin-bottom: 15px; color: #1a1a2e; font-size: 1.1rem;">Buttons & Events</h3>
                
                <button id="demoButton" class="btn btn-primary" style="width: 100%; margin-bottom: 10px;">
                    Click Me!
                </button>
                
                <button id="eventButton" class="btn btn-secondary" style="width: 100%; margin-bottom: 10px;">
                    Show Event Object
                </button>
                
                <div id="hoverBox" style="background: #f0f4f8; padding: 20px; text-align: center; border-radius: 8px; cursor: pointer; transition: all 0.3s ease; border: 2px dashed #ccc; font-weight: 500;">
                    🖱️ Hover me!
                </div>
            </div>
            
            <!-- Column 2: Form & Input -->
            <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                <h3 style="margin-bottom: 15px; color: #1a1a2e; font-size: 1.1rem;">Form & Input Events</h3>
                
                <form id="demoForm">
                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-weight: 600; margin-bottom: 5px; font-size: 0.9rem;">Name</label>
                        <input type="text" id="demoName" placeholder="Enter your name" style="width: 100%; padding: 10px; border: 2px solid #ddd; border-radius: 8px; font-size: 0.95rem;">
                    </div>
                    
                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-weight: 600; margin-bottom: 5px; font-size: 0.9rem;">Email</label>
                        <input type="email" id="demoEmail" placeholder="Enter your email" style="width: 100%; padding: 10px; border: 2px solid #ddd; border-radius: 8px; font-size: 0.95rem;">
                        <small id="emailError" style="display: block; margin-top: 5px; font-size: 0.8rem; min-height: 20px;"></small>
                    </div>
                    
                    <button type="submit" class="btn btn-success" style="width: 100%;">
                        Submit Form
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Row 2: Key Input & List -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; max-width: 900px; margin: 20px auto 0;">
            
            <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                <h3 style="margin-bottom: 15px; color: #1a1a2e; font-size: 1.1rem;">Key Events</h3>
                <input type="text" id="keyInput" placeholder="Type something..." style="width: 100%; padding: 10px; border: 2px solid #ddd; border-radius: 8px; font-size: 0.95rem; margin-bottom: 10px;">
                <div id="keyDisplay" style="background: #f8f9fa; padding: 10px; border-radius: 8px; text-align: center; min-height: 40px; color: #666; font-size: 0.9rem;">
                    Press a key...
                </div>
            </div>
            
            <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                <h3 style="margin-bottom: 15px; color: #1a1a2e; font-size: 1.1rem;">Event Delegation</h3>
                <p style="font-size: 0.85rem; color: #666; margin-bottom: 10px;">Click any item below:</p>
                <ul id="demoList" style="list-style: none; padding: 0; margin: 0;">
                    <li style="padding: 10px 15px; background: #f8f9fa; margin-bottom: 5px; border-radius: 8px; cursor: pointer; transition: all 0.2s ease;">
                        📚 Course 1: JavaScript Basics
                    </li>
                    <li style="padding: 10px 15px; background: #f8f9fa; margin-bottom: 5px; border-radius: 8px; cursor: pointer; transition: all 0.2s ease;">
                        🎯 Course 2: PHP & MySQL
                    </li>
                    <li style="padding: 10px 15px; background: #f8f9fa; margin-bottom: 5px; border-radius: 8px; cursor: pointer; transition: all 0.2s ease;">
                        🚀 Course 3: Full-Stack Development
                    </li>
                    <li style="padding: 10px 15px; background: #f8f9fa; margin-bottom: 5px; border-radius: 8px; cursor: pointer; transition: all 0.2s ease;">
                        💻 Course 4: React.js Mastery
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Console Instructions -->
        <div style="max-width: 900px; margin: 30px auto 0; background: #1a1a2e; color: #fff; padding: 20px 25px; border-radius: 12px;">
            <h4 style="color: #00d2ff; margin-bottom: 10px; font-size: 1rem;">💡 Open Console (F12) to see:</h4>
            <ul style="list-style: none; padding: 0; font-size: 0.85rem; opacity: 0.9; display: grid; grid-template-columns: 1fr 1fr; gap: 5px;">
                <li style="padding: 4px 0;">✅ Function calls and returns</li>
                <li style="padding: 4px 0;">✅ Scope examples (global, local, block)</li>
                <li style="padding: 4px 0;">✅ Event listeners in action</li>
                <li style="padding: 4px 0;">✅ Keyboard events and mouse events</li>
            </ul>
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

<?php include 'includes/footer.php'; ?>