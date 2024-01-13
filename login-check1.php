<?php include('config/constants.php')?>

<?php

//checked weather the user is login or not
if(!isset($_SESSION['user'])) // if user session is not set or user is not logged in
{
    //redirect to login page with message
    $_SESSION['no-login-message-user'] = "<div class='error'>Please login first user</div>";
    //redirect to login page
    header('location:'.SITEURL.'login.php');

}




?>