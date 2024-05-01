<?php 
    include '../header/header.html';
    require '../includes/fn.inC.php';
    $sql = "SELECT * FROM course inner join instructor on course.instructorid = instructor.instructorid";
    viewCoursesByStudents($sql);
?>