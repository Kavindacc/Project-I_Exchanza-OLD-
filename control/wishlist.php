<?php

require '../model/products.php';

if (isset($_POST['wishlist'])) {

    $productid = $_POST['productid'];
    $userid = $_SESSION['userid'];

    $obj = new Products();
    $productsids = $obj->getproductid($userid);
    if (in_array($productid, $productsids)) {
        header("Location: ../view/cat_items_template.php?wmsg=Can't Add Product Wishlist.");
        exit();
    } else {
        //add wishlish table
        header("Location: ../view/cat_items_template.php?msg=Add Product Wishlist.");
        exit();
    }
}
