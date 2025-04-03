<?php

ob_start();
include_once 'connection.php';

?>

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
                            <a href="#" data-toggle="tooltip" data-placement="bottom"
                                title="infodeercreative@gmail.com"></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="+1 234 122 122"></a>
                        </div>

                        <!-- Top Header Content -->
                        <div class="top-header-meta d-flex">
                            <!-- Language Dropdown -->
                            <div class="language-dropdown">

                            </div>
                            <!-- Logout -->
                            <div class="logout">
                                <?php if (isset($_SESSION['R_id'])) { ?>
                                    <a href='logout.php'><i class='fa fa-user' aria-hidden='true'></i> <span
                                            name='log'>Logout</span></a>
                                <?php } else { ?>
                                    <a href='login.php'><i class='fa fa-user' aria-hidden='true'></i> <span
                                            name='log'>Login</span></a>
                                <?php } ?>
                            </div>


                            <?php
                            // 
                            //  $select_row = mysqli_query($conn,"SELECT * FROM `cart` where `u_id`=$id ") or die("Query failed");
                            //     $row_count = mysqli_num_rows($select_row);
                            
                            if (isset($_SESSION['R_id'])) {
                                $id = $_SESSION['R_id'];
                                $select_row = mysqli_query($conn, "SELECT * FROM `cart` where `u_id`=$id and status=0") or die("Query failed");
                                $row_count = mysqli_num_rows($select_row);
                                ?>


                                <div class="cart">
                                    <a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
                                        &nbsp;<span><?php echo "(" . $row_count . ")"; ?></span></a>
                                </div>
                            <?php } ?>
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
                    <a href="home.php" class="nav-brand"><img style="width:35px;height:35px;" src="./F.png"
                            alt="">&nbsp;<strong class="text-light">Green Life</strong></a>

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
                                <li><a href="portfolio.php">Portfolio</a></li>

                                <li><a href="product.php">Product</a>

                                    <ul class="dropdown">
                                        <?php
                                        $select_cat = mysqli_query($conn, "select * from product_category");

                                        while ($cat_res = mysqli_fetch_assoc($select_cat)) {

                                            ?>
                                            <li><a
                                                    href="product.php?cat=<?php echo $cat_res['Pc_name']; ?>"><?php echo $cat_res['Pc_name']; ?></a>
                                            </li>
                                        <?php } ?>

                                    </ul>
                                </li>

                                <li><a href="post.php">Post</a></li>

                                <?php if (isset($_SESSION['R_id'])) { ?>
                                    <li><a href="profile.php">Profile</a></li>
                                <?php } ?>


                                <li><a href="FAQ.php">FAQ</a></li>
                            </ul>

                            <!-- Search Icon -->
                            <div id="searchIcon">
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                        <!-- Navbar End -->
                    </div>
                </nav>

                <!-- Search Form -->
                <div class="search-form">
                    <form action="search_product.php" method="POST">
                        <input type="search" name="search" placeholder="Search here....">&nbsp;&nbsp;&nbsp;
                        <button style="width: 100%;height: 40px;background-color:#074f0b;color:white;"
                            name="submit">Search</button>
                    </form>
                    <!-- Close Icon -->
                    <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                </div>

            </div>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->