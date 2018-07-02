 <nav class="cf">
<ul class="topmenu">	
	<li><a href="employeeprofile.php" title="Home Page">Home</a></li>
    <li><a href="employee-salary-report.php" title="Report"> My Salary Report</a>
    <!--<ul class="submenu">
        	 <li><a href="#" title="Holiday Report">Holiday Report</a></li>
    		<li><a href="#" title="Attendance Report">Attendance Report</a></li>
            <li><a href="#" title="Salary Report">Salary Report</a></li>
        </ul>-->
    </li>
     <li><a href="employee-inbox.php" title="Inbox" class="cl">
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Inbox <?php if($inboxMessageNew >0){
			echo "<b>(".$inboxMessageNew.")</b>"; 
		}else{
			echo "<b>(".$inboxMessagesTotal.")</b>";
		}
		 ?></a>
         
         <ul class="submenu">
        	 <li><a href="employee-outbox.php" title="outbox">Outbox <?php  echo "<b>(".$outboxMessages.")";?>
             &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
             </a></li>
    		<li><a href="employee-send-message.php" title="Compose">Compose</a></li>
             <li><a href="logout.php" title="Logout">Logout</a></li>
        </ul>
    </li>
    
</ul>
<!--<div class="clear"></div>-->
  </nav>