<!-- About Section Starts -->
<?php ob_start(); ?>
<div class="about_section about_section1 p-0 my50">
   <div class="container p-0 d-flex justify-content-between">
      <div class="text-wrapper left about-overlay">
         <div class="about-wrapper">
            <p class="about-brand about-text-color"><?= $updateContent['aboutUsTitle'] ?></p>
            <h3 class="about-title about-text-color"><?= $updateContent['slogan'] ?></h3>
            <a href="shop.php" class="btn btn-primary arrow position-relative about-btn-color"><?= $updateContent['buttonName'] ?></a>
         </div> 
      </div>
      <div class="text-wrapper right about-overlay">
         <div class="about-wrapper">
            <p class="about-brand"><?= $updateContent['shopTitle'] ?></p>
            <h3 class="about-title"><?= $updateContent['tagline'] ?></h3>
            <a href="shop.php" class="btn btn-primary arrow position-relative about-btn-color"><?= $updateContent['buttonName'] ?></a>
         </div> 
      </div>
   </div>
</div>
<?php $sections['aboutSection'] = ob_get_clean(); ?>
<!-- About Section End -->