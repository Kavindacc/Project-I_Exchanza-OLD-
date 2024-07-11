<?php

require '../model/usern.php';
require '../model/dbconnection.php';

if (isset($_POST['continue'])) {

    $email = $_POST['email'];

    $token = bin2hex(random_bytes(16)); //generate random 16length byte,convert hexa decimal string

    $token_hash = hash("sha256", $token);

    $expire = date("Y-m-d H:i:s", time() + 60 * 30);

    //store database token and expire time
    $object = new RegisteredCustormer();
    $vemail = $object->checkemail($email,Dbh::connect());
    if ($vemail) {
        $object->updateToken($token_hash, $expire,Dbh::connect());

        $mail = require 'mailer.php';

        $mail->setFrom("exchanza7@gmail.com"); //myemail
        $mail->addAddress($email);
        $mail->Subject = "Password Reset";
        $mail->Body = <<<END

        Click <a href="http://localhost/git%20project%201/Project-I_Exchanza/view/resetpassword.php?token=$token">here </a>to reset your password.
        END;//domain name danna one resetpassword link eka

        try {
            $mail->send();
            header("Location: ../view/forgetpassword.php?success=Check your Email");
            exit();

        } catch (Exception $e) {
            
            echo "Message could not be sent.Mailer error:{$mail->ErrorInfo}";
        }
        

    } else {
        header("Location: ../view/forgetpassword.php?error=Email does not exits");
        exit();
    }
}
