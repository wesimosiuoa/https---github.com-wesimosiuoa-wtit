<?php 
    include '../header/student.header.php';
    require '../includes/fn.inc.php';
?>
<br>
<div class="container">
    <h2> My courses </h2>
    <?php 
        myenrolledcourses (getStudentNumber ($_SESSION['username']), getIntake());
    ?>
</div>