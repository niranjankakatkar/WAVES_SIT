<?php include '../niru_collection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	
	
}

$subtotal=0;
$couponDiscount=0;
$shipping=0;
$grandtotal=0;

?> 
<?php include '../inner_header.php';?> 

    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        <h2>Checkout</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="../">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout section Start -->
    <section class="checkout-section-2 section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-4 g-3">
                <div class="col-lg-8">
                    <div class="left-sidebar-checkout">
                        <div class="checkout-detail-box">
                            <?php
                                $session_Token=givedata($conn,"user_master","token_key",$_SESSION['guesst_login_KEY'],"id");

                                if($session_Token==""){
                                        ?>
                                        <div  style="background-color:#f8f8f8;padding:3%"><br>
                                            <h3>Contact information</h3><br>
                                            <p>We'll use this email to send you details and updates about your order.</p>
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email..." required>
                                            <p>You are currently checking out as a guest.</p><br><br>

                                            <h3>Billing address</h3><br>
                                            <p>Enter the billing address that matches your payment method.</p><br>
                                            <div class="row  g-4">
                                                <div class="col-xxl-12 col-lg-12 col-sm-6">
                                                    <div class="custom-form">
                                                        <label for="full_name">Full Address</label>
                                                        <div class="custom-input">
                                                            <textarea placeholder="Full Address" row="3" class="form-control" id="full_name" name="full_name"></textarea>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-lg-12 col-sm-6">
                                                    <div class="custom-form">
                                                        <label for="full_name">City</label>
                                                        <div class="custom-input">
                                                            <input type="text" class="form-control" id="city" name="city"
                                                                placeholder="City">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-6 col-lg-12 col-sm-6">
                                                    <div class="custom-form">
                                                        <label for="full_name">Post Code</label>
                                                        <div class="custom-input">
                                                            <input type="text" class="form-control" id="pincode" name="pincode"
                                                                placeholder="Post Code">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-12 col-lg-12 col-sm-6">
                                                    <div class="custom-form">
                                                        <label for="full_name">Full Name</label>
                                                        <div class="custom-input">
                                                            <input type="text" class="form-control" id="full_name" name="full_name"
                                                                placeholder="Full Name">
                                                        </div>
                                                    </div>
                                                </div>

                                               

                                            </div>
                                        </div>

                                        <?php

                                }else{

                                


                            ?>
                            <ul>
                                <li>
                                    <div class="checkout-icon">
                                    <lord-icon target=".nav-item" src="https://cdn.lordicon.com/ggihhudh.json" trigger="loop-on-hover"
                                     colors="primary:#121331,secondary:#062d6a,tertiary:#062d6a" class="lord-icon">
                                    </lord-icon>
                                    </div>
                                    <div class="checkout-box">
                                        <div class="checkout-title">
                                            <h4>Delivery Address</h4>
                                        </div>

                                        <div class="checkout-detail">
                                            <div class="row g-4">

                                            <?php
                                             $guest_key = $_SESSION['guesst_login_KEY'];
                                             $sql = "SELECT * FROM address_master where user_token_id='$guest_key' ";
                                             $result = mysqli_query($conn, $sql);
                                             while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <div class="col-xxl-6 col-lg-12 col-md-6">
                                                    <div class="delivery-address-box">
                                                        <div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="address_id" value="<?=$row['id']?>"
                                                                    id="address_id">
                                                            </div>

                                                            <div class="label">
                                                                <label><?=$row['address_type']?></label>
                                                            </div>

                                                            <ul class="delivery-address-detail">
                                                                <li>
                                                                    <h4 class="fw-500"><?=$row['full_name']?></h4>
                                                                </li>

                                                                <li>
                                                                    <p class="text-content"><span
                                                                            class="text-title">Address
                                                                            : </span><?=$row['address']?></p>
                                                                </li>

                                                                <li>
                                                                    <h6 class="text-content"><span
                                                                            class="text-title">Pin Code
                                                                            :</span> <?=$row['pincode']?></h6>
                                                                </li>

                                                                <li>
                                                                    <h6 class="text-content mb-0"><span
                                                                            class="text-title">Phone
                                                                            :</span> <?=$row['mobile_no']?></h6>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                             }
                                             ?>
                                               

                                                
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            
                                <li>
                                    <div class="checkout-icon">
                                        <lord-icon target=".nav-item" src="https://cdn.lordicon.com/qmcsqnle.json"
                                            trigger="loop-on-hover" colors="primary:#062d6a,secondary:#062d6a"
                                            class="lord-icon">
                                        </lord-icon>
                                    </div>
                                    <div class="checkout-box">
                                        <div class="checkout-title">
                                            <h4>Payment Option</h4>
                                        </div>

                                        <div class="checkout-detail">
                                            <div class="accordion accordion-flush custom-accordion"
                                                id="accordionFlushExample">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="flush-headingFour">
                                                        <div class="accordion-button collapsed"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#flush-collapseFour">
                                                            <div class="custom-form-check form-check mb-0">
                                                                <label class="form-check-label" for="cash"><input
                                                                        class="form-check-input mt-0" type="radio"
                                                                        name="flexRadioDefault" id="cash" checked> Cash
                                                                    On Delivery</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="flush-collapseFour"
                                                        class="accordion-collapse collapse show"
                                                        data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <p class="cod-review">Pay digitally with SMS Pay
                                                                Link. Cash may not be accepted in COVID restricted
                                                                areas. <a href="javascript:void(0)">Know more.</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                           
                                               
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="flush-headingThree">
                                                        <div class="accordion-button collapsed"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#flush-collapseThree">
                                                            <div class="custom-form-check form-check mb-0">
                                                                <label class="form-check-label" for="wallet"><input
                                                                        class="form-check-input mt-0" type="radio"
                                                                        name="flexRadioDefault" id="wallet">Online
                                                                    Pay</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <?php
                                }
                                ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="right-side-summery-box">
                        <div class="summery-box-2">
                            <div class="summery-header">
                                <h3>Order Summery</h3>
                            </div>

                            <ul class="summery-contain">
                            <?php
                                $guest_key=$_SESSION['guesst_login_KEY'];
										   $sql = "SELECT * FROM cart_master where login_key='$guest_key' AND flag='0'";
										   $result = mysqli_query($conn, $sql);
										   while($row = mysqli_fetch_assoc($result)) {
												   $timepstamp=$row['timestamp'];
													$timepstamp=date_create("".$timepstamp);
                                                    $product_key=$row['product_key'];
                                                    $subtotal=$subtotal+$row['total'];
			                                        ?>
                                <li>
                                    <img src="../ADMIN//<?=givedata($conn,"products","key_",$product_key,"filepath")?>"
                                        class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                    <h4><?=givedata($conn,"products","key_",$product_key,"product_title")?> <span>X <?=$row['qty']?></span></h4>
                                    <h4 class="price">£<?=$row['total']?></h4>
                                </li>
                                <?php
                                           }
                                           ?>


                             
                            </ul>

                            <ul class="summery-total">
                                <li>
                                    <h4>Subtotal</h4>
                                    <h4 class="price">£<?=givedata($conn,"order_master","order_id",$_SESSION['OID'],"total")?></h4>
                                </li>

                                <li>
                                    <h4>Shipping</h4>
                                    <h4 class="price">£<?=givedata($conn,"order_master","order_id",$_SESSION['OID'],"shipping")?></h4>
                                </li>

                                <li>
                                    <h4>Coupon/Code</h4>
                                    <h4 class="price">£<?=givedata($conn,"order_master","order_id",$_SESSION['OID'],"coupon")?></h4>
                                </li>

                                <li class="list-total">
                                    <h4>Total (PONUDS)</h4>
                                    <h4 class="price">£<?=givedata($conn,"order_master","order_id",$_SESSION['OID'],"grand_total")?></h4>
                                </li>
                            </ul>
                        </div>

                        <div class="checkout-offer">
                            <div class="offer-title">
                                <div class="offer-icon">
                                    <img src="https://themes.pixelstrap.com/fastkart/../assets/images/inner-page/offer.svg" class="img-fluid" alt="">
                                </div>
                                <div class="offer-name">
                                    <h6>Available Offers</h6>
                                </div>
                            </div>

                            <ul class="offer-detail">
                                <li>
                                    <p>Combo: BB Royal Almond/Badam Californian, Extra Bold 100 gm...</p>
                                </li>
                                <li>
                                    <p>combo: Royal Cashew Californian, Extra Bold 100 gm + BB Royal Honey 500 gm</p>
                                </li>
                            </ul>
                        </div>

                        <button onclick="place_ORDER()"  class="btn theme-bg-color text-white btn-md w-100 mt-4 fw-bold">Place Order</button>
                        <script async
  src="https://js.stripe.com/v3/buy-button.js">
