<?php
include 'core/initForMainLogPage.php';
?>

<?php
 if(logged_in()){
$data=user_dataAdmin('username');
$usernameData=$data['username'];
 }else{
	 header('Location: index.php');
 }
?>
<?php include 'includes/adminHeadAll.php';?>

<header>
 <?php include 'includes/adminMenu.php';?>  
  </header>
  <div class="container">
  <br/> <br/>
<h3>Company Setting</h3>

 </div> 
	 <?php include 'includes/footerAll.php';?>  
</body>
</html>



