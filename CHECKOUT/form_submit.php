<?php 

include '../niru_collection.php';


   
echo "__AJAX-";

	$oid = $_SESSION['OID'];
	$transaction_id=generateRandomINT(14);
    $qty=1;
    $sql="update order_master set transactionID='$transaction_id',status='done' where order_id='$oid'";
        if($conn->query($sql))
		{
            echo "Done"; 
		}
	else{
		echo "error";
	}										
		
    $sql_="DELETE from cart_master  where flag='0'";
		if($conn->query($sql_))
		{}


?> 