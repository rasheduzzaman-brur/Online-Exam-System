<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
?>
<?php
include_once '../config/config.php';
 include_once '../lib/Database.php';
 include_once '../helpers/Format.php';
 $db=new Database();
 $fm=new Format();
?>
<div class="main">
<h1>Admin Panel</h1>
<div>

<?php 
 if($_SERVER['REQUEST_METHOD']=='POST'){
     $permited=array('png');
     $file_name=$_FILES['logo']['name'];
     $file_size=$_FILES['logo']['size'];
     $file_temp=$_FILES['logo']['tmp_name'];
     $div=explode('.',$file_name);
     $file_ext=strtolower(end($div));
     $same_image='logo'.'.'.$file_ext;
     $upload_image="upload/".$same_image;

     if($file_name==""){
         echo "<span class='error' >Feild must not be empty</span>";
     }
     else{
         if(!empty($file_name)){
             if($file_size>1848567){
                 echo" <span class='error'>Image size should be less than 1 MB</span>";
             }
             elseif(in_array($file_ext,$permited)==false){
                 echo "<span class='error'>You can upload only ".implode(',',$permited)."</span>";
             }
             else{
                 move_uploaded_file($file_temp,$upload_image);
                $query= "UPDATE logo_tbl SET logo='$same_image' where id='1'";
                $abt=$db->update($query);
                if($abt){
                    echo "<span class='succes'>Update logo succesfully</span>";
                }
                else{
                echo "<span class='error'>Update logo not succesfully</span>";
                }
             }
         }
         
         
     }
 }
?>
<h2>Update Logo</h2>
<form action="" method="post" enctype="multipart/form-data">
<table>

<tr>
<td>Title</td>
<td><input type="file" name="logo" id=""></td>
</tr>
<tr>

<tr>
<td></td>
<td><button type="submit">Update</button></td>
</tr>
</table>
</form>
<div>
<?php $query ="select * from logo_tbl where id='1'";
$logo=$db->select($query);
if($logo){
    $result=$logo->fetch_assoc();
?>
    <img src="upload/<?php echo $result['logo'] ?>" height="200" width="200" alt="" srcset="">
    <?php }?>
</div>

</div>
</div>
<?php include 'inc/footer.php'; ?>