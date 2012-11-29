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
	<link rel="stylesheet" href="style.css" />
	<link rel="apple-touch-icon" href="icon2.png" />
	<link rel="apple-touch-startup-image" href="startup.png"/>
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script src="js/script.js"></script>

</head>  
<body> 

<!-- Create new User Page-->
<div data-role="page" id="home" data-add-back-btn="true">
	<div data-role="header">
		<h1>Create A New User</h1>
	</div><!-- /header -->
	
	<div class="container">
		<div class="upload_form_cont">
                <form id="upload_form" enctype="multipart/form-data" method="post" action="upload.php">
                    <div>
                        <div><label for="image_file">Please select image file</label></div>
                        <div><input type="file" name="image_file" id="image_file" onchange="fileSelected();"/></div>
                        
                    </div>
                    <div>
                        <input type="button" value="Upload" onclick="startUploading()"/>
                    </div>
                    <div id="fileinfo">
                        <div id="filename"></div>
                        <div id="filesize"></div>
                        <div id="filetype"></div>
                        <div id="filedim"></div>
                    </div>
                    <div id="error">You should select valid image files only!</div>
                    <div id="error2">An error occurred while uploading the file</div>
                    <div id="abort">The upload has been canceled by the user or the browser dropped the connection</div>
                    <div id="warnsize">Your file is very big. We can't accept it. Please select more small file</div>

                    <div id="progress_info">
                        <div id="progress"></div>
                        <div id="progress_percent"></div>
                        <div class="clear_both"></div>
                        <div>
                            <div id="speed"></div>
                            <div id="remaining"></div>
                            <div id="b_transfered"></div>
                            <div class="clear_both"></div>
                        </div>
                        <div id="upload_response"></div>
                    </div>
                </form>
                <img id="preview"/>
            </div>
		</div>
	
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

</body>
</html>
