<?php include('partials/menu.php') ?>

        <!-- main content section starts -->
        <div class="main-content">
            <div class="wrapper">

           
                <strong>THIS IS HOME PAGE</strong>
                <br><br>
                <?php
                    if(isset($_SESSION['no-login-message-main-admin']))
                    {
                    echo $_SESSION['no-login-message-main-admin'];
                    unset($_SESSION['no-login-message-main-admin']);
                    }
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['username-password-match']; //displaying session message
                        
                    }



                ?> 
                <div class="boxes">
                    <?php 
                        $sql = "SELECT blood_type FROM tbl_donerhistory ";

                        $res = mysqli_query($conn, $sql);

                        while($row = mysqli_fetch_assoc($res))
                        {
                            $sql2 = "SELECT unit FROM tbl_donerhistory";
                            $res2 = mysqli_query($conn, $sql2);
                            $row2 = mysqli_fetch_assoc($res2);
                            $unit = $row2['unit'];

                            $type = $row['blood_type'];
                            
                            
                           
                        }
                        function total($bloodtype, $conn)
                        {
                                    $sql = "SELECT COUNT(*) as donertotal FROM tbl_donerhistory where blood_type = '$bloodtype'";
                                    $sql2 = "SELECT SUM(unit) as donerunit FROM tbl_donerhistory where blood_type = '$bloodtype'";
                                    
                                    $res = mysqli_query($conn,$sql);
                                    $res2 = mysqli_query($conn,$sql2);

                                    $sql3 = "SELECT COUNT(*) as patienttotal FROM tbl_patienthistory where blood_type = '$bloodtype'";
                                    $sql4 = "SELECT SUM(required_unit) as patientunit FROM tbl_patienthistory where blood_type = '$bloodtype'";
                                    
                                    $res3 = mysqli_query($conn,$sql3);
                                    $res4 = mysqli_query($conn,$sql4);
                                    
                                    if ($res==true && $res2==true && $res3==true && $res4==true) 
                                    {
                                        $row = mysqli_fetch_assoc($res);
                                        $row2 = mysqli_fetch_assoc($res2);
                                        $row3 = mysqli_fetch_assoc($res3);
                                        $row4 = mysqli_fetch_assoc($res4);
                                        // echo $rowcount = $row["total"];
                                        echo $unit = $row2["donerunit"]-$row4['patientunit'];
                                        // echo  $rowcount;
                                    } 
                                

                        }

                        ?>
                        <div class="box">
                      
                  <div class="con">
                    <img src="../photos/blood1.png" alt="blood" style=" width:60%;">
                    <div class="bloodtype">A+</div>
                  </div>
                            <?php
                                total("A+", $conn);
                               
                            ?>
                        </div>
                        <div class="box">
                        <div class="con">
                    <img src="../photos/blood1.png" alt="blood" style=" width:60%;">
                    <div class="bloodtype">B+</div>
                  </div>
                            <?php
                                

                                total("B+", $conn); 
                               
                            ?>
                        </div>
                        <div class="box">
                        <div class="con">
                    <img src="../photos/blood1.png" alt="blood" style=" width:60%;">
                    <div class="bloodtype">O+</div>
                  </div>
                            <?php
                                

                                total("O+", $conn);
                               
                            ?>
                        
                        </div>
                        <div class="box">
                        <div class="con">
                    <img src="../photos/blood1.png" alt="blood" style=" width:60%;">
                    <div class="bloodtype">AB+</div>
                  </div>
                                <?php
                                

                                total("AB+", $conn);
                               
                            ?>
        
                            </div>
                            <div class="box">
                            <div class="con">
                    <img src="../photos/blood1.png" alt="blood" style=" width:60%;">
                    <div class="bloodtype">A-</div>
                  </div>
                                <?php
                                

                                total("A-", $conn);
                               
                            ?>
        
                            </div>
                            <div class="box">
                            <div class="con">
                    <img src="../photos/blood1.png" alt="blood" style=" width:60%;">
                    <div class="bloodtype">B-</div>
                  </div>
                                <?php
                                

                                total("B-", $conn);
                               
                            ?>
        
                            </div>
                            <div class="box">
                            <div class="con">
                    <img src="../photos/blood1.png" alt="blood" style=" width:60%;">
                    <div class="bloodtype">O-</div>
                  </div>
                                <?php
                                    

                                    total("O-", $conn);
                                
                                ?>
        
                            </div>
                            <div class="box">
                            <div class="con">
                    <img src="../photos/blood1.png" alt="blood" style=" width:60%;">
                    <div class="bloodtype">AB-</div>
                  </div>
                                <!-- <img src="../photos/blood1.png" alt=""> -->
                                <?php
                                

                                total("AB-", $conn);
                               
                            ?>
        
                            </div>


                        
                    
                    

             
                </div>
            </div>
        </div>
       


        <!-- main content section ends -->




        <?php include('partials/footer.php') ?>   