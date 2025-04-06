
<?php include 'dbconn.php'; 

if(!isset($_SESSION['user_id']))
  {
    header('location:index.php');
  }


?>
<!doctype html>
<html lang="en">

<!-- connection with database -->

<!-- conn end -->

<head>

  <title>Green Life</title>
  <!-- Favicon -->
  <link rel="icon" href="F.png">

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link href="css/styled.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar" style="background-color:#043b07;">
      <div class="p-4 pt-5">

        <!-- menubar -->
        <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(pot.jpg);"></a>
        <ul class="list-unstyled components mb-5">
          <li>
            <i class="bi bi-house"></i>
            <a href="gdashboard.php">Home</a>
          </li>
          <li>
            <a href="users.php">User</a>
          </li>
          <li>
          <a href="Portfolio.php">Portfolio</a>
          </li>
          <li>
            <a href="Product.php">Product</a>
          </li>
          <li>
            <a href="post.php">Post</a>
          </li>
          <li>
            <a href="selling_report.php">Selling Report</a>
          </li>
          <li>
            <a href="Faqs.php">FAQs</a>
          </li>
          <!-- <li>
            <a href="Report.php">Report</a>
          </li> -->
          <li>
            <a href="Logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- navbar end -->