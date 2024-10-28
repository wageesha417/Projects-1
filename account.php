<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="semantic.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="resource/Icon.svg" />
</head>

<body onload="createAccAnimation();">
    <div class=" container-fluid" id="accMain">
        <div class="row  ">
            <?php require "sHeader.php" ?>

            <?php

            if (isset($_SESSION["u"])) {
                $email = $_SESSION["u"]["email"];

                $data_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
                $data = $data_rs->fetch_assoc();

                $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $email . "'");
                $image_data = $image_rs->fetch_assoc();

            ?>



                <!-- nav menu -->
                <ul class="nav justify-content-end ">
                    <li class="nav-item  nav-pills ">
                        <a class="nav-link active" href="account.php">More</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="accSettings.php">Settings</a>
                    </li>
                </ul>
                <!-- nav menu -->

                <diV >


                    <!-- main title -->
                    <div class="col-6 ">
                        <div class="row d-grid">

                            <label class="acTitle ">Account Details</label>

                        </div>
                    </div>
                    <!-- main title -->


                    <div class="col-11 text-center text-lg-start mt-1 mb-1 offset-lg-1">
                        <img src="<?php echo $image_data["path"]; ?>" width="100px" height="100px" class="rounded-circle pimg  shadow" />
                    </div>




                    <div class="col-12 mt-3 mb-3 py-3 ">
                        <div class="row d-flex justify-content-center ">

                            <div class="col-lg-6 col-12 shadow align-items-center" style="width: 80rem; ">
                                <div class="row ">

                                    <div class="col-12 ">
                                        <label class="niceToSeeYou">Hello, Welcome Back ! <?php echo $data["fname"]; ?></label>
                                    </div>

                                    <div class="col-12">
                                        <label class="accInfo text-black-50">A gallery cafe is a unique blend of a coffee shop and an art gallery, offering patrons a vibrant and artistic atmosphere to enjoy their meals and beverages. 
                                            These cafes typically showcase a rotating selection of artworks, often from local artists, creating an ever-changing visual experience for visitors. 
                                            The ambiance is designed to be cozy and inviting, making it a perfect spot for art enthusiasts, creatives, and those looking to relax in a culturally rich environment

                                        </label>
                                        <p>
                                         Contact Us From our web
                                      <br/>
                                        Address:
                                        <br/>
                                        The Gallery Cafe
                                        34/6 temple road
                                        colombo 03
                                        Sri Lanka
                                        <br/>
                                        Phone: 076-6482126
                                        <br/>
                                        Email: kavikk070@gmail.com
                                        <br/>
                                        Opening Hours:
                                        <br/>
                                        Weekdays :- 8.00 A.M to 10.00 P.M
                                        </p>
                                    </div>

                                    <div class="col-12 py-3 text-center">
                                        <button class="vnyBtn" onclick="( window.location ='accSettings.php')">Continue to settings</button>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-6 col-12 ">
                               
                            </div>

                        </div>
                    </div>

                </diV>

            <?php



            } else {

                header("Location:http://localhost/gallerycafe/sHome.php");
            }

            ?>





            <?php require "footer.php" ?>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
   
</body>

</html>