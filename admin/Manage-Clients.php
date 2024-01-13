<?php include('partials/menu.php') ?>


    

<!-- main content section starts -->
<div class="main-content">
    <div class="wrapper">
        <strong>THIS IS client PAGE</strong>
        <!-- <br><br>
        <div><a href="#" class="btn-primary">Add client</a></div>
        <br> -->
        <div class="whole">
            <table class = "tbl">
                <tr>
                    <th>S.N</th>
                    <th>I.D</th>
                    <th>Full Name</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    
              

                <?php

                //create sql to get the information of clients from database table
                $sql = "SELECT * FROM tbl_signup";

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
                            $fullname = $rows['Full_name'];
                            $username = $rows['User_name'];
                            $email = $rows['Email'];
                            $password = $rows['Password'];
                            

                            //dispaly the value in the table
                            ?>
                            <tr>
                                <td><?php echo $sn++?></td>
                                <td><?php echo $id?></td>
                                <td><?php echo $fullname ?></td>
                                <td><?php echo $username ?></td>
                                <td><?php echo $email ?></td>
                                <td><?php echo $password ?></td>


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