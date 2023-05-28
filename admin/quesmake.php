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
    <h3>Making Question</h3>
    <a href="makebcsques.php">Make Bcs Question</a>
    <a href="makebankques.php">Make Bank Question</a>
    <a href="makeprimaryques.php">Make Primary Question</a>
    <a href="makeotherques.php">Make Others Question</a>
    <a href="makeadmisionques.php">Make Arts Question</a>
    <a href="makeadmisionscienceques.php">Make Science Question</a>
    <a href="makeadmisioncommerceques.php">Make Commerce Question</a>


</div>
</div>
<?php include 'inc/footer.php'; ?>