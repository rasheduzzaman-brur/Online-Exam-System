<?php 
 $filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../config/config.php');
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../lib/Session.php');
include_once ($filepath.'/../helpers/Format.php');
?>
<?php

class Question{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm =new Format();
    }
    public function getQues(){
        $query = "SELECT* FROM question_tbl ";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_cat(){
        $query = "SELECT* FROM bcs_category ";
        $result = $this->db->select($query);
        return $result;
    }
    public function admget_cat(){
        $query = "SELECT* FROM admission_category ";
        $result = $this->db->select($query);
        return $result;
    }
    public function makemodelques($data){
   
        $question=mysqli_real_escape_string($this->db->link , $this->fm->validation($data['ques']));
        $model=mysqli_real_escape_string($this->db->link , $this->fm->validation($data['mnam']));
        $exploded = explode(",", $question);
        $quesno = $exploded[0];
        $ques = $exploded[1];
          
            $query="INSERT INTO $model (question_no,question)VALUES('$quesno','$ques')";
            $insertrow=$this->db->insert($query);
            if($insertrow){
                 $msg = "<span style:'color:green'> Question add successfully into $model</span>";
                  return $msg;
            }else{
                   $msg = "<span style:'color:green'> Question add Unsuccessfully into $model </span>";
                   return $msg;
            }
          
    }
    
     public function addquestion($data){
        $cat=mysqli_real_escape_string($this->db->link , $this->fm->validation($data['cat']));
        $quesno=mysqli_real_escape_string($this->db->link , $this->fm->validation($data['QuesNo']));
        $ques=mysqli_real_escape_string($this->db->link , $this->fm->validation($data['question']));
        $ans=array();
        $ans[1]=$this->fm->validation($data['ans1']);
        $ans[2]=$this->fm->validation($data['ans2']);
        $ans[3]=$this->fm->validation($data['ans3']);
        $ans[4]=$this->fm->validation($data['ans4']);
        $rightans=$this->fm->validation($data['rightans']);
        $query= "INSERT INTO bcs_allquestion(question_no,cat,question) VALUES('$quesno','$cat','$ques')";
        $inser_row=$this->db->insert($query);
        if($inser_row){
            foreach($ans as $key=>$value ){
                if($value!=''){
                    if($rightans==$key){
                        $rquery="INSERT INTO bcs_allanswer( question_no,answer,right_ans ) 
                            VALUES('$quesno','$value','1') ";
                    }else{
                        $rquery="INSERT INTO bcs_allanswer( question_no,answer,right_ans ) 
                        VALUES('$quesno','$value','0') ";
                    }
                    $insertrow=$this->db->insert($rquery);
                    if($insertrow){
                        continue;
                    }else{
                        die('error');
                    }
            
                }
            }
            $msg = "<span style:'color:green'> Question add successfully</span>";
            return $msg;
        }
     }
     public function updatequestion($data){
        $aid=mysqli_real_escape_string($this->db->link , $this->fm->validation($data['aid']));
        $quesno=mysqli_real_escape_string($this->db->link , $this->fm->validation($data['qno']));
        $ques=mysqli_real_escape_string($this->db->link , $this->fm->validation($data['question']));
        $ans=array();
        $ans[1]=$this->fm->validation($data['1']);
        $ans[2]=$this->fm->validation($data['2']);
        $ans[3]=$this->fm->validation($data['3']);
        $ans[4]=$this->fm->validation($data['4']);
        $rightans=$this->fm->validation($data['rightans']);
        $query= "UPDATE bcs_allquestion set question='$ques' where question_no='$quesno'";
        $inser_row=$this->db->update($query);
        if($inser_row){
            foreach($ans as $key=>$value ){
                if($value!=''){
                    if($rightans==$key){
                        $rquery="UPDATE bcs_allanswer set answer='$value',right_ans='1'where question_no='$aid' ";
                    }else{
                        $rquery="UPDATE bcs_allanswer set answer='$value',right_ans='0'where question_no='$aid' ";
                    }
                    $insertrow=$this->db->update($rquery);
                    if($insertrow){
                        continue;
                    }else{
                        die('error');
                    }
            
                } $aid++;
            }
            $msg = "<span style:'color:green'> Question Update successfully</span>";
            return $msg;
        }
     }
     public function admissionquestion($data){
        $cat=mysqli_real_escape_string($this->db->link , $this->fm->validation($data['cat']));
        $quesno=mysqli_real_escape_string($this->db->link , $this->fm->validation($data['QuesNo']));
        $ques=mysqli_real_escape_string($this->db->link , $this->fm->validation($data['question']));
        $ans=array();
        $ans[1]=$this->fm->validation($data['ans1']);
        $ans[2]=$this->fm->validation($data['ans2']);
        $ans[3]=$this->fm->validation($data['ans3']);
        $ans[4]=$this->fm->validation($data['ans4']);
        $rightans=$this->fm->validation($data['rightans']);
        $query= "INSERT INTO admission_allquestion(question_no,cat,question) VALUES('$quesno','$cat','$ques')";
        $inser_row=$this->db->insert($query);
        if($inser_row){
            foreach($ans as $key=>$value ){
                if($value!=''){
                    if($rightans==$key){
                        $rquery="INSERT INTO admission_allanswer( question_no,answer,right_ans ) 
                            VALUES('$quesno','$value','1') ";
                    }else{
                        $rquery="INSERT INTO admission_allanswer( question_no,answer,right_ans ) 
                        VALUES('$quesno','$value','0') ";
                    }
                    $insertrow=$this->db->insert($rquery);
                    if($insertrow){
                        continue;
                    }else{
                        die('error');
                    }
            
                }
            }
            $msg = "<span style:'color:green'> Question add successfully</span>";
            return $msg;
        }
     }
     public function get_rowadmission(){
        $query ="SELECT * FROM admission_allquestion ";
        $getresult=$this->db->select($query);
        $total=$getresult->num_rows;
        return $total;
    }
    public function get_maxquesadmission(){
        $query ="SELECT MAX(question_no) AS maximum FROM admission_allquestion ";
        $total=$this->db->select($query);
        if($total){
            $result=$total->fetch_assoc();
        }
        return $result['maximum'];
    }
    public function get_row(){
        $query ="SELECT * FROM bcs_allquestion ";
        $getresult=$this->db->select($query);
        $total=$getresult->num_rows;
        return $total;
    }
    public function get_maxques(){
        $query ="SELECT MAX(question_no)AS maximum FROM bcs_allquestion ";
        $total=$this->db->select($query);
        if($total){
            $result=$total->fetch_assoc();
        }
        return $result['maximum'];
    }

    public function jobquesdel($qno){
        $tables = array("bcs_allquestion","bcs_allanswer");
        foreach($tables as $table){
          $delquery="DELETE FROM $table where question_no='$qno'";
          $del=$this->db->delete($delquery);
        }
        if($del){
            $msg="<span style=color:'green'>Delete succesfull</span>";
        }else{
            $msg="Delete Not succesfull";
        }
        return $msg;
    }
    public function admquesdel($qno){
        $tables = array("admission_allquestion","admission_allanswer");
        foreach($tables as $table){
          $delquery="DELETE FROM $table where question_no='$qno'";
          $del=$this->db->delete($delquery);
        }
        if($del){
            $msg="Delete succesfull";
        }else{
            $msg="Delete Not succesfull";
        }
        return $msg;
    }
}
?>