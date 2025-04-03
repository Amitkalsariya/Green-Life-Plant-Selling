<?php
error_reporting(0);
include 'header.php';

// Check if delete button is clicked
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Fetch image path before deleting the record
    $query = "SELECT Plant_image FROM plant_details WHERE Plant_id='$delete_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $image_path = "images/portfolio_images/" . $row['Plant_image'];

    // Delete plant record
    $delete_query = "DELETE FROM plant_details WHERE Plant_id='$delete_id'";
    $delete_run = mysqli_query($conn, $delete_query);

    if ($delete_run) {
        // Remove the image file if it exists
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        echo "<script>alert('Plant record deleted successfully!'); window.location='Portfolio.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error deleting record!');</script>";
    }
}
?>

<!-- Page Content -->
<div id="content" class="p-4 p-md-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
            </button>
            <h1><span style="color:green">Green </span> Life </h1>
        </div>
    </nav>

    <h2>Edit Plant Details:</h2>
    <?php
    $id = $_GET['Plant_id'];
    $padd = "SELECT * FROM plant_details WHERE Plant_id='$id' LIMIT 1";
    $padd_run = mysqli_query($conn, $padd);

    if (mysqli_num_rows($padd_run) > 0) {
        $res = mysqli_fetch_assoc($padd_run);
    ?>
        <form action="updateplant.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="Plant_id" value="<?php echo $res['Plant_id']; ?>">
            <div class="row justify-content-center mt-3">
                <div class="col-xl-8">
                    <div class="form-group row">
                        <label class="form-label" for="select">Select Type :</label>
                        <select name="p_type" class="form-control" id="select" value="<?php echo $res['Type_name']; ?>">
                            <option disabled>Select</option>
                            <?php
                            $sql = "SELECT * FROM plant_type";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option>" . $row['Type_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group row">
                        <label class="form-label" for="name">Plant Name:</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Enter Plant Name" value="<?php echo $res['Plant_name']; ?>">
                    </div>

                    <div class="form-group row">
                        <label class="form-label" for="file">Plant Image:</label>
                        <input name="file" type="file" class="form-control" id="file">
                    </div>

                    <div class="text-center">
                    <button type="button" class="btn btn-danger" onclick="window.location.href='Portfolio.php'">Cancel</button>

                        <button type="submit" name="update" class="btn" style='background-color:#074f0b; color:#fff;'>Submit</button>&nbsp;&nbsp;
                        <button type="reset" class="btn" style='background-color:#394db7;'><a href="Portfolio.php" style="color:#fff;">Go To Back</a></button>&nbsp;&nbsp;

                        <!-- Delete Button -->
                        <a href="padd.php?delete_id=<?php echo $res['Plant_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                    </div>
                </div>
            </div>
        </form>
    <?php
    } else {
        echo "<h4>No record found</h4>";
    }
    ?>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
