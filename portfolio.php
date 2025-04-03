
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

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="img/core-img/leaf.png" alt="">
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <?php include('header.php');?>
    <!-- ##### Header Area End ##### -->
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(4.jpeg);">
            <h2>PORTFOLIO</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="Home.php"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Portfolio</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Portfolio Area Start ##### -->
    <section class="alazea-portfolio-area portfolio-page section-padding-0-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>OUR PORTFOLIO</h2>
                        <p>We devote all of our experience and efforts for creation</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-12">
                    <div class="alazea-portfolio-filter">
                        <div class="portfolio-filter">
                            <button class="btn active" data-filter="*">All</button>
                            <button class="btn" data-filter=".home-design">Home Design</button>
                            <button class="btn" data-filter=".garden">Garden</button>
                            <button class="btn" data-filter=".office-design">Office Design</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row alazea-portfolio">
                <?php
                    $select_plant = mysqli_query($conn, "SELECT * FROM `plant_details` where Type_name = 'Home Design'");
                    if (mysqli_num_rows($select_plant) > 0) {
                    while ($fetch_plant = mysqli_fetch_assoc($select_plant)) {
                ?>
                <?php   
                    $sql = "SELECT * FROM plant_type ";
                    $result = mysqli_query($conn, $sql);
                            
                ?>
                <!-- Single Portfolio Area -->
                <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item design home-design">
                    <!-- Portfolio Thumbnail -->
                    <div class="portfolio-thumbnail bg-img" style="background-image: url(./admin/images/portfolio_images/<?php echo $fetch_plant['Plant_image']; ?>);"></div>
                    <!-- Portfolio Hover Text -->
                    <div class="portfolio-hover-overlay">
                        <a href="./admin/images/portfolio_images/<?php echo $fetch_plant['Plant_image']; ?>" class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio 1">
                            <div class="port-hover-text">
                                <h3><?php echo $fetch_plant['Plant_name']; ?></h3>
                                <h5><?php echo $fetch_plant['Type_name']; ?></h5>
                            </div>
                        </a>
                    </div>
                </div>
                <?php }} ?>  
                <?php
                    $select_plant = mysqli_query($conn, "SELECT * FROM `plant_details` where Type_name = 'Garden'");
                    if (mysqli_num_rows($select_plant) > 0) {
                    while ($fetch_plant = mysqli_fetch_assoc($select_plant)) {
                ?>
                <?php   
                    $sql = "SELECT * FROM plant_type ";
                    $result = mysqli_query($conn, $sql);
                            
                ?>       
                <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item garden">
                    <!-- Portfolio Thumbnail -->
                    <div class="portfolio-thumbnail bg-img" style="background-image: url(./admin/images/portfolio_images/<?php echo $fetch_plant['Plant_image']; ?>);"></div>
                    <!-- Portfolio Hover Text -->
                    <div class="portfolio-hover-overlay">
                        <a href="./admin/images/portfolio_images/<?php echo $fetch_plant['Plant_image']; ?>" class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio 2">
                            <div class="port-hover-text">
                                <h3><?php echo $fetch_plant['Plant_name']; ?></h3>
                                <h5><?php echo $fetch_plant['Type_name']; ?></h5>
                            </div>
                        </a>
                    </div>
                </div>
                <?php }} ?>  
                <?php
                    $select_plant = mysqli_query($conn, "SELECT * FROM `plant_details` where Type_name = 'Office Design'");
                    if (mysqli_num_rows($select_plant) > 0) {
                    while ($fetch_plant = mysqli_fetch_assoc($select_plant)) {
                ?>
                <?php   
                    $sql = "SELECT * FROM plant_type ";
                    $result = mysqli_query($conn, $sql);
                            
                ?>       
                <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item office-design">
                    <!-- Portfolio Thumbnail -->
                    <div class="portfolio-thumbnail bg-img" style="background-image: url(./admin/images/portfolio_images/<?php echo $fetch_plant['Plant_image']; ?>);"></div>
                    <!-- Portfolio Hover Text -->
                    <div class="portfolio-hover-overlay">
                        <a href="./admin/images/portfolio_images/<?php echo $fetch_plant['Plant_image']; ?>" class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio 2">
                            <div class="port-hover-text">
                                <h3><?php echo $fetch_plant['Plant_name']; ?></h3>
                                <h5><?php echo $fetch_plant['Type_name']; ?></h5>
                            </div>
                        </a>
                    </div>
                </div>
                <?php }} ?>  
            </div>
        </div>
    </section>

    <?php include('footer.php');?>
    <!-- ##### Portfolio Area End ##### -->

    <!-- ##### Footer Area Start ##### -->

    <!-- ##### Footer Area End ##### -->

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