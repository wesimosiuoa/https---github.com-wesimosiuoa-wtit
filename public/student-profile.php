<?php 
    include '../header/student.header.php';
?>
<br><br>
<div class="container">
    <h3><u><?php echo strtoupper(" About Me " .$_SESSION['username']);?></u> </h3>
    <?php 
        require '../includes/fn.inc.php';
        studentprofile($_SESSION['username']);
    ?>
</div>