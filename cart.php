<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="semantic.css" />
    <link rel="stylesheet" href="semantic.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="resource/Icon.svg" />
</head>

<body>
    <div class="container-fluid" id="accMain">
        <div class="row ">
            <?php require "sHeader.php";

            if (isset($_SESSION["u"])) {

                $email = $_SESSION["u"]["email"];

                $total = 0;
                $subtotal = 0;
                $shipping = 0;

            ?>





                <?php

                $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $email . "'");
                $cart_num = $cart_rs->num_rows;

                if ($cart_num == 0) {

                ?>

                    <!-- Empty View -->
                    <div class="col-12 text-center min-vh-100 ">
                        <div class="row">

                            <div class="col-12 text-center py-3 d-grid">
                                <label class="cartMTitle">Shopping Cart</label>
                            </div>


                            <div class="col-12 text-center">
                                <label>Your cart is empty.</label>
                            </div>

                            <div class="col-12 text-center py-3 ">
                                <button class="vnyBtn">Continue Shopping</button>
                            </div>
                        </div>
                    </div>
                    <!-- Empty View -->

                <?php

                } else {



                ?>



                    <!-- breadcrumb -->
                    <div class="col-12 text-center text-lg-end py-3">
                        <div class="ui large breadcrumb">
                            <a class="section breadcrumbText text-decoration-none">Home</a>
                            <i class="right chevron icon divider"></i>
                            <div class=" section breadcrumbText">Cart</div>
                        </div>
                    </div>
                    <!-- breadcrumb -->

                    <div class="col-12 text-center text-lg-start py-3 d-grid ">
                        <label class="cartMTitle">SHOPPING CART</label>
                    </div>

                    <!-- Products View -->
                    <div class="col-12 col-lg-6 offset-0 offset-lg-3 py-3">
                        <div class="row">

                            <?php

                            for ($x = 0; $x < $cart_num; $x++) {
                                $cart_data = $cart_rs->fetch_assoc();

                                $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cart_data["product_id"] . "'");
                                $product_data = $product_rs->fetch_assoc();

                                $total = $total + $product_data["price"];



                            ?>



                                <div class="col-12 py-3">
                                    <div class="row d-sm-flex justify-content-center">
                                        <?php

                                        $img = array();

                                        $img_rs = Database::search("SELECT * FROM `images`  WHERE `product_id`='" . $cart_data["product_id"] . "'");
                                        $img_data = $img_rs->fetch_assoc();

                                        ?>

                                        <img src="./Admin/img/<?php echo $img_data["code"]; ?>" class="img-fluid align-items-center  " style="max-width: 200px;" />

                                        <?php


                                        ?>

                                        <div class="col-12 col-lg-4 text-center text-lg-start">
                                            <div class="row">
                                                <span class=" col-12 text-center text-lg-start cartTitle mt-3 mt-lg-0"><?php echo $product_data["title"]; ?></span>

                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-3 ">
                                            <div class="row">



                                                <span class=" col-12 text-center text-lg-start priceD mt-3 mt-lg-0">Rs.<?php echo $product_data["price"]; ?>.00</span>



                                                <div class="col-12 d-grid">
                                                    <div class="row">
                                                        <button class="col-12 mt-5 cRemove" onclick='removeCart(<?php echo $cart_data["id"] ?>);'>Remove</button>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>



                                    </div>
                                    <hr class=" d-block d-lg-none" />
                                </div>



                                <?php



                                ?>

                            <?php
                            }

                            ?>


                        </div>
                    </div>
                    <!-- Products View -->


                    <!-- Order Summary -->
                    <div class="col-12 col-lg-6 offset-0 offset-lg-6  offset-md-6   shadow-lg  mb-3  p-5 d-flex justify-content-center" style="height: 20rem; width: 30rem;">
                        <div class="row align-items-center ">
                            <div class="col-12  text-center">
                                <span class="OrderSummary ">Order Summary</span>
                            </div>
                            <div class="col-6 text-center">
                                <span class="SubtotalTitle">Subtotal</span>
                            </div>
                            <div class="col-6 text-center">
                                <span class="SubtotalTitle">Rs.<?php echo $total; ?>.00</span>
                            </div>

                            <div class="col-12 text-center">
                                <button class="btn btn-primary" type="submit" id="payhere-payment" onclick="payNow()">Checkout</button>
                            </div>
                        </div>
                    </div>
                    <!-- Order Summary -->


                <?php


                }


                ?>




            <?php

            } else {


            ?>



                <!-- Empty View -->
                <div class="col-12 text-center">
                    <div class="row">

                        <div class="col-12 text-center py-3 d-grid">
                            <label class="cartMTitle">Shopping Cart</label>
                        </div>


                        <div class="col-12 text-center">
                            <label>Your cart is empty.</label>
                        </div>

                        <div class="col-12 text-center py-3 ">
                            <button class="vnyBtn" onclick="click();">Continue Shopping</button>
                        </div>
                    </div>
                </div>
                <!-- Empty View -->



            <?php



            }


            ?>


            <?php require "footer.php"; ?>
        </div>
    </div>

    <script src="pay.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <!-- <script src="bootstrap.bundle.js"></script> -->
</body>

</html>