<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="thrift men.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <title>Thrift Men </title>
</head>

<body>
<!--nav bar-->
 <nav class="navbar navbar-expand-lg sticky-top nav">
    <!-- latest added -->
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
                            <a class="nav-link active" href="../view/thrift.php">Thrift</a>
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
                        

                            <a href="userpage.php" class=" text-decoration-none"><i class="fa-regular fa-circle-user" style="font-size:1.5rem;"></i></a>

                         
                            <a href="login.php" class=" text-decoration-none"><button class="lo-button btn-sm ms-2 px-3"style="color:#ffff;">login</button></a>
                        
                    </div>
                </div>
            </div>
        </div>
    </nav>

<!-- thrift arena -->
    <div class="container arena">
        <div class="artext">
            <p>Thrift Arena</p>
        </div>

        <div class="but">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link " id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" 
                    aria-controls="home-tab-pane" aria-selected="false" onclick="window.location.href='thrift.php';">Women</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab"
                    aria-controls="profile-tab-pane" aria-selected="true" onclick="window.location.href='thrift_men.php';">Men</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" 
                    aria-controls="contact-tab-pane" aria-selected="false" onclick="window.location.href='thrift_kids.php';">Kids</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade " id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0"></div>
                <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0"></div>
                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0"></div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        </div>
        <!-- <a href="sidepanel.php" target="_blank" aria-label="Plus Icon">  -->
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" 
        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle" id="openPanel">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="12" y1="8" x2="12" y2="16"></line>
            <line x1="8" y1="12" x2="16" y2="12"></line>
        </svg>
        <!-- </a> -->
    </div>
<!-- sidepanel -->
    <div id="sidePanel" class="side-panel">
        <button id="closePanel" class="close-btn">&times;</button>
        <img src="../img/thriftstat3.jpg" alt="Thrift Image" class="panel-image">
        <p class="panel-description">
            Thrifting is an excellent way to save money, reduce waste, and support sustainable fashion.
            By thrifting items, you can find unique pieces while also contributing to a more eco-friendly world.
        </p>

        
            <button class="add-item-btn" style="width:100%;" onclick="showForm()">Add Item to sell</button>
            <div id="addItemForm" class="add-item-form"> </div>
       
     </div>     
 <!-- Popup overlay and form -->
 <div id="popupForm" class="popup-overlay">
    <div class="popup-content">
        <button id="closePopup" class="close-btn">&times;</button>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="mb-4">Add Item to Resell</h2>
                    <form id="resellForm">
                        <div class="form-group">
                            <label for="itemName" class="bold">Item Name</label>
                            <input type="text" class="form-control" id="itemName" placeholder="Enter item name" required>
                        </div>
                        <div class="form-group">
                            <label for="price" class="bold">Price (Rs.)</label>
                            <input type="number" class="form-control" id="price" placeholder="Enter price" required>
                        </div>
                        <div class="form-group">
                            <label for="color" class="bold">Color</label>
                            <input type="color" class="form-control" id="color" required>
                        </div>
                        <div class="form-group">
                            <label for="coverImage" class="bold">Cover Image</label>
                            <input type="file" class="form-control-file" id="coverImage" required>
                        </div>
                        <div class="form-group">
                            <label for="otherImages" class="bold">Other Images (Optional)</label>
                            <input type="file" class="form-control-file" id="otherImages" multiple>
                        </div>
                        <div class="form-group">
                            <label for="description" class="bold">Description</label>
                            <textarea class="form-control" id="description" rows="3" placeholder="Enter description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category" class="bold">Category</label>
                            <select class="form-control" id="category" required>
                                <option value="">Select Category</option>
                                <option value="men">Men</option>
                                <option value="women">Women</option>
                                <option value="kids">Kids</option>
                            </select>
                        </div>
                        <div class="form-group hidden" id="subcategoryWrapper">
                            <label for="subcategory" class="bold">Subcategory</label>
                            <select class="form-control" id="subcategory">
                                <option value="">Select Subcategory</option>
                                <option value="tops">T Shirts</option>
                                <option value="dresses">Shirts</option>
                                <option value="pants">Pants</option>
                                <option value="accessories">Suits</option>
                                <option value="bags">Accessories</option>
                                <option value="shoes">Shoes</option>
                            </select>
                        </div>
                        <div class="form-group hidden" id="sizeChartWrapper">
                            <label class="bold">Size</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="size" id="sizeS" value="S">
                                <label class="form-check-label" for="sizeS">S</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="size" id="sizeM" value="M">
                                <label class="form-check-label" for="sizeM">M</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="size" id="sizeL" value="L">
                                <label class="form-check-label" for="sizeL">L</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="size" id="sizeXL" value="XL">
                                <label class="form-check-label" for="sizeXL">XL</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="timesUsed" class="bold">Condition</label>
                            <input type="number" class="form-control" id="timesUsed" placeholder="Enter number of times used" required>
                            <small class="form-text text-muted">Please provide an estimate of how many times this item has been used.</small>
                        </div>
                        <button type="submit" class="btn btn-primary ssubmit">Submit</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h2>Preview</h2>
                    <div class="card card-preview">
                        <img id="previewImage" src="https://via.placeholder.com/150" alt="Item image">
                        <div class="card-body">
                            <h5 class="card-title" id="previewName">Item Name</h5>
                            <p class="card-text" id="previewDescription">Description</p>
                            <p class="card-text" id="previewCategory">Category</p>
                            <p class="card-text" id="previewSubcategory">Subcategory</p>
                            <p class="card-text" id="previewSize">Size</p>
                            <p class="card-text" id="previewTimesUsed">Times Used: 0</p>
                            <h5 class="card-text" id="previewPrice">Rs. 0.00</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="sidepanel.js"></script> 
 </div>


