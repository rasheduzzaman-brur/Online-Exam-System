<?php include 'config/config.php'?>
<?php include 'lib/Database.php'?>
<?php include 'lib/Session.php'?>
<?php include 'helpers/Format.php'?>

<?php include 'class/proces.php';
include_once 'class/user.php';
Session::checkLogin();
?>
<?php 
 $db = new Database();
 $fm = new Format();
 $pro = new Process();
 $usr = new User();
?>
<?php
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: pre-check=0, post-check=0, max-age=0"); 
header("Pragma: no-cache"); 
header("Expires: Mon, 6 Dec 1977 00:00:00 GMT"); 
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
?>
<!doctype html>
<html>
<head>
	<title>Online Exam System</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="no-cache">
	<meta http-equiv="Expires" content="-1">
	<meta http-equiv="Cache-Control" content="no-cache">
	<link rel="stylesheet" href="css/main.css">
	<script src="js/jquery.js"></script>
	<script src="js/main.js"></script>

	<style> 

	 </style>
</head>
<body>

<div class="phpcoding">
<div class="header" style="background: violet;" >
			<div class="left" style="float: left;">
				<img src="admin/upload/logo.png" alt="" srcset="" style="float:left; padding:10px">
				<?php $query = "select * from title_tbl";
				$tt=$db->select($query);
				if($tt){
					while($result=$tt->fetch_assoc()){
				?>
				<h1><?php echo $result['title'];?></h1>
				<p><?php echo $result['subtitle'];?></p>
				<?php 	}
				}?>
			</div>
			<div class="right " style="float:right">
			<?php $query = "select * from social_tbl";
				$tt=$db->select($query);
				if($tt){
					while($result=$tt->fetch_assoc()){
				?>
			<a href="<?php echo $result['facebook'];?>"><img src="img/facebook-new (1).png" alt="" srcset=""></a>
			<a href="<?php echo $result['twiter'];?>"><img src="img/twiter.png" alt="" srcset=""></a>
			<a href="<?php echo $result['instragram'];?>"><img src="img/instagram-new.png" alt="" srcset=""></a>
			<a href="<?php echo $result['googleplus'];?>"><img src="img/google-plus.png" alt="" srcset=""></a>
				<?php 	}
				}?>
		
			</div>
		</div>
		<section class="maincontent">
		<div class="menu">
		<ul>
			<li><a href="about.php">About us</a></li>	
			<li><a href="notice.php">Notice</a></li>
			<li><a href="topchart.php">TopChart</a></li>
			<li><a href="index.php">Login</a></li>
			<li><a href="register.php">Register</a></li>
		</ul>
		</div>
	