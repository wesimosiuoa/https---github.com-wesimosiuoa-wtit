<?php include '../header/header.html'?>

<style>
    h1, h2, h3, h4, h5, h6 {
      background-color: #007bff;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      animation: fadeInUp 1s ease-in-out;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
<div class="container mt-5">
    <div class="row">
      <div class="col-lg-8">
        <h1>Welcome to Wezi Tech Institute of Technology</h1>
        <p>Wezi Tech Institute of Technology offers cutting-edge software engineering courses designed to equip students with the skills and knowledge needed to thrive in the rapidly evolving tech industry.</p>
        <p>Our courses cover a wide range of topics including:</p>
        <ul>
          <li>Programming Fundamentals</li>
          <li>Web Development</li>
          <li>Mobile App Development</li>
          <li>Database Management</li>
          <li>Software Testing</li>
          <li>And much more!</li>
        </ul>
        <p>Whether you're a beginner looking to start a career in software engineering or a seasoned professional seeking to enhance your skills, Wezi Tech Institute of Technology has a course tailored for you.</p>
      </div>
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Enroll Now!</h5>
            <p class="card-text">Don't miss out on the opportunity to kickstart your career in software engineering. Enroll in our courses today!</p>
            <a href="../public/view-courses-and-enrol.php" class="btn btn-primary">Learn More <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-md-4">
        <h2>Vision</h2>
        <p>We see a time when education is not limited by geography. Our vision at Wezi Tech Institute
            of Technology is to establish ourselves as a global leader in online education, transforming the
            way people interact with software engineering programs. Our mission is to develop expertise,
            promote innovation, and shape the next wave of tech leaders. 
        </p>
      </div>
      <div class="col-md-4">
        <h2>Mission</h2>
        <p>Wezi Tech Institute of Technology is dedicated to promoting excellence in software
          engineering by empowering aspirant minds with compressive, synchronous, and easily
          accessible online education. We work hard to give our students the abilities and information
          necessary to succeed in the fast-paced world of technology.</p>
      </div>
      <div class="col-md-4">
        <h2>Our Team</h2>
        <p>Wezi Tech Institute of Technology boasts a team of dedicated and experienced instructors who are passionate about technology and education. Our instructors are industry experts with extensive hands-on experience in software engineering.</p>
      </div>
    </div>
  </div>
  <hr>
  <?php 
    include '../public/footer.php';
  ?>