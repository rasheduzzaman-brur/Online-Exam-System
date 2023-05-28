<?php 
      include '../config/config.php';
      include '../lib/Database.php';
      include '../lib/Session.php';
      $db=new Database();
     if(isset($_GET['model'])){
        $model=$_GET['model'];
      }
      $query="select* from $model";
      $gettotal=$db->select($query);
      $total=$gettotal->num_rows;
      echo $total;


?>