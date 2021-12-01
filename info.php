<!doctype html>
<html class="no-js" lang="en">

<?php
$user = 'root';
$pass = '';
$dbh = new PDO('mysql:host=localhost;dbname=tmart', $user, $pass);
?>

<?php
session_start();
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
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
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
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Информация</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Главная</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Информация</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->

        <div class="portfolio-grid-area bg__white pt--130 pb--100">
		    <div class="container">

		        <div class="portfolio-menu-active gutter-btn mb--50 text-center">
                    <button class="active" data-filter="*">Все</button>
                    <button data-filter=".gl">GL-класс</button>
                    <button data-filter=".cls">CLS-класс</button>
                    <button data-filter=".gle">GLE-класс</button>
                    <button data-filter=".s">S-класс</button>
                    <button data-filter=".c">C-класс</button>
                </div>

                <div class="portfolio-style">
                    <div class="row grid">


                        <?php
                        $sql = "SELECT * FROM `auto`";
                        $result_select = mysqli_query($on_link, $sql);
                        while ($obj = mysqli_fetch_object($result_select)) { ?>

                        <div class="col-md-4 col-sm-6 col-xs-12 grid-item <?php echo $obj->class_auto ?>">
                            <div class="single-portfolio-card mb--30">
                                <div class="portfolio-img">

                                    <a href="">
                                        <img src="admin/images/<?php echo $obj->cover_auto ?>" alt="" />
                                    </a>

                                    <div class="portfolio-icon">
                                        <a class="video-popup" href="<?php echo $obj->link_auto ?>">
                                            <i class="zmdi zmdi-videocam"></i>
                                        </a>
                                    </div>

                                </div>

                                <div class="portfolio-title portfolio-card-title text-center">
                                    <h3><a href="product-details-sticky-right.php?id_auto=<?php echo $obj->id_auto ?>"><?php echo $obj->title_auto ?></a></h3>
                                    <span>TMART</span>
                                </div>

                            </div>						
                        </div>

                        <?php }
                        ?>


                    </div>		
                </div>
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