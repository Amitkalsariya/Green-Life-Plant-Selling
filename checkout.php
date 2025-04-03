<?php
// Start the session
session_start();
error_reporting(0);

include('connection.php');

$u_id = $_SESSION['R_id'];
$data = mysqli_query($conn, "SELECT cart.*, user.*, product.* FROM cart 
    INNER JOIN user ON user.R_id = cart.u_id 
    JOIN product ON product.Prod_id = cart.p_id 
    WHERE cart.u_id='$u_id' AND status=0");

$total_price = 0;
while ($row = mysqli_fetch_assoc($data)) {
    $total_price += $row['qty'] * $row['p_price'];
}

// Handle the payment processing and database insertion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['payment_id'])) {
    $payment_id = mysqli_real_escape_string($conn, $_POST['payment_id']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['emailid']);
    $phone = mysqli_real_escape_string($conn, $_POST['phonenumber']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);
    

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
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Green Life</title>
    <link rel="icon" href="F.png">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery for validation -->
</head>

<body>
    <?php include('header.php'); ?>

    <div class="breadcrumb-area">
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(4.jpeg);">
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
                                    <input type="number" id="phonenumber" name="phonenumber" class="form-control" min="0" required>
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
                            <h5 class="title--">Your Order</h5>
                            <div class="products">
                                <div class="products-data">
                                    <h5>Products:</h5>
                                    <div class="single-products d-flex justify-content-between align-items-center">
                                        <p>Recuerdos Plant</p>
                                        <h5>₹<?php echo number_format($total_price); ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="order-total d-flex justify-content-between align-items-center">
                                <h5>Order Total</h5>
                                <h5>₹<?php echo number_format($total_price); ?></h5>
                            </div>

                            <div class="checkout-btn mt-30">
                                <button type="button" onclick="validateAndPay()" class="btn alazea-btn w-100">
                                    Pay with <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Razorpay_logo.svg/2560px-Razorpay_logo.svg.png" alt="Razorpay" width="80">
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
        function validateAndPay() {
            var firstName = $("#firstname").val().trim();
            var lastName = $("#lastname").val().trim();
            var email = $("#emailid").val().trim();
            var phone = $("#phonenumber").val().trim();
            var address = $("#address").val().trim();
            var city = $("#city").val().trim();
            var state = $("#state").val().trim();
            var zip = $("#zip").val().trim();

            if (!firstName || !lastName || !email || !phone || !address || !city || !state || !zip) {
                alert("Please fill in all required fields before proceeding.");
                return;
            }

            var options = {
                "key": "rzp_test_AbTtgZTb0mnpc2",
                "amount": <?php echo $total_price * 100; ?>,
                "currency": "INR",
                "name": "Green Life",
                "description": "Order Payment",
                "image": "F.png",
                "handler": function (response) {
                    $.ajax({
                        url: "checkout.php",
                        type: "POST",
                        data: {
                            payment_id: response.razorpay_payment_id,
                            firstname: firstName,
                            lastname: lastName,
                            emailid: email,
                            phonenumber: phone,
                            address: address,
                            city: city,
                            state: state,
                            zip: zip,
                            
                        },
                        success: function (res) {
                            if (res.trim() === "success") {
                                window.location.href = "thankyou.php?payment_id=" + response.razorpay_payment_id;
                            } else {
                                alert("Error processing payment: " + res);
                            }
                        }
                    });
                },
                "prefill": {
                    "name": firstName + " " + lastName,
                    "email": email,
                    "contact": phone
                },
                "theme": { "color": "#28a745" }
            };

            var rzp1 = new Razorpay(options);
            rzp1.open();
        }
    </script>
   
</body>
</html>
