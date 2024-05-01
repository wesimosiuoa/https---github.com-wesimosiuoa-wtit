<?php 
    include '../header/student.header.php';
?>
<br>
<div class="container">
    <hr>
        <?php echo strtoupper(" Change password ")?>
    <hr>
    <script>
        function validate(){
            var password = document.getElementById("password").value;
            var newpassword = document.getElementById("newpassword").value;
            var confirmpassword = document.getElementById("confirmpassword").value;
            if (newpassword != confirmpassword){
                alert (" Password don't match\n Make sure your password are same ");
                return false;
            }
            else {
                return true;
            }
        }
    </script>
    <?php 
        require '../includes/dbcon.inc.php';
        require '../includes/fn.inc.php';
        
        if (isset ($_POST['submit'])){
            $password = mysqli_real_escape_string ($conn, $_POST['password']);
            $newpassword = mysqli_real_escape_string($conn, $_POST['newpassword']);
            $sql = " select stundets.password as password from stundets where stundets.email = '".$_SESSION['username']."';";
            if (get_password($sql, $_SESSION['username']) == $password){
                updatepassword($newpassword, $_SESSION['username']);
                
            }
            else {
                error (" Your current password is incorrect, please type your login password ");
            }
           
        }
       
    ?>
    <form action="" method="post" onsubmit="return validate()">
        <label for="password"> Enter your password <sup style="color: red">*</sup></label>
        <input type="password" class="form-control" name="password" id="password" placeholder=" Enter password ">
        <label for="newpassword"> New Password <sup style="color: red">*</sup> </label>
        <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder=" Enter new passwrod ">
        <label for="comfirmpassword"> Confirm Password <sup style="color: red">*</sup> </label>
        <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder=" Confirm Password ">

        <br>
        <button type="submit" name="submit" class="btn btn-success"> Update </button>
        <button type="reset" name="submit" class="btn btn-danger"> Cancel </button>
    </form>
</div>