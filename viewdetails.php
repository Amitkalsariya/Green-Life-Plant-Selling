<?php
error_reporting(0);
?>
<?php
include 'connection.php';
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
        .row {
            display: flex;
            align-items: center;
            margin-top: 30px;
        }

        .btn {
            background-color: #074f0b;
            color: #fff;
        }

        .heading {
            text-align: center;
            font-size: 2.5rem;
            text-transform: uppercase;
            color: var(--black);
            margin-bottom: 2rem;
        }

        .box-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, 35rem);
            gap: 3rem;
            margin-bottom: 5rem;
            flex-wrap: wrap;
        }

        .box {
            text-align: center;
            height: auto;
            width: 1860px;
            margin-left: -350px;
            border-radius: 20px;
            border-color: white;
            padding-top: 40px;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 25),
                0 10px 10px rgba(0, 0, 0, 22);
            margin-bottom: 500px;
            ;
            background-color: #064709;
        }

        .box-container1 {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            grid-template-columns: repeat(auto-fit, 25rem);
            gap: 1.5rem;
        }

        .box-details {
            padding: 2px;
            background-color: #38723b;
            height: 100px;
            width: 575px;
            border-radius: 15px;
            border-color: white;
            padding-top: 30px;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 25),
                0 5px 5px rgba(0, 0, 0, 22);
            transition: #f2f2f2;
        }


        .box-containernext {
            display: flex;
            flex-direction: row;
            grid-template-rows: repeat(auto-fit, 25rem);
        }

        .box-next {
            padding: 2px;
            background-color: #FDDA0D;
            height: 100px;
            width: 50px;
            border-radius: 15px;
            border-color: white;
            margin-top: -30px;
            margin-bottom: 100px;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 25),
                0 5px 5px rgba(0, 0, 0, 22);
            transition: #f2f2f2;
        }

        .image {
            margin-top: 430px;
            margin-left: -20px;
            height: 500px;
            width: 1000px;
        }

        .plant-name {
            margin-top: 15px;
            margin-left: -20px;
            text-align: center;
            font-size: 40px;
            color: white;
        }

        .description {
            margin-top: 15px;
            margin-left: -30px;
            font-size: 30px;
            color: White
        }

        h5 {
            color: white;
            font-size: 25px;
        }
    </style>

</head>

