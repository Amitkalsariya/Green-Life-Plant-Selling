<?php
	error_reporting(0);
?>

<?php

include 'header.php';

if (isset($_GET['fq_id']));

if (isset($_POST['fq_type']) && isset($_POST['Question']) && isset($_POST['Answer'])) {
    $fq_type = $_POST['fq_type'];
    $Question = $_POST['Question'];
    $Answer = $_POST['Answer'];
    // Create a connection 


    $sql = "UPDATE `faq` WHERE `fq_id`=fq_id"; {
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else if ($conn->error) {
            echo "Error";
        }
    }
}
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
            <h2> Edit Faqs </h2>
            <?php
                $id = $_GET['fq_id'];
                $faqedit = " select * from faq where fq_id='$id' LIMIT 1";
                $faqedit_run = mysqli_query($conn, $faqedit);

                if (mysqli_num_rows($faqedit_run)  > 0) {
                    $row = mysqli_fetch_array($faqedit_run);
            ?>


                <form name="fq_type" action="faqupdate.php" method="POST">
                    <div class="row justify-content-center mt-3">
                        <div class="col-xl-8">
                            <div class="form-group row">
                                <input type="hidden" name="fq_id" class="txtField" value="<?php echo $row['fq_id']; ?>">
                            </div>
                            <div class="form-group row">
                                <label class="form-label" for="customFile">Select Type :</label>
                                <select name="fq_type" type="select" class="form-control" id="select" value="<?php echo $row['fq_type']; ?>">
                                    <option value="" disabled>Select</option>
                                    <option value="Order related" <?php echo ($row['fq_type'] == 'Order related') ? 'selected' : ''; ?>>Order related</option>
                                    <option value="Plant related" <?php echo ($row['fq_type'] == 'Plant related') ? 'selected' : ''; ?>>Plant related</option>
                                </select>
                            </div>

                            <div class="form-group row">
                                <label class="form-label" for="customFile">Question :</label>
                                <textarea name="Question" class="form-control" id="Question" placeholder="Enter question"><?php echo $row['Question']; ?></textarea>
                            </div>
                            <div class="form-group row">
                                <label class="form-label" for="customFile">Answer :</label>
                                <textarea name="Answer" class="form-control" id="Answer" placeholder="Enter answer"><?php echo $row['Answer']; ?> </textarea>
                            </div>
                            <div class="text-center">
                                <button type="reset" class="btn btn-danger">Cancle</button>&nbsp;&nbsp;
                                <button type="submit" name="update" class="btn btn-success" style="background-color: #074f0b;">Submit</button>
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
    </div>
    </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>