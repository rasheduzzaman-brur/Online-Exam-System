<?php include 'inc/loginheader.php'; ?>
<div class="main">
<?php if(isset($_GET['id'])){
    $id=$_GET['id'];
}?>
<?php 
$query="select* from notice_tbl where id=$id";
$abt=$db->select($query);
if($abt){
  while($result=$abt->fetch_assoc()){
?>
  <h2><?php echo "$result[h1]";?></h2>
  <h4><?php echo $fm->formatDate($result['date']);?></h4>
  <p><?php echo "$result[notice]";?></p>
 
<?php  }
} ?>
	
  </div>
<?php include 'inc/footer.php'; ?>