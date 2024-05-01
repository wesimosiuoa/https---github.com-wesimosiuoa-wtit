<?php 
    include '../header/instructor.header.php';
    require '../includes/fn.inc.php';
?>
<br><br><br>
<div class="container">
    <!-- <div class="card"> -->
        <h3> Welcome tuitor </h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam consectetur voluptates ratione, soluta inventore officiis dignissimos reprehenderit et, impedit vel natus. Labore, harum! Temporibus odio in necessitatibus dolores, tempore exercitationem?</p>
        
    <!-- </div> -->
    <hr>
    <h5>You will be tuitoring the following courses </h5>
    <?php 
        $sql = " select * from course where instructorid = '".$_SESSION['username']."';";
        get_courses($sql);
    ?>
</div>