<?php include 'inc/header.php'; ?>
  <?php if(isset($_GET['model'])){
	$model=$_GET['model'];
}else{
	header("Location:model.php");
}
  ?>
    <?php if(isset($_GET['idno'])){
	$modelno=$_GET['idno'];
}else{
	header("Location:model.php");
}
  ?>
  <?php 	if(isset($_GET["page"])){
		$page=$_GET["page"];
	}?>

  <?php 
//    if($_SERVER['REQUEST_METHOD']=='POST'){
       // $proces=$pro->procesdata($_POST);
   // }
?>

<div class="main">
 
<script type="text/javascript">
    setInterval(function()
    {
        var xmlhttp=new XMLHttpRequest();
            
        xmlhttp.open("GET","responce.php",false);
        xmlhttp.send(null);	
            if(xmlhttp.responseText=="00:00:00")
            {
                window.location="final.php";
            }
         document.getElementById("response").innerHTML=xmlhttp.responseText;
    },1000);    
        
	</script>
	<?php $total=$pro->getTotal($model);?>
	<div><h1 >Question <?php echo "1" ?> of <?php echo $total;?> </h1>
		<h1 id="response"></h1>
	</div>
	<?php 
	$totalpage=$pro->getTotal($model);

$limit=1;
$ofset=$page*$limit-$limit;
$query = "select * from  $model Orders limit $limit offset $ofset";
$ques=$db->select($query);
if($ques){
	while($result=$ques->fetch_assoc()){
	$qno=$result['question_no'];
?>
	<div class="test">
		<form  action="" method="post">
		<table> 
			<tr>
				<td colspan="2">
				 <h3><?php echo "Q. ".$result['id'].": ".$result['question']?></h3>
				</td>
			</tr>
			<?php
			
			$query = "select * from bcs_allanswer where question_no= $qno";
			$answer=$db->select($query);
			if($answer){
				while($resultt=$answer->fetch_assoc()){
			?>
			<tr>
				<td>
				 <input type="radio" name="answer" value="<?php echo $resultt['id']?>" ><?php echo $resultt['answer']?>
				</td>
			</tr>
			<?php } }?>
			<?php } } ?>
			<tr>
			  <td>
				<input type="submit"  value="Submit">
			</td>
			</tr>
			<tr>
			<td>
		
			</td>
			</tr>
		</table>
		</form>
			<div> 
			<?php
			for($i=1;$i<=$totalpage;$i++){
			 echo "<a href='test.php?page=".$i."'>$i</a>";
			 }?>
			</div>
</div>
 </div>
<?php include 'inc/footer.php'; ?>