<?php session_start(); 

include_once '../model/auction.php';

// Create an instance of the Auction class
$auction = new Auction();

// Fetch data using the model methods
$ongoingBids = $auction->getOngoingAuctions();
$upcomingBids = $auction->getUpcomingAuctions();
$finishedBids = $auction->getFinishedAuctions();


    date_default_timezone_set('Asia/Colombo');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Bidding</title>
    <!-- countdown Function -->
    
    <script>
    
    function updateCountdown(startTime, endTime, countdownDomId, auctionId) {
            var interval = setInterval(function() {
                let startDate = new Date(startTime);
                let endDate = new Date(endTime);

                if (!startDate) {
                    document.getElementById(countdownDomId).innerHTML = '00:00:00:00';
                } else {
                    var now = new Date().getTime();
                    var distanceToStart = startDate.getTime() - now;
                    var distanceToEnd = endDate.getTime() - now;
                    var timeLabel = "Time Left to Start: ";

                    if (distanceToStart < 0) {
                        if (distanceToEnd < 0) {
                            clearInterval(interval);
                            document.getElementById(countdownDomId).innerHTML = 'Bidding finished';
                            moveToFinished(auctionId);
                            return;
                        } else {
                            distanceToStart = distanceToEnd;
                            timeLabel = "Time Left to End: ";
                            moveToOngoing(auctionId);
                        }
                    }

                    var days = Math.floor(distanceToStart / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distanceToStart % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distanceToStart % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distanceToStart % (1000 * 60)) / 1000);

                    document.getElementById(countdownDomId).innerHTML = `${timeLabel} ${(days + '').padStart(2, '0')}:${(hours + '').padStart(2, '0')}:${(minutes + '').padStart(2, '0')}:${(seconds + '').padStart(2, '0')}`;
                }
            }, 1000);
        }

        function moveToOngoing(auctionId) {
            var bidCard = document.getElementById('bidCard' + auctionId);
            var ongoingContainer = document.querySelector('.ongoing .product-container');
            if (bidCard && ongoingContainer && !bidCard.classList.contains('moved-to-ongoing')) {
                ongoingContainer.appendChild(bidCard);
                bidCard.classList.add('moved-to-ongoing');
                var bidButton = bidCard.querySelector('.card-btn');
                bidButton.innerHTML = "Bid Now";
            }
        }

        function moveToFinished(auctionId) {
            var bidCard = document.getElementById('bidCard' + auctionId);
            var finishedContainer = document.querySelector('.finished .product-container');
            if (bidCard && finishedContainer && !bidCard.classList.contains('moved-to-finished')) {
                finishedContainer.appendChild(bidCard);
                bidCard.classList.add('moved-to-finished');
                var bidButton = bidCard.querySelector('.card-btn');
                bidButton.innerHTML = "View Bid";
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            <?php foreach ($ongoingBids as $auction) { ?>
                updateCountdown('<?php echo $auction['start_time']; ?>', '<?php echo $auction['end_time']; ?>', 'ongoingCountdown<?php echo $auction['auction_id']; ?>', <?php echo $auction['auction_id']; ?>);
            <?php } ?>

            <?php foreach ($upcomingBids as $auction) { ?>
                updateCountdown('<?php echo $auction['start_time']; ?>', '<?php echo $auction['end_time']; ?>', 'upcomingCountdown<?php echo $auction['auction_id']; ?>', <?php echo $auction['auction_id']; ?>);
            <?php } ?>

            <?php foreach ($finishedBids as $auction) { ?>
                updateCountdown('<?php echo $auction['start_time']; ?>', '<?php echo $auction['end_time']; ?>', 'finishedCountdown<?php echo $auction['auction_id']; ?>', <?php echo $auction['auction_id']; ?>);
            <?php } ?>
        });


    </script>

    <style type="text/tailwindcss">
        .product{
            @apply relative overflow-hidden p-[20px];
        }
        .product-category{
            @apply py-0 px-[10vw] text-[30px] font-[500] mb-[40px] capitalize text-[#4C3F31];
        }
        .product-container{
            @apply py-1 px-[10vw] flex overflow-y-hidden overflow-x-auto scroll-smooth;
        }
        .product-container::-webkit-scrollbar{
            @apply hidden;
        }
        .product-card{
            @apply flex-[0_0_auto] w-[250px] h-[450px] mr-[40px]; 
        }
        .product-image{
            @apply relative w-full h-[350px] overflow-hidden transition-all duration-300 hover:scale-105;
        }
        .product-thumb{
            @apply w-full h-full object-cover;
        }
        .countdown-tag {
            @apply absolute bg-[#746557] p-[5px] rounded-[5px] text-[#e7e0dc] right-[10px] top-[10px] capitalize;
        }
        .card-btn{
            @apply absolute bottom-[10px] left-[50%] -translate-x-1/2  p-[10px] w-[50%] capitalize border-[#746557] bg-[#CEC0B9] rounded-[10px] duration-[0.5s] cursor-pointer opacity-0 text-[#4C3F31];    
        }
        .product-card:hover .card-btn {
            @apply opacity-100;
        }

        .card-btn:hover{
            @apply bg-[#746557] text-[#fff]  scale-110 tracking-widest ;
        }
        .product-info{
            @apply w-full h-full pt-[10px];
        }
        /* .product-brand{
            @apply ;
        } */
        .product-short-description{
            @apply w-full h-[20px] leading-[20px] overflow-hidden opacity-[0.5] capitalize my-[5px] text-black;
        }
        .price{
            @apply font-extrabold text-[20px];
        }
        .actual-price{
            @apply ml-[20px] opacity-50 line-through;
        }
        .pre-btn,.nxt-btn{
            @apply border-0 w-[10vw] h-full absolute top-0 flex justify-center items-center bg-gradient-to-r from-transparent to-[#e7e0dc] cursor-pointer z-20;
        }
        .pre-btn {
            @apply left-0 rotate-180;
        }
        .nxt-btn {
            @apply right-0;
        }
        .pre-btn img,
        .nxt-btn img {
            @apply opacity-20;
        }
        .pre-btn:hover img,
        .nxt-btn:hover img {
            @apply opacity-100;
        }
        .collection-container {
            @apply w-full grid grid-cols-2 gap-2.5;
        }
        .collection {
            @apply relative;
        }
        .collection img {
            @apply w-full h-full object-cover;
        }
        .collection p {
            @apply absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center text-white text-5xl capitalize;
        }
        .collection:nth-child(3) {
            @apply col-span-2 mb-2.5;
        }
        .addbit-btn{
            @apply p-2 my-2 w-[12%] uppercase font-semibold border-2 border-[#AE9D92] bg-[#CEC0B9] rounded-[4px] duration-[0.5s] cursor-pointer text-[#4C3F31] hover:scale-105 hover:tracking-widest hover:w-[13%] hover:text-[#d0bfae] hover:bg-[#746557];
        }
        .main-div#blur.active{
            @apply blur-[30px] pointer-events-none select-none;
        }
        #bidpopupform {
            @apply bg-white fixed top-[50%] left-[50%] -translate-x-1/2 -translate-y-1/2 p-[20px] shadow-lg rounded-[10px]  transition-opacity duration-500 w-[80vw] h-[81vh] invisible opacity-0;
        }
        #bidpopupform.active {
            @apply transition-[0.5s] opacity-100 visible; 
        }
        .f-title{
            @apply font-semibold text-[2.0rem] uppercase mb-2;
        }
        .bform-items{
            @apply py-1 pr-2 
        }
        .bflable{
            @apply font-semibold;
        }
        .form-control{
            @apply w-[60%] placeholder-[#897062] border border-[#AE9D92];
        }
        .form-control-file{
            @apply text-[#897062] border border-[#AE9D92] font-medium text-sm  file:cursor-pointer cursor-pointer file:border-0 file:py-2 file:px-4 file:mr-4 file:bg-[#CEC0B9] file:hover:bg-[#d6c5bc] file:text-[#4C3F31] rounded-md;
        }
        .form-control-time{
            @apply  w-[92%] p-2   text-[#7b6457]  border border-[#AE9D92] rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#CEC0B9] focus:border-[#CEC0B9] sm:text-sm uppercase;
        }
        .plsBid-btn{
            @apply p-[6px] my-2 w-[22%] uppercase font-semibold border-2 border-[#AE9D92] bg-[#CEC0B9] rounded-[4px] duration-[0.5s] cursor-pointer text-[#4C3F31] hover:scale-105 active:cursor-progress;
        }
        #previewImage{
            @apply w-[200px] h-[250px] overflow-hidden
        }

        

    </style>

    
</head>

<body>
    <!--nav bar-->
    <nav class="navbar navbar-expand-lg sticky-top nav" >
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
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="../view/thrift.php">Thrift</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="../view/bidding.php">Bidding</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="">Selling</a>
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

                            <a href="view/userpage.php" class=" text-decoration-none"><i class="fa-regular fa-circle-user"style="font-size:1.5rem;"></i></a>

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


    <!-- content -->
    <div id="blur" class="main-div flex w-full flex-col pb-10 px-10" >

        <!-- Hero Section -->
        <div class="flex flex-row w-full bg-[#F3F3F3] px-5 pt-4">
            <div class="relative w-full max-h-[450px] overflow-hidden rounded-[20px]">
                <img src="../img/Bidding/banner.png" alt="Exclusive rare collectibles auction" class="">
                <div class="absolute bottom-10 left-6 right-6  bg-opacity-80 pl-36 pt-3 rounded-md ">
                    <p class=" text-[rgb(116,101,87)] text-[20px] font-medium tracking-[0.25rem] mb-2">Hot Auctions</p>
                    <h2 class="uppercase text-[50px] font-semibold pr-[800px]">Exclusive rare collectibles auction</h2>
                    <p class="text-[25px] text-[#948276] font-semibold ">Join The Bidding War! 
                    <?php 
                    // date_default_timezone_set('Asia/Colombo');
                    // echo date("h:i:sa") . " "; echo gmdate("Y-m-d\TH:i:s\Z"); 
                    ?>
                    </p>

                    <?php if (!isset($_SESSION['logedin']) || $_SESSION['logedin'] !== true) { 
                            $currentPage = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];//get current page 
                            $_SESSION['redirect']=$currentPage;
                        ?> 
                        <a href="login.php" style="text-decoration: none;"><button class="adabit-btn">Add Your Bid</button></a>

                    <?php } else { ?>
                        <button class="addbit-btn" onclick=addBidForm()>Add Your Bid</button>
                        <div id="addItemForm" class="add-item-form"> </div>
                    <?php } ?>

                    
                    
                </div>
            </div>            
        </div>

        
       <!-- Ongoing Bidding Section -->
        <div class="flex flex-col px-12 pt-16 bg-red bg-[#F3F3F3] ongoing">
            <div class="product bg-[#CEC0B9] rounded-[20px]"> 
                <h2 class="product-category">Ongoing Bidding</h2>
                <button class="pre-btn"><img src="../img/Bidding/arrow.png" alt=""></button>
                <button class="nxt-btn"><img src="../img/Bidding/arrow.png" alt=""></button>
                <div class="product-container">
                    <?php foreach ($ongoingBids as $auction) { ?>
                        <div class="product-card" id="bidCard<?php echo $auction['auction_id']; ?>">
                            <div class="product-image rounded-[5px]">
                                <span class="countdown-tag">
                                    <span id="ongoingCountdown<?php echo $auction['auction_id']; ?>"></span>
                                </span>
                                <img src="<?php echo htmlspecialchars($auction['image']); ?>" class="product-thumb" alt="">
                                <button class="card-btn">Bid Now</button>
                            </div>
                            <div class="product-info">
                                <h2 class="product-brand"><?php echo htmlspecialchars($auction['product_name']); ?></h2>
                                <p class="product-short-description"><?php echo htmlspecialchars($auction['description']); ?></p>
                                <span class="price">Rs.<?php echo htmlspecialchars($auction['price']); ?></span>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Upcoming Bidding Section -->
        <div class="flex flex-col px-12 pt-16 bg-red bg-[#F3F3F3]">
            <div class="product bg-[#CEC0B9] rounded-[20px]"> 
                <h2 class="product-category">Upcoming Bidding</h2>
                <button class="pre-btn"><img src="../img/Bidding/arrow.png" alt=""></button>
                <button class="nxt-btn"><img src="../img/Bidding/arrow.png" alt=""></button>
                <div class="product-container">
                    <?php foreach ($upcomingBids as $auction) { ?>
                        <div class="product-card" id="bidCard<?php echo $auction['auction_id']; ?>">
                            <div class="product-image rounded-[5px]">
                                <span class="countdown-tag">
                                    <span id="upcomingCountdown<?php echo $auction['auction_id']; ?>"></span>
                                </span>
                                <img src="<?php echo htmlspecialchars($auction['image']); ?>" class="product-thumb" alt="">
                                <button class="card-btn">View Bid</button>
                            </div>
                            <div class="product-info">
                                <h2 class="product-brand"><?php echo htmlspecialchars($auction['product_name']); ?></h2>
                                <p class="product-short-description"><?php echo htmlspecialchars($auction['description']); ?></p>
                                <span class="price">Rs.<?php echo htmlspecialchars($auction['price']); ?></span>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Finished Bidding Section -->
        <div class="flex flex-col px-12 pt-16 bg-red bg-[#F3F3F3] finished">
            <div class="product bg-[#CEC0B9] rounded-[20px]"> 
                <h2 class="product-category">Finished Bidding</h2>
                <button class="pre-btn"><img src="../img/Bidding/arrow.png" alt=""></button>
                <button class="nxt-btn"><img src="../img/Bidding/arrow.png" alt=""></button>
                <div class="product-container">
                    <?php foreach ($finishedBids as $auction) { ?>
                        <div class="product-card" id="bidCard<?php echo $auction['auction_id']; ?>">
                            <div class="product-image rounded-[5px]">
                                <span class="countdown-tag">
                                    <span id="finishedCountdown<?php echo $auction['auction_id']; ?>"></span>
                                </span>
                                <img src="<?php echo htmlspecialchars($auction['image']); ?>" class="product-thumb" alt="">
                                <button class="card-btn">View Bid</button>
                            </div>
                            <div class="product-info">
                                <h2 class="product-brand"><?php echo htmlspecialchars($auction['product_name']); ?></h2>
                                <p class="product-short-description"><?php echo htmlspecialchars($auction['description']); ?></p>
                                <span class="price">Rs.<?php echo htmlspecialchars($auction['price']); ?></span>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

                
  
    <!-- Popup Form -->
    <div class=" overflow-y-auto" id="bidpopupform">
        <button id="fcancel-btn" onclick=addBidForm() class="fcancel-btn w-10 text-[1.8rem] ml-[98%] p-0 -mt-40 hover:scale-110 hover:transition-[0.8s]">&times;</button>                
        <div class="flex mx-10 my-2 gap-4">
            <div class="w-[60%] border-r-2 border-[#AE9D92]">
                <h2 class="f-title">ADD YOUR BID</h2>
                <form action="../control/biddingcon.php" method="POST" enctype="multipart/form-data" id="">
                    <div class="bform-items">
                                <label for="itemName"  class="bflable">Item Name</label>
                                <input type="text" class="form-control" id="itemName" placeholder="Enter item name" name="itemname" required>
                    </div>
                    <div class="bform-items">
                                <label for="price" class="bflable">Bid Starting Price (Rs.)</label>
                                <input type="number" class="form-control" id="price" placeholder="Enter the bid starting price." name="price" required>
                    </div>
                    <div class="flex">
                        <div class="bform-items">
                                    <label for="coverImage" class="bflable">Cover Image</label>
                                    <input type="file" class="form-control-file" id="coverImage" name="image" required>
                        </div>
                        <div class="bform-items">
                                    <label for="otherImages" class="bflable">Other Images (Optional)</label>
                                    <input type="file" class="form-control-file" id="otherImages" name="otherimage">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="bform-items py-2">
                                    <label for="bidstarttime" class="bflable">Bid Start Time: </label>
                                    <input type="datetime-local" id="bidstarttime" name="bidstarttime" required class="form-control-time">
                        </div>
                        <div class="bform-items py-2">
                                    <label for="bitendtime" class="bflable">Bid End Time: </label>
                                    <input type="datetime-local" id="bitendtime" name="bitendtime" required class="form-control-time">
                        </div>
                    </div>
                    <div class="bform-items">
                                <label for="description" class="bflable">Description</label>
                                <textarea class="form-control" id="description" rows="3" placeholder="Enter description" name="description" required></textarea>
                    </div>
                    <div>
                        <button class="plsBid-btn" name="submitBid">
                            Place Your Bid
                        </button>
                    </div>
                    
                </form>        
            </div>

            <div class="w-full md:w-[40%] overflow-y-auto pl-4">
                <h2 class="f-title">Bid Item Preview</h2>
                <div class="preview-container flex flex-col items-center border-[1px] border-[#AE9D92] rounded-lg p-4">
                    <img id="previewImage" src="https://via.placeholder.com/200x250" alt="Item image" class="mb-4 rounded-md w-[200px] h-[250px] overflow-hidden">
                    <div class="text-left">
                        <h5 class="break-words max-w-[200px] text-xl font-semibold mb-2 text-[#746557]" id="previewName">Item Name</h5>
                        <p class="text-[#897062] mb-2 break-words max-w-[200px]" id="previewDescription">Description</p>
                        <p class="text-[#897062] mb-2" id="prevBidStartingTime">Your Bid Starts at:
                        <Span class="" id="countdown" class="font-semibold"> 00:00:00:00</Span></p>
                        <h5 class="text-lg font-semibold text-[#6b564a]" id="previewPrice">Rs. 0.00</h5>
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
    <script src="bidScript.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const auctions = <?php echo json_encode($upcomingBids); ?>;
            auctions.forEach(function(auction) {
                updateCountdownUpcomming(auction.start_time, 'ongoingCountdown' + auction.auction_id);
            });
        });
    </script>

</body>


</html>