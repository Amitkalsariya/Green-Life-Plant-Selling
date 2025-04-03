<?php
include 'connection.php';
include 'common_function.php';
// session_start(); // Ensure session is started
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Green Life</title>

    <!-- Favicon -->
    <link rel="icon" href="F.png">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

    <style>
        .btn {
            background-color: #28a745; 
            color: white; 
            padding: 8px 15px; 
            border-radius: 5px; 
            text-decoration: none; 
            font-size: 14px; 
            transition: background 0.3s ease-in-out; 
            display: inline-block;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background: #218838;
        }
        .breadcrumb { background: none; padding: 10px 15px; }
        
        .heading {
            text-align: center;
            font-size: 2.5rem;
            text-transform: uppercase;
            color: var(--black);
            margin-bottom: 2rem;
        }

        .box-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .box {
            background: #ffffff; 
            width: 280px; 
            border-radius: 10px; 
            overflow: hidden; 
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1); 
            transition: transform 0.3s ease-in-out; 
            text-align: center; 
            padding-bottom: 15px;
        }
        .box:hover {
            transform: translateY(-5px); 
        }

        img {
            max-width: 100%; 
            height: 200px; 
            object-fit: cover; 
            border-radius: 10px 10px 0 0;
        }

        h3 {
            margin: 1rem 0;
            font-size: 20px;
            color: var(--black);
        }

        .price {
            font-size: 20px;
            color: var(--black);
        }
    </style>

</head>

<body>

    <!-- ##### Header Area Start ##### -->
    <?php include('header.php'); ?>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
            style="background-image: url(4.jpeg);">
            <h2>Product</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ✅ Product Search Results -->
    <div class="container">
        <section class="products">
            <div class="box-container">
                <?php search_product(); ?>
            </div>
        </section>
    </div>

    <!-- ✅ Include Add to Cart Logic from common_function.php -->
  

    <!-- ##### All Javascript Files ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins/plugins.js"></script>
    <script src="js/active.js"></script>
</body>

</html>
