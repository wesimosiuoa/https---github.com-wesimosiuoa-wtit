
<?php 
    include '../header/admin.header.php';
    require '../includes/fn.inc.php';
?>
<br>
<main class="mt-5">
    <div class="container">
        <h2>Welcome to the Admin Dashboard!</h2>
        <p>This is where you can manage all aspects of your online academy.</p>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Courses <sup> <?php echo numberOfCourses();?></sup></h5>
                        <p class="card-text">View and manage all courses offered in your academy.</p>
                        <a href="courses.php" class="btn btn-primary">View Courses</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Instructors <sup> <?php echo numberOfInstructors();?></sup></h5>
                        <p class="card-text">Manage instructors who teach courses in your academy.</p>
                        <a href="../public/instructors.php" class="btn btn-primary">View Instructors</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Intakes <sup> <?php echo numberOfIntakes() ;?></sup></h5>
                        <p class="card-text">Manage intakes at WEZI TECH INSTITUTE OF TECHNOLOGY</p>
                        <a href="../public/intakes.php" class="btn btn-primary">View Intakes</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Enrolments <sup> <?php echo numberofEnrolment() ;?></sup></h5>
                        <p class="card-text">View total at WEZI TECH INSTITUTE OF TECHNOLOGY</p>
                        <a href="#" class="btn btn-primary">Enrollments</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
