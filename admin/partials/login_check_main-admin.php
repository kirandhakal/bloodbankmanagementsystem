<?php

// include('../config/constants.php');

//checked weather the admin is main-admin or not
if(isset($_GET['id2']))
{
    $id2 = $_GET['id2'];
}
if(isset($_GET['id']))
{
    $id = $_GET['id'];
}


$sql = "SELECT * FROM tbl_admin WHERE id = '$id2'";

$res = mysqli_query($conn, $sql);

if($res==true)
{
    $row = mysqli_fetch_assoc($res);

    $username = $row['User_name'];
    $email = $row['Email'];
    $fullname = $row['Full_name'];
    $password = $row['Password'];

    // $password2 = md5(12345);
    $password2 = "12345";
    
    
    if($username!=="admin"||$email!=="admin@gmail.com"||$fullname!=="Administor"||$password!=="$password2")
    {
        
            //redirect to index page with message
            $_SESSION['no-login-message-main-admin'] = "<div class='error'>ACCESS DENIEDdfsdfawde</div>";

            //redirect to index page
            header('location:'.SITEURL.'admin/index.php?id='.$id2);
            die();

    
    }
    else{
        die();
        
        
    }

}
// if(!isset($_SESSION['main-admin'])) // if user session is not set or user is not logged in
// {
//     //redirect to login page with message
//     $_SESSION['no-login-message-main-admin'] = "<div class='error'>ACCESS DENIED</div>";
//     //redirect to login page
//     header('location:'.SITEURL.'admin/index.php');

// }



?>