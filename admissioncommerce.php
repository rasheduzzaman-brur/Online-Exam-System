<?php include 'inc/header.php'; ?>
<div class="main">
<h1>Admission Commerce Model Test </h1>

	<div class="segmenttwo">
    <ul>
    <?php 
    
    $query = "select * from admission_commerce_model_tbl";
    $model=$db->select($query);
    if($model){
       $i=0;
       while($result=$model->fetch_assoc()){   
         $i++;
            ?>
            <li><a href="admission_model.php?modelno=<?php echo $result['model_name'];?>"><?php echo "Model ".$i;?> </a></li>
           <?php } } ?>
        </ul>
	</div>
</div>
<?php include 'inc/footer.php'; ?>