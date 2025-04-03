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
    $Pc_id = $_POST['Pc_id'];
    $cname = $_POST['cname'];
    $desc = $_POST['desc'];

    $query = "UPDATE product_category SET Pc_name = '$cname' , Pc_description = '$desc' WHERE Pc_id = '$Pc_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo "success full update";
        echo " <script> window.location.href='Product.php'</script> ";
    }
}
?>