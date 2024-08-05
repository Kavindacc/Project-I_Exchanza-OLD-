<?php
require '../model/usern.php';
require "../model/dbconnection.php";
session_start();
if (isset($_POST['changeimg'])) {

    
    $userId = $_SESSION['userid'];
   

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
        $obj=new RegisteredCustormer( $userId);
        if ( $picpath=$obj->updateImg($filePath, Dbh::connect())) {
            $_SESSION['profilepic']=$picpath;
            $_SESSION['success']="Profile Img Change Success.";
            header("Location: ../view/userpage.php"); //userpage page
            exit();
        }
        else{
            $errors[] = "Profile Img not upload.";
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

