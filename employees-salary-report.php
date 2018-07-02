<?php
include 'core/initForMainLogPage.php';

if(isset($_GET['empId']) && !empty($_GET['empId'])){
    
    //delete employee here
    $empId=$_GET['empId'];
    grabEmp($empId);
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
    
    <h3>Employees Salary Report</h3>
    <p style="padding:0 15px 5px 0; margin:0; text-align:right;">
      <a href="generate-employees-salary-report-print.php" target="_blank"><img src="images/print1.jpeg" width="17" height="17" alt="Print"></a></p>
    
     <?php 
			//querying employee data into table
	$query=mysql_query("SELECT payrollId,employee.empId,payroll.name AS name,date,deduction,
						allowance,bonus,netSalary 
						FROM payroll JOIN employee ON employee.empId=payroll.empId
						WHERE employee.empId=payroll.empId ORDER BY payrollId ASC LIMIT 1000");
	
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
	<p>The details of payment made to employees can be printed from this pay</p>
 </div> 
	 <?php include 'includes/footerAll.php';?>  
</body>
</html>
