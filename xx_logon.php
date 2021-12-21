<?PHP
// xx_logon.php - Website Logon
// Written by:  Charles Kaplan, December 2017

// Verify that program was called from xx.php
	require('xx_landing.php');
  
// Variables  
	$msg = NULL;			// Error Message
  
// Get Form Input  
	if (isset($_POST['register'])) {
		include($pfx . '_register.php');
		exit;
		}
	if(isset($_POST['logon'])) {
		$userid = trim($_POST['userid']);
		$pword = trim($_POST['password']);
		if ($userid == NULL) 			$msg = "USERID is missing";
		if ($pword == NULL) 			$msg = "PASSWORD is missing";
		if (($userid == NULL) AND ($pword == NULL)) $msg = "USERID & PASSWORD are missing";
		if ($msg == NULL) {
			
// Bypass Verify USERID/PASSWORD against table
			if ($userid == 'bypass') {
				$rowid 		= 1;
				//$firstname 	= 'Test';
				//$lastname 	=  'User';
				$firstname 	= 'Areeb';
				$lastname 	=  'Hussain';
				$password	= $pword;
				}
// Verify USERID/PASSWORD against table
			else {
				$query = "SELECT rowid, firstname, lastname, password FROM users WHERE userid='$userid'";
				$result = mysqli_query($mysqli, $query);
				if (!$result) $msg = "Error accessing Roster Table " . mysql_error($mysqli);
				if (mysqli_num_rows($result) > 0) {
					list($rowid, $firstname, $lastname, $password) = mysqli_fetch_row($result);
					}
				else $msg = "USERID is invalid";
				}
			if (($msg == NULL) AND ($pword == $password)) {
				$_SESSION['user'] = $rowid;
				$_SESSION['name'] = $name = "$firstname $lastname";
				$logon = TRUE;
				$location = "location: $pfx" . '.php?p=member';
				$msg = "<font color='green'><b>$name Logon Successful</b></font>"; 
				header($location);
				exit; 
				}
			else $msg = "Invalid Password";
			}
		}
  
// Logon Screen
	$td = "width='20%' align='right'";
	$tf = "width='80%' align='left'";
	if ($msg == NULL)  	$msg = "Enter User ID and Password";
		else if ($logon == FALSE) $msg = "<font color='red'>$msg, please try again</font>";  
    echo "<form action='$pfx" . ".php?p=logon' enctype='multipart/form-data' method='post'>\n
		  <table width='1016' align='center' bgcolor='white' cellspacing='10' class='text'>\n
		  <tr><td $td>&nbsp;</td><td $td>&nbsp;</td></tr>
		  <tr><td $td>&nbsp;</td><td $tf><b>$sitename Logon</b></td></tr>\n
		  <tr><td $td>&nbsp;</td><td $td>&nbsp;</td></tr>
		  <tr><td $td>User ID</td>	<td $tf><input type='text' name='userid' size='60' maxlength='80' value=''></td></tr>\n
		  <tr><td $td>Password</td>	<td $tf><input type='password' name='password' size='12' maxlength='12' value=''></td></tr>\n
		  <tr><td $td>&nbsp;</td>		<td $tf>&nbsp;</td></tr>\n
		  <tr><td $td>&nbsp;</td>		<td $tf><input type='submit' name='logon'    value='Logon'    style='background-color:lightgreen;font-weight:bold'>
												<input type='submit' name='register' value='Register' style='background-color:lightblue;font-weight:bold'></td></tr>\n
		  <tr><td $td>&nbsp;</td>		<td $tf>&nbsp;</td></tr>\n
		  <tr><td $td>Message</td>	<td $tf><b>$msg<b></td></tr>\n
		  </table>\n
		  </form>\n";
?>