<?php
include '../../niru_collection.php';

$url_id=$_GET['id'];
$Dflag=$_GET['Dflag'];
if($Dflag!=""){
	$filepath=givedata($conn,"category","id",$url_id,"filepath");
	
	$sql = "DELETE FROM category WHERE id='$url_id'";
	if($conn->query($sql)){
		  unlink($filepath);
		?>
		<script>window.location.href="../Category/"; </script>
		<?php
	}
}
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$prep_by = "ADMIN";//$_SESSION['token'];
	$category_title=$_POST['category_title'];
	$description=$_POST['description'];
	$flag= $_POST['flag'];
	$key_=generateRandomString(20);
	
	$image=$_FILES['category_img']['name']; 
			 $imageArr=explode('.',$image); //first index is file name and second index file type
			 $rand=rand(100000,999999);
			 $newImageName=$rand.'.'.$imageArr[1];
			 $uploadPath="../uploads/category/".$newImageName;
			 $isUploaded=move_uploaded_file($_FILES["category_img"]["tmp_name"],$uploadPath);
  
	if($url_id=="")
	{
		$sql="INSERT INTO category(category_title,description,filepath,flag,prep_by,key_) VALUES('$category_title','$description','$uploadPath','$flag','$prep_by','$key_')";
		if($conn->query($sql))
		{
		 
		  ?>		  
		 <script>alert("New Category Added"); window.location.href="../Category/"; </script>
		  <?php
		}
	}else{
		$sql="UPDATE category set category_title='$category_title',description='$description',filepath='$uploadPath',flag='$flag' where id='$url_id'";
		
       if($conn->query($sql))
        {
            ?>
			    <script>alert("Update Category Successfully");  window.location.href="../Category/"; </script>
		    <?php
        }
	}										
			
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from maraviyainfotech.com/projects/ekka/ekka-v37/ekka-admin/main-category.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Dec 2024 08:27:56 GMT -->
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

	<!-- Data Tables -->
	<link href='../assets/plugins/data-tables/datatables.bootstrap5.min.css' rel='stylesheet'>
	<link href='../assets/plugins/data-tables/responsive.datatables.min.css' rel='stylesheet'>

	<!-- ekka CSS -->
	<link id="ekka-css" rel="stylesheet" href="../assets/css/ekka.css" />

	<!-- FAVICON -->
	<link href="../assets/img/favicon.png" rel="shortcut icon" />
	<script src="../assets/js/sweetalert2@11"></script>

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
					<div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
							<h1>Main Category</h1>
							<p class="breadcrumbs"><span><a href="../Dashboard">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Main Category</p>
					</div>
					<div class="row">
						<div class="col-xl-4 col-lg-12">
							<div class="ec-cat-list card card-default mb-24px">
								<div class="card-body">
									<div class="ec-cat-form">
										<h4><?php if($url_id==""){ echo "Add";}else{ echo "Edit";}?> Category Details</h4>

										<form method="POST" class="form needs-validation" enctype="multipart/form-data" novalidate>
                                  
											<div class="form-group row">
												<label for="text" class="col-12 col-form-label">Name</label> 
												<div class="col-12">
													<input  name="category_title" id="category_title" value="<?=givedata($conn,"category","id",$url_id,"category_title");?>" class="form-control here slug-title" type="text" required >
													<div class="invalid-feedback">Please provide a valid name.</div>
												</div>
											</div>

										

											<div class="form-group row">
												<label class="col-12 col-form-label">Sort Description</label> 
												<div class="col-12">
													<textarea id="description" name="description" cols="40" rows="2" class="form-control"><?=givedata($conn,"category","id",$url_id,"description");?></textarea>
												</div>
											</div> 

											<div class="form-group row">
												<label class="col-12 col-form-label">Full Description</label> 
												<div class="col-12">
													<textarea id="fulldescription" name="fulldescription" cols="40" rows="4" class="form-control"><?=givedata($conn,"category","id",$url_id,"description");?></textarea>
												</div>
											</div> 

											<div class="form-group row">
												<label class="col-12 col-form-label">Image <span>( JPEG/PNG )</span></label>
												<div class="col-12">
													<input type="file" class="form-control" id="category_img" name="category_img" accept="image/png, image/jpeg" placeholder="" required>
													<div class="invalid-feedback">Please upload a valid image file (JPEG/PNG).</div>
												</div>
											</div>

											<div class="form-group row">
																<label class="col-12 col-form-label">Status</label>
																<div class="col-12">
																	<?php
																	$flag=givedata($conn,"category","id",$url_id,"flag");
																	if($flag==""){
																		$flag=1;
																	}
																	?>
																	<div class="form-check">
																		<input type="radio" id="active" name="flag" <?php if($flag==1 ){ echo "checked";} ?> value="1" class="radio-button__input">
																		<label for="active" class="form-check-label">Active</label>
																	</div>
																	<div class="form-check">
																		<input type="radio" id="inactive" name="flag" <?php if($flag==0 ){ echo "checked";} ?> value="0" class="radio-button__input">
																		<label for="inactive" class="form-check-label">Deactive</label>
																	</div>
																</div>
														</div>

											<div class="row">
												<div class="col-12">
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

										</form>

									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-8 col-lg-12">
							<div class="ec-cat-list card card-default">
								<div class="card-body">
									<div class="table-responsive">
										<table id="responsive-data-table" class="table">
											<thead>
												<tr>
													<th>Thumb</th>
													<th>Name</th>
													<th>Sub Categories</th>
													<th>Product</th>
													
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
											<?php
										   $sql = "SELECT * FROM category ORDER BY id DESC";
										   $result = mysqli_query($conn, $sql);
										   
									   
											   while($row = mysqli_fetch_assoc($result)) {
												   $timepstamp=$row['timestamp'];
													$timepstamp=date_create("".$timepstamp);
			  								 ?>
												<tr>
													<td><img class="cat-thumb" src="<?=$row['filepath']?>" alt="Category Image" /></td>
													<td><?=$row['category_title']?></td>
													<td>
														<span class="ec-sub-cat-list">
														<span class="ec-sub-cat-count" title="Total Sub Categories"><?=retrivecount($conn,"sub_category"," where category_id='$row[id]'")?></span>
														
														</span>
													</td>
													<td><?=retrivecount($conn,"products"," where category_id=$row[id]")?></td>
													
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
																<a class="dropdown-item" href="?id=<?=$row['id']?>">Edit</a>
																<a class="dropdown-item" href="?id=<?=$row['id']?>&Dflag=1">Delete</a>
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

			
			<footer class="footer mt-auto">
                <div class="copyright bg-white">
				<p>
                        Copyright &copy; <span id="ec-year"></span><a class="text-primary"
                            href="#" target="_blank"> Waves Packaging Dashboard</a>. All Rights Reserved.
                    </p>
                </div>
            </footer>


		</div>

	</div>

	
	<script src="../assets/plugins/jquery/jquery-3.5.1.min.js"></script>
	<script src="../assets/js/bootstrap.bundle.min.js"></script>
	<script src="../assets/plugins/tags-input/bootstrap-tagsinput.js"></script>
	<script src="../assets/plugins/simplebar/simplebar.min.js"></script>
	<script src="../assets/plugins/jquery-zoom/jquery.zoom.min.js"></script>
	<script src="../assets/plugins/slick/slick.min.js"></script>

	
	<script src='../assets/plugins/data-tables/jquery.datatables.min.js'></script>
	<script src='../assets/plugins/data-tables/datatables.bootstrap5.min.js'></script>
	<script src='../assets/plugins/data-tables/datatables.responsive.min.js'></script>


	<script src="../assets/plugins/options-sidebar/optionswitcher.js"></script>

	<script src="../assets/js/ekka.js"></script>



<script>
  // Custom form validation
  (function () {
    const form = document.querySelector(".needs-validation");
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

</html>