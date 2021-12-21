<?php
// function_image_upload.php - Function to Upload an Image
// Written by: Charles Kaplan, November 2020

// Image Upload Function 
function upload_image($input, $maxsize, $extns, $dir, $filename) {
	
// Upload Image
	$savefile = $msg = NULL; 
	if (isset($_FILES[$input]['tmp_name'])) {

// Check File Size
		$size = $_FILES[$input]['size'];
		if ($size > $maxsize) 
			$msg = "Maximum File Size [" . number_format($maxsize) . 
				   " bytes] exceeded [" . number_format($size) . " bytes]";

// Check File Type
		$fn = $_FILES[$input]['name'];
		$ext = trim(strtolower(strrchr($fn, '.')));	
		if (!in_array($ext, $extns))
			$msg = "Invalid file type [$ext]";
		
// Save Image File	
		if ($msg == NULL) {
			$savefile = "$dir/$filename$ext";
			$result = move_uploaded_file($_FILES[$input]['tmp_name'], $savefile);
			if ($result) 
				$msg = "File [$savefile] Uploaded";
				else $msg = "File Upload Failed: [$result]";
			}
		} 
	else $msg = "No file inputted"; 
	return(array($savefile, $msg));
	}
?>