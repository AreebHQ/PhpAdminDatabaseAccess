<?php

// xx_page4.php - Page 4
// Written by:  Programmer, Date	

// Verify that program was called from Landing Page and LOGON
	//require('xx_landing.php');
	//require($pfx . '_verify_logon.php');
		include('bcs350_mysqli_connect.php'); 
		require('function_image_upload.php'); 
		require('image_resize.php');
		
// Variables
	$pgm				= 'xx.php?p=updateAccount'; 
	$table1				= 'customernames'; 
	$table2				= 'accountinfo'; 
	$bold				= "style='font-weight:bold;'";
	$center				= "align='center'";
	$imgdir			    = 'images';
	$maxsize			= 1024 * 1024;
	$maxw				= 200;
	$maxh				= 200; 
	$extns			    = array('.gif', '.jpg', '.jpeg', '.png'); 
	$msg				= NULL;
	$msg_color			= 'black';
	
// Get Input
	if (isset($_POST['task']))  $task  = sanitize($mysqli, $_POST['task']);  else $task  = 'First';
	if (isset($_POST['rowid'])) $rowid = sanitize($mysqli, $_POST['rowid']); else $rowid = NULL;
	if (isset($_POST['last_rowid'])) $last_rowid = sanitize($mysqli, $_POST['last_rowid']); else $last_rowid = NULL;	
	if (isset($_POST['fname'])) $fname = sanitize($mysqli, $_POST['fname']); else $fname = NULL;
	if (isset($_POST['lname'])) $lname = sanitize($mysqli, $_POST['lname']); else $lname = NULL;
	if (isset($_POST['accountnum'])) $accountnum = sanitize($mysqli, $_POST['accountnum']); else $accountnum = NULL;
    if (isset($_POST['last_accountnum'])) $last_accountnum = sanitize($mysqli, $_POST['last_accountnum']); else $last_accountnum = NULL;
	if (isset($_POST['balance'])) $balance = sanitize($mysqli, $_POST['balance']); else $balance = NULL;
	if (isset($_POST['status']))  $status  = sanitize($mysqli, $_POST['status']);  else $status  = NULL;
	if (isset($_POST['email'])) $email = sanitize($mysqli, $_POST['email']); else $email = NULL;
	if (isset($_GET['r']))		{$rowid = sanitize($mysqli, $_GET['r']);	$task = 'Show';} 

// Verify Input
	if (($task == 'Add') OR ($task == 'Change')) {
		
//Balance		
		if ($balance != NULL) {if (!(filter_var($balance, FILTER_VALIDATE_INT)))
			{$msg .= 'Invalid Balance Amount<br>';
		$task = 'Error';}}
			
// Account number
		if ($accountnum != NULL) {if (!(filter_var($accountnum, FILTER_VALIDATE_INT)))
			{$msg .= 'Invalid Account Number<br>';
		$task = 'Error';}}
		
		
// Email		
		if (($email != NULL) AND (!filter_var($email, FILTER_VALIDATE_EMAIL)))
			$msg .= 'Invalid Email Address<br>';

		}
	
// Process Input
	switch($task) {
    case 'First':	$msg = 'Enter a ROWID and press SHOW';  break;

	case 'Clear':
		$last_rowid = $rowid = $fname = $lname = $email = $accountnum = $balance = $status = NULL;
		$msg = 'Form Cleared'; 
		break;
		
	case 'Previous':
	case 'Next':
	case 'Show':
		if ($task == 'Previous') $rowid--;
		if ($task == 'Next') 	 $rowid++;
		$query = "SELECT firstname, lastname , email, photo
				  FROM $table1
				  WHERE rowid='$rowid'";
		$query2 = "SELECT accountnumber, balance, status
				   FROM $table2
				   WHERE rowid='$rowid'";
				   
		$result = mysqli_query($mysqli, $query);
		$result2 = mysqli_query($mysqli, $query2);
		if (!$result) {echo "Query failed [$query] – " . mysqli_error($mysqli);} 
		if (mysqli_num_rows($result) < 1) {
			$msg = "ROWID $rowid not found"; 
			$msg_color='red'; 
			$fname = $lname = $email = $photo = NULL;}
		if (!$result2) {echo "Query failed [$query2] – " . mysqli_error($mysqli);} 
	 if	(mysqli_num_rows($result) < 1) {
			$msg = "ROWID $rowid not found."; 
			$msg_color='red'; 
			$accountnum = $balance = $status = NULL;}
		else {
			list($fname, $lname, $email, $photo ) = mysqli_fetch_row($result); 
			list($accountnum, $balance,$status ) = mysqli_fetch_row($result2); 
			$msg = "Row $rowid and Accoutn Number $accountnum found";
			$last_rowid = $rowid;
			$last_accountnum = $accountnum;
			} 
		break;

	case 'Add':
		$query = "INSERT INTO $table1 SET
				  $table1.firstname	= '$fname',
				  $table1.lastname	= '$lname',
				  $table1.email	= '$email'";
			
		$query2 = "INSERT INTO $table2 SET
				  $table2.balance = '$balance',
				  $table2.status = '$status',
				  $table2.accountnumber = '$accountnum'";
				  
				  
		$result = mysqli_query($mysqli, $query);
		$result2 = mysqli_query($mysqli, $query2);
		if (!$result) {
			$msg = "Query failed [$query]" . mysqli_error($mysqli); 
			$msg_color='red';
			}
		if (!$result2) {
			$msg = "Query failed [$query2]" . mysqli_error($mysqli); 
			$msg_color='red';
			}
		else {
			$rowid = mysqli_insert_id($mysqli);
			$msg = "ROWID $rowid added and Accoutn Number $accountnum added!";
			$last_rowid = $rowid;
			$last_accountnum = $accountnum;
			}
		break;
    
	case 'Change':
		if ($rowid != $last_rowid) {
			$msg = 'Show record before changing';
			$msg_color = 'red';
			}
		else {
			$query = "UPDATE $table1 SET
				      firstname = '$fname',
					  lastname	= '$lname',
					  email	= '$email'
					  WHERE rowid = '$rowid'";
			$query2 = "UPDATE $table2 SET
				      status = '$status',
					  accountnumber = '$accountnum'
					  WHERE rowid = '$rowid'";
			$result = mysqli_query($mysqli, $query);
			$result2 = mysqli_query($mysqli, $query2);
			if (!$result) {
				$msg = "QUERY failed [$query]: " . mysqli_error($mysqli);
				$msg_color = 'red';
				}
			if (!$result2) {
				$msg = "QUERY failed [$query2]: " . mysqli_error($mysqli);
				$msg_color = 'red';
				}
			else $msg = "ROWID $rowid Updated";
			}
		break;
    
	case 'Delete':
		if ($rowid != $last_rowid) {
			$msg = 'Show record before deleting';
			$msg_color = 'red';
			}
		else {
			$query = "DELETE FROM $table1 WHERE rowid='$rowid'";
			$query2 = "DELETE FROM $table2 WHERE rowid='$rowid'";
			$result = mysqli_query($mysqli, $query);
			$result2 = mysqli_query($mysqli, $query2);
			if (!$result) {
				$msg = "Query failed [$query] ". mysqli_error($mysqli);
				$color = 'red';
				}
			if (!$result2) {
				$msg = "Query failed [$query2] ". mysqli_error($mysqli);
				$color = 'red';
				}
			else {
				$msg = "ROWID $rowid deleted";
				$last_rowid = $rowid = $fname = $lname = $email = $accountnum = $balance = $status = NULL;
				}
			}
		break; 
    
	default:
    }	
		
