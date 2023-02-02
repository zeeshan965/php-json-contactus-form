<?php

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer();
//Enable SMTP debugging.
$mail->SMTPDebug = 0;
//Set PHPMailer to use SMTP.
$mail->isSMTP();
//Set SMTP host name
$mail->Host = "almerajgroups.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;
//Provide username and password
$mail->Username = "noreply@almerajgroups.com";
$mail->Password = "[Y3M7;lpIC)(";
//If SMTP requires TLS encryption then set it
$mail->SMTPAutoTLS = false;
$mail->SMTPSecure = false;
//Set TCP port to connect to
$mail->Port = 587;
$mail->isHTML(true);
$mail->From = "noreply@almerajgroups.com";
$mail->FromName = "Dynamic Form Assignment";
$mail->Subject = "Dynamic Form Submission";

return $mail;