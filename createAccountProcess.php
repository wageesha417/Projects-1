<?php
require "connection.php";

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$password = $_POST["p"];
$mobile = $_POST["m"];
$gender = $_POST["g"];
$country= $_POST["c"];

if(empty($fname)){
    echo("Please enter your First Name !!!");
}else if(strlen($fname) > 50){
    echo ("First Name must have less than 50 characters");
}else if(empty($lname)){
    echo("Please enter your Last Name !!!");
}else if(strlen($lname) > 50){
    echo ("Last Name must have less than 50 characters");
}else if(empty($email)){
    echo("Please enter your Email !!!");
}else if(strlen($email) >= 100){
    echo ("Email must have less than 100 characters");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo("Invalid Email !!!");
}else if(empty($password)){
    echo("Please enter your Password !!!");
}else if(strlen($password) < 5 || strlen($password) > 20 ){
    echo ("Password must be between 5 - 20 charcters");
}else if(empty($mobile)){
    echo("Please enter your mobile !!!");
}else{

    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."' OR `mobile`='".$mobile."'");
    $n = $rs->num_rows;

if($n > 0){
    echo("user with the same Email OR Mobile already exists.");
}else{
    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");
    $code = uniqid();

    Database::iud("INSERT INTO `user` 
    (`fname`,`lname`,`email`,`mobile`,`password`,`gender_id`,`joined_date`,`status`,`verification_code`) VALUES 
    ('".$fname."','".$lname."','".$email."','".$mobile."','".$password."','".$gender."','".$date."','1','".$code."')");

    echo "success";

}

}

    
?>