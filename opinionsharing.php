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
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

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
            grid-template-columns: repeat(auto-fit, 16rem);
            gap: 5.5rem;
            margin-bottom: 5rem;
        }

        .box {
            text-align: center;
            padding: 2px;
            background-color: white;
            height: 300px;
            border-radius: 20px;
            border-color: white;
            padding-top: 30px;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 25),
                0 10px 10px rgba(0, 0, 0, 22);
            transition: #f2f2f2;
        }

        img {
            height: 10rem;
        }

        h3 {
            margin: 1rem 0;
            font-size: 20px;
            color: var(--black);
            text-align: center;
        }

        .price {
            font-size: 20px;
            color: var(--black);
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
            <h2>Opinion Sharing</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="Home.php"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Opinion Sharing</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Shop Area Start ##### -->


    <div class="container">

        <section class="plant-details">
            <div class="box-container">
                <?php
                    $select_plant = mysqli_query($conn, "SELECT * FROM `plant_details`");
                    if (mysqli_num_rows($select_plant) > 0) {
                        while ($fetch_plant = mysqli_fetch_assoc($select_plant)) {
                ?>

                        <div class="box">
                            <img name="img" src="images/<?php echo $fetch_plant['Plant_image']; ?>" alt="">
                            <h3 style="color: #074f0b"><?php echo $fetch_plant['Plant_name']; ?></h3>
                            <form action="viewdetails.php" method="GET"> <!-- Change to GET method -->
                                <input type="hidden" name="plant_id" value="<?php echo $fetch_plant['Plant_id']; ?>">
                                <input type="submit" name="viewdetails" class="btn" value="View Details">
                            </form>
                        </div>

                <?php
                    }
                }
                ?>

                <?php
                $select_plant = mysqli_query($conn, "SELECT * FROM `info_type`");
                if (mysqli_num_rows($select_plant) > 0) {
                    while ($fetch_plant = mysqli_fetch_assoc($select_plant)) {
                ?>

                        <div>
                            <form action="viewdetails.php" method="GET"> <!-- Change to GET method -->
                                <input type="hidden" name="I_id" value="<?php echo $fetch_plant['I_id']; ?>">
                            </form>
                        </div>

                <?php
                    }
                }
                ?>
            </div>
        </section>

    </div>
    <?php include("footer.php");?>
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