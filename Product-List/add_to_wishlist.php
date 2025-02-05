<?php 

include '../niru_collection.php';


   
echo "__AJAX-";

	$product_key = $_POST['pid'];
	$login_key=$_SESSION['guesst_login_KEY'];
    $qty=1;
   
	$avlKey=givedataMulti($conn,"wishlist"," product_key='$product_key' AND token_key='$login_key'","id");
	if($avlKey==""){
                                       
		$sql="INSERT INTO wishlist(token_key,product_key,flag) VALUES('$login_key','$product_key','1')";
      //echo ''.$sql;
		if($conn->query($sql))
		{
            echo "Done"; 
		}
		else{
			echo "error";
		}			
		}else{

			$sql="DELETE FROM wishlist where token_key='$login_key' AND product_key='$product_key'";
      //echo ''.$sql;
		if($conn->query($sql))
		{
            echo "Done"; 
		}
		else{
			echo "error";
		}			

		}							
			


?> 