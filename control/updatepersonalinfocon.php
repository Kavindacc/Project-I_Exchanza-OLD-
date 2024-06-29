<?php
require '../model/user.php';


if(isset($_POST['update'])){

    $errors = [];
    $filePath = null; // File upload start

    if (isset($_FILES['profilepic']) && $_FILES['profilepic']['error'] === 0) {
        $file = $_FILES['profilepic'];
        $filename = $file['name'];
        $filetmpname = $file['tmp_name'];
        $filesize = $file['size'];
        $fileext = explode('.', $filename); // String convert array
        $fileactualext = strtolower(end($fileext));
        $allowed = ['jpg', 'jpeg', 'png'];

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
        $obj = new User();//upload image
        if($obj->updateImg($filePath,$_SESSION['userid'])){
            header("Location: ../view/userpage.php?success=Profile picture Upload.");//userpage page
            exit();
        }
    } else {
        $errors[] = "File upload failed or no file uploaded.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            header("Location: ../view/userpage.php?error=$error.");//userpage page
            exit();
        }
    }
}




?>