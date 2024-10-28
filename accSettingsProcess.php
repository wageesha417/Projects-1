<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $fname = $_POST["fn"];
    $lname = $_POST["ln"];
    $mobile = $_POST["m"];
    $state = $_POST["s"];
    $distric = $_POST["d"];
    $city = $_POST["c"];
    $pcode = $_POST["pc"];
    $line1 = $_POST["l1"];
    $line2 = $_POST["l1"];
    $country = $_POST["country"];

    if (isset($_FILES["image"])) {
        $image = $_FILES["image"];

        $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
        $file_ex = $image["type"];

        if (!in_array($file_ex, $allowed_image_extentions)) {

            echo ("Please select a valid image.");
        } else {

            $new_file_extention;

            if ($file_ex == "image/jpg") {
                $new_file_extention = ".jpg";
            } else if ($file_ex == "image/jpeg") {
                $new_file_extention = ".jpeg";
            } else if ($file_ex == "image/png") {
                $new_file_extention = ".png";
            } else if ($file_ex == "image/svg+xml") {
                $new_file_extention = ".svg";
            }

            $file_name = "resource/profile_img/" . $_SESSION["u"]["fname"] . "_" . uniqid() . $new_file_extention;

            move_uploaded_file($image["tmp_name"], $file_name);

            $image_rs = Database::search("SELECT * FROM `profile_image` WHERE 
            `user_email`='" . $_SESSION["u"]["email"] . "'");
            $image_num = $image_rs->num_rows;

            if ($image_num == 1) {

                Database::iud("UPDATE `profile_image` SET `path`='" . $file_name . "' WHERE 
                `user_email`='" . $_SESSION["u"]["email"] . "'");
            } else {

                Database::iud("INSERT INTO `profile_image` (`path`,`user_email`) VALUES 
                ('" . $file_name . "','" . $_SESSION["u"]["email"] . "')");
            }
        }
    }

    Database::iud("UPDATE `user` SET `fname`='" . $fname . "',`lname`='" . $lname . "',`mobile`='" . $mobile . "' 
    WHERE `email`='" . $_SESSION["u"]["email"] . "'");

    $address_rs = Database::search("SELECT * FROM `user_has_address`  WHERE `user_email`='" .  $_SESSION["u"]["email"]  . "'");

    $address_num = $address_rs->num_rows;

    if($address_num == 1){

        Database::iud("UPDATE `user_has_address` SET
                `line1`='" . $line1 . "',
                `line2`='" . $line2 . "',
                `city`='" . $city . "',
                `postal_code`='" . $pcode . "',
                `country_id` = '".$country."',
                `district` = '".$distric."',
                `province`='".$state."'
                 WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");

            
                

    }else{

        Database::iud("INSERT INTO `user_has_address` 
        (`line1`,`line2`,`user_email`,`country_id`,`postal_code`,`city`,`district`, `province`) VALUES 
        ('" . $line1 . "','" . $line2 . "','" . $_SESSION["u"]["email"] . "','" . $country . "','" . $pcode . "', '".$city."','".$distric."','".$state."')");

       

    }

    echo ("success");

} else {
    echo ("Please login first");
}
