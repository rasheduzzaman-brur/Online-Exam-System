<?php 
    $filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/inc/header.php');
  include_once ($filepath.'/../class/Question.php');
  $aq=new Question();
 
?>
<style>.one a {
  display: block;
  text-decoration: none;
  
}  </style>
<div class="main">
<h1>Admin Panel</h1>
<div class="one">
    <h3>Job question list</h3>
    <?php $cat= $aq->get_cat();
    if($cat){
        while($result=$cat->fetch_assoc()){
    ?>
    <a href="showquesbycat.php?cat=<?php echo $result['id']?>"><?php echo $result['category']?></a>
    <?php     }
    }?>
</div>
<div class="one">
    <h3>Admission question list</h3>
    <?php $cat= $aq->admget_cat();
    if($cat){
        while($result=$cat->fetch_assoc()){
    ?>
    <a href="admissionshowquesbycat.php?cat=<?php echo $result['catid']?>"><?php echo $result['category']?></a>
    <?php     }
    }?>
</div>


	
</div>
<?php include 'inc/footer.php'; ?>