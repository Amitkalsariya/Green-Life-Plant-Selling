<?php
error_reporting(0);
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Green Life - Register</title>
    
    <!-- Favicon -->
    <link rel="icon" href="F.png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: rgb(103, 143, 103);
        }

        .card {
            border-radius: 1rem;
        }

        .form-container {
            padding: 40px;
        }

        .form-container h5 {
            margin-bottom: 20px;
        }

        .btn-success {
            width: 100%;
            padding: 10px;
        }

        .img-container img {
            border-radius: 1rem 0 0 1rem;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

        @media (max-width: 768px) {
            .img-container {
                display: none;
            }
        }
    </style>
</head>

<body>

<section class="vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card shadow-lg">
                    <div class="row g-0">
                        <!-- Left Image Section -->
                        <div class="col-md-6 img-container d-none d-md-block">
                            <img src="./pot.jpg" alt="Green Life">
                        </div>

                        <!-- Right Form Section -->
                        <div class="col-md-6">
                            <div class="card-body text-black form-container">
                                <div class="text-center">
                                    <img src="./F.png" width="70" height="70" alt="Logo">
                                    <h2 class="fw-bold mt-2">Green Life</h2>
                                    <h5>Register into your account</h5>
                                </div>

                                <!-- Registration Form -->
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <input type="file" name="image_name" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                                    </div>

                                    <div class="mb-3">
                                        <input type="text" name="contact" class="form-control" placeholder="Contact Number" maxlength="10" pattern="[6-9][0-9]{9}" required>
                                    </div>

                                    <div class="mb-3">
                                        <input type="email" name="email" class="form-control" placeholder="Email" pattern="[A-Za-z0-9._%+-]+@gmail\.com$" required>
                                    </div>

                                    <div class="mb-3">
                                        <select class="form-control" name="city" required>
                                            <option value="Surat">Surat</option>
                                            <option value="Bardoli">Bardoli</option>
                                            <option value="Vadodara">Vadodara</option>
                                            <option value="Ahmedabad">Ahmedabad</option>
                                            <option value="Navsari">Navsari</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <input type="text" name="address" class="form-control" placeholder="Address" required>
                                    </div>

                                    <div class="mb-3">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>

                                    <div class="mb-3">
                                        <input type="password" name="conpassword" class="form-control" placeholder="Confirm Password" required>
                                    </div>

                                    <button type="submit" name="submit" class="btn btn-success">Sign Up</button>
                                </form>

                                <div class="text-center mt-3">
                                    <p>Already have an account? <a href="./Login.php">Login here</a></p>
                                </div>
                            </div> <!-- Card Body End -->
                        </div> <!-- Form Column End -->
                    </div> <!-- Row End -->
                </div> <!-- Card End -->
            </div> <!-- Col End -->
        </div> <!-- Row End -->
    </div> <!-- Container End -->
</section>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $password = $_POST['password'];
    $conpassword = $_POST['conpassword'];
    $image_name = $_FILES["image_name"]["name"];
    $tempname = $_FILES["image_name"]["tmp_name"];
    $folder = "images/user_images/" . $image_name;

    // Validate password match
    if ($password !== $conpassword) {
        echo "<script>alert('Passwords do not match!');</script>";
    } else {
        // Move uploaded file to folder
        move_uploaded_file($tempname, $folder);

        // Insert into database
        $sql = "INSERT INTO user(name, email, contact, address, city, password, image_name) 
                VALUES ('$name','$email','$contact','$address','$city','$password','$image_name')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>window.location.href='Home.php';</script>";
        } else {
            echo "<script>alert('Something went wrong!');</script>";
        }
    }
}
?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
