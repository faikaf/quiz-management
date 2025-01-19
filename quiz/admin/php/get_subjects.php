<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'quiz';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit;
}


// Fetch all subjects
$query = "SELECT id, name FROM subjects";
$result = $conn->query($query);

$subjects = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $subjects[] = $row;
    }
}

echo json_encode(['success' => true, 'subjects' => $subjects]);

// Fetch subject names from the 'subjects' table
$sql = "SELECT id,name FROM subjects"; // Only selecting the 'name' column
$result = $conn->query($sql);

?>
