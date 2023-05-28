<?php include 'inc/header.php'; 
?>
<?php 
$userid=Session::get("id");
?>
<style>
    .profile{ width:500; margin: 0 auto ; border: 1px solid #ddd; padding: 30px 50px;}
</style>
<div class="main">
<h1>Online Exam System - User Profile</h1>
<?php
 if($_SERVER['REQUEST_METHOD'] == 'POST' ){
    $update=$usr->updateprofile($_POST,$userid);
} 
?>

    <div class="profile">
     
	<form action="" method="post">
    <?php	
    $profile=$usr->getprofile($userid);
    if($profile){
        $result=$profile->fetch_assoc();
    ?>
		<table class="tbl">   
        <tr>
           <td>Name</td>
           <td>: <input name="name" type="text" value="<?php echo $result['name'];?>" ></td>
         </tr> 
         <tr>
           <td>Phone</td>
           <td>: <input name="number" type="number"value="<?php echo $result['number'];?>" ></td>
         </tr>
			  <tr>
			  <td></td>
			   <td>  <input type="submit" name="update" value="update">
			   </td>
			 </tr>
       </table>
       <?php } ?>
       </form>
       <?php if(isset($update)){
            echo $update;        
        }
        ?>
       </div>
</div>
<?php include 'inc/footer.php'; ?>