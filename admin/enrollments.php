<?php
$admin_page_title = 'Enrollments';
require_once 'includes/admin-header.php';

$enrollments = $pdo->query("
    SELECT e.id, e.enrolled_at, u.name AS user_name, u.email, c.title AS course_title, c.icon, c.level
    FROM enrollments e
    JOIN users u ON e.user_id = u.id
    JOIN courses c ON e.course_id = c.id
    ORDER BY e.enrolled_at DESC
")->fetchAll();
?>

<?php require_once 'includes/admin-sidebar.php'; ?>

<div class="admin-main">
    <div class="page-header-admin">
        <div>
            <h1>Enrollments</h1>
            <p>Total: <?php echo count($enrollments); ?> enrollments</p>
        </div>
        <div class="header-actions">
            <input type="text" id="tableSearch" placeholder="🔍 Search..."
                   style="padding:10px 16px; border:2px solid #e2e8f0; border-radius:8px; font-size:0.9rem;">
        </div>
    </div>
    
    <div class="content-card">
        <div class="card-body" style="padding:0;">
            <?php if (empty($enrollments)): ?>
                <div class="empty-state">
                    <div class="empty-state-icon">📝</div>
                    <h3>No enrollments yet</h3>
                    <p>When users enroll in courses, they'll appear here.</p>
                </div>
            <?php else: ?>
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Course</th>
                            <th>Level</th>
                            <th>Enrolled</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($enrollments as $e): ?>
                            <tr>
                                <td>
                                    <div class="user-cell">
                                        <div class="user-avatar-sm"><?php echo strtoupper(substr($e['user_name'], 0, 1)); ?></div>
                                        <div class="user-info">
                                            <span class="user-name"><?php echo htmlspecialchars($e['user_name']); ?></span>
                                            <span class="user-email"><?php echo htmlspecialchars($e['email']); ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo $e['icon']; ?> <?php echo htmlspecialchars($e['course_title']); ?></td>
                                <td><span class="badge badge-primary"><?php echo $e['level']; ?></span></td>
                                <td><?php echo date('M j, Y', strtotime($e['enrolled_at'])); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once 'includes/admin-footer.php'; ?>