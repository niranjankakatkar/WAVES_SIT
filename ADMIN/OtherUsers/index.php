<?php
include '../../niru_collection.php';

$user_type = "";
if ($_GET['id'] == 1) {
	$user_type = 'Wholesaler';
} else if ($_GET['id'] == 2) {
	$user_type = 'Mega Restaurant';
} else if ($_GET['id'] == 3) {
	$user_type = 'Shopkeeper';
}


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

	$full_name = $_POST['full_name'];
	$email = $_POST['email'];
	$mobile_no = $_POST['mobile_no'];
	$password = $_POST['password'];
	$id = $_POST['customer_id'];

	$flag = "1";
	$key_ = generateRandomString(20);

	/*$image=$_FILES['category_img']['name']; 
				$imageArr=explode('.',$image); //first index is file name and second index file type
				$rand=rand(100000,999999);
				$newImageName=$rand.'.'.$imageArr[1];
				$uploadPath="../uploads/category/".$newImageName;
				$isUploaded=move_uploaded_file($_FILES["category_img"]["tmp_name"],$uploadPath);
	 */

	$sql = "UPDATE user_master set full_name='$full_name',email='$email',mobile_no='$mobile_no', password='$password'  where id='$id'";
	echo "" . $sql;
	if ($conn->query($sql)) {

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
							<h1><?= $user_type ?> List</h1>
							<p class="breadcrumbs"><span><a href="../Dashboard">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span><?= $user_type ?>
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
													<th>Profile</th>
													<th>Name</th>
													<th>Email</th>
													<th>Mobile Number</th>
													<th>KYC</th>
													<th>Status</th>
													<th>Join On</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>

												<?php
												$sql = "SELECT * FROM user_master where user_type='$user_type' AND flag='1'";
												$result = mysqli_query($conn, $sql);
												while ($row = mysqli_fetch_assoc($result)) {
													$timepstamp = $row['timestamp'];
													$timepstamp = date_create("" . $timepstamp);
													$join = date_format($timepstamp, "d-M-Y H:i");
													$flag=$row['flag'];
													if($flag=="1"){
														$flag="Active";
													}else{
														$flag="Deactive";
													}
													?>
													<tr>
														<td><img class="vendor-thumb" src="../assets/img/vendor/u1.jpg"
																alt="vendor image" /></td>
														<td><?= $row['full_name'] ?></td>
														<td><?= $row['email'] ?></td>
														<td><?= $row['mobile_no'] ?></td>
														<td>No</td>
														<td><?=$flag?></td>
														<td><?= $join ?></td>
														<td>
															<div class="btn-group">
																<button type="button"
																	onclick="window.location.href='ProfileView.php?id=<?= $row['token_key'] ?>'"
																	class="btn btn-outline-success">Info</button>
																<button type="button"
																	class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
																	data-bs-toggle="dropdown" aria-haspopup="true"
																	aria-expanded="false" data-display="static">
																	<span class="sr-only">Info</span>
																</button>

																
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
										<h5 class="modal-title" id="exampleModalCenterTitle">Add New <?= $user_type ?>
										</h5>
									</div>

									<div class="modal-body px-4">
										<div class="form-group row mb-6">
											<label for="coverImage"
												class="col-sm-4 col-lg-2 col-form-label"><?= $user_type ?> Image</label>

											<div class="col-sm-8 col-lg-10">
												<div class="custom-file mb-1">
													<input type="file" class="custom-file-input" id="coverImage"
														required>
													<label class="custom-file-label" for="coverImage">Choose
														file...</label>
													<div class="invalid-feedback">Please upload an image file.</div>
												</div>
											</div>
										</div>

										<input type="hidden" name="customer_id" id="customer_id" value="">

										<div class="row mb-2">
											<div class="col-lg-6">
												<div class="form-group">
													<label for="full_name">Full Name</label>
													<input type="text" class="form-control" id="full_name"
														name="full_name" pattern="[a-zA-Z\s]+"
														title="Full Name should only contain alphabets." required>
													<div class="invalid-feedback">Please enter a valid name (alphabets
														only).</div>
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

											<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="email">Email</label>
													<input type="email" class="form-control" id="email" name="email"
														value="" required>
													<div class="invalid-feedback">Please enter a valid email address.
													</div>
												</div>
											</div>

											<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="mobile_no">Mobile Number</label>
													<input type="text" class="form-control" id="mobile_no"
														name="mobile_no" pattern="\d{10}"
														title="Mobile number should be 10 digits." required>
													<div class="invalid-feedback">Please enter a 10-digit mobile number.
													</div>
												</div>
											</div>

											<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="password">Password</label>
													<div class="input-group">
														<input type="password" class="form-control" id="password"
															name="password" minlength="6" required>
														<span class="input-group-text" id="toggle-password"
															style="cursor: pointer; user-select: none;">
															Show
														</span>
														<div class="invalid-feedback">Password must be at least 6
															characters long.</div>
													</div>
												</div>
											</div>
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

			let form = $("#formId");
			let url = "get otherusers_data.php";

			$.ajax({
				type: "POST",
				url: url,
				data: { customer_id: id }, // Serialize form data
				success: function (data) {
					console.log('my message' + data);
					let mydata = data.split("__AJAX-");
					var fullname = mydata[1];
					var email = mydata[2];
					var mobile_no = mydata[3];
					var password = mydata[4];
					document.getElementById("full_name").value = fullname;
					document.getElementById("email").value = email;
					document.getElementById("mobile_no").value = mobile_no;
					document.getElementById("password").value = password;
					document.getElementById("customer_id").value = id;


					if (ans == 0) {

						document.getElementById("login_responce").innerHTML = "<span style='color:green'>Login Done</span>";
						window.location.href = '../';



					} else if (ans_ == 0) {
						document.getElementById("login_responce").innerHTML = "<span style='color:orange'>Account is not activated</span>";

					} else {
						document.getElementById("login_responce").innerHTML = "<span style='color:red'>Entered credentials are invalid</span>";

					}
				},
				error: function (data) {
					alert("Error occurred while submitting the form");
				}
			});


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