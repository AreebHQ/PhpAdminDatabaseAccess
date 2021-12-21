<?php
// xx_page5.php - Page5
// Written by:  Programmer, Date	

// Verify that program was called from Landing Page and LOGON
	require('xx_landing.php');
//	require($pfx . '_verify_logon.php');


// Connect to MySQL and the BCS350 Database
	include('bcs350_mysqli_connect.php'); 
	
// Output Page  
	echo "<br><br><b>Details of All Accounts </b>\n
		  <br><br>\n";
	
//Set Account Number to Search

	if(isset($_POST['search'])) $search = $_POST['search']; else $search = NULL;   
	if(isset($_POST['searchAcc'])) $searchAcc = $_POST['searchAcc']; else $searchAcc = NULL; 
	
// Start the Form
	echo "
		  <form action='$query ' method='post'>
		  <p><table  align = 'center'><tr>
		  <tr><td ><div ><b>Search by First Name :  </b></div></td>	<td><input type='text' name='search' size='60' maxlength='80' value=''></td></tr>\n";

 // Submit Form	for search by name
	echo "</tr></table>
		  <p><table  align = 'center'><tr><td><input type='submit' name='' value='Search By Name'></td></tr>
		  </form>";

// Start the Form
	echo "
		  <form action='$query ' method='post'>
		  <p><table  align = 'center'><tr>
		  <tr><td ><div ><b>Search by Accoutn No:</b></div></td>	<td><input type='number_format' name='searchAcc' size='60' maxlength='80' value=''></td></tr>\n";


// Submit Form	for search by Acc number
	echo "<br></tr></table>
		  <p><table  align = 'center'><tr><td><input type='submit' name='SearchAcc' value='Search By Account'></td></tr></table>
		  </form> <br><br>";
  
// Setting Querry to Search for Account
if ($search != NULL) {$query = "SELECT * FROM customernames
				    INNER JOIN accountinfo ON 
					customernames.rowid = accountinfo.rowid
					WHERE customernames.firstname='$search'";}
  else if ($searchAcc != NULL) {$query = "SELECT * FROM customernames
				    INNER JOIN accountinfo ON 
					customernames.rowid = accountinfo.rowid
					WHERE accountinfo.accountnumber='$searchAcc'";}
	else {$query = "SELECT * FROM customernames
				    INNER JOIN accountinfo ON 
					customernames.rowid = accountinfo.rowid";} 
	
// Execute the Query
	$result = mysqli_query($mysqli, $query);
	if (!$result) echo "Query Failed [$query]: " . mysqli_error($mysqli);
	
 
	
// Output the Customer List	
	echo "<center><b>Ace Banking System - Accounts Detail List</b></center>
		 
		  <p><table width='1024' align='center' cellborder='5' cellpadding='5'>
		  <tr>
		  <th align='center'>Customer No.<br></br></th>
		  <th align='center'>Firstname<br></br></th>
		  <th align='center'>Lastname <br></br></th>
		  <th align='center'>Email<br></br></th> 
		  <th align='center'>AccountNo<br></br></th> 
		  <th align='center'>Balance<br></br></th>
		  <th align='center'>Status<br></br></th>
		  </tr>
		  ";
	
	while(list($rowid, $firstname, $lastname,$email, , ,$balance, $status,$accnum  ) = mysqli_fetch_row($result)) {
		echo "
			  
			  <tr>
			  <td align='center'>$rowid</td>
			  <td align='center'>$firstname </td>
			  <td align='center'> $lastname</td>
			  <td align='center'><a href='xx.php?p=sendEmail'> $email </a></td>
			   <td align='center'>$accnum </td>
			   <td align='center'>$balance </td>
			  <td align='center'>$status </td>
	  
			  </tr>";
		}
	echo "</table> <br><br>";
?>