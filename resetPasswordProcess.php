<?php

require "connection.php";
$email = $_POST['email'];
$password = $_POST['password'];
$repassword =  $_POST['repassword'];
$code = $_POST['code'];

if(empty($email)){
    echo ("Missing Email address");
}else if(empty($password)){
    echo ("Please insert a New Password");
}else if(strlen($password)<5 || strlen($password)>20){
    echo ("Invalid Password");
}else if(empty($repassword)){
    echo ("Please Re-type your New Password");
}else if($password != $repassword){
    echo ("Password does not matched");
}else if(empty($code)){
    echo ("Please enter your Verification Code");
}else{

    $user = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' AND 
    `verification_code`='".$code."'");


    if($user->num_rows == 1){

        Database::iud("UPDATE `user` SET `password`='".$password."' WHERE `email`='".$email."'");
        echo ("success");

    }else{
        echo ("Invalid Email or Verification Code");
    }

}



?>