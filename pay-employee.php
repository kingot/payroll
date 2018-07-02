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
    <h3>Click Payment to Pay Employee</h3>
     <?php  
		
			//querying employee data into table
	$query=mysql_query("SELECT empId,name,phone,email,level,designation FROM employee ORDER BY empId ASC LIMIT 30");
	
	echo "<div class=styletable><table cellpadding=1 cellspacing=1 border=0
			<tr>
			<th>Employee ID</th>
			<th>Name</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Designation</th>
			<th>Level</th>
			<th>Payment</th>
			
	</tr>
	";
	
	while($row=mysql_fetch_array($query)){
		echo "<tr>";
		echo "<td>". $row['empId']."</td>"; 
		echo "<td>". $row['name']."</td>"; 
		echo "<td>". $row['phone']."</td>"; 
		echo "<td>". $row['email']."</td>"; 
		echo "<td>". $row['designation']."</td>"; 
		echo "<td>". $row['level']."</td>"; 
		echo "<td>"
		
		?>
       <?php echo '<a href="pay-employee-each.php?empId='.$row['empId'].'">Payment</a>';?>
        <?php
		"</td>";
		echo "</tr>";
	}
	echo "</table></div>";
	?>
<p>Pay your employees by just clicking the payment and follow the link to pay an employee.</p>
 </div> 
	 <?php include 'includes/footerAll.php';?>  
</body>
</html>
