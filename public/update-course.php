<?php 
    include '../header/admin.header.php';
    require '../includes/fn.inc.php';
    //$courseid = $_GET['courseid'];
    $courseName = $_GET['coursename'];
    $descrption = $_GET['desc'];
    $duration = $_GET['duration'];
    $price = $_GET['price'];
    $instructorid = $_GET['instructorid'];
    $startdate = $_GET['startdate'];
    $enddate = $_GET['enddate'];
    //$status = $_GET['status'];

    if (isset ($_POST['submit'])){
        require '../includes/dbcon.inc.php';
        $price = mysqli_real_escape_string ($conn, $_POST['cost']);
        $instructor = mysqli_real_escape_string ($conn, $_POST['instructor']);
        ?>
            <br><br>    
        <?php
        update ($price, $instructor, $courseName);
    }
    else if (isset($_POST['cancel'])) {
        ?>
            <script>document.location.href="../public/panel.admin.php";</script>
        <?php
    }
?>
<br><br>
<main class="mt-5">
    <div class="container">
        <h2> Update Course ... </h2>
        <form action="" method="post">
            <div class="form-floating mb-3">
                <input disabled type="text" value="<?=$courseName?>"name="coursename" class="form-control" id="floatingInput" placeholder="<?=$courseName?>">
                <label for="floatingInput"><i class='fas fa-graduation-cap'></i> <?=$courseName?></label>
            </div>
            <div class="form-floating mb-3">
                <!-- <input type="de" class="form-control" id="floatingPassword" placeholder="Password"> -->
                <textarea disabled name="desc" value=<?=$descrption?> name="desc" id="" cols="30" rows="20" class="form-control" id="floatingPassword" placeholder="<?=$descrption?>"></textarea>
                <label for="floatingPassword"><i class='fas fa-info-circle'></i> <?=$descrption?></label>
            </div>
            <div class="form-floating mb-3" >
                <input type="text" disabled value="<?=$duration?>" name="duration" class="form-control" id="floatingInput" placeholder="<?=$duration?>">
                <!-- <textarea name="desc" id="" cols="30" rows="20" class="form-control" id="floatingPassword" placeholder="Description"></textarea> -->
                <label for="floatingInput"><i class='fas fa-clock'></i> <?=$duration?></label>
            </div>
            <div class="form-floating mb-3" >
                <input type="text" value="<?=$price?>" name="cost" class="form-control" id="floatingInput" placeholder="<?=$price?>">
                <!-- <textarea name="desc" id="" cols="30" rows="20" class="form-control" id="floatingPassword" placeholder="Description"></textarea> -->
                <label for="floatingInput"><i class='fas fa-dollar-sign'> current price : </i> <?=$price?></label>
            </div>
            <div class="form-floating mb-3" >
                <!-- <input type="de" class="form-control" id="floatingInput" placeholder="Duration"> -->
                <!-- <textarea name="desc" id="" cols="30" rows="20" class="form-control" id="floatingPassword" placeholder="Description"></textarea> -->
                <select name="instructor" class="form-control" id="floatingInput" placeholder="Instructor" id="">
                    <option value=""> Select Tutor From The List </option>
                    <?php 
                        //require_once 'fn.inc.php';
                        require '../includes/dbcon.inc.php';
                        $sql = " SELECT `instructorid`, fullname from instructor; ";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)){
                            ?>
                                <option value="<?=$row['instructorid']?>"> <?php echo $row['fullname']?></option>
                            <?php
                        }
                    ?>
                </select>
                <label for="floatingInput"> <i class='fas fa-user'></i> Instructor </label>
            </div>

            <div class="d-grid gap-2">
                <button name="submit" class="btn btn-primary" type="submit"><i class='fas fa-check-circle'></i> Update </button>
                <button name="cancel" class="btn btn-danger" type="submit"><i class='fas fa-times-circle'></i> Cancel</button>
            </div>
        </form>
    </div>
</main>

