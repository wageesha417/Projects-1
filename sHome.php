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
    <link rel="stylesheet" href="event.css" />
    <link rel="stylesheet" href="banner.css" />
    <link rel="stylesheet" href="review.css" />
    <link rel="icon" href="resource/Icon.svg"/>
    
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include "sHeader.php"; ?>

            <div class="col-12" id="basicSearchResult">
                <div class="row" id="categorySelectResult">
                

                 
                    <div class="col-12" style="background-color: #0083C2;">
                        <div class="row">
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="resource/VNYshopsliderimages/1c.jpg" class="d-block w-100">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="resource/VNYshopsliderimages/2c.jpg" class="d-block w-100 ">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="resource/VNYshopsliderimages/3c.jpg" class="d-block w-100">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    
    <section class="section__container banner__container" id="special">
        <div class="banner__card banner__card--1">
            <div class="banner__content">
                <p>TRY IT OUT TODAY</p>
                <h4>MOST POPULAR BURGER</h4>
            </div>
        </div>

        <div class="banner__card banner__card--2">
            <div class="banner__content">
                <p>TRY IT OUT TODAY</p>
                <h4>MORE FUN<br />MORE TASTE</h4>
            </div>
        </div>

        <div class="banner__card banner__card--3">
            <div class="banner__content">
                <p>TRY IT OUT TODAY</p>
                <h4>FRESH & CHILI</h4>
            </div>
        </div>
    </section>
               

                    
                      <section class="event__content">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 event__details">
                                    <h3>Discover</h3>
                                    <h2 class="section__header">UPCOMING EVENTS</h2>
                                    <p class="section__description">
                                        From exclusive burger tastings and chef collaborations to community
                                        outreach initiatives and seasonal celebrations, there's always
                                        something special on the horizon at Burger Company. Be the first to
                                        know about our upcoming events, promotions, and gatherings as we
                                        continue to bring joy and flavor to our cherished customers. Join us
                                        in creating memorable moments and delicious memories together!
                                    </p>
                                </div>
                                <div class="col-md-6 event__image">
                                    <img src="resource/VNYshopsliderimages/Res9.png" alt="event" class="img-fluid" />
                                </div>
                            </div>
                        </div>
                    </section>

