<?php 
    include '../header/header.html';
    require '../includes/fn.inc.php';
    require '../includes/dbcon.inc.php';
    $courseid = $_GET['courseid'];
    if (isset($_POST['submit'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string ($conn, $_POST['pwd']);
        signinStudent ($username, $password, $courseid);

        
    }
    else if (isset($_POST['reset'])){
        ?>
            <script>
                window.location.href="../public/view-courses-and-enrol.php";
            </script>
        <?php
    }
?>
<div class="container">
    <form action="" method="POST">
        <H1> Verify your account !!! </H1>
        <p> You will need to sign in to verify your account to enrol. If you dont have account <i class="fas fa-user-plus"></i><a href="../public/sign-up.php"> Create Account </a></p>
        <div class="form-floating mb-3">
            <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Cutting Edge Technology">
            <label for="floatingInput"><i class="fas fa-user"></i> Username </label>
        </div>
        <div class="form-floating mb-3">
            <!-- <input type="de" class="form-control" id="floatingPassword" placeholder="Password"> -->
            <input type="password" name="pwd" class="form-control" id="floatingInput" placeholder=" Enter password ">
            <label for="floatingPassword"><i class="fas fa-lock"></i> Password </label>
        </div>
        <button name="submit" class="btn btn-primary" type="submit"><i class="fas fa-sign-in-alt"></i> Login  </button>
        <button name="reset" class="btn btn-danger" type="submit"><i class="fas fa-times"></i> Cancel  </button>
    </form>
</div>

<?php 
    include '../public/footer.php';
?>