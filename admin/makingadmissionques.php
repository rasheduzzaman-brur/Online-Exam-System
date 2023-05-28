<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/inc/header.php');
    include_once ($filepath.'/../class/Question.php');
    
?>
<?php
include_once ($filepath.'/../config/config.php');
include_once ($filepath.'/../lib/Database.php');
 $db=new Database();
 $aq=new Question();
?>
<?php if(isset($_GET['cat'])){
    $cat=$_GET['cat'];
}
?>
<?php if(isset($_GET['model'])){
    $model=$_GET['model'];
}
?>
<div class="main">
<h1>Add Question into <?php echo $model?></h1>
<?php 
        if($_SERVER['REQUEST_METHOD']=='POST'){
           $modelques=$aq->makemodelques($_POST);
        }
    
    ?>
      <?php if(isset($modelques)){
                echo $modelques;
            } ?>
<div class="frm clear">
                 <form action="" method="post">
                     <table>
                    <tr>
                        <?php 
                        $query="SELECT *
                        FROM $model";
                        $total=$db->select($query);
                         $result=$total->num_rows;
                     
                        ?>
                        <td>Total Question: </td>
                        <td><?php echo $result;?></td>
                 
                    </tr>
                      
                    <tr>
                        <td>  <label for="question">Question</label></td>
                        <td>  <select id="select" name="ques"  >
                                <option>Select Question</option>
                                <?php 
                                $i=0;
                                $query= "select * from admission_allquestion where cat='$cat'";
                                $ques=$db->select($query);
                                if($ques){
                                    while($result=$ques->fetch_assoc()){
                                        $i++;
                               
                                ?>
                                    <option value="<?php echo $result['question_no'];?>,<?php echo $result['question'];?>"><?php echo $i?> <?php echo $result['question'];?>
                                  
                                </option>
                                   
                                   <?php }
                                }?>
                                </select></td>
                    </tr>
                
                   <tr>
                       <td></td>
                       <td> <input  type="submit" value="Submit"></td>
                       <input type="hidden" name="mnam" value="<?php echo $model;?>"/>
                   </tr>
                   
             </table>
                </form>
            </div>


	
</div>
<?php include 'inc/footer.php'; ?>