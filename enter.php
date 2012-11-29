<!DOCTYPE html> 
<html>

<head>
	<title>Where the Wild Things Are | Submit</title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />
	<link rel="stylesheet" href="style.css" />
	<link rel="apple-touch-icon" href="icon2.png" />
	<link rel="apple-touch-startup-image" href="startup.png"/>
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

</head> 
<body> 

<div data-role="page">

	<div data-role="header">
		//<h1>My Title</h1>
		<a href="#" data-icon="check" id="logout" class="ui-btn-right">Logout</a>

	</div><!-- /header -->

	<div data-role="content">	
		<?php
		include("config.php"); 
		// This is a hack. You should connect to a database here.
		$username = $_POST["username"];
		$password = $_POST["password"];
		$query = "select * from Users where username = '$username' and password='$password'";
		$result = mysql_query($query);
     	 // This tells you how many rows were returned
		$num_rows = mysql_num_rows($result);

		if ($num_rows == 0) {
			//password + username aren't in the database
			echo "<p>Incorrect username and/or password.</p>";
			?>
			<script type="text/javascript">
				window.location='www.stanford.edu/~mclindon/cgi-bin/GroupProject/login.php';
			</script>	
			<?php
		} else {
		?>
			<script type="text/javascript">
				// Save the username in local storage. That way you
				// can access it later even if the user closes the app.
				localStorage.setItem('username', '<?=$_POST["username"]?>');
			</script>
			
			<script type="text/javascript">
				window.location='www.stanford.edu/~mclindon/cgi-bin/GroupProject/home.php';
			</script>
			<?php
			//
		} else {
			echo "<p>There seems to have been an error.</p>";
		}
			

		?>
	</div><!-- /content -->
</div><!-- /page -->

</body>
</html>