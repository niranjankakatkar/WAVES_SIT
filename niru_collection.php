<?php
session_start();
date_default_timezone_set('Asia/Calcutta');
include 'dbConfig.php';
//include 'hr_funlist.php';
//$inityr=$_SESSION[inityr];


define('STRIPE_SECRET_KEY', 'sk_test_51QkQxYP6mKPrmPu8YvBPN71gcpY7PJ7i7xWk4lo5RaW5xYk1ZQd4BinFmIXgXtdjwqLYk9JImGmqjV9QY3D0TVPV00PSkhzHd9'); 
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51QkQxYP6mKPrmPu8LDODxvSdwRKfJIvzRe4rljnqUGw5DunV2rDMQPo1R8cXoEpVEG0SCFWFyc4C1XXOoqy2b4GD00oaRowOm2'); 
define('STRIPE_SUCCESS_URL', 'http://localhost/WAVES/CHECKOUT/orderDone.php'); //Payment success URL 
define('STRIPE_CANCEL_URL', 'http://localhost/WAVES/CHECKOUT/orderFail.php'); //Payment cancel URL 
?>		



<?php

	$strMsg = "Transaction Successfully Completed";
	$strerrmsg = "Some Problem in Operation";
	$stremptylist = "List is Empty";
	$strnorecsel = "No Record has been Selected";
/* ...............................FUNCTIONS WHICH ARE MOSTLY USED................................ */
function retrivemax($con,$tabname,$key)
{
/*
	retrivemax -
		It is used for getting largest Pkey field from table
	sytax:
		retrivemax($con,$tabname,$key)
	Explanation:
		$tabname=it is table name in which we want Pkey field.	
		$key=it is PKEY field from the table.
	e.g.
		$Cust_id=retrivemax($con,"customer","Cust_id");
*/
	$sql = "SELECT max($key) AS maxid, count(*) as cnt FROM $tabname"; 
    $result1=mysqli_query($con,$sql);
	if ($row=mysqli_fetch_object($result1)) 
	{
			$maxid=(($row->maxid) + "1");
	}
	else
	{
			$maxid="1";
	}
	return $maxid;
}
function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function generateRandomCHAR($length) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function generateRandomCHAR_INT($length) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function generateRandomINT($length) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function retrivecount($con,$tabname,$cond)
{
/*
	retrivecount -
		It is used for getting largest Pkey field from table
	sytax:
		retrivecount($con,$tabname,$key)
	Explanation:
		$tabname=it is table name in which we want Pkey field.	
		$key=it is PKEY field from the table.
	e.g.
		$Cust_id=retrivecount($con,"customer","Cust_id");
*/
	$sql = "SELECT count(*) as cnt FROM $tabname $cond"; 
    $result1=mysqli_query($con,$sql);
	if ($row=mysqli_fetch_object($result1)) 
	{
			$cnt=(($row->cnt));
	}
	else
	{
			$cnt="1";
	}
	return $cnt;
}
function retriveAVG($con,$tabname,$key,$cond)
{
/*
	retrivemax -
		It is used for getting largest Pkey field from table
	sytax:
		retrivemax($con,$tabname,$key)
	Explanation:
		$tabname=it is table name in which we want Pkey field.	
		$key=it is PKEY field from the table.
	e.g.
		$Cust_id=retrivemax($con,"customer","Cust_id");
*/
	$sql = "SELECT AVG($key) as vl FROM $tabname $cond"; 
	//echo "".$sql;
    $result1=mysqli_query($con,$sql);
	if ($row=mysqli_fetch_object($result1)) 
	{
			$vl=(($row->vl));
	}
	else
	{
			$vl="1";
	}
	return $vl;
}
function thousandsCurrencyFormat($num) {

    if( $num > 1000 ) {

        $x = round($num);
        $x_number_format = number_format($x);
        $x_array = explode(',', $x_number_format);
        $x_parts = array('k', 'm', 'b', 't');
        $x_count_parts = count($x_array) - 1;
        $x_display = $x;
        $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
        $x_display .= $x_parts[$x_count_parts - 1];
        
        return $x_display;
    }

    return $num;
}
function retriveSUM($con,$tabname,$key,$cond)
{
/*
	retrivemax -
		It is used for getting largest Pkey field from table
	sytax:
		retrivemax($con,$tabname,$key)
	Explanation:
		$tabname=it is table name in which we want Pkey field.	
		$key=it is PKEY field from the table.
	e.g.
		$Cust_id=retrivemax($con,"customer","Cust_id");
*/
	$sql = "SELECT SUM($key) as vl FROM $tabname $cond"; 
	echo "".$sql;
    $result1=mysqli_query($con,$sql);
	if ($row=mysqli_fetch_object($result1)) 
	{
			$vl=(($row->vl));
	}
	else
	{
			$vl="1";
	}
	return $vl;
}
function retrivemaxprefix1($con,$tabname,$key,$prefix)
{	
/*
	retrivemaxprefix1:
		It is used for getting largest Pkey field with prefix from table
	syntax:
		retrivemaxprefix1($con,$tabname,$key,$prefix)
	Explanation:
		$tabname=it is table name in which we want Pkey field.	
		$key=it is PKEY field from the table.
		$prefix=it is string or character  which is to prefixed to $key.
	e.g.:
		$Cust_id=retrivemaxprefix1($con,"customer","Cust_id","V");
*/
	$sqlStatement = "";
	$lenPrefix = 0;
	$maxNO = 0;
	$sql= "select count($key) as cnt from $tabname";
	$result=mysqli_query($con,$sql);
	$rstab=mysqli_fetch_array($result);
	if ($rstab["cnt"] > 0)
	{
		$lenPrefix = strlen($prefix) + 1;
		//$sqlStatement = "SELECT mid($key,$lenPrefix) AS maxid FROM $tabname";
		$sqlStatement = "SELECT mid($key,$lenPrefix) AS maxid FROM $tabname order by CAST(maxid as SIGNED) desc LIMIT 1";
		$result1=mysqli_query($con,$sqlStatement);
		 if (mysqli_num_rows($result1)==0)
		{
				$maxid = ($prefix). "1";
		}
		 else
		{
			/*while ($row=mysqli_fetch_array($result1))
			{
				if ($row["maxid"] > $maxNO)
				{
					 $maxNO = $row["maxid"];
				}
		 	}*/
			if($row=mysqli_fetch_array($result1))
			{
				$maxNO = $row["maxid"];
		 	}
			$maxNO = $maxNO + 1;
			$maxid = ($prefix). $maxNO;
		}
	}
	else
	{
		$maxid = ($prefix). "1";
	}
	return $maxid;
}
/*function retrivemaxprefix12($con,$tabname,$key,$prefix)
{
	$lenPrefix = strlen($prefix) + 1;
	$sql = "SELECT max(abs(mid($key,$lenPrefix))) AS maxid FROM $tabname"; 
	$result1=mysqli_query($con,$sql);
	if ($row = mysqli_fetch_object($result1))
    {
		$maxid=$prefix.(($row->maxid) + "1");
	}
	else
    {
		$maxid=$prefix.("1");
	}
	return $maxid;
}*/
function retrivemaxprefix12($con,$tabname,$key,$prefix)
{
	$sqlStatement = "";
	$lenPrefix = 0;
	$maxNO = 0;

	 $sql= "select count($key) as cnt from $tabname";
	$result=mysqli_query($con,$sql);
	$rstab=mysqli_fetch_array($result);
	if ($rstab["cnt"] > 0)
	{
		$lenPrefix = strlen($prefix) + 1;
		//$sqlStatement = "SELECT mid($key,$lenPrefix) AS maxid FROM $tabname where $key like '$prefix%'"; 
		$sqlStatement = "SELECT mid($key,$lenPrefix) AS maxid FROM $tabname where $key like '$prefix%' order by CAST(maxid as SIGNED) desc LIMIT 1"; 
		$result1=mysqli_query($con,$sqlStatement);
		if (mysqli_num_rows($result1)==0)
		{
				$maxid = ($prefix). "1";
		}
		else
		{
			/*while ($row=mysqli_fetch_array($result1))
			{
				if(is_numeric($row[maxid]))
				{
					if ($row["maxid"] > $maxNO)
					{
						 $maxNO = $row["maxid"];
					}
				}
		 	}*/
			if($row=mysqli_fetch_array($result1))
			{
				$maxNO = $row["maxid"];
		 	}
			$maxNO = $maxNO + 1;
			$maxid = ($prefix). $maxNO;
		}
		
	}
	else
	{
		$maxid = ($prefix). "1";
	}
	return $maxid;
}
function retrivemaxprefix12_ss($con,$tabname,$key,$prefix)
{	

/*
	retrivemaxprefix12:
		It is used for getting largest Pkey field with prefix from table
	syntax:
		retrivemaxprefix12($con,$tabname,$key,$prefix)
	Explanation:
		$tabname=it is table name in which we want Pkey field.	
		$key=it is PKEY field from the table.
		$prefix=it is string or character  which is to prefixed to $key.
		
	e.g.:
		$Cust_id=retrivemaxprefix12($con,"customer","Cust_id","V");
*/
	$sqlStatement = "";
	$lenPrefix = 0;
	$maxNO = 0;

	 $sql= "select count($key) as cnt from $tabname";
	$result=mysqli_query($con,$sql);
	$rstab=mysqli_fetch_array($result);
	if ($rstab["cnt"] > 0)
	{
		$lenPrefix = strlen($prefix) + 1;
		//$sqlStatement = "SELECT mid($key,$lenPrefix) AS maxid FROM $tabname where $key like '$prefix%'"; 
		$sqlStatement = "SELECT mid($key,$lenPrefix) AS maxid FROM $tabname where $key like '$prefix%' order by CAST(maxid as SIGNED) desc LIMIT 1"; 
		$result1=mysqli_query($con,$sqlStatement);
		if (mysqli_num_rows($result1)==0)
		{
				$maxid = ($prefix). "1";
		}
		else
		{
			/*while ($row=mysqli_fetch_array($result1))
			{
				if(is_numeric($row[maxid]))
				{
					if ($row["maxid"] > $maxNO)
					{
						 $maxNO = $row["maxid"];
					}
				}
		 	}*/
			if($row=mysqli_fetch_array($result1))
			{
				$maxNO = $row["maxid"];
		 	}
			$maxNO = $maxNO + 1;
			$maxid = ($prefix). $maxNO;
		}
		
	}
	else
	{
		$maxid = ($prefix). "1";
	}
	return $maxid;
}

