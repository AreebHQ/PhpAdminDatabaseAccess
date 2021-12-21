<?php
// xx_variables.php - Common Website Variables
// Written by:  Charles Kaplan, December 2017

// Set Default PHP Options
	date_default_timezone_set('America/New_York');
	error_reporting('ALL'); 
	
// Variables
	$pfx 				= 'xx';														// Set Prefix for website file names
	$p 					= 'home';													// Page to include for content
	$pgm				= $pfx . '.php';											// Landing Page
	$width 				= '1024';													// Page width
	$pixdir 			= 'images';													// Image directory
	$domain				= 'domain.com';												// Domain Name
	$sitename			= 'Website Name';											// Website Name	
	$webmaster 			= 'Webmaster';												// Webmaster Name
	$email				= "webmaster@$domain";										// Webmaster Email
	$desc_short			= 'Ace Banking System';										// Short Website Description
	$desc_long			= 'A banking System for Customers and Staff Members.';								// Long Website Description 
	$year				= date('Y');												// Current Year
	$footer				= "&copy; $year - $desc_short";								// Footer Message	

// Navbar Variables
	
	$pages				= array('home', 'logon', 'customerList', 'accountList','updateAccount', 'accountDetail','sendEmail','location'); 
	$restricted 		= array(  'accountList','updateAccount', 'accountDetail','sendEmail'); // enter here to make page restricted
	$role_reqrd			= array(NULL);
	$role_name			= array(NULL);
	$nb_text_color		= 'blue';
	$nb_text_color2		= 'red';

// Page Styles	
	$hdr_style			= "color:blue;   background-color:yellow;    font-size:200%; font-style:italic; font-weight:bold; font-family:Arial,Helvetica;";
	$hdr_style2			= "color:green;  background-color:yellow;    font-size:100%; font-weight:bold; font-family:Arial,Helvetica;";
	$hdr_style3			= "color:black;  background-color:yellow;    font-size:75%;  font-weight:bold; font-family:Arial,Helvetica;";	
	$nav_style			= "color:blue;   background-color:white;     font-size:100%; font-weight:bold; font-family:Arial,Helvetica; border:1px solid black;";
	$ftr_style			= "color:yellow; background-color:blue;      font-size:75%;  font-weight:bold; font-family:Arial,Helvetica; border:1px solid black;";
	$page_style			= "color:black;  background-color:lightgray; font-size:100%; font-family:Arial,Helvetica; border:1px solid black;";		
?>					