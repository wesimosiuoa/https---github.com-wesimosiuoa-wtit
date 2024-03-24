<?php 
    function signin ($username, $password){
        require '../includes/dbcon.inc.php';
        if ($username == "wezimosiuoa@gmail.com" && $password == "1234"){
            ?>
                <script>
                    window.location.href="panel.admin";
                </script>
            <?php
        }
        else {
            echo (" Login as other users ... ");;
        }
    }
?>