</script>

<stripe-buy-button
  buy-button-id="buy_btn_1QjN6GKSUpY1mQU36495ocmT"
  publishable-key="pk_test_51QjMjkKSUpY1mQU3ropHpaFYBwGr5cGUwrP4qoAVPZH0WNF86EuK7FYiBUCjAJLYhRWylnbkyMkhKsTnFpWoU51w00Gvjmue7D"
>
</stripe-buy-button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Checkout section End -->

    <!-- Footer Section Start -->
     <!-- Footer Section Start -->
     <?php include '../inner_footer.php';?> 

     <script>
    function place_ORDER(){
        $.ajax({
            type: "POST",
            url: "form_submit.php",
          
            success: function (data) {
                console.log('my message' + data);
                let mydata = data.split("__AJAX-");
                var word = "" + mydata[1];
                let ans = "" + word.localeCompare("Done ");
                if (ans == 0) {
               
                    
                    window.location.href='../CHECKOUT/orderDone.php';
                   // getCartDeatils(guesst_login_KEY);
                    //document.getElementById("reg_div").style.display = "none";
                    // document.getElementById("otp_div").style.display = "block";


                } else {
                    alert("0")
                }
            },
            error: function (data) {
                alert("Error occurred while submitting the form");
            }
        });
 
    }
    </script>

    <!-- Footer Section End -->
    <!-- Footer Section End -->

    <!-- Location Modal Start -->
    <div class="modal location-modal fade theme-modal" id="locationModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Choose your Delivery Location</h5>
                    <p class="mt-1 text-content">Enter your address and we will specify the offer for your area.</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="location-list">
                        <div class="search-input">
                            <input type="search" class="form-control" placeholder="Search Your Area">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>

                        <div class="disabled-box">
                            <h6>Select a Location</h6>
                        </div>

                        <ul class="location-select custom-height">
                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Alabama</h6>
                                    <span>Min: $130</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Arizona</h6>
                                    <span>Min: $150</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>California</h6>
                                    <span>Min: $110</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Colorado</h6>
                                    <span>Min: $140</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Florida</h6>
                                    <span>Min: $160</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Georgia</h6>
                                    <span>Min: $120</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Kansas</h6>
                                    <span>Min: $170</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Minnesota</h6>
                                    <span>Min: $120</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>New York</h6>
                                    <span>Min: $110</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Washington</h6>
                                    <span>Min: $130</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Location Modal End -->

    <!-- Add address modal box start -->
    <div class="modal fade theme-modal" id="add-address" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Add a new address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-floating mb-4 theme-form-floating">
                            <input type="text" class="form-control" id="fname" placeholder="Enter First Name">
                            <label for="fname">First Name</label>
                        </div>
                    </form>

                    <form>
                        <div class="form-floating mb-4 theme-form-floating">
                            <input type="text" class="form-control" id="lname" placeholder="Enter Last Name">
                            <label for="lname">Last Name</label>
                        </div>
                    </form>

                    <form>
                        <div class="form-floating mb-4 theme-form-floating">
                            <input type="email" class="form-control" id="email" placeholder="Enter Email Address">
                            <label for="email">Email Address</label>
                        </div>
                    </form>

                    <form>
                        <div class="form-floating mb-4 theme-form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="address"
                                style="height: 100px"></textarea>
                            <label for="address">Enter Address</label>
                        </div>
                    </form>

                    <form>
                        <div class="form-floating mb-4 theme-form-floating">
                            <input type="email" class="form-control" id="pin" placeholder="Enter Pin Code">
                            <label for="pin">Pin Code</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-md" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn theme-bg-color btn-md text-white" data-bs-dismiss="modal">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Add address modal box end -->

    <!-- Deal Box Modal Start -->
    <div class="modal fade theme-modal deal-modal" id="deal-box" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title w-100" id="deal_today">Deal Today</h5>
                        <p class="mt-1 text-content">Recommended deals for you.</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="deal-offer-box">
                        <ul class="deal-offer-list">
                            <li class="list-1">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="../assets/images/vegetable/product/10.png" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>

                            <li class="list-2">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="../assets/images/vegetable/product/11.png" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>

                            <li class="list-3">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="../assets/images/vegetable/product/12.png" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>

                            <li class="list-1">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="../assets/images/vegetable/product/13.png" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Deal Box Modal End -->

    <!-- Tap to top and theme setting button start -->
    <div class="theme-option">
        

        <div class="back-to-top">
            <a id="back-to-top" href="#">
                <i class="fas fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <!-- Tap to top and theme setting button end -->

    <!-- Bg overlay Start -->
    <div class="bg-overlay"></div>
    <!-- Bg overlay End -->

</body>


<!-- Mirrored from themes.pixelstrap.com/fastkart/front-end/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2024 06:36:37 GMT -->
</html>