<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../common/css/bootstrap.min.css">
    <link rel="stylesheet" href="../common/css/animate.min.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <title>Quiz test</title>
    <style>
       
        .main-box .attempt-box{
            display:fixed;
            justify-content:center;
            align-items:center;
            margin-top:20px;
            width:px;
        }
        .main-box .list-group li{
            border-radius:0!important;
            background-color:solid rgb(255, 255, 255);
            list-style-type: none;

        }
        .main-box .ranker-box{
            width:100%;
            hight:150px;
            display:flex;
            margin-right:0 ;
            justify-content:right;
            align-items:center;
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
            background-color:#e15a2dce;
            color:white;
            text-decoration:none;
            border-radius:5px;
            margin:10px;
            transition:background-color 0.3s;
        }
        .btn:hover{
            background-color: #c04d26ce;
        }
        .features{
            margin-top: 50px;
            text-align: left;
        }
    #contentFrame{
    width: 100%;
    height:calc(100vh - 70px);
    border: none;
    }
    .main-content {
    margin-left:0;
    padding:20px;
    transition:margin-left 0.3s;
    margin-top: 50px;
}
    </style>
</head>
<body>
<div class="conntainer-fluid overflow-hidden main-box">

       
    
    <div class="box">
        <h1 class="uphed">
            Welcome let's go for quiz 
        </h1>
        <p class="subhed">
            Providing efficient quiz management solutions
        </p>
        
        <div >
            <a href="#" onclick="quizstart()"class="btn">
                Start Quiz
            </a>
            
        </div>
        <hr>
        <div class="row mt-3">
            <div class="col-md-4 attempt-box text-center">
                <ul class="list-group" >
                    <li class="list-group-itm">
                        <h2>Number of quiz attempt </h2>
                    </li>
                </ul>
                <div class="content-box">
                    <div class="number-box">
                        <h5>200</h5>
                    </div>
                </div>
            </div>
            <!-- top 10 rankers -->
            <div class="col-md-4 ranker-box text-center">
                <ul class="list-group">
                    <li class="list-group-item text-center">
                        <h3>top 10 rankers</h3>
                    </li>
                </ul>
                <div class="accordion">
                    <h2 class="accordion-header">
                         <!-- <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#view-subject">
                        top 10 rankers
                         </button> -->
                    </h2>
                    <div class="accordion-collapse collapse show" id="view-ranker">
                         <div class="accordion-body" id="subject-list">
                               
                    </div>
                </div>
            </div>
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

    <div class="main-content" id="mainContent">
          <iframe id="contentFrame" style="display: none;"></iframe>
      </div>
    <script>
        function quizstart(){
            //const frame = document.getElementById('contentFrame');
            window.location.href ="subjectselect.php";
            //frame.style.display = 'block';
        }
        
    </script>
</body>
</html>
