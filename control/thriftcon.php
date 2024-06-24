<?php
require '../model/products.php';

session_start();
if(isset($_POST['submit'])){

    $productname=$_POST['iteamname'];
    $price=$_POST['price'];
    $colour=$_POST['colour'];
    $description=$_POST['description'];
    $category=$_POST['category'];
    $subcategory=$_POST['subcategory'];
    $size=$_POST['size'];
    $condition=$_POST['condition'];
    $userid=$_SESSION['userid'];

    $obj=new Products();
    $obj->insertProduct($productname, $price, $colour, $description, $category, $subcategory, $size, $condition, $userid);



}



?>