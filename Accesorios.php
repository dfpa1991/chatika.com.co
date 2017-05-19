<?php
require_once 'core/Database.php';
require 'core/functions.php';
$database = new Database();
$db = $database->getConnectionMysql();
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/main.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>Chatika.com</title>
</head>
<body>
<!--Navbar-Main-->
<?php include 'navbar-main.php'; ?>
<!--Navbar Shopping cart-->
<?php include 'navbar-shopping-cart.php'; ?>
<!--inserting images
<div id="background-image">
    <div id="image-1"></div>
    <div id="image-2"></div>
</div>
-->
<!--remove spaces and center the products-->
<div class="container-fluid" id="wrapper">
    <div class="row">
        <!--Main Content of the Featured Products-->
        <div class="col-xs-10 center-block">
            <br>
            <?php
            $get_pro = "SELECT * FROM products WHERE product_type='Accesorios'";
            $run_pro = mysqli_query($db, $get_pro);
            while ($row_pro = mysqli_fetch_array($run_pro)) {
                $pro_cat = $row_pro['product_cat'];
                $pro_type = $row_pro['product_type'];
            }
            ?>
            <div class="row">
                <hr>
                <h2 class="text-center"><?php echo $pro_type ?></h2>
                <hr>
                <div id="accesorios-products"><?php getProAccesorios() ?></div>
                <hr>
            </div>
            <br>
            <hr>
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
?>
<!--End of Details model-->
</body>
</html>