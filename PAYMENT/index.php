<?php include '../niru_collection.php';




$payment_id = $statusMsg = ''; 
$status = 'error'; 

$oid=$_SESSION['order_id'];
 
// Check whether stripe checkout session is not empty 
if(!empty($_GET['checkout_session_id'])){ 
    $checkout_session_id = $_GET['checkout_session_id']; 
     
    // Fetch transaction data from the database if already exists 
    $sqlQ = "SELECT * FROM transactions WHERE stripe_checkout_session_id = ?"; 
    $stmt = $conn->prepare($sqlQ);  
    $stmt->bind_param("s", $checkout_session_id); 
    $stmt->execute(); 
    $result = $stmt->get_result(); 
 
    if($result->num_rows > 0){ 
        // Transaction details 
        $transData = $result->fetch_assoc(); 
        $payment_id = $transData['id']; 
        $transactionID = $transData['txn_id']; 
        $paidAmount = $transData['paid_amount']; 
        $paidCurrency = $transData['paid_amount_currency']; 
        $payment_status = $transData['payment_status']; 
         
        $customer_name = $transData['customer_name']; 
        $customer_email = $transData['customer_email']; 
         
        $status = 'success'; 
        $statusMsg = 'Your Payment has been Successful!'; 
    }else{ 
        // Include the Stripe PHP library 
        require_once '../Samp/stripe-php/init.php'; 
         
        // Set API key 
        $stripe = new \Stripe\StripeClient(STRIPE_SECRET_KEY); 
         
        // Fetch the Checkout Session to display the JSON result on the success page 
        try { 
            $checkout_session = $stripe->checkout->sessions->retrieve($checkout_session_id); 
        } catch(Exception $e) {  
            $api_error = $e->getMessage();  
        } 
         
        if(empty($api_error) && $checkout_session){ 
            // Get customer details 
            $customer_details = $checkout_session->customer_details; 
 
            // Retrieve the details of a PaymentIntent 
            try { 
                $paymentIntent = $stripe->paymentIntents->retrieve($checkout_session->payment_intent); 
            } catch (\Stripe\Exception\ApiErrorException $e) { 
                $api_error = $e->getMessage(); 
            } 
             
            if(empty($api_error) && $paymentIntent){ 
                // Check whether the payment was successful 
                if(!empty($paymentIntent) && $paymentIntent->status == 'succeeded'){ 
                    // Transaction details  
                    $transactionID = $paymentIntent->id; 
                    $paidAmount = $paymentIntent->amount; 
                    $paidAmount = ($paidAmount/100); 
                    $paidCurrency = $paymentIntent->currency; 
                    $payment_status = $paymentIntent->status; 
                     
                    // Customer info 
                    $customer_name = $customer_email = ''; 
                    if(!empty($customer_details)){ 
                        $customer_name = !empty($customer_details->name)?$customer_details->name:''; 
                        $customer_email = !empty($customer_details->email)?$customer_details->email:''; 
                    } 
                     
                    // Check if any transaction data is exists already with the same TXN ID 
                    $sqlQ = "SELECT id FROM transactions WHERE txn_id = ?"; 
                    $stmt = $conn->prepare($sqlQ);  
                    $stmt->bind_param("s", $transactionID); 
                    $stmt->execute(); 
                    $result = $stmt->get_result(); 
                    $prevRow = $result->fetch_assoc(); 
                     
                    if(!empty($prevRow)){ 
                        $payment_id = $prevRow['id']; 
                    }else{ 
                        // Insert transaction data into the database 
                        $sqlQ = "INSERT INTO transactions (customer_name,customer_email,item_name,item_number,item_price,item_price_currency,paid_amount,paid_amount_currency,txn_id,payment_status,stripe_checkout_session_id) VALUES (?,?,?,?,?,?,?,?,?,?,?)"; 
                        $stmt = $conn->prepare($sqlQ); 
                        $stmt->bind_param("ssssdsdssss", $customer_name, $customer_email, $productName, $productID, $productPrice, $currency, $paidAmount, $paidCurrency, $transactionID, $payment_status, $checkout_session_id); 
                        $insert = $stmt->execute(); 
                         
                        if($insert){ 
                            $payment_id = $stmt->insert_id; 
                        } 

                        
                        $sql_="update order_master set status='done',tran_id='$transactionID',stripe_checkout_session_id='$checkout_session_id' where order_id='$oid'";
                        if($conn->query($sql_))
                        {}
                    } 
                     
                    $status = 'success'; 
                    $statusMsg = 'Your Payment has been Successful!'; 
                }else{ 
                    $sql_="update order_master set status='cancel',tran_id='$transactionID',stripe_checkout_session_id='$checkout_session_id' where order_id='$oid'";
                    if($conn->query($sql_))
                    {}
                    $statusMsg = "Transaction has been failed!"; 
                } 
            }else{ 
                $sql_="update order_master set status='cancel',tran_id='$transactionID',stripe_checkout_session_id='$checkout_session_id' where order_id='$oid'";
                if($conn->query($sql_))
                {}
                $statusMsg = "Unable to fetch the transaction details! $api_error";  
            } 
        }else{ 
            $statusMsg = "Invalid Transaction! $api_error";  
        } 
    } 
}else{ 
    $statusMsg = "Invalid Request!"; 
} 


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	
	
}

$subtotal=0;
$couponDiscount=0;
$shipping=0;
$grandtotal=0;

