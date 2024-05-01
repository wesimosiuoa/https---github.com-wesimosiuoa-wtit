<?php 
    include '../header/student.header.php';
    require '../includes/fn.inc.php';
    // include '../public/student-course-nav.php';
    $courseid = $_GET['courseid'];
?>
<link rel="stylesheet" href="../css/course-css.css">
<hr>
<div class="nav">
    <ul>
        <li><a href="../public/generate_table.php?courseid=<?=$courseid?>" class="btn btn-primary"> Schedule </a></li>
        <li><a href="../public/student-survey.php?courseid=<?=$courseid?>" class="btn btn-primary"> Survey </a></li>
        <li><a href="../public/student-course-document.php?courseid=<?=$courseid?>" class="btn btn-primary"> Documents  </a></li>
    </ul>
</div>
<div class="container">
    <hr>
    <h3> <?php 
        $sql = "SELECT count(chatid) as number_of_chats from chat inner join enrolments on chat.enrolmentID = enrolments.enrolmentID where enrolments.studentid = '".get_student_id($_SESSION['username'])."' and enrolments.courseid = '{$courseid}';";

        echo strtoupper(" {$courseid} chatbot");
    ?> <sup style="color: blue;"> <?php echo get_number_of_chat ($sql);?></sup></h3>
    <hr>
    <?php 
        get_chat ($courseid, get_student_id($_SESSION['username']));
    ?>
</div>