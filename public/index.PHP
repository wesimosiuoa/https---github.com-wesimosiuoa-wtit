
<?php 
    include '../header/header.html';
    
?>
    <style>
        
    </style>
    <main>
        <br>
        <br>
        <script>
            $(document).ready(function(){
                $('#myselect').select2();
            });
        </script>
        
        <div class="container">

            <form action="" method="post">
                <select name="category" class="form-control"  id="">
                        <option value=""> Where do you want to study your journey from ?  </option>
                        <?php 
                            //require_once 'fn.inc.php';
                            require '../includes/dbcon.inc.php';
                            $sql = " SELECT * FROM `category`; ";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)){
                                ?>
                                    <option value="<?=$row['category_number']?>"> <?php echo $row['name']?></option>
                                <?php
                            }
                        ?>
                    </select>
                    <br>
                    <div class="form-row">
                        <button type="submit" name="submit" class="btn btn-primary"> Explore </button>
                    </div>
            </form>
            <br>
            <?php 
                include '../includes/dbcon.inc.php';
                require '../includes/fn.inc.php';
                if (isset($_POST['submit'])){   
                    $category = mysqli_real_escape_string($conn, $_POST['category']);
                    $sql = " SELECT * FROM course inner join instructor on course.instructorid = instructor.instructorid where course.category_number = '".$category."';";
                    viewCoursesByStudents($sql);
                }
            ?>
        </div>

        <div class="container-fluid">
            <div class="row">
                <!-- <div id="about" class="col-md-6 bg-light py-5">
                    <h2 class="blue-bg">About Us</h2>
                    <p class="animated-paragraph">Welcome to Wezi TECT Institute of Technology, where we are committed to providing high-quality
                        education in technology-related fields. Our institute aims to equip students with the skills and
                        knowledge necessary to succeed in today's digital world.</p>
                    Add more details about the institute
                </div> -->

                <div id="courses" class="col-md-6 py-5">
                    <h2 class="blue-bg">Our Courses</h2>
                    <p class="animated-paragraph">
                        Explore our wide range of courses designed to meet the demands of various industries.
                        Explore our wide range of courses designed to meet the demands of various industries.
                        Explore our wide range of courses designed to meet the demands of various industries.
                      
                    
                    </p>
                    <a href="../public/view-courses-and-enrol.php" class="btn btn-primary"> View Courses </a>

                    <!-- List the available courses with descriptions -->
                </div>
                <div id="admissions" class="col-md-6 bg-light py-5">
                    <h2 class="blue-bg">Admissions</h2>
                    <p class="animated-paragraph">
                        Information on how to apply and admission requirements.
                        Information on how to apply and admission requirements.
                        Information on how to apply and admission requirements.
                        Information on how to apply and admission requirements.
                        Information on how to apply and admission requirements.
                        Information on how to apply and admission requirements.
                        Information on how to apply and admission requirements.

                    </p>
                    <!-- Include details about the admission process -->
                </div>
            </div>
            <!-- <div class="row">
                <div id="contact" class="col-md-6 py-5">
                    <h2 class="blue-bg">Contact Us</h2>
                    <p class="animated-paragraph">Get in touch with us for any inquiries or assistance.</p>
                    Contact details and form
                </div>
            </div> -->
        </div>
    </main>

    <hr>    
<div id="footer">
    <script>
        fetch ('footer.php')
            .then(response=>response.text())
            .then(data => {
                document.getElementById('footer').innerHTML = data;
            })
            .catch(error=> console.error ('Error fetching header', error));
    </script>
</div>