
<?php include('config/constants.php') ?>

<?php
// echo 'this is delete admin page';

    // include constaints.php
    include('../config/constants.php');
    

    //get the id of the admin to delete
     $id=$_GET['id'];
    
    
    

    //  create the query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    // execute the query
    $res = mysqli_query($conn, $sql);

    //check weather the query is succefully executed or not
    if($res==true){
        // echo 'query executed and admin deleted';
        // create session variable to dispaly message;
        $_SESSION['delete'] = "<div class='success'> Admin deleted succesfully </div>";
        
        // redirect to manage admin page
        header('location:'.SITEURL.'admin/Manage-Admin.php');
        
    }
    else{
        // echo 'failed to execute query/delete admin';
        // create session variable to dispaly message;
        $_SESSION['delete'] = "<div class='error'> Failed to delete admin </div>";


        // redirect to manage admin page
        header('location:'.SITEURL.'admin/Manage-Admin.php');
    }


    // reduce the manage admin page with message (success or error)




?>