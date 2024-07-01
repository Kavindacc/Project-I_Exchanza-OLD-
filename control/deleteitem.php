<?php

require '../model/products.php';

if(isset($_POST['delete'])){

    $productid=$_POST['productid'];
    $obj=new Products();
    if($obj->delete($productid)){
        $_SESSION['deletesuccess']='Product Deleted.';
        header("Location: ../view/afterdeletei.php");//userpage page
        exit();
    }
    
}



?>