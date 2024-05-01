<?php 
    include '../header/header.html';
    require '../includes/fn.inc.php';
    if (isset($_POST['submit'])){
        require '../includes/dbcon.inc.php';
        $studentID = "";
        $firstName = mysqli_real_escape_string ($conn, $_POST["fname"]);
        $lastName = mysqli_real_escape_string($conn, $_POST["lname"]);
        $email = mysqli_real_escape_string($conn, strtolower($_POST["email"]));
        $dob = mysqli_real_escape_string($conn, $_POST["dob"]);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $country = mysqli_real_escape_string ($conn, $_POST['country']);
        $password = mysqli_real_escape_string ($conn, $_POST['password']); 
        $confirmPassword = mysqli_real_escape_string ($conn, $_POST['confirmPassword']);       

        //generate course id
        $string = $firstName ." ".$lastName;
        $words = str_word_count($string, 1);
        // Initialize an empty string to store the initials
        $intial = '';
        // Iterate over each word and extract the first letter
        foreach ($words as $word) {
            $intial .= strtoupper(substr($word, 0, 1)); // Convert to uppercase and concatenate to the initials string
        }
        $studentID = "WTIT-STU-".$intial . "-" . date("s-Y");
        if (isExisting(" select email from stundets where email = '".$email."';") == true){
            sucess(" You are trying to use an email that exists in our database, use different email");
        }
        else if ($password != $confirmPassword){
          sucess(" Passwords don't match ");
        }
        else {
          signup($studentID,$firstName, $lastName, $email, $dob, $gender, $country, $password);
        }
    }
?>
<style>
    /* CSS for the loading spinner */
    .spinner-border {
        display: none; /* Initially hidden */
    }
</style>
<div class="spinner-border text-primary mt-3" role="status" id="loadingSpinner">
    <span class="sr-only">Loading...</span>
</div>
<script>
  // jQuery function to handle form submission
  $(document).ready(function(){
    $('#countryForm').submit(function(){
      // Show loading spinner
      $('#loadingSpinner').show();
    });
  });
</script>
<form id="countryForm" action="" method="post">  
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h3>Student Registration Form</h3>
        </div>
        <div class="card-body">
          <form>
            <div class="form-group">
              <label for="username"> First Name <sup style="color:red">*</sup></label>
              <input type="text" class="form-control" id="username" name="fname" required>
            </div>
            <div class="form-group">
              <label for="username"> Last Name <sup style="color:red">*</sup></label>
              <input type="text" class="form-control" id="username" name="lname" required>
            </div>
            <div class="form-group">
              <label for="email"> Email Address <sup style="color:red">*</sup></label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="username"> Date of Birth <sup style="color:red">*</sup></label>
              <input type="date" class="form-control" id="username" name="dob" required>
            </div>
            <div class="form-group">
              <label for="username"> Gender <sup style="color:red">*</sup></label>
              <br>
              <hr>
              <input type="radio"  id="username" name="gender" value="Male" required> Male
              <input type="radio"  id="username" name="gender" value="Female" required> Female
              <hr>
            </div>
            <div class="form-group">
              <label for="password">Country <sup style="color:red">*</sup></label>
              <select name="country" class="form-control" id="">

                <?php 
                    $countries = [
                        'Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Angola', 'Antigua and Barbuda', 'Argentina', 'Armenia', 'Australia', 'Austria', 
                        'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bhutan', 
                        'Bolivia', 'Bosnia and Herzegovina', 'Botswana', 'Brazil', 'Brunei', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cabo Verde', 'Cambodia', 
                        'Cameroon', 'Canada', 'Central African Republic', 'Chad', 'Chile', 'China', 'Colombia', 'Comoros', 'Congo', 'Costa Rica', 
                        'Croatia', 'Cuba', 'Cyprus', 'Czech Republic', 'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic', 'East Timor', 'Ecuador', 
                        'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Eswatini', 'Ethiopia', 'Fiji', 'Finland', 'France', 
                        'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Greece', 'Grenada', 'Guatemala', 'Guinea', 'Guinea-Bissau', 
                        'Guyana', 'Haiti', 'Honduras', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 
                        'Israel', 'Italy', 'Jamaica', 'Japan', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Korea, North', 'Korea, South', 
                        'Kosovo', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 
                        'Lithuania', 'Luxembourg', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Mauritania', 
                        'Mauritius', 'Mexico', 'Micronesia', 'Moldova', 'Monaco', 'Mongolia', 'Montenegro', 'Morocco', 'Mozambique', 'Myanmar', 'Namibia', 
                        'Nauru', 'Nepal', 'Netherlands', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'North Macedonia', 'Norway', 'Oman', 
                        'Pakistan', 'Palau', 'Palestine', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Poland', 'Portugal', 
                        'Qatar', 'Romania', 'Russia', 'Rwanda', 'Saint Kitts and Nevis', 'Saint Lucia', 'Saint Vincent and the Grenadines', 'Samoa', 'San Marino', 
                        'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia', 'Slovenia', 
                        'Solomon Islands', 'Somalia', 'South Africa', 'South Sudan', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Sweden', 'Switzerland', 
                        'Syria', 'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand', 'Togo', 'Tonga', 'Trinidad and Tobago', 'Tunisia', 'Turkey', 
                        'Turkmenistan', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'Uruguay', 'Uzbekistan', 
                        'Vanuatu', 'Vatican City', 'Venezuela', 'Vietnam', 'Yemen', 'Zambia', 'Zimbabwe'
                    ];
                    foreach ($countries as $country) {
                        echo "<option value=\"$country\">$country</option>";
                    }
                ?>
              </select>
              <!-- <input type="password" class="form-control" id="password" name="country" required> -->
            </div>
            <div class="form-group">
              <label for="password">Password <sup style="color:red">*</sup></label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
              <label for="confirmPassword">Confirm Password <sup style="color:red">*</sup></label>
              <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Register</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
