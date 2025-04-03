<?php
include '../connection.php'; // Ensure database connection

if (isset($_GET['Pc_id'])) {
    $Pc_id = $_GET['Pc_id'];

    // Delete query
    $delete_query = "DELETE FROM product_category WHERE Pc_id='$Pc_id'";
    
    if (mysqli_query($conn, $delete_query)) {
        header("Location: Product.php"); // Redirect to category list after deletion
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    header("Location: Product.php");
    exit();
}
?>
