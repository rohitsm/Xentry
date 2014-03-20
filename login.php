<?php

include('dbconfig.php');

// Set a master email and password for verificatin
// to be replaced with values from the DB
// $MasterEmail = "admin@xentry.com";
// $MasterPassword = "test123";

// $flagEmail = 0;
// $flagPassword = 0;

// // Regular Expression for email Check
$regex = '/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/';

// // Define variables and set to empty values
// $email = mysql_real_escape_string($_GET["email"]);
// $password = mysql_real_escape_string($_GET["password"]);

// print_r($_GET);
// echo("email= " . $email);
// echo ("password= ". $password);
// phpinfo();


if (isset($_POST['Submit'])) { // POST is not null
	// session_start();
	// phpinfo();

	// Array stores all the error messages
	$error = array();

	if (empty($_POST['email'])) {
		// Email entry is blank
		$error[] = "Please enter your email ";
	}

	else {

		// Check whether email matches the format
		if (preg_match($regex, $_POST["email"])){
			// echo("preg_match");		
			// Verify email
			$email = $_POST["email"];
			$password = $_POST["password"];
		}
		else {
			$error[] = "Incorrect email or password";
		}
	}

	// If there are no errors, send to the database
	if(empty($error)) {
		// Check the email address in the records
		$query = "select * from Login where (Email='$email' 
				  and Password='$password')";
		$result = mysqli_query($conn, $query) or die(mysqli_error());
		$num_row = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);
		if($num_row == 1){
			header("Location: report.html");
			exit;
		}
		else{
			header("Location: login.html");	
			exit;
		}
	}
	// mysql_close($conn);
} // if isset() 	

?>