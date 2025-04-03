<?php
session_start();
$email = $_SESSION['user_email'];

$servername = "localhost";
$username = "root";
$passwordDB = "";

$database = "glife";
// Create a connection 
$conn = mysqli_connect($servername, $username, $passwordDB, $database);

if(isset($_POST["verify"])){
    $email1 = $_POST['email'];
    $vcode = $_POST['vcode'];
    $sql = "UPDATE user SET email_verified_at = NOW() WHERE email = '" . $email1 . "' AND verification_code = '" . $vcode . "'";
    echo $sql;
    $result = mysqli_query($conn,$sql);
    if(mysqli_affected_rows($conn) == 0){
      echo "Verification code is invalid";
    }else{
        echo " <script> window.location.href='Home.php'</script> ";
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <title>Green Life</title>
<style>
    .for {
      margin-left: 200px;
      margin-top: 500px;
    }

    .center {
      margin-left: 100px;
    }

    .full {
      height: 900px;
      width: 480px;
    }
  </style>
  <script src="js/script1.js">
  </script>
</head>

<body>

  <section class="vh-96" style="background-color:rgb(103, 143, 103);">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img class="full" src="./pot.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <!-- Registration form start -->
                  <form name="verification" onsubmit="return validateForm()" action="" method="POST" enctype="multipart/form-data">

                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0"><img style="width:70px;height:70px;" src="./F.png">&nbsp;Green
                        Life</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Verify your account</h5>

                    <div class="col-12">
                      <input type="hidden" id="email" name="email" class="form-control" value="<?php echo $email; ?>" aria-label="email" required>
                    </div>

                    <div class="col-12">
                      <input type="text" id="vcode" name="vcode" class="form-control" placeholder="Verification code" aria-label="vcode" required>
                    </div>
                    <br>

                    <div class="pt-1 mb-4">
                      <button class=" col-12 btn btn-success btn-lg btn-block" name="verify" type="submit">Verify</button>
                    </div>

                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>




</body>

</html>
