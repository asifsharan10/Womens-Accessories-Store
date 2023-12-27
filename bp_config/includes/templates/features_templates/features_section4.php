<?php ob_start(); ?>
<div class="features_section4 p-0 my50">
  <div class="">

    <div class="container">

      <div class="border p-4 fsecton1 mb-5 wow animate__fadeIn" data-wow-duration=".5s" data-wow-delay="1s">
        <div class="row align-items-center justify-content-center">

          <div class="col-md-6 col-lg-3">
            <div class="d-flex align-items-center  mb-3 mb-lg-0 border-right">
              <div><i class="far fa-gift fs-1 me-3 about_section-icon-color"></i> </div>
              <div>
                <h5>GREAT SELECTION</h5>
                <p>We've got the right product for you</p>
              </div>
            </div>
          </div>


          <div class="col-md-6 col-lg-3">
            <div class="d-flex align-items-center mb-3 mb-lg-0 border-right">
              <div><i class="fas fa-truck fs-1 me-3 about_section-icon-color"></i> </div>
              <div>
                <h5>Fast shipping</h5>
                <p>Receive your order in just a few days</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="d-flex align-items-center  mb-3 mb-lg-0 border-right ">
              <div> <i class="bi bi-coin fs-1 me-3 about_section-icon-color"></i> </div>
              <div>
                <h5>Exclusive Pricing</h5>
                <p>We offer the lowest prices</p>
              </div>
            </div>
          </div>


          <div class="col-md-6 col-lg-3">
            <div class="d-flex align-items-center  mb-3 mb-lg-0 ">
              <div><i class="bi bi-person-check fs-1 me-3 about_section-icon-color"></i> </div>
              <div>
                <h5>Excellent Service</h5>
                <p>Call us: <?= $generalConfig['phone_number'] ?></p>
              </div>
            </div>
          </div>




        </div>
      </div>



    </div>
  </div>
</div>
<?php $sections['featuresSection'] = ob_get_clean(); ?>