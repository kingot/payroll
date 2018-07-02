<?php
include 'core/initForMainLogPage.php';
?>

<?php
 if(logged_in()){
$data=user_dataEmp('username');
$usernameData=$data['username'];
 }else{
	 header('Location: index.php');
 }
?>
<?php include 'includes/adminHeadAll.php';?>

<header>
 <?php include 'includes/employeeMenu.php';?>  
  </header>
  <div class="container">
  <br/>
	<p>Welcome !... print your payslip report and manage your private messages. </p>
 </div> 
	 <?php include 'includes/footerAll.php';?>  
</body>
</html>
