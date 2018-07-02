<?php
include 'core/initForMainLogPage.php';

if(isset($_GET['in']) && !empty($_GET['in'])){
	$page=$_GET['in'];
}
?>

<?php
 if(logged_in()){
$data=user_dataEmp('username');
$usernameData=$data['username'];


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
	<h3>Read Inbox Messages</h3>
 <br/>
 	<h3 class="back"><a href="employee-inbox.php">Back</a></h3>
	<?php 
	$sql="SELECT * FROM inbox WHERE inboxId=$page";
	
	$query=mysql_query($sql);
	
	while($rows=mysql_fetch_array($query)){
		$inboxId=$rows['inboxId'];
		$empId=$rows['empId'];
		$username=$rows['username'];
		$title=$rows['title'];
		$content=$rows['content'];
		$viewed=$rows['viewed'];
		$recievedDate=$rows['recievedDate'];
	}
	//removing the bold from the message
	//mysql_query("UPDATE inbox SET viewed='1' WHERE empId='empId'");
	?>
    
    <div class="inbox-outbox"><table cellpadding="1" cellspacing="1" border="0">
    <tr><td>Message Subject: </td><td><?php if(isset($title)){echo $title;}?></td></tr>
    <tr><td>Message From: </td><td><?php  if(isset($username)){echo $username;}?></td></tr>
    <tr><td>Date Recieved: </td><td><?php  if(isset($recievedDate)){echo $recievedDate;}?></td></tr>
    <tr><td>Message Content: </td><td><?php  if(isset($content)){echo $content;}?></td></tr>
    </table></div>
 </div> 
	 <?php include 'includes/footerAll.php';?>  
</body>
</html>
