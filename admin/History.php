<?php include("partials/menu.php")?>

    <div class="main-content">
        <div class="wrapper">
            <div class="whole"><br><br>

                
                <div class="patient">
                    <strong>PATIENT HISTORY</strong>
                    <br><br>
                    <table class="tbl">
                        <tr>
                            <th>S.N</th>
                            <th>ID</th>
                            <th>Phone Number</th>
                            <th>Age</th>
                            <th>Blood Type</th>
                            <th>Required unit</th>
                            <th>Precription</th>
                            <th>Action</th>
                            <th>Remarks/Reason</th>
                        </tr>


                        <?php

                        
                            //sql to get the data from database
                            $sql = "SELECT * FROM tbl_patienthistory";

                            $res = mysqli_query($conn, $sql);

                            if($res==true)
                            {
                                $count = mysqli_num_rows($res);
                                $sn=1;
                                if($count>0)
                                {
                                    while($rows = mysqli_fetch_assoc($res))
                                    {
                                        //get the individual data
                                        $id = $rows['userid'];
                                        $phonenumber = $rows['phone_number'];
                                        $age = $rows['age'];
                                        $bloodtype = $rows['blood_type'];
                                        $requiredunit = $rows['required_unit'];
                                        $prescription = $rows['prescription'];
                                        $action = $rows['action'];
                                        $remarksorreason = $rows['remarksorreason'];

                                        ?>
                                            <tr>
                                                <td><?php echo $sn++ ?></td>
                                                <td><?php echo $id ?></td>
                                                <td><?php echo $phonenumber ?></td>
                                                <td><?php echo $age ?></td>
                                                <td><?php echo $bloodtype ?></td>
                                                <td><?php echo $requiredunit ?></td>
                                                <td>
                                                    <a href="../photos/prescription/<?php echo $prescription?>"><?php echo $prescription ?></a>
                                                </td>
                                                <td>
                                                <?php 
                                                    if($action=='accepted')
                                                    {
                                                        echo "<div class='accepted'>Accepted</div>";

                                                    }
                                                    else
                                                    {
                                                        echo "<div class='deleted'>Deleted</div>";

                                                    }

                                                    ?>
                                                </td>
                                                <td><?php echo $remarksorreason ?></td>
                                            </tr>

                                        <?php

                                    }
                                }
                            }

                        ?>


                    </table>
                </div>
                <br><br>
                <div class="doner">
                    <strong>DONOR HISTORY</strong><br><br>
                    <table class="tbl">
                        <tr>
                            <th>S.N</th>
                            <th>ID</th>
                            <th>Phone Number</th>
                            <th>Age</th>
                            <th>Blood Type</th>
                            <th>Disease</th>
                            <th>Action</th>
                            <th>Reason</th>
                            <th>Unit</th>
                        </tr>


                        <?php
                        

                            //sql to get the data from database
                            $sql2 = "SELECT * FROM tbl_donerhistory";

                            $res2 = mysqli_query($conn, $sql2);

                            if($res2==true)
                            {
                                $count2 = mysqli_num_rows($res2);
                                $sn2=1;
                                if($count2>0)
                                {
                                    while($rows2 = mysqli_fetch_assoc($res2))
                                    {
                                        //get the individual data
                                        $id2 = $rows2['userid'];
                                        $phonenumber2 = $rows2['phone_number'];
                                        $age2 = $rows2['age'];
                                        $bloodtype2 = $rows2['blood_type'];
                                        $disease2 = $rows2['disease'];
                                        $action2 = $rows2['action'];
                                        $reasonorunit2 = $rows2['reasonorunit'];
                                        $unit2 = $rows2['unit'];

                                        ?>
                                            <tr>
                                                <td><?php echo $sn2++ ?></td>
                                                <td><?php echo $id2 ?></td>
                                                <td><?php echo $phonenumber2 ?></td>
                                                <td><?php echo $age2 ?></td>
                                                <td><?php echo $bloodtype2 ?></td>
                                                <td><?php echo $disease2 ?></td>
                                                <td>
                                                    <?php 
                                                    if($action2=='accepted')
                                                    {
                                                        echo "<div class='accepted'>Accepted</div>";

                                                    }
                                                    else
                                                    {
                                                        echo "<div class='deleted'>Deleted</div>";

                                                    }

                                                    ?>
                                                </td>
                                                <td><?php echo $reasonorunit2 ?></td>
                                                <td><?php echo $unit2 ?></td>
                                            </tr>

                                        <?php

                                    }
                                }
                            }

                        ?>


                    </table>
                </div>
            </div>
        </div>
    </div>



<?php include("partials/footer.php")?>