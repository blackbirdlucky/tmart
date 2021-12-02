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
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Body main wrapper start -->
<div class="wrapper fixed__footer">

    <?php
    require_once 'header.php'
    ?>


    <div class="body__overlay"></div>
    <!-- Start Offset Wrapper -->
    <div class="offset__wrapper">
        <!-- Start Search Popap -->
        <div class="search__area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="search__inner">
                            <form action="#" method="get">
                                <input placeholder="Search here... " type="text">
                                <button type="submit"></button>
                            </form>
                            <div class="search__close__btn">
                                <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Search Popap -->
    </div>
    <!-- End Offset Wrapper -->

    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area"
         style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Оформление</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="index.php">Главная</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Оформление</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->

    <?php

    require_once "config.php";


    $name_order = $fam_order = $mail_order = $phone_order = $desc_order = $city_order = $address_order = "";
    $error_name = $error_fam = $error_mail = $error_phone = $error_desc = $error_city = $error_address = "";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty(trim($_POST["name_order"]))) {
            $error_name = "Please enter name.";
        } else {
            $name_order = trim($_POST["name_order"]);
        }


        if (empty(trim($_POST["fam_order"]))) {
            $error_fam = "Please enter fam.";
        } else {
            $fam_order = trim($_POST["fam_order"]);
        }


        if (empty(trim($_POST["mail_order"]))) {
            $error_mail = "Please enter mail.";
        } else {
            $mail_order = trim($_POST["mail_order"]);
        }


        if (empty(trim($_POST["phone_order"]))) {
            $error_phone = "Please enter phone.";
        } else {
            $phone_order = trim($_POST["phone_order"]);
        }


        if (empty(trim($_POST["desc_order"]))) {
            $error_desc = "Please enter desc.";
        } else {
            $desc_order = trim($_POST["desc_order"]);
        }


        if (empty(trim($_POST["city_order"]))) {
            $error_city = "Please enter city.";
        } else {
            $city_order = trim($_POST["city_order"]);
        }


        if (empty(trim($_POST["address_order"]))) {
            $error_address = "Please enter address.";
        } else {
            $address_order = trim($_POST["address_order"]);
        }


        if (empty($error_name) && empty($error_fam) && empty($error_mail) && empty($error_phone) && empty($error_desc) && empty($error_city) && empty($error_address)) {

            // Prepare an insert statement
            $sql = "INSERT INTO orders (name_order,fam_order,mail_order,phone_order,desc_order, city_order, address_order) VALUES (:name_order,:fam_order,:mail_order,:phone_order,:desc_order,:city_order,:address_order)";

            if ($stmt = $pdo->prepare($sql)) {
                // Bind variables to the prepared statement as parameters
                $stmt->bindParam(":name_order", $param_name_order, PDO::PARAM_STR);
                $stmt->bindParam(":fam_order", $param_fam_order, PDO::PARAM_STR);
                $stmt->bindParam(":mail_order", $param_mail_order, PDO::PARAM_STR);
                $stmt->bindParam(":phone_order", $param_phone_order, PDO::PARAM_STR);
                $stmt->bindParam(":desc_order", $param_desc_order, PDO::PARAM_STR);
                $stmt->bindParam(":city_order", $param_city_order, PDO::PARAM_STR);
                $stmt->bindParam(":address_order", $param_address_order, PDO::PARAM_STR);

                // Set parameters
                $param_name_order = $name_order;
                $param_fam_order = $fam_order;
                $param_mail_order = $mail_order;
                $param_phone_order = $phone_order;
                $param_desc_order = $desc_order;
                $param_city_order = $city_order;
                $param_address_order = $address_order;

                // Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    // Redirect to login page
                    header("location:index.php");
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                unset($stmt);
            }

        }
    }

    ?>

    <!-- Start Checkout Area -->
    <section class="our-checkout-area ptb--120 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <div class="ckeckout-left-sidebar">
                        <!-- Start Checkbox Area -->
                        <div class="checkout-form">
                            <h2 class="section-title-3">Оформление заказа</h2>
                            <div class="checkout-form-inner">
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <div class="single-checkout-box">

                                        <input type="text" placeholder="Имя" name="name_order"
                                               class="<?php echo (!empty($error_name)) ? 'is-invalid' : ''; ?>"
                                               value="<?php echo $name_order; ?>">
                                        <span class="invalid-feedback"><?php echo $error_name; ?></span>

                                    </div>
                                    <div class="single-checkout-box">
                                        <input type="text" placeholder="Фамилия" name="fam_order"
                                               class="<?php echo (!empty($error_fam)) ? 'is-invalid' : ''; ?>"
                                               value="<?php echo $fam_order; ?>">
                                        <span class="invalid-feedback"><?php echo $error_fam; ?></span>

                                    </div>

                                    <div class="single-checkout-box">
                                        <input type="email" placeholder="Почта" name="mail_order"
                                               class="<?php echo (!empty($error_mail)) ? 'is-invalid' : ''; ?>"
                                               value="<?php echo $mail_order; ?>">
                                        <span class="invalid-feedback"><?php echo $error_mail; ?></span>
                                    </div>

                                    <div class="single-checkout-box">

                                        <input type="text" placeholder="Номер" name="phone_order"
                                               class="<?php echo (!empty($error_phone)) ? 'is-invalid' : ''; ?>"
                                               value="<?php echo $phone_order; ?>">
                                        <span class="invalid-feedback"><?php echo $error_phone; ?></span>

                                    </div>

                                    <div class="single-checkout-box">
                                        <textarea type="text" placeholder="Предпочтения" name="desc_order"
                                                  class="<?php echo (!empty($error_desc)) ? 'is-invalid' : ''; ?>"
                                                  value="<?php echo $desc_order; ?>"></textarea>
                                        <span class="invalid-feedback"><?php echo $error_desc; ?></span>
                                    </div>

                                    <div class="single-checkout-box" style="padding-top: 25px">
                                        <input type="text" placeholder="Город" name="city_order"
                                               class="<?php echo (!empty($error_city)) ? 'is-invalid' : ''; ?>"
                                               value="<?php echo $city_order; ?>">
                                        <span class="invalid-feedback"><?php echo $error_city; ?></span>
                                    </div>

                                    <div class="single-checkout-box">
                                        <input type="text" placeholder="Адрес" name="address_order"
                                               class="<?php echo (!empty($error_address)) ? 'is-invalid' : ''; ?>"
                                               value="<?php echo $address_order; ?>">
                                        <span class="invalid-feedback"><?php echo $error_address; ?></span>
                                    </div>

                            </div>
                        </div>
                        <!-- End Checkbox Area -->


                        <!-- Start Payment Way -->
                        <div class="checkout-btn">
                            <button type="submit" name="order" class="btn btn-success">
                                Подтвердить и оставить заявку
                            </button>
                        </div>
                        </form>

                        <!-- End Payment Way -->
                    </div>
                </div>

                <div class="col-md-4 col-lg-4">
                    <div class="checkout-right-sidebar">
                        <div class="puick-contact-area mt--60">
                            <h2 class="section-title-3">Обратная связь</h2>
                            <a href="#">+8 800 555 35 35 </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Checkout Area -->

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