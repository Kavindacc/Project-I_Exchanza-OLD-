<?php require '../control/signupcon.php'; 
session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Signup</title>
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
                            <a class="nav-link" aria-current="page" href="../index.php">Home</a>
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
                        <a href="#1" class="nav-link  text-decoration-none mx-1"><i class="fa-solid fa-cart-plus"><span></span></i></a>
                        <?php
                        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] === true) { ?>
                            <button class="lo-out btn-sm ms-2 px-3">
                                <a href="view/logout.php" class=" text-decoration-none">logout</a>
                            </button>
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
    <!--form-->
    <div class="container p-4 regi">
        <div class="row text-center pb-2">
            <h2>Create Account</h2>
        </div>
        <div class="row justify-content-center">
            <?php if (isset($_GET['error'])) { ?>
                <div class="col-md-8 bg-warning text-white"><?php echo $_GET['error']; ?></div>
            <?php } ?>

            <?php if (isset($_GET['success'])) { ?>
                <div class="col-md-8 bg-success text-white"><?php echo $_GET['success']; ?></div>
            <?php } ?>
        </div>
        <!--form start-->
        <form action="../control/signupcon.php" method="post" enctype="multipart/form-data"><!--action file control folder kta enna one-->
            <div class="row justify-content-center mt-4">
                <div class="col-md-4">
                    <label class="form-label">Full name</label>
                    <input type="text" class="form-control" placeholder="First and Last name" name="name">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control" placeholder="example@gmail.com" name="email">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <label class="form-label">Country</label>
                    <select class="form-select" aria-label="Default select example" name="country">
                        <option value=""disabled selected hidden>--Select Country--</option>
                        <option value="Sri lanka">Sri lanka</option>
                        <option value="Uk">Uk</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Phone number</label>
                    <input type="tel" class="form-control" name="pnum">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <label class="form-label">Gender</label>
                    <select class="form-select" aria-label="Default select example" name="gender">
                        <option value=""disabled selected hidden>--Select Gender--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Password</label>
                    <input class="form-control" type="password" name="password">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <label class="form-label">Repeat password</label>
                    <input class="form-control" type="password" name="rpassword">
                </div>
                <div class="col-md-4" style="margin-top:30px;">
                    <input class="btn btn-primary w-100 " type="submit" value="Register" name="register"style="background:#897062;border:none;">
                </div>
            </div>

            <div class="text-center py-3">
                alredy have account<a href="login.php"> login in</a>
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>