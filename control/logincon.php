<?php

require '../model/user.php';

if (isset($_POST['signin'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($password) || empty($email)) {
        header("Location: ../view/login.php?error=Email and password cannot be empty");
        exit();
    }

    $obj = new User();
    if ($email == "admin1@gmail.com") {
        $rpassword = $obj->loginAdmin($email);
        if ($rpassword && password_verify($password, $rpassword)) {
            header("Location: ../view/admin.php"); //admin page
            exit();
        } 
        else {
            header("Location: ../view/login.php?error=Incorrect email or password");
            exit();
        }
    }
    else{
        $rpassword = $obj->loginUser($email);
        if ($rpassword && password_verify($password, $rpassword)) {
            header("Location: ../view/login.php?success=Login successful"); //user page
            exit();
        } else {
            header("Location: ../view/login.php?error=Incorrect email or password");
            exit();
        }

    }

}
