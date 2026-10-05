<aside class="admin-sidebar" id="adminSidebar">
    <div class="sidebar-brand">
        <div class="brand-logo">STC</div>
        <div class="brand-info">
            <span class="brand-name">Stanley Tech</span>
            <span class="brand-sub">Admin Panel</span>
        </div>
    </div>
    
    <nav class="sidebar-nav">
        <span class="nav-section-title">Main</span>
        
        <a href="index.php" class="nav-item <?php echo $current_page == 'index.php' ? 'active' : ''; ?>">
            <span class="nav-icon">📊</span>
            <span class="nav-label">Dashboard</span>
        </a>
        
        <a href="users.php" class="nav-item <?php echo $current_page == 'users.php' ? 'active' : ''; ?>">
            <span class="nav-icon">👥</span>
            <span class="nav-label">Users</span>
            <?php
            $user_count = $pdo->query("SELECT COUNT(*) FROM users WHERE role='user'")->fetchColumn();
            if ($user_count > 0): ?>
                <span class="nav-badge"><?php echo $user_count; ?></span>
            <?php endif; ?>
        </a>
        
        <a href="courses.php" class="nav-item <?php echo $current_page == 'courses.php' ? 'active' : ''; ?>">
            <span class="nav-icon">📚</span>
            <span class="nav-label">Courses</span>
            <?php
            $course_count = $pdo->query("SELECT COUNT(*) FROM courses")->fetchColumn();
            ?>
            <span class="nav-badge"><?php echo $course_count; ?></span>
        </a>
        
        <a href="enrollments.php" class="nav-item <?php echo $current_page == 'enrollments.php' ? 'active' : ''; ?>">
            <span class="nav-icon">📝</span>
            <span class="nav-label">Enrollments</span>
        </a>
        
        <a href="messages.php" class="nav-item <?php echo $current_page == 'messages.php' ? 'active' : ''; ?>">
            <span class="nav-icon">✉️</span>
            <span class="nav-label">Messages</span>
            <?php
            $unread = $pdo->query("SELECT COUNT(*) FROM messages WHERE is_read=0")->fetchColumn();
            if ($unread > 0): ?>
                <span class="nav-badge badge-danger"><?php echo $unread; ?></span>
            <?php endif; ?>
        </a>
        
        <span class="nav-section-title">System</span>
        
        <a href="settings.php" class="nav-item <?php echo $current_page == 'settings.php' ? 'active' : ''; ?>">
            <span class="nav-icon">⚙️</span>
            <span class="nav-label">Settings</span>
        </a>
        
        <a href="../index.php" class="nav-item" target="_blank">
            <span class="nav-icon">🌐</span>
            <span class="nav-label">View Site</span>
        </a>
    </nav>
    
    <div class="sidebar-footer">
        <a href="../logout.php" class="logout-btn">
            <span>🚪</span>
            <span>Logout</span>
        </a>
    </div>
</aside>