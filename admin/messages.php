<?php
$admin_page_title = 'Messages';
require_once 'includes/admin-header.php';

if (isset($_GET['read'])) {
    $pdo->prepare("UPDATE messages SET is_read = 1 WHERE id = ?")->execute([(int)$_GET['read']]);
    header("Location: messages.php");
    exit();
}

if (isset($_GET['delete'])) {
    $pdo->prepare("DELETE FROM messages WHERE id = ?")->execute([(int)$_GET['delete']]);
    header("Location: messages.php");
    exit();
}

$messages = $pdo->query("SELECT * FROM messages ORDER BY created_at DESC")->fetchAll();
?>

<?php require_once 'includes/admin-sidebar.php'; ?>

<div class="admin-main">
    <div class="page-header-admin">
        <div>
            <h1>Contact Messages</h1>
            <p><?php echo count($messages); ?> total messages</p>
        </div>
    </div>
    
    <?php if (empty($messages)): ?>
        <div class="content-card">
            <div class="empty-state">
                <div class="empty-state-icon">✉️</div>
                <h3>No messages yet</h3>
                <p>Messages from the contact form will appear here.</p>
            </div>
        </div>
    <?php else: ?>
        <div style="display:flex; flex-direction:column; gap:16px;">
            <?php foreach ($messages as $m): ?>
                <div class="content-card" style="<?php echo $m['is_read'] ? '' : 'border-left:4px solid var(--primary);'; ?>">
                    <div class="card-body">
                        <div style="display:flex; justify-content:space-between; flex-wrap:wrap; gap:12px; margin-bottom:12px;">
                            <div class="user-cell">
                                <div class="user-avatar-sm"><?php echo strtoupper(substr($m['name'], 0, 1)); ?></div>
                                <div class="user-info">
                                    <span class="user-name">
                                        <?php echo htmlspecialchars($m['name']); ?>
                                        <?php if (!$m['is_read']): ?>
                                            <span class="badge badge-danger" style="margin-left:8px;">NEW</span>
                                        <?php endif; ?>
                                    </span>
                                    <span class="user-email"><?php echo htmlspecialchars($m['email']); ?></span>
                                </div>
                            </div>
                            <span style="color:#94a3b8; font-size:0.8rem;">
                                <?php echo date('M j, Y g:i A', strtotime($m['created_at'])); ?>
                            </span>
                        </div>
                        
                        <h4 style="margin-bottom:8px; font-size:1rem;"><?php echo htmlspecialchars($m['subject']); ?></h4>
                        <p style="color:#64748b; line-height:1.7; font-size:0.9rem;">
                            <?php echo nl2br(htmlspecialchars($m['message'])); ?>
                        </p>
                        
                        <div style="margin-top:16px; display:flex; gap:8px;">
                            <?php if (!$m['is_read']): ?>
                                <a href="?read=<?php echo $m['id']; ?>" class="btn btn-sm btn-success">✅ Mark as Read</a>
                            <?php endif; ?>
                            <a href="mailto:<?php echo htmlspecialchars($m['email']); ?>" class="btn btn-sm btn-primary">✉️ Reply</a>
                            <a href="?delete=<?php echo $m['id']; ?>" class="btn btn-sm btn-danger" data-confirm="Delete this message?">🗑️ Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php require_once 'includes/admin-footer.php'; ?>