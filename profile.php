<?php
require_once 'config/database.php';
require_once 'includes/auth.php';

$page_title = "My Profile - Stanley Tech Connect";
$user_id = $_SESSION['user_id'];
$success = '';
$error = '';
$active_tab = $_GET['tab'] ?? 'profile';

// Ensure uploads directory
$upload_dir = __DIR__ . '/assets/uploads/avatars/';
if (!is_dir($upload_dir)) {
    @mkdir($upload_dir, 0755, true);
}

// ========================================
// HANDLE AVATAR UPLOAD
// ========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload_avatar'])) {
    if (!isset($_FILES['avatar']) || $_FILES['avatar']['error'] !== UPLOAD_ERR_OK) {
        $error = 'No file uploaded or upload error.';
    } else {
        $file = $_FILES['avatar'];
        $max_size = 2 * 1024 * 1024;
        
        if ($file['size'] > $max_size) {
            $error = 'File too large. Max 2MB allowed.';
        } else {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $file['tmp_name']);
            finfo_close($finfo);
            
            $allowed = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            if (!in_array($mime, $allowed)) {
                $error = 'Invalid file type. Only JPG, PNG, GIF, WEBP allowed.';
            } elseif (@getimagesize($file['tmp_name']) === false) {
                $error = 'File is not a valid image.';
            } else {
                $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                if (!in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) $ext = 'jpg';
                $filename = 'user_' . $user_id . '_' . time() . '.' . $ext;
                $filepath = $upload_dir . $filename;
                
                if (move_uploaded_file($file['tmp_name'], $filepath)) {
                    // Delete old avatar
                    $stmt = $pdo->prepare("SELECT avatar FROM users WHERE id = ?");
                    $stmt->execute([$user_id]);
                    $old = $stmt->fetchColumn();
                    if ($old && file_exists(__DIR__ . '/' . $old)) @unlink(__DIR__ . '/' . $old);
                    
                    // Save new
                    $avatar_path = 'assets/uploads/avatars/' . $filename;
                    $pdo->prepare("UPDATE users SET avatar = ? WHERE id = ?")->execute([$avatar_path, $user_id]);
                    $_SESSION['user_avatar'] = $avatar_path;
                    
                    $success = 'Avatar uploaded successfully!';
                    header("Location: profile.php?tab=profile&success=1");
                    exit();
                } else {
                    $error = 'Failed to save file.';
                }
            }
        }
    }
}

// ========================================
// HANDLE AVATAR DELETE
// ========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_avatar'])) {
    $stmt = $pdo->prepare("SELECT avatar FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    $avatar = $stmt->fetchColumn();
    
    if ($avatar && file_exists(__DIR__ . '/' . $avatar)) @unlink(__DIR__ . '/' . $avatar);
    
    $pdo->prepare("UPDATE users SET avatar = NULL WHERE id = ?")->execute([$user_id]);
    unset($_SESSION['user_avatar']);
    
    $success = 'Avatar removed.';
    header("Location: profile.php?tab=profile&success=2");
    exit();
}

