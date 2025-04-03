<?php
	error_reporting(0);
    include 'header.php';
?>

            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5">

                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">

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


                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Product</button>
                    </li>
                    &nbsp;
                </ul>
                <div class="tab-content pt-2" id="borderedTabContent">
                    <div class="tab-pane fade show active" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row  mt-3">
                            <div class="col-xl-12 col-md-6">
                                <div class="card mb-4" style="background-color:#074f0b">
                                    <div class="card-body">
                                        <h3 style="color:#fff;">Plants</h3>
                                        <?php
                                        $dash_plant_query = "SELECT * FROM `product` WHERE Pc_id='2'";
                                        $dash_plant_query_run = mysqli_query($conn, $dash_plant_query);
                                        if ($Pc_idtotal = mysqli_num_rows($dash_plant_query_run)) {
                                            echo '<h4 class="mb-0" style="color:#fff;">' . $Pc_idtotal . '</h4>';
                                        } else {
                                            echo '<h4 class="mb-0" style="color:#fff;"> No data </h4>';
                                        }
                                        ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3 style="text-align:center;">Total Plant Product Detail</h3>
                        <div class="card mt-4">
                            <div class="card-body">
                                <table class="table table-borderless datatable" id="myTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM `product` WHERE Pc_id='2' ";
                    
                                        $result = mysqli_query($conn, $sql);

                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <tr style="width:10px;">
                                                <td><?php echo $row['Prod_id'] ?></td>
                                                <td><?php echo $row['Prod_name'] ?></td>

                                                <td>
                                                    <img src="<?php echo "./images/" . $row['Prod_image'] ?>" style="height:70px; width:80px;">
                                                </td>

                                                <td><?php echo $row['Prod_description'] ?></td>
                                                <td><?php echo $row['prod_qt'] ?></td>
                                                <td><?php echo $row['Prod_price'] ?></td>
                                                <td><?php echo $row['Date'] ?></td>
                                                <td><?php echo $row['Time'] ?></td>
                                                <?php echo "<td><a href='Product.php?Prod_id=" . $row['Prod_id'] . "' class='btn' style='background-color:#074f0b; color:#fff;'>Delete</button></td>"; ?>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if (isset($_GET['Prod_id'])) {
                                            $I_id = $_GET['Prod_id'];
                                            $delete = mysqli_query($conn, "DELETE FROM `product` WHERE `Prod_id`='$Prod_id'");
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- 
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script> -->

</body>

</html>