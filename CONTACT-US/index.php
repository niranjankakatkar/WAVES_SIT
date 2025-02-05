

<?php
include '../niru_collection.php';
include '../inner_header.php';


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$token_id=generateRandomString(15);
    $full_name=$_POST['first_name']." ".$_POST['last_name'];
    $email=$_POST['email'];
    $phone_no=$_POST['phone_no'];
    $msg=$_POST['msg'];
    $brand_flag=$_POST['brand_flag'];
    if($brand_flag=="")
    {
        $brand_flag="0";
    }
    
    $sql="INSERT INTO contact_us(token_id,full_name,email,phone_no,msg,respocse,flag,brand_flag) VALUES('$token_id','$full_name','$email','$phone_no','$msg','','0','$brand_flag')";
	if($conn->query($sql))
	{
		?>		  
		 <script>alert("Saved Done"); window.location.href="../CONTACT-US/"; </script>
		  <?php
	}
}

?> 
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        <h2>Contact Us</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="../">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Contact Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Box Section Start -->
    <section class="contact-box-section">
        <div class="container-fluid-lg">
            <div class="row g-lg-5 g-3">
                <div class="col-lg-6">
                    <div class="left-sidebar-box">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="contact-image">
                                    <img src="../assets/images/inner-page/contact-us.png"
                                        class="img-fluid blur-up lazyloaded" alt="">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="contact-title">
                                    <h3>Get In Touch</h3>
                                </div>

                                <div class="contact-detail">
                                    <div class="row g-4">
                                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                                            <div class="contact-detail-box">
                                                <div class="contact-icon">
                                                    <i class="fa-solid fa-phone"></i>
                                                </div>
                                                <div class="contact-detail-title">
                                                    <h4>Phone</h4>
                                                </div>

                                                <div class="contact-detail-contain">
                                                    <p><?=givedata($conn,"company_master","id","1","contact_no1")?></p>
                                                    <p><?=givedata($conn,"company_master","id","1","contact_no2")?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                                            <div class="contact-detail-box">
                                                <div class="contact-icon">
                                                    <i class="fa-solid fa-envelope"></i>
                                                </div>
                                                <div class="contact-detail-title">
                                                    <h4>Email</h4>
                                                </div>

                                                <div class="contact-detail-contain">
                                                    <p><?=givedata($conn,"company_master","id","1","email")?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                                            <div class="contact-detail-box">
                                                <div class="contact-icon">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                </div>
                                                <div class="contact-detail-title">
                                                    <h4>Office</h4>
                                                </div>

                                                <div class="contact-detail-contain">
                                                    <p><?=givedata($conn,"company_master","id","1","address")?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="col-xxl-6 col-lg-12 col-sm-6">
                                            <div class="contact-detail-box">
                                                <div class="contact-icon">
                                                    <i class="fa-solid fa-building"></i>
                                                </div>
                                                <div class="contact-detail-title">
                                                    <h4>Office 2</h4>
                                                </div>

                                                <div class="contact-detail-contain">
                                                    <p><?=givedata($conn,"company_master","id","1","address")?></p>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="title d-xxl-none d-block">
                        <h2>Contact Us</h2>
                    </div>
                    <form method="POST"    onsubmit="return validation();">
                    <div class="right-sidebar-box">
                        <div class="row">
                            <div class="col-xxl-6 col-lg-12 col-sm-6">
                                <div class="mb-md-4 mb-3 custom-form">
                                    <label for="exampleFormControlInput" class="form-label">First Name <span style="color:red">*</span></label>
                                    <div class="custom-input">
                                        <input type="text" class="form-control" id="first_name" name="first_name"
                                            placeholder="Enter First Name">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-lg-12 col-sm-6">
                                <div class="mb-md-4 mb-3 custom-form">
                                    <label for="exampleFormControlInput1" class="form-label">Last Name <span style="color:red">*</span></label>
                                    <div class="custom-input">
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                            placeholder="Enter Last Name">
                                            <input type="hidden" class="form-control" id="brand_flag" name="brand_flag" value="<?=$_GET['id']?>">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-lg-12 col-sm-6">
                                <div class="mb-md-4 mb-3 custom-form">
                                    <label for="exampleFormControlInput2" class="form-label">Email Address <span style="color:red">*</span></label>
                                    <div class="custom-input">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Enter Email Address">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-lg-12 col-sm-6">
                                <div class="mb-md-4 mb-3 custom-form">
                                    <label for="exampleFormControlInput3" class="form-label">Phone Number <span style="color:red">*</span></label>
                                    <div class="custom-input">
                                        <input type="tel" class="form-control" id="phone_no" name="phone_no"
                                            placeholder="Enter Your Phone Number" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value =
                                            this.value.slice(0, this.maxLength);">
                                        <i class="fa-solid fa-mobile-screen-button"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-md-4 mb-3 custom-form">
                                    <label for="exampleFormControlTextarea" class="form-label">Message <span style="color:red">*</span></label>
                                    <div class="custom-textarea">
                                        <textarea class="form-control" id="message" name="msg"
                                            placeholder="Enter Your Message" rows="6"></textarea>
                                        <i class="fa-solid fa-message"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-animation btn-md fw-bold ms-auto" >Send Message</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Box Section End -->

    <!-- Map Section Start -->
    <section class="map-section">
        <div class="container-fluid p-0">
            <div class="map-box">
            <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d619192.557551784!2d-1.7902277883799127!3d52.683077116350574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sWaves%20packaging%20limited%20Gobind%20house%2C%2012b%20Navigation%20Street%2C%20Leicester%2C%20Leicestershire%2C%20LE1%203UR!5e0!3m2!1sen!2sin!4v1737036695130!5m2!1sen!2sin" width="600"
                 height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <!-- Map Section End -->

    <?php include '../inner_footer.php';?> 

    <script>
         function validation() {
            var first_name=$("#first_name").val();
            var last_name=$("#last_name").val();
            var email=$("#email").val();
            var phone_no=$("#phone_no").val();
            var message=$("#message").val();
            $("#first_name").removeClass('bordererror');
            $("#last_name").removeClass('bordererror');
            $("#email").removeClass('bordererror');
            $("phone_no").removeClass('bordererror')
            $("#message").removeClass('bordererror');
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(first_name ==""){
            $("#first_name").focus();
            error ="Please enter first name";
            $("#first_name").val('');
            $("#first_name").addClass('bordererror');
            $("#first_name").attr("placeholder", error);
            return false;
            }
            if(last_name ==""){
            $("#last_name").focus();
            error ="Please enter last name";
            $("#last_name").val('');
            $("#last_name").addClass('bordererror');
            $("#last_name").attr("placeholder", error);
            return false;
            }
            if (!filter.test(email)) {
            $("#email").val('');
            error = "Please enter the email";
            $("#email").focus();
            $("#email").addClass('bordererror');
            $("#email").attr("placeholder",error);
            return false;
        }
        if (phone_no == "" || phone_no.length != 10 || isNaN(phone_no)) {
            $("#phone_no").val('');
            error = "Please enter the Phone";
            $("#phone_no").focus();
            $("#phone_no").addClass('bordererror');
            $("#phone_no").attr("placeholder",error);
            return false;
        }
          else if (message == ""){
            $("#message").focus();
            error = "Please enter the message";
            $("#message").val('');
            $("#message").addClass('bordererror');
            $("#message").attr("placeholder",error);
            return false;
          }  
        }
    </script>
</body>


</html>  