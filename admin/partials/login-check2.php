<?php

//checked weather the admin is login or not

if(!isset($_SESSION['admin'])) // if user session is not set or user is not logged in
{
    //redirect to login page with message
    $_SESSION['no-login-message-admin'] = "<div class='error'>Please login first admin</div>";
    //redirect to login page
    header('location:'.SITEURL.'login.php');

}



?>