function retrivemaxprefix($con,$tabname,$key,$prefix)
{
/*
	retrivemaxprefix:
		It is used for getting largest Pkey field with prefix from table
	syntax:
		retrivemaxprefix($con,$tabname,$key,$prefix)
	Explanation:
		$tabname=it is table name in which we want Pkey field.	
		$key=it is PKEY field from the table.
		$prefix=it is string or character  which is to prefixed to $key.
	e.g.:
		$Cust_id=retrivemaxprefix($con,"customer","Cust_id","V");
*/
	$lenPrefix = strlen($prefix) + 1;
	$sql = "SELECT max(abs(mid($key,$lenPrefix))) AS maxid FROM $tabname"; 
	$result1=mysqli_query($con,$sql);
	if ($row = mysqli_fetch_object($result1))
    {
		$maxid=$prefix.(($row->maxid) + "1");
	}
	else
    {
		$maxid=$prefix.("1");
	}
	return $maxid;
}

function retrivemaxprefix13($con,$tabname,$key,$prefix,$fyr,$branch_field="",$branch_id="")
{	

/*
	retrivemaxprefix13:
		It is used for getting largest Pkey field with prefix from table with respect to financial year.
	syntax:
		retrivemaxprefix13($con,$tabname,$key,$prefix)
	Explanation:
		$tabname=it is table name in which we want Pkey field.	
		$key=it is PKEY field from the table.
		$prefix=it is string or character  which is to prefixed to $key.
		
	e.g.:
		$Cust_id=retrivemaxprefix13($con,"customer","Cust_id","V");
*/
	$sqlStatement = "";
	$lenPrefix = 0;
	$maxNO = 0;
	$bCond="";
	if($branch_field != "" && $branch_id != "")
	{
		$bCond="and $branch_field = '$branch_id'";
	}
	$sql= "select count($key) as cnt from $tabname where fiscyr='$fyr' $bCond";
	$result=mysqli_query($con,$sql);
	$rstab=mysqli_fetch_array($result);
	if ($rstab["cnt"] > 0)
	{
		$lenPrefix = strlen($prefix) + 1;
		//$sqlStatement = "SELECT mid($key,$lenPrefix) AS maxid FROM $tabname where $key like '$prefix%' and fiscyr='$fyr' $bCond"; 
		$sqlStatement = "SELECT mid($key,$lenPrefix) AS maxid FROM $tabname where $key like '$prefix%' and fiscyr='$fyr' $bCond order by CAST(maxid as SIGNED) desc LIMIT 1"; 
		$result1=mysqli_query($con,$sqlStatement);
		if (mysqli_num_rows($result1)==0)
		{
				$maxid = ($prefix). "1";
		}
		else
		{
			/*while ($row=mysqli_fetch_array($result1))
			{
				if(is_numeric($row[maxid]))
				{
					if ($row["maxid"] > $maxNO)
					{
						 $maxNO = $row["maxid"];
					}
				}
		 	}*/
			if($row=mysqli_fetch_array($result1))
			{
				$maxNO = $row["maxid"];
		 	}
			$maxNO = $maxNO + 1;
			$maxid = ($prefix). $maxNO;
		}
		
	}
	else
	{
		$maxid = ($prefix). "1";
	}
	return $maxid;
}
function retrivemaxprefix14($con,$tabname,$key,$prefix,$fyr)
{	

/*
	retrivemaxprefix13:
		It is used for getting largest Pkey field with prefix from table with respect to financial year.
	syntax:
		retrivemaxprefix13($con,$tabname,$key,$prefix)
	Explanation:
		$tabname=it is table name in which we want Pkey field.	
		$key=it is PKEY field from the table.
		$prefix=it is string or character  which is to prefixed to $key.
		
	e.g.:
		$Cust_id=retrivemaxprefix13($con,"customer","Cust_id","V");
*/
	$sqlStatement = "";
	$lenPrefix = 0;
	$maxNO = 0;

	$sql= "select count($key) as cnt from $tabname where yr='$fyr'";
	//echo $sql;
	$result=mysqli_query($con,$sql);
	$rstab=mysqli_fetch_array($result);
	if ($rstab["cnt"] > 0)
	{
		$lenPrefix = strlen($prefix) + 1;
		//$sqlStatement = "SELECT mid($key,$lenPrefix) AS maxid FROM $tabname where $key like '$prefix%' and yr='$fyr'"; 
		$sqlStatement = "SELECT mid($key,$lenPrefix) AS maxid FROM $tabname where $key like '$prefix%' and yr='$fyr' order by CAST(maxid as SIGNED) desc LIMIT 1"; 
		$result1=mysqli_query($con,$sqlStatement);
		if (mysqli_num_rows($result1)==0)
		{
				$maxid = ($prefix). "1";
		}
		else
		{
			/*while ($row=mysqli_fetch_array($result1))
			{
				if(is_numeric($row[maxid]))
				{
					if ($row["maxid"] > $maxNO)
					{
						 $maxNO = $row["maxid"];
					}
				}
		 	}*/
			if($row=mysqli_fetch_array($result1))
			{
				$maxNO = $row["maxid"];
		 	}
			$maxNO = $maxNO + 1;
			$maxid = ($prefix). $maxNO;
		}
		
	}
	else
	{
		$maxid = ($prefix). "1";
	}
	return $maxid;
}
function retrivemaxprefix15($con,$tabname,$key,$prefix,$fyr)
{	

/*
	retrivemaxprefix13:
		It is used for getting largest Pkey field with prefix from table with respect to financial year.
	syntax:
		retrivemaxprefix13($con,$tabname,$key,$prefix)
	Explanation:
		$tabname=it is table name in which we want Pkey field.	
		$key=it is PKEY field from the table.
		$prefix=it is string or character  which is to prefixed to $key.
		
	e.g.:
		$Cust_id=retrivemaxprefix13($con,"customer","Cust_id","V");
*/
	$sqlStatement = "";
	$lenPrefix = 0;
	$maxNO = 0;

	$sql= "select count($key) as cnt from $tabname where fiscyr='$fyr'";
	//echo $sql."<br>";
	$result=mysqli_query($con,$sql);
	$rstab=mysqli_fetch_array($result);
	if ($rstab["cnt"] > 0)
	{
		$lenPrefix = strlen($prefix) + 1;
		//$sqlStatement = "SELECT mid($key,$lenPrefix) AS maxid FROM $tabname where $key like '$prefix%' and fiscyr='$fyr'"; 
		$sqlStatement = "SELECT mid($key,$lenPrefix) AS maxid FROM $tabname where $key like '$prefix%' and fiscyr='$fyr' order by CAST(maxid as SIGNED) desc LIMIT 1"; 
		//echo $sqlStatement."<br>";
		$result1=mysqli_query($con,$sqlStatement);
		if (mysqli_num_rows($result1)==0)
		{
				$maxid = ($prefix). "1";
		}
		else
		{
			/*while ($row=mysqli_fetch_array($result1))
			{
				if(is_numeric($row[maxid]))
				{
					if ($row["maxid"] > $maxNO)
					{
						 $maxNO = $row["maxid"];
					}
				}
		 	}*/
			if($row=mysqli_fetch_array($result1))
			{
				$maxNO = $row["maxid"];
		 	}
			$maxNO = $maxNO + 1;
			$maxid = ($prefix). $maxNO;
		}
		
	}
	else
	{
		$maxid = ($prefix). "1";
	}
	return $maxid;
}
//Function for Batch Card Batch ID generation.
function retriveBatchNo($con,$tabname,$key,$prefix,$cond,$padW="0")
{
	$sqlStatement = "";
	$lenPrefix = 0;
	$maxNO = 0;

	$sql= "select count(*) as cnt from $tabname";
	$result=mysqli_query($con,$sql);
	$rstab=mysqli_fetch_array($result);
	if ($rstab["cnt"] > 0)
	{
		$lenPrefix = strlen($prefix) + 1;
		$sqlStatement = "SELECT mid($key,$lenPrefix) AS maxid FROM $tabname where $key like '$prefix%' $cond"; 
		//echo $sqlStatement;
		$result1=mysqli_query($con,$sqlStatement);
		if (mysqli_num_rows($result1)==0)
		{
				$maxid = ($prefix). str_pad("1", $padW, "0", STR_PAD_LEFT);
				//$maxid = 0;
		}
		else
		{
			while ($row=mysqli_fetch_array($result1))
			{
				if(is_numeric($row[maxid]))
				{
					if ($row["maxid"] > $maxNO)
					{
						 $maxNO = $row["maxid"];
					}
				}
		 	}
			$maxNO = $maxNO + 1;
			$maxid = ($prefix). str_pad($maxNO, $padW, "0", STR_PAD_LEFT);
			//$maxid = $maxNO;
		}
	}
	else
	{
		//$maxid = ($prefix). "1";
		$maxid = ($prefix). str_pad("1", $padW, "0", STR_PAD_LEFT);
		//$maxid = 0;
	}
	return $maxid;
}
/*function retriveBatchNo($tabname,$key,$prefix,$cond,$padW="0")//===Code Commented by komal bcoz if $rstab["cnt"] is zero then batch id created by 1
{
	$sqlStatement = "";
	$lenPrefix = 0;
	$maxNO = 0;

	$sql= "select count(*) as cnt from $tabname";
	$result=mysqli_query($con,$sql);
	$rstab=mysqli_fetch_array($result);
	if ($rstab["cnt"] > 0)
	{
		$lenPrefix = strlen($prefix) + 1;
		$sqlStatement = "SELECT mid($key,$lenPrefix) AS maxid FROM $tabname where $key like '$prefix%' $cond"; 
		$result1=mysqli_query($con,$sqlStatement);
		if (mysqli_num_rows($result1)==0)
		{
				//$maxid = ($prefix). str_pad("1", $padW, "0", STR_PAD_LEFT);
				$maxid = 0;
		}
		else
		{
			while ($row=mysqli_fetch_array($result1))
			{
				if(is_numeric($row[maxid]))
				{
					if ($row["maxid"] > $maxNO)
					{
						 $maxNO = $row["maxid"];
					}
				}
		 	}
			//$maxNO = $maxNO + 1;
			//$maxid = ($prefix). str_pad($maxNO, $padW, "0", STR_PAD_LEFT);
			$maxid = $maxNO;
		}
		
	}
	else
	{
		//$maxid = ($prefix). str_pad("1", $padW, "0", STR_PAD_LEFT);
		$maxid = 0;
	}
	return $maxid;
}*/

