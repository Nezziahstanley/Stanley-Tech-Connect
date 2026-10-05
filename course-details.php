<?php
require_once 'config/database.php';
session_start();

$id = (int)($_GET['id'] ?? 0);
$stmt = $pdo->prepare("SELECT * FROM courses WHERE id = ?");
$stmt->execute([$id]);
$course = $stmt->fetch();

if (!$course) {
    header("Location: courses.php");
    exit();
}

$page_title = $course['title'] . " - Stanley Tech Connect";
include 'includes/header.php';
?>

<section class="page-header">
    <div class="container text-center">
        <h1><?php echo htmlspecialchars($course['title']); ?></h1>
        <p><?php echo $course['level']; ?> • <?php echo $course['duration']; ?></p>
    </div>
</section>

<section class="section-padding">
    <div class="container" style="max-width: 800px;">
        <div class="card" style="text-align: left; padding: 40px;">
            <div style="font-size: 4rem; margin-bottom: 20px; text-align: center;"><?php echo $course['icon']; ?></div>
            <h2>Course Description</h2>
            <p style="margin: 20px 0; font-size: 1.05rem;"><?php echo nl2br(htmlspecialchars($course['description'])); ?></p>
            
            <h3 style="margin-top: 30px;">Course Details</h3>
            <ul style="margin-top: 15px; list-style: none; padding: 0;">
                <li style="padding: 8px 0;">📊 <strong>Level:</strong> <?php echo $course['level']; ?></li>
                <li style="padding: 8px 0;">📅 <strong>Duration:</strong> <?php echo $course['duration']; ?></li>
                <li style="padding: 8px 0;">💰 <strong>Price:</strong> ₦<?php echo number_format($course['price'], 2); ?></li>
            </ul>
            
            <div style="margin-top: 30px;">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <form method="POST" action="enroll.php">
                        <input type="hidden" name="course_id" value="<?php echo $course['id']; ?>">
                        <button type="submit" class="btn btn-primary btn-lg">Enroll Now</button>
                    </form>
                <?php else: ?>
                    <a href="login.php" class="btn btn-primary btn-lg">Login to Enroll</a>
                <?php endif; ?>
                <a href="courses.php" class="btn btn-secondary btn-lg">Back to Courses</a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>