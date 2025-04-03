<?php
	error_reporting(0);
  include 'header.php';
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


        <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="user-tab" data-bs-toggle="tab" data-bs-target="#user" type="button" role="tab" aria-controls="user" aria-selected="true">User</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="plantd-tab" data-bs-toggle="tab" data-bs-target="#plantd" type="button" role="tab" aria-controls="plantd" aria-selected="false">Plant detail</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="post-tab" data-bs-toggle="tab" data-bs-target="#post" type="button" role="tab" aria-controls="post" aria-selected="false">Post</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="product-tab" data-bs-toggle="tab" data-bs-target="#product" type="button" role="tab" aria-controls="product" aria-selected="false">Product</button>
                </li>
            </ul> -->

        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="user-tab" data-bs-toggle="tab" data-bs-target="#user" type="button" role="tab" aria-controls="user" aria-selected="true">User</button>
          </li>
          &nbsp;
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail" type="button" role="tab" aria-controls="detail" aria-selected="false">Plant Detail</button>
          </li>
          &nbsp;
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="post-tab" data-bs-toggle="tab" data-bs-target="#post" type="button" role="tab" aria-controls="post" aria-selected="false">Post</button>
          </li>
          &nbsp;
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="prod-tab" data-bs-toggle="tab" data-bs-target="#prod" type="button" role="tab" aria-controls="prod" aria-selected="false">Product</button>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
            <div class="col-md-12">
              <div class="card mt-5">
                <div class="card-body">
                  <form action="" method="POST">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>From Date:</label>
                          <input class="form-control" type="date" name="fromdate" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>To Date:</label>
                          <input class="form-control" type="date" name="todate" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">&nbsp;
                          <br>
                          <input class="btn" style="background-color:#074f0b; color:#fff" type="submit" name="submit">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <h3 style="text-align:center;">Register User Details</h3>
              <div class="card mt-4">
                <div class="card-body">
                  <table class="table text-center">
                    <thead>
                      <tr>
                        <th scope="col">User</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($_POST['fromdate']) && isset($_POST['todate'])) {
                        $fromdate = $_POST["fromdate"];
                        $todate = $_POST["todate"];
                        $query = " select R_id,name,address,city,Date  from user where Date between '$fromdate' AND '$todate'  ";
                        $query_run = mysqli_query($conn, $query);
                        if (mysqli_num_rows($query_run) > 0) {
                          foreach ($query_run as $row) {
                      ?>
                            <tr>
                              <td>
                                <?= $row['R_id']; ?>
                              </td>
                              <td>
                                <?= $row['name']; ?>
                              </td>
                              <td>
                                <?= $row['address']; ?>
                              </td>
                              <td>
                                <?= $row['city']; ?>
                              </td>
                              <td>
                                <?= $row['Date']; ?>
                              </td>
                            </tr>

                      <?php
                          }
                        } else {
                          echo "No record found";
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="detail" role="tabpanel" aria-labelledby="detail-tab">
            <div class="col-md-12">
              <div class="card mt-5">
                <div class="card-body">
                  <form action="" method="POST">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <input class="form-control" type="date" name="date3" required>
                          <br><br>
                          <select name="plantdetail" required>
                            <option>--select--</option>
                            <option>Sunlight</option>
                            <option>Temprature</option>
                            <option>Humidity</option>
                            <option>Water</option>
                            <option>Description</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <input class="btn" style='background-color:#074f0b; color:#fff' type="submit" name="submit3">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <h3 style="text-align:center;">Opinion Sharing Details</h3>
              <div class="card mt-4">
                <div class="card-body">
                  <table class="table table-borderless datatable" id="myTable">
                    <thead>
                      <tr>
                        <th scope="col">Information</th>
                        <th scope="col">Type</th>
                        <th scope="col">Text</th>
                        <th scope="col">Date</th>
                        <th scope="col">Like</th>
                        <th scope="col">Dislike</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($_POST['date3']) && isset($_POST['submit3']) && isset($_POST['plantdetail'])) {
                        $plantd = $_POST['plantdetail'];
                        $date = $_POST['date3'];
                        $sql = "SELECT * FROM `info_type` WHERE Date = '$date'  AND Type = '$plantd'";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                      ?>

                          <tr>
                            <td>
                              <?php echo $row['I_id']; ?>
                            </td>
                            <td>
                              <?php echo $row['Type']; ?>
                            </td>
                            <td>
                              <?php echo $row['Text']; ?>
                            </td>
                            <td>
                              <?php echo $row['Date']; ?>
                            </td>
                            <td>
                              <?php echo $row['PLike']; ?>
                            </td>
                            <td>
                              <?php echo $row['PDislike']; ?>
                            </td>
                          </tr>
                      <?php
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="post" role="tabpanel" aria-labelledby="post-tab">
            <div class="col-md-12">
              <div class="card mt-5">
                <div class="card-body">
                  <form action="" method="POST">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>From Date:</label>
                          <input class="form-control" type="date" name="postfromdate" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>To Date:</label>
                          <input class="form-control" type="date" name="posttodate" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group"><br>&nbsp;
                          <input class="btn" style="background-color:#074f0b; color:#fff" type="submit" name="submit1">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <h3 style="text-align:center;">Gardening Post Details</h3>
              <div class="card mt-4">
                <div class="card-body">
                  <table class="table text-center">
                    <thead>
                      <tr>
                        <th scope="col">Post</th>
                        <th scope="col">Image</th>
                        <th scope="col">Caption</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($_POST['postfromdate']) && isset($_POST['posttodate'])) {
                        $postfromdate = $_POST["postfromdate"];
                        $posttodate = $_POST["posttodate"];
                        $sql = " select Post_id,Post_image,Caption,Date,Time  from post where Date between '$postfromdate' AND '$posttodate'  ";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                      ?>

                          <tr>
                            <td>
                              <?php echo $row['Post_id']; ?>
                            </td>
                            <td>
                              <?php echo $row['Post_image']; ?>
                            </td>
                            <td>
                              <?php echo $row['Caption']; ?>
                            </td>
                            <td>
                              <?php echo $row['Date']; ?>
                            </td>
                            <td>
                              <?php echo $row['Time']; ?>
                            </td>
                          </tr>

                      <?php
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="prod" role="tabpanel" aria-labelledby="prod-tab">
            <div class="col-md-12">
              <div class="card mt-5">
                <div class="card-body">
                  <form action="" method="POST">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <input class="form-control" type="date" name="date3" required>
                          <br><br>
                          <select name="productdetail" required>
                            <option>--select--</option>
                            <option>1 Tool</option>
                            <option>2 Plant</option>
                            <option>3 Pot</option>
                            <option>4 Seed</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <input class="btn" style="background-color:#074f0b; color:#fff" type="submit" name="submit3">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <h3 style="text-align:center;">Gardening Product Details</h3>
              <div class="card mt-4">
                <div class="card-body">
                  <table class="table table-borderless datatable" id="myTable">
                    <thead>
                      <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($_POST['date3']) && isset($_POST['submit3']) && isset($_POST['productdetail'])) {
                        $productd = $_POST['productdetail'];
                        $date = $_POST['date3'];
                        $sql = "SELECT * FROM `product` WHERE Date = '$date'  AND Prod_id = '$productd'";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                      ?>

                          <tr>
                            <td>
                              <?php echo $row['Prod_id']; ?>
                            </td>
                            <td>
                              <?php echo $row['Prod_name']; ?>
                            </td>
                            <td>
                              <img src="<?php echo "./images/" . $row['Prod_image'] ?>" style="height:70px; width:80px;">
                            </td>
                            <td>
                              <?php echo $row['Prod_description']; ?>
                            </td>
                            <td>
                              <?php echo $row['Prod_price']; ?>
                            </td>
                            <td>
                              <?php echo $row['prod_qt']; ?>
                            </td>
                            <td>
                              <?php echo $row['Date']; ?>
                            </td>
                          </tr>

                      <?php
                        }
                      }
                      ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

</body>

</html>