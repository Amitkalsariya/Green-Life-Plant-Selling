<?php
include_once 'header.php';

// Start session
// session_start();

// Get user ID
// $u_id = $_SESSION['R_id'];

// ✅ Fix: Delete all items when "Delete All" is clicked
if (isset($_GET['delete_all'])) {
    $qry_delete_all = "DELETE FROM cart WHERE u_id='$u_id'";
    mysqli_query($conn, $qry_delete_all);
    header('location:cart.php');
    exit(); // Stop execution after redirection
}

// ✅ Fix: Delete individual item when "Remove" is clicked
if (isset($_GET['c_id'])) {
    $qry_del = "DELETE FROM cart WHERE c_id=" . $_GET['c_id'];
    mysqli_query($conn, $qry_del);
    header('location:cart.php');
}

// Fetch cart items
$sql_query = "SELECT cart.* , user.* , product.* FROM cart 
              INNER JOIN user ON user.R_id = cart.u_id 
              JOIN product ON product.Prod_id = cart.p_id 
              WHERE status=0";
$data = mysqli_query($conn, $sql_query);
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
</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="img/core-img/leaf.png" alt="">
        </div>
    </div>

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(4.jpeg);">
            <h2>Shopping Cart</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Shopping Cart Area Start ##### -->
    <div class="container mb-5">    
       <section class="shopping-cart">
            <table class="table table-bordered text-center">
                <thead class="bg-success text-white">
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </thead>
                <tbody id="cart_data_disp">
                    <?php
                        $grand_total = 0; 
                        if (mysqli_num_rows($data) > 0) {
                            while ($fetch_cart = mysqli_fetch_assoc($data)) {
                    ?>
                    <tr>           
                        <td><?php echo $fetch_cart['Prod_name']; ?></td>
                        <td>₹<?php echo number_format($fetch_cart['Prod_price']); ?></td>
                        <td>
                            <input type="hidden" name="update_qty_id" value="<?php echo $fetch_cart['c_id']; ?>">
                            <input type="number" name="update_qty" min="1" value="<?php echo $fetch_cart['qty']; ?>" class="qty_product form-control w-50 mx-auto" product_id="<?php echo $fetch_cart['c_id']; ?>">
                        </td>
                        <td>₹<?php echo $sub_total = number_format($fetch_cart['Prod_price'] * $fetch_cart['qty']); ?></td>
                        <td><a href="cart.php?c_id=<?php echo $fetch_cart['c_id'];?>" class="btn btn-danger">Remove</a></td>   
                    </tr>
                    <?php
                        $grand_total += $fetch_cart['Prod_price'] * $fetch_cart['qty'];
                        }
                    }
                    ?>
                    <tr class="bg-light">
                        <td><a href="product.php" class="btn btn-secondary">Continue Shopping</a></td>
                        <td colspan="2" class="font-weight-bold">Grand Total</td>
                        <td class="font-weight-bold">₹<?php echo number_format($grand_total); ?></td>
                        <td><a href="cart.php?delete_all" onclick="return confirm ('Are you sure you want to delete all?');" class="btn btn-danger">Delete All</a></td>
                    </tr>
                </tbody>
            </table> 
      
            <!-- ✅ Show "Proceed to Checkout" only if cart is not empty -->
            <?php if ($grand_total > 0) { ?>
                <div class="col-12 col-lg-12 text-center">
                    <a href="checkout.php" class="btn btn-success w-50 py-2">PROCEED TO CHECKOUT</a>
                </div>
            <?php } else { ?>
                <div class="col-12 col-lg-12 text-center">
                    <p class="text-danger">Your cart is empty. Add items to proceed to checkout.</p>
                </div>
            <?php } ?>
        </section>
    </div>

    <?php include('footer.php');?>

    <!-- Scripts -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins/plugins.js"></script>
    <script src="js/active.js"></script>

    <script type="text/javascript">
        $(document).on('change', '.qty_product', function() {
            var qty = $(this).val();
            var product_id = $(this).attr('product_id');

            $.ajax({
                type: "get",
                url: "ajax_update_cart.php",
                data: {"qty": qty, "product_id": product_id},
                success: function(res) {
                    $('#cart_data_disp').html(res);
                }
            });
        });
    </script>
</body>
</html>
