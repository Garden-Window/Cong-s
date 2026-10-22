<?php
session_start();


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if(isset($_POST['fsubmit'])){

    $userMat=$_POST['mat'];
    $userName=$this->SelectFromUsers('userNom',$userMat);
    $userName.=" ";
    $userName.=$this->SelectFromUsers('userPrenom',$userMat);
    $userMail=$this->SelectFromUsers('userMail',$userMat);
    $userPwd=$this->SelectFromUsers('userPwd',$userMat);


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
          
$mail = new PHPMailer();


$mail->isSMTP();

$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->Host = 'smtp.gmail.com';

$mail->Port = 587;

$mail->SMTPSecure = 'tls';

$mail->SMTPAuth = true;

$mail->Username = 'sonaexp4@gmail.com';

$mail->Password = 'ygbyqsnfyzksbicc';
$mail->setFrom('sonaexp4@gmail.com', 'sonaexp');


$mail->addAddress($userMail, $userName);


$mail->Subject = 'votre mot de passe';
$mail->Body    = '<b>'.$userName.'</b> votre mot de passe <b>'.$userPwd.'</b>';

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';


if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    $_SESSION['SendE']="un erreur  ";
   // header('location:forgotpPWD.php');
} else {
    echo 'Message sent!';
    $_SESSION['SendE']="nous avons envoyez votre pwd avec une email ";
    }
    //header('location:forgotpPWD.php');
}
?>