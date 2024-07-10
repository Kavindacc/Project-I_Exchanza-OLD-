<?php

require '../model/usern.php';
require '../model/dbconnection.php';


if (isset($_POST['signin'])) {

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = htmlspecialchars(trim($_POST['password']));
    $redirect=$_SESSION['redirect'];

    if (empty($password) || empty($email)) {
        header("Location: ../view/login.php?error=Email and password cannot be empty");
        exit();
    }

    $obj = new User($email);
   if ($email == "admin1@gmail.com") {
        /*$rpassword = $obj->loginAdmin($email);
        if ($rpassword && password_verify($password, $rpassword)) {
            header("Location: ../view/admin.php"); //admin page
            exit();
        } else {
            header("Location: ../view/login.php?error=Incorrect email or password");
            exit();
        }*/
    } else {
        $status = $obj->status(Dbh::connect()); //user.php function
        if ($status == "active") {
            $obj->login(Dbh::connect());
            if (password_verify($password,$_SESSION['password'])) {
                $_SESSION['logedin'] = true;

                if (isset($redirect)) {//redirect page
                    header("Location: $redirect");
                    exit();
                }
                else{
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

