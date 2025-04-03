<?php 
include_once 'header.php'; 
// session_start(); // Start session

// Determine the correct URL for the "GET STARTED" button
$getStartedUrl = isset($_SESSION['R_id']) ? "product.php" : "register.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Green Life</title>

    <!-- Favicon -->
    <link rel="icon" href="F.png">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="images/leaf.png" alt="">
        </div>
    </div>

    <section class="hero-area">
        <div class="hero-post-slides owl-carousel">
            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(4.jpeg);"></div>
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <!-- Post Content -->
                        <div class="hero-slides-content text-center">
                            <h2>Welcome to "Green Life!"</h2>
                            <h2>Discover the Joy of Gardening</h2>
                            <h2>and Grow Your Own Green Space</h2>
                            <div class="welcome-btn-group">
                                <a href="<?php echo $getStartedUrl; ?>" class="btn alazea-btn mr-30">GET STARTED</a>
                                <a href="about.php" class="btn alazea-btn active">About US</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="gardening-tips-area bg-gray section-padding-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Section Heading -->
                        <div class="section-heading text-center">
                            <h2>Gardening Tips</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Single Tip Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-tip-area mb-50 wow fadeInUp" data-wow-delay="100ms">
                            <!-- Tip Image -->
                            <div class="tip-img">
                                <img src="img/bg-img/first.jpg" alt="">
                            </div>
                            <!-- Tip Info -->
                            <div class="tip-info mt-15 text-center">
                                <p>Use Compost</p>
                                <p>Enhance soil fertility with natural compost.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Tip Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-tip-area mb-50 wow fadeInUp" data-wow-delay="200ms">
                            <!-- Tip Image -->
                            <div class="tip-img">
                                <img src="img/bg-img/second.jpg" alt="">
                            </div>
                            <!-- Tip Info -->
                            <div class="tip-info mt-15 text-center">
                                <p>Water Smartly</p>
                                <p>Water in the morning to prevent evaporation.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Tip Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-tip-area mb-50 wow fadeInUp" data-wow-delay="300ms">
                            <!-- Tip Image -->
                            <div class="tip-img">
                                <img src="img/bg-img/third.jpg" alt="">
                            </div>
                            <!-- Tip Info -->
                            <div class="tip-info mt-15 text-center">
                                <p>Rotate Crops</p>
                                <p>Prevent soil depletion by rotating plant types.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Tip Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-tip-area mb-50 wow fadeInUp" data-wow-delay="400ms">
                            <!-- Tip Image -->
                            <div class="tip-img">
                                <img src="img/bg-img/fourth.jpg" alt="">
                            </div>
                            <div class="tip-info mt-15 text-center">
                                <p>Mulch Matters</p>
                                <p>Mulch retains moisture and prevents weeds.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 text-center">
                        <a href="portfolio.php" class="btn alazea-btn">Learn More</a>
                    </div>
                </div>
            </div>
        </section>

<?php include('footer.php'); ?>

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
