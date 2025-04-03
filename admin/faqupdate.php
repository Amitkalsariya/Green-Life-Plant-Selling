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
    $fq_id = $_POST['fq_id'];
    $fq_type = $_POST['fq_type'];
    $Answer = $_POST['Answer'];
    $Question = $_POST['Question'];

    $query = "UPDATE faq SET fq_type = '$fq_type' , Answer = '$Answer' , Question = '$Question' WHERE fq_id = '$fq_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo "success full update";
        echo " <script> window.location.href='Faqs.php'</script> ";
    }
    else{
        echo "Not success full update";
    }
}
?>