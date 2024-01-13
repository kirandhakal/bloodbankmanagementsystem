<?php include('login-check1.php');?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>donate blood</title>
  <link rel="stylesheet" href="donateblood.css">
</head>

<body>
  <div class="container">

            <?php
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                }
                


            ?>




    <form action="" method="POST">

      <div class="info">
        <label for="phone">Phone number:</label><br>
        <input type="number" id="phone" name="phone" required>
        <br>
        <label for="age">Enter a Age:</label><br>
        <input type="number" min="0" id="age" name="age" required><br>
        <!-- <label for="required-unit">Enter required units</label><br>
        <input type="number" min="" id="required-unit" name="required_unit" required><br> -->
        <label for="disease">Disease(if any):</label><br>
        <input type="text" id="disease" name="disease" placeholder="No disease"><br>
        
        <label for="blood-type">Blood Type:</label><br>
        <select id="blood-type" name="blood_type" required>
          <option value="">Select Blood Type</option>
          <option value="A+">A+</option>
          <option value="A-">A-</option>
          <option value="B+">B+</option>
          <option value="B-">B-</option>
          <option value="O+">O+</option>
          <option value="O-">O-</option>
          <option value="AB+">AB+</option>
          <option value="AB-">AB-</option>
          <option value="unknown">unknown</option>
        </select><br>
        
        <label for="message">Additional Message:</label><br>
        <textarea id="message" name="message" rows="4"></textarea>
        
        
      </div>

      <br><br>
      <input type="submit" name = "submit" class="submit" value="Submit request">
    </form>


  </div>






  <?php
    //check weather the button is clicked or not
    if(isset($_POST['submit']))
    {
      //get the value form form
      $phone = $_POST['phone'];
      $age = $_POST['age'];
      $disease = $_POST['disease'];
      $blood_type = $_POST['blood_type'];
      $message = $_POST['message'];

      //create sql to save data on database
      $sql = "INSERT INTO tbl_doner SET
      userid = '$id',
      Phone_number = '$phone',
      Age = '$age',
      Disease = '$disease',
      Blood_type = '$blood_type',
      Additional_message = '$message'
      ";

      // creating connection between code and database 
      $res = mysqli_query($conn, $sql);

      //checking weather the data is inserted in database or not
    
      
        // echo 'data inserted';
    
      if($res==true)
           {
              // echo 'data inserted';
              session_start();
              $_SESSION['donateblood']= " <div class='success'>succefully donated blood</div>";
              // $_SESSION['sendusername']=$getusername;
              header('location:'.SITEURL.'dashbord.php');

           }
           


    }




  ?>
</body>

</html>