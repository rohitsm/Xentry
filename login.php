<?php

// Set a master email and password for verificatin
// to be replaced with values from the DB
$MasterEmail = "admin@xentry.com";
$MasterPassword = "test123";

$flagEmail = 0;
$flagPassword = 0;

// // Regular Expression for email Check
$regex = '/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/';

// // Define variables and set to empty values
// $email = mysql_real_escape_string($_GET["email"]);
// $password = mysql_real_escape_string($_GET["password"]);

$email = $_POST["email"];
$password = $_POST["password"];

// print_r($_GET);
echo("email= " . $email);
echo ("password= ". $password);
// phpinfo();


if (isset($_POST['Submit'])) { // POST is not null
// 	// session_start();
	// phpinfo();

	// Array stores all the error messages
	// $error = array();

// 	// Check whether email matches the format
	if (preg_match($regex, $_POST["email"])){
		echo("preg_match");		
		// Verify email

	
		if (empty($email)) {
			// Email entry is blank
			$error[] = "Please enter your email ";
		}
		elseif ($email == $MasterEmail){
			// Email is correct as per database records
			$flagEmail = 1;
			echo("$flagEmail = 1");	
		}
		else {
			$error = "Incorrect email or password";
		}
	}

	// Verify password 
	// if (empty($password)){
	// 	echo("Invalid password");
	// }

	if ($password == $MasterPassword) {
		// Password is correct as per database records
		$flagPassword = 1;
		echo("$flagPassword = 1");
	}
	else {
		$error[] = "Invalid email id or password";
		// echo("Error email "); 
	}

	$error = "Incorrect email or password";
}


if ($flagEmail && $flagPassword){
	// Both email and password are verified
	header("Location: report.html");
}

else {
	header("Location: login.html");	
	exit;
}
// echo("End");
?>