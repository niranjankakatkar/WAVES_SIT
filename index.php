<?php include 'niru_collection.php'; ?>
<?php include 'header.php'; ?>

<?php
if ($_SESSION['guesst_login_KEY'] == "") {
    $_SESSION['guesst_login_KEY'] = '' . generateRandomString(30);
}

function shorten($string, $maxLength) {
    return substr($string, 0, $maxLength);
}

?>

<!-- CSS for Styling -->
<style>
    .slider-container {
        position: relative;
        width: 100%;
        overflow: hidden;
    }

    .slider {
        display: flex;
        transition: transform 1s ease-in-out;
    }

    .slide {
        min-width: 100%;
        position: relative;
    }

    .slide img {
        width: 100%;
        height: auto;
    }



    .home-detail h1,
    .home-detail h4,
    .home-detail h6 {
        margin: 5px 0;
    }
</style>


<!-- Home Section Start -->
<section class="home-section-2 home-section-bg pt-0 overflow-hidden">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="slider-animate">
                    <div>


                        <div class="home-contain rounded-0 p-0">
                            <!-- Slider Wrapper -->
                            <div class="slider-container">
                                <!-- Slider Images -->
                                <div class="slider">
                                    <?php
                                    $sql = "SELECT * FROM banner_master where flag='1'";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {

                                        $filepath = str_replace("", "", "" . $row['filepath'])
                                            ?>
                                        <div class="slide">
                                            <img src="ADMIN//<?= $filepath ?>" class="img-fluid bg-img blur-up lazyload"
                                                alt="">
                                            <div
                                                class="home-detail home-big-space p-center-left home-overlay position-relative">
                                                <div class="container-fluid-lg">
                                                    <div>
                                                        <h6 class="ls-expanded theme-color text-uppercase">
                                                            <?= $row['discount_title'] ?></h6>
                                                        <h1 class="heding-2"><?= $row['title'] ?></h1>
                                                        <h6 class="text-content"><?= $row['details'] ?></h6>
                                                        <button
                                                            class="btn theme-bg-color btn-md text-white fw-bold mt-md-4 mt-2 mend-auto"
                                                            onclick="location.href = 'Product-List/';">
                                                            Shop Now <i class="fa-solid fa-arrow-right icon"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Home Section End -->

<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');
    const totalSlides = slides.length;


    function showSlide(index) {
        const slider = document.querySelector('.slider');
        slider.style.transform = `translateX(-${index * 100}%)`;
    }


    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
    }


    setInterval(nextSlide, 3000);


    showSlide(currentSlide);
</script>

<!-- Category Section Start -->
<section class="category-section-2">
    <div class="container-fluid-lg">
        <div class="title">
            <h2>Shop By Categories</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="category-slider arrow-slider">

                    <?php
                    $sql = "SELECT * FROM category where flag='1' ORDER BY seq";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div>
                            <div class="shop-category-box border-0 wow fadeIn">
                                <a href="Product-List/?id=<?= $row['key_'] ?>" class="circle-1">
                                    <img src="ADMIN//<?= $row['filepath'] ?>" class="img-fluid blur-up lazyload" alt=""
                                        style="width: 150px; height: 150px; object-fit: fill;">
                                </a>
                                <div class="category-name">
                                    <h6><?= $row['category_title'] ?></h6>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Category Section End -->


