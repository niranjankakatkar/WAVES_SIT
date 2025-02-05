<?php 

include '../niru_collection.php';


   
echo "__AJAX-";

	$product_key = $_POST['product_key'];
	$login_key= $_SESSION['guesst_login_KEY'];
    $qty=1;
   

		$sql="DELETE FROM cart_master where product_key='$product_key' AND login_key='$login_key'";
        if($conn->query($sql))
		{
            echo "Done "; 
		}
	else{
		echo "error";
	}		
    
    
    echo "__AJAX-";
			


?> 

<div class="summery-header">
                        <h3>Cart Total</h3>
                    </div>

                    <div class="summery-contain">
                        <div class="coupon-cart">
                            <h6 class="text-content mb-2">Coupon Apply</h6>
                            <form method="POST" id="#formId_">
                                <div class="mb-3 coupon-box input-group">
                                    <input type="text" class="form-control" name="coupon_code" id="coupon_code"
                                        placeholder="Enter Coupon Code Here..." required>
                                    <button type="submit" name="submitButton_" class="btn-apply"
                                        id="submitButton_">Apply</button>
                                </div>
                            </form>

                            <div class="col-12" id="login_responce"></div>

                            <?php if (isset($message)): ?>
                                <p class="text-success"><?= $message; ?></p>
                            <?php endif; ?>
                        </div>
                        <ul>
                            <li>
                                <h4>Subtotal</h4>
                                <input type="hidden" name="subtotal" id="subtotal" value="<?=retriveSUM($conn,"cart_master","total"," where login_key='$login_key'") ?>">
                                <h4 class="price">£<?= number_format($subtotal, 2); ?></h4>
                            </li>

                            <li>
                                <h4>Coupon Discount</h4>
                                <h4 id="coupon_discount" class="price">£<?= number_format($coupon_discount, 2); ?></h4>
                            </li>

                            <li>
                                <h4>Shipping</h4>
                                <h4 class="price" id="shipping_fee">£<?= number_format($shipping_fee, 2); ?></h4>
                            </li>
                        </ul>
                    </div>

                    <ul class="summery-total">
                        <li class="list-total border-top-0">
                            <h4>Total (USD)</h4>
                            <h4 class="price theme-color" id="grandTotal">
                                £<?= number_format($subtotal + $shipping_fee - $coupon_discount, 2); ?></h4>
                        </li>
                    </ul>

                    <div class="button-group cart-button">
                        <ul>
                            <li>
                                <button onclick="location.href = '../CHECKOUT/';"
                                    class="btn btn-animation proceed-btn fw-bold">Process To Checkout</button>
                            </li>
                            <li>
                                <button onclick="location.href = '../CART';"
                                    class="btn btn-light shopping-button text-dark">
                                    <i class="fa-solid fa-arrow-left-long"></i>Return To Shopping
                                </button>
                            </li>
                        </ul>
                    </div>