<?php
session_start();
error_reporting(0);
?>

<?php

$Rid= $_SESSION['R_id'];
$servername = "localhost";
$username = "root";
$passwordDB = "";
$database = "glife";
$email = $_SESSION['user_email'];
$conn = mysqli_connect($servername, $username, $passwordDB, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 $sql = "SELECT * FROM user WHERE R_id = '$Rid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $R_id = $row['R_id'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags must come first in the head; any other head content must come after these tags -->

    <!-- Title -->
    <title>Green Life</title>

    <!-- Favicon -->
    <link rel="icon" href="F.png">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap');
            
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                /* font-family: 'Poppins', sans-serif; */
            }
            .header-area {
                position: absolute;
                width: 100%;
                z-index: 999;
                top: -24px;
                left: 0;
                background-color: transparent;
            }
            .main{
                width: 100%;
                height: 900px;
                display: flex;
                align-items: center;
                justify-content: center;
                background-image: url(images/back.jpg);
                background-position: center;
                background-size: cover;
                margin-bottom: 0px;
            }
            

            .profile-card{
                height: 1010px;
                background-color:#88B04B;
                color: #ffff;
                display: flex;
                flex-direction: column;
                align-items: center;
                max-width: 700px;
                width: 100%;
                border-radius: 25px;
                padding: 10px;
                border: 1px solid #88B04B;
                box-shadow: 0 5px 20px rgba(0,0,0,0.4);
            }

            .image{
                /* margin-top:30px; */
                position: relative;
                height: 150px;
                width: 150px;
            }

            .image .profile-pic{
                width: 100%;
                height: 100%;
                object-fit: cover;
                border-radius: 50%;
                box-shadow: 0 5px 20px rgba(0,0,0,0.4);
            }

            .data{
                display: flex;
                flex-direction: column;
                align-items: center;
                margin-top: 20px;
            }

            .data h2{
                color: #064709;
                font-size: 35px;
                font-weight: 600;
            }

            span{
                font-size: 14px;
            }

            .row{
                display: flex;
                align-items: center;
                margin-top: 30px;
            }

            .row .info{
                text-align: center;
                padding: 0 20px;
            }

            .buttons{
                display: flex;
                align-items: center;
                margin-top: 30px;
            }

            .buttons .btn{
                width: 400px;
                color: #fff;
                text-decoration: none;
                margin: 0 20px;
                padding: 8px 25px;
                border-radius: 25px;
                font-size: 18px;
                white-space: nowrap;
                background: #064709;
            }

            .buttons .btn:hover{
                box-shadow: inset 0 5px 20px rgba(0,0,0,0.4);
            }

            .data h4{
                color: #064709;
                margin-top: 30px;
            }

            .box-container{
                display:grid;
                grid-template-columns:repeat(auto-fit,16rem);
                gap:1.5rem;
                margin-bottom: 10px;
            }

            .box{
                text-align:center;
                padding:2px;
                box-shadow: 0 10px 10px rgba(0, 0, 0, 25),0 10px 10px rgba(0, 0, 0, 22);
                border-color: white;
                border-radius: 20px;
                padding-top: 30px;
                opacity: 0.9;
                background-color: white; 
                transition: #f2f2f2;
            }

            .favi{
            height: 50px;
            }

          
            h3{
                margin:1rem 0;
                font-size:20px;
                color:var(--black);
            }

            .price{
                font-size:20px;
                color:var(--black);
            }

            .breadcrumb-area {
                margin-bottom: 80px;
            }

            .classy-nav-container * {
                font-size: 20px;
            }  

            .header-area .alazea-main-menu .classynav ul li a {
                color: #ffffff;
                /* font-family: dosis; */
            }
            .row {
            display: flex;
            align-items: center;
            /* margin-top: 30px; */
            }

            .favi{
                height: 50px;
            }
            
            #q {
                font-size: 25px;
                color: white;
            }

            .q {
                font-size: 25px;
                color: white;
                margin-left: 10px
            }

    </style>

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <?php include('header.php');?>
    <!-- ##### Header Area End ##### -->
    
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(4.jpeg);">
            <h2>Profile</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="Home.php"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <?php
                // Connect to the database
                $conn = mysqli_connect("localhost", "root", "", "glife");

                // Retrieve the user's information
                $sql = "SELECT * FROM user WHERE R_id = '$R_id'";
                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_assoc($result);
                // Display the user's information

                    echo '<section class="main">
                    <div class="profile-card">
                        <div class="image">
                        <img src="images/user_images/'.$user['image_name'].'" alt="" class="profile-pic">
                        </div>
                        <div class="data">
                        <h2>'. $user['name'].'</h2><br><br>
                        <h4>Email</h4>
                        <span>'. $user['email'] . '</span><br><br>
                        <h4>Contact_No</h4>
                            <span>'. $user['contact'] . '</span><br><br>
                            <h4>Address</h4>
                            <span>'. $user['address'] . '</span><br><br>
                            <h4>City</h4>
                            <span>'. $user['city'] . '</span><br>
                        </div>
                        <div class="buttons"><center>
                        <a href="updateform.php" class="btn">Edit Profile</a></center>
                    </div>
                    </section>';
            ?>
        </div>
    </div>
   
    
    <?php include('footer.php');?>
    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>