 <nav class="cf">
<ul class="topmenu">	
	<li><a href="adminprofile.php" title="Home Page">Home</a></li>

    <li><a href="#" title="Employee Settings">Employee Settings</a>
    	<ul class="submenu">
        	 <li><a href="manage-employee.php">Manage Employee</a></li>
        </ul>
    </li>
    <li><a href="admin-inbox.php" title="Inbox" class="cl">
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Inbox <?php if($inboxMessageNew >0){
			echo "<b>(".$inboxMessageNew.")</b>"; 
		}else{
			echo "<b>(".$inboxMessagesTotal.")</b>";
		}
		 ?></a>
         
         <ul class="submenu">
        	 <li><a href="admin-outbox.php" title="outbox">Outbox <?php  echo "<b>(".$outboxMessages.")</b>";?>
             &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
             </a></li>
    		<li><a href="admin-send-message.php" title="Compose">Compose</a></li>
             <li><a href="logout.php" title="Logout">Logout</a></li>
        </ul>
    </li>
</ul>
<!--<div class="clear"></div>-->
  </nav>