<?php require '../control/logincon.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <!--nav bar-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary  sticky-top">
        <div class="container-fluid"><!--logo-->
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
                            <a class="nav-link " aria-current="page" href="../index.php">Home</a>
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
                                <a href="#1" class="nav-link text-decoration-none active">login</a>
                            </button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container" style="margin-top:100px;">
        <div class="row text-center pb-3">
            <h2>Login now</h2>
        </div>
        <div class="row justify-content-center pb-2">
            <div class="col-md-4">
                No account yet? <a href="signup.php">join now for free</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php if (isset($_GET['error'])) { ?>
                <div class="col-md-4 bg-warning text-white"><?php echo $_GET['error']; ?></div>
            <?php } ?>
        </div>
        <form action="../control/logincon.php" method="post">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control" placeholder="example@gmail.com" name="email" required="">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <label class="form-label">Password</label>
                    <input class="form-control" type="password" name="password" required="">
                </div>
            </div>

            <div class="row justify-content-center mt-2">
                <div class="col-md-4"><a href="forgetpassword.php">forget password</a></div>
            </div>
            <div class="row justify-content-center mt-2">
                <div class="col-md-4">
                    <input class="btn btn-primary w-100" type="submit" value="Sign In" name="signin">
                </div>
            </div>
        </form>
    </div>
     <!--footer-->
     <div class="container-fluid mt-5" style="background-color:burlywood;">
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
    <!--fotterclose-->
    <!--prevent backbutton-->
    <script type="text/javascript">
        function preventback() {
            window.history.forward()
        };
        setTimeout("preventback()", 0);
        window.onunload = function() {
            null
        };
    </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>