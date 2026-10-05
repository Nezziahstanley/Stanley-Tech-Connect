<?php
require_once 'config/database.php';
require_once 'includes/auth.php';

$page_title = "My Courses - Stanley Tech Connect";
$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("
    SELECT c.*, e.enrolled_at 
    FROM enrollments e 
    JOIN courses c ON e.course_id = c.id 
    WHERE e.user_id = ? 
    ORDER BY e.enrolled_at DESC
");
$stmt->execute([$user_id]);
$courses = $stmt->fetchAll();

include 'includes/header.php';
?>

<section class="page-header">
    <div class="container text-center">
        <h1>My Courses</h1>
        <p>All courses you're enrolled in</p>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <?php if (empty($courses)): ?>
            <div class="card" style="text-align: center; padding: 40px;">
                <p>No enrollments yet.</p>
                <a href="courses.php" class="btn btn-primary" style="margin-top: 15px;">Browse Courses</a>
            </div>
        <?php else: ?>
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
                                <span>✅ Enrolled <?php echo date('M j, Y', strtotime($c['enrolled_at'])); ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>