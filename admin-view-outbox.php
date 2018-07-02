<?php
include 'core/initForMainLogPage.php';

if(isset($_GET['out']) && !empty($_GET['out'])){
	$page=$_GET['out'];
}
?>

<?php
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
  <br/>
	<h3>Read Your Sent Messages</h3>
 <br/>
 	<h3 class="back"><a href="admin-outbox.php">Back</a></h3>
	<?php 
	$sql="SELECT * FROM outbox WHERE outboxId=$page";
	
	$query=mysql_query($sql);
	
	while($rows=mysql_fetch_array($query)){
		$inboxId=$rows['outboxId'];
		$empId=$rows['empId'];
		$username=$rows['username'];
		$title=$rows['title'];
		$content=$rows['content'];
		$recievedDate=$rows['sendDate'];
	}
	
	?>
    
   <div class="inbox-outbox"> <table cellpadding="1" cellspacing="1" border="0">
    <tr><td>Message Subject: </td><td><?php if(isset($title)){echo $title;}?></td></tr>
    <tr><td>Message To: </td><td><?php  if(isset($username)){echo $username;}?></td></tr>
    <tr><td>Date Sent: </td><td><?php  if(isset($recievedDate)){echo $recievedDate;}?></td></tr>
    <tr><td>Message Content: </td><td><?php  if(isset($content)){echo $content;}?></td></tr>
    </table></div>
 </div> 
	 <?php include 'includes/footerAll.php';?>  
</body>
</html>
