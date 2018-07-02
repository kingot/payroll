<?php

?>

<div id="loginform">
<form action="" method="post">
   <table cellpadding="0" cellspacing="0" border="0">
   	<tr><td colspan="2"><div class="loginheader">

    <h3>Login</h3>
    </div>
    </td></tr>
   <!-- <tr><td></td><td>
    		<select name="loginAs">
            	<option value="1">Manager</option>
                <option value="2" >Payroll Administrator</option>
                <option value="3"> Employee</option>
            </select>
    </td></tr>-->
    
    <tr><td class="text"> Username: </td><td><input type="text" name="username" class="field" /></td></tr>
    <tr><td class="text">Password: </td><td><input type="password" name="password" class="field"/></td></tr>
    <tr><td colspan="2" style="text-align:center"><input type="submit" value="Login" class="submit"/>
    <br/><br/>
    <a href="activate-account.php">Activate Account</a> | <a href="forget-password.php">Forgotten Password?</a>
    </td></tr>
   </table>
</form> 

<?php

//admin login code
$error=array();
 
if(isset($_POST['username']) && isset($_POST['password'])){
	 $username=strtolower(mysql_real_escape_string($_POST['username']));
	 $password=strtolower(mysql_real_escape_string($_POST['password']));
	$passwordHash=md5($password);


if(empty($username) || empty($passwordHash)){
	$error[]='Please all fields are required';
}else{

 if(userExistManager($username)===false && !empty($username) AND
 	userExistAdmin($username)===false && !empty($username) AND
	userExistEmp($username)===false && !empty($username)) {
	$error[]='Your username does not exist.Please contact the Administrator.';
}

//checking for activation if activation is zero then change password 


if(@activationEmp($username)===false AND @activationAdmin($username)===false AND @activationManager($username)===false){
	$error[]='Cannot login, please activate your account by changing username and password. &nbsp;&nbsp;<a href="activate-account.php">Activate Account</a>';
}
}

 if(!empty($error)){
	  echo '<ul><li class="li">'.implode('</li><li>',$error).'</li></ul>';
 }else{
		 if(check_loginManager($username,$password)===@$empId){
		 header('Location: managerprofile.php');
		 }elseif(check_loginAdmin($username,$password)===@$empId){
		 header('Location: adminprofile.php');
		 }elseif(check_loginEmp($username,$password)===@$empId){
		 header('Location: employeeprofile.php');
		 }else{
		 echo '<p  class="pa">'.'Invalid username or password provided, please contact the Administrator'.'</p>'; 
	 }
		 }
		 


 }//end isset
 

?>
</div>