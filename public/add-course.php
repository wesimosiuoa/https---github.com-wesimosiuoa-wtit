<?php 
    include '../header/admin.header.php';
    require '../includes/fn.inc.php';
    if (isset($_POST['submit'])) {
        require '../includes/dbcon.inc.php';
        $coursename = mysqli_real_escape_string($conn, $_POST['coursename']);
        $desc = mysqli_real_escape_string($conn, $_POST['desc']);
        $duration = mysqli_real_escape_string($conn, $_POST['duration']);
        $cost = mysqli_real_escape_string($conn, $_POST['cost']);
        $instructor = mysqli_real_escape_string ($conn, $_POST['instructor']);
        $startdate = mysqli_real_escape_string($conn, $_POST['startdate']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        
        //generate course id
        $string = $coursename;
        $words = str_word_count($string, 1);
        // Initialize an empty string to store the initials
        $intial = '';
        // Iterate over each word and extract the first letter
        foreach ($words as $word) {
            $intial .= strtoupper(substr($word, 0, 1)); // Convert to uppercase and concatenate to the initials string
        }
        $courseid = $intial . "-" . date("Y");

        //generate end date
        $endDate = date('Y-m-d', strtotime('+6 months', strtotime($startdate)));

        if (isExisting(" SELECT * FROM `course` WHERE courseName = '".$coursename."' or courseid = '".$courseid."'; ") == true){
            ?><br><br><?php
            sucess(" Course already exists !!! ");
        }
        else {
            addcourse($courseid, $coursename, $desc, $duration, $cost, $instructor, $startdate, $endDate, $category);
        }
    }
?>
<main class="mt-5">
    <div class="container">
        <h2> Add Course ... </h2>
        <form action="" method="post">
            <div class="form-floating mb-3">
                <input type="text" name="coursename" class="form-control" id="floatingInput" placeholder="Cutting Edge Technology">
                <label for="floatingInput"><i class='fas fa-graduation-cap'></i> Course Name</label>
            </div>
            <div class="form-floating mb-3">
                <!-- <input type="de" class="form-control" id="floatingPassword" placeholder="Password"> -->
                <textarea name="desc" name="desc" id="" cols="30" rows="20" class="form-control" id="floatingPassword" placeholder="Description"></textarea>
                <label for="floatingPassword"><i class='fas fa-info-circle'></i> Description</label>
            </div>
            <div class="form-floating mb-3" >
                <input type="text" name="duration" class="form-control" id="floatingInput" placeholder="Duration">
                <!-- <textarea name="desc" id="" cols="30" rows="20" class="form-control" id="floatingPassword" placeholder="Description"></textarea> -->
                <label for="floatingInput"><i class='fas fa-clock'></i> Duration</label>
            </div>
            <div class="form-floating mb-3" >
                <input type="text" name="cost" class="form-control" id="floatingInput" placeholder="Cost">
                <!-- <textarea name="desc" id="" cols="30" rows="20" class="form-control" id="floatingPassword" placeholder="Description"></textarea> -->
                <label for="floatingInput"><i class='fas fa-dollar-sign'></i> Cost</label>
            </div>

            <div class="form-floating mb-3" >
                <!-- <input type="de" class="form-control" id="floatingInput" placeholder="Duration"> -->
                <!-- <textarea name="desc" id="" cols="30" rows="20" class="form-control" id="floatingPassword" placeholder="Description"></textarea> -->
                <select name="category" class="form-control" id="floatingInput" placeholder="Category" id="">
                    <option value=""> Category </option>
                    <?php 
                        //require_once 'fn.inc.php';
                        require '../includes/dbcon.inc.php';
                        $sql = " SELECT * FROM `category`; ";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)){
                            ?>
                                <option value="<?=$row['category_number']?>"> <?php echo $row['name']?></option>
                            <?php
                        }
                    ?>
                </select>
                <label for="floatingInput"> <i class='fas fa-user'></i> Category </label>
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
            <div class="form-floating mb-3" >
                <input type="date" name="startdate" class="form-control" id="floatingInput" placeholder="Starting Date">
                <!-- <textarea name="desc" id="" cols="30" rows="20" class="form-control" id="floatingPassword" placeholder="Description"></textarea> -->
                <label for="floatingInput"><i class='fas fa-clock'></i> Starting Date</label>
            </div>

            <div class="d-grid gap-2">
                <button name="submit" class="btn btn-primary" type="submit"><i class='fas fa-check-circle'></i> Add </button>
                <button name="cancel" class="btn btn-danger" type="submit"><i class='fas fa-times-circle'></i> Cancel</button>
            </div>
        </form>
    </div>
</main>
        