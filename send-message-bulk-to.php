<?php
include 'core/initForMainLogPage.php';

if(isset($_GET['empId']) && !empty($_GET['empId'])){
    
    //delete employee here
    $empId=$_GET['empId'];
   grabEmpId($empId);
  }
?>

<?php
 if(logged_in()){
$data=user_dataManager('username');
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
 <?php include 'includes/managerMenu.php';?>  
  </header>
  <div class="container">
	<br/>
    <h3>Send Message</h3>
    <?php
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
   
    
    <?php  
	$error=array();
	$errorAll='';
	//checking for possible errors
	if(isset($_POST['sendTo']) && isset($_POST['title']) && isset($_POST['message']) && isset($_POST['fromUsername']) && isset($_POST['sendDate']) && isset($_POST['empId'])){
		$empId=$_POST['empId'];
		$sendTo=mysql_real_escape_string($_POST['sendTo']);
		$title=mysql_real_escape_string($_POST['title']);
		$message=mysql_real_escape_string($_POST['message']);
		$fromUsername=$_POST['fromUsername'];
		$sendDate=$_POST['sendDate'];
		

		//checking of id
		 
  
   // $sql="SELECT empId, name FROM employee WHERE empId='$sendTo'";

		if(empty($sendTo) || empty($title) || empty($message)){
			$error[]="Please all fields are required";
		}
		
		  if(!empty($error)){
	  $errorAll= '<div class="error"><ul><li>'.implode('</li><li>',$error).'</li></ul></div>';

		}else{
		//into inbox and outbox
		if($empIdMe==true){
			mysql_query("INSERT INTO outbox VALUES('','$empId','$fromUsername','$title','$message','$sendDate')");
			//echo '<p class="pa">Message sent sucessfully.</p>';
		}else{
			mysql_query("INSERT INTO inbox VALUES('','$empId','$fromUsername','$title','$message','','$sendDate')");
		//echo '<p class="pa">Message sent sucessfully.</p>';
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=send-message.php\">";
		}
			
		}
	}
	
	?>
   <!-- sending message to the user-->
   <div class="styletable"><table cellpadding="0" cellspacing="0">
   <form action="send-message.php" method="post">
   		<tr><td>Send To: </td>
        <td><select name="sendTo"><option value="0"><?php echo $options; ?></option></select></td>
        </tr>
        <tr><td>Title: </td><td><input type="text" name="title" class="titleWidth"></td></tr>
         <tr><td>Message: </td><td><textarea name="message" rows="7" cols="45"></textarea></td></tr>
           <tr><td></td><td><input type="text" name="fromUsername" value="<?php echo $usernameDataMe;?>"></td></tr>
               <tr><td></td><td><input type="text" name="empId" value="<?php echo $empIdMe;?>"></td></tr>
           <tr><td></td><td><input type="hidden" name="sendDate" value="<?php echo date("jS F Y, g:i:s a");?>"></td></tr>
        <tr><td colspan="2"><input type="submit" value="Send" class="submit"></td></tr>
   </form>
   </table></div>
    <?php echo $errorAll; ?>
    
 </div> 
	 <?php include 'includes/footerAll.php';?>  
</body>
</html>
>