<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
    include_once ($filepath.'/../config/config.php');
    include_once ($filepath.'/../class/Question.php');
    include_once ($filepath.'/../lib/Database.php');
    $db=new Database();
    $aq=new Question();
?>
<?php
  if(isset($_GET['qno'])){
    $qno=(int)$_GET['qno'];
    $del=$aq->jobquesdel($qno);
    
}?>
<?php
  if(isset($_GET['admqno'])){
    $qno=(int)$_GET['admqno'];
    $del=$aq->admquesdel($qno);
    
}?>

<div class="main">
<h1>Admin Panel</h1>
<?php if(isset($del)){
        echo $del;
    }?>
</div>
<?php include 'inc/footer.php'; ?>