<?php 
    include '../header/admin.header.php';
    require '../includes/fn.inc.php';
?>
<br><br>
<div class="container">
    <hr>
        <a class="nav-link" href="../public/add-intake.php"><i class='fas fa-plus-circle'></i></i> New Intake </a>
        <a class="nav-link" href="../public/close-intake.php"><i class="fas fa-times"></i></i> Close Intake  </a>
        <h3> Red Application Deadline : Closed</h3>
    <hr>
    <div class="container-fluid">
        <?php getIntakes()?>
    </div>
</div>