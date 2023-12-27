

<!-- Banner Section With Slider -->
<section class="banner-section20 position-relative">
<div class="swiper bg-slider">
         <div class="swiper-wrapper">
            <div class="swiper-slide slide1-overly slide1">
               <img src="img/slide-bg1.jpg" alt="" />
               <div class="text-content">
                  <p class="slogan banner-slogan-color"><?= $updateContent['slogan'] ?></p>
                  <h2 class="title banner-heading-color"><?= $generalConfig['brand_name'] ?></h2>
                  <div class="btn-group">
                     <div class="btn1">
                        <a href="#order"><?= $updateContent['buttonName'] ?></a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="swiper-slide slide2-overly slide2">
               <img src="img/slide-bg2.jpg" alt="" />
               <div class="text-content">
                  <p class="slogan banner-slogan-color"><?= $updateContent['slogan'] ?></p>
                  <h2 class="title banner-heading-color"><?= $generalConfig['brand_name'] ?></h2>
                  <div class="btn-group">
                     <div class="btn1">
                        <a href="#order"><?= $updateContent['buttonName'] ?></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="swiper-button-next navigation-btn"></div>
         <div class="swiper-button-prev navigation-btn"></div>

         <div class="d-flex justify-content-center overlay-background">
            <div class="container p-3 my-3 contact-details-main">
               <div class="contact-details contact-detail-1">
                  <div class="icons">
                     <i class="fas fa-clock banner-heading-color"></i>
                  </div>
                  <div class="details">
                     <h5 class="banner-heading-color">Opening Times</h5>
                     <p class="banner-heading-color"><?= $generalConfig['customer_service_hours'] ?></p>
                  </div>
               </div>
               <div class="contact-details contact-detail-2">
                  <div class="icons">
                     <i class="fas fa-map-marker-alt banner-heading-color"></i>
                  </div>
                  <div class="details">
                     <h5 class="banner-heading-color">Our Location</h5>
                     <p class="banner-heading-color"><?= $generalConfig['address'] ?></p>
                  </div>
               </div>
               <div class="contact-details contact-detail-3">
                  <div class="icons">
                     <i class="fas fa-question-circle banner-heading-color"></i>
                  </div>
                  <div class="details">
                     <h5 class="banner-heading-color">Customer Support</h5>
                     <p class="banner-heading-color"><?= $generalConfig['phone_number'] ?></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      
      <div class="bg-slider-thumbs d-none">
         <div class="swiper-wrapper thumbs-container">
            <img src="img/slide-bg1.jpg" class="swiper-slide" alt="" />
            <img src="img/slide-bg2.jpg" class="swiper-slide" alt="" />
         </div>
      </div>
</section>
<!-- Banner Section With Slider -->







<script>
   var swiper = new Swiper(".bg-slider-thumbs", {
    loop: true,
    spaceBetween: 0,
    slidesPerView: 0,
   });
   var swiper2 = new Swiper(".bg-slider", {
      loop: true,
      spaceBetween: 0,
      autoplay: {
         delay: 4000000,
         disableOnInteraction: false,
      },
      thumbs: {
         swiper: swiper,
      },
      navigation:{
         nextEL: ".swiper-button-next",
         prevEL: ".swiper-button-prev",
      },
   });
   $(".swiper-button-next").click(function(){
      swiper2.slideNext();
   });
   $(".swiper-button-prev").click(function(){
      swiper2.slidePrev();
   });
</script>