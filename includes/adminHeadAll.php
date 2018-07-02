
<!DOCTYPE html>
<head>
<title>Manage payroll system</title>
<link rel="stylesheet" href="css/adminStyle.css" type="text/css" media="all">
<link href="css/ui-lightness/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css">
<script src="js/print.js" type="text/javascript"></script>
<script type="text/javascript">
  	function popUpWin(url){
		var thePopUp=window.open(url,'','height=600','width=500,top=200, left=500, scrollable=no, menubar=no,resizable=no');
		if(window.focus()){
			thePopUp.focus();
		}
	}
</script>
</head>
<body>
<div class="topbar">
<div class="welcome">
<img src="images/logo.png" width="320" height="66" alt="logo" class="imgFloat">
<h4 class="userFloat"><?php  echo $usernameData; ?></h4>
<h4 class="welcomeFloat"> Welcome!&nbsp;&nbsp;</h4>

</div>
</div>