<?php 
    include '../header/admin.header.php';
    require '../includes/fn.inc.php';
    
?>
<br>


<main class="mt-5">
    <h2> Instructors </h2>
<hr>
    <a class="nav-link" href="add-instructor.php"><i class='fas fa-plus-circle'></i> Instructor </a>
<hr>
    <div class="container">
        <?php viewInstructors();?>
    </div>
</main>