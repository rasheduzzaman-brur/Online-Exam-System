<?php include 'inc/header.php'; ?>
<div class="main">
<h1>BCS Model Test </h1>
<p>Autosubmit in <span id="output"></span></p>
<Script>
var trig = setInterval(timer,1000);

var counter=0;
var min=4;
var sec=60;

function timer(){

sec=--sec;

if(sec===0){
min=--min;
sec=59;
counter=++counter;
}

if(counter===5){
sec=0;
min=0;
clearInterval(trig);
 functionSubmit();
 document.write("Submitted");
 }

 document.getElementById("output").innerHTML = min+" : "+sec;

 }
</Script>
</div>
<?php include 'inc/footer.php'; ?>