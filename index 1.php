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
	<link rel="apple-touch-icon" href="icon2.png"/>
	<link rel="apple-touch-startup-image" href="startup.png"/>
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>

</head> 
<body> 	

<!-- Start of first page: #one -->
<div data-role="page" id="one">
	<div data-role="header">
		<h1>Welcome to Spot</h1>
	</div><!-- /header -->

	<div data-role="content">	
		<h2>Log In <span id="username"></span></h2>
		
		<p> Choose to sign up or log in below!</p>	
		
		<p><a href="#two" data-role="button">Log In</a></p>	
		<p><a href="#newUser" data-role="button">Create a User</a></p>
	</div><!-- /content -->
</div>

<!-- Start of Log In Page: #two -->
<div data-role="page" id="two" data-add-back-btn="true">
	<div data-role="header">
		<h1>Log In</h1>
	</div><!-- /header -->

	<div data-role="content">	
		<h2>Please enter your username and password</h2>
		
		<form action = "home.php" method = "post">
			<h2>
			Name: <input type="text" name ="username" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset ui-focus">
			</h2>
			<h2>
			Password: <input type="password" name ="password" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset ui-focus">
			</h2>
			<p><input type = "submit" data-direction="reverse" data-role="button" data-theme="b" value = "Sign In"></p>	
		</form>
	</div><!-- /content -->
</div><!-- /Start of Log In Page: page two -->

<!-- Create new User Page-->
<div data-role="page" id="newUser" data-add-back-btn="true">
	<div data-role="header">
		<h1>Create A New User</h1>
	</div><!-- /header -->
	
	<form action = "home.php" method = "post">
		<h2>
		Name: <input type="text" name ="username" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset ui-focus">
		</h2>
		<h2>
		Stanford Email Address: <input type="text" name ="email" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset ui-focus">
		</h2>
		<h2>
		Password: <input type="password" name ="password" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset ui-focus">
		</h2>
		<h2>
		Confirm Password: <input type="password" name ="passwordCheck" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset ui-focus">
		</h2>
		<p><input type = "submit" data-direction="reverse" data-role="button" data-theme="b" value="Create Account and Sign In"></p>
	</form>
</div>

<!--create new user page end-->


<!-- Start of third page: #popup -->
<div data-role="page" id="popup">

	<div data-role="header" data-theme="e">
		<h1>Dialog</h1>
	</div><!-- /header -->

	<div data-role="content" data-theme="d">	
		<h2>Popup</h2>
		<p>I have an id of "popup" on my page container and only look like a dialog because the link to me had a <code>data-rel="dialog"</code> attribute which gives me this inset look and a <code>data-transition="pop"</code> attribute to change the transition to pop. Without this, I'd be styled as a normal page.</p>		
		<p><a href="#one" data-rel="back" data-role="button" data-inline="true" data-icon="back">Back to page "one"</a></p>	
	</div><!-- /content -->
	
	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="c">
		<ul>
			<li><a href="home.php" id="home" data-icon="custom">Home</a></li>
			<li><a href="login.php" id="key" data-icon="custom">Login</a></li>
			<li><a href="filter.php" id="beer" data-icon="custom" class="ui-btn-active">Filter</a></li>
			<li><a href="#" id="skull" data-icon="custom">Settings</a></li>
		</ul>
		</div>
	</div>
</div>
</div><!-- /page popup -->

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