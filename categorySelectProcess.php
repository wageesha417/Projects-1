<?php

require "connection.php";

$categorySelect = $_POST["c"];

$query = " SELECT * FROM `product` WHERE `category_id`='".$categorySelect."' AND `status_id`='1'";

?>

<div class="row">
    <div class=" offset-lg-1 col-12 col-lg-10 text-center">
        <div class="row">

            <?php
            
            session_start();

            if ("0" != ($_POST["page"])) {
                $pageno = $_POST["page"];
            } else {
                $pageno = 1;
            }

            $product_rs = Database::search($query);
            $product_num = $product_rs->num_rows;

            $results_per_page = 10;
            $number_of_pages =  ceil($product_num / $results_per_page);

            $page_results = ($pageno - 1) * $results_per_page;
            $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");
            $selected_num = $selected_rs->num_rows;

            for ($x = 0; $x < $selected_num; $x++) {
                $selected_data = $selected_rs->fetch_assoc();

            ?>

                <div class="ui special cards col-6 col-lg-2 mt-2 mb-2  " style="width: 18rem;">
                    <div class="card">
                        <div class="blurring dimmable image">
                            <div class="ui dimmer">
                                <div class="content">
                                    <div class="center">
                                        <?php
                                        
                                      

                                        if (isset($_SESSION["u"])) {
                                            $wishlist_rs = Database::search("SELECT * FROM `wishlist` WHERE `product_id`='" . $selected_data["id"] . "' AND
                                            `user_email`='" . $_SESSION["u"]["email"] . "'");

                                            $wishlist_num = $wishlist_rs->num_rows;

                                            if ($wishlist_num == 1) {

                                        ?>

                                                <div class="ui inverted button rounded-circle wishlistIcon " id='favorite<?php echo $selected_data["id"]; ?>' onclick='addToWishlist(<?php echo  $selected_data["id"]; ?>)'><i class="material-symbols-outlined mt-2">favorite</i></div>

                                            <?php

                                            } else {

                                            ?>

                                                <div class="ui inverted button rounded-circle wishlistIcon2" id='favorite<?php echo  $selected_data["id"]; ?>' onclick='addToWishlist(<?php echo  $selected_data["id"]; ?>)'><i class="material-symbols-outlined mt-2">favorite</i></div>

                                            <?php

                                            }
                                        } else {

                                            ?>

                                            <div class="ui inverted button rounded-circle wishlistIcon2"><i class="material-symbols-outlined mt-2">favorite</i></div>

                                        <?php
                                        }


                                        ?>
                                    </div>
                                </div>
                            </div>


                            <?php

                            $img = array();

                            $img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $selected_data["id"] . "'");
                            $img_data = $img_rs->fetch_assoc();

                            ?>

                            <img src="./Admin/img/<?php echo $img_data["code"]; ?>" />

                            <?php

                            ?>

                        </div>

                        <div class="content text-center ms-0 m-0">
                            <div class="col-12">

                                <h5 class="productName"><?php echo $selected_data["title"]; ?></h5>

                                <span class="card-text price productName">Rs. <?php echo $selected_data["price"]; ?></span>

                                <button class="col-12 btn btn-atc-vny  mt-2" onclick="addToCart(<?php echo $selected_data['id'];?>);" >Add to Cart</button>

                                <button class="col-12 btn btn-atc-vnb  mt-2">View Details</button>

                            </div>



                        </div>

                    </div>
                </div>
            <?php
            }


            ?>


        </div>
    </div>

    <!-- pagination-->
    <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">

        <div class="pagination">

            <a <?php if ($pageno <= 1) {
                    echo ("#");
                } else { ?> onclick="categorySelect(<?php echo ($pageno - 1) ?>);" <?php } ?>>
                &laquo;</a>

            <?php

            for ($x = 1; $x <= $number_of_pages; $x++) {
                if ($x == $pageno) {

            ?>
                    <a class="active" onclick="categorySelect(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                <?php

                } else {

                ?>
                    <a onclick="categorySelect(<?php echo ($x) ?>);"><?php echo $x; ?></a>
            <?php

                }
            }

            ?>

            <a <?php if ($pageno <= 1) {
                    echo ("#");
                } else { ?> onclick="categorySelect(<?php echo ($pageno + 1) ?>);" <?php } ?>>&raquo;</a>

        </div>

    </div>
    <!-- pagination-->

</div>