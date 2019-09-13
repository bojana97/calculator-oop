<?php

	$servername = 'localhost';
	$username = 'root';
	$pass = '';
	$dbname = 'calculator_db';

try {
	  $mysqli = new mysqli($servername, $username, $pass, $dbname);
	  $mysqli->set_charset("utf8mb4");
} catch(Exception $e) {
	  error_log($e->getMessage());
	  exit('Error connecting to database'); 
}


?>