<!-- image container -->
    <div class="container thrift" id="thriftwomen">
        <img src="../img/thrift-men.png" alt="women thrift intro" class="thriftwomen">

        <div class="text-block">

            <h1 align="center">Men</h1>
            <pre class="para1">
        “Most of my wardrobe is vintage and I’ve worn dresses to the Oscars that
        I got for $10.At Sean Penn’s last Haiti gala I wore this vintage dress that 
        I’d worn to a film premiere in 2005.I know that’s kind of a no-no in the
        fashion world, but why wear something just once if you love it?”

                                                                         <b>Winona Ryder</b> -Red, April 2014 </pre><br>

        </div>
    </div>

<!-- cats -->
 <div class="container text-center">
  <div class="row row-cols-6 catr">

    <div class="col r1">
        <a href="cat_items_template.php?cat=men&sub=t-shirts">
            <img src="../img/mens t shirt.jpg" alt="men thrift cat1" class="rounded-circle img-fluid twc1" >
        </a>
        <p class="hide"> T-Shirts </p>
    </div>
    
    <div class="col r2">
        <a href="cat_items_template.php?cat=men&sub=shirts">    
            <img src="../img/mens shirt.jpg" alt="men thrift cat2" class="rounded-circle img-fluid twc2" >
        </a>
        <p class="hide"> Shirts </p>
    </div>

    <div class="col r3"> 
        <a href="cat_items_template.php?cat=men&sub=pants"> 
            <img src="../img/men denim.jpg" alt="men thrift cat3" class="rounded-circle img-fluid twc3" >
        </a>
        <p class="hide"> Pants </p>  
    </div>

    <div class="col r4">
        <a href="cat_items_template.php?cat=men&sub=suits"> 
            <img src="../img/men suits.jpg" alt="men thrift cat4" class="rounded-circle img-fluid twc4" >
        </a>
        <p class="hide"> Suits  </p> 
    </div>

    <div class="col r5">
        <a href="cat_items_template.php?cat=men&sub=accessories"> 
            <img src="../img/men acs.jpg" alt="men thrift cat5" class="rounded-circle img-fluid twc5" >
        </a>
        <p class="hide"> Accessories </p> 
    </div>

    <div class="col r6">
        <a href="cat_items_template.php?cat=men&sub=shoes"> 
            <img src="../img/men shoes.jpg" alt="men thrift cat6" class="rounded-circle img-fluid twc6" >
        </a>
        <p class="hide"> Shoes </p>  
    </div>
  </div>
  <!-- <div class="row row-cols-6 catt">
    <div class="col t1"> 
         <p> T-Shirts </p>                   
    </div>
    <div class="col t2"> 
         <p> Shirts </p>                   
    </div>
    <div class="col t3"> 
         <p> Pants </p>                   
    </div>
    <div class="col t4"> 
         <p> Suits  </p>                   
    </div>
    <div class="col t5"> 
         <p> Accessories </p>                   
    </div>
    <div class="col t6"> 
         <p> Shoes </p>                   
    </div>
  </div>  -->

 </div>

 
<!-- review  div-->
    <div class="container ">
        <div class="row des">
            <div class="col-5 stat">
                <h2>Why Thrift</h2>
                <div class="row stat1">
                    <img src="../img/thriftstat.jpg" alt="thrift stat" class="rounded-circle img-fluid ts1">
                    <h3>QUALITY ASSURED</h3>
                    <p>We quality check every single item on<br><b>Exchanza.</b><br>No more surprise stains or fake brands. </p>
                </div>
                <div class="row stat2">
                    <img src="../img/thrift stat2.jpg" alt="thrift stat" class="rounded-circle img-fluid ts2">
                    <h3>QUALITY ASSURED</h3>
                    <p>We quality check every single item on<br><b>Exchanza.</b><br>No more surprise stains or fake brands. </p>
                </div>
                <div class="row stat3">
                    <img src="../img/thrift stat4.jpg" alt="thrift stat" class="rounded-circle img-fluid ts3">
                    <h3>QUALITY ASSURED</h3>
                    <p>We quality check every single item on<br><b>Exchanza.</b><br>No more surprise stains or fake brands. </p>
                </div>
            </div>
            <div class="col-7">
                <div class="container text-center">
                    <h2>Hear It From Others</h2>
                    <div class="row revieW">
                        <section class="reviews">
                            <div class="review1">
                                <img src="https://via.placeholder.com/150" alt="George">
                                <blockquote>
                                    <p>"Secondhand has never been so simple. There's no reason to buy new anymore. You get great quality clothes and you're doing some good for the planet."</p>
                                    <cite>George</cite>
                                </blockquote>
                            </div>
                            <div class="review2">
                                <img src="https://via.placeholder.com/150" alt="Alex">
                                <blockquote>
                                    <p>"I've never been into thrifting because I thought it would take too much time - but Thrift+ has converted me! It's so quick and easy to find exactly what I am looking for."</p>
                                    <cite>Alex</cite>
                                </blockquote>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--footer-->
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    
    <script src="sidepanel.js"></script>

</body>

</html>