<?php 

include_once './config.php';
include_once './session.php';


class Insert{
    
    private $db;
    
    public function __construct()
    {
        $this->db = new Database();
    }

    public function insert(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
           
            function input_valid($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        
            $f_name = input_valid($_POST['f_name']);
            $l_name = input_valid($_POST['l_name']);
            $email = input_valid($_POST['email']);
            $password = md5((input_valid($_POST['password'])));
            $con_password = md5((input_valid($_POST['con_password'])));
        
            if($f_name == "" OR $l_name == "" OR $email == "" OR $password == "" OR $con_password == ""){
                echo "All Filed Must be filled";
                return false;
            }
        
            if (!preg_match("/[a-zA-Z\d ]/i", $f_name)) {
                echo "Only letters and white space allowed";
                return false;
            }
        
            if (!preg_match("/[a-zA-Z\d ]/i", $l_name)) {
                echo "Only letters and white space allowed";
                return false;
            }
            
            if(!($password === $con_password)){
                echo "Password Not Match";
                return false;
            }
        
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Invalid email format";
                return false;
            }
        
            $sql = "INSERT INTO tbl_users(first_name, last_name,email, password) VALUES ('{$f_name}', '{$l_name}', '{$email}', '{$password}')";
        
            $result = mysqli_query($this->db->conn, $sql) or die("SQL Error");
        
            if($result){
                $msg = "Data inserted";
                return $msg;
            }else{
                echo "failed";
            }
        }
    }

    public function login(){

        $email = $_POST['email'];
        $password = md5($_POST['password']);

        if($password == "" OR $email == ""){
            echo "All Filed Must be filled";
            return false;
        }

        $sql = "SELECT * FROM tbl_users WHERE email = '{$email}' AND password = '{$password}'";

        $result = mysqli_query($this->db->conn, $sql) or die("SQL Error");

        if($result){
            if(mysqli_num_rows($result) > 0){
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    echo $id;
                }
            }

            session::set('login', true);
            // header('Location: dashboard.php?id='.$id);
        }else{
            return "Email OR Password Dose not match";
        }

    }

}


$obj = new Insert();

if(isset($_POST['submit_btn'])){
    $obj->insert();
}

if(isset($_POST['login_btn'])){
    $obj->login();
}
