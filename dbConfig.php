<?php

//local
/*
 $dbhost = "localhost";

 $dbuser = "root";

 $dbpass = "";

 $db = "waves";
*/


 //live

 
 $dbhost = "localhost";

 $dbuser = "sitsolutionsco_waves_packaging";

 $dbpass = "wavedev@2024#";

 $db = "sitsolutionsco_waves_packaging";





 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

 

 return $conn;

 

   

?>

