<?php
// ========================================
// HEADER - Reusable Header Component
// Used across all pages
// ========================================

// Get current page name for active link detection
$current_page = basename($_SERVER['PHP_SELF']);

// Check if user is logged in (for later use)
// session_start() will be handled in auth.php
$is_logged_in = isset($_SESSION['user_id']);
$user_name = $_SESSION['user_name'] ?? '';
$user_role = $_SESSION['user_role'] ?? '';

// Define navigation links
$nav_links = [
    'index.php' => 'Home',
    'about.php' => 'About',
    'services.php' => 'Services',
    'courses.php' => 'Courses',
    'contact.php' => 'Contact'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'Stanley Tech Connect'; ?></title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicon.ico" type="image/x-icon">
    
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- Meta Description (for SEO) -->
    <?php if (isset($meta_description)): ?>
        <meta name="description" content="<?php echo htmlspecialchars($meta_description); ?>">
    <?php endif; ?>
    
    <!-- Additional Head Content -->
    <?php if (isset($extra_head)): ?>
        <?php echo $extra_head; ?>
    <?php endif; ?>
</head>
<body>
    <header>
        <div class="header-container">
            <!-- Logo -->
            <div class="logo">
                <a href="index.php">
                    <img src="assets/images/logo.png" alt="Stanley Tech Connect" onerror="this.style.display='none'">
                    <span class="brand-text">STC</span>
                </a>
            </div>
            
            <!-- Navigation -->
            <nav id="mainNav" role="navigation" aria-label="Main Navigation">
                <ul>
                    <?php foreach ($nav_links as $page => $label): ?>
                        <li>
                            <a href="<?php echo $page; ?>" 
                               class="<?php echo ($current_page == $page) ? 'active' : ''; ?>">
                                <?php echo $label; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    
                    <?php if ($is_logged_in): ?>
                        <!-- Logged In Menu -->
                        <li>
                            <a href="dashboard.php" class="<?php echo ($current_page == 'dashboard.php') ? 'active' : ''; ?>">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="profile.php" class="<?php echo ($current_page == 'profile.php') ? 'active' : ''; ?>">
                                <?php echo htmlspecialchars($user_name); ?>
                            </a>
                        </li>
                        <li>
                            <a href="logout.php" class="btn-nav">Logout</a>
                        </li>
                    <?php else: ?>
                        <!-- Logged Out Menu -->
                        <li>
                            <a href="register.php" class="btn-nav <?php echo ($current_page == 'register.php') ? 'active' : ''; ?>">
                                Register
                            </a>
                        </li>
                        <li>
                            <a href="login.php" class="btn-nav <?php echo ($current_page == 'login.php') ? 'active' : ''; ?>">
                                Login
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
            
            <!-- Mobile Menu Toggle -->
            <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>

    <main>