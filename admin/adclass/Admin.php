<?php  $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'../config/config.php');
    include_once ($filepath.'../lib/Database.php');
    include_once ($filepath.'../lib/Session.php');
    include_once ($filepath.'../helpers/Format.php');
?>

<?php

class Admin{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function getUser(){
        $query = "SELECT* FROM user_tbl ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getadmindata($data){
        $email = $this->fm->validation($data['email']);
        $password = $this->fm->validation($data['password']);
        $email = mysqli_real_escape_string($this->db->link,$data['email']);
        $password = mysqli_real_escape_string($this->db->link,$data['password']);
        $query="SELECT * FROM admin_tbl WHERE email ='$email' AND password='$password' ";
        $result = $this->db->select($query);
        if($result!=false){
            $value=$result->fetch_array(MYSQLI_ASSOC);
            Session::init();
            Session::set("login",true);
            Session::set("email",$value['email']);
            Session::set("id",$value['id']);
            Header("Location:index.php");

        }
        else{
            $msg= "<span class = 'error'>Email or Password Not match</span>";
            return $msg;
        }
    }
}
?>