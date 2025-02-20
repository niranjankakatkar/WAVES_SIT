<?php include '../niru_collection.php'; ?>
<?php include '../inner_header.php'; ?>

<?php
$cat_id = "";
$scat_id = "";// givedata($conn, "category", "key_", $_GET['id'], "id");
if ($_GET['id'] != "") {
    $cat_id = givedata($conn, "category", "key_", $_GET['id'], "id");
}
if ($_GET['id_'] != "") {
    $scat_id =  givedata($conn, "sub_category", "key_", $_GET['id_'], "id");
    $cat_id = givedata($conn, "sub_category", "key_", $_GET['id_'], "category_id");
}

function shorten($string, $maxLength) {
    return substr($string, 0, $maxLength);
}

?>

<!-- Breadcrumb Section Start -->
<section class="breadcrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-contain">
                    <h2><?php

                    $title = "";
                    if ($scat_id == "") {
                        $title = givedata($conn, "category", "key_", $_GET['id'], "category_title");

                    } else {
                        $title = givedata($conn, "sub_category", "key_", $_GET['id_'], "sub_category_title");

                    }
                    ?><?= $title ?></h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="../">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                <?= $title ?>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->


<!-- Poster Section Start -->
<!-- <section>
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="slider-1 slider-animate product-wrapper no-arrow">
                        <div>
                            <div class="banner-contain-2 hover-effect">
                                <img src="../assets/images/shop/1.jpg" class="bg-img rounded-3 blur-up lazyload" alt="">
                                <div
                                    class="banner-detail p-center-right position-relative shop-banner ms-auto banner-small">
                                    <div>
                                        <h2>Healthy, nutritious & Tasty Fruits & Veggies</h2>
                                        <h3>Save upto 50%</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="banner-contain-2 hover-effect">
                                <img src="../assets/images/shop/1.jpg" class="bg-img rounded-3 blur-up lazyload" alt="">
                                <div
                                    class="banner-detail p-center-right position-relative shop-banner ms-auto banner-small">
                                    <div>
                                        <h2>Healthy, nutritious & Tasty Fruits & Veggies</h2>
                                        <h3>Save upto 50%</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="banner-contain-2 hover-effect">
                                <img src="../assets/images/shop/1.jpg" class="bg-img rounded-3 blur-up lazyload" alt="">
                                <div
                                    class="banner-detail p-center-right position-relative shop-banner ms-auto banner-small">
                                    <div>
                                        <h2>Healthy, nutritious & Tasty Fruits & Veggies</h2>
                                        <h3>Save upto 50%</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
<!-- Poster Section End -->


<!-- Shop Section Start -->
<section class="section-b-space shop-section">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-custom-3">
                <div class="left-box wow fadeInUp">
                    <div class="shop-left-sidebar">
                        <div class="back-button">
                            <h3><i class="fa-solid fa-arrow-left"></i> Back</h3>
                        </div>



                        <div class="accordion custom-accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne">
                                        <span>Categories</span>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show">
                                    <div class="accordion-body">
                                        <div class="form-floating theme-form-floating-2 search-box">
                                            <input onkeyup="serach_cat()" type="search" class="form-control" id="search"
                                                placeholder="Search ..">
                                            <label for="search" onclick="serach_cat()">Search</label>
                                            <input type="hidden" name="cat_id" id="cat_id" value="<?=$cat_id?>">
                                            
                                        </div>

                                        <ul class="nav nav-pills mb-3 custom-nav-tab" id="pills-tab" role="tablist">
                                            <?php
                                            $sql = "SELECT * FROM sub_category where category_id='$cat_id' AND flag='1' ORDER BY seq";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $active = "";
                                                if ($row['key_'] == $_GET['id_']) {
                                                    $active = "active";
                                                }
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
                                            ?>



                                            
                                        </ul>


                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>
                </div>
            </div>

            <div class="col-custom-">
                <div class="show-button">
                    <div class="filter-button-group mt-0">
                        <div class="filter-button d-inline-block d-lg-none">
                            <a><i class="fa-solid fa-filter"></i> Filter Menu</a>
                        </div>
                    </div>

                    <div class="top-filter-menu">
                       
                        <div class="grid-option d-none d-md-block">
                            <ul>
                                <li class="three-grid">
                                    <a href="javascript:void(0)">
                                        <img src="https://themes.pixelstrap.com/fastkart/assets/svg/grid-3.svg"
                                            class="blur-up lazyload" alt="">
                                    </a>
                                </li>
                                <li class="grid-btn d-xxl-inline-block d-none active">
                                    <a href="javascript:void(0)">
                                        <img src="https://themes.pixelstrap.com/fastkart/assets/svg/grid-4.svg"
                                            class="blur-up lazyload d-lg-inline-block d-none" alt="">
                                        <img src="https://themes.pixelstrap.com/fastkart/assets/svg/grid.svg"
                                            class="blur-up lazyload img-fluid d-lg-none d-inline-block" alt="">
                                    </a>
                                </li>
                                <li class="list-btn">
                                    <a href="javascript:void(0)">
                                        <img src="https://themes.pixelstrap.com/fastkart/assets/svg/list.svg"
                                            class="blur-up lazyload" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div
                    class="row g-sm-4 g-3 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2 product-list-section">

                    <?php
                    $sql = "";
                    if ($scat_id != "") {
                        $sql = "SELECT * FROM products where sub_category_id='$scat_id' AND flag='1'";

                    } else {
                        $sql = "SELECT * FROM products where category_id='$cat_id' AND flag='1'";
                    }
                    if ($_GET['id'] == "" && $_GET['id_'] == "") {
                        $sql = "SELECT * FROM products where  flag='1' LIMIT 20";
                    }

                    //echo "-----".$sql;
