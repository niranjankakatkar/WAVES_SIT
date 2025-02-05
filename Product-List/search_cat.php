<?php 

include '../niru_collection.php';


   
echo "__AJAX-";

	$search = $_POST['search'];
	$cat_id = $_POST['cat_id'];
	
    $sql = "SELECT * FROM sub_category where sub_category_title LIKE '$search%' AND flag='1' ORDER BY seq";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
       
        if($row['category_id']==$cat_id){
?>


        <li class="nav-item " role="presentation">
            <button
                onclick="window.location.href='../Product-List/?id_=<?= $row['key_'] ?>'"
                class="nav-link <?= $active ?>" id="pills-vegetables"
                data-bs-toggle="pill" data-bs-target="#pills-vegetable"
                type="button" role="tab"><?= $row['sub_category_title'] ?>
                <img src="../ADMIN//<?= $row['filepath'] ?>"
                    class="blur-up lazyloaded" alt=""></button>
        </li>
        <?php
        }
    }								
			


?> 