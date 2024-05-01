<?php
    include '../header/admin.header.php';
    require '../includes/fn.inc.php';
?>
<br>
<br>
<br>    
<div class="container">
    <h3> Categories We have. </h3>
    <div class="card">
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio laborum ipsa veritatis quisquam aspernatur. Autem magnam officia qui quas officiis eaque voluptatum similique neque odio. Sit molestias culpa inventore cum?
        </p>
    </div>
    <hr>
        <a href="../public/add-category.php" class="btn"> Add Category <i class='fas fa-plus-circle'></i></a>
    <hr>
    <?php 
        getcategories();
    ?>
</div>