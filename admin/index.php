<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
?>

<div class="main">
<h1>Admin Panel</h1>

<div>
<h3>Add About</h3>
<a href="updateabout.php"> Update About</a>
</div>
<div>
<h3>Add Notice</h3>
<a href="addnotice.php"> Notice</a>
<a href="updatenotice.php">Update Notice</a>
</div>
<div>
<h3>Add Title</h3>
<a href="updatetitle.php"> Update Title</a>
</div>
<div>
<h3>Add Social</h3>
<a href="updatesocial.php"> Social</a>
</div>
<div>
<h3>Add Logo</h3>
<a href="updatelogo.php">Logo</a>
</div>
</div>
<?php include 'inc/footer.php'; ?>