function givedata($con,$tabname,$key,$value,$data)
{
/*
	givedata:
		This Fuctions usefull for retriew related field name from field id.
	syntax:
		givedata($con,$tabname,$key,$value,$data)
	Explanation of function:
		$tabname= Table name from which table if you want data
		$key= It is a Primery Key of patrticular table from which you want match with value
		$value= It is a field which carry from form.
		$data= It actual value.
	e.g.:
		givedata($con,"customer","cust_id",$row["cust_id"],"cust_name")
*/
    $sqlstr1="select ".$data." from ". $tabname." where ".$key."='".$value."' LIMIT 1";
	//echo $sqlstr1."<br>";
    $result1=mysqli_query($con,$sqlstr1);
	$rstab=mysqli_fetch_array($result1);
    if (mysqli_num_rows($result1)==0)
    {
        $givedata = "#empty#";
    }
	else
    {
        if (strpos($data,",")>0)
        {
            $arr = Split($data,",");
            for ($i= 0;$i<=ubound($arr);$i++)
			{
                if ($strGivedata=="")
				{
                    $strGivedata=$rstab[$arr($i)];
                }
				else
                {
                    $strGivedata=$strGivedata . "#" . $rstab[$arr($i)];
                }
			   $givedata=$strGivedata;
			}
		}
		else
		{
			 $givedata=$rstab[$data];
			 return $givedata;
		}  
	}
}
function givedataMulti($con,$tabname,$cond,$data)
{
/*
	givedataMulti:
		It is used for getting multiple data from table.
	syntax:
		givedataMulti($con,$tabname,$cond,$data)
	Explanation:
		$tabname=table name
		$cond=condition
		$data=data from table
	e.g.:
		givedataMulti($con,"customer","cust_id='1'",*)
*/
  
    $sqlstr1="select ".$data." from ". $tabname." where ".$cond." LIMIT 1";
   //echo $sqlstr1."<br>";
	$result1=mysqli_query($con,$sqlstr1);
	$rstab=mysqli_fetch_array($result1);
    if (mysqli_num_rows($result1)==0)
    {
        $givedataMulti = "";
		//echo "Empty";
    }
	else
    {
        if (strpos($data,",")>0)
        {
            $arr = Split($data,",");
            for ($i= 0;$i<=ubound($arr);$i++)
			{
                   // $givedataMulti=$strGivedata . "#" . $rstab[$arr($i)];
			}
		}
		else
		{
			 $givedataMulti=$rstab[$data];
			// echo $givedataMulti."<br>";
			 return $givedataMulti;
		}  
	}
}
function populateCombo($con,$tableName,$fldName,$fldValue,$condtion)
{
/*
	populateCombo:
		This Fuctions usefull for retriew related field value in combo box.
	syntax:
		populateCombo($tableName,$fldName,$fldValue,$condtion)
	Explanation of function:
		$tabname= Table name from which table if you want data
		$fldName= It is a field of patrticular table which you want to store in database
		$$fldValue= Value display in Combo box.
		$condition= write condition in where clause.
	e.g.:
		populateCombo ("customer","Cust_name","Cust_id","where Cust_id='5'")
*/
	$qr1="select ". $fldName . ", " . $fldValue ." from ". $tableName . " " . $condtion;
	//echo $qr1;
	$result1 = mysqli_query($con,$qr1); 
	while ($row = mysqli_fetch_array($result1))
	{
		//echo "aa".$row[$fldName];
		?><option value= "<?=$row[$fldValue]?>"><?=$row[$fldName]?></option><?php
		
	}
}
function populateComboSelValue($con,$tableName,$fldName,$fldValue,$condtion,$value)
{
/*
	populateCombo:
		This Fuctions usefull for retriew related field value in combo box.
	syntax:
		populateCombo($tableName,$fldName,$fldValue,$condtion)
	Explanation of function:
		$tabname= Table name from which table if you want data
		$fldName= It is a field of patrticular table which you want to store in database
		$$fldValue= Value display in Combo box.
		$condition= write condition in where clause.
	e.g.:
		populateCombo ("customer","Cust_name","Cust_id","where Cust_id='5'")
*/
	$qr1="select ". $fldName . ", " . $fldValue ." from ". $tableName . " " . $condtion;
	//echo $qrl;
	$result1 = mysqli_query($con,$qr1); 
	while ($row = mysqli_fetch_array($result1))
	{
		?><option value= "<?=$row[$fldValue]?>" <?php if($value == $row[$fldValue]) { ?>selected<?php } ?>><?=$row[$fldName]?></option><?php
	}
}
function populateMultiCombo_day_plan_mast($con,$tableName,$fldName,$fldValue,$condtion)
{
/*
	populateCombo:
		This Fuctions usefull for retriew related field value in combo box.
	syntax:
		populateCombo($tableName,$fldName,$fldValue,$condtion)
	Explanation of function:
		$tabname= Table name from which table if you want data
		$fldName= It is a field of patrticular table which you want to store in database
		$$fldValue= Value display in Combo box.
		$condition= write condition in where clause.
	e.g.:
		populateCombo ("customer","Cust_name","Cust_id","where Cust_id='5'")
*/
	$qr1="select ". $fldName . ", " . $fldValue ." from ". $tableName . " " . $condtion;
	//echo $qr1;
	$result1 = mysqli_query($con,$qr1); 
	while ($row = mysqli_fetch_array($result1))
	{
		?><option value= "<?=$row[$fldValue]?>"><?=$row[$fldName]?></option><?php 
	}
}


