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
    <h3>Manage Company</h3>
    <div class="addemployee"> <a href="companysetting.php" title="Edit setting">Edit Setting</a></div>
     <?php  
		
			//querying employee data into table
	$query=mysql_query("SELECT compId,compName,address,registrationNo,numberOfEmp,levelOne,levelTwo,levelThree,levelFour,levelFive,
						oneS,oneL,twoS,twoL,threeS,threeL,fourS,fourL,fiveS,fiveL FROM company ORDER BY compId ASC LIMIT 30");
	
	echo "<div class=styletable><table cellpadding=1 cellspacing=1 border=0
			<tr>
			<th>Company Setting</th>
			<th></th>
			
	</tr>
	";
	
	while($row=mysql_fetch_array($query)){
	
		echo "<tr><td>Company Name</td><td>". $row['compName']."</td></tr>"; 
		echo "<tr><td>Company Address</td><td>". $row['address']."</td></tr>";
		echo "<tr><td>Registration No</td><td>". $row['registrationNo']."</td></tr>";
		echo "<tr><td>Number Of Employee</td><td>". $row['numberOfEmp']."</td></tr>";
		echo "<tr>
		
		<td>Level One Salary Per Day </td><td>". $row['levelOne']."</td>
		<td>SNNIT</td><td>". $row['oneS']."</td>
		<td>Loan</td><td>". $row['oneL']."</td>
		</tr>";
		echo "<tr>
		<td>Level Two Salary Per Day</td><td>". $row['levelTwo']."</td>
		<td>SNNIT</td><td>". $row['twoS']."</td>
		<td>Loan</td><td>". $row['twoL']."</td>
		</tr>";
		echo "<tr>
		<td>Level Three Salary Per Day</td><td>". $row['levelThree']."</td>
		<td>SNNIT</td><td>". $row['threeS']."</td>
		<td>Loan</td><td>". $row['threeL']."</td>
		</tr>";
		echo "<tr>
		<td>Level Four Salary Per Day</td><td>". $row['levelFour']."</td>
		<td>SNNIT</td><td>". $row['fourS']."</td>
		<td>Loan</td><td>". $row['fourL']."</td>
		</tr>";
		echo "<tr>
		<td>Level Five Salary Per Day</td><td>". $row['levelFive']."</td>
		<td>SNNIT</td><td>". $row['fiveS']."</td>
		<td>Loan</td><td>". $row['fiveL']."</td>
		</tr>";
	
	}
	echo "</table></div>";
	?>
    <p>Manage all the primary details of your company like company name,number of employees levels for payment, etc effectively in this page. You can update or edit details anytime.</p>
 </div> 
	 <?php include 'includes/footerAll.php';?>  
</body>
</html>
