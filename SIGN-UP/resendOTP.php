<?php 

include '../niru_collection.php';


   
echo "__AJAX-";


	$mob=$_SESSION['TEMP_MOBILE'];
	$otp=givedata($conn,"user_master","mobile_no",$mob,"OTP");
  
	if($avl=="")
	{
		
			$mes='Use '.$otp.' as one-time password (OTP) to verify your Account of Waves Packging';
	      
			$xml_data = "user=SITSol&key=b6b34d1d4dXX&mobile=$mob&message=$mes&senderid=DALERT&accusage=10";
  
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

		
	}else{
		echo "error";
	}										
			


?> 