<?php include 'header.php'; ?>

<style>
    .table {
        width: 100%;
        margin-bottom: 1rem;
        background-color: transparent;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 1rem;
        text-align: left;
        vertical-align: middle;
        border-top: 1px solid #dee2e6;
    }

    .table th {
        background-color: #f8f9fa;
        color: #495057;
        font-weight: bold;
    }

    .table .product-detail {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .table .product-detail .name a {
        font-size: 16px;
        font-weight: bold;
        text-decoration: none;
        color: #333;
    }

    .table .price,
    .table .quantity,
    .table .subtotal {
        text-align: center;
    }

    .table .quantity .input-group {
        display: flex;
        align-items: center;
    }

    .table .save-remove a {
        display: inline-block;
        padding: 8px 15px;
        background-color: rgb(20, 14, 54);
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
    }
</style>

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
                                <a href="index.html">
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
            <div class="col-lg-8">
                <div class="cart-table"
                    style="border: 1px solid #00000017; border-radius: 10px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 15px;">
                    <div class="table-responsive-xl">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="font-size: 14px;">Item</th>
                                    <th style="font-size: 14px;">Price</th>
                                    <th style="font-size: 14px;">Quantity</th>
                                    <th style="font-size: 14px;">Total</th>
                                    <!-- <th style="font-size: 14px;">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <!-- First Product -->
                                <tr>
                                    <td style="font-size: 14px;">
                                        <img src="assets/images/vegetable/product/1.png" class="img-fluid"
                                            alt="Bell pepper" style="width: 50px; height: 50px;">
                                        Bell pepper
                                    </td>
                                    <td style="font-size: 14px;">£35.10</td>
                                    <td style="font-size: 14px;">
                                        <div class="d-flex align-items-center">
                                            <button type="button" class="btn btn-outline-secondary btn-sm"
                                                style="font-size: 12px; padding: 0 8px;"
                                                onclick="decrementQuantity(this)">-</button>
                                            <input class="form-control input-number qty-input" type="text" value="1"
                                                style="font-size: 14px; width: 50px; text-align: center; margin: 0 10px;">
                                            <button type="button" class="btn btn-outline-secondary btn-sm"
                                                style="font-size: 12px; padding: 0 8px;"
                                                onclick="incrementQuantity(this)">+</button>
                                        </div>
                                    </td>
                                    <td style="font-size: 14px;">£35.10</td>
                                    <!-- <td style="font-size: 14px; text-align: center;">
                                        <a class="remove close_button" href="javascript:void(0)"
                                            style="padding: 5px; background-color: #e74c3c; color: #fff; text-decoration: none; border-radius: 50%; font-size: 16px; font-weight: bold;">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td> -->
                                </tr>

                                <!-- Second Product -->
                                <tr>
                                    <td style="font-size: 14px;">
                                        <img src="assets/images/vegetable/product/2.png" class="img-fluid"
                                            alt="Eggplant" style="width: 50px; height: 50px;">
                                        Eggplant
                                    </td>
                                    <td style="font-size: 14px;">£52.95</td>
                                    <td style="font-size: 14px;">
                                        <div class="d-flex align-items-center">
                                            <button type="button" class="btn btn-outline-secondary btn-sm"
                                                style="font-size: 12px; padding: 0 8px;"
                                                onclick="decrementQuantity(this)">-</button>
                                            <input class="form-control input-number qty-input" type="text" value="1"
                                                style="font-size: 14px; width: 50px; text-align: center; margin: 0 10px;">
                                            <button type="button" class="btn btn-outline-secondary btn-sm"
                                                style="font-size: 12px; padding: 0 8px;"
                                                onclick="incrementQuantity(this)">+</button>
                                        </div>
                                    </td>
                                    <td style="font-size: 14px;">£52.95</td>
                                    <!-- <td style="font-size: 14px; text-align: center;">
                                        <a class="remove close_button" href="javascript:void(0)"
                                            style="padding: 5px; background-color: #e74c3c; color: #fff; text-decoration: none; border-radius: 50%; font-size: 16px; font-weight: bold;">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td> -->
                                </tr>

                                <!-- Third Product -->
                                <tr>
                                    <td style="font-size: 14px;">
                                        <img src="assets/images/vegetable/product/3.png" class="img-fluid" alt="Onion"
                                            style="width: 50px; height: 50px;">
                                        Onion
                                    </td>
                                    <td style="font-size: 14px;">£67.36</td>
                                    <td style="font-size: 14px;">
                                        <div class="d-flex align-items-center">
                                            <button type="button" class="btn btn-outline-secondary btn-sm"
                                                style="font-size: 12px; padding: 0 8px;"
                                                onclick="decrementQuantity(this)">-</button>
                                            <input class="form-control input-number qty-input" type="text" value="1"
                                                style="font-size: 14px; width: 50px; text-align: center; margin: 0 10px;">
                                            <button type="button" class="btn btn-outline-secondary btn-sm"
                                                style="font-size: 12px; padding: 0 8px;"
                                                onclick="incrementQuantity(this)">+</button>
                                        </div>
                                    </td>
                                    <td style="font-size: 14px;">£67.36</td>
                                    <!-- <td style="font-size: 14px; text-align: center;">
                                        <a class="remove close_button" href="javascript:void(0)"
                                            style="padding: 5px; background-color: #e74c3c; color: #fff; text-decoration: none; border-radius: 50%; font-size: 16px; font-weight: bold;">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td> -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- <script>
                function incrementQuantity(button) {
                    const input = button.previousElementSibling;
                    input.value = parseInt(input.value) + 1;
                }

                function decrementQuantity(button) {
                    const input = button.nextElementSibling;
                    if (input.value > 1) {
                        input.value = parseInt(input.value) - 1;
                    }
                }
            </script> -->



            <div class="col-lg-4">
                <div class="summery-box p-sticky">
                    <div class="summery-header">
                        <h3>Cart Total</h3>
                    </div>

                    <div class="summery-contain">
                        <div class="coupon-cart">
                            <h6 class="text-content mb-2">Coupon Apply</h6>
                            <div class="mb-3 coupon-box input-group">
                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Enter Coupon Code Here...">
                                <button class="btn-apply">Apply</button>
                            </div>
                        </div>
                        <ul>
                            <li>
                                <h4>Subtotal</h4>
                                <h4 class="price">£125.65</h4>
                            </li>

                            <li>
                                <h4>Coupon Discount</h4>
                                <h4 class="price">(-) 0.00</h4>
                            </li>

                            <li class="align-items-start">
                                <h4>Shipping</h4>
                                <h4 class="price text-end">£6.90</h4>
                            </li>
                        </ul>
                    </div>

                    <ul class="summery-total">
                        <li class="list-total border-top-0">
                            <h4>Total (USD)</h4>
                            <h4 class="price theme-color">£132.58</h4>
                        </li>
                    </ul>

                    <div class="button-group cart-button">
                        <ul>
                            <li>
                                <button onclick="location.href = 'checkout.html';"
                                    class="btn btn-animation proceed-btn fw-bold">Process To Checkout</button>
                            </li>

                            <li>
                                <button onclick="location.href = 'index.html';"
                                    class="btn btn-light shopping-button text-dark">
                                    <i class="fa-solid fa-arrow-left-long"></i>Return To Shopping</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Cart Section End -->

<?php include 'footer.php'; ?>

</body>


<!-- Mirrored from themes.pixelstrap.com/fastkart/front-end/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2024 06:36:36 GMT -->

</html>