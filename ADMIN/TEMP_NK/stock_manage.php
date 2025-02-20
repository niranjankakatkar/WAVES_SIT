<?php
include '../../niru_collection.php';


$sql = "SELECT * FROM products ";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {

    $sql="INSERT INTO stock_master(p_id,avl_qty) VALUES('$row[key_]','0')";

		if($conn->query($sql))
		{}
}
