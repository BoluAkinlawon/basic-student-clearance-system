<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graduate Clearance System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav>
    <span class="brand">🎓 Graduate Clearance System</span>
    <div>
        <a href="index.php">Home</a>
        <a href="graduate/login.php">Graduate</a>
        <a href="admin/login.php">Admin</a>
    </div>
</nav>
