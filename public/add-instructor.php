<?php 
    include '../header/admin.header.php';
    require '../includes/fn.inc.php';
    if (isset($_POST['submit'])) {
        require '../includes/dbcon.inc.php';
        $instructor = mysqli_real_escape_string($conn, $_POST['instructor']);
        $email = mysqli_real_escape_string ($conn, $_POST['email']);
        $exp = mysqli_real_escape_string($conn, $_POST['exp']);

        //generate course id
        $string = $instructor;
        $words = str_word_count($string, 1);
        // Initialize an empty string to store the initials
        $intial = '';
        // Iterate over each word and extract the first letter
        foreach ($words as $word) {
            $intial .= strtoupper(substr($word, 0, 1)); // Convert to uppercase and concatenate to the initials string
        }
        $instructorid = $intial . "-" . date("s-Y");
        if (isExisting(" SELECT * FROM `instructor` WHERE email = '".$instructor."' or `instructorid` = '".$instructorid."'; ") == true){
            sucess(" Instructor already exists ");
        }
        else {
            addinstructor($instructorid, $instructor, $email, $exp);
        }
    }
?>
<br>
<br>
<main class="mt-5">
    <div class="container">
        <h2> Add Instructor ... </h2>
        <form action="" method="post">
            <div class="form-floating mb-3">
                <input type="text" name="instructor" class="form-control" id="floatingInput" placeholder="Instructor Full Name">
                <label for="floatingInput"><i class='fas fa-address-card'></i> Instructor Full Name</label>
            </div>
            <div class="form-floating mb-3" >
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder=" wezimosiuoa@gmail.com">
                <!-- <textarea name="desc" id="" cols="30" rows="20" class="form-control" id="floatingPassword" placeholder="Description"></textarea> -->
                <label for="floatingInput"><i class='fas fa-envelope'></i> Email Address </label>
            </div>
            <div class="form-floating mb-3" >
                <input type="text" name="exp" class="form-control" id="floatingInput" placeholder="Exerptise ">
                <!-- <textarea name="desc" id="" cols="30" rows="20" class="form-control" id="floatingPassword" placeholder="Description"></textarea> -->
                <label for="floatingInput"><i class='fas fa-graduation-cap'></i> Exerptise </label>
            </div>

            <div class="d-grid gap-2">
                <button name="submit" class="btn btn-primary" type="submit"><i class='fas fa-check-circle'></i> Add </button>
                <button name="cancel" class="btn btn-danger" type="submit"><i class='fas fa-times-circle'></i> Cancel</button>
            </div>
        </form>
    </div>
</main>
        