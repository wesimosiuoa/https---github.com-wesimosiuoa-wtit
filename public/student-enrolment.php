<?php 
    include '../header/student.header.php';
?>
<div class="container">
    <hr>
        <h3><?php echo strtoupper(" my enrolments ")?></h3>
    <hr>
    <?php 
        require '../includes/fn.inc.php';
        studentenrolment($_SESSION['username']);
    ?>
</div>