function populateMultiCombo($con,$tableName,$fldName,$fldValue,$condtion)
{
/*
	populateCombo:
		This Fuctions usefull for retriew related field value in combo box.
	syntax:
		populateCombo($tableName,$fldName,$fldValue,$condtion)
	Explanation of function:
		$tabname= Table name from which table if you want data
		$fldName= It is a field of patrticular table which you want to store in database
		$$fldValue= Value display in Combo box.
		$condition= write condition in where clause.
	e.g.:
		populateCombo ("customer","Cust_name","Cust_id","where Cust_id='5'")
*/
	$qr1="select ". $fldName . ", " . $fldValue ." from ". $tableName . " " . $condtion;
	//echo $qr1;
	$result1 = mysqli_query($con,$qr1); 
	while ($row = mysqli_fetch_array($result1))
	{
		?><option value= "<?=$row[$fldValue]?>" selected="selected"><?=$row[$fldName]?></option><?php
		
	}
}


function populateComboDis($con,$tableName,$fldName,$fldValue,$condtion)
{
/*
	populateComboDis:
		This Fuctions usefull for retriew related distict field value in combo box.
	syntax:
		populateComboDis($tableName,$fldName,$fldValue,$condtion)
	Explanation of function:
		$tabname= Table name from which table if you want data
		$fldName= It is a filed of patrticular table which you want to store in database
		$$fldValue= Value display in Combo box.
		$condition= write condition in where clause.
	e.g.:
		populateComboDis("customer","Cust_name","Cust_id","")
*/
	
	$qr1="select distinct(". $fldName . "), " . $fldValue ." from ". $tableName . " " . $condtion;
	
	$result1 = mysqli_query($con,$qr1); 
	while ($row = mysqli_fetch_array($result1))
	{
		?>	<option value= "<?=$row[$fldValue]?>"><?=$row[$fldName]?></option>
		<?php
		
	}
	return($qr1);
}
function populateComboMulti($con,$tableName,$fldName,$fldValue,$condtion)
{
/*
	populateComboMulti:
		This Fuctions usefull for retrieve related field value in combo box with option having multiple values concated and multiple values at selection.
	syntax:
		populateComboMulti($tableName,$fldName,$fldValue,$condtion)
	Explanation of function:
		$tabname= Table name from which table if you want data
		$fldValue= these are fields of patrticular table which you want to store in database
		$fldName= Value display in Combo box.
		$condition= write condition in where clause.
	e.g.:
		populateCombo ("customer","Cust_name,cust_addr","Cust_id,vendor_code","where Cust_id='5'")
*/
	$arrfldValue = explode(",",$fldValue);
	$arrfldName = explode(",",$fldName);
	$qr1="select ". $fldName . ", " . $fldValue ." from ". $tableName . " " . $condtion;
	//echo "kkkkkkkk".$qr1;
	$result1 = mysqli_query($con,$qr1); 
	while ($row = mysqli_fetch_array($result1))
	{
	?>
		<option value= "<?php for($i=0;$i<count($arrfldValue);$i++) { if($i==0) { echo $row[$arrfldValue[$i]]; } else { echo ",".$row[$arrfldValue[$i]]; } }?>"><?php for($i=0;$i<count($arrfldName);$i++) { if($i==0) { echo $row[$arrfldName[$i]]; } else { echo " ".$row[$arrfldName[$i]]; } }?></option>
	<?php
	
	}
}
function disDate($dte)
{
/*
	disDate:
		If we want to retrive arbitratray date , month ,and year then use this function
	syntax:
		disDate($dte)
	Discription:
	 $date = the date which retrive from database.
*/
	if ($dte != "" )
	{
		$disDate = strftime("%d",strtotime($dte))."/".strftime("%m",strtotime($dte))."/".strftime("%Y",strtotime($dte));
	}
	else
	{
		$disDate = "";
	}
	return $disDate;
}
function dbDate($dte)
{
/*
	dbDate:
		If we want to retrive arbitratray date , month ,and year then use this function
	syntax:
		disDate($dte)
	Discription:
	 	$date = the date which retrive from database.
*/
	if ($dte != "" )
	{
		$dbDate =strftime("%Y",strtotime($dte)) ."/".strftime("%m",strtotime($dte))."/".strftime("%d",strtotime($dte));
	}
	else
	{
		$dbDate = "";
	}
	return $dbDate;
}
/*function DateAdd($dte)
{
	$dte=strftime("%Y",strtotime($dte))."-".strftime("%m",strtotime($dte))."-".strftime("%d",strtotime($dte));
    $date_add1=date("m-d-Y", mktime (0,0,0,strftime("%m",strtotime($dte)),strftime("%d",strtotime($dte))-1,strftime("%Y",strtotime($dte))));
	$dated=substr($date_add1,3,2);
	$datem=substr($date_add1,0,2);
	$datey=substr($date_add1,-4);
	$date_add=$datey."/".$datem."/".$dated;
	return $date_add;
}*/