<section>
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="banner-contain">
                        <div class="banner-contain hover-effect">
                            <img src="assets/images/4.jpg" class="bg-img blur-up lazyload" alt="">
                            <div class="banner-details p-center p-sm-4 p-3 text-white text-center">
                                <div>
                                    <h3 class="lh-base fw-bold text-light">Get $3 Cashback! Min Order of $30</h3>
                                    <h6 class="coupon-code">Use Code : GROCERY1920</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Discount Section End -->

        <!-- Product Section Start -->
        <section>
        <div class="container-fluid-lg">
            <div class="title">
                <h2>TRENDING ITEMS</h2>
                <span class="title-leaf">
                    <svg class="icon-width">
                        <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                    </svg>
                </span>
                <p>A virtual assistant collects the products from your list</p>
            </div>
            <div class="product-border border-row row" >
            <?php
            $fl=0;
            $sql = "SELECT * FROM products where  flag='1' LIMIT 16";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $timepstamp = $row['timestamp'];
                        $timepstamp = date_create("" . $timepstamp);
                        $fl=1;
                        ?>
                        <div class="col-3" style="padding:2%;">
                            <div class="product-box-3 h-100 wow fadeInUp">
                                <div class="product-header">
                                    <div class="product-image">
                                        <a href="../Product-List/details.php?i=<?= $row['key_'] ?>">
                                           
                                        <?php
                                                        if($row['filepath']==""){
                                                            ?>
                                                          <img src="assets/images/no_image.jpg" class="img-fluid blur-up lazyload"
                                                          alt="">
                                                            <?php
                                                        }else{
                                                            ?>
                                                             <img src="ADMIN//<?= $row['filepath'] ?>" class="img-fluid blur-up lazyload"
                                                             alt="">
                                                            <?php
                                                        }
                                                        ?>
                                           
                                        </a>


                                    </div>
                                </div>
                                <div class="product-footer">
                                    <div class="product-detail">
                                        <span
                                            class="span-name"><?=givedata($conn, "category", "id", $row['category_id'], "category_title")?></span>
                                        <a href="Product-List/details.php?i=<?= $row['key_'] ?>">
                                            <h5 class="name"><?php
                                            $pname=$row['product_title'];
                                            $plenght=strlen($pname);
                                           if($plenght>=20){
                                            echo shorten($row['product_title'], 20)."...";
                                           }else{
                                            echo $row['product_title'];
                                           }
                                            ?></h5>
                                        </a>
                                        <p class="text-content mt-1 mb-2 product-content"><?= $row['description'] ?>
                                        </p>

                                        <h6 class="unit">Dimensions: <?= $row['dimensions'] ?></h6>
                                        <h5 class="price"><span class="theme-color">£ <?= $row['retail_rate'] ?></span>
                                        </h5>
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
                    ?>
                      <input type="hidden" name="guesst_login_KEY" id="guesst_login_KEY"
                      value="<?= $_SESSION['guesst_login_KEY'] ?>">
               
            </div>
        </div>
    </section>
    <!-- Product Section End -->

      <!-- Offer Section Start -->
      <section>
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="offer-box hover-effect">
                        <img src="assets/images/4.jpg" class="bg-img blur-up lazyload" alt="">
                        <div class="offer-contain p-4">
                            <div class="offer-detail">
                                <h2 class="text-dark">Special Offers <span class="text-danger fw-bold">of the
                                        week!</span></h2>
                                <p class="text-content">Special offer on this discount, Hurry Up!</p>
                            </div>
                            <div class="offer-timing">
                                <div class="time" id="clockdiv-1" data-hours="1" data-minutes="2" data-seconds="3">
                                    <ul>
                                        <li>
                                            <div class="counter">
                                                <div class="days">
                                                    <h6></h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="counter">
                                                <div class="hours">
                                                    <h6></h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="counter">
                                                <div class="minutes">
                                                    <h6></h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="counter">
                                                <div class="seconds">
                                                    <h6></h6>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Offer Section End -->

      <!-- Product Section Start -->
   
    <!-- Product Section End -->

    


    <!-- Top Selling Section Start -->
    <section class="top-selling-section">
        <div class="container-fluid-lg">
            <div class="slider-4-1">
                <div>
                    <div class="row">
                        <div class="col-12">
                            <div class="top-selling-box">
                                <div class="top-selling-title">
                                    <h3>Top Selling</h3>
                                </div>
                                <?php
                    $sql = "";
                        $sql = "SELECT * FROM products where id BETWEEN '35' AND '50' LIMIT 4";
                        $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                       
                        ?>
                               
                                <div class="top-selling-contain wow fadeIn" data-wow-delay="0.15s">
                                    <a href="Product-List/details.php?i=<?= $row['key_'] ?>" class="top-selling-image">
                                        <img src="ADMIN//<?=$row['filepath']?>"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="Product-List/details.php?i=<?= $row['key_'] ?>">
                                            <h5><?=$row['product_title']?></h5>
                                        </a>
                                       
                                        <h6>£ <?=$row['retail_rate']?></h6>
                                    </div>
                                </div>
