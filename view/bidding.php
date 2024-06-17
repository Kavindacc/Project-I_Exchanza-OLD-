<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>index</title>
</head>

<body style="background-color: gainsboro;">
    <!--nav bar-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary  sticky-top">
        <div class="container-fluid"><!--logo-->
            <a class="navbar-brand" href="#"><img src="../img/Exchanza.png" width="100px"></a>
            <!--toggle button-->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--sidebar-->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
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
                    <form class="d-flex me-4" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search">
                        <a href="#1" class="nav-link  text-decoration-none  mt-2"><i
                                class="fa-solid fa-magnifying-glass"></i></a>
                    </form>
                    <!--login nav-link-a-color-->
                    <div
                        class="d-flex flex-column flex-lg-row float-start  justify-content-center  align-items-center mt-3 mt-lg-0 gap-3">
                        <a href="#1" class="nav-link  text-decoration-none mx-2"><i
                                class="fa-solid fa-cart-plus"></i></a>
                        <button class="btn btn-dark btn-sm ms-2 px-3"><a href="view/login.php"
                                class="nav-link text-decoration-none ">login</a></button>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <!-- content -->
    <div class="flex w-full flex-col pb-10 ">

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
                    <h1 class="text-3xl font-bold " >Women's Collection</h1>
                    <h1 class="text-md font-medium " >UPTO 40% OFF</h1>

                    <div class="mt-3 w-full">
                        <button class=" p-2 flex justify-center items-center text-md font-semibold text-white bg-black rounded-md px-3">Shop Now</button>
                    </div>

                </div>
            </div>
    
        </div>

        <div class="flex flex-col px-12 pt-16 bg-red bg-[#F3F3F3]">

            <div class="flex justify-between flex-row w-full bg-[#F3F3F3] px-3">
                <h1 class='text-2xl text-semibold my-auto'>Shop by Categories</h1>

                <div class="flex gap-3 my-auto">
                    <button class="p-1 bg-[black] text-white rounded-md px-2"><li class="fa-solid fa-magnifying-glass"""></li></button>
                    <button class="p-1 rounded-md px-2 bg-[#F6F6F6]"><li class="fa-solid fa-magnifying-glass"""></li></button>
                </div>

                
            </div>

        </div>

    </div>



    <!--footer-->
    <div class="container-fluid" style="background-color:burlywood;">
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
                    <p><a href=""><i class="fa-brands fa-facebook"
                                style="font-size:50px;"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=""><i
                                class="fa-brands fa-instagram"
                                style="font-size:50px;"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=""><i
                                class="fa-brands fa-youtube" style="font-size:50px;"></i></a></p>
                </div>
            </div>
            <div class="row mt-2">
                <div class="d-flex justify-content-between flex-column flex-md-row">
                    <div><i class="fa-brands fa-cc-visa" style="font-size:50px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i
                            class="fa-brands fa-cc-mastercard" style="font-size:50px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i
                            class="fa-brands fa-cc-amex" style="font-size:50px;"></i></div>
                    <div>&copy;Exchanze All Rights are reserved</div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>