<?php 

$servername = "localhost";
$username = "root";
$passwordDB = "";
$database = "glife";

$conn = mysqli_connect($servername,$username,$passwordDB,$database);

if(!$conn)
{
    echo 'Connection Fail';
}
session_start();

?>