// Get Image
	if ((($task == 'Add') AND ($rowid != NULL)) OR ($task == 'Change')) {
		list($photo, $msg) = upload_image('photo', $maxsize, $extns, $imgdir, $rowid);
		$query = "UPDATE $table1 SET photo = '$photo' WHERE rowid = '$rowid'"; 
		$result = mysqli_query($mysqli, $query);
		if (!$result) {
			$msg = "Query failed [$query] ". mysqli_error($mysqli);
			$color = 'red';
			}
		}
	else $photo = NULL;
	
	
	
	
// Output
	
	echo "<!DOCTYPE HTML><html><body>
		  <script>
		  function ConfirmDelete() {
			  var x = confirm('Are you sure you want to delete?');
			  if (x) return true; else return false;
			  }
		  </script>
		  <br>
		  <div $bold>Add New Account</div>\n";
		  
	
	echo "<p><form action='$pgm' method='post' enctype='multipart/form-data'>
		  <input type='hidden' name='last_rowid' value='$last_rowid'>
		  <table>
		  <tr><td $bold>Rowid</td>
              <td><input type='text' name='rowid' value='$rowid' size='09'></tr>
		  <tr><td $bold>First Name</td>
			  <td><input type='text' name='fname' value='$fname' size='15'></tr>  
		  <tr><td $bold>Last Name</td>
			  <td><input type='text' name='lname' value='$lname' size='15'></tr>
		 <tr><td $bold>Email</td>
			  <td><input type='text' name='email' value='$email' size='15'></tr>
		 <tr><td $bold>Account No</td>
			  <td><input type='number_format' name='accountnum' value='$accountnum' size='15'></tr>
		 <tr><td $bold>Balance</td>
			  <td><input type='number_format' name='balance' value='$balance' size='15'></tr>
		 <tr><td $bold>Status</td>
			  <td><input type='text' name='status' value='$status' size='15'></tr>
		  <tr><td $bold>Photo</td>
			  <td>$photo <input type='file' name='photo'></td></tr>
		  </table>";
		  if ($photo == NULL) $photo = 'None'; 
		  
// Show Image
	if ($photo != 'None') {
		list($result, $width, $height) = image_resize($photo, $maxw, $maxh); 
		echo "<p><img src='$photo' width='$width' height='$height'>";
		}
		  
// Action Bar
    echo "<p><table><tr><td>
		  <input type='submit' name='task' value='Show' style='background-color:white; font-weight:bold;'>
		  <input type='submit' name='task' value='Add' style='background-color:lightgreen;font-weight:bold;'>
		  <input type='submit' name='task' value='Change' style='background-color:white; font-weight:bold;'>
		  <input type='submit' name='task' value='Delete' style='background-color:red;font-weight:bold;' onclick='return ConfirmDelete();'>&nbsp;&nbsp;&nbsp;
		  <input type='submit' name='task' value='Clear' style='background-color:white;font-weight:bold;'>&nbsp;&nbsp;&nbsp;
	  	  <input type='submit' name='task' value='Previous' style='background-color:white; font-weight:bold;'>
	      <input type='submit' name='task' value='Next' style='background-color:white; font-weight:bold;'>
		  </td></tr></table></form>";

	
// Message
    echo "<p><table><tr>
		  <td $bold>MESSAGE: </td>
		  <td style='color:$msg_color;'>$msg</td>
		  </tr></table> <br>"; 
		  
// End of Program
	echo "</body></html>";
	mysqli_close($mysqli);

// Sanitize Function
	function sanitize($mysqli, $var) {
	$var = mysqli_real_escape_string($mysqli, $var);
	if (get_magic_quotes_gpc()) $var = stripslashes($var);
	$var = strip_tags($var);
	$var = htmlentities($var);
	return($var);
	}
?>	
