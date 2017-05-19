<?php
include 'core/Database.php';
$database = new Database();
$db = $database->getConnectionMysql();
session_start();
//Login into de database
if (isset($_POST['username'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password_login_modal = mysqli_real_escape_string($db, $_POST['password']);
    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            if (password_verify($password_login_modal, $row["password"])) {
                $_SESSION["customer_id"] = $row["id"];
                $_SESSION["username"] = $_POST["username"];
                echo 'Yes';
            } else {
                echo 'No';
            }
        }
    } else {
        echo 'No';
    }
}
//Logout
if (isset($_POST["action"])) {
    unset($_SESSION["username"]);
}