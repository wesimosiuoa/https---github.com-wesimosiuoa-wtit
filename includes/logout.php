<?php 
    session_start();
    unset($_SESSION['username']);
    header('location: ../public/index.php');
?>