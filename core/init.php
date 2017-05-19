<?php
$db = mysqli_connect('127.0.0.1','root','','chatika');
if(mysqli_connect_errno()){
    echo 'La conexion a base de datos ha fallado: Error #'.mysqli_connect_error();
    die();
}