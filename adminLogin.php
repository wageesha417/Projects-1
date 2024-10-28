

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
                                <p class="title1">Admin Login</p>
                                <span class="msg" id="msg2"></span>
                            </div>

                            <div class="col-12">
                                <label class="form-lable title2">Email</label>
                                <input type="Text" class="form-control" id="email" />
                            </div>

                            
                            <div class="col-12 code" id="code">
                                <label class="form-lable title2">Code</label>
                                <input type="Text" class="form-control" id="codex" />
                            </div>

                            <div class="col-12  col-lg-12 d-grid log" id="log">
                                <button class="btn btn-block btn-outline-vnyA  bTitle" onclick="adminLogin();">LogIn</button>
                            </div>

                            <div class="col-12  col-lg-12 d-grid view " id="view">
                                <button class="btn btn-block btn-outline-vnyA  bTitle" onclick="sendCode();">Send verification code</button>
                            </div>

                            <div class="col-12 col-lg-12 d-grid viewx" id='viewx'>
                                <button class="btn btn-block btn-outline-vnyB bTitle" onclick="window.location = 'index.php'">Customer LogIn</button>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
         


        
          
        </div>
    </div>
    


    <script src="script.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
</body>

</html>