<div class="sub-heading">
        <h1>customer's review</h1>
    </div>

    <section class="review">

        <div class="box-container">

            <div class="box">
                <div class="image">
                    <img src="resource/quote-left.png" width="25" height="25" alt="">
                    <img src="resource/review-1.png" alt="" class="user">
                    <img src="resource/quote-right.png" width="25" height="25" alt="">
                </div>
                <h3>Sunil</h3>
                <h4>Customer</h4>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p>"I visited Gallery Cafe last weekend, and I was impressed. The staff was friendly and attentive, 
                    and the decor was beautiful. I had the Eggs Benedict, which was cooked to perfection. Will definitely be back."
                </p>
            </div>

            <div class="box">
                <div class="image">
                    <img src="resource/quote-left.png" width="25" height="25" alt="">
                    <img src="resource/review-2.png" alt="" class="user">
                    <img src="resource/quote-right.png" width="25" height="25" alt="">
                </div>
                <h3>Nethu</h3>
                <h4>Customer</h4>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p>"Gallery Cafe is my go-to place for brunch. The avocado toast is always fresh and delicious,
                     and the coffee is top-notch. The ambiance is perfect for a relaxed morning. Highly recommend!"
                </p>
            </div>

            <div class="box">
                <div class="image">
                    <img src="resource/quote-left.png" width="25" height="25" alt="">
                    <img src="resource/review-3.png" alt="" class="user">
                    <img src="resource/quote-right.png" width="25" height="25" alt="">
                </div>
                <h3>Kamal</h3>
                <h4>Customer</h4>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p> "Had a wonderful dinner at Gallery Cafe. The steak was perfectly cooked, and the wine selection was excellent.
                     The service was outstanding, and the live music added a nice touch to the evening.</p>
            </div>

            <div class="box">
                <div class="image">
                    <img src="resource/quote-left.png" width="25" height="25" alt="">
                    <img src="resource/review-4.png" alt="" class="user">
                    <img src="resource/quote-right.png" width="25" height="25" alt="">
                </div>
                <h3>Natasha</h3>
                <h4>Customer</h4>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p>"Absolutely love Gallery Cafe! The pastries are to die for, especially the croissants.
                     The atmosphere is cozy and welcoming, making it a great spot to catch up with friends."</p>
            </div>

            <div class="box">
                <div class="image">
                    <img src="resource/quote-left.png" width="25" height="25" alt="">
                    <img src="resource/review-5.png" alt="" class="user">
                    <img src="resource/quote-right.png" width="25" height="25" alt="">
                </div>
                <h3>Nimal</h3>
                <h4>Customer</h4>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p> "Stopped by Gallery Cafe for a quick lunch, and it did not disappoint. The sandwiches are flavorful and filling, 
                    and the soups are delicious.
                     The modern decor and clean environment make it a pleasant place to dine."</p>
            </div>

            <div class="box">
                <div class="image">
                    <img src="resource/quote-left.png" width="25" height="25" alt="">
                    <img src="resource/review-6.png" alt="" class="user">
                    <img src="resource/quote-right.png" width="25" height="25" alt="">
                </div>
                <h3>Saduni</h3>
                <h4>Customer</h4>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p>"Gallery Cafe is a hidden gem. The vegan options are fantastic, and the smoothie bowls are my favorite.
                     The staff is always friendly and accommodating. A must-visit for anyone in the area."</p>
            </div>

            <div class="box">
                <div class="image">
                    <img src="resource/quote-left.png" width="25" height="25" alt="">
                    <img src="resource/review-7.png" alt="" class="user">
                    <img src="resource/quote-right.png" width="25" height="25" alt="">
                </div>
                <h3>Lahiru</h3>
                <h4>Customer</h4>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p>"I recently visited Gallery cafe and had an amazing experience! 
                    The atmosphere is cozy and artistic, with beautiful artwork adorning the walls."</p>
            </div>

            <div class="box">
                <div class="image">
                    <img src="resource/quote-left.png" width="25" height="25" alt="">
                    <img src="resource/review-8.png" alt="" class="user">
                    <img src="resource/quote-right.png" width="25" height="25" alt="">
                </div>
                <h3>Kavithwa</h3>
                <h4>Customer</h4>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p>"Gallery cafe is a hidden gem in the city. The decor is charming and unique, giving off a modern art gallery vibe. 
                    The selection of pastries and sandwiches is impressive, and everything I tried was delicious."</p>
            </div>

        </div>

    </section>


                    

                    <?php
                    $c_rs = Database::search("SELECT * FROM `category`");
                    $c_num = $c_rs->num_rows;

                    for ($y = 0; $y < $c_num; $y++) {
                        $cdata = $c_rs->fetch_assoc();
                    ?>
                        <!-- category name -->
<div class="col-12 mt-3 mb-3">
    <a href="#" class="text-decoration-none link-dark categoryName"><?php echo $cdata["name"]; ?></a>
</div>
<!-- category name -->

<!-- products -->
<div class="col-12 mb-3" style="background-color: #dcdcdc;">
    <div class="row">
        <div class="col-12">
            <div class="row justify-content-center gap-2">
                <?php
                $product_rs = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $cdata["id"] . "' AND `status_id`='1' AND `sell_status`='1' ORDER BY `datetime_added` DESC LIMIT 20 OFFSET 0");
                $product_num = $product_rs->num_rows;

                for ($z = 0; $z < $product_num; $z++) {
                    $product_data = $product_rs->fetch_assoc();
                ?>
                    <div class="ui special cards col-6 col-lg-2 mt-2 mb-2" style="width: 18rem; background-color: #dcdcdc;">
                        <div class="card">
                            <div class="blurring dimmable image">
                                <div class="ui dimmer">
                                    <div class="content">
                                        <div class="center">
                                        <?php
                                        if (isset($_SESSION["u"])){
                                            $wishlist_rs = Database::search("SELECT * FROM `wishlist` WHERE `product_id`='".$product_data["id"]."' AND `user_email`='".$_SESSION["u"]["email"]."'");
                                            $wishlist_num = $wishlist_rs->num_rows;

                                            if($wishlist_num == 1){
                                                ?>
                                                <div class="ui inverted button rounded-circle wishlistIcon" id='favorite<?php echo $product_data["id"];?>' onclick='addToWishlist(<?php echo $product_data["id"]; ?>)'><i class="material-symbols-outlined mt-2">favorite</i></div>
                                                <?php
                                            } else {
                                                ?>
                                                <div class="ui inverted button rounded-circle wishlistIcon2" id='favorite<?php echo $product_data["id"];?>' onclick='addToWishlist(<?php echo $product_data["id"]; ?>)'><i class="material-symbols-outlined mt-2">favorite</i></div>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <div class="ui inverted button rounded-circle"><i class="material-symbols-outlined mt-2">favorite</i></div>
                                            <?php
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id` ='" . $product_data["id"] . "'");
                                $image_data = $image_rs->fetch_assoc();
                                ?>
                                <img src="./Admin/img/<?php echo $image_data["code"]?>" >
                            </div>
                            <div class="content text-center ms-0 m-0">
                                <div class="col-12">
                                    <h5 class="productName"><?php echo $product_data["title"]; ?></h5>
                                    <span class="card-text price productName">Rs. <?php echo $product_data["price"]; ?></span>
                                    <button class="col-12 btn btn-atc-vny mt-2" onclick="addToCart(<?php echo $product_data['id'];?>);">Add to Cart</button>
                                    <a href='<?php echo "singleProductView.php?id=".$product_data["id"]."&cid=".$product_data["category_id"];?>' class="col-12 btn btn-atc-vnb mt-2">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

                        <!-- products -->
                    <?php
                    }
                    ?>
                </div>
            </div>
            <?php include "footer.php"; ?>
        </div>
    </div>
    <script src="bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    <script>
        $('.special.cards .image').dimmer({
            on: 'hover'
        });
    </script>
    <script src="script.js"></script>
</body>

</html>
