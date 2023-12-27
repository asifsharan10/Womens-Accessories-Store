<!-- Services Section Start -->
<?php ob_start(); ?>

<div class="contact-section2 p-0 my50">
  <div class="">
    <div class="container-fluid">
      <div class="border p-4 fsecton1 mb-5 wow animate__fadeIn"  data-wow-duration=".5s" data-wow-delay="1s">
        <div class="row align-items-center justify-content-center">

          <div class="col-12 col-md-4">
            <div class="d-flex align-items-center  mb-3 mb-lg-0">
              <div> <i class="fal fa-envelope fs-1 me-3 about_section-icon-color"></i> </div>
              <div>
                <h5 class="about_section-icon-color">Do you have any question?</h5>
                <p>Email. <?= $generalConfig['email'] ?></p>
              </div>
            </div>
          </div>
        
          <div class="col-12 col-md-4">
            <div class="d-flex align-items-center mb-3 mb-lg-0">
              <div> <i class="fal fa-phone-volume fs-1 me-3 about_section-icon-color"></i> </div>
              <div>
                <h5 class="about_section-icon-color"><?= $generalConfig['phone_number'] ?></h5>
                <p><?= $generalConfig['customer_service_hours'] ?></p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-md-4">
            <div class="d-flex align-items-center  mb-3 mb-lg-0">
              <a href="contact.php" class="banner-btn-color">Contact Us</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<?php $sections['contactSection'] = ob_get_clean(); ?>
<!-- Services Section End -->