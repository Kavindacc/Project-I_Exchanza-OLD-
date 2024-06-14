<?php

require '../model/user.php';

if(isset($_POST['submit'])){

    $code = trim(stripslashes(htmlspecialchars($_POST['vcode'])));

    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $obj = new User();
        $otp = $obj->accounta($email); // user.php otp get

        if($otp == $code){
            $status="active";
            $obj->statusUpdate($email,$status);
            header("Location: ../view/login.php");
            exit();
        } else {
            header("Location: ../view/verification.php?error=Verification Code encorrect");
            exit();
        }
        
    } 
}
?>
