<?php
session_start();
error_reporting(0);

include('connection.php');

$payment_id = $_GET['payment_id'] ?? '';

// ✅ Redirect to home if accessed directly
if (empty($payment_id)) {
    header("Location: home.php");
    exit;
}

// ✅ Clear order session (optional based on your logic)
unset($_SESSION['order_success']);

// ✅ Optional: Clear the cart after successful order
// $u_id = $_SESSION['R_id'];
// if ($u_id) {
//     mysqli_query($conn, "DELETE FROM cart WHERE u_id='$u_id' AND status = 0");
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Thank You Page - Green Life">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Green Life - Thank You</title>

    <!-- Favicon -->
    <link rel="icon" href="F.png">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

    <!-- ✅ Disable Back Button -->
    <script>
        history.pushState(null, null, location.href);
        window.onpopstate = function () {
            history.go(1);
        };
    </script>
</head>

<body>
    <?php include('header.php'); ?>

    <!-- ✅ Breadcrumb Section -->
    <div class="breadcrumb-area">
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
            style="background-image: url(4.jpeg);">
            <h2>Thank You</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thank You</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- ✅ Thank You Content -->
    <div class="container p-5">
        <div class="checkout-success-content py-2">
            <div class="row">
                <div class="col-12">
                    <div class="checkout-scard card border-0 rounded text-center">
                        <div class="card-body">
                            <p class="card-icon">
                                <i class="fa fa-check-circle text-success fs-1"></i>
                            </p>
                            <h4 class="card-title">Payment Successful!</h4>

                            <h5 class="text-muted">Payment ID:
                                <b class="text-success"><?php echo htmlspecialchars($payment_id); ?></b>
                            </h5>

                            <p class="card-text mb-1">Thank you for shopping with <b>Green Life</b>.</p>
                            <p class="card-text text-order badge bg-success my-2">
                                <i class="fa fa-phone"></i> <b>+91 12345 93652</b>
                            </p>

                        </div>
                        <a class="btn btn-outline-secondary mt-3" href="product.php">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>

    <!-- Scripts -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins/plugins.js"></script>
    <script src="js/active.js"></script>
</body>

</html>
