<?php
session_start();
require '../model/user.php';

if(isset($_POST['submit'])){

    $code = trim(stripslashes(htmlspecialchars($_POST['vcode'])));

    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $obj = new User();
        $otp = $obj->accounta($email); // user.php otp get

        if($otp == $code){
            header("Location: ../view/login.php");
            exit();
        } else {
            header("Location: ../view/verification.php?error=Verification Code encorrect");
            exit();
        }
        
    } 
}
?>
