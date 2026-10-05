<?php
require_once 'config/database.php';
require_once 'includes/auth.php';

$user_id = $_SESSION['user_id'];
$course_id = (int)($_POST['course_id'] ?? 0);

if ($course_id <= 0) {
    header("Location: courses.php");
    exit();
}

// Verify course exists
$stmt = $pdo->prepare("SELECT id FROM courses WHERE id = ?");
$stmt->execute([$course_id]);
if (!$stmt->fetch()) {
    header("Location: courses.php");
    exit();
}

// Check if already enrolled
$stmt = $pdo->prepare("SELECT id FROM enrollments WHERE user_id = ? AND course_id = ?");
$stmt->execute([$user_id, $course_id]);

if ($stmt->fetch()) {
    header("Location: courses.php?success=Already enrolled");
    exit();
}

// Insert enrollment
$stmt = $pdo->prepare("INSERT INTO enrollments (user_id, course_id) VALUES (?, ?)");
$stmt->execute([$user_id, $course_id]);

header("Location: courses.php?success=Enrolled successfully!");
exit();
?>