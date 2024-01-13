<?php include('config/constants.php'); ?>

<html>

<head>
  <title>
    Blood bank management system 
  </title>
  <link rel="stylesheet" href="index.css">
</head>

<body>

  <!-- menu section starts -->
  <div class="menu">
    <div class="logo">
      <h1>BBMS</h1>
    </div>
    <div class="wrapper">
      <ul>
        <li> <a href="<?php echo SITEURL; ?>">Home</a></li>
        <li> <a href="<?php echo SITEURL; ?>signup.php">Sign up</a></li>
        <li> <a href="<?php echo SITEURL; ?>login.php">Log in</a></li>
        <li> <a href="<?php echo SITEURL; ?>notice.php">Notice</a></li>
        

      </ul>
    </div>
  </div>



  <!-- menu section ends -->

  <!-- main content section starts -->
  <div class="main-content">
    <div class="upper">

      <div class="image">
        <img src="photos/bbb.png" alt="">
      </div>
      <div class="heading">
        BLOOD BANK MANAGEMENT SYSTEM
      </div>
    </div>
    <div class="text">
      <div class="lower">
        <p> Blood is a life so, <br> <span id="element"></span></p>
      </div>
    </div>
  </div>
  <div class="user-count">
    <div class="total-user">
      <p>
      <div class="image">
                <img src="photos/user.png" alt="">
            </div>
            <p><?php
    
    $tableName = "tbl_signup";

$sql = "SELECT COUNT(*) as total FROM tbl_signup";
$result0 = $conn->query($sql);

if ($result0->num_rows > 0) {
    $row = $result0->fetch_assoc();
    $rowCount = $row["total"];
    echo "" . $rowCount;
} else {
    echo "No rows found in $tbl_signup";
}
?><br>
        Registered users
      </p>
     
    </div>
    <div class="blood-collected">
    <div class="image">
                <img src="photos/blood1.png" alt="">
            </div>
      <p>
      <?php
    $tableName = "tbl_donerhistory";

$sql = "SELECT SUM(unit) as total FROM tbl_donerhistory";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $rowCount = $row["total"];
    echo "" . $rowCount;
} else {
    echo "No rows found in $tbl_signup";
}
?> <br>
        Blood units collected
      </p>

    </div>
  </div>
  
  
  <div class="last">
  <div class="about">
    <h1>About Us</h1>
    <p>
      Blood Bank Management System is a Web App solution designed to efficiently
      manage the operations of a blood bank. It aims to organize the process of blood donation,
      storage, and distribution while ensuring optimal record management and improved
      accessibility for patients in need. The system incorporates features such as donor
      registration, blood typing, screening for blood requests, and expiration dates. With its
      user-friendly interface, the Blood Bank Management System provides an effective tool
      for enhancing the overall efficiency and effectiveness of blood bank operations.
      <br><br>
    </p>
  </div>
  <div class="social">
 <h2> &nbsp;&nbsp;&nbsp;&nbsp; follows us</h2>
    
    <br>
 contact at:<a href="tel:+977-0000000">+977-0000000</a><br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<br>
 mail at:<a href="bbms@gmail.com">bbms@gmail.com</a>

  </div>
  </div>

  <!-- main content section ends -->

  <!-- footer section starts -->
  <div class="footer">
    <div class="wrapper">
      <p class="text-center">2023 © ALL RIGHT RESERVED</p>
    </div>
  </div>




  <!-- footer section ends -->



  <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
  <!-- Setup and start animation! -->
  <script>
    var typed = new Typed('#element', {
      strings: ['Donate Blood', ' Donate Blood'],
      typeSpeed: 55,
    });
  </script>
</body>

</html>