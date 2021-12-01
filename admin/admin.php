<?php
require_once 'func_users.php';
require_once 'func_auto.php';
?>

<?php
error_reporting(E_ERROR | E_PARSE);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Administration TMART</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">


    <!-- Start Include All CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css"/>
    <link rel="stylesheet" href="assets/css/animate.css"/>
    <link rel="stylesheet" href="assets/css/stroke-gap-icons.css"/>
    <link rel="stylesheet" href="assets/css/icofont.css"/>
    <link rel="stylesheet" href="assets/css/flaticon.css"/>
    <link rel="stylesheet" href="assets/css/Interest.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/lightslider.css">
    <link rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">

    <link rel="stylesheet" href="assets/css/preset.css"/>
    <link rel="stylesheet" href="assets/css/ignore_for_wp.css"/>
    <link rel="stylesheet" href="assets/css/theme.css"/>
    <link rel="stylesheet" href="assets/css/responsive.css"/>
    <link rel="stylesheet" href="assets/css/light.css"/>
    <!-- End Include All CSS -->

    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <!-- Favicon Icon -->
</head>
<body class="dark">

<!-- Preloader Start -->
<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-box">
            <div class="letter">L</div>
            <div class="letter">O</div>
            <div class="letter">A</div>
            <div class="letter">D</div>
            <div class="letter">I</div>
            <div class="letter">N</div>
            <div class="letter">G</div>
        </div>

        <div class="preloader-box">
            <div class="letter">С</div>
            <div class="letter">Ы</div>
            <div class="letter">Р</div>
        </div>

        <div class="preloader-box">
            <div class="letter">С</div>
            <div class="letter">О</div>
            <div class="letter">Б</div>
            <div class="letter">А</div>
            <div class="letter">К</div>
            <div class="letter">И</div>
        </div>
    </div>
</div>
<!-- Preloader End -->

