<?php  
    
    
    include('config/constants.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashbord.css">
    <title>
        dashbord
    </title>
</head>

<body>
    <div class="container">
        <div>

            <?php
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                }
                if(isset($_SESSION['loggedin']))
                {
                    echo $_SESSION['loggedin'];
                    unset($_SESSION['loggedin']);
                }


            ?>

            <form method="POST">
                <button type="submit" name="logoutsub"><a href="logout.php">Log out</a></button>
            </form>
        </div>

        <!-- <div class="upper"> -->
            <!-- form1=upper -->
            <span>
                <p>

                    <?php
                        if(isset($_SESSION['username-password-match']))
                        {
                            echo $_SESSION['username-password-match'];
                            
                        }

                    ?>


                </p>
            </span>


        <!-- </div> -->
        <!-- <div class="lower"> -->
            <!-- biitem=lower -->
            <button class="btn"><a href="<?php SITEURL ?>orderblood.php?id=<?php echo $id?>">Order Blood</a></button>

            <!-- <script type="text/javascript">
            document.getElementById("myButton").onclick = function () {
                location.href = "order.html";
            };
        </script> -->

            <button class="btn"><a href="<?php SITEURL ?>donateblood.php?id=<?php echo $id?>">Donate Blood</a></button>

        <!-- </div>
    </div> -->




</body>

</html>