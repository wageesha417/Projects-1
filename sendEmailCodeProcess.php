<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_GET["email"])){
    $email = $_GET["email"];

    $userTable = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."'");

    if($userTable->num_rows == 1){

        $code = uniqid();

        Database::iud("UPDATE `user` SET `verification_code` ='".$code."'WHERE
        `email` ='".$email."'");

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'yayasithsandesh16@gmail.com';
        $mail->Password = 'brqautrcxxhjwuwx';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('yayasithsandesh16@gmail.com', 'Reset Password');
        $mail->addReplyTo('yayasithsandesh16@gmail.com', 'Reset Password');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'VNY Forgot Password Verification Code';
        $bodyContent = '<h1 style ="color:green">Your Verification code is '.$code.'</h1>';
        $bodyContent .= '******************';
        $mail->Body    = $bodyContent;

        if(!$mail->send()){
            echo'Verification code sending failed';
        }else{
            echo'success';
        }

    }else{
        echo("Invalid Email address");
    }
}



?>