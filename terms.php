<?php
// Start the session
session_start();
error_reporting(E_ERROR | E_PARSE);
?>
<?php 

$servername = "localhost";
$username = "root";
$passwordDB = "";
$database = "glife";
$email = $_SESSION['user_email'];
$conn = mysqli_connect($servername, $username, $passwordDB, $database);

if (!$conn) {
    echo 'Connection Failed';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Terms and Conditions">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Terms and Conditions - Green Life</title>
    <link rel="icon" href="F.png">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="images/leaf.png" alt="">
        </div>
    </div>

    <!-- Header -->
    <?php include('header.php');?>

    <div class="breadcrumb-area">
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(4.jpeg);">
            <h2>TERMS & CONDITIONS</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="Home.php"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Terms & Conditions</li>
                        </ol>
                    </nav>

                    <div class="content mt-5">
                        <h3>1. Introduction</h3>
                        <p>Welcome to <strong>Green Life</strong>. By accessing our website, you agree to these Terms and Conditions. If you do not agree, please do not use our website.</p>

                        <h3>2. Use of the Website</h3>
                        <p>You agree to use this website only for lawful purposes. Any unauthorized use may result in termination of access.</p>

                        <h3>3. Account Registration</h3>
                        <p>To access certain features, you may need to register an account. You are responsible for keeping your login credentials secure.</p>

                        <h3>4. Purchases & Payments</h3>
                        <p>All purchases are subject to availability. We reserve the right to refuse or cancel any order at our discretion.</p>

                        <h3>5. Intellectual Property</h3>
                        <p>All content on this website, including text, graphics, and logos, is the property of <strong>Green Life</strong> and may not be used without permission.</p>

                        <h3>6. Limitation of Liability</h3>
                        <p>We are not responsible for any damages resulting from the use of our website or products.</p>

                        <h3>7. Changes to Terms</h3>
                        <p>We reserve the right to modify these Terms at any time. Please review them periodically.</p>

                        <h3>8. Contact Information</h3>
                        <p>If you have any questions about these Terms, please contact us at <a href="mailto:support@greenlife.com">support@greenlife.com</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php');?>

    <!-- Scripts -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins/plugins.js"></script>
    <script src="js/active.js"></script>
</body>
</html>
