<?php include '../niru_collection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $login=$_SESSION['tokenID'];

    $login_id=givedata($conn,"user_master","token_key",$login,"id");

    if($_POST["form_type"]=="profile")
    {
        $full_name=$_POST['full_name'];
        $email=$_POST['email'];
        $mobile_no=$_POST['mobile_no'];
        $address=$_POST['address'];

            $sql="update user_master set full_name='$full_name',email='$email',mobile_no='$mobile_no' where id='$login_id'";
            if($conn->query($sql))
            {
                ?><script>alert('Profile information Updated');</script>
                <?php
            }
    }else if($_POST["form_type"]=="pass")
    {
        $password=$_POST['password'];
        $sql="update user_master set password='$password' where id='$login_id'";
            if($conn->query($sql))
            {
                ?><script>alert('Password Updated');</script>
                <?php
            }
    }else if($_POST["form_type"]=="address_change")
    {
        $password=$_POST['password'];
        $sql="update user_master set password='$password' where id='$login_id'";
            if($conn->query($sql))
            {
                ?><script>alert('Password Updated');</script>
                <?php
            }
    }
    else if($_POST["form_type"]=="add_address")
    {
        $full_name=$_POST['full_name'];
        $address=$_POST['address'];
        $mobile_no=$_POST['mobile_no'];
        $pincode=$_POST['pincode'];
        $address_type=$_POST['address_type'];
       
        $sql_="INSERT INTO address_master(user_token_id,address,country,city,pincode,nation,flag,address_type,mobile_no,full_name) VALUES('$login','$address','0','0','$pincode','0','1','$address_type','$mobile_no','$full_name')";
        if($conn->query($sql_))
		{
            ?><script>alert('New Address Updated');</script>
                <?php
        }
    }
	
}

