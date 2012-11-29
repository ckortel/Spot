<!DOCTYPE html> 
<html>

<head>
	<title>Where the Wild Things Are | Home</title> 
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
	<script src="js/script.js"></script>
	
</head>  
<body> 

  <?php
  include("config.php"); 

  $url = $_POST["url"];
  $id = $_POST["id"];
  $username = $_POST["username"];
  mysql_query("insert into Favorites (url, username, spotID) VALUES ('$url', '$username', '$id')");

?>

</body>
</html>