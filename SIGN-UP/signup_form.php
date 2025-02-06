<?php 

include '../niru_collection.php';


   
echo "__AJAX-";

	$full_name = $_POST['full_name'];
	$email=$_POST['email'];
	$mobile_no=$_POST['mobile_no'];
    $password=$_POST['password'];
    $user_type=$_POST['user_type'];
	$vat_number=$_POST['vat_number'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$pincode=$_POST['pincode'];
	$flag="0";
	$key_=generateRandomCHAR_INT(10);
	$otp=generateRandomINT(6);
	
	$url_id="";
	$avl=givedata($conn,"user_master","mobile_no",$mobile_no,"id");
	$flag_=givedata($conn,"user_master","mobile_no",$mobile_no,"flag");
  
	if($avl=="" || $flag_=="0" )
	{
		
		
		$sql="INSERT INTO user_master(full_name,email,mobile_no,password,user_type,vat_number,token_key,OTP,flag) 	VALUES('$full_name','$email','$mobile_no','$password','$user_type', '$vat_number' ,  '$key_','$otp','0')";
        if($conn->query($sql))
		{
			
			$sql_="INSERT INTO address_master(user_token_id,address,address2,country,city,pincode,nation,flag,address_type,mobile_no,full_name) VALUES('$key_','$address','','','$city', '$pincode' , '0','1','Home','$mobile_no','$full_name')";
            if($conn->query($sql_))
            {}

			$_SESSION['TEMP_MOBILE']=$mobile_no;
            echo "Done "; 
			echo "__AJAX-";
			echo "".$key_;
			echo "__AJAX-";
			$mes='Use '.$otp.' as one-time password (OTP) to verify your Account of Waves Packging';
	      
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
		echo "error";
	}										
			


?> 