function IsLeapYear($intYear)
{
/*
	The trick here is make sure that we get an integer
	The 3 Golden rules are:
	True if it is divisible by 4
	False if it is divisible by 100
	TRUE if it is divisble by 400
*/
	$IsLeapYear = (($intYear % 4 == 0) && ($intYear % 100 != 0) 	|| ($intYear % 400 == 0));
	return $IsLeapYear;
}
function towords($TXTIN)
{
/*
	towords:
		This function use to display integer numbers in word
	syntax:
		towords($TXTIN)
	Discription:
	 	$TXTIN = the interger value which you want to convert into word.
	e.g:
		towords(100) result - Hundred.
*/
  $leftpad = "0";
  $TXTINN = $TXTIN;
  for ($i=strlen($TXTINN)+1; $i<=9; $i++)
  {
  	$TXTINN = $leftpad . $TXTINN;
  }
  print $TXTINN;
  $TXTINN = $TXTINN & ",00";
	settype($TXTINN, "integer");
	If ( substr($TXTINN,0,2) > 0)
	 {
  		settype($TXTINN, "integer");		
		$rstr=word(substr($TXTINN,0,2));
        //$TXTOUT = $TXTOUT + $rstr + "Crores ";
	}
    If (substr($TXTINN,2,2) > 0 )
	{
        settype($TXTINN, "integer");
		$rstr=word(substr($TXTINN,2,2));
     //   $TXTOUT = $TXTOUT + $rstr + "Lakhs ";
	}
    If (substr($TXTINN,4,2) > 0) 
	{
      	settype($TXTINN, "integer");	
		$rstr=word(substr($TXTINN,4,2));
     //   $TXTOUT = $TXTOUT + $rstr + "Thousands ";
	}
    If (substr($TXTINN,6,1) > 0 )
	{	
		settype($TXTINN, "integer");
        $rstr=word(substr($TXTINN,6,1));
      //  $TXTOUT = $TXTOUT + $rstr + "Hundred ";
	}
    If (substr($TXTINN,7,2) > 0 )
	{
		$rstr=word(substr($TXTINN,7,2));
       // $TXTOUT = $TXTOUT + $rstr;
	}
	 	settype($TXTINN, "integer");
		$rstr=word(substr($TXTINN,10,2));
		//$TXTOUT = $TXTOUT ;
	//	$TOWords = $TXTOUT;
		//return $TOWords;
}
function word($mynum)
{

   $x1[0] = "Zero ";
   $x1[1] = "One ";
   $x1[2] = "Two ";
   $x1[3] = "Three ";
   $x1[4] = "Four ";
   $x1[5] = "Five ";
   $x1[6] = "Six ";
   $x1[7] = "Seven ";
   $x1[8] = "Eight ";
   $x1[9] = "Nine ";

   $x2[1] = "Ten ";
   $x2[2] = "Twenty ";
   $x2[3] = "Thirty ";
   $x2[4] = "Fourty ";
   $x2[5] = "Fifty ";
   $x2[6] = "Sixty ";
   $x2[7] = "Seventy ";
   $x2[8] = "Eighty ";
   $x2[9] = "Ninty ";

   $x3[1] = "Eleven ";
   $x3[2] = "Twelve ";
   $x3[3] = "Thirteen ";
   $x3[4] = "Fourteen ";
   $x3[5] = "Fifteen ";
   $x3[6] = "Sixteen ";
   $x3[7] = "Seventeen ";
   $x3[8] = "Eighteen ";
   $x3[9] = "Ninteen ";;

   $rstr = "";
   if ($mynum < 10)
  {
      $rstr = $x1[$mynum];
  }
   else
  {
      if ($mynum % 10 == 0)
      {
		   $rstr = $x2[($mynum / 10)];
	  } 	      
	 else
      {
         if (($mynum / 10) == 1 && $mynum % 10 != 0)
		 {
            $rstr = $x3[$mynum % 10];
         }
		else
         {
		    if (($mynum / 10) > 1 && $mynum % 10 != 0)
            { 
				  $rstr = $x2[($mynum / 10)] + $x1[$mynum % 10];
            }
			else
            {
				  $rstr = "NIL";
            }
         }
      }
  }
}
function PCase($strInput)
{
/*
	PCase:
		used to dispaly first character of word in upper case i.e. Proper case.
	syntax:
		PCase($strInput)
	Discription:
	 	$strInput = the string value which you want to convert into Proper Case.
	e.g:
		PCase("deepak") result Deepak
*/
	$iPosition = 0;
	While(strpos($iPosition, $strInput) != 0)
	{
		$iSpace = strpos($iPosition, $strInput);
		$strOutput = $strOutput . strtoupper(substr($strInput, $iPosition, 1));
		$strOutput = $strOutput . strtolower(substr($strInput, $iPosition + 1, $iSpace - $iPosition));
		$iPosition = $iSpace + 1;
	}
	$strOutput = $strOutput . strtoupper(substr($strInput, $iPosition, 1));
	$strOutput = $strOutput . strtolower(substr($strInput, $iPosition + 1));
	$PCase = $strOutput;
	return $PCase;
}
function dateDiff($dformat, $endDate, $beginDate) 
{ 
           $date_parts1=explode($dformat, $beginDate); 
           $date_parts2=explode($dformat, $endDate); 
           $start_date=gregoriantojd($date_parts1[0], $date_parts1[1], $date_parts1[2]); 
           $end_date=gregoriantojd($date_parts2[0], $date_parts2[1], $date_parts2[2]); 
           
		   return $end_date - $start_date; 
} 

