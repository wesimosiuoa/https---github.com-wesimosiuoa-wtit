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
    <title><?php echo "{$_SESSION['username']}" ?></title>
    <link rel="icon" href="../img/WhatsApp Image 2024-02-13 at 15.45.22_b7bce11a.jpg" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .navbar-brand img {
            max-height: 40px;
            margin-right: 10px;
        }
        .navbar-nav .nav-link {
            color: #fff !important;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="../img/WhatsApp Image 2024-02-13 at 15.45.22_b7bce11a.jpg" alt="Logo"> Admin Panel
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../public/panel.admin.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../public/courses.php"><i class="fas fa-book"></i> Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../public/instructors.php"><i class="fas fa-chalkboard-teacher"></i> Instructors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../public/students.php"><i class="fas fa-graduation-cap"></i> Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../public/intakes.php"><i class="fas fa-calendar-alt"></i> Intake</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../public/categories.php"><i class="fas fa-calendar-alt"></i> Categories </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-cogs"></i> Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../includes/logout.php"><i class='fas fa-sign-out-alt'></i>Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <main class="mt-3">
        <!-- Content goes here -->
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