$fl=0;
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $timepstamp = $row['timestamp'];
                        $timepstamp = date_create("" . $timepstamp);
                        $fl=1;

                        $exvat=$row['retail_rate'];
                        $invat=$exvat+($exvat*0.2);
                        ?>
                        <div>
                            <div class="product-box-3 h-100 wow fadeInUp">
                                <div class="product-header">
                                    <div class="product-image">
                                        <a href="details.php?i=<?= $row['key_'] ?>">
                                           
                                        <?php
                                                        if($row['filepath']==""){
                                                            ?>
                                                          <img src="../assets/images/no_image.jpg" class="img-fluid blur-up lazyload"
                                                          alt="">
                                                            <?php
                                                        }else{
                                                            ?>
                                                             <img src="../ADMIN//<?= $row['filepath'] ?>" class="img-fluid blur-up lazyload"
                                                             alt="">
                                                            <?php
                                                        }
                                                        ?>
                                           
                                        </a>

                                        <div class="product-header-top">
                                        <?php
                                        
                                         $avlKey=givedataMulti($conn,"wishlist"," product_key='$row[key_]' AND token_key='$_SESSION[guesst_login_KEY]'","id");
                                         if($avlKey!=""){
                                            ?>
                                                <button class="btn wishlist-button close_button" value="1" id="wishlist_icon_<?=$row['key_']?>" onclick="wishlistClick('<?=$row['key_']?>')">
                                                    <i  class="fa-solid fa-heart" style="color:#c50909"></i>
                                                </button>
                                            <?php
                                         }else{
                                            ?>
                                                <button class="btn wishlist-button close_button"  value="0" id="wishlist_icon_<?=$row['key_']?>" onclick="wishlistClick('<?=$row['key_']?>')">
                                                    <i  class="fa-regular fa-heart"></i>
                                                   </button>
                                            <?php
                                         }
                                        
                                        ?>
                                        
                                        
                                                        </div>


                                    </div>
                                </div>
                                <div class="product-footer">
                                    <div class="product-detail">
                                        <span
                                            class="span-name"><?php
                                            
                                            if($_GET['id']!=""){
                                            echo "".givedata($conn, "category", "key_", $_GET['id'], "category_title"); 
                                            }else{
                                                echo "".givedata($conn, "sub_category", "key_", $_GET['id_'], "sub_category_title"); 
                                            }?></span>
                                        <a href="details.php?i=<?= $row['key_'] ?>">
                                            <h5 class="name" title="<?=$row['product_title']?>"><?php
                                            $pname=$row['product_title'];
                                            $plenght=strlen($pname);
                                           
                                            echo $row['product_title'];
                                           
                                            ?></h5>
                                        </a>
                                        
                                        <h5 class="price"><span class="theme-color">£<?= $row['retail_rate'] ?> ex.VAT <br><h6 class="unit">£<?=$invat?> inc. VAT</h6></span>
                                        </h5>
                                        <?php
