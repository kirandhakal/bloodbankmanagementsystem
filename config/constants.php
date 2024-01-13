
<?php
    // starting session
    session_start();





    // create constant to store non-repetating value
    define('SITEURL', 'http://localhost/bbms/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'bbms');
    
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());//database connection
    $db_sel = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());//selecting database


?>