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

if(isset($_POST['update']))
{
    $Ptype_id = $_POST['Ptype_id'];
    $plcname= $_POST['plcname'];
    $pldesc=$_POST['pldesc'];

    $query = "UPDATE plant_type SET Type_name = '$plcname' , Description = '$pldesc' WHERE Ptype_id = '$Ptype_id'";
    $query_run = mysqli_query($conn , $query);

    if($query_run)
    {
        echo "success full update";
        echo " <script> window.location.href='Opinionshare.php'</script> ";
        
       
    }
    
}
