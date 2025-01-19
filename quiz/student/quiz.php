<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include("connectQuestion.php");

// Check if the subject is stored in the session
if (!isset($_SESSION['slt_subject'])) {
    echo "<script>alert('No subject selected. Redirecting to subject selection page.'); window.location.href = 'subjectselect.php';</script>";
    exit();
}


$name = $_SESSION['slt_subject'];  // Get the selected subject

$query = "SELECT * FROM question WHERE name = ?";
$stmt = $conne->prepare($query);

if ($stmt) {
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows >0){
        
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;  // Store each question
    }
    //  echo "<pre>";
    //      print_r($questions); // Outputs the array in a readable format
    //      echo "</pre>";
    } else {
        echo "<script>alert('No questions found!');</script>";
        exit;
    }

    $stmt->close();
} else {
    die("Failed to prepare the SQL statement: " . $conne->error);
}
echo "<script>const questions = " . json_encode($questions) . ";
console.log(questions);</script>";

$conne->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/quiz.css">
        <!--css link-->
        <link rel="stylesheet" href="../common/css/bootstrap.min.css">
     <link rel="stylesheet" href="../common/css/animate.min.css">
    <!-- endBootstrap CSS -->

    <!--js-->
    <script src="../common/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   



    <title>quiz</title>
</head>
<body>

    <div class="quiz-containerbox">
        <h1>Quiz from subject:<?php echo htmlspecialchars($name);?></h1>
        <p class="text-muted">Answer the following questions:</p>
        <div class="timer">Time left: 10 seconds</div>
        
        <div class="quiz-container">
            <div class="question-container">
                <h2 class="question-text"></h2> <!-- This element should exist -->
                <div class="options-container"></div>
            </div>
            <button class="next-but" onclick="nextQuestion()">Next</button>
        </div>
    </div>

    <script>
    
    </script>
    
    <script src='js/quiz.js'></script> 
    
    
</body>





</html>