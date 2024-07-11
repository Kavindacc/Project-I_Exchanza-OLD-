<?php
require '../model/usern.php';
require "../model/dbconnection.php";

if (isset($_POST['update'])) {

    $errors = [];
    $userId = $_SESSION['userid'];

    $obj = new RegisteredCustormer($userId);
    $currentUserInfo = $obj->manageAccount(Dbh::connect());
    $currentName = $currentUserInfo['name'];
    $currentPhoneNo = $currentUserInfo['phoneno'];

    if (!empty($_POST['name'])) {
        $name = htmlspecialchars(trim($_POST['name']));
    } else {
       $name=  $currentName;
    }
    if(!empty($_POST['phoneno'])){
        $phoneno = preg_replace("/[^0-9]/", "",$_POST['phoneno']);
        if (strlen($phoneno) === 10) {
            // Valid phone number
            $pnum = $phoneno;
        } else {
            $errors[] = "Invalid Phone Number format.";
        }
    }
    else{
        $pnum=$currentPhoneNo;
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
        if (!$obj->updateImg($filePath, Dbh::connect())) {
            $errors[] = "Failed to update profile picture.";
        }
    }

    if (empty($errors)) {
        // Update the user information in the database
        $updateResult = $obj->updateUserInfo($name, $phoneno, Dbh::connect());
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
