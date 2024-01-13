<?php
// echo 'this is delete notice page';

    // include constaints.php
    include('../config/constants.php');

    //get the id of the notice to delete
     $id=$_GET['id'];
    
    
    

    //  create the query to delete notice
    $sql = "DELETE FROM tbl_notice WHERE id=$id";

    // execute the query
    $res = mysqli_query($conn, $sql);

    //check weather the query is succefully executed or not
    if($res==true){
        // echo 'query executed and notice deleted';
        // create session variable to dispaly message;
        $_SESSION['delete-notice'] = "<div class='success'> Notice deleted succesfully </div>";
        
        // redirect to manage notice page
        header('location:'.SITEURL.'admin/Manage-Notice.php');
        
    }
    else{
        // echo 'failed to execute query/delete notice';
        // create session variable to dispaly message;
        $_SESSION['delete-notice'] = "<div class='error'> Failed to delete Notice </div>";


        // redirect to manage notice page
        header('location:'.SITEURL.'admin/Manage-Notice.php');
    }


    // reduce the manage notice page with message (success or error)




?>