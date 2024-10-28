<?php

require "connection.php";



$pid = $_GET["id"];
$select_qty = $_GET["q"];




$cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='".$pid."'");
$cart_data = $cart_rs->fetch_assoc();

$product_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$pid."'");
$product_data = $product_rs->fetch_assoc();

$product_qty = $product_data["qty"];
$cart_qty = $cart_data["qty"];

$new_qty = (int)$cart_qty + (int)$select_qty;


if($product_qty >= $new_qty){

    Database::iud("UPDATE `cart` SET `qty`='".$new_qty."'");
    echo("success");

}else{
    echo("Invalid quantity");

}



?>