function dateDiff11($dformat,$beginDate,$endDate) 
{ 
		   $date_parts1=explode($dformat, $beginDate); 
           $date_parts2=explode($dformat, $endDate); 
           $start_date=gregoriantojd($date_parts1[1], $date_parts1[2], $date_parts1[0]); 
           $end_date=gregoriantojd($date_parts2[1], $date_parts2[2], $date_parts2[0]); 
           
		   
		   return $end_date - $start_date; 
} 


function item_existing_qty($con,$tab,$qty,$cond)
{
	$sql="";
	$sql="select sum($qty) as $qty from $tab  $cond";
//echo $sql; 
	//echo "select sum($qty) as $qty from $tab  $cond";
	$resqty=mysqli_query($con,$sql);
	if($rsqty=mysqli_fetch_array($resqty))
	{
		$a_qty=$rsqty[$qty];
	}
	return $a_qty;
}

function datetimediff($interval, $datefrom, $dateto, $using_timestamps = false) 
{ 
	 /*    $interval can be: 
	yyyy - Number of full years  
	q - Number of full quarters  
	m - Number of full months  
	y - Difference between day numbers 
	
		 (eg 1st Jan 2004 is "1", the first day. 2nd Feb 2003 is "33". The datediff is "-32".)  
	d - Number of full days 
	w - Number of full weekdays  
	ww - Number of full weeks  
	h - Number of full hours   
	n - Number of full minutes   
	s - Number of full seconds (default)  */  
  	 if (!$using_timestamps)
	 {    
		 $datefrom = strtotime($datefrom, 0); 
  		 $dateto = strtotime($dateto, 0);
     } 
	 $difference = $dateto - $datefrom; 
	// Difference in seconds 
  
  	switch($interval) 
	{     
		 case 'yyyy': // Number of full years     
					 $years_difference = floor($difference / 31536000);     
 					 if (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom), date("j", $datefrom), date("Y", $datefrom)+$years_difference) > $dateto) 
					 {        $years_difference--;      }    
  					 if (mktime(date("H", $dateto), date("i", $dateto), date("s", $dateto), date("n", $dateto), date("j", $dateto), date("Y", $dateto)-($years_difference+1)) > $datefrom)
 					 {        $years_difference++;      }   
   					 $datediff = $years_difference;  
					 break; 
	    case "q": // Number of full quarters     
					 $quarters_difference = floor($difference / 8035200); 
					 while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($quarters_difference*3), date("j", $dateto), date("Y", $datefrom)) < $dateto)
					 {        $months_difference++;      }    
					 $quarters_difference--;    
					  $datediff = $quarters_difference;
					  break; 
        case "m": // Number of full months  
				    $months_difference = floor($difference / 2678400);
					while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($months_difference), date("j", $dateto), date("Y", $datefrom)) < $dateto)
 					{        $months_difference++;      }      
					$months_difference--;    
  					$datediff = $months_difference;     
					 break; 
		case 'y': // Difference between day numbers    
  					$datediff = date("z", $dateto) - date("z", $datefrom); 
     				break;  
  		case "d": // Number of full days     
 					$datediff = floor($difference / 86400);    
  					break; 
   		case "w": // Number of full weekdays  
        			 $days_difference = floor($difference / 86400); 
    				 $weeks_difference = floor($days_difference / 7); // Complete weeks  
   					 $first_day = date("w", $datefrom); 
    				 $days_remainder = floor($days_difference % 7);   
  					 $odd_days = $first_day + $days_remainder; // Do we have a Saturday or Sunday in the remainder?
   					 if ($odd_days > 7) 
					 { // Sunday    
				    	$days_remainder--; 
					 }   
   					 if ($odd_days > 6) 
					 { 
						// Saturday 
					    $days_remainder--;
				     }    
  					 $datediff = ($weeks_difference * 5) + $days_remainder; 
     				 break;   
 		case "ww": // Number of full weeks 
    				 $datediff = floor($difference / 604800); 
     				  break; 
   		case "h": // Number of full hours  
   					 $datediff = floor($difference / 3600); 
		 			 break;  
  		case "n": // Number of full minutes 
					 $datediff = floor($difference / 60); 
					 break; 
   		default: // Number of full seconds (default)  
    				$datediff = $difference;     
					 break; 
	 }    
  return $datediff;
}


function fNumToStr($wNum)
{
//echo "<br>Given Number =".$wNum;
$wNum1 = number_format(floatval($wNum),2,".","");
//echo "<br>Round Number =".$wNum1;
$wNumlf = substr($wNum1,0,(strlen($wNum1)-3));
$wNumld = substr($wNum1,(strlen($wNum1)-2));
//echo "<br>Int number =".$wNumlf;
//echo "<br>Int number =".$wNumld;

$wStr = " ";

if (strlen($wNumlf) == 9)
{
	if(is_null(fNum1(substr($wNumlf,0,1))) or substr($wNumlf,0,1)=="0")
		{ $wStr = $wStr."";}
	else { $wStr = $wStr.fNum2(substr($wNumlf,0,2)) . " Crore"; }
    $wNumlf = substr($wNumlf,-7);
}

if (strlen($wNumlf) == 8)
{
    if(is_null(fNum1(substr($wNumlf,0,1))) or substr($wNumlf,0,1)=="0")
		{ $wStr = $wStr.""; }
	else { $wStr = $wStr.fNum1(substr($wNumlf,0,1)) . " Crore"; }
    $wNumlf = substr($wNumlf,-7);
}


if (strlen($wNumlf) == 7)
{
	if(is_null(fNum1(substr($wNumlf,0,1))) or substr($wNumlf,0,1)=="0")
		{ $wStr = $wStr."";}
	else { $wStr = $wStr.fNum2(substr($wNumlf,0,2)) . " Lac"; }
    $wNumlf = substr($wNumlf,-5);
}
	
if (strlen($wNumlf) == 6)
{
    if(is_null(fNum1(substr($wNumlf,0,1))) or substr($wNumlf,0,1)=="0")
		{ $wStr = $wStr."";}
	else { $wStr = $wStr.fNum1(substr($wNumlf,0,1)) . " Lac"; }
    $wNumlf = substr($wNumlf,-5);
}
if (strlen($wNumlf) == 5)
{
    if(is_null(fNum1(substr($wNumlf,0,1))) or substr($wNumlf,0,1)=="0" and substr($wNumlf,1,1)=="0")
		{ $wStr = $wStr."";}
	else { $wStr = $wStr.fNum2(substr($wNumlf,0,2))." Thousand"; }
    $wNumlf = substr($wNumlf,-3);
}
if (strlen($wNumlf) == 4)
{
    if(is_null(fNum1(substr($wNumlf,0,1))) or substr($wNumlf,0,1)=="0")
		{ $wStr = $wStr."";}
	else { $wStr = $wStr.fNum1(substr($wNumlf,0,1))." Thousand"; }
    $wNumlf = substr($wNumlf,-3);
}
if (strlen($wNumlf) == 3)
{
    if(is_null(fNum1(substr($wNumlf,0,1))) or substr($wNumlf,0,1)=="0")
		{ $wStr = $wStr."";}
	else {$wStr = $wStr.fNum1(substr($wNumlf,0,1))." Hundred"; }
	$wNumlf = substr($wNumlf,-2);
}

if (strlen($wNumlf) == 2)
{
    $wStr = $wStr.fNum2(substr($wNumlf,0,2));
    $wNumlf = "";
}

If (strlen($wNumlf) == 1)
{
    $wStr = $wStr.fNum1(substr($wNumlf,0,1));
}

if (substr($wNumld,0,2) == "00")
{ $wStr = $wStr." And Paise Zero Only" ; }
else
{ $wStr = $wStr." And ".fNum2($wNumld)." Paise Only" ; }

return $wStr;
}


