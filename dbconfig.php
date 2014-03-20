<?php


// Define connection parameters to connect to database
DEFINE('DATABASE_HOST', 'localhost');
DEFINE('DATABASE_USER', 'admin');
DEFINE('DATABASE_PASSWORD', 'admin');
DEFINE('DATABASE_NAME', 'callcentre');

$conn = mysqli_connect(DATABASE_HOST, 
						DATABASE_USER, 
						DATABASE_PASSWORD, 
						DATABASE_NAME)
		or die("Unable to connect to MySQL");
echo "Connected to MySQL";
?>