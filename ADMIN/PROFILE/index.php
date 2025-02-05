
<?php
include '../../niru_collection.php';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	

	$prep_by = "ADMIN";//$_SESSION['token'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mobile_no=$_POST['mobile_no'];
	$newpassword=$_POST['newpassword'];
	$userName=$_POST['username_'];

    $token=$_SESSION['token'];
	
	
    $sql="UPDATE admin_login set name='$name',email='$email',mobile_no='$mobile_no',username='$userName',password='$newpassword' where token='$token'";
	echo ''. $sql;	
	if($conn->query($sql))
        {
            ?>
			   
		    <?php
        }
		
}

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
							<h1>Profile</h1>
							<p class="breadcrumbs"><span><a href="index.html">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Profile
							</p>
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
											<h4 class="py-2 text-dark"><?=givedata($conn,"admin_login","token",$_SESSION['token'],"name")?></h4>
											<p><?=givedata($conn,"admin_login","token",$_SESSION['token'],"email")?></p>
                                            <p><?=givedata($conn,"admin_login","token",$_SESSION['token'],"mobile_no")?></p>
											<br>
										</div>
									</div>

									
									<hr class="w-100">

									<div class="contact-info pt-4">
										<h5 class="text-dark">Contact Information</h5>
										<p class="text-dark font-weight-medium pt-24px mb-2">Email address</p>
										<p><?=givedata($conn,"admin_login","token",$_SESSION['token'],"email")?></p>
										<p class="text-dark font-weight-medium pt-24px mb-2">Phone Number</p>
										<p><?=givedata($conn,"admin_login","token",$_SESSION['token'],"mobile_no")?></p>

										
									</div>
								</div>
							</div>

							<div class="col-lg-8 col-xl-9">
								<div class="profile-content-right profile-right-spacing py-5">
									<ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myProfileTab" role="tablist">
										
										<li class="nav-item" role="presentation">
											<button class="nav-link active" id="settings-tab" data-bs-toggle="tab"
												data-bs-target="#settings" type="button" role="tab"
												aria-controls="settings" aria-selected="false">Settings</button>
										</li>
									</ul>
									<div class="tab-content px-3 px-xl-5" id="myTabContent">

										

										<div class="tab-pane fade show active" id="settings" role="tabpanel"
											aria-labelledby="settings-tab">
											<div class="tab-pane-content mt-5">
												<form  method="POST">
													

													<div class="row mb-2">
														<div class="col-lg-12">
															<div class="form-group">
																<label for="firstName">Full name</label>
																<input type="text" class="form-control" id="name" name="name" value="<?=givedata($conn,"admin_login","token",$_SESSION['token'],"name")?>"
																	value="First name">
															</div>
														</div>

														
													</div>

													<div class="form-group mb-4">
														<label for="userName">Mobile Number</label>
														<input type="number" class="form-control" id="mobile_no" name="mobile_no" value="<?=givedata($conn,"admin_login","token",$_SESSION['token'],"mobile_no")?>"
															value="User name">
														
													</div>

													<div class="form-group mb-4">
														<label for="userName">User name</label>
														<input type="email" class="form-control" id="username_" name="username_" value="<?=givedata($conn,"admin_login","token",$_SESSION['token'],"username")?>"
															value="User name">
														
													</div>

													<div class="form-group mb-4">
														<label for="email">Email</label>
														<input type="email" class="form-control" id="email" name="email" value="<?=givedata($conn,"admin_login","token",$_SESSION['token'],"email")?>"
															value="ekka.example@gmail.com">
													</div>

													<div class="form-group mb-4">
														<label for="oldPassword">Old password</label>
														<input type="password" class="form-control" id="password" value="<?=givedata($conn,"admin_login","token",$_SESSION['token'],"password")?>">
													</div>

													<div class="form-group mb-4">
														<label for="newPassword">New password</label>
														<input type="password" class="form-control" id="newPassword" name="newpassword" value="<?=givedata($conn,"admin_login","token",$_SESSION['token'],"password")?>">
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