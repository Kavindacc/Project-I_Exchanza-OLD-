<?php

require '../model/usern.php';
require '../model/dbconnection.php';

if (isset($_POST['signin'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = htmlspecialchars(trim($_POST['password']));
    $redirect = isset($_SESSION['redirect']) ? $_SESSION['redirect'] : null;

    if (empty($email) || empty($password)) {
        header("Location: ../view/login.php?error=Email and password cannot be empty");
        exit();
    }

    $admin = new Admin($email);//admin login
    $rpassword = $admin->loginAdmin(Dbh::connect());
    if ($rpassword) {
        if ($password == $rpassword) {
            header("Location: ../view/admin.php"); // admin page
            exit();
        } else {
            header("Location: ../view/login.php?error=Incorrect email or password");
            exit();
        }
    } else {
        
        $obj = new User($email);//userlogin
        $status = $obj->status(Dbh::connect()); // user.php function

        if ($status == "active") {
            $obj->login(Dbh::connect());
            if (password_verify($password, $_SESSION['password'])) {
                $_SESSION['logedin'] = true;

                if ($redirect) { // redirect page
                    header("Location: $redirect");
                    exit();
                } else {
                    header("Location: ../index.php");
                    exit();
                }
            } else {
                header("Location: ../view/login.php?error=Incorrect email or password");
                exit();
            }
        } else {
            header("Location: ../view/login.php?error=Not Active Account Yet");
            exit();
        }
    }
}
?>