if($plenght>=25){}else{?><br><?php                                           
}
                                        ?>
                                        <div class="add-to-cart-box bg-white"><br>
                                       
                                        <?php
                                        $avlKey=givedataMulti($conn,"cart_master"," product_key='$row[key_]' AND login_key='$_SESSION[guesst_login_KEY]'","id");
                                        if($avlKey!=""){
                                            ?>
                                            <button onclick="add_to_cart(`<?= $row['key_'] ?>`)" id="<?= $row['key_'] ?>"
                                                style="background-color: #212529 !important;"
                                                class="btn btn-md bg-dark cart-button text-white w-100">Go To Cart</button>
                                                <?php
                                        }else{
                                        ?>
                                            <button onclick="add_to_cart(`<?= $row['key_'] ?>`)" id="<?= $row['key_'] ?>"
                                                style="background-color: rgb(4 44 110) !important;"
                                                class="btn btn-md bg-dark cart-button text-white w-100">Add To Cart</button>
                                                <?php
                                            }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                    if ($srid == "") {
                        ?>
                       

                        <?php
                    }
                    ?>

                    <input type="hidden" name="guesst_login_KEY" id="guesst_login_KEY"
                        value="<?= $_SESSION['guesst_login_KEY'] ?>">


                </div>

                <nav class="custom-pagination">
                    <?php
                    if($fl==0){
                    ?>
                        <div
                            style="display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 100vh; text-align: center;margin-top:-20%">
                            <img src="../assets/images/brand/productlist.jpg" class="img-fluid blur-up lazyload"
                                style="max-width: 200px; width: 100%; height: auto; margin-bottom: 15px;" />
                            <p style="font-size: 16px; color: #555; margin-bottom: 5px;">Your Product-List is empty!</p>
                            <p style="font-size: 10px; color: #555; margin-bottom: 5px;">Add Product to it now.</p>
                            <button onclick="window.location.href='../'"
                                style="padding: 10px 20px; border-radius: 5px; background-color: #062d6a; color: white; border: 1px solid #062d6a; cursor: pointer;">
                                Shop now
                            </button>
                        </div>
                        <?php
                    }
                ?>

                   
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->

<?php include '../inner_footer.php'; ?>

<script>

    function wishlistClick(id){
        const toggleIcon = document.getElementById("wishlist_icon_"+id);
        
       
       if (toggleIcon.value === "0") {
            // Show the password
            toggleIcon.innerHTML =' <i  class="fa-solid fa-heart" style="color:#c50909"></i>' ;
            wishlist_SUBMIT(id);
           
        } else {
          
            toggleIcon.innerHTML =' <i  class="fa-regular fa-heart" ></i>' ;
            wishlist_SUBMIT(id);
        //    toggleIcon.classList.remove("fa-regular","fa-heart");
          //  toggleIcon.classList.add("fa-solid","fa-heart");
        }
    }

    function wishlist_SUBMIT(id){
        $.ajax({
            type: "POST",
            url: "add_to_wishlist.php",
            data: ({ pid: id}), // Serialize form data
            success: function (data) {
                console.log('my message' + data);
              //  let mydata = data.split("__AJAX-");
               // var word = "" + mydata[1];
               
               // document.getElementById("pills-tab").innerHTML =mydata[1] ;
                

               
            },
            error: function (data) {
                alert("Error occurred while submitting the form");
            }
        });

    }

    function serach_cat(){
        var search = document.getElementById("search").value;
        var cat_id = document.getElementById("cat_id").value;
//alert(search);
        $.ajax({
            type: "POST",
            url: "search_cat.php",
            data: ({ search: search,cat_id:cat_id }), // Serialize form data
            success: function (data) {
                console.log('my message' + data);
                let mydata = data.split("__AJAX-");
                var word = "" + mydata[1];
               
                document.getElementById("pills-tab").innerHTML =mydata[1] ;
                

               
            },
            error: function (data) {
                alert("Error occurred while submitting the form");
            }
        });
    }

    function add_to_cart(id) {
        var pID = id;
        var guesst_login_KEY = document.getElementById("guesst_login_KEY").value;
        var jj=document.getElementById(id).innerHTML;
        if(jj==="Go To Cart")
        {
            window.location.href = '../CART';

        }else{
                    $.ajax({
            type: "POST",
            url: "add_to_cart.php",
            data: ({ product_key: pID, login_key: guesst_login_KEY }), // Serialize form data
            success: function (data) {
                console.log('my message' + data);
                let mydata = data.split("__AJAX-");
                var word = "" + mydata[1];
                let ans = "" + word.localeCompare("Done ");
                if (ans == 0) {
                REFRESHCART();
                document.getElementById(id).innerHTML ="Go To Cart" ;
                document.getElementById(id).style.backgroundColor  = "#212529";

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

    }

    function REFRESHCART(){

        $.ajax({
            type: "POST",
            url: "../CART/getCartDetails.php",
            data: ({  }), // Serialize form data
            success: function (data) {
                console.log('my message' + data);
                let mydata = data.split("__AJAX-");
              
                document.getElementById("cartDetails_DIV").innerHTML =mydata[1] ;

             
            },
            error: function (data) {
                alert("Error occurred while submitting the form");
            }
        });

    }




</script>

</body>

</html>