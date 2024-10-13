<?php
session_start();
class DataBase
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";

    public $conn;

    public function __construct($dbname = null)
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $dbname);
        if ($this->conn->connect_error) {
            die('Connection faild' . $this->conn->connect_error);
        } else {
            // echo "<script>alert('Connection Successful')</script>";
        }
    }

    //-----------------------------------------store-----------------------------

    public function store($sql,$mess)
    {
        if ($this->conn->query(query: $sql) === TRUE) {
            echo "<script>alert('$mess')</script>";

        } else {
            return "Error creating database: " . $this->conn->error;
        }
    }

 
}
?>
<!-- <script>alert('Connection Successful')</script> -->