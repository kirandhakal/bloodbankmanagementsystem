
<?php include('partials/menu.php')?>



<div class="main-content">
    <div class="wrapper">
        <strong>ACCEPT PATIENT REQUEST</strong>
        <br><br>
        <?php
          

            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                
            }

        ?>
        <br><br>
        <form action="" method = "POST" >
            <label for="remarks">Remarks:</label>
            <input type="text" name = "remarks" id = "remarks" placeholder = "(If any)"> <br><br>
            <input type="submit" value = "Accept" name = "accept" class = "btn-normal">
        </form>

        <?php

        // CHECK WEATHER THE FORM IS SUBMITTED OR NOT
         if(isset($_POST['accept']))
         {
 
             //get the data from the form
             $remarks = $_POST['remarks'];
 
             //get the data from doner database
            $sql = "SELECT * FROM tbl_patient WHERE id = $id ";
 
            $res = mysqli_query($conn, $sql);
           
           
 
            $row = mysqli_fetch_assoc($res);
            
           

            $userid = $row['User_id'];
            $age = $row['Age'];
            $phonenumber = $row['Phone_Number'];
            $bloodtype = $row['Blood_Type'];
            $requiredunit = $row['Required_Unit'];
            $prescription = $row['Prescription'];
            
           
 
 
            //put the data in another history database
            $sql2= "INSERT INTO tbl_patienthistory SET 
            userid = '$userid',
            phone_number = '$phonenumber',
            age = '$age',
            blood_type = '$bloodtype',
            required_unit = '$requiredunit',
            prescription = '$prescription',
            action = 'accepted',
            remarksorreason = '$remarks'
            ";
 
            $res2 = mysqli_query($conn, $sql2);
 
            //delete the data from doner database
            $sql3 = "DELETE FROM tbl_patient WHERE id = $id ";
            $res3 = mysqli_query($conn, $sql3);
            
 
            if($res==true && $res2==true && $res3==true)
            {
                 $_SESSION['deleted-patient'] = "<div class='success'>Succesfully accepted patient request</div>";
                 header("location:".SITEURL."admin/Manage-Patient.php");
               
            }
            else{
                 $_SESSION['deleted-patient'] = "<div class='error'>Unsuccesful to accept patient request</div>";
                 header("location:".SITEURL."admin/Manage-Patient.php");
 
            }
 
 
         }

        ?>


       
    </div>
</div>


<?php include('partials/footer.php')?>