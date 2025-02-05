<?php 

include '../niru_collection.php';


   
echo "__AJAX-";
$login_key= $_SESSION['guesst_login_KEY'] ;
$total_cart_items=retrivecount($conn,"cart_master"," where login_key='$login_key'")
?>

<button type="button" class="btn p-0 position-relative header-wishlist">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                               
                                                <?php if ($total_cart_items > 0): ?>
                                                    <span class="position-absolute top-0 start-100 translate-middle badge">
                                                    <span class="cart-count"><?= $total_cart_items; ?></span>
                                                      </span>
                                                <?php endif; ?>
                                              
                                            </button>

                                            <div class="onhover-div">
                                                <ul class="cart-list">
                                                <?php

                                                // Fetch cart items for the logged-in user

                                                        $query = "SELECT * FROM cart_master WHERE login_key='$login_key' AND flag='1'";
                                                        // echo "".$query;
                                                        $result = mysqli_query($conn, $query);

                                                        $total_cart_items = mysqli_num_rows($result); // Count of items
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                           $productkey=$row['product_key'];
                                                           $img="";
                                                           $filepath=givedata($conn, "products", "key_", $productkey, "filepath");
                                                           if($filepath==""){
                                                                $img="../assets/images/no_image.jpg";
                                                        }else{
                                                            $img="../ADMIN//".$filepath;
                                                            
                                                        }
                                                        $total_cart_value=$total_cart_value+$row['total'];
                                                        ?>
                                                        
                                                
                                                
                                                    <li class="product-box-contain">
                                                        <div class="drop-cart">
                                                        <a href="product-details.php?product_key=<?= $row['product_key']; ?>" class="drop-image">
                                                            <img src="<?=$img?>" class="blur-up lazyload" alt="">
                                                        </a>

                                                        <div class="drop-contain">
                                                            <h5><?=givedata($conn, "products","key_",$productkey,"product_title")?></h5>
                                                            <h6><span><?= $row['qty']; ?> x</span> £<?= $row['rate']; ?></h6>
                                                        </div>
                                                        </div>
                                                    </li>

                                                <?php } ?>    
                                                </ul>

                                                <div class="price-box">
                                                <h5>Total :</h5>
                                                    <h4 class="theme-color fw-bold">£<?= $total_cart_value; ?></h4>
                                                   
                                                    
                                                </div>
                                                <div class="button-group">
                                                    <a href="../CHECKOUT" class="btn btn-sm cart-button theme-bg-color text-white">Checkout</a>
                                                    <a href="../CART" class="btn btn-sm cart-button">View Cart</a>
                                                </div>
                                            </div>