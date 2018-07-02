<?php
$sql = @mysql_query("SELECT COUNT(inboxId) AS numbers,employee.empId FROM inbox
    	JOIN employee ON employee.empId=inbox.empId WHERE employee.empId='".$_SESSION['empId']."'");
 		$result=mysql_fetch_assoc($sql);
 		$inboxMessageNew=$result['numbers'];

	//checking for all messages
$sql = @mysql_query("SELECT COUNT(inboxId) AS numbers,employee.empId FROM inbox
    	JOIN employee ON employee.empId=inbox.empId WHERE employee.empId='".$_SESSION['empId']."'");
 		$result=mysql_fetch_assoc($sql);
 		$inboxMessagesTotal=$result['numbers'];
		
 $sql = @mysql_query("SELECT COUNT(outboxId) AS numbers,employee.empId FROM outbox
    	JOIN employee ON employee.empId=outbox.empId WHERE employee.empId='".$_SESSION['empId']."'");
 		$result=mysql_fetch_assoc($sql);
 		$outboxMessages=$result['numbers'];


//all users functions in this file

//checking if username exist for admin, manager,employee
function userExistAdmin($username){
	$query="select adminId FROM admin WHERE username='$username'";
	$mysqlQuery=mysql_query($query);
   if(mysql_num_rows($mysqlQuery)==1){
    
	return true;
   }else{
    return false;
   }
}


function userExistManager($username){
	$query="select managerId FROM managerlog WHERE username='$username'";
	$mysqlQuery=mysql_query($query);
   if(mysql_num_rows($mysqlQuery)==1){
    
	return true;
   }else{
    return false;
   }
}

function userExistEmp($username){
	$query="select empLogId FROM emplog WHERE username='$username'";
	$mysqlQuery=mysql_query($query);
   if(mysql_num_rows($mysqlQuery)==1){
    
	return true;
   }else{
    return false;
   }
}
//...................................................................

//login functions here
function logged_in(){
 if(isset($_SESSION['empId']) && !empty($_SESSION['empId'])){
 return true;
 }else{
 return false;
 }
}

//.................................begin of admin login check..........
function check_loginAdmin($username,$password){
  $username=mysql_real_escape_string($username);
  $password=mysql_real_escape_string($password);
  
  $query=mysql_query("SELECT adminId,employee.empId,username,password 
  FROM admin JOIN employee ON employee.empId=admin.empid WHERE username='$username' AND password='$password'");
  
  if(mysql_num_rows($query)==0){
  return false;
  echo mysql_error();
  }else{
  $empId=mysql_result($query,0,'empId');
   $_SESSION['empId']=$empId;
  
   }
}

function user_dataAdmin(){ 
 
  $args=func_get_args(); 
  $fileds='`'.implode('`, `', $args).'`'; 
  $query=mysql_query("SELECT $fileds FROM `admin` WHERE `empId`='".$_SESSION['empId']."'");
  
  $query_result=mysql_fetch_assoc($query);
  foreach($args as $filed){
   $args[$filed]=$query_result[$filed];
  }
  
 return $args;
 }
//.................................END of admin login check..........



//.................................begin  of manager login check..........
function check_loginManager($username,$password){
  $username=strtolower(mysql_real_escape_string($username));
  $password=mysql_real_escape_string($password);
  
  $query=mysql_query("SELECT managerId,employee.empId,username,password 
  FROM managerlog JOIN employee ON employee.empId=managerlog.empid WHERE username='$username' AND password='$password'");
  
  if(mysql_num_rows($query)==0){
  return false;
  echo mysql_error();
  }else{
  $empId=mysql_result($query,0,'empId');
   $_SESSION['empId']=$empId;
  
   }
}

function user_dataManager(){ 
 
  $args=func_get_args(); 
  $fileds='`'.implode('`, `', $args).'`'; 
  $query=mysql_query("SELECT $fileds FROM `managerlog` WHERE `empId`='".$_SESSION['empId']."'");
  
  $query_result=mysql_fetch_assoc($query);
  foreach($args as $filed){
   $args[$filed]=$query_result[$filed];
  }
  
 return $args;
 }
 
 function user_dataAll(){ 
 
  $args=func_get_args(); 
  $fileds='`'.implode('`, `', $args).'`'; 
  $query=mysql_query("SELECT $fileds FROM `employee` WHERE `empId`='".$_SESSION['empId']."'");
  
  $query_result=mysql_fetch_assoc($query);
  foreach($args as $filed){
   $args[$filed]=$query_result[$filed];
  }
  
 return $args;
 }

//.................................END of managerlogin login check..........


//.................................begin of admin login check..........
function check_loginEmp($username,$password){
  $username=strtolower(mysql_real_escape_string($username));
  $password=mysql_real_escape_string($password);

  $query=mysql_query("SELECT empLogId,employee.empId,username,password 
  FROM emplog JOIN employee ON employee.empId=emplog.empid WHERE username='$username' AND password='$password'");
  
  if(mysql_num_rows($query)==0){
  return false;
  echo mysql_error();
  }else{
  $empId=mysql_result($query,0,'empId');
   $_SESSION['empId']=$empId;
  
   }
}

function user_dataEmp(){ 
 
  $args=func_get_args(); 
  $fileds='`'.implode('`, `', $args).'`'; 
  $query=mysql_query("SELECT $fileds FROM `emplog` WHERE `empId`='".$_SESSION['empId']."'");
  
  $query_result=mysql_fetch_assoc($query);
  foreach($args as $filed){
   $args[$filed]=$query_result[$filed];
  }
  
 return $args;
 }
 
 
 function user_dataEmployee(){ 
 
  $args=func_get_args(); 
  $fileds='`'.implode('`, `', $args).'`'; 
  $query=mysql_query("SELECT $fileds FROM `emplog` WHERE `empId`='".$_SESSION['empId']."'");
  
  $query_result=mysql_fetch_assoc($query);
  foreach($args as $filed){
   $args[$filed]=$query_result[$filed];
  }
  
 return $args;
 }

//.................................END of employee login check..........




//...................function to insert data into company table............

	function updateCompanyInfo($compName,$compAddress,$compReg,$compNumbEmp,$levelOne,$levelTwo,$levelThree,$levelFour,$levelFive,
							$OneS,$OneL,$TwoS,$TwoL,$ThreeS,$ThreeL,$FourS,$FourL,$FiveS,$FiveL){
	$compName=mysql_real_escape_string($compName);
	$compAddress=mysql_real_escape_string($compAddress);
	$compReg=mysql_real_escape_string($compReg);
	$compNumbEmp=mysql_real_escape_string($compNumbEmp);
	$levelOne=mysql_real_escape_string($levelOne);
	$levelTwo=mysql_real_escape_string($levelTwo);
	$levelThree=mysql_real_escape_string($levelThree);
	$levelFour=mysql_real_escape_string($levelFour);
	$levelFive=mysql_real_escape_string($levelFive);
	    
		mysql_query("UPDATE company SET compName='$compName',address='$compAddress',registrationNo='$compReg',numberOfEmp='$compNumbEmp',levelOne='$levelOne',levelTwo='$levelTwo',levelThree='$levelThree',levelFour='$levelFour',levelFive='$levelFive', oneS='$OneS',oneL='$OneL',twoS='$TwoS',twoL='$TwoL',threeS='$ThreeS',threeL='$ThreeL',fourS='$FourS',fourL='$FourL',
		fiveS='$FiveS',fiveL='$FiveL'");	
}

function compData(){
	$sql=mysql_query("SELECT compId, compName,address,registrationNo,numberOfEmp,levelOne,levelTwo,levelThree,levelFour,levelFive,
						oneS,oneL,twoS,twoL,threeS,threeL,fourS,fourL,fiveS,fiveL FROM company WHERE compId=1");
	
	$infor=mysql_fetch_array($sql);
	
	return $infor;
	
}

//.................insert to employee table............
	function employeeInfo($name,$phone,$email,$designa,$level){
		$name=htmlentities(mysql_real_escape_string($_POST['name']));
		 $phone=htmlentities(mysql_real_escape_string($_POST['phone']));
		$email=htmlentities(mysql_real_escape_string($_POST['email']));
	   	$designa=htmlentities(mysql_real_escape_string($_POST['designa']));
	   	$level=htmlentities(mysql_real_escape_string($_POST['level']));

		mysql_query("INSERT INTO employee VALUES('','$name','$phone','$email','$level','$designa')");
	}
//..........................

//...............updation employee------------

function empInfo($empId){
		  //$empId=(int)$empId;
		 $sql=mysql_query("SELECT * FROM employee WHERE empId='$empId'");
	
	$empInfor=mysql_fetch_array($sql);
	
	return $empInfor;
	
}

function upDateEmp($name,$phone,$email,$designa,$level){
	 $name=htmlentities(mysql_real_escape_string($_POST['name']));
	$phone=htmlentities(mysql_real_escape_string($_POST['phone']));
		$email=htmlentities(mysql_real_escape_string($_POST['email']));
	   	$designa=htmlentities(mysql_real_escape_string($_POST['designa']));
	   	$level=htmlentities(mysql_real_escape_string($_POST['level']));
		
}

//......................delete employee

	function deleteEmp($empId){
		  $empId=(int)$empId;
		 mysql_query("DELETE FROM employee WHERE empId='$empId'");
	}
	
	function grabEmpId($empId){
		  $empId=(int)$empId;
		 mysql_query("SELECT empId FROM employee WHERE empId='$empId'");
	}
	
	function getMonth($date){
		$date=$_POST['date'];
		mysql_query("SELECT FROM payroll WHERE date='$date'");
	}
	
	// insert into payroll
	function payrollData($name,$empId,$totalDeduct,$netSalary,$bonus,$allowa){
		
		mysql_query("INSERT INTO payroll VALUES('','$name','$empId',NOW(),'','','',
					'$totalDeduct','$netSalary','$allowa','$bonus')") or mysql_error();
	}

		
//function to activate the user to login


function activationEmp($username){
	$username=mysql_real_escape_string($username);
 return (mysql_result(mysql_query("SELECT COUNT(empId) FROM emplog WHERE username='$username' AND activate=1"),0)==1)? true :false;
  
}

function activationAdmin($username){
	$username=mysql_real_escape_string($username);
 return (mysql_result(mysql_query("SELECT COUNT(empId) FROM admin WHERE username='$username' AND activate=1"),0)==1)? true :false;
  
}

function activationManager($username){
	$username=mysql_real_escape_string($username);
 return (mysql_result(mysql_query("SELECT COUNT(empId) FROM managerlog WHERE username='$username' AND activate=1"),0)==1)? true :false;
  
}




//registering functions here

 function user_existsEmp($username){ 
 
 $username=mysql_real_escape_string($username);
 $query="SELECT `username` FROM `emplog` WHERE `username`='$username'";
 $query_run=mysql_query($query);
  
   if(mysql_num_rows($query_run)==1){
    
	return true;
   }else{
    return false;
   }
 }
 
 
 function user_existsManager($username){ 
 $username=mysql_real_escape_string($username);
 $query="SELECT `username` FROM `managerlog` WHERE `username`='$username'";
 $query_run=mysql_query($query);
  
   if(mysql_num_rows($query_run)==1){
    
	return true;
   }else{
    return false;
   }
 }
 
 
 function user_existsAdmin($username){ 
 $username=mysql_real_escape_string($username);
 $query="SELECT `username` FROM `admin` WHERE `username`='$username'";
 $query_run=mysql_query($query);
  
   if(mysql_num_rows($query_run)==1){
    
	return true;
   }else{
    return false;
   }
 }
 
 //checking for empid
  function empId($empId){
  $empId=mysql_real_escape_string($empId);
  $query="SELECT `empId` FROM `emplog` WHERE `empId`='$empId'";
  
   $query_run=mysql_query($query);
	   $mysql_num_rows=mysql_num_rows($query_run);
	   if($mysql_num_rows==1){
	  return true;
	}else{
	if($mysql_num_rows==0){
	return false;
	}
	} 
  }
 
  function adminId($empId){
  $empId=mysql_real_escape_string($empId);
  $query="SELECT `empId` FROM `admin` WHERE `empId`='$empId'";
  
   $query_run=mysql_query($query);
	   $mysql_num_rows=mysql_num_rows($query_run);
	   if($mysql_num_rows==1){
	  return true;
	}else{
	if($mysql_num_rows==0){
	return false;
	}
	} 
  }
  
  
   function managerId($empId){
  $empId=mysql_real_escape_string($empId);
  $query="SELECT `empId` FROM `managerlog` WHERE `empId`='$empId'";
  
   $query_run=mysql_query($query);
	   $mysql_num_rows=mysql_num_rows($query_run);
	   if($mysql_num_rows==1){
	  return true;
	}else{
	if($mysql_num_rows==0){
	return false;
	}
	} 
  }
  
  //checking for the payroll payment
  
  
?>