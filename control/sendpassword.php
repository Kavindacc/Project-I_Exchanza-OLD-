<?php

require '../model/user.php';
if (isset($_POST['continue'])) {

    $email = $_POST['email'];

    $token = bin2hex(random_bytes(16)); //generate random 16length byte,convert hexa decimal string

    $token_hash = hash("sha256", $token);

    $expire = date("Y-m-d H:i:s", time() + 60 * 30);

    //store database token and expire time
    $object = new User();
    $vemail = $object->checkemail($email);
    if ($vemail) {
        $object->update($token_hash, $expire, $email);

        $mail = require 'mailer.php';

        $mail->setFrom("exchanza7@gmail.com"); //myemail
        $mail->addAddress($email);
        $mail->Subject = "Password Reset";
        $mail->Body = <<<END

        Click <a href="http://example.com/resetpassword.php?token=$token">here </a>to reset your password.
        END;//domain name danna one

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
