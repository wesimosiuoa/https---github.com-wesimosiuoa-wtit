<?php 
    include '../header/admin.header.php';
    require '../includes/fn.inc.php';
    
?>
<br>


<main class="mt-5">
    <h2> Courses </h2>
<hr>
    <a style="margin-left: 20px;" class="nav-link" href="add-course.php">Course <i class='fas fa-plus-circle'></i></a>
<hr>
    <div class="container">
        <?php viewCourse();?>
    </div>
</main>