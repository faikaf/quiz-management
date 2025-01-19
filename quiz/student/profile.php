<?php
session_start();
include("../company/connection.php");

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: slogin.php");
    exit;
}

// Fetch user details from the database
$email = $_SESSION['email'];
$query = "SELECT * FROM student_users WHERE email = ?";
$stmt = $conne->prepare($query);

if ($stmt){
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows>0) {
        $user = $result->fetch_assoc();
    }else {
        echo "<script>alert('User not found!');</script>";
        header("Location: slogin.php");
        exit;
    }

    $stmt->close();
}else{
    die("Failed to prepare the SQL statement: " . $conne->error);
}

$conne->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- CSS Links -->
    <link rel="stylesheet" href="../common/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/profile.css">
    <script src="../common/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color:rgb(255, 255, 255);
            display: fixed;
            height:100vh;
        }
        
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            height:100vh;
        }
        .card-header {
            background-color: #c04d26ce;
            border-radius: 10px 10px 0 0;
        }
        .card-body {
            height: 100vh;
            padding: 20px;
        }
        .form-group {
            height: ;
            margin-bottom: 20px;
        }
        .btn-primary:hover {
            background-color:rgb(87, 7, 0);
        }
    </style>
</head>
<body>
    <div class="container-fluid mt-5">
        <div class="card shadow-lg">
            <div class="card-header custom-color text-white text-center">
                <h2>User Profile</h2>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4 text-center">
                        <img src="../assets/profile_default.png" alt="Profile Picture" class="rounded-circle" width="150">
                    </div>
                    <div class="col-md-8">
                        <h4>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h4>
                        <p class="text-muted">Below are your account details:</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Qualification:</strong> <?php echo htmlspecialchars($user['qualification']); ?></p>
                        <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
                    </div>
                    <hr>
                    <div class="col-md-6">
                        <p><strong> Total Score:</strong> <?php echo htmlspecialchars($user['score']); ?></p>
                        <p><strong>Attempts:</strong> <?php echo htmlspecialchars($user['attempts']); ?></p>
                    </div>
                </div>
                <hr>
                <div class="text-center">
                    <a href="" class="btn btn-danger">Edit</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
