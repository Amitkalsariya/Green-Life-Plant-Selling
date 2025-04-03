<?php
include 'connection.php';
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

     <!-- Title -->
     <title>Green Life</title>

<!-- Favicon -->
<link rel="icon" href="F.png">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <style>
         .btn{
            background-color:#074f0b; 
            color:#fff;
            width:50%;
            text-align:center;
            font-size:20px;
            padding:1px 1px;
            border-radius:2px;
            cursor:pointer;
            margin-top:1rem;
        }
        
        .favi{
            height: 50px;
        }

        .heading{
            text-align:center;
            font-size:2.5rem;
            text-transform:uppercase;
            color:var(--black);
            margin-bottom: 2rem;
        }

        .box-container{
            display:grid;
            grid-template-columns:repeat(auto-fit,16rem);
            gap: 5.5rem;
        }

        .box{
            text-align:center;
            padding:2px;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 25),0 10px 10px rgba(0, 0, 0, 22);
            border-color: white;
            border-radius: 20px;
            padding-top: 30px;
            opacity: 0.9;
            background-color: white; 
            transition: #f2f2f2;
        }

        img{
            height:10rem;
        }

        h3{
            margin:1rem 0;
            font-size:20px;
            color:var(--black);
        }

        .price{
            font-size:20px;
            color:var(--black);
        }

    </style>

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="img/core-img/leaf.png" alt="" class="favi">
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <?php include('header.php');?>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(4.jpeg);">
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

    <!-- ##### Shop Area Start ##### -->
    <div class="container c">    
        <section class="products">
                    
                    <div class="box-container mb-5" >
                    <?php
                        $select_products = mysqli_query($conn,"SELECT * FROM `product` WHERE Pc_id=1");
                        if(mysqli_num_rows($select_products) > 0){
                            while($fetch_product = mysqli_fetch_assoc($select_products)){     
                    ?>
                    <form action="" method="POST">
                        <div class="box">
                        <img src="images/<?php echo $fetch_product['Prod_image']; ?>" alt="">
                        <h3><?php echo $fetch_product['Prod_name']; ?></h3>
                        <div class="price"><?php echo $fetch_product['Prod_price']; ?>/-</div>
                       <input type="submit" class="btn mb-2" value="Add to cart" name="add_to_cart">
                        </div>

                        
                    </form>
                    <?php
                            };
                        };
                    ?>
                    <!-- <div class="col-12 text-center">
                        <a href="#" class="btn alazea-btn">More</a>
                    </div> -->
                </div>
        </section>
    </div>
    <?php include('footer.php');?>

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
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