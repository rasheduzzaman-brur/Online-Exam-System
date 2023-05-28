<?php include 'inc/header.php'; 

?> 
<?php 
     if(isset($_GET['model'])){
          $model=$_GET['model'];
     }
    
     ?>
<div class="main">
<h1>Online Exam System - User Login</h1>
<div class="test">	
<?php 
    $right=0;
    $worng=0;
    $blank=0;
    $query="select * from $model";
    $allques=$db->select($query);
    if($allques){
        while($result=$allques->fetch_assoc()){
            $qno=$result['question_no'];

            $query1="select * from admission_allanswer where question_no='$qno' and right_ans=1";
            $rightans=$db->select($query1);
            if($rightans){
                $result1=$rightans->fetch_assoc();
                    $rightid=$result1['id'];
                    if(isset($_SESSION['admanswer'][$qno])){
                          if($rightid==$_SESSION['admanswer'][$qno]){
                                $right++;
                                unset($_SESSION['admanswer'][$qno]);
                            }
                            else{
                                $worng++;
                                unset($_SESSION['admanswer'][$qno]);
                            }
                    }
                 
                
                
            }
    
 ?>
 <?php }}
  $result=$right-$worng*.5;
 echo "Total Correct Answer : ".$right."<br>";
 echo "Total Worng Answer : ".$worng."<br>";
 echo "Your Marks : ".$result;

 ?>
	<div>
    <a href="admview.php?mnam=<?= $model?>">View Answer</a>
    </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>