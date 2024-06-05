<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/vendor/autoload.php';

$mail=new PHPMailer(true);//object phpmailer class
$mail->SMTPDebug=SMTP::DEBUG_SERVER;
$mail->isSMTP();
$mail->SMTPAuth=true;//smtpaUTH PROPETY 

$mail->Host="smtp.gmail.com";
$mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port=587;
$mail->Username="exchanza7@gmail.com";
$mail->Password="zmxwhsgifukmpqxb";

$mail->isHTML(true);

return $mail;


?>