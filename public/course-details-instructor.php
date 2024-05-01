<?php 
    include '../header/instructor.header.php';
    require '../includes/fn.inc.php';
    $courseid = $_GET['courseid']; 
?>
<br><br>
<div class="container">
    <br>
    <h4> Your <span style="color: red"> <?php echo get_course_name($courseid);?> </span> Dashboard  </h4>
    <hr>
    <?php

        
        ?>
            <a href="instructor-schedule.php?courseid=<?=$courseid?>"> Schedule </a><br>
            <a href="students-in-each-course.php?courseid=<?=$courseid?>"> Students </a><br>
            <a href="chatbot.php?courseid=<?=$courseid?>"> Chatbot </a><br>
            <a href="chatbot.php?courseid=<?=$courseid?>"> Feedback </a><br>
            <a href="student-survey.php?courseid=<?=$courseid?>"> Survey </a>
        <?php
    ?>
</div>