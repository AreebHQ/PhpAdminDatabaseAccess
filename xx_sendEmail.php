<?php


	include('bcs350_mysqli_connect.php'); 

	
	
// Variables
	$pgm				= 'xx.php?p=sendEmail';
	$msg_color			= 'red';
	$bold				= "style='font-weight:bold;'";
	$msg				= NULL;
	$close 				= NULL;
	$to					= NULL;
	
	$query = "SELECT email FROM customernames WHERE rowid = '$rowid'";
	$result = mysqli_query($mysqli, $query);
	if (!$result)	echo mysqli_error($mysqli);
	list($replyto) = mysqli_fetch_row($result);

	
	
// Get Input
	if (isset($_POST['task']))  $task  = sanitize($mysqli, $_POST['task']);  else $task  = 'None';
	if (isset($_POST['to'])) 	$to = sanitize($mysqli, $_POST['to']); else $to = NULL;
	if (isset($_POST['from'])) 	$from = sanitize($mysqli, $_POST['from']); else $from = 'Admin <Webmaster@AceBankingSystem.com>';	
	if (isset($_POST['message'])) $message = sanitize($mysqli, $_POST['message']); else $message = NULL;
	if (isset($_POST['subject']))  $subject  = sanitize($mysqli, $_POST['subject']);  else $subject  = NULL;
	if (isset($_POST['replyto']))	$replyto 	= trim($_POST['replyto']);
// Message wrapup limit
	$message = wordwrap($message,70);

	if ($task == 'Send') {
		
//Message		
		if ($message == NULL){
			$msg .= 'Invalid Message<br>';
			$task = 'Error';}
//To		
		if ($to == NULL){
			$msg .= 'Invalid Recepient<br>';
			$task = 'Error';}
//From		
		if ($from == NULL){
			$from = "Admin <Webmaster@AceBankingSystem.com>";}
//Subject		
		if ($subject == NULL){
			$msg .= 'Enter Subject first<br>';
			$task = 'Error';}}
			
// Process Input
	switch($task) {
	
    case  'Error':	$msg = 'Enter the correct info and try again!';  break;
	case  'Clear': 	$to = $message = $replyto = $subject = NULL;
					$from = "Admin <Webmaster@AceBankingSystem.com>";
					$msg = 'Form Cleared'; break;
	case  'Send' :	
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= "From: $from\r\n";
					$headers .= "Reply-To: $replyto \r\n" .
					$headers .= 'X-Mailer: PHP/' . phpversion();
	
					mail($to,$subject,$message,$headers);
					$msg = "Email sent";
					$close = "&nbsp;&nbsp;<button onclick='self.close()' style='color:red'>Close</button>";
					$msg_color = "green";
					break;
	case  'None':	
	default:
					$msg = "Verify/Modify email and Press SEND";
					break;
    }
			
// Output Form
	echo " <table align='center' width='952' frame='border' border='1' bgcolor='white'>
		  <tr><td align='center'>
		  <table align='center'>
		  <tr><td align='center'><font size='+2'><br>Ace Banking System<br><br>Send Email</font></td></tr>
		  <tr><td>&nbsp;</td></tr>
		  </table>
		  <table align='center'>
		  <tr><td>
		  <form action='$pgm' method='post'>
          <table align='center'>
		  <tr><td>To </td>		
			  <td><input type='text' name='to'   	value='$to' 		size='80' maxlength='80'></td></tr>
		  <tr><td><font color='red'>From </font></td>
			  <td><input type='text' name='from' 	value='$from'		size='80' maxlength='80' $readonly style='color:red;'> <b>$cannot</b></td></tr>
		  <tr><td>Reply To </td>
			  <td><input type='text' name='replyto'	value='$replyto' 	size='80' maxlength='80'></td></tr>			  
		  <tr><td>Subject </td>
			  <td><input type='text' name='subject'	value='$subject' 	size='80' maxlength='80'></td></tr>
		  <tr><td>Message </td>
			  <td><textarea name='message' cols='80' rows='10'>$message</textarea></td></tr>
		  <tr><td>&nbsp;</td>
			  <td><input type='submit' name='task' value='SEND'> $close
			  <input type='submit' name='task' value='Clear' style='background-color:red;font-weight:bold;'>&nbsp;&nbsp;&nbsp;</tr>
	  	  
		  <tr><td><b>Note: </b></td>
			  <td><font color='$msg_color'>$msg</font></td></tr>
		  </table>
		  </form>
		  </td></tr></table> <br>\n";			
	
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