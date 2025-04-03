<!-- <?php
include 'connection.php';

$R_id= $_SESSION['R_id'];

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $image = $_FILES['image']['name'];
   
    $folder = "/images/user_images".$image;
    move_uploaded_file($_FILES['image']['tmp_name'],$folder);

    $query = "UPDATE user SET name = '$name' , email = '$email', contact = '$contact', city = '$city', address = '$address' ,image_name = '$image' WHERE R_id = '$R_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo "success full update";
        echo " <script> window.location.href='profile.php'</script> ";
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

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #ffff;
            color: #69707a;
        }

        .container {
            max-width: 800px;
            width: 100%;
        }

        .card {
            width: 100%;
            background-color: #38723B;
            color: #ffff;
            font-size: 18px;
            box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
        }

        .card .card-header {
            font-weight: 500;
            background-color: #064709;
            border-bottom: 1px solid rgba(33, 40, 50, 0.125);
            color: #ffff;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: 0.875rem 1.125rem;
            padding: 3px;
            font-size: 1rem;
            font-weight: 400;
            color: #69707a;
            background-color: #ffff;
            border: 1px solid #c5ccd6;
            border-radius: 0.35rem;
        }

        .btn {
            background-color: #064709;
            color: #ffff;
        }

        .img-account-profile {
            height: 15rem;
    border-radius: 51%;
    width: 33%;
        }
    </style>

</head>

<body>

    <div class="container">
        <div class="card mb-4">
            <div class="card-header">Account Details</div>
            <div class="card-body">
                <?php
                $conn = mysqli_connect("localhost", "root", "", "glife");
                $sql = "SELECT * FROM user WHERE R_id = '$R_id'";
                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_assoc($result);
                ?>  

                <form method="POST" enctype="multipart/form-data">
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Profile Picture</div>
                        <div class="card-body text-center">
    <img class="img-account-profile mb-2" src="<?php echo "admin/images/product_images/".$user['image_name'] ?>" alt="">
    <br>
    <input type="file" name="image" id="file" class="form-control mt-2">
    <small class="text-danger d-block mt-2"><strong>When Account Details are in Edit mode, an image is required. If not uploaded, it will not be displayed.</strong></small>
</div>
                    </div>

                    <input type="hidden" name="R_id" value="<?php echo $R_id; ?>">

                    <div class="mb-3">
                        <label class="small mb-1" for="name">Username</label>
                        <input class="form-control" id="name" name="name" type="text" value="<?php echo $user['name']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="small mb-1" for="email">Email address</label>
                        <input class="form-control" id="email" name="email" type="email" value="<?php echo $user['email']; ?>">
                    </div>

                    <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1" for="address">Address</label>
                            <input class="form-control" id="address" name="address" type="text" value="<?php echo $user['address']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1" for="city">City</label>
                            <input class="form-control" id="city" name="city" type="text" value="<?php echo $user['city']; ?>">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="small mb-1" for="contact">Phone Number</label>
                        <input class="form-control" id="contact" name="contact" type="text" value="<?php echo $user['contact']; ?>">
                    </div>

                    <button class="btn" name="update" type="submit">Save changes</button>
                </form>
            </div>
        </div>
    </div> -->

    <!-- ##### All Javascript Files ##### -->
    <!-- <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins/plugins.js"></script>
    <script src="js/active.js"></script>

</body>
</html> -->


<?php
// Start session safely
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'connection.php';

// Ensure user is logged in
if (!isset($_SESSION['R_id'])) {
    echo "User not logged in.";
    exit();
}

$R_id = $_SESSION['R_id'];

if (isset($_POST['update'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    
    // Handle image upload
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $upload_dir = "images/user_images/";
        $image_path = $upload_dir . basename($image);

        // Move uploaded file
        if (move_uploaded_file($image_tmp, $image_path)) {
            $update_image_query = ", image_name = '$image'";
        } else {
            echo "<script>alert('Image upload failed!');</script>";
            $update_image_query = "";
        }
    } else {
        $update_image_query = "";
    }

    // Update user details in the database
    $query = "UPDATE user SET 
        name = '$name',
        email = '$email',
        contact = '$contact',
        city = '$city',
        address = '$address'
        $update_image_query
        WHERE R_id = '$R_id'";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Profile updated successfully!'); window.location.href='profile.php';</script>";
    } else {
        echo "<script>alert('Update failed!');</script>";
    }
}

// Retrieve user details
$sql = "SELECT * FROM user WHERE R_id = '$R_id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Update Profile | Green Life</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            max-width: 800px;
            width: 100%;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0.15rem 1.75rem rgba(33, 40, 50, 0.15);
            border-radius: 10px;
        }

        .card-header {
            font-weight: 600;
            background-color: #064709;
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn {
            background-color: #064709;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
        }

        .img-account-profile {
            height: 150px;
            width: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }
        input[type="file"] {
    width: 100%;
    padding: 0px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background: #fff;
}

input[type="file"]::-webkit-file-upload-button {
    background: #064709;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
}

input[type="file"]::-webkit-file-upload-button:hover {
    background: #043a06;
}

    </style>
</head>

<body>

    <div class="container">
        <div class="card-header">Update Profile</div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="text-center">
                    <img class="img-account-profile" src="<?php echo !empty($user['image_name']) ? 'images/user_images/' . $user['image_name'] : 'default-profile.png'; ?>" alt="Profile Picture">
                    <input type="file" name="image" class="form-control">
                    <small class="text-danger"><strong>A new profile picture must be uploaded before saving updates.</strong></small>
                </div>

                <input type="hidden" name="R_id" value="<?php echo $R_id; ?>">

                <label>Username</label>
                <input class="form-control" name="name" type="text" value="<?php echo $user['name']; ?>" required>

                <label>Email Address</label>
                <input class="form-control" name="email" type="email" value="<?php echo $user['email']; ?>" required>

                <label>Contact Number</label>
                <input class="form-control" name="contact" type="text" value="<?php echo $user['contact']; ?>" required>

                <label>Address</label>
                <input class="form-control" name="address" type="text" value="<?php echo $user['address']; ?>" required>

                <label>City</label>
                <input class="form-control" name="city" type="text" value="<?php echo $user['city']; ?>" required>

                <button class="btn" name="update" type="submit">Save Changes</button>
            </form>
        </div>
    </div>

</body>

</html>

