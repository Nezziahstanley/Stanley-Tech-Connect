<?php
$admin_page_title = 'Manage Users';
require_once 'includes/admin-header.php';

// Delete user
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    if ($id != $_SESSION['user_id']) {
        $pdo->prepare("DELETE FROM users WHERE id = ?")->execute([$id]);
        header("Location: users.php?msg=deleted");
        exit();
    }
}

// Change role
if (isset($_GET['role']) && isset($_GET['id'])) {
    $new_role = $_GET['role'] === 'admin' ? 'admin' : 'user';
    $id = (int)$_GET['id'];
    $pdo->prepare("UPDATE users SET role = ? WHERE id = ?")->execute([$new_role, $id]);
    header("Location: users.php?msg=role_updated");
    exit();
}

$users = $pdo->query("SELECT * FROM users ORDER BY created_at DESC")->fetchAll();
?>

<?php require_once 'includes/admin-sidebar.php'; ?>

<div class="admin-main">
    <div class="page-header-admin">
        <div>
            <h1>Manage Users</h1>
            <p>Total: <?php echo count($users); ?> registered users</p>
        </div>
        <div class="header-actions">
            <input type="text" id="tableSearch" placeholder="🔍 Search users..." 
                   style="padding:10px 16px; border:2px solid #e2e8f0; border-radius:8px; font-size:0.9rem; min-width:200px;">
        </div>
    </div>
    
    <?php if (isset($_GET['msg'])): ?>
        <div class="toast success auto-hide" style="position:relative; margin-bottom:20px;">
            <span class="toast-icon">✅</span>
            <span class="toast-message"><?php 
                echo $_GET['msg'] === 'deleted' ? 'User deleted successfully' : 'Role updated successfully'; 
            ?></span>
        </div>
    <?php endif; ?>
    
    <div class="content-card">
        <div class="card-body" style="padding:0;">
            <?php if (empty($users)): ?>
                <div class="empty-state">
                    <div class="empty-state-icon">👥</div>
                    <h3>No users found</h3>
                </div>
            <?php else: ?>
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Joined</th>
                            <th style="text-align:right;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $u): ?>
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
                                <td><?php echo htmlspecialchars($u['phone']); ?></td>
                                <td>
                                    <span class="badge <?php echo $u['role'] == 'admin' ? 'badge-danger' : 'badge-primary'; ?>">
                                        <?php echo $u['role']; ?>
                                    </span>
                                </td>
                                <td><?php echo date('M j, Y', strtotime($u['created_at'])); ?></td>
                                <td style="text-align:right;">
                                    <?php if ($u['id'] != $_SESSION['user_id']): ?>
                                        <?php if ($u['role'] === 'user'): ?>
                                            <a href="?id=<?php echo $u['id']; ?>&role=admin" 
                                               class="btn btn-sm btn-success" 
                                               data-confirm="Make this user an admin?">Make Admin</a>
                                        <?php else: ?>
                                            <a href="?id=<?php echo $u['id']; ?>&role=user" 
                                               class="btn btn-sm btn-secondary" 
                                               data-confirm="Remove admin access?">Remove Admin</a>
                                        <?php endif; ?>
                                        <a href="?delete=<?php echo $u['id']; ?>" 
                                           class="btn btn-sm btn-danger" 
                                           data-confirm="Delete this user permanently?">Delete</a>
                                    <?php else: ?>
                                        <span class="badge badge-info">You</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once 'includes/admin-footer.php'; ?>