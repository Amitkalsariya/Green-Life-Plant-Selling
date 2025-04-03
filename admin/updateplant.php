<?php
	error_reporting(0);
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "glife";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

if (isset($_POST['update'])) {
    $Plant_id = $_POST['Plant_id'];
    $name = $_POST['name'];
    $p_type = $_POST['p_type'];
    // $desc = $_POST['desc'];
    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = "images/";
    move_uploaded_file($tempname, $folder . $filename);


    $query = "UPDATE plant_details SET Plant_name = '$name' , Type_name = '$p_type' , Plant_image = '$filename' WHERE Plant_id = '$Plant_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo "success full update";
        echo " <script> window.location.href='Product.php'</script> ";
    }
}
?>