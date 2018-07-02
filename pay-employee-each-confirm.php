<?php
include 'core/initForMainLogPage.php';
 /* if(isset($_GET['empId']) && !empty($_GET['empId'])){
    
    //delete employee here
    $empId=$_GET['empId'];
   grabEmpId($empId);
  }
*/
if(isset($_GET['empId']) && isset($_GET['loan']) && isset($_GET['absent']) && isset($_GET['salaryPerDay']) && isset($_GET['union']) && isset($_GET['bonus']) && isset($_GET['name'])){
    
    $empId=$_GET['empId'];
	 $absent=$_GET['absent'];
	$loan=$_GET['loan'];
	//$ssnit=$_GET['ssnit'];
	$salaryPerDay=$_GET['salaryPerDay'];
	$union=$_GET['union'];
	//$allowa=$_GET['allowa'];
	$bonus=$_GET['bonus'];
	$name=$_GET['name'];
	
	/* $transport=$_GET['transport'];
	 $safety=$_GET['safety'];
	$lunch=$_GET['lunch'];
	&& isset($_GET['transport']) && isset($_GET['safety']) && isset($_GET['lunch'])
	$allowa=$transport + $safety + $lunch;*/
  }
  
  if(isset($_GET['transport']) || !isset($_GET['transport']) && isset($_GET['safety']) || !isset($_GET['safety']) && isset($_GET['lunch']) ||  !isset($_GET['lunch'])){
	 @$transport=$_GET['transport'];
	 @$safety=$_GET['safety'];
	@$lunch=$_GET['lunch'];
	
	$allowa=$transport + $safety + $lunch;  
  }
  
  /*else{
	  if(!isset($_GET['transport']) && !isset($_GET['safety']) && !isset($_GET['lunch'])){
		  
		 $transport=$_GET['transport'];
	 $safety=$_GET['safety'];
	$lunch=$_GET['lunch'];
	
	$allowa=$transport + $safety + $lunch;  
	  }
  }
*/



//  $empId =grabEmpId($empId);
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
  <br/>
  <h3>Confirm to Pay Employee</h3>
   <p style="color:red;"><b>Do you really want to pay this employee? &nbsp;&nbsp;<a href="pay-employee.php">Back to Payment</a></b></p>
<?php
 //printf('<pre>%s</pre>', print_r($_POST, 1)); 
$error=array();
$errorAll='';
//$leave="";
if(isset($_POST['empId']) && isset($_POST['name']) && isset($_POST['totalDeduct']) && isset($_POST['netSalary'])
		&& isset($_POST['bonus']) && isset($_POST['allowa'])){
		 $empId=htmlentities(mysql_real_escape_string($_POST['empId']));
		 $name=htmlentities(mysql_real_escape_string($_POST['name']));
		 $totalDeduct=htmlentities(mysql_real_escape_string($_POST['totalDeduct']));
		 $netSalary=htmlentities(mysql_real_escape_string($_POST['netSalary']));
		 $bonus=htmlentities(mysql_real_escape_string($_POST['bonus']));
		 $allowa=htmlentities(mysql_real_escape_string($_POST['allowa']));
		// $leaveDeduct=htmlentities(mysql_real_escape_string($_POST['leaveDeduct']));
//		 $netSalary=htmlentities(mysql_real_escape_string($_POST['netSalary']));
		 

 
	   //checking for the validity of data entered
	   if(empty($empId)){
		   $error[]='Employee Id cannot be empty.';
	   }else{
		
		if(preg_match('/[0-9]/',$netSalary)==false){
   		$error[]='Net Salary should only contain numbers'; 
		}
		
		if(empId($empId)===false){
			$error[]="This employee is not recoganize by the system and can not be paid,he may need to register first.";
		}
		
	   }
	   
	    if(!empty($error)){
	  $errorAll= '<div class="error"><ul><li>'.implode('</li><li>',$error).'</li></ul></div>';

		}else{

	payrollData($name,$empId,$totalDeduct,$netSalary,$bonus,$allowa);
			echo '<p class="pa">Payment made successfully.&nbsp;&nbsp;&nbsp;<a href="employees-salary-report.php">See Payment Records</a></p>';

			
		}
		

 }//end isset
 

?>

