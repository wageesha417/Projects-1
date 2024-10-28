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
        <div class="row" >
            <?php include "sHeader.php";

            if (isset($_SESSION["u"])) {

            ?>

                <?php

                $user = $_SESSION["u"]["email"];

                $wish_rs = Database::search("SELECT * FROM `wishlist` WHERE `user_email`='" . $user . "'");
                $wish_num = $wish_rs->num_rows;

                if ($wish_num == 0) {

                ?>

<div class="col-12"  id="basicSearchResult"  >
    <div class="row"  id="categorySelectResult">


                            <!-- Empty View -->
                            <div class="col-12 text-center  min-vh-100">
                                <div class="row">

                                    <div class="col-12 text-center py-3 d-grid">
                                        <label class="cartMTitle">Wishlist</label>
                                    </div>


                                    <div class="col-12 text-center">
                                        <label>You have no items in your wishlist yet.</label>
                                    </div>

                                    <div class="col-12 text-center py-3 ">
                                        <button class="vnyBtn">Continue Shopping</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Empty View -->
</div>
</div>                            

                        <?php

                    } else {

                        ?>


<div class="col-12"  id="basicSearchResult"  >
    <div class="row"  id="categorySelectResult">

                            <!-- breadcrumb -->
                            <div class="col-12 text-center text-lg-end py-3">
                                <div class="ui large breadcrumb">
                                    <a class="section breadcrumbText text-decoration-none">Home</a>
                                    <i class="right chevron icon divider"></i>
                                    <div class="section breadcrumbText">Wishlist</div>
                                </div>
                            </div>
                            <!-- breadcrumb -->

                            <div class="col-12 text-center text-lg-start py-3 d-grid ">
                                <label class="cartMTitle">Wishlist</label>
                            </div>

                            <!-- Products View -->
                            <div class="col-12 col-lg-6 offset-0 offset-lg-3 py-3" >
                                <div class="row">

                                    <?php

                                    for ($x = 0; $x < $wish_num; $x++) {
                                        $wish_data = $wish_rs->fetch_assoc();

                                    ?>


                                        <!-- Products -->
                                        <div class="col-12 col-lg-4 text-center text-lg-start d-block ">

                                            <?php

                                            $img = array();

                                            $img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $wish_data["product_id"] . "'");
                                            $img_data = $img_rs->fetch_assoc();

                                            ?>

                                            <img src="./Admin/img/<?php echo $img_data["code"]; ?>" class="img-fluid" style="max-width: 200px;" />

                                            <?php

                                            ?>


                                        </div>

                                        <div class="col-12 col-lg-4 text-center text-lg-start ">
                                            <div class="row">

                                                <?php

                                                $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $wish_data["product_id"] . "'");
                                                $product_data = $product_rs->fetch_assoc();

                                                ?>

                                                <span class="col-12 wishlistTitle mt-3 mt-lg-0"><?php echo $product_data["title"]; ?></span>

                                        


                                                <span class="col-12 priceD mt-3">Rs.<?php echo $product_data["price"]; ?>.00</span>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-4 mt-3 mt-lg-0 ">
                                            <div class="row">
                                                <button class="btn btn-block btn-outline-vnyB col-4 col-lg-12 offset-4 offset-lg-0 btn-sm " style="font-size: 14px;" onclick='removeWishlist(<?php echo $wish_data["id"]; ?>);'><i class="bi bi-trash mx-2 " style="font-size: 15px;  margin-top: 3px;"></i>Remove</button>

                                                <button class="btn btn-block btn-outline-vnyA my-2 col-4 col-lg-12 offset-4 offset-lg-0 btn-sm" style="font-size: 14px;" onclick="addToCart(<?php echo $product_data['id'];?>);" >
                                                    <i class="bi bi-plus-circle mx-2" style="font-size: 15px;"></i>
                                                    Add to Cart
                                                </button>

                                            </div>
                                        </div>
                                        <div class="col-12 overflow-hidden">
                                            <hr class="my-3" />
                                        </div>
                                        <!-- Products -->

                                    <?php

                                    }


                                    ?>



                                </div>
                            </div>
                            <!-- Products View -->
</div>
</div>     

                        <?php

                    }


                        ?>



                    <?php

                } else {

                    ?>

                        <div class="col-12 text-center ">
                            <div class="row">

                                <div class="col-12 text-center py-3 d-grid">
                                    <label class="cartMTitle">Wishlist</label>
                                </div>


                                <div class="col-12 text-center">
                                    <label>You have no items in your wishlist yet.</label>
                                </div>

                                <div class="col-12 text-center py-3 ">
                                    <button class="vnyBtn" onclick="click();">Continue Shopping</button>
                                </div>
                            </div>
                        </div>


                    

                <?php
                }

                ?>




                <?php include "footer.php"; ?>
        </div>
    </div>



  
    <script src="bootstrap.bundle.min.js"></script>
    <!-- <script src="bootstrap.bundle.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js">
    </script>
    <script>
        $('.special.cards .image').dimmer({
            on: 'hover'
        });
    </script>
    <script src="script.js"></script>
</body>

</html>