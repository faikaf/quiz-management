<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../common/css/bootstrap.min.css">
    <link rel="stylesheet" href="../common/css/animate.min.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <title>Quiz Management System</title>
    <style>
       
    .main-box .student-box{
        display:fixed;
        justify-content:center;
        align-items:center;
        margin-top:20px;
        width:px;
    }
   .main-box .list-group li{
    border-radius:0!important;
    background-color:#30287ad1;
    list-style-type: none;

   }
   .main-box .student-box .content-box{
    width:100%;
    hight:150px;
    display:flex;
    justify-content:center;
    align-items:center;
   }
   .main-box .student-box .content-box .number-box{
    width:120px;
    height:120px;
    border:5px solid #30287ad1;
    border-radius:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    margin-top:10px;
   }
        .box{
            max-width:800px;
            margin:50px auto;
            text-align:center;
            padding:20px;
        }
        .uphed{
            color:#2c3e50;
            font-size:2.5em;
            margin-bottom:20px;
        }
        .subtitle{
            color:#34495e;
            font-size:1.2em;
            margin-bottom:30px;
        }
        .btn{
            display:inline-block;
            padding:12px 24px;
            background-color:#30287ad1;
            color:white;
            text-decoration:none;
            border-radius:5px;
            margin:10px;
            transition:background-color 0.3s;
        }
        .btn:hover{
            background-color: #211b57ce;
        }
        .features{
            margin-top: 50px;
            text-align: left;
        }
    </style>
</head>
<body>
<div class="conntainer-fluid overflow-hidden main-box">
        <div class="row mt-3">
            <div class="col-md-4 student-box text-center">
                <ul class="list-group" >
                    <li class="list-group-itm">
                        <h2>Student Detail </h2>
                    </li>
                </ul>
                <div class="content-box">
                    <div class="number-box">
                        <h5>200</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 student-box text-center">
                <ul class="list-group" >
                    <li class="list-group-itm">
                        <h2>Number of quiz </h2>
                    </li>
                </ul>
                <div class="content-box">
                    <div class="number-box">
                        <h5>200</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 student-box text-center">
                <ul class="list-group" >
                    <li class="list-group-itm">
                        <h2>Number of subject</h2>
                    </li>
                </ul>
                <div class="content-box">
                    <div class="number-box">
                        <h5>8</h5>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="box">
        <h1 class="uphed">
            Welcome to Our Quiz Management System 
        </h1>
        <p class="subhed">
            Providing efficient quiz management solutions
        </p>
        
        <div >
            <a href="#" onclick="loadPatientReg()"class="btn">
                Student Detail
            </a>
            <a href="#" onclick="loadappointment()"class="btn">
             ADD Quiz
            </a>
            <a href="#" onclick="loaddoctordetail()"class="btn">
                Help
            </a>
        </div>

        <div class="features">
            <h2>Our Services:</h2>
            <ul>
                <li>Easy student and admin registration</li>
                <li>Online quiz test</li>
                <li>student records management</li>
                <li>Excelence proformance</li>
                <li>24/7 Emergency services</li>
            </ul>
        </div>
    </div>


    <script>
        function loadPatientReg(){
            window.location.href ="location";
        }
        function loadappointment(){
            window.location.href ="appointmentpage.php";
        }
        function loaddoctordetail(){
            window.location.href = "doctordetail.php";
        }
    </script>
</body>
</html>
