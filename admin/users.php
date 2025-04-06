<?php
	error_reporting(0);
    include 'header.php';
?>
       
        <!-- Page Content  -->
        <!-- navbar -->

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
            <!-- navbarend -->
            <!-- tab1 -->
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home" type="button" role="tab" aria-controls="home" aria-selected="true">Register User</button>
                    </li>
                
                </ul>
                <div class="tab-content pt-2" id="borderedTabContent">
                    <div class="tab-pane fade show active" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
                        <!-- course add space-->
                        <div class="row  mt-3">
                            <div class="col-xl-12 col-md-6">
                                <div class="card mb-4" style="background-color:#074f0b">
                                    <div class="card-body">
                                        <h3 style="color:#fff;">Total User</h3>
                                        <!-- total user count -->
                                        <?php
                                        $dash_user_query = "SELECT * from user";
                                        $dash_user_query_run = mysqli_query($conn, $dash_user_query);
                                        if ($R_idtotal = mysqli_num_rows($dash_user_query_run)) {
                                            echo '<h4 class="mb-0" style="color:#fff;">' . $R_idtotal . '</h4>';
                                        } else {
                                            echo '<h4 class="mb-0" style="color:#fff;"> No data </h4>';
                                        }
                                        ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">

                                    </div>
                                </div>
                                <h3 style="text-align:center;">Total User Details</h3>
                                <div class="card mt-4">
                                    <div class="card-body">
                                        <table class="table table-borderless datatable" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">User</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Contact</th>
                                                    <th scope="col">Address</th>
                                                    <th scope="col">City</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- user table from database -->
                                                <?php
                                                $sql = "SELECT * FROM `user`";
                                                $result = mysqli_query($conn, $sql);

                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "  <tr>
                            <th scope='row'>" . $row['R_id'] . "</th>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['contact'] . "</td>
                            <td>" . $row['address'] . "</td>
                            <td>" . $row['city'] . "</td>
                            </tr>";
                                                }
                                                ?>
                                                <!-- end of table -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- tab1 end -->


                    <!-- tab2 -->
                 
                </div>
            </div>
        </div>

        <!-- tab2 end -->

        <!-- 
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script> -->
    <!-- jQuery (required for Bootstrap 4 toggle) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Sidebar toggle logic -->
<script>
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>

<!-- Optional: Add style to shift content when sidebar is toggled -->
<style>
    #sidebar.active {
        margin-left: -250px; /* Adjust based on your sidebar width */
    }
</style>

</body>

</html>