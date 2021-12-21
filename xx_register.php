<?php
// xx_register.php - Website Registration
// Written by:  Charles Kaplan, December 2017

// Verify that program was called from LANDING Program
	require('xx_landing.php');
  
// Variables  
	$pgm 		= $pfx . '.php?p=register';		// program name
	$msg 		= NULL;							// Error Message
	$minpword	= 6;							// Minimum Password length
	$td = "width='20%' align='right'";
	$tf = "width='80%' align='left'";
	
// Get Form Input and Cleanse  
	if (isset($_POST['firstname'])) $firstname 	= cleanse_input($_POST['firstname'], 'w');	else $firstname = NULL;
	if (isset($_POST['lastname']))  $lastname 	= cleanse_input($_POST['lastname'], 'w');	else $lastname = NULL;	
	if (isset($_POST['email'])) 	$email 		= cleanse_input($_POST['email'], NULL);		else $email		= NULL;
	if (isset($_POST['userid'])) 	$userid 	= cleanse_input($_POST['userid'], NULL);	else $userid 	= NULL;
	if (isset($_POST['password'])) 	$password 	= cleanse_input($_POST['password'], NULL);	else $password 	= NULL;

// Verify Input		
	if (isset($_POST['submit'])) {
		if ($firstname == NULL) errmsg($msg, 'First Name is missing');
		if ($lastname == NULL) errmsg($msg, 'Last Name is missing');		
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) errmsg($msg, 'Invalid Email');
		if ($userid == NULL) errmsg($msg, 'Userid is missing'); 
		if ($password == NULL) errmsg($msg, 'PASSWORD is missing');
		if (strlen($password) < $minpword) errmsg($msg, "Password must be at least $minpword characters");
		}	
	else $msg = "Complete Form and Press SUBMIT";
			
// If No Error Messages, complete Registration
	if ($msg == NULL) {
		$query = "INSERT INTO roster SET 
				  firstname	= '$firstname',
				  lastname	= '$lastname',				  
				  email		= '$email',
				  userid	= '$userid',
				  password	= '$password'";		
		$result = mysqli_query($mysqli, $query);
		if ($result) $msg = 'Registration Accepted, Please Logon';
			else $msg = "Registration Error " . mysqli_error($mysqli);
		}
  
// Registration Screen
	if ($msg == NULL)  	$msg = "Complete Form and Press SUBMIT";
    echo "<form action='$pgm' enctype='multipart/form-data' method='post'>\n
		  <table width='1016' align='center' bgcolor='white' cellspacing='10' class='text'>\n
		  <tr><td $td>&nbsp;</td><td $td>&nbsp;</td></tr>
		  <tr><td $td>&nbsp;</td><td $tf><b>$sitename Registration</b></td></tr>\n
		  <tr><td $td>&nbsp;</td><td $td>&nbsp;</td></tr>
		  <tr><td $td>First Name</td><td $tf><input type='text' name='firstname' size='20' maxlength='20' value='$firstname'></td></tr>\n
		  <tr><td $td>Last Name</td><td $tf><input type='text' name='lastname' size='20' maxlength='20' value='$lastname'></td></tr>\n		  
		  <tr><td $td>Email</td>	 <td $tf><input type='test' name='email'  size='80' maxlength='80' value='$email'></td></tr>\n
		  <tr><td $td>User ID</td>	 <td $tf><input type='text' name='userid' size='60' maxlength='80' value='$userid'></td></tr>\n
		  <tr><td $td>Password</td>	 <td $tf><input type='password' name='password' size='12' maxlength='12' value='$password'></td></tr>\n
		  <tr><td $td>&nbsp;</td>	 <td $tf>&nbsp;</td></tr>\n
		  <tr><td $td>&nbsp;</td>	 <td $tf><input type='submit' name='submit' value='Submit' style='background-color:lightgreen;font-weight:bold'></td></tr>\n
		  <tr><td $td>&nbsp;</td>	 <td $tf>&nbsp;</td></tr>\n
		  <tr><td $td>Message</td>	 <td $tf><b>$msg<b></td></tr>\n
		  </table>\n
		  </form>\n";
?>