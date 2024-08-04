<?php
require '../model/dbconnection.php';
require '../model/products.php';
require '../model/usern.php';
session_start();
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="cartstyle.css">
    <title>Cart</title>
</head>

<body>

    <!----Navigation bar----->

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
                            <a class="nav-link " aria-current="page" href="../index.php">Home</a>
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
                            <?php $obj = new RegisteredCustormer();
                       $count = $obj->wishlistiteamcount($_SESSION['userid'], Dbh::connect()); ?>
                      <a href="wishlist.php" class="nav-link  text-decoration-none mx-1"><i class="fa-regular fa-heart position-relative"><span class="position-absolute translate-middle badge rounded-pill bg-dark sp"><?php if (isset($count)) { echo $count; } else {  echo 0; } ?></span></i></a><!--addto wishlist-->
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

    <!----Cart items details----->

    <?php

       $obj = new wishlist();
       $rows = $obj->getadditems($userid, Dbh::connect());?>
      
    <div class="small-container cart-page">

        <!----Title----->
        <div class="title"><h2><b>Shopping Bag</b></h2></div>
        <br>
      <?php  if (!empty($rows)) {?>
        <!----Cart table----->
        <table id="cart-table" table class="table" style="cursor: context-menu;">
        <thead class="table-primary">
            <tr>
                <th>Product</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
            <?php 
                foreach ($rows as $row) { ?>
                    <tr class="vertical-center">
                        <td>
                            <div class="cart-info">
                                <img src="<?php echo $row['img']; ?>">
                                <div>
                        </td>
                        <td><?php echo $row['pname']; ?></td>
                        <td class="price"><?php echo $row['price']; ?></td>
                        <td><form action="payment_gateway.php" method="POST"><input type="number" name="quantity" value="<?php echo $row['quantity']; ?>" min="1" class="quantity"></form></td>
                        <td class="subtotal"><?php echo $row['price']; ?></td>
                    </tr>
            <?php }
            ?>
        </table>

        <div class="total-price">

            <table>
                <tr>
                    <td>Subtotal</td>
                    <td id="cart-subtotal"></td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td id="cart-total"></td>
                </tr>
                <br>
                <tr>
                    <td>Shipping</td>
                    <td><small><b>Shipping costs are calculated during checkout</b></small></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div>
                           <a href="payment_gateway.php"><button class="checkout">Checkout</button></a> 
                        </div>
                    </td>
                </tr>
            </table>
            <br>

        </div>

    </div>
    <?php } else{?>
        <h3>No Item Add to Cart</h3>

   <?php }?>


    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="view/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cartTable = document.getElementById('cart-table');
            const quantityInputs = cartTable.querySelectorAll('.quantity');
            const removeButtons = cartTable.querySelectorAll('.btn-remove');
            const cartSubtotal = document.getElementById('cart-subtotal');
            const cartTotal = document.getElementById('cart-total');

            function updateSubtotal(row) {
                const price = parseFloat(row.querySelector('.price').textContent);
                const quantity = parseInt(row.querySelector('.quantity').value);
                const subtotal = price * quantity;
                row.querySelector('.subtotal').textContent = subtotal.toFixed(2);
            }

            function updateCartTotal() {
                let total = 0;
                cartTable.querySelectorAll('.subtotal').forEach(subtotal => {
                    total += parseFloat(subtotal.textContent);
                });
                cartSubtotal.textContent = `Rs.${total.toFixed(2)}`;
                cartTotal.textContent = `Rs.${total.toFixed(2)}`;
            }

            quantityInputs.forEach(input => {
                input.addEventListener('change', function() {
                    updateSubtotal(this.closest('tr'));
                    updateCartTotal();
                });
            });

            removeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    this.closest('tr').remove();
                    updateCartTotal();
                });
            });

            // Initial update
            updateCartTotal();
        });
    </script>



</body>

</html>