<!DOCTYPE html>
<html lang="en">
<?php

include "auth.php";

?>
<head>
    <!-- Required meta tags-->
    <link rel="shortcut icon" href="icon.ico">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        
        <!-- END HEADER MOBILE-->

        
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <div class="main-content">
            
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <div class="form-group">
                <?php
                $name=$_SESSION['username'];
                echo "Welcome ",$name;
                echo "<br>You can create new account on <a href='register.php'>this page</a>.<br><br>"; 
                require('sql.php');
                $sorgu=mysqli_query($con, "SELECT username FROM users");
                    echo "<label>Username:</label> <br> <select class='au-input' name='nameSelect'>" ;
                    echo "<option value='null'/>-</option>"; 
                    while($mail=mysqli_fetch_assoc($sorgu)){
                                                 
                     //$username = implode($mail);
                     echo "<option value='".implode($mail)."'/>".implode($mail)."</option>"; 
                    }
                    echo "</select><br><br>";
                    echo "<label>Status:</label> <br> <select class='au-input' name='statusSelect'>" ;
                            echo "<option value='null'/>-</option>"; 
                            echo "<option value='1'/>Active</option>";
                            echo "<option value='0'/>Inactive</option>"; 
                        echo "</select><br>";
                    echo "<button type='submit' class='au-btn au-btn--green m-b-20' style='margin-top: 3%; '>Update</button>";
                ?>
                 </div>
                    <?php

                    $select = filter_input(INPUT_POST, 'nameSelect', FILTER_SANITIZE_STRING);
                    $statuss = filter_input(INPUT_POST, 'statusSelect', FILTER_SANITIZE_STRING);

                    ?>

                    <?php
                    //echo $statuss."<br>";
                    //echo $select;
                    if ($select != null && $statuss != null){
                        
                        $query = "UPDATE users SET user_status='$statuss' WHERE username='$select'";
                        $result = mysqli_query($con,$query);
                        echo "<br>Updated";
                        echo "<p><a href='management.php'>Back to the form</a></p>";
                    }else if ($select){
                        echo "Noo";
                        echo "<p><a href='management.php'>Back to the form</a></p>";
                    }

                    ?>
                </form>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>

<!-- end document-->
