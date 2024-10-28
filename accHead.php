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
                    <span class="text-lg-start text-white   sheaderT ">Gallery Cafe<?php echo $data["fname"]; ?></span>

                    <span class="text-lg-start text-white   sheaderT logout " onclick="logout();">Welcome</span>

                <?php


                } else {

                ?>
                    <a href="index.php" class="text-lg-start text-white   sheaderT text-decoration-none help ">Log In or Register</a>

                <?php


                }

                ?>

                <a class="text-lg-start text-white   sheaderT text-decoration-none help ">Help Center</a>
            </div>
        </div>
    </div>


    <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #ffffff ;">
        <div class="container-fluid">
            <div class=" col-2  sHeaderLogo" style="height:50px;"></div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 ">

                    <li class="nav-item dropdown mt-3 ">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu">

                            <?php

                            require "connection.php";

                            $category_rs = Database::search("SELECT * FROM `category`");
                            $category_num = $category_rs->num_rows;

                            for ($x = 0; $x < $category_num; $x++) {
                                $category_data = $category_rs->fetch_assoc();

                            ?>
                                <li><a class="dropdown-item" href="#" value="<?php echo $category_data["id"]; ?>" ;><?php echo $category_data["name"]; ?></a></li>

                            <?php
                            }

                            ?>


                        </ul>
                    </li>




                    <li class="nav-item col-12 mt-2 ">
                        <div class="ui icon input col-12">
                            <input type="text" placeholder="Search...">
                            <i class="inverted circular search link icon"></i>
                        </div>
                    </li>

                </ul>

                <ul class="list-inline mb-2 mt-2 ">


                    <!-- <li class="list-inline-item me-3">

                        <button class="material-symbols-outlined">
                            search
                        </button>

                    </li> -->


                    <li class="list-inline-item me-3">

                        <span class="material-symbols-outlined mpoint" onclick="window.location='account.php';">
                            account_circle
                        </span>

                    </li>

                    <li class="list-inline-item me-3">

                        <span class="material-symbols-outlined mpoint" onclick="window.location='';">
                            favorite
                        </span>

                    </li>


                    <span class="material-symbols-outlined mpoint">
                        shopping_cart
                    </span>


                </ul>


            </div>
        </div>
    </nav>



    <div class="col-12 col-lg-3 overflow-hidden  border-end py-5  position-sticky top-0">
        <div class="row">


            <!-- account menu profile-->
            <div class=" col-12 mt-1 mb-1 text-center  sticky-top top-0 ">
                <img src="resource/18.jpg" width="100px" height="100px" class="rounded-circle" />
            </div>

            <div class="col-12  ">
                <div class="row ">
                    <div class="col-12 text-center d-grid">
                        <label class="userN ">Wageesha Kavithwa</label>
                    </div>
                    <div class="col-12 text-center d-grid">
                        <label class="userE text-black-50">kavikk070@gmail.com</label>
                    </div>

                    <div class="col-12  d-grid">

                        <input type="file" class="d-none" id="profileimg" accept="image/*" />
                        <lable for="profileimg" class="col-6  offset-3  btn btn-atc-vnub  mt-2 ">Edit Profile</lable>

                    </div>
                </div>

            </div>



            <!-- account menu nav sm button -->
            <button type="button" class="btn  w-100 d-md-none mt-n2 mb-3 mt-3" data-bs-toggle="collapse" data-bs-target="#account-menu">
                <i class="bi bi-person-lines-fill fs-xl me-2"></i>
                <label> Account menu </label>
                <i class="bi bi-three-dots-vertical fs-lg ms-1 ">

                </i>
            </button>
        

            <div class="col-12 list-group list-group-flush collapse d-md-block mx-2 py-lg-5 py-md-5" id="account-menu">
                <ul class="nav flex-column">
                    <li class="nav-item nav-pills">
                        <a class="nav-link active" aria-current="page" href="#">Account Details</a>
                    </li>
                    <li class="nav-item nav-pills">
                        <a class="nav-link" href="#">Security</a>
                    </li>
                    <li class="nav-item nav-pills">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item nav-pills">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item nav-pills">
                        <a class="nav-link" href="#">Link</a>
                    </li>

                </ul>
            </div>



        </div>
    </div>
   

    <script src="script.js"></script>

</body>

</html>