<?php
 
?>

<?php

//admin login code
$errorAll='';
$error=array();
 
if(isset($_POST['password']) && isset($_POST['empId']) && isset($_POST['Comfirmpassword'])){
	$empId=mysql_real_escape_string($_POST['empId']);
	 $password=strtolower(mysql_real_escape_string($_POST['password']));
	 $Comfirmpassword=strtolower(mysql_real_escape_string($_POST['Comfirmpassword']));


if(empty($password) || empty($empId) || empty($Comfirmpassword)){
	$error[]='Please all fields are required';
}else{
		
	if(empId($empId)===false AND adminId($empId)===false AND managerId($empId)===false){
		$error[]='Incorrect employee ID ,try again.';
	}
	
	if($password !=$Comfirmpassword){
		$error[]='Password and Comfirm password do not match, try again';
	}
	
	/*
	if(@activationEmp($username)===true AND @activationAdmin($username)===true AND @activationManager($username)===true){
	$error[]='Your account has already been activated,you may  &nbsp;&nbsp;<a href="index.php">Login</a>';
}*/
	
}

	    if(!empty($error)){
	  $errorAll= '<div class="error"><ul><li>'.implode('</li><li>',$error).'</li></ul></div>';
		
		}else{
			//update infor
			if(mysql_query("UPDATE emplog SET password='$password' WHERE empId='$empId' AND activate=1")){
				
				echo '<p class="pa">Your new password is successfully created, you may  &nbsp;&nbsp;<a href="index.php">Login</a></a>';
			}
			
		}

 }//end isset
 

?>
<div class="loginform">
<form action="forget-password.php" method="post">
   <table cellpadding="0" cellspacing="0" border="0">
    <h3>Get a new password by entering your employee ID and a new password</h3>
   
     <tr><td class="text">Employee ID: </td><td><input type="text" name="empId" class="field" /></td></tr>
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