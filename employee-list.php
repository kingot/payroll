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
    <h3>Employee List</h3>
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
		
		echo "</tr>";
	}
	echo "</table></div>";
	?>
	<p>List of employees created by the administrator.</p>
 </div> 
	 <?php include 'includes/footerAll.php';?>  
</body>
</html>
