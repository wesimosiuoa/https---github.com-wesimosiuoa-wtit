<?php
   
    include '../header/student.header.php';
    // include '../public/student-course-nav.php';
    include '../includes/dbcon.inc.php';
    require '../includes/fn.inc.php';
    $courseid = $_GET['courseid'];

    if (isset($_POST['submit'])){
        $contentRating = mysqli_real_escape_string($conn, $_POST['content_rating']);
        $instructorsRating = mysqli_real_escape_string($conn, $_POST['instructors_rating']);
        $projectsRating = mysqli_real_escape_string($conn, $_POST['projects_rating']);
        $supportRating = mysqli_real_escape_string($conn, $_POST['support_rating']);
        $valueRating = mysqli_real_escape_string($conn, $_POST['value_rating']);
        $comments = mysqli_real_escape_string($conn, $_POST['comments']);
        

        
        add_survey($contentRating, $instructorsRating, $projectsRating, $supportRating, $valueRating, $comments, $courseid);

    }
?>
<br><br>
<body>
<style>

    </style>
    <div class="container">
    <div class="survey-container">
        <h1><u><?php echo get_course_name($courseid)?></u></h1>
        <p>We value your feedback! Please take a moment to complete this survey about the <?php echo get_course_name($courseid)?> course.</p>

        <form action="" method="POST">
            <div class="form-group">
                <label for="content_rating">Rate the course content:</label>
                <input  class="form-control" type="number" name="content_rating" id="content_rating" min="1" max="5" required placeholder=" Out of 5">
            </div>

            <div class="form-group">
                <label for="instructors_rating">Rate the instructors:</label>
                <input class="form-control" type="number" name="instructors_rating" id="instructors_rating" min="1" max="5" required placeholder=" Out of 5">
            </div>

            <div class="form-group">
                <label for="projects_rating">Rate the hands-on projects:</label>
                <input class="form-control" type="number" name="projects_rating" id="projects_rating" min="1" max="5" required placeholder=" Out of 5">
            </div>

            <div class="form-group">
                <label for="support_rating">Rate the resources and support:</label>
                <input class="form-control" type="number" name="support_rating" id="support_rating" min="1" max="5" required placeholder=" Out of 5">
            </div>

            <div class="form-group">
                <label for="value_rating">Rate the value for money:</label>
                <input class="form-control" type="number" name="value_rating" id="value_rating" min="1" max="5" required placeholder=" Out of 5">
            </div>

            <div class="form-group">
                <label for="comments">Additional comments (optional):</label>
                <textarea class="form-control" name="comments" id="comments" rows="4" placeholder=" Comments "></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary" >Submit Survey</button>
        </form>
    </div>
    </div>
</body>
</html>
