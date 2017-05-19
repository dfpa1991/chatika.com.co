<?php
require 'core/functions.php';
include 'core/Database.php';
$database = new Database();
$db = $database->getConnectionMysql();
$connect = mysqli_connect('127.0.0.1', 'root', '', 'chatika');
session_start();
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/nav-shopping-cart.css">
    <link rel="stylesheet" href="css/shopping-cart.css">
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="icon" href="img/favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-confirmation.js"></script>
    <script src="js/add_to_cart.js"></script>
    <script src="js/modal-add-to-cart.js"></script>
    <script src="js/modal-login.js"></script>
    <script src="js/modal-register.js"></script>
    <title>Chatika.com.co</title>
</head>
<body>
<!--Navbar Main-->
<?php include 'navbar-main.php' ?>
<!--Navbar Shopping Cart-->
<?php include 'navbar-shopping-cart.php'; ?>

<!--remove spaces and center the products-->
<div class="container-fluid" id="wrapper">
    <div class="row">
        <?php include 'image-slider.php'; ?>
        <!--Main Content of the Featured Products-->
        <div class="col-xs-10 center-block">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="#products">Productos</a>
                </li>
                <li><a data-toggle="tab" href="#cart"><span class="glyphicon glyphicon-shopping-cart"></span>
                        Carrito - <i id="badge1" id="number-of-items-in-cart"><?php
                            if (isset($_SESSION["shopping_cart"])) {
                                echo count($_SESSION["shopping_cart"]);
                                //print_r($_SESSION["shopping_cart"]);
                            } else {
                                echo "0";
                            } ?></i></a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="products" class="tab-pane fade in active">
                    <div class="row">
                        <div id="productos" class="tab-pane fade in active">
                            <div id="header-new-products">
                                <h2 class="text-center">Nuevos Productos</h2>
                            </div>
                            <div id="alert-user-cart">
                            </div>
                            <div id="new-products"><?php getPro(); ?></div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div id="cart" class="tab-pane fade">
                    <div class="row">
                        <div id="header-shopping-cart">
                            <br>
                            <h2 class="text-center">Carrito De Compra</h2>
                            <hr>
                        </div>
                        <?php include 'shopping_cart.php'; ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-10 center-block">
                <br>
                <br>
                <div class="row">
                    <div id="featured-products">
                        <hr>
                        <h2 class="text-center">Productos Destacados</h2>
                        <hr>
                        <div class="featured-pro"><?php getProFeatured(); ?></div>
                        <hr>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <div class="row">
            <?php include 'footer-nav.php'; ?>
        </div>
    </div>
    <!--Details model-->
    <?php
    include 'login-modal.php';
    include 'register-modal.php';
    include 'confirmed-register.php';
    ?>
    <!--End of Details model-->
</body>
</html>
