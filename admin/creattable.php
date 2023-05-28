<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
?>
<?php
include_once '../config/config.php';
 include_once '../lib/Database.php';
 $db=new Database();
?>
<?php
  if(isset($_GET['name'])){
      $name=$_GET['name'];
  }
?>

<div class="main">
<h1>Creat Table</h1>
<?php 
    $query="CREATE TABLE $name (
        id int NOT NULL AUTO_INCREMENT,
        question_no int,
        question text(500),
        PRIMARY KEY (id)
    )";

    $tbl=$db->creattbl($query);
    if($tbl){
        echo " Table create succesfull";
    }
    else{
        echo " Table create Unsuccesfull";
    }
?>



	
</div>
<?php include 'inc/footer.php'; ?>