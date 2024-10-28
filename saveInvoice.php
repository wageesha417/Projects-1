<?php

require "connection.php";



$jsonObj = $_POST['requestobj'];
$phpObj = json_decode($jsonObj);


$userEmail = $phpObj->email;
$total = $phpObj->total;
$orderId = $phpObj->orderId;

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");


Database::iud("INSERT INTO `invoice`(`order_id`,`date`,`total`,`user_email`)
    VALUES('" . $orderId . "','" . $date . "','" . $total . "','" . $userEmail . "')");

$invoice_id = Database::$connection->insert_id;

$cartTable =  Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $userEmail . "'");

for ($x = 0; $x < $cartTable->num_rows; $x++) {
    $cartTableRow = $cartTable->fetch_assoc();
    $productId = $cartTableRow["product_id"];

    Database::iud("INSERT INTO `product_has_invoice`(`product_id`,`invoice_id`)VALUES('" . $productId . "','" . $invoice_id . "')");

    Database::iud("UPDATE `product` SET `sell_status`='2' WHERE `id`='" . $productId . "'");

    Database::iud("INSERT INTO `recent`(`product_id`,`user_email`) VALUES ('" . $productId . "','" . $userEmail . "');");
    Database::iud("DELETE FROM `cart` WHERE `id`='" . $cartTableRow["id"] . "'");
}



// $phpAlertObj = new stdClass();
// $phpAlertObj->msg = "success";

// $jsonObj = json_encode($phpAlertObj);
// echo($jsonObj); 
echo ('success');
