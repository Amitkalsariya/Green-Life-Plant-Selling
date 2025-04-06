<?php
	error_reporting(0);
?>
<?php

include_once 'header.php';




?>



    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

          <!-- menubar -->
          <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>
          <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
          </button>
          <h1><span style="color:green">Green </span> Life </h1>
        </div>
      </nav>
      <!-- menu bar end -->
      <!-- page content -->
      <div id="layoutSidenav_content">
        <main>
          <div class="container-fluid px-4">
            <h1 class="mt-4">Admin Dashboard</h1>
            <!-- 1 card -->
            <div class="row">
              <div class="col-xl-3 col-md-6">
                <div style="background-color:#074f0b" class="card mb-4">
                  <div class="card-body">
                    <h3 style="color:#fff;">Users</h3>
                    <!-- users count -->
                    <?php
                    $query = "SELECT R_id FROM user";
                    $query_user_run = mysqli_query($conn, $query);
                    if ($R_idtotal = mysqli_num_rows($query_user_run)) {
                      echo '<h4 class="mb-0" style="color:#fff;">' . $R_idtotal . '</h4>';
                    } else {
                      echo '<h4 class="mb-0" style="color:#fff;"> No data </h4>';
                    }
                    ?>
                    <!-- end count -->
                  </div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-black stretched-link" href="users.php">View Details</a>
                    <div class="small text-black"><i class="fa fa-angle-right"></i></div>
                  </div>
                </div>
              </div>
              <!-- end card1 -->
              <!-- card2 -->
              <div class="col-xl-3 col-md-6">
                <div style="background-color:#074f0b" class="card mb-4">
                  <div class="card-body">
                    <h3 style="color:#fff;">Posts</h3>
                    <!-- count of post -->
                    <?php
                    $query = "SELECT Post_id FROM post";
                    $query_post_run = mysqli_query($conn, $query);
                    if ($Post_idtotal = mysqli_num_rows($query_post_run)) {
                      echo '<h4 class="mb-0" style="color:#fff;">' . $Post_idtotal . '</h4>';
                    } else {
                      echo '<h4 class="mb-0" style="color:#fff;"> No data </h4>';
                    }
                    ?>
                    <!-- end count -->
                  </div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-black stretched-link" href="Post.php">View Details</a>
                    <div class="small text-black"><i class="fa fa-angle-right"></i></div>
                  </div>
                </div>
              </div>
              <!-- end card2 -->

              <!-- card 3 -->
              <div class="col-xl-3 col-md-6">
                <div style="background-color:#074f0b" class="card mb-4">
                  <div class="card-body">
                    <h3 style="color:#fff;">Portfolio</h3>
                    <!-- count of plant details -->
                    <?php
                    $query = "SELECT * from plant_details";
                    $query_post_run = mysqli_query($conn, $query);
                    if ($Plant_idtotal = mysqli_num_rows($query_post_run)) {
                      echo '<h4 class="mb-0" style="color:#fff;">' . $Plant_idtotal . '</h4>';
                    } else {
                      echo '<h4 class="mb-0" style="color:#fff;"> No data </h4>';
                    }
                    ?>
                    <!-- end count -->
                  </div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-black stretched-link" href="Portfolio.php">View Details</a>
                    <div class="small text-black"><i class="fa fa-angle-right"></i></div>
                  </div>
                </div>
              </div>
              <!-- end card3 -->

              <!-- card 4 -->
              <div class="col-xl-3 col-md-6">
                <div style="background-color:#074f0b" class="card mb-4">
                  <div class="card-body">
                    <h3 style="color:#fff;">Products</h3>
                    <!-- count of products -->
                    <?php
                    $query = "SELECT Prod_id FROM product";
                    $query_post_run = mysqli_query($conn, $query);
                    if ($Prod_idtotal = mysqli_num_rows($query_post_run)) {
                      echo '<h4 class="mb-0" style="color:#fff;">' . $Prod_idtotal . '</h4>';
                    } else {
                      echo '<h4 class="mb-0" style="color:#fff;"> No data </h4>';
                    }
                    ?>
                    <!-- end count -->
                  </div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-black stretched-link" href="Product.php">View Details</a>
                    <div class="small text-black"><i class="fa fa-angle-right"></i></div>
                  </div>
                </div>
              </div>

              <!-- card 5 -->
<div class="col-xl-3 col-md-6">
  <div style="background-color:#074f0b" class="card mb-4">
    <div class="card-body">
      <h3 style="color:#fff;">Selling Report</h3>
      <!-- count of orders -->
      <?php
      $query = "SELECT id FROM checkout";
      $query_order_run = mysqli_query($conn, $query);
      if ($order_total = mysqli_num_rows($query_order_run)) {
        echo '<h4 class="mb-0" style="color:#fff;">' . $order_total . '</h4>';
      } else {
        echo '<h4 class="mb-0" style="color:#fff;"> No data </h4>';
      }
      ?>
      <!-- end count -->
    </div>
    <div class="card-footer d-flex align-items-center justify-content-between">
      <a class="small text-black stretched-link" href="selling_report.php">View Details</a>
      <div class="small text-black"><i class="fa fa-angle-right"></i></div>
    </div>
  </div>
</div>
<!-- end card5 -->

            </div>
            <!-- end card4 -->
              
            
          </div>
      </div>

      <script src="js/jquery.min.js"></script>
      <script src="js/popper.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
</body>

</html>