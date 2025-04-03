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


            <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Order Related Faqs</button>
                </li>

            </ul>
            <div class="tab-content pt-2" id="borderedTabContent">
                <div class="tab-pane fade show active" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">


                </div>
                <div class="tab-pane fade" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row  mt-3">
                        <div class="col-xl-12 col-md-6">
                            <div class="card mb-4" style="background-color:#074f0b">
                                <div class="card-body">
                                    <h3 style="color:#fff;">Order Related</h3>
                                    <?php
                                    $query = "SELECT * FROM faq WHERE fq_type='order related' ";
                                    $query_run = mysqli_query($conn, $query);
                                    if ($OrderTotal = mysqli_num_rows($query_run)) {
                                        echo '<h4 class="mb-0" style="color:#fff;">' . $OrderTotal . '</h4>';
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
                    <h3 style="text-align:center;"> Order Related FAQs Details</h3>
                    <div class="card mt-4">
                        <div class="card-body">
                            <table class="table table-borderless datatable" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Faq</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Question</th>
                                        <th scope="col">Answer</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `faq` WHERE fq_type='order related' ";
                                    $result = mysqli_query($conn, $sql);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "  <tr>
                            <th scope='row'>" . $row['fq_id'] . "</th>
                            <td>" . $row['fq_type'] . "</td>  
                            <td>" . $row['Question'] . "</td>  
                            <td>" . $row['Answer'] . "</td>
                            <td><a href='Faqs.php?fq_id=" . $row['fq_id'] . "' class='btn' style='background-color:#074f0b; color:#fff'>Delete</button></td>
                            </tr>";
                                        // echo $row['R_id'].".".$row['name']."".$row['email']."".$row['password'];
                                        // echo"<br>";
                                    }

                                    ?>
                                    <?php
                                    if (isset($_GET['fq_id'])) {
                                        $fq_id = $_GET['fq_id'];
                                        $delete = mysqli_query($conn, "DELETE FROM `faq` WHERE `fq_id`='$fq_id'");
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


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
        let table = new DataTable('#myTable');
    </script>
    <script src="simple-datatables.js"></script>
    <script src="DataTables-1.13.4/datatables.min.js"></script>

    <!-- 
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script> -->
</body>

</html>