
<?php
include '../../niru_collection.php';

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from maraviyainfotech.com/projects/ekka/ekka-v37/ekka-admin/user-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Dec 2024 08:27:56 GMT -->
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
			<!-- LEFT MAIN SIDEBAR -->
            <?php include '../navBar.php'?>

<!--  PAGE WRAPPER -->
<div class="ec-page-wrapper">

    <!-- Header -->
    <?php include '../header.php'?>

			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-contacts">
						<div>
							<h1>User Profile</h1>
							<p class="breadcrumbs"><span><a href="index.html">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Profile
							</p>
						</div>
						<div>
							<a href="user-list.html" class="btn btn-primary">Edit</a>
						</div>
					</div>
					<div class="card bg-white profile-content">
						<div class="row">
							<div class="col-lg-4 col-xl-3">
								<div class="profile-content-left profile-left-spacing">
									<div class="text-center widget-profile px-0 border-0">
										<div class="card-img mx-auto rounded-circle">
											<img src="../assets/img/user/u1.jpg" alt="user image">
										</div>
										<div class="card-body">
											<h4 class="py-2 text-dark"><?=givedata($conn,"user_master","token_key",$_GET['id'],"full_name")?></h4>
											<p><?=givedata($conn,"user_master","token_key",$_GET['id'],"email")?></p>
                                            <p><?=givedata($conn,"user_master","token_key",$_GET['id'],"mobile_no")?></p>
											<br>
										</div>
									</div>

									<div class="d-flex justify-content-between ">
										<div class="text-center pb-4">
											<h6 class="text-dark pb-2">0</h6>
											<p>Total Orders</p>
										</div>

										<div class="text-center pb-4">
											<h6 class="text-dark pb-2">0</h6>
											<p>Cancel Orders</p>
										</div>

										<div class="text-center pb-4">
											<h6 class="text-dark pb-2">0</h6>
											<p>Delevered</p>
										</div>
									</div>

									<hr class="w-100">

									<div class="contact-info pt-4">
										<h5 class="text-dark">Contact Information</h5>
										<p class="text-dark font-weight-medium pt-24px mb-2">Email address</p>
										<p><?=givedata($conn,"user_master","token_key",$_GET['id'],"email")?></p>
										<p class="text-dark font-weight-medium pt-24px mb-2">Phone Number</p>
										<p><?=givedata($conn,"user_master","token_key",$_GET['id'],"mobile_no")?></p>
										<p class="text-dark font-weight-medium pt-24px mb-2">Birthday</p>
										<p>Dec 10, 1991</p>
										
									</div>
								</div>
							</div>

							<div class="col-lg-8 col-xl-9">
								<div class="profile-content-right profile-right-spacing py-5">
									<ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myProfileTab" role="tablist">
										<li class="nav-item" role="presentation">
											<button class="nav-link active" id="profile-tab" data-bs-toggle="tab"
												data-bs-target="#profile" type="button" role="tab"
												aria-controls="profile" aria-selected="true">Profile</button>
										</li>
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="settings-tab" data-bs-toggle="tab"
												data-bs-target="#settings" type="button" role="tab"
												aria-controls="settings" aria-selected="false">Settings</button>
										</li>
									</ul>
									<div class="tab-content px-3 px-xl-5" id="myTabContent">

										<div class="tab-pane fade show active" id="profile" role="tabpanel"
											aria-labelledby="profile-tab">
											<div class="tab-widget mt-5">
												<div class="row">
													<div class="col-xl-4">
														<div class="media widget-media p-3 bg-white border">
															<div class="icon rounded-circle mr-3 bg-primary">
																<i class="mdi mdi-account-outline text-white "></i>
															</div>

															<div class="media-body align-self-center">
																<h4 class="text-primary mb-2">0</h4>
																<p>Orders</p>
															</div>
														</div>
													</div>

													<div class="col-xl-4">
														<div class="media widget-media p-3 bg-white border">
															<div class="icon rounded-circle bg-warning mr-3">
																<i class="mdi mdi-cart-outline text-white "></i>
															</div>

															<div class="media-body align-self-center">
																<h4 class="text-primary mb-2">0</h4>
																<p>Delevered</p>
															</div>
														</div>
													</div>

													<div class="col-xl-4">
														<div class="media widget-media p-3 bg-white border">
															<div class="icon rounded-circle mr-3 bg-success">
																<i class="mdi mdi-ticket-percent text-white "></i>
															</div>

															<div class="media-body align-self-center">
																<h4 class="text-primary mb-2">0</h4>
																<p>Voucher</p>
															</div>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-xl-12">

														<!-- Notification Table -->
														<div class="card card-default">
															<div class="card-header justify-content-between mb-1">
																<h2>Latest Notifications</h2>
																<div>
																	<button class="text-black-50 mr-2 font-size-20"><i
																			class="mdi mdi-cached"></i></button>
																	<div
																		class="dropdown show d-inline-block widget-dropdown">
																		<a class="dropdown-toggle icon-burger-mini"
																			href="#" role="button"
																			id="dropdown-notification"
																			data-bs-toggle="dropdown"
																			aria-haspopup="true" aria-expanded="false"
																			data-display="static"></a>
																		<ul class="dropdown-menu dropdown-menu-right"
																			aria-labelledby="dropdown-notification">
																			<li class="dropdown-item"><a
																					href="#">Action</a></li>
																			<li class="dropdown-item"><a
																					href="#">Another action</a></li>
																			<li class="dropdown-item"><a
																					href="#">Something else here</a>
																			</li>
																		</ul>
																	</div>
																</div>

															</div>
															<div class="card-body compact-notifications" data-simplebar
																style="height: 434px;">
																<div
																	class="media pb-3 align-items-center justify-content-between">
																	<div
																		class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-primary text-white">
																		<i
																			class="mdi mdi-cart-outline font-size-20"></i>
																	</div>
																	<div class="media-body pr-3 ">
																		<a class="mt-0 mb-1 font-size-15 text-dark"
																			href="#">New Order</a>
																		<p>Selena has placed an new order</p>
																	</div>
																	<span class=" font-size-12 d-inline-block"><i
																			class="mdi mdi-clock-outline"></i> 10
																		AM</span>
																</div>

																<div
																	class="media py-3 align-items-center justify-content-between">
																	<div
																		class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-success text-white">
																		<i
																			class="mdi mdi-email-outline font-size-20"></i>
																	</div>
																	<div class="media-body pr-3">
																		<a class="mt-0 mb-1 font-size-15 text-dark"
																			href="#">New Enquiry</a>
																		<p>Phileine has placed an new order</p>
																	</div>
																	<span class=" font-size-12 d-inline-block"><i
																			class="mdi mdi-clock-outline"></i> 9
																		AM</span>
																</div>


																<div
																	class="media py-3 align-items-center justify-content-between">
																	<div
																		class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-warning text-white">
																		<i
																			class="mdi mdi-stack-exchange font-size-20"></i>
																	</div>
																	<div class="media-body pr-3">
																		<a class="mt-0 mb-1 font-size-15 text-dark"
																			href="#">Support Ticket</a>
																		<p>Emma has placed an new order</p>
																	</div>
																	<span class=" font-size-12 d-inline-block"><i
																			class="mdi mdi-clock-outline"></i> 10
																		AM</span>
																</div>

																<div
																	class="media py-3 align-items-center justify-content-between">
																	<div
																		class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-primary text-white">
																		<i
																			class="mdi mdi-cart-outline font-size-20"></i>
																	</div>
																	<div class="media-body pr-3">
																		<a class="mt-0 mb-1 font-size-15 text-dark"
																			href="#">New order</a>
																		<p>Ryan has placed an new order</p>
																	</div>
																	<span class=" font-size-12 d-inline-block"><i
																			class="mdi mdi-clock-outline"></i> 10
																		AM</span>
																</div>

																<div
																	class="media py-3 align-items-center justify-content-between">
																	<div
																		class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-info text-white">
																		<i
																			class="mdi mdi-calendar-blank font-size-20"></i>
																	</div>
																	<div class="media-body pr-3">
																		<a class="mt-0 mb-1 font-size-15 text-dark"
																			href="#">Comapny Meetup</a>
																		<p>Phileine has placed an new order</p>
																	</div>
																	<span class=" font-size-12 d-inline-block"><i
																			class="mdi mdi-clock-outline"></i> 10
																		AM</span>
																</div>

																<div
																	class="media py-3 align-items-center justify-content-between">
																	<div
																		class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-warning text-white">
																		<i
																			class="mdi mdi-stack-exchange font-size-20"></i>
																	</div>
																	<div class="media-body pr-3">
																		<a class="mt-0 mb-1 font-size-15 text-dark"
																			href="#">Support Ticket</a>
																		<p>Emma has placed an new order</p>
																	</div>
																	<span class=" font-size-12 d-inline-block"><i
																			class="mdi mdi-clock-outline"></i> 10
																		AM</span>
																</div>

																<div
																	class="media py-3 align-items-center justify-content-between">
																	<div
																		class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-success text-white">
																		<i
																			class="mdi mdi-email-outline font-size-20"></i>
																	</div>
																	<div class="media-body pr-3">
																		<a class="mt-0 mb-1 font-size-15 text-dark"
																			href="#">New Enquiry</a>
																		<p>Phileine has placed an new order</p>
																	</div>
																	<span class=" font-size-12 d-inline-block"><i
																			class="mdi mdi-clock-outline"></i> 9
																		AM</span>
																</div>

															</div>
															<div class="mt-3"></div>
														</div>

													</div>
												</div>
											</div>
										</div>

										<div class="tab-pane fade" id="settings" role="tabpanel"
											aria-labelledby="settings-tab">
											<div class="tab-pane-content mt-5">
												<form>
													
													<div class="row mb-2">
														<div class="col-lg-12">
															<div class="form-group">
																<label for="firstName">Full name</label>
																<input type="text" class="form-control" id="firstName" name="full_name" value="<?=givedata($conn,"user_master","token_key",$_GET['id'],"full_name")?>"
																	value="First name">
															</div>
														</div>

														
													</div>

													<div class="form-group mb-4">
														<label for="userName">User name</label>
														<input type="text" class="form-control" id="userName" name="email" value="<?=givedata($conn,"user_master","token_key",$_GET['id'],"email")?>"
															value="User name">
														<span class="d-block mt-1">Accusamus nobis at omnis consequuntur
															culpa tempore saepe animi.</span>
													</div>

													<div class="form-group mb-4">
														<label for="email">Email</label>
														<input type="email" class="form-control" id="email" name="email" value="<?=givedata($conn,"user_master","token_key",$_GET['id'],"email")?>"
															value="ekka.example@gmail.com">
													</div>

													<div class="form-group mb-4">
														<label for="oldPassword">Old password</label>
														<input type="password" class="form-control" id="oldPassword">
													</div>

													<div class="form-group mb-4">
														<label for="newPassword">New password</label>
														<input type="password" class="form-control" id="newPassword">
													</div>

													<div class="form-group mb-4">
														<label for="conPassword">Confirm password</label>
														<input type="password" class="form-control" id="conPassword">
													</div>

													<div class="d-flex justify-content-end mt-5">
														<button type="submit"
															class="btn btn-primary mb-2 btn-pill">Update
															Profile</button>
													</div>
												</form>
											</div>
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


<!-- Mirrored from maraviyainfotech.com/projects/ekka/ekka-v37/ekka-admin/user-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Dec 2024 08:27:56 GMT -->
</html>