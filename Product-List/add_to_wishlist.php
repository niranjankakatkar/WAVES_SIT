<?php 

include '../niru_collection.php';


   
echo "__AJAX-";

	$product_key = $_POST['product_key'];
	$login_key=$_POST['login_key'];
    $qty=1;
   
		$sql="INSERT INTO wishlist(token_key,product_key,flag) VALUES('$login_key','$product_key','1')";
      //echo ''.$sql;
		if($conn->query($sql))
		{
            echo "Done"; 
		}
	else{
		echo "error";
	}										
			


?> 