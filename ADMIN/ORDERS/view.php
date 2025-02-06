<?php
include '../../niru_collection.php';
$cid=givedata($conn,"order_master","id",$_GET['id'],"user_key");
$oid=givedata($conn,"order_master","id",$_GET['id'],"order_id");

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from maraviyainfotech.com/projects/ekka/ekka-v37/ekka-admin/order-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Dec 2024 08:28:05 GMT -->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Waves Packaging - Admin Dashboard.">

    <title>Waves Packaging - Admin Dashboard.</title>

	<!-- GOOGLE FONTS -->
	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;family=Poppins:wght@300;400;500;600;700;800;900&amp;family=Roboto:wght@400;500;700;900&amp;display=swap" rel="stylesheet">

	<link href="../assets/cdn.jsdelivr.net/npm/%40mdi/font%404.4.95/css/materialdesignicons.min.css" rel="stylesheet" />

	<!-- PLUGINS CSS STYLE -->
	<link href="../assets/plugins/simplebar/simplebar.css" rel="stylesheet" />

	<!-- Ekka CSS -->
	<link id="ekka-css" rel="stylesheet" href="../assets/css/ekka.css" />

	<!-- FAVICON -->
	<link href="../assets/img/favicon.png" rel="shortcut icon" />
</head>

<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-dark ec-header-light" id="body">

	<!-- WRAPPER -->
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
					<div class="breadcrumb-wrapper breadcrumb-wrapper-2">
						<h1>Order Detail</h1>
						<p class="breadcrumbs"><span><a href="../Dashboard">Home</a></span>
							<span><i class="mdi mdi-chevron-right"></i></span>Orders
						</p>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="ec-odr-dtl card card-default">
								<div class="card-header card-header-border-bottom d-flex justify-content-between">
									<h2 class="ec-odr">Order Detail<br>
										<span class="small">Order ID: #<?=$oid?></span>
									</h2>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-xl-3 col-lg-6">
											<address class="info-grid">
												<div class="info-title"><strong>Customer:</strong></div><br>
												<div class="info-content">
													<?=givedata($conn,"user_master","token_key",$cid,"full_name")?><br>
													<?=givedata($conn,"address_master","user_token_id",$cid,"address")?><br>
													<?=givedata($conn,"address_master","user_token_id",$cid,"pincode")?><br>
													
													<abbr title="Phone">P:</abbr> <?=givedata($conn,"user_master","token_key",$cid,"mobile_no")?>
												</div>
											</address>
										</div>
										<div class="col-xl-3 col-lg-6">
											<address class="info-grid">
												<div class="info-title"><strong>Shipped To:</strong></div><br>
												<div class="info-content">
												<?=givedata($conn,"user_master","token_key",$cid,"full_name")?><br>
													<?=givedata($conn,"address_master","user_token_id",$cid,"address")?><br>
													<?=givedata($conn,"address_master","user_token_id",$cid,"pincode")?><br>
													
													<abbr title="Phone">P:</abbr> <?=givedata($conn,"user_master","token_key",$cid,"mobile_no")?>
												</div>
											</address>
										</div>
										<div class="col-xl-3 col-lg-6">
											<address class="info-grid">
												<div class="info-title"><strong>Payment Method:</strong></div><br>
												<div class="info-content">
													Visa ending **** 1234<br>
													-----<br>
												</div>
											</address>
										</div>
										<div class="col-xl-3 col-lg-6">
											<address class="info-grid">
												<div class="info-title"><strong>Order Date:</strong></div><br>
												<div class="info-content">
													<?php
													$timepstamp=givedata($conn,"order_master","id",$_GET['id'],"timestamp");
													$timepstamp = date_create("" . $timepstamp);
													$time = date_format($timepstamp, "H:i a");
													$date = date_format($timepstamp, "M d,Y ");
													?>
													<?=$time?>,<br>
													<?=$date?>
												</div>
											</address>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<h3 class="tbl-title">PRODUCT SUMMARY</h3>
											<div class="table-responsive">
												<table class="table table-striped o-tbl">
													<thead>
														<tr class="line">
															<td><strong>#</strong></td>
															<td class="text-center"><strong>IMAGE</strong></td>
															<td class="text-center"><strong>PRODUCT</strong></td>
															<td class="text-right"><strong>QUANTITY</strong></td>
															<td class="text-center"><strong>PRICE/UNIT</strong></td>
															<td class="text-right"><strong>SUBTOTAL</strong></td>
														</tr>
													</thead>
													<tbody>
													<?php
												$sql = "SELECT * FROM order_master_details where oid='$oid'";
												$result = mysqli_query($conn, $sql);
												while ($row = mysqli_fetch_assoc($result)) {
													$p_key=$row['product_key']
													?>
														<tr>
															<td>1</td>
															<td><img class="product-img"
																	src="<?=givedata($conn,"products","key_",$p_key,"filepath")?>" alt="" /></td>
															<td><strong><?=givedata($conn,"products","key_",$p_key,"product_title")?></td>
															<td class="text-center"><?=$row['qty']?></td>
															<td class="text-center">£ <?=$row['rate']?></td>
															<td class="text-right">£ <?=$row['total']?></td>
														</tr>
														<?php
												}?>
						
														<tr>
															<td colspan="4"></td>
															<td class="text-right"><strong>Subtotal</strong></td>
															<td class="text-right"><strong>£ <?=givedata($conn,"order_master","id",$_GET['id'],"total")?></strong></td>
														</tr>
														<tr>
															<td colspan="4"></td>
															<td class="text-right"><strong>Discount</strong></td>
															<td class="text-right"><strong>£ <?=givedata($conn,"order_master","id",$_GET['id'],"coupon")?></strong></td>
														</tr>
														<tr>
															<td colspan="4"></td>
															<td class="text-right"><strong>Shipping</strong></td>
															<td class="text-right"><strong>£ <?=givedata($conn,"order_master","id",$_GET['id'],"shipping")?></strong></td>
														</tr>
														<tr>
															<td colspan="4">
															</td>
															<td class="text-right"><strong>Total</strong></td>
															<td class="text-right"><strong>£ <?=givedata($conn,"order_master","id",$_GET['id'],"grand_total")?></strong></td>
														</tr>

														<tr>
															<td colspan="4">
															</td>
															<td class="text-right"><strong>Payment Status</strong></td>
															<td class="text-right"><strong>PAID</strong></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Tracking Detail -->
							<div class="card mt-4 trk-order" >
								<div class="p-4 text-center text-white text-lg bg-dark rounded-top">
									<span class="text-uppercase">Tracking Order No - </span>
									<span class="text-medium">34VB5540K83</span>
								</div>
								
								
								<div
									class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary">
									<div class="w-100 text-center py-1 px-2"><span class="text-medium">Shipped
											Via:</span> Gowdown</div>
									<div class="w-100 text-center py-1 px-2"><span class="text-medium">Status:</span>
										Checking Quality</div>
									<div class="w-100 text-center py-1 px-2"><span class="text-medium">Expected
											Date:</span> DEC 09, 2021</div>
								</div>
								<div class="card-body">
									<div
										class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
										<div class="step completed">
											<div class="step-icon-wrap">
												<div class="step-icon"><i class="mdi mdi-cart"></i></div>
											</div>
											<h4 class="step-title">Confirmed Order</h4>
										</div>
										<div class="step completed">
											<div class="step-icon-wrap">
												<div class="step-icon"><i class="mdi mdi-tumblr-reblog"></i></div>
											</div>
											<h4 class="step-title">Processing Order</h4>
										</div>
										<div class="step completed">
											<div class="step-icon-wrap">
												<div class="step-icon"><i class="mdi mdi-gift"></i></div>
											</div>
											<h4 class="step-title">Product Dispatched</h4>
										</div>
										<div class="step">
											<div class="step-icon-wrap">
												<div class="step-icon"><i class="mdi mdi-truck-delivery"></i></div>
											</div>
											<h4 class="step-title">On Delivery</h4>
										</div>
										<div class="step">
											<div class="step-icon-wrap">
												<div class="step-icon"><i class="mdi mdi-hail"></i></div>
											</div>
											<h4 class="step-title">Product Delivered</h4>
										</div>
									</div>
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

	<!-- Option Switcher -->
	<script src="../assets/plugins/options-sidebar/optionswitcher.js"></script>

	<!-- Ekka Custom -->
	<script src="../assets/js/ekka.js"></script>
</body>


<!-- Mirrored from maraviyainfotech.com/projects/ekka/ekka-v37/ekka-admin/order-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Dec 2024 08:28:05 GMT -->
</html>