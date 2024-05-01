<?php 
    
    //require '../includes/fn.inc.php';
    session_start();
    require '../includes/session.inc.php';
    isLogged();
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['username'];?> Navigation Panel</title>
    <link rel="icon" href="../img/WhatsApp Image 2024-02-13 at 15.45.22_b7bce11a.jpg" type="image/png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .navbar {
            background-color: #007bff; /* Blue background color */
        }

        .navbar-brand img {
            max-height: 40px; /* Adjust height as needed */
        }

        .navbar-nav .nav-link {
            color: #ffc107 !important; /* Gold text color */
        }

        @media (max-width: 576px) {
            .navbar-collapse {
                display: inline !important;
            }

            .navbar-nav .nav-item {
                display: block !important;
                text-align: center;
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../img/WhatsApp Image 2024-02-13 at 15.45.22_b7bce11a.jpg" alt="Company Logo"> WEZI TECH INSTITUTE OF TECHNOLOGY
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../public/panel.student.php"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="../public/student-courses.php"><i class="fas fa-book"></i> Courses</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="../public/student-enrolment.php"><i class="fas fa-graduation-cap"></i> Enrollments</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="../public/student-profile.php"><i class="fas fa-user"></i> <?php echo $_SESSION['username']?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../includes/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Your main content here -->

    <!-- Bootstrap JS (Optional, if you need dropdowns, toggles, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
