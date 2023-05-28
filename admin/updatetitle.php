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
 if($_SERVER['REQUEST_METHOD']=='POST'){
    $title=$_POST['title'];
    $subtitle=$_POST['subtitle'];
     $name=mysqli_real_escape_string($db->link, $title);
     $h1=mysqli_real_escape_string($db->link, $subtitle);
     if(empty($title)||empty($subtitle)){
         echo "<span class='error' >Feild must not be empty</span>";
     }
     else{
         $query= "UPDATE title_tbl SET title='$title' , subtitle='$subtitle'";
         $abt=$db->update($query);
         if($abt){
             echo "<span class='succes'>Update Title succesfully</span>";
         }
         else{
          echo "<span class='error'>Update Title not succesfully</span>";
         }
         
     }
 }
?>
<h2>Update Title</h2>
<form action="" method="post">
<table>
<?php $query ="select * from title_tbl where id='1'";
$tt=$db->select($query);
if($tt){
    $result=$tt->fetch_assoc();
?>
<tr>
<td>Title</td>
<td><input type="text" name="title" id="" value="<?php echo $result['title'];?>"></td>
</tr>
<tr>
<td>Subtitle</td>
<td><input type="text" name="subtitle" id="" value="<?php echo $result['subtitle'];?>"></td>
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