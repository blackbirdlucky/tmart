<!doctype html>
<html class="no-js" lang="en">

<?php
$user = 'root';
$pass = '';
$dbh = new PDO('mysql:host=localhost;dbname=tmart', $user, $pass);
?>

<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tmart - carshop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel main css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">


    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">


<?php
require_once 'header.php'
?>

        
        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">



        </div>
        <!-- End Offset Wrapper -->

        <!-- Start Slider Area -->
        <div class="slider__container slider--one">
            <div class="slider__activation__wrap owl-carousel owl-theme">


                <!-- Start Single Slide -->
                <div class="slide slider__full--screen" style="background: rgba(0, 0, 0, 0) url(images/slider/bg/12.jpg) no-repeat scroll center center / cover ;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-lg-8 col-sm-12 col-xs-12">
                                <div class="slider__inner">
                                    <h1>Машина мечты <span class="text--theme">TMART</span></h1>
                                    <div class="slider__btn">
                                        <a class="htc__btn" href="shop.php">Купить</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->

            </div>
        </div>


<?php
require_once 'footer.php'
?>

    </div>
    <!-- Body main wrapper end -->


    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="js/plugins.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="js/main.js"></script>

</body>

</html>