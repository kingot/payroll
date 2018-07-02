<?php
include 'core/initForMainLogPage.php';


if(isset($_GET['empId']) && !empty($_GET['empId'])){
    
    //delete employee here
    $empId=$_GET['empId'];
   grabEmpId($empId);
  }
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
  <h3>Pay Employee</h3>
  <p style="font-size:14px"><b>Please enter the details to continue</b></p>
<?php
 //printf('<pre>%s</pre>', print_r($_POST, 1)); 
$error=array();
$errorAll='';
$leave="";
if(isset($_POST['empId']) && isset($_POST['name']) && isset($_POST['loan'])
		&& isset($_POST['absent']) && isset($_POST['salaryPerDay']) && isset($_POST['union']) 
		&& isset($_POST['allowa']) && isset($_POST['bonus']) && isset($_POST['transport']) && isset($_POST['safety']) && isset($_POST['lunch'])){
		 $empId=$_POST['empId'];
		 $name=htmlentities(mysql_real_escape_string($_POST['name']));
		 $loan=htmlentities(mysql_real_escape_string($_POST['loan']));
		// $ssnit=htmlentities(mysql_real_escape_string($_POST['ssnit']));
		 $absent=htmlentities(mysql_real_escape_string($_POST['absent']));
		 $salaryPerDay=htmlentities(mysql_real_escape_string($_POST['salaryPerDay']));
		 $union=htmlentities(mysql_real_escape_string($_POST['union']));
		 $allowa=htmlentities(mysql_real_escape_string($_POST['allowa']));
		  $bonus=htmlentities(mysql_real_escape_string($_POST['bonus']));
		  
		  $transport=$_POST['transport'];
		  $safety=$_POST['safety'];
		  $lunch=$_POST['lunch'];
		
		/*$transportAllowa=30;
		$safetyAllowa=20;
		$lunchAllowa=10;
 		*/
	   //checking for the validity of data entered
	   if(empty($allowa)){
		   $error[]='Pleave fill the allowances section.';
	   }else{
		
		if(preg_match('/[0-9]/',$leave)==false){
   		$error[]='Absent should only contain numbers'; 
		}
	   }
	   
	    if(!empty($error)){
	  $errorAll= '<div class="error"><ul><li>'.implode('</li><li>',$error).'</li></ul></div>';

		}

 }//end isset
 

?>

<div class="tableWrap">
<form action="pay-employee-each-confirm.php" method="get">
  <div class="styletable">
  <table cellpadding="" cellspacing="" border="0">
  <tr>
  <thead>
  <th colspan="2"> Deductions Details</th>
  <th colspan="2">Salary Details</th>
  </thead>
  </tr>
  <?php
		$query=mysql_query("SELECT 
							empId,name,level,company.compId,company.levelOne,company.levelTwo,
							company.levelThree,company.levelFour,company.levelFive,company.oneS,company.oneL,company.twoS,company.twoL,company.threeS,
							company.threeL,company.fourS,company.fourL,company.fiveS,company.fiveL
							 FROM employee JOIN company ON company.compId=1 WHERE empId='$empId' LIMIT 1");
		
		
		/*$queryComp=mysql_query("SELECT compId,levelOne,levelTwo,levelThree,levelFour,levelFive FROM compay WHERE compId=1 LIMIT 1")*/
			//$levelPay="";
			
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
			/*$basicSalary=$levelPay * 30;
			$leaveDeduct=$leave * $levelPay;
			$netSalary=$basicSalary - $leaveDeduct;*/
			
	?>
     <tr>
	 <td>Loan: </td><td><input type="text" name="loan" value="<?php echo $loan; ?>"></td>
	 <td>Employee ID: </td><td><input type="text" name="empId" readonly value="<?php if(isset($empId)){echo $empId;}?>"></td>
	 </tr>
	 
     <tr>
	<td  colspan="2"></td>
	 <td>Employee Name: </td><td><input type="text" name="name" readonly value="<?php if(isset($name)){ echo $name;}?>"></td>
	 </tr>
	 
  
   <tr>
   <td> Absent: </td><td><input type="text" name="absent"  value=""></td>
    <td> Salary Per Day:</td><td><input type="text" name="salaryPerDay" readonly value="<?php echo $levelPay.".00";?>"></td>
   </tr>

	<tr>
	<td> Local Union: </td><td><input type="text" name="union" class="input" value=""></td>
	<td> Allowances</td><td>
    Transport: <input type="checkbox" name="transport" class="input" value="30"><br/>
    Safety: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="safety" class="input" value="20"><br/>
    Lunch:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="lunch" class="input" value="10">
    
    </td>
	</tr>
   
   <tr>
   <td  colspan="2"></td>
      <td> Bonus:</td><td><input type="text" name="bonus"  value=""></td>
   </tr>
   
    <tr>
	<!--<td colspan="2"> </td>-->
	<!--<td> Gross Salary:</td><td><input type="text" name="gross" readonly value=""></td>-->
	</tr>
	
     <tr>
	 <!--<td colspan="2"> </td>-->
<!--	  <td> Net Salary:</td><td><input type="text" name="netSalary" readonly value="<?php //if(isset($netSalary)){echo $netSalary.".00";}?>"></td>-->
	 </tr>
	 
      <tr>
	  <td  colspan="2"></td>
	   <td> </td><td> <input type="submit" value="Next" class="submit"></td>
	 </tr>
     
  
</table></div>

</form>
<?php } ?>
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
