<!doctype html>
<html class="no-js" lang="en">

<?php
$user = 'root';
$pass = '';
$dbh = new PDO('mysql:host=localhost;dbname=tmart', $user, $pass);
?>

<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = :username";


        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location:login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }

    // Close connection
    unset($pdo);
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

        <!-- Start Search Popap -->
        <div class="search__area">
            <div class="container" >
                <div class="row" >
                    <div class="col-md-12" >
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
    <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Авторизация</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="index.php">Главная</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Авторизация</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->

    <!-- Start Login Register Area -->
    <div class="htc__login__register bg__white ptb--130">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <ul class="login__register__menu" role="tablist">
                        <li><a href="login.php">Вход</a></li>
                        <li><a href="register.php">Регистрация</a></li>
                    </ul>
                </div>
            </div>
            <!-- Start Login Register Content -->
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="htc__login__register__wrap">
                        <!-- Start Single Content -->
                        <div id="register" role="tabpanel" >

                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="login" method="post">

                                <div class="username">
                                    <input type="text" name="username" placeholder="Логин" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                                </div>

                                <div class="password">
                                    <input type="password" name="password" placeholder="Пароль" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                                </div>

                                <div class="password">
                                    <input type="password" name="confirm_password" placeholder="Подтвердите пароль" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                                    <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                                </div>

                                <div class="htc__login__btn">
                                    <button class="form-control" type="submit" value="Submit">Создать</button>
                                </div>

                            </form>

                            <div class="htc__social__connect">
                                <h2>Войти через соц.сети</h2>
                                <ul class="htc__soaial__list">
                                    <li><a class="bg--twitter" href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a class="bg--instagram" href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                    <li><a class="bg--facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a class="bg--googleplus" href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Single Content -->
                    </div>
                </div>
            </div>
            <!-- End Login Register Content -->
        </div>
    </div>
    <!-- End Login Register Area -->

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