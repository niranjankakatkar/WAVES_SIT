<?php 

include '../niru_collection.php';


   
echo "__AJAX-";

    $id=$_POST['id'];
	$qty =givedata($conn,"cart_master","id",$_POST['id'],"qty");
    $rate =givedata($conn,"cart_master","id",$_POST['id'],"rate");
    $latest_QTY=$_POST['qty'];

    $tot=$latest_QTY*$rate;
    	
	
	$sql_="update cart_master set qty='$latest_QTY',total='$tot' where id='$id'";
	if($conn->query($sql_))
	{}

?> 