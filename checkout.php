<?php
session_start();
error_reporting(0);
include('connection.php');

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

if (isset($_SESSION['order_success']) && $_SESSION['order_success'] === true) {
    header("Location: thankyou.php");
    exit;
}

$u_id = $_SESSION['R_id'];

$data = mysqli_query($conn, "SELECT cart.*, user.*, product.* FROM cart 
    INNER JOIN user ON user.R_id = cart.u_id 
    JOIN product ON product.Prod_id = cart.p_id 
    WHERE cart.u_id='$u_id' AND status=0");

$total_price = 0;
while ($row = mysqli_fetch_assoc($data)) {
    $total_price += $row['qty'] * $row['p_price'];
}

// Only handle confirmed payment POST
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['payment_mode']) && isset($_POST['payment_id'])) {
    $payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['emailid']);
    $phone = mysqli_real_escape_string($conn, $_POST['phonenumber']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);
    $payment_id = mysqli_real_escape_string($conn, $_POST['payment_id']);

    $sql = "INSERT INTO checkout (firstname, lastname, emailid, phonenumber, address, city, state, zip, order_id) 
            VALUES ('$firstname', '$lastname', '$email', '$phone', '$address', '$city', '$state', '$zip', '$payment_id')";

    if (mysqli_query($conn, $sql)) {
        $checkout_id = mysqli_insert_id($conn);

        // Insert each cart item into order_items
        $cart_items = mysqli_query($conn, "SELECT * FROM cart WHERE u_id='$u_id' AND status=0");
        while ($item = mysqli_fetch_assoc($cart_items)) {
            $pid = $item['p_id'];
            $qty = $item['qty'];
            $price = $item['p_price'];
            mysqli_query($conn, "INSERT INTO order_items (checkout_id, product_id, qty, price) VALUES ('$checkout_id', '$pid', '$qty', '$price')");
        }

        // Clear the cart
        mysqli_query($conn, "DELETE FROM cart WHERE u_id='$u_id' AND status=0");

        $_SESSION['order_success'] = true;
        echo "success";
        exit;
    } else {
        error_log("Checkout Insert Error: " . mysqli_error($conn));
        echo "Error: " . mysqli_error($conn);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Green Life - Checkout</title>
    <link rel="icon" href="F.png">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<?php include('header.php'); ?>

<div class="breadcrumb-area">
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
         style="background-image: url(4.jpeg);">
        <h2>Checkout</h2>
    </div>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container mb-100">
    <form id="checkout-form" autocomplete="off">
        <div class="row justify-content-between">
            <div class="col-12 col-lg-7">
                <div class="checkout_details_area clearfix">
                    <h5>Billing Details</h5>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label>First Name *</label>
                            <input type="text" name="firstname" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>Last Name *</label>
                            <input type="text" name="lastname" class="form-control" required>
                        </div>
                        <div class="col-12 mb-4">
                            <label>Email Address *</label>
                            <input type="email" name="emailid" class="form-control" required>
                        </div>
                        <div class="col-12 mb-4">
                            <label>Phone Number *</label>
                            <input type="number" name="phonenumber" class="form-control" required>
                        </div>
                        <div class="col-12 mb-4">
                            <label>Address *</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>City *</label>
                            <input type="text" name="city" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>State *</label>
                            <input type="text" name="state" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>Pincode *</label>
                            <input type="text" name="zip" class="form-control" required>
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

                    <div class="payment-options mt-3 mb-3">
                        <label><input type="radio" name="payment_mode" value="COD" required> Cash on Delivery</label><br>
                        <label><input type="radio" name="payment_mode" value="Online" required> Online Payment (Razorpay)</label>
                    </div>

                    <div class="checkout-btn mt-30">
                        <button type="button" id="pay-btn" class="btn alazea-btn w-100" disabled>Pay Now</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php include('footer.php'); ?>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    $(document).ready(function () {
        function validateForm() {
            let isValid = true;

            // Check all required inputs
            $("#checkout-form input[required]").each(function () {
                if ($(this).val().trim() === "") {
                    isValid = false;
                }
            });

            // Ensure one payment option is selected
            if (!$("input[name='payment_mode']:checked").val()) {
                isValid = false;
            }

            $("#pay-btn").prop("disabled", !isValid);
        }

        // Trigger validation on input and change
        $("#checkout-form input").on("input change", validateForm);
        validateForm(); // Initial run in case of autofill

        $("#pay-btn").on("click", function () {
            const paymentMode = $("input[name='payment_mode']:checked").val();

            if (paymentMode === "COD") {
                const codPaymentId = "COD_" + Math.floor(Math.random() * 1000000);
                $.ajax({
                    type: "POST",
                    url: "checkout.php",
                    data: $("#checkout-form").serialize() + "&payment_mode=COD&payment_id=" + codPaymentId,
                    success: function (res) {
                        if (res.trim() === "success") {
                            window.location.href = "thankyou.php?payment_id=" + codPaymentId;
                        } else {
                            alert("Error: " + res);
                        }
                    }
                });
            } else {
                const options = {
                    key: "rzp_test_BwWBTwSPtqGMAl",
                    amount: <?php echo $total_price * 100; ?>,
                    currency: "INR",
                    handler: function (response) {
                        $.ajax({
                            type: "POST",
                            url: "checkout.php",
                            data: $("#checkout-form").serialize() + "&payment_mode=Online&payment_id=" + response.razorpay_payment_id,
                            success: function (res) {
                                if (res.trim() === "success") {
                                    window.location.href = "thankyou.php?payment_id=" + response.razorpay_payment_id;
                                } else {
                                    alert("Error: " + res);
                                }
                            }
                        });
                    }
                };
                new Razorpay(options).open();
            }
        });
    });
</script>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>
</html>
