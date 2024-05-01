<?php 
    session_start();
    include '../includes/fn.inc.php';
    $courseid = $_GET['courseid'];
    //$instructor = $_GET['instructor'];
    $date =  date("Y-m-d h:s");

    enrol($courseid, $_SESSION['username'], $date);
?>