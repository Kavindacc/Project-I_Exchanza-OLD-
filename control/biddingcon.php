<?php
require '../model/usern.php';
require '../model/dbconnection.php';
session_start();

if (isset($_POST['submitBid'])) {
    $productname = ucfirst($_POST['itemname']);
    $price = $_POST['price'];
    $colour =null;
    $description = $_POST['description'];
    $category = isset($_POST['']) ? $_POST[''] : null;
    $subcategory = isset($_POST['']) ? $_POST[''] : null;
    $size = isset($_POST['']) ? $_POST[''] : null; // Use ternary operator
    $condition =isset($_POST['']) ? $_POST[''] : null;
    $start_time = $_POST['bidstarttime'];
    $end_time = $_POST['bitendtime'];
    $start_price = $_POST['price'];
    $userid = $_SESSION['userid'];

    $errors = [];
    $filePath = null; // File upload start

    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $file = $_FILES['image'];
        $filename = $file['name'];
        $filetmpname = $file['tmp_name'];
        $filesize = $file['size'];
        $fileext = explode('.', $filename); // String convert array
        $fileactualext = strtolower(end($fileext));
        $allowed = ['jpg', 'jpeg', 'png'];

        if (in_array($fileactualext, $allowed)) {
            if ($filesize < 2000000) { // 2MB file size limit
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
        $obj = new Seller();
        $obj->addItemForBidding($productname, $price, $colour, $description, $category, $subcategory, $size, $condition, $filePath, $userid, $start_time, $end_time, $start_price, Dbh::connect());
    } else {
        $errors[] = "File upload failed or no file uploaded.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            header("Location: ../view/bidding.php?error=$error.");//auction page
            exit();
        }
    }
}
?>
