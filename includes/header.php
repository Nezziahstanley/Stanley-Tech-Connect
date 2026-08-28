<?php
// Header include file - will be used across all pages
// This will be fully implemented on Day 5
?>
<header>
    <div class="header-container">
        <div class="logo">
            <a href="index.php">
                <h1>STC</h1>
            </a>
        </div>
        <nav>
            <ul class="nav-menu">
                <li><a href="index.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'class="active"' : ''; ?>>Home</a></li>
                <li><a href="about.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'about.php') ? 'class="active"' : ''; ?>>About</a></li>
                <li><a href="services.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'services.php') ? 'class="active"' : ''; ?>>Services</a></li>
                <li><a href="courses.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'courses.php') ? 'class="active"' : ''; ?>>Courses</a></li>
                <li><a href="contact.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'class="active"' : ''; ?>>Contact</a></li>
                <li><a href="register.php" class="btn-nav">Register</a></li>
                <li><a href="login.php" class="btn-nav">Login</a></li>
            </ul>
        </nav>
    </div>
</header>