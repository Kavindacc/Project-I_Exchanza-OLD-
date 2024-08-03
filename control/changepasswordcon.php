<?php

require '../model/dbconnection.php';
require '../model/usern.php';
session_reset();
if (isset($_POST['changepassword'])) {

    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];
    $userId = $_SESSION['userid'];

    $errors = [];

    if (!empty($currentPassword)) {
        $currentPassword = htmlspecialchars(trim($currentPassword));
    } else {
        $errors[] = "Current Password required.";
    }
    if (!empty($newPassword)) {
        $newPassword = htmlspecialchars(trim($newPassword));
    } else {
        $errors[] = "New Password required.";
    }
    if (!empty($confirmNewPassword)) {
        $confirmNewPassword = htmlspecialchars(trim($confirmNewPassword));
    } else {
        $errors[] = "Confirm Password required.";
    }

    $user = new RegisteredCustormer($userId);
    if (!$user->verifyPassword($currentPassword, dbh::connect())) {
        $errors[] = "Current password is incorrect.";
        
    }
    
    if ($newPassword !== $confirmNewPassword) {
        $errors[] = "New password and confirm password do not match.";
        
    }

    $spassword = trim(stripslashes(htmlspecialchars($newPassword)));
    $uppercase = preg_match('@[A-Z]@', $newPassword);
    $lowercase = preg_match('@[a-z]@', $newPassword);
    $number    = preg_match('@[0-9]@', $newPassword);
    $specialChars = preg_match('@[^\w]@', $newPassword);

    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($newPassword) < 8) {
        $errors[] = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character";
    }
    if (empty($errors)) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT); //hash password
        if ($user->changepassword($hashedPassword, Dbh::connect())) {
            $_SESSION['psuccess'] = "Password updated successfully.";
            header("Location: ../view/userpage.php");
            exit();
        } else {
            $errors[] = "Failed to update password. Please try again.";
        }
    } else {
        foreach ($errors as $error) {
            $_SESSION['perror'] = $error;
            header("Location: ../view/userpage.php"); //userpage page
            exit();
        }
    }
}

