<?php ob_start(); ?>
<div class="features_section2 p-0 my50">
  <div>
    <div class="container">
      <div class="border p-4 fsecton1 mb-5 wow animate__fadeIn" data-wow-duration=".5s" data-wow-delay="1s">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6 col-lg-3">
            <div class="d-flex align-items-center  mb-3 mb-lg-0">
              <div> <i class="bi bi-truck fs-1 me-3 about_section-icon-color"></i> </div>
              <div>
                <h5>Fast shipping & Returns</h5>
                <p>For all orders</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="d-flex align-items-center mb-3 mb-lg-0">
              <div> <i class="bi bi-wallet2 fs-1 me-3 about_section-icon-color"></i> </div>
              <div>
                <h5>Secure Payment</h5>
                <p>We ensure secure payment</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="d-flex align-items-center  mb-3 mb-lg-0">
              <div> <i class="bi bi-coin fs-1 me-3 about_section-icon-color"></i> </div>
              <div>
                <h5>Affordable Selection</h5>
                <p>Our prices are unbeatable</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="d-flex align-items-center  mb-3 mb-lg-0">
              <div><i class="bi bi-person-check fs-1 me-3 about_section-icon-color"></i> </div>
              <div>
                <h5>Customer Support</h5>
                <p>Contact us for support</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $sections['featuresSection'] = ob_get_clean(); ?>