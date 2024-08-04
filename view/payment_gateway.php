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
    <title>payment</title>
</head>


<body className='snippet-body'>
    <div class="card">
        <div class="card-top border-bottom text-center">
            <a href="#"> Back to cart</a>
            <span id="logo"></span>
        </div>
        <div class="card-body">            
            <div class="row">
                <div class="col-md-7">
                    <div class="left border">
                    <form method="POST" action="payment_gateway.php">
                    <lable for="name">Full name: </lable><br>
                    <input type="text" name="name" id="name" required><br>
                    <lable for="addres">Address: </lable><br>
                    <input type="text" name="addres" id="addres" required><br>
                    <lable for="city">City: </lable><br>
                    <input type="text" name="city" id="city" required><br>
                    <lable for="zip">Zip: </lable><br>
                    <input type="text" name="zip" id="zip" required><br>
                    <lable for="district">Distric: </lable><br>
                    <select name="district" id="district" required>
                        <option value="Colombo">Colombo</option>
                        <option value="Gampaha">Gampaha</option>
                        <option value="Kalutara">Kalutara</option>
                        <option value="Kandy">Kandy</option>
                        <option value="Matale">Matale</option>
                        <option value="Nuwara Eliya">Nuwara Eliya</option>
                        <option value="Galle">Galle</option>
                        <option value="Matara">Matara</option>
                        <option value="Hambantota">Hambantota</option>
                        <option value="Jaffna">Jaffna</option>
                        <option value="Kilinochchi">Kilinochchi</option>
                        <option value="Mannar">Mannar</option>
                        <option value="Vavuniya">Vavuniya</option>
                        <option value="Mullaitivu">Mullaitivu</option>
                        <option value="Batticaloa">Batticaloa</option>
                        <option value="Ampara">Ampara</option>
                        <option value="Trincomalee">Trincomalee</option>
                        <option value="Kurunegala">Kurunegala</option>
                        <option value="Puttalam">Puttalam</option>
                        <option value="Anuradhapura">Anuradhapura</option>
                        <option value="Polonnaruwa">Polonnaruwa</option>
                        <option value="Badulla">Badulla</option>
                        <option value="Moneragala">Moneragala</option>
                        <option value="Ratnapura">Ratnapura</option>
                        <option value="Kegalle">Kegalle</option>
                    </select><br>
                    <lable for="province">Province: </lable><br>
                    <select name="province" id="province" required>
                        <option value="Central">Central</option>
                        <option value="Eastern">Eastern</option>
                        <option value="Northern">Northern</option>
                        <option value="Southern">Southern</option>
                        <option value="Western">Western</option>
                        <option value="North Western">North Western</option>
                        <option value="North Central">North Central</option>
                        <option value="Uva">Uva</option>
                        <option value="Sabaragamuwa">Sabaragamuwa</option>
                    </select><br><br>

                    <ul class="list-unstyled components mb-5">
                        <li class="active">
                            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="header">
                                <div class="header">Card Payment &nbsp</div>
                                </span></a>
                            <ul class="collapse list-unstyled" id="homeSubmenu">
                                <li>
                                    Card Payment &nbsp <input type="checkbox" name="card" value="card"> <span class="text-danger">*required</span>
                                    <div class="row">

                                        <div class="icons">
                                            <img src="https://img.icons8.com/color/48/000000/visa.png" />
                                            <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" />
                                            <img src="https://img.icons8.com/color/48/000000/maestro.png" />
                                        </div>
                                    </div>
                                    <span>Cardholder's name:</span>
                                    <input type="text" name="name" placeholder="Kasun Janith" required autocomplete="on">
                                    <span>Card Number:</span>
                                    <input type="text" name="cardNumber" placeholder="0125 6780 4567 9909" required autocomplete="on">
                                    <div class="row">
                                        <div class="col-md-5"><span>Expiry date:</span>
                                            <input type="text" name="expDate" placeholder="YY-MM" required autocomplete="on">
                                        </div>
                                        <div class="col-md-5"><span>CVV:</span>
                                            <input type="text" name="cvv" id="cvv" required autocomplete="on">
                                        </div>
                                    </div>
                                    <input type="checkbox" id="saveCard" class="align-left" name="save" value="save">
                                    <label for="save_card">Save card details to wallet</label>
                                </li>
                            </ul>
                        </li>
                    </ul>


                <div>
                    <span id="error_msg" class="text-danger"></span>   
                </div>

                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <span class="header">
                <div class="header">Cash On Delevery &nbsp</div>
                </span>
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        &nbsp Cash On Delevery  &nbsp <input type="checkbox" name="cod"> 
                        <span class="text-danger">*required</span>
                    </li>
                </ul>

                <a href="totalpay"><input type="submit" value="Submit" class="btn btn-primary"></a>
                            


            </div>
        </div>
                <div id="summary" class="col-md-5">
                    <div class="right border">
                        <div class="header">Order Summary</div>
                        <hr>
                        <p>2 items</p>
                        <hr>

                        <span class="item">

                            <div class="row item">
                                <div class="col-4 align-self-center"><img class="img-fluid" src="https://i.imgur.com/79M6pU0.png"></div>
                                <div class="col-8">
                                    <div class="row"><b><span id="unit_price">$ 26.99</span></b></div>
                                    <div class="row text-muted"><span id="unit_name">Be Legandary Lipstick-Nude rose</span></div>
                                    <div class="row"><span id="unit_qty">Qty:1</span></div>
                                </div>
                            </div>

                        </span>

                        <hr>
                           
                            <div class="row lower">
                                <div class="col text-left">Subtotal</div>
                                <div class="col text-right"><span id="subtotal">$ 46.98</span></div>
                            </div>

                            <div class="row lower">
                                <div class="col text-left">Delivery</div>
                                <div class="col text-right"><span id="delivery">Free</span></div>
                            </div>

                            <div id="totalpay" class="row lower">
                                <div class="col text-left"><b>Total to pay</b></div>
                                <div class="col text-right"><b><span id="tot">$ 46.98</span></b></div>
                            </div>

                        
                        
                        <hr>

                        <input type="button" value="Buy now" class="btn btn-primary" onclick="errormsg()" >

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
    

    <?php
        // Database connection
        //require '../model/payment_gateway_dbconnection.php';
        require '../control/save.php';
        require '../control/validation.php';

        $val = new validateCardDetails();
        $valcall = $val->validation();

    ?>


    <script>

        function errormsg(){

            var card = "card";
            var card = "<?php echo $card ?>";
            
            if((card == "card") && ("<?php echo $validationResult; ?>" != 1)){

                document.getElementById("error_msg").innerHTML="<?php echo $validationResult; ?>";              
                
            }

            else{
                doPayment();
            }

            
        } 

        function doPayment(){
            var randomNumber = Math.floor(Math.random() * 101);
            if ((parseInt(randomNumber)) % 2 == 0) {
                var message = "Can't do the payment.";
                alert(message);
            } else {
                var message = "Payment Successful.";
                alert(message);
                window.location.href = "http://localhost/Project-I_Exchanza/index.php";
            }
        }


        

    </script>  


</body>

</html>