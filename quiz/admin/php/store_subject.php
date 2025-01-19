<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Check if POST request is received
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON input
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    // Check if the 'name' field exists
    if (isset($data['name'])) {
        $subjectName = $data['name'];

        // Database connection
        $host = 'localhost';
        $username = 'root'; // Replace with your DB username
        $password = ''; // Replace with your DB password
        $dbname = 'quiz'; // Replace with your DB name
        $conne = new mysqli($host, $username, $password, $dbname);

        if ($conne->connect_error) {
            echo json_encode(['success' => false, 'message' => 'Database connection failed']);
            exit;
        }
        
        // Check if the subject already exists
        $checkQuery = "SELECT * FROM subjects WHERE name = ?";
        $checkStmt = $conne->prepare($checkQuery);
        $checkStmt->bind_param("s", $subjectName);
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if ($result->num_rows > 0) {
            // Subject already exists
            echo json_encode(['success' => false, 'message' => 'Subject already exists']);
            exit;
        }
        else {
            
            // Insert the subject into the database
            $query = "INSERT INTO subjects (name) VALUES (?)";
            $stmt = $conne->prepare($query);
            $stmt->bind_param("s", $subjectName);

            if ($stmt->execute()) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to insert data']);
            }



        }





        $stmt->close();
        $conne->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid input']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