<div class="tableWrap">
<form action="" method="post" >
  <div class="styletable"><table cellpadding="" cellspacing="" border="0">
  <?php
		$query=mysql_query("SELECT 
							empId,name,level,company.compId,company.levelOne,company.levelTwo,
							company.levelThree,company.levelFour,company.levelFive,company.oneS,company.oneL,company.twoS,company.twoL,company.threeS,
							company.threeL,company.fourS,company.fourL,company.fiveS,company.fiveL
							 FROM employee JOIN company ON company.compId=1 WHERE empId='$empId' LIMIT 1");
		
		
		/*$queryComp=mysql_query("SELECT compId,levelOne,levelTwo,levelThree,levelFour,levelFive FROM compay WHERE compId=1 LIMIT 1")*/
			$levelPay="";
			$leaveDeduct="";
			$totalDeduct="";
			$netSalary="";
			while($row=mysql_fetch_array($query)){
				$empId=$row['empId'];
				$name=$row['name'];
				$levelEmp=$row['level'];
				$levelOne=$row['levelOne'];
				$levelTwo=$row['levelTwo'];
				$levelThree=$row['levelThree'];
				$levelFour=$row['levelFour'];
				$levelFive=$row['levelFive'];
				$oneS=$row['oneS'];
				$oneL=$row['oneL'];
				
				$twoS=$row['twoS'];
				$twoL=$row['twoL'];
				
				$threeS=$row['threeS'];
				$threeL=$row['threeL'];
				
				$fourS=$row['fourS'];
				$fourL=$row['fourL'];
				
				$fiveS=$row['fiveS'];
				$fiveL=$row['fiveL'];
				
				if($levelEmp==1){
					$levelPay=$levelOne;
					$snnit=$oneS;
					$loan=$oneL;
				}elseif($levelEmp==2){
					$levelPay=$levelTwo;
					$snnit=$twoS;
					$loan=$twoL;
				}elseif($levelEmp==3){
					$levelPay=$levelThree;
					$snnit=$threeS;
					$loan=$threeL;
				}elseif($levelEmp==4){
					$levelPay=$levelFour;
					$snnit=$fourS;
					$loan=$fourL;
				}elseif($levelEmp==5){
					$levelPay=$levelFive;
					$snnit=$fiveS;
					$loan=$fiveL;
				}
				
			//making calculations
			//$basicSalary=$salaryPerDay * 30;
			
			$gross=($salaryPerDay * 30) + $allowa + $bonus;
			$snnitPercent= $gross * 0.05;
			$totalDeduct=($absent * $salaryPerDay) + $loan + $snnitPercent + $union;
			
			$netSalary=$gross - $totalDeduct;
			
			}
	?>
        <tr>
	 <td>Loan: </td><td><input type="text" name="loan"  value="<?php if(isset($loan)){echo $loan;} ?>"></td>
	 <td>Employee ID: </td><td><input type="text" name="empId" readonly value="<?php if(isset($empId)){echo $empId;}?>"></td>
	 </tr>
	 
     <tr>
	 <td>SSNIT: </td><td><input type="text" name="ssnit"  readonly value="<?php if(isset($snnitPercent)){echo $snnitPercent;} ?>"></td>
	 <td>Employee Name: </td><td><input type="text" name="name" readonly value="<?php if(isset($name)){ echo $name;}?>"></td>
	 </tr>
	 
  
   <tr>
   <td> Absent: </td><td><input type="text" name="absent"  value="<?php if(isset($absent)){echo $absent;} ?>"></td>
    <td> Salary Per Day:</td><td><input type="text" name="salaryPerDay" readonly value="<?php echo $levelPay.".00";?>"></td>
   </tr>

	<tr>
	<td> Local Union: </td><td><input type="text" name="union" class="input" value="<?php if(isset($union)){echo $union;} ?>"></td>
	<td> Allowances</td><td><input type="text" name="allowa" class="input" value="<?php if(isset($allowa)){echo $allowa;} ?>"></td>
	</tr>
   
   <tr>
   <td style="color:#F00; font-weight:bold"> Total Deduction:</td><td><input type="text" name="totalDeduct" readonly value="<?php if(isset($totalDeduct)){echo $totalDeduct."";} ?>"></td>
   <td> Bonus:</td><td><input type="text" name="bonus"  value="<?php if(isset($bonus)){echo $bonus;} ?>"></td>
   </tr>
   
    <tr>
	<td colspan="2"> </td>
	<td style="color:#FF0; font-weight:bold"> Gross Salary:</td><td ><input type="text" name="gross" readonly value="<?php if(isset($gross)){echo $gross."";}?>"></td>
	</tr>
	
     <tr>
	 <td colspan="2"> </td>
	  <td style="color:#063; font-weight:bold"> Net Salary:</td><td ><input type="text" name="netSalary" readonly value="<?php if(isset($netSalary)){echo $netSalary."";}?>"></td>
	 </tr>
	 
      <tr>
	  <td  colspan="2"></td>
	   <td> </td><td> <input type="submit" value="Submit Pay" class="submit"></td>
	 </tr>
     
  
</table></div>

</form>
<?php


			
?>
</div>
<br />
<?php echo $errorAll; ?>
<p>Manage the monthly salary details of your employee along with the allowances, deductions, etc. by just entering their leave</p>
 </div> 
	 <?php include 'includes/footerAll.php';?>  
     
     <script type="text/javascript" src="js/jquery.js"></script>
 	<script type="text/javascript" src="js/jquery-ui.js"></script>
 	<script type="text/javascript" src="js/ui.js"></script>
</body>
</html>
