<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Check if a POST request is received
if ($_SERVER['REQUEST_METHOD']==='POST') {
    // Get the subject ID from the POST request
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $subjectId = $_POST['id'];

        // Database connection
        $host='localhost';
        $username='root'; // Replace with your DB username
        $password=''; // Replace with your DB password
        $dbname ='quiz'; // Replace with your DB name

        // Create connection
        $conne= new mysqli($host, $username, $password, $dbname);

        // Check connection
        if($conne->connect_error) {
            echo json_encode(['success'=> false,'message' =>'Database connection failed']);
            exit;
        }

        // Check if the subject exists in the database
        $query="SELECT *FROM subjects WHERE id = ?";
        $stmt = $conne->prepare($query);
        $stmt->bind_param("i",$subjectId);
        $stmt->execute();
        $result=$stmt->get_result();

        if ($result->num_rows > 0) {
            // Subject found, proceed with deletion
            $deleteQuery="DELETE FROM subjects WHERE id = ?";
            $deleteStmt=$conne->prepare($deleteQuery);
            $deleteStmt->bind_param("i",$subjectId);

            if ($deleteStmt->execute()) {
                echo json_encode(['success'=>true]);
            } else {
                echo json_encode(['success'=>false,'message' =>'Failed to delete subject']);
            }
            $deleteStmt->close();
        } else {
            // Subject not found
            echo json_encode(['success'=> false,'message' =>'Subject not found']);
        }

        // Close connections
        $stmt->close();
        $conne->close();
    } else {
        // Invalid input
        echo json_encode(['success' => false, 'message' => 'Invalid subject ID']);
    }
} else {
    // Invalid request method
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
