<?php include '../header/header.html'?>
<style>
    /* Custom styles for animations */
    .animated {
      animation-duration: 1s;
    }
    .fadeInLeft {
      animation-name: fadeInLeft;
    }
    .fadeInRight {
      animation-name: fadeInRight;
    }
    .blue-bg {
      background-color: #007bff;
      color: white;
      border: 2px solid #007bff;
      padding: 10px;
    }
  </style>

<div class="container">
  <h2 class="text-center mt-5 blue-bg animated fadeInDown">Contact Us</h2>
  <div class="row mt-5">
    <div class="col-md-6">
      <form class="animated fadeInLeft">
        <div class="form-group">
          <label for="name">Your Name:</label>
          <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
          <label for="email">Your Email:</label>
          <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
          <label for="message">Message:</label>
          <textarea class="form-control" id="message" rows="5" placeholder="Enter your message" required></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-danger">Cancel</button>
        <br>
      </form>
    </div>
    <div class="col-md-6">
      <div class="animated fadeInRight">
        <h4>Contact Details:</h4>
        <p><strong>Email:</strong> <a href="mailto:wezimosiuoa@gmail.com"> wezimosiuoa@gmail.com </a></p>
        <p><strong>Phone:</strong> +266 5995 9655 </p>
        <p><strong>Address:</strong> Freedom House Lower Thamae Ha Chaltin, Maseru, Lesotho</p>
      </div>
    </div>
  </div>
</div>
<hr>
<?php include '../public/footer.php';?>