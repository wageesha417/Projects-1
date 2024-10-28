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


                
                <ul class="nav justify-content-end">
                    <li class="nav-item ">
                        <a class="nav-link active" href="account.php">Overview</a>
                    </li>
                    <li class="nav-item nav-pills">
                        <a class="nav-link active" aria-current="page" href="#">Settings</a>
                    </li>
                </ul>
             

                <div class=" col-12 mb-2 ">
                    <div class="row">





                    

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
                             



                             
                                <button type="button" class="btn navSmButton w-100 d-md-none mt-n2 mb-3 mt-3" data-bs-toggle="collapse" data-bs-target="#account-menu">
                                    <i class="bi bi-person-lines-fill fs-xl me-2"></i>
                                    <label> Account menu </label>
                                    <i class="bi bi-three-dots-vertical fs-lg ms-1 ">

                                    </i>
                                </button>
                        

                                <div class="col-12 list-group list-group-flush collapse d-md-block mx-2 py-lg-5 py-md-5" id="account-menu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item nav-pills">
                                            <a class="nav-link active " aria-current="page" href="accSettings.php">Account Details</a>
                                        </li>
                           

                                    </ul>
                                </div>

                              


                            </div>
                        </div>
                        



                      

                        <div class="col-12 col-lg-5  ">

                            <div class="row py-5 py-5 g-2  ">
                                <div class="col-11 offset-lg-1 ">
                                    <label class="mainDT ">Account Details</label>
                                </div>


                                <div class="col-11 offset-lg-1 mt-5 mb-4">
                                    <label class="mainBT">Basic info</label>
                                </div>



                                <div class="col-11 offset-lg-1">
                                    <label class="form-lable UAtitl">First Name</label>
                                    <input type="text" class="form-control" value="<?php echo $data["fname"]; ?>" id="fname" />
                                </div>

                                <div class="col-11  offset-lg-1">
                                    <label class="form-lable UAtitl ">Last Name</label>
                                    <input type="text" class="form-control" value="<?php echo $data["lname"]; ?>" id="lname" />
                                </div>

                                <div class="col-11  offset-lg-1">
                                    <label class="form-lable UAtitl ">Email</label>
                                    <input type="text" class="form-control" readonly value="<?php echo $data["email"]; ?>" />
                                </div>

                                <div class="col-11  offset-lg-1">
                                    <label class="form-lable UAtitl">Password</label>
                                    <input type="password" class="form-control" readonly value="<?php echo $data["password"]; ?>" />
                                </div>

                                <div class="col-11  offset-lg-1">
                                    <label class="form-lable UAtitl">Mobile</label>
                                    <input type="text" class="form-control" value="<?php echo $data["mobile"]; ?>" id="mobile" />
                                </div>

                                <div class="col-11  offset-lg-1">
                                    <label class="form-lable UAtitl">Gender</label>
                                    <select class=" form-select">
                                        <option class="UAtitl  "><?php echo $data["gender_name"]; ?></option>
                                    </select>
                                </div>

                                <hr class="col-11 offset-lg-1 mt-5 mb-4 overflow-hidden" />

                                <div class="col-11 offset-lg-1 mb-4 ">
                                    <label class="mainBT UAtitl">Address</label>
                                </div>

                                <div class="col-5 offset-lg-1">
                                    <label class="form-lable UAtitl">Country</label>
                                    <select class="form-select" id="country">
                                        <option value="0">Select a country</option>
                                        <?php
                                        $country_rs = Database::search("SELECT * FROM country");
                                        while ($country = $country_rs->fetch_assoc()) {
                                            if ($country["id"] == $address_data["country_id"]) {
                                        ?>
                                                <option class="UAtitl" value="<?php echo $country["id"]; ?>" selected><?php echo $country["name"] ?></option>
                                            <?php
                                            } else {
                                            ?>
                                                <option class="UAtitl" value="<?php echo $country["id"]; ?>"><?php echo $country["name"] ?></option>
                                        <?php
                                            }
                                        }                                        ?>

                                    </select>
                                </div>

                                <?php
                                if (!empty($address_data["province"])) {

                                ?>

                                    <div class="col-5">
                                        <label class="form-lable UAtitl ">State/Province</label>
                                        <input type="text" class="form-control" value="<?php echo $address_data["province"]; ?>" id="state" />
                                    </div>

                                <?php

                                } else {

                                ?>


                                    <div class="col-5">
                                        <label class="form-lable UAtitl ">State/Province</label>
                                        <input type="text" class="form-control" id="state" />
                                    </div>



                                <?php

                                }

                                ?>

                                <?php
                                if (!empty($address_data["district"])) {

                                ?>
                                    <div class="col-5 offset-lg-1">
                                        <label class="form-lable ">District</label>
                                        <input type="text" class="form-control" value="<?php echo $address_data["district"]; ?>" id="dist" />
                                    </div>
                                <?php

                                } else {

                                ?>
                                    <div class="col-5 offset-lg-1">
                                        <label class="form-lable ">District</label>
                                        <input type="text" class="form-control" id="dist" />
                                    </div>

                                <?php

                                }
                                ?>


                                <?php

                                if (!empty($address_data["city"])) {

                                ?>
                                    <div class="col-5  ">
                                        <label class="form-lable UAtitl ">City</label>
                                        <input type="text" class="form-control" value="<?php echo $address_data["city"]; ?>" id="city" />
                                    </div>
                                <?php

                                } else {

                                ?>

                                    <div class="col-5 ">
                                        <label class="form-lable UAtitl ">City</label>
                                        <input type="text" class="form-control" id="city" />
                                    </div>

                                <?php

                                }

                                ?>


                                <?php

                                if (!empty($address_data["postal_code"])) {

                                ?>
                                    <div class="col-11  offset-lg-1">
                                        <label class="form-lable UAtitl ">ZIP code</label>
                                        <input type="text" class="form-control" value="<?php echo $address_data["postal_code"]; ?>" id="pcode" />
                                    </div>
                                <?php

                                } else {

                                ?>

                                    <div class="col-11  offset-lg-1">
                                        <label class="form-lable UAtitl ">ZIP code</label>
                                        <input type="text" class="form-control" id="pcode" />
                                    </div>

                                <?php

                                }

                                ?>



                                <?php

                                if (!empty($address_data["line1"])) {

                                ?>
                                    <div class="col-11  offset-lg-1">
                                        <label class="form-lable  UAtitl">Address line 1</label>
                                        <input type="text" class="form-control" value="<?php echo $address_data["line1"]; ?>" id="line1" />
                                    </div>
                                <?php

                                } else {

                                ?>

                                    <div class="col-11  offset-lg-1">
                                        <label class="form-lable  UAtitl">Address line 1</label>
                                        <input type="text" class="form-control" id="line1" />
                                    </div>

                                <?php

                                }

                                ?>

                                <?php

                                if (!empty($address_data["line2"])) {

                                ?>
                                    <div class="col-11  offset-lg-1">
                                        <label class="form-lable  UAtitl">Address line 2</label>
                                        <input type="text" class="form-control" value="<?php echo $address_data["line2"]; ?>" id="line2" />
                                    </div>
                                <?php

                                } else {

                                ?>

                                    <div class="col-11  offset-lg-1">
                                        <label class="form-lable  UAtitl">Address line 2</label>
                                        <input type="text" class="form-control" id="line2" />
                                    </div>

                                <?php

                                }

                                ?>




                                <div class="col-12">

                                    <div class="row py-3">
                                        <div class="col-2  offset-lg-1 d-grid ">
                                            <button class="btn btn-outline-vnyB" onclick="window.location.reload();">Cancel</button>
                                        </div>

                                        <div class="col-5   d-grid ">
                                            <button class="btn btn-atc-vnub  " onclick="SaveChanges();">Save changes</button>
                                        </div>
                                    </div>
                                </div>





                            </div>


                        </div>
                        <!-- content -->








                    </div>


                </div>

            <?php

            } else {

                header("Location:http://localhost/vnytechnologies/sHome.php");
            }

            ?>

            <?php include "footer.php"; ?>
        </div>
    </div>



    <script src="script.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    

</body>

</html>