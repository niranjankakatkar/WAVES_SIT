<?php

include '../../niru_collection.php';

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">





<!-- Mirrored from maraviyainfotech.com/projects/ekka/ekka-v37/ekka-admin/product-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Dec 2024 08:27:59 GMT -->

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



	<!-- No Extra plugin used -->



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

							<h1>Product</h1>

							<p class="breadcrumbs"><span><a href="../Dashboard">Home</a></span>

								<span><i class="mdi mdi-chevron-right"></i></span>Stock</p>

						</div>

						

					</div>

					<div class="row">

						<div class="col-12">

							<div class="card card-default">

								<div class="card-body">

									<div class="table-responsive">

										<table id="responsive-data-table" class="table"

											style="width:100%">

											<thead>

												<tr>

													<th>Sr.No.</th>

													<th>Product Name</th>

													<th>Category</th>

													<th>Sub Caregory</th>

													<th>Price</th>

													<th>Avl Qty</th>

													<th>Status</th>

													<th>Action</th>

												</tr>

											</thead>



											<tbody>

											<?php

											$i=1;

										   $sql = "SELECT * FROM products ORDER BY id DESC";

										   $result = mysqli_query($conn, $sql);

										   while($row = mysqli_fetch_assoc($result)) {
										

											$timepstamp=$row['timestamp'];

											$timepstamp=date_create("".$timepstamp);

											$img = "";

											if(file_exists($row['filepath'])==1)

											{

												$img=$row['filepath'];

											}

											else{

												$img="../../assets/images/no_image.jpg";

												

											}

											 

											 ?>

												<tr>

													<td><?=$i++?></td>

													<td><img class="tbl-thumb" style="height:100px;width:auto" src="<?=$img?>" alt="Product Image" /><br><?=$row['product_title']?></td>

													<td><?= givedata($conn, "category", "id", $row['category_id'], "category_title"); ?></td>

													<td><?= givedata($conn, "sub_category", "id", $row['sub_category_id'], "sub_category_title"); ?></td>

													<td>Retailer: <?=$row['retail_rate']?><br>

													Wholesaler: <?=$row['wholsell_rate']?><br>

													Hoteling: <?=$row['hoteling_rate']?><br>

													Shop: <?=$row['shop_rate']?><br></td>

													<td><?=$row['retail_qty']?><br>

													<?=$row['wholsell_qty']?><br>

													<?=$row['hoteling_qty']?><br>

													<?=$row['shop_qty']?><br></td>

													<td><?php

														if($row['flag']==1){

													?>

													ACTIVE</td>

														<?php

														}else{

															?>

													Deactive</td>

														<?php

														}?></td>

													

													<td>

														<div class="btn-group mb-1">

															<button type="button"

																class="btn btn-outline-success">Info</button>

															<button type="button"

																class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"

																data-bs-toggle="dropdown" aria-haspopup="true"

																aria-expanded="false" data-display="static">

																<span class="sr-only">Info</span>

															</button>



															<div class="dropdown-menu">

																<a class="dropdown-item" href="add.php?id=<?=$row['key_']?>">Edit</a>

																

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



	<!-- Datatables -->

	<script src='../assets/plugins/data-tables/jquery.datatables.min.js'></script>

	<script src='../assets/plugins/data-tables/datatables.bootstrap5.min.js'></script>

	<script src='../assets/plugins/data-tables/datatables.responsive.min.js'></script>



	<!-- Option Switcher -->

	<script src="../assets/plugins/options-sidebar/optionswitcher.js"></script>



	<!-- Ekka Custom -->

	<script src="../assets/js/ekka.js"></script>

</body>





<!-- Mirrored from maraviyainfotech.com/projects/ekka/ekka-v37/ekka-admin/product-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Dec 2024 08:28:02 GMT -->

</html>