<?php include('partials/menu.php') ?>



        <!-- main content section starts -->
        <div class="main-content">
            <div class="wrapper">
                <strong>UPDATE ADMIN</strong>

                <?php 

                    // get the id of the selected admin
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];

                    }


                    //create query to get the other values
                    $sql = "SELECT * FROM tbl_admin WHERE id=$id";

                    //execute the query
                    $res = mysqli_query($conn, $sql);

                    //check wheather the query is executed or not
                    if($res==true){
                        // check wheather the data is available or not
                        $count=mysqli_num_rows($res);

                        // check we have admin or not
                        if($count==1){
                            // echo "Admin available in database";
                            $row=mysqli_fetch_assoc($res);

                            $fullname = $row['Full_name'];
                            $username = $row['User_name'];
                            $email = $row['Email'];


                        }
                        else{
                            // redirect to manage admin page
                            header('location:'.SITEURL.'admin/Manage-Admin.php');
                        }

                    }
                    else{

                    }


                ?>
               
                

                


                <div>
                <form action="" method="POST">
                    <label for="fullname">Full Name:</label>
                    <input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>" required ><br>
                    
                    <label for="username">User Name:</label>
                    <input type="text" id="username" name="username" value="<?php echo $username; ?>" required><br>
                    
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $email; ?>" required ><br>
                    
                    <!-- <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter Password" required ><br> -->

                    <input type="hidden" name='id' value = "<?php echo $id; ?>" > <br>

                    
                    <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    <!-- <a href="changepassword.php" class="btn-primary" name="change">Change Password</a> -->
                    <!-- <a href="<?php echo SITEURL; ?>admin/changepassword.php?id=<?php echo $id;?>" class= "btn-primary">Change Password</a> -->
                    <!-- <input type="submit" name="change" value="Change Password" class="btn-primary"> -->
                </form>
                    

                </div>
            </div>
        </div>


        <?php
        // check weather the form is submitted or not 
        if(isset($_POST['submit'])){
            // echo 'button clicked';
            // get all the value from form 
            $id = $_POST['id'];
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $email = $_POST['email'];

            //create sql query to update admin
            $sql = "UPDATE tbl_admin SET 
            Full_name = '$fullname',
            User_name = '$username',
            Email = '$email' WHERE id = '$id'
            ";


            // execute the query
            $res = mysqli_query($conn, $sql);

            //check weather the query executed query is succesfull or not
            if($res==true){
                // echo "Admin updated succefully ";

                //create a session variable to display the message
                $_SESSION['update'] = "<div class = 'success'> Admin update succesfully </div>";

                //redirect to manage admin page
                header('location:'.SITEURL.'admin/Manage-Admin.php');


            }
            else{
                // echo "Unsuccesfull to update admin";
                $_SESSION['update'] = "<div class = 'error'> Failed to update admin </div>";

                //redirect to manage admin
                header('location:'.SITEURL.'admin/Manage-Admin.php');
            }


        }


        ?>




        



        <!-- main content section ends -->




        <?php include('partials/footer.php') ?> 