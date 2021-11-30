<!doctype html>
<html class="no-js" lang="en">

<?php
require_once 'func.php';
?>

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

    <?php
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    // Подключение к базе данных MySQL.
    @$on_link = mysqli_connect($db_host, $db_user, $db_pass);
    if (!$on_link) {
        echo "Ошибка соединения с сервером MySQL!";
        exit;
    }
    // изменение набора символов на utf8
    mysqli_set_charset($on_link, "utf8");
    // Выбираем БД для работы в MySQL.
    $db_base_ref = 'tmart';
    @$db_select = mysqli_select_db($on_link, $db_base_ref);
    if (!$db_select) {
        echo "Не удалось выбрать БД MySQL.";
        exit;
    }
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
                                <input placeholder="Поиск... " type="text">
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
                            <h2 class="bradcaump-title">Корзина</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="index.php">Главная</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Корзина</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->

    <!-- cart-main-area start -->
    <div class="cart-main-area ptb--120 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <form action="#">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">Фотография</th>
                                    <th class="product-name">Название</th>
                                    <th class="product-price">Цена</th>
                                    <th class="product-remove">Удалить</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $id_user = $_GET['id_user'];
                                $sql = "SELECT cart.id_cart, auto.cover_auto, auto.title_auto, auto.newprice_auto 
                                            FROM auto
                                            JOIN cart 
                                            ON cart.id_auto = auto.id_auto
                                            WHERE cart.id_user = $id_user";
                                $result_select = mysqli_query($on_link, $sql);
                                while ($obj = mysqli_fetch_object($result_select)) { ?>
                                    <tr>
                                        <td class="product-thumbnail"><a href="#"><img src="<?php echo $obj->cover_auto ?>" alt="product img"/></a></td>
                                        <td class="product-name"><a href="#"><?php echo $obj->title_auto ?></a></td>
                                        <td class="product-price"><span class="amount"><?php echo $obj->newprice_auto ?></span></td>
                                        <td class="product-remove">
                                            <form action="" method="post">
                                                <input type="hidden" name="id_cart" value="<?php echo $obj->id_cart ?>" />
                                                <button type="submit" name="delete_cart" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                <?php }
                                ?>




                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-8 col-sm-7 col-xs-12">
                                <div class="buttons-cart">
                                    <a href="shop.php">Назад</a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-5 col-xs-12">
                                <div class="cart_totals">
                                    <h2>Оформление заказа</h2>

                                    <div class="wc-proceed-to-checkout">
                                        <a href="checkout.php">Купить</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- cart-main-area end -->

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