function fNumToStrnopaise($wNum)
{
//echo "<br>Given Number =".$wNum;
$wNum1 = number_format(floatval($wNum),2,".","");
//echo "<br>Round Number =".$wNum1;
$wNumlf = substr($wNum1,0,(strlen($wNum1)-3));
$wNumld = substr($wNum1,(strlen($wNum1)-2));
//echo "<br>Int number =".$wNumlf;
//echo "<br>Int number =".$wNumld;
$wStr = " ";
if (strlen($wNumlf) == 8)
{
    if(is_null(fNum1(substr($wNumlf,0,1))) or substr($wNumlf,0,1)=="0")
		{ $wStr = $wStr.""; }
	else { $wStr = $wStr.fNum1(substr($wNumlf,0,1)) . " Crore"; }
    $wNumlf = substr($wNumlf,-7);
}
if (strlen($wNumlf) == 7)
{
    if(is_null(fNum1(substr($wNumlf,0,1))) or substr($wNumlf,0,1)=="0")
		{ $wStr = $wStr."";}
	else { $wStr = $wStr.fNum2(substr($wNumlf,0,2)) . " Lac"; }
    $wNumlf = substr($wNumlf,-5);
}
if (strlen($wNumlf) == 6)
{
    if(is_null(fNum1(substr($wNumlf,0,1))) or substr($wNumlf,0,1)=="0")
		{ $wStr = $wStr."";}
	else { $wStr = $wStr.fNum1(substr($wNumlf,0,1)) . " Lac"; }
    $wNumlf = substr($wNumlf,-5);
}
if (strlen($wNumlf) == 5)
{
    if(is_null(fNum1(substr($wNumlf,0,1))) or substr($wNumlf,0,1)=="0" and substr($wNumlf,1,1)=="0")
		{ $wStr = $wStr."";}
	else { $wStr = $wStr.fNum2(substr($wNumlf,0,2))." Thousand"; }
    $wNumlf = substr($wNumlf,-3);
}
if (strlen($wNumlf) == 4)
{
    if(is_null(fNum1(substr($wNumlf,0,1))) or substr($wNumlf,0,1)=="0")
		{ $wStr = $wStr."";}
	else { $wStr = $wStr.fNum1(substr($wNumlf,0,1))." Thousand"; }
    $wNumlf = substr($wNumlf,-3);
}
if (strlen($wNumlf) == 3)
{
    if(is_null(fNum1(substr($wNumlf,0,1))) or substr($wNumlf,0,1)=="0")
		{ $wStr = $wStr."";}
	else {$wStr = $wStr.fNum1(substr($wNumlf,0,1))." Hundred"; }
	$wNumlf = substr($wNumlf,-2);
}

if (strlen($wNumlf) == 2)
{
    $wStr = $wStr.fNum2(substr($wNumlf,0,2));
    $wNumlf = "";
}

If (strlen($wNumlf) == 1)
{
    $wStr = $wStr.fNum1(substr($wNumlf,0,1));
}

if (substr($wNumld,0,2) == "00")
{ $wStr = $wStr." Only" ; }
else
{ $wStr = $wStr." Only" ; }

return $wStr;
}

function fNum2($ws2)
{
	$wlfs2 = trim(substr($ws2,0,1));
	if ($wlfs2 == "1")
	{
	   switch ($ws2)
	   {
		   case "11" :
				 return (" Eleven");
				 break;
		   case "12" :
				 return (" Twelve");
				 break;
		   case "13" :
				 return (" Thirteen");
				 break;
		   case "14" :
				 return (" Fourteen");
				 break;
		   case "15" :
				 return (" Fifteen");
				 break;
		   case "16" :
				 return (" Sixteen");
				 break;
		   case "17" :
				 return (" Seventeen");
				 break;
		   case "18" :
				 return (" Eighteen");
				 break;
		   case "19" :
				 return (" Ninteen");
				 break;
		   case "10" :
				 return (" Ten");
				 break;
		}
	}

	$wRts2 = substr($ws2,-1);
	switch ($wlfs2)
	{
	   case "0" :
			return(fNum1($wRts2));
			break;
	   case "2" :
			return(" Twenty".fNum1($wRts2));
			break;
	   case "3" :
			return(" Thirty".fNum1($wRts2));
			break;
	   case "4" :
			return(" Fourty".fNum1($wRts2));
			break;
	   case "5" :
			return(" Fifty".fNum1($wRts2));
			break;
	   case "6" :
			return(" Sixty".fNum1($wRts2));
			break;
	   case "7" :
			return(" Seventy".fNum1($wRts2));
			break;
	   case "8" :
			return(" Eighty".fNum1($wRts2));
			break;
	   case "9" :
			return(" Ninty".fNum1($wRts2));
			break;
	}
}

function fNum1($ws1)
{
	switch ($ws1)
	{
	   case "0" :
			return("");
			break;
	   case "1" :
			return(" One");
			break;
	   case "2" :
			return(" Two");
			break;
	   case "3" :
			return(" Three");
			break;
	   case "4" :
			return(" Four");
			break;
	   case "5" :
			return(" Five");
			break;
	   case "6" :
			return(" Six");
			break;
	   case "7" :
			return(" Seven");
			break;
	   case "8" :
			return(" Eight");
			break;
	   case "9" :
			return(" Nine");
			break;
	}
}

