

<?php 

include '../niru_collection.php';


   
echo "__AJAX-";

$user_key=$_SESSION['guesst_login_KEY'];
$coupon_code=$_POST['coupon_code'];
$flag=givedata($conn,"coupon","coupon_code",$coupon_code,"flag");
$coupon_type= givedata($conn,"coupon","coupon_code",$coupon_code,"coupon_type");
$coupon_value = givedata($conn,"coupon","coupon_code",$coupon_code,"coupon_value");
$avl_check=givedataMulti($conn,"order_master"," user_key='$user_key' AND coupon_code='$coupon_code'","id");

$coupon_discount = 0;
$subtotal = $_POST['subtotal'];; 
$shipping_fee = ($subtotal <= 100) ? 6.99 : 0;
$grandTotal = $subtotal - $coupon_value + $shipping_fee;



if($flag!="")
{
	if($avl_check=="")
	{
		// $_SESSION['tokenID']=$coupon_code;
		echo "".$grandTotal; 
        echo "__AJAX-";
		echo "".$coupon_value; 
		echo "__AJAX-";
        echo "".$shipping_fee;
	}else{
		echo "error";	
	}
	
}else{
	
	echo "error";
	
}	
	
									
			


?>