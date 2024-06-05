<?php

require '../model/user.php';

if (isset($_POST['signin'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($password) || empty($email)){
        header("Location: ../view/login.php?error=Email and password cannot be empty");
        exit();
    }

    $obj = new User();
    $rpassword=$obj->login($email);

    if($rpassword && password_verify($password,$rpassword)){
        header("Location: ../view/login.php?success=Login successful");
        exit();

    }
    else{
        header("Location: ../view/login.php?error=Incorrect email or password");
        exit();
    }
}
