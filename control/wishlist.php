<?php

require '../model/products.php';
require '../model/dbconnection.php';
session_start();
if (isset($_POST['wishlist'])) {

    $productid =htmlspecialchars(trim($_POST['productid']));
    $userid = htmlspecialchars(trim($_SESSION['userid']));

    $obj = new Item(Dbh::connect());
    $productsids = $obj->getproductid($userid);
    if (in_array($productid, $productsids)) {
        $_SESSION['wmsg'] = "Can't Add Product Wishlist.";
        header("Location: ../view/cat_items_template.php");
        exit();
    } else {
        //add wishlish table
        $_SESSION['msg'] = "Add Product Wishlist.";
        header("Location: ../view/cat_items_template.php");
        exit();
    }
}
