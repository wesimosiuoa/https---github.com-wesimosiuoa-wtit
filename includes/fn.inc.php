<?php 
    function closeIntake (){
        require '../includes/dbcon.inc.php';
        // $closingDate = "";
        // $currentdate = date("Y-m-d");
        // $result = mysqli_query($conn, " select application_deadline from intake");
        // while ($row = mysqli_fetch_assoc($result)){
        //     $closingDate = $row['application_deadline'];
        // }

        // if ($closingDate == $currentdate){
            require '../includes/insert.php';
            $sql = "update course set status = 'inactive';";
            if (executeQuery($sql) == 1){

                $message = " Intake closed ";
                sucess($message);
            }
            else {
                $message = " Error ";
                sucess($message);
            }
        //}
    }
    function openIntake($reopenning){
        require '../includes/dbcon.inc.php';

        //if ($closingDate == $currentdate){
            //require '../includes/insert.php';
            $endDate = date('Y-m-d', strtotime('+6 months', strtotime($reopenning)));
            $sql = "update course set status = 'active', startdate = '".$reopenning."', enddate = '".$endDate."' ;";
            if (executeQuery($sql) == 0){
                echo $conn -> error;
            }

        //}
    }
    function signin ($uname, $pwd){
        session_start();
        $_SESSION['username'] = $uname;
        if ($uname == "wezimosiuoa@gmail.com" && $pwd == "1234"){
            ?>
                <script>
                    window.location.href="panel.admin.php";
                </script>
            <?php
        }
        else{
            require 'dbcon.inc.php';
            $sql = " SELECT * FROM `stundets` 
            WHERE email = '".$uname."' and password = '".$pwd."'; ";
            $result = mysqli_query ($conn, $sql);
            if (mysqli_fetch_assoc($result)  > 0){
                $_SESSION["username"] = $uname;
                //echo "<div class='alert alert-success'>You are logged in!</div>";
                header("Location: ../public/panel.student.php?courseid=''");
            }
            else {
                echo "<div class='alert alert-success'> Incorrect password and email address!</div>";
            }
        }
    }
    function instrcutor_signin ($uname, $pwd){
        session_start();
        require '../includes/dbcon.inc.php';
        $sql = " SELECT * FROM `instructor` 
        WHERE `instructorid` = '".$uname."' and `password` = '".$pwd."';";
        // $sql = " SELECT * FROM `stundets` 
        // WHERE email = '".$uname."' and password = '".$pwd."'; ";
        $result = mysqli_query ($conn, $sql);
        if (mysqli_fetch_assoc($result)  > 0){
            
            $_SESSION["username"] = $uname;
            //echo "<div class='alert alert-success'>You are logged in!</div>";
            header("Location: ../public/panel.instructor.php");
            //echo $_SESSION['username'];
        }
        else {
            echo "<div class='alert alert-success'> Incorrect password and email address!</div>";
        }
    }
    function signinStudent ($uname, $pwd, $courseid){
        session_start();
        //echo "{$uname} {$pwd}";
        require '../includes/dbcon.inc.php';
        $sql = " SELECT * FROM `stundets` WHERE email = '".$uname."' and password = '".$pwd."'; ";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        //echo $sql;
        if ($resultCheck == true){
            //include '../header/student.header.php';
            $_SESSION['username'] = $uname;
            ?>
                <script>
                    window.location.href="../public/confirm-enrol.php?courseid=<?=$courseid?>";
                </script>
            <?php
        }
        else {
            ?>
                <script>
                    alert (" Status \n Your credentials are incorrect, user correct username and password. If you don't have account, please create account by clicking on create account. ");
                </script>
            <?php
            
        }
    }
    function numberOfCourses(){
        require '../includes/dbcon.inc.php';
        $sql = "select count(courseID) as total from course;";
        while ($row = mysqli_fetch_assoc(mysqli_query($conn, $sql))){
            return $row['total'];
        }
    }
    function numberOfInstructors(){
        require '../includes/dbcon.inc.php';
        $sql = "select count(instructorid ) as total from instructor;";
        while ($row = mysqli_fetch_assoc(mysqli_query($conn, $sql))){
            return $row['total'];
        }
    }
    function viewCourse(){
        //echo " working ";
        require '../includes/dbcon.inc.php';
        $sql = "SELECT * FROM course";
        $result = $conn->query($sql);

        // Check if there are any courses
        if ($result->num_rows > 0) {
            // Output data of each row
            ?>
                <table class="table">
                    <thead>
                        <tr>
                            <td scope="col">Course ID </td>
                            <td scope="col">Course Name </td>
                            <td scope="col">Description</td>
                            <td scope="col">Duration</td>
                            <td scope="col">Price</td>
                            <td scope="col">Instructor</td>
                            <td scope="col">Start Date</td>
                            <td scope="col">End Date</td>
                            <td scope="col">Status</td>
                            <td scope="col">Category</td>
                            <td scope="col">Action </td>
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                            <?php 
                                while ($row= mysqli_fetch_assoc($result)){
                                    ?>
                                        <tr>
                                            <td><?php echo $row['courseid']?></td>
                                            <td><?php echo $row['courseName']?></td>
                                            <td><?php echo $row['descrption']?></td>
                                            <td><?php echo $row['duration']?></td>
                                            <td><?php echo $row['price']?></td>
                                            <td><?php echo $row['instructorid']?></td>
                                            <td><?php echo $row['startdate']?></td>
                                            <td><?php echo $row['enddate']?></td>
                                            <td><?php echo $row['status']?></td>
                                            <td><?php echo getcategoryname($row['category_number'])?></td>

                                            <td><a href="../public/update-course.php?coursename=<?=$row['courseName']?>&&desc=<?=$row['descrption']?>&&duration=<?=$row['duration']?>&&price=<?=$row['price']?>&&instructorid=<?=$row['instructorid']?>&&startdate=<?=$row['startdate']?>&&enddate=<?=$row['enddate']?>" ><i style="color:skyblue" class='fas fa-edit'></i></a></td>
                                            <td><a href="" ><i style="color:grey" class='fas fa-eye'></i></a></td>
                                            <td><a href="" ><i style="color:red"class='fas fa-trash-alt'></i></a></td>
                                        </tr>
                                    <?php
                                }
                            ?>
                       
                    </tbody>
                </table>
            <?php
        } else {
            ?>
                <center><h3> No Courses found </h3></center>
            <?php
        }
    }
    function tutors(){
        require '../includes/dbcon.inc.php';
        $sql = " SELECT `instructorid`, fullname from instructor; ";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            ?>
                <option value="<?=$row['instructorid']?>"> <?php echo $row['fullname']?></option>
            <?php
        }
    }
    function addcourse($courseid, $coursename, $desc, $duration, $cost, $instructor, $startdate, $endDate, $category){
        require  '../includes/dbcon.inc.php';
        $sql = "select * from course where courseid = '".$courseid."';";
        $result =  @mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if ( $resultCheck > 0){
            ?>
                <script>
                    alert (" Warning !!! \n Course Already Exists");
                    window.location.href="../public/panel.admin.php";
                </script>
            <?php
        }
        else {
            require 'insert.php';
            $sql = "INSERT INTO `course` (`courseid`, `courseName`, `descrption`, `duration`, `price`, `instructorid`, `startdate`, `enddate`, `status`, `category_number`) 
            VALUES ('".$courseid."', '".$coursename."', '".$desc."', '".$duration."', '".$cost."', '".$instructor."', '".$startdate."', '".$endDate."', 'active', '".$category."');";
            if (executeQuery ($sql) == 1){
                ?>
                    <script>
                        alert(' Sucess !!! \n Your course  has been added');
                        window.location.href='../public/panel.admin.php#addCourse';
                    </script>
                <?php
            }
            else {
                ?>
                    <script>
                        alert(' Failed !!! \n Your course  is been added');
                    </script>
                <?php
            }
        }

    }
    function viewInstructors(){
        require '../includes/dbcon.inc.php';
        $sql = "SELECT * FROM instructor";
        $result = $conn->query($sql);

        // Check if there are any courses
        if ($result->num_rows > 0) {
            // Output data of each row
            ?>
                <table class="table">
                    <thead>
                        <tr>
                            <td scope="col"> Instructot ID </td>
                            <td scope="col"> Full Name </td>
                            <td scope="col"> Email </td>
                            <td scope="col"> Expectise </td>
                            <!-- <td scope="col"> Profile </td> -->
                            <td scope="col"> Action </td>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <?php 
                                while ($row= mysqli_fetch_assoc($result)){
                                    ?>
                                        <tr>
                                            <td><?php echo $row['instructorid']?></td>
                                            <td><?php echo $row['fullname']?></td>
                                            <td><?php echo $row['email']?></td>
                                            <td><?php echo $row['expectise']?></td>
                                            <!-- <td><img src="../instructors/" alt=""></td> -->
                                            <td><a href="" ><i style="color:skyblue" class='fas fa-edit'></i></a></td>
                                            <td><a href="" ><i style="color:grey" class='fas fa-eye'></i></a></td>
                                            <td><a href="" ><i style="color:red"class='fas fa-trash-alt'></i></a></td>
                                        </tr>
                                    <?php
                                }
                            ?>
                       
                    </tbody>
                </table>
            <?php
        } else {
            ?>
                <center><h3> No Instructor found </h3></center>
            <?php
        }
    }
    function get_student_id($email){
        require '../includes/dbcon.inc.php';
        $sql = " select studentid as studentid from stundets where email = '{$email}';";
        $result = mysqli_query ($conn, $sql);
        while ($row=mysqli_fetch_assoc($result)){
            return $row['studentid'];
        }
    }

    //add instructor
    function addinstructor($instructorid, $instructor, $email, $exp){
        require  '../includes/dbcon.inc.php';
        $sql = "select * from  instructor where instructorid = '".$instructorid."';";
        $result =  @mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if ( $resultCheck > 0){
            ?>
                <script>
                    alert (" Warning !!! \n Instructor Already Exists");
                    window.location.href="../public/panel.admin.php";
                </script>
            <?php
        }
       else {
            require 'insert.php';
            $sql = "INSERT INTO `instructor` (`instructorid`, `fullname`, `email`, `expectise`) 
            VALUES ('".$instructorid."', '".$instructor."', '".$email."', '".$exp."');";
            if (executeQuery ($sql) == 1){
                //uploadfile($img_name, $img_size, $temp_name, $error)
                ?>
                    <script>
                        alert(' Sucess !!! \n Your instructor  has been added');
                        window.location.href='../public/panel.admin.php#addCourse';
                    </script>
                <?php
            }
            else {
                ?>
                    <script>
                        alert(' Failed !!! \n Your instructor  is been added');
                    </script>
                <?php
            }
        }        
    }
    function students(){
        require '../includes/dbcon.inc.php';
        $sql = " select * from stundets ";
        $result = mysqli_query ($conn, $sql);
        if (mysqli_num_rows($result) <= 0){
            ?>
                <center> <h2> No students </h2></center>
            <?php
        }
        else {
            ?>
                <table class="table">
                    <thead>
                        <tr>
                            <td scope="col"> Student ID  </td>
                            <td scope="col"> First Name </td>
                            <td scope="col"> Last Name </td>
                            <td scope="col"> Email </td>
                            <td scope="col"> DOB </td>
                            <td scope="col"> Gender </td>
                            <td scope="col"> Country </td>
                            <td scope="col"> Total </td>
                            <td scope="col"> Owing </td>
                            <td scope="col"> Paid </td>
                            <td scope="col"> Status </td>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                                    <tr>
                                        <td><?php echo $row['studentid']?></td>
                                        <td><?php echo $row['fname']?></td>
                                        <td><?php echo $row['lname']?></td>
                                        <td><?php echo $row['email']?></td>
                                        <td><?php echo $row['dob']?></td>
                                        <td><?php echo $row['gender']?></td>
                                        <td><?php echo $row['country']?></td>
                                        <td><?php echo totalAmountToBePaidByStudent($row['studentid'])?></td>
                                        <td><?php echo amountowedbystudents(totalAmountToBePaidByStudent($row['studentid']), amountpaid($row['studentid']))?></td>
                                        <td>
                                            <?php 
                                                if (amountpaid($row['studentid']) < 1){ 
                                                    echo 0;
                                                }else {
                                                    echo amountpaid($row['studentid']);
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                if (amountpaid($row['studentid']) != totalAmountToBePaidByStudent($row['studentid'])){
                                                    ?> <b><sup style="color: red;"> * </sup></b><?php
                                                }
                                                else {
                                                    ?> <b><sup style="color: blue;"> * </sup></b><?php
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            <?php
        }
    }

    function viewCoursesByStudents($sql){
        require '../includes/dbcon.inc.php';
        
        $result = mysqli_query($conn, $sql);
        ?>
        <div class="container-fluid">
            <style>
                .card-title {
                    background-color: #007bff;
                    color: #fff;
                    padding: 0.5rem;
                    animation: fadeInUp 1s ease;
                }
            </style>
            <div class="row">
                <?php
                while ($row = mysqli_fetch_assoc($result)){
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['courseName']?>
                                
                            </h5>
                            <p class="card-text">Description: <?php echo $row['descrption']?></p>
                            <p class="card-text"><img width="50px" height="50px" src="../img/WhatsApp Image 2024-02-13 at 15.45.22_b7bce11a.jpg" alt="">Instructor: <a href="#"><i class="fas fa-info-circle"></i> <?php echo $row['fullname']?></a></p>
                            <p class="card-text">Duration: <?php echo $row['duration']?> months || <?php echo $row['startdate']." to ".$row['enddate']?></p>
                            <p class="card-text">Tuition Free: LSL <?php echo $row['price']?></p>
                            <p class="card-text">Faculty : <?php echo getcategoryname($row['category_number']);?></p>
                            <span class="rating">
                            <?php 
                                echo getStars(course_rating($row['courseid']));
                            ?> 
                            </span>
                            <br><br>

                            <?php 
                                if ($row['status'] == 'inactive'){
                                    ?>
                                    <style>
                                        /* Style for disabled link */
                                        a.disabled {
                                            color: red;
                                            pointer-events: none;
                                            text-decoration: none;
                                            cursor: not-allowed;
                                        }
                                    </style>
                                        <a class="disabled" href="enrol.php?courseid=<?=$row['courseid']?>"><i class="fas fa-user-plus"></i> Intake Closed </a>
                                    <?php
                                }
                                else {
                                    ?>
                                        <a  href="enrol.php?courseid=<?=$row['courseid']?>" class="btn btn-primary"><i class="fas fa-user-plus"></i> Enroll Now</a>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <?php
    }
    function sendEmail ($message, $email, $subject){

        require '../phpmailer/src/Exception.php';
        require '../phpmailer/src/PHPMailer.php';
        require '../phpmailer/src/SMTP.php';

        try {
            $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'wezimosiuoa@gmail.com';
            $mail->Password = 'lkjcjwukldudvpho';
            $mail->SMTPSecure = 'tls'; // Changed from 'ssl' to 'tls'
            $mail->Port = 587; // Changed to Gmail's TLS port
            
            // Verify email address before adding as recipient
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$email) {
                throw new \Exception("Invalid email address.");
            }
            $mail->setFrom('wezimosiuoa@gmail.com');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();

            //include '../header/header.html';
            ?>
                <br><br><br>
                <div class="container" style="padding=50px; border-radius: 5px; background-color: skyblue; width: 50%">
                    <h2> Congradulations </h2>
                    <p>
                        You have begun your process. Email sent to <?php echo $email?>. <br> Please check you email inbox and continue with your process. 
                    </p>
                    <br>
                    <a href="../public/index.php" class="btn btn-danger">Back</a>
                    <br>
                    <br>   
                </div>
            <?php

        } catch (\Exception $err) {
            include '../header/header.html';
            ?><br><?php
            sucess("Error: {$mail->ErrorInfo}"); // Output the error message from PHPMailer
        }
    }
    function getIntake(){
        require '../includes/dbcon.inc.php';
        $sql = " SELECT * FROM `intake` WHERE `intake_id` = (select max(`intake_id`) from intake);";
        while ($row = mysqli_fetch_assoc (mysqli_query($conn, $sql))){
            return $row['intake_id'];
        }
    }
    function getcategoryname($category_number){
        require '../includes/dbcon.inc.php';
        $sql = "select category.name as name from category inner join course on category.category_number = course.category_number where category.category_number = '".$category_number."';";
        $result = mysqli_query ($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            return $row['name'];
        }
    }
    function enrol($courseid, $student, $date, $intake, $email){
        require '../includes/dbcon.inc.php';
        $enrolmentNumber = 0;
        $studentid = "";
        $date = date("Y-m-d");
        $sql = " select count(enrolmentID) as n from enrolments";
        $result = mysqli_query ($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            $enrolmentNumber = $row['n'] + date("s");
        }
        $sql = " select studentid from stundets where email = '".$student."';";
        $res = mysqli_query ($conn, $sql);
        while ($row = mysqli_fetch_assoc($res)){
            $studentid = $row['studentid'];
        }

        $sql = " select enrolmentID from enrolments;";
        $result = mysqli_query ($conn, $sql);
        if (mysqli_num_rows($result) < 0){
            sucess(" Error, please retry in few seconds");
        }
        else {
            require '../includes/insert.php';
            $sql = " select courseid from enrolments where courseid = '".$courseid."' and studentid = '".getstudentid($email)."'; ";
            if (isExisting ($sql) == true ){
                sucess(" You have already enrolled in this course ");
            }else {
                $sql = "INSERT INTO `enrolments` (`enrolmentID`, `studentid`, `courseid`, `enrolmentDate`, `intake_id`) 
                VALUES ('".$enrolmentNumber."', '".$studentid."', '".$courseid."', '".$date."', '".getIntake()."');";
                if (executeQuery ($sql) == 1){
                    
                    ?>
                        <script>
                            alert ( " Congradulation \n You have successfully enrolled with WEZI TECH INSTITUTE OF TECHNOLOGY, we will communicate with you through your email address ");
                            window.location.href="../public/panel.student.php?courseid=<?=$courseid?>";
                        </script>
                    <?php
                }
                else {
                    echo $conn -> error;
                }
            }
        }
    }
    function signup($studentID,$firstName, $lastName, $email, $dob, $gender, $country, $password){
        require '../includes/insert.php';
        $sql = "INSERT INTO `stundets` (`studentid`, `fname`, `lname`, `email`, `dob`, `gender`, `country`, `password`) 
        VALUES ('".$studentID."', '".$firstName."', '".$lastName."', '".$email."', '".$dob."', '".$gender."', '".$country."', '".$password."');";
        if (executeQuery($sql) == 1){
            $message = "
                <h2> Hello {$firstName} {$lastName} !</h2><br/><p>Your account has been created successfully.
                <br>Please log in to access yourAccount created successfully! <a href='http://localhost:8080/wtit/public/sign-in.php'> <strong> Here </strong></a> </p> 
            ";
            $subject = " WELCOME TO WEZI TECH INSTITUTE OF TECHNOLOGY ACCOUNTS";
            sendEmail ($message, $email, $subject);
        }
        else {
            echo " Failed ".$conn -> error;
        }
    }
    function get_course_id ($email){
        require '../includes/dbcon.inc.php';
        $sql = " select courseid as courseid from enrolments where studentid = '".get_student_id($email)."';";
        $result = mysqli_fetch_assoc($conn, $sql);
        while ($row=mysqli_fetch_assoc($result)){
            return $row['courseid'];
        }
            
    }
    function getStudentNumber ($email){
        require '../includes/dbcon.inc.php';
        $sql = " select studentid from stundets where email = '".$email."';";
        $result = mysqli_query ($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            return $row['studentid'];
        }
    }
    function get_chat ($courseid, $student){
        require '../includes/dbcon.inc.php';
        $sql = "SELECT * from chat inner join enrolments on chat.enrolmentID = enrolments.enrolmentID where enrolments.studentid = '".$student."' and enrolments.courseid = '{$courseid}';";
        $result = mysqli_query  ($conn, $sql);
        if (mysqli_num_rows($result) < 1){
            error(" No chat ");
        }
        else {
            while ($row=mysqli_fetch_assoc ($result)){
                //$sql = " select instructor.instructorid from instructor inner JOIN chat on chat.instructorid = chat.instructorid where instructor.email = '".."'; ";
                ?>
                    <center>
                    <p> Message from <?=get_instructor_name ($row['instructorid'])?></p>    
                    <p><?=$row['subject']?> <?=$row['message']?> <?=$row['date']?></p></center>
                <?php
            }
        }
    }
    function get_number_of_chat ($sql){
        require '../includes/dbcon.inc.php';
        $result = mysqli_query ($conn, $sql);
        while ($row=mysqli_fetch_assoc($result)){
            return $row['number_of_chats'];
        }
    }
    function getstudentcourse ($email){
        require '../includes/dbcon.inc.php';
        $sql = "SELECT course.courseName, course.courseid, course.status, course.duration 
        from course INNER JOIN enrolments on course.courseid = enrolments.courseid where enrolments.studentid = '".getStudentNumber($email)."';";

        $result = mysqli_query ($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            ?>
                <ul>
                    <?php 
                        while ($row = mysqli_fetch_assoc ($result)){
                            ?> 
                                <li> <a href="../public/student-course-panel.php?courseid=<?=$row['courseid']?>"><?=$row['courseid']?> </a> <?php echo get_course_name ($row['courseid'])?></li>
                            <?php
                        }
                    ?>
                </ul>
            <?php
        }
        else {
            ?>
                <center> <h2> You have not enrolled in any course </h2></center>
            <?php
        }
    }
    function sucess($message){
        echo '<div class="alert alert-success" role="alert">' . htmlspecialchars($message) . '</div>';
    }
    function error($message){
        echo '<div class="alert alert-danger" role="alert">' . htmlspecialchars($message) . '</div>';
    }
    function addIntake ($intake, $deadline, $reopenning){
        require '../includes/insert.php';
        $sql = " INSERT INTO `intake` (`intake_id`, `intake_date`, `application_deadline`) 
        VALUES (NULL, '".$intake."', '".$deadline."'); ";
        if (executeQuery ($sql) == 1 ){

            ?>
                <br><br><br>
            <?php
            $message = " Thank you. You have created {$intake}. Deadline is {$deadline}";
            sucess($message);
            openIntake($reopenning);
        }
        else{
            $message = " Error !!!";
            sucess($message);
        }
    }
    function getIntakes(){
        require '../includes/dbcon.inc.php';
        $sql = " select * from intake";

        $result = mysqli_query ($conn, $sql);
        
        ?>
            <table class="table"> 
                <thead>
                    <tr>
                        <th>Intake ID </th>
                        <th> Intake Date</th>
                        <th> Deadline </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        while ($row = mysqli_fetch_assoc($result)){
                            ?>
                                <tr>
                                    <td><?php echo $row['intake_id']?></td>
                                    <td><?php echo $row['intake_date']?></td>
                                    <td>
                                        
                                        <?php
                                            if (strtotime($row['application_deadline']) < time()){
                                                ?>
                                                    <span style="color: red"><?php echo $row['application_deadline']?></span>
                                                <?php
                                            }
                                            else {
                                                ?>
                                                    <span ><?php echo $row['application_deadline']?></span>
                                                <?php
                                            }
                                        ?>
                                    </td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        <?php
    }
    function numberOfIntakes (){
        require '../includes/dbcon.inc.php';
        $sql = " SELECT count(intake_id) as numberOfIntakes from intake;";
        while ($row = mysqli_fetch_assoc (mysqli_query($conn, $sql))){
            return $row['numberOfIntakes'];
        }
    }
    function numberofEnrolment (){
        require '../includes/dbcon.inc.php';
        $sql = " SELECT count(enrolmentID) as numberOfEnrolments from enrolments;";
        while ($row = mysqli_fetch_assoc (mysqli_query($conn, $sql))){
            return $row['numberOfEnrolments'];
        }
    }
    function update ($price, $instructor, $coursename){
        require '../includes/insert.php';
        $sql = " update course set price = '".$price."', instructorid  = '".$instructor."' where courseName = '".$coursename."';";
        if (executeQuery ($sql) == 1){
            sucess(" You have sucessfully update {$coursename}'s price with {$price} and instructo with {$instructor}");
        }
        else {
            sucess(" Failed to update {$coursename} details");
        }
    }

    //-----------------------------------------------------------------------
    //Payment 
    //-----------------------------------------------------------------------
    function getpayment(){

    }
    function totalAmountToBePaidByStudent($studentid){
        require '../includes/dbcon.inc.php';
        $sql = "SELECT sum(course.price) as total from course inner join enrolments on course.courseid = enrolments.courseid 
        where enrolments.studentid = '".$studentid."';";
        while ($row=mysqli_fetch_assoc(mysqli_query($conn, $sql))){
            return $row['total'] * 6;
        }
    }
    function amountpaid($stundetid){
        require '../includes/dbcon.inc.php';
        $sql = "SELECT sum(payments.amount) amountpaid from payments INNER JOIN enrolments on payments.enrolmentID = enrolments.enrolmentID where enrolments.studentid = '".$stundetid."';";
        while ($row = mysqli_fetch_assoc(mysqli_query($conn, $sql))){
            return $row['amountpaid'];
        }
    }
    function amountowedbystudents($total, $amountpaid){
        $amountowed = $total - $amountpaid;
        return $amountowed;
    }
    function makepayment($amount, $method, $roll, $date){
        require '../includes/insert.php';
        $sql = "INSERT INTO `payments` (`paymentID`, `enrolmentID`, `amount`, `paymentDate`, `paymentMethod`) 
        VALUES (NULL, '".$roll."', '".$amount."', '".$date."', '".$method."');";
        if (executeQuery($sql) == 1){
            sucess(" Thank you, {$_SESSION['username']} you have you payment. You will recieve you digital reciept on you email address {$_SESSION['username']}");
           
            // $email = $_SESSION['username'];
            // $subject = " WEZI TECH INSTITUTE OF TECHNOLOGY PAYMENTS";
            // sendEmail(" Thank you, payment made", $email, $subject);
        }
        else {
            sucess(" Failed to process you payment ");
        }
    }

    //------------------------------------------------------------------
    //payments end here 
    //-----------------------------------------------------------------
    function getstudentid($user){
        require '../includes/dbcon.inc.php';
        $sql = " SELECT `studentid` from `stundets` WHERE `email` = '".$user."';";
        $result = mysqli_query ($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            return $row['studentid'];
        }
    }
    function getcourse (){
        require '../includes/dbcon.inc.php';
        $sql = " SELECT * FROM `course` ";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            ?>
                <option value="<?=$row['courseid']?>"> <?php  echo $row['courseName']?></option>
            <?php
        }
    }
    function get_course_name ($courseid){
        require '../includes/dbcon.inc.php';
        $sql = " SELECT `courseName` from `course` WHERE `courseid` = '".$courseid."';";
        $result = mysqli_query ($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            return $row['courseName'];
        }
    }
    function coursestatus(){
        require '../includes/dbcon.inc.php';
        $sql = " select status from `course`;";
        $result = mysqli_query ($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            return $row['status'];
        }
    }
    function getenrolment($studentid){
        require '../includes/dbcon.inc.php';
        $sql = " SELECT `enrolmentID` from enrolments where `studentid` = '".$studentid."';";
        $result = mysqli_query ($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            return $row['enrolmentID'];
        }
    }
    function myenrolledcourses ($email, $intake){
        require '../includes/dbcon.inc.php';
        $sql = " SELECT * from course inner join enrolments where enrolments.studentid = '".$email."' AND enrolments.intake_id = '".$intake."'; ";
        $result = mysqli_query ($conn, $sql);   

        if (mysqli_num_rows($result) < 1){
            sucess(" You have not yet enrolled in any course, enroll now");
        }
        else {
            ?>
               <table class="table">
                    <thead>
                        <tr>
                            <td scope="col"> Course # </td>
                            <th scope="col"> Course Name</th>
                            <th scope="col"> Duration </th>
                            <th scope="col"> Price </th>
                            <th scope="col"> Instrcutor #</th>
                            <th scope="col"> Start Date </th>
                            <th scope="col"> End Date </th>
                            <th scope="col"> Enrolment #</th>
                            <th scope="col"> Enroled On </th>
                            <th scope="col"> Intake </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while ($row = mysqli_fetch_assoc($result)){
                                ?>
                                    <tr>
                                        <td><?=$row['courseid']?></td>
                                        <td><?=$row['courseName']?></td>
                                        <td><?=$row['duration']?></td>
                                        <td><?=$row['price']?></td>
                                        <td><?=$row['instructorid']?></td>
                                        <td><?=$row['startdate']?></td>
                                        <td><?=$row['enddate']?></td>
                                        <td><?=$row['enrolmentID']?></td>
                                        <td><?=$row['enrolmentDate']?></td>
                                        <td><?=$row['intake_id']?></td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            <?php
        }
    }
    function isExisting ($sql){
        require '../includes/dbcon.inc.php';
        $result = mysqli_query ($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            return true;
        }
    }
    function studentprofile($email){
        require '../includes/dbcon.inc.php';
        $sql = " SELECT * FROM stundets WHERE email = '".$email."';";
        $result = mysqli_query ($conn, $sql);
        if (mysqli_num_rows ($result) <= 0){
            sucess(" User does not exists ");
        }
        else {
            while ($row = mysqli_fetch_assoc($result)){
                ?>
                    <form action="" method="post">  
                        <div class="form-group">
                            <div class="form-row">
                                <label for="name"> Student ID </label>
                                <input disabled type="text" name="studentid" class="form-control" id="" value="<?=$row['studentid']?>">
                            </div>
                            <div class="form-row">
                                <label for="name"> Name </label>
                                <input disabled type="text" name="name" class="form-control" id="" value="<?=$row['fname']?>">
                            </div>
                            <div class="form-row">
                                <label for="lname"> Last Name </label>
                                <input disabled type="text" name="lname" class="form-control" id="" value="<?=$row['lname']?>">
                            </div>
                            <div class="form-row">
                                <label for="email"> Email </label>
                                <input disabled type="text" name="email" class="form-control" id="" value="<?=$row['email']?>">
                            </div>
                            <div class="form-row">
                                <label for="dob"> Date of Birth </label>
                                <input disabled type="text" name="dob" class="form-control" id="" value="<?=$row['dob']?>">
                            </div>
                            <div class="form-row">
                                <label for="country"> Gender </label>
                                <input disabled type="text" name="gender" class="form-control" id="" value="<?=$row['gender']?>">
                            </div>
                            <div class="form-row">
                                <label for="country"> Country </label>
                                <input disabled type="text" name="country" class="form-control" id="" value="<?=$row['country']?>">
                            </div>
                            <br>
                            <a href="../public/change-password.php" class="btn btn-danger"> Change Password </a>
                        </div>
                    </form>
                <?php
            }
        }
    }
    function get_password($sql){
        require '../includes/dbcon.inc.php';
        $result = mysqli_query ($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            return $row['password'];
        }
    }
    function updatepassword($newpassword, $email){
        require '../includes/insert.php';
        $sql = "  update stundets set password = '".$newpassword."' where email = '".$email."';";
        if (executeQuery($sql) == true ){
            ?> <?php
            sucess (" Your password updated successfully ");
            //$message = "Your password updated successfully";
            //sendEmail ($message, $email, " Password Reset ");
        }
        else {
            $conn -> error;
        }
    }
    function studentenrolment($email){
        require '../includes/dbcon.inc.php';
        $sql = " SELECT * FROM enrolments WHERE studentid = '".getstudentid($email)."';";
        $result = mysqli_query ($conn, $sql);
        if (mysqli_num_rows($result) < 1){
            ?>
                <br>
            <?php
            sucess(" You are not enrolled in any course ");
        }
        else {
            ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"> Enrolement #</th>
                            <!-- <th scope="col"> Student #</th> -->
                            <th scope="col"> Course #</th>
                            <th scope="col"> Date </th>
                            <th scope="col"> Intake #</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while ($row = mysqli_fetch_assoc($result)){
                                ?>
                                    <tr>
                                        <td><?php echo $row['enrolmentID']?></td>
                                        <!-- <td><?php //echo $row['studentid']?></td> -->
                                        <td><?php echo $row['courseid']?></td>
                                        <td><?php echo $row['enrolmentDate']?></td>
                                        <td><?php echo $row['intake_id']?></td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            <?php
        }
    }
    function add_category ($name, $desc){
        require '../includes/insert.php';
        $sql = "INSERT INTO `category` (`category_number`, `name`, `description`) VALUES (NULL, '".$name."', '".$desc."');";
        if (executeQuery($sql) == 1){
            ?>
                <script>
                    alert (" Catgory added !!! "); window.location.href="../public/categories.php";
                </script>
            <?php
        }
        else {
            
            $conn -> error;
        }
    }
    function number_of_courses_in_each_category($category){
        require '../includes/dbcon.inc.php';
        $sql = "select COUNT(category_number) as numberofcourseinonecaterogey from course where category_number = '".$category."';";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            return $row['numberofcourseinonecaterogey'];
        }
    }
    function getcategories(){
        require '../includes/dbcon.inc.php';
        $sql = " SELECT * FROM `category` ; ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) < 1){
            ?>
                <br><br>
                <div class="card">
                    <h3> No categories </h3>
                </div>
            <?php
        }
        else {
            ?>
                <table class="table">
                    <thead>
                        <th> # </th>
                        <th> Name </th>
                        <th> Description </th>
                        <th> No of Courses </th>
                    </thead>
                    <tbody>
                        <?php 
                            while ($row = mysqli_fetch_assoc ($result)){
                                ?>
                                    <tr>
                                        <td><?php echo $row['category_number']?></td>
                                        <td><?php echo $row['name']?></td>
                                        <td><?php echo $row['description']?></td>
                                        <td><?php echo number_of_courses_in_each_category($row['category_number'])?></td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            <?php
        }
    }

    // intructor funtions 
    function get_courses($sql){
        require '../includes/dbcon.inc.php';
        $result = mysqli_query ($conn, $sql);
        if (mysqli_num_rows($result) < 1){
            ?>
                <br>
            <?php
            $message = " No courses found in your course list ";
            // echo '<div class="alert alert-danger" role="alert">' . htmlspecialchars($message) . '</div>';
            error($message);
        }
        else {
                ?>
                    <table class="table">
                        <thead>
                           <tr>
                                <th scope="col"> Course #</th>
                                <th scope="col"> Name </th>
                                <th scope="col"> Duration</th>
                                <th scope="col"> Start Date </th>
                                <th scope="col"> End Date </th>
                                <th scope="col"> Category </th>
                           </tr> 
                        </thead>
                        <tbody>
                            <?php 
                                while ($row=mysqli_fetch_assoc($result)){
                                    ?>
                                        <tr>
                                            <td><?php echo $row['courseid']?></td>
                                            <td><a href="../public/course-details-instructor.php?courseid=<?=$row['courseid']?>"><?php echo $row['courseName'];?></a></td>
                                            <td><?php echo $row['duration']?></td>
                                            <td><?php echo $row['startdate']?></td>
                                            <td><?php echo $row['enddate']?></td>
                                            <td><?php echo getcategoryname($row['category_number']);?></td>
                                        </tr>
                                    <?php
                                }

                            ?>
                        </tbody>
                    </table>
                <?php
            // }
        }
    }
    function get_students($sql){
        require '../includes/dbcon.inc.php';
        $result = mysqli_query ($conn, $sql);
        if (mysqli_num_rows($result) <= 0){
            ?>
                <br>
            <?php
            $message = " No student enrolled in your course ";
            error ($message);
        }
        else {
            ?>
                <table class="table">
                    <thead>
                        <tr>
                            <td scope="col"> Student ID  </td>
                            <td scope="col"> First Name </td>
                            <td scope="col"> Last Name </td>
                            <td scope="col"> Email </td>
                            <td scope="col"> DOB </td>
                            <td scope="col"> Gender </td>
                            <td scope="col"> Country </td>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                                    <tr>
                                        <td><?php echo $row['studentid']?></td>
                                        <td><?php echo $row['fname']?></td>
                                        <td><?php echo $row['lname']?></td>
                                        <td><?php echo $row['email']?></td>
                                        <td><?php echo $row['dob']?></td>
                                        <td><?php echo $row['gender']?></td>
                                        <td><?php echo $row['country']?></td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            <?php
        }
    }
    function get_student_whatsapp_number($sql){
        require '../includes/dbcon.inc.php';
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc ($result)){
            return $row['whatsapp_number'];
        }
    }
    function get_student_email_address ($sql){
        require '../includes/dbcon.inc.php';
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc ($result)){
            return $row['email'];
        }
    }

    //encode txt for whatsapp
    function urlencode_custom($text){
        return urlencode($text);
    }
    function instructor_send_email ($message, $email, $subject){
        require '../phpmailer/src/Exception.php';
        require '../phpmailer/src/PHPMailer.php';
        require '../phpmailer/src/SMTP.php';

        try {
            $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'wezimosiuoa@gmail.com';
            $mail->Password = 'lkjcjwukldudvpho';
            $mail->SMTPSecure = 'tls'; // Changed from 'ssl' to 'tls'
            $mail->Port = 587; // Changed to Gmail's TLS port
            
            // Verify email address before adding as recipient
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$email) {
                throw new \Exception("Invalid email address.");
            }
            $mail->setFrom('wezimosiuoa@gmail.com');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();

            //include '../header/header.html';
            ?>
                <br><br><br>
            <?php
            sucess(" Email has being sent to your students !!! ");

        } catch (\Exception $err) {
            //include '../header/header.html';
            ?><br><?php
            error("Error: {$mail->ErrorInfo}"); // Output the error message from PHPMailer
        }
    }
    function chat_with_students($instructor, $message, $subject, $enrolment, $date){
        //$encodedMessage = urlencode_custom($message);
        
        //instructor_send_email($message, $email, $subject);
        require '../includes/dbcon.inc.php';
        $sql = "INSERT INTO `chat` (`chatid`, `enrolmentID`, `subject`, `message`, `date`, `instructorid`) 
        VALUES (NULL, '".$enrolment."', '".$subject."', '".$message."', '".$date."', '".$instructor."');";
        $result = mysqli_query ($conn, $sql);
        if ($result == true){
            sucess(" Message sent !!! ");
        }
        else {
            error ($conn->error);
        }
    }
    function get_enrolment_id ($courseid){
        require '../includes/dbcon.inc.php';
        $sql = "select enrolmentID as enrolmentID from enrolments where courseid = '{$courseid}';";
        $result = mysqli_query ($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            return $row['enrolmentID'];
        }
    }
    function get_instructor_id ($sql){
        require '../includes/dbcon.inc.php';
        
        $result = mysqli_query ($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            return $row['instructorid'];
        }
    }
    function get_instructor_name ($instructorid){
        require '../includes/dbcon.inc.php';
        $sql = " select fullname as instructorid from instructor where instructorid = '".$instructorid."';";
        $result = mysqli_query ($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            return $row['instructorid'];
        }
    }
    //survey, feedback, ratings
    function add_survey($contentRating, $instructorsRating, $projectsRating, $supportRating, $valueRating, $comments, $courseid){
        require '../includes/insert.php';
        $sql = " INSERT INTO `survey` (`sno`, `contentRating`, `instructorsRating`, `projectsRating`, `supportRating`, `valueRating`, `comments`, `courseid`) 
        VALUES (NULL, '".$contentRating."', '".$instructorsRating."', '".$projectsRating."', '".$supportRating."', '".$valueRating."', '".$comments."', '".$courseid."'); ";

        if (executeQuery ($sql) == 1){
            ?><br><?php
            sucess(" You have recorded your suvery on {$courseid} ");
        }
        else {
            error (" Error ".$conn -> error);
        }
    }

    //rating course
    function course_rating ($courseid){
        //get total course rating 
        require '../includes/dbcon.inc.php';
        $sql = " select * from survey where courseid = '".$courseid."';";
        $result = mysqli_query ($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            //get rating 
            while ($row = mysqli_fetch_assoc ($result)){
                $total = $row['contentRating'] + $row['instructorsRating'] + $row['projectsRating'] + $row['supportRating'] + $row['valueRating'];
                return $total / 5;
            }
        }
    }
    function getStars($rating) {
        $stars = '';
        for ($i = 1; $i <= 5; $i++) {
            $stars .= ($i <= $rating) ? '⭐️' : '☆';
        }
        return $stars;
    } 

    //time table
    function get_enrolment ($sql){
        require '../includes/dbcon.inc.php';
        $result  = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)){
            while ($row = mysqli_fetch_assoc($result)){
                ?>
                    <?=$row['enrolmentID']?>  <a href="generate_table.php?courseid=<?=$row['courseid']?>"><?=$row['courseid']?></a> <?=$row['enrolmentDate']?> <?=$row['intake_id']?> <br>
                <?php
                
            }
        }
        else {
            echo " You are not enrolled in any course ";
        }
    }
    function time_slot_exists ($time, $student, $day, $courseid ){
        require '../includes/dbcon.inc.php';
        $sql = " select time as time, day as day, courseid as courseid from time_table where courseid= '".$courseid."' and day = '{$day}' and studentid = '".get_student_id($student)."' and time = '{$time}';";
        $result = mysqli_query ($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            return 1;
        }
    }
    function get_number_of_classes ($courseid, $student){
        require '../includes/dbcon.inc.php';
        $sql = " select count(courseid) as course from time_table where courseid = '".$courseid."' and studentid = '".$student."';";
        $result = mysqli_query ($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            return $row['course'];
        }
    }
    function add_time_table ($day, $time, $courseid, $student){
        require '../includes/dbcon.inc.php';
        $sql = "INSERT INTO `time_table` (`table_number`, `day`, `time`, `courseid`, `studentid`) 
        VALUES (NULL, '".$day."', '".$time."', '".$courseid."', '".$student."');";
        $result = mysqli_query ($conn, $sql);

        //if (time_slot_exists ($time, $student, $day, $courseid) ==  0){
        
        if (get_number_of_classes($courseid, $student) < 3){
            if ($result == true){
                echo " {$courseid} added to your table add ". get_number_of_classes($courseid, get_student_id($_SESSION['username'])) ;
            }
            else {
                echo $conn -> error;
            }
        }
        else {
            error(" You have added three courses ");
        }
    }
    function get_time_table($sql){
        require '../includes/dbcon.inc.php';
        $result = mysqli_query ($conn, $sql);
        if (mysqli_num_rows($result) < 1){
            error (" You currently have no class now. ");
        }
        else {
            ?>
                <table class="table"> 
                    <thead>
                        <thead>
                            <tr>
                                <th> Day </th>
                                <th> Time </th>
                                <th> Course </th>
                                <th> Student ID </th>
                            </tr>
                        </thead>
                    </thead>
                    <tbody>
                        <?php 
                            while ($row = mysqli_fetch_assoc ($result)){
                                ?>
                                    <tr>
                                        <td><?=$row['day']?></td>
                                        <td><?=$row['time']?></td>
                                        <td><?=$row['courseid']?></td>
                                        <td><?=$row['studentid']?></td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            <?php
        }
    }
    function time_table ($sql){
        ?>
        
        <?php
                require '../includes/dbcon.inc.php';
                $result = mysqli_query($conn, $sql);
            ?>

            <table class="table">
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                        <th>Satuarday</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Define an array to hold timetable data
                        $timetable = [];

                        // Fetch data and populate the timetable array
                        while ($row = mysqli_fetch_assoc($result)) {
                            $time = $row['time'];
                            $day = $row['day'];
                            $course = $row['courseid'];
                            $studentID = $row['studentid'];

                            if (!isset($timetable[$time])) {
                                $timetable[$time] = [
                                    'Monday' => '-',
                                    'Tuesday' => '-',
                                    'Wednesday' => '-',
                                    'Thursday' => '-',
                                    'Friday' => '-', 
                                    'Sartuaday' => '-'
                                ];
                            }

                            // Assign course to the corresponding day and time slot
                            $timetable[$time][$day] = "{$course}";
                        }

                        // Loop through each time slot and display the timetable
                        foreach ($timetable as $time => $days) {
                            echo "<tr>";
                            echo "<td>{$time}</td>";
                            echo "<td>{$days['Monday']}</td>";
                            echo "<td>{$days['Tuesday']}</td>";
                            echo "<td>{$days['Wednesday']}</td>";
                            echo "<td>{$days['Thursday']}</td>";
                            echo "<td>{$days['Friday']}</td>";
                            echo "<td>{$days['Sartuaday']}</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>

        <?php
    }
    
?>