<?php
session_start();  // Start the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Subject</title>
    <link rel="stylesheet" href="../common/css/bootstrap.min.css">
    <!--end css link-->
    <!--js link-->
    <script src="../common/js/bootstrap.bundle.min.js"></script>
    <script src="../common/js/sweetalert.min.js"></script>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }
        .btn {
            background-color: #e15a2dce;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2em;
            width: 100%;
            margin-top: 20px;
        }
        .btn:hover {
            background-color: #c04d26ce;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Select Subject</h2>
    <form action="" method="POST">
        <select name="subject" id="subject" class="form-control subject" required>
        <option value="">Select Subject</option>
            <?php
            Include '../admin/php/get_subjects.php';
                                        
                    if ($result->num_rows > 0) {
                        // Output each subject name as an option
                         while($row = $result->fetch_assoc()) {
                            
                            echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
                        }
                } else {
                    echo "<option>No subjects available</option>";
                }
            ?>
        </select>
        <button type="submit" class="btn">Start Quiz</button>
    </form>
</div>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['subject']) && !empty($_POST['subject'])) {
        $_SESSION['slt_subject'] = $_POST['subject'];
        // Redirect to the quiz page
        header('Location: quiz.php');
        exit;
    } else {
        echo "<script>alert('No subject selected. Please select a subject first.');</script>";
    }
}
?>


</body>
</html>
