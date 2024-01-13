
<?php include('partials/menu.php')?>



<div class="main-content">
    <div class="wrapper">
        <strong>ACCEPT DONATION REQUEST</strong>
        <br><br>
        <?php
          

            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                
            }

        ?>
        <br><br>
        <form action="" method = "POST" >
            <label for="collectedunit">Collected Unit:</label>
            <input type="number" name = "collectedunit" id = "collectedunit" required> <br><br>
            <input type="submit" value = "Accept" name = "accept" class = "btn-normal">
        </form>


        <?php

        // CHECK WEATHER THE FORM IS SUBMITTED OR NOT
         if(isset($_POST['accept']))
         {
 
             //get the data from the form
             $collectedunit = $_POST['collectedunit'];
 
             //get the data from doner database
            $sql = "SELECT * FROM tbl_doner WHERE id = '$id' ";
 
            $res = mysqli_query($conn, $sql);
           
 
            $row = mysqli_fetch_assoc($res);
 
            $userid = $row['userid'];
            $age = $row['Age'];
            $phonenumber = $row['Phone_number'];
            $bloodtype = $row['Blood_type'];
            $disease = $row['Disease'];
 
            //put the data in another history database
            $sql2= "INSERT INTO tbl_donerhistory SET 
            userid = '$userid',
            phone_number = '$phonenumber',
            age = '$age',
            blood_type = '$bloodtype',
            disease = '$disease',
            action = 'accepted',
            reasonorunit = '-',
            unit = '$collectedunit'
            ";
 
            $res2 = mysqli_query($conn, $sql2);
 
            //delete the data from doner database
            $sql3 = "DELETE FROM tbl_doner WHERE id = $id ";
            $res3 = mysqli_query($conn, $sql3);
            
 
            if($res==true && $res2==true && $res3==true)
            {
                 $_SESSION['deleted-doner'] = "<div class='success'>Succesfully accepted doner request</div>";
                 header("location:".SITEURL."admin/Manage-Doner.php");
               
            }
            else{
                 $_SESSION['deleted-doner'] = "<div class='error'>Unsuccesful to accept doner request</div>";
                 header("location:".SITEURL."admin/Manage-Doner.php");
 
            }
 
 
         }

        ?>
    </div>
</div>


<?php include('partials/footer.php')?>