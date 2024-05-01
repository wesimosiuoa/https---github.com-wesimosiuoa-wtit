<?php 
    include '../header/instructor.header.php';
    require '../includes/fn.inc.php';
?>
<br><br>
<div class="container">
    <br>
    <h4> Every student enrolled in your course will be displayed here  </h4>
    <hr>
    <?php
        $courseid = $_GET['courseid']; 
        $sql = " SELECT * from stundets INNER JOIN enrolments on enrolments.studentid = stundets.studentid inner JOIN course on enrolments.courseid = course.courseid where course.instructorid = '".$_SESSION['username']."' and course.courseid = '".$courseid."';";
        get_students($sql);
    ?>
</div>