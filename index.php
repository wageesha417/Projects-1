<?php

require "connection.php";

?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gallery Cafe User Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/Icon.svg" />
</head>

<body class="main-body">
    <div class="container-fluid  d-flex justify-content-center">
        <div class="row align-content-center">
     
    

           
            <div class="col-12 ">
                <div class="row">
                   
                </div>
            </div>
          

           
            <div class="col-12 p-3">
                <div class="row">

                    <div class="col-6  d-none  d-lg-block  background" ></div>
                    <div class="col-12 col-lg-6 " id="createAccountBox">
                        <div class="row g-2">
                            <div class="col-12 ">
                                <p class="title1">Create Your Gallery Cafe account</p>
                            </div>

                                
                                <div class="col-12 d-none" id="msgdiv">
                                 <span id="msg" class="msg"></span>
                                </div>
                                


                            <div class="col-12">
                                <label class="form-lable title2">First Name</label>
                                <input type="text" class="form-control" id="f" />
                            </div>

                            <div class="col-12">
                                <label class="form-lable title2">Last Name</label>
                                <input type="text" class="form-control" id="l" />
                            </div>

                            <div class="col-12">
                                <label class="form-lable title2">Email</label>
                                <input type="text" class="form-control" id="e" />
                            </div>

                            <div class="col-12">
                                <label class="form-lable title2">Password</label>
                                <input type="password" class="form-control" id="p" />
                            </div>

                            <div class="col-6">
                                <label class="form-lable title2">Mobile</label>
                                <input type="text" class="form-control" id="m" />
                            </div>

                            <div class="col-6">
                                <label class="form-lable title2">Gender</label>
                                <select class="form-select" id="g">
                                    <?php
                                    
                                    $rs = Database::search("SELECT * FROM `gender`");
                                    $n = $rs->num_rows;

                                    for ($x = 0; $x < $n; $x++) {
                                        $d = $rs->fetch_assoc();

                                    ?>

                                        <option value="<?php echo $d["id"]; ?>"> <?php echo $d["gender_name"]; ?> </option>

                                    <?php

                                    }
                                    ?>
                                </select>
                                
                            </div>

                            <div class="col-12">
                                <label class="form-lable title2">Country</label>
                                <select class="form-select" id="c">
                                <?php
                                    
                                    $rs = Database::search("SELECT * FROM `country`");
                                    $n = $rs->num_rows;

                                    for ($x = 0; $x < $n; $x++) {
                                        $d = $rs->fetch_assoc();

                                    ?>

                                        <option value="<?php echo $d["id"]; ?>"> <?php echo $d["name"]; ?> </option>

                                    <?php

                                    }
                                    ?>

                                </select>
                            </div>


                            <div class="col-12 ">
                                <p class="infoTitle">By creating an account, I agree to the Terms of Use and acknowledge that I have read the Privacy Policy.</p>
                            </div>

                            <div class="col-12  col-lg-6 d-grid">
                                <button class="btn btn-block btn-outline-vnyA  bTitle" onclick="createAccount();">Create account</button>
                            </div>

                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-block btn-outline-vnyB bTitle" onclick="changeView();">Log In</button>
                            </div>

                        </div>
                    </div>

                    <div class="col-12 col-lg-6 d-none " id="logInBox">
                        <div class="row g-2">
                            <div class="col-12 ">
                                <p class="title1">Log In</p>
                                <span class="msg" id="msg2"></span>
                            </div>

                            <?php
                            $email = "";
                            $password = "";

                            if (isset($_COOKIE["email"])) {
                                $email = $_COOKIE["email"];
                            }

                            if (isset($_COOKIE["password"])) {
                                $password = $_COOKIE["password"];
                            }
                            ?>

                            <div class="col-12">
                                <label class="form-lable title2">Email</label>
                                <input type="text" class="form-control" id="email2" value="<?php  echo $email; ?>"/>
                            </div>

                            <div class="col-12">
                                <label class="form-lable title2">Password</label>
                                <input type="password" class="form-control" id="password2" value="<?php  echo $password; ?>"/>
                            </div>

                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"  id="rememberme"  >
                                    <label class="form-check-label title2">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <a  class="link-primary" onclick="forgotPassword();">Forgot Password?</a>
                            </div>

                            <div class="col-12  col-lg-12 d-grid">
                                <button class="btn btn-block btn-outline-vnyA  bTitle" onclick="logIn();">Log In</button>
                            </div>

                            <div class="col-12 col-lg-12 d-grid">
                                <button class="btn btn-block btn-outline-vnyB bTitle" onclick="changeView();">Join Now</button>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <!--content-->


        
          
        </div>
    </div>
    <script src="bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>