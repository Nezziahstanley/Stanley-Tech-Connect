<?php
// Header include - Used across all pages
$current_page = basename($_SERVER['PHP_SELF']);
?>
<header>
    <div class="header-container">
        <div class="logo">
            <a href="index.php">
                <img src="assets/images/logo.png" alt="Stanley Tech Connect">
                <span>STC</span>
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="index.php" <?php echo ($current_page == 'index.php') ? 'class="active"' : ''; ?>>Home</a></li>
                <li><a href="about.php" <?php echo ($current_page == 'about.php') ? 'class="active"' : ''; ?>>About</a></li>
                <li><a href="services.php" <?php echo ($current_page == 'services.php') ? 'class="active"' : ''; ?>>Services</a></li>
                <li><a href="courses.php" <?php echo ($current_page == 'courses.php') ? 'class="active"' : ''; ?>>Courses</a></li>
                <li><a href="contact.php" <?php echo ($current_page == 'contact.php') ? 'class="active"' : ''; ?>>Contact</a></li>
                <li><a href="register.php" class="btn-nav">Register</a></li>
                <li><a href="login.php" class="btn-nav">Login</a></li>
            </ul>
        </nav>
    </div>
</header>