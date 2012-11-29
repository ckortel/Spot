<!DOCTYPE html> 
<html>

<head>
	<title>Where the Wild Things Are | Login</title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css"/>
	<link rel="stylesheet" href="style.css"/>
	<link rel="apple-touch-icon" href="icon2.png"/>
	<link rel="apple-touch-startup-image" href="startup.png"/>
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>

</head>  
<body> 

 <?php
 include("config.php"); 

 $username = $_GET["username"];

 
 ?>


<!-- /Home Screen/NewsFeed -->
<div data-role="page" id="explore" >

	<div data-role="header">
		<h1>Explore!</h1>
	</div>
	
	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
			<div data-role="navbar" class="nav-glyphish-example" data-grid="b">
				<ul>
					<li><a href="home.php?username=<?=$username?>" id="homepage" data-icon="custom" method="get">Home</a></li>
					<li><a href="share.php?username=<?=$username?>" id="share" data-icon="custom" method="get" data-ajax="false">Share</a></li>	
					<li><a href="explore.php?username=<?=$username?>" id="explore" data-icon="custom" method="get">Explore</a></li>

				</ul>
			</div>
		</div>


<script type="text/javascript">
	$("#logout").hide();
	$("#info").hide();
	var retrievedObject = localStorage.getItem('username');
	if (retrievedObject == "test") {
		$("#form").hide();	
		$("#logout").show();
		$("#info").show();
	}
	$("#logout").click(function() {
		localStorage.removeItem('username');
		$("#form").show();
		$("#logout").hide();
		$("#info").hide();
	});
	</script>
</div>
<!--Home Screen/News Feed End-->
</body>
</html>