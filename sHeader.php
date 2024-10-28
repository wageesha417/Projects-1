<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" href="bootstrap.css" />

    <link rel="stylesheet" href="style.css" />

</head>

<body>




    <div class="col-12 " style="background-color: #0083C2;">
        <div class="row  mb-2">
            <div class="offset-lg-1 col-12 col-lg-4 align-self-start  ">


                <?php
                session_start();

                if (isset($_SESSION["u"])) {
                    $data = $_SESSION["u"];

                ?>
                    <span class="text-lg-start text-white   sheaderT ">Welcome <?php echo $data["fname"]; ?></span>

                    <span class="text-lg-start text-white   sheaderT logout " onclick="logout();">Log Out</span>

                <?php


                } else {

                ?>
                    <a href="index.php" class="text-lg-start text-white   sheaderT text-decoration-none help ">Log In or Register</a>

                <?php


                }

                ?>

                <a class="text-lg-start text-white   sheaderT text-decoration-none help ">Help and Contact</a>
            </div>
        </div>
    </div>


    <nav class="navbar navbar-expand-lg sticky-top shadow " style="background-color: #dcdcdc ;">
        <div class="container-fluid">
            <div class=" col-2  mt-2" style="height:50px;" onclick="window.location='sHome.php';">
            <img src="resource/VNYshopsliderimages/logo1.png" alt="Logo" width="60" height="60">
                </h2>The Gallery Cafe</h2>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 ">

                    <li class="nav-item dropdown mt-3 ">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu" id="cSelect">



                            <?php

                            require_once "connection.php";

                            $category_rs = Database::search("SELECT * FROM `category`");
                            $category_num = $category_rs->num_rows;

                            for ($x = 0; $x < $category_num; $x++) {
                                $category_data = $category_rs->fetch_assoc();

                            ?>
                                <li><a class="dropdown-item" onclick='categorySelect(0,<?php echo $category_data["id"]; ?>)'><?php echo $category_data["name"]; ?></a></li>

                            <?php
                            }

                            ?>


                        </ul>
                    </li>







                    <li class="nav-item col-12 mt-2 ">
                        <div class="ui icon input col-12">
                            <input type="text" placeholder="Search..." aria-label="Text input with dropdown button" id="basic_search_text">
                            <i class="inverted circular search link icon" onclick="basicSearch(0);"></i>
                        </div>
                    </li>

                </ul>

                <ul class="list-inline mb-2 mt-2 mpoint ">


                    <!-- <li class="list-inline-item me-3">

                        <button class="material-symbols-outlined">
                            search
                        </button>

                    </li> -->

                    <?php
                    

                 

                    if (isset($_SESSION["u"])) {

                    ?>
                        <li class="list-inline-item me-3">

                            <i class="material-symbols-outlined mpoint iconAni" onclick="window.location='account.php';">
                                account_circle
                            </i>

                        </li>

                    <?php

                    } else {
                    ?>

                        <li class="list-inline-item me-3">

                            <i class="material-symbols-outlined mpoint iconAni" onclick="window.location='index.php';">
                                account_circle
                            </i>

                        </li>
                    <?php
                    }

                    ?>




                    <li class="list-inline-item me-3">

                        <i class="material-symbols-outlined mpoint iconAni" onclick="window.location='wishlist.php';">
                            favorite
                        </i>

                    </li>


                    <i class="material-symbols-outlined mpoint iconAni " onclick="window.location='cart.php';">
                        shopping_cart
                    </i>


                </ul>




            </div>
        </div>
    </nav>






    <script src="script.js"></script>
</body>

</html>