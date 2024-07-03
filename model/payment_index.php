<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    // Database connection
    $conn = new mysqli('127.0.0.1', 'root', '6065031');

    if ($conn->connect_error) {
        echo "Error !!!";
    } 
    else{

        echo "Registration successfully...";




        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Use the null coalescing operator to provide default values if keys are not set
            $save = $_POST['save'] ?? null;
            $name = $_POST['name'] ?? '';
            $cardNumber = $_POST['cardNumber'] ?? '';
            $expDate = $_POST['expDate'] ?? '';
            $cvv = $_POST['cvv'] ?? '';

            class getCardDetails{
                public $save;
                public $name;
                public $cardNumber;
                public $expDate;
                public $cvv;

                public function paymentMethod($name, $cardNumber, $expDate, $cvv, $save){
                    if ($save == "card") {
                        $this->saveDetails($name, $cardNumber, $expDate, $cvv, $save);
                    }
                }

                function saveDetails($name, $cardNumber, $expDate, $cvv){
                    $this->name = $name;
                    $this->cardNumber = $cardNumber;
                    $this->expDate = $expDate;
                    $this->cvv = $cvv;
                }
            

            function validation($name, $cardNumber, $expDate, $cvv){
                // Validate name
                if (empty($name)) {
                    return "Name is required.";
                }

                // Validate card number (Basic check for 16 digits)
                if (!preg_match('/^\d{16}$/', $cardNumber)) {
                    return "Invalid card number. It must be 16 digits.";
                }

                // Validate expiration date (Basic check for YYYY-MM format)
                if (!preg_match('/^\d{2}-\d{2}$/', $expDate)) {
                    return "Invalid expiration date. Format must be YY-MM.";
                }

                // Validate CVV (Basic check for 3 or 4 digits)
                if (!preg_match('/^\d{3,4}$/', $cvv)) {
                    return "Invalid CVV. It must be 3 or 4 digits.";
                }

                return true; // If all validations pass
            }
        }
    }
}


    ?>


</body>

</html>