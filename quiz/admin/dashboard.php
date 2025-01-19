<?php
session_start();

// Redirect to login page if the user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: ../company/signInUp.php");
    exit;
}

// Include database connection (ensure this file exists)
require '../company/connection.php';

// Fetch user data from the session (make sure 'name' is set)
$username=$_SESSION['username'];
// Fetch user details from the database based on the username
$query="SELECT * FROM users WHERE username = ?";
$stmt=$conne->prepare($query);
$stmt->bind_param("s",$username); // Bind the username to the query
$stmt->execute();
$result=$stmt->get_result();
// Check if the user exists
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc(); // Fetch user data

    // Store user data in session if you need it for later
    $_SESSION['firstname'] = $user['firstname'];
    $_SESSION['lastname'] = $user['lastname'];
    $_SESSION['email'] = $user['email']; // Optionally store email if needed
} else {
    // If user not found, redirect to login
    header("Location: ../company/signInUp.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="css/dashboard.css">
     <link rel="stylesheet" href="../common/css/bootstrap.min.css">
     <link rel="stylesheet" href="../common/css/animate.min.css">
    <!-- endBootstrap CSS -->

    <!--js-->
    <script src="../common/js/bootstrap.bundle.min.js"></script>
    <script src="../common/js/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>dashboard</title>
</head>
<body>
      <div class="top-strip">
          <div class="menu-btn" onclick="toggleSidebar()">
              <span></span>
              <span></span>
              <span></span>
          </div>
          <h3>Wellcome <?php echo htmlspecialchars($user['firstname']) . " " . htmlspecialchars($user['lastname']); ?>!</h3>
      </div>
          
      


      <div class="sidebar" id="sidebar">
          <div class="profile-pic"></div>
          <a href="#"  onclick="loadhome()"><i class="fas fa-home"></i>Home</a>
          <a href="#" onclick="loadQuizManage()"><i class="fas fa-user-plus"></i>Quiz Management</a>
          <a href="#" onclick="loadcontact()"><i class="fas fa-phone"></i>Contact</a>
          <a href="#" onclick="loadfeedback()"><i class="fas fa-comment"></i>Feedback</a>
          <button  id="logout-btn" class="logout-btn "> <i class="fas fa-sign-out-alt"></i> Logout</button>
      </div>

      <div class="main-content" id="mainContent">
          <iframe id="contentFrame" style="display: none;"></iframe>
      </div>



      <script src="js/dashboard.js"></script>
  </body>
</html>