<?php 
 $filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../config/config.php');
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../lib/Session.php');
include_once ($filepath.'/../helpers/Format.php');
?>
<?php
class User{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function enableuser($userid){
        $query="UPDATE user_tbl SET
         status='0' WHERE id='$userid'" ;
         $update_row=$this->db->update($query);
         if($update_row){
            $msg="<span class = 'success'>Update Successfully</span>";
            return $msg;
        }
         else{
            $msg="<span class = 'error'>Update Unsuccessfully</span>";
            return $msg;
        }
    }
    public function deleteuser($userid){
        $query="DELETE FROM user_tbl 
          WHERE id='$userid'" ;
         $delete_row=$this->db->delete($query);
         if($delete_row){
            $msg="<span class = 'success'>Delete Successfully</span>";
            return $msg;
        }
         else{
            $msg="<span class = 'error'>Delete Unsuccessfully</span>";
            return $msg;
        }
    }
    public function disableuser($userid){
        $query="UPDATE user_tbl SET
         status='1' WHERE id='$userid'" ;
         $update_row=$this->db->update($query);
         if($update_row){
            $msg="<span class = 'success'>Update Successfully</span>";
            return $msg;
        }
         else{
            $msg="<span class = 'error'>Update Unsuccessfully</span>";
            return $msg;
        }
    }
    public function getprofile($userid){
        $query = "SELECT* FROM user_tbl where id='$userid'";
        $result = $this->db->select($query);
        return $result;
    }
    public function updateprofile($data,$userid){
        $name = $this->fm->validation($data['name']);
        $number = $this->fm->validation($data['number']);
       // $email = $this->fm->validation($data['email']);
        $name = mysqli_real_escape_string($this->db->link,$data['name']);
        $username = mysqli_real_escape_string($this->db->link,$data['number']);
      //  $email = mysqli_real_escape_string($this->db->link,$data['email']);
        $query="UPDATE user_tbl SET
         name='$name', number='$number', where id='$userid'" ;
        $update_row=$this->db->update($query);
        if($update_row){
           $msg="<span class = 'success'>Update Successfully</span>";
           return $msg;
       }
        else{
           $msg="<span class = 'error'>Update Unsuccessfully</span>";
           return $msg;
       }
    }
    public function getUser(){
        $query = "SELECT* FROM user_tbl ";
        $result = $this->db->select($query);
        return $result;
    }
    public function userRegistration($data){
        $name = $this->fm->validation($data['name']);
        $number = $this->fm->validation($data['number']);
        $password = $this->fm->validation($data['password']);
        $password1 = $this->fm->validation($data['password1']);
        $name = mysqli_real_escape_string($this->db->link,$data['name']);
        $number = mysqli_real_escape_string($this->db->link,$data['number']);
        $password = mysqli_real_escape_string($this->db->link,$data['password']);
        $password1 = mysqli_real_escape_string($this->db->link,$data['password1']);
        if($name==""||$number==""||$password==""||$password1==""){
            $msg= "<span class = 'error'>Fields Must not ne Empty</span>";
           
        }
       elseif($password!= $password1){
            $msg= "<span class = 'error'>Password Not same</span>";}
          
        else{
            $chkquery = "SELECT * FROM user_tbl WHERE number='$number'";
            $chkresult = $this->db->select($chkquery);
            if($chkresult!=false){
                $msg="<span class = 'error'>Phone number Address Already Exist</span>";
           
            }else{
                $query= "INSERT INTO user_tbl(name,number,password) VALUES('$name','$number','$password')";
                $inser_row=$this->db->insert($query);
                if($inser_row){
                    $msg="<span class = 'success'>Registration Successfully</span>";
                 
                }
                else{
                    $msg= "<span class = 'error'>eror.. Not resgister</span>";
                    
                }
            }
        }
        return $msg;
    }
    public function getuserdata($data){
        $number = $this->fm->validation($data['number']);
        $password = $this->fm->validation($data['password']);
        $number = mysqli_real_escape_string($this->db->link,$data['number']);
        $password = mysqli_real_escape_string($this->db->link,$data['password']);
        $query="SELECT * FROM user_tbl WHERE number ='$number' AND password='$password' ";
        $result = $this->db->select($query);
        if($number==''||$password==''){
            $msg= "<span class = 'error'>Phone or Password Must Not Empyt</span>";
        }else{
             if($result!=false){
                 $value=$result->fetch_array(MYSQLI_ASSOC);
                if($value['status']==1){
                    $msg= "<span class = 'error'>You are not permitted</span>";
                }else{ 
                
                Session::init();
                Session::set("login",true);
                Session::set("number",$value['number']);
                Session::set("id",$value['id']);
                     Header("Location:bcs.php");
                }
               

             }
            else{
            $msg= "<span class = 'error'>Phone or Password Not match</span>";
            }
        }
        return $msg;
    }
}
?>