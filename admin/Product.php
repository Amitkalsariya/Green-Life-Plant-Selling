<?php
	error_reporting(0);

?>

<?php

include 'header.php';

    if (isset($_GET['Prod_id'])) {
        $Prod_id = $_GET['Prod_id'];
        mysqli_query($conn, "delete from product where Prod_id = '$Prod_id'");
        

        header('location:Product.php');
       
    }   

  


// if ($_SERVER["REQUEST_METHOD"] == "POST") {

//     $productname = $_POST['name'];
//     $category = $_POST['prodcat'];
//     $description = $_POST['desc'];
//     $price = $_POST['price'];
//     $qty = $_POST['qty'];

//     if (empty($_POST["name"])) {
//         echo "Product name is required";
//     }

//     if (empty($_POST["desc"])) {
//         echo "Product description is required";
//     }

//     if (empty($_POST["price"])) {
//         echo "Product price is required";
//     } elseif (!is_numeric($price) && is_float($price)) {
//         echo "<p><span class='error'>Price should be numeric</span></p>";
//     }

//     if (empty($_POST["qty"])) {
//         echo "Product quantity is required";
//     }
// }



    if (isset($_POST['submit1']) && isset($_POST['prodcat'])) {

        $name = $_POST['name'];
        $category = $_POST['prodcat'];
        // $image = $_POST['file'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];

        $filename = rand(1000,9999).time().$_FILES["file"]["name"];
        $tempname = $_FILES["file"]["tmp_name"];
        $folder = "images/product_images/".$filename;

       $sql = "insert into product(Prod_name,Pc_id,Prod_image,Prod_description,Prod_price,prod_qt,Date,Time) values ('$name','$category','$filename','$desc','$price','$qty',curdate(),curtime())";

        move_uploaded_file($tempname, $folder);
        mysqli_query($conn, $sql);
        header('location:Product.php');

        // if (mysqli_query($conn, $sql)) {
        //     $select = "SELECT product.Pc_id , product_category.Pc_id from `product`,`product_category` WHERE product_category.Pc_id = '$category'";
        //     if (mysqli_query($conn, $select)) {
        //         echo "product added";
        //     }
        // } else {
        //     echo "error:" . mysqli_error($conn);
        // }
    }





?>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <h1><span style="color:green">Green </span> Life </h1>
                </div>
            </nav>


            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item " role="presentation">
                    <button class="nav-link active" id="prod-tab" data-bs-toggle="tab" data-bs-target="#prod" type="button" role="tab" aria-controls="prod" aria-selected="true">Product</button>
                </li>
                &nbsp;
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="prodform-tab" data-bs-toggle="tab" data-bs-target="#prodform" type="button" role="tab" aria-controls="detail" aria-selected="false">New Product Form</button>
                </li>
                &nbsp;
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail" type="button" role="tab" aria-controls="detail" aria-selected="false">Product Category</button>
                </li>
                &nbsp;        
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="addprod-tab" data-bs-toggle="tab" data-bs-target="#addprod" type="button" role="tab" aria-controls="addprod" aria-selected="false">Add New Product Category</button>
                </li>
                

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="prod" role="tabpanel" aria-labelledby="prod-tab">
                    <div class="row  mt-3">
                        <?php 

                        $qry_cat = mysqli_query($conn,"select * from product_category");

                        while($cat_res = mysqli_fetch_assoc($qry_cat)){  

                        ?>
                        

                        <div class="col-xl-4 col-md-6">
                            <div class="card mb-4" style="background-color:#074f0b">
                                <div class="card-body">
                                    <h3 style="color:#fff;"><?php echo $cat_res['Pc_name']; ?></h3>
                                    <?php
                                    $dash_tool_query = "SELECT * FROM product WHERE Prod_id=".$cat_res['Pc_id'];
                                    $dash_tool_query_run = mysqli_query($conn, $dash_tool_query);
                                    if ($Prod_idtotal = mysqli_num_rows($dash_tool_query_run)) {
                                        echo '<h4 class="mb-0" style="color:#fff;">' . $Prod_idtotal . '</h4>';
                                    } else {
                                        echo '<h4 class="mb-0" style="color:#fff;"> 0 Products </h4>';
                                    }
                                    ?>

                                </div>
                                <!-- <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-black stretched-link" href="tool.php?cat_id=<?php echo $cat_res['Pc_id']; ?>">View Details</a>
                                    <div class="small text-black"><i class="fa fa-angle-right"></i></div>
                                </div> -->
                            </div>
                        </div>
                        <?php } ?>


                        <!-- <div class="col-xl-4 col-md-6">
                            <div class="card mb-4" style="background-color:#074f0b">
                                <div class="card-body">
                                    <h3 style="color:#fff;">Plants</h3>
                                    <?php
                                    $dash_plant_query = "SELECT * FROM `product` WHERE Pc_id='2'";
                                    $dash_plant_query_run = mysqli_query($conn, $dash_plant_query);
                                    if ($Prod_idtotal = mysqli_num_rows($dash_plant_query_run)) {
                                        echo '<h4 class="mb-0" style="color:#fff;">' . $Prod_idtotal . '</h4>';
                                    } else {
                                        echo '<h4 class="mb-0" style="color:#fff;"> No data </h4>';
                                    }
                                    ?>

                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-black stretched-link" href="plant.php">View Details</a>
                                    <div class="small text-black"><i class="fa fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card mb-4" style="background-color:#074f0b">
                                <div class="card-body">
                                    <h3 style="color:#fff;">Pots</h3>
                                    <?php
                                    $dash_pot_query = "SELECT * from product WHERE Prod_id=3";
                                    $dash_pot_query_run = mysqli_query($conn, $dash_pot_query);
                                    if ($Prod_idtotal = mysqli_num_rows($dash_pot_query_run)) {
                                        echo '<h4 class="mb-0" style="color:#fff;">' . $Prod_idtotal . '</h4>';
                                    } else {
                                        echo '<h4 class="mb-0" style="color:#fff;"> No data </h4>';
                                    }
                                    ?>

                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-black stretched-link" href="pot.php">View Details</a>
                                    <div class="small text-black"><i class="fa fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card mb-4" style="background-color:#074f0b">
                                <div class="card-body">
                                    <h3 style="color:#fff;">Seeds</h3>
                                    <?php
                                    $dash_seed_query = "SELECT * from product WHERE Prod_id=4";
                                    $dash_seed_query_run = mysqli_query($conn, $dash_seed_query);
                                    if ($Prod_idtotal = mysqli_num_rows($dash_seed_query_run)) {
                                        echo '<h4 class="mb-0" style="color:#fff;">' . $Prod_idtotal . '</h4>';
                                    } else {
                                        echo '<h4 class="mb-0" style="color:#fff;"> No data </h4>';
                                    }
                                    ?>

                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-black stretched-link" href="seed.php">View Details</a>
                                    <div class="small text-black"><i class="fa fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <h3 style="text-align:center;">Total Product Detail</h3>
                   <div class="card mt-4">
                   <?php
