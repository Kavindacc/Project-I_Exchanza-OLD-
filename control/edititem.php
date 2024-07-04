<?php

require '../model/products.php';

if (isset($_POST['edit'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $current_image = $_POST['current_image'];

    // Check if a new image has been uploaded
    if ($_FILES['image']['name']) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        $image = $target_file;
    } else {
        // If no new image, keep the current one
        $image = $current_image;
    }

    $obj=new Products();
    if($obj->updateitem($product_id,$product_name,$price, $image)){
        $_SESSION['editsuccess']='Update Successful.';
        header("Location: ../view/afterdeletei.php");//userpage page
        exit();
    }

}
?>