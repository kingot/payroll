<?php
include 'core/initForMainLogPage.php';
?>

<?php
 if(logged_in()){
$data=user_dataEmp('username');
$usernameData=$data['username'];
$data=user_dataEmp('empId');
$empId=$data['empId'];
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
    <h3>My Salary Report</h3>
  	
     <p style="padding:0 15px 5px 0; margin:0; text-align:right;">
      <a href="employee-salary-report-print.php" target="_blank"><img src="images/print1.jpeg" width="17" height="17" alt="Print"></a></p>
     <?php  
	
	 
	 
		
			//querying employee data into table
	$query=mysql_query("SELECT payrollId,payroll.empId,name,date,deduction,
						allowance,bonus,netSalary 
						FROM payroll JOIN emplog ON emplog.empId='".$_SESSION['empId']."' WHERE  payroll.empId=emplog.empId ");
	
	echo "<div class=styletable id=div2><table cellpadding=1 cellspacing=1 border=0
			<tr>
			<th>Payslip Id</th>
			<th>Emp. Name</th>
			<th>Date</th>
			<th>Bonus</th>
			<th>Allowance</th>
			<th>Deductions(SSNIT,Loans,Union)</th>
			<th>Net Salary</th>
			
	</tr>
	";
	
	while($row=mysql_fetch_array($query)){
		echo "<tr>";
		echo "<td>". $row['payrollId']."</td>"; 
		echo "<td>". $row['name']."</td>"; 
		echo "<td>". $row['date']."</td>"; 
		echo "<td>". $row['bonus']."</td>"; 
		echo "<td>". $row['allowance']."</td>"; 
		echo "<td>". $row['deduction']."</td>"; 
		echo "<td>". $row['netSalary']."</td>"; 
		
		
	}
	
	echo "</table></div>";
	?>
 <p>All your salary details can be found here and you can print it.</p>
 </div> 
	 <?php include 'includes/footerAll.php';?>  
</body>
</html>
