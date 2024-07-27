<?php
session_start();
require 'classes/AdminLogin.php';

$adminLogin = new AdminLogin(null);
$adminLogin->logout();

header("Location: login.php");
exit();
?>
