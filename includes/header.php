<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$current_page = basename($_SERVER['PHP_SELF']);
$is_logged_in = isset($_SESSION['user_id']);
$user_name = $_SESSION['user_name'] ?? '';
$user_role = $_SESSION['user_role'] ?? '';
$user_avatar = $_SESSION['user_avatar'] ?? '';

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
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header>
    <div class="header-container">
        <div class="logo">
            <a href="index.php">
                <img src="assets/images/logo.png" alt="STC" onerror="this.style.display='none'">
                <span class="brand-text">STC</span>
            </a>
        </div>
        
        <button class="mobile-toggle" id="mobileToggle" aria-label="Menu">
            <span></span><span></span><span></span>
        </button>
        
        <nav id="mainNav">
            <ul>
                <?php foreach ($nav_links as $page => $label): ?>
                    <li>
                        <a href="<?php echo $page; ?>" class="<?php echo ($current_page == $page) ? 'active' : ''; ?>">
                            <?php echo $label; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
                
                <?php if ($is_logged_in): ?>
                    <li><a href="dashboard.php" class="<?php echo ($current_page == 'dashboard.php') ? 'active' : ''; ?>">Dashboard</a></li>
                    <?php if ($user_role === 'admin'): ?>
                        <li><a href="admin/index.php">Admin</a></li>
                    <?php endif; ?>
                    <li>
                        <a href="profile.php" class="nav-profile <?php echo ($current_page == 'profile.php') ? 'active' : ''; ?>">
                            <?php if ($user_avatar && file_exists($user_avatar)): ?>
                                <img src="<?php echo htmlspecialchars($user_avatar); ?>" alt="Avatar" class="nav-avatar">
                            <?php else: ?>
                                <span class="nav-avatar-placeholder"><?php echo strtoupper(substr($user_name, 0, 1)); ?></span>
                            <?php endif; ?>
                            <span class="nav-name"><?php echo htmlspecialchars(explode(' ', $user_name)[0]); ?></span>
                        </a>
                    </li>
                    <li><a href="logout.php" class="btn-nav">Logout</a></li>
                <?php else: ?>
                    <li><a href="register.php" class="btn-nav <?php echo ($current_page == 'register.php') ? 'active' : ''; ?>">Register</a></li>
                    <li><a href="login.php" class="btn-nav <?php echo ($current_page == 'login.php') ? 'active' : ''; ?>">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

<main>