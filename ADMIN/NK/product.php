<?php
include '../../niru_collection.php';


$sql = "SELECT * FROM tablename ";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {



	$product_id = $row["id"];
    $product_title = $row["Product_Name"];
    $description = '';
    $retail_rate = $row['Rate_1'];
    $wholsell_rate = $row['Rate_2'];
    $hoteling_rate = $row['Rate_3'];
    $shop_rate = $row['Rate_4'];
    $retail_qty = $row['Case_qty'];
    $wholsell_qty = $row['Case_qty'];
    $hoteling_qty = $row['Case_qty'];
    $shop_qty = $row['Case_qty'];

    $color = $row['Colour'];
    $dimensions = $row['Dimension'];
    $sub_category_title = $row['Sub_Category'];
    $sub_category_title=trim(preg_replace('/[\t\n\r\s]+/', ' ', $sub_category_title));
    $category_id= $row['Main_Catgory'];//givedata($conn,"sub_category","sub_category_title", $sub_category_title,"category_id");
    $sub_category_id= $row['Sub_Category'];//givedata($conn,"sub_category","sub_category_title", $sub_category_title,"id");

    $aa=trim(preg_replace('/[\t\n\r\s]+/', ' ', $product_title));

    $kk=trim($aa,"  ");
    $uploadPath="../uploads/products/".$kk.".png";
    $key_=generateRandomString(20);
    $flag="1";
	

    




		$sql="INSERT INTO products(product_id,product_title,description,retail_rate,wholsell_rate,hoteling_rate,shop_rate,retail_qty,wholsell_qty,hoteling_qty,shop_qty,color,dimensions,category_id,sub_category_id,filepath,flag,prep_by,key_) VALUES('$product_id','$product_title','$description','$retail_rate','$wholsell_rate','$hoteling_rate','$shop_rate','$retail_qty','$wholsell_qty','$hoteling_qty','$shop_qty','$color','$dimensions','$category_id','$sub_category_id','$uploadPath','$flag','$prep_by','$key_')";
		if($conn->query($sql))
		{}
}
