<?php
// xx_header.php - Page Header
// Written by: Charles Kaplan, November 2018

// Page Header
	echo "<!doctype html>
		  <body>
		  <style type='text/css'>
			A:link 	  {color:black; text-decoration:none; font-weight:bold;}
			A:visited {color:black; text-decoration:none; font-weight:bold;}
			A:active  {color:black; text-decoration:none;}
			A:hover   {color:green; text-decoration:none; font-weight:bold}
		  </style>
		  <table width='$width' align='center' cellpadding='0' cellspacing='0' style='border:1px solid black;'>\n
		  <tr><td align='center' style='$hdr_style'>$desc_short</td></tr>\n
		  <tr><td align='center' style='$hdr_style2'><br>Hello, $sname [$srole]<br><br></td></tr>\n
		  </table>";		  
?>