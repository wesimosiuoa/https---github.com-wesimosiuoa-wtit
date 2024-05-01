<?php 
    include '../header/student.header.php';
    require '../includes/fn.inc.php';
    require '../includes/dbcon.inc.php';
?>
<div class="container">
    <hr>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione maiores sequi voluptatibus? Nulla vitae numquam molestias praesentium architecto excepturi quos corporis ut alias eveniet dolor, voluptas, fuga officia? Reiciendis, inventore.</p>
    Get Course to add survey on
    <?php 
        
        if (isset($_POST['submit'])){
            $courseid = mysqli_real_escape_string($conn, $_POST['course']);
            ?>
                <script>
                    window.location.href="../public/student-survey.php?course=<?=$courseid?>";
                </script>
            <?php
        }
    ?>
    <form action="" method="POST">
        <select name="course" id="" class="form-control">
            <?php
                $sql = " select * from course;";
                $result = mysqli_query($conn, $sql);
                while ($row=mysqli_fetch_assoc($result)){
                    ?>
                        <option value="<?=$row['courseid']?>"> <?php echo $row['courseName']?></option>
                    <?php
                }
            ?>
        </select>
        <br>
        <button type="submit" name="submit" class="btn btn-primary" > Next </button>
    </form>

</div>