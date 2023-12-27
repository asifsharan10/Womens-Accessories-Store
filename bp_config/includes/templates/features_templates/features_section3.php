<?php ob_start(); ?>

<div class="features_section3 about-bg-color m-0 py50 my50">
   <div class="container-fluid">
      <div class="row">
         <div class="col-a col-12 col-md-4 ">
            <div class="features-col-wrap">
               <i class="about_section-icon-color far fa-truck"></i>
               <h3>Fast shipping & Return</h3>
               <p>We offer Fast shipping and returns on our products.</p>
            </div>
         </div>
         <div class="col-a col-12 col-md-4 ">
            <div class="features-col-wrap">
               <i class="about_section-icon-color far fa-user-headset"></i>
               <h3>Customer Support</h3>
               <p>Very responsive customer support to help solve your issues.</p>
            </div>
         </div>
         <div class="col-a col-12 col-md-4 ">
            <div class="features-col-wrap">
               <i class="about_section-icon-color far fa-coins"></i>
               <h3>Best Pricing</h3>
               <p>We offer low and affordable prices across our website.</p>
            </div>
         </div>
      </div>
   </div>
</div>

<?php $sections['featuresSection'] = ob_get_clean(); ?>