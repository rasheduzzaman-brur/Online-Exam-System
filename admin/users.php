<?php   $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/inc/header.php');?>
<?php 
  include_once ($filepath.'/../class/user.php');
  $user=new User();
?>
<?php 
if(isset($_GET['dis'])){
    $disableid=$_GET['dis'];
    $disable=$user->disableuser($disableid);

}
?>
<?php 
if(isset($_GET['enabl'])){
    $enableid=$_GET['enabl'];
    $enable=$user->enableuser($enableid);

}
?>
<?php 
if(isset($_GET['del'])){
    $deleteid=$_GET['del'];
    $delete=$user->deleteuser($deleteid);

}
?>

<div class="main">
<h1>User List</h1>
<?php if(isset($disable)){
    echo $disable;
}?>
<?php if(isset($enable)){
    echo $enable;
}?>
<?php if(isset($delete)){
    echo $delete;
}?>
          <div class="manageuser"> 
                <table class="tblone">
              <tr>
                  <th width="10%">No</th>
                  <th width="25%">Name</th>
                  <th width="25%">UserName</th>
                  <th width="20%">Email</th>
                  <th width="20%">Action</th>
              </tr>  
     <?php 
     $alluser=$user->getUser();
     $i=0;
     if($alluser){
         while($result=$alluser->fetch_assoc()){
            $i++;
    
     ?>
    
              <tr>
                  <td width="15%"><?php echo $i;?></td>
                  <td width="30%"><?php 
                  if($result['status']==1){
                       echo "<span class=error>".$result['name']."</span>" ;
                  }
                  else{
                      echo $result['name'];
                  }
                 ?></td>
                  <td width="30%"><?php echo $result['number'];?></td>
                  <td width="25%">
                  <?php if($result['status']==0){
                 ?> 
                   <a onclick="return confirm ('Are you sure to Disable')" href="?dis=<?php echo $result['id'];?>">Disable</a>
                 <?php  } else {?>
                     <a onclick="return confirm ('Are you sure to Enable')" href="?enabl=<?php echo $result['id'];?>">Enable</a>
                  <?php  } ?>
                  
                 
                
                  ||<a onclick="return confirm ('Are you sure to remove')" href="?del=<?php echo $result['id'];?>">Remove</a></td>
              </tr>
               <?php }
              } ?>
            </table>
          </div>
          
        </div>
        <?php include 'inc/footer.php'?>