<?php  include('config/constants.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
      <div class="container">
       <div>
         <h1>Log in</h1>
         
         <?php
            if(isset($_SESSION['signupmessage']))
            {
              echo $_SESSION['signupmessage'];//displaying signup message
              unset($_SESSION['signupmessage']);//remove session message
            }
            if(isset($_SESSION['username-password-not-match']))
            {
              echo $_SESSION['username-password-not-match'];//displaying signup message
              unset($_SESSION['username-password-not-match']);//remove session message
            }
            if(isset($_SESSION['no-login-message-user']))
            {
              echo $_SESSION['no-login-message-user'];
              unset($_SESSION['no-login-message-user']);
            }
            if(isset($_SESSION['no-login-message-admin']))
            {
              echo $_SESSION['no-login-message-admin'];
              unset($_SESSION['no-login-message-admin']);
            }
            



         ?>


         <form method="POST">
            

            <label for="username">Enter username : </label><br>
            <input type="text" name="getusername" id="username"><br>

            <label for="password">Enter password : </label><br>
            <input type="password" name="getpassword" id="password"><br><br>

          
           <input type="submit" name = "submit" class='btn' value = 'Log in' >
         </form>
         <div class="account">
          <p>Don't have and account?</p>
          <p><a href="<?php echo SITEURL; ?>signup.php">sign up</a></p>
         </div>

         
       </div>
      </div>





      <?php
      // heck weather the form is submitted or not
      if(isset($_POST['submit']))
      {
        // echo 'button clicked';

        //get the values from form
        $username = $_POST['getusername'];
        // $password = md5($_POST['getpassword']);
        $password = $_POST['getpassword'];


        //create sql query to get the actual data
        $sql1 = "SELECT * FROM tbl_signup WHERE 
                User_name='$username' AND
                Password='$password'
                ";

        $sql2 = "SELECT * FROM tbl_admin WHERE 
                User_name='$username' AND
                Password='$password'
                ";

        //execute the query
        $res1 =mysqli_query($conn, $sql1);
        $res2 =mysqli_query($conn, $sql2);

        //count if the users having given username and password exists or not
        $count1 = mysqli_num_rows($res1);
        $count2 = mysqli_num_rows($res2);


        if($count2==1)
        {
          // echo "admin exists";
          $row=mysqli_fetch_assoc($res2);
          

         echo $id = $row['id'];//get id of admin from database
          $_SESSION['username-password-match']= " $username ";
          $_SESSION['admin'] = $username;//it checks weather the user is looged in or not and logout unsets it
          header('location:'.SITEURL.'admin/index.php');


          
          

        }
        elseif ($count1==1)
        {
          
          // echo "user exists";
          $row=mysqli_fetch_assoc($res1);
          
          $id = $row['id'];//get id of admin from database
          $_SESSION['username-password-match']= "$username ";
          $_SESSION['user'] = $username;//it checks weather the admin is looged in or not and logout unsets it
          header('location:'.SITEURL.'dashbord.php?id='.$id);

        } 

        else
        {
          // echo "Username and Password not found";
          $_SESSION['username-password-not-match']= "<div class='error'>Username and password doesnot match</div>";
          header('location:'.SITEURL.'login.php');
        }
        
        

      }






      ?>




</body>
</html>