<?php
    include '../header/header.html';
    require '../includes/dbcon.inc.php';  //make connection to the database
    //require '../includes/session.inc.php';   //check if user is logged in
    require '../includes/fn.inc.php';     //function for displaying data from db

    if (isset ($_POST['submit'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $pwd = mysqli_real_escape_string($conn, $_POST['password']);

        signin ($username, $pwd);
    }
?>

<div class="container-md">
    <br>
    <h2> Welcome Back ... </h2>
    <style>
        /* CSS for the loading spinner */
        .spinner-border {
        display: none; /* Initially hidden */
        }
    </style>
    <script>
        // jQuery function to handle form submission
        $(document).ready(function(){
            $('#countryForm').submit(function(){
            // Show loading spinner
            $('#loadingSpinner').show();
            });
        });
    </script>
    <div class="spinner-border text-primary mt-3" role="status" id="loadingSpinner">
      <span class="sr-only">Loading...</span>
    </div>
    <form  id="countryForm" action="" method="post">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" name="check-me-out" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    
    <br>    
    <button type="submit" name="submit" class="btn btn-primary">Submit</button> <a href="../public/sign-up.php" class="btn btn-danger"> Create Account </a>
    </form>
</div>

<?php include '../public/footer.php';?>