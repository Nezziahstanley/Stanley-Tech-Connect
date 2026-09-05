<?php
// Day 9: DOM Manipulation Demo Page
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

<!-- Day 9: DOM Manipulation Demo -->
<section class="section-padding bg-light" id="day9-demo">
    <div class="container">
        <h2 class="section-title">Day 9 Demo: <span class="highlight">DOM Manipulation</span></h2>
        <p class="section-subtitle">Select, modify, and create elements dynamically</p>
        
        <!-- Hidden elements for demo -->
        <div id="demoHeader" style="display: none;">DOM Manipulation Demo</div>
        <div id="contentArea" style="display: none;">Content</div>
        <div id="styleBox" style="display: none;">Styled Box</div>
        <div id="classBox" style="display: none;">Class Box</div>
        <img id="demoImage" src="assets/images/logo.png" alt="Demo" style="display: none;">
        <div id="demoTraverse" style="display: none;">Traverse Me</div>
        
        <!-- Row 1: Character Counter & Dynamic List -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; max-width: 1000px; margin: 0 auto;">
            
            <!-- Character Counter -->
            <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                <h3 style="margin-bottom: 15px; color: #1a1a2e; font-size: 1.1rem;">📝 Character Counter</h3>
                <p style="font-size: 0.85rem; color: #666; margin-bottom: 10px;">Type in the field below to see real-time character counting</p>
                <input type="text" id="charInput" placeholder="Type something..." style="width: 100%; padding: 10px; border: 2px solid #ddd; border-radius: 8px; font-size: 0.95rem; transition: border-color 0.3s ease;">
                <div id="charDisplay" style="font-size: 0.9rem; color: #888; margin-top: 8px;">Characters: 0</div>
                <div style="font-size: 0.75rem; color: #999; margin-top: 5px;">Min 3 characters required</div>
            </div>
            
            <!-- Dynamic List -->
            <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                <h3 style="margin-bottom: 15px; color: #1a1a2e; font-size: 1.1rem;">📋 Dynamic List</h3>
                <p style="font-size: 0.85rem; color: #666; margin-bottom: 10px;">Add items and delete them individually</p>
                <div style="display: flex; gap: 10px; margin-bottom: 10px;">
                    <input type="text" id="itemInput" placeholder="Enter item..." style="flex: 1; padding: 10px; border: 2px solid #ddd; border-radius: 8px; font-size: 0.95rem; transition: border-color 0.3s ease;">
                    <button id="addItemBtn" class="btn btn-success" style="white-space: nowrap; padding: 10px 20px;">Add</button>
                </div>
                <ul id="dynamicList" style="list-style: none; padding: 0; margin: 10px 0 0; min-height: 50px; max-height: 200px; overflow-y: auto;"></ul>
                <div style="font-size: 0.75rem; color: #999; margin-top: 5px;">Press Enter to add</div>
            </div>
        </div>
        
        <!-- Row 2: Toggle & Counter -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; max-width: 1000px; margin: 20px auto 0;">
            
            <!-- Toggle Visibility -->
            <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                <h3 style="margin-bottom: 15px; color: #1a1a2e; font-size: 1.1rem;">🔄 Toggle Visibility</h3>
                <p style="font-size: 0.85rem; color: #666; margin-bottom: 10px;">Show/Hide the box below with a button</p>
                <div id="toggleBox" style="background: #f0f4f8; padding: 20px; border-radius: 8px; text-align: center; margin-bottom: 10px; transition: all 0.3s ease; border: 2px dashed #ccc;">
                    📦 This box can be hidden!
                </div>
                <button id="toggleBtn" class="btn btn-danger" style="width: 100%;">Hide Box</button>
            </div>
            
            <!-- Counter -->
            <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                <h3 style="margin-bottom: 15px; color: #1a1a2e; font-size: 1.1rem;">🔢 Counter</h3>
                <p style="font-size: 0.85rem; color: #666; margin-bottom: 10px;">Click to increment, colors change at 5 and 10</p>
                <div style="text-align: center; padding: 10px 0;">
                    <span id="counterDisplay" style="font-size: 3rem; font-weight: bold; color: #2ecc71; transition: all 0.3s ease;">0</span>
                </div>
                <div style="display: flex; gap: 10px;">
                    <button id="counterBtn" class="btn btn-primary" style="flex: 1;">➕ Increment</button>
                    <button id="resetBtn" class="btn btn-secondary" style="flex: 1;">🔄 Reset All</button>
                </div>
                <div style="font-size: 0.75rem; color: #999; margin-top: 10px; text-align: center;">
                    Reset all: counter, list, input, toggle box
                </div>
            </div>
        </div>
        
        <!-- Row 3: Dynamic Cards -->
        <div style="max-width: 1000px; margin: 30px auto 0; background: white; padding: 25px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <h3 style="margin-bottom: 15px; color: #1a1a2e; font-size: 1.1rem;">🎴 Dynamic Cards (Created with JavaScript)</h3>
            <p style="font-size: 0.85rem; color: #666; margin-bottom: 15px;">These cards are created dynamically using document.createElement()</p>
            <div id="cardContainer" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;"></div>
        </div>
        
        <!-- Console Instructions -->
        <div style="max-width: 1000px; margin: 20px auto 0; background: #1a1a2e; color: #fff; padding: 20px 25px; border-radius: 12px;">
            <h4 style="color: #00d2ff; margin-bottom: 10px; font-size: 1rem;">💡 Open Console (F12) to see:</h4>
            <ul style="list-style: none; padding: 0; font-size: 0.85rem; opacity: 0.9; display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 5px;">
                <li style="padding: 4px 0;">✅ DOM selection methods</li>
                <li style="padding: 4px 0;">✅ Element modification</li>
                <li style="padding: 4px 0;">✅ Dynamic element creation</li>
                <li style="padding: 4px 0;">✅ DOM traversal</li>
                <li style="padding: 4px 0;">✅ Event listeners</li>
                <li style="padding: 4px 0;">✅ Console helpers</li>
            </ul>
            <div style="margin-top: 10px; padding-top: 10px; border-top: 1px solid rgba(255,255,255,0.1); font-size: 0.8rem; color: #888;">
                💡 Try in console: <code style="color: #00d2ff;">$(".card")</code> or <code style="color: #00d2ff;">$$("p")</code>
            </div>
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