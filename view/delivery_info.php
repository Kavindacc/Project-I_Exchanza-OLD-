<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="delivery_info_css.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="delivery_info.php">

        <lable for="name">Full namne: </lable><br>
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

        <input type="submit" value="Place Order" onclick="validation()"><br><br>
        
    </form>

    <?php

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Use the null coalescing operator to provide default values if keys are not set
            $name = $_POST['name'] ?? '';
            $addres = $_POST['addres'] ?? '';
            $city = $_POST['city'] ?? '';
            $zip = $_POST['zip'] ?? '';
            $district = $_POST['district'] ?? '';
            $province = $_POST['province'] ?? ''; 
        }

    ?>

    <script>

        function validation(){
            var name = "<?php echo $name; ?>"
            var addres = "<?php echo $addres; ?>"
            var city = "<?php echo $city; ?>"
            var zip = "<?php echo $zip; ?>"
            var district = "<?php echo $district; ?>"
            var province = "<?php echo $province; ?>"

            if((name) != null){
                if((addres) != null){
                    if((city) != null){
                        if((zip) != null){
                            if((district) != null){
                                if((province) != null){
                                    window.location.href="http://localhost/Project-I_Exchanza/view/payment_gateway.php";
                                }
                            }
                        }
                    }
                }
            }
        }

    </script>

</body>
</html>

