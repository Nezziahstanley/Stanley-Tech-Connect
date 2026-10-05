<?php
$admin_page_title = 'Settings';
require_once 'includes/admin-header.php';

$msg = '';
$msg_type = 'success';

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    
    if (strlen($name) >= 2 && preg_match('/^[0-9]{10,15}$/', $phone)) {
        $stmt = $pdo->prepare("UPDATE users SET name = ?, phone = ? WHERE id = ?");
        $stmt->execute([$name, $phone, $_SESSION['user_id']]);
        $_SESSION['user_name'] = $name;
        $msg = 'Profile updated successfully!';
    } else {
        $msg = 'Invalid name or phone.';
        $msg_type = 'error';
    }
}

// Handle password change
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_password'])) {
    $current = $_POST['current_password'];
    $new = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];
    
    $stmt = $pdo->prepare("SELECT password FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch();
    
    if (!password_verify($current, $user['password'])) {
        $msg = 'Current password is incorrect.';
        $msg_type = 'error';
    } elseif (strlen($new) < 8) {
        $msg = 'New password must be at least 8 characters.';
        $msg_type = 'error';
    } elseif ($new !== $confirm) {
        $msg = 'Passwords do not match.';
        $msg_type = 'error';
    } else {
        $hash = password_hash($new, PASSWORD_DEFAULT);
        $pdo->prepare("UPDATE users SET password = ? WHERE id = ?")->execute([$hash, $_SESSION['user_id']]);
        $msg = 'Password changed successfully!';
    }
}

// Get admin user
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$admin = $stmt->fetch();
?>

<?php require_once 'includes/admin-sidebar.php'; ?>

<div class="admin-main">
    <div class="page-header-admin">
        <div>
            <h1>Settings</h1>
            <p>Manage your account and site preferences</p>
        </div>
    </div>
    
    <?php if ($msg): ?>
        <div class="toast <?php echo $msg_type; ?>" style="position:relative; margin-bottom:20px;">
            <span class="toast-icon"><?php echo $msg_type === 'success' ? '✅' : '❌'; ?></span>
            <span class="toast-message"><?php echo htmlspecialchars($msg); ?></span>
        </div>
    <?php endif; ?>
    
    <div class="settings-grid">
        
        <!-- Profile Settings -->
        <div class="settings-section">
            <h3>👤 Profile Information</h3>
            <form method="POST">
                <div class="admin-form-group">
                    <label>Full Name</label>
                    <input type="text" name="name" value="<?php echo htmlspecialchars($admin['name']); ?>" required>
                </div>
                <div class="admin-form-group">
                    <label>Email (read-only)</label>
                    <input type="email" value="<?php echo htmlspecialchars($admin['email']); ?>" disabled>
                </div>
                <div class="admin-form-group">
                    <label>Phone</label>
                    <input type="tel" name="phone" value="<?php echo htmlspecialchars($admin['phone']); ?>" required>
                </div>
                <button type="submit" name="update_profile" class="btn btn-primary">💾 Save Profile</button>
            </form>
        </div>
        
        <!-- Security -->
        <div class="settings-section" id="security">
            <h3>🔒 Change Password</h3>
            <form method="POST">
                <div class="admin-form-group">
                    <label>Current Password</label>
                    <input type="password" name="current_password" required>
                </div>
                <div class="admin-form-group">
                    <label>New Password</label>
                    <input type="password" name="new_password" required minlength="8">
                </div>
                <div class="admin-form-group">
                    <label>Confirm New Password</label>
                    <input type="password" name="confirm_password" required minlength="8">
                </div>
                <button type="submit" name="change_password" class="btn btn-primary">🔑 Update Password</button>
            </form>
        </div>
        
        <!-- Appearance -->
        <div class="settings-section" id="appearance">
            <h3>🎨 Appearance</h3>
            
            <div class="setting-item">
                <div>
                    <div class="setting-label">Dark Mode</div>
                    <div class="setting-desc">Switch between light and dark theme</div>
                </div>
                <div class="toggle-switch" id="darkModeToggle"></div>
            </div>
            
            <div class="setting-item" style="flex-direction: column; align-items: flex-start; gap: 12px;">
                <div>
                    <div class="setting-label">Theme Color</div>
                    <div class="setting-desc">Choose your accent color</div>
                </div>
                <div style="display:flex; gap:10px; flex-wrap:wrap;">
                    <span class="color-option" data-accent="cyan" style="background: linear-gradient(135deg, #00d2ff, #3a7bd5); width:36px; height:36px; border-radius:50%; cursor:pointer; box-shadow:0 2px 6px rgba(0,0,0,0.15);"></span>
                    <span class="color-option" data-accent="purple" style="background: linear-gradient(135deg, #a78bfa, #8b5cf6); width:36px; height:36px; border-radius:50%; cursor:pointer; box-shadow:0 2px 6px rgba(0,0,0,0.15);"></span>
                    <span class="color-option" data-accent="green" style="background: linear-gradient(135deg, #34d399, #10b981); width:36px; height:36px; border-radius:50%; cursor:pointer; box-shadow:0 2px 6px rgba(0,0,0,0.15);"></span>
                    <span class="color-option" data-accent="orange" style="background: linear-gradient(135deg, #fbbf24, #f59e0b); width:36px; height:36px; border-radius:50%; cursor:pointer; box-shadow:0 2px 6px rgba(0,0,0,0.15);"></span>
                    <span class="color-option" data-accent="pink" style="background: linear-gradient(135deg, #f472b6, #ec4899); width:36px; height:36px; border-radius:50%; cursor:pointer; box-shadow:0 2px 6px rgba(0,0,0,0.15);"></span>
                    <span class="color-option" data-accent="red" style="background: linear-gradient(135deg, #f87171, #ef4444); width:36px; height:36px; border-radius:50%; cursor:pointer; box-shadow:0 2px 6px rgba(0,0,0,0.15);"></span>
                </div>
            </div>
            
            <div class="setting-item">
                <div>
                    <div class="setting-label">Sidebar Collapsed</div>
                    <div class="setting-desc">Start with sidebar minimized</div>
                </div>
                <div class="toggle-switch" id="sidebarToggleSetting"></div>
            </div>
        </div>
        
        <!-- System Info -->
        <div class="settings-section">
            <h3>ℹ️ System Information</h3>
            
            <div class="setting-item">
                <div class="setting-label">PHP Version</div>
                <div><?php echo phpversion(); ?></div>
            </div>
            
            <div class="setting-item">
                <div class="setting-label">Database</div>
                <div><?php echo DB_NAME; ?></div>
            </div>
            
            <div class="setting-item">
                <div class="setting-label">Account Role</div>
                <div><span class="badge badge-danger"><?php echo htmlspecialchars($admin['role']); ?></span></div>
            </div>
            
            <div class="setting-item">
                <div class="setting-label">Member Since</div>
                <div><?php echo date('F j, Y', strtotime($admin['created_at'])); ?></div>
            </div>
        </div>
        
        <!-- Danger Zone -->
        <div class="settings-section" style="border-left: 4px solid var(--danger);">
            <h3 style="color: var(--danger);">⚠️ Danger Zone</h3>
            
            <div class="setting-item">
                <div>
                    <div class="setting-label">Clear Local Settings</div>
                    <div class="setting-desc">Reset theme, color, and sidebar preferences</div>
                </div>
                <button class="btn btn-danger btn-sm" onclick="if(confirm('Reset all local preferences?')){ localStorage.clear(); location.reload(); }">Reset</button>
            </div>
            
            <div class="setting-item">
                <div>
                    <div class="setting-label">Logout Everywhere</div>
                    <div class="setting-desc">Sign out from this device</div>
                </div>
                <a href="../logout.php" class="btn btn-danger btn-sm">Logout</a>
            </div>
        </div>
        
    </div>
