
<?php session_start();
        if(!isset($_SESSION["end_time"])){
            echo "00:00:01";
        }else{
             $from_time1=date('Y-m-d H:i:s');
         $to_time1=$_SESSION["end_time"];
         $timefirst=strtotime($from_time1);
         $timesecond=strtotime($to_time1);
          $differenceinseconds=$timesecond-$timefirst; 
         if($to_time1<$from_time1){
           echo 0;
         }
        else{
            echo gmdate("H:i:s",$differenceinseconds);
        }
        }
        
        ?>
    
       
