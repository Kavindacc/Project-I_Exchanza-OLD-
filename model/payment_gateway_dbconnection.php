<?php

class dbconnectionpg {
    
    function dbconnect(){
        $servername = "127.0.0.1";
        $username = "root";
        $password = "6065031";
        $dbname = "exchanzedb";
        // Create a connection to the database
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
}

?>