?> 
<?php include '../inner_header.php';?> 

    

    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        <h2>User Dashboard</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="../">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">User Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- User Dashboard Section Start -->
    <section class="user-dashboard-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-3 col-lg-4">
                    <div class="dashboard-left-sidebar">
                        <div class="close-button d-flex d-lg-none">
                            <button class="close-sidebar">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="profile-box">
                            <div class="cover-image">
                                <img src="../assets/images/inner-page/cover-img.jpg" class="img-fluid blur-up lazyload"
                                    alt="">
                            </div>

                            <div class="profile-contain">
                                <div class="profile-image">
                                    <div class="position-relative">
                                        <img src="../assets/images/inner-page/user/1.jpg"
                                            class="blur-up lazyload update_img" alt="">
                                        <div class="cover-icon">
                                            <i class="fa-solid fa-pen">
                                                <input type="file" onchange="readURL(this,0)">
                                            </i>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-name">
                                    <h3><?=givedata($conn,"user_master","token_key",$_SESSION['tokenID'],"full_name")?></h3>
                                    <h6 class="text-content"><?=givedata($conn,"user_master","token_key",$_SESSION['tokenID'],"email")?></h6>
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-pills user-nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-dashboard-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-dashboard" type="button"><i data-feather="home"></i>
                                    DashBoard</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-order-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-order" type="button"><i
                                        data-feather="shopping-bag"></i>Order</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-wishlist-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-wishlist" type="button"><i data-feather="heart"></i>
                                    Wishlist</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-address-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-address" type="button" role="tab"><i
                                        data-feather="map-pin"></i>Address</button>
                            </li>
                             <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-download-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-download" type="button" role="tab"><i
                                        data-feather="download"></i>Download</button>
                            </li>
                           
                        </ul>
                    </div>
                </div>

                <div class="col-xxl-9 col-lg-8">
                    <button class="btn left-dashboard-show btn-animation btn-md fw-bold d-block mb-4 d-lg-none">Show
                        Menu</button>
                    <div class="dashboard-right-sidebar">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-dashboard" role="tabpanel">
                                <div class="dashboard-home">
                                    <div class="title">
                                        <h2>My Dashboard</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="dashboard-user-name">
                                        <h6 class="text-content">Hello, <b class="text-title"><?=givedata($conn,"user_master","token_key",$_SESSION['tokenID'],"full_name")?></b></h6>
                                        <p class="text-content">From your My Account Dashboard you have the ability to
                                            view a snapshot of your recent account activity and update your account
                                            information. Select a link below to view or edit information.</p>
                                    </div>

                                    <div class="total-box">
                                        <div class="row g-sm-4 g-3">
                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="total-contain">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/order.svg"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/order.svg" class="blur-up lazyload"
                                                        alt="">
                                                    <div class="total-detail">
                                                        <h5>Total Order</h5>
                                                        <h3>0</h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="total-contain">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/pending.svg"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/pending.svg" class="blur-up lazyload"
                                                        alt="">
                                                    <div class="total-detail">
                                                        <h5>Total Pending Order</h5>
                                                        <h3>0</h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="total-contain">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/wishlist.svg"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/wishlist.svg"
                                                        class="blur-up lazyload" alt="">
                                                    <div class="total-detail">
                                                        <h5>Total Wishlist</h5>
                                                        <h3>0</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="dashboard-title">
                                        <h3>Account Information</h3>
                                    </div>

                                    <div class="row g-4">
                                        <div class="col-xxl-6">
                                            <div class="dashboard-content-title">
                                                <h4>Contact Information <a href="javascript:void(0)"
                                                        data-bs-toggle="modal" data-bs-target="#editProfile">Edit</a>
                                                </h4>
                                            </div>
                                            <div class="dashboard-detail">
                                                <h6 class="text-content"><?=givedata($conn,"user_master","token_key",$_SESSION['tokenID'],"full_name")?></h6>
                                                <h6 class="text-content"><?=givedata($conn,"user_master","token_key",$_SESSION['tokenID'],"email")?></h6>
                                                <a href="javascript:void(0)"  data-bs-toggle="modal" data-bs-target="#editPassword" >Change Password</a>
                                            </div>
                                        </div>

                                        
                                     
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-wishlist" role="tabpanel">
                                <div class="dashboard-wishlist">
                                    <div class="title">
                                        <h2>My Wishlist History</h2>
                                        <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="row g-sm-4 g-3">
                                       
                                    
                                        <?php
                                        $srid = "";
                                            $sql = "SELECT * FROM wishlist where token_key='$_SESSION[guesst_login_KEY]'";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $srid = "1";
                                                $pid=$row['product_key'];
                                                $cid=givedata($conn,"products","key_",$pid,"category_id");
                                        ?>
                                        <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                            <div class="product-box-3 theme-bg-white h-100">
                                                <div class="product-header">
                                                    <div class="product-image">
                                                        <a href="../Product-List/details.php?i=<?=$pid?>">
                                                            <img src="../ADMIN//<?=givedata($conn,"products","key_",$pid,"filepath")?>"
                                                                class="img-fluid blur-up lazyload" alt="">
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
                                                        <span class="span-name"><?=givedata($conn,"category","id",$cid,"category_title")?></span>
                                                        <a href="../Product-List/details.php?i=<?=$pid?>">
                                                            <h5 class="name"><?=givedata($conn,"products","key_",$pid,"product_title")?></h5>
                                                        </a>
                                                      
                                                        <h5 class="price">
                                                            <span class="theme-color">£ <?=givedata($conn,"products","key_",$pid,"retail_rate")?></span>
                                                          
                                                        </h5>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                            ?>

                                       
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-order" role="tabpanel">
                                <div class="dashboard-order">
                                    <div class="title">
                                        <h2>My Orders History</h2>
                                        <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="order-contain row" >
                                        
                                    <?php
                                    $token=$_SESSION['tokenID'];
                                    $sql = "SELECT * FROM order_master where  user_key='$token' ORDER BY id DESC";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                               
                                                ?>
                                        <div class="order-box dashboard-bg-box col-4">
                                            <div class="order-container">
                                                <div class="order-icon">
                                                    <i data-feather="box"></i>
                                                </div>

                                                <div class="order-detail" onclick="window.location.href='orderDetails.php?id=<?=$row['id']?>'">
                                                    <h4><?=$row['order_id']?><span>Delevered</span></h4>
                                                    <h6 class="text-content">Invoice: <?=$row['grand_total']?><br>
                                                Status: <?=$row['status']?></h6><br>
                                                        <b>Order Details</b>
                                                </div>
                                            </div>

                                           
                                        </div>

                                        <?php
                                            }
                                            ?>
                                           
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-address" role="tabpanel">
                                <div class="dashboard-address">
                                    <div class="title title-flex">
                                        <div>
                                            <h2>My Address Book</h2>
                                            <span class="title-leaf">
                                                <svg class="icon-width bg-gray">
                                                    <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                                                </svg>
                                            </span>
                                        </div>

                                        <button class="btn theme-bg-color text-white btn-sm fw-bold mt-lg-0 mt-3"
                                            data-bs-toggle="modal" data-bs-target="#add-address"><i data-feather="plus"
                                                class="me-2"></i> Add New Address</button>
                                    </div>

                                    <div class="row g-sm-4 g-3">
                                    <?php
                                    $token=$_SESSION['tokenID'];
                                    $sql = "SELECT * FROM address_master where  user_token_id='$token'";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                               
                                                ?>
                                        <div class="col-xxl-4 col-xl-6 col-lg-12 col-md-6">
                                            <div class="address-box">
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jack"
                                                            id="flexRadioDefault2" checked>
                                                    </div>

                                                    <div class="label">
                                                        <label><?=$row['address_type']?></label>
                                                    </div>

                                                    <div class="table-responsive address-table">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2"><?=$row['full_name']?></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Address :</td>
                                                                    <td>
                                                                        <p><?=$row['address']?>
                                                                        </p>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Pin Code :</td>
                                                                    <td><?=$row['pincode']?></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Phone :</td>
                                                                    <td><?=$row['mobile_no']?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="button-group">
                                                  
                                                    <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                        data-bs-target="#removeProfile"><i data-feather="trash-2"></i>
                                                        Remove</button>
                                                </div>
                                            </div>
                                        </div>
