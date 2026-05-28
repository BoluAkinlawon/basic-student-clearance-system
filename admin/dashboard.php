<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit; }
require_once "includes/config.php";
$stmt = $pdo->query("SELECT * FROM graduates ORDER BY id DESC");
$graduates = $stmt->fetchAll();
?>
<?php require "includes/header.php"; ?>
<div class="table-wrap">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;">
        <h2 style="color:#1a3a5c;">All Graduates</h2>
        <a href="logout.php" class="btn" style="width:auto;padding:8px 16px;">Logout</a>
    </div>
    <?php if ($graduates): ?>
    <table>
        <tr>
            <th>#</th><th>Name</th><th>Matric</th><th>Email</th><th>Department</th><th>Status</th><th>Actions</th>
        </tr>
        <?php foreach ($graduates as $g): ?>
        <tr>
            <td><?= $g['id'] ?></td>
            <td><?= htmlspecialchars($g['firstname'].' '.$g['lastname']) ?></td>
            <td><?= htmlspecialchars($g['matric']) ?></td>
            <td><?= htmlspecialchars($g['email']) ?></td>
            <td><?= htmlspecialchars($g['department'] ?? '—') ?></td>
            <td><?= (!empty($g['approved']) && $g['approved']==1) ? '<span style="color:#2e7d32;font-weight:bold;">✅ Approved</span>' : '<span style="color:#c0392b;">⏳ Pending</span>' ?></td>
            <td class="actions">
                <a href="approve.php?id=<?= $g['id'] ?>">Approve</a>
                <a href="delete.php?id=<?= $g['id'] ?>" style="color:#c0392b;" onclick="return confirm('Delete this record?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php else: ?>
        <p>No graduate records found.</p>
    <?php endif; ?>
</div>
<?php require "includes/footer.php"; ?>
