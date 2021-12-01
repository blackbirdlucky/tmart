<!doctype html>
<html class="no-js" lang="en">

<?php
include 'func.php';
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
                            <h2 class="bradcaump-title">Автомобили</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="index.php">Главная</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Автомобили</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->

    <!-- Start Our Product Area -->
    <section class="htc__product__area shop__page ptb--130 bg__white">
        <div class="container">
            <div class="htc__product__container">

                <!-- Start Product MEnu -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="filter__menu__container">
                            <div class="product__menu">
                                <button class="active" data-filter="*">Все</button>
                                <button data-filter=".gl">GL-класс</button>
                                <button data-filter=".cls">CLS-класс</button>
                                <button data-filter=".gle">GLE-класс</button>
                                <button data-filter=".s">S-класс</button>
                                <button data-filter=".c">C-класс</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Product MEnu -->

                <div class="row">
                    <div class="product__list another-product-style">


                        <?php
                        $sql = "SELECT * FROM `auto`";
                        $result_select = mysqli_query($on_link, $sql);
                        while ($obj = mysqli_fetch_object($result_select)) { ?>

                        <!-- Start Single Product -->
                        <div class="col-md-3 single__pro col-lg-3 col-sm-4 col-xs-12 <?php echo $obj->class_auto ?>">
                            <div class="product foo">
                                <div class="product__inner">
                                    <div class="pro__thumb">
                                        <a href="#">
                                            <img src="admin/images/<?php echo $obj->cover_auto ?>" alt="product images">
                                        </a>
                                    </div>

                                    <div class="product__hover__info">
                                        <ul class="product__action">

                                            <li><a data-toggle="modal" data-target="#productModal<?= $obj->id_auto ?>" title="Описание"
                                                   class="quick-view modal-view detail-link" href="#"><span
                                                            class="ti-plus"></span></a></li>

                                        </ul>
                                    </div>

                                </div>
                                <div class="product__details">
                                    <h2><a href=""><?php echo $obj->title_auto ?></a></h2>
                                    <ul class="product__price">
                                        <li class="old__price">$<?php echo $obj->oldprice_auto ?>.00</li>
                                        <li class="new__price">$<?php echo $obj->newprice_auto ?>.00</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->

                        <?php }
                        ?>

                    </div>
                </div>



            </div>
        </div>
    </section>
    <!-- End Our Product Area -->

    <?php
    require_once 'footer.php'
    ?>

</div>
<!-- Body main wrapper end -->


<?php
$sql = "SELECT * FROM `auto`";
$result_select = mysqli_query($on_link, $sql);
while ($obj = mysqli_fetch_object($result_select)) { ?>

    <!-- QUICKVIEW PRODUCT -->
    <div id="quickview-wrapper">
        <!-- Modal -->
        <div class="modal fade" id="productModal<?= $obj->id_auto ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog modal__container" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-product">
                            <!-- Start product images -->
                            <div class="product-images">
                                <div class="main-image images">
                                    <img alt="big images" src="admin/images/<?php echo $obj->slider1_auto ?>">
                                </div>
                            </div>
                            <!-- end product images -->
                            <div class="product-info">
                                <h1><?php echo $obj->title_auto ?></h1>

                                <div class="rating__and__review">
                                    <ul class="rating">
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                    </ul>
                                </div>

                                <div class="price-box-3">
                                    <div class="s-price-box">
                                        <span class="new-price">$<?php echo $obj->oldprice_auto ?>.00</span>
                                        <span class="old-price">$<?php echo $obj->newprice_auto ?>.00</span>
                                    </div>
                                </div>

                                <div class="pro__details">
                                    <p> <?php echo $obj->desc_auto ?> </p>
                                </div>

                                <div class="addtocart-btn">
                                    <form action="" method="post">
                                        <input type="hidden" name="id_user" value="<?php echo $_SESSION['id']?>" />
                                        <input type="hidden" name="id_auto" value="<?php echo $obj->id_auto ?>" />
                                        <button type="submit" name="submit" class="btn btn-success btn-lg">Добавить в корзину</button>
                                    </form>
                                </div>


                            </div><!-- .product-info -->
                        </div><!-- .modal-product -->
                    </div><!-- .modal-body -->
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div>
        <!-- END Modal -->
    </div>
    <!-- END QUICKVIEW PRODUCT -->

<?php }
?>







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