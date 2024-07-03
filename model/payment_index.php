<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    // Database connection
    $conn = new mysqli('127.0.0.1', 'root', '6065031');

    if ($conn->connect_error) {
        echo "Error !!!";

    } else {
        
        echo "Registration successfully...";
        include 'C:\xampp\htdocs\Project-I_Exchanza\payment gateway\view\page.html';
        
        
        
    }

    ?>


</body>
</html>
