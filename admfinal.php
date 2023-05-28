<?php include 'inc/header.php'; ?>
<?php if(isset($_GET['mnam'])){
	$mnam=$_GET['mnam'];
}else{
	header("Location:model.php");
}
  ?>
<div class="main">
<h1>You are done!</h1>
	<div class="segmenttwo">
    <p>Congrats ! You have just completed the exam</p>
                <p> Total Score:
                    <?php 
                    if(isset($_SESSION['score']) && isset($_SESSION['neg']) ){
                        echo $_SESSION['score']-($_SESSION['neg']/2);
                       
                    }
                   
                    ?>
                </p><br>
                <p> Total Right Answer:
                    <?php 
                    if(isset($_SESSION['score'])){
                        echo $_SESSION['score'];
                        unset($_SESSION['score']);
                    }
                   
                    ?>
               
                </p><br>
                <p> Total Wrong Answer:
                    <?php 
                    if(isset($_SESSION['neg'])){
                        echo ($_SESSION['neg']);
                        unset($_SESSION['neg']);
                    }
                   
                    ?>
                </p>
                   <a href="admview.php?mnam=<?php echo $mnam;?>">View Answer</a><br>
                    <a href="bcs.php">Again Exam</a>

	</div>
</div>
<?php include 'inc/footer.php'; ?>
