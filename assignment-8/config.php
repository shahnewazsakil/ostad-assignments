<?php

class Database{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db_name = "ostad_user";
    public $conn;


    public function __construct()
    {
        $this->connect_db();
    }

    private function connect_db(){

        if(!$this->conn){
            try{
                $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db_name) or die("Connection Failed. ");
            }
            catch(PDOException $e){
                die("Database Connection Faild." . $e->getMessage());
            }
        }
    }

}