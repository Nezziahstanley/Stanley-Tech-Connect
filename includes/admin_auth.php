<?php
// ========================================
// ADMIN AUTHENTICATION CHECK
// ========================================
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// If not logged in, redirect
if (!isset($_SESSION['user_id'])) {
    header("Location: " . BASE_URL . "login.php");
    exit();
}

// If not admin, deny access
if ($_SESSION['user_role'] !== 'admin') {
    header("Location: " . BASE_URL . "dashboard.php");
    exit();
}
?>