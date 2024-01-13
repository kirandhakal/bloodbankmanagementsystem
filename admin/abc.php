                <?php
                    if(isset($_POST['save'])){
                        // echo "button clicked";

                        //get the data from form
                        // $currentpassword = md5($_POST['currentpassword']);
                        // $newpassword = md5($_POST['newpassword']);
                        // $confirmpassword= md5($_POST['confirmpassword']);

                        $currentpassword = $_POST['currentpassword'];
                        $newpassword = $_POST['newpassword'];
                        $confirmpassword= $_POST['confirmpassword'];


                        //check weather the user with current id and current password exists or not
                        $sql = "SELECT * FROM tbl_admin WHERE id=$id AND Passowrd='$currentpassword'";

                        //execute the query
                        $res =mysqli_query($conn, $sql);

                        if($res==true){
                            // check weather the value is present or not 
                            $count = mysqli_num_rows($res);

                            if($count==1){
                                // user exists 
                                $_SESSION['usernotfound'] = "<div class = 'success' > User found </div>";
                                header('location:'.SITEURL.'admin/update-admin.php');
                            }
                            else{
                                //user not exists
                                $_SESSION['usernotfound'] = "<div class = 'error' > User not found </div>";
                                header('location:'.SITEURL.'admin/update-admin.php');
                            }

                        }


                        //check wheather the newpassword and confirmpassword is same or not
                        if($newpassword==$confirmpassword){
                            // echo "password are same";

                        }
                        else{
                            // echo "password are not same";
                        }

                        //change password if all above condition is true



                    }


                    // else{
                    //     // echo "button not clicked";
                    // }





                ?>



<form action="" method="POST">
                    <label for="currentpassword">Current Password:</label>
                    <input type="password" id="currentpassword" name="currentpassword" placeholder="Current Password" required ><br> 
                    <label for="newpassword">New Password:</label>
                    <input type="password" id="newpassword" name="newpassword" placeholder="New Password" required ><br> 
                    <label for="conformpassword">Confirm Password:</label>
                    <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" required ><br> 
                    <input type="submit" name="save" value="Save Password" class="btn-primary">
                </form>






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




<?php
                  if(isset($_SESSION['passwordnotmatch'])){
                    echo $_SESSION['passwordnotmatch'];  //display session message
                    unset($_SESSION['passwordnotmatch']); //remove session message
                }
                ?>










                            <div class="box">
                                AB+
                                <?php 
                                    if($type=='AB+')
                                    {
                                        echo $unit;
                                    }
                                ?>
        
                            </div>
                            <div class="box">
                                A-
                                <?php 
                                    if($type=='A-')
                                    {
                                        echo $unit;
                                    }
                                ?>
        
                            </div>
                            <div class="box">
                                B-
                                <?php 
                                    if($type=='B-')
                                    {
                                        echo $unit;
                                    }
                                ?>
        
                            </div>
                            <div class="box">
                                O-
                                <?php 
                                    if($type=='O-')
                                    {
                                        echo $unit;
                                    }
                                ?>
        
                            </div>
                            <div class="box">
                                AB-
                                <?php 
                                    if($type=='AB-')
                                    {
                                        echo $unit;
                                    }
                                ?>
        
                            </div>