<!-- CTA Section Starts Here -->
<?php ob_start(); ?>
   <div class="cta-section2 position-relative cta-overlay container p-0 my50">
      <div class="cta-data">
         <h2 class="cta-text-alt"><?= $updateContent['shopTitle'] ?></h2>
         <p class="cta-text-alt"><?= $updateContent['aboutUs'] ?></p>
         <a href="shop.php" class="btn btn-primary arrow position-relative banner-btn-color">
            <?= $updateContent['buttonName'] ?>
         </a>
      </div>
   </div>
<?php $sections['ctaSection'] = ob_get_clean(); ?>
<!-- CTA Section Ends Here -->