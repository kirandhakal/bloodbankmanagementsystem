<?php include('partials/menu.php') ?>

        <!-- main content section starts -->
        <div class="main-content">
            <div class="wrapper">
                <strong>THIS IS Patient PAGE</strong>
                <!-- <br><br>
                <div><a href="#" class="btn-primary">Add Patient</a></div>
                <br> -->
                <br><br>
                <?php
                    if(isset($_SESSION['deleted-patient']))
                    {
                        echo $_SESSION['deleted-patient'];
                        unset($_SESSION['deleted-patient']);
                    }

                ?>
                <br><br>
                <div class="whole">
                    <table class = "tbl">
                        <tr>
                            <th>S.N</th>
                            <th>ID</th>
                            <th>Phone Number</th>
                            <th>Age</th>
                            <th>Blood Type</th>
                            <th>Required Unit</th>
                            <th>Prescription</th>
                            <th>action</th>
                        </tr>

                        <?php

                //create sql to get the information of doner from database table
                $sql = "SELECT * FROM tbl_patient";

                //Execute the query
                $res = mysqli_query($conn, $sql);

                //check weather the query is executed or not
                if($res==true)
                {
                    //count the number of rows to check the number of datas
                    $count = mysqli_num_rows($res);

                    // initilizing the value for serialno (sn)
                    $sn=1;

                    // get the values from the rows 
                    if($count>0)
                    {
                        //use loop to get all the data from database
                        while($rows = mysqli_fetch_assoc($res))
                        {

                            // get individual data
                            $id = $rows['id'];
                            $userid = $rows['User_id'];
                            $phonenumber = $rows['Phone_Number'];
                            $age = $rows['Age'];
                            $bloodtype = $rows['Blood_Type'];
                            $requiredunit = $rows['Required_Unit'];
                            $prescription = $rows['Prescription'];
                            

                            //dispaly the value in the table
                            ?>
                            <tr>
                                <td><?php echo $sn++?></td>
                                <td><?php echo $userid?></td>
                                <td><?php echo $phonenumber ?></td>
                                <td><?php echo $age ?></td>
                                <td><?php echo $bloodtype ?></td>
                                <td><?php echo $requiredunit ?></td>
                                <td><a href="../photos/prescription/<?php echo $prescription?>"><?php echo $prescription ?></a></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/accept-patientrequest.php?id=<?php echo $id;?>" class= "btn-secondary">Accept</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-patientrequest.php?id=<?php echo $id;?>" class= "btn-danger">Delete </a>
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