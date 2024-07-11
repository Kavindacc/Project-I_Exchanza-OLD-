<?php

require '../model/dbconnection.php';
require '../model/visitor.php';

session_start();

if(isset($_POST['submit'])){
    $code = trim(stripslashes(htmlspecialchars($_POST['vcode'])));

    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $obj = new Visitor(null, $email, null, null, null, null, null);
        $otp = $obj->accountactive($email, Dbh::connect());

        if($otp == $code){
            $status = "active";
            $obj->statusUpdate($email, $status, Dbh::connect());
            header("Location: ../view/login.php");
            exit();
        } else {
            header("Location: ../view/verification.php?error=Verification Code incorrect");
            exit();
        }
    } 
}

?>
