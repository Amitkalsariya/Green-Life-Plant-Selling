<?php 
include("connection.php");
// session_start();

if(isset($_SESSION['R_id'])) {
    header('location:Home.php');
}

if(isset($_POST["submit"])) {
    $email = $_POST['emailu'];
    $pass = $_POST['passwordu'];

    $qry_login = "SELECT * FROM user WHERE email='$email' AND password='$pass'"; 
    $sql_login = mysqli_query($conn, $qry_login);
    $data = mysqli_fetch_assoc($sql_login);

    if(mysqli_num_rows($sql_login) == 1) {
        $_SESSION['R_id'] = $data['R_id']; 
        header('location:Home.php');
    } else {
        echo "<script> alert('Invalid Email & Password'); window.location.href='Login.php'; </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Green Life - Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgb(103, 143, 103);
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            border-radius: 1rem;
            max-width: 900px;
            width: 100%;
        }

        .login-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 1rem 0 0 1rem;
        }

        .login-form {
            padding: 40px;
        }

        @media (max-width: 768px) {
            .login-container {
                height: auto;
                padding: 20px;
            }
            
            .card {
                flex-direction: column;
            }

            .login-img {
                border-radius: 1rem 1rem 0 0;
            }

            .login-form {
                padding: 30px;
            }
        }
    </style>
</head>

<body>

    <div class="container login-container">
        <div class="card shadow-lg">
            <div class="row g-0">
                <!-- Image Section -->
                <div class="col-md-6 d-none d-md-block">
                    <img src="pot.jpg" alt="Login Image" class="login-img">
                </div>

                <!-- Form Section -->
                <div class="col-md-6 d-flex align-items-center">
                    <div class="card-body login-form">
                        <div class="text-center mb-4">
                            <img src="1.jpg" width="50" height="50" alt="Logo">
                            <h3 class="mt-2">Green Life</h3>
                        </div>

                        <h5 class="text-center mb-4">Login into your account</h5>

                        <form method="post">
                            <div class="mb-3">
                                <input type="email" name="emailu" class="form-control" placeholder="Example@gmail.com" required>
                            </div>

                            <div class="mb-3">
                                <input type="password" name="passwordu" class="form-control" placeholder="********" required>
                            </div>

                            <div class="mb-3">
                                <input type="checkbox" name="remember" checked> Remember Me
                            </div>

                            <button type="submit" name="submit" class="btn btn-success w-100">Login</button>

                            <p class="text-center mt-3">
                                Don't have an account? <a href="Register.php">Register here</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
