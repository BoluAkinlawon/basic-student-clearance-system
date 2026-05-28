<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit; }
require_once "includes/config.php";
$id = (int)($_GET['id'] ?? 0);
if ($id) {
    $stmt = $pdo->prepare("DELETE FROM graduates WHERE id = ?");
    $stmt->execute([$id]);
}
header("Location: dashboard.php"); exit;
