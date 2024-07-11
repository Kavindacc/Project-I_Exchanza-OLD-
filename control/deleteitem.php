<?php

session_start();
require '../model/products.php';
require '../model/dbconnection.php';
if(isset($_POST['delete'])){

    $productid=$_POST['productid'];
    $obj=new Item(Dbh::connect());
    if($obj->delete($productid)){
        $_SESSION['deletesuccess']='Product Deleted.';
        header("Location: ../view/afterdeletei.php");//userpage page
        exit();
    }
    
}




?>