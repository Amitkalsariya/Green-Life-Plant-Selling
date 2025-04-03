<?php
include 'connection.php';
error_reporting(0);
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
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="img/core-img/leaf.png" alt="" class="favi">
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <?php include('header.php');?>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(4.jpeg);">
            <h2>FAQs</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="Home.php"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">FAQS</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        <!-- ##### Shop Area Start ##### -->
        <div class="container mb-5">
            <section class="faq">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="plant" role="tabpanel" aria-labelledby="plant-tab">
                        <div class="card mt-4">
                            <div class="card-body" style="background-color: #074f0b;">
                                <?php

                                $select_faq = mysqli_query($conn, "SELECT * FROM `faq`");
                                if (mysqli_num_rows($select_faq) > 0) {
                                    while ($fetch_faq = mysqli_fetch_assoc($select_faq)) {

                                ?>
                                        <div class="box" style="background-color: #88B04B; border: 2px solid #074f0b; text-align:center;">
                                            <p style="color:#074f0b; font-size: 50px; font-family: bold; margin-top:15px; "><?php echo $fetch_faq['fq_type']; ?></p>
                                            <p class="q"><span id="q">Question: &nbsp;&nbsp;&nbsp;</span><?php echo $fetch_faq['Question']; ?></p>
                                            <p class="q"><span id="q">Answer: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo $fetch_faq['Answer']; ?></p><br><br>
                                        </div>

                                <?php
                                    };
                                };
                                ?>
                                <!-- <div class="col-12 text-center">
                        <a href="#" class="btn alazea-btn">More</a>
                    </div> -->
                            </div>
                        </div>
                    </div>
            </section>
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