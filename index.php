<!DOCTYPE html> 
<html>

<head>
	<title>Where the Wild Things Are</title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />

	<link rel="stylesheet" href="style.css"/>
	<link rel="apple-touch-icon" href="App Icon.jpeg"/>
	<link rel="apple-touch-startup-image" href="Startup Screen.jpeg"/>
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>


</head> 
<body> 	

<!-- CHECK 123 -->

<!-- Start of first page: #one -->
<div data-role="page" id="one" class="burlapbase">

	<div data-role="header" class='brownGradient'>
		<h1>Welcome to Spotted.</h1>
	</div><!-- /header -->

	<div data-role="content">
	
		<div class = "login">	
		<h2>Log In <span id="username"></span></h2>
		
		<p> Choose to sign up, log in, or visit as a guest below!</p>	
		</div>
		
		<p><a  class = "brownGradient" href="#two" data-role="button">Log In</a></p>	
		<p><a  class = "brownGradient" href="newUser.php" data-role="button" data-ajax="false">Create a User</a></p>
		<p><a  class = "brownGradient" href="visitor.php" data-role="button" data-ajax="false">Enter as a Visitor</a></p>
	</div><!-- /content -->
</div>

<!-- Start of Log In Page: #two -->
<div data-role="page" id="two" class="burlapbase">
	<div data-role="header" class='brownGradient'>
		<h1>Log In</h1>
	</div><!-- /header -->

	<div data-role="content">	
	
		<div class = "login">
		<h2>Please enter your username and password</h2>
		</div>
		
		<form action = "home.php" method = "post">
			<h2>
			Name: <input type="text" name ="username" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset ui-focus">
			</h2>
			<h2>
			Password: <input type="password" name ="password" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset ui-focus">
			</h2>
			<input type = "submit"  class = "brownGradient" data-direction="reverse" data-role="button" value = "Sign In">
		</form>
	</div><!-- /content -->
</div><!-- /Start of Log In Page: page two -->


<script type="text/javascript">
// This handles all the swiping between each page. You really
// needn't understand it all.
$(document).on('pageshow', 'div:jqmData(role="page")', function(){

     var page = $(this), nextpage, prevpage;
     // check if the page being shown already has a binding
      if ( page.jqmData('bound') != true ){
            // if not, set blocker
            page.jqmData('bound', true)
            // bind
                .on('swipeleft.paginate', function() {
                    console.log("binding to swipe-left on "+page.attr('id'));
                    nextpage = page.next('div[data-role="page"]');
                    if (nextpage.length > 0) {
                       $.mobile.changePage(nextpage,{transition: "slide"}, false, true);
                        }
                    })
                .on('swiperight.paginate', function(){
                    console.log("binding to swipe-right "+page.attr('id'));
                    prevpage = page.prev('div[data-role="page"]');
                    if (prevpage.length > 0) {
                        $.mobile.changePage(prevpage, {transition: "slide",
	reverse: true}, true, true);
                        };
                     });
            }
        });

</script>

</body>
</html>