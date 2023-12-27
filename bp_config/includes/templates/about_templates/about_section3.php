<!-- About Section Starts Here -->
<?php ob_start(); ?>

<section>
   <div class="about_section about_section3 position-relative about-overlay container p-0 my50">
      <div class="about-data">
         <h2 class="about-text-color"><?= $updateContent['aboutUsTitle'] ?></h2>
         <p class="about-text-color"><?= $updateContent['aboutUs'] ?></p>
         <a href="#products" class="btn btn-primary mt-3 arrow position-relative banner-btn-color">
            <?= $updateContent['buttonName'] ?>
         </a>
      </div>
   </div>
</section>

<?php $sections['aboutSection'] = ob_get_clean(); ?>
<!-- About Section Ends Here -->