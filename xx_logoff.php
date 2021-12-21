<?PHP
// xx_logoff.php - Website Logoff
// Written by:  Charles Kaplan, December 2017

// Verify that program was called from Landing Page
	require('xx_landing.php');

// Logoff by unsetting session variables  
	if (!$logon) $sname = "Guest";  
	session_unset();
	$logon = FALSE;
 
// LOGOFF SCREEN
  echo "<table width='1016' align='center' bgcolor='white' cellspacing='10' class='text'>
		<tr><td>&nbsp;</td></tr>
		<tr><td align='center'><b><font size='+2'>$sname Logged Off</font></b></td></tr>
		<tr><td>&nbsp;</td></tr>
		</table>\n";
?>