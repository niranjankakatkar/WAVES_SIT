

<link rel="stylesheet" type="text/css" href="assets/css/vendors/branded.css"></link>
    
  <?php
  
  include 'niru_collection.php';
  include 'header.php';?> 




    <!-- about us section part -->

    <section class="about-section" >
        <h1 style= "font-size: 20px;">Looking for custom food & drink packaging?</h1>
        <p style= "font-size: 18px;">
          If you’re looking for a cost-effective way to improve your brand’s identity and trustworthiness, whilst increasing product presentation and customer loyalty, personalised food & drink packing may be for you.
        </p>
        <p style= "font-size: 18px;">
          At Waves Packaging ® we have a wealth of experience in custom printed food & drink packaging and are able to brand our 'off the shelf' products with your logo. We're also able to create fully bespoke packaging products.
        </p>
        <p style= "font-size: 18px;">
          We print trays, coffee cups, smoothie cups, kraft bowls, deli boxes, bags, greaseproof paper, to name just a few products! If you'd like some additional information, such as pricing and lead times, please contact us at <a href="mailto:<?=givedata($conn,"company_master","id","1","email")?>"><?=givedata($conn,"company_master","id","1","email")?></a> with your requirements and a member of our experienced team will guide you through the process.
        </p>
      </section>


  <!-- banner Section Start -->
<section class="home-section-2">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="home-contain text-center">
                    <div class="home-detail" onclick="window.location.href='CONTACT-US/?id=1'">
                        <h1 class="get-in-touch-text">GET IN TOUCH TODAY</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner Section End -->

  



<?php include 'footer.php';?> 
</body>


<!-- Mirrored from themes.pixelstrap.com/fastkart/front-end/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2024 06:36:23 GMT -->
</html>    