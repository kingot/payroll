<?php
 
?>

<?php

//admin login code
$errorAll='';
$error=array();
 
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['empId']) && isset($_POST['Comfirmpassword'])){
	$empId=mysql_real_escape_string($_POST['empId']);
	 $username=strtolower(mysql_real_escape_string($_POST['username']));
	 $password=strtolower(mysql_real_escape_string($_POST['password']));
	 $Comfirmpassword=$_POST['Comfirmpassword'];


if(empty($username) || empty($password) || empty($empId) || empty($Comfirmpassword)){
	$error[]='Please all fields are required';
}else{
		
	if(empId($empId)===false AND adminId($empId)===false AND managerId($empId)===false){
		$error[]='Incorrect employee ID ,try again.';
	}
	
	if($password !=$Comfirmpassword){
		$error[]='Password and Comfirm password do not match, try again';
	}
	
	if(user_existsEmp($username)===true ||  user_existsManager($username)===true || user_existsAdmin($username)===true){
		$error[]='Username exist ,try another username.';
	}
	
	
	if(@activationEmp($username)===true AND @activationAdmin($username)===true AND @activationManager($username)===true){
	$error[]='Your account has already been activated,you may  &nbsp;&nbsp;<a href="index.php">Login</a>';
}
	
}

	    if(!empty($error)){
	  $errorAll= '<div class="error"><ul><li>'.implode('</li><li>',$error).'</li></ul></div>';
		
		}else{
			//update infor
			if(mysql_query("UPDATE emplog SET username='$username',password='$password',activate=1 WHERE empId='$empId' AND activate=0")){
				
				echo '<p class="pa">Your new username and password is successfully created, you may  &nbsp;&nbsp;<a href="index.php">Login</a></a>';
			}
			
		}

 }//end isset
 

?>
<div class="loginform">
<form action="activate-account.php" method="post">
   <table cellpadding="0" cellspacing="0" border="0">
    <h3>Activate your Account by entering your employee ID and a new username and password</h3>
   
     <tr><td class="text">Employee ID: </td><td><input type="text" name="empId" class="field" /></td></tr>
    <tr><td class="text">New Username: </td><td><input type="text" name="username" class="field" /></td></tr>
    <tr><td class="text">New Password: </td><td><input type="password" name="password" class="field"/></td></tr>
     <tr><td class="text">Comfirm Password: </td><td><input type="password" name="Comfirmpassword" class="field"/></td></tr>
    <tr><td colspan="2" style="text-align:center"><input type="submit" value="Submit" class="submit"/>
    <br/> <br/>
    <a href="index.php">Login | Home</a>
    </td></tr>
   </table>
</form> 
<?php echo $errorAll; ?>
</div>