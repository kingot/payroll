<?php
include 'core/initForMainLogPage.php';
?>

<?php
if(isset($_GET['empId']) && !empty($_GET['empId'])){
    
    //delete employee here
    $empId=$_GET['empId'];
    deleteEmp($empId);
	
  }

/*if(isset($_GET['empId']) && !empty($_GET['empId'])){
    
    //delete employee here
    $empId=$_GET['empId'];
    grabEmpId($empId);
  }*/
  
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
    <h3>Manage Employee</h3>
   <div class="addemployee"> <a href="employeesetting.php" title="Add Employee"">Add Employee</a></div>
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
			<th>Edit</th>
			<th>Generate Pssword</th>
			<th></th>
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
	
		echo "<td>";
		?>

	<?php echo '<a href="edit-employee.php?edit=edit&empId='.$row['empId'].'">Edit</a>';?> 
        <?php
		"</td>";
		
	
		echo "<td>";
		?>

	<?php echo '<div class="generate"><a href="generate-password.php?edit=edit&empId='.$row['empId'].'">Generate Password</a></div>';?> 
        <?php
		"</td>";

		echo "<td>";
		?>

	<?php echo '<a href="manage-employee.php?action=delete&empId='.$row['empId'].'">Delete</a>';?> 
        <?php
		"</td>";
	
		echo "</tr>";
	}
	echo "</table></div>";
	?>
    <p>Add employees and maintain their details in this page. You can provide the primary, contact, identification, and relieving details of every employee and manage the same here. You can also create login for employees through which they can view their salary details</p>
 </div> 
	 <?php include 'includes/footerAll.php';?>  
</body>
</html>



