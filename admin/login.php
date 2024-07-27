<?php
session_start();
require '../config/dbcon.php';
require 'classes/AdminLogin.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adminLogin = new AdminLogin($conn);

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($adminLogin->login($username, $password)) {
        header("Location: index.php");
        exit();
    } else {
        $message = 'Invalid login credentials';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <form method="post">
        <h2>Admin Login</h2>
        <?php if (isset($error)) echo "<p>$error</p>"; ?>
        <label for="username">Username</label>
        <input type="text" name="username" required>
        <label for="password">Password</label>
        <input type="password" name="password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>
