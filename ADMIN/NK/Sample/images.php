<?php
include '../../../niru_collection.php';
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
  $id=  $row['id'];
    $path="../uploads/products/".$row['product_title'].".png";
    $sql="UPDATE products set filepath='$path' where id='$id'";
    if($conn->query($sql))
    {
        ?>
           
        <?php
    }
}
?>