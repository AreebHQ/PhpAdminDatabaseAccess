<?php
// image_upload.php - Upload and Display an Image
// Written by: Charles Kaplan, November 2020



// Image Upload Function 
	include('function_image_upload.php'); 
	include('image_resize.php');

// Variables
	$pgm		= 'image_upload3.php';
	$dir		= 'C:\wamp64\www\images';
	$file		= 'temp'; 
	$maxsize	= 1024 * 1024;			// 1MB
	$maxw		= 200;
	$maxh		= 200;
	$extns		= array('.gif', '.jpg', '.jpeg', '.png'); 
	$msg 		= NULL; 

	
// Display Form and Image
	if (isset($_FILES['pic']['name'])) {
		list($savefile, $msg) = upload_image('pic', $maxsize, $extns, $dir, 'temp'); 
		$msg = "Selected file [" . $_FILES['pic']['name'] . "]<br>" . $msg; 
		}
	else {
		$savefile = NULL;
		$msg = "Upload an Image File";  
		}
	echo "<!doctype HTML><html><body>
		  <div align='center'>
		  <form action='$pgm' method='post' enctype='multipart/form-data'>
		  Select File: <input type='file' name='pic' onchange='this.form.submit()'>
		  </form>
		  <p>Message: $msg\n";
    if ($savefile != NULL) {
		list($neww, $newh) = image_resize($savefile, $maxw, $maxh);
		echo "<p><img src='$savefile' width='$newh' height='$newh'>\n";
		}
	echo "<div></body></html>";
?>