include 'config.php'; // Database connection

// ✅ Handle Update Logic (when form is submitted)
if (isset($_POST['update_product'])) {
    $prod_id = $_POST['prod_id'];
    $prod_name = $_POST['prod_name'];
    $prod_desc = $_POST['prod_desc'];
    $prod_price = $_POST['prod_price'];
    $prod_qt = $_POST['prod_qt'];

    // ✅ Handle Image Upload
    if (!empty($_FILES['prod_image']['name'])) {
        $target_dir = "images/product_images/";
        $image_name = basename($_FILES["prod_image"]["name"]);
        $target_file = $target_dir . $image_name;

        // ✅ Move uploaded file to the folder
        if (move_uploaded_file($_FILES["prod_image"]["tmp_name"], $target_file)) {
            // ✅ Update query with image
            $update_query = "UPDATE `product` SET 
                                Prod_name='$prod_name', 
                                Prod_description='$prod_desc', 
                                Prod_price='$prod_price', 
                                prod_qt='$prod_qt',
                                Prod_image='$image_name'
                            WHERE Prod_id='$prod_id'";
        }
    } else {
        // ✅ Update query without changing the image
        $update_query = "UPDATE `product` SET 
                            Prod_name='$prod_name', 
                            Prod_description='$prod_desc', 
                            Prod_price='$prod_price', 
                            prod_qt='$prod_qt' 
                        WHERE Prod_id='$prod_id'";
    }

    if (mysqli_query($conn, $update_query)) {
        echo "<script>
        setTimeout(function() {
            alert('Product updated successfully!');
            window.location.href = 'Product.php';
        }, 500);
      </script>";
exit(); // Ensure script execution stops after this


    } else {
        echo "<script>alert('Error updating product.');</script>";
    }
}

