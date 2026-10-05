<?php
require_once 'config/database.php';
session_start();

$page_title = "Courses - Stanley Tech Connect";

$courses = $pdo->query("SELECT * FROM courses ORDER BY id ASC")->fetchAll();
$enrolled_ids = [];

if (isset($_SESSION['user_id'])) {
    $stmt = $pdo->prepare("SELECT course_id FROM enrollments WHERE user_id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $enrolled_ids = array_column($stmt->fetchAll(), 'course_id');
}

$success = $_GET['success'] ?? '';

include 'includes/header.php';
?>

<section class="page-header">
    <div class="container text-center">
        <h1>Our Courses</h1>
        <p>Choose from our comprehensive courses</p>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <?php if ($success): ?>
            <div class="validation-success"><strong>✅ <?php echo htmlspecialchars($success); ?></strong></div>
        <?php endif; ?>
        
        <div class="cards-grid">
            <?php foreach ($courses as $c): ?>
                <div class="course-card">
                    <div class="course-image"><?php echo $c['icon']; ?></div>
                    <div class="course-content">
                        <span class="course-tag badge-primary"><?php echo $c['level']; ?></span>
                        <h3><?php echo htmlspecialchars($c['title']); ?></h3>
                        <p><?php echo htmlspecialchars($c['description']); ?></p>
                        <div class="course-meta">
                            <span>📅 <?php echo $c['duration']; ?></span>
                        </div>
                        
                        <?php if (in_array($c['id'], $enrolled_ids)): ?>
                            <button class="btn btn-success btn-block" disabled>✅ Enrolled</button>
                        <?php elseif (isset($_SESSION['user_id'])): ?>
                            <form method="POST" action="enroll.php">
                                <input type="hidden" name="course_id" value="<?php echo $c['id']; ?>">
                                <button type="submit" class="btn btn-primary btn-block">Enroll Now</button>
                            </form>
                        <?php else: ?>
                            <a href="login.php" class="btn btn-primary btn-block">Login to Enroll</a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>