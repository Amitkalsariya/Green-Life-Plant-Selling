<!-- <?php
	error_reporting(0);
	include 'dbconn.php';

	if(isset($_SESSION['user_id']))
	{
		header('location:gdashboard.php');
	}

	if (isset($_POST['login'])) {
		$email = $_POST['emaila'];
		$password = $_POST['passa'];

		
		$sel_data = mysqli_query($conn,"select * from admin where email = '$email' and password='$password'");

		$cnt = mysqli_num_rows($sel_data);

		// echo $cnt;die();
		if($cnt>0)
		{
			$res = mysqli_fetch_assoc($sel_data);
			$_SESSION['user_id'] = $res['id'];
			header('location:gdashboard.php');
		}

	}
?>

<!doctype html>
<html lang="en">

<head>

	<title>Green Life</title>
	<link rel="icon" href="F.png">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/stylea.css">

</head>

<body class="img js-fullheight" style="background-image: url(images/22.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
						<h3 class="mb-4 text-center">Login in to Your Account</h3>
						<form class="signin-form" method="POST">
							<div class="form-group">
								<input type="text" name="emaila" class="form-control" placeholder="Email address" value='<?php echo isset($_COOKIE['aemail']) ? $_COOKIE['aemail'] : ''; ?>' required>
							</div>
							<div class="form-group">
								<input id="password-field" name="passa" type="password" class="form-control" placeholder="Password" value='<?php echo isset($_COOKIE['apass']) ? $_COOKIE['apass'] : ''; ?>' required>
								<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
							</div>
							<div class="form-group">
								<button type="submit" name="login" class="form-control btn submit px-3" style='background-color:#074f0b; color:#fff;'>Sign In</button>
							</div>
							<div class="form-group d-md-flex">
								<div class="w-50">
									<label class="checkbox-wrap checkbox" style='color:#074f0b;' name="remember">Remember Me
										<input type="checkbox" style='color:#074f0b;'>
										<span class="checkmark" style="color:#074f0b;"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style='color:#074f0b;'>Forgot Password ?</a>
								</div>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.mina.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.mina.js"></script>
	<script src="js/maina.js"></script>

</body>

</html> -->
<?php
error_reporting(0);
session_start();
include 'dbconn.php';

if (isset($_SESSION['user_id'])) {
    header('location:gdashboard.php');
}

if (isset($_POST['login'])) {
    $email = $_POST['emailu'];
    $password = $_POST['passwordu'];

    $sel_data = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$email' AND password='$password'");
    $cnt = mysqli_num_rows($sel_data);

    if ($cnt > 0) {
        $res = mysqli_fetch_assoc($sel_data);
        $_SESSION['user_id'] = $res['id'];
        header('location:gdashboard.php');
    } else {
        echo "<script> alert('Invalid Email or Password'); window.location.href='Login.php'; </script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Favicon -->
    <link rel="icon" href="F.png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    
    <title>Green Life</title>
    <style>
        .full {
            height: 678px;
            width: 420px;
        }
        .pd{
            padding-top: 100px;
        }
    </style>
</head>

<body style="background-color: rgb(103, 143, 103);">

    <section class="vh-96">
        <div class="container pd h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-7 col-lg-5 d-none d-md-block">
                                <img class="full" src="./pot.jpg" alt="login form" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form method="POST">
									<div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0"><img style="width:50px;height:50px;" src="./F.png">&nbsp;Green
                        Life</span>
                    </div>


                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Login into your Admin account</h5>

                                        <div class="form-outline mb-4">
                                            <input type="email" name="emailu" placeholder="Example@gmail.com" value='<?php echo isset($_COOKIE['uemail']) ? $_COOKIE['uemail'] : ''; ?>' class="form-control form-control-lg" required>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" name="passwordu" placeholder="********" value='<?php echo isset($_COOKIE['upass']) ? $_COOKIE['upass'] : ''; ?>' class="form-control form-control-lg" required>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="checkbox" name="remember" checked /> Remember Me
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="col-12 btn btn-success btn-lg btn-block" name="login" type="submit">Login</button>
                                        </div>


                                    </form>
                                </div>
                            </div> <!-- End of col-md-6 -->
                        </div> <!-- End of row g-0 -->
                    </div> <!-- End of card -->
                </div> <!-- End of col-xl-10 -->
            </div> <!-- End of row -->
        </div> <!-- End of container -->
    </section>

</body>
</html>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
