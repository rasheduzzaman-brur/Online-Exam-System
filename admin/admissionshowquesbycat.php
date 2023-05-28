<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/inc/header.php');
    include_once ($filepath.'/../config/config.php');
    include_once ($filepath.'/../lib/Database.php');
    $db=new Database();
?>
<?php
  if(isset($_GET['cat'])){
      $cat=$_GET['cat'];
  }
?>

<div class="main">
<?php  if(isset($_GET['qno'])){
      $qno=(int)$_GET['qno'];
      $tables = array("admission_allquestion","admission_allanswer");
      foreach($tables as $table){
        $delquery="DELETE FROM $table where question_no='$qno'";
        $del=$db->delete($delquery);
      }
      if($del){
          echo"Delete succesfull";
      }else{
          echo "Delete Not succesfull";
      }
  }?>
<?php 
    $query="select * from admission_category where catid='$cat'";
    $category=$db->select($query);
    
    if($category){
        $result=$category->fetch_assoc();
            $catname=$result['category'];
    }
    ?>
    <h1><?php echo $catname;?> Question</h1>
<table class="tblone">
    <tr>
    <th width="5%">No</th>
    <th width="65%">Question</th>
    <th width="20%">Ans</th>
    <th width="20%">Action</th>
    </tr>
    <?php 
    $query="select * from admission_allquestion where cat='$cat'";
    $qlist=$db->select($query);
    $i=0;
    if($qlist){
        while($result=$qlist->fetch_assoc()){
            $i++;
            $qno=$result['question_no']
    ?>
    <tr>
        <td width="5%"><?php echo $i;?></td>
        <td width="65%"><?php echo $result['question'];?></td>
        <?php 
            $query="select * from admission_allanswer where question_no ='$qno' and right_ans='1' ";
            $ans=$db->select($query);
            if($ans){
                $rans=$ans->fetch_assoc();
                 
        ?>
        <td width="20"><?php echo $rans['answer'];?></td>
        <?php }?>
        <td width="10%"><a onclick="return confirm('Are you sure delete')" href="quesedit.php?admqno=<?php echo $qno?>">Remove</a> </td>
    </tr>
    <?php    }
    }?>
</table>

	
</div>
<?php include 'inc/footer.php'; ?>