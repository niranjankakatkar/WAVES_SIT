<?php include '../niru_collection.php';
 ?>



<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	  $username = $_POST['username'];
    $password = $_POST['password'];
   
    $flag=givedataMulti($conn,"admin_login"," username='$username' AND password='$password'","id");
	$token=givedataMulti($conn,"admin_login"," username='$username' AND password='$password'","token");
    if($flag=="")
    {
        
            ?>
           <script>
    alert("Login Fail");
    </script>
			
		    <?php
       
       
    }else
    {
      $_SESSION['token']="".$token;
      $_SESSION['loginID']="".$flag;
     ?>

     
        <script> 
            window.location.href="Dashboard"; 
            </script>
            
              <?php
      
        
    }
		
		
	
												
			
}


?>
<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from maraviyainfotech.com/projects/ekka/ekka-v37/ekka-admin/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Dec 2024 08:28:06 GMT -->
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

		<link href="assets/cdn.jsdelivr.net/npm/%40mdi/font%404.4.95/css/materialdesignicons.min.css" rel="stylesheet" />
		
		<!-- Ekka CSS -->
		<link id="ekka-css" rel="stylesheet" href="assets/css/ekka.css" />
		
		<!-- FAVICON -->
		<link href="assets/img/favicon.png" rel="shortcut icon" />
	</head>
	
	<body class="sign-inup" id="body" >
			
		<div class="container d-flex align-items-center justify-content-center form-height-login ">
		
			<div class="row justify-content-center">
				
				<div class="col-lg-8 col-md-12">
				<img src="../assets/images/logo/Waves%20Logo%20Jpg.jpg" style="width:100%"><br>
	
					<div class="card">
						<div class="card-header bg-primary" style="margin-bottom:-20px;">
						<h2 class="text-dark mb-6" style="padding-top:10px;">Sign In</h2>
						</div >
						<div class="card-body p-5">
							
							<form method="POST">
								<div class="row">
									<div class="form-group col-md-12 mb-4"><br><br>
										<input type="email" class="form-control" name="username" placeholder="Username" required>
									</div>
									
									<div class="form-group col-md-12 ">
										<input type="password" class="form-control" name="password" placeholder="Password" required>
									</div>
									
									<div class="col-md-12">
										
										
										<button type="submit" class="btn btn-primary btn-block mb-4">Sign In</button>
										
									
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<!-- Javascript -->
		<script src="assets/plugins/jquery/jquery-3.5.1.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/plugins/jquery-zoom/jquery.zoom.min.js"></script>
		<script src="assets/plugins/slick/slick.min.js"></script>
	
		<!-- Ekka Custom -->	
		<script src="assets/js/ekka.js"></script>
	</body>

<!-- Mirrored from maraviyainfotech.com/projects/ekka/ekka-v37/ekka-admin/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Dec 2024 08:28:07 GMT -->
</html>