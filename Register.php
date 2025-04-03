<?php
//session_start();
error_reporting(0);
include('connection.php');

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
                <img class="w-100 h-100 object-fit-cover" src="./pot.jpg" alt="login form" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 py-4">
                <div class="card-body text-black">

                  <!-- Registration form start -->
                  <form  method="POST" class="row g-3" enctype="multipart/form-data">

                    <div class="d-flex align-items-center">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0"><img style="width:70px;height:70px;" src="./F.png">&nbsp;Green Life</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register into your account</h5>

                    <div class="col-12">
                      <input type="file" id="image_name" name="image_name" class="form-control" placeholder="Image" aria-label="image" required>
                    </div>
                    <div class="col-12">
                      <input type="text" id="name" name="name" class="form-control" placeholder="Name" aria-label="name" required><span id="name" pattern="[a-zA-Z][a-zA-Z ]{2,}" class="text-danger font-weight-bold"></span>
                      
                    </div>
                    <div class="col-12">
                      <input type="text" id="contact" name="contact" class="form-control" placeholder="Contact_Number" aria-label="Number" maxlength="10" pattern="[6-9][0-9]{9}" required title="First number 6-9 and only 10 numbers" onkeypress='return (event.charCode >= 48 && event.charCode <= 57)' placeholder="9876543210" size="33"><span id="Phone" class="text-danger font-weight-bold"></span>
                        
                    </div>
                      <div class="col">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" aria-label="Mail" required title="Email should be valid email address." pattern="[A-Za-z0-9._%+-]+@gmail\.com$" size="33"><span id="emailadd" class="text-danger font-weight-bold"></span>
                        
                      </div>
                        <div class="col-12">
                          <select class="form-control" aria-label="city" name="city" id="city">
                            <option>Surat</option>
                            <option>Bardoli</option>
                            <option>Vadodara</option>
                            <option>Ahemdabad</option>
                            <option>Navsari</option>
                          </select> <span id="city" class="text-danger font-weight-bold"></span>
                         
                        </div>
                        <div class="col-12">
                          <input type="text" id="address" name="address" class="form-control" placeholder="Address" aria-label="Address" required><span id="add" class="text-danger font-weight-bold"></span>
                        </div>
                      <div class="col-12">
                        <input type="Password" id="password" name="password" class="form-control" placeholder="Password" aria-label="Password" maxlength="20" required id="password" title="Password length must be al-least 8 character, and it must have at-least one
                               number and one special symbol." size="33"><span id="pass" class="text-danger font-weight-bold" Required></span>
                      </div>
                      <div class="col-12">
                        <input type="Password" id="conpassword" name="conpassword" class="form-control" placeholder="Confirm Password" aria-label="conPassword" required>
                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                      </div>

                    <div class="pt-1">
                      <button class=" col-12 btn btn-success btn-lg btn-block" name="submit" type="submit" >Sign
                        up</button>
                    </div>

                    <div class="center">
                      <p class="mb-5 pb-2 text-dark">Do you have an account? <a href="./Login.php">Login here</a></p>
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
  <?php
  if(isset($_POST['submit']))
  {
    
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $_SESSION['user_email'] = $email;
    $contact = $_REQUEST['contact'];
    $address = $_REQUEST['address'];
    $city = $_REQUEST['city'];
    $password = $_REQUEST['password'];
    $image_name = $_FILES["image_name"]["name"];
    $tempname = $_FILES["image_name"]["tmp_name"]; 
    $folder = "images/user_images/".$image_name;   

      $sql = "INSERT INTO user(`name`,`email`,`contact`,`address`,`city`,`password`,`image_name`) 
      VALUES ('$name','$email','$contact','$address','$city','$password','$image_name') ";
      $result = mysqli_query($conn,$sql);

      if($result)
      {
        echo "<script> window.location.href='Home.php'</script>";

      }else{
        echo "<script> alert('Somthing Went Wrong!')";
      }
      

  }
  ?>
</body>
</html>
