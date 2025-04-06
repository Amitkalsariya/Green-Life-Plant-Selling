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

            <div class="card-body">


                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="post-tab" data-bs-toggle="tab" data-bs-target="#bordered-post" type="button" role="tab" aria-controls="post" aria-selected="true">Post</button>
                    </li>
                    &nbsp;
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="comment-tab" data-bs-toggle="tab" data-bs-target="#bordered-comment" type="button" role="tab" aria-controls="comment" aria-selected="false">Comment</button>
                    </li>
                </ul>


                <div class="tab-content pt-2" id="borderedTabContent">
                    <div class="tab-pane fade show active" id="bordered-post" role="tabpanel" aria-labelledby="post-tab">
                        <!-- course add space-->
                        <div class="row  mt-3">
                            <div class="col-xl-12 col-md-6">
                                <div class="card mb-4" style="background-color:#074f0b">
                                    <div class="card-body">
                                        <h3 style="color:#fff;">Total Post</h3>
                                        <?php
                                        $dash_category_query = "SELECT * from post";
                                        $dash_category_query_run = mysqli_query($conn, $dash_category_query);
                                        if ($Post_idtotal = mysqli_num_rows($dash_category_query_run)) {
                                            echo '<h4 class="mb-0" style="color:#fff;">' . $Post_idtotal . '</h4>';
                                        } else {
                                            echo '<h4 class="mb-0" style="color:#fff;"> No data </h4>';
                                        }
                                        ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    </div>
                                </div>
                                <h3 style="text-align:center;">Total Gardening Post Details</h3>
                                <div class="card mt-4">
                                    <div class="card-body">
                                        <table style="width:100%" class="table table-borderless datatable" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Post</th>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Caption</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Time</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = "SELECT * FROM `post`";
                                                $result = mysqli_query($conn, $query);

                                                while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row['Post_id'] ?></td>
                                                        <td>
                                                            <img src="<?php echo "../images/" . $row['Post_image'] ?>" style="height:70px; width:80px;">
                                                        </td>
                                                        <td><?php echo $row['Caption'] ?></td>
                                                        <td><?php echo $row['Date'] ?></td>
                                                        <td><?php echo $row['Time'] ?></td>
                                                        <?php echo "<td><a href='post.php?Post_id=" . $row['Post_id'] . "' class='btn' style='background-color:#074f0b; color:#fff;'>Delete</button></td>"; ?>

                                                    </tr>
                                                <?php
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="bordered-comment" role="tabpanel" aria-labelledby="comment-tab">
                        <div class="row mt-3">
                            <div class="col-xl-12 col-md-6">
                                <div class="card mb-4" style="background-color:#074f0b">
                                    <div class="card-body">
                                        <h3 style="color:#fff;">Total Comment</h3>
                                        <!-- total seller count -->
                                        <?php
                                        $dash_comment_query = "SELECT * from comment";
                                        $dash_comment_query_run = mysqli_query($conn, $dash_comment_query);
                                        if ($C_idtotal = mysqli_num_rows($dash_comment_query_run)) {
                                            echo '<h4 class="mb-0" style="color:#fff;">' . $C_idtotal . '</h4>';
                                        } else {
                                            echo '<h4 class="mb-0" style="color:#fff;"> No data </h4>';
                                        }
                                        ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    </div>
                                </div>
                                <h3 style="text-align:center;">Total Post Comment Details</h3>
                                <div class="card mt-4">
                                    <div class="card-body">
                                        <table class="table table-borderless datatable" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Comment</th>
                                                    <th scope="col">Post</th>
                                                    <th scope="col">Text</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Time</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Comment table from database -->
                                                <?php
                                                $sql = "SELECT comment.C_id, post.Post_id, comment.Text, comment.Date, comment.Time
                                                FROM comment,post
                                                WHERE comment.Post_id = post.Post_id";
                                                                    $result = mysqli_query($conn, $sql);

                                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                                        echo " <tr>
                                                <th scope='row'>" . $row['C_id'] . "</th>
                                                <td>" . $row['Post_id'] . "</td>
                                                <td>" . $row['Text'] . "</td>
                                                <td>" . $row['Date'] . "</td>
                                                <td>" . $row['Time'] . "</td>
                                                <td><a href='post.php?C_id=" . $row['C_id'] . "' class='btn' style='background-color:#074f0b; color:#fff'>Delete</button></td>
                                                </tr>";
                                                }
                                                ?>
                                                <?php
                                                if (isset($_GET['C_id'])) {
                                                    $C_id = $_GET['C_id'];
                                                    $delete = mysqli_query($conn, "DELETE FROM `comment` WHERE `C_id`='$C_id'");
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
            </div>




            <script src="simple-datatables.js"></script>
            <script src="DataTables-1.13.4/datatables.min.js"></script>
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
<?php
    try {
        if (isset($_GET['Post_id'])) {
            $Post_id = $_GET['Post_id'];
            $delete = mysqli_query($conn, "DELETE FROM `post` WHERE `Post_id`='$Post_id'");
            $sql = mysqli_query($conn, $sql);

            if ($sql) {
                echo "Data deleted successfully";
            } else {
                echo "Error" . mysqli_error($conn);
            }
            mysqli_close(mysql: $conn);
        }
    } catch (Exception $e) {
        echo "Record is already deleted.";
    }
?>
<?php
    try {
        if (isset($_GET['C_id'])) {
            $C_id = $_GET['C_id'];
            $delete = mysqli_query($conn, "DELETE FROM `comment` WHERE `C_id`='$C_id'");
            $sql = mysqli_query($conn, $sql);

            if ($sql) {
                echo "Data deleted successfully";
            } else {
                echo "Error" . mysqli_error($conn);
            }
            mysqli_close($conn);
        }
    } catch (Exception $e) {
        echo "Record is already deleted.";
    }
?>
