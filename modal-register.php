<?php
include 'core/functions.php';
include 'core/Database.php';
$database = new Database();
$db = $database->getConnectionMysql();
if (isset($_POST['username'])) {
    if(emailIsUnique($_POST["email"])) {
        $username_modal_register = mysqli_real_escape_string($db, $_POST['username']);
        $email_modal_register = mysqli_real_escape_string($db, $_POST["email"]);
        $password_modal_register = mysqli_real_escape_string($db, $_POST["password"]);
        $password_modal_register_crypted = password_hash($password_modal_register, PASSWORD_DEFAULT);
        $query_register = "INSERT INTO user (username, email, password) VALUES ('" . $username_modal_register . "','" . $email_modal_register . "','" . $password_modal_register_crypted . "')";
        if (mysqli_query($db, $query_register)) {
            echo 'se pudo';
        } else {
            echo 'no se pudo';
        }
    }else{
        echo 'no se pudo';
    }
}