// ✅ Handle Delete Logic
if (isset($_GET['Prod_id'])) {
    $prod_id = $_GET['Prod_id'];
    $delete_query = "DELETE FROM `product` WHERE Prod_id='$prod_id'";

    if (mysqli_query($conn, $delete_query)) {
        echo "<script>alert('Product deleted successfully!'); window.location.href='Product.php';</script>";
    } else {
        echo "<script>alert('Error deleting product.');</script>";
    }
}
?>
<div class="card mt-4">
    <div class="card-body">
        <table class="table table-borderless datatable" id="myTable">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `product`";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['Prod_id'] ?></td>
                        <td><?php echo $row['Prod_name'] ?></td>
                        <td>
                            <img src="images/product_images/<?php echo $row['Prod_image']; ?>" style="height:70px; width:80px; border-radius:5px;">
                        </td>
                        <td><?php echo $row['Prod_description'] ?></td>
                        <td><?php echo $row['Prod_price'] ?></td>
                        <td><?php echo $row['prod_qt'] ?></td>
                        <td><?php echo $row['Date'] ?></td>
                        <td><?php echo $row['Time'] ?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <!-- ✅ Edit Button -->
                                <button class="btn btn-warning btn-sm editBtn"
                                        data-id="<?php echo $row['Prod_id']; ?>"
                                        data-name="<?php echo $row['Prod_name']; ?>"
                                        data-desc="<?php echo $row['Prod_description']; ?>"
                                        data-price="<?php echo $row['Prod_price']; ?>"
                                        data-qt="<?php echo $row['prod_qt']; ?>"
                                        data-image="<?php echo $row['Prod_image']; ?>">
                                    <i class="fas fa-edit"></i> Edit
                                </button>

                                <!-- ✅ Delete Button -->
                                <a href="Product.php?Prod_id=<?php echo $row['Prod_id']; ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Are you sure you want to delete this product?');">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


<!-- ✅ Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                <button type="button" id="closeModalBtn" class="btn btn-secondary">Close</button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="edit_prod_id" name="prod_id">
                    
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" id="edit_prod_name" name="prod_name" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" id="edit_prod_desc" name="prod_desc" required></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" class="form-control" id="edit_prod_price" name="prod_price" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="edit_prod_qt" name="prod_qt" required>
                    </div>

                    <!-- ✅ Display Existing Image -->
                    <div class="mb-3">
                        <label class="form-label">Current Image</label>
                        <img id="edit_prod_img_preview" src="" class="img-fluid" style="max-height: 100px;">
                    </div>

                    <!-- ✅ Upload New Image -->
                    <div class="mb-3">
                        <label class="form-label">Change Image</label>
                        <input type="file" class="form-control" id="edit_prod_img" name="prod_image" accept="image/*">
                    </div>

                    <button type="submit" name="update_product" class="btn btn-primary">Update Product</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ✅ JavaScript to Handle Edit Modal & Image Preview -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var modalElement = document.getElementById("editModal");
        var editModal = new bootstrap.Modal(modalElement);

        // ✅ Handle Close Button Click
        document.getElementById("closeModalBtn").addEventListener("click", function () {
            editModal.hide();
        });

        // ✅ Handle Edit Button Click
        document.addEventListener("click", function (event) {
            if (event.target.classList.contains("editBtn")) {
                let button = event.target;
                
                // Populate form fields
                document.getElementById("edit_prod_id").value = button.dataset.id;
                document.getElementById("edit_prod_name").value = button.dataset.name;
                document.getElementById("edit_prod_desc").value = button.dataset.desc;
                document.getElementById("edit_prod_price").value = button.dataset.price;
                document.getElementById("edit_prod_qt").value = button.dataset.qt;

                // ✅ Load Existing Image
                document.getElementById("edit_prod_img_preview").src = "images/product_images/" + button.dataset.image;

                editModal.show();
            }
        });

        // ✅ Preview Selected Image
        document.getElementById("edit_prod_img").addEventListener("change", function (event) {
            var reader = new FileReader();
            reader.onload = function () {
                document.getElementById("edit_prod_img_preview").src = reader.result;
            };
            if (event.target.files.length > 0) {
                reader.readAsDataURL(event.target.files[0]);
            }
        });
    });
</script>


