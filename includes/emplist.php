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

	<?php echo '<a href="manage-employee.php?action=delete&empId='.$row['empId'].'">Delete</a>';?> 
        <?php
		"</td>"; 
		echo "</tr>";
	}
	echo "</table></div>";
	?>