?> 
<?php include '../inner_header.php';?> 

    <!-- mobile fix menu start -->

    <!-- mobile fix menu end -->

    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain breadcrumb-order">
                        <div class="order-box">

                        <?php
                                    if($_GET['flag']==1){
                                            ?>
                                              <div class="order-image">
                                              <div class="checkmark">
                                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                            width="150px" height="150px" viewBox="0 0 128 128" enable-background="new 0 0 100 100" xml:space="preserve">
                                                        <g>
                                                            <g>
                                                                <path fill="#B0BEC5" d="M64,0C28.656,0,0,28.656,0,64s28.656,64,64,64s64-28.656,64-64S99.344,0,64,0z M64,120
                                                                    C33.125,120,8,94.875,8,64S33.125,8,64,8s56,25.125,56,56S94.875,120,64,120z"/>
                                                            </g>
                                                        </g>
                                                        <g>
                                                            <g>
                                                                <path fill="#F44336" d="M75.313,64l16.969-16.969c3.125-3.125,3.125-8.195,0-11.313c-3.117-3.125-8.188-3.125-11.313,0L64,52.688
                                                                    L47.031,35.719c-3.125-3.125-8.195-3.125-11.313,0c-3.125,3.117-3.125,8.188,0,11.313L52.688,64L35.719,80.969
                                                                    c-3.125,3.125-3.125,8.195,0,11.313c3.117,3.125,8.188,3.125,11.313,0L64,75.313l16.969,16.969c3.125,3.125,8.195,3.125,11.313,0
                                                                    c3.125-3.117,3.125-8.188,0-11.313L75.313,64z"/>
                                                            </g>
                                                        </g>
                                                        </svg>
                                                        </div>
                                                        </div>

                                                        <div class="order-contain">
                                                            <h3 class="theme-color">Order Cancel</h3>
                                                          </div>
                                            <?php
                                    }else{
                                    ?>
                            <div class="order-image">
                                <div class="checkmark">
                                   
                                    <svg class="star" height="19" viewBox="0 0 19 19" width="19"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                                        </path>
                                    </svg>
                                    <svg class="star" height="19" viewBox="0 0 19 19" width="19"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                                        </path>
                                    </svg>
                                    <svg class="star" height="19" viewBox="0 0 19 19" width="19"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                                        </path>
                                    </svg>
                                    <svg class="star" height="19" viewBox="0 0 19 19" width="19"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                                        </path>
                                    </svg>
                                    <svg class="star" height="19" viewBox="0 0 19 19" width="19"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                                        </path>
                                    </svg>
                                    <svg class="star" height="19" viewBox="0 0 19 19" width="19"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                                        </path>
                                    </svg>
                                    <svg class="checkmark__check" height="36" viewBox="0 0 48 36" width="48"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M47.248 3.9L43.906.667a2.428 2.428 0 0 0-3.344 0l-23.63 23.09-9.554-9.338a2.432 2.432 0 0 0-3.345 0L.692 17.654a2.236 2.236 0 0 0 .002 3.233l14.567 14.175c.926.894 2.42.894 3.342.01L47.248 7.128c.922-.89.922-2.34 0-3.23">
                                        </path>
                                    </svg>
                                    <svg class="checkmark__background" height="115" viewBox="0 0 120 115" width="120"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M107.332 72.938c-1.798 5.557 4.564 15.334 1.21 19.96-3.387 4.674-14.646 1.605-19.298 5.003-4.61 3.368-5.163 15.074-10.695 16.878-5.344 1.743-12.628-7.35-18.545-7.35-5.922 0-13.206 9.088-18.543 7.345-5.538-1.804-6.09-13.515-10.696-16.877-4.657-3.398-15.91-.334-19.297-5.002-3.356-4.627 3.006-14.404 1.208-19.962C10.93 67.576 0 63.442 0 57.5c0-5.943 10.93-10.076 12.668-15.438 1.798-5.557-4.564-15.334-1.21-19.96 3.387-4.674 14.646-1.605 19.298-5.003C35.366 13.73 35.92 2.025 41.45.22c5.344-1.743 12.628 7.35 18.545 7.35 5.922 0 13.206-9.088 18.543-7.345 5.538 1.804 6.09 13.515 10.696 16.877 4.657 3.398 15.91.334 19.297 5.002 3.356 4.627-3.006 14.404-1.208 19.962C109.07 47.424 120 51.562 120 57.5c0 5.943-10.93 10.076-12.668 15.438z">
                                        </path>
                                    </svg>
                                
                                </div>
                            </div>

                            <div class="order-contain">
                                <h3 class="theme-color">Order Success</h3>
                                <h5 class="text-content">Payment Is Successfully And Your Order Is On The Way</h5>
                                <h6>Transaction ID: <?=givedata($conn,"order_master","order_id",$oid,"transactionID")?></h6>
                            </div>
                            <?php
                                    }
                                    ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Cart Section Start -->
  <!-- Cart Section End -->

    <!-- Footer Section Start -->
    <?php include '../inner_footer.php';?> 
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
                                        <img src="assets/images/vegetable/product/10.png" class="blur-up lazyload"
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
                                        <img src="assets/images/vegetable/product/11.png" class="blur-up lazyload"
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
                                        <img src="assets/images/vegetable/product/12.png" class="blur-up lazyload"
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
                                        <img src="assets/images/vegetable/product/13.png" class="blur-up lazyload"
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

    <!-- latest jquery-->

</body>


<!-- Mirrored from themes.pixelstrap.com/fastkart/front-end/order-success.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2024 06:38:13 GMT -->
</html>