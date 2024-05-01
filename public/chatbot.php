<?php 
    include '../header/instructor.header.php';
    require '../includes/fn.inc.php';
    require '../includes/dbcon.inc.php';
    $courseid = $_GET['courseid'];
    if (isset($_POST['submit'])){
        ?>
            <br>
        <?php
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        //$sql = "";
        //$sql = " SELECT whatapp_number as `whatsapp_number` from stundets INNER JOIN enrolments on enrolments.studentid = stundets.studentid inner JOIN course on enrolments.courseid = course.courseid where course.instructorid = '".$_SESSION['username']."' and course.courseid = '".$courseid."';";
        //echo " Whatsapp is ". get_student_whatsapp_number($sql);
        //$sql = " SELECT email as `email` from stundets INNER JOIN enrolments on enrolments.studentid = stundets.studentid inner JOIN course on enrolments.courseid = course.courseid where course.instructorid = '".$_SESSION['username']."' and course.courseid = '".$courseid."'; ";
        //echo " Email is ". get_student_email_address ($sql);
        //$message = " Hello world ";
        $sql = "select instructorid as instructorid from instructor where instructorid = '{$_SESSION['username']}';";
        $subject = mysqli_real_escape_string($conn, $_POST['subject']);
        $date = date("Y-m-d H:m:s");
        //chat_with_students(get_student_email_address ($sql), $message, $subject);
        chat_with_students(get_instructor_id ($sql), $message, $subject, get_enrolment_id ($courseid), $date);
    }
    else if (isset($_POST['cancel'])) {
        ?>
            <br><br>
        <?php
        error(" You have cancelled you chat ");
    }
?>
<br>
<div class="container">
    <hr>
    <h2> Make your news feed here for all your students on WhatsApp and Email </h2>
    <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut, ad inventore similique rem facere, est aliquid dolores hic asperiores quae in, nisi quos ea tenetur sequi possimus magni ipsam nam.
    </p>
    <form action="" method="post">
        <h3>Message for your students</h3>
        <label for="subject"> Subject </label>
        <input type="text" name="subject" id="" class="form-control" placeholder=" Subject (Optional)">
        <label for="message"> Message  </label>
        <!-- <hr> -->
        <textarea name="message" id="" cols="30" rows="5" class="form-control"> </textarea>
        <hr>
        <button type="submit" class="btn btn-primary" name="submit"> Send </button>
        <button type="submit" class="btn btn-danger" name="cancel"> Cancel </button>
    </form>
</div>