<?php
session_start();
error_reporting(0);
include('connection.php');

// Get user ID from session
$u_id = $_SESSION['R_id'];

// Fetch cart details
$data = mysqli_query($conn, "SELECT cart.*, user.*, product.* FROM cart 
    INNER JOIN user ON user.R_id = cart.u_id 
    JOIN product ON product.Prod_id = cart.p_id 
    WHERE cart.u_id='$u_id' AND status=0");

$total_price = 0;
while ($row = mysqli_fetch_assoc($data)) {
    $total_price += $row['qty'] * $row['p_price'];
}

// Handle order processing
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['emailid']);
    $phone = mysqli_real_escape_string($conn, $_POST['phonenumber']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);
    $payment_id = isset($_POST['payment_id']) ? mysqli_real_escape_string($conn, $_POST['payment_id']) : 'COD';

    $sql = "INSERT INTO checkout (firstname, lastname, emailid, phonenumber, address, city, state, zip, order_id) 
            VALUES ('$firstname', '$lastname', '$email', '$phone', '$address', '$city', '$state', '$zip', '$payment_id')";

    if (mysqli_query($conn, $sql)) {
        echo "success";
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Green Life - Checkout</title>
    <link rel="icon" href="F.png">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php include('header.php'); ?>

    <!-- ✅ Breadcrumb Section -->
    <div class="breadcrumb-area">
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
            style="background-image: url(4.jpeg);">
            <h2>Checkout</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-100">
        <div class="container">
            <form id="checkout-form">
                <div class="row justify-content-between">
                    <div class="col-12 col-lg-7">
                        <div class="checkout_details_area clearfix">
                            <h5>Billing Details</h5>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="firstname">First Name *</label>
                                    <input type="text" id="firstname" name="firstname" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="lastname">Last Name *</label>
                                    <input type="text" id="lastname" name="lastname" class="form-control" required>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="emailid">Email Address *</label>
                                    <input type="email" id="emailid" name="emailid" class="form-control" required>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="phonenumber">Phone Number *</label>
                                    <input type="number" id="phonenumber" name="phonenumber" class="form-control"
                                        required>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="address">Address *</label>
                                    <input type="text" id="address" name="address" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="city">City *</label>
                                    <input type="text" id="city" name="city" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="state">State *</label>
                                    <input type="text" id="state" name="state" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="zip">Pincode *</label>
                                    <input type="text" id="zip" name="zip" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="checkout-content">
                            <h5>Your Order</h5>
                            <div class="order-total d-flex justify-content-between align-items-center">
                                <h5>Order Total</h5>
                                <h5>₹<?php echo number_format($total_price); ?></h5>
                            </div>

                            <div class="payment-options">
                                <label><input type="radio" name="payment_mode" value="COD" checked> Cash on
                                    Delivery</label>
                                <label><input type="radio" name="payment_mode" value="Online"> Online Payment
                                    (Razorpay)</label>
                            </div>

                            <div class="checkout-btn mt-30">
                                <button type="button" id="pay-btn" class="btn alazea-btn w-100" disabled>
                                    Pay Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php include('footer.php'); ?>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        $(document).ready(function () {
            function validateForm() {
                let isValid = true;
                $("#checkout-form input[required]").each(function () {
                    if ($(this).val().trim() === "") {
                        isValid = false;
                    }
                });

                $("#pay-btn").prop("disabled", !isValid);
            }

            $("#checkout-form input").on("input", validateForm);

            $("#pay-btn").on("click", function () {
                var paymentMode = $("input[name='payment_mode']:checked").val();
                if (paymentMode === "COD") {
                    var codPaymentId = "COD_" + Math.floor(Math.random() * 1000000); // Generate a unique COD ID

                    $.post("checkout.php", $("#checkout-form").serialize() + "&payment_mode=COD&payment_id=" + codPaymentId, function (res) {
                        if (res.trim() === "success") {
                            window.location.href = "thankyou.php?payment_id=" + codPaymentId;
                        } else {
                            alert("Error: " + res);
                        }
                    });
                } else {
                    var options = {
                        "key": "rzp_test_AbTtgZTb0mnpc2",
                        "amount": <?php echo $total_price * 100; ?>,
                        "currency": "INR",
                        "handler": function (response) {
                            $.post("checkout.php", $("#checkout-form").serialize() + "&payment_mode=Online&payment_id=" + response.razorpay_payment_id, function (res) {
                                if (res.trim() === "success") {
                                    window.location.href = "thankyou.php?payment_id=" + response.razorpay_payment_id;
                                }
                            });
                        }


                    };
                    new Razorpay(options).open();
                }
            });
        });
    </script>

</body>

</html>