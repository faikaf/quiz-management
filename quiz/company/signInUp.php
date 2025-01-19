<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--css link-->
    <link rel="stylesheet" href="css/company.css"> 
    <link rel="stylesheet" href="../common/css/bootstrap.min.css">
    <!--end css link-->
    <!--js link-->
    <script src="../common/js/bootstrap.bundle.min.js"></script>
    <script src="../common/js/sweetalert.min.js"></script>

    
   
    <!--end js link-->
    <title>admin login</title>
</head>
<body>
    <div class="container  bg-white main-box">
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a href="#" class="navbar-brand ">
                    <img src="../assets/logo1.png" alt="" width="30"   height="30">Quiz
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <div class="navbar-nav w-100 justify-content-end">
                        <a href="" class="nav-link">home</a>
                        <a href="" class="nav-link">portfolio</a>
                        <a href="" class="nav-link">about us</a>
                        <a href="" class="nav-link">contac</a>
                        <a href="#" class="nav-link btn signup-btn  bg-info">sign up</a>
                        <a href="#" class="nav-link btn d-none login-btn bg-info">sign in</a>
                    </div>
                </div>
            </div>
        </nav>
        <!--end navbar-->

        <!--login-->
        <div class="row">
            <div class="col-md-6">
                <div class="login-box active">
                    <h1>Admin Login</h1>
                    <form  method= "POST" action="" >
                        <!-- username input -->
                        <label for="username" >
                            <img src="../assets/adminlogo.png" alt="" width="15" height="15">
                            username
                        </label>
                        <input type="text" id="username" name="username" class="form-control mb-3" required  >
                        <!-- password input -->
                        <label for="password">
                            <img src="../assets/Password.png" alt="" width="15" height="15">
                            Password
                        </label>
                        <input type="password" id="password" name="password" class="form-control mb-3" required  autocomplete="off">
                        <button name="login" class="btn btn-primary custom-progress-bar mt-3 mb-3 w-100">Login</button>
                        <a href="" class="text-center">Forgot Password</a>
                    
                    </form>
                </div>
                <!-- signup -->
                <div class="signup-box ">
                    <h1>Wellcome</h1>
                    <form class="signup-form" action="" method="POST">
                        <label for="fname">First Name</label>
                        <input type="text" id="FirstName" class="form-control mb-3" name="firstname" required >

                        <label for="lname">Last Name</label>
                        <input type="text" id="LastName" class="form-control mb-3" name="lastname" required >

                        <label for="username">username</label>
                        <input type="text" id="username" class="form-control mb-3" name="username" required >

                        <label for="email">Email Address</label>
                        <input type="email" id="email" class="form-control mb-3" name="email" required >

                        <label for="password">Password</label>
                        <input type="password" id="pass" class="form-control mb-3" name="password" required>

                        <label for="Cpss"> Confirm Password</label>
                        <input type="password" id="Cpass" class="form-control mb-3" name="cpassword" required>

                        <label for="authentication"> Authentication Code</label>
                        <input type="text" id="Authentication" class="form-control mb-3" name="authentication" required>

                        <button class="btn btn-primary custom-progress-bar mt-3 mb-3 w-100" name="register">
                            Signup
                        </button>

                        <a href="" class="text-center">Alredy a user <strong>go back</strong></a>
                    
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="option-box wb-100">
                    <!-- Button for Student Login -->
                    <button class="btn btn-primary custom-progress-bar mt-3 mb-3 w-10 studentlogin-btn" name="studentLogin">
                        Student Login!
                    </button>
                </div>
            </div>

        </div>

    </div>
    
    <script src="js/company.js"></script>
</body>

</html>


<?php 
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    if (!is_object($conne)) {
        die("Database connection is closed.");
    }

    $fname = mysqli_real_escape_string($conne, $_POST['firstname']);
    $lname = mysqli_real_escape_string($conne, $_POST['lastname']);
    $username = mysqli_real_escape_string($conne, $_POST['username']);
    $email = mysqli_real_escape_string($conne, $_POST['email']);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $authentication = mysqli_real_escape_string($conne, $_POST['authentication']);

    if ($password != $cpassword) {
        echo "<script> alert('Password and Confirm Password do not match.');</script>";
        exit;
    }

    if ($authentication != "5555") {
        echo "<script>swal({
            title:\"Incorrect !\",
            text:\"Authentication code.\",
            icon:\"warning\",
            buttons:true,
            dangerMode:true,
        });</script>";
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (firstname, lastname, username, email, password, authentication_code) 
              VALUES ('$fname', '$lname', '$username', '$email', '$hashedPassword', '$authentication')";

    if (mysqli_query($conne, $query)) {
       echo"<script> alert('User registered successfully!'); </script>";
       // Redirect to a specific page after the alert
       echo"<script>window.location.href='signinup.php';</script>";
    } else {
        echo"<script> alert('Failed to create account:".mysqli_error($conne) ."');</script>";
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    if (!is_object($conne)) {
        die("Database connection is closed.");
    }

    // Retrieve and sanitize inputs
    $username = mysqli_real_escape_string($conne, $_POST['username']);
    $password = $_POST['password'];

    // Check if the username exists in the database
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conne->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch user details
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
           // After successful login, store name and user_id in session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            
            echo "<script>
            swal(\"Login successful!\", \"Welcome back, {$user['username']}!\", \"success\")
                .then(() => {
                    window.location.href = '../admin/dashboard.php';
                });
          </script>";
        } else {
            echo "<script>swal({
                title:\"Incorrect Password!\",
                icon:\"warning\",
                buttons:true,
                dangerMode:true,
            });</script>";
            
        }
    } else {
        // Username not found
        echo "<script>swal({
            title: \"Username not found!\",
            icon: \"warning\",
            buttons: true,
            dangerMode: true,
        });</script>";
    }

    $stmt->close();
    
}

?>

