<?php include 'inc/header.php'; 

?>
<?php if(isset($_GET['model'])){
	$model=$_GET['model'];
}else{
	header("Location:model.php");
}
  ?>
    <?php if(isset($_GET['idno'])){
	$modelno=$_GET['idno'];
}else{
	header("Location:model.php");
}
  
  
  ?>
  <!-- start make coundown timer-->
  <?php 
        $query="select * from exam_time";
        $time=$db->select($query);
        if($time){
            while($result=$time->fetch_assoc()){
                $duration=$result['duration'];
            }
            $_SESSION["duration"]=$duration;
            $_SESSION["start_time"]=date("Y-m-d H:i:s");
            $end_time=date('Y-m-d H:i:s',strtotime('+'.$_SESSION["duration"].'minutes',strtotime($_SESSION["start_time"])));
            $_SESSION["end_time"]=$end_time;
        }
        ?> 
        <script type="text/javascript">
    setInterval(function()
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
      if(xmlhttp.readyState==4 && xmlhttp.status==200){
           if(xmlhttp.responseText== 0)
            {
        
                window.location="admresult.php?model="+model;

            }
            else{
              document.getElementById("admcountdown").innerHTML=xmlhttp.responseText;
            }
         
         }
    };
        xmlhttp.open("GET","responce.php",true);
        xmlhttp.send(null);	
       

    },1000);    
      
	</script>
   <!-- end make coundown timer-->
  <?php $query="select* from $model";
      $gettotal=$db->select($query);
      $total=$gettotal->num_rows;?>

<div class="main">
  <div class="test">
  <div class="row" >
    <div style="float:left; background:green; color:white;">
      <span id="admcurr_question"style="float: left;" > </span>
      <p style="float: left;">/</p>
      <span id="admtotal_question" style="float: left;"></span>
    </div>
 
      <div id="admcountdown" style="float:right; background:green; color:white;" > </div>

 </div>
 <br>
 <div class="row"> 
    <div id="admload_question" ></div>
 </div>
 <div id="row">
      <div>
        <input type="button" value="previous" onclick="load_pre();">
        <input type="button" value="next" onclick="load_next();">
      </div>
 </div>
 <div class="row">
    <div id="admpagination" >
      <?php 
      for($i=1;$i<=$total;$i++) {
     ?>
  <input type="button" value="<?= $i?>" onclick="load_curr(<?= $i?>);" >
  <?php } ?>
    </div>
    <div> <input type="button" value="Submit" onclick="submit();">  </div>
 </div>

  <script type="text/javascript">
  var model="<?php echo $model?>";
  var total="<?php echo $total?>";
  function load_total_question(){
    var xmlhttp= new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
      if(xmlhttp.readyState==4 && xmlhttp.status==200){
        document.getElementById("admtotal_question").innerHTML=xmlhttp.responseText;
      }
    };
    xmlhttp.open("GET","forajax/load_total_qus.php?model="+model,true);
    xmlhttp.send(null);
  }
  
  var question="1";
  loadquestion(question);
  function loadquestion(question){
    document.getElementById("admcurr_question").innerHTML=question;
    var xmlhttp= new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
      if(xmlhttp.readyState==4 && xmlhttp.status==200){
             document.getElementById("admload_question").innerHTML=xmlhttp.responseText;
             load_total_question();
      }
    };
    xmlhttp.open("GET","forajax/adm_loadquestion.php?model="+model+"&question="+question,true);
    xmlhttp.send(null);
  }
  function selectans(rans,questionno){
    var xmlhttp= new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
      if(xmlhttp.readyState==4 && xmlhttp.status==200){
      }
    };
    xmlhttp.open("GET","forajax/admsaveinsession.php?rans="+rans+"&question="+questionno,true);
    xmlhttp.send(null);
  }

  function load_pre(){
    if(question=="1"){
      loadquestion(question);
    }
    else{
      question=eval(question)-1;
      loadquestion(question);
    }
  }
  function load_next(){
    if(question<eval(total)){
      question=eval(question)+1; 
      loadquestion(question);
    }
    else{
      loadquestion(question);
     
    }
     
  }
   function load_curr(i){
     var ques = i;
     ques=eval(ques); 
    loadquestion(ques);
   }
   function submit(){
    window.location.href="admresult.php?model="+model;
   }
  </script>
</div>
 </div>
<?php include 'inc/footer.php'; ?>