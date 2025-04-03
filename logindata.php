<?php
error_reporting(0);
session_start();

include('connection.php');

if(isset($_POST['remember']))
    setcookie('uemail',$_POST['emailu'], time() + 86400 * 30, '/');
else
    setcookie('uemail',$_POST['emailu'], time() - 86400 * 30, '/');
if(isset($_POST['remember']))
    setcookie('upass',$_POST['passwordu'], time() + 86400 * 30, '/');
else
    setcookie('upass',$_POST['passwordu'], time() - 86400 * 30, '/');

$email = $_POST['emailu'];
$_SESSION['user_email'] = $email;
$pass = $_POST['passwordu'];


if ($conn->connect_error) {
    die("Failed Connection : " . $conn->connect_error);
} else {
    $sql = $conn->prepare("SELECT * FROM `user` where (email= ?)");
    $sql->bind_param("s", $email);
    $sql->execute();
    $sql_result = $sql->get_result();
   
    if ($sql_result->num_rows > 0) {
       
        $data = $sql_result->fetch_assoc();
        if (password_verify($pass,$data['password'])) { 
            header("location:Home.php");
        } else {
            echo "<script> alert('Invalid Password')
            window.location.href='Login.php' </script>";
        }
        
    } else {
        echo " <script> alert('Invalid Email')
        window.location.href='Login.php' </script>"; 
        
        
    }
    $sql->close();
    $conn->close();
}
?>