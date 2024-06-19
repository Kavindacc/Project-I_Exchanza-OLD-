<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    
    <link rel="stylesheet" href="sidepanel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <title>sidepanel</title>
</head>

<body style="background-color: gainsboro;">

    <div class="container">
        <button id="openPanel" class="plus-icon">+</button>
    </div>

    <div id="sidePanel" class="side-panel">
        <button id="closePanel" class="close-btn">&times;</button>
        <img src="image.jpg" alt="Thrift Image" class="panel-image">
        <p class="panel-description">
            Thrifting is an excellent way to save money, reduce waste, and support sustainable fashion. By thrifting items, you can find unique pieces while also contributing to a more eco-friendly world.
        </p>
        <button class="add-item-btn">Add Item</button>
    </div>

    <script src="sidepanel.js"></script>



</body>
</html>
