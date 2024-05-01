<?php 
    include '../includes/dbcon.inc.php';
    require '../includes/fn.inc.php';
    session_start();
    $coruseid = $_GET['courseid'];

    $student = $_SESSION['username'] ;
    $coursename = "";
    $instructor = "";
    $studentName = "";
    $instructorid = "";

    $sql = " SELECT * from course inner join instructor on course.instructorid = instructor.instructorid where course.courseid='".$coruseid."'";
    $result = mysqli_query($conn, $sql);
    while ($row= mysqli_fetch_assoc($result)){
        $coursename = $row['courseName'];
        $instructor = $row['fullname'];
        $instructorid = $row['instructorid'];
        //$studentName = $row['lname']." ".$row['fname'];
    }
    $message = "
        <div style='background-color: #f2f2f2; padding: 20px;'>
            <h2 style='color: #333;'>Enrollment Confirmation</h2>
            <p>Hello Student ,</p>
            <p>We are pleased to start you journey in {$coursename} at WEZI TECH INSTITUTE OF TECHNOLOGY.
            Below are the details of your enrollment:</p>
            <div class='container'>
                <center>
                    <strong> 
                        Student Email Address : {$_SESSION['username']};<br />
                        Course ID : {$coruseid}<br />
                        Course Name : {$coursename}<br />
                        Instructor : {$instructor}
                    </strong>
                    <br />
                    <a href='http://localhost:8080/wtit/public/redirect-confirm.php?courseid=$coruseid&&instructorid=$instructorid'> Confirm </a>
                </center>
            </div>
            <p>Please review the details provided above. If you have any questions or concerns, feel free to contact our support team at wezimosiuoa@gmail.com or call us at +266 5995 9655.</p>

            <p>Thank you for choosing our institution. We look forward to having you as a student!</p>
            
            <p>Best regards,<br> WEZI TECH INSTITUTE OF TECHNOLOGY</p>
        </div>
    ";
    $subject = " WELCOME TO WEZI TECH INSTITUTE OF TECHNOLOGY";
    
    sendEmail ($message, $_SESSION['username'], $subject)
    ?>
    
    <?php
?>