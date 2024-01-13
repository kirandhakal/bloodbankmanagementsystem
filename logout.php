<?php
// include constaint.php file for SITEURL
include('config/constants.php');

// destroy the session
session_destroy(); // it also unset $_SESSION['user'];

// redirect to index page
header('location:'.SITEURL);




?>