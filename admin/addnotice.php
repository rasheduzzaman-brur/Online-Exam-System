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
    $name=$_POST['notice'];
    $h1=$_POST['h1'];
     $name=mysqli_real_escape_string($db->link, $name);
     $h1=mysqli_real_escape_string($db->link, $h1);
     if(empty($name)){
         echo "<span class='error' >Feild must not be empty</span>";
     }
     else{
         $query= "INSERT INTO notice_tbl (notice,h1)values('$name','$h1')";
         $abt=$db->update($query);
         if($abt){
             echo "<span class='succes'>Insert notice succesfully</span>";
         }
         else{
          echo "<span class='error'>Insert notice not succesfully</span>";
         }
         
     }
 }
?>
<h2>Add Notice</h2>
<form action="" method="post">
<table>
<tr>
<td>Heading</td>
<td><input type="text" name="h1" id="" ></td>
</tr>
<tr>
<td>body</td>
<td><textarea name="notice" id="" cols="40" rows="30"></textarea></td>
</tr>
<tr>
<td></td>
<td><button type="submit">Submit</button></td>
</tr>
</table>



</form>

</div>
</div>
<?php include 'inc/footer.php'; ?>