/*function get_time_difference( $start, $end )
{
    $uts['start']      =    strtotime( $start );
    $uts['end']        =    strtotime( $end );
    if( $uts['start']!==-1 && $uts['end']!==-1 )
    {
        if( $uts['end'] >= $uts['start'] )
        {
            $diff    =    $uts['end'] - $uts['start'];
            if( $days=intval((floor($diff/86400))) )
                $diff = $diff % 86400;
            if( $hours=intval((floor($diff/3600))) )
                $diff = $diff % 3600;
            if( $minutes=intval((floor($diff/60))) )
                $diff = $diff % 60;
            $diff    =    intval( $diff );            
            return( array('days'=>$days, 'hours'=>$hours, 'minutes'=>$minutes, 'seconds'=>$diff) );
        }
        else
        {
           // trigger_error( "Ending date/time is earlier than the start date/time", E_USER_WARNING );
        }
    }
    else
  2  {
       // trigger_error( "Invalid date/time data detected", E_USER_WARNING );
    }
    return( false );
}*/

													
											



function get_time_difference( $start, $end )	// 48 hour function extended version of previous 24 hour function get_time_difference( $start, $end )
{
 
		if((substr_count($end,"-")>0)and(substr_count($start,"-")==0))
		{
			return( false );
		}
		elseif((substr_count($end,"-")>0)and(substr_count($start,"-")>0))
		{
			$end = str_replace("-","",$end); 	$start = str_replace("-","",$start);
		}
		elseif((substr_count($end,"-")==0)and(substr_count($start,"-")>0))
		{
			
			$expld1=explode(":",str_replace("-","",$start));
			$expld2=explode(":",$end);
			$end = ($expld2[0] + (24-$expld1[0])).":".$expld2[1].":".$expld2[2];
			$start="00:00:00";
		}


	$tempstrt=explode(":",$start);
	$tempend=explode(":",$end);
		
		if(($tempend[0]<$tempstrt[0])or(($tempend[0]==$tempstrt[0])and($tempend[1]<$tempstrt[1]))or(($tempend[0]==$tempstrt[0])and($tempend[1]==$tempstrt[1])and($tempend[2]<$tempstrt[2])))
    	{
			return( false );
		}
		elseif(($tempstrt[0]<=23)and($tempend[0]<=23))
		{
	
							$uts['start']      =    strtotime( $start );
   							$uts['end']        =    strtotime( $end );
    					if( $uts['start']!==-1 && $uts['end']!==-1 )
    					{
       						 if( $uts['end'] >= $uts['start'] )
							{
             				 $diff    =    $uts['end'] - $uts['start'];
           					 if( $days=intval((floor($diff/86400))) )
               				 $diff = $diff % 86400;
            				 if( $hours=intval((floor($diff/3600))) )
               				 $diff = $diff % 3600;
           					 if( $minutes=intval((floor($diff/60))) )
               				 $diff = $diff % 60;
            				 $diff    =    intval( $diff );            
             				
							 if($days<10) {$days="0".$days; }
							 if($hours<10) {$hours="0".$hours; }
							 if($minutes<10) {$minutes="0".$minutes; }
							 if($diff<10) {$diff="0".$diff; }
							 
							 return( array('days'=>$days, 'hours'=>$hours, 'minutes'=>$minutes, 'seconds'=>$diff) );
        					}
       					  else
        					{
           				// trigger_error( "Ending date/time is earlier than the start date/time", E_USER_WARNING );
        					}
    					}
   					 else
    					{
      					 // trigger_error( "Invalid date/time data detected", E_USER_WARNING );
    					}
    						return( false );

				
		  }
		elseif(($tempstrt[0]<=23)and($tempend[0]>23))
		  {
		 					
							$start1=$start;
							$end1="23:59:59";
														
							$uts['start']      =    strtotime( $start1 );
   							$uts['end']        =    strtotime( $end1 );

             				 $diff1    =    $uts['end'] - $uts['start'];
							
							$start2="00:00:00";
							if(($tempend[0]-24)>9)
							{
							$end2=($tempend[0]-24).":".$tempend[1].":".$tempend[2];
							}
							else
							{
							$end2="0".($tempend[0]-24).":".$tempend[1].":".$tempend[2];
							}
														
							$uts['start']      =    strtotime( $start2 );
   							$uts['end']        =    strtotime( $end2 );

             				 $diff2    =    $uts['end'] - $uts['start'];
           					 
							 $diff=$diff1+$diff2;
							 
		   					 
							 if( $days=intval((floor($diff/86400))) )
               				 $diff = $diff % 86400;
            				 if( $hours=intval((floor($diff/3600))) )
               				 $diff = $diff % 3600;
           					 if( $minutes=intval((floor($diff/60))) )
               				 $diff = $diff % 60;
            				 $diff    =    intval( $diff );
							 if($days<>0) {	$hours=$hours+(24*$days);	}							 
							 
							 if($days<10) {$days="0".$days; }
							 if($hours<10) {$hours="0".$hours; }
							 if($minutes<10) {$minutes="0".$minutes; }
							 if($diff<10) {$diff="0".$diff; }
							 
							 return( array('days'=>$days, 'hours'=>$hours, 'minutes'=>$minutes, 'seconds'=>$diff) );
        				
		  }
		elseif(($tempstrt[0]>23)and($tempend[0]>23))
		 {
		
							$start1="00:00:00";
							if(($tempstrt[0]-24)>9)
							{
							$end1=($tempstrt[0]-24).":".$tempstrt[1].":".$tempstrt[2];
							}
							else
							{
							$end1="0".($tempstrt[0]-24).":".$tempstrt[1].":".$tempstrt[2];
							}
							
														
							$uts['start']      =    strtotime( $start1 );
   							$uts['end']        =    strtotime( $end1 );

             				 $diff1    =    $uts['end'] - $uts['start'];
							
							$start2="00:00:00";
							if(($tempend[0]-24)>9)
							{
							$end2=($tempend[0]-24).":".$tempend[1].":".$tempend[2];
							}
							else
							{
							$end2="0".($tempend[0]-24).":".$tempend[1].":".$tempend[2];
							}
														
							$uts['start']      =    strtotime( $start2 );
   							$uts['end']        =    strtotime( $end2 );

             				 $diff2    =    $uts['end'] - $uts['start'];
           					 
							 $diff=$diff2-$diff1;
		   					 
							 if( $days=intval((floor($diff/86400))) )
               				 $diff = $diff % 86400;
            				 if( $hours=intval((floor($diff/3600))) )
               				 $diff = $diff % 3600;
           					 if( $minutes=intval((floor($diff/60))) )
               				 $diff = $diff % 60;
            				 $diff    =    intval( $diff );
							 							 
							 if($days<10) {$days="0".$days; }
							 if($hours<10) {$hours="0".$hours; }
							 if($minutes<10) {$minutes="0".$minutes; }
							 if($diff<10) {$diff="0".$diff; }
							 
							 return( array('days'=>$days, 'hours'=>$hours, 'minutes'=>$minutes, 'seconds'=>$diff) );
		 
		 
		 }

}

 function date_from_current($format,$current,$diff)
 {
 	$exp=explode($format,$current);
	$ldate =date("Y/m/d",mktime(0, 0, 0, $exp[1], ($exp[2]+$diff), $exp[0]));
	return $ldate;
 }







?>	