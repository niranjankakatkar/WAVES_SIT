<?php 

include '../niru_collection.php';


   
echo "__AJAX-";

	$product_key = $_POST['product_key'];
	$login_key=$_POST['login_key'];
    $qty=1;
   
	$url_id=givedataMulti($conn,"cart_master"," product_key='$product_key' AND login_key='$login_key'","qty");;
  
	if($url_id=="")
	{
        $rate=givedata($conn,"products","key_",$product_key,"retail_rate");
      
        $total=$rate*$qty;
		$sql="INSERT INTO cart_master(product_key,login_key,qty,rate,total,flag) VALUES('$product_key','$login_key','$qty','$rate','$total','1')";
      //echo ''.$sql;
		if($conn->query($sql))
		{
            echo "Done"; 
		}
	}else{
		echo "error";
	}										
			


?> 