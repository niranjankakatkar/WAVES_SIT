<?php
include '../../niru_collection.php';




$coupon_id = $_GET['id'];
$Dflag = $_GET['Dflag'];
if ($Dflag != "") {

	$sql = "DELETE FROM user_master WHERE id='$id'";
	if ($conn->query($sql)) {
		//  unlink($filepath);
		?>
		<script>alert("User Deleted Successfully"); window.location.href = "../Coupon/add_coupon.php"; </script>
		<?php
	}
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$respocse = $_POST['respocse'];
	$customer_id = $_POST['customer_id'];
	

	$sql = "UPDATE contact_us set respocse='$respocse' where id='$customer_id'";
	
	if ($conn->query($sql)) {
		?>
		<script>alert("Replay Send Successfully");</script>
		<?php
	}


}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from maraviyainfotech.com/projects/ekka/ekka-v37/ekka-admin/vendor-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Dec 2024 08:27:52 GMT -->

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
	<link href="../assets/plugins/simplebar/simplebar.css" rel="stylesheet" />

	<!-- Data Tables -->
	<link href='../assets/plugins/data-tables/datatables.bootstrap5.min.css' rel='stylesheet'>
	<link href='../assets/plugins/data-tables/responsive.datatables.min.css' rel='stylesheet'>

	<!-- ekka CSS -->
	<link id="ekka-css" rel="stylesheet" href="../assets/css/ekka.css" />

	<!-- FAVICON -->
	<link href="../assets/img/favicon.png" rel="shortcut icon" />
</head>

<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-dark ec-header-light" id="body">

	<!-- WRAPPER -->
	<div class="wrapper">

		<!-- LEFT MAIN SIDEBAR -->
		<?php include '../navBar.php' ?>

		<!--  PAGE WRAPPER -->
		<div class="ec-page-wrapper">

			<!-- Header -->
			<?php include '../header.php' ?>

			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-contacts">
						<div>
							<h1>Contact List</h1>
							<p class="breadcrumbs"><span><a href="../Dashboard">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Contact Us List
							</p>
						</div>
						<!-- <div>
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addVendor"> Add <?= $user_type ?>
							</button>
						</div> -->
					</div>
					<div class="row">
						<div class="col-12">
							<div class="ec-vendor-list card card-default">
								<div class="card-body">
									<div class="table-responsive">
										<table id="responsive-data-table" class="table">
											<thead>
												<tr>
													<th>Sr.No.</th>
													<th>Customer Info</th>
													<th>Date/Time</th>
													<th>Message</th>
													<th>Replay</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>

												<?php
												$i=1;
												$sql = "SELECT * FROM contact_us where brand_flag='0' ORDER BY id DESC";
												$result = mysqli_query($conn, $sql);
												while ($row = mysqli_fetch_assoc($result)) {
													$timepstamp = $row['timestamp'];
													$timepstamp = date_create("" . $timepstamp);
													$join = date_format($timepstamp, "d-M-Y H:i");
													?>
													<tr>
														<td><?=$i++?></td>
														<td><?= $row['full_name'] ?><br> <?= $row['email'] ?><br><?= $row['phone_no'] ?></td>
														<td><?= $join ?></td>
														<td><?= $row['msg'] ?></td>
														<td><?= $row['respocse'] ?></td>
														<td>
															<div class="btn-group">
																<button type="button"
																	
																	class="btn btn-outline-success">Info</button>
																<button type="button"
																	class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
																	data-bs-toggle="dropdown" aria-haspopup="true"
																	aria-expanded="false" data-display="static">
																	<span class="sr-only">Info</span>
																</button>

																<div class="dropdown-menu">
																	<a class="dropdown-item"
																		onclick="get_otheruserdata(<?= $row['id'] ?>)"
																		data-bs-toggle="modal"
																		data-bs-target="#addVendor">Replay</a>
																	
																</div>
															</div>
														</td>
													</tr>
													<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Add Vendor Modal  -->
					<div class="modal fade modal-add-contact" id="addVendor" tabindex="-1" role="dialog"
						aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">
								<form method="POST">
									<div class="modal-header px-4">
										<h5 class="modal-title" id="exampleModalCenterTitle">Contact Us Info
										</h5>
									</div>

									<div class="modal-body px-4">
										
										<input type="hidden" name="customer_id" id="customer_id" value="">

										<div class="row mb-2">
											<div class="col-lg-12">
												<div class="form-group">
													<label for="full_name">Message</label>
													<textarea name="respocse" class="form-control" row="6"></textarea>
													
												</div>
											</div>

											<!-- <div class="col-lg-6">
												<div class="form-group">
													<label for="lastName">Last name</label>
													<input type="text" class="form-control" id="lastName" value="Deo">
												</div>
											</div>
											
											<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="userName">User name</label>
													<input type="text" class="form-control" id="userName" value="johndoe">
												</div>
											</div> -->


											
										</div>

										<div class="modal-footer px-4">
											<button type="button" class="btn btn-secondary btn-pill"
												data-bs-dismiss="modal">Cancel</button>
											<button type="submit" class="btn btn-primary btn-pill">Update</button>
										</div>
								</form>
							</div>
						</div>
					</div>
				</div> <!-- End Content -->
			</div> <!-- End Content Wrapper -->

			<!-- Footer -->
			<footer class="footer mt-auto">
				<div class="copyright bg-white">
					<p>
						Copyright &copy; <span id="ec-year"></span><a class="text-primary" href="#" target="_blank">
							Waves Packaging Dashboard</a>. All Rights Reserved.
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

	<!-- Data Tables -->
	<script src='../assets/plugins/data-tables/jquery.datatables.min.js'></script>
	<script src='../assets/plugins/data-tables/datatables.bootstrap5.min.js'></script>
	<script src='../assets/plugins/data-tables/datatables.responsive.min.js'></script>

	<!-- Option Switcher -->
	<script src="../assets/plugins/options-sidebar/optionswitcher.js"></script>

	<!-- Ekka Custom -->
	<script src="../assets/js/ekka.js"></script>





	<!-- Font Awesome for the eye icon -->
	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

	<script>
		const passwordInput = document.getElementById("password");
		const togglePassword = document.getElementById("toggle-password");

		togglePassword.addEventListener("click", function () {
			const type = passwordInput.type === "password" ? "text" : "password";
			passwordInput.type = type;

			// Toggle text between "Show" and "Hide"
			this.textContent = type === "password" ? "Show" : "Hide";
		});
	</script>



	<script>


		function get_otheruserdata(id) {

			document.getElementById("customer_id").value = id;

			

		}


	

		// Custom form validation
		(function () {
			const form = document.querySelector("form");
			form.addEventListener(
				"submit",
				function (event) {
					if (!form.checkValidity()) {
						event.preventDefault();
						event.stopPropagation();
					}
					form.classList.add("was-validated");
				},
				false
			);
		})();



	</script>
</body>

<!-- Mirrored from maraviyainfotech.com/projects/ekka/ekka-v37/ekka-admin/vendor-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Dec 2024 08:27:53 GMT -->

</html>