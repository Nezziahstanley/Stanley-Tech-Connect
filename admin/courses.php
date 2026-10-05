<?php
$admin_page_title = 'Manage Courses';
require_once 'includes/admin-header.php';

$edit_course = null;
$msg = '';

// Delete
if (isset($_GET['delete'])) {
    $pdo->prepare("DELETE FROM courses WHERE id = ?")->execute([(int)$_GET['delete']]);
    header("Location: courses.php?msg=deleted");
    exit();
}

// Edit mode
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare("SELECT * FROM courses WHERE id = ?");
    $stmt->execute([(int)$_GET['edit']]);
    $edit_course = $stmt->fetch();
}

// Create/Update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $desc = trim($_POST['description']);
    $level = $_POST['level'];
    $duration = trim($_POST['duration']);
    $icon = trim($_POST['icon']) ?: '📚';
    
    if (!empty($_POST['id'])) {
        $stmt = $pdo->prepare("UPDATE courses SET title=?, description=?, level=?, duration=?, icon=? WHERE id=?");
        $stmt->execute([$title, $desc, $level, $duration, $icon, (int)$_POST['id']]);
        header("Location: courses.php?msg=updated");
    } else {
        $stmt = $pdo->prepare("INSERT INTO courses (title, description, level, duration, icon) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$title, $desc, $level, $duration, $icon]);
        header("Location: courses.php?msg=created");
    }
    exit();
}

$courses = $pdo->query("SELECT * FROM courses ORDER BY id ASC")->fetchAll();
?>

<?php require_once 'includes/admin-sidebar.php'; ?>

<div class="admin-main">
    <div class="page-header-admin">
        <div>
            <h1><?php echo $edit_course ? 'Edit Course' : 'Manage Courses'; ?></h1>
            <p>Total: <?php echo count($courses); ?> courses</p>
        </div>
    </div>
    
    <?php if (isset($_GET['msg'])): ?>
        <div class="toast success auto-hide" style="position:relative; margin-bottom:20px;">
            <span class="toast-icon">✅</span>
            <span class="toast-message">Course <?php echo $_GET['msg']; ?> successfully!</span>
        </div>
    <?php endif; ?>
    
    <div class="content-grid">
        
        <!-- Form -->
        <div class="content-card">
            <div class="card-header">
                <h3 class="card-title"><?php echo $edit_course ? '✏️ Edit Course' : '➕ Add New Course'; ?></h3>
            </div>
            <div class="card-body">
                <form method="POST">
                    <?php if ($edit_course): ?>
                        <input type="hidden" name="id" value="<?php echo $edit_course['id']; ?>">
                    <?php endif; ?>
                    
                    <div class="admin-form-group">
                        <label>Course Title</label>
                        <input type="text" name="title" value="<?php echo htmlspecialchars($edit_course['title'] ?? ''); ?>" required>
                    </div>
                    
                    <div class="admin-form-group">
                        <label>Description</label>
                        <textarea name="description" rows="3" required><?php echo htmlspecialchars($edit_course['description'] ?? ''); ?></textarea>
                    </div>
                    
                    <div class="admin-form-group">
                        <label>Level</label>
                        <select name="level" required>
                            <?php foreach (['Beginner', 'Intermediate', 'Advanced'] as $lvl): ?>
                                <option value="<?php echo $lvl; ?>" <?php echo ($edit_course['level'] ?? '') == $lvl ? 'selected' : ''; ?>>
                                    <?php echo $lvl; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="admin-form-group">
                        <label>Duration</label>
                        <input type="text" name="duration" value="<?php echo htmlspecialchars($edit_course['duration'] ?? ''); ?>" placeholder="e.g., 30 Days" required>
                    </div>
                    
                    <div class="admin-form-group">
                        <label>Icon (Emoji)</label>
                        <input type="text" name="icon" value="<?php echo htmlspecialchars($edit_course['icon'] ?? '📚'); ?>" maxlength="4">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">
                        <?php echo $edit_course ? '💾 Update Course' : '➕ Create Course'; ?>
                    </button>
                    <?php if ($edit_course): ?>
                        <a href="courses.php" class="btn btn-secondary">Cancel</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>
        
        <!-- List -->
        <div class="content-card">
            <div class="card-header">
                <h3 class="card-title">All Courses</h3>
            </div>
            <div class="card-body" style="padding:0; max-height:600px; overflow-y:auto;">
                <?php foreach ($courses as $c): ?>
                    <div style="padding:16px 24px; border-bottom:1px solid #f1f5f9; display:flex; justify-content:space-between; align-items:center; gap:12px; transition:all 0.2s ease;"
                         onmouseover="this.style.background='#f8fafc'"
                         onmouseout="this.style.background='transparent'">
                        <div style="display:flex; align-items:center; gap:12px; flex:1; min-width:0;">
                            <span style="font-size:1.5rem;"><?php echo $c['icon']; ?></span>
                            <div style="min-width:0;">
                                <div style="font-weight:600; font-size:0.9rem; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                                    <?php echo htmlspecialchars($c['title']); ?>
                                </div>
                                <div style="color:#94a3b8; font-size:0.75rem;">
                                    <?php echo $c['level']; ?> • <?php echo $c['duration']; ?>
                                </div>
                            </div>
                        </div>
                        <div style="display:flex; gap:6px; flex-shrink:0;">
                            <a href="?edit=<?php echo $c['id']; ?>" class="btn btn-sm btn-secondary">✏️</a>
                            <a href="?delete=<?php echo $c['id']; ?>" class="btn btn-sm btn-danger" data-confirm="Delete this course?">🗑️</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/admin-footer.php'; ?>