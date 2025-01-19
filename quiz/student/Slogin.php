<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--css link-->
    <link rel="stylesheet" href="css/student.css"> 
    <link rel="stylesheet" href="../common/css/bootstrap.min.css">
    <!--end css link-->
    <!--js link-->
    <script src="../common/js/bootstrap.bundle.min.js"></script>
    <script src="../common/js/sweetalert.min.js"></script>
    
   
    <!--end js link-->
    <title>student Login</title>
</head>
<body>
    <div class="container bg-white main-box">
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
                    <h1>Student Login</h1>
                    <form  method= "POST" action="">
                        <!-- username input -->
                        <label for="username" >
                            <img src="../assets/adminlogo.png" alt="" width="15" height="15">
                            username
                        </label>
                        <input type="text" id="username" name="email" class="form-control mb-3" required >
                        <!-- password input -->
                        <label for="password">
                            <img src="../assets/Password.png" alt="" width="15" height="15">
                            Password
                        </label>
                        <input type="password" id="password" name="password" class="form-control mb-3" required >
                        <button name="login" class="btn btn-primary custom-progress-bar mt-3 mb-3 w-100">Login</button>
                        <a href="" class="text-center">Forgot Password</a>
                    
                    </form>
                </div>
            <!-- signup -->
                <div class="signup-box">
                    <h1>Wellcome</h1>
                    <form class="signup-form" action="" method="POST">
                        <label for="fname"> Name</label>
                        <input type="text" id="FirstName" class="form-control mb-3" name="firstname" required >

                        <label for="email">Email Address</label>
                        <input type="email" id="email" class="form-control mb-3" name="email" required >
                        
                        <label for="username">Qualification</label>
                        <select  class="form-control mb-3" name="qualifi" required>
                            <option value="" disabled selected>Select your course</option>
                            <option value="bca">Bachelor of Computer Applications (BCA)</option>
                            <option value="bba">Bachelor of Business Administration (BBA)</option>
                            <option value="bsc_cs">Bachelor of Science in Computer Science (B.Sc CS)</option>
                            <option value="be_cse">Bachelor of Engineering in Computer Science (BE CSE)</option>
                            <option value="mba">Master of Business Administration (MBA)</option>
                            <option value="mca">Master of Computer Applications (MCA)</option>
                            <option value="msc_cs">Master of Science in Computer Science (M.Sc CS)</option>
                            <option value="diploma_cs">Diploma in Computer Science</option>
                            <option value="phd_cs">Ph.D. in Computer Science</option>
                        </select>


                        <label for="password">Password</label>
                        <input type="password" id="pass" class="form-control mb-3" name="password" required>

                        <label for="Cpss"> Confirm Password</label>
                        <input type="password" id="Cpass" class="form-control mb-3" name="cpassword" required>

                        <label for="phone">Phone Number</label>
                        <input type="text" id="phone" class="form-control mb-3" name="phone" maxlength="10" required >
                        

                        <button class="btn btn-primary custom-progress-bar mt-3 mb-3 w-100" name="studentRegister">
                            Signup
                        </button>

                        <a href="" class="text-center">Alredy a user <strong>go back</strong></a>
                    
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="option-box wb-100">
                <button class="btn btn-primary custom-progress-bar mt-3 mb-3 w-10 adminlogin-btn" name="AdminLogin">
                            Admin Login!
                        </button>
                
                </div>
            </div>
        </div>

    </div>
    
    <script src="js/student.js"></script>

    
</body>

</html>


<?php 

include("../company/connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['studentRegister'])) {
    if (!is_object($conne)) {
        die("Database connection is closed.");
    }

    $fname = mysqli_real_escape_string($conne, $_POST['firstname']);
    $email = mysqli_real_escape_string($conne, $_POST['email']);
    $qualifi = mysqli_real_escape_string($conne, $_POST['qualifi']);
    $phone = mysqli_real_escape_string($conne, $_POST['phone']);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    

    if ($password != $cpassword) {
        echo "<script> alert('Password and Confirm Password do not match.');</script>";
        exit;
    }
    // Hash the password
    $hashedPassword=password_hash($password,PASSWORD_DEFAULT);
    $query="INSERT INTO student_users (name,email,qualification,password,phone) 
              VALUES('$fname','$email''$qualifi','$hashedPassword','$phone')";

    if (mysqli_query($conne, $query)) {
       echo"<script> alert('User registered successfully!'); </script>";
       // Redirect to a specific page after the alert
       echo"<script>window.location.href='slogin.php';</script>";
    } else {
        echo"<script> alert('Failed to create account:".mysqli_error($conne) ."');</script>";
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    if (!is_object($conne)) {
        die("Database connection is closed.");
    }

    // Retrieve and sanitize inputs
    $email = mysqli_real_escape_string($conne, $_POST['email']);
    $password = $_POST['password']; // Corrected

    // Check if the email exists in the database
    $query = "SELECT * FROM student_users WHERE email = ?";
    $stmt = $conne->prepare($query);

    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Fetch user details
            $user = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Set session variables
                // Set session variables for logged-in user
                $_SESSION['email'] = $user['email'];
                $_SESSION['name'] = $user['name'];
                // Login successful
                echo "<script>
                    swal(\"LogIn success!\")
                        .then(() => {
                            window.location.href = 'student_dashboard.php';
                        });
                </script>";
            } else {
                // Incorrect password
                echo "<script>
                    swal({
                        title: \"Incorrect Password!\",
                        icon: \"warning\",
                        buttons: true,
                        dangerMode: true,
                    });
                </script>";
            }
        } else {
            // Email not found
            echo "<script>
                swal({
                    title: \"Email not found!\",
                    icon: \"warning\",
                    buttons: true,
                    dangerMode: true,
                });
            </script>";
        }

        $stmt->close();
    } else {
        die("Failed to prepare the SQL statement.");
    }

    $conne->close();
}

?>