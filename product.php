<?php
include 'connection.php';
// session_start();

// Handle "Add to Cart" request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    if (!isset($_SESSION['R_id'])) {
        header('location:login.php');
        exit();
    }

    $user_id = $_SESSION['R_id'];
    $p_id = $_POST['p_id'];
    $p_price = $_POST['prod_price'];

    // ✅ Check if the product is already in the cart
    $check_cart = mysqli_query($conn, "SELECT * FROM cart WHERE u_id='$user_id' AND p_id='$p_id' AND status=0");

    if (mysqli_num_rows($check_cart) > 0) {
        // ✅ Product already exists, increase quantity
        $update_cart = "UPDATE cart SET qty = qty + 1 WHERE u_id='$user_id' AND p_id='$p_id' AND status=0";
        mysqli_query($conn, $update_cart);
    } else {
        // ✅ Add new product to cart
        $insert_cart = "INSERT INTO cart (p_price, u_id, p_id, qty) VALUES ('$p_price', '$user_id', '$p_id', 1)";
        mysqli_query($conn, $insert_cart);
    }

    header('location:product.php');
    exit();
}

// Fetch products
if (isset($_GET['cat'])) {
    $cat_nm = $_GET['cat'];
    $cat_sel = mysqli_query($conn, "SELECT * FROM `product_category` WHERE `Pc_name`='$cat_nm'");
    $cat_res = mysqli_fetch_assoc($cat_sel);
    $select_products = mysqli_query($conn, "SELECT * FROM `product` WHERE `Pc_id`=" . $cat_res['Pc_id']);
} else {
    $select_products = mysqli_query($conn, "SELECT * FROM `product`");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Life - Products</title>

    <!-- Favicon -->
    <link rel="icon" href="F.png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            overflow-x: hidden;
            background-color: #f8f9fa;
            font-family: "Dosis", sans-serif;
        }
        .top-breadcrumb-area {
            background-size: cover;
            background-position: center;
            width: 100%;
            padding: 50px 0;
            text-align: center;
        }
        .breadcrumb {
            background: none;
            padding: 10px 15px;
        }
        .product-section {
            padding: 50px 0;
        }
        .product-card {
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            text-align: center;
            padding-bottom: 15px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .product-card:hover {
            transform: translateY(-5px);
        }
        .product-card img {
            max-width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }
        .product-title {
            font-size: 18px;
            font-weight: bold;
            margin: 15px 0 5px;
            color: #333;
        }
        .product-price {
            font-size: 16px;
            font-weight: bold;
            color: #28a745;
            margin-bottom: 10px;
        }
        .add-to-cart-btn {
            background-color: #28a745;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            transition: background 0.3s ease-in-out;
            display: inline-block;
            border: none;
        }
        .add-to-cart-btn:hover {
            background: #218838;
        }
        .no-products {
            font-size: 18px;
            color: #777;
            margin-top: 40px;
        }
    </style>
</head>

<body>

<?php include('header.php'); ?>

<!-- Breadcrumb -->
<div class="breadcrumb-area">
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(4.jpeg);">
        <h2>Products</h2>
    </div>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="Home.php"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Product Section -->
<div class="container product-section">
    <div class="row">
        <div class="col-12 text-center">
            <h2 class="mb-4">Our Latest Products</h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <?php
        if (mysqli_num_rows($select_products) > 0) {
            while ($fetch_product = mysqli_fetch_assoc($select_products)) {
        ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 d-flex align-items-stretch">
                <div class="product-card w-100">
                    <img src="admin/images/product_images/<?php echo $fetch_product['Prod_image']; ?>" alt="<?php echo $fetch_product['Prod_name']; ?>">
                    <p class="product-title"><?php echo $fetch_product['Prod_name']; ?></p>
                    <p class="product-price">₹<?php echo number_format($fetch_product['Prod_price'], 2); ?></p>
                    <form method="POST" action="">
                        <input type="hidden" name="p_id" value="<?php echo $fetch_product['Prod_id']; ?>">
                        <input type="hidden" name="prod_price" value="<?php echo $fetch_product['Prod_price']; ?>">
                        <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
                    </form>
                </div>
            </div>
        <?php
            }
        } else {
            echo '<div class="col-12 text-center"><p class="no-products">No products available at the moment.</p></div>';
        }
        ?>
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
