<?php include('login-check1.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord</title>
    <link rel="stylesheet" href="dashbord.css">
</head>
<body>

              <?php
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                }
              ?>

      <!-- menu section starts -->
    <div class="menu">
      <div class="logo">
        <h3>
        
             

                    <?php
                        if(isset($_SESSION['username-password-match']))
                        {
                            echo $_SESSION['username-password-match'];
                            
                        }
                        

                    ?>


                
           
      </h3>
    </div>
    <div class="wrapper">
      <ul>
        <li> <a href="<?php SITEURL ?>orderblood.php?id=<?php echo $id?>">Order Blood</a></li>
        <li> <a href="<?php SITEURL ?>donateblood.php?id=<?php echo $id?>">Donate Blood</a></li>
        <li> <a href="logout.php">Log out</a></li>
        

      </ul>
    </div>
  </div>
  <!-- table section start -->
  <div class="blood-learn">
    <br>
        <?php
          if(isset($_SESSION['orderblood']))
          {
              echo $_SESSION['orderblood'];
              unset($_SESSION['orderblood']);
              
          }
          if(isset($_SESSION['donateblood']))
          {
              echo $_SESSION['donateblood'];
              unset($_SESSION['donateblood']);
              
          }
        

        ?>
      <br>

    <table class="table">
      <tbody>
        <tr>
          <th colspan="3">Compatible Blood Type Donors</th>
        </tr>
        <tr>
          <td><b>Blood Type</b></td>
          <td><b>Donate Blood To</b></td>
          <td><b>Receive Blood From</b></td>
        </tr>
        <tr>
          <td><b>A+</b></td>
          <td>A+, AB+</td>
          <td>A+, A-, O+, O-</td>
        </tr>
        <tr>
          <td><b>O+</b></td>
          <td>O+, A+, B+, AB+</td>
          <td>O+, O-</td>
        </tr>
        <tr>
          <td><b>B+</b></td>
          <td>B+, AB+</td>
          <td>B+, B-, O+, O-</td>
        </tr>
        <tr>
          <td><b>AB+</b></td>
          <td>AB+</td>
          <td>Everyone</td>
        </tr>
        <tr>
          <td><b>A-</b></td>
          <td>A+, A-, AB+, AB-</td>
          <td>A-, O-</td>
        </tr>
        <tr>
          <td><b>O-</b></td>
          <td>Everyone</td>
          <td>O-</td>
        </tr>
        <tr>
          <td><b>B-</b></td>
          <td>B+ B- AB+ AB-</td>
          <td>B- O-</td>
        </tr>
        <tr>
          <td><b>AB-</b></td>
          <td>AB+, AB-</td>
          <td>AB-, A-, B-, O-</td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- table section end -->
    <!-- footer section starts -->
    <div class="footer">
        <div class="wrapper">
          <p class="text-center">2023 © ALL RIGHT RESERVED</p>
        </div>
    </div>
    
    
    
    
      <!-- footer section ends -->
    
</body>
</html>