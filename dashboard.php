<?php
require_once 'config/database.php';
require_once 'includes/auth.php';

$page_title = "Dashboard - Stanley Tech Connect";
$user_id = $_SESSION['user_id'];

// Get user info
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

// Get enrollments
$stmt = $pdo->prepare("
    SELECT c.*, e.enrolled_at 
    FROM enrollments e 
    JOIN courses c ON e.course_id = c.id 
    WHERE e.user_id = ? 
    ORDER BY e.enrolled_at DESC
");
$stmt->execute([$user_id]);
$enrollments = $stmt->fetchAll();

// Count stats
$total_courses = count($enrollments);
$total_available = $pdo->query("SELECT COUNT(*) FROM courses")->fetchColumn();

include 'includes/header.php';
?>

<section class="page-header">
    <div class="container text-center">
        <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?>! 👋</h1>
        <p>Your learning dashboard</p>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <!-- Stats -->
        <div class="cards-grid" style="margin-bottom: 30px;">
            <div class="card" style="text-align: left;">
                <div style="font-size: 2rem;">📚</div>
                <h3><?php echo $total_courses; ?></h3>
                <p>Enrolled Courses</p>
            </div>
            <div class="card" style="text-align: left;">
                <div style="font-size: 2rem;">🎯</div>
                <h3><?php echo $total_available; ?></h3>
                <p>Available Courses</p>
            </div>
            <div class="card" style="text-align: left;">
                <div style="font-size: 2rem;">👤</div>
                <h3><?php echo htmlspecialchars($user['role']); ?></h3>
                <p>Account Type</p>
            </div>
        </div>
        
        <!-- Quick Actions -->
        <div style="display: flex; gap: 15px; flex-wrap: wrap; margin-bottom: 30px;">
            <a href="profile.php" class="btn btn-primary">Edit Profile</a>
            <a href="courses.php" class="btn btn-secondary">Browse Courses</a>
            <a href="my-courses.php" class="btn btn-success">My Courses</a>
        </div>
        
        <!-- Enrolled Courses -->
        <h2 class="section-title" style="text-align: left;">My <span class="highlight">Courses</span></h2>
        
        <?php if (empty($enrollments)): ?>
            <div class="card" style="text-align: center; padding: 40px;">
                <p>You haven't enrolled in any courses yet.</p>
                <a href="courses.php" class="btn btn-primary" style="margin-top: 15px;">Browse Courses</a>
            </div>
        <?php else: ?>
            <div class="cards-grid">
                <?php foreach ($enrollments as $course): ?>
                    <div class="course-card">
                        <div class="course-image"><?php echo $course['icon']; ?></div>
                        <div class="course-content">
                            <span class="course-tag badge-primary"><?php echo $course['level']; ?></span>
                            <h3><?php echo htmlspecialchars($course['title']); ?></h3>
                            <p><?php echo htmlspecialchars(substr($course['description'], 0, 80)) . '...'; ?></p>
                            <div class="course-meta">
                                <span>📅 <?php echo $course['duration']; ?></span>
                            </div>
                            <a href="course-details.php?id=<?php echo $course['id']; ?>" class="btn btn-primary btn-block">View Course</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>