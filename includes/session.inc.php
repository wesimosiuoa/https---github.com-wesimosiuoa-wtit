<?php 
    function isLogged(){
        if (!isset($_SESSION['username'])){
            ?>
                <script>
                    window.location.href="../public/index.php?login";
                </script>
            <?php
        }
    }
?>