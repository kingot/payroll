<?php
include 'core/initForMainLogPage.php';
if(isset($_GET['in']) && !empty($_GET['in'])){
	$id=$_GET['in'];
}

?>

<?php
 if(logged_in()){
$data=user_dataEmp('username');
$usernameData=$data['username'];
$data=user_dataEmp('empId');
$empId=$data['empId'];
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
	<h3>Read Your Inbox Messages</h3>
    
    <?php
	
	
    $sql = "SELECT inboxId,inbox.username AS username,title,content,viewed,recievedDate, emplog.empId FROM inbox
    	JOIN emplog ON emplog.empId='".$_SESSION['empId']."' WHERE emplog.empId=inbox.empId ORDER BY inboxId DESC LIMIT 1000";
		
		
		$result=mysql_query($sql);
		$count=mysql_num_rows($result);
		
	
	?>
    
      <?php
	while($rows=mysql_fetch_array($result)){
    ?>
    <?php if($rows['viewed']==0){ //display messages in bold?>
 <div class="inbox-outbox"> <table cellpadding="0" cellspacing="0" border="0">
  <form action="" method="post">
    <tr>
   <td width="50" height="21"><input type="checkbox" name="checkbox" value="<?php echo $rows['inboxId']; ?>"></td>
  
    <td width="364" align="left"><a href="employee-view-inbox.php?in=<?php echo $rows['inboxId'];?>"><b><?php echo $rows['title']?></b></a></td>
      <td width="193" align="left"><?php echo $rows['username'];?></td>
     <td width="141"><?php echo $rows['recievedDate'];?></td>
    </tr>
    <?php
	}else if($rows['viewed']==1){
		?>
  
        <tr>
   <td><input type="checkbox" name="checkbox" value="<?php echo $rows['inboxId']; ?>"></td>
    <td><a href="employee-view-inbox.php?in=<?php echo $rows['inboxId'];?>"><?php echo $rows['title']?></a></td>
     <td><?php echo $rows['username'];?></td>
       <td><?php echo $rows['recievedDate'];?></td>
    </tr>
    <tr><td></td><td></td></tr>
    <?php
	}
	}
	?>
    <tr>
    <td colspan="3" align="left"><?php if ($inboxMessagesTotal > 0){ ?><input type="submit"  value="Delete Selected Messages" class="submit-delete-message">
    	<?php }else{ echo 'There are no messages in your inbox';} ?>
    </td>
    </tr>
  
  
     
      <?php
    if(isset($_POST['checkbox'])){
		$id=$_POST['checkbox'];
		
			$sql="DELETE FROM inbox WHERE inboxId='$id'";
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
