<?php
// Start the session
session_start();
$Rid = $_SESSION['R_id'];

?>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
     <!-- Title -->
     <title>Green Life</title>

<!-- Favicon -->
<link rel="icon" href="F.png">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <style>
       .favi{
            height: 50px;
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
    <header class="header-area">

        <!-- ***** Top Header Area ***** -->
        <div class="top-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-header-content d-flex align-items-center justify-content-between">
                            <!-- Top Header Content -->
                            <div class="top-header-meta">
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="infodeercreative@gmail.com">
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="+1 234 122 122">
                            </div>

                            <!-- Top Header Content -->
                            <div class="top-header-meta d-flex">
                                <!-- Language Dropdown -->
                                <div class="language-dropdown">
                                    <div class="dropdown">
                                        
                                    </div>
                                </div>
                                <!-- Login -->
                                <div class="logout">
                                    <a href="logout.php"><i class="fa fa-user" aria-hidden="true"></i> <span>Logout</span></a>
                                </div>
                                <!-- Cart -->
                                <?php
                                    $select_row = mysqli_query($conn,"SELECT * FROM `cart` ") or die("Query failed");
                                    $row_count = mysqli_num_rows($select_row);
                                ?>
                                <div class="cart">
                                    <a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart &nbsp;<span><?php echo "(".$row_count.")"; ?></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       

        <!-- ***** Navbar Area ***** -->
        <div class="alazea-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="alazeaNav">

                        <!-- Nav Brand -->
                        <a href="index.html" class="nav-brand"><img  style="width:35px;height:35px;" src="./F.png" alt="">&nbsp;<strong class="text-light">Green Life</strong></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Navbar Start -->
                            <div class="classynav">
                            <ul>
                                    <li><a href="Home.php">Home</a></li>

                                    <li><a href="opinionsharing.php">Plant Details</a></li>
                                    
                                    <li><a href="product.php">Product</a>

                                        <ul class="dropdown">
                                            <li><a href="tools.php">Tools</a></li>
                                            <li><a href="seeds.php">Seeds</a></li>
                                            <li><a href="pots.php">Pots</a></li>
                                            <li><a href="plants.php">Plants</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="post.php">Post</a></li>

                                    <li><a href="FAQ.php">FAQ</a></li>
                                    
                                    <li><a href="profile.php">Profile</a></li>
                                    
                                </ul>  

                                <!-- Search Icon -->
                                <div id="searchIcon">
                                    <i class="fa fa-search" ></i>
                                </div>

                            </div>
                            <!-- Navbar End -->
                        </div>
                    </nav>

                    <!-- Search Form -->
                    <div class="search-form">
                        <form action="search_product.php" method="POST">
                            <input type="search" name="search"  placeholder="Search here....">&nbsp;&nbsp;&nbsp;
                            <button style="width: 100%;height: 40px;background-color:#074f0b;color:white;" name="submit">Search</button>
                        </form>
                        <!-- Close Icon -->
                        <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                    </div>
                    
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(4.jpeg);">
            <h2>Create Post</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create Post</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->
    <div class="container">
        <section>
                <div class = "card mt-4">
                    <div class = "card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row justify-content-center mt-3">
                                <div class="col-xl-8">
                            
                                    <div class="form-group row">
                                        <label class="form-label" for="customFile">Image :</label>
                                        <input name="file" type="file" class="form-control" id="fileupload"/>
                                    </div>

                                    <div class="form-group row">
                                        <label class="form-label" for="customFile">Caption:</label>
                                        <textarea name="caption" class="form-control" id="caption" placeholder="Add Post Caption"></textarea>
                                    </div>

                                    <div class="text-center">
                                        <button type="reset" class="btn btn-danger">Cancle</button>&nbsp;&nbsp;
                                        <button type="submit" name="submit1" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                           
                           <?php
                                if (isset($_POST['submit1'])) {
                                    $filename = $_FILES["file"]["name"];
                                    $tempname = $_FILES["file"]["tmp_name"];
                                    $folder = "images/";
                                    $caption = $_POST['caption'];
                                    $sql = "INSERT INTO `post`(`R_id`,`Post_image`,`Caption`,`Date`,`Time`) VALUES ('$Rid','$filename','$caption',curdate(),curtime())";
                                    mysqli_query($conn, $sql);
                                    if (move_uploaded_file($tempname, $folder.$filename)) {
                                        echo '<script type="text/javascript">';
                                        echo 'window.location.href = "post.php";'; 
                                        echo '</script>';
                                    } else {
                                        echo "<h3> Failed to upload image!</h3>";
                                    }
                                }
                            ?>
                    </form>
                </div>
            </div>
        </section>
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