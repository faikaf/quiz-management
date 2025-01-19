<?php
$host = 'localhost';
$username = 'root';
$password = ''; // Update with your database password
$dbname = 'quiz';

$conne = new mysqli($host, $username, $password, $dbname);

if ($conne->connect_error) {
    die('Connection failed: ' . $conne->connect_error);
}

?>
