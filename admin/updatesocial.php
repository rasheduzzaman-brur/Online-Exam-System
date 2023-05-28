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
    $fb=$_POST['facebook'];
    $tt=$_POST['twiter'];
    $ig=$_POST['instragram'];
    $gp=$_POST['googleplus'];
     $fb=mysqli_real_escape_string($db->link, $fb);
     $tt=mysqli_real_escape_string($db->link, $tt);
     $ig=mysqli_real_escape_string($db->link, $ig);
     $gp=mysqli_real_escape_string($db->link, $gp);
     if(empty($fb)||empty($tt)||empty($ig)||empty($gp)){
         echo "<span class='error' >Feild must not be empty</span>";
     }
     else{
         $query= "UPDATE social_tbl SET facebook='$fb' , twiter='$tt',instragram='$ig',googleplus='$gp'";
         $abt=$db->update($query);
         if($abt){
             echo "<span class='succes'>Update Social succesfully</span>";
         }
         else{
          echo "<span class='error'>Update Social not succesfully</span>";
         }
         
     }
 }
?>
<h2>Add Title</h2>
<form action="" method="post">
<table>
<?php $query ="select * from social_tbl";
$social=$db->select($query);
if($social){
    while($result=$social->fetch_assoc()){
?>
<tr>
<td>Facebook</td>
<td><input type="text" name="facebook" id="" value="<?php echo $result['facebook'];?>"></td>
</tr>
<tr>
<td>Twiter</td>
<td><input type="text" name="twiter" id="" value="<?php echo $result['twiter'];?>"></td>
</tr>
<tr>
<td>Instragram</td>
<td><input type="text" name="instragram" id="" value="<?php echo $result['instragram'];?>"></td>
</tr>
<tr>
<td>Google Plus</td>
<td><input type="text" name="googleplus" id="" value="<?php echo $result['googleplus'];?>"></td>
</tr>
<?php }}?>
<tr>
<td></td>
<td><button type="submit">Update</button></td>
</tr>
</table>



</form>

</div>
</div>
<?php include 'inc/footer.php'; ?>