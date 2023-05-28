<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/loginheader.php');
	include_once '../config/config.php';
	include_once '../lib/Database.php';
	include_once '../helpers/Format.php';
	include_once '../lib/Session.php';
	$fm=new Format();
	$db=new Database();

?>
  
<div class="main">
<h1>Admin Login</h1>
<?php 
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$email = $fm->validation($_POST['email']);
	$password = $fm->validation($_POST['password']);
	$email = mysqli_real_escape_string($db->link,$email);
	$password = mysqli_real_escape_string($db->link,$password);
	$query="SELECT * FROM admin_tbl WHERE email ='$email' AND password='$password' ";
	$result = $db->select($query);
	if($email==''||$password==''){
		$msg= "<span class = 'error'>Email or Password must not be empty</span>";
				echo $msg;
	}
	else{
			if($result!=false){
		$value=$result->fetch_array(MYSQLI_ASSOC);
		Session::init();
		Session::set("login",true);
		Session::set("email",$value['email']);
		Session::set("id",$value['id']);
		Header("Location:index.php");

	}
	else{
		$msg= "<span class = 'error'>Email or Password Not match</span>";
				echo $msg;
	}
	}

}
?>
<div class="adminlogin">
	<form action="" method="post">
		<table>
			<tr>
				<td>E-mail</td>
				<td><input type="email" name="email"/></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password"/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="login" value="Login"/></td>
			</tr>
		</table>

	</from>
</div>
</div>
<?php include 'inc/footer.php'; ?>