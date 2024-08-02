<?php
require '../model/dbconnection.php';
require '../model/products.php';
if(isset($_POST['addtocart'])){
    $userid=$_POST['userid'];
    $itemid=$_POST['itemid'];
    $price=$_POST['price'];
    $img=$_POST['img'];
    $pname=$_POST['pname'];
    $quantity=1;

    $obj=new wishlist();
    if($obj->addtocart($userid,$itemid,$price,$quantity,$pname,$img,Dbh::connect())){
        header("Location:../view/wishlist.php?s=1");
        exit();
    }
    else{
        header("Location:../view/wishlist.php?s=0");
        exit();
    }
}






?>