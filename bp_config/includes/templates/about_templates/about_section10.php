<!-- About Section Starts -->
<?php ob_start(); ?>

<div class="about_section about_section10 p-0 my50">
   <div class="container">
      <div class="about-wrapper">
         <h2 class="about-heading"><?= $updateContent['aboutUsTitle'] ?></h2>
         <p class="about-text about-text-color-alt"><?= $updateContent['aboutUs'] ?></p>
      </div>
   </div>
</div>

<?php $sections['aboutSection'] = ob_get_clean(); ?>
<!-- About Section Ends -->