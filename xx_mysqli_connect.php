<?php
// xx_mysqli_connect.php - Logon to MySQL and connect to the database
// Written by: Charles Kaplan, December 2017

// Check for PC, Production or Development Websites
	if (!isset($site)) {	
		$site = 'PROD';
		$dirx = strtolower(getcwd());
		if (strpos($dirx, 'dvlp') > 0)	$site = 'DVLP';
		if (strpos($dirx, 'wamp') > 0)	$site = 'PC';
		}
	
	switch($site) {

	case 'PROD':
		$myserver 		= 'prod_host';
		$mydatabase   	= 'prod_database';
		$myuserid		= 'prod_userid';
		$mypassword   	= 'prod_password';	
		break;

	case 'DVLP':
		$myserver 		= 'dvlp_host';
		$mydatabase   	= 'dvlp_database';
		$myuserid		= 'dvlp_userid';
		$mypassword   	= 'dvlp_password';	
		break;		

	case 'TEST':
		$myserver 		= 'test_host';
		$mydatabase   	= 'test_database';
		$myuserid		= 'test_userid';
		$mypassword   	= 'test_password';	
		break;		
		
	case 'PC': 
	default:
		$myserver 		= 'localhost';
		$mydatabase  	= 'pc_database';
		$myuserid 		= 'root';
		$mypassword  	= NULL;
		break;
	}
	
	$mysqli = mysqli_connect($myserver, $myuserid, $mypassword, $mydatabase)
		or die('Could not connect to MySQLI server!' . mysqli_connect_error());
?>   