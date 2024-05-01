<?php 
    include '../header/instructor.header.php';
    require '../includes/fn.inc.php';
?>
<br>
<div class="container">
    <br>
    <hr>
    <h4> All students I have </h4>
    <?php 
        $sql = " SELECT * from stundets INNER JOIN enrolments on enrolments.studentid = stundets.studentid inner JOIN course on enrolments.courseid = course.courseid where course.instructorid = '".$_SESSION['username']."';";
        get_students($sql);
    ?>
</div>