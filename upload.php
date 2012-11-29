<?php

function bytesToSize1024($bytes, $precision = 2) {
    $unit = array('B','KB','MB');
    return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];
}

$sFileName = $_FILES['image_file']['name'];
$sFileType = $_FILES['image_file']['type'];
$sFileSize = bytesToSize1024($_FILES['image_file']['size'], 1);
$newFileName = "uploads/".$_FILES['image_file']['name'];

include("config.php"); 

$query = "select * from Spots where url = '$newFileName'";
$query2 = "select * from Users where picture = '$newFileName'";
$result = mysql_query($query);
$result2 = mysql_query($query2);

$num_rows = mysql_num_rows($result);
$num_rows2 = mysql_num_rows($result2);

if ($num_rows != 0 || $num_rows2 != 0) {
	$random .= mt_rand(0, 1000);
	$temp = $newFileName;
	$newFileName = 	$temp + $random;
} 

if (move_uploaded_file($_FILES['image_file']['tmp_name'], $newFileName)) {
	

}

mysql_query("insert into NewPhotos (url) VALUES ('$newFileName')");

echo <<<EOF
<p>Your file: {$sFileName} has been successsfully received.</p>
<p>Type: {$sFileType}</p>
<p>Size: {$sFileSize}</p>
EOF;
?>

