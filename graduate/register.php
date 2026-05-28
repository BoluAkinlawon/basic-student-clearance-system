<?php
session_start();
require_once "includes/config.php";
$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = trim($_POST['firstname'] ?? '');
    $lastname  = trim($_POST['lastname']  ?? '');
    $username  = trim($_POST['username']  ?? '');
    $email     = trim($_POST['email']     ?? '');
    $matric    = trim($_POST['matric']    ?? '');
    $password  = trim($_POST['password']  ?? '');
    if (!$firstname || !$lastname || !$username || !$email || !$matric || !$password) {
        $error = "Please fill in all fields.";
    } else {
        $check = $pdo->prepare("SELECT id FROM graduates WHERE matric = ? LIMIT 1");
        $check->execute([$matric]);
        if ($check->fetch()) {
            $error = "A graduate with this matric number already exists.";
        } else {
            $stmt = $pdo->prepare("INSERT INTO graduates (firstname, lastname, username, email, matric, password) VALUES (?,?,?,?,?,?)");
            $stmt->execute([$firstname, $lastname, $username, $email, $matric, password_hash($password, PASSWORD_BCRYPT)]);
            header("Location: login.php"); exit;
        }
    }
}
?>
<?php require "includes/header.php"; ?>
<div class="container">
    <h2>Graduate Registration</h2><hr>
    <?php if ($error): ?><p class="error"><?= htmlspecialchars($error) ?></p><?php endif; ?>
    <form method="post">
        <input type="text"     name="firstname" placeholder="First Name"    required>
        <input type="text"     name="lastname"  placeholder="Last Name"     required>
        <input type="text"     name="username"  placeholder="Username"      required>
        <input type="email"    name="email"     placeholder="Email Address" required>
        <input type="text"     name="matric"    placeholder="Matric Number" required>
        <input type="password" name="password"  placeholder="Password"      required>
        <button type="submit">Register</button>
    </form>
    <p class="note">Already registered? <a href="login.php">Login here</a></p>
</div>
<?php require "includes/footer.php"; ?>
