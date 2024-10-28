<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            line-height: 1.5;
            font-family: 'Poppins', sans-serif;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        .container {
            max-width: 1170px;
            margin: auto;
        }
        
        .row {
            display: flex;
            flex-wrap: wrap;
        }
        
        ul {
            list-style: none;
        }
        
        .footer {
            background-color: #dcdcdc;
            padding: 70px 0;
            font-family: 'Poppins', sans-serif;
            color: #000000; /* Black color */
        }
        
        .footer-col {
            width: 25%;
            padding: 0 15px;
        }
        
        .footer-col h4 {
            font-size: 18px;
            color: #000000; /* Black color */
            text-transform: capitalize;
            margin-bottom: 35px;
            font-weight: 500;
            position: relative;
        }
        
        .footer-col h4::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            background-color: #e91e63;
            height: 2px;
            box-sizing: border-box;
            width: 50px;
        }
        
        .footer-col ul li:not(:last-child) {
            margin-bottom: 10px;
        }
        
        .footer-col ul li a {
            font-size: 16px;
            text-transform: capitalize;
            color: #000000; /* Black color */
            text-decoration: none;
            font-weight: 300;
            display: block;
            transition: all 0.3s ease;
        }
        
        .footer-col ul li a:hover {
            color: #000000; /* Black color */
            padding-left: 8px;
        }
        
        .footer-col .social-links a {
            display: inline-block;
            height: 40px;
            width: 40px;
            background-color: rgba(255, 255, 255, 0.2);
            margin: 0 10px 10px 0;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            color: #000000; /* Black color */
            transition: all 0.5s ease;
        }
        
        .footer-col .social-links a:hover {
            color: #24262b;
            background-color: #ffffff;
        }
        
        @media (max-width: 767px) {
            .footer-col {
                width: 50%;
                margin-bottom: 30px;
            }
        }
        
        @media (max-width: 574px) {
            .footer-col {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>company</h4>
                    <ul>
                        <li><a href="#">about us</a></li>
                        <li><a href="#">our services</a></li>
                        <li><a href="#">privacy policy</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>get help</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">order status</a></li>
                        <li><a href="#">payment options</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>online shop</h4>
                    <ul>
                        <li><a href="#">Sri-lankan</a></li>
                        <li><a href="#">Indian</a></li>
                        <li><a href="#">Chinese</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
