<?php

require_once "connection.php";

if (isset($_GET["id"])) {

    $pid = $_GET["id"];

    $cete_id = $_GET["cid"];


    $product_rs = Database::search("SELECT product.id,product.price,product.description,product.title,
    product.datetime_added,product.status_id,product.category_id,
    category.name AS cname FROM `product` INNER JOIN `category` ON  category.id=product.category_id   WHERE product.id='" . $pid . "'");

    $product_num = $product_rs->num_rows;




    if ($product_num == 1) {
        $product_data = $product_rs->fetch_assoc();



?>



        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title><?php echo $product_data["title"]; ?> | </title>

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
            <div class="container-fluid">
                <div class="row">
                    <?php include "sHeader.php"; ?>

                    <div class="col-12 mb-3 mt-3 ">
                        <div class="row">


                            <!-- Single Product View -->
                            <div class="col-12 ">
                                <div class="row  gap-lg-5 gap-0 g-2  align-items-start">
                                    <!-- Product Img -->
                                    <div class="col-12 col-lg-6 d-flex justify-content-center">
                                        <div class="row align-items-center">

                                            <!-- Full-width-img-->
                                            <div class="col-12">
                                                <div class="row">

                                                    <?php


                                                    $img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "'");
                                                    $img_num = $img_rs->num_rows;
                                                    $img = array();

                                                    if ($img_num != 0) {


                                                        $img_data = $img_rs->fetch_assoc();
                                                    ?>
                                                        <div class="mySlides fadeImg">
                                                            <img src="./Admin/img/<?php echo $img_data["code"]; ?>" class="d-block w-100" />
                                                        </div>

                                                    <?php

                                                    } else {

                                                    ?>

                                                        <div class="mySlides fadeImg">
                                                            <img src="resource/logo_images/test.avif" class="d-block w-100" />
                                                        </div>
                                                        <div class="mySlides fadeImg ">
                                                            <img src="resource/logo_images/fishLogo1.png" class="d-block w-100" />
                                                        </div>
                                                        <div class="mySlides fadeImg ">
                                                            <img src="resource/logo_images/iconx.png" class="d-block w-100" />
                                                        </div>

                                                    <?php

                                                    }

                                                    ?>




                                                </div>
                                            </div>
                                            <!-- Full-width-img-->



                                            <!-- The dots/circles -->
                                            <!-- <div style="text-align:center;" class="text-center">

                                                <span class="dot" onclick="currentSlide(1)"></span>
                                                <span class="dot" onclick="currentSlide(2)"></span>
                                                <span class="dot" onclick="currentSlide(3)"></span>

                                            </div> -->
                                            <!-- The dots/circles -->

                                        </div>
                                    </div>
                                    <!-- Product Img -->


                                    <!-- Product Details -->
                                    <div class="col-12 col-lg-4">

                                        <div class="row">


                                            <span class="col-12  text-center text-lg-start singleProductTitle"><?php echo $product_data["title"]; ?></span>

                                            <span class="col-12  text-center text-lg-start singleProductPrice">Rs.<?php echo $product_data["price"]; ?>.00</span>


                                            <div class="col-12 mt-5 d-grid">
                                                <button class="vnyBtnAddC" onclick="addToCart(<?php echo $product_data['id']; ?>);">Add to Cart</button>
                                            </div>
                                            <!-- 
                                            <div class="col-12 mt-5 d-grid">
                                                <button class="vnyBtnAddC" onclick="payNow('<?php echo $product_data['id'] ?>')">Buy</button>
                                            </div> -->

                                            <div class="col-12 mt-5">
                                                <span class="singleProductOther">Description</span>
                                            </div>

                                            <div class="col-12 col-lg-8">
                                                <span class="singleProductOther"><?php echo $product_data["description"]; ?>
                                                </span>
                                            </div>


                                        </div>

                                    </div>
                                    <!-- Product Details -->

                                    <hr class="mt-4" />

                                </div>
                            </div>
                            <!-- Single Product View -->


                    </div>

                    <?php include "footer.php"; ?>
                </div>
            </div>

            <script src="pay.js"></script>
            <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
            <script src="bootstrap.bundle.min.js"></script>





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


<?php

    } else {
        echo ("Sorry for the Inconvenience");
    }
} else {
    echo ("Something went wrong");
}

?>