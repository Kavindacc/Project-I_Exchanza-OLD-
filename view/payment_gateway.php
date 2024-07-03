<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title></title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel="stylesheet" href="payment_gateway_style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>


<body className='snippet-body'>
    <div class="card">
        <div class="card-top border-bottom text-center">
            <a href="#"> Back to shop</a>
            <span id="logo"></span>
        </div>
        <div class="card-body">
            <div class="row upper">
                <span><i class="fa fa-check-circle-o"></i> Shopping bag</span>
                <span><i class="fa fa-check-circle-o"></i> Order details</span>
                <span id="payment"><span id="three">3</span>Payment</span>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="left border">

                        <form action="http://localhost/Project-I_Exchanza/payment%20gateway/model/index.php?" method="POST">
                            <ul class="list-unstyled components mb-5">
                                <li class="active">
                                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="header">
                                            <h4>Card Payment &nbsp</h4>
                                        </span></a>
                                    <ul class="collapse list-unstyled" id="homeSubmenu">
                                        <li>
                                            <input type="checkbox">&nbsp Card Payment
                                            <div class="row">

                                                <div class="icons">
                                                    <img src="https://img.icons8.com/color/48/000000/visa.png" />
                                                    <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" />
                                                    <img src="https://img.icons8.com/color/48/000000/maestro.png" />
                                                </div>
                                            </div>
                                            <span>Cardholder's name:</span>
                                            <input type="text" name="name" placeholder="Kasun Janith">
                                            <span>Card Number:</span>
                                            <input type="text" name="card_number" placeholder="0125 6780 4567 9909">
                                            <div class="row">
                                                <div class="col-md-5"><span>Expiry date:</span>
                                                    <input placeholder="YY/MM">
                                                </div>
                                                <div class="col-md-5"><span>CVV:</span>
                                                    <input id="cvv">
                                                </div>
                                            </div>
                                            <input type="checkbox" id="save_card" class="align-left">
                                            <label for="save_card">Save card details to wallet</label>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="header">
                                    <h4>Cash On Delevery &nbsp</h4>
                                </span></a>
                            <ul class="collapse list-unstyled" id="pageSubmenu">
                                <li>
                                    <input type="checkbox">&nbsp Cash On Delevery
                                </li>
                            </ul>
                            </li>
                            <hr>


                            <div id="error_msg">

                                <?php

                                    echo "<span class='alert alert-danger'></span>";

                                ?>

                            </div>


                    </div>
                </div>
                <div class="col-md-5">
                    <div class="right border">
                        <div class="header">Order Summary</div>
                        <p>2 items</p>
                        <div class="row item">
                            <div class="col-4 align-self-center"><img class="img-fluid" src="https://i.imgur.com/79M6pU0.png"></div>
                            <div class="col-8">
                                <div class="row"><b>$ 26.99</b></div>
                                <div class="row text-muted">Be Legandary Lipstick-Nude rose</div>
                                <div class="row">Qty:1</div>
                            </div>
                        </div>

                        <hr>
                        <div class="row lower">
                            <div class="col text-left">Subtotal</div>
                            <div class="col text-right">$ 46.98</div>
                        </div>
                        <div class="row lower">
                            <div class="col text-left">Delivery</div>
                            <div class="col text-right">Free</div>
                        </div>
                        <div class="row lower">
                            <div class="col text-left"><b>Total to pay</b></div>
                            <div class="col text-right"><b>$ 46.98</b></div>
                        </div>
                        <div class="row lower">
                            <div class="col text-left"><a href="#"><u>Add promo code</u></a></div>
                        </div>
                        <input type="submit" value="Place order" class="btn btn-primary">
                        <p class="text-muted text-center">Complimentary Shipping & Returns</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div>
        </div>
    </div>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript'>
        
    </script>
    <script type='text/javascript'>
        var myLink = document.querySelector('a[href="#"]');
        myLink.addEventListener('click', function(e) {
            e.preventDefault();
        });
    </script>


</body>

</html>