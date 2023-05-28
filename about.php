<?php include 'inc/loginheader.php'; ?>
<div class="main">

<?php 
$query="select* from about_tbl where id='1'";
$abt=$db->select($query);
if($abt){
  while($result=$abt->fetch_assoc()){
?>
  <h2><?php echo "$result[h1]";?></h2>
  <p><?php echo "$result[about]";?></p>

<?php  }
} ?>
	
  </div>
<?php include 'inc/footer.php'; ?>