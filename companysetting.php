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
  <br/>
    <h3>Edit Company Settings</h3>
	<?php
	$info=compData();

//admin login code
$error=array();
$errorAll='';
 
if(isset($_POST['compName']) && isset($_POST['compAddress']) && isset($_POST['compReg'])&& isset($_POST['compNumbEmp'])
			&& isset($_POST['levelOne'])&& isset($_POST['levelTwo'])&& isset($_POST['levelThree'])&& isset($_POST['levelFour'])
			&& isset($_POST['levelFive']) && isset($_POST['OneS']) && isset($_POST['OneL']) && isset($_POST['TwoS']) && isset($_POST['TwoL']) 
			&& isset($_POST['ThreeS']) && isset($_POST['ThreeL']) && isset($_POST['FourS']) && isset($_POST['FourL']) && isset($_POST['FiveS'])
			&& isset($_POST['FiveL'])
			){
		 $compName=htmlentities(mysql_real_escape_string($_POST['compName']));
		 $compAddress=htmlentities(mysql_real_escape_string($_POST['compAddress']));
		 $compReg=htmlentities(mysql_real_escape_string($_POST['compReg']));
	   	 $compNumbEmp=htmlentities(mysql_real_escape_string($_POST['compNumbEmp']));
		$levelOne=htmlentities(mysql_real_escape_string($_POST['levelOne']));
		$levelTwo=htmlentities(mysql_real_escape_string($_POST['levelTwo']));
		$levelThree=htmlentities(mysql_real_escape_string($_POST['levelThree']));
		$levelFour=htmlentities(mysql_real_escape_string($_POST['levelFour']));
		$levelFive=htmlentities(mysql_real_escape_string($_POST['levelFive']));
		
		$OneS=htmlentities(mysql_real_escape_string($_POST['OneS']));
		$OneL=htmlentities(mysql_real_escape_string($_POST['OneL']));

		$TwoS=htmlentities(mysql_real_escape_string($_POST['TwoS']));
		$TwoL=htmlentities(mysql_real_escape_string($_POST['TwoL']));
		
		$ThreeS=htmlentities(mysql_real_escape_string($_POST['ThreeS']));
		$ThreeL=htmlentities(mysql_real_escape_string($_POST['ThreeL']));
		
		$FourS=htmlentities(mysql_real_escape_string($_POST['FourS']));
		$FourL=htmlentities(mysql_real_escape_string($_POST['FourL']));
		
		$FiveS=htmlentities(mysql_real_escape_string($_POST['FiveS']));
		$FiveL=htmlentities(mysql_real_escape_string($_POST['FiveL']));
 //|| empty($OneS) || empty($OneL)
	   		//|| empty($TwoS) || empty($TwoL) || empty($ThreeS) || empty($ThreeL)  || empty($FourS) || empty($FourL) || empty($FiveS) || empty($FiveL)
	   //checking for the validity of data entered
	   if(empty($compName) || empty($compAddress) || empty($compReg)|| empty($compNumbEmp) 
	   ){
		   $error[]='All fields are required.';
	   }else{
	   
	   if(preg_match('/^[^\_\.\-\+\=]+[a-zA-Z]+$/',$compName)==false){
   		$error[]='Company name must contain only letters '; 
		}
		
		  if(preg_match('/^[^\_\.\-\+\=]+[a-zA-Z0-9]+$/',$compAddress)==false){
   		$error[]='Company address must not contain symbols '; 
		}
		
		  if(preg_match('/^[^\_\.\-\+\=]+[a-zA-Z0-9]+$/',$compReg)==false){
   		$error[]='Company registration must not contain symbols '; 
		}
		
		  if(preg_match('/[0-9]/',$compNumbEmp)==false){
   		$error[]='Company number of employees must  contain only numbers ';
		}
		  if(preg_match('/[0-9]/',$levelOne)==false){
   		$error[]='Level One per day salary should only be numbers '; 
		}
		
		 if(preg_match('/[0-9]/',$levelTwo)==false){
   		$error[]='Level two per day salary should only be numbers '; 
		}
		
		 if(preg_match('/[0-9]/',$levelThree)==false){
   		$error[]='Level three per day salary should only be numbers '; 
		}
		
		 if(preg_match('/[0-9]/',$levelFour)==false){
   		$error[]='Level four per day salary should only be numbers '; 
		}
		
		 if(preg_match('/[0-9]/',$levelFive)==false){
   		$error[]='Level five per day salary should only be numbers '; 
		}
	   
	   }
	    if(!empty($error)){
	  $errorAll= '<div class="error"><ul><li>'.implode('</li><li>',$error).'</li></ul></div>';

		}else{
			updateCompanyInfo($compName,$compAddress,$compReg,$compNumbEmp,$levelOne,$levelTwo,$levelThree,$levelFour,$levelFive,
							$OneS,$OneL,$TwoS,$TwoL,$ThreeS,$ThreeL,$FourS,$FourL,$FiveS,$FiveL);
			echo '<p class="pa">Update is  successfully saved.&nbsp;&nbsp;<a href="manage-company.php">See Changes</a></p>';
		}

 }//end isset
 

