<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

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

    <div class="container-fluid ">
        <div class="row">
            <?php include "sHeader.php"; ?>
            <?php




            if (isset($_SESSION["u"])) {

                $email = $_SESSION["u"]["email"];

                $details_rs = Database::search("SELECT * FROM `user` INNER JOIN `gender` ON
                gender.id=user.gender_id WHERE `email`='" . $email . "' ");

                $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $email . "'");

                $address_rs = Database::search("SELECT *, country.id AS country_id FROM `user_has_address` INNER JOIN `country` ON
                user_has_address.country_id=country.id WHERE `user_email`='" . $email . "'");

                $data = $details_rs->fetch_assoc();
                $image_data = $image_rs->fetch_assoc();
                $address_data = $address_rs->fetch_assoc();


            ?>
                <div class=" col-12 mb-2 ">
                    <div class="row">

                       <!-- nav menu -->
                       <ul class="nav justify-content-end">
                                <li class="nav-item ">
                                    <a class="nav-link active" href="account.php">Overview</a>
                                </li>
                                <li class="nav-item nav-pills">
                                    <a class="nav-link active" aria-current="page"   href="#">Settings</a>
                                </li>
                            </ul>
                        <!-- nav menu -->

                        <!-- account menu -->

                        <div class="col-12 col-lg-3 overflow-hidden  border-end py-4 shadow rounded ">
                            <div class="row">


                                <!-- account menu profile-->
                                <div class=" col-12 mt-1 mb-1 text-center ">

                                    <?php

                                    if (empty($image_data["path"])) {

                                    ?>
                                        <img src="resource/profile_img/18.jpg" width="100px" height="100px" class="rounded-circle pimg  shadow" id="viewImg" />
                                    <?php

                                    } else {

                                    ?>
                                        <img src="<?php echo $image_data["path"]; ?>" width="100px" height="100px" class="rounded-circle shadow " id="viewImg" />
                                    <?php

                                    }


                                    ?>

                                </div>

                                <div class="col-12 ">
                                    <div class="row ">
                                        <div class="col-12 text-center d-grid">
                                            <label class="userN "><?php echo $data["fname"] . " " . $data["lname"]; ?></label>
                                        </div>
                                        <div class="col-12 text-center d-grid">
                                            <label class="userE text-black-50"><?php echo $email; ?></label>
                                        </div>

                                        <div class="col-12  d-grid">

                                            <input type="file" class="d-none" id="profileimg" accept="image/*" />
                                            <label for="profileimg" class="col-6  offset-3  btn btn-atc-vnub  mt-2" onclick="changeImage();">Edit Profile</label>


                                        </div>
                                    </div>

                                </div>
                                <!-- account menu profile-->



                                <!-- account menu nav sm button -->
                                <button type="button" class="btn navSmButton w-100 d-md-none mt-n2 mb-3 mt-3" data-bs-toggle="collapse" data-bs-target="#account-menu">
                                    <i class="bi bi-person-lines-fill fs-xl me-2"></i>
                                    <label> Account menu </label>
                                    <i class="bi bi-three-dots-vertical fs-lg ms-1 ">

                                    </i>
                                </button>
                                <!-- account menu nav sm button -->

                                <!-- account menu nav -->

                                <div class="col-12 list-group list-group-flush collapse d-md-block mx-2 py-lg-5 py-md-5" id="account-menu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item nav-pills">
                                            <a class="nav-link " aria-current="page" href="accSettings.php">Account Details</a>
                                        </li>
                                        <li class="nav-item nav-pills">
                                            <a class="nav-link active" href="security.php">Security</a>
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

                                <!-- account menu nav -->


                            </div>
                        </div>
                        <!-- account menu -->



                        


                    </div>


                </div>

            <?php

            } else {
                header("Location:http://localhost/gallerycafe/sHome.php");
            }

            ?>

            <?php include "footer.php"; ?>
        </div>
    </div>



    <script src="script.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <!-- <script src="bootstrap.bundle.js"></script> -->
    <script src="semantic.js"></script>
    <script src="semantic.min.js"></script>
</body>

</html>