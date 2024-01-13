<?php  include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">



        <?php
            if(isset($_SESSION['notice-upload']))
            {
                echo $_SESSION['notice-upload']; //displaying session message
                unset($_SESSION['notice-upload']); //removing session message
            }
            if(isset($_SESSION['image-upload']))
            {
                echo $_SESSION['image-upload']; //displaying session message
                unset($_SESSION['image-upload']); //removing session message
            }




        ?>




        <strong>Add Notice</strong>
        <form action="" method = 'POST' enctype = 'multipart/form-data' >
            <label for="title">Title:</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type='text' name = 'title' id= 'title' required ><br>

            <label for="file">Choose file:</label>
            
            <input type="file" id ='file' name = 'file' placeholder = 'choose file' required><br>

            <input type="submit" name = 'submit' class = 'btn-secondary' value = 'Publish'>
            



        </form>
       


      
       
    </div>

    <?php
        // check weather the form is submitted or not 
        if(isset($_POST['submit']))
        {
           //get the data from the form
           $title = $_POST['title'];

           //check weather the image is selected or not and set the value of imagename
           //    print_r($_FILES['file']);
           if(isset($_FILES['file']['name']))
           {
                // upload the image
                // to upload image we need image name, source path, and destination path 
                $imagename = $_FILES['file']['name'];
                
              // auto rename image
              // get the extension of our image
              $ext = end(explode('.',$imagename));

              //rename tne image
              $imagename = "Notice_".rand(000,999).'.'.$ext;

              
                $source_path = $_FILES['file']['tmp_name'];
                $destination_path = "../photos/notice/".$imagename;
            
            
                // upload the image
                $upload = move_uploaded_file($source_path, $destination_path);
           
                //check weather the image is uploded or not
                if($upload==false)
                {
                    // echo "failed to uploded notice";
                    $_SESSION['image-upload'] = "<div class='error'>Failed to upload image</div>";
            
                    //redirect to add notice page
                    header('location:'.SITEURL.'admin/add-notice.php');
            
                    //stop the process
                    die();
            
                }
            }
           else
           {
            // dont upload image
            $imagename = '';
           }

           //sql query to save data on database
           $sql = "INSERT INTO tbl_notice SET
                Title = '$title',
                Image_name = '$imagename'
                ";


            //execute the query and save in database
            $res = mysqli_query($conn, $sql);

            //check weather the query is executed or not
            if($res==true)
            {
                //query executed 
                // echo "notice uploaded succefully";
                $_SESSION['notice-upload'] = "<div class='success'>Notice uploaded succefully</div>";
           
                //redirect to add notice page
                header('location:'.SITEURL.'admin/Manage-Notice.php');
            }
            else{
                // echo "failed to uploded notice";
                $_SESSION['notice-upload'] = "<div class='error'>Failed to upload notice</div>";
           
                //redirect to add notice page
                header('location:'.SITEURL.'admin/add-notice.php');
            }

           


           

        }




    ?>


</div>
<?php  include('partials/footer.php')?>