<?php
// xx_page4.php - Page 4
// Written by:  Programmer, Date	

// Verify that program was called from Landing Page and LOGON
	//require('xx_landing.php');
	//require($pfx . '_verify_logon.php');

	
// Variables
	$pgm = 'xx_accountInfo.php';
	
	$pgm1  = "<br><br><b>List of all Accounts! </b>\n
		  <br><br>\n";


// Connect to MySQL and the BCS350 Database
	include('bcs350_mysqli_connect.php'); 
	
//Set Account Number to Search
	if(isset($_POST['search'])) $search = $_POST['search']; else $search = NULL; 
	 
	
// Output Page  
	echo "<br><b>$pgm1 </b>\n
		  <br>\n";
	
	
// Start the Form
	echo "
		  <form action='$query ' method='post'>
		  <p><table align = 'center'><tr>
		  <tr><td ><div ><b>Account Search:</b></div></td>	<td><input type='number_format' name='search' size='60' maxlength='80' value=''></td></tr>\n";


// Setting Querry to Search for Account
	if ($search != NULL) {$query = "SELECT rowid, balance, status, accountnumber 
			  FROM accountinfo
			  WHERE accountnumber='$search'
			  ORDER BY rowid";}
	else {$query = "SELECT  rowid, balance, status, accountnumber 
			  FROM accountinfo
			  ORDER BY rowid";} 

			  
// Execute the Query
	
	$result = mysqli_query($mysqli, $query);
	if (!$result) echo "Query Failed [$query]: " . mysqli_error($mysqli);
	

// Submit Form	
	echo "</tr></table>
		  <p><table align = 'center'><tr><td><input type='submit' name='' value='Search'></td></tr></table>
		  </form> <br> <br>";

// Output the Accounts List	
	echo "<center><b>Ace Banking System - Accounts List</b></center>
		 
		  <p><table width='100%' align='center' border='frame' rules='all' cellborder='5' cellpadding='3' >
		  
		  <tr>
		  <th align='center'>RowID <br></br></th>
		  <th align='center'>Account No. <br></br></th>
		  <th align='center'>Balance $<br></br></th>
		  <th align='center'>Status <br></br></th>
		  </tr>
		  ";
	
	while(list( $rowid, $balance, $status, $accountnumber) = mysqli_fetch_row($result)) {
		echo "
			  <tr>
			   <td align='center'> $rowid</td>
			  <td align='center'> $accountnumber</td>
			  <td align='center'>$balance </td>
			  <td align='center'> $status</td>

			  </tr>";
		}
	echo "</table><br><br>";
?>