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

            <h2> Edit Product Category </h2>
            <?php
            $id = $_GET['Pc_id'];
            $PEdit = " select * from product_category where Pc_id='$id' LIMIT 1";
            $PEdit_run = mysqli_query($conn, $PEdit);

            if (mysqli_num_rows($PEdit_run)  > 0) {
                $row = mysqli_fetch_array($PEdit_run);
            ?>


                <form action="updatep.php" method="POST">
                    <input type="hidden" name="Pc_id" value="<?php echo $row['Pc_id']; ?>">
                    <div class="row justify-content-center mt-3">
                        <div class="col-xl-8">
                            <div class="form-group row">
                                <label class="form-label" for="customFile">Product Category Name:</label>
                                <input name="cname" type="text" class="form-control" id="cname" placeholder="Enter Name of Product Category" value="<?php echo $row['Pc_name'];  ?>">
                            </div>

                            <div class="form-group row">
                                <label class="form-label" for="customFile">Product Category Description :</label>
                                <textarea name="desc" class="form-control" id="desc" placeholder="Enter product category description"><?php echo $row['Pc_description'];  ?>
                                    </textarea>
                            </div>
                            <div class="text-center">
                                <button type="reset" class="btn btn-danger">Cancle</button>&nbsp;&nbsp;
                                <button type="submit" name="update" class="btn" style="background-color:#074f0b; color:#fff">Update</button>
                            </div>
                        </div>

                    </div>

                </form>
            <?php
            } else {
            ?>
                <h4> no record </h4>
            <?php
            }

            ?>


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


    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>