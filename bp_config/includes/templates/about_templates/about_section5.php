<?php ob_start(); ?>


<div class="about_section about_section5 ab-5 p-0 my50">
   <div class="container-fluid">
      <div class="row">
         <div class="col col-12 col-lg-6 about-overlay">
            <img src="./img/about1.jpg" class="ab-img l-img" alt="">
            <div class="about-left-wrapper">
               <p class="about-brand about-text-color"><?= $generalConfig['brand_name'] ?></p>
               <h3 class="about-title about-text-color"><?= $updateContent['aboutUsTitle'] ?></h3>
               <p class="about-content about-text-color"><?= $updateContent['aboutUs'] ?></p>
               <a href="shop.php" class="btn btn-primary arrow position-relative about-btn-color"><?= $updateContent['buttonName'] ?><i class="bi bi-arrow-right ms-2"></i></a>
            </div>
         </div>
         <div class="col col-12 col-lg-6 alo">
            <img src="./img/about2.jpg" class="ab-img r-img" alt="">
            sd
         </div>
      </div>
   </div>
</div>
<?php $sections['aboutSection'] = ob_get_clean(); ?>