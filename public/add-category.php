<?php 
    include '../header/admin.header.php';
    require '../includes/fn.inc.php';
    require '../includes/dbcon.inc.php';
    $_SESSION['username'] = 'wezimosiuoa@gmail.com';

    if (isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $desc = mysqli_real_escape_string($conn, $_POST['desc']);

        if (isExisting(" SELECT * from `category` where `name` = '".$name."'; ") == true ){
            ?>
                <script> 
                    alert (" Category already exists add new category ");
                </script>
            <?php
        }
        else {
            add_category ($name, $desc);
        }
    }
    else if (isset($_POST['reset'])){
        ?>
            <script>
                window.location.href="../public/panel.admin.php";
            </script>
        <?php
    }
    
?>
<link rel="stylesheet" href="../css/style.css">
<br><br>
<div class="container">
    <h3> Categories We have. </h3>
    <div class="card">
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio laborum ipsa veritatis quisquam aspernatur. Autem magnam officia qui quas officiis eaque voluptatum similique neque odio. Sit molestias culpa inventore cum?
        </p>
    </div>
    <hr>
    <h4>Add new category by filling this form. </h4>
    <form action="" method="post">
        <div class="form-group">
            <label for="name"> Category Name </label>
            <input type="text" name="name" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="desc"> Description </label>
            <textarea name="desc" id="" cols="30" rows="5" class="form-control" > </textarea>
        </div>
        <br>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary"> Add </button> <button type="submit" name="reset" class="btn btn-danger"> Cancel </button>
        </div>
    </form>
</div>