<?php
                    }
                    ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="row">
                        <div class="col-12">
                            <div class="top-selling-box">
                                <div class="top-selling-title">
                                    <h3>Trending Products</h3>
                                </div>


                                <?php
                    $sql = "";
                        $sql = "SELECT * FROM products where id BETWEEN '172' AND '180' LIMIT 4";
                        $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                       
                        ?>
                               
                                <div class="top-selling-contain wow fadeIn" data-wow-delay="0.15s">
                                    <a href="Product-List/details.php?i=<?= $row['key_'] ?>" class="top-selling-image">
                                        <img src="ADMIN//<?=$row['filepath']?>"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="Product-List/details.php?i=<?= $row['key_'] ?>">
                                            <h5><?=$row['product_title']?></h5>
                                        </a>
                                       
                                        <h6>£ <?=$row['retail_rate']?></h6>
                                    </div>
                                </div>
<?php
                    }
                    ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="row">
                        <div class="col-12">
                            <div class="top-selling-box">
                                <div class="top-selling-title">
                                    <h3>Recently added</h3>
                                </div>

                                <?php
                    $sql = "";
                        $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 4";
                        $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                       
                        ?>
                               
                                <div class="top-selling-contain wow fadeIn" data-wow-delay="0.15s">
                                    <a href="Product-List/details.php?i=<?= $row['key_'] ?>" class="top-selling-image">
                                        <img src="ADMIN//<?=$row['filepath']?>"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="Product-List/details.php?i=<?= $row['key_'] ?>">
                                            <h5><?=$row['product_title']?></h5>
                                        </a>
                                       
                                        <h6>£ <?=$row['retail_rate']?></h6>
                                    </div>
                                </div>
<?php
                    }
                    ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="row">
                        <div class="col-12">
                            <div class="top-selling-box">
                                <div class="top-selling-title">
                                    <h3>Top Rated</h3>
                                </div>

                                <?php
                    $sql = "";
                        $sql = "SELECT * FROM products where id BETWEEN '272' AND '300' LIMIT 4";
                        $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                       
                        ?>
                               
                                <div class="top-selling-contain wow fadeIn" data-wow-delay="0.15s">
                                    <a href="Product-List/details.php?i=<?= $row['key_'] ?>" class="top-selling-image">
                                        <img src="ADMIN//<?=$row['filepath']?>"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="Product-List/details.php?i=<?= $row['key_'] ?>">
                                            <h5><?=$row['product_title']?></h5>
                                        </a>
                                       
                                        <h6>£ <?=$row['retail_rate']?></h6>
                                    </div>
                                </div>
<?php
                    }
                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Top Selling Section End -->

<?php include 'footer.php'; ?>

<script>
  function addWishlist(product_key){
    alert(product_key);
    $.ajax({
      type: "POST",
      url: "get_wishlist.php", 
      data: { product_key: product_key }, 
      success: function (response)
      {
       
        try {
          const data = JSON.parse(response); 

          if (data.success) {
            alert(data.message); 
           
            $(element).find("i")
              .removeClass("fa-regular fa-heart") 
              .addClass("fa-solid fa-heart") 
              .css("color", "red"); 
          } else {
            alert(data.message); 
          }
        } catch (error) {
         alert("Unexpected response from the server."); 
        }
      },
      error: function () {
        alert("An error occurred while adding the product to the wishlist."); 
      },
    });
  }

  
  function add_to_cart(id) {
        var pID = id;
        var guesst_login_KEY = document.getElementById("guesst_login_KEY").value;
        var jj=document.getElementById(id).innerHTML;
        if(jj==="Go To Cart")
        {
            window.location.href = 'CART';

        }else{
                    $.ajax({
            type: "POST",
            url: "Product-List/add_to_cart.php",
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
            url: "CART/getCartDetails.php",
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