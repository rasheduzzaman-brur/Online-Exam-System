<?php include 'inc/header.php'; ?>
<div class="main">
<?php if(isset($_GET['modelno'])){
	$modelname=$_GET['modelno'];
}else{
	header("Location:bcs.php");
}?>
  <?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $proces=$pro->model($_POST);
}
?>
<form action="" method="$_POST">
<input type="hidden" name="model" value="<?php echo $modelname?>">
</form>
<h1>BCS Model Test </h1>
   <?php 
            $query = "select * from $modelname";
            $ques=$db->select($query);
            $total=$ques->num_rows;
            if($ques){
                $quesno=$ques->fetch_assoc();
            }
            ?>
	<div class="segmenttwo">
    <ul>
            <li>Number of Question <?php echo $total;?></li><br>
            <li>Tatal Marks </li><br>
         
            <li><a href="admission_test.php?model=<?php echo $modelname?>&idno=<?php echo 1?>">start now</a></li>
        </ul>
	</div>
</div>
<?php include 'inc/footer.php'; ?>