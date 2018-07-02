<?php
include 'core/initForMainLogPage.php';
?>

<?php
 if(logged_in()){
$data=user_dataManager('username');
$usernameData=$data['username'];
 }else{
	 header('Location: index.php');
 }
?>
<?php include 'includes/adminHeadAll.php';?>

<header>
 <?php include 'includes/managerMenu.php';?>  
  </header>
  <div class="container">
	 <?php include 'includes/manager-flow-diagram.php';?>  
	
</div> 
	 <?php include 'includes/footerAll.php';?>  
</body>
</html>
