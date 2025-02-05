<?php 

include '../niru_collection.php';


   
echo "__AJAX-";

$username=$_POST['username'];
$password=$_POST['password'];
$token_key=givedataMulti($conn,"user_master"," email='$username' AND password='$password'","token_key");
$flag=givedata($conn,"user_master","token_key",$token_key,"flag");

if($flag!="")
{
	if($flag==1)
	{  
		$_SESSION['tokenID']=$token_key;
		$_SESSION['guesst_login_KEY']=$token_key;
		if($_POST["remember_me"]=='1' || $_POST["remember_me"]=='on')
                    {
                   		 setcookie('username', $username);
                         setcookie('password', $password);
                    }

		echo "Done"; 
	}else{  
		echo "Done-1"; 
		 }
	
}else{
	
	echo "error";
	
}	
	
									
			


?> 