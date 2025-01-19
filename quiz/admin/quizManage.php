<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page</title>
    <!--js-->
    <link rel="stylesheet" href="../common/css/bootstrap.min.css">
    <link rel="stylesheet" href="../common/css/animate.min.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">


    <script src="../common/js/bootstrap.bundle.min.js"></script>
    <script src="../common/js/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="js/sweetalert2.min.js"></script>




</head>
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
</style>
<body>
    <div class="conntainer-fluid overflow-hidden main-box">
        <div class="row mt-3">
            <div class="col-md-4 student-box text-center">
                <ul class="list-group" >
                    <li class="list-group-itm">
                        <h2>Top Rankers </h2>
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
        <!-- add subject and question -->
        <div class="row mt-5">
           <div class="col-md-4">
           <ul class="list-group">
                <li class="list-group-item text-center">
                    <h3>create subject</h3>
                </li>
            </ul>
            <div class="accordion">
                <h2 class="accordion-header">
                    <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#create-subject">
                        Create Subject
                    </button>
                </h2>
                <div class="accordion-collapse collapse" id="create-subject">
                    <div class="accordion-body">
                        <form id="subject-form">
                            <input type="text" id="subject-name" class="form-control subject mb-2" placeholder="subject name">
                            <button id="add-btn" class="btn subject-btn text-white" style="background-color:#30287ad1;">submit</button>
                        </form>
                    </div>
                </div>
            </div>
           </div>
           <!-- Add question -->
            <div class="col-md-8">
                <ul class="list-group">
                    <li class="list-group-item text-center">
                        <h3>create qusetion</h3>
                    </li>
                </ul>
                <div class="accordion">
                    <h2 class="accordion-header">
                        <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#create-question">
                            Create Question
                        </button>
                    </h2>
                    <div class="accordion-collapse collapse" id="create-question">
                        <div class="accordion-body">
                            <form id="questionCreate" method="post">
                                <label>Select Subject:</label>
                                <select name="subject-name" id="suject-select" class="form-select mb-2 suject-select">
                                    <option value="">Select Subject</option>
                                    <?php
                                        Include 'php/get_subjects.php';
                                        
                                        if ($result->num_rows > 0) {
                                            // Output each subject name as an option
                                            while($row = $result->fetch_assoc()) {
                                                var_dump($row);
                                                echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
                                            }
                                        } else {
                                            echo "<option>No subjects available</option>";
                                        }
                                    ?>
                                </select>
                                <label>Enter Question:</label>
                                <input type="text" class="form-control question mb-2 questiontxt" id="question-text" name="questiontxt" placeholder="Question" required>

                                <input type="text" class="form-control option mb-2 option1" id="option1" name="option1" placeholder="Option 1" required>

                                <input type="text" class="form-control option mb-2 option2" id="option2" name="option2" placeholder="Option 2" required>

                                <input type="text" class="form-control option mb-2 option3" id="option3" name="option3" placeholder="Option 3" required>

                                <input type="text" class="form-control option mb-2 option4" id="option4" name="option4" placeholder="Option 4" required>

                                <input type="text" class="form-control answer mb-2 answer" id="answer" name="answer" placeholder="Answer" required>

                                <button type="submit" class="btn text-white" style="background-color:#30287ad1;" name="submitquestion">submit</button>
                            </form>
                        </div>
                    </div>
                </div>
           </div>
        </div>
        <!-- show subject detail -->
        <div class="row mt-5">
            <!-- subject view -->
           <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item text-center">
                        <h3>subjects</h3>
                    </li>
                </ul>
                <div class="accordion">
                    <h2 class="accordion-header">
                        <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#view-subject">
                            All Subject
                        </button>
                    </h2>
                    <div class="accordion-collapse collapse show" id="view-subject">
                        <div class="accordion-body" id="subject-list">
                            
                        </div>
                    </div>
                </div>
           </div>
           
           <div class="col-md-8">
                <ul class="list-group">
                    <li class="list-group-item text-center">
                        <h3>Delete question</h3>
                    </li>
                </ul>
                <div class="accordion">
                    <h2 class="accordion-header">
                        <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#delete-question">
                            Delete question
                        </button>
                    </h2>
                    <div class="accordion-collapse collapse" id="delete-question">
                        <div class="accordion-body">
                            <form>
                                <label>choose Subject:</label>
                                <select name="subject-show" id="subject-show" class="form-select mb-2">
                                    <option value="">choose Subject</option>
                                    <?php
                                        Include 'php/get_subjects.php';
                                        
                                        if ($result->num_rows > 0) {
                                            // Output each subject name as an option
                                            while($row = $result->fetch_assoc()) {
                                                echo "<option>" . $row["name"] . "</option>";
                                            }
                                        } else {
                                            echo "<option>No subjects available</option>";
                                        }
                                    ?>
                                </select>
                                <label>Enter Question no:</label>
                                <input type="text" class="form-control question mb-2" placeholder=" Enter Question">
                                <button class="btn text-white" style="background-color:#30287ad1;">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>


    <script src="js/quizmanage.js"></script>



</body>


</html>