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
    
    <!----Cart items details----->

    <div class="small-container cart-page">

    <!----Title----->
    <div class="title"><big><b>Shopping Bag</b></big></div>
    <br>
    <!----Cart table----->
         <table>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                       <img src="../img/Paige Dress.jpg" >
                       <div>
                        <p><b>Paige Dress</b></p>
                        <br>
                        <a href="">Remove</a>
                       </div>
                    </div>
                </td>
                <td>Rs.7000.00</td>
                <td><input type="number" value="1"></td>
                <td>Rs.7000.00</td>
            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                       <img src="../img/Dress.jpg" >
                       <div>
                        <p><b>Cami Dress</b></p>
                        <br>
                        <a href="">Remove</a>
                       </div>
                    </div>
                </td>
                <td>Rs.5500.00</td>
                <td><input type="number" value="1"></td>
                <td>Rs.5500.00</td>
            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                       <img src="../img/Cap.jpg" >
                       <div>
                        <p><b>Cap</b></p> 
                        <br>
                        <a href="">Remove</a>
                       </div>
                    </div>
                </td>
                <td>Rs.2000.00</td>
                <td><input type="number" value="2"></td>
                <td>Rs.4000.00</td>
            </tr
            <tr>
                <td>
                    <div class="cart-info">
                       <img src="../img/Women's Skirt.jpg" >
                       <div>
                        <p><b>Women's Skirt</b></p>
                        <br>
                        <a href="">Remove</a>
                       </div>
                    </div>
                </td>
                <td> Rs.4000.00</td>
                <td><input type="number" value="1"></td>
                <td>Rs.4000.00</td>
            </tr>
         </table>

         <div class="total-price">
            
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>Rs.20500.00</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>Rs.20500.00</td>
                </tr>
                <br>
                <tr>
                    <td>Shipping</td>
                    <td><small><b>Shipping costs are calculated during checkout</b></small></td>
                </tr>
               <tr>
                <td colspan="2">
                    <div>
                        <button class="checkout">Checkout</button>
                    </div>
                </td>
               </tr>
            </table>
            <br>
            
         </div>

    </div>

<!-------footer------->

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
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="view/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>



</body>
</html>

