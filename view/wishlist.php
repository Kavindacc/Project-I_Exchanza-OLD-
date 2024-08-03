<?php

require '../model/dbconnection.php';
require '../model/products.php';
require '../model/usern.php';
session_start();

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>wishlist</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background: #e3e2dd;">
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
              <a class="nav-link" href="../view/thrift.php">Thrift</a>
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
          <?php
                if (isset($_SESSION['logedin']) && $_SESSION['logedin'] === true) { ?>
                  <?php $obj = new wishlist();
                       $count = $obj->additemcount($_SESSION['userid'], Dbh::connect()); ?>
                       <a href="cart.php" class="nav-link  text-decoration-none mx-1"><i class="fa-solid fa-cart-plus position-relative"><span class="position-absolute translate-middle badge rounded-pill bg-danger sp"><?php if (isset($count)) { echo $count; } else {  echo 0; } ?></span></i></a><!--addtocart-->
                       <?php $obj = new RegisteredCustormer();
                       $count = $obj->wishlistiteamcount($_SESSION['userid'], Dbh::connect()); ?>
                      <a href="wishlist.php" class="nav-link  text-decoration-none mx-1"><i class="fa-regular fa-heart position-relative"><span class="position-absolute translate-middle badge rounded-pill bg-dark sp"><?php if (isset($count)) { echo $count; } else {  echo 0; } ?></span></i></a><!--addto wishlist-->

                       <a href="userpage.php" class=" text-decoration-none"><i class="fa-regular fa-circle-user" style="font-size:1.5rem;"></i></a>


                       <?php echo "Hi," . $_SESSION['username']; ?>
                 <?php } else { ?>
                       <a href="login.php" class="nav-link  text-decoration-none mx-1"><i class="fa-solid fa-cart-plus position-relative"><span class="position-absolute translate-middle badge rounded-pill bg-danger sp"></span></i></a><!--addtocart-->
                       <a href="login.php" class="nav-link  text-decoration-none mx-1"><i class="fa-regular fa-heart position-relative"></i></a>
                       <a href="login.php" class=" text-decoration-none"><button class="lo-button btn-sm ms-2 px-3" style="color:#ffff;">login</button></a>
            <?php } ?>        
          </div>
        </div>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
    <!-- Content here -->
    <h1>Wish List&nbsp;&nbsp;<span><i class="fa-regular fa-heart"></i></span></h1>
    <div class="wishlist mt-5">
      <?php
      if (isset($_GET['s']) && !empty($_GET['s'])) {
        if ($_GET['s'] == '1') {
          $msg = "Item Successfully Added to the Cart.";
        } else {
          $msg = "Product Not Add.";
        }?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong><?php echo $msg; ?></strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
     <?php }
      ?>
      <?php if (isset($_SESSION['rmsg'])) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong><?php echo $_SESSION['rmsg']; ?></strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php unset($_SESSION['rmsg']);
      } ?>
      <?php $obj = new wishlist();
      $rows = $obj->wishlistitemdetails($_SESSION['userid'], Dbh::connect());
      if (isset($rows)) { ?>
        <table class="table" style="cursor: context-menu;">
          <thead class="table-primary">
            <tr>
              <th scope="col">THUMBNAIL</th>
              <th scope="col">TITLE</th>
              <th scope="col">PRICE</th>
              <th scope="col">ADD TO CART</th>
              <th scope="col">REMOVE</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ($rows as $row) {
              $modalId = "staticBackdrop" . $row['wishlistid']; ?>
              <tr class="vertical-center">
                <td><img src="<?php echo $row['image']; ?>" class="table-image"></td>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td>
                  <form action="../control/addtocart.php" method="post"><!--addtocart-->

                    <input type="hidden" name="userid" value="<?php echo $_SESSION['userid']; ?>">
                    <input type="hidden" name="itemid" value="<?php echo $row['productid']; ?>">
                    <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                    <input type="hidden" name="pname" value="<?php echo $row['product_name']; ?>">
                    <input type="hidden" name="img" value="<?php echo $row['image']; ?>">
                    <button type="submit" class="btn btn-secondary" name="addtocart" style="--bs-btn-color:#FFFF;--bs-btn-bg:#897062;--bs-btn-border-color:none; --bs-btn-hover-bg:#4c3f31;">Add to Cart</button>
                  </form>
                </td>
                <td> <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#<?php echo $modalId; ?>" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .6rem; --bs-btn-font-size: .75rem;"> <i class="fa-solid fa-circle-xmark" style="font-size:1.6rem;cursor: pointer;margin-left:.7rem;"></i> </button>
                  <div class="modal fade" id="<?php echo $modalId; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="<?php echo $modalId; ?>Label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-sm">
                      <div class="modal-content" style="background:#AE9D92;color:#ffff;">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="<?php echo $modalId; ?>Label">Do you Want to Remove?</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <form action="../control/wishlistcon.php" method="post"><!--form data-->
                            <input type="hidden" name="wishlistid" value="<?php echo $row['wishlistid']; ?>">
                            <button type="submit" class="btn btn-danger" name="remove">
                              Remove
                            </button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            <?php } ?>


          </tbody>
        </table>
      <?php } else { ?>
        <h3>No Item Add Wishlist</h3>
      <?php }
      ?>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>