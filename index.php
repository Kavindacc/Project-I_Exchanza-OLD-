<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="view/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>index</title>
</head>

<body style="background-color: gainsboro;">
    <!--nav bar-->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid logo"><!--logo-->
            <a class="navbar-brand" href="#"><img src="img/Exchanza.png" width="100px"></a>
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
                    <form class="d-flex me-4" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search">
                        <a href="#1" class="nav-link  text-decoration-none  mt-2"><i class="fa-solid fa-magnifying-glass"></i></a>
                    </form>
                    <!--login nav-link-a-color-->
                    <div class="d-flex flex-column flex-lg-row float-start  justify-content-center  align-items-center mt-3 mt-lg-0 gap-3">
                        <a href="#1" class="nav-link  text-decoration-none mx-2"><i class="fa-solid fa-cart-plus"></i></a>
                        <?php
                        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] === true) { ?>
                            <button class="btn btn-warning btn-sm ms-2 px-3">
                                <a href="view/logout.php" class="nav-link text-decoration-none">logout</a>
                            </button>
                            <?php echo "Hi," . $_SESSION['username']; ?>
                        <?php } else { ?>
                            <button class="btn btn-dark btn-sm ms-2 px-3">
                                <a href="view/login.php" class="nav-link text-decoration-none">login</a>
                            </button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!--sider-->
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade con" ;>
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image:url('img/pexels-kseniachernaya-3965545.jpg');">
            </div>
            <div class="carousel-item " style="background-image:url('img/pexels-olly-3755706.jpg');">
            </div>
            <div class="carousel-item" style="background-image:url('img/pexels-bohlemedia-1884581.jpg');">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!--trift,bit container-->
    <div class="thirf d-flex flex-row">
        <div class="pic">
            <img src="img/pexels-kseniachernaya-3965545.jpg" width="100%">
        </div>
        <div class="text">
            <h5>Thrift</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, ab laborum ut accusamus, fugiat earum alias
                beatae ipsa harum quos atque culpa architecto similique deleniti impedit, facilis at aliquam deserunt!
            </p>
            <button><a href="">Shop Now&nbsp;>></a></button>
        </div>
    </div>
    <div class="thirf d-flex flex-row">
        <div class="pic">
            <img src="img/keagan-henman-ufuk99QfQTg-unsplash.jpg" width="100%">
        </div>
        <div class="text">
            <h5>Thrift</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, ab laborum ut accusamus, fugiat earum alias
                beatae ipsa harum quos atque culpa architecto similique deleniti impedit, facilis at aliquam deserunt!
            </p>
            <button><a href="">Shop Now&nbsp;>></a></button>
        </div>
    </div>
    <div class="thirf d-flex flex-row">
        <div class="pic">
            <img src="img/pexels-olly-3755706.jpg" width="100%">
        </div>
        <div class="text">
            <h5>Thrift</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, ab laborum ut accusamus, fugiat earum alias
                beatae ipsa harum quos atque culpa architecto similique deleniti impedit, facilis at aliquam deserunt!
            </p>
            <button><a href="">Shop Now&nbsp;>></a></button>
        </div>
    </div>

    <!--treanding-->
    <div class="mx-auto px-4 my-5 tread">
        <div class="row p-3">
            <div class="col">
                <h2>Treanding Stores</h2>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-4 g-4 ">
            <div class="col">
                <div class="card h-100">
                    <img src="img/burgess-milner-OYYE4g-I5ZQ-unsplash.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title"><a href="#1">The Fashion Gatre</a></h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="img/keagan-henman-ufuk99QfQTg-unsplash.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title"><a href="#">Maximum</a></h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="img/pexels-kish-1488463.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title"><a href="#">Ivo Nikkol</a></h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="img/pexels-bohlemedia-1884581.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title"><a href="#">The Maze</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--iteam-->
    <div class="item d-flex justify-content-around flex-column flex-md-row">
        <div class="d-flex flex-column  p-4 side">
            <div class="icon"><i class="fa-solid fa-recycle" style="font-size:50px;"></i>
            </div><br>
            <div class="text">
                <h4>Help End Fashion Waste</h4>
                <br>
                <P>We&apos;re on a mission to end fashion waste. One wardrobe at a time. We want to make giving your
                    clothes a new life as simple as possible.</P>
                <P>Currently 49% of people in the world bin no-longer-loved clothes. Think that needs to change? Us too.
                </P>
                <P>We do all we can to give your clothes a second life by reselling or responsibly recycling them</P>
            </div>
        </div>
        <div class="d-flex flex-column  p-4 side">
            <div class="icon text-center"><i class="fa-solid fa-house" style="font-size:50px;"></i>
            </div><br>
            <div class="text ">
                <h4>Encourage Small Businesses</h4>
                <br>
                <P>We&apos;re on a mission to end fashion waste. One wardrobe at a time. We want to make giving your
                    clothes a new life as simple as possible.</P>
                <P>Currently 49% of people in the world bin no-longer-loved clothes. Think that needs to change? Us too.
                </P>
                <P>We do all we can to give your clothes a second life by reselling or responsibly recycling them</P>
            </div>
        </div>
    </div>

    <!--footer-->
    <div class="container-fluid footer">
        <div class="container p-3">
            <div class="row">
                <div class="col">
                    <img src="img/Exchanza.png" width="200px">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>


</html>