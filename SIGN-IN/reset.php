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
                        <h2>Forgot Password</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="../">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Forgot Password</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- log in section start -->
    <section class="log-in-section section-b-space forgot-section">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="../assets/images/inner-page/forgot.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div class="log-in-box">
                            <div class="log-in-title">
                                <h3>Welcome To Waves Packaging</h3>
                                <h4>Forgot your password</h4>
                            </div>

                            <div class="input-box">
                                <form class="row g-4" id="formId">
                                    <div class="col-12">
                                        <div class="form-floating theme-form-floating log-in-form">
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="Email Address">
                                            <label for="email">Email Address</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-animation w-100" id="submitButton" name="submitButton" type="submit">Forgot
                                            Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- log in section end -->

    <!-- Footer Section Start -->
    <?php include '../inner_footer.php'; ?>
    <!-- Footer Section End -->

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

    <!-- latest jquery-->
<script>
     $(document).ready(function () {
        $("#submitButton").click(function (event) {
            event.preventDefault(); // Prevent default form submission

           
            let form = $("#formId");
            let url = "reset_form.php";

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

                         window.location.href = '../';



                    } else if (ans_ == 0) {
                        document.getElementById("login_responce").innerHTML = "<span style='color:orange'>Account is not activated</span>";

                    } else {
                        document.getElementById("login_responce").innerHTML = "<span style='color:red'>Entered credentials are invalid</span>";

                    }
                },
                error: function (data) {
                    alert("Error occurred while submitting the form");
                }
            });
        });
    });

</script>
</body>


<!-- Mirrored from themes.pixelstrap.com/fastkart/front-end/forgot.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2024 06:36:38 GMT -->
</html>