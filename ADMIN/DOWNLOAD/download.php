<?php
// Con
// 
// nection 

include '../../niru_collection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$dd=date("d-M-Y");
    header("Content-Type: application/xls");    
    header("Content-Disposition: attachment; filename=$dd.xls");  
    header("Pragma: no-cache"); 
    header("Expires: 0");
    
    
    echo '<table border="1">';
    //make the column headers what you want in whatever order you want
    echo '<tr><th>order-id</th>
    <th>buyer-name</th>
    <th>ship-city</th>
    <th>ship-country</th>
    <th>ship-address-1</th>
    <th>ship-postal-code</th>
    <th>product-name</th>
    <th>quantity-purchased</th>
    <th>currency</th>
    <th>item-price</th>
    <th>ship-state</th>
    
    
    </tr>';
    
    $sql = "SELECT * FROM order_master where admin_flag='2' ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
                                                
    //loop the query data to the table in same order as the headers
    while ($row = mysqli_fetch_assoc($result)){
        $ukey=$row['user_key'];
        $address_id=$row['address_id'];
        $buyer_name=givedata($conn,"user_master","token_key",$ukey,"full_name");
        echo "<tr>
        <td>".$row['order_id']."</td>
        <td>".$buyer_name."</td>
        <td>".givedata($conn,"address_master","id",$address_id,"city")."</td>
        <td>".givedata($conn,"address_master","id",$address_id,"country")."</td>
        <td>".givedata($conn,"address_master","id",$address_id,"address")."</td>
        <td>".givedata($conn,"address_master","id",$address_id,"pincode")."</td>
        <td>----</td>
        <td>--</td>
        <td>GBP</td>
        <td>".$row['grand_total']."</td>
         <td>UK</td>
        
        
        
        
        </tr>";
    }
    echo '</table>';
    }

?>