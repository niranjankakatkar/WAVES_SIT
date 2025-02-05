<?php 

include '../../niru_collection.php';


   
echo "__AJAX-";

$customer_id=$_POST['customer_id'];

$full_name=givedata($conn,"user_master","id",$customer_id,"full_name");
$email=givedata($conn,"user_master","id",$customer_id,"email");
$mobile_no=givedata($conn,"user_master","id",$customer_id,"mobile_no");
$password=givedata($conn,"user_master","id",$customer_id,"password");


if($full_name!="")
{
	echo "".$full_name;
    echo "__AJAX-";
    echo "".$email;
    echo "__AJAX-";
    echo "".$mobile_no;
    echo "__AJAX-";
    echo "".$password;
	
}else{
	
	echo "error";
	
}	
	
									
			


?> 