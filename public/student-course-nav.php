<?php 
    $courseid = $_GET['courseid'];
?>
<link rel="stylesheet" href="../css/course-css.css">
<hr>
<div class="nav">
    <ul>
        <li><a href="../public/generate_table.php?courseid=<?=$courseid?>" class="btn btn-primary"> Schedule </a></li>
        <li><a href="../public/student-survey.php?course=<?=$courseid?>" class="btn btn-primary"> Survey </a></li>
        <li><a href="#" class="btn btn-primary"> Documents  </a></li>
    </ul>
</div>