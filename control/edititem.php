<?php
<<<<<<< Updated upstream

require '../model/products.php';

if (isset($_POST['edit'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $current_image = $_POST['current_image'];

    // Check if a new image has been uploaded
=======
require '../model/products.php';

if (isset($_POST['edit'])) {

    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $current_image = $_POST['current_image'];

    // Check new image has been uploaded
>>>>>>> Stashed changes
    if ($_FILES['image']['name']) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        $image = $target_file;
    } else {
        // If no new image, keep the current one
        $image = $current_image;
    }

<<<<<<< Updated upstream
    $obj=new Products();
    if($obj->updateitem($product_id,$product_name,$price, $image)){
        $_SESSION['editsuccess']='Update Successful.';
        header("Location: ../view/afterdeletei.php");//userpage page
        exit();
    }

}
?>
=======
    $obj = new Products();
    if ($obj->productupdate($product_name, $price, $category, $image, $product_id)) {
        $_SESSION['msg']="Product updated successfully";
        header("Location: ../view/afterdeletei.php");//userpage page
        exit();
    }
    else{
        $_SESSION['wmsg']="Product updated successfully";
        header("Location: ../view/afterdeletei.php");//userpage page
        exit();
    }
}
>>>>>>> Stashed changes
