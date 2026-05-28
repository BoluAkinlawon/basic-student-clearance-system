<?php
session_start();
if (!isset($_SESSION['matric'])) { header("Location: login.php"); exit; }
require_once "includes/config.php";
$matric = $_SESSION['matric'];
$stmt = $pdo->prepare("SELECT firstname, lastname, approved FROM graduates WHERE matric = ? LIMIT 1");
$stmt->execute([$matric]);
$grad = $stmt->fetch();
?>
<?php require "includes/header.php"; ?>
<div class="container">
    <h2>Clearance Certificate</h2><hr>
    <?php if ($grad && !empty($grad['approved']) && $grad['approved'] == 1): ?>
        <div class="approved">
            <p style="text-align:center;font-size:16px;font-weight:bold;margin-bottom:12px;">🎓 CLEARANCE CERTIFICATE</p>
            <p>This is to certify that <strong><?= htmlspecialchars($grad['firstname'].' '.$grad['lastname']) ?></strong>
            (Matric: <?= htmlspecialchars($matric) ?>) has been successfully cleared for graduation.</p>
            <br>
            <p>Date: <?= date('d F Y') ?></p>
            <br>
            <p>.........................<br>Vice Chancellor's Signature</p>
        </div>
        <br>
        <button onclick="window.print()">🖨️ Print Clearance</button>
    <?php else: ?>
        <p class="error">You have not been cleared for graduation yet. Please check back later or contact the admin.</p>
    <?php endif; ?>
    <a href="dashboard.php" class="btn btn-secondary" style="margin-top:10px;">← Back to Dashboard</a>
</div>
<?php require "includes/footer.php"; ?>