?>




<div class="tableWrap">
<form action="" method="post">
  <table cellpadding="0" cellspacing="0">
   <tr>
   <td>Company Name: </td><td><input type="text" name="compName" class="input" value="<?php echo @$info['compName']; ?>"></td>
   
   </tr>
   <tr><td>Address: </td><td><input type="text" name="compAddress" class="input" value="<?php echo @$info['address']; ?>"></td></tr>
   <tr><td>Registration No: </td><td><input type="text" name="compReg" class="input" value="<?php echo @$info['registrationNo']; ?>"></td></tr>
     <tr><td>Number Of Emp: </td><td><input type="text" name="compNumbEmp" class="input" value="<?php echo @$info['numberOfEmp']; ?>"></td></tr>
     
     <tr>
   <td colspan="6" style="color:#4EB4CD; font-weight:bold"> Enter level payment per day, SSNIT deduction per month and Loan Deduction per month.</td>
   </tr>
   <tr>
   <td>Level One Per Day: </td><td><input type="text" name="levelOne" class="level" value="<?php echo @$info['levelOne']; ?>"></td>
   <td>SNNIT: </td><td><input type="text" name="OneS" class="level" value="<?php echo @$info['oneS']; ?>"></td>
   <td>Loan: </td><td><input type="text" name="OneL" class="level" value="<?php echo @$info['oneL']; ?>"></td>
   </tr>
   <tr>
   <td>Level Two Per Day: </td><td><input type="text" name="levelTwo" class="level" value="<?php echo @$info['levelTwo']; ?>"></td>
   <td>SNNIT: </td><td><input type="text" name="TwoS" class="level" value="<?php echo @$info['twoS']; ?>"></td>
   <td>Loan: </td><td><input type="text" name="TwoL" class="level" value="<?php echo @$info['twoL']; ?>"></td>
   </tr>
   <tr>
   <td>Level Three Per Day: </td><td><input type="text" name="levelThree" class="level" value="<?php echo @$info['levelThree']; ?>"></td>
   <td>SNNIT: </td><td><input type="text" name="ThreeS" class="level" value="<?php echo @$info['threeS']; ?>"></td>
   <td>Loan: </td><td><input type="text" name="ThreeL" class="level" value="<?php echo @$info['threeL']; ?>"></td>
   </tr>
   <tr>
   <td>Level Four Per Day: </td><td><input type="text" name="levelFour" class="level" value="<?php echo @$info['levelFour']; ?>"></td>
    <td>SNNIT: </td><td><input type="text" name="FourS" class="level" value="<?php echo @$info['fourS']; ?>"></td>
   <td>Loan: </td><td><input type="text" name="FourL" class="level" value="<?php echo @$info['fourL']; ?>"></td>
   </tr>
   <tr>
   <td>Level Five Per Day: </td><td><input type="text" name="levelFive" class="level" value="<?php echo @$info['levelFive']; ?>"></td>
    <td>SNNIT: </td><td><input type="text" name="FiveS" class="level" value="<?php echo @$info['fiveS']; ?>"></td>
   <td>Loan: </td><td><input type="text" name="FiveL" class="level" value="<?php echo @$info['fiveL']; ?>"></td>
   </tr>
 
   <tr><td> </td><td><input type="submit" value="Saved" class="submit"></td></tr>
</table>
</form>
</div>
<br />
<?php echo $errorAll; ?>


 </div> 
	 <?php include 'includes/footerAll.php';?>  
</body>
</html>



