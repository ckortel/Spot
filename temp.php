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

 		
 $username = $_POST['username'];
 
 $name = $_POST["newName"];
 $description = $_POST["newDescription"];

 $query = "select * from NewPhotos";
 $result = mysql_query($query);
 
 $row = mysql_fetch_array($result, MYSQL_BOTH);
 
 $url = $row["url"];
 if($url == "") {
 	$url = "http://www.fabricworkshopandmuseum.org/images/noMediaUploaded.png";	
 }
 mysql_query("insert into Spots (url, description, name, comments, coordX, coordY, username) VALUES ('$url', '$description', '$name', '$name', '$num', '$num', '$username')");
 
 mysql_query("delete from NewPhotos");

?>

<script type="text/javascript">
		window.location="http://www.stanford.edu/~ckortel/cgi-bin/GroupProject/home.php?username=<?=$username?>";
</script>
	
</body>
</html>
