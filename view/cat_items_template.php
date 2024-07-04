<?php

require '../model/products.php';

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
                            <button class="lo-button btn-sm ms-2 px-3">
                                <a href="view/login.php" class=" text-decoration-none">login</a>
                            </button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container pt-3"><!--sub category eka ganna-->
        <?php if (isset($_GET['cat']) || isset($_GET['sub'])) {

            $category = $_GET['cat'];
            $subcategory = $_GET['sub'];
        } ?>

        <div class="text-center">
            <h1>Shop Secondhand <?php echo ucfirst($category) . "'s&nbsp;" . ucfirst($subcategory) ?></h1>
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
            <div>
                <button class="btn dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filter
                </button>
                <ul class="dropdown-menu" aria-labelledby="sortDropdown">
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

        <div class="row" id="itemContainer">
            <?php include 'database.php';

                // Get category and subcategory from URL parameters
                $category = isset($_GET['category']) ? $_GET['category'] : 'women'; // Default to 'men' if not set
                $subcategory = isset($_GET['subcategory']) ? $_GET['subcategory'] : 'tops'; // Default to 'tops' if not set

                $sql = "SELECT imgSrc, title, size, price FROM items WHERE category='$category' AND subcategory='$subcategory'";
                $result = $conn->query($sql);

                $items = [];
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $items[] = $row;
                    }
                }
                $conn->close();
            ?>
                <?php foreach ($items as $item) { ?>
                 <div class="col-md-3 mb-4">
                    <div class="card card-custom-bg">
                        <img src="<?php echo $item['imgSrc']; ?>" class="card-img-top" alt="<?php echo $item['title']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $item['title']; ?></h5>
                            <p class="card-text"><?php echo $item['size']; ?></p>
                            <p class="card-text"><?php echo $item['price']; ?></p>
                        </div>
                    </div>
                 </div>
                <?php } ?>
        </div>

    </div>


    <div class="container d-flex justify-content-start flex-wrap "><!--get iteam-->
        <?php

        $obj = new Products();
        $rows = $obj->getitem($category, $subcategory);
        if (isset($rows) && !empty($rows)) {
            foreach ($rows as $row) { ?>
                <div class="card m-2" style="width: 17rem;">
                    <img src="../upload/<?php echo $row['image'] ?>" class="card-img-top" alt="..." style="height:10rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
                        <p class="card-text"><?php echo $row['description']; ?></p>
                        <p class="card-text"><?php echo $row['colour']; ?></p>
                        <p class="card-text"><?php if (isset($row['size'])) {
                                                    echo $row['size'];
                                                } ?></p>
                        <p class="card-text">Rs.<?php echo $row['price']; ?></p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            <?php }
        } else { ?>
            <h2>No Iteam</h2>
        <?php } ?>


    </div>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="view/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>