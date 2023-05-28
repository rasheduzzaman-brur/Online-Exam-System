<?php 
      include '../config/config.php';
      include '../lib/Database.php';
      include '../lib/Session.php';
      session_start();
    $db=new Database();

    $getid=$_GET['question'];
    if(isset($_GET['model'])){
      $model=$_GET['model'];
    }
?>
<?php  $query="select* from $model";
      $gettotal=$db->select($query);
      $total=$gettotal->num_rows;
  ?>
<?php 
$query="select* from $model where id='$getid'";
      $getques=$db->select($query);
      if($getques){
          $result=$getques->fetch_assoc();
          $qno=$result['question_no'];
?>

    <div>
    <table>
    <?php 
      ?>
        <tr> <td><h3><?=$getid." ".$result['question']?></h3></td></tr>
        
       <?php $query = "select * from admission_allanswer where question_no= $qno";
   
			$answer=$db->select($query);
			if($answer){
				while($resultt=$answer->fetch_assoc()){
			?>
			<tr>
				<td>
				 <input type="radio" name="answer" value="<?php echo $resultt['id']?>" onclick="selectans(<?php echo $resultt['id']?>,<?= $qno?>);"
         <?php 
          if(isset($_SESSION["admanswer"][$qno])){
         $ans=$_SESSION["admanswer"][$qno];
        if($ans==$resultt['id']){
           echo "checked";
         }}
      ?>
         ><?php echo $resultt['answer']?>
				</td>
			</tr><?php }}}?>
    
    </table>
      <?php ?>

    </div>