<?php
class Database
{
    private $host = "localhost";
    private $db_name = "chatika";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnectionMysql(){
        $this->conn = null;
        $this->conn = mysqli_connect($this->host,$this->username,$this->password,$this->db_name);
        if(mysqli_connect_errno()){
            echo 'La conexion a base de datos ha fallado: Error #'.mysqli_connect_error();
            die();
        }
        return $this->conn;
    }
}
