<?php

require '../model/products.php';
require '../model/dbconnection.php';
require '../model/usern.php';

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
        //check already add
        $wish=new RegisteredCustormer();
        $wish->addtoWishlist($productid,$userid,dbh::connect());
        $_SESSION['msg'] = "Add Product Wishlist.";
        header("Location: ../view/cat_items_template.php");
        exit();
    }
}

