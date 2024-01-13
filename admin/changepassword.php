<?php include('partials/menu.php') ?>

    <!-- main content section starts -->
    <div class="main-content">
        <div class="wrapper">
        <strong>CHANGE PASSWORD</strong>
        <?php
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
        }

        ?>
            <div>
                <form action="" method="POST">
                <label for="currentpassword">Current Password:</label>
                <input type="password" id="currentpassword" name="currentpassword" placeholder="Current Password" required ><br> 
                <label for="newpassword">New Password:</label>
                <input type="password" id="newpassword" name="newpassword" placeholder="New Password" required ><br> 
                <label for="conformpassword">Confirm Password:</label>
                <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" required ><br> 
                <input type="submit" name="submit" value="submit" class="btn-primary">
                <input type="hidden" name='id' value = "<?php echo $id; ?>" > 
            </form>

            </div>
            <?php
                    if(isset($_POST['submit'])){
                        // echo "button clicked";

                        //get the data from form
                        // $currentpassword = md5($_POST['currentpassword']);
                        // $newpassword = md5($_POST['newpassword']);
                        // $confirmpassword= md5($_POST['confirmpassword']);

                        $id = $_POST['id'];
                        $currentpassword = $_POST['currentpassword'];
                        $newpassword = $_POST['newpassword'];
                        $confirmpassword= $_POST['confirmpassword'];


                        //check weather the user with current id and current password exists or not
                        $sql = "SELECT * FROM tbl_admin WHERE id=$id AND Password='$currentpassword'";

                        //execute the query
                        $res =mysqli_query($conn, $sql);

                        if($res==true){
                            // check weather the value is present or not 
                            $count = mysqli_num_rows($res);

                            if($count==1){
                                // echo "user found";
                                
                                // check wheather new password and conform pasword match or not 
                                
                                //check wheather the newpassword and confirmpassword is same or not
                                if($newpassword==$confirmpassword){
                                    // echo "password are same";

                                    //create sql query to update password
                                    $sql2 = "UPDATE tbl_admin SET
                                    Password = '$newpassword' WHERE id = $id
                                    ";


                                    // execute the query
                                    $res2= mysqli_query($conn, $sql2);

                                    //check weather the query is executed or not
                                    if($res2==true){
                                        // echo "password changed"; 
                                        $_SESSION['passwordchange'] = "<div class = 'success' > Successfully password changed </div>"; //success message
                                        header('location:'.SITEURL.'admin/Manage-admin.php');//redirect to manage admin page

                                    }
                                    else{
                                        $_SESSION['passwordchange'] = "<div class = 'error' > Failed to change password </div>"; //unsuccess message
                                        header('location:'.SITEURL.'admin/Manage-admin.php');//redirect to manage admin page


                                    }
        
                                }
                                else{
                                    // echo "password are not same";
                                    $_SESSION['passwordnotmatch'] = "<div class = 'error' > Password not match </div>";
                                header('location:'.SITEURL.'admin/Manage-Admin.php');
                                }
                            }
                            else{
                                //user not exists
                                $_SESSION['usernotfound'] = "<div class = 'error' > User not found </div>";
                                header('location:'.SITEURL.'admin/Manage-Admin.php');
                            }

                        }



                        //change password if all above condition is true



                    }


                    // else{
                    //     // echo "button not clicked";
                    // }





                ?>
        </div>
    </div>


    <!-- main content section ends -->




<?php include('partials/footer.php') ?>   



           

        




        
