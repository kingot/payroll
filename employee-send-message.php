<?php
include 'core/initForMainLogPage.php';


?>

<?php
 if(logged_in()){
$data=user_dataEmp('username');
$usernameData=$data['username'];
/*$data=user_dataManager('empId');
$empIdMe=$data['empId'];*/

$dataMe=user_dataAll('name');
$usernameDataMe=$dataMe['name'];
$dataMe=user_dataAll('empId');
$empIdMe=$dataMe['empId'];


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
    <h3>Select User</h3>
    <?php
	//$query=mysql_query("SELECT empId FROM employee ");
	
	$sql = "SELECT empId,name FROM employee WHERE empId=empId";
			
		$result=mysql_query($sql);
		
		$options="";
		
		while($rows=mysql_fetch_array($result)){
		//echo	$empId=$rows['empId']."<br>";
		$username=$rows['name'];
		 $empId=$rows['empId'];
		 
		 $options.="<option value=\"$empId\">".$username."<option>";
		}	
	?>
   
    
 <div class="styletable"> <table cellpadding="0" cellspacing="0" border="0">
  <form action="employee-send-to.php" method="GET">
  <tr><td>Select User:</td><td><select name="toUserId">
  <option value="0"><?php echo $options; ?></option>
  </select>
  </td></tr>
  <tr><td></td><td><input type="submit" value="Send" class="submit"></td></tr>
  </form>
  </table></div>
  
	
 </div> 
	 <?php include 'includes/footerAll.php';?>  
</body>
</html>
