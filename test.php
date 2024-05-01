<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Class Schedule</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Online Class Schedule</h1>

        <?php
        // Include database connection
        include 'db_connect.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process student registration
            $name = $_POST['name'];
            $email = $_POST['email'];

            // Validate inputs (simplified for demonstration)
            if (!empty($name) && !empty($email)) {
                // Insert student into database
                $sql = "INSERT INTO students (name, email) VALUES ('$name', '$email')";
                
                if ($connection->query($sql) === TRUE) {
                    echo '<div class="alert alert-success" role="alert">Registration successful!</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">Error: ' . $sql . '<br>' . $connection->error . '</div>';
                }
            } else {
                echo '<div class="alert alert-danger" role="alert">Please fill out all fields.</div>';
            }
        }
        ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>

        <hr>

        <h2>Available Courses</h2>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Web Development</h5>
                        <p class="card-text">Learn HTML, CSS, JavaScript, and more.</p>
                        <form method="POST" action="enroll.php">
                            <input type="hidden" name="student_id" value="1"> <!-- Replace with actual student ID -->
                            <input type="hidden" name="course_id" value="1"> <!-- Replace with course ID -->
                            <button type="submit" class="btn btn-primary">Enroll</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Add more courses here -->
        </div>
    </div>
</body>
</html>
