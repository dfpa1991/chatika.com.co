<?php
require 'core/functions.php';
include 'core/Database.php';
$database = new Database();
$db = $database->getConnectionMysql();
session_start();
if(!isset($_SESSION["username"])){
    header('location:index.php');
}
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/nav-shopping-cart.css">
    <link rel="stylesheet" href="css/shopping-cart.css">
    <link rel="stylesheet" href="css/account-side-bar.css">
    <link rel="stylesheet" href="css/main.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-confirmation.js"></script>
    <script src="js/add_to_cart.js"></script>
    <script src="js/modal-add-to-cart.js"></script>
    <script src="js/modal-login.js"></script>
    <script src="js/modal-register.js"></script>
    <title>Chatika.com</title>
</head>
<body>
<?php include 'navbar-main.php' ?>
<!--Navbar Shopping Cart-->
<?php include 'navbar-shopping-cart.php'; ?>

<div class="container-fluid" id="wrapper">
    <div class="col-xs-10 center-block">
        <div class="container">
            <div class="row">
                <div class="col-xs-3">
                    <div class="sidebar-nav">
                        <div class="navbar navbar-default" role="navigation">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                        data-target=".sidebar-navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <span class="visible-xs navbar-brand">Cuenta</span>
                            </div>
                            <div class="navbar-collapse collapse sidebar-navbar-collapse">
                                <ul class="nav navbar-nav">
                                    <li id="account-home" class="active"><a href="account.php"><span
                                                    class="glyphicon glyphicon-home"></span> Home</a></li>
                                    <li id="account-orders"><a href="account.php?action=ordenes">Mis Ordenes</a></li>
                                    <li id="account-edits"><a href="account.php?editar=editar">Editar Cuenta</a></li>
                                    <li id="account-cambiar" ><a href="account.php?cambiar=cambiar">Cambiar Password</a></li>
                                    <li id="account-logout"><a href="">Logout</a></li>
                                    <!--<li><a href="#">Reviews <span class="badge">1,118</span></a></li>-->
                                </ul>
                            </div><!--/.nav-collapse -->
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_GET["action"]) == "ordenes") { ?>
                    <div class="col-xs-7">
                        ordenes
                    </div>
                    <?php
                } elseif (isset($_GET["editar"]) == "editar") { ?>
                    <div class="col-xs-7">
                        editar
                    </div>
                    <?php
                } elseif (isset($_GET["cambiar"]) == "cambiar") { ?>
                    <div class="col-xs-7">
                        cambiar
                    </div>
                    <?php
                } else { ?>
                    <div class="col-xs-7">
                        Welcome
                    </div>
                <?php } ?>
            </div>
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