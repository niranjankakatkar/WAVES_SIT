<?php include '../niru_collection.php';

if ($_SESSION['guesst_login_KEY'] == "") {
    $_SESSION['guesst_login_KEY'] = '' . generateRandomString(30);
}


if($_GET['did'] != '')
{
    $url_id=$_GET['did'] ;
	$sql = "DELETE FROM wishlist WHERE id='$url_id'";
	if($conn->query($sql)){
		
	}
	
}

function shorten($string, $maxLength) {
    return substr($string, 0, $maxLength);
}

?> 
<?php include '../inner_header.php';?> 


    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        <h2>Wishlist</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="../">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Wishlist</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Wishlist Section Start -->
    <section class="wishlist-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-4 g-2">

                <?php
                 $guest_key = $_SESSION['guesst_login_KEY'];
                 $srid = "";
                    $sql = "SELECT * FROM wishlist where token_key='$_SESSION[guesst_login_KEY]'";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {

                        $pid=$row['product_key'];
                        $img=givedata($conn,"products","key_",$row['product_key'],"filepath");
                        $cat_id=givedata($conn,"products","key_",$row['product_key'],"category_id");
                        if($img==""){
                            $img="../assets/images/no_image.jpg";
                        }else{
                            $img="../ADMIN//".$img;
                        }                  
                        $srid = "1";
                ?>
                   <div class="col-xxl-3 col-lg-3 col-md-4 col-6 product-box-contain">
                    <div class="product-box-3 h-100">
                        <div class="product-header">
                            <div class="product-image">
                                <a href="../Product-List/details.php?i=<?=$pid?>">
                                    <img src="<?=$img?>" class="img-fluid blur-up lazyload"
                                        alt="">
                                </a>

                                <div class="product-header-top">
                                    <button class="btn wishlist-button close_button">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="product-footer">
                            <div class="product-detail">
                                <span class="span-name"><?=givedata($conn,"category","id",$cat_id,"category_title");?></span>
                                <a href="../Product-List/details.php?i=<?=$pid?>">
                                    <h5 class="name"><?php
                                    
                                    $pname= givedata($conn,"products","key_",$row['product_key'],"product_title");
                                    $plenght=strlen($pname);
                                   if($plenght>=20){
                                    echo shorten($pname, 20)."...";
                                   }else{
                                    echo $pname;
                                   }
                                    
                                   ?></h5>
                                </a>
                               
                                <h5 class="price">
                                    <span class="theme-color">£ <?=givedata($conn,"products","key_",$row['product_key'],"retail_rate");?></span>
                                   
                                </h5>

                                <div class="add-to-cart-box bg-white mt-2">
                                <button onclick="window.location.href='?did=<?=$row['id']?>'"
                                                style="background-color: rgb(255 54 73)  !important;"
                                                class="btn btn-md bg-dark cart-button text-white w-100">Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                    }
                    if ($srid == "") {
                        ?>
                        <div
                            style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 80vh; text-align: center;">
                            <img src="../assets/images/brand/empty-cart.png" class="img-fluid blur-up lazyload"
                                style="max-width: 200px; width: 100%; height: auto; margin-bottom: 15px;" />
                            <p style="font-size: 16px; color: #555; margin-bottom: 5px;">Your wishlist is empty!</p>
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
    </section>
    <!-- Wishlist Section End -->

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


<!-- Mirrored from themes.pixelstrap.com/fastkart/front-end/wishlist.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2024 06:36:31 GMT -->
</html>