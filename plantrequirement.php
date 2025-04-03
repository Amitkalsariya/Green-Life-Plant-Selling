
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
        .btn{
            background-color:#074f0b; 
            color:#fff;
            
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
            gap:1.5rem;
        }

        .box{
            text-align: center;
            padding: 2px;
            background-color: white;
            height: 300px; 
            border-radius: 20px;
            border-color: white; 
            padding-top: 30px;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 25),
            0 10px 10px rgba(0, 0, 0, 22);
            transition: #f2f2f2;
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

        .plant-details
        {
            height: 650px;
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
                                <li class="breadcrumb-item"><a href="opinionsharing.php"> Opinion Sharing</a></li>
                                <li class="breadcrumb-item"><a href="viewdetails.php"> Flower Details</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Plant Requirements</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <div class="container"> 
        
        <section class="plant-details">
        <div class="box-container">
            <?php
                if (isset($_GET['plant_id'])) {
                    $plant_id = $_GET['plant_id'];
                
                    // Use prepared statements to prevent SQL injection
                    $stmt = mysqli_prepare($conn, "SELECT * FROM `plant_details` WHERE `Plant_id` = ?");
                    mysqli_stmt_bind_param($stmt, 'i', $plant_id);
                    
                    if (mysqli_stmt_execute($stmt)) {
                        $result = mysqli_stmt_get_result($stmt);
                
                        if (mysqli_num_rows($result) > 0) {
                            $plant_details = mysqli_fetch_assoc($result);
                            ?>

                            <div>
                                <img  class="box" name="img" src="images/<?php echo $plant_details['Plant_image']; ?>" alt="">   
                                <p class="plant-name"><strong><?php echo $plant_details['Plant_name']; ?></strong></p>
                                <div class="box-container" id="box-desc"><p>Description : <strong><?php echo $plant_details['description']; ?></strong></p></div>
                            </div>
                        </div>


                            <?php
                        } else {
                            echo "Plant not found.";
                        }
                    } else {
                        echo "Error executing query: " . mysqli_error($conn);
                    }
                
                    // Close the prepared statement
                    mysqli_stmt_close($stmt);
                } else {
                    echo "Invalid request.";
                }
                
                // Close the database connection
                mysqli_close($conn);
                
            ?>
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
	
