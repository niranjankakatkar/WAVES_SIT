<?php
include 'niru_collection.php';

echo "__AJAX-"; 


    $product_key = $_POST['product_key'];
    $token_key=$_SESSION['guesst_login_KEY'];
    
    $sql="INSERT INTO wishlist (tokey_key, product_key, flag) VALUES ('$token_key','$product_key',  '1')";
        if($conn->query($sql))
		{
            echo "Done"; 
		}

?>