<?php
                                            }?>
                                       
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-card" role="tabpanel">
                                <div class="dashboard-card">
                                    <div class="title title-flex">
                                        <div>
                                            <h2>My Card Details</h2>
                                            <span class="title-leaf">
                                                <svg class="icon-width bg-gray">
                                                    <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                                                </svg>
                                            </span>
                                        </div>

                                        <button class="btn theme-bg-color text-white btn-sm fw-bold mt-lg-0 mt-3"
                                            data-bs-toggle="modal" data-bs-target="#editCard"><i data-feather="plus"
                                                class="me-2"></i> Add New Card</button>
                                    </div>

                                    <div class="row g-4">
                                        <div class="col-xxl-4 col-xl-6 col-lg-12 col-sm-6">
                                            <div class="payment-card-detail">
                                                <div class="card-details">
                                                    <div class="card-number">
                                                        <h4>XXXX - XXXX - XXXX - 2548</h4>
                                                    </div>

                                                    <div class="valid-detail">
                                                        <div class="title">
                                                            <span>valid</span>
                                                            <span>thru</span>
                                                        </div>
                                                        <div class="date">
                                                            <h3>08/05</h3>
                                                        </div>
                                                        <div class="primary">
                                                            <span class="badge bg-pill badge-light">primary</span>
                                                        </div>
                                                    </div>

                                                    <div class="name-detail">
                                                        <div class="name">
                                                            <h5>Audrey Carol</h5>
                                                        </div>
                                                        <div class="card-img">
                                                            <img src="../assets/images/payment-icon/1.jpg"
                                                                class="img-fluid blur-up lazyloaded" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="edit-card">
                                                    <a data-bs-toggle="modal" data-bs-target="#editCard"
                                                        href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#removeProfile"><i
                                                            class="far fa-minus-square"></i> delete</a>
                                                </div>
                                            </div>

                                            <div class="edit-card-mobile">
                                                <a data-bs-toggle="modal" data-bs-target="#editCard"
                                                    href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                                <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                                    delete</a>
                                            </div>
                                        </div>

                                        <div class="col-xxl-4 col-xl-6 col-lg-12 col-sm-6">
                                            <div class="payment-card-detail">
                                                <div class="card-details card-visa">
                                                    <div class="card-number">
                                                        <h4>XXXX - XXXX - XXXX - 1536</h4>
                                                    </div>

                                                    <div class="valid-detail">
                                                        <div class="title">
                                                            <span>valid</span>
                                                            <span>thru</span>
                                                        </div>
                                                        <div class="date">
                                                            <h3>12/23</h3>
                                                        </div>
                                                        <div class="primary">
                                                            <span class="badge bg-pill badge-light">primary</span>
                                                        </div>
                                                    </div>

                                                    <div class="name-detail">
                                                        <div class="name">
                                                            <h5>Leah Heather</h5>
                                                        </div>
                                                        <div class="card-img">
                                                            <img src="../assets/images/payment-icon/2.jpg"
                                                                class="img-fluid blur-up lazyloaded" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="edit-card">
                                                    <a data-bs-toggle="modal" data-bs-target="#editCard"
                                                        href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#removeProfile"><i
                                                            class="far fa-minus-square"></i> delete</a>
                                                </div>
                                            </div>

                                            <div class="edit-card-mobile">
                                                <a data-bs-toggle="modal" data-bs-target="#editCard"
                                                    href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                                <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                                    delete</a>
                                            </div>
                                        </div>

                                        <div class="col-xxl-4 col-xl-6 col-lg-12 col-sm-6">
                                            <div class="payment-card-detail">
                                                <div class="card-details debit-card">
                                                    <div class="card-number">
                                                        <h4>XXXX - XXXX - XXXX - 1366</h4>
                                                    </div>

                                                    <div class="valid-detail">
                                                        <div class="title">
                                                            <span>valid</span>
                                                            <span>thru</span>
                                                        </div>
                                                        <div class="date">
                                                            <h3>05/21</h3>
                                                        </div>
                                                        <div class="primary">
                                                            <span class="badge bg-pill badge-light">primary</span>
                                                        </div>
                                                    </div>

                                                    <div class="name-detail">
                                                        <div class="name">
                                                            <h5>mark jecno</h5>
                                                        </div>
                                                        <div class="card-img">
                                                            <img src="../assets/images/payment-icon/3.jpg"
                                                                class="img-fluid blur-up lazyloaded" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="edit-card">
                                                    <a data-bs-toggle="modal" data-bs-target="#editCard"
                                                        href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#removeProfile"><i
                                                            class="far fa-minus-square"></i> delete</a>
                                                </div>
                                            </div>

                                            <div class="edit-card-mobile">
                                                <a data-bs-toggle="modal" data-bs-target="#editCard"
                                                    href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                                <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                                    delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-profile" role="tabpanel">
                                <div class="dashboard-profile">
                                    <div class="title">
                                        <h2>My Profile</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="profile-detail dashboard-bg-box">
                                        <div class="dashboard-title">
                                            <h3>Profile Name</h3>
                                        </div>
                                        <div class="profile-name-detail">
                                            <div class="d-sm-flex align-items-center d-block">
                                                <h3>Vicki E. Pope</h3>
                                                <div class="product-rating profile-rating">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#editProfile">Edit</a>
                                        </div>

                                        <div class="location-profile">
                                            <ul>
                                                <li>
                                                    <div class="location-box">
                                                        <i data-feather="map-pin"></i>
                                                        <h6>Downers Grove, IL</h6>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="location-box">
                                                        <i data-feather="mail"></i>
                                                        <h6>vicki.pope@gmail.com</h6>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="location-box">
                                                        <i data-feather="check-square"></i>
                                                        <h6>Licensed for 2 years</h6>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="profile-description">
                                            <p>Residences can be classified by and how they are connected to
                                                neighbouring residences and land. Different types of housing tenure can
                                                be used for the same physical type.</p>
                                        </div>
                                    </div>

                                    <div class="profile-about dashboard-bg-box">
                                        <div class="row">
                                            <div class="col-xxl-7">
                                                <div class="dashboard-title mb-3">
                                                    <h3>Profile About</h3>
                                                </div>

                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Gender :</td>
                                                                <td>Female</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Birthday :</td>
                                                                <td>21/05/1997</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Phone Number :</td>
                                                                <td>
                                                                    <a href="javascript:void(0)"> +91 846 - 547 -
                                                                        210</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Address :</td>
                                                                <td>549 Sulphur Springs Road, Downers, IL</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="dashboard-title mb-3">
                                                    <h3>Login Details</h3>
                                                </div>

                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Email :</td>
                                                                <td>
                                                                    <a href="javascript:void(0)">vicki.pope@gmail.com
                                                                        <span data-bs-toggle="modal"
                                                                            data-bs-target="#editProfile">Edit</span></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Password :</td>
                                                                <td>
                                                                    <a href="javascript:void(0)">●●●●●●
                                                                        <span data-bs-toggle="modal"
                                                                            data-bs-target="#editProfile">Edit</span></a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-xxl-5">
                                                <div class="profile-image">
                                                    <img src="../assets/images/inner-page/dashboard-profile.png"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-download" role="tabpanel">
                                <div class="dashboard-download">
                                    <div class="title">
                                        <h2>My Download</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="download-detail dashboard-bg-box">
                                        <form>
                                            <div class="input-group download-form">
                                                <input type="text" class="form-control"
                                                    placeholder="Search your download">
                                                <button class="btn theme-bg-color text-light" type="button"
                                                    id="button-addon2">Search</button>
                                            </div>
                                        </form>

                                        <div class="select-filter-box">
                                            <select class="form-select">
                                                <option selected="">All marketplaces</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>


                                            <ul class="nav nav-pills filter-box" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="pills-data-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-data"
                                                        type="button">Data Purchased</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-title-tab" data-bs-toggle="pill"
                                                        data-bs-target="#pills-title" type="button">Title</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-rating-tab" data-bs-toggle="pill"
                                                        data-bs-target="#pills-rating" type="button">My Rating</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-recent-tab" data-bs-toggle="pill"
                                                        data-bs-target="#pills-recent" type="button">Recent
                                                        Updates</button>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-data" role="tabpanel">
                                                <div class="download-table">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Image</th>
                                                                    <th>Name</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>
                                                                        <img src="../assets/images/theme-icon/1.png"
                                                                            class="img-fluid" alt="">
                                                                    </td>
                                                                    <td>Sheltos - Real Estate Angular 17 Template</td>
                                                                    <td>
                                                                        <div class="dropdown download-dropdown">
                                                                            <button class="btn dropdown-toggle"
                                                                                type="button"
                                                                                data-bs-toggle="dropdown">Download</button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">All files
                                                                                        & documentation</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">License
                                                                                        certificate & purchase code
                                                                                        (PDF)</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">License
                                                                                        certificate & purchase code
                                                                                        (text)</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>
                                                                        <img src="../assets/images/theme-icon/2.png"
                                                                            class="img-fluid" alt="">
                                                                    </td>
                                                                    <td>Oslo - Multipurpose Shopify Theme. Fast, Clean,
                                                                        and
                                                                        Flexible. OS 2.0</td>
                                                                    <td>
                                                                        <div class="dropdown download-dropdown">
                                                                            <button class="btn dropdown-toggle"
                                                                                type="button"
                                                                                data-bs-toggle="dropdown">Download</button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">All files
                                                                                        & documentation</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">License
                                                                                        certificate & purchase code
                                                                                        (PDF)</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">License
                                                                                        certificate & purchase code
                                                                                        (text)</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>
                                                                        <img src="../assets/images/theme-icon/3.png"
                                                                            class="img-fluid" alt="">
                                                                    </td>
                                                                    <td>Boho - React JS Admin Dashboard Template</td>
                                                                    <td>
                                                                        <div class="dropdown download-dropdown">
                                                                            <button class="btn dropdown-toggle"
                                                                                type="button"
                                                                                data-bs-toggle="dropdown">Download</button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">All files
                                                                                        & documentation</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">License
                                                                                        certificate & purchase code
                                                                                        (PDF)</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">License
                                                                                        certificate & purchase code
                                                                                        (text)</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-title">
                                                <div class="download-table">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Image</th>
                                                                    <th>Name</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>
                                                                        <img src="../assets/images/theme-icon/1.png"
                                                                            class="img-fluid" alt="">
                                                                    </td>
                                                                    <td>Sheltos - Real Estate Angular 17 Template</td>
                                                                    <td>
                                                                        <div class="dropdown download-dropdown">
                                                                            <button class="btn dropdown-toggle"
                                                                                type="button"
                                                                                data-bs-toggle="dropdown">Download</button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">All files
                                                                                        & documentation</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">License
                                                                                        certificate & purchase code
                                                                                        (PDF)</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">License
                                                                                        certificate & purchase code
                                                                                        (text)</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>
                                                                        <img src="../assets/images/theme-icon/2.png"
                                                                            class="img-fluid" alt="">
                                                                    </td>
                                                                    <td>Oslo - Multipurpose Shopify Theme. Fast, Clean,
                                                                        and
                                                                        Flexible. OS 2.0</td>
                                                                    <td>
                                                                        <div class="dropdown download-dropdown">
                                                                            <button class="btn dropdown-toggle"
                                                                                type="button"
                                                                                data-bs-toggle="dropdown">Download</button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">All files
                                                                                        & documentation</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">License
                                                                                        certificate & purchase code
                                                                                        (PDF)</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">License
                                                                                        certificate & purchase code
                                                                                        (text)</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>
                                                                        <img src="../assets/images/theme-icon/3.png"
                                                                            class="img-fluid" alt="">
                                                                    </td>
                                                                    <td>Boho - React JS Admin Dashboard Template</td>
                                                                    <td>
                                                                        <div class="dropdown download-dropdown">
                                                                            <button class="btn dropdown-toggle"
                                                                                type="button"
                                                                                data-bs-toggle="dropdown">Download</button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">All files
                                                                                        & documentation</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">License
                                                                                        certificate & purchase code
                                                                                        (PDF)</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">License
                                                                                        certificate & purchase code
                                                                                        (text)</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-rating">
                                                <div class="download-table">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Image</th>
                                                                    <th>Name</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>
                                                                        <img src="../assets/images/theme-icon/1.png"
                                                                            class="img-fluid" alt="">
                                                                    </td>
                                                                    <td>Sheltos - Real Estate Angular 17 Template</td>
                                                                    <td>
                                                                        <div class="dropdown download-dropdown">
                                                                            <button class="btn dropdown-toggle"
                                                                                type="button"
                                                                                data-bs-toggle="dropdown">Download</button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">All files
                                                                                        & documentation</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">License
                                                                                        certificate & purchase code
                                                                                        (PDF)</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">License
                                                                                        certificate & purchase code
                                                                                        (text)</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>
                                                                        <img src="../assets/images/theme-icon/2.png"
                                                                            class="img-fluid" alt="">
                                                                    </td>
                                                                    <td>Oslo - Multipurpose Shopify Theme. Fast, Clean,
                                                                        and
                                                                        Flexible. OS 2.0</td>
                                                                    <td>
                                                                        <div class="dropdown download-dropdown">
                                                                            <button class="btn dropdown-toggle"
                                                                                type="button"
                                                                                data-bs-toggle="dropdown">Download</button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">All files
                                                                                        & documentation</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">License
                                                                                        certificate & purchase code
                                                                                        (PDF)</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">License
                                                                                        certificate & purchase code
                                                                                        (text)</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>
                                                                        <img src="../assets/images/theme-icon/3.png"
                                                                            class="img-fluid" alt="">
                                                                    </td>
                                                                    <td>Boho - React JS Admin Dashboard Template</td>
                                                                    <td>
                                                                        <div class="dropdown download-dropdown">
                                                                            <button class="btn dropdown-toggle"
                                                                                type="button"
                                                                                data-bs-toggle="dropdown">Download</button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">All files
                                                                                        & documentation</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">License
                                                                                        certificate & purchase code
                                                                                        (PDF)</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">License
                                                                                        certificate & purchase code
                                                                                        (text)</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-recent">
                                                <div class="download-table">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Image</th>
                                                                    <th>Name</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>
                                                                        <img src="../assets/images/theme-icon/1.png"
                                                                            class="img-fluid" alt="">
                                                                    </td>
                                                                    <td>Sheltos - Real Estate Angular 17 Template</td>
                                                                    <td>
                                                                        <div class="dropdown download-dropdown">
                                                                            <button class="btn dropdown-toggle"
                                                                                type="button"
                                                                                data-bs-toggle="dropdown">Download</button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">All files
                                                                                        & documentation</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">License
                                                                                        certificate & purchase code
                                                                                        (PDF)</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">License
                                                                                        certificate & purchase code
                                                                                        (text)</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>
                                                                        <img src="../assets/images/theme-icon/2.png"
                                                                            class="img-fluid" alt="">
                                                                    </td>
                                                                    <td>Oslo - Multipurpose Shopify Theme. Fast, Clean,
                                                                        and
                                                                        Flexible. OS 2.0</td>
                                                                    <td>
                                                                        <div class="dropdown download-dropdown">
                                                                            <button class="btn dropdown-toggle"
                                                                                type="button"
                                                                                data-bs-toggle="dropdown">Download</button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">All files
                                                                                        & documentation</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">License
                                                                                        certificate & purchase code
                                                                                        (PDF)</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">License
                                                                                        certificate & purchase code
                                                                                        (text)</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>
                                                                        <img src="../assets/images/theme-icon/3.png"
                                                                            class="img-fluid" alt="">
                                                                    </td>
                                                                    <td>Boho - React JS Admin Dashboard Template</td>
                                                                    <td>
                                                                        <div class="dropdown download-dropdown">
                                                                            <button class="btn dropdown-toggle"
                                                                                type="button"
                                                                                data-bs-toggle="dropdown">Download</button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">All files
                                                                                        & documentation</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">License
                                                                                        certificate & purchase code
                                                                                        (PDF)</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">License
                                                                                        certificate & purchase code
                                                                                        (text)</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-security" role="tabpanel">
                                <div class="dashboard-privacy">
                                    <div class="dashboard-bg-box">
                                        <div class="dashboard-title mb-4">
                                            <h3>Privacy</h3>
                                        </div>

                                        <div class="privacy-box">
                                            <div class="d-flex align-items-start">
                                                <h6>Allows others to see my profile</h6>
                                                <div class="form-check form-switch switch-radio ms-auto">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="redio">
                                                    <label class="form-check-label" for="redio"></label>
                                                </div>
                                            </div>

                                            <p class="text-content">all peoples will be able to see my profile</p>
                                        </div>

                                        <div class="privacy-box">
                                            <div class="d-flex align-items-start">
                                                <h6>who has save this profile only that people see my profile</h6>
                                                <div class="form-check form-switch switch-radio ms-auto">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="redio2">
                                                    <label class="form-check-label" for="redio2"></label>
                                                </div>
                                            </div>

                                            <p class="text-content">all peoples will not be able to see my profile</p>
                                        </div>

                                        <button class="btn theme-bg-color btn-md fw-bold mt-4 text-white">Save
                                            Changes</button>
                                    </div>

                                    <div class="dashboard-bg-box mt-4">
                                        <div class="dashboard-title mb-4">
                                            <h3>Account settings</h3>
                                        </div>

                                        <div class="privacy-box">
                                            <div class="d-flex align-items-start">
                                                <h6>Deleting Your Account Will Permanently</h6>
                                                <div class="form-check form-switch switch-radio ms-auto">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="redio3">
                                                    <label class="form-check-label" for="redio3"></label>
                                                </div>
                                            </div>
                                            <p class="text-content">Once your account is deleted, you will be logged out
                                                and will be unable to log in back.</p>
                                        </div>

                                        <div class="privacy-box">
                                            <div class="d-flex align-items-start">
                                                <h6>Deleting Your Account Will Temporary</h6>
                                                <div class="form-check form-switch switch-radio ms-auto">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="redio4">
                                                    <label class="form-check-label" for="redio4"></label>
                                                </div>
                                            </div>

                                            <p class="text-content">Once your account is deleted, you will be logged out
                                                and you will be create new account</p>
                                        </div>

                                        <button class="btn theme-bg-color btn-md fw-bold mt-4 text-white">Delete My
                                            Account</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- User Dashboard Section End -->

    <!-- Edit Profile Start -->
    <div class="modal fade theme-modal" id="editProfile" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <form id="edit_profile" method="POST">
                <input type="hidden" name="form_type" value="profile">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row g-4">
                        <div class="col-xxl-12">
                                <div class="form-floating theme-form-floating">
                                    <input type="text" class="form-control" id="full_name" name="full_name" value="<?=givedata($conn,"user_master","token_key",$_SESSION['tokenID'],"full_name")?>">
                                    <label for="full_name">Full Name</label>
                                </div>
                        </div>

                        <div class="col-xxl-6">
                                <div class="form-floating theme-form-floating">
                                    <input type="email" class="form-control" id="email" name="email" value="<?=givedata($conn,"user_master","token_key",$_SESSION['tokenID'],"email")?>">
                                    <label for="email">Email address</label>
                                </div>
                        </div>

                        <div class="col-xxl-6">
                                <div class="form-floating theme-form-floating">
                                    <input class="form-control" type="tel" value="<?=givedata($conn,"user_master","token_key",$_SESSION['tokenID'],"mobile_no")?>" name="mobile_no" id="mobile_no"
                                        maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value =
                                            this.value.slice(0, this.maxLength);">
                                    <label for="mobile">Mobile Number</label>
                                </div>
                        </div>

                        

                       

                        

                        
                      
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-animation btn-md fw-bold"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" 
                        class="btn theme-bg-color btn-md fw-bold text-light">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Profile End -->

        <!-- Edit Profile Start -->
        <div class="modal fade theme-modal" id="editPassword" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <form id="edit_pass" method="POST">

                <input type="hidden" name="form_type" value="pass">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row g-4">
                        <div class="col-xxl-12">
                                <div class="form-floating theme-form-floating">
                                    <input type="password" class="form-control" id="password" name="password" value="<?=givedata($conn,"user_master","token_key",$_SESSION['tokenID'],"password")?>">
                                    <label for="full_name">New Password</label>
                                </div>
                        </div>

                        <div class="col-xxl-12">
                                <div class="form-floating theme-form-floating">
                                    <input type="password" class="form-control" id="cpassword" name="cpassword" value="<?=givedata($conn,"user_master","token_key",$_SESSION['tokenID'],"password")?>">
                                    <label for="full_name">Old Password</label>
                                </div>
                        </div>

                        
                      
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-animation btn-md fw-bold"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" 
                        class="btn theme-bg-color btn-md fw-bold text-light">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Profile End -->

    <div class="modal fade theme-modal" id="add-address" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <form method="POST">
                <input type="hidden" name="form_type" value="add_address">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a new address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                   
                        <div class="form-floating mb-4 theme-form-floating">
                            <input type="text" class="form-control" id="full_name"  name="full_name" placeholder="Enter Full Name">
                            <label for="fname">Full Name</label>
                        </div>
                   
                        <div class="form-floating mb-4 theme-form-floating">
                            <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Enter Last Name">
                            <label for="lname">Mobile Number</label>
                        </div>
                   
                        <div class="form-floating mb-4 theme-form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="address" name="address" style="height: 100px"></textarea>
                            <label for="address">Enter Address</label>
                        </div>
                
                        <div class="form-floating mb-4 theme-form-floating">
                            <input type="text" class="form-control"  id="pincode" name="pincode" placeholder="Enter Pin Code">
                            <label for="pin">Pin Code</label>
                        </div>

                        <div class="form-floating mb-4 theme-form-floating">
                            <select class="form-control" name="address_type">
                                <option value="Home">Home</option>
                                <option value="Office">Office</option>
                            </select>
                            <label for="pin">Address Type</label>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-md" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn theme-bg-color btn-md text-white">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
   

    <!-- Edit Card Start -->
    <div class="modal fade theme-modal" id="editCard" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel8">Edit Card</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row g-4">
                        <div class="col-xxl-6">
                            <form>
                                <div class="form-floating theme-form-floating">
                                    <input type="text" class="form-control" id="finame" value="Mark">
                                    <label for="finame">First Name</label>
                                </div>
                            </form>
                        </div>

                        <div class="col-xxl-6">
                            <form>
                                <div class="form-floating theme-form-floating">
                                    <input type="text" class="form-control" id="laname" value="Jecno">
                                    <label for="laname">Last Name</label>
                                </div>
                            </form>
                        </div>

                        <div class="col-xxl-4">
                            <form>
                                <div class="form-floating theme-form-floating">
                                    <select class="form-select" id="floatingSelect12">
                                        <option selected>Card Type</option>
                                        <option value="kingdom">Visa Card</option>
                                        <option value="states">MasterCard Card</option>
                                        <option value="fra">RuPay Card</option>
                                        <option value="china">Contactless Card</option>
                                        <option value="spain">Maestro Card</option>
                                    </select>
                                    <label for="floatingSelect12">Card Type</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-animation btn-md fw-bold"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn theme-bg-color btn-md fw-bold text-light">Update Card</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Card End -->

    <!-- Remove Profile Modal Start -->
    <div class="modal fade theme-modal remove-profile" id="removeProfile" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header d-block text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel22">Are You Sure ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="remove-box">
                        <p>The permission for the use/group, preview is inherited from the object, object will create a
                            new permission for this object</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn theme-bg-color btn-md fw-bold text-light"
                        data-bs-target="#removeAddress" data-bs-toggle="modal">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade theme-modal remove-profile" id="removeAddress" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel12">Done!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="remove-box text-center">
                        <h4 class="text-content">It's Removed.</h4>
                    </div>
                </div>
                <div class="modal-footer pt-0">
                    <button type="button" class="btn theme-bg-color btn-md fw-bold text-light"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php include '../inner_footer.php';?> 

</body>


<!-- Mirrored from themes.pixelstrap.com/fastkart/front-end/user-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2024 06:38:16 GMT -->
</html>