<?php 

include '../niru_collection.php';


   
echo "__AJAX-";

	$email=$_POST['email'];
    $RESET_token_key=generateRandomString(15);
	
	$reg_token=givedata($conn,"user_master","email",$email,"token_key");
    $fname=givedata($conn,"user_master","email",$email,"full_name");
    $mobile_no=givedata($conn,"user_master","email",$email,"mobile_no");
  
	if($reg_token!="")
	{
		$sql="INSERT INTO reset_keygen(RESET_token_key,reg_token,flag) VALUES('$RESET_token_key','$reg_token','0')";
        if($conn->query($sql))
		{
            echo "Done "; 
			echo "__AJAX-";
			echo "".$key_;
			echo "__AJAX-";
			$mes='Hi  '.$fname.',We’re Sending you this message because You requested a password reset. click on this link to create a new password:  https://wavespackaging.sitsolutions.co.in/RESET/?i='.$RESET_token_key.'';
	      
			$xml_data = "user=SITSol&key=b6b34d1d4dXX&mobile=$mobile_no&message=$mes&senderid=DALERT&accusage=10";
  
					  $URL = "http://redirect.ds3.in/submitsms.jsp?";
					  $ch = curl_init($URL);
					  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
					  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
					  curl_setopt($ch, CURLOPT_POST, 1);
					  curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');			
					  curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
					  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					  $output = curl_exec($ch);
					  curl_close($ch);

		}
	}else{
		echo "error".$email;
	}										
			


?> 