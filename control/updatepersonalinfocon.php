<?php
require '../model/usern.php';
require "../model/dbconnection.php";
session_start();
if (isset($_POST['update'])) {

    $errors = [];
    $userId = $_SESSION['userid'];


    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    }

        $name = htmlspecialchars(trim($_POST['name']));
    
    
        $phoneno = preg_replace("/[^0-9]/", "",$_POST['phoneno']);
        if (strlen($phoneno) === 10) {
            // Valid phone number
            $pnum = $phoneno;
        } else {
            $errors[] = "Invalid Phone Number format.";
        }
    



    $filePath = null; // File upload start

    if (isset($_FILES['profilepic']) && $_FILES['profilepic']['error'] === 0) {
        $file = $_FILES['profilepic'];
        $filename = $file['name'];
        $filetmpname = $file['tmp_name'];
        $filesize = $file['size'];
        $fileext = explode('.', $filename); // String convert array
        $fileactualext = strtolower(end($fileext));
        $allowed = ['jpg', 'jpeg', 'png']; //santize

        if (in_array($fileactualext, $allowed)) {
            if ($filesize < 1000000) { // 1MB file size limit
                $fileNewName = uniqid('', true) . "." . $fileactualext;
                $fileDestination = '../upload/' . $fileNewName;
                if (move_uploaded_file($filetmpname, $fileDestination)) {
                    $filePath = $fileDestination;
                } else {
                    $errors[] = "Failed to move uploaded file.";
                }
            } else {
                $errors[] = "File is too big.";
            }
        } else {
            $errors[] = "Please upload jpg, jpeg, or png type.";
        }
    }

    if ($filePath !== null) {
        if ( $picpath=$obj->updateImg($filePath, Dbh::connect())) {
            $_SESSION['profilepic']=$picpath;
        }
        else{
            $errors[] = "Failed not upload.";
        }
    }

    if (empty($errors)) {
        // Update the user information in the database
        $updateResult = $obj->updateUserInfo($name, $phoneno,$email, Dbh::connect());
        if ($updateResult) {
            $_SESSION['success']="Profile updated successfully.";
            header("Location: ../view/userpage.php");
        } else {
            $errors[] = "Failed to update profile.";
        }
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            $_SESSION['error']=$error;
            header("Location: ../view/userpage.php"); //userpage page
            exit();
        }
    }
}
else{
    header("Location: ../view/user.php");
    exit();
}
