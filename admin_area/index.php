<!doctype html>
<?php
include '../core/Database.php';
$database = new Database();
$db = $database->getConnectionMysql();
session_start();
if (isset($_SESSION['admin-user'])) {
    header("location:insert_products.php");
}

if (isset($_POST['autenticate_user'])) {
    if (empty($_POST['admin-user']) && empty($_POST['admin-password'])) {
        echo '<script>alert("Ambos campos requeridos")</script>';
    } else {
        /** @var TYPE_NAME $username_admin : holds the value of the user admin */
        $username_admin = mysqli_real_escape_string($db, $_POST['admin-user']);
        $password_admin = mysqli_real_escape_string($db, $_POST['admin-password']);
        $password_crypt = sha1($password_admin);
        $query = "SELECT * FROM admin_user WHERE username='$username_admin' AND password='$password_crypt'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['admin-user'] = $username_admin;
            header("location:insert_products.php");
        } else {
            $alert_message = "
            <div class='alert alert-danger alert-dismissable'>
               <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                  <strong>Usuario y/o Password no validos</strong>
            </div>
            ";
        }
    }
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/main.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <title>Login into Chatika.com</title>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" id="navbar">
    <div class="container">
        <a href="index.php" class="navbar-brand" id="text">Chatika.com.co - Admin Area</a>
        <ul class="nav navbar-nav">
        </ul>
    </div>
</nav>
<div class="container" id="login-admin">
    <form class="form-horizontal" action="index.php" method="post" enctype="multipart/form-data">
        <h4 class="control-label" id="insert_products">Login into Chatika.com - Admin Area</h4>
        <div class="form-group">
            <label for="admin-user" class="control-label col-xs-2">Usuario</label>
            <div class="col-xs-10">
                <input type="text" class="form-control" id="admin-user" name="admin-user" placeholder="Usuario">
            </div>
        </div>
        <div class="form-group">
            <label for="product-category" class="control-label col-xs-2">Password: </label>
            <div class="col-xs-10">
                <input type="password" class="form-control" id="admin-password" name="admin-password"
                       placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-10">
                <?php echo $alert_message; ?>
            </div>
        </div>
        <div class="form-group" id="login-buttons">
            <div class="col-xs-offset-2 col-xs-10 right">
                <button type="reset" class="btn btn-default">Borrar</button>
                <button type="submit" name="autenticate_user" class="btn btn-primary" id="register"><span
                            class="glyphicon glyphicon-floppy-disk"></span>Ingresar
                </button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
