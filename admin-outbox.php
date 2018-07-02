<?php
include 'core/initForMainLogPage.php';

if(isset($_GET['out']) && !empty($_GET['out'])){
	$id=$_GET['out'];
}

?>

<?php
  if(logged_in()){
$data=user_dataAdmin('username');
$usernameData=$data['username'];
$data=user_dataAdmin('empId');
$empId=$data['empId'];
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
    
    <?php
    $sql = "SELECT outboxId,outbox.username AS username,title,content,sendDate, admin.empId FROM outbox
    	JOIN admin ON admin.empId='".$_SESSION['empId']."' WHERE admin.empId=outbox.empId ORDER BY outboxId DESC LIMIT 1000";
		
		$result=mysql_query($sql);
		$count=mysql_num_rows($result);
		
	
	?>
    
      <?php
	while($rows=mysql_fetch_array($result)){
    ?>
  
 <div class="inbox-outbox"> <table cellpadding="0" cellspacing="0" border="0">
  <form action="" method="post">
    <tr>
   <td width="50" height="21"><input type="checkbox" name="checkbox" value="<?php echo $rows['outboxId']; ?>"></td>
  
    <td width="364" align="left"> <a href="admin-view-outbox.php?out=<?php echo $rows['outboxId'];?>"><b><?php echo $rows['title']?></b></a></td>
      <td width="193" align="left"><?php echo $rows['username'];?></td>
     <td width="141"><?php echo $rows['sendDate'];?></td>
    </tr>
    <?php
  
	}
	
	?>
    <tr><td></td><td></td></tr>
    <tr>
    <td colspan="3" align="left"><?php if ($outboxMessages > 0){ ?><input type="submit"  value="Delete Selected Messages" class="submit-delete-message">
    	<?php }else{ echo 'There are no messages in your inbox';} ?>
    </td>
    </tr>
  
  
     
      <?php
     
	  if(isset($_POST['checkbox'])){
		$id=$_POST['checkbox'];
		
			$sql="DELETE FROM outbox WHERE outboxId='$id'";
			mysql_query($sql);
	}
	?>

	</form>  
   </table>
   </div>
 </div> 
	 <?php include 'includes/footerAll.php';?>  
</body>
</html>
