<?php  include('config/constants.php')?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
 
  <div class="container">
 
      <div class="form">   
      <h1>Sign up</h1>

         <?php
            if(isset($_SESSION['signuperrormessage']))
            {
              echo $_SESSION['signuperrormessage'];//displaying signup message
              unset($_SESSION['signuperrormessage']);//remove session message
            }
            if(isset($_SESSION['username-not-available']))
            {
              echo $_SESSION['username-not-available'];//displaying signup message
              unset($_SESSION['username-not-available']);//remove session message
            }

            



         ?>
   



      <form method="POST">
        
         <label for="fullname">Enter Fullname : </label><br>
         <input type="text" name="getfullname" id="fullname" required><br>

         <label for="username">Enter username : </label><br>
         <input type="text" name="getusername" id="username" required><br>
        

         <label for="email">Enter you email: </label><br>
         <input type="email" name="getemail" id="email" required><br>

         <label for="password">Enter password : </label><br>
         <input type="password" name="getpass" id="password" required><br>

         <label for="cpassword">Confirm password : </label><br>
         <input type="password" name="conpass" id="cpassword" required><br><br>

         <input type="submit" name="submit" value="Sign up" class="btn">
       
      </form>
      <div class="account">
        <p>Already have an account?</p>
        <p><a href="<?php echo SITEURL ?>login.php">Log in</a></p>
       </div>

      
    </div>
   </div>

   <?php 
      // echo "php is shown in page";
      // process the form and get the data 

      // check weather the form is submitted or not 
      if(isset($_POST['submit']))
      {
         //get the value from form
         $fullname = $_POST['getfullname'];
         $username = $_POST['getusername'];
         $sql5 = "SELECT * FROM tbl_signup WHERE User_name = '$username'";

         $res5 = mysqli_query($conn, $sql5);

         $count5 = mysqli_num_rows($res5);

         if($count5>0)
         {
            $_SESSION['username-not-available'] = '<div class="error">Username not available</div>';
            header('location:'.SITEURL.'signup.php');
            die();
         }
         $email = $_POST['getemail'];
         // $password = md5($_POST['getpass']);
         // $confirmpassword = md5($_POST['conpass']);
         $password = $_POST['getpass'];
         $confirmpassword = $_POST['conpass'];


         // check wheater the password and conform password is same or not 
         if($password==$confirmpassword)
         {
            //SQL query to save data in database
            $sql = "INSERT INTO tbl_signup SET
               Full_name = '$fullname',
               User_name = '$username',
               Email= '$email',
               Password= '$password'
               ";

            //execute query and save data in database
            $res= mysqli_query($conn, $sql);


            //check data is inserted or not
            if($res==true)
            {
               // echo 'data inserted';

               // create a session variable to display message 
               $_SESSION['signupmessage'] = "<div class = 'success'>Succefully Sign Up </div>";//session message
               header('location:'.SITEURL.'login.php');//redirect to login page
            }
            else
            {
               // echo 'data not inserted';
               $_SESSION['signuperrormessage'] = "<div class = 'error'> Unsuccefull to Sign Up</div>";//session message
               header('location:'.SITEURL.'signup.php');//redirect to signup page
            }
         }
         else
         {
            // echo "password didnot match";
            $_SESSION['signuperrormessage'] = "<div class = 'error'> Password didnot match</div>";//session message
               header('location:'.SITEURL.'signup.php');//redirect to signup page

         }
         
      }






   ?>

   
</body>
</html>