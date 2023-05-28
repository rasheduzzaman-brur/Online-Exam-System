<?php 
      include '../config/config.php';
      include '../lib/Database.php';
      include '../lib/Session.php';
      session_start();
      $db=new Database();
     if(isset($_GET['question'])){
        $ques=$_GET['question'];
      }
      if(isset($_GET['rans'])){
        $rans=$_GET['rans'];
      }
      
      $_SESSION['admanswer'][$ques]=$rans;
      $_SESSION['admanswer']['null']=0;
      echo $_SESSION['admanswer'][$ques];
  


?>