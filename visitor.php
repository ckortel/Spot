<!DOCTYPE html>
<html>
<head>
	<title>Where the Wild Things Are</title>
	<meta name="author" content="Ste Brennan - Code Computerlove - http://www.codecomputerlove.com/" />
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	
	<link href="1.css" rel="stylesheet" />
	<link href="2.css" type="text/css" rel="stylesheet" />
	<link href="3.css" type="text/css" rel="stylesheet" />
	
	<script type="text/javascript" src="1.js"></script>
	<script type="text/javascript" src="2.js"></script>
	<script type="text/javascript" src="3.js"></script>
	<script type="text/javascript" src="4.js"></script>
	<script type="text/javascript" src="code.photoswipe-3.0.5.min.js"></script>
	<script type="text/javascript">
		
		/*
		 * IMPORTANT!!!
		 * REMEMBER TO ADD  rel="external"  to your anchor tags. 
		 * If you don't this will mess with how jQuery Mobile works
		 */
		
		(function(window, $, PhotoSwipe){
			
			$(document).ready(function(){
				
				$('div.gallery-page')
					.live('pageshow', function(e){
						
						var 
							currentPage = $(e.target),
							options = {},
							photoSwipeInstance = $("ul.gallery a", e.target).photoSwipe(options,  currentPage.attr('id'));
							
						return true;
						
					})
					
					.live('pagehide', function(e){
						
						var 
							currentPage = $(e.target),
							photoSwipeInstance = PhotoSwipe.getInstance(currentPage.attr('id'));

						if (typeof photoSwipeInstance != "undefined" && photoSwipeInstance != null) {
							PhotoSwipe.detatch(photoSwipeInstance);
						}
						
						return true;
						
					});
				
			});
		
		}(window, window.jQuery, window.Code.PhotoSwipe));
		
	</script>

		
</head>  
<body> 

<div data-role="page" id="Home" data-add-back-btn="true" >

	<div data-role="header" data-position="inline">
		<h1>Spot Sneek Peek</h1>
	</div>
	
	
	<div data-role="content" >	
		
		<p>Spot allows users to share places they love. Each spot has a tite, picture, description, and location.</p>
		
		<ul data-role="listview" data-inset="true">
			<li><a href="#Gallery1">Check out recently posted Spots!</a></li> 
		</ul> 
		
	</div>

</div>


	
	<?php
 include("config.php"); 
 ?>

<div data-role="page" data-add-back-btn="true" id="Gallery1" class="gallery-page burlapbase">

	<div data-role="header" data-position="inline">
	<h1>Recent Spots</h1>
	</div>
	<div data-role="content">	
		<ul class="gallery">
			<?php
			$query = "select * from Spots";
 			$result = mysql_query($query);

 			while($row = mysql_fetch_array($result, MYSQL_BOTH)) {
 			?>
 					<li>
 					<h4><?=$row['name']?></h4>
 					<a href="<?=$row['url']?>" rel="external">
 					<img src = "<?=$row['url']?>" alt = "Recent Spots"/></a>
 					<p><?=$row['description']?></p>
 					</li>
 			<?php
 			}
			?>
		</ul> 
	</div>

</div>

</body>
</html>