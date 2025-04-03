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


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

session_start();
if (isset($_POST['update_faq'])) {
    $faq_id = $_POST['fq_id'];
    $ftype = $_POST['fq_type'];
    $fque = $_POST['Question'];
    $fans = $_POST['Answer'];

    $query = mysqli_query($conn, "UPDATE faq SET Question='$fque', fq_type='$ftype', Answer='$fans'WHERE fq_id='$faq_id'");

    // echo $query;
    if ($query) {
        $_SESSION['message'] = "Updated successfully ";
        header('Location: Faqs.php');
        exit(0);
    }
}
?>
 




<?php
if (isset($_POST['fq_type']) && isset($_POST['fque']) && isset($_POST['fans'])) {
    $ftype = $_POST['fq_type'];
    $fque = $_POST['fque'];
    $fans = $_POST['fans'];
    // Create a connection 
    {

        $sql = "INSERT INTO `faq`(`fq_type`, `Question`, `Answer`) VALUES ('$ftype', '$fque', '$fans')"; {
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else if ($conn->error) {
                echo "Error";
            }
        }
    }
}
?>