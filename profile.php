<!DOCTYPE html> 
<html>

<head>
	<title>Where the Wild Things Are | Login</title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
	
	<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
	<link rel="stylesheet" href="style.css" />
</head>  
<body>

<?php
 include("config.php"); 

 $username = $_GET['username']; 
 $profileUsername = $_GET['profileUsername'];
  
 $query = "select * from Users where username = '$profileUsername'";
 $result = mysql_query($query);
 
 while($row = mysql_fetch_array($result, MYSQL_BOTH)) {
	$userPhoto = $row['picture']; 
 }

 ?> 

<!-- /Home Screen/NewsFeed -->
<div data-role="page" id="home" class="burlapbase">

	<div data-role="header" class='brownGradient'>
		<h1><?=$profileUsername?>'s Profile</h1>
	</div><!-- /header -->
	
	<h1></h1>
	
	<div class = "profilePicture">
		<img src = "<?=$userPhoto?>" alt = "test"/>
		<?php
		if ($profileUsername == $_GET['username']) {
			?>
			<a  class = "brownGradient" href="changePicture.php?username=<?=$profileUsername?>" data-role="button" data-ajax="false">Change Picture</a>	
			<?php	
		}
		?>
	</div>	
		
	<div data-role="content">	
			
	
			<h2><?=$profileUsername?>'s Spots</h2>	
			<?php
			if ($_GET['username'] != $profileUsername) {
			?>
   				<ul data-role="listview" data-inset="true" data-divider-theme="d" data-filter="true">
			<?php
			} else {
			?>
				<ul data-role="listview" data-inset="true" data-split-icon="delete" data-divider-theme="d" data-filter="true">
			<?php	
			}
			$query = "select * from Spots where username = '$profileUsername'";
 			$result = mysql_query($query);
			if (mysql_num_rows($result) != 0) {
	 			while($row = mysql_fetch_array($result, MYSQL_BOTH)) {
	 				if ($_GET['username'] != $profileUsername) {
	 			?>
	 					<li>
	 						<a class="iconImgA" href="spot.php?id=<?=$row['id']?>&username=<?=$username?>" data-transition="slide" method="get">
	 						<img class="iconImg" src = "<?=$row['url']?>" alt = "test"/>
	   						<h4><?=$row["name"]?></h4>
		   					<p><?=$row["description"]?></p>
	   						</a>
	   					</li>
	   					<span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span>
	 			<?php
	 				} else {
	 				?>
	 					<li>
							<a class="iconImgA" href="spot.php?id=<?=$row['id']?>&username=<?=$username?>" data-transition="slide" method="get">
							<img class="iconImg" src = "<?=$row['url']?>" alt = "test"/>
	   						<h4><?=$row["name"]?></h4>
		   					<p><?=$row["description"]?></p>
							</a><a href="#delete" class = "spot" id = "<?=$row['id']?>" data-rel="popup" data-position-to="window" data-transition="pop">Delete Spot</a>
						</li>
	 				<?php	
	 				}
	 			}
			} else {
				?>
				<li><h3>No spots have been posted.</h3></li>
				<?php	
			}
			?>
			</ul>
			
			<div data-role="popup" id="delete" data-theme="d" data-overlay-theme="b" class="ui-content" style="max-width:340px;">
				<h3>Delete this Spot?</h3>
				<p>This will permanently delete it from your Spots.</p>
				<a href="#" id = "spot_delete" method="get"" data-role="button" data-rel="back" data-theme="b" data-icon="check" data-inline="true" data-mini="true">Delete</a>
				<a href="#" data-role="button" data-rel="back" data-inline="true" data-mini="true">Cancel</a>	
			</div>
			
			<h2><?=$profileUsername?>'s Favorite Spots</h2>
		
   				
   			<ul data-role="listview" data-inset="true" data-divider-theme="d" data-filter="true">
			
		<?php
			$query = "select * from Favorites where username = '$profileUsername'";
 			$result = mysql_query($query);
			if (mysql_num_rows($result) != 0) {
 				while($row = mysql_fetch_array($result, MYSQL_BOTH)) {
 					$spotID = $row['spotID'];
 					$query2 = "select * from Spots where id = '$spotID'";
 					$result2 = mysql_query($query2);
 					while($row2 = mysql_fetch_array($result2, MYSQL_BOTH)) {
 						if ($_GET['username'] != $profileUsername) {
	 			?>
		 					<li>
		 						<a  class="iconImgA" href="spot.php?id=<?=$row2['id']?>&username=<?=$username?>" data-transition="slide" method="get" >
		 						<img class="iconImg" src = "<?=$row2['url']?>" alt = "test"/>
		 						<h4><?=$row2["name"]?></h4>
		 						<p><?=$row2["description"]?></p>
		   						</a>
		   					</li>
		   					<span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span>
		 			<?php
 						} else {
 						?>
	 						<li>
								<a class="iconImgA" href="spot.php?id=<?=$row['id']?>&username=<?=$username?>" data-transition="slide" method="get">
								<img class="iconImg" src = "<?=$row['url']?>" alt = "test"/>
		   						<h4><?=$row2["name"]?></h4>
		   						<p><?=$row2["description"]?></p>
								</a>
							</li>
							
 						<?php	
 						}	
 					}
 				}
			} else {
				?>
				<li><h3>No spots have been added to Favorites.</h3></li>
				<?php	
			}
			?>
		
				</ul>

		</div><!-- /content -->

	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="b">
		<ul>
			<li><a href="home.php?username=<?=$username?>" id="homepage" data-icon="custom" method="get" class='brownGradient'>Home</a></li>
			<li><a href="profile.php?profileUsername=<?=$username?>&username=<?=$username?>" id = "explore" data-icon="custom" method="get" class='brownGradient'>Profile</a></li>
			<li><a href="share.php?username=<?=$username?>" id="share" data-icon="custom" method="get" class='brownGradient'>Share</a></li>
		</ul>
		</div>
	</div>
</div>

<script>

var spotToDelete = 0;
			
$(".spot").click(function() {
	spotToDelete = $(this).attr("id");
});
			
$("#spot_delete").click(function() {
	$.post("swiped.php",
	{ id: spotToDelete },
	function(data) {
		window.location="http://www.stanford.edu/~ckortel/cgi-bin/GroupProject/profile.php?profileUsername=<?=$username?>&username=<?=$username?>";
						
	});
	spotToDelete = 0;
});

</script>
</body>
</html>