<?php
include '../../niru_collection.php';


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$url_id=$_GET["id"];

	$prep_by = "ADMIN";//$_SESSION['token'];
	$title=$_POST['title'];
	$display_msg=$_POST['display_msg'];
	
	$flag="1";
	$key_=generateRandomString(20);
	
	
	$sql="UPDATE popup_notification set title='$title',display_msg='$display_msg' where id='1'";
		if($conn->query($sql))
        {
            ?>
			    <script>alert("Popup Notification updated"); window.location.href="../ADVERTISEMENT/popup.php"; </script>
		    <?php
        }
											
			
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from maraviyainfotech.com/projects/ekka/ekka-v37/ekka-admin/product-add.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Dec 2024 08:27:58 GMT -->
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

	<!-- ekka CSS -->
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
					<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
						<div>
							<h1>Add/Edit Popup Notification</h1>
							<p class="breadcrumbs"><span><a href="../Dashboard">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Advertisement</p>
						</div>
						
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card card-default">
								<div class="card-header card-header-border-bottom">
									<h2>Add/Edit Popup Notification</h2>
								</div>

								<div class="card-body">
									<div class="row ec-vendor-uploads">
									<form class="row c-vendor-uploads  needs-validation"  enctype="multipart/form-data"  method="POST">
											
											<div class="col-lg-12">
												<div class="row ec-vendor-upload-detail">
													
														<div class="col-md-6">
															<label for="product_name" class="form-label">Title</label>
															<input type="text" class="form-control slug-title" id="title" name="title" value="<?=givedata($conn,"popup_notification","id",$url_id,"title");?>" required>
															<div class="invalid-feedback">Please provide a valid Banner Title.</div>
														</div>
                                                        <div class="col-md-12">
                                                        
															<label for="product_name" class="form-label">Desplay Content</label>
															<textarea class="form-control" name="display_msg" rows="2"><?=givedata($conn,"popup_notification","id",$url_id,"display_msg");?></textarea>
															<div class="invalid-feedback">Please provide a valid Banner Discount.</div>
														</div>
														
														
														
														
													
													
														<div class="col-md-12">
                                                            <br>
															<button type="submit" class="btn btn-primary">Submit</button>
														</div>
													
												</div>
											</div>
											</form>
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
	<script src="../assets/plugins/tags-input/bootstrap-tagsinput.js"></script>
	<script src="../assets/plugins/simplebar/simplebar.min.js"></script>
	<script src="../assets/plugins/jquery-zoom/jquery.zoom.min.js"></script>
	<script src="../assets/plugins/slick/slick.min.js"></script>

	<!-- Option Switcher -->
	<script src="../assets/plugins/options-sidebar/optionswitcher.js"></script>

	<!-- Ekka Custom -->
	<script src="../assets/js/ekka.js"></script>

	<script>
  (function () {
    const form = document.querySelector(".needs-validation");

    form.addEventListener("submit", function (event) {
      // Prevent submission if the form is invalid
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }

      // Apply Bootstrap's 'was-validated' class for styling
      form.classList.add("was-validated");
    }, false);
  })();
</script>

</body>


<!-- Mirrored from maraviyainfotech.com/projects/ekka/ekka-v37/ekka-admin/product-add.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Dec 2024 08:27:59 GMT -->
</html>