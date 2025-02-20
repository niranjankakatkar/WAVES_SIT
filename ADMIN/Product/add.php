<?php
include '../../niru_collection.php';

$url_id=$_GET["id"];
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	

	$prep_by = "ADMIN";//$_SESSION['token'];
	$product_title=$_POST['product_title'];
	$description=$_POST['description'];
	$retail_rate=$_POST['retail_rate'];
	$wholsell_rate=$_POST['wholsell_rate'];
	$hoteling_rate=$_POST['hoteling_rate'];
	$shop_rate=$_POST['shop_rate'];
	$retail_qty=$_POST['retail_qty'];
	$wholsell_qty=$_POST['wholsell_qty'];
	$hoteling_qty=$_POST['hoteling_qty'];
	$shop_qty=$_POST['shop_qty'];
	$color=$_POST['color'];
	$urlid=$_POST['urlid'];
	$dimensions=$_POST['dimensions'];
	
	$sub_category_id=$_POST['sub_category_id'];
	$category_id=givedata($conn,"sub_category","id", $sub_category_id,"category_id");
	$flag=$_POST['flag'];
	$key_=generateRandomString(20);
	$filepath=givedata($conn,"products","id", $urlid,"filepath");
	$uploadPath="";
	

			$image=$_FILES['product_img']['name']; 
			 $imageArr=explode('.',$image); //first index is file name and second index file type
			 $rand=rand(100000,999999);
			 $newImageName=$rand.'.'.$imageArr[1];
			 $uploadPath="../uploads/products/".$newImageName;
			 $isUploaded=move_uploaded_file($_FILES["product_img"]["tmp_name"],$uploadPath);
	
 
	if($urlid=="")
	{
		$sql="INSERT INTO products(product_title,description,retail_rate,wholsell_rate,hoteling_rate,shop_rate,retail_qty,wholsell_qty,hoteling_qty,shop_qty,color,dimensions,category_id,sub_category_id,filepath,flag,prep_by,key_) VALUES('$product_title','$description','$retail_rate','$wholsell_rate','$hoteling_rate','$shop_rate','$retail_qty','$wholsell_qty','$hoteling_qty','$shop_qty','$color','$dimensions','$category_id','$sub_category_id','$uploadPath','$flag','$prep_by','$key_')";
		if($conn->query($sql))
		{
		 
		  ?>		  
		 <script>alert("New Product Added"); window.location.href="../Product/"; </script>
		  <?php
		}
	}else{
		$sql="UPDATE products set product_title='$product_title',description='$description',flag='$flag',filepath='$uploadPath' where id='$urlid'";
		if($conn->query($sql))
        {
            ?>
			    <script>alert("Product Details Updated"); window.location.href="../Product/"; </script>
		    <?php
        }
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
						<h1><?php if($url_id==""){ echo "Add";}else{ echo "Edit";}?> Product Details</h1>
						<p class="breadcrumbs"><span><a href="../Dashboard">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Product</p>
						</div>
						<div>
							<a href="../Product" class="btn btn-primary"> View All
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card card-default">
								<div class="card-header card-header-border-bottom">
								<h2><?php if($url_id==""){ echo "Add";}else{ echo "Edit";}?> Product Details</h2>

								</div>

								<div class="card-body">
									<div class="row ec-vendor-uploads">
									<form method="POST" class="row c-vender-uploads needs-validation" enctype="multipart/form-data" novalidate>
	<input type="hidden" value="<?=givedata($conn,"products","key_",$url_id,"id")?>" name="urlid" id="urlid">
									<div class="col-lg-4">
												<div class="ec-vendor-img-upload">
													<div class="ec-vendor-main-img">
														<div class="avatar-upload">
															<div class="avatar-edit">
															<?php
																	$filepath=givedata($conn,"products","key_",$url_id,"filepath");

																		if($filepath==""){
																			
																		$filepath="../assets/img/products/vender-upload-preview.jpg";
																			
																		}
																	?>
																<input type='file' value="<?=$filepath?>" id="main_img" name="product_img" class="ec-image-upload"
																	accept=".png, .jpg, .jpeg"  />
																<label for="imageUpload"><img
																		src="../assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
															</div>
															<div class="avatar-preview ec-preview">
																<div class="imagePreview ec-div-preview">
																	
																	<img class="ec-image-preview"
																		src="<?=$filepath?>"
																		alt="edit" />
																</div>
															</div>
														</div>
													
													</div>
												</div>
											</div>
											
											<div class="col-lg-8">
												<div class="row ec-vendor-upload-detail">
													
														<div class="col-md-6">
															<label for="product_name" class="form-label">Product name</label>
															<input type="text" class="form-control slug-title" id="product_title" name="product_title" value="<?=givedata($conn,"products","key_",$url_id,"product_title")?>" required>
															<div class="invalid-feedback">Please provide a valid product name.</div>
														</div>
														<div class="col-md-6">
															<label class="form-label">Select Categories</label>
															<select name="sub_category_id" id="sub_category_id" class="form-select" required>
																<?php
																
																if($url_id!="")
																{
																	$sub_category_id=givedata($conn,"products","key_",$url_id,"sub_category_id");

																			?>
																				<option value="<?=$sub_category_id?>"><?=givedata($conn,"sub_category","id",$sub_category_id,"sub_category_title")?></option>
																			<?php
																}else{
																	?>
																	<option value="">Select Category</option>
																<?php
																}
																	$sql = "SELECT * FROM category where flag='1' ORDER BY seq";
																	$result = mysqli_query($conn, $sql);
																	while($row = mysqli_fetch_assoc($result)) {
																		$cid=$row['id'];
																	?>
																	<optgroup label="<?=$row['category_title']?>">
																		<?php
																			$sql1 = "SELECT * FROM sub_category where category_id='$cid' AND flag='1'  ORDER BY seq";
																			$result1 = mysqli_query($conn, $sql1);
																			while($row1 = mysqli_fetch_assoc($result1)) {
																			?>
																				<option value="<?=$row1['id']?>"><?=$row1['sub_category_title']?></option>
																			<?php
																			}
																	} 
																?>
																</optgroup>
																
															</select>
															<div class="invalid-feedback">Please select a Select Categories.</div>
														</div><br>
														<div class="col-md-12">
															<label for="slug" class="col-12 col-form-label">Slug</label> 
															<div class="col-12">
																<input id="slug" name="slug" class="form-control here set-slug" type="text" value="<?=givedata($conn,"products","key_",$url_id,"product_title")?>" required>
																<div class="invalid-feedback">Please provide a valid slug.</div>
															</div>
														</div>
														<div class="col-md-12">
														<br>
															<label class="form-label">Sort Description</label>
															<textarea class="form-control" rows="2"><?=givedata($conn,"products","key_",$url_id,"description")?></textarea>
														</div>
														<div class="col-md-4 mb-25"><br>
															<label class="form-label">Colors</label>
															<input type="color" class="form-control form-control-color"
																id="color" name="color" value="<?=givedata($conn,"products","key_",$url_id,"color")?>"
																title="Choose your color" required>
																<div class="invalid-feedback">Please provide a color.</div>
														</div>
														<div class="col-md-8 mb-25"><br>
															<label class="form-label">Dimensions</label>
															<input type="text" class="form-control slug-title" id="dimensions" name="dimensions" value="<?=givedata($conn,"products","key_",$url_id,"dimensions")?>" required>
															<div class="invalid-feedback">Please provide a valid Dimensions.</div>
														</div><br>
														<div class="col-md-6"><br>
															<label class="form-label">Retailer Price <span>( In POUND
																	)</span></label>
															<input type="number" min="0" step="0.01"  class="form-control" id="retail_rate" name="retail_rate" value="<?=givedata($conn,"products","key_",$url_id,"retail_rate")?>" required>
															<div class="invalid-feedback">Please provide a valid Retailer Price.</div>
														</div>
														<div class="col-md-6"><br>
															<label class="form-label">Retailer Min Quantity</label>
															<input type="number" min="0" step="0.01" class="form-control" id="retail_qty" name="retail_qty" value="<?=givedata($conn,"products","key_",$url_id,"retail_qty")?>" required>
															<div class="invalid-feedback">Please provide a valid Retailer Min Quantity</div>
														</div>
														<div class="col-md-6"><br>
															<label class="form-label">Wholesaler Price <span>( In POUND
																	)</span></label>
															<input type="number" min="0" step="0.01" class="form-control" id="wholsell_rate" name="wholsell_rate" value="<?=givedata($conn,"products","key_",$url_id,"wholsell_rate")?>" required>
															<div class="invalid-feedback">Please provide a valid Wholesaler Price.</div>
														</div>
														<div class="col-md-6"><br>
															<label class="form-label">Wholesaler Min Quantity</label>
															<input type="number" min="0" step="0.01" class="form-control" id="wholsell_qty" name="wholsell_qty" value="<?=givedata($conn,"products","key_",$url_id,"wholsell_qty")?>" required>
															<div class="invalid-feedback">Please provide a valid Wholesaler Min Quantity.</div>
														</div>
														<div class="col-md-6"><br>
															<label class="form-label">Hoteling Price <span>( In POUND
																	)</span></label>
															<input type="number" min="0" step="0.01" class="form-control" id="hoteling_rate" name="hoteling_rate" value="<?=givedata($conn,"products","key_",$url_id,"hoteling_rate")?>" required>
															<div class="invalid-feedback">Please provide a valid Hoteling Price.</div>
														</div>
														<div class="col-md-6"><br>
															<label class="form-label">Hoteling Min Quantity</label>
															<input type="number" min="0" step="0.01"  class="form-control" id="hoteling_qty" name="hoteling_qty" value="<?=givedata($conn,"products","key_",$url_id,"hoteling_qty")?>" required>
															<div class="invalid-feedback">Please provide a valid Hoteling Min Quantity.</div>
														</div>
														<div class="col-md-6"><br>
															<label class="form-label">Shop Price <span>( In POUND
																	)</span></label>
															<input type="number" min="0"  step="0.01" class="form-control" id="shop_rate" name="shop_rate" value="<?=givedata($conn,"products","key_",$url_id,"shop_rate")?>" required>
															<div class="invalid-feedback">Please provide a valid Shop Price.</div>
														</div>
														<div class="col-md-6"><br>
															<label class="form-label">Shop Min Quantity</label>
															<input type="number" min="0"  step="0.01" class="form-control" id="shop_qty" name="shop_qty" value="<?=givedata($conn,"products","key_",$url_id,"shop_qty")?>" required>
															<div class="invalid-feedback">Please provide a valid Shop Min Quantity.</div>
														</div>
														<div class="col-md-12"><br>
															<label class="form-label">Full Detail</label>
															<textarea class="form-control" rows="4" name="description"><?=givedata($conn,"products","key_",$url_id,"description")?></textarea>
														</div>
													

														<div class="form-group row">
																<label class="col-12 col-form-label">Status</label>
																<div class="col-12">
																<?php
																	$flag=givedata($conn,"products","key_",$url_id,"flag");
																	?>
																	<div class="form-check">
																		<input type="radio" id="active" name="flag" <?php if($flag==1){ echo "checked";} ?> value="1" class="radio-button__input">
																		<label for="active" class="form-check-label">Active</label>
																	</div>
																	<div class="form-check">
																		<input type="radio" id="inactive" name="flag" <?php if($flag==0){ echo "checked";} ?> value="0" class="radio-button__input">
																		<label for="inactive" class="form-check-label">Deactive</label>
																	</div>
																</div>
														</div>
														<div class="col-md-12">
														<?php
													if($_GET['id']==""){
														?>
														<button name="submit" type="submit" class="btn btn-primary">Submit</button>
														<?php
													}else{
														?>
														<button name="submit" type="submit" class="btn btn-success">Update</button>
														<?php
													}
													?>
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