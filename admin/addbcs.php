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
<div class="main">
<h1>Add Bcs Question</h1>

    <?php 
        if($_SERVER['REQUEST_METHOD']=='POST'){
           $adques=$aq->addquestion($_POST);
        }
        $total=$aq->get_maxques();
        $next=$total+1;
    
    ?>
       <?php if(isset($adques)){
                echo $adques;
            } ?>
            <div class="frm clear">
                 <form action="" method="post">
                     <table>
                         <tr>
                             <td> <label for="qno">Q. no</label></td>
                             <td>  <input type="number" name="QuesNo" value="<?php if(isset($next)){
                        echo $next;
                    }?>" id="qno"></td>
                         </tr>
                   
                    <tr>
                        <td>  <label for="question">Question</label></td>
                        <td> <textarea name="question" id="question" cols="30" rows="10"></textarea></td>
                        
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
                            <td>  <label >option1</label></td>
                            <td> <textarea name="ans1" id="" cols="15" rows="2"></textarea></td>
                        </tr>
                         <tr>
                             <td>   <label >option2</label></td>
                             <td> <textarea name="ans2" id="" cols="15" rows="2"></textarea></td>
                         </tr>
                  
                         <tr>
                             <td>   <label>option3</label></td>
                             <td> <textarea name="ans3" id="" cols="15" rows="2"></textarea></td>
                         </tr>
                         <tr>
                             <td>   <label >option4</label></td>
                             <td> <textarea name="ans4" id="" cols="15" rows="2"></textarea></td>
                         </tr>
                         <tr>
                             <td>   <label >rightAns</label></td>
                             <td>  <input type="number" name="rightans"><br>
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