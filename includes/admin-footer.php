</div><!-- .admin-layout -->

<!-- TOP BAR (Desktop) -->
<div class="admin-topbar-desktop">
    <div class="topbar-left">
        <button class="sidebar-collapse-btn" id="sidebarCollapseBtn" title="Collapse sidebar">
            <span></span><span></span><span></span>
        </button>
        <h2 class="topbar-page-title"><?php echo $admin_page_title ?? 'Dashboard'; ?></h2>
    </div>
    
    <div class="topbar-right">
        <!-- Theme Toggle -->
        <button class="topbar-btn" id="themeToggle" title="Toggle theme">
            <span class="theme-icon">🌙</span>
        </button>
        
        <!-- Color Picker Toggle -->
        <div class="color-picker-wrap">
            <button class="topbar-btn" id="colorToggle" title="Change theme color">
                🎨
            </button>
            <div class="color-picker-dropdown" id="colorPicker">
                <span class="color-option" data-accent="cyan" style="background: linear-gradient(135deg, #00d2ff, #3a7bd5);" title="Cyan"></span>
                <span class="color-option" data-accent="purple" style="background: linear-gradient(135deg, #a78bfa, #8b5cf6);" title="Purple"></span>
                <span class="color-option" data-accent="green" style="background: linear-gradient(135deg, #34d399, #10b981);" title="Green"></span>
                <span class="color-option" data-accent="orange" style="background: linear-gradient(135deg, #fbbf24, #f59e0b);" title="Orange"></span>
                <span class="color-option" data-accent="pink" style="background: linear-gradient(135deg, #f472b6, #ec4899);" title="Pink"></span>
                <span class="color-option" data-accent="red" style="background: linear-gradient(135deg, #f87171, #ef4444);" title="Red"></span>
            </div>
        </div>
        
        <!-- Notifications -->
        <button class="topbar-btn has-notification" title="Notifications">
            🔔
            <span class="notification-dot"></span>
        </button>
        
        <!-- Profile Dropdown -->
        <div class="profile-dropdown-wrap">
            <button class="profile-dropdown-btn" id="profileDropdownBtn">
                <span class="user-avatar-sm"><?php echo strtoupper(substr($admin_name, 0, 1)); ?></span>
                <span class="user-name-top"><?php echo htmlspecialchars(explode(' ', $admin_name)[0]); ?></span>
                <span class="dropdown-arrow">▼</span>
            </button>
            
            <div class="profile-dropdown" id="profileDropdown">
                <div class="dropdown-header">
                    <span class="user-avatar-lg"><?php echo strtoupper(substr($admin_name, 0, 1)); ?></span>
                    <div>
                        <strong><?php echo htmlspecialchars($admin_name); ?></strong>
                        <small><?php echo htmlspecialchars($admin_email); ?></small>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a href="settings.php" class="dropdown-item">
                    <span>👤</span> My Profile
                </a>
                <a href="settings.php#appearance" class="dropdown-item">
                    <span>🎨</span> Appearance
                </a>
                <a href="settings.php#security" class="dropdown-item">
                    <span>🔒</span> Security
                </a>
                <div class="dropdown-divider"></div>
                <a href="../logout.php" class="dropdown-item text-danger">
                    <span>🚪</span> Logout
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Topbar -->
<div class="admin-topbar">
    <button class="sidebar-toggle" id="sidebarToggle">
        <span></span><span></span><span></span>
    </button>
    <div class="topbar-brand">
        <span class="brand-dot"></span>
        <span>STC Admin</span>
    </div>
    <div class="topbar-right-mobile">
        <button class="topbar-btn" onclick="toggleTheme()">🌙</button>
        <span class="user-avatar"><?php echo strtoupper(substr($admin_name, 0, 1)); ?></span>
    </div>
</div>

<!-- Toast Container -->
<div class="toast-container" id="toastContainer"></div>

<script src="assets/admin-script.js"></script>
</body>
</html>