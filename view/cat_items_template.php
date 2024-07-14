<?php

require '../model/products.php';
require '../model/dbconnection.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Secondhand Men's Shirts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!--nav bar-->
    <nav class="navbar navbar-expand-lg sticky-top nav">
        <div class="container-fluid logo"><!--logo-->
            <a class="navbar-brand" href="#"><img src="../img/Exchanza.png" width="100px" alt="icon"></a>
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
                            <a class="nav-link active" href="#">Thrift</a>
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

                            <a href="userpage.php" class=" text-decoration-none"><i class="fa-regular fa-circle-user" style="font-size:1.5rem;"></i></a>

                            <?php echo "Hi," . $_SESSION['username']; ?>
                        <?php } else { ?>

                            <a href="login.php" class=" text-decoration-none"><button class="lo-button btn-sm ms-2 px-3" style="color:#ffff;">login</button></a>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container pt-1"><!--sub category eka ganna-->
        <?php if (isset($_GET['cat']) || isset($_GET['sub'])) {

            $_SESSION['category'] = $_GET['cat'];
            $_SESSION['subcategory'] = $_GET['sub'];
        } ?>

        <div class="text-center">
            <h1>Shop Thrifted <?php if (isset($_SESSION['category'])) {
                                    echo $_SESSION['category'];
                                } ?> 's &nbsp; <?php if (isset($_SESSION['subcategory'])) {
                                                    echo ucfirst($_SESSION['subcategory']);
                                                } ?></h1>
        </div>

        <div class="d-flex justify-left gap-2">

            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sort
                </button>
                <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                    <li><a class="dropdown-item" href="#">Price: Low to High</a></li>
                    <li><a class="dropdown-item" href="#">Price: High to Low</a></li>
                    <li><a class="dropdown-item" href="#">Newest Arrivals</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filter
                </button>
                <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                    <li><a class="dropdown-item" href="#">Category</a></li>
                    <li><a class="dropdown-item" href="#">Type</a></li>
                    <li><a class="dropdown-item" href="#">Size</a></li>
                    <li><a class="dropdown-item" href="#">Colour</a></li>
                </ul>
            </div>
        </div>

        <div class="collapse mb-4" id="filterOptions">
            <div class="card card-body">
                <!-- Filter options methna danna -->
            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-start mt-2"><!--close button-->
        <?php if (isset($_SESSION['msg'])) { ?>
            <div class="alert alert-success  alert-dismissible fade show col-12" role="alert">
                <strong><?php echo $_SESSION['msg'];
                        unset($_SESSION['msg']); ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>


        <?php } ?>
        <?php if (isset($_SESSION['wmsg'])) { ?>
            <div class="alert alert-warning alert-dismissible fade show col-12" role="alert">
                <strong><?php echo $_SESSION['wmsg'];
                        unset($_SESSION['wmsg']); ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>


        <?php } ?>
    </div>
    <div class="container d-flex justify-content-start flex-wrap mt-3"><!--get iteam-->

        <?php

        $obj = new Thrift();
        $rows = $obj->getdetails($_SESSION['category'], $_SESSION['subcategory'], Dbh::connect());
        if (isset($rows) && !empty($rows)) {
            foreach ($rows as $row) { ?>
                <div class="card m-2" style="width: 17rem;">
                    <img src="../upload/<?php echo $row['image'] ?>" class="card-img-top" alt="..." style="height:10rem;" href="items_template.php?id=<?php $row['product_id']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
                        <p class="card-text"><?php echo $row['description']; ?></p>
                        <p class="card-text"><?php if (isset($row['size'])) {
                                                    echo $row['size'];
                                                } ?></p>
                        <p class="card-text">Rs.<?php echo $row['price']; ?></p>
                        <form action="../control/wishlist.php" method="post"><!--wishlistform-->
                            <input type="hidden" name="productid" value="<?php echo $row['product_id']; ?>">
                            <?php if (!isset($_SESSION['logedin']) || $_SESSION['logedin'] !== true) {
                                $currentPage = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; //get current page 
                                $_SESSION['redirect'] = $currentPage; ?>
                                <a href="login.php" style="text-decoration: none;">
                                    <button type="button" class="btn btn-primary mt-2  equal-width" style="--bs-btn-color:#FFFF;--bs-btn-bg:#897062;--bs-btn-border-color:none; --bs-btn-hover-bg:#4c3f31;">Add to Wishlist</button>
                                </a>
                            <?php } else { ?>
                                <button type="submit" class="btn btn-primary mt-2  equal-width" name="wishlist" style="--bs-btn-color:#FFFF;--bs-btn-bg:#897062;--bs-btn-border-color:none; --bs-btn-hover-bg:#4c3f31;">Add to Wishlist</button>
                            <?php } ?>
                        </form>
                        <form action="../control/addtocart.php" method="post"><!--wishlistform-->
                            <input type="hidden" name="productid" value="<?php echo $row['product_id']; ?>">
                            <?php if (!isset($_SESSION['logedin']) || $_SESSION['logedin'] !== true) {
                                $currentPage = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; //get current page 
                                $_SESSION['redirect'] = $currentPage; ?>
                                <a href="login.php" style="text-decoration: none;">
                                    <button type="button" class="btn btn-primary mt-2  equal-width" style="--bs-btn-color:#FFFF;--bs-btn-bg:#897062;--bs-btn-border-color:none; --bs-btn-hover-bg:#4c3f31;">Add to Cart</button>
                                </a>
                            <?php } else { ?>
                                <button type="submit" class="btn btn-primary mt-2  equal-width" name="addtocart" style="--bs-btn-color:#FFFF;--bs-btn-bg:#897062;--bs-btn-border-color:none; --bs-btn-hover-bg:#4c3f31;">Add to Cart</button>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            <?php }
        } else { ?>
            <h2>No Iteam</h2>
        <?php } ?>


    </div>


    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="view/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>