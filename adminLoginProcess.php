<?php

require "connection.php";


$email = $_POST['email'];
$code = $_POST['code'];

$admin_table =  Database::search("SELECT * FROM `admin` WHERE `verification_code`='" . $code . "' AND `email`='" . $email . "' ");

if ($admin_table->num_rows == 1) {

    $adminData = $admin_table->fetch_assoc();
    $_SESSION["admin"] = $adminData;
    echo "success";
} else {
    echo 'invalid verification code.';
}
