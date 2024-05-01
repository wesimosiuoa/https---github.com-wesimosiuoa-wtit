<!-- To retrieve reviews from a MySQL database and display them dynamically on an HTML template, you'll need to use server-side scripting (e.g., PHP) to interact with the database, fetch the review data, and populate the HTML content. Below is an example of how you can achieve this step-by-step.

### 1. PHP Script (`reviews.php`)

Create a PHP script (`reviews.php`) that connects to the MySQL database, retrieves the reviews, and outputs the data in a format suitable for display on your HTML template (`index.html`).

```php -->
<?php
// Database connection parameters
require '../includes/dbcon.inc.php';

// Query to retrieve reviews
$sql = "SELECT * FROM survey where courseid = 'WDUJ-2024'";
$result = $conn->query($sql);

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Design Course Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
        }
        .course-container {
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .review {
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }
        .rating {
            color: #f39c12;
        }
    </style>
</head>
<body>
    <div class="course-container">
        <h1>Web Design Mastery</h1>
        <p><strong>Provider:</strong> Wezi Tech Institute of Technology</p>
        <p><strong>Course Overview:</strong> Learn the essentials of modern web design, from HTML/CSS basics to responsive design and user experience principles.</p>

        <h2>Student Reviews</h2>

        <?php
        // Display reviews
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="review">';
                echo '<p><strong>Course Content:</strong> <span class="rating">' . getStars($row['contentRating']) . '</span> ' . $row['contentRating'] . '</p>';
                echo '<p><strong>Instructors:</strong> <span class="rating">' . getStars($row['instructorsRating']) . '</span> ' . $row['contentRating'] . '</p>';
                echo '<p><strong>Hands-on Projects:</strong> <span class="rating">' . getStars($row['projectsRating']) . '</span> ' . $row['contentRating'] . '</p>';
                echo '<p><strong>Resources and Support:</strong> <span class="rating">' . getStars($row['supportRating']) . '</span> ' . $row['contentRating'] . '</p>';
                echo '<p><strong>Value for Money:</strong> <span class="rating">' . getStars($row['valueRating']) . '</span> ' . $row['contentRating'] . '</p>';
                
                echo '<p><strong>Overall Rating:</strong> <span class="rating">' . getStars($row['overall_rating']) . '</span> ' . $row['contentRating'] . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No reviews available.</p>';
        }

        // Function to generate star ratings
        function getStars($rating) {
            $stars = '';
            for ($i = 1; $i <= 5; $i++) {
                $stars .= ($i <= $rating) ? '⭐️' : '☆';
            }
            return $stars;
        }
        ?>

    </div>
</body>
</html>
<!-- ```

### Explanation:

- The PHP script connects to the MySQL database (`course_reviews`) and retrieves reviews from the `reviews` table using a SQL query.
- The fetched review data is then looped through using a `while` loop to dynamically generate HTML content for each review.
- The `getStars` function is used to generate star ratings based on the numeric rating stored in the database (`*_rating` fields).
- The generated HTML content (including review details and star ratings) is echoed within the `<div class="course-container">` section of the HTML template.

### Usage:

1. Replace `your_database_server`, `your_username`, and `your_password` in the PHP script (`reviews.php`) with your actual MySQL database connection parameters.
2. Save the PHP script (`reviews.php`) and HTML template (`index.html`) in the same directory on your web server.
3. Access `reviews.php` in a web browser to view the dynamically populated course details and student reviews based on the data retrieved from the database.

This example demonstrates how to retrieve and display reviews from a MySQL database using PHP, while dynamically generating HTML content with star ratings for each review. Adjust the database connection parameters and HTML/CSS styles as needed to integrate this solution into your web application. -->