</div>

                </div>

                <div class="tab-pane fade" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                    <div class="row  mt-3">
                        <div class="col-xl-12 col-md-6">
                            <div class="card mb-4" style="background-color:#074f0b">
                                <div class="card-body">
                                    <h3 style="color:#fff;">View Product Category</h3>
                                    <?php
                                    $dash_user_query = "SELECT * from product_category";
                                    $dash_user_query_run = mysqli_query($conn, $dash_user_query);
                                    if ($Pc_idtotal = mysqli_num_rows($dash_user_query_run)) {
                                        echo '<h4 class="mb-0" style="color:#fff;">' . $Pc_idtotal . '</h4>';
                                    } else {
                                        echo '<h4 class="mb-0" style="color:#fff;"> No data </h4>';
                                    }
                                    ?>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                </div>
                            </div>
                            <h3 style="text-align:center;">Total Product Category Detail</h3>
                            <div class="card mt-4">
                                <div class="card-body">
                                    <table class="table table-borderless datatable" id="myTable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Category</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Edit</th>
                                                <th scope="col">Delete</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM `product_category`";
                                            $result = mysqli_query($conn, $sql);

                                            while ($row = mysqli_fetch_assoc($result)) {

                                                $id = $row['Pc_id'];

                                                echo "  <tr>
                                            <th scope='row'>" . $row['Pc_id'] . "</th>
                                            <td>" . $row['Pc_name'] . "</td>
                                            <td>" . $row['Pc_description'] . "</td>
                                            <td><a href='PEdit.php?Pc_id=" . $row['Pc_id'] . "'class='btn' style='background-color:#074f0b; color:#fff;'>Edit</button></td>
                                          <td><a href='deletep.php?Pc_id={$row['Pc_id']}' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this category?\")'>Delete</a></td>
                                            </tr>";
                                            }

                                            ?>
                                            <?php
                                            if (isset($_GET['Pc_id'])) {
                                                $Pc_id = $_GET['Pc_id'];

                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="addprod" role="tabpanel" aria-labelledby="addprod-tab">
                    <h3 style="text-align:center;">Add New Product Category Form</h3>
                    <div class="card mt-4">
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="row justify-content-center mt-3">
                                    <div class="col-xl-8">
                                        <div class="form-group row">
                                        </div>

                                        <div class="form-group row">
                                            <label class="form-label" for="customFile">Product Category Name:</label>
                                            <input name="cname" type="text" class="form-control" id="cname" placeholder="Enter Name Of Product Category" require />
                                        </div>

                                        <div class="form-group row">
                                            <label class="form-label" for="customFile">Product Category Description :</label>
                                            <textarea name="desc" class="form-control" id="desc" placeholder="Enter Product Category Description" require></textarea>
                                        </div>
                                        <div class="text-center">
                                            <button type="reset" class="btn btn-danger">Cancle</button>&nbsp;&nbsp;
                                            <button type="submit" name="submit" class="btn" style="background-color:#074f0b; color:#fff">Submit</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="prodform" role="tabpanel" aria-labelledby="prodform-tab">
                    <h3 style="text-align:center;">New Product Form</h3>
                    <div class="card mt-4">
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="row justify-content-center mt-3">
                                    <div class="col-xl-8">
                                        <div class="form-group row">
                                            <label class="form-label" for="customFile">Product Name:</label>
                                            <input name="name" type="text" class="form-control" id="name" placeholder="Enter product name" />
                                        </div>

                                        <div class="form-group row">
                                            <?php $cat_data=mysqli_query($conn,"select * from product_category"); ?>
                                            <label class="form-label" for="customFile">Select Product Category:</label>
                                            <select name="prodcat" type="select" class="form-control" id="select" required>
                                                <?php  while($res = mysqli_fetch_assoc($cat_data)){ ?>
                                                <option><?php echo $res['Pc_id']." ".$res['Pc_name']; ?></option>
                                                <?php $i++;} ?>
                                            </select>
                                        </div>

                                        <div class="form-group row">
                                            <label class="form-label" for="customFile">Product Image :</label>
                                            <input name="file" type="file" class="form-control" id="file" />
                                        </div>

                                        <div class="form-group row">
                                            <label class="form-label" for="customFile">Product Description:</label>
                                            <textarea name="desc" class="form-control" id="desc" placeholder="Enter Product Description"></textarea>
                                        </div>

                                        <div class="form-group row">
                                            <label class="form-label" for="customFile">Product Price :</label>
                                            <input name="price" type="text" class="form-control" id="price" placeholder="Enter Product Price" />
                                        </div>

                                        <div class="form-group row">
                                            <label class="form-label" for="customFile">Product Quantity :</label>
                                            <input name="qty" type="text" class="form-control" id="qty" placeholder="Enter Product Quantity" />
                                        </div>

                                        <div class="text-center">
                                            <button type="reset" class="btn btn-danger">Cancle</button>&nbsp;&nbsp;
                                            <button type="submit" name="submit1" class="btn" style="background-color:#074f0b; color:#fff">Submit</button>
                                        </div>
                                    </div>
                                </div>
                                
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            </div>



        </div>

    </div>


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
        let table = new DataTable('#myTable');
    </script>
    <script src="simple-datatables.js"></script>
    <script src="DataTables-1.13.4/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>


    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $cname = $_POST['cname'];
    $desc = $_POST['desc'];
    // Create a connection 

    $errors = array();
    $a = "SELECT * FROM product_category WHERE Pc_name='$cname'";
    $ab = mysqli_query($conn, $a);

    if (empty($cname)) {
        $errors['a'] = "abc";
    } else if (mysqli_num_rows($ab) > 0) {
        $errors['ab'] = "Record already exists.";
    }

    if (count($errors) == 0) {
        $query = "INSERT INTO product_category(Pc_name, Pc_description) VALUES ('$cname', '$desc')";
        $result = mysqli_query($conn, $query);
    }
    if ($result) {
        echo "";
    } else {
        echo "failed";
    }
}



?>