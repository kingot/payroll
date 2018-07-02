<?php
include 'core/initForMainLogPage.php';
?>

<?php

if(isset($_GET['empId']) && !empty($_GET['empId'])){
    
    //delete employee here
    $empId=$_GET['empId'];
    grabEmpId($empId);
  }
  
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
	<br>
    <h3>Generate Username and Password for employee</h3>
    <p>Please before you can login to your account, activate for new username and password by using the details below.</p>
  	<?php
	$errorAll="";
	$error=array();
    if(isset($_POST['getempId']) && isset($_POST['getUsername']) && isset($_POST['getPassword'])){
		$getempId=mysql_real_escape_string($_POST['getempId']);
		$getUsername=mysql_real_escape_string($_POST['getUsername']);
		$getPassword=mysql_real_escape_string($_POST['getPassword']);
		
		if(empty($getempId) || empty($getUsername) || empty($getPassword)){
			$error[]='Please all field are required';
		}else{
			
			if(empId($empId)===true){
				$error[]='You have already generated random username and password for this employee.';
			}
		}
		
		if(!empty($error)){
			
		$errorAll= '<div class="error"><ul><li>'.implode('</li><li>',$error).'</li></ul></div>';
			
		}else{
			//insert into tables admin,managerlog and emplog
			mysql_query("INSERT INTO emplog SET empId='$getempId', username='$getUsername', password='$getPassword',activate=0");
			header('Location: manage-employee.php');
		}
	}
	
	
	//getting the userinfo
	$sql=mysql_query("SELECT * FROM employee WHERE empId='$empId' LIMIT 1");
	while($rows=mysql_fetch_array($sql)){
		$getempId=$rows['empId'];
	}
	
	//generate functons here
	function randUsername($len){
$result = "";
    $chars = "abcdefghijklmnopqrstuvwxy";
    $charArray = str_split($chars);
    for($i = 0; $i < $len; $i++){
   $randItem = array_rand($charArray);
   $result .= "".$charArray[$randItem];
    }
    return $result;
}

function randPassword($len){
$result = "";
    $chars = "0123456789";
    $charArray = str_split($chars);
    for($i = 0; $i < $len; $i++){
   $randItem = array_rand($charArray);
   $result .= "".$charArray[$randItem];
    }
    return $result;
}
?>

<?php
// Usage example
$getUsername = randUsername(10);
$getPassword=randPassword(10);
	
	?>
    
    
    <div class="styletable"><table cellpadding="0" cellspacing="0">
	<form action="" method="post">
    	<tr><td>Employee ID</td><td><input type="text" name="getempId" readonly="readonly" value="<?php echo $getempId;?>"></td></tr>
        <tr><td>UserName</td><td><input type="text" name="getUsername" readonly="readonly" value="<?php echo $getUsername; ?>"></td></tr>
        <tr><td>Password</td><td><input type="text" name="getPassword"readonly="readonly"  value="<?php echo $getPassword;?>"></td></tr>
        <tr><td></td><td><input type="submit" value="submit"></td></tr>
        </form>
        </table></div>
        <br/>
        <?php echo $errorAll;?>
    </div>
 </div> 
	 <?php include 'includes/footerAll.php';?>  
</body>
</html>



