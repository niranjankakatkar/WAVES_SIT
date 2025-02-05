<?php
include '../niru_collection.php';
include '../inner_header.php';


$coupon_discount = 0;
$subtotal = 0;
$shipping_fee = 0;


?>





<!-- Breadcrumb Section Start -->
<section class="breadcrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-contain">
                    <h2>Cart</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="../">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Cart Section Start -->
<section class="cart-section section-b-space">
    <div class="container-fluid-lg">
        <div class="row g-sm-5 g-3">
            <div class="col-xxl-9">
                <div class="cart-table">
                    <div class="table-responsive-xl">

                        <table class="table">
                            <tbody>
                                <?php
                                $guest_key = $_SESSION['guesst_login_KEY'];
                                $srid = "";
                                $sql = "SELECT * FROM cart_master where login_key='$guest_key' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $timepstamp = $row['timestamp'];
                                    $timepstamp = date_create("" . $timepstamp);
                                    $product_key = $row['product_key'];
                                    $srid = "1";
                                    $subtotal = $subtotal + $row['total'];
                                    $img="";
                                    $filepath=givedata($conn, "products", "key_", $product_key, "filepath");
                                    if($filepath==""){
                                         $img="../assets/images/no_image.jpg";
                                 }else{
                                     $img="../ADMIN//".$filepath;
                                     
                                 }
                                    ?>
                                    <tr class="product-box-contain">
                                        <td class="product-detail">
                                            <div class="product border-0">
                                                <a href="../Product-List/details.php?i=<?=$product_key?>" class="product-image">
                                                    <img src="<?=$img?>"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </a>
                                                <div class="product-detail">
                                                    <ul>
                                                        <li class="name">
                                                            <a
                                                                href="../Product-List/details.php?i=<?=$product_key?>"><?= givedata($conn, "products", "key_", $product_key, "product_title") ?></a><br>
                                                                <h4 class="table-title text-content">
                                                                <h5><b>Price </b>: £ <?= $row['rate'] ?> </h5></h4><br>
                                                                <h4 class="table-title text-content">
                                            <div class="quantity-price">
                                                <div class="cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn " onclick="qtyCal('min','<?=$row['id']?>','<?=$row['product_key']?>')">
                                                            <i class="fa fa-minus ms-0"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                            name="quantity<?=$row['product_key']?>" id="quantity<?=$row['id']?>" value="<?= $row['qty'] ?>">
                                                        <button type="button" class="btn " onclick="qtyCal('add','<?=$row['id']?>','<?=$row['product_key']?>')">
                                                            <i class="fa fa-plus ms-0"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div></h4>
                                                        </li>








                                                    </ul>
                                                </div>
                                            </div>
                                        </td>

                                      

                                        <td class="subtotal">
                                            <h4 class="table-title text-content">Total</h4>
                                            <h5>£ <?= $row['total'] ?></h5>
                                        </td>

                                        <td class="save-remove">
                                            <h4 class="table-title text-content">Action</h4>

                                            <a class="remove close_button" onclick="removeCartItem(`<?= $row['product_key'] ?>`)" href="javascript:void(0)">Remove</a>
                                        </td>
                                    </tr>

                                    <?php
                                }



                                ?>


                            </tbody>
                        </table>

                        <?php
                        if ($srid == "") {
                            ?>
                            <div
                                style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 60vh; text-align: center;">
                                <img src="../assets/images/brand/empty-cart.png" class="img-fluid blur-up lazyload"
                                    style="max-width: 200px; width: 100%; height: auto; margin-bottom: 15px;" />
                                <p style="font-size: 16px; color: #555; margin-bottom: 5px;">Your cart is empty!</p>
                                <p style="font-size: 10px; color: #555; margin-bottom: 5px;">Add items to it now.</p>
                                <button onclick="window.location.href='../'"
                                    style="padding: 10px 20px; border-radius: 5px; background-color: #062d6a; color: white; border: 1px solid #062d6a; cursor: pointer;">
                                    Shop now
                                </button>
                            </div>

                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3">
                <div class="summery-box p-sticky" id="CART_TOTAL">
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
                       
                            <li>
                                <h4>Subtotal</h4>
                                <input type="hidden" name="subtotal" id="subtotal" value="<?= $subtotal ?>">
                                <h4 class="price">£<?= number_format($subtotal, 2); ?></h4>
                            </li>
                                <?Php
                                        if($subtotal<=100){
                                            $shipping_fee=6.99;
                                        }
                                        $grnad=$subtotal + $shipping_fee;
                                ?>
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
                            <h4>Total (POUNDS)</h4>
                            <h4 class="price theme-color" id="grandTotal">
                                £<?= number_format($subtotal + $shipping_fee - $coupon_discount, 2); ?></h4>
                        </li>
                    </ul>

                    <div class="button-group cart-button">
                        <ul>
                            <li>
                                <input type="hidden" name="grandTotal_" id="grandTotal_" value="<?=$grnad?>" >
                                <input type="hidden" name="coupon_discount_" id="coupon_discount_" value="0.00" >
                                <input type="hidden" name="shipping_fee_" id="shipping_fee_" value="<?=$shipping_fee?>" >
                                
                                <button onclick="proccess_Continue()"
                                    class="btn btn-animation proceed-btn fw-bold">Process To Checkout</button>
                            </li>
                            <li>
                                <button onclick="location.href = '../';"
                                    class="btn btn-light shopping-button text-dark">
                                    <i class="fa-solid fa-arrow-left-long"></i>Return To Shopping
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Cart Section End -->

<?php include '../inner_footer.php'; ?>

<script>
    function qtyCal(status,id_,pid){
      
        let qty_input= document.getElementById("quantity"+id_).value ;
        let x = Number(qty_input);
        if(x<=0){

        }else{

        if(status=='add')
        {
           let y = 1;
            let z = x + y;
            document.getElementById("quantity"+id_).value=z;
            add_qty_AJAX(id_);
        }  
        if(status=='min')
        {
          
           
           
            let y = 1;
            let z = x - y;
            document.getElementById("quantity"+id_).value=z;
            add_qty_AJAX(id_);
        }
    }
    }

    function add_qty_AJAX(id){

        let qty= document.getElementById("quantity"+id).value ;
        $.ajax({
            type: "POST",
            url: "add_qty_AJAX.php",
            data: ({ id: id,qty:qty }), // Serialize form data
            success: function (data) {

                location.reload();

                
            },
            error: function (data) {
                alert("Error occurred while submitting the form");
            }
        });
    }

    function proccess_Continue(){
        var copon_code=document.getElementById("coupon_code").value ;
        var subTot= document.getElementById("subtotal").value ;
        var grandTot= document.getElementById("grandTotal_").value ;
      var couponTot = document.getElementById("coupon_discount_").value ;
      var shippingTot= document.getElementById("shipping_fee_").value ;

        $.ajax({
            type: "POST",
            url: "process_TO.php",
            data: ({ subTot: subTot,grandTot:grandTot,couponTot:couponTot,shippingTot:shippingTot,coupon_code:copon_code }), // Serialize form data
            success: function (data) {
                console.log('my message' + data);
                let mydata = data.split("__AJAX-");
                var word = "" + mydata[1];
                let ans = "" + word.localeCompare("Done ");
                if (ans == 0) {
               
                    
                    window.location.href='../CHECKOUT/';
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

    function removeCartItem(id){
        
        $.ajax({
            type: "POST",
            url: "removeItem.php",
            data: ({ product_key: id }), // Serialize form data
            success: function (data) {
                console.log('my message' + data);
                let mydata = data.split("__AJAX-");
                var word = "" + mydata[1];
                let ans = "" + word.localeCompare("Done ");
                if (ans == 0) {
               
                    
                    location.reload();

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
    $(document).ready(function () {
        $("#submitButton_").click(function (event) {
            event.preventDefault(); // Prevent default form submission

            var a = document.getElementById("coupon_code").value;
            var total = document.getElementById("subtotal").value;

            if (isNaN(total)) {
                alert("Subtotal is not valid. Please check the value.");
                return; // Stop further execution
            }

           

          
            let form = $("#formId_");
            let url = "getCouponCode.php";

            $.ajax({
                type: "POST",
                url: url,
                data: { coupon_code: a, subtotal: total }, // Serialize form data
                success: function (data) {
                    console.log('my message' + data);
                    let mydata = data.split("__AJAX-");
                    var word = "" + mydata[1];
                   

                    let couponDiscount = mydata[2];
                    let shippingFee = mydata[3];

                    // document.getElementById("coupon_discount").innerHTML = "" +coupon_discount;
                    document.getElementById("grandTotal").innerHTML = "£ " + word;
                    document.getElementById("coupon_discount").innerHTML = "£ " + mydata[2];
                    document.getElementById("shipping_fee").innerHTML = "£ " + mydata[3];

                    document.getElementById("grandTotal_").value = "£ " + word;
                    document.getElementById("coupon_discount_").value = "£ " + mydata[2];
                    document.getElementById("shipping_fee_").value = "£ " + mydata[3];



                    if (word == "error") {
                        document.getElementById("login_responce").innerHTML = "<span style='color:red'>Invalide or expired coupon code!</span>";
                        document.getElementById("grandTotal").innerHTML = "£" + total;
                        document.getElementById("coupon_discount").innerHTML = "£0.00";
                        document.getElementById("shipping_fee").innerHTML = "£6.99";

                    } else {
                        document.getElementById("login_responce").innerHTML = "<span style='color:green'>Coupon Apply successfully</span>";

                    }

                },
                error: function (data) {
                    alert("Error occurred while Entering the Coupon");
                }
            });
        });
    });
</script>