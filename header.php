
<?php
session_start();
include 'config.php';

// print_r($_SESSION);die;

$login_key = $_SESSION['guesst_login_KEY']; 

// Fetch cart items for the logged-in user
$query = "SELECT * FROM cart_master WHERE login_key='$login_key' ";
$result = mysqli_query($conn, $query);

$total_cart_items = mysqli_num_rows($result); // Count of items
$total_cart_value = 0; // Total value of cart
$cart_items = [];

while ($row = mysqli_fetch_assoc($result)) {
    $cart_items[] = $row;
    $total_cart_value += $row['total'];
}
?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/fastkart/front-end/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2024 06:35:46 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Waves Packging - Shaping Your Sustainable Future">
    <meta name="keywords" content="Waves Packging">
    <meta name="author" content="Waves Packging">
    <link rel="icon" href="assets/images/logo/1.ico" type="image/x-icon">
    <title>Waves Packaging</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- wow css -->
    <link rel="stylesheet" href="assets/css/animate.min.css">

    <!-- Iconly css -->
    <link rel="stylesheet" type="text/css" href="assets/css/bulk-style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/animate.css">
    <script src="assets/js/lordicon.js"></script>

   

    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="assets/css/style.css">
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-effect">

    <!-- Loader Start -->
    <div class="fullpage-loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <!-- Loader End -->

    <!-- Header Start -->
    <header class="pb-md-3 pb-0">
        <div class="header-top">
            <div class="container-fluid-lg">
                <div class="row">
                    <div class="col-xxl-3 d-xxl-block d-none">
                        <div class="top-left-header"><a href="https://maps.google.com/?q=<?=givedata($conn,"company_master","id","1","address")?>" target="_blank">
                            <i class="fa fa-map-marker text-white"></i>
                            <span class="text-white"><?=givedata($conn,"company_master","id","1","address2")?></span></a>
                        </div>
                    </div>

                    <div class="col-xxl-6 col-lg-9 d-lg-block d-none">
                        <div class="header-offer">
                            <div class="notification-slider">
                                <div>
                                    <div class="timer-notification">
                                        <h6 style="margin-top: 7px;"><?=givedata($conn,"popup_notification","id","1","display_msg")?>
                                        </h6>
                                    </div>
                                </div>

                              
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3" style="text-align: center; margin-top: 0px;">
                        <a href="SIGN-UP" style="text-decoration: none;">
                            <button style="
      padding: 10px 20px; 
      background-color: #fff; 
      color: black; 
      font-size: 16px; 
      /* font-weight: 200px;  */
      /* text-transform: uppercase;  */
      border: none; 
      border-radius: 5px; 
      cursor: pointer; 
      transition: background-color 0.3s ease, transform 0.2s ease;"
                                onmouseover="this.style.backgroundColor='#fff'; this.style.transform='scale(1.05)';"
                                onmouseout="this.style.backgroundColor='#fff'; this.style.transform='scale(1)';"
                                onmousedown="this.style.transform='scale(0.95)';"
                                onmouseup="this.style.transform='scale(1.05)';">
                                Wholesaler Sign-Up
                            </button>
                        </a>
                    </div>

                </div>
            </div>
        </div>

     
       

        <div class="top-nav top-header sticky-header">
            <div class="container-fluid-lg">
                <div class="row">
                    <div class="col-12">
                        <div class="navbar-top">
                            <button class="navbar-toggler d-xl-none d-inline navbar-menu-button" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                                <span class="navbar-toggler-icon">
                                    <i class="fa-solid fa-bars"></i>
                                </span>
                            </button>
                            <a href="index.php" class="web-logo nav-logo">
                                <img src="assets/images/logo/Waves Logo Jpg.jpg" class="img-fluid blur-up lazyload "  alt="" style="height: 100px;">
                            </a>

                            <div class="middle-box">
                                

                                <div class="search-box">
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="I'm searching for...">
                                        <button class="btn" type="button" id="button-addon2">
                                            <i data-feather="search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="rightside-box">
                                <div class="search-full">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i data-feather="search" class="font-light"></i>
                                        </span>
                                        <input type="text" class="form-control search-type" placeholder="Search here..">
                                        <span class="input-group-text close-search">
                                            <i data-feather="x" class="font-light"></i>
                                        </span>
                                    </div>
                                </div>
                                <ul class="right-side-menu">
                                    <li class="right-side">
                                        <div class="delivery-login-box">
                                            <div class="delivery-icon">
                                                <div class="search-box">
                                                    <i data-feather="search"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="right-side">
                                        <a href="tel:<?=givedata($conn,"company_master","id","1","contact_no1")?>" class="delivery-login-box">
                                            <div class="delivery-icon">
                                                <i data-feather="phone-call"></i>
                                            </div>
                                            <div class="delivery-detail">
                                                <h6>24/7 Delivery</h6>
                                                <h5><?=givedata($conn,"company_master","id","1","contact_no1")?></h5>
                                            </div>
                                        </a>
                                    </li>
                                     
                                        
                                    <li class="right-side">
                                        <a href="WISHLIST" class="btn p-0 position-relative header-wishlist">
                                            <i data-feather="heart"></i>
                                        </a>
                                    </li>
                                    <li class="right-side">
                                    <div class="onhover-dropdown header-badge">
                                            <button type="button" class="btn p-0 position-relative header-wishlist">
                                                <i data-feather="shopping-cart"></i>
                                               
                                                <?php if ($total_cart_items > 0): ?>
                                                    <span class="position-absolute top-0 start-100 translate-middle badge">
                                                    <span class="cart-count"><?= $total_cart_items; ?></span>
                                                      </span>
                                                <?php endif; ?>
                                              
                                            </button>

                                            <div class="onhover-div" id="cartDetails_DIV">
                                                <ul class="cart-list">
                                                <?php

                                                // Fetch cart items for the logged-in user

                                                        $query = "SELECT * FROM cart_master  WHERE login_key='$login_key' ";
                                                        // echo "".$query;
                                                        $result = mysqli_query($conn, $query);

                                                        $total_cart_items = mysqli_num_rows($result); // Count of items
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                           $productkey=$row['product_key'];
                                                           $img="";
                                                           $filepath=givedata($conn, "products", "key_", $productkey, "filepath");
                                                           if($filepath==""){
                                                                $img="assets/images/no_image.jpg";
                                                        }else{
                                                            $img="ADMIN//".$filepath;
                                                            
                                                        }
                                                        
                                                
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
                                                    <a href="CHECKOUT/" class="btn btn-sm cart-button theme-bg-color text-white">Checkout</a>
                                                    <a href="CART/" class="btn btn-sm cart-button">View Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    
                                    <li class="right-side onhover-dropdown">
                                        <?php
                                        
                                            if($_SESSION['tokenID']==""){
                                                ?>
                                                <div class="delivery-login-box" >
                                                    <div class="delivery-icon">
                                                    <a href="SIGN-IN/"><i  data-feather="user"></i></a>  
                                                    </div>
                                                    <div class="delivery-detail">
                                                        
                                                    </div>
                                                </div>
                                                <?php

                                            }else{
                                                ?>
                                                     <div class="delivery-login-box">
                                                        <div class="delivery-icon">
                                                            <i style="color:#062d6a;font-weight: 900" data-feather="user"></i>
                                                        </div>
                                                        <div class="delivery-detail">
                                                            <h6>Hello,</h6>
                                                            <h5><?=givedata($conn,"user_master","token_key",$_SESSION['tokenID'],"full_name")?></h5>
                                                        </div>
                                                    </div>

                                                    <div class="onhover-div onhover-div-login">
                                                        <ul class="user-box-name">
                                                            <li class="product-box-contain">
                                                                <i></i>
                                                                <a href="ACCOUNT/">Profile</a>
                                                            </li>
                                                            
                                                            <li class="product-box-contain">
                                                                <a href="SIGN-OUT/">Logout</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                <?php
                                            }
                                        ?>
                                       
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<br>
        <div class="container-fluid-lg" style="border-bottom: 1px solid black;">
            <div class="row">
                <div class="col-12 position-relative">
                    <div class="main-nav nav-left-align pt-0">
                        <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky p-0">
                            <div class="offcanvas offcanvas-collapse " id="primaryMenu">
                                <div class="offcanvas-header navbar-shadow">
                                    <h5>Menu</h5>
                                    <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <ul class="navbar-nav">
                                    <?php
                                            $sql = "SELECT * FROM category where flag='1' ORDER BY seq";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>     
                                            
                                        <li class="nav-item dropdown dropdown-mega">
                                            <a class="nav-link dropdown-toggle ps-0" href="javascript:void(0)"
                                                data-bs-toggle="dropdown" style="text-transform:uppercase"><?=$row['category_title']?></a>
                                            
                                            <ul class="dropdown-menu">
                                            <?php
                                            $sql_ = "SELECT * FROM sub_category where category_id='$row[id]' AND flag='1' ORDER BY seq";
                                            $result_ = mysqli_query($conn, $sql_);
                                            while ($row_ = mysqli_fetch_assoc($result_)) {
                                               
                                                ?>
                                                <li>
                                                    <a class="dropdown-item" href="Product-List/?id_=<?= $row_['key_'] ?>"><?=$row_['sub_category_title']?></a>
                                                </li>
                                          <?php  }
                                        ?></ul>
                                        </li>
                                        <?php  }
                                        ?>

                                 

                                        <li class="nav-item ">
                                            <a class="nav-link" href="branded.php" >BRANDED</a>
                                          
                                        </li>
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

   

    <!-- mobile fix menu start -->
    <div class="mobile-menu d-md-none d-block mobile-cart">
    <ul>
            <li class="active">
                <a href="index.php">
                <i class="fa-solid fa-house icli"></i>
                    <span>Home</span>
                </a>
            </li>

            <li class="mobile-category">
                <a href="ABOUT-US">
                <i class="fa-solid fa-eject icli"></i>
                    <span>About Us</span>
                </a>
            </li>

            <li>
                <a href="SEARCH" class="search-box">
                <i class="fa-solid fa-magnifying-glass icli"></i>
                    <span>Search</span>
                </a>
            </li>

            <li>
                <a href="WISHLIST" class="notifi-wishlist">
                <i class="fa-solid fa-heart icli"></i>
                    <span>My Wish</span>
                </a>
            </li>

            <li>
                <a href="CART">
                <i class="fa-solid fa-cart-shopping icli"></i>
                    <span>Cart</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- mobile fix menu end -->