<?php include '../niru_collection.php'; ?>
<?php include '../inner_header.php'; ?>
<style>
    * {
        box-sizing: border-box
    }

    /* Set height of body and the document to 100% */

    /* Style tab links */
    .tablink {
        background-color: #555;
        color: black;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        font-size: 17px;
        width: 25%;
    }

    .tablink:hover {
        background-color: #777;
    }

    /* Style the tab content (and add height:100% for full page content) */
    .tabcontent {
        background-color: white;
        display: none;
        padding: 100px 20px;
        height: 100%;
    }

    #Home {
        background-color: white;
    }

    #News {
        background-color: white;
    }

    #Contact {
        background-color: blue;
    }

    #About {
        background-color: orange;
    }
</style>


<!-- Breadcrumb Section Start -->
<section class="breadcrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-contain">
                    <h2>Sign Up</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="../">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Sign Up</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

   <!-- Jobs Start -->
   <div class="container-xxl py-5" id="reg_div">
    <div class="container">
       
        <div class="text-center">
            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs d-flex flex-row" id="jobTabs" role="tablist">
                
                <li class="nav-item" role="presentation">

                    <button class="nav-link active" onclick="openPage('News', this, 'white')" id="fulltime-tab" data-bs-toggle="tab" data-bs-target="#fulltime" type="button" role="tab" aria-controls="fulltime" aria-selected="true" style="font-size: 20px; font-weight:bold; color: #062d6a;">For Wholesaler</button>
                </li>
               
            </ul>
        </div>

        <!-- Tabs Content -->
        <div class="tab-content" id="jobTabsContent">
            <!-- Featured Tab -->
            <div class="tab-pane fade " id="featured" role="tabpanel" aria-labelledby="featured-tab">
                <div class="job-item p-4 mb-4" style="border: 1px solid #ddd; border-radius: 8px;">
                    <div class="row g-4">
                    <div id="Home" class="tabcontent pt-2 pb-4" style="display:none">
                      
                        <div class="log-in-title">
                            <h3>Welcome To Waves Packaging</h3>
                            <h4>Create New Account</h4>
                        </div>

                        <div class="input-box pt-4">
                            <form class="row g-4" id="formId" onsubmit="return validation();">
                                <div class="col-xxl-12 col-lg-12 col-sm-6">
                                    <div class="custom-form">
                                        <label for="full_name">Full Name</label>
                                        <div class="custom-input">
                                            <input type="text" class="form-control" id="full_name" name="full_name"
                                                placeholder="Full Name">
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="col-xxl-12 col-lg-12 col-sm-6">
                                    <div class="custom-form">
                                        <label for="email">Email Address</label>
                                        <div class="custom-input">
                                            <input type="email" style="text-transform: lowercase" class="form-control"
                                                id="email" name="email" placeholder="Email Address">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-12 col-lg-12 col-sm-6">
                                    <div class="custom-form">
                                        <label for="mobile_no">Mobile Number</label>
                                        <div class="custom-input">
                                            <input type="text" pattern="[1-9]{1}[0-9]{9}" class="form-control" max="10"
                                                id="mobile_no" name="mobile_no" placeholder="Mobile Number">
                                        </div>

                                    </div>
                                </div>


                                <div class="col-xxl-12 col-lg-12 col-sm-6">
                                    <div class="custom-form">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="custom-input position-relative">
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Password" required>
                                            <span
                                                class="password-toggle position-absolute top-50 end-0 translate-middle-y me-3"
                                                onclick="togglePassword()">
                                                <i class="fa fa-eye-slash" id="toggleIcon"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-12 col-lg-12 col-sm-6">
                                         <div class="custom-form">
                                            <label for="vat_number">Full Address</label>
                                            <div class="custom-input pt-2">
                                                <input type="text" class="form-control" id="address"  name="address" placeholder="Full Address">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xxl-6 col-lg-6 col-sm-6">
                                    <div class="custom-form">
                                            <label for="vat_number">City</label>
                                            <div class="custom-input pt-2">
                                                <input type="text" class="form-control" id="city"  name="city" placeholder="Enter City">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xxl-6 col-lg-6 col-sm-6">
                                    <div class="custom-form">
                                            <label for="vat_number">Pincode</label>
                                            <div class="custom-input pt-2">
                                                <input type="text" class="form-control" id="pincode"  name="pincode" placeholder="Enter Pincode">
                                            </div>
                                        </div>
                                    </div>

                                <div class="col-12" style="display:none">
                                    <label class="form-label fw-semibold">I am a:</label>
                                    <div class="d-flex flex-wrap gap-3">
                                        <label class="radio-card">
                                            <input type="radio" name="user_type" id="retailer" value="Retailer" checked>
                                            <span>Retailer</span>
                                         </label>
                                        <label class="radio-card">
                                            <input type="radio" name="user_type" id="wholesaler" value="Wholesaler">
                                            <span>Wholesaler</span>
                                        </label>
                                `           <label class="radio-card">
                                            <input type="radio" name="user_type" id="mega_restaurant"
                                                value="Mega Restaurant">
                                            <span>Mega Restaurant</span>
                                        </label>
                                        <label class="radio-card">
                                            <input type="radio" name="user_type" id="shopkeeper" value="Shopkeeper">
                                            <span>Shopkeeper</span>
                                        </label>
                                    </div>



                                    <div class="col-xxl-12 col-lg-12 col-sm-6">
                                        <div class="custom-form pt-3 pb-1">
                                            <label for="vat_number">Vat Number</label>
                                            <div class="custom-input pt-2">
                                                <input type="text" class="form-control" id="vat_number"  name="vat_number" placeholder="Vat Number">
                                            </div>
                                        </div>
                                    </div>

                                   

                                </div>

                                <div class="col-12">
                                    <div class="forgot-box">
                                        <div class="form-check ps-0 m-0 remember-box">
                                            <input class="checkbox_animated check-box" type="checkbox" id="terms_condi"
                                                name="terms_condi">
                                            <label class="form-check-label" for="flexCheckDefault">I agree with
                                                <span style="color: #062d6a;">Terms</span> and <span
                                                    style="color: #062d6a;">Privacy</span></label>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-12">
                                    <button id="submitButton" class="btn btn-animation w-100" type="submit">Sign
                                        Up</button>
                                </div>
                            </form>
                        </div>

                        <div class="other-log-in pt-3">
                            <h6 class="text-center">or</h6>
                        </div>



                        <div class="sign-up-box text-center">
                            <h4 >Already have an account?</h4>
                            <a   href="../SIGN-IN" >Log In</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <!-- Full Time Tab -->
            <div class="tab-pane fade show active" id="fulltime" role="tabpanel" aria-labelledby="fulltime-tab">
                <div class="job-item p-4 mb-4" style="border: 1px solid #ddd; border-radius: 8px;">
                    <div class="row g-4">
                    <div id="News" class="tabcontent pt-2 pb-4" style="display:block">
                        
                        <div class="input-box pt-4">
                            <form class="row g-4" id="formId_" onsubmit="return validation1();">
                                <h3>Company Information</h3>
                                <div class="col-xxl-12 col-lg-12 col-sm-6">
                                    <div class="custom-form">
                                        <label for="company_name1">Company Name <span style="color:red"><b>*</b></span></label>
                                        <div class="custom-input">
                                            <input type="text" class="form-control" id="company_name" name="company_name"
                                                placeholder="Company Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-12 col-lg-12 col-sm-6">
                                    <div class="custom-form">
                                        <label for="business_type">Business type <span style="color:red"><b>*</b></span></label>
                                        <div class="custom-input">
                                                <select  class="form-control" id="business_type" name="business_type">
                                                    <option value=""> --- Please Select --- </option>
                                                    <option value="Limited Company">Limited Company</option>
                                                                <option value="Limited Liability Partnership">Limited Liability Partnership </option>
                                                                <option value="Partnership">Partnership</option>
                                                                <option value="Sole Trader">Sole Trader</option>
                                                                <option value="Trust">Trust</option>
                                            
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-12 col-lg-12 col-sm-6">
                                    <div class="custom-form">
                                        <label for="product_sell">Products you sell <span style="color:red"><b>*</b></span></label>
                                        <div class="custom-input">
                                            <input type="text"  class="form-control"
                                                id="product_sell" name="product_sell" placeholder="Products you sell">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-xxl-12 col-lg-12 col-sm-6">
                                    <div class="custom-form">
                                        <label for="year_established">Year established <span style="color:red"><b>*</b></span></label>
                                        <div class="custom-input">
                                            <input type="text"  class="form-control"
                                                id="year_established" name="year_established" placeholder="Year established">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-xxl-12 col-lg-12 col-sm-6">
                                    <div class="custom-form">
                                        <label for="website">Website</label>
                                        <div class="custom-input">
                                            <input type="text"  class="form-control"
                                                id="website" name="website" placeholder="Website">
                                        </div>

                                    </div>
                                </div>


                                <div class="col-xxl-12 col-lg-12 col-sm-6">
                                        <div class="custom-form ">
                                            <label for="vat_number1">Vat Number</label>
                                            <div class="custom-input">
                                                <input type="text" class="form-control" id="vat_number1"
                                                    name="vat_number1" placeholder="Vat Number">
                                            </div>
                                        </div>
                                </div>
                             

                                <div class="col-xxl-12 col-lg-12 col-sm-6">
                                    <div class="custom-form">
                                        <label for="hear_about_us">How did you hear about us? </label>
                                        <div class="custom-input">
                                                <select  class="form-control" id="hear_about_us" name="hear_about_us">
                                                <option value=""> --- Please Select --- </option>
                                                <option value="Brochure or Flyer (please specify)">Brochure or Flyer (please specify)</option>
                                                                <option value="Business Directory (please specify)">Business Directory (please specify)</option>
                                                                <option value="Web Search (which words)">Web Search (which words)</option>
                                                                <option value="Magazine or Newspaper (please specify)">Magazine/Newspaper (please specify)</option>
                                                                <option value="Referred by friend/trader (please specify)">Referred by friend/trader (please specify)</option>
                                                                <option value="Trade Forum (please specify)">Trade Forum (please specify)</option>
                                                                <option value="Trade Show (please specify)">Trade Show (please specify)</option>
                              
                                            
                                                </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-12 col-lg-12 col-sm-6">
                                        <div class="custom-form ">
                                            <label for="que_ans">Specific details for above question <span style="color:red"></span></label>
                                            <div class="custom-input ">
                                                <input type="text" class="form-control" id="que_ans"
                                                    name="que_ans" placeholder="Specific details for above question">
                                            </div>
                                        </div>
                                </div>

                                <h3>Address Details </h3>

                                <div class="col-xxl-12 col-lg-12 col-sm-6">
                                        <div class="custom-form ">
                                            <label for="address_1">Address 1 <span style="color:red"><b>*</b></span></label>
                                            <div class="custom-input ">
                                                <input type="text" class="form-control" id="address_1"
                                                    name="address_1" placeholder="Address 1 ">
                                            </div>
                                        </div>
                                </div>
                                <div class="col-xxl-12 col-lg-12 col-sm-6">
                                        <div class="custom-form ">
                                            <label for="address_2">Address 2 </label>
                                            <div class="custom-input ">
                                                <input type="text" class="form-control" id="address_2"
                                                    name="address_2" placeholder="Address 2 ">
                                            </div>
                                        </div>
                                </div>

                                <div class="col-xxl-12 col-lg-12 col-sm-6">
                                        <div class="custom-form">
                                            <label for="city_1">City <span style="color:red"><b>*</b></span></label>
                                            <div class="custom-input">
                                                <input type="text" class="form-control" id="city_1"
                                                    name="city_1" placeholder="City ">
                                            </div>
                                        </div>
                                </div>

                                <div class="col-xxl-12 col-lg-12 col-sm-6">
                                        <div class="custom-form">
                                            <label for="post_code_1">Post Code <span style="color:red"><b>*</b></span></label>
                                            <div class="custom-input">
                                                <input type="text" class="form-control" id="post_code_1"
                                                    name="post_code_1" placeholder="Post Code ">
                                            </div>
                                        </div>
                                </div>

                                <div class="col-xxl-12 col-lg-12 col-sm-6">
                                        <div class="custom-form">
                                            <label for="country">Country <span style="color:red"><b>*</b></span></label>
                                            <div class="custom-input">
                                            <select  class="form-control" id="country" name="country">
                                                <option value=""> --- Please Select --- </option>
                                                <?php
                                                    $sql = "SELECT * FROM country_master where flag='1'";
                                                    $result = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        ?>    
                                                        <option value="<?=$row['id']?>"><?=$row['country_name']?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                               
                              
                                            
                                                </select>
                                            </div>
                                        </div>
                                </div>

                                <div class="col-xxl-12 col-lg-12 col-sm-6">
                                        <div class="custom-form">
                                            <label for="nation">Nation <span style="color:red"><b>*</b></span></label>
                                            <div class="custom-input">
                                            <select  class="form-control" id="nation" name="nation">
                                                <option value=""> --- Please Select --- </option>
                                                <?php
                                                    $sql = "SELECT * FROM nation_master where flag='1'";
                                                    $result = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        ?>    
                                                        <option value="<?=$row['id']?>"><?=$row['nation_name']?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                               
                              
                                            
                                                </select>
                                            </div>
                                        </div>
                                </div>

                                <h3>Your Personal Details </h3>

                                <div class="col-xxl-12 col-lg-12 col-sm-6">
                                    <div class="custom-form">
                                        <label for="full_name">Full Name</label>
                                        <div class="custom-input">
                                            <input type="text" class="form-control" id="full_name1" name="full_name1"
                                                placeholder="Full Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-12 col-lg-12 col-sm-6">
                                    <div class="custom-form">
                                        <label for="email">Email Address</label>
                                        <div class="custom-input">
                                            <input type="email" style="text-transform: lowercase" class="form-control"
                                                id="email1" name="email1" placeholder="Email Address">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-12 col-lg-12 col-sm-6">
                                    <div class="custom-form">
                                        <label for="mobile_no">Mobile Number</label>
                                        <div class="custom-input">
                                            <input type="text" pattern="[1-9]{1}[0-9]{9}" class="form-control" max="10"
                                                id="mobile_no1" name="mobile_no1" placeholder="Mobile Number">
                                        </div>

                                    </div>
                                </div>


                                <div class="col-xxl-12 col-lg-12 col-sm-6">
                                    <div class="custom-form">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="custom-input position-relative">
                                            <input type="password" class="form-control" id="password1" name="password1"
                                                placeholder="Password" required>
                                            <span
                                                class="password-toggle position-absolute top-50 end-0 translate-middle-y me-3"
                                                onclick="togglePassword_()">
                                                <i class="fa fa-eye-slash" id="toggleIcon1"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-12 col-lg-12 col-sm-6">
                                        <div class="custom-form">
                                            <label for="nation">I am <span style="color:red"><b>*</b></span></label>
                                            <div class="custom-input">
                                            <select  class="form-control" id="user_type" name="user_type">
                                                <option value=""> --- Please Select --- </option>
                                                <option value="wholesaler"> Wholesaler </option>
                                                <option value="mega_restaurant"> Mega Restaurant </option>
                                                <option value="shopkeeper"> Shopkeeper </option>
                                                               
                              
                                            
                                                </select>
                                            </div>
                                        </div>
                                </div>

                               

                                <div class="col-12">
                                    <div class="forgot-box">
                                        <div class="form-check ps-0 m-0 remember-box">
                                            <input class="checkbox_animated check-box" type="checkbox" id="terms_condi1"
                                                name="terms_condi1">
                                            <label class="form-check-label" for="flexCheckDefault">I agree with
                                                <span style="color: #062d6a;">Terms</span> and <span
                                                    style="color: #062d6a;">Privacy</span></label>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-12">
                                    <button id="submitButton1" class="btn btn-animation w-100" type="submit">Sign
                                        Up</button>
                                </div>
                            </form>
                        </div>

                        <div class="other-log-in pt-3">
                            <h6 class="text-center">or</h6>
                        </div>



                        <div class="sign-up-box text-center">
                            <h4 >Already have an account?</h4>
                            <a   href="../SIGN-IN" >Log In</a>
                        </div>
                    </div>

                    
                    <div id="Contact" class="tabcontent">
                        <h3>Contact</h3>
                        <p>Get in touch, or swing by for a cup of coffee.</p>
                    </div>

                    <div id="About" class="tabcontent">
                        <h3>About</h3>
                        <p>Who we are and what we do.</p>
                    </div>

                    <script>
                        function openPage(pageName, elmnt, color) {
                            var i, tabcontent, tablinks;
                            tabcontent = document.getElementsByClassName("tabcontent");
                            for (i = 0; i < tabcontent.length; i++) {
                                tabcontent[i].style.display = "none";
                            }
                            tablinks = document.getElementsByClassName("tablink");
                            for (i = 0; i < tablinks.length; i++) {
                                tablinks[i].style.backgroundColor = "";
                            }
                            document.getElementById(pageName).style.display = "block";
                            elmnt.style.backgroundColor = color;
                        }

                        // Get the element with id="defaultOpen" and click on it
                        document.getElementById("defaultOpen").click();
                    </script>

                    </div>
                </div>
            </div>

            
        </div>
    </div>
</div>
<!-- Jobs End -->

<!-- log in section start -->
<section class="log-in-section section-b-space" id="changable_section">
   

    <div class="container-fluid-lg w-100" id="otp_div" style="display:NONE">
        <div class="row">
            <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                <div class="image-contain">
                    <img src="../assets/images/inner-page/otp.png" class="img-fluid" alt="">
                </div>
            </div>

            <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                <div class="d-flex align-items-center justify-content-center h-100">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3 class="text-title">Please enter the one time password to verify your account</h3>
                            <h5 class="text-content">A code has been sent to mail </h5>
                        </div>
                        <form id="formId_OTP">
                            <div id="otp" class="inputs d-flex flex-row justify-content-center">
                                <input class="text-center form-control rounded" type="text" id="first" maxlength="1"
                                    placeholder="0">
                                <input class="text-center form-control rounded" type="text" id="second" maxlength="1"
                                    placeholder="0">
                                <input class="text-center form-control rounded" type="text" id="third" maxlength="1"
                                    placeholder="0">
                                <input class="text-center form-control rounded" type="text" id="fourth" maxlength="1"
                                    placeholder="0">
                                <input class="text-center form-control rounded" type="text" id="fifth" maxlength="1"
                                    placeholder="0">
                                <input class="text-center form-control rounded" type="text" id="sixth" maxlength="1"
                                    placeholder="0">
                            </div>

                            <div class="send-box pt-4">
                                <h5>Didn't get the code? <a onclick="resend_OTP()" class="theme-color fw-bold">Resend
                                        It</a></h5>
                            </div>

                            <button id="submitButton_OTP" class="btn btn-animation w-100 mt-3"
                                type="submit">Validate</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<input type="hidden" name="sinup_key" id="sinup_key" value="">
<!-- log in section end -->

<!-- Footer Section Start -->
<?php include '../inner_footer.php'; ?>

<script>

    function togglePassword() {
        const passwordField = document.getElementById("password");
        const toggleIcon = document.getElementById("toggleIcon");

        if (passwordField.type === "password") {
            passwordField.type = "text"; // Show the password
            toggleIcon.classList.remove("fa-eye-slash");
            toggleIcon.classList.add("fa-eye");
        } else {
            passwordField.type = "password"; // Hide the password
            toggleIcon.classList.remove("fa-eye");
            toggleIcon.classList.add("fa-eye-slash");
        }
    }

    function togglePassword_() {
        const passwordField = document.getElementById("password1");
        const toggleIcon = document.getElementById("toggleIcon1");

        if (passwordField.type === "password") {
            passwordField.type = "text"; // Show the password
            toggleIcon.classList.remove("fa-eye-slash");
            toggleIcon.classList.add("fa-eye");
        } else {
            passwordField.type = "password"; // Hide the password
            toggleIcon.classList.remove("fa-eye");
            toggleIcon.classList.add("fa-eye-slash");
        }
    }



    function validation() {

        if (document.getElementById("terms_condi").checked == false) {

            alert("Please accepts Terms & Conditions..");
        } else {

            var full_name = $("#full_name").val();
            var email = $("#email").val();
            var mobile_no = $("#mobile_no").val();
            var password = $("#password").val();
            var vat_number = $("vat_number").val();

            $("#full_name").removeClass('bordererror');
            $("#email").removeClass('bordererror');
            $("#mobile_no").removeClass('bordererror');
            $("#password").removeClass('bordererror');
            $("#vat_number").removeClass('bordererror');
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if (full_name == "") {
                $("#full_name").focus();
                error = "Please enter full name";
                $("#full_name").val('');
                $("#full_name").addClass('bordererror');
                $("#full_name").attr("placeholder", error);
                return false;
            }
            if (email === "" || !filter.test(email)) {
                $("#email").val('');
                error = "Please enter the email";
                $("#email").focus();
                $("#email").addClass('bordererror');
                $("#email").attr("placeholder", error);
                return false;
            }
            if (mobile_no == "" || mobile_no.length != 10 || isNaN(mobile_no)) {
                $("#mobile_no").val('');
                error = "Please enter the Phone";
                $("#mobile_no").focus();
                $("#mobile_no").addClass('bordererror');
                $("#mobile_no").attr("placeholder", error);
                return false;
            }
            if (vat_number == "") {
                $("#vat_number").focus();
                error = "Please enter Vat Number";
                $("#vat_number").val('');
                $("#vat_number").addClass('bordererror');
                $("#vat_number").attr("placeholder", error);
                return false;
            }
            else if (password === "") {
                $("#password").focus();
                error = "Please enter password";
                $("#password").val('');
                $("#password").addClass('bordererror');
                $("#password").attr("placeholder", error);
                return false;
            }
            return true;
        }
    }

    function validation1() {

if (document.getElementById("terms_condi1").checked == false) {

    alert("Please accepts Terms & Conditions..");
} else {
    

    var company_name = document.getElementById("company_name").value;
    var business_type =  document.getElementById("business_type").value;
    var product_sell =document.getElementById("product_sell").value;
    var year_established = document.getElementById("year_established").value;

    var address_1 = document.getElementById("address_1").value;
    var city = document.getElementById("city_1").value;
    var post_code = document.getElementById("post_code_1").value;
    var nation = document.getElementById("nation").value;
    var user_type = document.getElementById("user_type").value;

    
  
    var full_name = $("#full_name1").val();
    var email = $("#email1").val();
    var mobile_no = $("#mobile_no1").val();
    var password = $("#password1").val();
    var vat_number = $("vat_number1").val();

 
   
    $("#company_name").removeClass('bordererror');
    $("#business_type").removeClass('bordererror');
    $("#product_sell").removeClass('bordererror');
    $("#year_established").removeClass('bordererror');

    $("#address_1").removeClass('bordererror');
    $("#city").removeClass('bordererror');
    $("#post_code").removeClass('bordererror');
    $("#nation").removeClass('bordererror');
    $("#user_type").removeClass('bordererror');


    
 
    $("#full_name1").removeClass('bordererror');
    $("#email1").removeClass('bordererror');
    $("#mobile_no1").removeClass('bordererror');
    $("#password1").removeClass('bordererror');
    $("#vat_number1").removeClass('bordererror');
  
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  
    if (company_name == "") {
       
        $("#company_name").focus();
        error = "Please enter company name";
        $("#company_name").val('');
        $("#company_name").addClass('bordererror');
        $("#company_name").attr("placeholder", error);
        return false;
    }
    else if (business_type == "") {
       
        $("#business_type").focus();
        error = "Please select business type";
        $("#business_type").val('');
        $("#business_type").addClass('bordererror');
        $("#business_type").attr("placeholder", error);
        return false;
    }
    else if (product_sell == "") {
       
        $("#product_sell").focus();
        error = "Please enter product sell";
        $("#product_sell").val('');
        $("#product_sell").addClass('bordererror');
        $("#product_sell").attr("placeholder", error);
        return false;
    }
    else if (year_established == "") {
       
        $("#year_established").focus();
        error = "Please enter product sell";
        $("#year_established").val('');
        $("#year_established").addClass('bordererror');
        $("#year_established").attr("placeholder", error);
        return false;
    }
    else if (address_1 == "") {
       
        $("#address_1").focus();
        error = "Please enter Address";
        $("#address_1").val('');
        $("#address_1").addClass('bordererror');
        $("#address_1").attr("placeholder", error);
        return false;
    }
    
    else if (city == "") {
       
        $("#city").focus();
        error = "Please enter City";
        $("#city").val('');
        $("#city").addClass('bordererror');
        $("#city").attr("placeholder", error);
        return false;
    }
    else if (post_code == "") {
       
        $("#post_code").focus();
        error = "Please enter Post Code";
        $("#post_code").val('');
        $("#post_code").addClass('bordererror');
        $("#post_code").attr("placeholder", error);
        return false;
    }
    
    else if (nation == "") {
        
        $("#nation").focus();
        error = "Please enter Nation";
        $("#nation").val('');
        $("#nation").addClass('bordererror');
        $("#nation").attr("placeholder", error);
        return false;
    }
    else if (full_name == "") {
       
        $("#full_name1").focus();
        error = "Please enter full name";
        $("#full_name1").val('');
        $("#full_name1").addClass('bordererror');
        $("#full_name1").attr("placeholder", error);
        return false;
    }
    else  if (email == "" || !filter.test(email)) {
       
        $("#email1").val('');
        error = "Please enter the email";
        $("#email1").focus();
        $("#email1").addClass('bordererror');
        $("#email1").attr("placeholder", error);
        return false;
    }
    else if (mobile_no == "" || mobile_no.length != 10 || isNaN(mobile_no)) {
       
        $("#mobile_no1").val('');
        error = "Please enter the Phone";
        $("#mobile_no1").focus();
        $("#mobile_no1").addClass('bordererror');
        $("#mobile_no1").attr("placeholder", error);
        return false;
    }
    else if (vat_number == "") {
       
        $("#vat_number1").focus();
        error = "Please enter Vat Number";
        $("#vat_number1").val('');
        $("#vat_number1").addClass('bordererror');
        $("#vat_number1").attr("placeholder", error);
        return false;
    }
    else if (password == "") {
       
        $("#password1").focus();
        error = "Please enter password";
        $("#password1").val('');
        $("#password1").addClass('bordererror');
        $("#password1").attr("placeholder", error);
        return false;
    }
    else if (user_type == "") {
        
        $("#user_type").focus();
        error = "Please select User Option";
        $("#user_type").val('');
        $("#user_type").addClass('bordererror');
        $("#user_type").attr("placeholder", error);
        return false;
    }
    return true;
    
}
}


    $(document).ready(function () {
        $("#submitButton").click(function (event) {
            event.preventDefault(); // Prevent default form submission

            if (!validation()) {
                return; // Stop submission if validation fails
            }

            let form = $("#formId");
            let url = "signup_form.php";

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // Serialize form data
                success: function (data) {
                    console.log('my message' + data);
                    let mydata = data.split("__AJAX-");
                    var word = "" + mydata[1];
                    let ans = "" + word.localeCompare("Done ");

                    if (ans == 0) {
                        document.getElementById("sinup_key").value = mydata[2];
                        document.getElementById("reg_div").style.display = "none";
                        document.getElementById("otp_div").style.display = "block";


                    } else {
                        alert("User Already Exist.. ")
                    }
                },
                error: function (data) {
                    alert("Error occurred while submitting the form");
                }
            });
        });
    });


    
    $(document).ready(function () {
        $("#submitButton1").click(function (event) {
            event.preventDefault(); // Prevent default form submission
          
            if (!validation1()) {
                return; // Stop submission if validation fails
                
            }
           let form = $("#formId_");
            let url = "signup_form_.php";

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // Serialize form data
                success: function (data) {
                    console.log('my message' + data);
                    let mydata = data.split("__AJAX-");
                    var word = "" + mydata[1];
                    let ans = "" + word.localeCompare("Done ");

                    if (ans == 0) {
                        document.getElementById("sinup_key").value = mydata[2];
                        document.getElementById("reg_div").style.display = "none";
                        document.getElementById("otp_div").style.display = "block";


                    } else {
                        alert("User Already Exist.. ")
                    }
                },
                error: function (data) {
                    alert("Error occurred while submitting the form");
                }
            });
        });
    });

    // OTP Auto-Focus Functionality

    document.addEventListener("DOMContentLoaded", function () {
        const inputs = document.querySelectorAll("#otp input");

        inputs.forEach((input, index) => {
            input.addEventListener("input", (e) => {
                const value = e.target.value;

                // Move to next input if value is entered
                if (value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });

            input.addEventListener("keydown", (e) => {
                if (e.key === "Backspace" && !e.target.value && index > 0) {
                    // Move to the previous input if Backspace is pressed
                    inputs[index - 1].focus();
                }
            });
        });
    });

    $(document).ready(function () {
        $("#submitButton_OTP").click(function (event) {
            event.preventDefault(); // Prevent default form submission

            let form = $("#formId_OTP");

            let url = "signup_form_OTP.php";

            var key = document.getElementById("sinup_key").value;
            var otp = document.getElementById("first").value + "" + document.getElementById("second").value + "" + document.getElementById("third").value + "" + document.getElementById("fourth").value + "" + document.getElementById("fifth").value + "" + document.getElementById("sixth").value;

            $.ajax({
                type: "POST",
                url: url,
                data: { signupkey: key, user_otp: otp }, // Serialize form data
                success: function (data) {
                    console.log('my message' + data);
                    let mydata = data.split("__AJAX-");
                    var word = "" + mydata[1];
                    let ans = "" + word.localeCompare("Done ");

                    if (ans == 0) {

                        window.location.href = '../';


                    } else {
                        alert("Enter Valide OTP")
                    }
                },
                error: function (data) {
                    alert("Error occurred while submitting the form");
                }
            });
        });
    });
    function resend_OTP() {
        let form = $("#formId_OTP");

        let url = "resendOTP.php";
        $.ajax({
            type: "POST",
            url: url,
            data: {}, // Serialize form data
            success: function (data) {

                alert("OTP Resend Successfull");

            },
            error: function (data) {
                alert("Error occurred while submitting the form");
            }
        });
    }

</script>
</body>


<!-- Mirrored from themes.pixelstrap.com/fastkart/front-end/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2024 06:36:37 GMT -->

</html>