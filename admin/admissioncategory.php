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
<h1>Add New Admission Category</h1>
<div>
<?php 
               if($_SERVER['REQUEST_METHOD']=='POST'){
                  $name=$_POST['category'];
                   $name=mysqli_real_escape_string($db->link, $name);
                   if(empty($name)){
                       echo "<span class='error' >Feild must not be empty</span>";
                   }
                   else{
                       $query= "INSERT INTO admission_category(category) VALUES('$name')";
                       $cat=$db->insert($query);
                       if($cat){
                           echo "<span class='succes'>Insert category succesfully</span>";
                       }
                       else{
                        echo "<span class='error'>Insert category not succesfully</span>";
                       }
                       
                   }
               }
               ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Admission Category Name..." class="medium" name="category" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
</div>


	
</div>
<?php include 'inc/footer.php'; ?>