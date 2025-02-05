<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php
require('spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
require('spreadsheet-reader-master/SpreadsheetReader.php');
include "../../niru_collection.php";
$mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];
if(in_array($_FILES["file"]["type"],$mimes))
{
	
	
$uploadFilePath = 'files/'.basename($_FILES['file']['name']);

move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);
$Reader = new SpreadsheetReader($uploadFilePath);

$totalSheet = count($Reader->sheets());
echo "You have total ".$totalSheet." sheets";
/* For Loop for all sheets */
for($i=0;$i<=$totalSheet;$i++)
{
	$Reader->ChangeSheet($i);
    foreach ($Reader as $Row)
    {
        $city_name = isset($Row[0]) ? $Row[0] : '';
        $key_=generateRandomString(20);

        
        mysqli_set_charset($conn,"utf8");

        $insert_query ="insert into category(category_title,key_) values('".$city_name."','".$key_."')";  
        echo "<br>".$insert_query.";";
       // mysqli_query($insert_query, $conn);
    }
}


//echo "<br />Data Inserted in dababase";
}
else
{
    die("<br/>Sorry, File type is not allowed. Only Excel file.");
}

?>