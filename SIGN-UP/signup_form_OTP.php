<?php 

include '../niru_collection.php';


   
echo "__AJAX-";

	$user_otp = $_POST['user_otp'];
    
	$key = $_POST['signupkey'];
	
    $sysOTP=givedata($conn,"user_master","token_key",$key,"OTP");
	$mob=givedata($conn,"user_master","token_key",$key,"mobile_no");
	
	$url_id="";
  
	if($sysOTP === $user_otp)
	{
		$sql="update user_master set flag='1' where token_key='$key'";
        if($conn->query($sql))
		{
			$sql="DELETE FROM user_master where mobile_no='$mob' AND token_key!='$key'";
			if($conn->query($sql))
			{}
            $_SESSION['guesst_login_KEY']=$key;
            $_SESSION['tokenID']=$key;
            echo "Done"; 
			
		}
	}else{
		echo "error";
	}										
			


?> 