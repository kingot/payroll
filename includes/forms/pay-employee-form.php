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

	<?php


//admin login code
$error=array();
$errorAll='';
 
if(isset($_POST['month']) && isset($_POST['leave'])){
		 $month=htmlentities(mysql_real_escape_string($_POST['month']));
		 $leave=htmlentities(mysql_real_escape_string($_POST['leave']));

 
	   //checking for the validity of data entered
	   if(empty($name) || empty($phone)){
		   $error[]='All fields are required.';
	   }else{
		
	   }
	   
	    if(!empty($error)){
	  $errorAll= '<div class="error"><ul><li>'.implode('</li><li>',$error).'</li></ul></div>';

		}else{
			
		}

 }//end isset
 

?>



<h2 class="formHead">Pay Employee</h2>
<div class="tableWrap">
<form action="" method="post">
  <table cellpadding="0" cellspacing="0">
     <tr><td>Employee:</td><td></td></tr>
   <tr><td> Month:</td><td>
   			<select name="month">
             <option value="1">January</option>
              <option value="2">February</option>
              <option value="3">March</option>
               <option value="4">April</option>
               <option value="5">May</option>
               <option value="6">June</option>
                <option value="7">July</option>
                 <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            
            </select>
            
           <!-- <select>
            <option value="1">2010</option>
            <option value="2">2011</option>
            <option value="3">2012</option>  
            <option value="4">2013</option>
            <option value="5">2014</option>
            <option value="6">2015</option>
            <option value="7">2016</option>
            <option value="8">2017</option>
            <option value="9">2018</option>
            </select>-->
   </td></tr>
   <tr><td>Basic Salary: </td><td></td></tr>
   <tr><td>No. Of Leaves: </td><td><input type="text" name="leave" class="input" value=""></td></tr>
   <tr><td>Salary Per Day:</td><td></td></tr>
    <tr><td>Deduction For Leaves:</td><td></td></tr>
     <tr><td>Net Salary:</td><td></td></tr>
   <tr><td> </td><td><input type="submit" value="Submit Pay" class="submit"></td></tr>
</table>
</form>
</div>
<br />
<?php echo $errorAll; ?>

 </div> 
	 <?php include 'includes/footerAll.php';?>  
</body>
</html>
