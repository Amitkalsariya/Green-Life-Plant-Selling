<?php
	error_reporting(0);
?>

<?php
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
                    <button class="nav-link active" id="faq-tab" data-bs-toggle="tab" data-bs-target="#faq" type="button" role="tab" aria-controls="faq" aria-selected="true">Faqs</button>
                </li>
                &nbsp;
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="fcat-tab" data-bs-toggle="tab" data-bs-target="#fcat" type="button" role="tab" aria-controls="fcat" aria-selected="false">Add faqs</button>
                </li>


            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                    <div class="row  mt-3">
                        <div class="col-xl-6 col-md-6 ">
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
                                    <a class="small text-black stretched-link" href="orderfaq.php">View Details</a>
                                    <div class="small text-black"><i class="fa fa-angle-right"></i></div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="card mb-4" style="background-color:#074f0b">
                                <div class="card-body">
                                    <h3 style="color:#fff;">Plant Related</h3>
                                    <?php
                                    $query = "SELECT * FROM faq WHERE fq_type='plant related'";
                                    $query_run = mysqli_query($conn, $query);
                                    if ($planttotal = mysqli_num_rows($query_run)) {
                                        echo '<h4 class="mb-0" style="color:#fff;">' . $planttotal . '</h4>';
                                    } else {
                                        echo '<h4 class="mb-0" style="color:#fff;"> No data </h4>';
                                    }
                                    ?>

                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-black stretched-link" href="plantfaq.php">View Details</a>
                                    <div class="small text-black"><i class="fa fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 style="text-align:center;">Total FAQs detail</h3><br>
                    <div class="card mt-4">
                        <div class="card-body">
                            <table class="table table-borderless datatable" id="myTable">
                                <thead>
                                    <tr>
                                        <!-- <th scope="col">Faq</th> -->
                                        <th scope="col">Type</th>
                                        <th scope="col">Question</th>
                                        <th scope="col">Answer</th>
                                        <th scope="col">Delete</th>
                                        <th scope="col">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `faq`";
                                    $result = mysqli_query($conn, $sql);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "  <tr>
                            <td>" . $row['fq_type'] . "</td>  
                            <td>" . $row['Question'] . "</td>  
                            <td>" . $row['Answer'] . "</td>
                            <td><a href='Faqs.php?fq_id=" . $row['fq_id'] . "' class='btn' style='background-color:#074f0b; color:#fff'>Delete</a></td>
                            <td> <a href='faqedit.php?fq_id=" . $row['fq_id'] . "' class='btn' name='submit' style='background-color:#074f0b; color:#fff'>Edit</a></td> 
                            </tr>";
                                        // echo $row['R_id'].".".$row['name']."".$row['email']."".$row['password'];
                                        // echo"<br>";
                                    }

                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="fcat" role="tabpanel" aria-labelledby="fcat-tab">
                    <h3 style="text-align:center;">Add FAQs form</h3>
                    <div class="card mt-4">
                        <div class="card-body">
                            <form action="Faqs.php" method="POST">
                                <div class="row justify-content-center mt-3">
                                    <div class="col-xl-8">
                                        <div class="form-group row">
                                            <label class="form-label" for="customFile">Select Type :</label>
                                            <select name="fq_type" type="select" class="form-control" id="select" required>
                                                <option select>Select</option>
                                                <option value="Order related">Order related</option>
                                                <option value="plant related">Plant related</option>
                                            </select>
                                        </div>

                                        <div class="form-group row">
                                            <label class="form-label" for="customFile">Question :</label>
                                            <textarea name="Question" class="form-control" id="Question" placeholder="Enter question" required></textarea>
                                        </div>
                                        <div class="form-group row">
                                            <label class="form-label" for="customFile">Answer :</label>
                                            <textarea name="Answer" class="form-control" id="Answer" placeholder="Enter answer" required></textarea>
                                        </div>
                                        <div class="text-center">
                                            <button type="reset" class="btn btn-danger">Cancle</button>&nbsp;&nbsp;
                                            <button type="submit" name="submit" class="btn" style='background-color:#074f0b; color:#fff'>Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script> -->

</body>

</html>
<?php
if (isset($_POST['fq_type']) && isset($_POST['Question']) && isset($_POST['Answer'])) {
    $fq_type = $_POST['fq_type'];
    $Question = $_POST['Question'];
    $Answer = $_POST['Answer'];
    // Create a connection 

    $sql = "INSERT INTO `faq`(`fq_type`,`Question`,`Answer`) VALUES ('$fq_type','$Question','$Answer')"; 
   
 
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                window.location.href = 'Faqs.php';
            </script>";
    } else if ($conn->error) {
        echo "Error";
    }
}
try {
    if (isset($_GET['fq_id'])) {
        $fq_id = $_GET['fq_id'];
        $delete = mysqli_query($conn, "DELETE FROM `faq` WHERE `fq_id`='$fq_id'");
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