</div>

<script>
// ========================================
// SETTINGS PAGE SCRIPTS
// ========================================
document.addEventListener('DOMContentLoaded', function() {
    
    // Dark Mode Toggle
    const darkToggle = document.getElementById('darkModeToggle');
    if (darkToggle) {
        if (document.body.getAttribute('data-theme') === 'dark') {
            darkToggle.classList.add('active');
        }
        darkToggle.addEventListener('click', function() {
            this.classList.toggle('active');
            const newTheme = this.classList.contains('active') ? 'dark' : 'light';
            document.body.setAttribute('data-theme', newTheme);
            localStorage.setItem('stc_theme', newTheme);
            showToast(`${newTheme === 'dark' ? '🌙 Dark' : '☀️ Light'} mode activated`, 'success');
        });
    }
    
    // Sidebar Collapsed Toggle
    const sidebarToggle = document.getElementById('sidebarToggleSetting');
    if (sidebarToggle) {
        if (localStorage.getItem('stc_sidebar_collapsed') === 'true') {
            sidebarToggle.classList.add('active');
        }
        sidebarToggle.addEventListener('click', function() {
            this.classList.toggle('active');
            const collapsed = this.classList.contains('active');
            localStorage.setItem('stc_sidebar_collapsed', collapsed);
            document.body.classList.toggle('sidebar-collapsed', collapsed);
        });
    }
    
    // Color Options in Settings
    document.querySelectorAll('.settings-section .color-option').forEach(opt => {
        const accent = opt.getAttribute('data-accent');
        const current = localStorage.getItem('stc_accent') || 'cyan';
        if (accent === current) {
            opt.style.border = '3px solid var(--text-primary)';
        }
        
        opt.addEventListener('click', function() {
            const newAccent = this.getAttribute('data-accent');
            document.body.setAttribute('data-accent', newAccent);
            localStorage.setItem('stc_accent', newAccent);
            
            document.querySelectorAll('.settings-section .color-option').forEach(o => {
                o.style.border = 'none';
            });
            this.style.border = '3px solid var(--text-primary)';
            
            showToast(`${newAccent.charAt(0).toUpperCase() + newAccent.slice(1)} theme applied!`, 'success');
        });
    });
});
</script>

<?php require_once 'includes/admin-footer.php'; ?>