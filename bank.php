<?php include 'inc/header.php'; ?>
<div class="main">
<h1>Bank Model Test </h1>

	<div class="segmenttwo">
    <ul>
    <?php 
    
    $query = "select * from job_bank_model_tbl";
    $model=$db->select($query);
    if($model){
       $i=0;
       while($result=$model->fetch_assoc()){   
         $i++;
            ?>
            <li><a href="model.php?modelno=<?php echo $result['model_name'];?>"><?php echo "Model ".$i;?> </a></li>
           <?php } } ?>
        </ul>
	</div>
</div>
<?php include 'inc/footer.php'; ?>