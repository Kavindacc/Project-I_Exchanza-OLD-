<?php

    class validateCardDetails{
        function validation(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Retrieve form data with null coalescing operator to handle unset keys
                $card = $_POST['card'] ?? '';
                $name = $_POST['name'] ?? '';
                $cardNumber = $_POST['cardNumber'] ?? '';
                $expDate = $_POST['expDate'] ?? '';
                $cvv = $_POST['cvv'] ?? '';                   
            
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
        
    $card = $_POST['card'] ?? '';

    if ($card == "card") {

        $cardDetails = new validateCardDetails(); 
        // Call the validation method
        $validationResult = $cardDetails->validation();

        // Check the validation result and output it
        if ($validationResult === true) {
            $po = new save();
            $spo = $po->place_orderdb();
            $cd = new save();
            $scd = $cd->card_detailsdb();
        } 

    }

?>