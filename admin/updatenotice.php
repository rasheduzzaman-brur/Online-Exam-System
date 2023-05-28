<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
?>
<?php
include_once '../config/config.php';
 include_once '../lib/Database.php';
 $db=new Database();
?>
<div class="main">
<h1>Admin Panel</h1>
<div>
<?php 
$last_id;
$query="SELECT MAX(id) AS lastid FROM notice_tbl";
$lastid=$db->select($query);
if($lastid){
    $resultt=$lastid->fetch_assoc();
    $last_id=$resultt['lastid'];
}
?>

<?php 
 if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST['notice'];
    $h1=$_POST['h1'];
     $name=mysqli_real_escape_string($db->link, $name);
     $h1=mysqli_real_escape_string($db->link, $h1);
     if(empty($name)){
         echo "<span class='error' >Feild must not be empty</span>";
     }
     else{
         $query= "UPDATE notice_tbl SET notice='$name' , h1='$h1' where id=$last_id ";
         $abt=$db->update($query);
         if($abt){
             echo "<span class='succes'>Update notice succesfully</span>";
         }
         else{
          echo "<span class='error'>Update notice not succesfully</span>";
         }
         
     }
 }
?>
<h2>Add about</h2>
<form action="" method="post">
<table>
<?php 

$query ="select* from notice_tbl where id='$last_id'";
$abt=$db->select($query);
if($abt){
    $result=$abt->fetch_assoc();
?>
<tr>
<td>Heading</td>
<td><input type="text" name="h1" id="" value="<?php echo $result['h1'];?>"></td>
</tr>
<tr>
<td>body</td>
<td><textarea name="notice" id="" value="<?php echo $result['notice'];?>" cols="40" rows="30"><?php echo $result['notice'];?></textarea></td>
</tr>
<?php }?>
<tr>
<td></td>
<td><button type="submit">Update</button></td>
</tr>
</table>



</form>

</div>
</div>
<?php include 'inc/footer.php'; ?>