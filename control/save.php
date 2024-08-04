<?php

require '../model/payment_gateway_dbconnection.php';
class save{
    function card_detailsdb(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data with null coalescing operator to handle unset keys
            $card = $_POST['card'] ?? '';       
            $name = $_POST['name'] ?? '';
            $cardNumber = $_POST['cardNumber'] ?? '';
            $expDate = $_POST['expDate'] ?? '';
            $cvv = $_POST['cvv'] ?? '';
            $save = $_POST['save'] ?? '';

            // Check if the save button was clicked
            if ($save=="save" && $card=="card") {
                $db = new dbconnectionpg();
                $conn = $db->dbconnect();
                // Prepare the SQL statement with placeholders
                $stmt = $conn->prepare("INSERT INTO card_details (CardHolderName, CardNumber, ExpDate, cvv) VALUES (?, ?, ?, ?)");

                // Check if the preparation was successful
                if ($stmt) {
                    // Bind the parameters with appropriate types
                    $stmt->bind_param("ssss", $name, $cardNumber, $expDate, $cvv);

                    // Execute the statement
                    if ($stmt->execute()) {
                    } else {
                    }

                    // Close the statement
                    $stmt->close();
                } else {
                }
            }
        }
        return null;
    }

    function place_orderdb(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data with null coalescing operator to handle unset keys
            $fullname = $_POST['name'] ?? '';
            $addres = $_POST['addres'] ?? '';
            $city = $_POST['city'] ?? '';
            $zip = $_POST['zip'] ?? '';
            $district = $_POST['district'] ?? '';
            $province = $_POST['province'] ?? ''; 

            $db = new dbconnectionpg();
            $conn = $db->dbconnect();
            // Prepare the SQL statement with placeholders
            $stmt = $conn->prepare("INSERT INTO place_order (FullName, Addres, City, Zip, District, Province) VALUES (?, ?, ?, ?, ?, ?)");

            // Check if the preparation was successful
            if ($stmt) {
                // Bind the parameters with appropriate types
                $stmt->bind_param("ssssss", $fullname, $addres, $city, $zip, $district, $province);

                // Execute the statement
                if ($stmt->execute()) {
                } else {
                }

                // Close the statement
                $stmt->close();
            } else {
            }
        }
        return null;
    }
}
