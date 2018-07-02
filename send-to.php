<?php
include 'core/initForMainLogPage.php';


?>

<?php
 if(logged_in()){
$data=user_dataManager('username');
$usernameData=$data['username'];
$data=user_dataManager('empId');
$empIdMe=$data['empId'];

$dataMe=user_dataAll('name');
$usernameDataMe=$dataMe['name'];
$dataMe=user_dataAll('empId');
$empIdMe=$dataMe['empId'];




    	
		//SELECT empId,name FROM employee WHERE empId='$empIdMe' AND empId='$toUserId' LIMIT 1
		if(isset($_GET['toUserId']) && !empty($_GET['toUserId'])){
			
		 $toUserId=$_GET['toUserId'];

		
		$sql=mysql_query("SELECT empId,name FROM employee WHERE empId='$toUserId' LIMIT 1");
		while($rows=mysql_fetch_array($sql)){
			
			 $toId=$rows['empId'];
				$toUser=$rows['name'];
		}
		}
			
		


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
    <h3>Send Message</h3>
 
    

<?php
$error=array();
	$errorAll='';
	//checking for possible errors
	if(isset($_POST['toUser']) && isset($_POST['title']) && isset($_POST['message']) && isset($_POST['fromUsername']) && isset($_POST['sendDate']) && isset($_POST['empId']) && isset($_POST['sentId'])){
		$empId=$_POST['empId'];
		$sentId=$_POST['sentId'];
		$toUser=mysql_real_escape_string($_POST['toUser']);
		$title=mysql_real_escape_string($_POST['title']);
		$message=mysql_real_escape_string($_POST['message']);
		$fromUsername=$_POST['fromUsername'];
		$sendDate=$_POST['sendDate'];
		

		//checking of id
		 
  
   // $sql="SELECT empId, name FROM employee WHERE empId='$sendTo'";

		if(empty($title) || empty($message)){
			$error[]="Please all fields are required";
		}
		
		  if(!empty($error)){
	  $errorAll= '<div class="error"><ul><li>'.implode('</li><li>',$error).'</li></ul></div>';

		}else{
		//into inbox and outbox
		if(isset($toUserId)==@$toId){
			mysql_query("INSERT INTO inbox VALUES('','$empId','$fromUsername','$title','$message','','$sendDate')");
			
			mysql_query("INSERT INTO outbox VALUES('','$sentId','$fromUsername','$title','$message','$sendDate')");
		echo '<p class="pa">Message sent sucessfully.&nbsp;<a href="outbox.php">View Message</a></p>';
		//echo "<meta http-equiv=\"refresh\" content=\"0;URL=send-message.php\">";
		}
			
		}
	}
	
	?>



<div class="styletable"><table cellpadding="0" cellspacing="0" border="0">
<form action="send-to.php" method="POST">
	<tr><td>Message To:</td><td><input type="text" name="toUser" readonly="readonly" value="<?php if(isset($toUser)){echo $toUser;} ?>"></td></tr>
    <tr><td>Title: </td><td><input type="text" name="title" class="titleWidth"></td></tr>
    <tr><td>Message: </td><td><textarea name="message" rows="8" cols="55"></textarea></td></tr>
           <tr><td></td><td><input type="hidden" name="fromUsername" value="<?php echo $usernameDataMe;?>"></td></tr>
               <tr><td></td><td><input type="hidden" name="empId" value="<?php if(isset($toId)){ echo $toId;}?>"></td></tr>
                <tr><td></td><td><input type="hidden" name="sentId" value="<?php if(isset($empIdMe)){ echo $empIdMe;}?>"></td></tr>
           <tr><td></td><td><input type="hidden" name="sendDate" value="<?php echo date("jS F Y, g:i:s a");?>"></td></tr>
        <tr><td></td><td><input type="submit" value="Send" class="submit"></td></tr>
</form>

</table></div>
<?php  
echo $errorAll;
?>
 </div> 
	 <?php include 'includes/footerAll.php';?>  
</body>
</html>
