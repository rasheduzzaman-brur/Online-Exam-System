<?php 
    $filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/inc/header.php');
 
?>
<style>.one a {
  display: block;
  text-decoration: none;
  
}  </style>
<div class="main">
<h1>Admin Panel</h1>
<div class="one">
    <h3>Add Bcs Question</h3>
    <a href="addcategory.php">Add Category</a>
    <a href="addmodel.php">Add Bcs Model</a>
    <a href="addbankmodel.php">Add Bank Model</a>
    <a href="addprimarymodel.php">Add Primary Model</a>
    <a href="addothersmodel.php">Add Others Model</a>
    <a href="addbcs.php">Add Quetioon</a>
</div>
<div class="one">
    <h3>Add Admission Question</h3>
    <a href="admissioncategory.php">Add Category</a>
    <a href="admissionmodel.php">Add Arts Model</a>
    <a href="admission_science_model.php">Add Science Model</a>
    <a href="admission_commerce_model.php">Add Commerce Model</a>
    <a href="admissionQue.php">Add Question</a>
</div>
<div class="one">
    <h3>Add Academic Question</h3>
    <a href="academiccategory.php">Add Category</a>
    <a href="academicmodel.php">Add Model</a>
    <a href="academicQue.php">Add Question</a>
</div>
</div>
<?php include 'inc/footer.php'; ?>