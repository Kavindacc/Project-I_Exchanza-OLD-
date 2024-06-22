<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Bidding</title>
    <style type="text/tailwindcss">
        .product{
            @apply relative overflow-hidden p-[20px];
        }
        .product-category{
            @apply py-0 px-[10vw] text-[30px] font-[500] mb-[40px] capitalize;
        }
        .product-container{
            @apply py-0 px-[10vw] flex overflow-y-hidden overflow-x-auto scroll-smooth;
        }
        .product-container::-webkit-scrollbar{
            @apply hidden;
        }
        .product-card{
            @apply flex-[0_0_auto] w-[250px] h-[450px] mr-[40px]; 
        }
        .product-image{
            @apply relative w-full h-[350px] overflow-hidden;
        }
        .product-thumb{
            @apply w-full h-full object-cover;
        }
        .discount-tag {
            @apply absolute bg-[#fff] p-[5px] rounded-[5px] text-[#ff7d7d] right-[10px] top-[10px] capitalize;
        }
        .card-btn{
            @apply absolute bottom-[10px] left-[50%] -translate-x-1/2  p-[10px] w-[90%] capitalize border-[none] bg-[#fff] rounded-[5px] duration-[0.5s] cursor-pointer opacity-0;    
        }
        .product-card:hover .card-btn{
            @apply opacity-100;
        }

        .card-btn:hover{
            @apply bg-[#ff7d7d] text-[#fff];
        }
        .product-info{
            @apply w-full h-full pt-[10px];
        }
        .product-brand{
            @apply uppercase;
        }
        .product-short-description{
            @apply w-full h-[20px] leading-[20px] overflow-hidden opacity-[0.5] capitalize my-[5px];
        }
        .price{
            @apply font-extrabold text-[20px];
        }
        .actual-price{
            @apply ml-[20px] opacity-50 line-through;
        }
        .pre-btn,.nxt-btn{
            @apply border-0 w-[10vw] h-full absolute top-0 flex justify-center items-center bg-gradient-to-r from-transparent to-white cursor-pointer z-20;
        }
        .pre-btn {
            @apply left-0 rotate-180;
        }
        .nxt-btn {
            @apply right-0;
        }
        .pre-btn img,
        .nxt-btn img {
            @apply opacity-20;
        }
        .pre-btn:hover img,
        .nxt-btn:hover img {
            @apply opacity-100;
        }
        .collection-container {
            @apply w-full grid grid-cols-2 gap-2.5;
        }
        .collection {
            @apply relative;
        }
        .collection img {
            @apply w-full h-full object-cover;
        }
        .collection p {
            @apply absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center text-white text-5xl capitalize;
        }
        .collection:nth-child(3) {
            @apply col-span-2 mb-2.5;
        }
    </style>

    
</head>

<body>
    <!--nav bar-->
    <nav class="navbar navbar-expand-lg sticky-top nav">
        <div class="container-fluid logo"><!--logo-->
            <a class="navbar-brand" href="#"><img src="../img/Exchanza.png" width="100px"></a>
            <!--toggle button-->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--sidebar-->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <!--sidebarheader-->
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title " id="offcanvasNavbarLabel">Exchanze</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <!--sider body-->
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center  flex-grow-1 pe-3">
                        <li class="nav-item mx-2">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#">Thrift</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#">Bidding</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#">Selling</a>
                        </li>
                    </ul>
                    <form class="d-flex me-4 align-items-center" role="search">
                        <input class="search me-2" type="search" placeholder="Search">
                        <a href="#1" class="nav-link  text-decoration-none  mt-1"><i class="fa-solid fa-magnifying-glass"></i></a>
                    </form>
                    <!--login nav-link-a-color-->
                    <div class="d-flex flex-column float-start flex-lg-row justify-content-center  align-items-center mt-3 mt-lg-0 gap-3">
                        <a href="../Project-I_Exchanza/view/cart.php" class="nav-link  text-decoration-none mx-1"><i class="fa-solid fa-cart-plus"><span></span></i></a>
                        <?php
                        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] === true) { ?>

                            <a href="view/userpage.php" class=" text-decoration-none"><i class="fa-regular fa-circle-user"style="font-size:1.5rem;"></i></a>

                            <?php echo "Hi," . $_SESSION['username']; ?>
                        <?php } else { ?>
                            <button class="lo-button btn-sm ms-2 px-3">
                                <a href="view/login.php" class=" text-decoration-none">login</a>
                            </button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <!-- content -->
    <div class="flex w-full flex-col pb-10 px-10">

        <!-- Hero Section -->
        <div class="flex flex-row w-full bg-[#F3F3F3] px-3">
            
            <div class="hidden md:flex w-full justify-center items-center ">
                <div class="flex flex-col gap-3">

                    <h1 class="text-xl">Classic Exclusive</h1>
                    <h1 class="text-3xl font-bold " >Women's Collection</h1>
                    <h1 class="text-md font-medium " >UPTO 40% OFF</h1>

                    <div class="mt-3 w-full">
                        <button class=" p-2 flex justify-center items-center text-md font-semibold text-white bg-black rounded-md px-3">Add Your Bid</button>
                    </div>

                </div>
            </div>
            
            <div class="flex flex-col w-full justify-start ">
                <img class="w-full " src="../img/bid-main div bg.webp" />
                <div class="flex text-white md:hidden md:text-white flex-col gap-3 relative top-[-45%] left-[10%]">

                    <h1 class="text-xl">Classic Exclusive</h1>
                    <h1 class="text-3xl font-bold" >Women's Collection</h1>
                    <h1 class="text-md font-medium" >UPTO 40% OFF</h1>

                    <div class="mt-3 w-full">
                        <button class=" p-2 flex justify-center items-center text-md font-semibold text-white bg-black rounded-md px-3">Shop Now</button>
                    </div>

                </div>
            </div>
    
        </div>
        <!-- Ongoing Bidding Section-->
        <div class="flex flex-col px-12 pt-16 bg-red bg-[#F3F3F3]">

        <div class="product bg-[#CEC0B9]"> 
            <h2 class="product-category">ongoing Bidding</h2>
            <button class="pre-btn"><img src="../img/Bidding/arrow.png" alt=""></button>
            <button class="nxt-btn"><img src="../img/Bidding/arrow.png" alt=""></button>
            <div class="product-container">
                <?php
                    $items = [1,2,3,4,5,3];
                    foreach ($items as $item) {
                        echo '
                            <div class="product-card">
                                <div class="product-image">
                                    <span class="discount-tag">50% off</span>
                                    <img src="../img/Bidding/card1.jpg" class="product-thumb" alt="">
                                    <button class="card-btn">Bid Now</button>
                                </div>
                                <div class="product-info">
                                    <h2 class="product-brand">brand</h2>
                                    <p class="product-short-description">a short line about the cloth..</p>
                                    <span class="price">$20</span><span class="actual-price">$40</span>
                                </div>
                            </div>        
                        
                        ';
                    }
                ?>
            </div>
        </div>
        </div>

    </div>

    <!--footer-->
    <div class="container-fluid footer">
        <div class="container p-3">
            <div class="row">
                <div class="col">
                    <img src="../img/Exchanza.png" width="200px">
                </div>
            </div>
            <div class="row  mt-4" style="border-bottom:1px solid black;">
                <div class="col">
                    <p class=""><i class="fa-solid fa-phone"></i>&nbsp;&nbsp;+94 112 555 444</p>
                    <p class=""><i class="fa-solid fa-envelope"></i>&nbsp;&nbsp;exchanza@gmail.com</p>
                    <p class=""><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;No.56/2,Kotta Rd,Colombo
                        05,<br>&nbsp;&nbsp;&nbsp;&nbsp;Sri Lanka</p>
                </div>
                <div class="col lin">
                    <h5>Information</h5>
                    <p><a href="#1">Privacy &amp; Policy</a></p>
                    <p><a href="#1">About Us</a></p>
                    <p><a href="#1">Terms &amp; Condition</a></p>
                </div>
                <div class="col lin">
                    <h5>Connect with Us</h5>
                    <p><a href=""><i class="fa-brands fa-facebook" style="font-size:50px;"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=""><i class="fa-brands fa-instagram" style="font-size:50px;"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=""><i class="fa-brands fa-youtube" style="font-size:50px;"></i></a></p>
                </div>
            </div>
            <div class="row mt-2">
                <div class="d-flex justify-content-between flex-column flex-md-row">
                    <div><i class="fa-brands fa-cc-visa" style="font-size:50px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-brands fa-cc-mastercard" style="font-size:50px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-brands fa-cc-amex" style="font-size:50px;"></i></div>
                    <div>&copy;Exchanze All Rights are reserved</div>

                </div>
            </div>
        </div>
    </div>
    <script src="bidScript.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="view/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>


</html>