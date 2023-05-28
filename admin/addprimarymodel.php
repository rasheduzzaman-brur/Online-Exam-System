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
<h1>Add New Admission Model</h1>
<div>
<?php 
               if($_SERVER['REQUEST_METHOD']=='POST'){
                  $name=$_POST['model'];
                   $name=mysqli_real_escape_string($db->link, $name);
                   if(empty($name)){
                       echo "<span class='error' >Feild must not be empty</span>";
                   }
                   else{
                    $adname="jobpri".$name;
                    $adname=strtolower($adname);
                    $query1="SELECT * FROM job_primary_model_tbl where model_name='$adname'";
                    $check=$db->select($query1);
                    if($check!=false){
                     echo "<span class='error'>model name already have</span>";
                    }else{
                        $query= "INSERT INTO job_primary_model_tbl(model_name) VALUES('$adname')";
                       $cat=$db->insert($query);
                       if($cat){
                           echo "<span class='succes'>Insert model succesfully</span>";
                             header("Location:creattable.php?name=$adname");
                       }
                       else{
                        echo "<span class='error'>Insert model not succesfully</span>";
                       }
                    } 
                   }
                 
               }
               ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Admssion Model Name..." class="medium" name="model" />
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