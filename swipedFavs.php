<!DOCTYPE html> 
<html>

<head>
	<title>Where the Wild Things Are | Login</title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />
	<link rel="stylesheet" href="css/main.css" />
	<link rel="apple-touch-icon" href="icon2.png" />
	<link rel="apple-touch-startup-image" href="startup.png"/>
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>
	<script src="js/script.js"></script>

</head>  
<body> 

<?php
 include("config.php"); 

 		
 $username = $_GET['username'];
 
 $url = $_GET['url'];

 mysql_query("DELETE FROM Favorites WHERE username = '$username' and url = '$url'");

?>

<script type="text/javascript">
		window.location="http://www.stanford.edu/~ckortel/cgi-bin/GroupProject/profile.php?profileUsername=<?=$username?>&username=<?=$username?>";
</script>
	
</body>
</html>
