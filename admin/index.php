<?php
$admin_page_title = 'Dashboard';
require_once 'includes/admin-header.php';

// Stats
$total_users = $pdo->query("SELECT COUNT(*) FROM users WHERE role='user'")->fetchColumn();
$total_courses = $pdo->query("SELECT COUNT(*) FROM courses")->fetchColumn();
$total_enrollments = $pdo->query("SELECT COUNT(*) FROM enrollments")->fetchColumn();
$total_messages = $pdo->query("SELECT COUNT(*) FROM messages WHERE is_read=0")->fetchColumn();

// NEW USERS - LAST 7 DAYS (for line chart)
$new_users_data = [];
$new_users_labels = [];
for ($i = 6; $i >= 0; $i--) {
    $date = date('Y-m-d', strtotime("-$i days"));
    $new_users_labels[] = date('D', strtotime($date));
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE DATE(created_at) = ?");
    $stmt->execute([$date]);
    $new_users_data[] = (int)$stmt->fetchColumn();
}

// ENROLLMENTS BY COURSE (for pie chart)
$enrollment_labels = [];
$enrollment_data = [];
$stmt = $pdo->query("
    SELECT c.title, COUNT(e.id) as count 
    FROM courses c 
    LEFT JOIN enrollments e ON c.id = e.course_id 
    GROUP BY c.id 
    ORDER BY count DESC
");
foreach ($stmt->fetchAll() as $row) {
    $enrollment_labels[] = $row['title'];
    $enrollment_data[] = (int)$row['count'];
}

// USER REGISTRATIONS LAST 30 DAYS (for bar chart)
$monthly_data = [];
$monthly_labels = [];
for ($i = 29; $i >= 0; $i -= 3) {
    $date = date('Y-m-d', strtotime("-$i days"));
    $end_date = date('Y-m-d', strtotime("-" . max(0, $i - 2) . " days"));
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE DATE(created_at) BETWEEN ? AND ?");
    $stmt->execute([$date, $end_date]);
    $monthly_labels[] = date('M j', strtotime($date));
    $monthly_data[] = (int)$stmt->fetchColumn();
}

// Recent data
$recent_users = $pdo->query("SELECT id, name, email, role, created_at FROM users ORDER BY created_at DESC LIMIT 5")->fetchAll();
$recent_enrollments = $pdo->query("
    SELECT u.name AS user_name, u.email, c.title AS course_title, c.icon, e.enrolled_at
    FROM enrollments e
    JOIN users u ON e.user_id = u.id
    JOIN courses c ON e.course_id = c.id
    ORDER BY e.enrolled_at DESC LIMIT 5
")->fetchAll();
?>

<?php require_once 'includes/admin-sidebar.php'; ?>

<div class="admin-main">

    <div class="page-header-admin">
        <div>
            <h1>Welcome back, <?php echo htmlspecialchars(explode(' ', $admin_name)[0]); ?>! 👋</h1>
            <p>Here's what's happening with your platform today.</p>
        </div>
        <div class="header-actions">
            <a href="courses.php" class="btn btn-primary">➕ Add Course</a>
            <a href="../index.php" target="_blank" class="btn btn-secondary">🌐 View Site</a>
        </div>
    </div>

    <!-- STATS -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">👥</div>
            <div class="stat-info">
                <div class="stat-value" data-count="<?php echo $total_users; ?>">0</div>
                <div class="stat-label">Total Users</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon purple">📚</div>
            <div class="stat-info">
                <div class="stat-value" data-count="<?php echo $total_courses; ?>">0</div>
                <div class="stat-label">Total Courses</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon green">📝</div>
            <div class="stat-info">
                <div class="stat-value" data-count="<?php echo $total_enrollments; ?>">0</div>
                <div class="stat-label">Enrollments</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon orange">✉️</div>
            <div class="stat-info">
                <div class="stat-value" data-count="<?php echo $total_messages; ?>">0</div>
                <div class="stat-label">Unread Messages</div>
            </div>
        </div>
    </div>

    <!-- CHARTS ROW 1 -->
    <div class="charts-grid">
        <div class="chart-card">
            <div class="chart-header">
                <h3 class="chart-title">User Registrations - Last 7 Days</h3>
            </div>
            <div class="chart-body">
                <canvas id="lineChart"></canvas>
            </div>
        </div>
        
        <div class="chart-card">
            <div class="chart-header">
                <h3 class="chart-title">Enrollments by Course</h3>
            </div>
            <div class="chart-body">
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div>

    <!-- CHARTS ROW 2 -->
    <div class="chart-card" style="margin-bottom: 32px;">
        <div class="chart-header">
            <h3 class="chart-title">Registration Trend - Last 30 Days</h3>
        </div>
        <div class="chart-body" style="height: 300px;">
            <canvas id="barChart"></canvas>
        </div>
    </div>

    <!-- RECENT TABLES -->
    <div class="content-grid" style="display:grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 24px;">
        <div class="content-card">
            <div class="card-header">
                <h3 class="card-title">Recent Users</h3>
                <a href="users.php" class="btn btn-sm btn-secondary">View All →</a>
            </div>
            <div class="card-body" style="padding:0;">
                <?php if (empty($recent_users)): ?>
                    <div style="padding:40px; text-align:center; color:var(--text-muted);">No users yet</div>
                <?php else: ?>
                    <table class="admin-table">
                        <tbody>
                            <?php foreach ($recent_users as $u): ?>
                                <tr>
                                    <td>
                                        <div class="user-cell">
                                            <div class="user-avatar-sm"><?php echo strtoupper(substr($u['name'], 0, 1)); ?></div>
                                            <div class="user-info">
                                                <span class="user-name"><?php echo htmlspecialchars($u['name']); ?></span>
                                                <span class="user-email"><?php echo htmlspecialchars($u['email']); ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="text-align:right;">
                                        <span class="badge <?php echo $u['role'] == 'admin' ? 'badge-danger' : 'badge-primary'; ?>">
                                            <?php echo $u['role']; ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="content-card">
            <div class="card-header">
                <h3 class="card-title">Recent Enrollments</h3>
                <a href="enrollments.php" class="btn btn-sm btn-secondary">View All →</a>
            </div>
            <div class="card-body" style="padding:0;">
                <?php if (empty($recent_enrollments)): ?>
                    <div style="padding:40px; text-align:center; color:var(--text-muted);">No enrollments yet</div>
                <?php else: ?>
                    <table class="admin-table">
                        <tbody>
                            <?php foreach ($recent_enrollments as $e): ?>
                                <tr>
                                    <td>
                                        <div style="display:flex; align-items:center; gap:10px;">
                                            <span style="font-size:1.5rem;"><?php echo $e['icon']; ?></span>
                                            <div class="user-info">
                                                <span class="user-name"><?php echo htmlspecialchars($e['user_name']); ?></span>
                                                <span class="user-email">enrolled in <?php echo htmlspecialchars($e['course_title']); ?></span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>

<script>
// ========================================
// CHART INITIALIZATION
// ========================================
document.addEventListener('DOMContentLoaded', function() {
    const accent = getComputedStyle(document.body).getPropertyValue('--accent').trim();
    const accentSecondary = getComputedStyle(document.body).getPropertyValue('--accent-secondary').trim();
    const textColor = getComputedStyle(document.body).getPropertyValue('--text-secondary').trim();
    const gridColor = getComputedStyle(document.body).getPropertyValue('--border-light').trim();
    
    window.stcCharts = {};
    
    // ============================================
    // LINE CHART - User Registrations
    // ============================================
    const lineCtx = document.getElementById('lineChart');
    if (lineCtx) {
        const gradient = lineCtx.getContext('2d').createLinearGradient(0, 0, 0, 300);
        gradient.addColorStop(0, accent + '60');
        gradient.addColorStop(1, accent + '00');
        
        window.stcCharts.line = new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($new_users_labels); ?>,
                datasets: [{
                    label: 'New Users',
                    data: <?php echo json_encode($new_users_data); ?>,
                    borderColor: accent,
                    backgroundColor: gradient,
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: accent,
                    pointBorderColor: '#fff',
                    pointBorderWidth: 3,
                    pointRadius: 6,
                    pointHoverRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#0f1729',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        padding: 12,
                        cornerRadius: 8,
                        displayColors: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { color: textColor, stepSize: 1 },
                        grid: { color: gridColor, drawBorder: false }
                    },
                    x: {
                        ticks: { color: textColor },
                        grid: { display: false }
                    }
                }
            }
        });
    }
    
    // ============================================
    // PIE CHART - Enrollments by Course
    // ============================================
    const pieCtx = document.getElementById('pieChart');
    if (pieCtx) {
        const colors = [
            accent,
            '#a78bfa',
            '#34d399',
            '#fbbf24',
            '#f472b6',
            '#f87171',
            '#60a5fa'
        ];
        
        window.stcCharts.pie = new Chart(pieCtx, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($enrollment_labels); ?>,
                datasets: [{
                    data: <?php echo json_encode($enrollment_data); ?>,
                    backgroundColor: colors,
                    borderWidth: 3,
                    borderColor: getComputedStyle(document.body).getPropertyValue('--bg-card').trim(),
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '60%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: textColor,
                            padding: 12,
                            font: { size: 11, weight: '600' },
                            boxWidth: 12,
                            boxHeight: 12,
                            usePointStyle: true,
                            pointStyle: 'circle'
                        }
                    },
                    tooltip: {
                        backgroundColor: '#0f1729',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        padding: 12,
                        cornerRadius: 8
                    }
                }
            }
        });
    }
    
    // ============================================
    // BAR CHART - Registration Trend
    // ============================================
    const barCtx = document.getElementById('barChart');
    if (barCtx) {
        const gradientBar = barCtx.getContext('2d').createLinearGradient(0, 0, 0, 300);
        gradientBar.addColorStop(0, accent);
        gradientBar.addColorStop(1, accentSecondary);
        
        window.stcCharts.bar = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($monthly_labels); ?>,
                datasets: [{
                    label: 'Registrations',
                    data: <?php echo json_encode($monthly_data); ?>,
                    backgroundColor: gradientBar,
                    borderRadius: 8,
                    borderSkipped: false,
                    barThickness: 40,
                    hoverBackgroundColor: accentSecondary
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#0f1729',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        padding: 12,
                        cornerRadius: 8,
                        displayColors: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { color: textColor, stepSize: 1 },
                        grid: { color: gridColor, drawBorder: false }
                    },
                    x: {
                        ticks: { color: textColor },
                        grid: { display: false }
                    }
                }
            }
        });
    }
});
</script>

<?php require_once 'includes/admin-footer.php'; ?>