<?php
error_reporting(E_ERROR | E_PARSE);
?>

<!-- Start Header Style -->
<header id="header" class="htc-header">
    <!-- Start Mainmenu Area -->
    <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                    <div class="logo">
                        <a href="index.php">
                            <img src="images/logo/logo.png" alt="logo">
                        </a>
                    </div>
                </div>
                <!-- Start MAinmenu Ares -->

                <?php if (($_SESSION['loggedin']) and ($_SESSION['is_admin'] == 1)) : ?>

                <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                    <nav class="mainmenu__nav hidden-xs hidden-sm">
                        <ul class="main__menu">

                            <li><a href="#">♔[<?php echo htmlspecialchars($_SESSION["username"]); ?>]♔</a></li>

                            <li class="drop"><a href="index.php">Главная</a> </li>

                            <li class="drop"><a href="info.php">Каталог</a></li>

                            <li class="drop"><a href="shop.php">Автомобили</a></li>

                            <li class="drop"><a>Личный кабинет</a>
                                <ul class="dropdown">
                                    <li><a href="admin/admin.php">Админ-панель</a></li>
                                </ul>
                            </li>

                            <li><a href="logout.php">Выйти</a></li>

                        </ul>
                    </nav>
                </div>

                <?php elseif ($_SESSION['loggedin']) : ?>

                <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                    <nav class="mainmenu__nav hidden-xs hidden-sm">
                        <ul class="main__menu">

                            <li><a href="#">[<?php echo htmlspecialchars($_SESSION["username"]); ?>]</a></li>

                            <li class="drop"><a href="index.php">Главная</a> </li>

                            <li class="drop"><a href="info.php">Каталог</a></li>

                            <li class="drop"><a href="shop.php">Автомобили</a></li>

                            <li class="drop"><a>Личный кабинет</a>
                                <ul class="dropdown">
                                    <li><a href="cart.php?id_user=<?php echo $_SESSION['id'] ?>">Корзина</a></li>
                                </ul>
                            </li>


                            <li><a href="logout.php">Выйти</a></li>

                        </ul>
                    </nav>
                </div>

                <?php else: ?>

                <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                    <nav class="mainmenu__nav hidden-xs hidden-sm">
                        <ul class="main__menu">


                            <li class="drop"><a href="index.php">Главная</a> </li>

                            <li class="drop"><a href="info.php">Каталог</a></li>

                            <li class="drop"><a href="shop.php">Автомобили</a></li>

                        </ul>
                    </nav>
                </div

                    <?php endif; ?>

                <!-- End MAinmenu Ares -->
                <div class="col-md-2 col-sm-4 col-xs-3">
                    <ul class="menu-extra">
                        <li class="search search__open hidden-xs"><span class="ti-search"></span></li>
                        <li><a href="login.php"><span class="ti-user"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="mobile-menu-area"></div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>
<!-- End Header Style -->