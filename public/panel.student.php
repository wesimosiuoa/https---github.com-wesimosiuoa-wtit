<?php 
    //$courseid = '';
    include '../header/student.header.php';
    //require '../includes/dbcon.inc.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Home Page</title>
    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #007bff; /* Blue background color */
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            background-color: #f9f9f9;
        }
        h2{
            background-color: #007bff; 
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="grid">
            <div class="card">
                <h2>Courses</h2>
                <?php 
                    //get student id 
                    require '../includes/fn.inc.php';
                    //getStudentNumber ($_SESSION['username']);
                    getstudentcourse ($_SESSION['username']);
                    
                ?>
            </div>
            <!-- <div class="card">
                <h2>Recommended Courses</h2>
                <p>Course A</p>
                <p>Course B</p>
                <p>Course C</p>
            </div> -->
            <div class="card">
                <h2>Enrol</h2>
                <p> 
                    <?php 
                        $date = date("Y-m-d");
                        if (isset ($_POST['submit'])){
                            require '../includes/dbcon.inc.php';
                            $coursename = mysqli_real_escape_string($conn, $_POST['course']);
                            $intake = getIntake();
                            
                            enrol($coursename, $_SESSION['username'], $date, $intake, $_SESSION['username']);
                        }
                    ?>
                    <form action="" method="POST">
                        <label for="course"> Select course </label>
                        <select name="course" id="" class="form-control">
                            <option value=""> - - -</option>
                            <?php 
                                getcourse ();
                            ?>
                        </select>
                        <!-- <label for="intake"> Intake </label> -->
                        <!-- <input type="text" value ="<?=getIntake()?>" name="intake" id="" class="form-control" placeholder=""> -->
                        <br>
                        <?php 
                            if (coursestatus() == "inactive"){
                                ?>
                                    <button disabled type="submit" class="btn btn-primary"><i class="fas fa-user-plus"></i> Closed </button>
                                <?php
                            }
                            else {
                                ?>
                                    <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-user-plus"></i> Enrol Now</button>
                                <?php
                            }
                        ?>
                    </form> 
                </p>

            </div>
            
            <div class="card">
                <h2>Payments Overview</h2>
                <p> 
                    Total   : LSL <?php echo totalAmountToBePaidByStudent(getstudentid($_SESSION['username']))?> 
                </p>
                <p> Paid    : LSL <?php if (amountpaid(getstudentid($_SESSION['username'])) == 0){echo 0;}else {echo amountpaid(getstudentid($_SESSION['username']));}?> </p>
                <p> Owing   : LSL 
                    <?php
                        if (amountowedbystudents(totalAmountToBePaidByStudent(getstudentid($_SESSION['username'])), amountpaid(getstudentid($_SESSION['username']))) <1){
                            echo 0;
                        }
                        else {
                            echo amountowedbystudents(totalAmountToBePaidByStudent(getstudentid($_SESSION['username'])), amountpaid(getstudentid($_SESSION['username'])));
                        }
                    ?> </p>
            </div>
            <div class="card">
                <h2>Pay Here ... </h2>
                <p> 
                    <?php 
                        if (isset($_POST['makepayment'])){
                            require '../includes/dbcon.inc.php';
                            $amount = mysqli_real_escape_string($conn, $_POST['amount']);
                            $method = mysqli_real_escape_string($conn, $_POST['paymentMethod']);
                            $roll = getenrolment(getStudentNumber ($_SESSION['username']));
                            //$courseid = mysqli_real_escape_string($conn, $_POST['course']);
                            $date = date ("Y-m-d");
                            //amountowedbystudents(totalAmountToBePaidByStudent(getstudentid($_SESSION['username'])), amountpaid(getstudentid($_SESSION['username'])))                            
                            if ($amount > amountowedbystudents(totalAmountToBePaidByStudent(getstudentid($_SESSION['username'])), amountpaid(getstudentid($_SESSION['username'])))){
                                $pay = amountowedbystudents(totalAmountToBePaidByStudent(getstudentid($_SESSION['username'])), amountpaid(getstudentid($_SESSION['username'])));
                                sucess(" You have to pay LSL {$pay} ");
                            }
                            else {
                                makepayment($amount, $method, $roll,$date);
                            }
                            
                        }
                    ?>
                    <form action="" method="post">
                        <label for=""> Amount </label>
                        <input type="number" name="amount" id="" class="form-control" placeholder=" Enter amount you are paying ">
                        <br>
                        <label for="paymentMethod"> Payment </label>
                        <select name="paymentMethod" id="" class="form-control">
                            <option value=""> - - - </option>
                            <option value="ecocash"> Ecocash</option>
                            <option value="mpesa"> Mpesa</option>
                            <option value="eft"> EFT</option>
                        </select>
                        <!--    <label for="course">Course</label> -->
                        <!-- <select name="course" id="" class="form-control">
                            <option value=""> - - - </option>
                            <?php //getcourse ();?>
                        </select> -->
                        <br>
                        <button type="submit" name="makepayment" class="btn btn-primary"><i class="fas fa-money-bill"></i> Pay Now</button>
                    </form>
                </p>
            </div>
            <div class="card">
                <h2>Recent Activity</h2>
                <p>Activity 1</p>
                <p>Activity 2</p>
                <p>Activity 3</p>
            </div>
            <div class="card">
                <h2>Feedback and Surveys</h2>
                <p>Feedback Form</p>
                <p><a href="add-survey.php">Survey</a></p>
                <p>Comments</p>
            </div>
        </div>
    </div>

</body>

</html>


