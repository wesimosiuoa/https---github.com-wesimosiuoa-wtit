<?php 
    include '../header/admin.header.php';
    if (isset ($_POST['submit'])){
        require '../includes/fn.inc.php';
        require '../includes/dbcon.inc.php';
        $intake = mysqli_real_escape_string ($conn, $_POST['intakedate']);
        $deadline = mysqli_real_escape_string ($conn, $_POST['deadline']);
        $reopenning = mysqli_real_escape_string ($conn, $_POST['reopenning']);
        addIntake ($intake, $deadline, $reopenning);
    }
?>
<br><br><br>
<div class="container">
    <h2> Add New Intake Here </h2>
    <form action="" method="post"> 

        <div class="form-group">
            <label for="intakedate"> Intake Date </label>
            <br>
            <input type="date" name="intakedate" id="" class="form-control" placeholder="Jan 2024">
            <br>    
            <label for="intakedate"> Application Deadline </label>
            <br>
            <input type="date" name="deadline" id="" class="form-control" placeholder="Jan 2024">
            <br>
            <label for="intakedate"> School Openning </label>
            <br>
            <input type="date" name="reopenning" id="" class="form-control" placeholder="Jan 2024">
            <br>
            <button type="submit" name="submit" class="btn btn-primary"> Open </button>
        </div>
    </form>
</div>