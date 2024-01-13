<?php include('partials/menu.php') ?>

        <!-- main content section starts -->
        <div class="main-content">
            <div class="wrapper">
                <strong>NOTICE</strong>
                <br><br>


        <?php
            if(isset($_SESSION['notice-upload']))
            {
                echo $_SESSION['notice-upload']; //displaying session message
                unset($_SESSION['notice-upload']); //removing session message
            }
            if(isset($_SESSION['delete-notice'])){
                echo $_SESSION['delete-notice']; //displaying session message
                unset($_SESSION['delete-notice']); //removing session message
            }




        ?>
        <br><br>


                <div><a href="<?php echo SITEURL;?>admin/add-notice.php" class="btn-primary">Add Notice</a></div>
                <br>

                <div class="whole">
                 
                    <table class = "tbl">
                        <tr>
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>action</th>
                        </tr>

                        
                        <?php
                            //write sql to get data from database
                            $sql = "SELECT * FROM tbl_notice";
        
                            //execute the query
                            $res = mysqli_query($conn, $sql);
        
                            //check the query is executed or not
                            if($res==true)
                            {
                                //count the number of rows
                                $count = mysqli_num_rows($res);
                                $sn=1;//initilizing the value for serial number
        
                                if($count>0)
                                {
        
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
        
                                        //get individual data
                                        $id = $rows['id'];
                                        $title = $rows['Title'];
                                        $imagename = $rows['Image_name'];


                                        ?>
                                        <tr>
                                            <td><?php echo $sn++ ?></td>
                                            <td><?php echo $title ?></td>
                                            <td>
                                                <?php 
                                                    if($imagename!="")
                                                    {
                                                        ?>
                                                            <a href="<?php echo SITEURL?>photos/notice/<?php echo $imagename?>"><img src="<?php echo SITEURL?>photos/notice/<?php echo $imagename?>" alt="" width = 150px></a>
                                                            
                                                        <?php
                                                    }
                                            
                                            
                                                ?>
                                            </td>
                                            <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-notice.php?id=<?php echo $id;?>" class= "btn-secondary">Update Notice</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-notice.php?id=<?php echo $id;?>" class= "btn-danger">Delete Notice</a>
                                            </td>
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


        <!-- main content section ends -->




        <?php include('partials/footer.php') ?>   