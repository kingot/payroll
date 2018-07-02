
 <nav class="cf">
<ul class="topmenu">	
	<li><a href="managerprofile.php" title="Home Page">Home</a></li>
     <li><a href="manage-company.php" title="Manage Company">Manage Company</a></li>
    <li><a href="employee-list.php" title="Employee list">Employee List</a></li>
    <li><a href="#" title="Report">Payment & Payslip</a>
    <ul class="submenu">
        	 <li><a href="pay-employee.php" title="Pay Employee">Pay Employee</a></li>
    		<li><a href="employees-salary-report.php" title="Employee List Report">Employees Salary Report </a></li>
           
        </ul>
    </li>
      
    <li><a href="inbox.php" title="Inbox" class="cl">
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Inbox <?php if($inboxMessageNew >0){
			echo "<b>(".$inboxMessageNew.")</b>"; 
		}else{
			echo "<b>(".$inboxMessagesTotal.")</b>";
		}
		 ?></a>
         
         <ul class="submenu">
        	 <li><a href="outbox.php" title="outbox">Outbox <?php  echo "<b>(".$outboxMessages.")</b>";?>
             &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
             </a></li>
    		<li><a href="send-message.php" title="Compose">Compose</a></li>
             <li><a href="logout.php" title="Logout">Logout</a></li>
        </ul>
    </li>
</ul>
<!--<div class="clear"></div>-->
  </nav>