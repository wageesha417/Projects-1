<?php

require "connection.php";

$email = $_GET['email'];

?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gallery Cafe</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/Icon.svg" />
</head>

<body class="main-body">
    <div class="container-fluid  d-flex justify-content-center">
        <div class="row align-content-center">
     
    

            <!--header-->
            <div class="col-12 ">
                <div class="row">
                    <div class="col-12  d-lg-none   hLogo"></div>
                </div>
            </div>
            <!--header-->

            <!--content-->
            <div class="col-12 p-3">
                <div class="row">

                    <div class="col-6  d-none  d-lg-block  background" ></div>
                 

                    <div class="col-12 col-lg-6">
                        <div class="row g-2">
                            <div class="col-12 ">
                                <p class="title1">Reset Password</p>
                                <span class="msg" id="msg2"></span>
                            </div>

                        
                            <div class="col-12">
                                <label class="form-lable title2">New Password</label>
                                <input type="password" class="form-control" id="password" />
                            </div>

                            <div class="col-12">
                                <label class="form-lable title2">Re-Type Password</label>
                                <input type="password" class="form-control" id="rePassword" />
                            </div>

                            <div class="col-12">
                                <label class="form-lable title2">Verification Code</label>
                                <input type="Text" class="form-control" id="code" />
                            </div>

                            <div class="col-12  col-lg-12 d-grid">
                                <button class="btn btn-block btn-outline-vnyA  bTitle" onclick="reset('<?php echo $email?>');">Reset Password</button>
                            </div>

                            <div class="col-12 col-lg-12 d-grid">
                                <button class="btn btn-block btn-outline-vnyB bTitle" onclick="window.location = 'index.php'">Close</button>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <!--content-->


        
          
        </div>
    </div>
    
    <script src="script.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
</body>

</html>