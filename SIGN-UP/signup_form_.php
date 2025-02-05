<?php 

include '../niru_collection.php';


   
echo "__AJAX-";

$company_name = $_POST['company_name'];
$business_type = $_POST['business_type'];
$product_sell = $_POST['product_sell'];
$year_established = $_POST['year_established'];
$website = $_POST['website'];
$hear_about_us = $_POST['hear_about_us'];
$que_ans = $_POST['que_ans'];

$address = $_POST['address_1'];
$address2 = $_POST['address_2'];
$country = $_POST['country'];
$city = $_POST['city'];
$pincode = $_POST['post_code'];
$nation = $_POST['nation'];

	$full_name = $_POST['full_name1'];
	$email=$_POST['email1'];
	$mobile_no=$_POST['mobile_no1'];
    $password=$_POST['password1'];
    $user_type=$_POST['user_type'];
	$vat_number=$_POST['vat_number1'];
	$flag="0";
	$key_=generateRandomCHAR_INT(10);
	$otp=generateRandomINT(6);
	
	$url_id="";
	$avl=givedataMulti($conn,"user_master"," mobile_no='$mobile_no' AND user_type='$user_type'","id");
	$flag_=givedataMulti($conn,"user_master"," mobile_no='$mobile_no' AND user_type='$user_type'","flag");
 
	if($avl=="" || $flag_=="0" )
	{
		
		
		$sql="INSERT INTO user_master(full_name,email,mobile_no,password,user_type,vat_number,token_key,OTP,flag,company_name,business_type,product_sell,year_established,website,hear_about_us,que_ans) 
        	VALUES('$full_name','$email','$mobile_no','$password','$user_type', '$vat_number' ,  '$key_','$otp','0','$company_name','$business_type','$product_sell','$year_established','$website','$hear_about_us','$que_ans')";
        if($conn->query($sql))
		{

            $sql_="INSERT INTO address_master(user_token_id,address,address2,country,city,pincode,nation,flag) 
        	VALUES('$key_','$address','$address2','$country','$city', '$pincode' ,  '$nation','1')";
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