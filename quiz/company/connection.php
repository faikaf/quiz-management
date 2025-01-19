<!-- establish a conection using php -->
<?php
// Establish a connection using PHP

// Configuration
$host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'user_registration';

// Create connection
$conne = new mysqli($host, $username, $password, $db_name);

// Check connection
if ($conne->connect_error) {
    die("Connection to database failed: " . $conne->connect_error);
}
 //echo "Connected successfully";
// Close the connection



?>
