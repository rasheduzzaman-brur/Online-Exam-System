<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/inc/header.php');
    
?>
<?php
include_once ($filepath.'/../config/config.php');
include_once ($filepath.'/../lib/Database.php');
 $db=new Database();
?>

<div class="main">
<h1>Admin Panel</h1>
<?php 
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $cat=mysqli_real_escape_string($db->link , $_POST['cat']);
            $model=mysqli_real_escape_string($db->link , $_POST['model']);
            header("Location:makingques.php?cat=".$cat."&model=".$model);
        }
    
    ?>
<div class="frm clear">
                 <form action="" method="post">
                     <table>
                     <tr>
                     <td><label for="model">Model</label></td>
                     <td>  <select id="select" name="model">
                                <option>Select Model</option>
                                <?php 
                                $query= "SELECT * from  job_bank_model_tbl ORDER BY id DESC";
                                $model=$db->select($query);
                                if($model){
                                    while($result=$model->fetch_assoc()){
                               
                                ?>
                                    <option value="<?php echo $result['model_name'];?>"><?php echo $result['model_name'];?></option>
                                   <?php }
                                }?>
                                </select></td>
                     </tr>
                       <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat">
                                <option>Select Category</option>
                                <?php 
                                $query= "select * from bcs_category";
                                $cat=$db->select($query);
                                if($cat){
                                    while($result=$cat->fetch_assoc()){
                               
                                ?>
                                    <option value="<?php echo $result['id'];?>"><?php echo $result['category'];?></option>
                                   <?php }
                                }?>
                                </select>
                            </td>
                        </tr>
                 
                   <tr>
                       <td></td>
                       <td> <input  type="submit" value="Submit"></td>
                   </tr>
                   
             </table>
                </form>
            </div>


	
</div>
<?php include 'inc/footer.php'; ?>