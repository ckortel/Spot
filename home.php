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

 $username = $_POST["username"];
 
 if($username == "") {
 	$username = $_GET["username"];
 	$query = "select * from Users where username = '$username'";
 	$result = mysql_query($query);
 	$row = mysql_fetch_array($result, MYSQL_BOTH);
 	$password =  $row['password'];
 } else {
 $password = $_POST["password"];
 $passwordCheck = $_POST["passwordCheck"];
 $email = $_POST["email"];
 }
 
 if ($passwordCheck != "") {
 	if ($password == $passwordCheck) {
 		$queryInsert = "select * from NewPhotos";
        $resultInsert = mysql_query($queryInsert);
 
        $rowInsert = mysql_fetch_array($resultInsert, MYSQL_BOTH);
        $url = $rowInsert["url"];
        if($url == "") {
 			$url = "http://www.fabricworkshopandmuseum.org/images/noMediaUploaded.png";	
 		}

 		mysql_query("insert into Users (username, password, email, picture) VALUES ('$username', '$password', '$email', '$url')");
 		
 		 mysql_query("delete from NewPhotos");
 	} else {
 		?>
 		<p> Your passwords did not match. </p>
 	
 		<p> Would you like to try again? </p>
 		<p><a href="index.php" data-direction="reverse" data-role="button" data-theme="b">Try Again</a></p>		
 		<?php
 	}	
 }

 $query = "select * from Users where username = '$username' and password='$password'";
 $result = mysql_query($query);

 $num_rows = mysql_num_rows($result);

 if ($num_rows == 0) {
 ?>
 	<h1><?=$_GET['username']?>:)</h1>
 
 	<p> Username or password is incorrect. </p>
 	
 	<p> Would you like to try again? </p>
 	<p><a href="index.php" data-direction="reverse" data-role="button" data-theme="b">Try Again</a></p>		
 	
 	<!--The code below redirects you immediately to the below link. This was used during testing
 	and might be helpful later.
	<script type="text/javascript">
		window.location="http://www.stanford.edu/~ckortel/cgi-bin/GroupProject/index.php";
	</script>	-->
 <?php
 } else {
 	
 ?>

	<!-- /Home Screen/NewsFeed -->
	<div data-role="page" id="home">
		<div data-role="content">	
				<div data-role="header">
					<h1><?=$username?>'s Home Page</h1>
				</div><!-- /header -->
			

				<h2>News Feed</h2>	
   				<ul class = "LV" data-role="listview" data-inset="true" data-divider-theme="d" data-filter="true">
			<!-- Let's include the header file that we created above -->
			<?php
			$query = "select * from Spots";
 			$result = mysql_query($query);

 			while($row = mysql_fetch_array($result, MYSQL_BOTH)) {
 			?>
 					<li>
 						<a href="spot.php?url=<?=$row['url']?>&username=<?=$username?>" data-transition="slide" method="get">
 						<img src = "<?=$row['url']?>" alt = "test"/>
 						<h2><?=$row["name"]?></h2>
   						<p><?=$row["description"]?></p>
   						</a>
   					</li>
   					<span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span>
 			<?php
 			}
			?>
				</ul>
	
		</div>

		<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
			<div data-role="navbar" class="nav-glyphish-example" data-grid="b">
				<ul>
					<li><a href="home.php?username=<?=$username?>" id="homepage" data-icon="custom" method="get" >Home</a></li>
					<li><a href="profile.php?profileUsername=<?=$username?>&username=<?=$username?>" id = "key" data-icon="custom" method="get">Profile</a></li>
					<li><a href="share.php?username=<?=$username?>" id="share" data-icon="custom" method="get" data-ajax="false">Share</a></li>	
				</ul>
			</div>
		</div>
	</div>
</div><!-- /page popup -->

</div>
 <?php
 } 
 ?>
<!--Home Screen/News Feed End-->
</body>
</html>