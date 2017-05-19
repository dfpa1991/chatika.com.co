<?php
require_once 'core/Database.php';
require 'core/functions.php';
$database = new Database();
$db = $database->getConnectionMysql();
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/add_to_cart.js"></script>
    <script src="js/modal-login.js"></script>
    <script src="js/modal-register.js"></script>
    <title>Chatika.com - Detalles</title>
</head>
<body>
<!--Navbar Main-->
<?php include 'navbar-main.php' ?>
<!--Navbar Shopping Cart-->
<?php include 'navbar-shopping-cart.php'; ?>

<!--remove spaces and center the products-->
<?php cart() ?>
<div class="container-fluid">
    <div class="row" id="main">
        <!--Main Content of the Featured Products-->
        <div class="col-xs-10 center-block">
            <br>
            <div class="row">
                <div id="new-products">
                    <?php
                    if (isset($_GET['pro_id'])) {
                        $product_id = $_GET['pro_id'];
                        $get_pro = "SELECT * FROM products WHERE product_id=$product_id";
                        $run_pro = mysqli_query($db, $get_pro);
                        while ($row_pro = mysqli_fetch_array($run_pro)) {
                            $pro_id = $row_pro['product_id'];
                            $pro_cat = $row_pro['product_cat'];
                            $pro_title = $row_pro['product_title'];
                            $pro_price = $row_pro['product_price'];
                            $pro_desc = $row_pro['product_desc'];
                            $pro_image = $row_pro['product_image'];
                        }
                        printProductsDetails($pro_title, $pro_id, $pro_image, $pro_price,$pro_desc);
                    }
                    ?>
                </div>
            </div>
            <br>
            <div class="row">
                <div id="featured-products">
                    <hr>
                    <h2 class="text-center">Productos Destacados</h2>
                    <hr>
                    <div class="featured-pro"><?php getProFeatured() ?></div>
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
?>
<!--End of Details model-->
</body>
</html>