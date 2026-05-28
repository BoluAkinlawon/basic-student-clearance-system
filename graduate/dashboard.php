<?php
session_start();
if (!isset($_SESSION['matric'])) { header("Location: login.php"); exit; }
require_once "includes/config.php";
$matric = $_SESSION['matric'];
$stmt = $pdo->prepare("SELECT * FROM graduates WHERE matric = ? LIMIT 1");
$stmt->execute([$matric]);
$grad = $stmt->fetch();
?>
<?php require "includes/header.php"; ?>
<div class="container">
    <h2>Graduate Dashboard</h2><hr>
    <p>Welcome, <strong><?= htmlspecialchars($_SESSION['firstname']) ?></strong></p>
    <p style="font-size:13px;color:#555;margin:8px 0 20px;">Matric: <?= htmlspecialchars($matric) ?></p>
    <?php if ($grad): ?>
    <div style="background:#f0f4f8;border-radius:6px;padding:14px;margin-bottom:16px;font-size:13px;">
        <strong>Name:</strong> <?= htmlspecialchars($grad['firstname'].' '.$grad['lastname']) ?><br>
        <strong>Email:</strong> <?= htmlspecialchars($grad['email']) ?><br>
        <strong>Department:</strong> <?= htmlspecialchars($grad['department'] ?? 'Not set') ?><br>
        <strong>Clearance Status:</strong>
        <?php if (!empty($grad['approved']) && $grad['approved'] == 1): ?>
            <span style="color:#2e7d32;font-weight:bold;">✅ Approved</span>
        <?php else: ?>
            <span style="color:#c0392b;font-weight:bold;">⏳ Pending</span>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    <a href="clearance.php" class="btn" style="margin-bottom:10px;">🎓 Print Clearance Form</a>
    <a href="logout.php" class="btn btn-secondary">Logout</a>
</div>
<?php require "includes/footer.php"; ?>