// ========================================
// HANDLE PROFILE UPDATE
// ========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
    $name = trim($_POST['name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $bio = trim($_POST['bio'] ?? '');
    $location = trim($_POST['location'] ?? '');
    $website = trim($_POST['website'] ?? '');
    
    $errors = [];
    if (strlen($name) < 2) $errors[] = 'Name too short';
    if (!preg_match('/^[0-9]{10,15}$/', $phone)) $errors[] = 'Invalid phone';
    if (!empty($website) && !filter_var($website, FILTER_VALIDATE_URL)) $errors[] = 'Invalid website URL';
    
    if (empty($errors)) {
        $stmt = $pdo->prepare("UPDATE users SET name=?, phone=?, bio=?, location=?, website=? WHERE id=?");
        $stmt->execute([$name, $phone, $bio, $location, $website, $user_id]);
        $_SESSION['user_name'] = $name;
        $success = 'Profile updated successfully!';
    } else {
        $error = implode('. ', $errors);
    }
}

// ========================================
// HANDLE PASSWORD CHANGE
// ========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_password'])) {
    $current = $_POST['current_password'] ?? '';
    $new = $_POST['new_password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';
    
    $stmt = $pdo->prepare("SELECT password FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    $row = $stmt->fetch();
    
    if (!password_verify($current, $row['password'])) {
        $error = 'Current password is incorrect.';
    } elseif (strlen($new) < 8) {
        $error = 'New password must be at least 8 characters.';
    } elseif ($new !== $confirm) {
        $error = 'Passwords do not match.';
    } else {
        $hash = password_hash($new, PASSWORD_DEFAULT);
        $pdo->prepare("UPDATE users SET password = ? WHERE id = ?")->execute([$hash, $user_id]);
        $success = 'Password changed successfully!';
    }
}

// Success redirect messages
if (isset($_GET['success'])) {
    $success = $_GET['success'] == '1' ? 'Avatar uploaded successfully!' : 'Avatar removed.';
}

// ========================================
// FETCH USER
// ========================================
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

// Enrollments
$stmt = $pdo->prepare("
    SELECT c.*, e.enrolled_at 
    FROM enrollments e 
    JOIN courses c ON e.course_id = c.id 
    WHERE e.user_id = ? 
    ORDER BY e.enrolled_at DESC
");
$stmt->execute([$user_id]);
$enrollments = $stmt->fetchAll();

// Profile completion
$fields = ['name', 'email', 'phone', 'bio', 'location', 'avatar'];
$done = 0;
foreach ($fields as $f) if (!empty($user[$f])) $done++;
$completion = round(($done / count($fields)) * 100);

include 'includes/header.php';
?>

<!-- Profile Hero -->
<section class="profile-hero">
    <div class="profile-cover"></div>
    <div class="container">
        <div class="profile-header-card">
            <div class="profile-avatar-wrap">
                <?php if (!empty($user['avatar']) && file_exists($user['avatar'])): ?>
                    <img src="<?php echo htmlspecialchars($user['avatar']); ?>?v=<?php echo time(); ?>" alt="Avatar" id="profileAvatar">
                <?php else: ?>
                    <div class="avatar-placeholder" id="profileAvatar">
                        <?php echo strtoupper(substr($user['name'], 0, 1)); ?>
                    </div>
                <?php endif; ?>
                
                <label for="avatarInput" class="avatar-upload-btn" title="Change photo">
                    📷
                    <input type="file" id="avatarInput" accept="image/*" style="display:none;">
                </label>
                
                <?php if (!empty($user['avatar'])): ?>
                    <form method="POST" style="display:inline;" onsubmit="return confirm('Remove your profile photo?')">
                        <button type="submit" name="delete_avatar" class="avatar-delete-btn" title="Remove photo">✕</button>
                    </form>
                <?php endif; ?>
            </div>
            
            <div class="profile-header-info">
                <h1><?php echo htmlspecialchars($user['name']); ?></h1>
                <p class="profile-email">
                    ✉️ <?php echo htmlspecialchars($user['email']); ?>
                    <span class="badge <?php echo $user['role'] == 'admin' ? 'badge-danger' : 'badge-primary'; ?>">
                        <?php echo ucfirst($user['role']); ?>
                    </span>
                </p>
                <?php if (!empty($user['bio'])): ?>
                    <p class="profile-bio"><?php echo htmlspecialchars($user['bio']); ?></p>
                <?php endif; ?>
                <div class="profile-meta">
                    <?php if (!empty($user['location'])): ?>
                        <span>📍 <?php echo htmlspecialchars($user['location']); ?></span>
                    <?php endif; ?>
                    <span>📅 Joined <?php echo date('M Y', strtotime($user['created_at'])); ?></span>
                    <?php if (!empty($user['website'])): ?>
                        <span>🔗 <a href="<?php echo htmlspecialchars($user['website']); ?>" target="_blank" rel="noopener">Website</a></span>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="profile-stats-mini">
                <div class="mini-stat">
                    <strong><?php echo count($enrollments); ?></strong>
                    <span>Courses</span>
                </div>
                <div class="mini-stat">
                    <strong><?php echo $completion; ?>%</strong>
                    <span>Complete</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tabs -->
<section class="profile-tabs-section">
    <div class="container">
        <div class="profile-tabs">
            <a href="?tab=profile" class="tab-btn <?php echo $active_tab == 'profile' ? 'active' : ''; ?>">👤 Profile</a>
            <a href="?tab=courses" class="tab-btn <?php echo $active_tab == 'courses' ? 'active' : ''; ?>">📚 Courses (<?php echo count($enrollments); ?>)</a>
            <a href="?tab=security" class="tab-btn <?php echo $active_tab == 'security' ? 'active' : ''; ?>">🔒 Security</a>
        </div>
    </div>
</section>

<!-- Content -->
<section class="section-padding">
    <div class="container">
        
        <?php if ($success): ?>
            <div class="validation-success" style="max-width:900px; margin:0 auto 30px;">
                <strong>✅ <?php echo htmlspecialchars($success); ?></strong>
            </div>
        <?php endif; ?>
        <?php if ($error): ?>
            <div class="validation-summary" style="max-width:900px; margin:0 auto 30px;">
                <strong>❌ <?php echo htmlspecialchars($error); ?></strong>
            </div>
        <?php endif; ?>
        
        <?php if ($active_tab == 'profile'): ?>
            <div class="profile-form-card">
                <div class="profile-card-header">
                    <h2>👤 Personal Information</h2>
                    <p>Update your personal details</p>
                </div>
                
                <form method="POST" class="profile-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Full Name <span class="required">*</span></label>
                            <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" value="<?php echo htmlspecialchars($user['email']); ?>" disabled>
                            <span class="field-help">Email cannot be changed</span>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label>Phone Number <span class="required">*</span></label>
                            <input type="tel" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" name="location" value="<?php echo htmlspecialchars($user['location'] ?? ''); ?>" placeholder="e.g., Lagos, Nigeria">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Website</label>
                        <input type="url" name="website" value="<?php echo htmlspecialchars($user['website'] ?? ''); ?>" placeholder="https://yourwebsite.com">
                    </div>
                    
                    <div class="form-group">
                        <label>Bio</label>
                        <textarea name="bio" rows="4" maxlength="500" placeholder="Tell us about yourself..." id="bioInput"><?php echo htmlspecialchars($user['bio'] ?? ''); ?></textarea>
                        <div class="char-counter"><span id="bioCount">0</span>/500</div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" name="update_profile" class="btn btn-primary btn-lg">💾 Save Changes</button>
                    </div>
                </form>
            </div>
            
            <div class="profile-form-card" style="margin-top:24px;">
                <h3 style="margin-bottom:16px;">📊 Profile Completion</h3>
                <div class="progress-bar-wrap">
                    <div class="progress-bar-fill" style="width: <?php echo $completion; ?>%;"></div>
                </div>
                <p style="color:var(--gray); font-size:0.9rem; margin-top:10px;">
                    Your profile is <strong><?php echo $completion; ?>%</strong> complete.
                    <?php echo $completion < 100 ? ' Add more info to reach 100%!' : ' Perfect! 🎉'; ?>
                </p>
            </div>
        
        <?php elseif ($active_tab == 'courses'): ?>
            <?php if (empty($enrollments)): ?>
                <div class="profile-form-card" style="text-align:center; padding:60px 30px;">
                    <div style="font-size:4rem; margin-bottom:20px;">📚</div>
                    <h3>No courses yet</h3>
                    <p style="color:var(--gray); margin:10px 0 20px;">Start learning by enrolling in a course!</p>
                    <a href="courses.php" class="btn btn-primary">Browse Courses</a>
                </div>
            <?php else: ?>
                <div class="cards-grid">
                    <?php foreach ($enrollments as $c): ?>
                        <div class="course-card">
                            <div class="course-image"><?php echo $c['icon']; ?></div>
                            <div class="course-content">
                                <span class="course-tag badge-primary"><?php echo $c['level']; ?></span>
                                <h3><?php echo htmlspecialchars($c['title']); ?></h3>
                                <p><?php echo htmlspecialchars(substr($c['description'], 0, 100)); ?>...</p>
                                <div class="course-meta">
                                    <span>📅 <?php echo $c['duration']; ?></span>
                                    <span>✅ <?php echo date('M j, Y', strtotime($c['enrolled_at'])); ?></span>
                                </div>
                                <a href="course-details.php?id=<?php echo $c['id']; ?>" class="btn btn-primary btn-block">Continue</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        
        <?php elseif ($active_tab == 'security'): ?>
            <div class="profile-form-card">
                <div class="profile-card-header">
                    <h2>🔒 Change Password</h2>
                    <p>Keep your account secure</p>
                </div>
                
                <form method="POST" class="profile-form">
                    <div class="form-group">
                        <label>Current Password <span class="required">*</span></label>
                        <div class="input-with-icon">
                            <input type="password" name="current_password" id="currentPass" required>
                            <button type="button" class="toggle-password" onclick="togglePasswordVisibility('currentPass')">👁️</button>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>New Password <span class="required">*</span></label>
                        <div class="input-with-icon">
                            <input type="password" name="new_password" id="newPass" required minlength="8">
                            <button type="button" class="toggle-password" onclick="togglePasswordVisibility('newPass')">👁️</button>
                        </div>
                        <div class="password-strength" id="passStrength" style="display:none;">
                            <span class="strength-text">Enter password</span>
                            <div class="strength-bar"></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Confirm New Password <span class="required">*</span></label>
                        <div class="input-with-icon">
                            <input type="password" name="confirm_password" id="confirmPass" required minlength="8">
                            <button type="button" class="toggle-password" onclick="togglePasswordVisibility('confirmPass')">👁️</button>
                        </div>
                        <small id="matchMsg" style="display:block; margin-top:5px;"></small>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" name="change_password" class="btn btn-primary btn-lg">🔑 Update Password</button>
                    </div>
                </form>
            </div>
            
            <div class="profile-form-card" style="margin-top:24px; border-left:4px solid #3b82f6;">
                <h3 style="margin-bottom:15px;">🛡️ Security Tips</h3>
                <ul style="list-style:none; padding:0; color:var(--gray);">
                    <li style="padding:8px 0;">✅ Use at least 8 characters</li>
                    <li style="padding:8px 0;">✅ Mix uppercase, lowercase, numbers & symbols</li>
                    <li style="padding:8px 0;">✅ Don't reuse passwords</li>
                    <li style="padding:8px 0;">✅ Change regularly</li>
                </ul>
            </div>
        <?php endif; ?>
        
    </div>
</section>

<?php include 'includes/footer.php'; ?>