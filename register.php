<?php
require 'core/functions.php';
include 'core/Database.php';
$database = new Database();
$db = $database->getConnectionMysql();
session_start();
$alert_user = '';
$alert_danger = '';
if (isset($_SESSION["username"])) {

}

if (isset($_POST["register_user_button"])) {
    if (empty($_POST["register_user"]) && empty($_POST["register_password"]) && empty($_POST["register_password"])) {
        $alert_danger = '
        <div class="col-xs-10 center-block" id="alert-alert-success">
             <div class="alert alert-danger alert-dismissable">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 <strong>Ooops!</strong> Todos los campos son requeridos.
            </div>
        </div>
        ';
    } else {
        if (empty($_POST["register_user"] || empty($_POST["register_password"]) || empty($_POST["register_email"]))) {
            //Sends the pop up alert to webpage
            $alert_danger = '
        <div class="col-xs-10 center-block" id="alert-alert-success">
             <div class="alert alert-danger alert-dismissable">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 <strong>Ooops!</strong> Todos los campos son requeridos.
            </div>
        </div>
        ';
        } else {
            if ($_POST["register_password"] == $_POST["register_password_confirmation"]) {
                if (emailIsUnique($_POST['register_email'])) {
                    $username_register = mysqli_real_escape_string($db, $_POST["register_user"]);
                    $username_check = "SELECT * FROM user WHERE username = '$username_login'";
                    $result = mysqli_query($db, $username_check);
                    $email_register = mysqli_real_escape_string($db, $_POST["register_email"]);
                    $password_register = mysqli_real_escape_string($db, $_POST["register_password"]);
                    $password_crypted = password_hash($password_register, PASSWORD_DEFAULT);
                    $query_register = "INSERT INTO user (username, email, password) VALUES ('$username_register','$email_register','$password_crypted')";
                    if (mysqli_query($db, $query_register)) {
                        $alert_user = '
                    <div class="col-xs-10 center-block" id="alert-alert-success">
                        <div class="alert alert-success alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Felicitaciones!</strong> El usuario ha sido creado.
                        </div>
                    </div>
                    ';
                    }
                } else {
                    $alert_user = '
                    <div class="col-xs-10 center-block" id="alert-alert-success">
                        <div class="alert alert-danger alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Ooops!</strong> El usuario ya existe. Por favor trate otro
                        </div>
                    </div>
                    ';
                }
            } else {
                $alert_user = '
                <div class="col-xs-10 center-block" id="alert-alert-success">
                    <div class="alert alert-danger alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Ooops!</strong> Los Passwords No Coinciden.
                   </div>
                </div>
                ';
            }
        }
    }
}

if (isset($_POST["login_user_button"])) {
    if (empty($_POST["login_user_login"] || empty($_POST["login_password_login"]))) {
        $alert_danger = '
                <div class="col-xs-10 center-block" id="alert-alert-success">
                    <div class="alert alert-danger alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Ooops!</strong> Todos los campos son requeridos.
                    </div>
                </div>';
    } else {
        $username_login = mysqli_real_escape_string($db, $_POST["login_user_login"]);
        $password_login = mysqli_real_escape_string($db, $_POST["login_password_login"]);
        $query_user_login = "SELECT * FROM user WHERE username = '$username_login'";
        $result = mysqli_query($db, $query_user_login);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                if (password_verify($password_login, $row["password"])) {
                    //Set the customer id to the current session
                    $_SESSION["customer_id"] = $row["id"];
                    //Set the customer username to the current session
                    $_SESSION["username"] = $username_login;
                    header('location:index.php');
                } else {
                    //return false;
                    $alert_danger = '
                        <div class="col-xs-10 center-block" id="alert-alert-success">
                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Ooops!</strong> Todos los campos son requeridos.
                            </div>
                        </div>';
                }
            }
        } else {
            $alert_danger = '
                <div class="col-xs-10 center-block" id="alert-alert-success">
                    <div class="alert alert-danger alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Ooops!</strong> Usuario Incorrecto.
                    </div>
                </div>';
        }
    }
}
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
    <title>Chatika.com</title>
