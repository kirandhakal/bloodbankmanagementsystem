<?php include('partials/menu.php') ?>


        <!-- menu section ends -->

        <!-- main content section starts -->
        <div class="main-content">
            <div class="wrapper">
                <strong>THIS IS Admin PAGE</strong>
                <br><br>

                <?php
               
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add']; //displaying session message
                    unset($_SESSION['add']); //removing session message
                }


                if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete']; //displaying session message
                    unset($_SESSION['delete']); //removing session message
                }

                if(isset($_SESSION['update'])){
                    echo $_SESSION['update']; //displaying sesson message
                    unset($_SESSION['update']); //removing sesson message after refreshing the page
                }
                if(isset($_SESSION['usernotfound'])){
                    echo $_SESSION['usernotfound'];  //display session message
                    unset($_SESSION['usernotfound']); //remove session message
                }
                if(isset($_SESSION['passwordnotmatch'])){
                    echo $_SESSION['passwordnotmatch'];  //display session message
                    unset($_SESSION['passwordnotmatch']); //remove session message
                }
                if(isset($_SESSION['passwordchange'])){
                    echo $_SESSION['passwordchange'];  //display session message
                    unset($_SESSION['passwordchange']); //remove session message
                }
               


                ?>
                <br><br>

                
                <div><a href="<?php echo SITEURL;?>admin/add-admin.php" class="btn-primary">Add Admin</a></div>
                <br>
                <div class="whole">
                    <table class = "tbl">
                        <tr>
                            <th>S.N</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>User Name</th>
                            <th>Password</th>
                            <th>action</th>
                        </tr>


                        <?php
                        // query to get all the admin
                        $sql = "SELECT * FROM tbl_admin";

                        // Execute the query
                        $res = mysqli_query($conn,$sql);

                        //check weather the query is executed or not
                        if($res==true){
                            // count rows to check wheather we have data in database or not
                            $count = mysqli_num_rows($res);
                            $sn=1;//initial value for sn

                            // check no of rows 
                            if($count>0){
                                // data in database 
                                while($rows = mysqli_fetch_assoc($res)){
                                    //using while loop to get all the data in database

                                    // get individual data
                                    $id = $rows['id'];
                                    $fullname = $rows['Full_name'];
                                    $email = $rows['Email'];
                                    $username = $rows['User_name'];
                                    $password = $rows['Password'];

                                    //display the value in table
                                    ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php  echo $fullname?></td>
                                        <td><?php  echo $email?></td>
                                        <td><?php  echo $username?></td>
                                        <td><?php  echo $password?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/changepassword.php?id=<?php echo $id;?>" class= "btn-normal">Change Password</a>
                                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id;?>" class= "btn-secondary">Update Admin</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id;?>" class= "btn-danger">Delete Admin</a>
                                        </td>
                                    </tr>



                                    <?php
                                }

                            }
                            else{
                                //no data in database
                            }

                        }




                        ?>



                       
                        
                    </table>

                </div>
            </div>
        </div>


        <!-- main content section ends -->

       

<?php include('partials/footer.php') ?>