<div class="container">
    <div class="row">

        <div class="col-lg-12 contentColumn" id="tabContainer">


            <header class="header clearfix">
                <nav class="mainMenu">
                    <ul class="clearfix" id="mainTab">
                        <li><a href="#resume"><i class="icon icon-Users"></i><span>Пользователи</span></a></li>
                        <li><a href="#portfolio"><i class="icon icon-Car"></i><span>Автомобили</span></a></li>
                        <li><a href="#blog"><i class="icon icon-ClipboardText"></i><span>Заявки</span></a></li>
                    </ul>
                </nav>
            </header>

            <div class="sidebarOverlay"></div>


            <div class="bodyContent" id="resume">
                <div class="pageCointainer">
                    <section class="comonSection resumeSection">
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-lg-6">
                                    <h2 class="sectionTitle">Пользователи</h2>
                                    <div class="kr-accordion" id="edication_accordion"></div>
                                </div>
                            </div>

                                <div class="row">
                                    <div class="col mt-1">

                                        <table class="table shadow text-light ">
                                            <thead class="thead-dark">
                                            <tr>
                                                <th>№</th>
                                                <th>Логин</th>
                                                <th>Пароль</th>
                                                <th>Уровень доступа</th>
                                                <th>Действие</th>
                                            </tr>
                                            <?php foreach ($result as $value) { ?>
                                                <tr>
                                                    <td><?= $value['id'] ?></td>
                                                    <td><?= $value['username'] ?></td>
                                                    <td><?= $value['password'] ?></td>
                                                    <td><?= $value['is_admin'] ?></td>
                                                    <td>
                                                        <a href="?delete=<?= $value['id'] ?>"
                                                           class="btn btn-danger btn-sm" data-toggle="modal"
                                                           data-target="#deleteModal<?= $value['id'] ?>">Удалить</a>
                                                        <?php require 'modal_users.php'; ?>
                                                    </td>
                                                </tr> <?php } ?>
                                            </thead>
                                        </table>

                                        <?= $success ?>

                                        <button class="btn btn-success mb-1" data-toggle="modal" data-target="#Modal">
                                            Добавить
                                        </button>
                                    </div>
                                </div>


                        </div>

                </div>
                </section>


                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div class="copyRight">&copy; 2021 All Rights Reserved <a
                                            href="../index.php" target="_blank">Главная</a></div>
                            </div>
                        </div>
                    </div>
                </footer>


            </div>

            <div class="bodyContent" id="portfolio">
                <div class="pageCointainer">
                    <section class="comonSection aboutSection">
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-lg-12">
                                    <h2 class="sectionTitle">Автомобили</h2>
                                </div>
                            </div>

                                <div class="row">
                                    <div class="col mt-1">

                                        <table class="table shadow text-light ">
                                            <thead class="thead-dark">
                                            <tr>
                                                <th>Название</th>
                                                <th>Описание</th>
                                                <th>Класс</th>
                                                <th>Б/С</th>
                                                <th>С/С</th>
                                                <th>Обожка</th>
                                                <th>№1</th>
                                                <th>№2</th>
                                                <th>№3</th>
                                                <th>Видео</th>
                                                <th colspan="2">Действие</th>
                                                <th></th>
                                            </tr>
                                            <?php foreach ($result_auto as $value) { ?>
                                                <tr>
                                                    <td><?= $value['title_auto'] ?></td>
                                                    <td><?= $value['desc_auto'] ?></td>
                                                    <td><?= $value['class_auto'] ?></td>
                                                    <td><?= $value['oldprice_auto'] ?></td>
                                                    <td><?= $value['newprice_auto'] ?></td>
                                                    <td><img width="20%" src='images/<?= $value['cover_auto'] ?>'></td>
                                                    <td><img width="20%" src='images/<?= $value['slider1_auto'] ?>'>
                                                    </td>
                                                    <td><img width="20%" src='images/<?= $value['slider2_auto'] ?>'>
                                                    </td>
                                                    <td><img width="20%" src='images/<?= $value['slider3_auto'] ?>'>
                                                    </td>
                                                    <td><?= $value['link_auto'] ?></td>

                                                    <td>
                                                        <a href="?edit=<?= $value['id_auto'] ?>"
                                                           class="btn btn-success btn-sm"
                                                           data-toggle="modal"
                                                           data-target="#editModal-auto<?= $value['id_auto'] ?>"><i
                                                                    class="fa icofont-exchange"></i></a>
                                                    </td>

                                                    <td>
                                                        <a href="?delete=<?= $value['id_auto'] ?>"
                                                           class="btn btn-danger btn-sm"
                                                           data-toggle="modal"
                                                           data-target="#deleteModal-auto<?= $value['id_auto'] ?>"><i
                                                                    class="fa icofont-bomb"></i></a>
                                                        <?php require 'modal_auto.php'; ?>
                                                    </td>
                                                </tr> <?php } ?>
                                            </thead>
                                        </table>
                                        <?= $success_staff ?>
                                        <button class="btn btn-success mb-1" data-toggle="modal"
                                                data-target="#Modal-auto">Добавить
                                        </button>
                                    </div>
                                </div>


                        </div>
                    </section>


                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <div class="copyRight">&copy; 2021 All Rights Reserved <a
                                                href="../index.php" target="_blank">Главная</a></div>
                                </div>
                            </div>
                        </div>
                    </footer>


                </div>
            </div>

            <div class="bodyContent" id="blog">
                <div class="pageCointainer">
                    <section class="comonSection aboutSection">
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-lg-12">
                                    <h2 class="sectionTitle">Заявки</h2>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="row">
                                    Контент
                                </div>
                            </div>


                        </div>
                    </section>


                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <div class="copyRight">&copy; 2021 All Rights Reserved <a
                                                href="../index.php" target="_blank">Главная</a></div>
                                </div>
                            </div>
                        </div>
                    </footer>


                </div>
            </div>

        </div>

    </div>
</div>

<!-- Bact To Top -->
<a href="javascript:void(0);" id="backtotop"><i class="icofont-bubble-up"></i></a>
<!-- Bact To Top -->

<!-- Start Include All JS -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.appear.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/mixer.js"></script>
<script src="assets/js/lightslider.min.js"></script>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyBJtPMZ_LWZKuHTLq5o08KSncQufIhPU3o"></script>
<script src="assets/js/gmaps.js"></script>
<script src="assets/js/anime.min.js"></script>
<script src="assets/js/folio.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

<script src="assets/js/jquery.easytabs.min.js"></script>
<script src="assets/js/theme.js"></script>
<!-- End Include All JS -->
</body>
</html>