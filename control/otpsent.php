<?php


session_start();
class Otp{

    protected $email,$otp;
    public function otpsent($email,$otp){

        $this->email=$email;
        $this->otp=$otp;
        
        $mail = require 'mailer.php';//email sent

        $mail->setFrom("exchanza7@gmail.com"); //myemail
        $mail->addAddress($email);
        $mail->Subject = "OTP Code";
        $mail->Body = "your Verification code {$this->otp}";

        try {
            $mail->send();
            $_SESSION['email']=$email;
            header("Location: ../view/verification.php?success=Check your Email"); // verificatio page go
            exit();

        } catch (Exception $e) {
            
            echo "Message could not be sent.Mailer error:{$mail->ErrorInfo}";
        }
    }
}




?>