<?php
// xx_page3.php - Page 3
// Written by:  Programmer, Date	

// Verify that program was called from Landing Page and LOGON
	require('xx_landing.php');
//	require($pfx . '_verify_logon.php');


// Connect to MySQL and the BCS350 Database
	include('bcs350_mysqli_connect.php'); 
	require('image_resize.php');
	$pgm		= 'xx.php?p=customerList';
	$maxw		= 200;
	$maxh		= 200;
// Output Page  
	echo "<br><br><b>List of all customers available for public! </b>\n
		  <br><br>\n";
	
//Set Account Number to Search
	if(isset($_POST['search'])) $search = $_POST['search']; else $search = NULL;   
  

// Start the Form
	echo "
		  <form action='$pgm' method='post'>
		  <p><table><tr>
		  <tr><td ><div ><b>Customer Search by First Name:</b></div></td>	<td><input type='text' name='search' size='60' maxlength='80' value=''></td></tr>\n";


  
// Setting Querry to Search for Account
	if ($search != NULL) {$query = "SELECT rowid, firstname, lastname, photo
			  FROM customernames
			  WHERE firstname='$search'
			  ORDER BY rowid";}
	else {$query = "SELECT rowid, firstname, lastname , photo
			  FROM customernames
			  ORDER BY rowid";} 

	
// Execute the Query
	$result = mysqli_query($mysqli, $query);
	if (!$result) echo "Query Failed [$query]: " . mysqli_error($mysqli);
	
  // Submit Form	
	echo "</tr></table>
		  <p><table><tr><td><input type='submit' name='' value='Search'></td></tr></table>
		  </form>";
	
	
// Output Customer List	
	echo "<center><b>Ace Banking System - Customer List</b></center>
		 
		  <p><table width='1024' align='center' cellborder='5' cellpadding='5'>
		  
		  
		  <tr>
		  <th align='center'>Customer No.<br></br></th>
		  <th align='center'>Firstname<br></br></th>
		  <th align='center'>Lastname <br></br></th>
		  <th align='center'>Photo <br></br></th>
		  </tr>
		  ";
	
	while(list($rowid, $firstname, $lastname, $photo) = mysqli_fetch_row($result)) {
		if ($photo != NULL) {
			list($result2, $width, $height) = image_resize($photo, $maxw, $maxh);
			$img = "<img src='$photo' width='$width' height='$height'>";
			}
		else $img = NULL; 
		
		echo "	  
			  <tr>
			  <td align='center'>$rowid</td>
			  <td align='center'>$firstname </td>
			  <td align='center'> $lastname</td>
			  <td align='center'> $img </td>
			  </tr>";
		}
	echo "</table> <br><br>";
?>