</head>
<body>
<!--Navbar Main-->
<?php include 'navbar-main.php' ?>
<!--Navbar Shopping Cart-->
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
        <?php echo $alert_user; ?>
        <?php echo $alert_danger; ?>
    </div>
    <?php
    if (isset($_GET["action"]) == "register") { ?>
        <!--Register form-->
        <div class="row">
            <!--Main Content of the Featured Products-->
            <div class="col-xs-10 center-block">
                <br>
                <br>
                <div class="row">
                    <div id="featured-products">
                        <hr>
                        <h2 class="text-center">Registrarse</h2>
                        <hr>
                        <div class="center-block">
                            <div class="container" id="register-form">
                                <form class="form-horizontal" action="register.php" method="post"
                                      enctype="multipart/form-data">
                                    <h4 class="control-label" id="insert_products">Registrarse En Chatika.com</h4>
                                    <div class="input-group-fields">
                                        <div class="form-group has-feedback">
                                            <!--<label for="register-user" class="control-label col-xs-2">Usuario: </label>-->
                                            <input type="text" class="form-control" id="register-user"
                                                   name="register_user"
                                                   placeholder="Usuario">
                                            <i class="form-control-feedback glyphicon glyphicon-user"></i>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <!--<label for="email-user" class="control-label col-xs-2">Email: </label>-->
                                            <i class="form-control-feedback glyphicon glyphicon-star"></i>
                                            <input type="text" class="form-control" id="email-user"
                                                   name="register_email" placeholder="Email">
                                        </div>
                                        <div class="form-group has-feedback">
                                            <!--<label for="product-category" class="control-label col-xs-2">Password: </label>-->
                                            <i class="form-control-feedback glyphicon glyphicon-lock"></i>
                                            <input type="password" class="form-control" id="register-password"
                                                   name="register_password"
                                                   placeholder="Password">
                                        </div>
                                        <div class="form-group has-feedback">
                                            <!--<label for="password-confirmation"
                                                   class="control-label col-xs-2">Confirmar: </label>-->
                                            <i class="form-control-feedback glyphicon glyphicon-lock"></i>
                                            <input type="password" class="form-control"
                                                   id="register-password-confirmation"
                                                   name="register_password_confirmation"
                                                   placeholder="Confirma Password">
                                        </div>
                                    </div>
                                    <div class="form-group" id="login-buttons">
                                        <div class="col-xs-offset-2 col-xs-10 right">
                                            <button type="reset" class="btn btn-default">Borrar</button>
                                            <button type="submit" name="register_user_button" class="btn btn-primary"
                                                    id="register"><span
                                                        class="glyphicon glyphicon-floppy-disk"></span>Registrarse
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-10 center-block">
                <div class="row">
                    <div class="container" id="login_link">
                        <p class="">Ya tienes cuenta <a href="register.php">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!--Register Form End-->
    <?php } else { ?>
        <!-- login form start-->
        <div class="row">
            <!--Main Content of the Featured Products-->
            <div class="col-xs-10 center-block">
                <br>
                <br>
                <div class="row">
                    <div id="featured-products">
                        <hr>
                        <h2 class="text-center">Login</h2>
                        <hr>
                        <div class="center-block">
                            <div class="container-fluid center-block" id="register-form">
                                <form class="form-horizontal" action="register.php" method="post"
                                      enctype="multipart/form-data">
                                    <h4 class="control-label" id="insert_products">Login En Chatika.com</h4>
                                    <div class="input-group-fields">
                                        <div class="form-group has-feedback">
                                            <!--<label for="login-user" class="control-label col-xs-2">Usuario</label>-->
                                            <i class="form-control-feedback glyphicon glyphicon-user"></i>
                                            <input type="text" class="form-control" id="login-user"
                                                   name="login_user_login"
                                                   placeholder="Usuario">
                                        </div>
                                        <div class="form-group has-feedback">
                                            <!--<label for="login-password" class="control-label col-xs-2">Password: </label>-->
                                            <i class="form-control-feedback glyphicon glyphicon-lock"></i>
                                            <input type="password" class="form-control" id="login-password"
                                                   name="login_password_login"
                                                   placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group" id="login-buttons">
                                        <div class="col-xs-offset-2 col-xs-10 right">
                                            <button type="reset" class="btn btn-default">Borrar</button>
                                            <button type="submit" name="login_user_button" class="btn btn-primary"
                                                    id="register"><span
                                                        class="glyphicon glyphicon-floppy-disk"></span> Ingresar
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container" id="login_link">
                    <p class="">Aun no tienes cuenta <a href="register.php?action=register">Registrarse</a></p>
                </div>
            </div>
        </div>
        <!--login form end-->
    <?php } ?>
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
