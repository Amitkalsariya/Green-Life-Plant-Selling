<?php
    error_reporting(0);
    include 'connection.php';
    include 'header.php';

    // Revenue Calculations
    $revenue_sql = "SELECT SUM(price * qty) as total_revenue FROM order_items";
    $revenue_result = mysqli_query($conn, $revenue_sql);
    $revenue_data = mysqli_fetch_assoc($revenue_result);
    $total_revenue = $revenue_data['total_revenue'];
?>

<!-- Sidebar + Page Content Wrapper -->
<div class="wrapper d-flex align-items-stretch">
    <!-- Page Content -->
    <div id="content" class="p-4 p-md-5">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                </button>
                <h1 class="ms-3"><span style="color:green">Green</span> Life - Selling Report</h1>
            </div>
        </nav>

        <!-- Revenue Card Only -->
        <div class="row text-center mb-4 mt-3 justify-content-center">
            <div class="col-md-4 mb-2">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5>Total Revenue</h5>
                        <h3>₹<?= number_format($total_revenue) ?></h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Report Card -->
        <div class="card mt-4">
            <div class="card-body">
                <h3 class="text-center mb-4">Selling Report</h3>

                <!-- Filters -->
                <form method="GET" class="row g-2 mb-4">
                    <div class="col-6 col-md-3">
                        <input type="date" name="from" class="form-control" value="<?= $_GET['from'] ?? '' ?>" placeholder="From Date">
                    </div>
                    <div class="col-6 col-md-3">
                        <input type="date" name="to" class="form-control" value="<?= $_GET['to'] ?? '' ?>" placeholder="To Date">
                    </div>
                    <div class="col-md-4 col-12">
                        <input type="text" name="search" class="form-control" placeholder="Search Name, Email, Order ID..." value="<?= $_GET['search'] ?? '' ?>">
                    </div>
                    <div class="col-md-2 col-12 text-end">
                        <button class="btn btn-success w-100 mb-2" type="submit">Search</button>
                        <a href="selling_report.php" class="btn btn-secondary w-100">Reset</a>
                    </div>
                </form>

                <!-- Table -->
                <div class="table-responsive d-none d-md-block">
                    <table class="table table-bordered table-striped datatable" id="myTable" style="width:100%">
                        <thead style="background-color:#074f0b; color:white;">
                            <tr>
                                <th>ID</th>
                                <th>Customer</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Order ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $from = $_GET['from'] ?? '';
                                $to = $_GET['to'] ?? '';
                                $search = $_GET['search'] ?? '';

                                $query = "SELECT * FROM checkout WHERE 1=1";

                                if ($from && $to) {
                                    $query .= " AND DATE(created_at) BETWEEN '$from' AND '$to'";
                                }

                                if ($search) {
                                    $query .= " AND (
                                        firstname LIKE '%$search%' OR
                                        lastname LIKE '%$search%' OR
                                        emailid LIKE '%$search%' OR
                                        order_id LIKE '%$search%'
                                    )";
                                }

                                $query .= " ORDER BY id DESC";
                                $result = mysqli_query($conn, $query);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>
                                            <td>{$row['id']}</td>
                                            <td>{$row['firstname']} {$row['lastname']}</td>
                                            <td>{$row['emailid']}</td>
                                            <td>{$row['phonenumber']}</td>
                                            <td>{$row['address']}</td>
                                            <td>{$row['order_id']}</td>
                                        </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='6' class='text-center'>No records found</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- Cards for Mobile View -->
                <div class="d-md-none">
                    <?php
                        mysqli_data_seek($result, 0);
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<div class="card mb-3 border-success">';
                                echo '<div class="card-body">';
                                echo "<h5><strong>{$row['firstname']} {$row['lastname']}</strong></h5>";
                                echo "<p><strong>Email:</strong> {$row['emailid']}</p>";
                                echo "<p><strong>Phone:</strong> {$row['phonenumber']}</p>";
                                echo "<p><strong>Address:</strong> {$row['address']}</p>";
                                echo "<p><strong>Order ID:</strong> {$row['order_id']}</p>";
                                echo '</div></div>';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- DataTables Init -->
<script>
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar, #content').toggleClass('active');
        });

        $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdfHtml5',
                    text: 'Export PDF',
                    orientation: 'landscape',
                    pageSize: 'A4',
                    title: 'Selling Report',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: 'Export Excel',
                    title: 'Selling Report',
                    exportOptions: {
                        columns: ':visible'
                    }
                }
            ],
            paging: true,
            pageLength: 10,
            lengthMenu: [5, 10, 25, 50, 100],
        });
    });
</script>

<!-- Sidebar Styling -->
<style>
    #sidebar {
        min-width: 250px;
        max-width: 250px;
        background: #074f0b;
        color: #fff;
        transition: all 0.3s;
    }

    #sidebar.active {
        margin-left: -250px;
    }

    #content.active {
        margin-left: 0;
    }

    .wrapper {
        display: flex;
        width: 100%;
        align-items: stretch;
    }

    .navbar h1 {
        font-size: 1.4rem;
        margin-top: 10px;
    }

    @media (max-width: 768px) {
        form.row.g-2 .col-md-2.text-end {
            text-align: left !important;
        }
    }
</style>
