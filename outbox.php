<?php
include 'core/initForMainLogPage.php';

if(isset($_GET['out']) && !empty($_GET['out'])){
	$id=$_GET['out'];
}
?>

<?php
  if(logged_in()){
$data=user_dataManager('username');
$usernameData=$data['username'];
$data=user_dataManager('empId');
$empId=$data['empId'];
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
	<h3>Read Your sent Messages</h3>
    
    <?php
    $sql = "SELECT outboxId,outbox.username AS username,title,content,sendDate, managerlog.empId FROM outbox
    	JOIN managerlog ON managerlog.empId='".$_SESSION['empId']."' WHERE managerlog.empId=outbox.empId ORDER BY outboxId DESC LIMIT 1000";
		
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
  
    <td width="364" align="left"> <a href="view-outbox.php?out=<?php echo $rows['outboxId'];?>"><b><?php echo $rows['title']?></b></a></td>
      <td width="193" align="left"><?php echo $rows['username'];?></td>
     <td width="141"><?php echo $rows['sendDate'];?></td>
    </tr>
    <?php
  
	}
	
	?>
    <tr><td></td><td></td></tr>
    <tr>
    <td colspan="3" align="left"><?php if ($outboxMessages > 0){ ?><input type="submit" name="delete" value="Delete Selected Messages" class="submit-delete-message">
    	<?php }else{ echo 'There are no messages in your inbox';} ?>
    </td>
    </tr>
  
  
     
      <?php
	  
	  
	  if(isset($_POST['checkbox'])){
		$id=$_POST['checkbox'];
		
			$sql="DELETE FROM outbox WHERE outboxId='$id'";
			mysql_query($sql);
	}
    /* if(isset($_POST['checkbox']) && isset($_POST['delete'])){
		$checkbox=$_POST['checkbox'];
		$delete=$_POST['delete'];
		
		if($delete){
			for($i=0;$i<$count;$i++){
				@$del_id=$checkbox[$i];
				
				$sql="DELETE FROM outbox WHERE outboxId='$del_id'";
				$result=mysql_query($sql);
				
				if($result){
					echo "<meta http-equiv=\"refresh\" content=\"0;URL=outbox.php\">";
				}
			}
		}
	}*/
	?>

	</form>  
   </table>
   </div>
 </div> 
	 <?php include 'includes/footerAll.php';?>  
</body>
</html>
