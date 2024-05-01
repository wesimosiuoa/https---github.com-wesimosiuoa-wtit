<?php 
    function executeQuery ($sql){
        require 'dbcon.inc.php';
        $result = mysqli_query ($conn, $sql);
        if ($result == true ){
            return 1;
        }
        else {
            echo $conn -> error;
        }
    }
?>