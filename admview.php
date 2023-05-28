<?php include 'inc/header.php'?>
<?php if(isset($_GET['mnam'])){
	$mnam=$_GET['mnam'];
}else{
	header("Location:model.php");
}
  ?>
  <?php  $total=$pro->getTotal($mnam);?>

<div class="main" >
            <h1> Answer for All Question: <?php echo $total;?></h1>
            <div class="test">
                <form action="" method="post">
                    <table>  
            <?php 
           
            $query = "select * from $mnam";
            $ques=$db->select($query);
            if($ques){
              while($result=$ques->fetch_assoc()){
               $qnum= $result['question_no'];
            ?>
                        <tr>
                            <td colspan = "2">
                               <h3 style="color:black">Question <?php echo $result['id'];?>:<?php echo $result['question'];?></h3> 
                            </td>
                        </tr>
                       <?php 
                          $query = "select * from admission_allanswer where question_no='$qnum'";
                          $answer=$db->select($query);
                        if($answer){
                            while($result =$answer->fetch_assoc()){
                        ?>
                       <tr style="color:black">
                            <td>
                            <?php
                            if($result['right_ans'] =='1'){
                                echo "<span style='color:blue'>".$result['answer']."</span>";
                           }else{
                               echo $result['answer'];
                         }
                             ?></td>
                        </tr>
                        <?php  }
                       } ?> 
                  
                      
                        <?php  } } 
                        ?>
                      
                       
                       
                       
                    </table>
                </form>
            </div>
            </div>
<?php include 'inc/footer.php'?>