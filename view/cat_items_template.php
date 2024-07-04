<?php

require '../model/products.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Secondhand Men's Shirts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="shop.css">
        
</head>

<body>
    <div class="container mt-4">
    <?php $sub=$_GET['sub'];echo $sub;?><!--sub category eka ganna-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Men</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shirts</li>
            </ol>
        </nav>

        <div class="text-center mb-4">
            <h1>Shop Secondhand Men's Shirts</h1>
            <p>Crisp cotton or laid-back lumberjack? Networking or not working? There's a shirt for every occasion. Shop
                secondhand men's shirts.</p>
        </div>

        <div class="d-flex justify-left mb-4 gap-2">
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Sort
                </button>
                <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                    <li><a class="dropdown-item" href="#">Price: Low to High</a></li>
                    <li><a class="dropdown-item" href="#">Price: High to Low</a></li>
                    <li><a class="dropdown-item" href="#">Newest Arrivals</a></li>
                </ul>
            </div>
            <div>
                <button class="btn dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
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

        <!-- <template id="itemTemplate">
            <div class="col-md-3 mb-4">
                <div class="card card-custom-bg">
                    <img src="" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"></p>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
        </template> -->
    </div>


    <div class="container d-flex justify-content-start flex-wrap mt-4"><!--text-->
        <?php

        $obj = new Products();
        $rows = $obj->get($sub);
        if(isset($rows)){
        foreach ($rows as $row) { ?>
            <div class="card" style="width: 17rem;margin:.6rem;">
                <img src="../upload/<?php echo $row['image']?>" class="card-img-top" alt="..." style="height:15rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['product_name'];?></h5>
                    <p class="card-text"><?php echo $row['description'];?></p>
                    <p class="card-text"><?php echo $row['colour'];?></p>
                    <p class="card-text"><?php if(isset($row['size'])) { echo $row['size']; } ?></p>
                    <p class="card-text"><?php echo $row['price'];?></p>
                    <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
            </div>
        <?php }}
        ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <script src="shop.js"></script>
</body>

</html>