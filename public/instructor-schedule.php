<?php 
    include '../header/instructor.header.php';
    require '../includes/fn.inc.php';
    require '../includes/dbcon.inc.php';
    $courseid = $_GET['courseid']; 
?>
<br>
<div class="container">
    <h3><?php echo strtoupper(" Your schedule for class ".$courseid." will be displayed here ")?></h3>
    <hr>
    <form action="" method="post">  
        <div class="form-row">
            <div class="form-group">
                <label for="day"> Choose day </label>
                <select name="day" id="" class="form-control">
                    <option value=""></option>
                    <option value="Monday"> Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday"> Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Sartuaday">Sartuaday</option>
                </select>
            </div>
            <div class="form-group">
                <label for="time"> Choose Time Slot </label>
                <select name="time" id="" class="form-control">
                    <option value=""></option>
                    <option value="08:00-10:00">08:00-10:00</option>
                    <option value="10:00-12:00">10:00-12:00</option>
                    <option value="12:00-14:00">12:00-14:00</option>
                    <option value="14:00-16:00">14:00-16:00</option>
                    <option value="16:00-18:00">16:00-18:00</option>
                    <option value="18:00-20:00">18:00-20:00</option>
                    
                </select>
            </div>
            <div class="form-group">
                <!-- <label for=""> Submit </label> -->
            </div>

        </div>
        <button type="submit" name="submit" class="btn btn-primary"> View </button>

    </form>
    <hr>
    <?php
        if (isset($_POST['submit'])){
            $day = mysqli_real_escape_string($conn, $_POST['day']);
            $time = mysqli_real_escape_string($conn, $_POST['time']);
            $sql = " SELECT * from time_table where day = '{$day}' or time = '{$time}' and courseid = '".$courseid."' order by time ASC; ";
            get_time_table($sql);
        } 
        else {
            $sql = "SELECT * from time_table where courseid = '".$courseid."' order by time ASC;";
            get_time_table($sql);
        }

    ?>
</div>