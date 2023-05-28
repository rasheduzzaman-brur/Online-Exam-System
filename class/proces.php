<?php include_once 'config/config.php'?>
<?php require_once 'lib/Database.php'?>
<?php require_once 'lib/Session.php';
require_once 'helpers/Format.php';

?>
<?php
$fm=new Format();
class Process{
    private $db;
  
    public function __construct()
    { 
        $this->db = new Database();
    }
    public function procesdata($data){
       $selectedans=$data['answer'];
        $qnum     =$data['qnum'];
        $mnam     =$data['mnam'];
        $ques     =$data['ques'];

        $selectedans= mysqli_real_escape_string($this->db->link,$selectedans);
        $qnum     = mysqli_real_escape_string($this->db->link,$qnum);
        $mnam     = mysqli_real_escape_string($this->db->link,$mnam);
        $ques     = mysqli_real_escape_string($this->db->link,$ques);

        $next       = $qnum+1;
        if(!isset($_SESSION['score'])){
            $_SESSION['score']='0';
            $_SESSION['neg']='0';
        
        }
  
        $total = $this->getTotal($mnam);
        $right =$this->rightans($ques);
        
        if($right==$selectedans){
            $_SESSION['score']++;
          
        }
        if($right!=$selectedans){
            $_SESSION['neg']++;
        }
        if(!$selectedans){
            $_SESSION['neg']--;
        }

        if($qnum==$total){
             header("Location:final.php?mnam=".$mnam);
            exit();
        }
        else{
            header("Location:test.php?model=".$mnam."& idno=".$next);
          
        }
    }
    public function procesadmissiondata($data){
        $selectedans=$data['ans'];
        $qnum     =$data['qnum'];
        $mnam     =$data['mnam'];
        $ques     =$data['ques'];

        $selectedans= mysqli_real_escape_string($this->db->link,$selectedans);
        $qnum     = mysqli_real_escape_string($this->db->link,$qnum);
        $mnam     = mysqli_real_escape_string($this->db->link,$mnam);
        $ques     = mysqli_real_escape_string($this->db->link,$ques);

        $next       = $qnum+1;
        if(!isset($_SESSION['score'])){
            $_SESSION['score']='0';
            $_SESSION['neg']='0';
        
        }
  
        $total = $this->getTotal($mnam);
        $right =$this->admissionrightans($ques);
        
        if($right==$selectedans){
            $_SESSION['score']++;
          
        }
        if($right!=$selectedans){
            $_SESSION['neg']++;
        }
        if(!$selectedans){
            $_SESSION['neg']--;
        }

        if($qnum==$total){
             header("Location:admfinal.php?mnam=".$mnam);
            exit();
        }
        else{
            header("Location:admission_test.php?modelno=".$next."&model=".$mnam);
          
        }
    }
    public function model($data){
        $data = $data['model'];
        $data = mysqli_real_escape_string($this->db->link,$data);
        return $data;
    }
   
    public function getTotal($mnam){
        $query ="SELECT * FROM $mnam";
        $getresult=$this->db->select($query);
        $total=$getresult->num_rows;
        return $total;
    }
    private function admissionrightans($ques){
        $query ="SELECT * FROM admission_allanswer WHERE question_no='$ques' AND right_ans=1";
        $getresult=$this->db->select($query);
        $getdata=$getresult->fetch_assoc();
        $result=$getdata['id'];
        return $result;
    }
    private function rightans($ques){
        $query ="SELECT * FROM bcs_allanswer WHERE question_no='$ques' AND right_ans=1";
        $getresult=$this->db->select($query);
        $getdata=$getresult->fetch_assoc();
        $result=$getdata['id'];
        return $result;
    }

}