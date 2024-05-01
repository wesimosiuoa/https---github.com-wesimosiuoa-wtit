<?php 
    include '../header/admin.header.php';
    require '../includes/fn.inc.php';
    
?>
<br>


<main class="mt-5">
    <h2> Students </h2>
    <div class="container">
        <p> Red starred <sup style="color: red">(*)</sup> student are owing their fees while blue starred <sup style="color: blue">(*)</sup> student have completed their payments</p>
        <?php students();?>
    </div>
</main>