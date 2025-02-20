<?php
session_start();
if($_SESSION['loginID']=="")
{
    ?>

     
        <script> 
            //window.location.href="../"; 
            </script>
            
              <?php
}

?>

<div class="ec-left-sidebar ec-bg-sidebar">
            <div id="sidebar" class="sidebar ec-sidebar-footer">

                <div class="ec-brand">
                    <a href="../Dashboard" title="Waves Packaging">
                        <img class="" src="../../assets/images/logo/1.png" alt="" />
                       
                    </a>
                </div>

                <!-- begin sidebar scrollbar -->
                <div class="ec-navigation" data-simplebar>
                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">
                        <!-- Dashboard -->
                        <li class="active">
                            <a class="sidenav-item-link" href="../Dashboard">
                                <i class="mdi mdi-view-dashboard-outline"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                            <hr>
                        </li>

                        <!-- Vendors -->
                       

                        <!-- Users -->
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)">
                                <i class="mdi mdi-account-group"></i>
                                <span class="nav-text">Retailers</span> <b class="caret"></b>
                            </a>
                            <div class="collapse">
                                <ul class="sub-menu" id="users" data-parent="#sidebar-menu">
                                   

                                    <li class="">
                                        <a class="sidenav-item-link" href="../USERS">
                                            <span class="nav-text">Retailers List</span>
                                        </a>
                                    </li>
                                  
                                </ul>
                            </div>
                            
                        </li>

                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)">
                                <i class="mdi mdi-account-group-outline"></i>
                                <span class="nav-text">Other Users</span> <b class="caret"></b>
                            </a>
                            <div class="collapse">
                                <ul class="sub-menu" id="vendors" data-parent="#sidebar-menu">
                                    
                                    <li class="">
                                        <a class="sidenav-item-link" href="../OtherUsers/?id=1">
                                            <span class="nav-text">Wholesaler</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a class="sidenav-item-link" href="../OtherUsers/?id=2">
                                            <span class="nav-text">Mega Restaurant</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a class="sidenav-item-link" href="../OtherUsers/?id=3">
                                            <span class="nav-text">Shopkeeper</span>
                                        </a>
                                    </li>
                                   
                                </ul>
                            </div>
                            <hr>
                        </li>

                        <!-- Category -->
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)">
                                <i class="mdi mdi-dns-outline"></i>
                                <span class="nav-text">Categories</span> <b class="caret"></b>
                            </a>
                            <div class="collapse">
                                <ul class="sub-menu" id="categorys" data-parent="#sidebar-menu">
                                    <li class="">
                                        <a class="sidenav-item-link" href="../Category">
                                            <span class="nav-text">Main Category</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a class="sidenav-item-link" href="../Sub-Category">
                                            <span class="nav-text">Sub Category</span>
                                        </a>
                                    </li>
                                  <!--  <li class="">
                                        <a class="sidenav-item-link" href="../Sub-Category-1">
                                            <span class="nav-text">Sub Child Category</span>
                                        </a>
                                    </li>-->
                                </ul>
                            </div>
                        </li>

                        <!-- Products -->
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)">
                                <i class="mdi mdi-palette-advanced"></i>
                                <span class="nav-text">Products</span> <b class="caret"></b>
                            </a>
                            <div class="collapse">
                                <ul class="sub-menu" id="products" data-parent="#sidebar-menu">
                                    <li class="">
                                        <a class="sidenav-item-link" href="../Product/add.php">
                                            <span class="nav-text">Add Product</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a class="sidenav-item-link" href="../Product/">
                                            <span class="nav-text">List Product</span>
                                        </a>
                                    </li>
                                   
                                </ul>
                            </div>
                        </li>

                        <!-- Orders -->
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)">
                                <i class="mdi mdi-cart"></i>
                                <span class="nav-text">Orders</span> <b class="caret"></b>
                            </a>
                            <div class="collapse">
                                <ul class="sub-menu" id="orders" data-parent="#sidebar-menu">
                                    <li class="">
                                        <a class="sidenav-item-link" href="../ORDERS/pending.php">
                                            <span class="nav-text">Pending Order</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a class="sidenav-item-link" href="../ORDERS/accept.php">
                                            <span class="nav-text">Accepted Order</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a class="sidenav-item-link" href="../ORDERS/shiped.php">
                                            <span class="nav-text">Shiped Order</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a class="sidenav-item-link" href="../ORDERS/">
                                            <span class="nav-text">Order History</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a class="sidenav-item-link" href="../ORDERS/cancel.php">
                                            <span class="nav-text">Cancel Order</span>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </li>

                         <!-- Orders -->
                         <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)">
                                <i class="mdi mdi-file-image"></i>
                                <span class="nav-text">Advertisement</span> <b class="caret"></b>
                            </a>
                            <div class="collapse">
                                <ul class="sub-menu" id="orders" data-parent="#sidebar-menu">
                                    <li class="">
                                        <a class="sidenav-item-link" href="../ADVERTISEMENT/popup.php">
                                            <span class="nav-text">Popup Notification</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a class="sidenav-item-link" href="../ADVERTISEMENT/">
                                            <span class="nav-text">Banner</span>
                                        </a>
                                    </li>
                                    
                                   
                                </ul>
                            </div>
                        </li>

                        <!-- Reviews -->
                        <li>
                            <a class="sidenav-item-link" href="../CONTACT-US">
                                <i class="mdi mdi-star-half"></i>
                                <span class="nav-text">Contact Us </span>
                            </a>
                        </li>

                             <!-- Coupon -->

                             <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)">
                                <i class="mdi mdi-palette-advanced"></i>
                                <span class="nav-text">Coupon</span> <b class="caret"></b>
                            </a>
                            <div class="collapse">
                                <ul class="sub-menu" id="coupon" data-parent="#sidebar-menu">
                                    <li class="">
                                        <a class="sidenav-item-link" href="../Coupon/add_coupon.php">
                                            <span class="nav-text">Add Coupon</span>
                                        </a>
                                    </li>
                                   
                                   
                                </ul>
                            </div>
                        </li>


                        <!-- Brands -->
                        <li>
                            <a class="sidenav-item-link" href="../BRAND">
                                <i class="mdi mdi-tag-faces"></i>
                                <span class="nav-text">Brands</span>
                            </a>
                            <hr>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="../DOWNLOAD">
                                <i class="mdi mdi-cloud-download"></i>
                                <span class="nav-text">Download</span>
                            </a>
                            <hr>
                        </li>

                      
                    </ul>
                </div>
            </div>
        </div>