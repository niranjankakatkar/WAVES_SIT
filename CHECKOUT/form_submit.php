<?php 

include '../niru_collection.php';


   
echo "__AJAX-";


$session_Token=givedata($conn,"user_master","token_key",$_SESSION['guesst_login_KEY'],"id");

if($session_Token==""){
	$full_name = $_POST['full_name'];
	$email=$_POST['email'];
	$address=$_POST['address'];
    $city=$_POST['city'];
    $pincode=$_POST['pincode'];
	$password=generateRandomCHAR_INT(6);
	$mobile_no="0";
	$user_type='Retailer';
	$address_id=$_POST['address_id'];
	
	$key_=$_SESSION['guesst_login_KEY'];
	$sql="INSERT INTO user_master(full_name,email,mobile_no,password,user_type,vat_number,token_key,OTP,flag) 	VALUES('$full_name','$email','$mobile_no','$password','$user_type', '' ,  '$key_','','1')";
        if($conn->query($sql))
	{
		$_SESSION['tokenID']=$key_;
		$sql="INSERT INTO address_master(user_token_id,address,city,pincode,address_type,full_name) 	VALUES('$key_','$address','$city','$pincode','Home', '$full_name')";
        if($conn->query($sql))
		{
			$address_id=givedata($conn,"address_master","user_token_id",$_SESSION['guesst_login_KEY'],"id");

		}
	}
}
	$oid = $_SESSION['OID'];
	$transaction_id=generateRandomINT(14);
    $qty=1;
    $sql="update order_master set transactionID='$transaction_id',status='pending',address_id='$address_id' where order_id='$oid'";
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