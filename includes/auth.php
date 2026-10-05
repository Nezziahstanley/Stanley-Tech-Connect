<?php
// ========================================
// AUTHENTICATION CHECK
// ========================================
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// If not logged in, redirect to login
if (!isset($_SESSION['user_id'])) {
    header("Location: " . BASE_URL . "login.php");
    exit();
}
?>