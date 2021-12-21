<?php
// xx_home.php - Home Page
// Written by:  Charles Kaplan, December 2017	

// Verify that program was called from xx.php
	require('xx_landing.php');

// Set Up Name   
	if (!$logon) $sname = 'Guest';

// Output Page  
  echo "<div> <br><b>Welcome $sname!</b>\n
		<br><br>\n
		We appriviate your visit to our website!  Please logon if you are a <b>Staff Member</b> and have valid <b>UserID</b> and <b>Password.</b><br><br> </div>";
		echo "<p><img src='images/bank3.jpg' width='$width' height='$height'>";
?>