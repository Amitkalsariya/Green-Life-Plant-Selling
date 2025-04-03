<?php
include 'connection.php';
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
            gap:1.5rem;
        }

        .box{
            text-align:center;
            padding:2px;
            box-shadow:var(--box-shadow);
            background-color: lightgreen;
            height: 300px; 
            border-radius: 20px;
            border-color: lightgreen; 
            padding-top: 30px;
        }

        img{
            height:10rem;
        }

        h3{
            margin:1rem 0;
            font-size:20px;
            color:var(--black);
            text-align: center;
        }

        .price{
            font-size:20px;
            color:var(--black);
        }

    </style>

</head>

<body>
    

    <!-- ##### Header Area Start ##### -->
    <?php include('header.php');?>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(4.jpeg);">
            <h2>Opinion Sharing</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="Home.php"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Opinion Sharing</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Shop Area Start ##### -->

    
    <div class="container"> 
       
        <section class="plant-details">
                    <div class="box-container">

                    <?php 
                        $select_plant = mysqli_query($conn,"SELECT * FROM `plant_details`");
                        if(mysqli_num_rows($select_plant) > 0){
                            while($fetch_plant = mysqli_fetch_assoc($select_plant)){     
                    ?>

                    <form action="" method="POST">                    
                        <div class="box">
                        <a href="rose.php"><img src="images/<?php echo $fetch_plant['Plant_image']; ?>" alt=""></a>
                        <h3 style="color: #074f0b"><?php echo $fetch_plant['Plant_name']; ?></h3>
                        <h3 style="color: black"><?php echo "Plant ".$fetch_plant['Plant_id'];?></h3>
                        <input type="hidden" name="plantname" value="<?php echo $fetch_plant['Plant_name']; ?>">
                        <input type="hidden" name="plantimage" value="<?php echo $fetch_plant['Plant_image']; ?>">
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
	
