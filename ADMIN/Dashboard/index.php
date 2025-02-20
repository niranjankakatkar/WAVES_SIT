<?php
include '../../niru_collection.php';

?><!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Waves Packaging - Admin Dashboard.">

    <title>Waves Packaging - Admin Dashboard.</title>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;family=Poppins:wght@300;400;500;600;700;800;900&amp;family=Roboto:wght@400;500;700;900&amp;display=swap"
        rel="stylesheet">

    <link href="../assets/cdn.jsdelivr.net/npm/%40mdi/font%404.4.95/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="../assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="../assets/plugins/simplebar/simplebar.css" rel="stylesheet" />

    <!-- Ekka CSS -->
    <link id="ekka-css" href="../assets/css/ekka.css" rel="stylesheet" />

    <!-- FAVICON -->
    <link href="../assets/img/favicon.png" rel="shortcut icon" />

</head>

<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-light ec-header-light" id="body">

    <!--  WRAPPER  -->
    <div class="wrapper">

        <!-- LEFT MAIN SIDEBAR -->
        <?php include '../navBar.php'?>

        <!--  PAGE WRAPPER -->
        <div class="ec-page-wrapper">

            <!-- Header -->
            <?php include '../header.php'?>

            <!-- CONTENT WRAPPER -->
            <div class="ec-content-wrapper">
                <div class="content">
                    <!-- Top Statistics -->
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                            <div class="card card-mini dash-card card-1">
                                <div class="card-body">
                                    <h2 class="mb-1"><?=retrivecount($conn,"category"," where flag='1'")?></h2>
                                    <p>Total Catgeory</p>
                                    <span class="mdi mdi-account-arrow-left"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                            <div class="card card-mini dash-card card-2">
                                <div class="card-body">
                                <h2 class="mb-1"><?=retrivecount($conn,"sub_category"," where flag='1'")?></h2>
                                <p>Total Sub-Category</p>
                                    <span class="mdi mdi-account-clock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                            <div class="card card-mini dash-card card-3">
                                <div class="card-body">
                                    <h2 class="mb-1"><?=retrivecount($conn,"products"," where flag='1'")?></h2>
                                    <p>Total Product</p>
                                    <span class="mdi mdi-package-variant"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                            <div class="card card-mini dash-card card-4">
                                <div class="card-body">
                                    <h2 class="mb-1">0</h2>
                                    <p>Todays Orders</p>
                                    <span class="mdi mdi-currency-usd"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-8 col-md-12 p-b-15">
                            <!-- Sales Graph -->
                            <div id="user-acquisition" class="card card-default">
                                <div class="card-header">
                                    <h2>Sales Report</h2>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-tabs nav-style-border justify-content-between justify-content-lg-start border-bottom"
                                        role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#todays" role="tab"
                                                aria-selected="true">Today's</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#monthly" role="tab"
                                                aria-selected="false">Monthly </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#yearly" role="tab"
                                                aria-selected="false">Yearly</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content pt-4" id="salesReport">
                                        <div class="tab-pane fade show active" id="source-medium" role="tabpanel">
                                            <div class="mb-6" style="max-height:247px">
                                                <canvas id="acquisition" class="chartjs2"></canvas>
                                                <div id="acqLegend" class="customLegend mb-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-12 p-b-15">
                            <!-- Doughnut Chart -->
                            <div class="card card-default">
                                <div class="card-header justify-content-center">
                                    <h2>Orders Overview</h2>
                                </div>
                                <div class="card-body">
                                    <canvas id="doChart"></canvas>
                                </div>
                                <a href="#" class="pb-5 d-block text-center text-muted"><i
                                        class="mdi mdi-download mr-2"></i> Download overall report</a>
                                <div class="card-footer d-flex flex-wrap bg-white p-0">
                                    <div class="col-6">
                                        <div class="p-20">
                                            <ul class="d-flex flex-column justify-content-between">
                                                <li class="mb-2"><i class="mdi mdi-checkbox-blank-circle-outline mr-2"
                                                        style="color: #4c84ff"></i>Order Completed</li>
                                                <li class="mb-2"><i class="mdi mdi-checkbox-blank-circle-outline mr-2"
                                                        style="color: #80e1c1 "></i>Order Unpaid</li>
                                                <li><i class="mdi mdi-checkbox-blank-circle-outline mr-2"
                                                        style="color: #ff7b7b "></i>Order returned</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-6 border-left">
                                        <div class="p-20">
                                            <ul class="d-flex flex-column justify-content-between">
                                                <li class="mb-2"><i class="mdi mdi-checkbox-blank-circle-outline mr-2"
                                                        style="color: #8061ef"></i>Order Pending</li>
                                                <li class="mb-2"><i class="mdi mdi-checkbox-blank-circle-outline mr-2"
                                                        style="color: #ffa128"></i>Order Canceled</li>
                                                <li><i class="mdi mdi-checkbox-blank-circle-outline mr-2"
                                                        style="color: #7be6ff"></i>Order Broken</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-8 col-md-12 p-b-15">
                            <!-- User activity statistics -->
                            <div class="card card-default" id="user-activity">
                                <div class="no-gutters">
                                    <div>
                                        <div class="card-header justify-content-between">
                                            <h2>User Activity</h2>
                                            <div class="date-range-report ">
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content" id="userActivityContent">
                                                <div class="tab-pane fade show active" id="user" role="tabpanel">
                                                    <canvas id="activity" class="chartjs"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex flex-wrap bg-white border-top">
                                            <a href="#" class="text-uppercase py-3">In-Detail Overview</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-12 p-b-15">
                            <div class="card card-default">
                                <div class="card-header flex-column align-items-start">
                                    <h2>Current Users</h2>
                                </div>
                                <div class="card-body">
                                    <canvas id="currentUser" class="chartjs"></canvas>
                                </div>
                                <div class="card-footer d-flex flex-wrap bg-white border-top">
                                    <a href="#" class="text-uppercase py-3">In-Detail Overview</a>
                                </div>
                            </div>
                        </div>
                    </div>

                 
                    <div class="row">
                        <div class="col-12 p-b-15">
                            <!-- Recent Order Table -->
                            <div class="card card-table-border-none card-default recent-orders" id="recent-orders">
                                <div class="card-header justify-content-between">
                                    <h2>Recent Orders</h2>
                                    <div class="date-range-report">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-5">
                                    <table class="table card-table table-responsive table-responsive-large"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Product Name</th>
                                                <th class="d-none d-lg-table-cell">Units</th>
                                                <th class="d-none d-lg-table-cell">Order Date</th>
                                                <th class="d-none d-lg-table-cell">Order Cost</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>24541</td>
                                                <td>
                                                    <a class="text-dark" href="#"> Coach Swagger</a>
                                                </td>
                                                <td class="d-none d-lg-table-cell">1 Unit</td>
                                                <td class="d-none d-lg-table-cell">Oct 20, 2018</td>
                                                <td class="d-none d-lg-table-cell">$230</td>
                                                <td>
                                                    <span class="badge badge-success">Completed</span>
                                                </td>
                                                <td class="text-right">
                                                    <div class="dropdown show d-inline-block widget-dropdown">
                                                        <a class="dropdown-toggle icon-burger-mini" href="#"
                                                            role="button" id="dropdown-recent-order1"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" data-display="static"></a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li class="dropdown-item">
                                                                <a href="#">View</a>
                                                            </li>
                                                            <li class="dropdown-item">
                                                                <a href="#">Remove</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>24541</td>
                                                <td>
                                                    <a class="text-dark" href="#"> Toddler Shoes, Gucci Watch</a>
                                                </td>
                                                <td class="d-none d-lg-table-cell">2 Units</td>
                                                <td class="d-none d-lg-table-cell">Nov 15, 2018</td>
                                                <td class="d-none d-lg-table-cell">$550</td>
                                                <td>
                                                    <span class="badge badge-primary">Delayed</span>
                                                </td>
                                                <td class="text-right">
                                                    <div class="dropdown show d-inline-block widget-dropdown">
                                                        <a class="dropdown-toggle icon-burger-mini" href="#"
                                                            role="button" id="dropdown-recent-order2"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" data-display="static"></a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li class="dropdown-item">
                                                                <a href="#">View</a>
                                                            </li>
                                                            <li class="dropdown-item">
                                                                <a href="#">Remove</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>24541</td>
                                                <td>
                                                    <a class="text-dark" href="#"> Hat Black Suits</a>
                                                </td>
                                                <td class="d-none d-lg-table-cell">1 Unit</td>
                                                <td class="d-none d-lg-table-cell">Nov 18, 2018</td>
                                                <td class="d-none d-lg-table-cell">$325</td>
                                                <td>
                                                    <span class="badge badge-warning">On Hold</span>
                                                </td>
                                                <td class="text-right">
                                                    <div class="dropdown show d-inline-block widget-dropdown">
                                                        <a class="dropdown-toggle icon-burger-mini" href="#"
                                                            role="button" id="dropdown-recent-order3"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" data-display="static"></a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li class="dropdown-item">
                                                                <a href="#">View</a>
                                                            </li>
                                                            <li class="dropdown-item">
                                                                <a href="#">Remove</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>24541</td>
                                                <td>
                                                    <a class="text-dark" href="#"> Backpack Gents, Swimming Cap Slin</a>
                                                </td>
                                                <td class="d-none d-lg-table-cell">5 Units</td>
                                                <td class="d-none d-lg-table-cell">Dec 13, 2018</td>
                                                <td class="d-none d-lg-table-cell">$200</td>
                                                <td>
                                                    <span class="badge badge-success">Completed</span>
                                                </td>
                                                <td class="text-right">
                                                    <div class="dropdown show d-inline-block widget-dropdown">
                                                        <a class="dropdown-toggle icon-burger-mini" href="#"
                                                            role="button" id="dropdown-recent-order4"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" data-display="static"></a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li class="dropdown-item">
                                                                <a href="#">View</a>
                                                            </li>
                                                            <li class="dropdown-item">
                                                                <a href="#">Remove</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>24541</td>
                                                <td>
                                                    <a class="text-dark" href="#"> Speed 500 Ignite</a>
                                                </td>
                                                <td class="d-none d-lg-table-cell">1 Unit</td>
                                                <td class="d-none d-lg-table-cell">Dec 23, 2018</td>
                                                <td class="d-none d-lg-table-cell">$150</td>
                                                <td>
                                                    <span class="badge badge-danger">Cancelled</span>
                                                </td>
                                                <td class="text-right">
                                                    <div class="dropdown show d-inline-block widget-dropdown">
                                                        <a class="dropdown-toggle icon-burger-mini" href="#"
                                                            role="button" id="dropdown-recent-order5"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" data-display="static"></a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li class="dropdown-item">
                                                                <a href="#">View</a>
                                                            </li>
                                                            <li class="dropdown-item">
                                                                <a href="#">Remove</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                  
                </div> <!-- End Content -->
            </div> <!-- End Content Wrapper -->

            <!-- Footer -->
            <footer class="footer mt-auto">
                <div class="copyright bg-white">
                    <p>
                        Copyright &copy; <span id="ec-year"></span><a class="text-primary"
                            href="#" target="_blank"> Waves Packaging Dashboard</a>. All Rights Reserved.
                    </p>
                </div>
            </footer>

        </div> <!-- End Page Wrapper -->
    </div> <!-- End Wrapper -->

    <!-- Common Javascript -->
    <script src="../assets/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/plugins/simplebar/simplebar.min.js"></script>
    <script src="../assets/plugins/jquery-zoom/jquery.zoom.min.js"></script>
    <script src="../assets/plugins/slick/slick.min.js"></script>

    <!-- Chart -->
    <script src="../assets/plugins/charts/Chart.min.js"></script>
    <script src="../assets/js/chart.js"></script>

    <!-- Google map chart -->
    <script src="../assets/plugins/charts/google-map-loader.js"></script>
    <script src="../assets/plugins/charts/google-map.js"></script>

    <!-- Date Range Picker -->
    <script src="../assets/plugins/daterangepicker/moment.min.js"></script>
    <script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="../assets/js/date-range.js"></script>

    <!-- Option Switcher -->
    <script src="../assets/plugins/options-sidebar/optionswitcher.js"></script>

    <!-- Ekka Custom -->
    <script src="../assets/js/ekka.js"></script>
</body>


<!-- Mirrored from maraviyainfotech.com/projects/ekka/ekka-v37/ekka-admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Dec 2024 08:27:49 GMT -->

</html>