<?php
$host = 'localhost';
$username = 'root';
$password = ''; // Update with your database password
$dbname = 'quiz';

$conne = new mysqli($host, $username, $password, $dbname);

if ($conne->connect_error) {
    die(json_encode(["success" => false, "message" => "Connection failed: " . $conne->connect_error]));
}

// Log incoming request data for debugging
file_put_contents("debug_log.txt", print_r($_POST, true), FILE_APPEND);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['questiontxt'])) {
    $subject_name = $_POST['subject-name'] ?? '';
    $question = $_POST['questiontxt'] ?? '';
    $option1 = $_POST['option1'] ?? '';
    $option2 = $_POST['option2'] ?? '';
    $option3 = $_POST['option3'] ?? '';
    $option4 = $_POST['option4'] ?? '';
    $answer = $_POST['answer'] ?? '';

    if (empty($subject_name) || empty($question) || empty($option1) || empty($option2) || empty($option3) || empty($option4) || empty($answer)) {
        echo json_encode(["success" => false, "message" => "All fields are required."]);
        exit();
    }

    $stmt = $conne->prepare("INSERT INTO question (name, question, option1, option2, option3, option4, answer) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $subject_name, $question, $option1, $option2, $option3, $option4, $answer);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Question added successfully!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error: " . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid request."]);
}

$conne->close();
