<?php  include('partials/menu.php')?>


<div class="main-content">
    <div class="wrapper">
        <strong>Fill the given details to add admin</strong>
        <?php
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];  //diaplay the sesson message
            unset($_SESSION['add']);  //remove session message
        }


        ?>
        <form action="" method="POST">
                    <label for="fullname">Full Name:</label>
                    <input type="text" id="fullname" name="fullname" placeholder="Enter Full Name" required ><br>
                    
                    <label for="username">User Name:</label>
                    <input type="text" id="username" name="username" placeholder= "Enter User name" required><br>
                    
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter Email" required ><br>
                    
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter Password" required ><br>
                    <input type="submit" name="submit" value="Add Admin" class="btn-primary">
        </form>
    </div>


</div>
<?php  include('partials/footer.php')?>





<?php
    // process the form and save it into database

        // check weather the form is submitted or not by using name 
        if(isset($_POST['submit'])){
            // echo 'hello';

            // get the data from form
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            // $password = md5($_POST['password']);
            $password = $_POST['password'];


            // SQL query to save the data on database
            $sql = "INSERT INTO tbl_admin SET
            Email = '$email',
            Full_name = '$fullname',
            User_name = '$username',
            Password = '$password' 
            ";

            //    Execute query and save data in database
            $res = mysqli_query($conn, $sql) or die(mysqli_error());
           

            //Checked weather the data is inserted or not
            if($res==true){
                // echo "data inserted";

                // create a session variable to display message
                $_SESSION['add'] = '<div class="success"> Admin added succesfully </div>';

                // redirect page to manageadmin
                header('location:'.SITEURL.'admin/Manage-Admin.php');
            }
            else{
                // echo 'data not inserted';

                // create a session variable to display message
                $_SESSION['add'] = '<div class="error"> Failed to add admin </div>';

                // redirect page to manageadmin
                header('location:'.SITEURL.'admin/Manage-Admin.php');
            }



           
        }

?>