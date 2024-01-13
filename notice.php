<?php include('config/constants.php'); ?>

<html>

<head>
  <title>
    Blood bank management system - Home page
  </title>
  <link rel="stylesheet" href="notice.css">
</head>

<body>

  <!-- menu section starts -->
  <div class="menu">
    <div class="logo">
      <h1>BBMS</h1>
    </div>
    <div class="wrapper">
      <ul>
        <li> <a href="<?php echo SITEURL; ?>">Home</a></li>
        <li> <a href="<?php echo SITEURL; ?>signup.php">Sign up</a></li>
        <li> <a href="<?php echo SITEURL; ?>login.php">Log in</a></li>
        <li> <a href="<?php echo SITEURL; ?>notice.php">Notice</a></li>
        

      </ul>
    </div>
  </div>



  <!-- menu section ends -->

  <div class="abc">
    <table>
        <tr>
            <th>S.N</th>
            <th>Title</th>
            <th>Date</th>
        </tr>



        <?php
            //get the data from database

            //sql query to get the data from database
            $sql = "SELECT * FROM tbl_notice";

            //creating connection
            $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());//database connection
            $db_sel = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());//selecting database

            //execute the query
            $res = mysqli_query($conn, $sql);

            //check weather the query is executed or not
            if($res==true)
            {
                //count the no of rows 
                $count = mysqli_num_rows($res);
                $sn = 1;//initilizing the value of serial number

                //get individual data from database
                while($rows=mysqli_fetch_assoc($res))
                {
                    $title = $rows['Title'];
                    $imagename = $rows['Image_name'];
                    $date = $rows['Date'];

                    //put the value in table
                    ?>
                        <tr>
                            <td><?php echo $sn++?></td>
                            <td>
                                <div class="notice-image-show"><a href="http://localhost/bbms/photos/notice/<?php echo $imagename ?>"><?php echo $title?></a></div>
                            </td>
                            <td><?php echo $date?></td>
                        </tr>

                    <?php

                }
            }

        ?>



        
    </table>
  </div>

    <!-- footer section starts -->
    <div class="footer">
    <div class="wrapper">
      <p class="text-center">2023 © ALL RIGHT RESERVED</p>
    </div>
    </div>




  <!-- footer section ends --

</body>

</html>