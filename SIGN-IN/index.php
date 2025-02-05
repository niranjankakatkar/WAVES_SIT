<?php include '../niru_collection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


}

?>
<?php include '../inner_header.php'; ?>



<!-- Breadcrumb Section Start -->
<section class="breadcrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-contain">
                    <h2 class="mb-2">Log In</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="../">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Log In</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- log in section start -->
<section class="log-in-section background-image-2 section-b-space">
    <div class="container-fluid-lg w-100">
        <div class="row">
            <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                <div class="image-contain">
                    <img src="../assets/images/inner-page/log-in.png" class="img-fluid" alt="">
                </div>
            </div>

            <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                <div class="log-in-box">
                    <div class="log-in-title">
                        <h3>Welcome To Waves Packaging</h3>
                        <h4>Log In Your Account</h4>
                    </div>

                    <div class="input-box">
                        <form class="row g-4" id="formId" onsubmit="return validation();">
                            <!-- Email Field -->
                            <div class="col-xxl-12 col-lg-12 col-sm-6">
                                <div class="custom-form">
                                    <label for="email" class="form-label">Email Address</label>
                                    <div class="custom-input">
                                        <input type="email" class="form-control" id="email" name="username"
                                            placeholder="Email Address" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Password Field -->
                            <div class="col-xxl-12 col-lg-12 col-sm-6">
                                <div class="custom-form">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="custom-input position-relative">
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" required>
                                        <span
                                            class="password-toggle position-absolute top-50 end-0 translate-middle-y me-3"
                                            onclick="togglePassword()">
                                            <i class="fa fa-eye-slash" id="toggleIcon"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                           
                            <div class="col-12" id="login_responce"></div>

                           
                            <div class="col-12">
                                <div class="forgot-box d-flex justify-content-between align-items-center">
                                    <div class="form-check ps-0 m-0 remember-box">
                                        <input class="checkbox_animated check-box" name="remember_me" type="checkbox"
                                            id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">Remember me</label>
                                    </div>
                                    <a href="reset.php" class="forgot-password">Forgot Password?</a>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12">
                                <button class="btn btn-animation w-100 justify-content-center" id="submitButton"
                                    type="submit">Log In</button>
                            </div>
                        </form>
                    </div>

                    <div class="other-log-in">
                        <h6>or</h6>
                    </div>





                    <div class="sign-up-box">
                        <h4>Don't have an account?</h4>
                        <a href="../SIGN-UP">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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





    function validation() {
        var email = $("#email").val();
        var password = $("#password").val();
        

        $("#email").removeClass('bordererror');
        $("#password").removeClass('bordererror');

        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (email === "") {
            $("#email").val('');
            error = "Please enter the email";
            $("#email").focus();
            $("#email").addClass('bordererror');
            $("#email").attr("placeholder", error);

            return false;
        }
        if (password === "") {
            $("#password").val('');
            error = "Please enter the password";
            $("#password").focus();
            $("#password").addClass('bordererror');
            $("#password").attr("placeholder", error);
            return false;
        }else{
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
            let url = "signin_form.php";

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // Serialize form data
                success: function (data) {
                    console.log('my message' + data);
                    let mydata = data.split("__AJAX-");
                    var word = "" + mydata[1];
                    let ans = "" + word.localeCompare("Done ");
                    let ans_ = "" + word.localeCompare("Done-1 ");
                    if (ans == 0) {

                        document.getElementById("login_responce").innerHTML = "<span style='color:green'>Login Done</span>";
                        window.location.href = '../';



                    } else if (ans_ == 0) {
                        document.getElementById("login_responce").innerHTML = "<span style='color:orange'>Account is not activated</span>";

                    } else {
                        document.getElementById("login_responce").innerHTML = "<span style='color:red'>Entered credentials are invalid</span>";

                    }
                },
                error: function (data) {
                    document.getElementById("login_responce").innerHTML = "<span style='color:red'>Entered credentials are invalid</span>";

                }
            });
        });
    });

</script>
</body>


<!-- Mirrored from themes.pixelstrap.com/fastkart/front-end/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2024 06:36:37 GMT -->

</html>