<body>
    <!-- style="background-color: #518354" -->


    <!-- ##### Header Area Start ##### -->
    
    <?php include('header.php');?>
    
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(4.jpeg);">
            <h2>Opinion Sharing</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="Home.php"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="opinionsharing.php"></i> Opinion Sharing</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Flower Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Shop Area Start ##### -->

    <div class="container">
        <div class="box">
            <section class="plant-details">
                <div class="box-container">
                    <?php
                    if (isset($_GET['plant_id'])) {
                        $plant_id = $_GET['plant_id'];

                        // Use prepared statements to prevent SQL injection
                        $stmt = mysqli_prepare($conn, "SELECT * FROM plant_details WHERE Plant_id = ?");
                        mysqli_stmt_bind_param($stmt, 'i', $plant_id);

                        if (mysqli_stmt_execute($stmt)) {
                            $result = mysqli_stmt_get_result($stmt);

                            if (mysqli_num_rows($result) > 0) {
                                $plant_details = mysqli_fetch_assoc($result);
                    ?>

                                <div>
                                    <img class="image" name="img" src="images/<?php echo $plant_details['Plant_image']; ?>" alt="">
                                    <p class="plant-name"><strong><?php echo $plant_details['Plant_name']; ?></strong></p>
                                    <div>
                                        <h5><?php echo $plant_details['description']; ?></h5>
                                    </div>
                                </div>
                    <?php
                            } else {
                                echo "Plant not found.";
                            }
                        } else {
                            echo "Error executing query: " . mysqli_error($conn);
                        }

                        // Close the prepared statement
                        mysqli_stmt_close($stmt);
                    } else {
                        echo "Invalid request.";
                    }

                    // Close the database connection
                    mysqli_close($conn);

                    ?>

                    <form action="" method="GET">
                        <div class="box-container1">
                            <h1 style="margin-right: 90px; color: white;"><i class="fa fa-sun-o" aria-hidden="true">&nbsp;&nbsp;<strong>Sun Light Requirement</strong></i></h1>
                            <div>
                                <div style="display:flex;">
                                    <div style="width: 90%;">
                                        <textarea style="border-radius:15px; width:1000px; padding:10px; font-size: 30px; font-weight:600; height: 180px; background-color: #88b04b; color: white" value="" readonly>Sunlight</textarea><br><br>
                                        <h3 style="color: #fff;border: 1px solid white; padding-top: 10px; border-radius: 10px; text-align: right; padding-right: 10px; width: 1000px">
                                            <img src="images\like.png" style="height: 40px; width: 40px; margin-top: -20px; margin-left: 0px; color: white">&nbsp;&nbsp;
                                            Like &nbsp;&nbsp;
                                            <img src="images\dislike.png" style="height: 40px; width: 40px; margin-top: 0px; margin-left: 0px; color:white;">
                                            Dislike
                                        </h3>
                                    </div>
                                    <div class="box-next" style=" height:175px; width:120px; margin-left: 520px; margin-top: 0px;">
                                        <!-- <div style="display:flex;"> -->
                                        <div> <a href="seemore.php"><i class="fa fa-arrow-right" aria-hidden="true" style="font-size:45px; height: 20px; width: 120px; margin-top: 63px; color: #ffffff"></i></a>
                                        </div>
                                        <!-- </div> -->
                                    </div>
                                </div><br>

                                <h1 style="margin-right: 170px; color: white;"><i class="fa fa-tint" aria-hidden="true">&nbsp;&nbsp;<strong>Water Requirement</strong></i></h1><br>
                                <div>
                                    <div style="display:flex;">
                                        <div style="width: 90%;">
                                            <textarea style="border-radius:15px; width:1000px; padding:10px; font-size: 30px; font-weight:600; height: 180px; background-color: #88b04b; color: white" value="" readonly>Water</textarea><br><br>
                                            <h3 style="color: #fff;border: 1px solid white; padding-top: 10px; border-radius: 10px; text-align: right; padding-right: 10px; width: 1000px">
                                                <img src="images\like.png" style="height: 40px; width: 40px; margin-top: -20px; margin-left: 0px; color: white">&nbsp;&nbsp;
                                                Like &nbsp;&nbsp;
                                                <img src="images\dislike.png" style="height: 40px; width: 40px; margin-top: 0px; margin-left: 0px; color:white;">
                                                Dislike
                                            </h3>
                                        </div>
                                        <div class="box-next" style=" height:175px; width:120px; margin-left: 520px; margin-top: 0px;">
                                            <!-- <div style="display:flex;"> -->
                                            <div> <a href="seemore.php"><i class="fa fa-arrow-right" aria-hidden="true" style="font-size:45px; height: 20px; width: 120px; margin-top: 63px; color: #ffffff"></i></a>
                                            </div>
                                            <!-- </div> -->
                                        </div>
                                    </div><br>

                                    <h1 style="margin-right: 95px; color: white;"><i class="fa fa-cloud" aria-hidden="true">&nbsp;&nbsp;<strong>Humidity Requirement</strong></i></h1><br>
                                    <div>
                                        <div style="display:flex;">
                                            <div style="width: 90%;">
                                                <textarea style="border-radius:15px; width:1000px; padding:10px; font-size: 30px; font-weight:600; height: 180px; background-color: #88b04b; color: white" value="" readonly>Humidity</textarea><br><br>
                                                <h3 style="color: #fff;border: 1px solid white; padding-top: 10px; border-radius: 10px; text-align: right; padding-right: 10px; width: 1000px">
                                                    <img src="images\like.png" style="height: 40px; width: 40px; margin-top: -20px; margin-left: 0px; color: white">&nbsp;&nbsp;
                                                    Like &nbsp;&nbsp;
                                                    <img src="images\dislike.png" style="height: 40px; width: 40px; margin-top: 0px; margin-left: 0px; color:white;">
                                                    Dislike
                                                </h3>
                                            </div>
                                            <div class="box-next" style=" height:175px; width:120px; margin-left: 520px; margin-top: 0px;">
                                                <!-- <div style="display:flex;"> -->
                                                <div> <a href="seemore.php"><i class="fa fa-arrow-right" aria-hidden="true" style="font-size:45px; height: 20px; width: 120px; margin-top: 63px; color: #ffffff"></i></a>
                                                </div>
                                                <!-- </div> -->
                                            </div>
                                        </div><br>

                                        <h1 style="margin-right: 75px; color: white;"><i class="fa fa-thermometer-three-quarters" aria-hidden="true">&nbsp;&nbsp;<strong>Temprature Requirement</strong></i></h1><br>
                                        <div>
                                            <div style="display:flex;">
                                                <div style="width: 90%;">
                                                    <textarea style="border-radius:15px; width:1000px; padding:10px; font-size: 30px; font-weight:600; height: 180px; background-color: #88b04b; color: white" value="" readonly>Temprature</textarea><br><br>
                                                    <h3 style="color: #fff;border: 1px solid white; padding-top: 10px; border-radius: 10px; text-align: right; padding-right: 10px; width: 1000px">
                                                        <img src="images\like.png" style="height: 40px; width: 40px; margin-top: -20px; margin-left: 0px; color: white">&nbsp;&nbsp;
                                                        Like &nbsp;&nbsp;
                                                        <img src="images\dislike.png" style="height: 40px; width: 40px; margin-top: 0px; margin-left: 0px; color:white;">
                                                        Dislike
                                                    </h3>
                                                </div>
                                                <div class="box-next" style=" height:175px; width:120px; margin-left: 520px; margin-top: 0px;">
                                                    <!-- <div style="display:flex;"> -->
                                                    <div> <a href="seemore.php"><i class="fa fa-arrow-right" aria-hidden="true" style="font-size:45px; height: 20px; width: 120px; margin-top: 63px; color: #ffffff"></i></a>
                                                    </div>
                                                    <!-- </div> -->
                                                </div>
                                            </div><br>


                                            <!-- <img src="images\like.png" style="height: 20px; width: 20px; margin-top: 45px; margin-left: 435px">&nbsp;&nbsp;<img src="images\dislike.png" style="height: 20px; width: 20px; margin-top: 45px">
                                        <div class="box-containernext">
                                            <div class="box-next" style="margin-left: 24px">
                                                <a href="seemore.php"><i class="fa fa-arrow-right" aria-hidden="true" style="height: 30px; width: 30px; margin-top: 45px; color: white"></i></a>
                                            </div>
                                        </div>  -->


                                            <!-- <h2 style="margin-right: 250px; color: white"><i class="fa fa-tint" aria-hidden="true">&nbsp;<strong>Water Requirement</strong></i></h2><br>
                        <div class="box-details">
                            <div class="box-containernext">
                                <h5>Water</h5>
                                <img src="images\like.png" style="height: 20px; width: 20px; margin-top: 45px; margin-left: 458px">&nbsp;&nbsp;<img src="images\dislike.png" style="height: 20px; width: 20px; margin-top: 45px">
                                <div class="box-containernext">
                                    <div class="box-next" style=" margin-left: 23px">
                                        <a href="seemore.php"><i class="fa fa-arrow-right" aria-hidden="true" style="height: 20px; width: 20px; margin-top: 45px; color: white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div><br><br>

                        <h2 style="margin-right: 195px; color: white"><i class="fa fa-cloud" aria-hidden="true">&nbsp;<strong>Humidity Requirement</strong></i></h2><br>
                        <div class="box-details">
                            <div class="box-containernext">
                                <h5>Humidity</h5>
                                <img src="images\like.png" style="height: 20px; width: 20px; margin-top: 45px; margin-left: 428px">&nbsp;&nbsp;<img src="images\dislike.png" style="height: 20px; width: 20px; margin-top: 45px">
                                <div class="box-containernext">
                                    <div class="box-next" style="margin-left: 25px">
                                        <a href="seemore.php"><i class="fa fa-arrow-right" aria-hidden="true" style="height: 20px; width: 20px; margin-top: 45px; color: white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div><br><br>


                        <h2 style="margin-right: 180px; color: white"><i class="fa fa-thermometer-three-quarters" aria-hidden="true">&nbsp;<strong>Temprature Requirement</strong></i></h2><br>
                        <div class="box-details">
                            <div class="box-containernext">
                                <h5>Temprature</h5>
                                <img src="images\like.png" style="height: 20px; width: 20px; margin-top: 45px; margin-left: 403px;">&nbsp;&nbsp;<img src="images\dislike.png" style="height: 20px; width: 20px; margin-top: 45px">
                                <div class="box-containernext">
                                    <div class="box-next" style="margin-left: 23px">
                                        <a href="seemore.php"><i class="fa fa-arrow-right" aria-hidden="true" style="height: 20px; width: 20px; margin-top: 45px; color: white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                                        </div>
                                    </div>
                    </form>

                </div>
            </section>
        </div>
    </div>


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