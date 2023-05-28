<?php include 'inc/loginheader.php'; ?>
<div class="main">
<h1>Online Exam System - User Registration</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/regi.png"/>
	</div>
<?php 

if($_SERVER['REQUEST_METHOD']=='POST'){
 
     $userregi = $usr->userRegistration($_POST);
}
?>
	<div class="segment">
	<form action="" method="post">
		<table>
		<tr>
           <td>Name</td>
           <td><input type="text" name="name"></td>
         </tr>
		<tr>
           <td>Phone</td>
           <td><input name="number" type="number" id="name"></td>
         </tr>
         <tr>
           <td>Password</td>
           <td><input type="password" name="password"></td>
         </tr>
         <tr>
           <td>Confirm Password</td>
           <td><input type="password" name="password1"></td>
         </tr>
         <tr>
           <td></td>
           <td><input type="submit" name="Submit" value="Signup">
           </td>
         </tr>
       </table>
	   </form>
     <?php
     if(isset($userregi)){
                   echo $userregi;
               }
                    
                ?>
	   <p>Already Registered ? <a href="index.php">Login</a> Here</p>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>