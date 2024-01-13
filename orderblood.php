<?php include('login-check1.php');?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>order blood</title>
  <link rel="stylesheet" href="orderblood.css">
</head>

<body>
  <div class="container">

              <?php
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                }


              ?>
              <?php
            if(isset($_SESSION['prescription-upload']))
            {
                echo $_SESSION['prescription-upload']; //displaying session message
                unset($_SESSION['prescription-upload']); //removing session message
            }
           




        ?>


    <form action="" method="POST" enctype = 'multipart/form-data'>

      <div class="info">
        <label for="phone">Phone number:</label><br>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>
        <!-- <input type="number" min="1" max="10" id="phone" name="phone" required> -->
        <br>
        <label for="age">Enter a Age:</label><br>
        <input type="number" min="1" max="100" id="age" name="age" required><br>
        <label for="requiredunit">Enter required units</label><br>
        <input type="number" min="1"  id="requiredunit" name="requiredunit" required><br>
        <label for="address">Enter address : </label><br>
         <input type="text" name="address" id="address" required><br>
        

        <label for="blood-type">Blood Type:</label><br>
        <select id="blood-type" name="type" required>
          <option value="">Select Blood Type</option>
          <option value="A+">A+</option>
          <option value="A-">A-</option>
          <option value="B+">B+</option>
          <option value="B-">B-</option>
          <option value="O+">O+</option>
          <option value="O-">O-</option>
          <option value="AB+">AB+</option>
          <option value="AB-">AB-</option>
        </select><br>
        <label for="file">Doctor prescription </label> <br>
        <input type="file" id = "file" name = "prescription" required>
        
      </div>

      <br><br>
      <input type="submit" name = 'submit' class="submit" value="Submit request">
    </form>


  </div>




  <?php
    //check weather the submit button is clicked or not
    if(isset($_POST['submit']))
    {
      // echo "button clicked";

      // get the value from form
      $phonenumber = $_POST['phone'];
      $age = $_POST['age'];
      $requiredunit = $_POST['requiredunit'];
      $bloodtype = $_POST['type'];
      

            //check weather the image is selected or not and set the value of imagename
              // print_r($_FILES['prescription']);
           if(isset($_FILES['prescription']['name']))
           {
                // upload the image
                // to upload image we need image name, source path, and destination path 
               $imagename = $_FILES['prescription']['name'];
               $imagename;
                
              // auto rename image
              // get the extension of our image
              $parts = explode('.', $imagename);
              $ext = end($parts);

              //rename tne image
              $imagename = "Prescription_".$id."_".rand(000,999).'.'.$ext;

              
                $source_path = $_FILES['prescription']['tmp_name'];
                $destination_path = "photos/prescription/".$imagename;
            
            
                // upload the image
                $upload = move_uploaded_file($source_path, $destination_path);
           
                //check weather the image is uploded or not
                if($upload==false)
                {
                    // echo "failed to uploded notice";
                    $_SESSION['prescription-upload'] = "<div class='error'>Failed to upload prescription</div>";
            
                    //redirect to add notice page
                    header('location:'.SITEURL.'orderblood.php');
            
                    //stop the process
                    die();
            
                }
            }
           else
           {
            // dont upload image
            $imagename = '';
           }

           // sql query to save the value in database
           $sql = "INSERT INTO tbl_patient SET 
           User_id = $id,
           Phone_Number = '$phonenumber',
           Age = '$age',
           Blood_Type = '$bloodtype',
           Required_Unit = '$requiredunit',
           Prescription = '$imagename'
           ";

           //connecting with database
           $res = mysqli_query($conn,$sql);

           //check weather the data is saved or not
           if($res==true)
           {
              // echo 'data inserted';
              session_start();
              $_SESSION['orderblood']= " <div class='success'>succefully ordered blood</div>";
              // $_SESSION['sendusername']=$getusername;
              header('location:'.SITEURL.'dashbord.php');

           }
           



           
           
    }


  ?>



</body>

</html>